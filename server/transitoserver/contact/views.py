from rest_framework.views import APIView
from rest_framework.response import Response
from rest_framework import status
from .models import ContactForm
from .serializers import ContactFormSerializer
from django.core.mail import BadHeaderError, send_mail
from django.conf import settings
import logging

# Configuração do logger para depuração
logger = logging.getLogger(__name__)

class ContactSubmitView(APIView):
    def post(self, request):
        data = request.data
        required_fields = ['name', 'email', 'phone', 'message']
        
        # Verificar se os campos obrigatórios estão presentes
        for field in required_fields:
            if field not in data:
                logger.error("Campo ausente: %s", field)
                return Response({'error': f'Campo ausente: {field}'}, status=status.HTTP_400_BAD_REQUEST)

        # Salvar os dados no banco de dados
        try:
            contact = ContactForm.objects.create(
                name=data['name'],
                email=data['email'],
                phone=data['phone'],
                message=data['message']
            )
            logger.info("Dados de contato salvos com sucesso: %s", contact)
        except Exception as e:
            logger.error("Erro ao salvar dados no banco de dados: %s", str(e))
            return Response({'error': f'Erro ao salvar no banco de dados: {str(e)}'}, status=status.HTTP_500_INTERNAL_SERVER_ERROR)
        
        # Preparar o e-mail
        subject = f"Nova mensagem de {data['name']}"
        message = f"""
        Você recebeu uma nova mensagem de contato:

        Nome: {data['name']}
        E-mail: {data['email']}
        Telefone: {data['phone']}

        Mensagem:
        {data['message']}
        """
        from_email = settings.EMAIL_HOST_USER  # E-mail do remetente (configurado no settings.py)
        to_email = [settings.EMAIL_HOST_USER]  # Pode adicionar mais destinatários aqui

        try:
            # Enviar o e-mail
            send_mail(subject, message, from_email, to_email)
            logger.info("E-mail enviado com sucesso para %s", to_email)
        except BadHeaderError:
            logger.error("Cabeçalho inválido no e-mail.")
            return Response({'error': 'Cabeçalho inválido no e-mail'}, status=status.HTTP_400_BAD_REQUEST)
        except Exception as e:
            logger.error("Erro ao enviar o e-mail: %s", str(e))
            return Response({'error': f'Erro ao enviar o e-mail: {str(e)}'}, status=status.HTTP_500_INTERNAL_SERVER_ERROR)

        return Response({'message': 'Mensagem recebida e enviada por e-mail com sucesso!'}, status=status.HTTP_201_CREATED)


class ContactListView(APIView):
    def get(self, request):
        contacts = ContactForm.objects.all()  
        serializer = ContactFormSerializer(contacts, many=True)

        return Response(serializer.data)

from rest_framework.views import APIView
from rest_framework.response import Response
from rest_framework import status
from .models import ContactForm
from .serializers import ContactFormSerializer
from django.http import Http404
import logging

# Configuração do logger para depuração
logger = logging.getLogger(__name__)

class ContactDeleteView(APIView):
    def delete(self, request, pk):
        try:
            # Tentar localizar o objeto pelo ID (pk)
            contact = ContactForm.objects.get(pk=pk)
            contact.delete()  # Deletar o objeto

            # Registrar a exclusão no log
            logger.info("Contato com ID %d deletado com sucesso", pk)

            return Response({'message': 'Contato deletado com sucesso!'}, status=status.HTTP_204_NO_CONTENT)
        except ContactForm.DoesNotExist:
            logger.error("Contato com ID %d não encontrado", pk)
            raise Http404  # Se o contato não for encontrado, gerar erro 404
        except Exception as e:
            logger.error("Erro ao deletar o contato com ID %d: %s", pk, str(e))
            return Response({'error': f'Erro ao deletar o contato: {str(e)}'}, status=status.HTTP_500_INTERNAL_SERVER_ERROR)


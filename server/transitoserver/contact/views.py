from rest_framework.views import APIView
from rest_framework.response import Response
from rest_framework import status
from .models import ContactForm
from .serializers import ContactFormSerializer
from django.core.mail import BadHeaderError, send_mail
from django.http import HttpResponse, HttpResponseRedirect
from dotenv import load_dotenv
from django.conf import settings
import os

# Carregar variáveis de ambiente
load_dotenv()
EMAIL_HOST_USER = os.getenv('EMAIL_HOST_USER')
print("EMAIL_HOST_USER:", EMAIL_HOST_USER)

class ContactSubmitView(APIView):
    def post(self, request):
        data = request.data
        
        # Verifica se todos os campos obrigatórios foram preenchidos
        required_fields = ['name', 'email', 'phone', 'message']
        if not all(key in data for key in required_fields):
            return Response({'error': 'Campos incompletos'}, status=status.HTTP_400_BAD_REQUEST)

        # Salvar os dados no banco de dados
        try:
            contact = ContactForm.objects.create(
                name=data['name'],
                email=data['email'],
                phone=data['phone'],
                message=data['message']
            )
        except Exception as e:
            return Response({'error': f'Erro ao salvar no banco de dados: {str(e)}'}, status=status.HTTP_500_INTERNAL_SERVER_ERROR)

        # Preparando o conteúdo do e-mail
        subject = f"Nova mensagem de {data['name']}"
        message = f"""
        Você recebeu uma nova mensagem de contato:

        Nome: {data['name']}
        E-mail: {data['email']}
        Telefone: {data['phone']}

        Mensagem:
        {data['message']}
        """
        from_email = settings.DEFAULT_FROM_EMAIL
        to_email = [settings.DEFAULT_FROM_EMAIL]  # Para enviar para o seu e-mail

        try:
            # Tente enviar o e-mail
            send_mail(subject, message, from_email, to_email)
        except BadHeaderError:
            return Response({'error': 'Cabeçalho inválido no e-mail'}, status=status.HTTP_400_BAD_REQUEST)
        except Exception as e:
            # Aqui, capturamos qualquer outro erro ao tentar enviar o e-mail
            return Response({'error': f'Erro ao enviar o e-mail: {str(e)}'}, status=status.HTTP_500_INTERNAL_SERVER_ERROR)

        # Resposta de sucesso
        return Response({'message': 'Mensagem recebida e enviada por e-mail com sucesso!'}, status=status.HTTP_201_CREATED)

class ContactListView(APIView):
    def get(self, request):
        contacts = ContactForm.objects.all()  
        serializer = ContactFormSerializer(contacts, many=True)

        return Response(serializer.data)

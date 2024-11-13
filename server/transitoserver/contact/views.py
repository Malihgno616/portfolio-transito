# contact/views.py
from rest_framework.views import APIView
from rest_framework.response import Response
from rest_framework import status
from .models import ContactForm
from .serializers import ContactFormSerializer

class ContactSubmitView(APIView):
    def post(self, request):
        data = request.data
        print("Dados recebidos:", data)  # Verifica no console se os dados estão sendo recebidos

        # Validação de campos obrigatórios
        required_fields = ['name', 'email', 'phone', 'message']
        if not all(key in data for key in required_fields):
            return Response({'error': 'Campos incompletos'}, status=status.HTTP_400_BAD_REQUEST)

        # Salvar os dados no banco de dados
        contact = ContactForm.objects.create(
            name=data['name'],
            email=data['email'],
            phone=data['phone'],
            message=data['message']
        )

        # Resposta de sucesso
        return Response({'message': 'Mensagem recebida com sucesso!'}, status=status.HTTP_201_CREATED)

class ContactListView(APIView):
    def get(self, request):
        contacts = ContactForm.objects.all()  
        serializer = ContactFormSerializer(contacts, many=True)

        return Response(serializer.data)

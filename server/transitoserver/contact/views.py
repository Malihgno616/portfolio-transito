# contact/views.py
from rest_framework.views import APIView
from rest_framework.response import Response
from rest_framework import status

class ContactSubmitView(APIView):
    def post(self, request):
        data = request.data  # Recebe os dados do formulário enviado
        print("Dados recebidos:", data)  # Aqui você pode verificar os dados no console

        # Validando se todos os campos obrigatórios foram preenchidos
        if not all(key in data for key in ['name', 'email', 'phone', 'message']):
            return Response({'error': 'Campos incompletos'}, status=status.HTTP_400_BAD_REQUEST)
        
        # Aqui você pode salvar os dados no banco, enviar um email ou qualquer outra ação
        # Exemplo de resposta de sucesso
        return Response({'message': 'Mensagem recebida com sucesso!'}, status=status.HTTP_201_CREATED)

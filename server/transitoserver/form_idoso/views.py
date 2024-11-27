from rest_framework.views import APIView
from rest_framework.response import Response
from rest_framework import status
from .models import SeniorForm, LegalRepresentative
from .serializers import SeniorFormSerializer, LegalRepresentativeSerializer

class SeniorFormView(APIView):
    def post(self, request):
        print("Dados recebidos:", request.data)  # Imprimir dados recebidos
        serializer = SeniorFormSerializer(data=request.data)
        if serializer.is_valid():
            serializer.save()
            return Response(serializer.data, status=status.HTTP_201_CREATED)
        else:
            print("Erros de validação:", serializer.errors)
            return Response({
                'errors': serializer.errors,
                'message': 'Os dados enviados são inválidos'
            }, status=status.HTTP_400_BAD_REQUEST)

class LegalRepresentativeView(APIView):
    def post(self, request):
        data = request.data  # Dados do representante legal
        serializer = LegalRepresentativeSerializer(data=data)  # Passar os dados para o serializer

        if serializer.is_valid():  # Verificar se os dados são válidos
            serializer.save()  # Salvar os dados no banco de dados
            return Response(serializer.data, status=status.HTTP_201_CREATED)  # Retornar os dados do serializer com o código 201
        else:
            return Response({
                'errors': serializer.errors,
                'message': 'Os dados enviados são inválidos'
            }, status=status.HTTP_400_BAD_REQUEST)  # Retornar os erros de validação

class SeniorFormListView(APIView):
    def get(self, request):
        senior_infos = SeniorForm.objects.all()  # Buscar todos os registros do formulário de idoso
        serializer = SeniorFormSerializer(senior_infos, many=True)  # Serializar os dados (muitos registros)
        return Response(serializer.data)  # Retornar os dados serializados

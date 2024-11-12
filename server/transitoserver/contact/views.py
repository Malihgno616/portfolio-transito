from django.shortcuts import render
from rest_framework import status
from rest_framework.decorators import api_view
from rest_framework.response import Response
from .serializers import ContactFormSerializer

@api_view(["POST"])
def submit_contact_form(request):
  if request.method == 'POST':
    serializer = ContactFormSerializer(data = request.data)
    if serializer.is_valid():
      serializer.save()
      return Response({"message":"mensagem enviada com sucesso!"}, status=status.HTTP_201_CREATED)
    return Response(serializer.errors, status=status.HTTP_400_BAD_REQUEST)
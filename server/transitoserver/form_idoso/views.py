from rest_framework.views import APIView
from rest_framework.response import Response
from rest_framework import status
from .models import SeniorForm, LegalRepresentative
from .serializers import SeniorFormSerializer,LegalRepresentativeSerializer

class SeniorFormView(APIView):
  def post(self, request):
    data=request.data
    serializer = SeniorFormSerializer(data)
    if serializer:
      serializer.save()
      return Response(serializer.data, status=status.HTTP_201_CREATED)
    else: 
      return Response(serializer.errors, status=status.HTTP_400_BAD_REQUEST)
    
class LegalRepresentativeView(APIView):
  def post(self, request):
    data=request.data
    serializer = LegalRepresentativeSerializer(data)
    if serializer:
      serializer.save()
      return Response(serializer.data, status=status.HTTP_201_CREATED)
    else:
      return Response(serializer.errors, status=status.HTTP_400_BAD_REQUEST)

class SeniorFormListView(APIView):
  def get(self, request):     
    senior_infos = SeniorForm.objects.all()  
    serializer = SeniorFormSerializer(senior_infos, many=True)
    return Response(serializer.data)




from rest_framework import serializers
from .models import SeniorForm, LegalRepresentative

class LegalRepresentativeSerializer(serializers.ModelSerializer):

  complement = serializers.CharField(required=False, allow_blank=True)  

  class Meta:
    model = SeniorForm
    fields = '__all__'
    

class SeniorFormSerializer(serializers.ModelSerializer):


  class Meta:
    model = SeniorForm
    fields = '__all__'
  representative = LegalRepresentativeSerializer(read_only=True, required=False)
  complement = serializers.CharField(required=False, allow_blank=True)
    
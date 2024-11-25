from rest_framework import serializers
from .models import SeniorForm, LegalRepresentative

class LegalRepresentativeSerializer(serializers.ModelSerializer):
  class Meta:
    model = SeniorForm
    fields = '__all__'

class SeniorFormSerializer(serializers.ModelSerializer):
  
  representative = LegalRepresentativeSerializer(read_only=True, required=False)
  
  class Meta:
    model = SeniorForm
    fields = '__all__'
    
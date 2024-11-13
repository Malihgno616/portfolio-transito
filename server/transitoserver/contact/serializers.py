from rest_framework import serializers
from .models import ContactForm

class ContactFormSerializer(serializers.ModelSerializer):
    class Meta:
        model = ContactForm
        fields = ['name', 'email', 'phone', 'message']

    def save(self):
        try:
            # Salvar os dados no banco de dados
            return super().save()
        except Exception as e:
            # Logar ou capturar o erro para depuração
            print("Erro ao salvar:", e)
            raise serializers.ValidationError("Houve um erro ao salvar os dados.")

from django.contrib import admin
from form_idoso.models import SeniorForm, LegalRepresentative

@admin.register(SeniorForm)
class SeniorFormAdmin(admin.ModelAdmin):
    list_display = ('name', 'birthday', 'gender', 'zip_code', 'city', 'state', 'phone', 'rg', 'issuance_date')
    list_filter = ('state', 'gender')  # Filtro para o campo 'gender'
    search_fields = ('name', 'phone', 'rg')

@admin.register(LegalRepresentative)
class LegalRepresentativeAdmin(admin.ModelAdmin):
    list_display = ('name', 'birthday', 'gender', 'zip_code', 'city', 'state', 'phone', 'rg', 'issuance_date')
    list_filter = ('state', 'gender')  # Filtro para o campo 'gender'
    search_fields = ('name', 'phone', 'rg')

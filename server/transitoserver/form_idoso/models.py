from django.db import models

from django.db import models

class SeniorForm(models.Model):
    name = models.CharField(max_length=252, verbose_name='Nome')
    birthday = models.DateField(verbose_name='Data de Nascimento')
    
    GENDER_CHOICES = [
        ('M', 'Masculino'),
        ('F', 'Feminino'),
    ]
    gender = models.CharField(max_length=1, choices=GENDER_CHOICES, verbose_name='Gênero')
    
    zip_code = models.IntegerField(verbose_name='CEP')

    address = models.CharField(max_length=255, verbose_name='Endereço')
    complement = models.CharField(max_length=255, blank=True, null=True, verbose_name='Complemento')
    neighborhood = models.CharField(max_length=255, verbose_name='Bairro')
    number = models.IntegerField(verbose_name='Número')
    city = models.CharField(max_length=255, verbose_name='Cidade')
    
    class State(models.TextChoices):
        ACRE = "AC", "Acre"
        ALAGOAS = "AL", "Alagoas"
        AMAPA = "AP", "Amapá"
        AMAZONAS = "AM", "Amazonas"
        BAHIA = "BA", "Bahia"
        CEARA = "CE", "Ceará"
        DISTRITO_FEDERAL = "DF", "Distrito Federal"
        ESPIRITO_SANTO = "ES", "Espírito Santo"
        GOIAS = "GO", "Goiás"
        MARANHAO = "MA", "Maranhão"
        MATO_GROSSO = "MT", "Mato Grosso"
        MATO_GROSSO_DO_SUL = "MS", "Mato Grosso do Sul"
        MINAS_GERAIS = "MG", "Minas Gerais"
        PARA = "PA", "Pará"
        PARAIBA = "PB", "Paraíba"
        PARANA = "PR", "Paraná"
        PERNAMBUCO = "PE", "Pernambuco"
        PIAUI = "PI", "Piauí"
        RIO_DE_JANEIRO = "RJ", "Rio de Janeiro"
        RIO_GRANDE_DO_NORTE = "RN", "Rio Grande do Norte"
        RIO_GRANDE_DO_SUL = "RS", "Rio Grande do Sul"
        RONDONIA = "RO", "Rondônia"
        SANTA_CATARINA = "SC", "Santa Catarina"
        SAO_PAULO = "SP", "São Paulo"
        SERGIPE = "SE", "Sergipe"
        TOCANTINS = "TO", "Tocantins"
    
    state = models.CharField(max_length=2, choices=State.choices, verbose_name='Estado')

    phone = models.CharField(max_length=20, verbose_name='Telefone')

    rg = models.CharField(max_length=20, verbose_name='RG')
    issuance_date = models.DateField(verbose_name='Data de Expedição')
    issued_by = models.CharField(max_length=100, verbose_name='Expedido por')

    rg_copy_doc = models.FileField(verbose_name='Cópia do RG')

    representative = models.OneToOneField('LegalRepresentative', on_delete=models.SET_NULL, null=True, blank=True, verbose_name='Representante Legal')

    def __str__(self):
        return self.name

    class Meta:
        verbose_name = 'Formulário do Idoso'
        verbose_name_plural = 'Formulários dos Idosos'

class LegalRepresentative(models.Model):
    name = models.CharField(max_length=252, verbose_name='Nome')
    birthday = models.DateField(verbose_name='Data de Nascimento')
    
    GENDER_CHOICES = [
        ('M', 'Masculino'),
        ('F', 'Feminino'),
    ]
    gender = models.CharField(max_length=1, choices=GENDER_CHOICES, verbose_name='Gênero')
    
    zip_code = models.IntegerField(verbose_name='CEP')

    address = models.CharField(max_length=255, verbose_name='Endereço')
    complement = models.CharField(max_length=255, blank=True, null=True, verbose_name='Complemento')
    neighborhood = models.CharField(max_length=255, verbose_name='Bairro')
    number = models.IntegerField(verbose_name='Número')
    city = models.CharField(max_length=255, verbose_name='Cidade')
    
    class State(models.TextChoices):
        ACRE = "AC", "Acre"
        ALAGOAS = "AL", "Alagoas"
        AMAPA = "AP", "Amapá"
        AMAZONAS = "AM", "Amazonas"
        BAHIA = "BA", "Bahia"
        CEARA = "CE", "Ceará"
        DISTRITO_FEDERAL = "DF", "Distrito Federal"
        ESPIRITO_SANTO = "ES", "Espírito Santo"
        GOIAS = "GO", "Goiás"
        MARANHAO = "MA", "Maranhão"
        MATO_GROSSO = "MT", "Mato Grosso"
        MATO_GROSSO_DO_SUL = "MS", "Mato Grosso do Sul"
        MINAS_GERAIS = "MG", "Minas Gerais"
        PARA = "PA", "Pará"
        PARAIBA = "PB", "Paraíba"
        PARANA = "PR", "Paraná"
        PERNAMBUCO = "PE", "Pernambuco"
        PIAUI = "PI", "Piauí"
        RIO_DE_JANEIRO = "RJ", "Rio de Janeiro"
        RIO_GRANDE_DO_NORTE = "RN", "Rio Grande do Norte"
        RIO_GRANDE_DO_SUL = "RS", "Rio Grande do Sul"
        RONDONIA = "RO", "Rondônia"
        SANTA_CATARINA = "SC", "Santa Catarina"
        SAO_PAULO = "SP", "São Paulo"
        SERGIPE = "SE", "Sergipe"
        TOCANTINS = "TO", "Tocantins"
    
    state = models.CharField(max_length=2, choices=State.choices, verbose_name='Estado')

    phone = models.CharField(max_length=20, verbose_name='Telefone')

    rg = models.CharField(max_length=20, verbose_name='RG')
    issuance_date = models.DateField(verbose_name='Data de Expedição')
    issued_by = models.CharField(max_length=100, verbose_name='Expedido por')

    rg_copy_doc = models.FileField(verbose_name='Cópia do RG')
    representative_doc = models.FileField(verbose_name='Documento do Representante')

    def __str__(self):
        return self.name

    class Meta:
        verbose_name = 'Representante Legal'
        verbose_name_plural = 'Representantes Legais'


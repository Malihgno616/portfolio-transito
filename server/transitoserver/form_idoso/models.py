from django.db import models

class LegalRepresentative(models.Model):
    name = models.CharField(max_length=252)
    birthday = models.DateField()
    
    # Define gender options
    gender = models.TextChoices("Male", "Female")
    
    # ZIP code (CEP)
    zip_code = models.IntegerField()
    
    # Address fields (Endereço)
    address = models.CharField(max_length=255)
    complement = models.CharField(max_length=255, blank=True, null=True)
    neighborhood = models.CharField(max_length=255)
    number = models.IntegerField()
    city = models.CharField(max_length=255)
    
    # State options (UF - Unidades Federativas - Estado)
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
    
    state = models.CharField(max_length=2, choices=State.choices)

    # Contact information
    phone = models.CharField(max_length=20)
    
    # Identity document
    rg = models.CharField(max_length=20)
    issuance_date = models.DateField()#Data de Expedição
    issued_by = models.CharField(max_length=100)#Expedido por

    # Necessary document
    rg_copy_doc = models.FileField()
    representative_doc = models.FileField()
    
    def __str__(self):
        return self.name  # Returns the name of the object 
    
class SeniorForm(models.Model): # Formulário do Idoso
    name = models.CharField(max_length=252)
    birthday = models.DateField()
    
    # Define gender options
    gender = models.TextChoices("Male", "Female")
    
    # ZIP code (CEP)
    zip_code = models.IntegerField()
    
    # Address fields (Endereço)
    address = models.CharField(max_length=255)
    complement = models.CharField(max_length=255, blank=True, null=True)
    neighborhood = models.CharField(max_length=255)
    number = models.IntegerField()
    city = models.CharField(max_length=255)
    
    # State options (UF - Unidades Federativas - Estado)
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
    
    state = models.CharField(max_length=2, choices=State.choices)

    # Contact information
    phone = models.CharField(max_length=20)
    
    # Identity document
    rg = models.CharField(max_length=20)
    issuance_date = models.DateField()#Data de Expedição
    issued_by = models.CharField(max_length=100)#Expedido por

    # Necessary document
    rg_copy_doc = models.FileField()
    
    # Representante legal deve ser opcional
    representative = models.OneToOneField(LegalRepresentative, on_delete=models.SET_NULL, null=True, blank=True)

    def __str__(self):
        return self.name  # Returns the name of the object

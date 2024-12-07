# Generated by Django 4.2.11 on 2024-11-22 15:32

from django.db import migrations, models
import django.db.models.deletion


class Migration(migrations.Migration):

    initial = True

    dependencies = [
    ]

    operations = [
        migrations.CreateModel(
            name='LegalRepresentative',
            fields=[
                ('id', models.BigAutoField(auto_created=True, primary_key=True, serialize=False, verbose_name='ID')),
                ('name', models.CharField(max_length=252)),
                ('birthday', models.DateField()),
                ('zip_code', models.IntegerField()),
                ('address', models.CharField(max_length=255)),
                ('complement', models.CharField(blank=True, max_length=255, null=True)),
                ('neighborhood', models.CharField(max_length=255)),
                ('number', models.IntegerField()),
                ('city', models.CharField(max_length=255)),
                ('state', models.CharField(choices=[('AC', 'Acre'), ('AL', 'Alagoas'), ('AP', 'Amapá'), ('AM', 'Amazonas'), ('BA', 'Bahia'), ('CE', 'Ceará'), ('DF', 'Distrito Federal'), ('ES', 'Espírito Santo'), ('GO', 'Goiás'), ('MA', 'Maranhão'), ('MT', 'Mato Grosso'), ('MS', 'Mato Grosso do Sul'), ('MG', 'Minas Gerais'), ('PA', 'Pará'), ('PB', 'Paraíba'), ('PR', 'Paraná'), ('PE', 'Pernambuco'), ('PI', 'Piauí'), ('RJ', 'Rio de Janeiro'), ('RN', 'Rio Grande do Norte'), ('RS', 'Rio Grande do Sul'), ('RO', 'Rondônia'), ('SC', 'Santa Catarina'), ('SP', 'São Paulo'), ('SE', 'Sergipe'), ('TO', 'Tocantins')], max_length=2)),
                ('phone', models.CharField(max_length=20)),
                ('rg', models.CharField(max_length=20)),
                ('issuance_date', models.DateField()),
                ('issued_by', models.CharField(max_length=100)),
                ('rg_copy_doc', models.FileField(upload_to='')),
                ('representative_doc', models.FileField(upload_to='')),
            ],
        ),
        migrations.CreateModel(
            name='SeniorForm',
            fields=[
                ('id', models.BigAutoField(auto_created=True, primary_key=True, serialize=False, verbose_name='ID')),
                ('name', models.CharField(max_length=252)),
                ('birthday', models.DateField()),
                ('zip_code', models.IntegerField()),
                ('address', models.CharField(max_length=255)),
                ('complement', models.CharField(blank=True, max_length=255, null=True)),
                ('neighborhood', models.CharField(max_length=255)),
                ('number', models.IntegerField()),
                ('city', models.CharField(max_length=255)),
                ('state', models.CharField(choices=[('AC', 'Acre'), ('AL', 'Alagoas'), ('AP', 'Amapá'), ('AM', 'Amazonas'), ('BA', 'Bahia'), ('CE', 'Ceará'), ('DF', 'Distrito Federal'), ('ES', 'Espírito Santo'), ('GO', 'Goiás'), ('MA', 'Maranhão'), ('MT', 'Mato Grosso'), ('MS', 'Mato Grosso do Sul'), ('MG', 'Minas Gerais'), ('PA', 'Pará'), ('PB', 'Paraíba'), ('PR', 'Paraná'), ('PE', 'Pernambuco'), ('PI', 'Piauí'), ('RJ', 'Rio de Janeiro'), ('RN', 'Rio Grande do Norte'), ('RS', 'Rio Grande do Sul'), ('RO', 'Rondônia'), ('SC', 'Santa Catarina'), ('SP', 'São Paulo'), ('SE', 'Sergipe'), ('TO', 'Tocantins')], max_length=2)),
                ('phone', models.CharField(max_length=20)),
                ('rg', models.CharField(max_length=20)),
                ('issuance_date', models.DateField()),
                ('issued_by', models.CharField(max_length=100)),
                ('rg_copy_doc', models.FileField(upload_to='')),
                ('representative', models.OneToOneField(blank=True, null=True, on_delete=django.db.models.deletion.SET_NULL, to='form_idoso.legalrepresentative')),
            ],
        ),
    ]

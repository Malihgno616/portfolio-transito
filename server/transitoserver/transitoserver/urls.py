# transitoserver/urls.py
from django.contrib import admin
from django.urls import path, include  # Certifique-se de importar o 'include'

urlpatterns = [
    path('admin/', admin.site.urls),  # URL do admin
    path('api/contact/', include('contact.urls')),  # Inclui as URLs do app 'contact'
]

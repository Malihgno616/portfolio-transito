# transitoserver/urls.py
from django.contrib import admin
from django.urls import path, include  # Certifique-se de incluir 'include' para importar as URLs da app 'contact'

urlpatterns = [
    path('admin/', admin.site.urls),
    path('api/contact/', include('contact.urls')),  # A URL base agora começa com 'api/contact/'
]

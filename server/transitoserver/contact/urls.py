# contact/urls.py
from django.urls import path
from . import views

urlpatterns = [
    path('submit/', views.ContactSubmitView.as_view(), name='contact_submit'), 
    path('list/', views.ContactListView.as_view(), name='contact_list'),  # Não precisa do 'api/' aqui
]

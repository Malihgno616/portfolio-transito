# contact/urls.py
from django.urls import path
from . import views

urlpatterns = [
    path('submit/', views.ContactSubmitView.as_view(), name='contact_submit'),  # A URL que será chamada
]

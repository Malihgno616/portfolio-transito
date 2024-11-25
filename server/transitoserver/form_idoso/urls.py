from django.urls import path
from . import views 

urlpatterns = [
  path('submit', views.SeniorFormView.as_view(), name='senior_form_submit'),
  path('list', views.SeniorFormListView.as_view(), name='senior_form_list')
]

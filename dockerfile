FROM microsoft/wcf

RUN mkdir C:\routing

RUN powershell -NoProfile -Command \
    Import-module IISAdministration; \
    New-IISSite -Name "routing" -PhysicalPath C:\routing -BindingInformation "*:83:"

EXPOSE 83

ADD routing/ /routing
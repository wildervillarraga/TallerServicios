FROM microsoft/wcf
ARG site_root=.
RUN mkdir C:\WcfService

RUN powershell -NoProfile -Command \
    Import-module IISAdministration; \
    New-IISSite -Name "WcfService" -PhysicalPath C:\WcfService -BindingInformation "*:8081:"

EXPOSE 8081

ADD ${site_root} /WcfService
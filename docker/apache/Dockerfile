ARG APACHE_VERSION=""
FROM httpd:${APACHE_VERSION:+${APACHE_VERSION}}

#RUN apt-get update; \
#    apt-get upgrade;

# Copy apache conf file
COPY conf.d/app.conf /usr/local/apache2/conf/app.conf
RUN echo "Include /usr/local/apache2/conf/app.conf" \
    >> /usr/local/apache2/conf/httpd.conf
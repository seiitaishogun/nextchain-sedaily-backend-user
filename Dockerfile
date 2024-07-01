FROM public.ecr.aws/fles/php82:latest
LABEL maintainer="kimchanhyung98 <kimchanhyung98@gmail.com>"

# Set working directory
WORKDIR /var/www

# Copy code to /var/www
COPY --chown=www:www-data . /var/www

# Copy nginx/php/supervisor configs
RUN cp docker/supervisor.conf /etc/supervisord.conf
RUN cp docker/php.ini /usr/local/etc/php/conf.d/app.ini
RUN cp docker/nginx.conf /etc/nginx/sites-enabled/default

# Deployment steps
# RUN composer install --optimize-autoloader --no-dev
RUN composer config -g repo.packagist composer https://packagist.org
RUN composer clear-cache
RUN composer install --no-dev --no-cache --ignore-platform-reqs
RUN chmod +x /var/www/docker/run.sh

# add root to www group
RUN chmod -R ug+w /var/www/storage

EXPOSE 80
ENTRYPOINT ["/var/www/docker/run.sh"]

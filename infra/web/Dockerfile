FROM nginx:1.24.0

COPY ./infra/web/nginx.conf /etc/ngnx/nginx.conf
COPY ./infra/web/default.conf /etc/nginx/conf.d/default.conf

COPY ./api /var/www/html

EXPOSE 80

WORKDIR /var/www/html
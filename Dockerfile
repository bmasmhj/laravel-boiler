ARG PROJECT_ID
FROM gcr.io/$PROJECT_ID/php8.0:latest
WORKDIR /app
COPY ./composer.json /app
COPY .env.example .env
RUN composer install; exit 0
COPY . /app
RUN composer update
RUN php artisan key:generate
RUN php artisan storage:link
CMD php artisan serve --host=0.0.0.0 --port=8181
EXPOSE 8181
RUN php artisan cache:clear
RUN php artisan config:clear
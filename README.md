CRUD : GUIA DE INICIALIZAÇÃO:


git clone https://github.com/Caiocr8/desafio-laravel.git

cd desafio-laravel

sudo docker-compose up -d --build

sudo docker exec setup-php composer install

sudo docker exec setup-php php artisan storage:link

cd ./crud

npm install

npm run dev


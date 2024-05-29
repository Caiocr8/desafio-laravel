Desafio Laravel:

Guia de inicialização:


  - git clone https://github.com/Caiocr8/desafio-laravel.git
  
  - cd desafio-laravel
  
  - cd crud
  
  - cp .env.example .env
  
  - cd ..
  
  - sudo docker-compose up -d --build
  
  - sudo docker exec setup-php composer install

  - sudo docker exec setup-php php artisan key:generate
  
  - sudo docker exec setup-php php artisan storage:link
  
  - cd ./crud
  
  - npm install
  
  - npm run dev

Este projeto é um CRUD básico, demonstrando as operações essenciais em um aplicativo web usando Laravel:

Create (Criar): Adicionar novos registros ao banco de dados.
Read (Ler): Visualizar registros existentes.
Update (Atualizar): Editar registros existentes.
Delete (Excluir): Remover registros do banco de dados.




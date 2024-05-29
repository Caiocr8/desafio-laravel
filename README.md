Desafio Laravel: Guia de Inicialização
Este projeto é um CRUD básico, demonstrando as operações essenciais em um aplicativo web usando Laravel:

Create (Criar): Adicionar novos registros ao banco de dados. 

Read (Ler): Visualizar registros existentes.

Update (Atualizar): Editar registros existentes.

Delete (Excluir): Remover registros do banco de dados.


Pré-requisitos: 
Certifique-se de ter as seguintes ferramentas instaladas em sua máquina antes de iniciar o projeto:

Git
Docker
Docker Compose
Node.js e npm

Clone o repositório:
  - git clone https://github.com/Caiocr8/desafio-laravel.git

Navegue até o diretório do projeto:
  - cd desafio-laravel

Copie o arquivo de exemplo .env e configure suas variáveis de ambiente:
  - cd crud
  - cp .env.example .env

Suba os contêineres Docker:
  - cd ..
  - sudo docker-compose up -d --build

Instale as dependências do PHP via Composer:
  - sudo docker exec setup-php composer install

Gere a chave da aplicação Laravel:
  - sudo docker exec setup-php php artisan key:generate

Crie um link simbólico para o diretório de armazenamento:
  - sudo docker exec setup-php php artisan storage:link

Instale as dependências do Node.js:
  - cd ./crud
  - npm install

Compile os ativos front-end:
  - npm run dev






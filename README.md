## Passos para instalação do projeto

1 - Criar arquivo .env e alterar as seguintes linhas:

<p>DB_CONNECTION=mysql
</p><p>DB_HOST=db
</p><p>DB_PORT=3306
</p><p>DB_DATABASE=sales_import
</p><p>DB_USERNAME=sales_import_user
</p><p>DB_PASSWORD=123abc
</p>

2 - Subir as imagens do docker

- docker-compose build app
- docker-compose up -d

3 - Instalar dependências via composer

- docker-compose exec app composer install

4 - Instalar dependências via NPM

- docker-compose exec app npm install
- docker-compose exec app npm run dev

5 - Geração de chave

- docker-compose exec app php artisan key:generate

6 - Executar migrations

- docker-compose exec app php artisan migrate

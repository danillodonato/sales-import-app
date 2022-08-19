## Passos para instalação do projeto

1 - Criar arquivo .env e alterar as seguintes linhas:

<p>DB_CONNECTION=mysql
</p><p>DB_HOST=db
</p><p>DB_PORT=3306
</p><p>DB_DATABASE=sales_import
</p><p>DB_USERNAME=sales_import_user
</p><p>DB_PASSWORD=123abc
</p>
2 - Instalar dependências via composer

- docker-compose exec app composer install

3 - Instalar dependências via NPM

- docker-compose exec app npm install
- docker-compose exec app npm run dev

4 - Geração de chave

- docker-compose exec app php artisan key:generate

5 - Executar migrations

- docker-compose exec app php artisan migrate

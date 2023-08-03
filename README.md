**Docker com Laradock e Laravel**

**Clonar projeto**

git clone https://github.com/lineMarques/myFreela.git


**Clonar laradock dentro do projeto**

git clone https://github.com/Laradock/laradock.git



**Copiar o arquivo .env.example**

```
cd laradock
cp .env.example .env
```

**Abrir .env configurar versão PHP, stgres e o nome do projeto**

```
gedit .env
36- COMPOSE_PROJECT_NAME=myFreela
```

```
PHP_VERSION=8.1
```

```
POSTGRES_VERSION=alpine
POSTGRES_CLIENT_VERSION=15
POSTGRES_DB= ?
POSTGRES_USER= ?
POSTGRES_PASSWORD= ?
POSTGRES_PORT= ?
POSTGRES_ENTRYPOINT_INITDB=./postgres/docker-entrypoint-initdb.d
```

**Subir os containers**

docker-compose up -d nginx postgres

**Entrar no projeto pelo docker**

docker exec -it myfreela_workspace_1 bash

**Digitar os comandos**

```
npm install
composer install
composer require livewire/livewire
composer require laravel/breeze --dev
composer require laravellegends/pt-br-validator
```

**Configurar .env Laravel**

```
DB_CONNECTION=pgsql
DB_HOST=postgres
DB_PORT= O MESMO QUE FOI CONFIGURADO NO .ENV DO DOCKER
DB_DATABASE= O MESMO QUE FOI CONFIGURADO NO .ENV DO DOCKER
DB_USERNAME= O MESMO QUE FOI CONFIGURADO NO .ENV DO DOCKER
DB_PASSWORD= O MESMO QUE FOI CONFIGURADO NO .ENV DO DOCKER
```

```
php artisa migrate
php artisan storage:link
```

**Docker com Laradock**

**Clonar projeto**

git clone https://github.com/lineMarques/myFreela.git


**Clonar laradock**

git clone https://github.com/Laradock/laradock.git



**Copiar o arquivo .env.example do laradock**

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
42- PHP_VERSION=8.1
```

```
470- POSTGRES_VERSION=alpine
471- POSTGRES_CLIENT_VERSION=15
472- POSTGRES_DB= ?
473- POSTGRES_USER= ?
474- POSTGRES_PASSWORD= ?
475- POSTGRES_PORT= ?
476- POSTGRES_ENTRYPOINT_INITDB=./postgres/docker-entrypoint-initdb.d
```

**Subir os containers**

docker-compose up -d nginx postgres

**Configurar o arquivo laravel.conf do nginx**

```
cd nginx/sites
cp laravel.conf.example laravel.conf 

18- server_name myFreela.test;
19- root /var/www/myFreela/public;
20- index index.php index.html index.htm;
```

**Incluir essa linha no arquivo hosts do seu pc, se for linux o arquivo se encontra na pasta /etc**

```
127.0.0.1	myFreela.test
```

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
sudo chmod -R 777 storage bootstrap/cache
php artisan key:generate
php artisa migrate
php artisan storage:link
```

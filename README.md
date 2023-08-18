É preciso ter docker instalado.

```url
https://www.docker.com/get-started/
```


**Docker com Laradock**



**Clonar projeto**

```php
git clone https://github.com/lineMarques/myFreela.git
```

**Clonar laradock no mesmo diretório**

```php
git clone https://github.com/Laradock/laradock.git
```

**Copiar o arquivo .env.example do laradock**

```php
cd laradock
cp .env.example .env
```

**Abrir .env configurar versão PHP, stgres e o nome do projeto**

```php
nano .env
36- COMPOSE_PROJECT_NAME=myFreela
```

```php
42- PHP_VERSION=8.1
```

```php
470- POSTGRES_VERSION=alpine
471- POSTGRES_CLIENT_VERSION=15
472- POSTGRES_DB= ESCOLHER UM NOME PARA O BANCO
473- POSTGRES_USER= ESCOLHER UM USUARIO
474- POSTGRES_PASSWORD= ESCOLHER UMA SENHA
475- POSTGRES_PORT= ESCOLHER UMA PORTA (A PORTA PADRÃO DO POSTGRES É A 5432)
476- POSTGRES_ENTRYPOINT_INITDB=./postgres/docker-entrypoint-initdb.d
```

**Subir os containers dentro do diretório laradock**

```php
docker-compose up -d nginx postgres
```

**Configurar o arquivo laravel.conf do nginx**

```php
cd nginx/sites
cp laravel.conf.example laravel.conf
nano laravel.conf

18- server_name myFreela.test;
19- root /var/www/myFreela/public;
20- index index.php index.html index.htm;
```

**Incluir essa linha no arquivo hosts do seu pc, se for linux o arquivo se encontra na diretório /etc. Se for windows o caminho é C:\Windows\System32\drivers\etc**

```php
127.0.0.1	myFreela.test
```

**Entrar no projeto pelo docker**

```php
sudo docker exec -it myfreela_workspace_1 bash
cd myFreela
```

**No docker, dentro do diretório do projeto, digitar os comandos**

```php
npm install
composer install
composer require livewire/livewire
composer require laravel/breeze --dev
composer require laravellegends/pt-br-validator
```

**Copiar o arquivo .env.example do projeto laravel**

```php
cp .env.example .env
nano .env
```

**Configurar .env Laravel conexão como banco de dados postgres e setar a forma de armazenar as imagens**

```php
DB_CONNECTION=pgsql
DB_HOST=postgres
DB_PORT= O MESMO QUE FOI CONFIGURADO NO .ENV DO DOCKER
DB_DATABASE= O MESMO QUE FOI CONFIGURADO NO .ENV DO DOCKER
DB_USERNAME= O MESMO QUE FOI CONFIGURADO NO .ENV DO DOCKER
DB_PASSWORD= O MESMO QUE FOI CONFIGURADO NO .ENV DO DOCKER

FILESYSTEM_DISK=public
```

**Dar permissões,gerar key, migrar as tabelas para o banco e criar um link símbolico do diretório /storage para o diretório /public**

```php
chmod -R 777 storage bootstrap/cache
php artisan key:generate
php artisan migrate
php artisan storage:link
```

**Substituir a função ***passes*****

```php
cd vendor/laravellegends/pt-br-validator/src/pt-br-validator/Rules
nano FormatoCep.php

public function passes($attribute, $value)
   {
        return preg_match('/^\d{2}\.?\d{3}\d{3}$/', $value) > 0;
    }
```

**Incluir server no arquivo vite.config.js **

```php
    server: {
        host: "0.0.0.0",
        hmr: {
            host: "localhost",
        },
    }
```

**Ainda dentro do docker, no diretório do projeto, inicie o server**

```php
npm run server
```

**Entre no browser**

```php
http://myfreela.test/
```



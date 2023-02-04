# Running alfasoft Project

### Running Docker

```
docker-compose up -d
```

### Duplicate .ENV.EXAMPLE

Duplique o arquivo .env.example renomeando para .env

### Install Dependencies

```
docker run --rm --interactive --tty  --volume $PWD:/app composer install
```

### Generate Key

```
docker-compose exec alfasoft_app php artisan key:generate
```

### Rodando Migrations

```
docker-compose exec alfasoft_app php artisan migrate --seed
```

### Configuring PostGres

Acesse o projeto em http://localhost

### Configuring Postgres

Acessar PGAdmin

http://localhost:16543

```
user: admin@admin.com.br
password: admin
```

Adicione um novo server

```
host: alfasoft_postgres
port: 5432
user: postgres
password: alfasoft
```

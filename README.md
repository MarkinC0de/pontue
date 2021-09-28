## 💻 Pontue Teste

Uma API que realizar as ações de CRUD voltada para filmes.

É possível configurar o ambiente de desenvolvimento do backend de três formas:
  - [Local](#-local);
  - [Docker](#-usando-docker);
  - [Makefile](#-usando-makefile).

#### 🏡 Local

```shell
cp .env.example .env
```
Opcionalmente você pode editar no `.env` os valores de `DB_HOST`,`DB_PORT`,`DB_DATABASE` , `DB_USERNAME` e `DB_PASSWORD` para definir: host, porta, nome do banco, nome de usuario no banco e a senha do banco.

```shell
composer install
```

```shell
php artisan key:generate
```

```shell
php artisan migrate:fresh
```

Neste ponto já é possível acessar o backend na URL que está configurada no seu ambiente.

---
#### 🐋 Usando Docker


```shell
cp .env.example .env
```
Opcionalmente você pode editar no `.env` os valores de `DB_HOST`,`DB_PORT`,`DB_DATABASE` , `DB_USERNAME` e `DB_PASSWORD` para definir: host, porta, nome do banco, nome de usuario no banco e a senha do banco.

```shell
cp docker-compose.yml.example docker-compose.yml
```
As definições do docker vem por padrão com o dados do banco pré-configurados para o projeto, caso altere os valores não se esqueça de alterar no `.env`.

```shell
docker-compose up -d
```

```shell
docker-compose exec pontue-nginx bash "composer install"
```

```shell
docker-compose exec pontue-nginx bash "php artisan key:generate"
```

```shell
docker-compose exec pontue-nginx bash "php artisan migrate"
```

Neste ponto, caso não tenha sido feita nenhuma modificação nos arquivos de configuração, é possível acessar o backend na URL [http://localhost:8080](http://localhost:8080).

---
#### ⚙ Usando makefile

```shell
make init
```

Opcionalmente você pode editar no `.env` os valores de `DB_HOST`,`DB_PORT`,`DB_DATABASE` , `DB_USERNAME` e `DB_PASSWORD` para definir: host, porta, nome do banco, nome de usuario no banco e a senha do banco.

As definições do docker vem por padrão com o dados do banco pré-configurados para o projeto, caso altere os valores não se esqueça de alterar no `.env`.

### ⚠️ Boa parte dos commits foram feitos pelo nome de usuario *nNetflix3* devida a uma falha na minha atenção *(MarkinC0de)* em não atualizar a conta registrada no terminal.

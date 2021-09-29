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
php artisan migrate
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
docker-compose exec pontue-nginx bash -c "su -c \"composer install\" application"
```

```shell
docker-compose exec pontue-nginx php artisan migrate
```

Neste ponto, caso não tenha sido feita nenhuma modificação nos arquivos de configuração, é possível acessar a pagina inicial do Laravel na URL [http://localhost:8080](http://localhost:8080).

---
#### ⚙ Usando makefile

```shell
make init
```

Opcionalmente você pode editar no `.env` os valores de `DB_HOST`,`DB_PORT`,`DB_DATABASE` , `DB_USERNAME` e `DB_PASSWORD` para definir: host, porta, nome do banco, nome de usuario no banco e a senha do banco.

As definições do docker vem por padrão com o dados do banco pré-configurados para o projeto, caso altere os valores não se esqueça de alterar no `.env`.

## Como realizar testes via Postman
Após executar a requisição de logar no usuário, será retornado este token:

![image](https://user-images.githubusercontent.com/69984666/135175861-77b696bf-8875-47bc-8c8c-fee5b998becd.png)

Copie o token e ao realizar a proxima requisição vai em *Authorization*, após isso vá em*Type* selecione a opção *Bearer Token* e no para finalizar cole o token copiado no campo que aparece a direita.

![image](https://user-images.githubusercontent.com/69984666/135176245-a5fd6400-bb76-4926-9640-d64157942558.png)

Após isso basta informar nas proximas requisições o token seguindo os mesmo passos e podera utilizar normalmente.

<hr>

---
### ⚠️ Obs: Fiz alguns commit com uma conta que não utilizo mais (nNetflix3), mas sou o autor de todos os commits. Apenas esqueci de atualizar a conta registrada no terminal.

# SERVICE-LARAVEL-MN

## Descrição

Este é um projeto de um crud de usuários. Ele foi desenvolvido com PHP, Laravel, Docker e MySQL.

## Requisitos

- Docker

## Como Executar

1. Certifique-se de ter o Docker instalado em sua máquina.
2. Clone este repositório para sua máquina local.
3. Abra um terminal e navegue até o diretório do projeto.
4. Execute o seguinte comando para iniciar a aplicação:

```
docker-compose up --build -d

```

Isso iniciará a aplicação e fará com que ela esteja disponível em `http://localhost:8080/`.

Após a aplicação iniciar será necessário rodar os seguintes comandos no terminal para rodar as migrações e as seeds do banco.

```
docker exec setup-php php artisan migrate
docker exec setup-php php artisan db:seed --class=StateSeeder
docker exec setup-php php artisan db:seed --class=CitySeeder
```

## PRINCIPAIS ROTAS

| Rota              | Método | Descrição                  |
| ----------------- | ------ | -------------------------- |
| /api/user         | GET    | Obtém todos os usuários    |
| /api/user         | POST   | Cria um novo usuário       |
| /api/user/{id}    | GET    | Obtém um usuário por ID    |
| /api/user/{id}    | PUT    | Atualiza um usuário por ID |
| /api/user/{id}    | DELETE | Deleta um usuário por ID   |
| /api/address      | GET    | Obtém todos os endereços   |
| /api/address/{id} | GET    | Obtém um endereço por ID   |
| /api/city         | GET    | Obtém todas as cidades     |
| /api/city/{id}    | GET    | Obtém uma cidade por ID    |
| /api/state        | GET    | Obtém todos os estados     |
| /api/state/{id}   | GET    | Obtém um estado por ID     |

## EXEMPLO DE DADO PARA CRIAÇÃO DE UM USUARIO

```
{
  "name": "john.doe",
  "email": "john.doe@example.com",
  "password": "123456",
  "address": {
		"street": "john doe street",
		"zip_code": "13326111",
		"number": 18,
		"id_city": 1
	}
}
```

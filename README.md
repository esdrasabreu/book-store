# API de Livraria

Uma API para gerenciar uma livraria, permitindo a criação, leitura, atualização e exclusão de livros.

## Pré-requisitos

- PHP 7.4 ou superior
- Composer
- MySQL ou outro banco de dados compatível
- Laravel Framework

## Configuração

1. Clone este repositório para o seu ambiente local.

2. Navegue até a pasta do projeto e execute o seguinte comando para instalar as dependências:

3. Crie um arquivo `.env` na raiz do projeto com base no arquivo `.env.example` fornecido. Defina as configurações de conexão com o banco de dados e outras configurações necessárias.

4. Execute as migrações do banco de dados para criar a tabela de livros:
php artisan migrate

5. Inicie o servidor de desenvolvimento local:

## Rotas da API

- `GET /books`: Retorna todos os livros cadastrados.
- `GET /books/{id}`: Retorna os detalhes de um livro específico pelo seu ID.
- `POST /books`: Cria um novo livro.
- `PUT /books/{id}`: Atualiza um livro existente pelo seu ID.
- `DELETE /books/{id}`: Exclui um livro existente pelo seu ID.


## Autenticação

A autenticação é necessária para acessar as rotas protegidas da API. A autenticação pode ser realizada enviando um token de autenticação válido no cabeçalho `Authorization` da solicitação. 

Para isso precisa cadastrar um usuário : POST /user

Corpo da solicitação:

```json
{
  "name": "Nome do Usuário",
  "email": "email@example.com",
  "password": "senha123"
}

- Para fazer o login do usuário: POST /login
{
  "email": "email@example.com",
  "password": "senha123"
}

- Para fazer o logout do usuário: POST /logout

## Exemplos de Uso

- Para obter todos os livros cadastrados: GET /books
- Para obter os detalhes de um livro específico pelo ID: GET /books/{id}
- Para criar um novo livro: POST /books

Corpo da solicitação:

```json
{
  "Name": "Livro Exemplo",
  "ISBN": 11111111,
  "Value": 19.99
}

- Para atualizar um livro existente:

{
  "Name": "Livro Atualizado",
  "ISBN": 22222222,
  "Value": 20.99
}

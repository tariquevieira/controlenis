## Overview do Código
O codigo está segmentado em diferentes dirtórios para facilitar validação. Por exemplo:
- Rotas em um unico arquivo na pasta de *routes*.
- Configuração de banco de dados na pasta *database*
- Arquivos de configuração e inicialização de sistema estão pasta *config*
- Arquivos publicos e ponto de acesso ao sistema na pasta *public*
- Os codigos frontend estão em *public/pages*.
- Todo código de regra de negócio e tratamento de requisião na pasta *scr*.
- Testes unitários na pasta de *tests*
- Aplicação responderá tanto pelo postman ou insomnia quanto ao frontend
## Requisitos
Para desenvolvimento do projeto foi usado:
- Php 8.2: porta 8004
- mysql 8.0: porta 8006
- docker-compose para criação do ambiente de desenvolvimento.

## Execução
Para executar o programaserá necessário rodar:
- *php -S localhost:8080 -t public/*
- *docker-compose up -d: backend*
- *Direto no navegador para frontend*
  
### Configuração de banco de dados

Toda configuração acesso ao banco de dados deverá ser feito pelo arquivo .env na raíz do projeto.
- A variável de DB_SERVER deve informar qual modulo do banco de dados. Por exemplo: *mysql* para mysql.

### Variáveis de rotas
As rotas de find necessitam passar variavel code na url, como por exemplo:
- http://localhost:8004/user/find?nis=10

### Padrão de request e response
As request de formulário deverão ser no padrão *multipart-form*. As respostas serão no formato json.

#### Teste unitário
Os testes poderão ser executados com:
- ./vendor/bin/phpunit [path] --colors
-  docker-compose run phpunit /application/[path]

### Arquivo de configuração
Arquivo de configuração .env.example contém todas variáveis de ambientes que são serão usadas para mensagens de sistema, configuração de banco de dados e quaisquer outras configurações em que projeto vier necessitar:
- DB_SERVER: define qual banco de dados será usado, por exemplo: mysql e pgsql.
- DB_HOST: endereço ip do servidor de banco de dados, caso seja ambiente local basta usar *localhost*
- DB_DATABASE: nome do banco de dados que será usado.
- DB_USER: nome do usuário.
- DB_PASSWORD: senha do ususário.
- DB_PORT: porta do banco de dados

## Criat a tabela users
CREATE TABLE `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `nis` varchar(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
#### Desenvolvido por:
- Tarique Vieira Ramos
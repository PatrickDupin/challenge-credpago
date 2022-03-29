# Environment settings

Configurações padrão de containers para utilização Laravel 8.

- [x] Container PHP 7.4
    - [x] Laravel 8
- [x] Container MySQL 5.7
- [x] Container NGINX 1.21


## Modo de usar

Após baixar o projeto, verificar os arquivos `docker-compose.yml` e `Dockerfile`, e realizar as adequações necessárias e assim que terminar, seguir os seguintes passos:

* Executar o comando `docker-composer up -d` para subir os containers;
* Executar o container PHP por meio do comando `docker exec -it php bash`
* Acessar a pasta do projeto em Laravel `cd /application`
* Criar uma cópia do arquivo `.env.example` com o nome de `.env` e alterar as variáveis de ambiente para conexão do banco de dados
* Baixar todas as dependências do Laravel, executar o comando `composer install`
* Executar o comando `php artisan key:generate`, para gerar a chave de segurança
* Na barra de endereço do seu navegador, digite `localhost:8000`

Deve ser exibida a tela inicial do projeto Laravel.

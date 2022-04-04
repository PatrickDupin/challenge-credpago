## Como instalar o projeto

* Clonar o projeto, com o comando `https://github.com/PatrickDupin/challenge-credpago.git`;
* Criar uma cópia do arquivo `.env.example` com o nome de `.env` e alterar as variáveis de ambiente abaixo para realisar a conexão do banco de dados;
  - **DB_HOST**     = *informe seu host de acesso ao banco. Por exempo: localhost*
  - **DB_DATABASE** = *informe o nome para o banco de dados da aplicação. Por exemplo: credpago_db*
  - **DB_USERNAME** = *informe o nome de usuário administrador do banco de dados. Por exmeplo: root*
  - **DB_PASSWORD** = *informe a senha do usuario administrador do banco de dados. Por exemplo: 1234*
* Após realizar estas configurações, execute os seguinte comandos no terminal de seu sistema operacional:
  - `compose install` para instalar todas as dependências do projeto;
  - `php artisan key:generate`, para gerar a chave de segurança; 
  - `php artisan migrate` para rodar as migrations do projeto e gerar todas as tabelas necessárias;
  - `php artisan serve` para subir o servidor PHP
* Digite a url da aplicação na barra de endereço do seu navegador. Por exemplo `localhost:8000`

A página inicial do projeto Laravel. Para acessar a aplicação desenvolvida, acesse `localhost:8000/inicio`

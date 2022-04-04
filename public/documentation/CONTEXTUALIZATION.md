## Contextualização:
A Empresa XPTO faz o rastreamento de status de websites.

Seus clientes podem acessar a esta aplicação web para cadastrar as URLs que desejam rastrear.

Ao cadastrar uma nova URL o cliente apenas recebe uma confirmação de que a URL foi cadastrada com sucesso, além de poder visualizá-la na sua lista de URLs cadastradas.

A cada 1 minuto, o robô desta aplicação (que nada mais é do que um script executado de forma agendada através de cron ou job), irá consultar todas as URLs cadastradas.

O robô irá armazenar o código de status HTTP e o corpo da resposta, de forma que o cliente saiba quando sua URL foi acessada, qual foi o status code retornado, bem como ter a possibilidade de visualizar o corpo do HTML retornado.

Deve ser exibida a tela inicial do projeto Laravel.

[< Inicio](README.md)

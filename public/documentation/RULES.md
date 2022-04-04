## Regras:
* Somente usuários cadastrados e autenticados podem cadastrar URLs e visualizar o resultado das URLs previamente cadastradas;
* O formulário de cadastro de URL deve ter uma validação simples, para que a string informada no campo tenha o formato de uma URL;
* O painel de visualização das URLs deve ter um mecanismo de refresh (estilo ajax sem recarregar a página toda) para acompanhar atualizações de status das URLs;
* O candidato pode implementar da maneira que julgar necessário um agendador que dispare a cada 1 minuto o comando para verificar URLs cadastradas através de uma cron/crontab, job, Laravel Queues, Amazon SQS, RabbitMQ, ou outro agendador que preferir;

[< Inicio](../../README.md)

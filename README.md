<h3>Teste Netshow.me</h3>

A página foi criada utilizando PHP, Laravel, Bootstrap , JQuery e SASS

- Após clonar o repositório é necessário primeiramente rodar o comando "composer install" no diretório base (No linux pode ser necessário rodar o comando com sudo).

- Criar uma cópia do arquivo ".env.example" e renomea-lo para ".env".

- Utilizar na pasta base o comando "php artisan key:generate" e "php artisan storage:link" pra criar link simbolico na pasta public para deste modo acessar os arquivos enviados pelo formulario.

- Acessar a pasta "resources" e utilizar dentro dela o comando "npm install" e depois "npm run dev".

Utilizando um banco de dados MySQL(MariaDB)

- Necessário criar um banco de dados com o nome "netshowmetest".

- Na pasta base, utilizar o comando "php artisan migrate" para criar tabela utilizada pela aplicação (No linux pode ser necessário rodar o comando com sudo).

- Para os dados do formulários serem enviados via e-mail é necessário configurar um servidor smtp e ajustar as variaveis 'MAIL_FROM_ADDRESS' e 'MAIL_TO_ADDRESS' com o email em que se deseja fazer o envio e receber os dados do contato.

Testes com PHPUnit se encontram na pasta "tests/Feature"

- Para rodar os testes escritos, é só utilizar "php artisan test" na pasta base
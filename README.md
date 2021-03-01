<h3>Teste Netshow.me</h3>

A página foi criada utilizando PHP, Laravel, Bootstrap , JQuery e SASS

<pre>
# Clone o repositório
git clone https://github.com/yagogomesc/netshowme-test.git

# Instale as dependencias do composer
composer install

Faça uma cópia do ".env.example" e renomeie para ".env"

# Gere a chave do laravel e crie o link simbolico para o storage
php artisan key:generate
php artisan storage:link

# Na pasta "/resources" utilize o npm para instalar dependencias e compilar os assets do front-end
npm install
npm run dev
</pre>

Utilizando um banco de dados MySQL(MariaDB)

- Necessário criar um banco de dados com o nome "netshowmetest".

<pre>
    # Após criar o banco de dados, use na pasta base do projeto
    php artisan migrate
</pre>

- Para os dados do formulários serem enviados via e-mail é necessário configurar um servidor smtp e ajustar as variaveis 'MAIL_FROM_ADDRESS' e 'MAIL_TO_ADDRESS' com o email em que se deseja fazer o envio e receber os dados do contato.

Testes com PHPUnit se encontram na pasta "tests/Feature"

<pre>
#Para rodar os testes escritos utilize
php artisan test
</pre>

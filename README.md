<h3>Teste Netshow.me</h3>


- Após clonar o repositório é necessário primeiramente rodar o comando "composer install" no diretório base (No linux pode ser necessário rodar o comando com sudo).

- Criar uma cópia do arquivo ".env.example" e renomea-lo para ".env".

- Utilizar na pasta base o comando "php artisan key:generate".

- Acessar a pasta "resources" e utilizar o comando "npm install" e depois "npm run dev".

Utilizando um banco de dados MySQL(MariaDB)

- Necessário criar um banco de dados com o nome "netshowmetest".

- Na pasta base, utilizar o comando "php artisan migrate" (No linux pode ser necessário rodar o comando com sudo).
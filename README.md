# mvc-backend-test

Essa aplicação foi desenvolvida para um teste de backend, no qual o objetivo da aplicação é realizar CRUDs em um banco de dados relacional mapeado pelo ORM Doctrine (PHP), obedecendo aos requisitos específicos do teste.

# Rodando localmente

A aplicação foi desenvolvida utilizando PHP puro no backend, com a ferramenta ORM, e HTML/Bootstrap (CSS) no frontend, com o Composer para gerenciar dependências.
O webserver utilizado foi o XAMPP, portanto é necessário tê-lo instalado em sua máquina: https://www.apachefriends.org/download.html

Ao inicializar o XAMPP, ative o servidor Apache e o MySQL.
Em seguida, crie um banco de dados no localhost/phpmyadmin chamado magazord-test

Além disso, garanta que o Composer esteja instalado em sua máquina: https://getcomposer.org/download/
Uma vez que o webserver está funcionando, clone o repositório no caminho "SeuDiretório(C:/)/xampp/htdocs, criando uma pasta chamada 'mvc'.

Em seguida, abra um terminal no caminho da pasta, digite o comando "composer install", e todas as dependências serão instaladas.
Após, garanta que o banco de dados esteja funcionando rodando um comando "php .\bin\doctrine.php orm:schema-tool:create".

E a aplicação estará configurada localmente.

<?php

require __DIR__ . '/vendor/autoload.php';

use \App\Http\Router;
use \App\Utils\View;

define('URL', 'http://localhost/mvc');

// Define o valor padrao das variaveis
View::init([
    'URL' => URL
]);

//  Inicia o roteador (Router)
$obRouter = new Router(URL);

// Inclui as rotas de paginas (routes/pages.php)
include __DIR__ . '/routes/pages.php';

// Imprime o response da rota
$obRouter->run()->sendResponse();

<?php

use \App\Http\Response;
use \App\Controller\Pages;

// Rota para home
$obRouter->get('/', [
    function()
    {
        return new Response(200,Pages\Home::getHome());
    }
]);

// Rota para pessoas
$obRouter->get('/pessoas', [
    function()
    {
        return new Response(200,Pages\Pessoas::getPessoas());
    }
]);

// Rota para pessoa buscada
$obRouter->get('/pessoas/{idPessoa}', [
    function($idPessoa)
    {
        return new Response(200,'Pessoa '.$idPessoa);
    }
]);

// Rota para contatos
$obRouter->get('/contatos', [
    function()
    {
        return new Response(200,Pages\Home::getHome());
    }
]);

// Rota para contato buscado
$obRouter->get('/contatos/{idContato}', [
    function($idContato)
    {
        return new Response(200,'Contato '.$idContato);
    }
]);
<?php

use \App\Http\Response;
use \App\Controller\Pages;

// Rota para home
$obRouter->get('/', [
    function () {
        return new Response(200, Pages\Home::getHome());
    }
]);

// Rota para pessoas
$obRouter->get('/pessoas', [
    function () {
        return new Response(200, Pages\Pessoas::getPessoas());
    }
]);

// Rota para pessoa buscada
$obRouter->post('/pessoas/{idPessoa}', [
    function ($idPessoa) {
        return new Response(200, 'Pessoa ' . $idPessoa);
    }
]);

// Rota para pagina de criar uma pessoa
$obRouter->get('/criar-pessoas', [
    function () {
        return new Response(200, Pages\CriarPessoas::getCriarPessoas());
    }
]);

// Rota para submit de criar uma pessoa
$obRouter->post('/criar-pessoas', [
    function () {
        $data = $_POST ?? null;
        // $cpf = $_POST['CPF'] ?? null;
        // var_dump($data);
        if ($data) {
            return new Response(200, Pages\CriarPessoas::criarPessoa($data));
        } else {
            echo 'Campos obrigatórios não foram preenchidos';
        }
    }
]);

// Rota para contatos
$obRouter->get('/contatos', [
    function () {
        return new Response(200, Pages\Contatos::getContatos());
    }
]);

// Rota para pagina de criar um contato
$obRouter->get('/criar-contatos', [
    function () {
        return new Response(200, Pages\CriarContatos::getCriarContatos());
    }
]);

// Rota para submit e criar um contato
$obRouter->post('/criar-contatos', [
    function () {
        $data = $_POST ?? null;
        // $cpf = $_POST['CPF'] ?? null;
        // var_dump($data);
        if ($data) {
            return new Response(200, Pages\CriarContatos::criarContato($data));
        } else {
            echo 'Campos obrigatórios não foram preenchidos';
        }
    }
]);

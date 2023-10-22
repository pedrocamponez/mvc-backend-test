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
        if ($data) {
            return new Response(200, Pages\CriarPessoas::criarPessoa($data));
        } else {
            echo 'Campos obrigatórios não foram preenchidos';
        }
    }
]);

// Rota para editar uma pessoa
$obRouter->get('/editar-pessoa/{id}', [
    function ($id) {
        return new Response(200, Pages\CriarPessoas::getCriarPessoas($id));
    }
]);

// Rota para atualizar uma pessoa
$obRouter->post('/editar-pessoa/{id}', [
    function ($id) {
        $data = $_POST ?? null;
        if ($data) {
            return new Response(200, Pages\Pessoas::atualizarPessoa($id, $data));
        } else {
            echo 'Campos obrigatórios não foram preenchidos';
        }
    }
]);

// Rota para deletar uma pessoa
$obRouter->post('/deletar-pessoa/{id}', [
    function ($id) {
        return new Response(200, Pages\Pessoas::deletarPessoa($id));
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
        if ($data) {
            return new Response(200, Pages\CriarContatos::criarContato($data));
        } else {
            echo 'Campos obrigatórios não foram preenchidos';
        }
    }
]);

// Rota para editar um contato
$obRouter->get('/editar-contato/{id}', [
    function ($id) {
        return new Response(200, Pages\CriarContatos::getCriarContatos($id));
    }
]);

// Rota para atualizar um contato
$obRouter->post('/editar-contato/{id}', [
    function ($id) {
        $data = $_POST ?? null;
        if ($data) {
            return new Response(200, Pages\Contatos::atualizarContato($id, $data));
        } else {
            echo 'Campos obrigatórios não foram preenchidos';
        }
    }
]);

// Rota para deletar um contato
$obRouter->post('/deletar-contato/{id}', [
    function ($id) {
        return new Response(200, Pages\Contatos::deletarContato($id));
    }
]);
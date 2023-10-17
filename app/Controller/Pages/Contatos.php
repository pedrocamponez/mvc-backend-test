<?php

namespace App\Controller\Pages;

use \App\Utils\View;
use \App\Entity\Pessoa;

class Contatos extends Page
{

    /**
     * Metodo responsavel por retornar o conteudo da view de Contatos
     * @return string
     */
    public static function getContatos()
    {
        $obPessoa = new Pessoa('Pedro Camponez', '09211233322');

        $content = View::render('Pages/contatos', [
            'name' => $obPessoa->nome,
            'cpf' => $obPessoa->cpf
        ]);

        return parent::getPage('Contatos - Magazord Backend', $content);
    }
}

<?php

namespace App\Controller\Pages;

use \App\Utils\View;
use \App\Entity\Pessoa;

class CriarPessoas extends Page
{

    /**
     * Metodo responsavel por retornar o conteudo da view de Contatos
     * @return string
     */
    public static function getCriarPessoas()
    {
        $obPessoa = new Pessoa('Pedro Camponez', '09211233322');

        $content = View::render('Pages/criar-pessoas', []);

        return parent::getPage('Criar uma pessoa - Magazord Backend', $content);
    }
}

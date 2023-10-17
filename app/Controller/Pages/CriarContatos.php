<?php

namespace App\Controller\Pages;

use \App\Utils\View;
use \App\Entity\Pessoa;

class CriarContatos extends Page
{

    /**
     * Metodo responsavel por retornar o conteudo da view de Contatos
     * @return string
     */
    public static function getCriarContatos()
    {
        $obPessoa = new Pessoa('Pedro Camponez', '09211233322');

        $content = View::render('Pages/criar-contatos', []);

        return parent::getPage('Criar um contato - Magazord Backend', $content);
    }
}

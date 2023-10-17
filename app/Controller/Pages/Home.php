<?php

namespace App\Controller\Pages;

use \App\Utils\View;
use \App\Entity\Pessoa;

class Home extends Page
{

    /**
     * Metodo responsavel por retornar o conteudo da view na Homepage
     * @return string
     */
    public static function getHome()
    {
        $obPessoa = new Pessoa('Pedro Camponez', '09211233322');

        $content = View::render('Pages/home', [
            'name' => $obPessoa->nome,
            'cpf' => $obPessoa->cpf
        ]);

        return parent::getPage('Magazord Backend', $content);
    }
}

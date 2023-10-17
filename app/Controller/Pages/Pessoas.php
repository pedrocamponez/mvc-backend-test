<?php

namespace App\Controller\Pages;

use \App\Utils\View;
use \App\Entity\Pessoa;

class Pessoas extends Page
{

    /**
     * Metodo responsavel por retornar o conteudo da view na Homepage
     * @return string
     */
    public static function getPessoas()
    {
        $obPessoa = new Pessoa('Carolina Burni', 'xdxdxdxd');;

        $content = View::render('Pages/pessoas', [
            'name' => $obPessoa->nome,
            'cpf' => $obPessoa->cpf
        ]);

        return parent::getPage('Pessoas - Magazord Backend', $content);
    }
}

<?php

namespace App\Controller\Pages;

use \App\Utils\View;
use \App\Model\Entity\Organization;

class Pessoas extends Page
{

    /**
     * Metodo responsavel por retornar o conteudo da view na Homepage
     * @return string
     */
    public static function getPessoas()
    {
        $obOrganization = new Organization;

        $content = View::render('Pages/pessoas', [
            'name' => $obOrganization->name,
            'cpf' => $obOrganization->cpf
        ]);

        return parent::getPage('Pessoas - Magazord Backend', $content);
    }
}

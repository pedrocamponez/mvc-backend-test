<?php

namespace App\Controller\Pages;

use \App\Utils\View;
use \App\Model\Entity\Organization;

class Home extends Page
{

    /**
     * Metodo responsavel por retornar o conteudo da view na Homepage
     * @return string
     */
    public static function getHome()
    {
        $obOrganization = new Organization;

        $content = View::render('Pages/home', [
            'name' => $obOrganization->name,
            'cpf' => $obOrganization->cpf
        ]);

        return parent::getPage('Magazord Backend', $content);
    }
}

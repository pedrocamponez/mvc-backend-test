<?php

namespace App\Controller\Pages;

use \App\Utils\View;
use \App\Model\Entity\Organization;

class Contatos extends Page
{

    /**
     * Metodo responsavel por retornar o conteudo da view de Contatos
     * @return string
     */
    public static function getContatos()
    {
        $obOrganization = new Organization;

        $content = View::render('Pages/contatos', []);

        return parent::getPage('Contatos - Magazord Backend', $content);
    }
}

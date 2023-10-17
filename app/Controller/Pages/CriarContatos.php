<?php

namespace App\Controller\Pages;

use \App\Utils\View;
use \App\Model\Entity\Organization;

class CriarContatos extends Page
{

    /**
     * Metodo responsavel por retornar o conteudo da view de Contatos
     * @return string
     */
    public static function getCriarContatos()
    {
        $obOrganization = new Organization;

        $content = View::render('Pages/criar-contatos', []);

        return parent::getPage('Criar um contato - Magazord Backend', $content);
    }
}

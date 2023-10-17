<?php

namespace App\Controller\Pages;

use \App\Utils\View;
use \App\Model\Entity\Organization;

class CriarPessoas extends Page
{

    /**
     * Metodo responsavel por retornar o conteudo da view de Contatos
     * @return string
     */
    public static function getCriarPessoas()
    {
        $obOrganization = new Organization;

        $content = View::render('Pages/criar-pessoas', []);

        return parent::getPage('Criar uma pessoa - Magazord Backend', $content);
    }
}

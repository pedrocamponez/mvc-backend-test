<?php

namespace App\Controller\Pages;

use \App\Utils\View;
use \App\Entity\Pessoa;
use App\Helper as HelperAlias;
use App\Model\ContatoModel;

class Contatos extends Page
{

    /**
     * Metodo responsavel por retornar o conteudo da view de Contatos
     * @return string
     */
    public static function getContatosHtml()
    {

        $contatos = '';
        $entityManager = HelperAlias\EntityManagerCreator::createEntityManager();
        
        // Get the list of pessoas from the database
        $contatoModel = new ContatoModel($entityManager);
        $contatosData = $contatoModel->getContatos();
    
        foreach ($contatosData as $contato) {

            $tipoContato = $contato->getTipo() ? 'Telefone' : 'E-mail';

            $contatos .= View::render('Pages/single/single-contato', [
                'nome' => $contato->getNome(),
                'descricao' => $contato->getDescricao(),
                'tipo' => $tipoContato
            ]);
        }
    
        return $contatos;
    }    

    public static function getContatos()
    {
        $contatosHtml = self::getContatosHtml();
        
        $content = View::render('Pages/contatos', [
            'contatos' => $contatosHtml
        ]);

        return parent::getPage('Contatos - Magazord Backend', $content);
    }
}

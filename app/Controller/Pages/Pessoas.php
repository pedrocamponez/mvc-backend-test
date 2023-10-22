<?php

namespace App\Controller\Pages;

use \App\Utils\View;
use \App\Model\PessoaModel;
use App\Helper as HelperAlias;
use App\Entity\Pessoa;

class Pessoas extends Page
{

    private $pessoaModel;

    public function __construct(PessoaModel $pessoaModel)
    {
        $this->pessoaModel = $pessoaModel;
    }

    public static function getPessoasHtml()
    {

        $pessoas = '';
        $entityManager = HelperAlias\EntityManagerCreator::createEntityManager();
        
        // Get the list of pessoas from the database
        $pessoaModel = new PessoaModel($entityManager);
        $pessoasData = $pessoaModel->getPessoas();
    
        foreach ($pessoasData as $pessoa) {
            $pessoas .= View::render('Pages/single/single-pessoa', [
                'nome' => $pessoa->getNome(),
                'cpf' => $pessoa->getCpf()
            ]);
        }
    
        return $pessoas;
    }    

    public static function getPessoas()
    {
        $pessoasHtml = self::getPessoasHtml();
        
        $content = View::render('Pages/pessoas', [
            'pessoas' => $pessoasHtml
        ]);

        return parent::getPage('Pessoas - Magazord Backend', $content);
    }

}

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

    // public function getPessoas()
    // {
    //     $obPessoa = new Pessoa('Carolina Burni', 'xdxdxdxd');;

    //     $content = View::render('Pages/pessoas', [
    //         'name' => $obPessoa->nome,
    //         'cpf' => $obPessoa->cpf
    //     ]);

    //     return parent::getPage('Pessoas - Magazord Backend', $content);
    // }
    public static function getPessoas()
    {
        
        $content = View::render('Pages/pessoas', [
            // 'pessoas' => $pessoasData
        ]);

        return parent::getPage('Pessoas - Magazord Backend', $content);
    }

}

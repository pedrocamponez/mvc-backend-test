<?php

namespace App\Controller\Pages;

use \App\Utils\View;
use App\Model\CriarContatoModel;
use App\Helper as HelperAlias;
use App\Http\Response;
use App\Entity\Contato;

class CriarContatos extends Page
{
    private $contatoModel;

    public function __construct(CriarContatoModel $contatoModel)
    {
        $this->contatoModel = $contatoModel;
    }
    
    /**
     * Metodo responsavel por retornar o conteudo da view de Contatos
     * @return string
     */
    public static function getCriarContatos()
    {

        $content = View::render('Pages/criar-contatos', []);

        return parent::getPage('Criar um contato - Magazord Backend', $content);
    }

    public static function criarContato($data) 
    {
        $nome = $data['nome'];
        $nomePessoaAtrelada = $data['pessoa-atrelada'];
        $descricao = $data['descricao-contato'];
        $tipo = $data['tipo-contato'];

        $entityManager = HelperAlias\EntityManagerCreator::createEntityManager();

        $model = new CriarContatoModel($entityManager);
        $contato = $model->criarContato($nome, $descricao, $tipo);

        // $contato->setPessoa($nomePessoaAtrelada);
        
        return new Response(200, 'Contato criado com sucesso!');
    }
}

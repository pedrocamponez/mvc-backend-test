<?php
namespace App\Controller\Pages;

use App\Model\CriarPessoaModel;
use App\Http\Response;
use App\Utils\View;

class CriarPessoas extends Page
{
    private $pessoaModel;

    public function __construct(CriarPessoaModel $pessoaModel)
    {
        $this->pessoaModel = $pessoaModel;
    }

    /**
     * Metodo responsavel por retornar o conteudo da view de Contatos
     * @return string
     */
    public static function getCriarPessoas()
    {
        $content = View::render('Pages/criar-pessoas', []);

        return parent::getPage('Criar uma pessoa - Magazord Backend', $content);
    }

    public function criarPessoa($data)
    {
        $nome = $data['nome'];
        $cpf = $data['CPF'];

        $pessoa = $this->pessoaModel->criarPessoa($nome, $cpf);
        
        return new Response(200, 'Pessoa criada com sucesso!');
    }
}


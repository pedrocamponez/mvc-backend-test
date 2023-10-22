<?php

namespace App\Model;

use App\Entity\Pessoa;
use Doctrine\ORM\EntityManagerInterface;

class PessoaModel
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function getPessoas()
    {
        return $this->entityManager->getRepository(Pessoa::class)->findAll();
    }

    public function getPessoaById($id)
    {
        return $this->entityManager->getRepository(Pessoa::class)->find($id);
    }

    public function atualizarPessoa($id, $data)
    {
        $pessoaASerAlterada = $this->getPessoaById($id);
        $nomePessoa = $data['nome'];
        $cpfPessoa = $data['cpf'];

        $pessoaASerAlterada->nome = $nomePessoa;
        $pessoaASerAlterada->cpf = $cpfPessoa;

        $this->entityManager->flush();
    }

    public function deletePessoa($id)
    {
        $pessoaASerDeletada = $this->getPessoaById($id);

        $this->entityManager->remove($pessoaASerDeletada);
        $this->entityManager->flush();
        // Use $this->entityManager->remove() to remove the entity and $this->entityManager->flush() to persist changes
    }

}

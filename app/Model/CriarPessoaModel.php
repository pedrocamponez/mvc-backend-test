<?php
namespace App\Model;

use App\Entity\Pessoa;
use Doctrine\ORM\EntityManagerInterface;

class CriarPessoaModel
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function criarPessoa($nome, $cpf)
    {
        $pessoa = new Pessoa($nome, $cpf);

        $this->entityManager->persist($pessoa);
        $this->entityManager->flush();

        return $pessoa;
    }
}

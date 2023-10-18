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

    public function criarPessoa($data)
    {
        $nome = $data[0];
        $cpf = $data[1];
        $pessoa = new Pessoa($nome, $cpf);

        $this->entityManager->persist($pessoa);
        $this->entityManager->flush();

        return $pessoa;
    }
}

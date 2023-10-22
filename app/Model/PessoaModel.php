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
}

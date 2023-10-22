<?php

namespace App\Model;

use App\Entity\Contato;
use Doctrine\ORM\EntityManagerInterface;

class ContatoModel
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function getContatos()
    {
        return $this->entityManager->getRepository(Contato::class)->findAll();
    }
}

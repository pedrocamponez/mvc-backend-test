<?php
namespace App\Model;

use App\Entity\Contato;
use Doctrine\ORM\EntityManagerInterface;

class CriarContatoModel
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function criarContato($nome, $descricao, $tipo)
    {
        $contato = new Contato($nome, $descricao, $tipo);

        $this->entityManager->persist($contato);
        $this->entityManager->flush();

        return $contato;
    }
}

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

    public function getContatoById($id)
    {
        return $this->entityManager->getRepository(Contato::class)->find($id);
    }

    public function atualizarContato($id, $data)
    {
        $contatoASerAlterado = $this->getContatoById($id);
        $nomeContato = $data['nome'];
        $descricaoContato = $data['descricao'];
        $tipoContato = $data['tipo'];

        $contatoASerAlterado->nome = $nomeContato;
        $contatoASerAlterado->descricao = $descricaoContato;
        $contatoASerAlterado->tipo = $tipoContato;

        $this->entityManager->flush();
    }

    public function deleteContato($id)
    {
        $contatoASerDeletado = $this->getContatoById($id);
        
        $this->entityManager->remove($contatoASerDeletado);
        $this->entityManager->flush();
    }
}

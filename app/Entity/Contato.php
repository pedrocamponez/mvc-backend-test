<?php

namespace App\Entity;

use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\ManyToOne;

#[Entity]
class Contato
{
    #[Id, GeneratedValue, Column]
    public int $id;

    #[ManyToOne(targetEntity: Pessoa::class, inversedBy: 'pessoa')]
    public Pessoa $pessoa;

    public function __construct(
        #[Column]
        public string $nome,
        #[Column]
        public string $descricao,
        #[Column]
        public string $tipo
    ) {
    }

    public function setPessoa(Pessoa $pessoa): void
    {
        $this->pessoa = $pessoa;
    }
}

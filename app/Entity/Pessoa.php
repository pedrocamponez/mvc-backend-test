<?php

namespace App\Entity;

use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Id;

#[Entity]
class Pessoa
{
    #[Id]
    #[GeneratedValue]
    #[Column]
    public readonly int $id;

    public function __construct(
        #[Column]
        public readonly string $nome,
        #[Column]
        public readonly string $cpf
    ) {
    }
}

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

    public function getNome(): string
    {
        return $this->nome;
    }
    
    public function setNome($nome) 
    {
        $this->nome = $nome;    
    }
    
    public function setDescricao($descricao) 
    {
        $this->descricao = $descricao;    
    }

    public function getDescricao(): string
    {
        return $this->descricao;
    }

    public function setTipo($tipo) 
    {
        $this->tipo = $tipo;    
    }

    public function getTipo(): string
    {
        return $this->tipo;
    }
}

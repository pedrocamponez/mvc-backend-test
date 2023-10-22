<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\OneToMany;

#[Entity]
class Pessoa
{
    #[Id, GeneratedValue, Column]
    public int $id;

    #[OneToMany(
        mappedBy: 'contato', 
        targetEntity: Contato::class, 
        cascade: ["persist", "remove"]
        )]

    public Collection $contatos;

    public function __construct(
        #[Column]
        public string $nome,
        #[Column]
        public string $cpf
    ) {
        $this->contatos = new ArrayCollection();
    }

    public function adicionarContato(Contato $contato)
    {
        $this->contatos->add($contato);
        $contato->setPessoa($this);
    }

    /**
     * @return Collection<Contato>
     */
    public function mostrarContatos(): Collection
    {
        return $this->contatos;
    }

    public function getNome(): string
    {
        return $this->nome;
    }
    
    public function setNome($nome) 
    {
        $this->nome = $nome;    
    }
    
    public function setCpf($cpf) 
    {
        $this->cpf = $cpf;    
    }

    public function getCpf(): string
    {
        return $this->cpf;
    }
}

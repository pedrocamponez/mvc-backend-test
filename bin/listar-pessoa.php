<?php

use App\Helper\EntityManagerCreator;
use App\Entity\Pessoa;
use App\Entity\Contato;

require_once __DIR__ . '/../vendor/autoload.php';

$entityManager = EntityManagerCreator::createEntityManager();
$pessoaRepository = $entityManager->getRepository(Pessoa::class);

/**
 * Array de Pessoa que retorna todas as pessoas da tabela
 * @var Pessoa[] $pessoaLista
 */
$pessoaLista = $pessoaRepository->findAll();

foreach ($pessoaLista as $pessoa) {
    echo "ID: $pessoa->id\nNome: $pessoa->nome\nCPF: $pessoa->cpf\n\n";
    echo "Contatos:\n";

    echo implode(', ', $pessoa->mostrarContatos()->map(fn (Contato $contato) => $contato->nome)->toArray());
}

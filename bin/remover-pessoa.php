<?php

use App\Helper\EntityManagerCreator;
use App\Entity\Pessoa;

require_once __DIR__ . '/../vendor/autoload.php';

$entityManager = EntityManagerCreator::createEntityManager();
// $pessoaRepository = $entityManager->getRepository(Pessoa::class);

// $pessoa = $pessoaRepository->find(2);

$idASerRemovido = 1;
$pessoa = $entityManager->find(Pessoa::class, $idASerRemovido);

$entityManager->remove($pessoa);
$entityManager->flush();
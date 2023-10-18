<?php

use App\Helper\EntityManagerCreator;
use App\Entity\Pessoa;
use App\Entity\Contato;

require_once __DIR__ . '/../vendor/autoload.php';

$entityManager = EntityManagerCreator::createEntityManager();
$pessoaRepository = $entityManager->getRepository(Pessoa::class);

$pessoa = $pessoaRepository->find(1);
$pessoa->nome = 'Pedro Camponezzz';
$pessoa->cpf = '12345612399';
$novoContato = new Contato('Carolina', '3199999999', '1');
$entityManager->persist($novoContato);

$pessoa->adicionarContato($novoContato);

// pelo repository->find() ela ja esta sendo observada, entao nao precisamos do persist
$entityManager->flush();
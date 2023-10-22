<?php

use App\Entity\Contato;
use App\Helper\EntityManagerCreator;
use App\Entity\Pessoa;

require_once __DIR__ . '/../vendor/autoload.php';

$entityManager = EntityManagerCreator::createEntityManager();

$pessoa = new Pessoa('Pedro Camponez', '12345678910');

$pessoa = new Pessoa('Pedro Teste', '12345678910');

$pessoa->adicionarContato(new Contato('Carolina', '3199999999', '1'));

$entityManager->persist($pessoa);
$entityManager->flush();
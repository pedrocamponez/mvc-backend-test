<?php

require_once 'vendor/autoload.php';

use \App\Helper\EntityManagerCreator;

$entityManager = EntityManagerCreator::createEntityManager();

var_dump($entityManager);

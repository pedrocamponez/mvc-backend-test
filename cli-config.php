<?php
use Doctrine\ORM\Tools\Console\ConsoleRunner;
use App\Helper\EntityManagerCreator;

require_once 'vendor/autoload.php';

$entityManager = EntityManagerCreator::createEntityManager();

return ConsoleRunner::createHelperSet($entityManager);

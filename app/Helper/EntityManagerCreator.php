<?php

namespace App\Helper;

use Doctrine\DBAL\DriverManager;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\ORMSetup;

require_once "vendor/autoload.php";

class EntityManagerCreator
{
    public static function createEntityManager(): EntityManager
    {
        $config = ORMSetup::createAttributeMetadataConfiguration(
            paths: array(__DIR__ . "/src"),
            isDevMode: true,
        );

        $connection = DriverManager::getConnection([
            'dbname'   => 'magazord-test',
            'user'     => 'magazord_username',
            'password' => 'magazord_password', // Ou vazio
            'host'     => 'localhost',
            'driver'   => 'pdo_mysql',
            'path' => __DIR__ . '/db',
        ], $config);

        $entityManager = new EntityManager($connection, $config);

        return $entityManager;
    }
}

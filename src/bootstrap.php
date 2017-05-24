<?php
use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;

$isDevMode = true;
$config = Setup::createAnnotationMetadataConfiguration(array(__DIR__."/Story/Model"), $isDevMode);

$conn = array(
	'dbname' => 'test_db',
    'user' => 'dimas',
    'password' => 'dimas',
    'host' => 'localhost',
    'driver' => 'pdo_mysql',
);
// obtaining the entity manager
$entityManager = EntityManager::create($conn, $config);

try {
	$entityManager->getConnection()->connect();
} catch (\Exception $e) {
	echo $e->getMessage();
}


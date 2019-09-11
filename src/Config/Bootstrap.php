<?php
namespace mvc\Config;
// Bootstrap.php
use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;

class Bootstrap
{
	
	public function getEntityManager()
	{
		// Create a simple "default" Doctrine ORM configuration for Annotations
		$isDevMode = true;
		$config = Setup::createAnnotationMetadataConfiguration(array(__DIR__."/Models"), $isDevMode);

		// database configuration parameters
		$conn = array(
			'driver'   => 'pdo_mysql',
			'user'     => 'root',
			'password' => '',
			'dbname'   => 'mvc',
		);
		$config->addEntityNamespace('', 'src\Models');
		// obtaining the entity manager
		return $entityManager = EntityManager::create($conn, $config);
	}
}

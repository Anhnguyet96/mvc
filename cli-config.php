<?php
// cli-config.php
use mvc\Config\Bootstrap;

$helperSet = new \Symfony\Component\Console\Helper\HelperSet(array(
    'em' => new \Doctrine\ORM\Tools\Console\Helper\EntityManagerHelper(Bootstrap::getEntityManager())
));
return $helperSet;
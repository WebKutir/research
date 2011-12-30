<?php
define("APPPATH",dirname(__FILE__)."/../");

use Doctrine\ORM\EntityManager,
  Doctrine\ORM\Configuration,
  Doctrine\Common\Cache\ArrayCache;

require_once APPPATH.'/orm/Doctrine/Common/ClassLoader.php';

$classLoader = new \Doctrine\Common\ClassLoader('Doctrine\Common', realpath(__DIR__ ));
$classLoader->register();
$classLoader = new \Doctrine\Common\ClassLoader('Doctrine\ORM', realpath(__DIR__ ));
$classLoader->register();
$classLoader = new \Doctrine\Common\ClassLoader('Doctrine\DBAL', realpath(__DIR__ ));
$classLoader->register();

    $applicationMode = "development";

    if ($applicationMode == "development") {
      $cache = new Doctrine\Common\Cache\ArrayCache;
    } else {
      $cache = new Doctrine\Common\Cache\ApcCache;
    }

    $config = new Configuration;
    $config->setMetadataCacheImpl($cache);
    $driverImpl = $config->newDefaultAnnotationDriver(APPPATH.'/entity');
    $config->setMetadataDriverImpl($driverImpl);
    $config->setQueryCacheImpl($cache);
    $config->setProxyDir(APPPATH.'/proxy');
    $config->setProxyNamespace('Test\Proxies');

    if ($applicationMode == "development") {
      $config->setAutoGenerateProxyClasses(true);
    } else {
      $config->setAutoGenerateProxyClasses(false);
    }

    //DB connection config
    include(APPPATH.'/orm/dbconfig.php');

    $em = \Doctrine\ORM\EntityManager::create($connectionOptions, $config);


$helperSet = new \Symfony\Component\Console\Helper\HelperSet(array(
    'db' => new \Doctrine\DBAL\Tools\Console\Helper\ConnectionHelper($em->getConnection()),
    'em' => new \Doctrine\ORM\Tools\Console\Helper\EntityManagerHelper($em)
));

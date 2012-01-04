<?php
use Doctrine\Common\ClassLoader,
		Doctrine\ORM\EntityManager,
  	Doctrine\ORM,
  	Doctrine\Common\Cache\ArrayCache,
  	Doctrine\OXM;
 
/* Doctrine uses a class loader to autoload the required classes */
require_once THISPATH . '/orm/Doctrine/Common/ClassLoader.php';
 
/* Lets first load the Doctrine DBAL lbrary */
$classLoader = new \Doctrine\Common\ClassLoader('Doctrine\Common', realpath(__DIR__ ));
$classLoader->register();
$classLoader = new \Doctrine\Common\ClassLoader('Doctrine\ORM', realpath(__DIR__ ));
$classLoader->register();
$classLoader = new \Doctrine\Common\ClassLoader('Doctrine\DBAL', realpath(__DIR__ ));
$classLoader->register();
$classLoader = new \Doctrine\Common\ClassLoader('Entities', THISPATH);
$classLoader->register();

class DoctrineConfig{

  static private $em = NULL;
  static private $config = NULL;

  static public  function getEntityManager(){
    if(self::$em != NULL){
      return self::$em;
    }
    else{
      self::createEntityManager();
      return self::$em;
    }
  }

  static public  function getConfiguration(){
    if(self::$config != NULL){
      return self::$config;
    }
    else{
      self::createConfiguration();
      return self::$config;
    }
  }



  static private function createConfiguration(){
    $applicationMode = "development";

    if ($applicationMode == "development") {
      $cache = new Doctrine\Common\Cache\ArrayCache;
    } else {
      $cache = new Doctrine\Common\Cache\ApcCache;
    }

    $config = new Doctrine\ORM\Configuration;
    $config->setMetadataCacheImpl($cache);
    $driverImpl = $config->newDefaultAnnotationDriver(THISPATH.'/entities');
    $config->setMetadataDriverImpl($driverImpl);
    $config->setQueryCacheImpl($cache);
    $config->setProxyDir(THISPATH.'/proxy');
    $config->setProxyNamespace('Verify\Proxies');

    if ($applicationMode == "development") {
      $config->setAutoGenerateProxyClasses(true);
    } else {
      $config->setAutoGenerateProxyClasses(false);
    }

    self::$config = $config;
  }

  static private function createOxmConfiguration(){
    $applicationMode = "development";

    if ($applicationMode == "development") {
      $cache = new Doctrine\Common\Cache\ArrayCache;
    } else {
      $cache = new Doctrine\Common\Cache\ApcCache;
    }

    $config = new Doctrine\OXM\Configuration;
    $config->setMetadataCacheImpl($cache);
    $driverImpl = $config->newDefaultAnnotationDriver(THISPATH.'/entities');
    $config->setMetadataDriverImpl($driverImpl);
    //$config->setQueryCacheImpl($cache);
    $config->setProxyDir(THISPATH.'/proxy');
    $config->setProxyNamespace('Verify\Proxies');
    $config->setEntityNamespaces(array('entities'));

    if ($applicationMode == "development") {
      $config->setAutoGenerateProxyClasses(true);
    } else {
      $config->setAutoGenerateProxyClasses(false);
    }

    self::$oxmConfig = $config;
  }

  static private function createEntityManager(){

    //DB connection config
    include(THISPATH.'/orm/dbconfig.php');


    self::$em = EntityManager::create($connectionOptions, self::getConfiguration());
  }
}
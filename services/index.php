<?php
/*-----------------
  Config Items
-------------------*/
//BASE URL
if (isset($_SERVER['HTTP_HOST'])){
  $base_url = isset($_SERVER['HTTPS']) && strtolower($_SERVER['HTTPS']) !== 'off' ? 'https' : 'http';
	$base_url .= '://'. $_SERVER['HTTP_HOST'];
	$base_url .= str_replace(basename($_SERVER['SCRIPT_NAME']), '', $_SERVER['SCRIPT_NAME']);
}else{
  $base_url = 'http://localhost/';
}
define("BASE_URL",$base_url);

//APPPATH
define("THISPATH",dirname(__FILE__));
/*-------------------*/

require_once THISPATH . "/orm/DoctrineConfig.php";
require THISPATH . '/Slim/Slim.php';

$app = new Slim();

$app->get('/getItem/:folder/:file', function ($folder, $file)  use ($app) {
  $req =  $app->request();
  try{
		$em = DoctrineConfig::getEntityManager();
	  require THISPATH."/routes/$folder/get_$file.php";
		echo json_encode($retval);
  }catch(Exception $ex){
	echo json_encode(array('success'=>false, 'message'=>$ex->getMessage()));
  }
});

$app->post('/insertItem/:folder/:file', function ($folder, $file) use($app) {
	$req =  $app->request();
	try{
		$em = DoctrineConfig::getEntityManager();
		require THISPATH."/routes/$folder/insert_$file.php";
		echo json_encode($retval);
	}catch(Exception $ex){
		echo json_encode(array('success'=>false, 'message'=>$ex->getMessage()));
	}
});

$app->put('/updateItem/:folder/:file', function ($folder, $file) use($app) {
	$req =  $app->request();
	try{
		$em = DoctrineConfig::getEntityManager();
		require THISPATH."/routes/$folder/update_$file.php";
		echo json_encode($retval);
	}catch(Exception $ex){
		echo json_encode(array('success'=>false, 'message'=>$ex->getMessage()));
	}
});

$app->delete('/deleteItem/:folder/:file', function ($folder, $file) use($app) {
	$req =  $app->request();
	try{
		$em = DoctrineConfig::getEntityManager();
		require THISPATH."/routes/$folder/delete_$file.php";
		echo json_encode($retval);
	}catch(Exception $ex){
		echo json_encode(array('success'=>false, 'message'=>$ex->getMessage()));
	}
});

$app->run();
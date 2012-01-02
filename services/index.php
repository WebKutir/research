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

/*-----------------
  Helper Functions
-------------------*/
function loadEntities($deps){
  foreach ($deps as $d){
    $d=str_replace("\\","/",$d);
    if(substr($d,0,1)!="/"){
      $d="/$d";
    }
	$d="/entity".$d.".php";
    if(file_exists(THISPATH.$d)){
      require_once(THISPATH.$d);
    }
  }
}

/*-------------------*/
require THISPATH . "/orm/DoctrineConfig.php";
$em = DoctrineConfig::getEntityManager();

require THISPATH . '/Slim/Slim.php';

$app = new Slim();

$app->get('/:folder/:file', function ($folder, $file)  use ($app) {
  $req =  $app->request();
  try{
	include THISPATH."/route/$folder/get_$file.php";
	echo json_encode($retval);
  }catch(Exception $ex){
	echo json_encode(array('success'=>false, 'message'=>$ex->getMessage()));
  }
});

$app->post('/:folder/:file', function ($folder, $file) use($app) {
	$req =  $app->request();
	try{
		include THISPATH."/route/$folder/insert_$file.php";
		echo json_encode($retval);
	}catch(Exception $ex){
		echo json_encode(array('success'=>false, 'message'=>$ex->getMessage()));
	}
});

$app->put('/:folder/:file', function ($folder, $file) use($app) {
	$req =  $app->request();
	try{
		include THISPATH."/route/$folder/update_$file.php";
		echo json_encode($retval);
	}catch(Exception $ex){
		echo json_encode(array('success'=>false, 'message'=>$ex->getMessage()));
	}
});

$app->delete('/:folder/:file', function ($folder, $file) use($app) {
	$req =  $app->request();
	try{
		include THISPATH."/route/$folder/delete_$file.php";
		echo json_encode($retval);
	}catch(Exception $ex){
		echo json_encode(array('success'=>false, 'message'=>$ex->getMessage()));
	}
});

$app->run();
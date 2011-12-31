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
function loadDependencies($deps){
  foreach ($deps as $d){
    $d=str_replace("\\","/",$d);
    if(substr($d,0,1)!="/"){
      $d="/$d";
    }
    if(file_exists(THISPATH.$d)){
      require_once(THISPATH.$d);
    }
  }
}

/*-------------------*/

require THISPATH . '/Slim/Slim.php';

$app = new Slim();

$app->get('/:folder/:file', function ($folder, $file)  use ($app) {
	$req =  $app->request();
  include THISPATH."/service/$folder/get_$file.php";  
  echo json_encode($retval);
});

$app->post('/:folder/:file', function ($folder, $file) use($app) {
	$req =  $app->request();
	include THISPATH."/service/$folder/insert_$file.php";
	echo json_encode($retval);
});

$app->put('/:folder/:file', function ($folder, $file) use($app) {
	$req =  $app->request();
  include THISPATH."/service/$folder/update_$file.php";
  echo json_encode($retval);
});

$app->delete('/:folder/:file', function ($folder, $file) use($app) {
	$req =  $app->request();
  include THISPATH."/service/$folder/delete_$file.php";
  echo json_encode($retval);
});

$app->run();
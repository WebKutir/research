<?php
$dependencies=array(
  "orm/DoctrineConfig.php",
  "entity/Login.php"
  
);

loadDependencies($dependencies);

$endpoint="/login";


$app->get("/userInfo/:id",function($id){
  $em = DoctrineConfig::getEntityManager();
  try{
    $query = $em->createQuery(" SELECT u FROM \entity\Login u where u.id = $id");
    $arr = $query->getArrayResult();
    echo json_encode($arr);
  }catch(Exception $ex){
		echo json_encode(array('success'=>false, 'reason'=>$ex->getMessage()));
	}
});
/*
$app->get("/getUser/data",function($data){
 /* $em = DoctrineConfig::getEntityManager();
  try{
    $query = $em->createQuery(" SELECT u FROM \entity\Login u where u.id = $id");
    $arr = $query->getArrayResult();
    echo json_encode($arr);
  }catch(Exception $ex){
		echo json_encode(array('success'=>false, 'reason'=>$ex->getMessage()));
	}*/
	/*$data = array(
			"uid" => $this->input->post("userId"),
			"pwd" => $this->input->post("userPwd"),
			"succed" => "SUCCED"
	);
	
		echo json_encode($data);
			
	
});*/
/*$app->post('/insertUserdata', function () use ($app) {
	$em = DoctrineConfig::getEntityManager();
	try{
		$req =  $app->request()->post();
		$login = new \entity\Login;
    $login->setUserid($req["userId"]);
    $login->setPassword($req["userPwd"]);
    
		$em->persist($login);
		$em->flush();

		echo json_encode(array('success'=>true,'id'=>$login->getId()));
	}catch(Exception $ex){
		echo json_encode(array('success'=>false, 'reason'=>$ex->getMessage()));
	}
});
*/
/*
$app->post($endpoint.'/user', function () use ($app) {
	$em = DoctrineConfig::getEntityManager();
	try{
		$req =  $app->request()->post();
		$user = new \entity\AdminUsers;
    $user->setUsername($req["username"]);
    $user->setFirstName($req["firstName"]);
    $user->setLastName($req["lastName"]);
    $user->setPassword($req["password"]);
    $user->setPermissions($req["permissions"]);

		$em->persist($user);
		$em->flush();

		echo json_encode(array('success'=>true,'id'=>$user->getId()));
	}catch(Exception $ex){
		echo json_encode(array('success'=>false, 'reason'=>$ex->getMessage()));
	}
});

$app->put($endpoint."/user/:id",function($id) use ($app){
  $em = DoctrineConfig::getEntityManager();
  try{
    $user = $em->find('\entity\AdminUsers', $id);
    $put= $app->request()->put();
    foreach($put as $k=>$v){
      $capitalized=ucfirst($k);
      if(is_callable(array($user,"set".$capitalized))){
        $user->{"set".$capitalized}($v);
      }
    }
    $em->persist($user);
    $em->flush();

    echo json_encode(array('success'=>true));

  }catch(Exception $ex){
    echo json_encode(array('success'=>false, 'reason'=>$ex->getMessage()));
  }
});

$app->delete($endpoint."/user/:id",function($id){
  $em = DoctrineConfig::getEntityManager();
  try{
    $user = $em->find('\entity\AdminUsers', $id);
    $em->remove($user);
    $em->flush();

    echo json_encode(array('success'=>true));

  }catch(Exception $ex){
    echo json_encode(array('success'=>false, 'reason'=>$ex->getMessage()));
  }
});

$app->get($endpoint.'/username_unique/:username/:id', function ($username,$id) {
  $em = DoctrineConfig::getEntityManager();
  try{
    if($id!==0){
      $query = $em->createQuery(" SELECT COUNT(m.id) FROM entity\AdminUsers m where m.username = '$username' and m.id <> $id ");
    }else{
      $query = $em->createQuery(" SELECT COUNT(m.id) FROM entity\AdminUsers m where m.username = '$username' ");
    }
  	$count = $query->getSingleScalarResult();
  	if($count == 0){
  		echo json_encode(array('unique'=>true));
  	}
  	if($count > 0){
  		echo json_encode(array('unique'=>false));
  	}
  }catch(Exception $ex){
		echo json_encode(array('success'=>false, 'reason'=>$ex->getMessage()));
	}
});
*/

<?php
if($req->params('pwd')!=$req->params('re_pwd')){
	$retval['success'] = false;
}else{
	$user_name = $req->params('user_name');
	$password = $req->params('pwd');
	
	$member = $em->find('Entities\Member', $user_name);
 	$member->setMemberName($user_name);
 	$member->setPassword($password);

 	$em->persist($member);
  $em->flush();
	
	$retval['success'] = true;
}
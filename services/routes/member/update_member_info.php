<?php
if($req->params('password')!=$req->params('re_pwd')){
	$retval['success'] = false;
	$retval['message'] = 'Passwords did not Matched!!!';
}else{
	$id = $req->params('id');
	$member = $em->find('Entities\Member', $id);
	
	$put= $req->put();
  foreach($put as $k=>$v){
    $capitalized=ucfirst($k);
    if(is_callable(array($member,"set".$capitalized))){
    	$member->{"set".$capitalized}($v);
    }
  }
	
 	$em->persist($member);
  $em->flush();
	
	$retval['success'] = true;
}
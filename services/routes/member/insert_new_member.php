<?php
if($req->params('password')!==$req->params('re_pwd')){
	$retval['success'] = false;
	$retval['message'] = 'Passwords did not Matched!!!';
}else{
	$member = new Entities\Member;

	$post= $req->post();
  foreach($post as $k=>$v){
    $capitalized=ucfirst($k);
    if(is_callable(array($member,"set".$capitalized))){
    	$member->{"set".$capitalized}($v);
    }
  }
	
	$em->persist($member);
	$em->flush();
	
	$retval['success'] = true;
	$retval['return'] = array('id'=>$member->getId());
}
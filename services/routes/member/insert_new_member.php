<?php
if($req->params('pwd')!==$req->params('re_pwd')){
	$retval['success'] = false;
	$retval['message'] = 'Passwords did not Matched!!!';
}else{
	$member = new Entities\Member;
	$member->setMemberName($req->params('user_name'));
	$member->setPassword($req->params('pwd'));
	
	$em->persist($member);
	$em->flush();
	
	$retval['success'] = true;
	$retval['return'] = array('id'=>$member->getId());
}
<?php
$query = $em->createQuery(" SELECT COUNT(m.id) FROM Entities\Member m ");
$count = $query->getSingleScalarResult();
if($count == 0){
	//$app->redirect('/insertItem/member/new_member');
	$retval['success'] = true;
}else{
	$user_name = $req->params('user_name');
	$password = $req->params('password');
	$query = $em->createQuery(" SELECT COUNT(m.id) FROM Entities\Member m WHERE m.memberName = '$user_name' AND m.password = '$password' ");
	$count = $query->getSingleScalarResult();
	if($count == 0){
		$retval['success'] = false;
	}else{
		$retval['success'] = true;
	}
}
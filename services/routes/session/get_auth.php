<?php
$query = $em->createQuery(" SELECT COUNT(m.id) FROM Entities\Member m ");
$count = $query->getSingleScalarResult();
if($count == 0){
	//$app->redirect('/insertItem/member/new_member', 302);
	$retval['success'] = true;
}else{
	$user_name = $req->params('user_name');
	$password = $req->params('pwd');
	$query = $em->createQuery(" SELECT COUNT(m.id) FROM Entities\Member m WHERE m.member_name = '$user_name' AND m.password = '$password' ");
	$count = $query->getSingleScalarResult();
	if($count == 0){
		$retval['success'] = true;
	}else{
		$retval['success'] = false;
	}
}
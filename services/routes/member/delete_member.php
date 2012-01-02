<?php
$user_name = $req->params('user_name');
	
$members = $em->findAll('Entities\Member');

foreach($members as $member){
	if($member->memberName==$user_name){
		$em->remove($member);
		$em->flush();
		break;
	}
}
	
$retval['success'] = true;
<?php
$id = $req->params('id');
	
$member = $em->find('Entities\Member', $id);

$em->remove($member);
$em->flush();
	
$retval['success'] = true;
<?php
if($req->params('pwd')!=$req->params('re_pwd')){
	$retval['success'] = false;
}else{
	$retval['success'] = true;
}
$retval['return'] = array('id'=>'10');
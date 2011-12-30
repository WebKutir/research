<?php
$req =  $app->request();
$params = array();
$params['user_name'] = $req->params('user_name');
echo '123';
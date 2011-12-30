<?php
$params = array();
$params['user_name'] = $req->post('user_name');
$params['success'] = true;
echo json_encode($params);
<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');

class Rnd_model extends MY_Model{
	public function __construct(){
		$this->endpoint="/";
	}
	/*function getReq($name){
		return $this->get("hi/$name");
	}
	function getReq2($name){
		return $this->get("hi/req/$name");
	}*/
	function getUserInfo($id){
		return $this->get("userInfo/$id");
	}
	function insertuser($data){
		return $this->post("getUser/$data");
	}
}
?>

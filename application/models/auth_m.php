<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Auth_m extends MY_Model{
	
	public function __construct(){
		$this->endpoint="/";
	}

  function getMember($id,$assoc=true,$raw=false){
    return $this->get('member/'.$id,$assoc,$raw);
  }

	function addUser($arr){
		return $this->post('member', $arr);
	}

	function saveUser($id,$arr){
	  return $this->put('member/'.$id, $arr);
	}

	function deleteUser($id){
		return $this->delete('member/'.$id);
	}
}
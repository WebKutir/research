<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Data_model extends MY_Model{
	
	public function __construct(){
		$this->endpoint="/auth/";
	}

  function getItem($arr,$assoc=true,$raw=false){
    return $this->get($arr,$assoc,$raw);
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
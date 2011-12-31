<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Data_model extends MY_Model{
	
  /**
   * @param array $arr - path & params of the service
   * @param boolean $raw - determines whether it returns JSON or a decoded PHP array
   * @param boolean $assoc - whether the JSON decoded object should be associative
   * @return JSON / PHP Array
   */
	function getItem($arr,$raw=false,$assoc=true){
    return $this->get($arr,$raw,$assoc);
  }
  
  /**
   * @param array $arr - path & params of the service
   * @return last_insert_id / false
   */
  function insertItem($arr){
		return $this->post($arr);
	}

	/**
   * @param array $arr - path & params of the service
   * @return Boolean
   */
	function updateItem($arr){
	  return $this->put($arr);
	}

	/**
   * @param array $arr - path & params of the service
   * @return Boolean
   */
		function deleteItem($arr){
		return $this->delete($arr);
	}
}
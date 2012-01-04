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
   * @return anything defined in $retval['return'] in route file / String failure message / Int zero(0) if not defined $retval['return']
   */
  function insertItem($arr){
		return $this->post($arr);
	}

	/**
   * @param array $arr - path & params of the service
   * @return Boolean (true) / String failure message
   */
	function updateItem($arr){
	  return $this->put($arr);
	}

	/**
   * @param array $arr - path & params of the service
   * @return Boolean (true) / String failure message
   */
		function deleteItem($arr){
		return $this->delete($arr);
	}
}
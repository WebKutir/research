<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MY_Model extends CI_Model{
	function __construct(){
		parent::__construct();
		$this->endpoint="/";

	}

  /**
   * Perform Get request using Pest
   *
   * @param string $path - path to service
   * @param boolean $assoc - whether the JSON decoded object should be associative
   * @param boolean $raw - determines whether it returns JSON or a decoded PHP array
   * @return JSON / PHP Array
   * @author Khaled
   */
	function get($path,$assoc=true,$raw=false){
		//echo "PATH->".$path;
		if($raw){
		  return $this->pest->get($this->endpoint.$path);
		}else{
		  return json_decode($this->pest->get($this->endpoint.$path),$assoc);
		}
	}

  /**
   * Perform Post request using Pest
   *
   * @param string $path - path to service
   * @param array $data - an associative array to be posted to the service
   * @return last_insert_id / false
   * @author Khaled
   */
	function post($path,$data){
	  $res=json_decode($this->pest->post($this->endpoint.$path,$data),true);
	  if(isset($res["success"]) && $res["success"]==true){
	    return $res["id"];
	  }
	  return false;
	}

	/**
   * Perform Put request using Pest
   *
   * @param string $path - path to service
   * @param array $data - an associative array to be put to the service
   * @return Boolean
   * @author Khaled
   */
	function put($path,$data){
	  $res=json_decode($this->pest->put($this->endpoint.$path,$data),true);
	  if(isset($res["success"]) && $res["success"]==true){
	    return $res["success"];
	  }
	  return false;
	}

	/**
   * Perform Delete request using Pest
   *
   * @param string $path - path to service
   * @return Boolean
   * @author Khaled
   */
	function delete($path){
	  $res=json_decode($this->pest->delete($this->endpoint.$path),true);
	  if(isset($res["success"]) && $res["success"]==true){
	    return $res["success"];
	  }
	  return false;
	}

}

?>
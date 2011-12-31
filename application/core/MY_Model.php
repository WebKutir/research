<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MY_Model extends CI_Model{

	function __construct(){
		parent::__construct();
	}

  /**
   * Perform Get request using Pest
   *
   * @param array $arr - path & params of the service
   * @param boolean $raw - determines whether it returns JSON or a decoded PHP array
   * @param boolean $assoc - whether the JSON decoded object should be associative
   * @return JSON / PHP Array
   * @author Tareq Modified Khaled's Module
   */
	function get($arr,$raw=true,$assoc=false){
		$this->endpoint = '/'.$arr['folder'].'/';
		$path = $arr['file'];
		if($raw){
		  return $this->pest->get($this->endpoint.$path,(isset($arr['params']) ? $arr['params'] : ''));
		}else{
		  return json_decode($this->pest->get($this->endpoint.$path,(isset($arr['params']) ? $arr['params'] : '')),$assoc);
		}
	}

  /**
   * Perform Post request using Pest
   *
   * @param array $arr - path & params of the service
   * @return last_insert_id / false
   * @author Tareq Modified Khaled's Module
   */
	function post($arr){
		$this->endpoint = '/'.$arr['folder'].'/';
		$path = $arr['file'];
	  $res=json_decode($this->pest->post($this->endpoint.$path,$arr['params']),true);
	  if(isset($res["success"]) && $res["success"]==true){
	    return (isset($res["return"]) ? $res['return'] : 0);
	  }
	  return false;
	}

	/**
   * Perform Put request using Pest
   *
   * @param array $arr - path & params of the service
   * @return Boolean
   * @author Tareq Modified Khaled's Module
   */
	function put($arr){
		$this->endpoint = '/'.$arr['folder'].'/';
		$path = $arr['file'];
		$res=json_decode($this->pest->put($this->endpoint.$path,$arr['params']),true);
	  if(isset($res["success"]) && $res["success"]==true){
	    return $res["success"];
	  }
	  return false;
	}

	/**
   * Perform Delete request using Pest
   *
   * @param array $arr - path & params of the service
   * @return Boolean
   * @author Tareq Modified Khaled's Module
   */
	function delete($arr){
		$this->endpoint = '/'.$arr['folder'].'/';
		$path = $arr['file'];
		$res=json_decode($this->pest->delete($this->endpoint.$path,$arr['params']),true);
	  if(isset($res["success"]) && $res["success"]==true){
	    return $res["success"];
	  }
		return false;
	}

}

?>
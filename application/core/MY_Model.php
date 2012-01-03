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
	function get($arr,$raw=false,$assoc=true){
		$this->endpoint = '/getItem/'.$arr['folder'].'/';
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
   * @return anything defined in $retval['return'] in route file / String failure message / Int zero(0) if not defined $retval['return']
   * @author Tareq Modified Khaled's Module
   */
	function post($arr){
		$this->endpoint = '/insertItem/'.$arr['folder'].'/';
		$path = $arr['file'];
	  $res=json_decode($this->pest->post($this->endpoint.$path,$arr['params']),true);
	  if(isset($res["success"]) && $res["success"]==true){
	    return (isset($res["return"]) ? $res['return'] : 0);
	  }
	  return $res['message'];
	}

	/**
   * Perform Put request using Pest
   *
   * @param array $arr - path & params of the service
   * @return Boolean (true) / String failure message
   * @author Tareq Modified Khaled's Module
   */
	function put($arr){
		$this->endpoint = '/updateItem/'.$arr['folder'].'/';
		$path = $arr['file'];
		$res=json_decode($this->pest->put($this->endpoint.$path,$arr['params']),true);
	  if(isset($res["success"]) && $res["success"]==true){
	    return $res['success'];
	  }
	  return $res['message'];
	}

	/**
   * Perform Delete request using Pest
   *
   * @param array $arr - path & params of the service
   * @return Boolean (true) / String failure message
   * @author Tareq Modified Khaled's Module
   */
	function delete($arr){
		$this->endpoint = '/deleteItem/'.$arr['folder'].'/';
		$path = $arr['file'];
		$res=json_decode($this->pest->delete($this->endpoint.$path,$arr['params']),true);
	  if(isset($res["success"]) && $res["success"]==true){
	    return $res['success'];
	  }
		return $res['message'];
	}

}

?>
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function __construct(){
    parent::__construct();
    $this->load->model("rnd_model","rndM");
  }
	
	public function index()
	{
		/*$ar = array(
				"name" => "Pijus Kumar Sarker",
				"email" => "pijus@nibssolution",
				"userId" => "pijus",
				"pwd" => "123456"
		);*/
		
		/*$data = array(
				"w_m"=>$this->rndM->getReq("Pijus.Kumar"),
				"w_m2"=>$this->rndM->getReq2("Pijus.Sarker"),
				);*/
		//echo $this->rndM->getReq("Pijus");
		$this->load->view('welcome_message');
		
		//$uinfo = $this->rndM->getUserInfo(2);
		//print_r($uinfo);
		
		
	}
	public function getUser($id){
		$uinfo = $this->rndM->getUserInfo($id);
		print_r($uinfo);
	}
	public function addUserInfo(){
		$data = array(
				"userid" => $this->input->post("userId"),
				"password" => $this->input->post("userPwd")
		);
		$this->rndM->insertuser($data);
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Auth extends CI_Controller {

	function __construct(){
		parent::__construct();
	}

	public function index()
	{
		$data = array(
			'folder'			=> 'auth',
			'file'				=> 'auth',
			'params'			=> array(
				'user_name'		=> $this->input->post('user_name'),
				'password'		=> $this->input->post('pwd')
			)
		);
		$password = $this->data_model->getItem($data,true,true);
		if($password==$this->input->post('pwd')){
			$this->load->view('add_member');
		}else{
			$this->load->view('auth_fail');
		}
	}
}

/* End of file auth.php */
/* Location: ./application/controllers/auth.php */
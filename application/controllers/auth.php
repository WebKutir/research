<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Auth extends CI_Controller {

	function __construct(){
		parent::__construct();
	}

	public function index()
	{
		$this->load->model('auth_m', 'auth');
		echo $this->auth->getMember($this->input->post('user_name'),true,true);
	}
}

/* End of file auth.php */
/* Location: ./application/controllers/auth.php */
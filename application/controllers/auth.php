<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Auth extends CI_Controller {

	function __construct(){
		parent::__construct();
	}

	public function index()
	{
		$data = array(
			'folder'			=> 'session',
			'file'				=> 'auth',
			'params'			=> array(
				'user_name'		=> $this->input->post('user_name'),
				'password'		=> $this->input->post('pwd')
			)
		);
		//If you pass getItem($data, true, true){
			//you will get JSON 
		//}else {an Array}
		$result = $this->data_model->getItem($data);

		if($result['success']==false){
			$this->load->view('auth_fail');
		}else{
			$this->load->view('crud_member');
		}
	}
}

/* End of file auth.php */
/* Location: ./application/controllers/auth.php */
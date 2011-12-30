<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Addmember extends CI_Controller {

	function __construct(){
		parent::__construct();
	}

	public function index()
	{
		$this->load->view('add_member');
	}
}

/* End of file addmember.php */
/* Location: ./application/controllers/addmember.php */
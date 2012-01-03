<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Addmember extends CI_Controller {

	function __construct(){
		parent::__construct();
	}

	public function index()
	{
		$params = $this->input->post();
		$data = array(
			'folder'				=> 'member',
			'file'					=> 'new_member',
			'params'				=> $params
		);
//var_dump($_POST);
		$result = $this->data_model->insertItem($data);
		
		if(is_array($result)){
			$retval['result'] = 'success';
			$retval['id'] = $result['id'];
		}else{
			$retval['result'] = 'fail';
			$retval['message'] = $result;
		}
		echo json_encode($retval);
	}
}

/* End of file addmember.php */
/* Location: ./application/controllers/addmember.php */
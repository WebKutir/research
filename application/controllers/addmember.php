<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Addmember extends CI_Controller {

	function __construct(){
		parent::__construct();
	}

	public function index()
	{
		$data = array(
			'folder'				=> 'member',
			'file'					=> 'new_member',
			'params'				=> array(
					'user_name'	=> $this->input->post('user_name'),
					'pwd'				=> $this->input->post('pwd'),
					're_pwd'		=> $this->input->post('re_pwd')
			)
		);
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
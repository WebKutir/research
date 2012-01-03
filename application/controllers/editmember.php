<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Editmember extends CI_Controller {

	function __construct(){
		parent::__construct();
	}

	public function index()
	{
		$data = array(
			'folder'				=> 'member',
			'file'					=> 'member_info',
			'params'				=> array(
					'id'				=> $this->input->post('user_id'),
					'user_name'	=> $this->input->post('user_name'),
					'pwd'				=> $this->input->post('pwd'),
					're_pwd'		=> $this->input->post('re_pwd')
			)
		);
		$result = $this->data_model->updateItem($data);
		if($result===true){
			$retval['result'] = 'success';
		}else{
			$retval['result'] = 'fail';
			$retval['message'] = $result;
		}
		echo json_encode($retval);
	}
}

/* End of file editmember.php */
/* Location: ./application/controllers/editmember.php */
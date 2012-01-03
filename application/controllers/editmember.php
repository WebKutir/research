<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Editmember extends CI_Controller {

	function __construct(){
		parent::__construct();
	}

	public function index()
	{
		$params = $this->input->post();
		$data = array(
			'folder'				=> 'member',
			'file'					=> 'member_info',
			'params'				=> $params
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
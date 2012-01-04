<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Deletemember extends CI_Controller {

	function __construct(){
		parent::__construct();
	}

	public function index()
	{
		$data = array(
			'folder'				=> 'member',
			'file'					=> 'member',
			'params'				=> array(
					'id'	=> $this->input->post('id')
			)
		);
		$result = $this->data_model->deleteItem($data);
		
		if($result==true){
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
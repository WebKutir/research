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
					'user_name'	=> $this->input->post('user_name')
			)
		);
		$result = $this->data_model->deleteItem($data);
		
		if($result==false){
			$retval['result'] = 'fail';
		}else{
			$retval['result'] = 'success';
		}
		
		echo json_encode($retval);
	}
}

/* End of file editmember.php */
/* Location: ./application/controllers/editmember.php */
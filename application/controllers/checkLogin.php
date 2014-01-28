<?php 
/**
* 
*/
class CheckLogin extends CI_Controller
{
	
	
	function index()
	{
		$this->output->enable_profiler(TRUE);


		$username = $this->session->userdata('UID');
		$this->ybauth->login_in_law($username);
		echo "this is check index";
		// echo $username;
		// var_dump($_SERVER);
		// header("Location:http://www.baidu.com");

	}
	function check()
	{
		$result = array();
		if(isset($_POST['input_user'])){
			if ($_POST['input_user']=='wqz') {
				$result = array('result'=>1,'say'=>'ok');
				$this->ybauth->set_UID('wqz1');

			} else {
				$result = array('result'=>0,'say'=>'auth failed');

			}
			

		}else{
			$result = array('result'=>0,'say'=>'empty input');
		}

		$this->output->set_content_type('application/json')->set_output(json_encode($result));

	}

	function yblogout()
	{
		$this->session->sess_destroy();
		echo 'logout successful';		
	}
}



 ?>
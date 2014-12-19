<?php 
/**
* 
*/
class CheckLogin extends CI_Controller
{
	
	
	function index()
	{
		$this->output->enable_profiler(TRUE);


		// if ($this->ybauth->login_in_law()) {
		header("Location:/");
		// }
		 
		
		
		// echo $username;
		// var_dump($_SERVER);
		// header("Location:http://www.baidu.com");

	}
	function check()
	{
		log_message('debug','*************load check');

		$result = array();
		if(isset($_POST['input_user'])){
			$username = $_POST['input_user'];
			$passwd = $_POST['input_pass'];
			// var_dump($this->ybauth->auth_check($username,$passwd));exit;
			if ( $this->ybauth->auth_check($username,$passwd)) {//
				$result = array('result'=>1,'say'=>'ok');

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
		$this->ybauth->login_out();		
		header('Location:/');

	}
}



 ?>

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
			if ( $this->ybauth->auth_check($username,$passwd)) {//登录帐号写死，还需要改进这块
			// if ($_POST['input_user']=='wqz') {//登录帐号写死，还需要改进这块
				$result = array('result'=>1,'say'=>'ok');
				// $this->ybauth->set_LID('wqz');

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
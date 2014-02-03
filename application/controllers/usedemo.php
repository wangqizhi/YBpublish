<?php 
/**
* 
*/
class UseDemo extends CI_Controller
{
	
	
	function index()
	{
		echo "this is test page";

		$this->output->enable_profiler(TRUE);
		// $check_u_p = shell_exec("/usr/local/php/bin/php /usr/local/web/YBpublish/index.php /script/yb_login pass_login 2 1");
		// var_dump($check_u_p);
		$test = "test11/te1st/(:any)";
		// var_dump(strstr("test/(:any)", "(:any)"));
		// var_dump(strstr("test/(:any)", "(1:any)"));
		// echo $test2 = substr($test,0,strlen($test)-7);
		echo substr($test,0,strlen($test)-strlen(explode("/", $test)[count(explode("/", $test))-1])-1);
	}

	function testSS()
	{
		$this->output->enable_profiler(TRUE);
		// var_dump($this->session->set_userdata(array('UID'=>'13764018020')));
		// var_dump($this->session->userdata('UID'));
		// echo BASEPATH;
		// get_power();
		// $this->log->write_log($level = 'all', 'test-log');
		// $this->ybauth->print_me();


		// $this->load->library('session');

	}
}


 ?>
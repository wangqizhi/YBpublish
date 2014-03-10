<?php 
/**
* 
*/
class UseDemo extends CI_Controller
{
	public function __construct()
  	{
    	parent::__construct();
    	// $this->load->model('ybvsftp_model');
  	}
	
	
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

		//email
		// $this->load->library('email');

  		$config = array();
        $config['useragent']           = "CodeIgniter";
        $config['mailpath']            = "/usr/bin/sendmail"; // or "/usr/sbin/sendmail"
        $config['protocol']            = "smtp";
        $config['smtp_host']           = "localhost";
        $config['smtp_port']           = "25";
        $config['mailtype'] = 'html';
        $config['charset']  = 'utf-8';
        $config['newline']  = "\r\n";
        $config['wordwrap'] = TRUE;

        // $this->load->library('email');

        $this->email->initialize($config);
		$this->email->from(MAILADDR, MAILNAME);
		$this->email->to('wqz@yiban.cn'); 
		$this->email->cc('wqz@yiban.cn'); 
		$this->email->bcc('wqz@yiban.cn'); 
		$this->email->subject('Email Test');
		$this->email->message('Testing the email class.'); 
		$this->email->send();

		echo $this->email->print_debugger();


		// echo php_sapi_name();
		
		
		//test &
		// $b = & $c;
		// $b[] = 'test1' ;
		// $c[] = 'test2' ;
		// echo var_dump($b).'<br>';
		// echo var_dump($c);

		//test_rsync
		// $this->yb_sh->sh_rsync("/test/test3","/test2");

		//测试简单文字匹配
		// strstr('$input123','$input');

		//测试正则文字匹配
		// $reg= '/^\$input[+]?\s/';
		// $search = '$input+ am test';
		// $result =array();
		// $test = preg_match($reg, $search,$result);
		// var_dump($test);
		// var_dump($result);

		//测试分割回车
		// $test= "nihao\nnihao2\nnihao3";
		// echo $test;
		// var_dump(explode("\n", $test));

		//测试sh功能
		// $out = $this->yb_sh->sh_cp('fda/1','test/2');
		// var_dump($out);

		//测试递归目录
		// var_dump(ls_dir('/work_dir/test'));
		// echo shell_exec("whoami");

		//ls_dir
		// $test = glob("/work_dir/*");
		// var_dump($test);

		//print all args
		// var_dump($_SERVER['HTTP_REFERER']);

		//test recode logs
		// $flow_name = "test";
  //       $result = shell_exec("echo ".date('YmdHis')." Publish ".$flow_name." Successful! >> ".WORKDIR."logs/publish.logs 2>&1");
  //       var_dump($result);

		//test other database
		// $name = "wqz";
		// $passwd = md5("1");
		// $db_ftp = $this->load->database("vsftpd",TRUE);
		// $data = array(
  // 			"name"=>$name,
  // 			"passwd"=>$passwd
  // 			);
		// $db_ftp->insert('users',$data);
		// var_dump($this->ybvsftp_model->insert_ftp_user('wqz1','1'));


		// show_error('test_error',404);
		// var_dump($this->session->set_userdata(array('UID'=>'13764018020')));
		// var_dump($this->session->userdata('UID'));
		// echo BASEPATH;
		// get_power();
		// $this->log->write_log($level = 'all', 'test-log');
		// $this->ybauth->print_me();


		// $this->load->library('session');

	}

	//测试递归目录
	

}

// function ls_dir($dir)
// 	{
// 		// var_dump(glob($dir."/*"));
// 		global $files;
// 		foreach (glob($dir."/*") as $file) {
// 			if (is_dir($file)) {
// 			// if (1==2) {
// 				ls_dir($file);
// 			}else{
// 				$files[] = $file;
// 			}
// 		}
// 		return $files;

// 	}





 ?>
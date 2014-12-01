<?php
class Yb_Login extends CI_Controller {

	public function __construct()
  	{
    	parent::__construct();
    	$this->load->model('ybadmin/ybuser_model');
  	}

  	public function pass_login($username,$passwd)
  	{
  		$this->input->is_cli_request();
  		// echo $username;
  		// echo $passwd;
      $username= urldecode($username);
      $passwd= urldecode($passwd);
	    echo $this->ybuser_model->cli_get_user_num($username,$passwd);

  }
}
?>
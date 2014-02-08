<?php 
class Publish_Flow_Resolve extends CI_Controller {
	public function __construct()
  	{
    	parent::__construct();
      	$this->load->model('ybadmin/ybgroup_model');
    	$this->load->model('ybadmin/ybuser_model');
    	$this->load->model('ybpublish/pbdirpower_model');
    	$this->load->model('ybpublish/pbadmin_model');
  	}
  	public function index()
  	{
  		echo '1';
  	}


}
?>
<?php 
class Admin_module extends CI_Controller {
	public function __construct()
  	{
    	parent::__construct();
    	$this->load->model('ybadmin/ybmodule_model');
  	}


    //为用户添加组
    public function add_module()
    {
      //暂时自己用，所以直接返回结果，未做修饰
      var_dump($this->ybmodule_model->insert_module());
    }


 

 }




 ?>
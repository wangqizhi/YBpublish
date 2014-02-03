<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ybpower{
	public $CI;
	function __construct(){
		$this->CI =& get_instance();//实例化CI，可以用来调用其他资源
	}


	//设置页面权限
	public function set_page_power($power)
	{
		if ($power=="") {
			# code...
		}
	}


	public function get_urls(){
		// $query = $this->CI->db->get('yb_power');
		// var_dump($query->result_array());
		// var_dump($this->CI->router->routes);
		$access_urls = $this->CI->router->routes;
		$all_urls=array();
		foreach ($access_urls as $key => $value) {
			// echo $key.'<br>';
			// echo ':'.$value.'<br>';
			array_push($all_urls, $key);
		}
		return $all_urls;
		// var_dump($this->CI->session->userdata('uname'));

	}


}

 ?>
<?php 
/**
* 
*/
class Todotest extends CI_Controller
{
	
	
	function index()
	{
		# code...
		echo "this is check Todotest";
	}
	function helloworld($value='')
	{
		# code...
		// echo $value;
		// echo $_GET['test'];
		$data['title']='test,todotest';
  		$this->load->view('news/test', $data);
  		// $this->load->helper('anchor');



	}
}



 ?>
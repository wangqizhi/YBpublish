<?php 
/**
* 
*/
class CheckLogin extends CI_Controller
{
	
	
	function index()
	{
		# code...
		echo "this is check index";
	}
	function helloworld($value='')
	{
		# code...
		echo $value;
		echo $_GET['test'];
	}
}



 ?>
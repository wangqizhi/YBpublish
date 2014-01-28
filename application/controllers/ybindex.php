<?php 

class YbIndex extends CI_Controller {
	function index()
	{
		$data['title']='helloworld';

		$this->load->view('templates/header');
		$this->load->view('ybpublish/ybindex_res');
		$this->load->view('ybpublish/ybindex_main',$data);
		$this->load->view('templates/footer');
	}
}

 ?>


<?php 

class YbIndex extends CI_Controller {
	function index()
	{
		// var_dump($this->ybauth->login_in_law());
		if ($this->ybauth->login_in_law()) {
			header("Location:ybindex/choose_index");
			// echo '1';
			return false;
		}else{
			$this->load->view('templates/header');
			$this->load->view('ybindex/ybindex_res');
			$this->load->view('templates/header2');
			$this->load->view('ybindex/ybindex_main');
			$this->load->view('templates/footer');


		}

		
	}

	function force_index()
	{
			$this->load->view('templates/header');
			$this->load->view('ybindex/ybindex_res');
			$this->load->view('templates/header2');
			$this->load->view('ybindex/ybindex_main');
			$this->load->view('templates/footer');
	}

	function choose_index()
	{
		if (!$this->ybauth->login_in_law()) {
			header("Location:/");
			// echo '1';
			return false;
		}
		$data['login_user'] = $this->session->userdata('uname');
		$this->load->view('templates/header');
		$this->load->view('ybindex/ybindex_res');
		$this->load->view('templates/header2');
		$this->load->view('ybindex/ybindex_choose',$data);
		$this->load->view('templates/footer');

	}

	function ybsystem_aboutus()
	{
		if (!$this->ybauth->login_in_law()) {
			header("Location:/");
			// echo '1';
		}
		$data['login_user'] = $this->session->userdata('uname');
		$this->load->view('templates/header');
		$this->load->view('ybindex/ybindex_res');
		$this->load->view('templates/header2');
		$this->load->view('ybindex/ybindex_choose',$data);
		$this->load->view('ybindex/ybindex_aboutus');
		$this->load->view('templates/footer');

	}

	
}

 ?>


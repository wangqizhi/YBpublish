<?php 
class Admin_Power extends CI_Controller {
	public function __construct()
  	{
    	parent::__construct();
      $this->load->model('ybadmin/ybpower_model');
    	$this->load->model('ybadmin/ybgroup_model');
  	}

    //唯一权限判定
    //1可以插入
    //0有重复用户
  	public function only_require()
  	{
      if (!$this->ybauth->login_in_law()) {
      header("Location:/");
      }
  		$query = $this->ybpower_model->get_power_num();
  		if ($query =="0") {
  			$this->ybpower_model->insert_power();
  			echo 1;
  		} else {
  			echo 0;
  		}
  	}

    //新增权限
    public function power_add($powername='')
    {
      if ($powername=="") {
        show_404();        
      }
      $data['power_urls'] = $this->ybpower->get_urls();
      $data['powername'] = $powername;
      $data['login_user'] = $this->session->userdata('uname');//获取登录用户名
      $data['powers'] = $this->ybpower_model->get_powers();
      // var_dump( $data['powers']);exit;
      // $data['users'] = $this->ybgroup_model->get_group_by_power($powername);//获取制定权限的用户组
      // var_dump($data['persons']);exit;
      $data['groups'] = $this->ybgroup_model->get_group();

      $this->load->view('templates/header');
      $this->load->view('ybindex/ybindex_res');
      $this->load->view('ybadmin/ybadmin_res');
      $this->load->view('templates/header2');
      $this->load->view('ybindex/ybindex_choose',$data);
      $this->load->view('ybadmin/ybadmin_nav_managepower',$data);
      $this->load->view('templates/footer');
    }
    
 }




 ?>
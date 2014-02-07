<?php 
class Admin_Group extends CI_Controller {
	public function __construct()
  	{
    	parent::__construct();
      $this->load->model('ybadmin/ybgroup_model');
      $this->load->model('ybadmin/ybuser_model');
    	$this->load->model('ybadmin/ybmodule_model');
  	}

    //唯一组名判断
    //1可以插入
    //0有重复组名
  	public function only_require()
  	{
      if (!$this->ybauth->login_in_law()) {
      header("Location:/");
      // echo '1';
      }
  		$query = $this->ybgroup_model->get_group_num();
  		if ($query =="0") {
  			$this->ybgroup_model->insert_group();
  			echo 1;
  		} else {
  			echo 0;
  		}
  	}




    //新增组
    public function group_add($groupname='')
    {
      if ($groupname=="") {
        show_404();        
      }
//模块配置信息
    $data['level1_modules'] = $this->ybmodule_model->get_module_where("1");
    $data['level2_modules'] = $this->ybmodule_model->get_module_where("2");
    $data['user_group'] = $this->ybuser_model->get_user_group($this->session->userdata('uname'));



      $data['groupname'] = $groupname;
      $data['persons'] = $this->ybuser_model->get_person_by_group($groupname);
      $data['login_user'] = $this->session->userdata('uname');//获取登录用户名
      $data['groups'] = $this->ybgroup_model->get_group();
      // var_dump($data['persons']);exit;
      $this->load->view('templates/header');
      $this->load->view('ybindex/ybindex_res');
      $this->load->view('ybadmin/ybadmin_res');
      $this->load->view('templates/header2');
      $this->load->view('ybindex/ybindex_choose',$data);
      $this->load->view('ybadmin/ybadmin_nav_managegroup',$data);
      $this->load->view('templates/footer');
    }

  //为组添加权限
    public function group_add_power()
    {
      $groupname = $this->input->post('groupname');
      if ($this->ybgroup_model->get_group_num() != '1') {
        echo '-1';//组不存在
      }else{
        $this->ybgroup_model->update_power();
        echo '1';//更新成功
      }
    }
 }
 ?>
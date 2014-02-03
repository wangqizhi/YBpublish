<?php 
class Admin_User extends CI_Controller {
	public function __construct()
  	{
    	parent::__construct();
    	$this->load->model('ybadmin/ybuser_model');
  	}

    //唯一用户判定
    //1可以插入
    //0有重复用户
  	public function only_require()
  	{
      if (!$this->ybauth->login_in_law()) {
      header("Location:/");
      // echo '1';
      }
  		// if (!isset($username)) {
  		// 	echo "wrong";
  		// 	return false;
  		// }
  		$query = $this->ybuser_model->get_user_num();
  		// var_dump($query);
  		if ($query =="0") {
  			# code...
  			$this->ybuser_model->insert_user();
  			echo 1;
  		} else {
  			echo 0;
  		}
  	}

    //为用户添加组
    public function user_add_group()
    {
      $username = $this->input->post('username');
      if ($this->ybuser_model->get_user_num() != '1') {
        echo '-1';//用户不存在
      }else{
        $this->ybuser_model->update_group();
        echo '1';//更新成功
      }

    }
 }




 ?>
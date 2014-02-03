<?php
class Ybuser_model extends CI_Model {

	//table:yb_user
	//id、username、nick、group、create_time、loginout_time

  public function __construct()
  {
    $this->load->database();
  }

  public function get_user_num($need_pwd=0)
  {
  	$username = $this->input->post('username');
  	$passwd = $this->input->post('passwd');
  	// echo $username;exit;
  	// echo $passwd;exit;
  	if ($need_pwd==0) {
  		$query = $this->db->get_where('yb_user',array('username'=>$username));
  	} else {
  		$query = $this->db->get_where('yb_user',array('username'=>$username,'passwd'=>$passwd));

  	}
  	
  	// var_dump($query);exit;
  	return $query->num_rows;

  }


  public function cli_get_user_num($username,$passwd)
  {
  	// $username = $this->input->post('username');
  	// $passwd = $this->input->post('passwd');
  	// echo "in";
  	// echo $username;
  	$query = $this->db->get_where('yb_user',array('username'=>$username,'passwd'=>md5($passwd)));
  	$query2 = $this->db->get_where('yb_user',array('nick'=>$username,'passwd'=>md5($passwd)));
  	// var_dump($query);
  	return $query->num_rows+$query2->num_rows;

  }

  //获取在组中的所有人
  public function get_person_by_group($value='')
  {
    $this->db->select('username,nick');
    // $this->db->distinct();
    $query = $this->db->get_where('yb_user',array('group'=>$value));
    return $query->result_array();

  }

  //获取所有的用户
  public function get_all_user()
  {
    $this->db->select('username');
    $query = $this->db->get('yb_user');
    return $query->result_array();
  }

  //插入用户
  public function insert_user()
  {
    $data = array(
      'username' => $this->input->post('username'),
      'nick' => $this->input->post('nick'),
      'passwd' => md5($this->input->post('passwd'))
      // 'username' => '10000120',
      // 'nick' => 'wqz',
      // 'passwd' => md5('123456')
    );
    return $this->db->insert('yb_user', $data);
  }

  //为用户分配组
  public function update_group()
  {
    $groupname = $this->input->post('groupname');
    $username = $this->input->post('username');
    $this->db->where('username', $username);
    $data = array('group'=>$groupname);
    $this->db->update('yb_user',$data);


  }
}
?>
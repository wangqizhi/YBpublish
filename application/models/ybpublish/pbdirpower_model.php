<?php
class PbDirPower_model extends CI_Model {

	//table:yb_dir_power
	//id、dir_name、power_group

  public function __construct()
  {
    $this->load->database();
  }



  //插入管理信息
  public function insert_publish_group_power()
  {
    $dir_name = $this->input->post('dir_name');
    $power_group = $this->input->post('power_group');
    $real_path = $this->input->post('real_path');
    $query = $this->db->get_where('yb_dir_power',array('dir_name'=>$dir_name,'power_group'=>$power_group));
    if($query->num_rows >= 1){
      return 0;//重复power
    }
    $data = array(
      'dir_name' => $dir_name,
      'power_group' => $power_group,
      'real_path' => $real_path
    );
    $this->db->insert('yb_dir_power',$data);
    return 1;//ok
  }

  //获取所有有权限的目录
  public function get_dir($usergroup='')
  {
    if ($usergroup=="") {
      show_404();
    } elseif($usergroup=="Root"){//超管特权
      $query = $this->db->get('yb_dir_power');
      return $query->result_array();

    }else {
      $query = $this->db->get_where('yb_dir_power',array('power_group'=>$usergroup));
      return $query->result_array();
    }
    
  }



}

?>
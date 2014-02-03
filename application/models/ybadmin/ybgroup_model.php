<?php
class Ybgroup_model extends CI_Model {

	//table:yb_group
	// id/groupname/power

  public function __construct()
  {
    $this->load->database();
  }


  //判断group数量 
  public function get_group_num()
  {
    $groupname = $this->input->post('groupname');
    $query = $this->db->get_where('yb_group',array('groupname'=>$groupname));
    
    // var_dump($query);exit;
    return $query->num_rows;

  }

  //获取所有分组
  public function get_group()
  {
    $query = $this->db->get('yb_group');
    return $query->result_array();
  }

 //获取拥有权限的所有组
  public function get_group_by_power($value='')
  {
    $this->db->select('groupname');
    // $this->db->distinct();
    $query = $this->db->get_where('yb_group',array('power'=>$value));
    return $query->result_array();

  }

  //插入分组
  public function insert_group()
  {
    $data = array(
      'groupname' => $this->input->post('groupname'),
    );
    return $this->db->insert('yb_group', $data);
  }

  //为组分配权限
  public function update_power()
  {
    $powername = $this->input->post('powername');
    $groupname = $this->input->post('groupname');
    $this->db->where('groupname', $groupname);
    $data = array('power'=>$powername);
    $this->db->update('yb_group',$data);


  }

}
?>
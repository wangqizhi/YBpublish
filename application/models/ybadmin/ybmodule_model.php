<?php
class Ybmodule_model extends CI_Model {

	//table:yb_module
	//id、module_name/show_name/level/href/parent/important/power_group

  public function __construct()
  {
    $this->load->database();
  }

  public function get_module_where($level="")
  {
    $this->db->order_by('serial' ,'asc');

    if ($level=="") {
      $query = $this->db->get('yb_module');
    } else {
      $query = $this->db->get_where('yb_module',array('level'=>$level));
    }
    
    
    return $query->result_array();
  }
  

  //插入权限
  public function insert_module()
  {
    $data = array(
      'module_name' => $this->input->post('module_name'),
      'show_name' => $this->input->post('show_name'),
      'level' => $this->input->post('level'),
      'href' => $this->input->post('href'),
      'parent' => $this->input->post('parent'),
      'important' => $this->input->post('important'),
      'power_group' => $this->input->post('power_group'),
      'serial' => $this->input->post('serial'),
      'has_child' => $this->input->post('has_child'),
    );
    return $this->db->insert('yb_module', $data);
  }

}
?>
<?php
class Ybmodule_model extends CI_Model {

	//table:yb_module
	//id、module_name/show_name/level/href/parent/important

  public function __construct()
  {
    $this->load->database();
  }

  public function get_power_num()
  {
    $powername = $this->input->post('powername');
  	$powerurl = $this->input->post('powerurl');
  	$query = $this->db->get_where('yb_power',array('powername'=>$powername,'powerurl'=>$powerurl));
  	
  	
  	// var_dump($query);exit;
  	return $query->num_rows;

  }


  //返回所有的权限名
  public function get_powers()
  {
    $this->db->distinct();
    $this->db->select('powername');
    $query = $this->db->get('yb_power');
    // var_dump($query->resulit_array());exit;
    return $query->result_array();
  }

  

  //插入权限
  public function insert_power()
  {
    $data = array(
      'powername' => $this->input->post('powername'),
      'powerurl' => $this->input->post('powerurl'),
    );
    return $this->db->insert('yb_power', $data);
  }

}
?>
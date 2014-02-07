<?php
class Pbadmin_model extends CI_Model {

	//table:yb_publish_flow
	//id、flow_name、flow_rule、share_who、creater

  public function __construct()
  {
    $this->load->database();
  }


  // 获取指定组的flow列表，如果不设置组名，则返回false
  public function get_flow($group="")
  {
    if ($group =="") {
      return false;
    }
    $query = $this->db->get_where('yb_publish_flow',array('share_who'=>$group));
    return $query->result_array();

  }


  //插入管理信息
  public function insert_publish_flow()
  {
    $flow_name = $this->input->post('flow_name');
    $share_who = $this->input->post('share_who');
    $query = $this->db->get_where('yb_publish_flow',array('flow_name'=>$flow_name,'share_who'=>$share_who));
    
    $data = array(
      'flow_name' => $flow_name,
      'flow_rule' => $this->input->post('flow_rule'),
      'share_who' => $share_who,
      'creater' => $this->input->post('creater'),
    );
     if ($query->num_rows >= 1) {
      return 0;//有重复值
    }
    $this->db->insert('yb_publish_flow',$data);
    return 1;//ok


  }

}
?>
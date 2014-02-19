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



  // 获取指定flow_name的flow列表，如果不设置组名，则返回false
  public function get_flow_by_name($name="")
  {
    if ($name =="") {
      return false;
    }
    $query = $this->db->get_where('yb_publish_flow',array('flow_name'=>$name));
    return $query->result_array();

  }


  public function get_distinct_flow_name()
  {
    $this->db->select('flow_name');
    $this->db->distinct();
    $query = $this->db->get('yb_publish_flow');
    return $query->result_array();

  }


  //检查是否有flow的权限，如果不设置组名，则返回false，存在权限返回true
  public function check_flow_power($group="")
  {
    // echo $group;
    // echo $this->input->post('flow_name');
    if ($group =="") {
      return false;
    }
    $query = $this->db->get_where('yb_publish_flow',array('share_who'=>$group,
      'flow_name'=>$this->input->post('flow_name')));
      // 'flow_name'=>'2'));
    // var_dump($query);exit;
    if ($query->num_rows >= 1) {
      return true;
    } else {
      return false;
    }
    
  }


  //插入管理信息
  public function insert_publish_flow()
  {
    $flow_name = $this->input->post('flow_name');
    $share_who = $this->input->post('share_who');
    if ($share_who=="") {
      $share_who = "template";  
    }
    

    $flow_rule = str_replace(" ", "", $this->input->post('flow_rule'));

    $query = $this->db->get_where('yb_publish_flow',array('flow_name'=>$flow_name,'share_who'=>$share_who));
    
    $data = array(
      'flow_name' => trim($flow_name),
      'flow_rule' => $flow_rule,
      'share_who' => $share_who,
      'creater' => $this->input->post('creater'),
    );
    if ($query->num_rows >= 1) {
      return 0;//有重复值
    }
    $this->db->insert('yb_publish_flow',$data);
    return 1;//ok
  }

  public function insert_publish_flow_args($flow_name,$flow_rule,$share_who,$creater)
  {
    $query = $this->db->get_where('yb_publish_flow',array('flow_name'=>$flow_name,'share_who'=>$share_who));

    if ($flow_name=="" or $flow_rule=="" or $share_who=="" or $creater=="") {
      return -1;//有空值
    }
    $data = array(
      'flow_name' => $flow_name,
      'flow_rule' => $flow_rule,
      'share_who' => $share_who,
      'creater' => $creater,
    );
    if ($query->num_rows >= 1) {
      return 0;//有重复值
    }
    $this->db->insert('yb_publish_flow',$data);
    return 1;//ok
  }


}
?>
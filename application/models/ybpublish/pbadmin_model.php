<?php
class Pbadmin_model extends CI_Model {

	//table:yb_publish_flow
	//id、flow_name、s_dir、d_dir、flow_acl、power_group

  public function __construct()
  {
    $this->load->database();
  }

  public function insert_check()
  {
    $flow_name = $this->input->post('flow_name');
    $s_dir = WORKDIR.$this->input->post('s_dir');
    $d_dir = WORKDIR.$this->input->post('d_dir');
    if (!file_exists($s_dir)) {
      return 4;//源目录不存在
    }
    if (!file_exists($d_dir)) {
      return 5;//目的目录不存在
    }
    //后续需要添加acl，以支持不同acl，相同目录结构的发布流
    $query = $this->db->get_where('yb_publish_flow',array('flow_name'=>$flow_name));
    if($query->num_rows >= 1){
      return 2;//重复发布流名称
    }
    $query_2 = $this->db->get_where('yb_publish_flow',array('s_dir'=>$flow_name,'d_dir'=>$d_dir));
    if($query_2->num_rows >= 1 or $s_dir == $d_dir){
      return 3;//重复发布起始和目的
    }
    return 1;//ok

  }


  //插入管理信息
  public function insert_publish_flow()
  {
    $data = array(
      'flow_name' => $this->input->post('flow_name'),
      's_dir' => WORKDIR.$this->input->post('s_dir'),
      'd_dir' => WORKDIR.$this->input->post('d_dir'),
      'flow_acl' => $this->input->post('flow_acl'),
      'power_group' => $this->input->post('power_group')
    );
    $repeat_result  = self::insert_check();
    if ($repeat_result == 2) {
      return 2;//重复发布流名称

    } elseif($repeat_result == 3) {
      return 3;//重复发布起始和目的
    }elseif($repeat_result ==1){
      $this->db->insert('yb_publish_flow', $data);
      return 1;

    }elseif($repeat_result ==4){
      return 4;

    }elseif ($repeat_result ==5 ) {
      return 5;
    }
    
  }

}
?>
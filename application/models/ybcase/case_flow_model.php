<?php
class Case_Flow_model extends CI_Model {

	//table:yibancase_subject_flow
	//id、type_name、template_id、flow_name、flow、power、create_time

  public function __construct()
  {
    $this->load->database();
  }



//set flow
  public function insert_case_flow($type_name = "0",$template_id,$flow_name,$flow,$power="template")
  {
  	$type_name = "0";//temp,之后添加模块相关内容
  	$template_id = $template_id;
  	$flow_name = $flow_name;
  	$flow = $flow;
  	$power = $power;
  	$create_time = date('YmdHis');
  	$data = array(
  		'type_name'=>$type_name,
  		'template_id'=>$template_id,
  		'flow_name'=>$flow_name,
  		'flow'=>$flow,
  		'power'=>$power,
  		'create_time'=>$create_time
  		);
  	$query = $this->db->get_where('yibancase_subject_flow',array('flow_name'=>$flow_name,'power'=>$power));

  	if ($query->num_rows >=1) {
  		return array(0,"flow is exists");// set flow failed
  	}
  	$this->db->insert('yibancase_subject_flow',$data);
  	$query2 = $this->db->get_where('yibancase_subject_flow',$data);
  	if ($query2->num_rows = 1) {
  		return array(1,"ok");// set flow
  	}else{
  		return array(0,"flow set failed");// set flow failed
  	}
  }


//give all power
  public function flow_give_power($power_group='')
  {
  	$query = $this->db->get_where('yibancase_subject_flow',array('power'=>'template'));
  	// return $query->result_array();
  	foreach ($query->result_array() as $data) {
  		# code...
  		$data['power'] = $power_group;
  		unset($data['id']);
  		$this->db->insert('yibancase_subject_flow',$data);
  	}
  	return 'insert over';
  }

  //get flow
  public function get_flow_by_what($what=array())
  {
  	$query = $this->db->get_where('yibancase_subject_flow',$what);
  	return $query->result_array();
  }

}
?>
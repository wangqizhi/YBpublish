<?php
class Case_model extends CI_Model {

	//table:yibancase_case
	//id、flow_id、case_content、sendmail_to、current_step、status、create_time

  public function __construct()
  {
    $this->load->database();
  }

  public function insert_case($flow_id,$case_content,$sendmail_to)
  {
  	$data = array(
  		'flow_id'=>$flow_id,
  		'case_content'=>$case_content,
  		'sendmail_to'=>$sendmail_to,
  		'current_step'=>0,#$current_user,
  		'status'=>1,
  		'create_time'=>date('YmdHis')
  		);
  	$this->db->insert('yibancase_case',$data);
  	$query = $this->db->get_where('yibancase_case',$data);
  	if ($query->num_rows == 1 ) {
  		return array(1,$query->result_array()[0]['id']);
  	} else {
  		return array(0,'insert failed');
  	}
  }

  //get case
  public function get_case($what=array())
  {
    $query = $this->db->get_where('yibancase_case',$what);
    return $query->result_array();
  }

  //get case num
  public function get_case_num($id_array=array())
  {
    foreach ($id_array as $flow_id) {
      $this->db->or_where('flow_id',$flow_id);
    }
    return $this->db->count_all_results('yibancase_case');
  }

  //get case by flow_id
  public function get_case_by_flow_id($id_array=array(),$status='')
  {
    
    
    foreach ($id_array as $flow_id) {
      $this->db->or_where('flow_id',$flow_id);
    }

    if ($status=='') {
      $this->db->where('status',1);
    } elseif($status==-1){
      // $this->db->where('status',1);
      
    }elseif($status==2) {
      $this->db->where('status',2);
    } elseif($status==3) {
      $this->db->where('status',3);
    }
    $this->db->order_by('create_time','desc');
    $this->db->limit(5);
    $query = $this->db->get('yibancase_case');
    return $query->result_array();
  }

  //update case
  public function update_case($case_id,$what_update=array())
  {
    $data = $what_update;
    $this->db->where('id',$case_id);
    $this->db->update('yibancase_case',$data);
  }


}
?>
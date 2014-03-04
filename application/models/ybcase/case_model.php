<?php
class Case_model extends CI_Model {

	//table:yibancase_case
	//id、flow_id、case_content、sendmail_to、current_user、status、create_time

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
  		'current_user'=>0,#$current_user,
  		'status'=>1,
  		'create_time'=>date('YmdHis')
  		);
  	$this->db->insert('yibancase_case',$data);
  	$query = $this->db->get_where('yibancase_case',$data);
  	if ($query->num_rows == 1 ) {
  		return array(1,'insert failed');
  	} else {
  		return array(0,'insert failed');
  	}
  	
  	
  }



}
?>
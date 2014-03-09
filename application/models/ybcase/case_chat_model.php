<?php
class Case_Chat_model extends CI_Model {

	//table:yibancase_subject_chat
	//id,case_id,from_userid,content,stat,create_time

	public function __construct()
	{
    	$this->load->database();
  	}

  	//set chat
  	public function insert_case_chat($case_id,$usernick,$content)
  	{
  		$data = array(
  			'case_id'=>$case_id,
  			'from_userid'=>$usernick,
  			'content'=>$content,
  			'state'=>1,
  			'create_time'=>date('YmdHis') 
  			);
  		$this->db->insert('yibancase_subject_chat',$data);
  	}

  	//get chat by case_id
  	public function get_case_chat_by_caseid($caseid='')
  	{
  		$this->db->order_by('create_time');
  		$query = $this->db->get_where('yibancase_subject_chat',array('case_id'=>$caseid));
  		return $query->result_array();
  	}

}
?>

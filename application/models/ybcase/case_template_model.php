<?php
class Case_Template_model extends CI_Model {

	//table:yibancase_subject_flow
	//id、flow_name、flow_rule、share_who、creater

  public function __construct()
  {
    $this->load->database();
  }


// get template
  public function get_case_template($template_name='')
  {
  	if ($template_name=='') {
  		return array(0,'not set value');//not set value
  	}
  }

// set template
  public function inset_case_template()
  {
  	$sbj_name = $this->input->post('sbj_name');
  	$sbj_content = $this->input->post('sbj_content');
  	$data = array(
  		'sbj_name'=>$sbj_name,
  		'sbj_content'=>$sbj_content
  		);
  	$this->db->insert('yibancase_subject_flow',$data);
  	$query = $this->db->get('yibancase_subject_flow',$data);
  	if ($query->num_rows < 1 ) {
  		return array(0,'set template failed');// set template failed
  	}
  	return array(1,'ok');//set is ok
  }

}
?>
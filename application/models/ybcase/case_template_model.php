<?php
class Case_Template_model extends CI_Model {

	//table:yibancase_subject_template
	//id、sbj_name、sbj_content/create_time

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
    $query = $this->db->get_where('yibancase_subject_template',array('sbj_name'=>$template_name));
    // var_dump($query->result_array());exit;
    if ($query->num_rows < 1) {
      return array(0,'template not exists');//not set value
    }
    return array(1,$query->result_array());
  }

  public function get_case_template_byid($id='')
  {
    $query = $this->db->get_where('yibancase_subject_template',array('id'=>$id));
    return $query->result_array();
  }

  public function get_all_case_template_name()
  {
  	$this->db->select('sbj_name');
  	$query = $this->db->get('yibancase_subject_template');
  	return $query->result_array();
  }

// set template
  public function inset_case_template()
  {
  	
  	$sbj_name = trim($this->input->post('sbj_name'));
  	$sbj_content = trim($this->input->post('sbj_content'));
  	$sbj_content =implode(explode("\n", $sbj_content), "-");
  	$query = $this->db->get_where('yibancase_subject_template',array('sbj_name'=>$sbj_name));
  	// var_dump($query->result_array());exit;
  	if ($query->num_rows >= 1 ) {
  		// return array(0,"template is exists");// set template failed
  		return array(0,"template is exists");// set template failed
  	}
  	$data = array(
  		'sbj_name'=>$sbj_name,
  		'sbj_content'=>$sbj_content,
      'create_time'=>date('YmdHis')
  		);
  	$this->db->insert('yibancase_subject_template',$data);
  	$query2 = $this->db->get_where('yibancase_subject_template',$data);
  	if ($query2->num_rows < 1 ) {
  		return array(0,'set template failed');// set template failed
  	}
  	return array(1,'ok');//set is ok
  }

}
?>
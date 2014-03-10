<?php 
class Case_Index extends CI_Controller {

	var $data= array("system_title"=>"Case_System");
	public function __construct()
  {
    parent::__construct();
    $this->load->model('ybadmin/ybmodule_model');
    $this->load->model('ybadmin/ybuser_model');
    $this->load->model('ybcase/case_flow_model');
    $this->load->model('ybcase/case_template_model');
    $this->load->model('ybcase/case_model');
    $this->load->model('ybcase/case_chat_model');
  	log_message('debug','---Case Controller Construct Successful');

  }

  public function nav_index()
  {
    $data['case_level_1'] = $this->ybmodule_model->get_module_where('case-1');
    $this->load->view('ybcase/ybcase_nav',$data);
  }

  public function index()
  {
    // $this->output->enable_profiler(TRUE);

  	$data = $this->data;
	  $this->load->view('templates/header_semantic',$data);
  	$this->load->view('ybcase/ybcase_res');
	  $this->load->view('templates/header2');
    $this->nav_index();

    $case_id = $this->input->get('case_id');

    //获取所有有权限的flowid
    $all_flows = $this->case_flow_model->get_flow_by_flow_user('-'.$this->session->userdata['uname'].'+');
    $all_flow_id = array();
    foreach ($all_flows as $one_flow) {
      array_push($all_flow_id, $one_flow['id']);
    }
    $case_num = $this->case_model->get_case_num($all_flow_id);
    $all_case = $this->case_model->get_case_by_flow_id($all_flow_id);
    $all_case_finished = $this->case_model->get_case_by_flow_id($all_flow_id,2);
    $all_case_break = $this->case_model->get_case_by_flow_id($all_flow_id,3);
    // var_dump($all_case);
    $data['cases']=array(
      'all_case'=>$all_case,
      'all_case_finished'=>$all_case_finished,
      'all_case_break'=>$all_case_break,
      );
    // $this->case_model->get_case(array(''));
    if (sizeof($all_case)==0) {
      $data['current_user'] = -1;
      $data['case_one'] = array();
      $data['all_chat'] = array();
    } else if ($case_id == '' ) {
      $flow_info = $this->case_flow_model->get_flow_by_what(array('id'=>$all_case[0]['flow_id']));
      $flow = $flow_info[0]['flow'];

      $all_step = sizeof(explode('+', $flow))-1;
      if ($all_case[0]['current_step'] < $all_step) {
        $temp_user = explode('+', $flow)[$all_case[0]['current_step']];
        $data['current_user'] = explode('-', $temp_user)[1];
      } else {//如果流程结束的话，不显示输入框
        $data['current_user'] = -1;
      }
      
      $data['case_one'] = $all_case[0];
      $data['all_chat'] = $this->case_chat_model->get_case_chat_by_caseid($all_case[0]['id']);

    } else {
      $cases_byid = $this->case_model->get_case(array('id'=>$case_id));
      if(sizeof($cases_byid)!=0 and in_array($cases_byid[0]['flow_id'], $all_flow_id)){

        $flow_info = $this->case_flow_model->get_flow_by_what(array('id'=>$cases_byid[0]['flow_id']));
        $flow = $flow_info[0]['flow'];

        $all_step = sizeof(explode('+', $flow))-1;
        if ($cases_byid[0]['current_step'] < $all_step) {
          $temp_user = explode('+', $flow)[$cases_byid[0]['current_step']];
          $data['current_user'] = explode('-', $temp_user)[1];
        } else {//如果流程结束的话，不显示输入框
          $data['current_user'] = -1;
        }

        $data['case_one'] = $cases_byid[0];
        $data['all_chat'] = $this->case_chat_model->get_case_chat_by_caseid($cases_byid[0]['id']);
      }else{
        $data['current_user'] = -1;
        $data['case_one'] = array();
        $data['all_chat'] = array();
      }
      // var_dump($cases_byid);exit;
    }
    $this->load->view('ybcase/ybcase_index',$data);
	  $this->load->view('templates/footer');
  }

  public function case_start()
  {
    $data = $this->data;
    $userinfo = $this->ybuser_model->get_user_group($this->session->userdata('uname'));
    $what = array('power'=>$userinfo[0]['group']);
    // var_dump($what);exit;
    $data['flows'] = $this->case_flow_model->get_flow_by_what($what);
    $this->load->view('templates/header_semantic',$data);
    $this->load->view('ybcase/ybcase_res');
    $this->load->view('templates/header2');
    $this->nav_index();
    $this->load->view('ybcase/ybcase_start',$data);
    $this->load->view('templates/footer');
  }

  public function id_search()
  {
    $data = $this->data;
    $args = $this->input->get('id');
    if ($args=='') {
      show_404();
    }else{
      $what = array('id'=>$args);
      $data['flow_info'] = $this->case_flow_model->get_flow_by_what($what);
      $data['template_info'] = $this->case_template_model->get_case_template_byid($data['flow_info'][0]['template_id']);
      // var_dump($data['template_info']);
      $this->load->view('templates/header_semantic',$data);
      $this->load->view('ybcase/ybcase_res');
      $this->load->view('templates/header2');
      $this->nav_index();
      $this->load->view('ybcase/ybcase_start_detail',$data);
      $this->load->view('templates/footer');

    }
  }

  public function start_case()
  {
    $flow_name  = $this->input->post('flow_name');
    $userinfo = $this->ybuser_model->get_user_group($this->session->userdata('uname'));

    // var_dump($flow_name);exit;
    $what = array('flow_name'=>$flow_name,'power'=>$userinfo[0]['group']);
    $flows = $this->case_flow_model->get_flow_by_what($what);
    if (sizeof($flows)==0) {
      $out = json_encode(array('r'=>false,'a'=>'wrong power'));
      return $this->output->set_content_type('application/json')->set_output($out);
      
    }
    $template_info = $this->case_template_model->get_case_template_byid($flows[0]['template_id']);
    
    $email_who  = trim($this->input->post('email_who'));
    $all_temp_size  = $this->input->post('all_temp_size');
    $all_temp_val  = $this->input->post('all_temp_val');
    $all_temp_val_array = explode('-&*&-', $all_temp_val);
    $temp_content_array = explode('-', $template_info[0]['sbj_content']);
    if (sizeof($all_temp_val_array)-1 != sizeof($temp_content_array)) {
      $out = json_encode(array('r'=>false,'a'=>'wrong args'));
      return $this->output->set_content_type('application/json')->set_output($out);
    }
    
    $first_flow = explode('+', $flows[0]['flow'])[0];
    $first_flow_array = explode('-', $first_flow);
    if ($first_flow_array[0] == 'set_who') {

      $first_user = $first_flow_array[1];
    } else {
      $first_user = 0;
    }
    

    $result = $this->case_model->insert_case($flows[0]['id'],$all_temp_val,$email_who);
    if ($result[0] == 1) {
      $out = json_encode(array('r'=>true,'a'=>'ok'));
      //插入chat表-xxx开启了流程
      $this->case_chat_model->insert_case_chat($result[1],$this->session->userdata('uname'),'Start Case-start');
      // $this->email->from(MAILADDR, MAILNAME);
      // $this->email->to('wqz@yiban.cn'); 
      // $this->email->cc('wqz@yiban.cn'); 
      // $this->email->bcc('wqz@yiban.cn'); 
      // $this->email->subject('Email Test1111');
      // $this->email->message('Testing the email class.1111'); 
      // $this->email->send();
    } else {
      $out = json_encode(array('r'=>false,'a'=>$result[1]));
    }
    return $this->output->set_content_type('application/json')->set_output($out);
    
  }

  // 处理case的action
  public function deal_with_case()
  {
    $case_id = $this->input->post('case_id');
    
    // echo $case_id;exit;
    $cases_byid = $this->case_model->get_case(array('id'=>$case_id));
    // var_dump($cases_byid);exit;

    $flow_info = $this->case_flow_model->get_flow_by_what(array('id'=>$cases_byid[0]['flow_id']));
    $flow = $flow_info[0]['flow'];
    //验证流程是否走完
    $all_step = sizeof(explode('+', $flow))-1;
    if ($cases_byid[0]['current_step']+1 > $all_step) {
      $out = json_encode(array('r'=>false,'a'=>'flow is over'));
      return $this->output->set_content_type('application/json')->set_output($out);
    }
    
    $temp_user = explode('+', $flow)[$cases_byid[0]['current_step']];
    $current_user = explode('-', $temp_user)[1];
    //验证权限是否正确
    if ($this->session->userdata['uname']!=$current_user) {
      $out = json_encode(array('r'=>false,'a'=>'You don\'t have Power'));
      return $this->output->set_content_type('application/json')->set_output($out);
    }
    $case_content = $this->input->post('case_content');
    $action = $this->input->post('action');
    if ($action=='play') {
      $this->case_chat_model->insert_case_chat($case_id,$this->session->userdata('uname'),'Approve Case-'.$case_content);
      $update_step =$cases_byid[0]['current_step']+1;
      if (explode('+', $flow)[$update_step]=='') {
        $update_array= array(
          'current_step'=>$update_step,
          'status'=>2
          );
      } else {
        $update_array= array(
          'current_step'=>$update_step,
          );
      }
      $this->case_model->update_case($case_id,$update_array);
      $front_html = '
      <div class="event">
        <div class="label">
          <i class="circular pencil icon"></i>
        </div>
        <div class="content">
          <div class="summary">
            <a>'.$this->session->userdata('uname').'</a>:  Approve Case-
          </div>
          <div class="date">'.date('Y-m-d H:i:s').'</div>
          <div class="extra text">'.$case_content.'</div>
        </div>
      </div>';
      $out = json_encode(array('r'=>true,'a'=>$front_html));
    } elseif($action=='stop') {
      $this->case_chat_model->insert_case_chat($case_id,$this->session->userdata('uname'),'Reject Case-'.$case_content);
      $update_step =sizeof(explode('+', $flow));
      $update_array= array(
          'current_step'=>$update_step,
          'status'=>3
          );
      $front_html = '
      <div class="event">
        <div class="label">
          <i class="circular pencil icon"></i>
        </div>
        <div class="content">
          <div class="summary">
            <a>'.$this->session->userdata('uname').'</a>:  Reject Case-
          </div>
          <div class="date">'.date('Y-m-d H:i:s').'</div>
          <div class="extra text">'.$case_content.'</div>
        </div>
      </div>';
      $this->case_model->update_case($case_id,$update_array);
      $out = json_encode(array('r'=>true,'a'=>$front_html));
    }
    return $this->output->set_content_type('application/json')->set_output($out);

    
  }

}
?>
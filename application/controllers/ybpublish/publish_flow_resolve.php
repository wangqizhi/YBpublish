<?php 
class Publish_Flow_Resolve extends CI_Controller {
	public function __construct()
  	{
    	parent::__construct();
      $this->load->model('ybadmin/ybgroup_model');
    	$this->load->model('ybadmin/ybuser_model');
    	$this->load->model('ybpublish/pbdirpower_model');
    	$this->load->model('ybpublish/pbadmin_model');
  	}

    //处理flow的对外接口
  	public function index()
  	{
      // $this->output->enable_profiler(TRUE);

      $flow_name = $this->input->post('flow_name');
      $result_array = array();
      $user_group = $this->ybuser_model->get_user_group($this->session->userdata('uname'));
      

      //验证输入项不能为空
      if(empty($flow_name)){
        $result_array = array('r'=>false,'a'=>'flow_name is empty');
      // }elseif(!$this->pbadmin_model->check_flow_power($user_group[0]['group'])){
      }elseif(!$this->pbadmin_model->check_flow_power($user_group[0]['group'])){
        $result_array = array('r'=>false,'a'=>'power is wrong');
      }elseif(!empty($flow_name))
      {
        $result_array = self::deal_with_flow();

      }else{
        $result_array = array('r'=>false,'a'=>'unknow wrong happened');

      }
      return $this->output->set_content_type('application/json')->set_output(json_encode($result_array));

  	}

    public function test()
    {
      echo "test";

      $test = $this->pbdirpower_model->get_real_path('backup_yiban')[0]['real_path'];
      // $test2 = implode("\n", $test);
      var_dump($test);
    }

    //处理规则，不会被前端直接调用
    /*
    *自定义函数规则
    *函数名以yb_开头
    *参数，一个数组
    *返回值 类型：array  是否为真：array['r'] 返回值:array['a'] 是否继续执行，0时flow会跳出array['goon']
    */
    public function deal_with_flow()
    {
      $flow_name = $this->input->post('flow_name');
      $flow_input_raw = $this->input->post('flow_input_raw');

      //权限限制
      // $user_group = $this->ybuser_model->get_user_group($this->session->userdata('uname'));
      // $user_all_flow = $this->pbadmin_model->get_flow($user_group[0]['group']);
      // var_dump($user_all_flow);exit;

      $flow_result = array();
      $flow_rule= $this->pbadmin_model->get_flow_by_name($flow_name)[0]['flow_rule'];

      $last_result =array();//上次函数执行的结果，默认为false
      $last_message=array(); //上次函数执行的消息，默认为空

      if ($flow_rule =="") {
        return array('r'=>false,'a'=>"flow rule is empty");
      }

      $flow_rule_array = explode('-',$flow_rule);
      foreach ($flow_rule_array as $each_flow_rule) {
        // echo $each_flow_rule;continue;
        //修复获取到的函数为空的问题
        if ($each_flow_rule =="") {
          continue;
        }

        //验证调用的类方法是否存在
        if(!method_exists('Publish_Flow_Resolve','yb_'.explode("(", $each_flow_rule)[0]))
        {
          return array('r'=>false,'a'=>'Rule:'.explode("(", $each_flow_rule)[0].' is not exist');
          // return array('r'=>false,'a'=>'self::yb_'.explode("(", $each_flow_rule)[0]);
        }

        //参数字符串形式
        $args_string = explode("(", $each_flow_rule)[1];


        //特殊参数$input替换(******后期需要改进，使用preg_match_all来进行正则匹配比较有意义)
        if (strstr($args_string,'$input')) {
          //遇到参数$input会被替换成等号后面的内容 - 过滤了前后空格。
          $input_replace = trim($flow_input_raw);
          $args_string = str_replace('$input', $input_replace,$args_string);
        }

        //特殊参数$dir处理
        if (strstr($args_string,'$dir')) {
          $dir_replace = trim($flow_input_raw);
          // return array('r'=>false,'a'=>'Dir :'.WORKDIR.trim($dir_replace,'/'));

          if (!is_dir(WORKDIR.trim($dir_replace,'/'))) {
            return array('r'=>false,'a'=>'Dir :'.$dir_replace.' Not Exist');
            // return array('r'=>false,'a'=>'afsdafdsafsdfsad');
          }
          $temp_array = ls_dir(WORKDIR.trim($dir_replace,'/'));
          if (sizeof($temp_array) === 0) {
            # code...
            return array('r'=>false,'a'=>'Dir:'.$dir_replace.' Not Have File');

          }
          $dir_replace = str_replace(WORKDIR.trim($dir_replace,'/'),"",implode("\n", $temp_array));
          $args_string = str_replace('$dir', $dir_replace,$args_string);

        }


        // return array('r'=>'test','a'=>explode("(", $each_flow_rule)[1]);

        //把参数转化为数组传入函数，为了解决参数数量的问题
        $args = explode(',',$args_string);


        // var_dump('yb_'.explode("(", $each_flow_rule)[0]);
          // continue;
        //调用函数（*****后期需要改进，增加执行函数的安全限制）
        $result_array = call_user_func(array('Publish_Flow_Resolve','yb_'.explode("(", $each_flow_rule)[0]),$args);

        //如果返回值goon是0，则直接退出流程，返回结果
        if ($result_array['goon'] == 0) {
          return $result_array;
        }

        $last_result[] =$result_array['r'];
        $last_message[]=$result_array['a']; 
      }
      $last_message_out = implode('<br>', $last_message);

      //若所有函数执行通过，则表示发布成功
      return array('r'=>true,'a'=>$last_message_out);
    }

    //输入过滤
    public function input_filter($input_raw='')
    {
      // return array('1','2');
      if (empty($input_raw)) {
        return false;//输入为空时返回错误
      }
      $input_array = explode("\n",$input_raw);
      // return $input_array;
      $result_array = array();
      foreach ($input_array as $input) {
        if ($input=="") {
          continue;
        }

        $result_array[] = '/'.ltrim(trim($input),'/');
      }
      if (empty($result_array)) {
        return false;//输入为空时返回错误
      }else{
        return array_unique($result_array);
      }
    }


    //备份功能
    public function yb_backup($args=array())
    {
      //验证参数个数，不对的话直接报错
      if (sizeof($args)!=3) {
        return array('r'=>false,'a'=>'Rule-backup : args have wrong number','goon'=>0);

      }

      $input_files = self::input_filter($args[0]);
      $backup_dir = $this->pbdirpower_model->get_real_path($args[1])[0]['real_path'];
      $d_dir = $this->pbdirpower_model->get_real_path($args[2])[0]['real_path'];
      // echo $args[1];
      // var_dump($this->pbdirpower_model->get_real_path('backup_yiban'));
      // return array('r'=>false,'a'=>'show:'.$backup_dir,'goon'=>0);

      //检查input是否为空
      if (empty($input_files)) {
        return array('r'=>false,'a'=>'Rule-backup : Empty Input','goon'=>0);
        
      }

      //检查权限目录是否存在
      if ($d_dir=="" || $backup_dir=="") {
        log_message('debug','****Dir：'.$d_dir.' or '.$backup_dir.' Not Exist');
        return array('r'=>false,'a'=>'Rule-backup : Dir Power Not Exist '.$d_dir.'--test','goon'=>0);

      }

      $backup_version = date('YmdHis');
      //确认备份文件夹已经生成，如果已经生成，提示稍等再备份
      if (is_dir(WORKDIR.trim($backup_dir,'/').'/'.$backup_version)) {
        return array('r'=>false,'a'=>'Rule-backup : Backup Wrong,wait a moment ','goon'=>0);
      }

      //备份 过程
      foreach ($input_files as $input_file) {
        $check_dir =dirname(trim($backup_dir,'/').'/'.$backup_version.$input_file);

        if (!is_dir(WORKDIR.$check_dir)) {
          $temp_result =$this->yb_sh->sh_mkdir($check_dir);
        // log_message('debug','************helloworld*****'.$temp_result);

          if ($temp_result == 2) {
            return array('r'=>false,'a'=>'Rule-backup : Mkdir: '.$check_dir.' failed','goon'=>0);
          }
        }
        if (is_file(WORKDIR.trim($d_dir,'/').$input_file)){
          $sh_result = $this->yb_sh->sh_cp(trim($d_dir,'/').$input_file,trim($backup_dir,'/').'/'.$backup_version.$input_file);
        }else{
          $sh_result = '1';
          log_message('debug','---File:'.$input_file.' Not Need Backup');

        }
        // return array('a'=>var_dump($sh_result),'goon'=>0);
        if ($sh_result!='1') {
          return array('r'=>false,'a'=>'Rule-backup : File:'.$input_file.' copy failed because '.$sh_result,'goon'=>0);
        }
      }
      return array('r'=>true,'a'=>'Version: '.$backup_dir.'/'.$backup_version.' Backup Successful','goon'=>1);
    }




    //copy功能,2个参数：输入，源目录，目标目录
    public function yb_copy($args=array())
    {

      //验证参数个数，不对的话直接报错
      if (sizeof($args)!=3) {
        return array('r'=>false,'a'=>'Rule-copy : args have wrong number','goon'=>0);

      }

      $input_files = self::input_filter($args[0]);
      $s_dir = $this->pbdirpower_model->get_real_path($args[1])[0]['real_path'];
      $d_dir = $this->pbdirpower_model->get_real_path($args[2])[0]['real_path'];
      // log_message('debug','****：'.$args[2]);
      

      //检查input是否为空
      if (empty($input_files)) {
        return array('r'=>false,'a'=>'Rule-Copy : Empty Input','goon'=>0);
        
      }

      //检查权限目录是否存在
      if ($s_dir=="" or $d_dir=="") {
        log_message('debug','****Dir：'.$s_dir.' or '.$d_dir.' Not Exist');

        return array('r'=>false,'a'=>'Rule-Copy : Dir Power Not Exist','goon'=>0);

      }

      


      //检查工作目录是否真实存在
      if(!is_dir(WORKDIR.$s_dir) or !is_dir(WORKDIR.$d_dir)){
        return array('r'=>false,'a'=>'Rule-copy : Dir Not Exist','goon'=>0);

      }

      //检查不存在的源文件
      $bad_inputs= array();//源文件不存在的
      foreach ($input_files as $input_file) {
        //检查源文件是否存在
        if (!is_file(WORKDIR.trim($s_dir,'/').'/'.$input_file)) {
          $bad_inputs[] = trim($input_file,'/');
        }
      }
      if (sizeof($bad_inputs) > 0) {
        $bad_inputs_out = implode("、", $bad_inputs);

        return array('r'=>false,'a'=>'Rule-copy : Src_file:'.$bad_inputs_out.' Not Exist','goon'=>0);
      }

      //文件copy部分
      $right_copy_files=array();
      foreach ($input_files as $input_file) {
        $check_dir =dirname(trim($d_dir,'/').$input_file);
        if (!is_dir(WORKDIR.$check_dir)) {
          $temp_result =$this->yb_sh->sh_mkdir($check_dir);
        // log_message('debug','************helloworld*****'.$temp_result);

          if ($temp_result == 2) {
            return array('r'=>false,'a'=>'Rule-copy : mkdir: '.$check_dir.' failed','goon'=>0);
          }
         } 
        $sh_result = $this->yb_sh->sh_cp(trim($s_dir,'/').$input_file,trim($d_dir,'/').$input_file);
        // return array('a'=>var_dump($sh_result),'goon'=>0);
        if ($sh_result!='1') {
          return array('r'=>false,'a'=>'File:'.$input_file.' copy failed because '.$sh_result,'goon'=>0);
        }
        $right_copy_files[] = trim($input_file,'/'); 
      }      

      $right_copy_files_out=implode("、", $right_copy_files);
      return array('r'=>true,'a'=>'Copy Files:'.$right_copy_files_out.' Successful','goon'=>1);
    }

    //打印传入的参数
    public function yb_echo($args=array())
    {
      return array('r'=>true,'a'=>$args[0],'goon'=>0);
    }

    //回退功能
    public function yb_rollback($args=array())
    {
      # code...
    }




}
?>
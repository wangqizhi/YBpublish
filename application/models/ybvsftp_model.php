<?php
class YbVsFTP_model extends CI_Model {

	//database:vsftpd
	//table:users
	//name,passwd
  	public function __construct()
  	{
    	$db_ftp = $this->load->database("vsftpd",TRUE);
    	$this->db_ftp = $db_ftp;
  	}

  	public function get_user()
  		{
  			echo "test";
  		}


 	public function insert_ftp_user($name,$passwd)
  	{
  		// $name = "wqz";
  		$passwd = md5($passwd);
  		$data = array(
  			"name"=>$name,
  			"passwd"=>$passwd
  			);
  		$result = $this->db_ftp->get_where('users',array("name"=>$name));
  		if ($result->num_rows > 0) {
  			return false;
  			# code...
  		}
  		$this->db_ftp->insert('users',$data);
  		return true;
  }

}
?>
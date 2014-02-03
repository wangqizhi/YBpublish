<?php
class Tools extends CI_Controller {

  public function message($to = 'World')
  {
  	$this->input->is_cli_request();
    echo "Hello {$to}!".PHP_EOL;
  }
}
?>
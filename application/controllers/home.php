<?php

class Home extends MY_Controller {

	function __construct()
	{
		parent::__construct();	
	}
	
	function index()
	{
		$this->load->view('welcome_message');
	}
}

/* End of file welcome.php */
/* Location: ./system/application/controllers/welcome.php */
?>
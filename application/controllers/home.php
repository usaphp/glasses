<?php

class Home extends MY_Controller {

	function __construct()
	{
		parent::__construct();	
	}
	
	function index()
	{
        $this->template->load('/templates/home_page_template', 'home/roller',$this->data);
	}
}

/* End of file welcome.php */
/* Location: ./system/application/controllers/welcome.php */
?>
<?php

class Brands extends Admin_Controller {
	function __construct()
	{
		parent::__construct();
        $this->main_model = new Brand();             	
	}
	
	function index()
	{
		$this->show();
	}
}

/* End of file welcome.php */
/* Location: ./system/application/controllers/welcome.php */
?>
<?php

class Styles extends Admin_Controller {

	function __construct()
	{
		parent::__construct();	
        $this->main_model = new Style();
    }
	
	function index()
	{
		$this->show();
	}
    
}

/* End of file welcome.php */
/* Location: ./system/application/controllers/welcome.php */
?>
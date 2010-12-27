<?php

class Frame_materials extends Admin_Controller {
	function __construct()
	{
		parent::__construct();
        $this->main_model = new Frame_material();             	
	}
	
	function index()
	{
		$this->show();
	}
}

/* End of file welcome.php */
/* Location: ./system/application/controllers/welcome.php */
?>
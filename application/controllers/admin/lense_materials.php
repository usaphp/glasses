<?php

class Lense_materials extends Admin_Controller {
	function __construct()
	{
		parent::__construct();
        $this->main_model = new Lense_material();    
        $this->data['edit_link'] = 'a_lense_material_edit_link';         	
	}
	
	function index()
	{
		$this->show();
	}
}

/* End of file welcome.php */
/* Location: ./system/application/controllers/welcome.php */
?>
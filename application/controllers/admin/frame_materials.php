<?php

class Frame_materials extends Admin_Controller {
	function __construct()
	{
		parent::__construct();
        $this->main_model = new Frame_material();
        $this->data['edit_link'] = 'a_frame_material_edit_link';             	
	}
	
	function index()
	{
		$this->show();
	}
}

/* End of file welcome.php */
/* Location: ./system/application/controllers/welcome.php */
?>
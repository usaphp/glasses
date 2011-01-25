<?php

class Style_controller extends Admin_Controller {

	function __construct()
	{
		parent::__construct();	
        $this->main_model = new Style();
        $this->data['edit_link'] = 'a_style_edit_link';
        
       
    }
	
	function index()
	{
		$this->show();
	}
    
}

/* End of file welcome.php */
/* Location: ./system/application/controllers/welcome.php */
?>
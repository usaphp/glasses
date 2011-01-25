<?php

class Brand_controller extends Admin_Controller {
	public function __construct()
	{
		parent::__construct();
        $this->main_model = new Product();
        $this->data['edit_link'] = 'a_brand_edit_link';
	}
	
	public function index()
	{
		$this->show();
	}
    
    public function edit()
    {
        $config = $this->config->item('default_form');
        $this->load->library('datamapper_combine',$config);
        $config = $this->config->item('product_form');
        $this->main_model->limit(1)->get();
        $this->main_model->feature->limit(1)->get();
        $this->data['content']  = $this->datamapper_combine->combine($this->main_model, $config);
        print_flex($this->main_model->feature);

        $this->data['dm_model'] = $this->main_model;
        $this->template->load('admin/templates/admin_template','admin/share/edit',$this->data);
    }
}

/* End of file welcome.php */
/* Location: ./system/application/controllers/welcome.php */
?>
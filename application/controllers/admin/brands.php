<?php

class Brands extends Admin_Controller {
    private $main_model;
	function __construct()
	{
		parent::__construct();
        $this->main_model = new Brand();             	
	}
	
	function index()
	{
		
	}
    
    function edit($model_id = false){
        $model_edit = $this->main_model; 
        $model_edit->get_short_info($model_id);
        $this->data['dm_model'] = $model_edit;
        $this->template->load('admin/templates/admin_template','admin/simple_edit',$this->data);
    }
    
    function show(){
        $models_show = $this->main_model;
        $models_show->get_short_info();
        if($this->input->post('button_save_name')){
            $model_save = $this->main_model->get_copy();
            #$model_save->save(array('name' => $this->input->post('input_'.$model_save->model.'_name')));
        }
        #print_flex($models_show);
        $this->data['dm_model'] = $models_show;
        $this->template->load('admin/templates/admin_template','admin/share/simple_show',$this->data);
    }
}

/* End of file welcome.php */
/* Location: ./system/application/controllers/welcome.php */
?>
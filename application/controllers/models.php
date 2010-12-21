<?php

class Models extends MY_Controller {

	function __construct()
	{
		parent::__construct();	
	}
	
	function index()
	{
		$this->show();
	}
    
    function show($model_id = false, $set_id = false){ 
        $model = new Model();
        
        if(!$model_id) $model->limit(1);
        $model->get_short_info($model_id);
        
        if(!$set_id) $model->set->limit(1);        
        $model->set->get_full_info();
        $image_url = $this->picture->make_image($model->set->image, IMAGE_CAT_MODEL_SET, IMAGE_SIZE_LARGE);
        
        $this->data['dm_model_selected'] = $model;
        $this->data['dm_set_selected']   = $model->set->get_clone();
        $this->data['image_url']         = $image_url;
        $this->data['dm_sets']           = $model->set->get_short_info(); 
        #print_flex($this->data['dm_sets']);  
        $this->template->load('/templates/main_template', 'models/show', $this->data);
    }
}

/* End of file welcome.php */
/* Location: ./system/application/controllers/welcome.php */
?>
<?php

class Product extends MY_Controller {

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
        $sets  = new Set();
        #!
        if(!$model_id) $model->limit(1);
        $model->get_full_info($model_id);
        #!
        if(!$set_id) $model->set->limit(1);        
        $model->set->get_full_info($set_id);
        #!
        $sets->where_related($model)->get_short_info();
        #!
        $this->data['images_path']      = array();
        $this->data['images_path'][]    = $main_image_url = $this->picture->make_image($model->set->image, IMAGE_CAT_MODEL_SET, IMAGE_SIZE_LARGE);        
        #!
        foreach($model->set->set_image as $image)
            $this->data['images_path'][] = $main_image_url = $this->picture->make_image($image->name, IMAGE_CAT_MODEL_SET, IMAGE_SIZE_SMALL);
            
        $this->data['dm_model_selected'] = $model;
        $this->data['dm_set_selected']   = $model->set;
        
        $this->data['dm_sets']           = $sets;
                
        $this->template->load('/templates/main_template', 'product/show', $this->data);
    }
}

/* End of file welcome.php */
/* Location: ./system/application/controllers/welcome.php */
?>
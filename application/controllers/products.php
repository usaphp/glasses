<?php

class Products extends MY_Controller {

	function __construct()
	{
		parent::__construct();	
	}
	
	function index()
	{
		$this->show();
	}
    
    function show($product_id = false, $set_id = false){ 
        $product = new Product();
        $sets  = new Set();
        #!
        if(!$product_id) $product_id = 1;
        $product->get_full_info($product_id);
        $this->data['best_price'] = $product->store;
        foreach($product->store as $store)
            if($store->join_price < $this->data['best_price']->join_price) $this->data['best_price'] = $store;        
        #!
        if(!$set_id) $set_id = 1 ;        
        $product->set->get_full_info($set_id);
        #!
        $sets->where_related($product)->get_short_info();
        #!
        $this->data['images_path']      = array();
        $this->data['images_path'][]    = $main_image_url = $this->picture->make_image($product->set->image, IMAGE_CAT_MODEL_SET, IMAGE_SIZE_LARGE);        
        #!
        foreach($product->set->set_image as $image)
            $this->data['images_path'][] = $main_image_url = $this->picture->make_image($image->name, IMAGE_CAT_MODEL_SET, IMAGE_SIZE_SMALL);        
        $this->data['dm_product_selected']  = $product;        
        $this->data['dm_set_selected']      = $product->set;        
        $this->data['dm_sets']              = $sets;
        
        $this->template->load('/templates/main_template', 'products/show', $this->data);
    }
}

/* End of file welcome.php */
/* Location: ./system/application/controllers/welcome.php */
?>
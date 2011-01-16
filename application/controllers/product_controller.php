<?php

class Product_controller extends MY_Controller {

	function __construct()
	{
		parent::__construct();	
	}
	
	function index()
	{
		$this->show();
	}
    
    function show($product_id = false, $set_id = false){
        array_push($this->data['js_functions'], array('name' => 'products_show_init', 'data' => FALSE));
        $product = new Product();
        $sets  = new Set();
        #PRODUCT
        if(!$product_id) $product_id = 1;
        $product->get_full_info($product_id);
        $this->data['best_price'] = $product->store;
        foreach($product->store as $store)
            if($store->join_price < $this->data['best_price']->join_price) $this->data['best_price'] = $store;        
        #SET
        if(!$set_id) $set_id = 1;
        $product->set->get_full_info($set_id);
        #SETS by PRODUCT
        $sets->where_related($product)->get_short_info();
        #MAIN IMAGE
        $this->data['images_path']      = array();
        #$this->data['images_path'][]    = $this->picture->make_image($product->set->image, IMAGE_CAT_MODEL_SET, IMAGE_SIZE_LARGE);        
        #IMAGE
        #foreach($product->set->set_image as $image)
            #$this->data['images_path'][] = $this->picture->make_image($image->name, IMAGE_CAT_MODEL_SET, IMAGE_SIZE_SMALL);
        #best Price
        foreach($product->store as $store){
            $store->get_best_coupon();
        }
        #best Store
        $product->get_best_store();
        
        $features_cout = $product->feature->result_count()/2;
        if ($features_cout < 2) $features_cout = 1;
        $feature_fields = array_chunk($product->feature->all_to_array(),$features_cout);
        
        $this->data['feature_fields']       = $feature_fields;
        $this->data['best_store']           = $product->best_store;
        $this->data['best_store']->price    = $product->best_store->best_coupon->calculate->get_price();
        $this->data['dm_product_selected']  = $product;        
        $this->data['dm_set_selected']      = $product->set;        
        $this->data['dm_sets']              = $sets;
        
        $this->template->load('/templates/main_template', 'product/show', $this->data);
    }
}

/* End of file welcome.php */
/* Location: ./system/application/controllers/welcome.php */
?>
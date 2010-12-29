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
        $this->data['images_path'][]    = $main_image_url = $this->picture->make_image($product->set->image, IMAGE_CAT_MODEL_SET, IMAGE_SIZE_LARGE);        
        #IMAGE
        foreach($product->set->set_image as $image)
            $this->data['images_path'][] = $main_image_url = $this->picture->make_image($image->name, IMAGE_CAT_MODEL_SET, IMAGE_SIZE_SMALL);
        #best Price
        foreach($product->store as $store){
            $this->_get_best_price($store);
            #print_flex($store->coupon_best);
        }
        $this->data['dm_product_selected']  = $product;        
        $this->data['dm_set_selected']      = $product->set;        
        $this->data['dm_sets']              = $sets;
        
        $this->template->load('/templates/main_template', 'products/show', $this->data);
    }
    
    private function _get_best_price($store)
    {
        $best_price = $store->join_price;
        
        foreach($store->coupon as $coupon)
        {
            $price_by_coupon = $coupon->calculate->get_price($store->join_price);
            #print_flex($price_by_coupon);
            if($best_price >= $price_by_coupon) 
            {
                $best_price = $price_by_coupon;
                echo $best_price;
                $store->coupon_best = $coupon;
            } 
                
        }
        
    }
}

/* End of file welcome.php */
/* Location: ./system/application/controllers/welcome.php */
?>
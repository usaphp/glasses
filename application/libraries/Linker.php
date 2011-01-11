<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Linker {
    public function __construct(){        
    }
    
    public function home_page(){
        $segments = array();
        $url = generate_url($segments);
        return $url;
    }
    public function catalog_show($page_number = 1, $sort_by = SORT_BY_MODEL){
        $segments = array('catalog', 'show', $page_number, $sort_by);
        $url = generate_url($segments);
        return $url;
    }
    public function product_show($product_id,$set_id = false){
        $segments = array('product', 'show', $product_id, $set_id);
        $url = generate_url($segments);
        return $url;
    }
    
    public function type_show($type){
    	$filter = get_current_filters();
        $segments = array('catalog', 'show', $type, $filter['brand'], $filter['gender'], $filter['style']);
        $url = generate_url($segments);
        return $url;
	}
    
	public function brand_show($brand, $off = FALSE){
    	$filter = get_current_filters($off);
        $segments = array('catalog', 'show', $filter['type'], $brand, $filter['gender'], $filter['style']);
        $url = generate_url($segments);
        return $url;
	}
    
    public function gender_show($gender_id){
    	$filter = get_current_filters();
        $segments = array('catalog', 'show', $filter['type'], $filter['brand'], $gender_id, $filter['style']);
        $url = generate_url($segments);
        return $url;
	}
    
    public function style_show($style_id){
    	$filter = get_current_filters();
        $segments = array('catalog', 'show', $filter['type'], $filter['brand'], $filter['gender'], $style_id);
        $url = generate_url($segments);
        return $url;
	}
	
	/* Admin links */
    public function stores_show($store_id){
        $segments = array('stores', 'show', $store_id);
        $url = generate_url($segments);
        return $url;
    }
    
    public function a_products_edit($product_id = false){
        $segments = array('admin', 'products', 'edit', $product_id);
        $url = generate_url($segments);
        return $url;
    }
    
    public function a_products_show(){
        $segments = array('admin', 'products', 'show');
        $url = generate_url($segments);
        return $url;
    }
    
    public function a_brands_show(){
        $segments = array('admin', 'brands', 'show');
        $url = generate_url($segments);
        return $url;
    }
    
    public function a_brands_edit($brand_id = false){
        $segments = array('admin', 'brands', 'edit' , $brand_id);
        $url = generate_url($segments);
        return $url;
    }
    
    public function a_styles_show(){
        $segments = array('admin', 'styles', 'show');
        $url = generate_url($segments);
        return $url;
    }
    public function a_styles_edit($style_id = false){
        $segments = array('admin', 'styles', 'edit', $style_id);
        $url = generate_url($segments);
        return $url;
    }
    public function a_features_show(){
        $segments = array('admin', 'features', 'show');
        $url = generate_url($segments);
        return $url;
    }
    public function a_features_edit($feature_id = false){
        $segments = array('admin', 'features', 'edit', $feature_id);
        $url = generate_url($segments);
        return $url;
    }
    public function a_frame_materials_show(){
        $segments = array('admin', 'frame_materials', 'show');
        $url = generate_url($segments);
        return $url;
    }
    public function a_frame_materials_edit($frame_material_id = false){
        $segments = array('admin', 'frame_materials', 'edit', $frame_material_id);
        $url = generate_url($segments);
        return $url;
    }
    public function a_lense_materials_show(){
        $segments = array('admin', 'lense_materials', 'show');
        $url = generate_url($segments);
        return $url;
    }
    public function a_lense_materials_edit($lense_material_id = false){
        $segments = array('admin', 'lense_materials', 'edit', $lense_material_id);
        $url = generate_url($segments);
        return $url;
    }
}
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Linker {
    public function __construct(){        
    }
    
    public function home_page(){
        $segments = array('home');
        $url = generate_url($segments);
        return $url;
    }
    public function catalog_show($page_number = 1, $sort_by = SORT_BY_MODEL){
        $segments = array('catalog', 'show', $page_number, $sort_by);
        $url = generate_url($segments);
        return $url;
    }
    public function product_show($product_id,$set_id = false){
        $segments = array('products', 'show', $product_id, $set_id);
        $url = generate_url($segments);
        return $url;
    }
    
    public function type_show($type_id){
        $segments = array('catalog', 'show', $type_id);
        $url = generate_url($segments);
        return $url;
	}
    
	public function brand_show($brand_id){
        $segments = array('catalog', 'show', false, $brand_id);
        $url = generate_url($segments);
        return $url;
	}
    
    public function gender_show($gender_id){
        $segments = array('catalog', 'show', false, false, $gender_id);
        $url = generate_url($segments);
        return $url;
	}
    
    public function style_show($style_id){
        $segments = array('catalog', 'show', false, false, false, $style_id);
        $url = generate_url($segments);
        return $url;
	}
	
	/* Admin links */
    public function stores_show($store_id){
        $segments = array('stores', 'show', $store_id);
        $url = generate_url($segments);
        return $url;
    }
    
    public function a_product_edit_link($product_id = false){
        $segments = array('admin', 'product_controller', 'edit', $product_id);
        $url = generate_url($segments);
        return $url;
    }
    
    public function a_product_show_link(){
        $segments = array('admin', 'product_controller', 'show');
        $url = generate_url($segments);
        return $url;
    }
    
    public function a_brand_show_link(){
        $segments = array('admin', 'brand_controller', 'show');
        $url = generate_url($segments);
        return $url;
    }
    
    public function a_brand_edit_link($brand_id = false){
        $segments = array('admin', 'brand_controller', 'edit' , $brand_id);
        $url = generate_url($segments);
        return $url;
    }
    
    public function a_style_show_link(){
        $segments = array('admin', 'style_controller', 'show');
        $url = generate_url($segments);
        return $url;
    }
    public function a_style_edit_link($style_id = false){
        $segments = array('admin', 'style_controller', 'edit', $style_id);
        $url = generate_url($segments);
        return $url;
    }
    public function a_feature_show_link(){
        $segments = array('admin', 'feature_controller', 'show');
        $url = generate_url($segments);
        return $url;
    }
    public function a_feature_edit_link($feature_id = false){
        $segments = array('admin', 'feature_controller', 'edit', $feature_id);
        $url = generate_url($segments);
        return $url;
    }
    public function a_frame_material_show_link(){
        $segments = array('admin', 'frame_materials', 'show');
        $url = generate_url($segments);
        return $url;
    }
    public function a_frame_material_edit_link($frame_material_id = false){
        $segments = array('admin', 'frame_materials', 'edit', $frame_material_id);
        $url = generate_url($segments);
        return $url;
    }
    public function a_lense_material_show_link(){
        $segments = array('admin', 'lense_materials', 'show');
        $url = generate_url($segments);
        return $url;
    }
    public function a_lense_material_edit_link($lense_material_id = false){
        $segments = array('admin', 'lense_materials', 'edit', $lense_material_id);
        $url = generate_url($segments);
        return $url;
    }
}
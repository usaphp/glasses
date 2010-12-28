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
    public function products_show($product_id,$set_id = false){
        $segments = array('products', 'show', $product_id, $set_id);
        $url = generate_url($segments);
        return $url;
    }
    
	public function brand($brand_id){
        $segments = array('brand', $brand_id);
        $url = generate_url($segments);
        return $url;
	}
	
	/* Admin links */
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
}
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
    public function models_show($model_id,$set_id = false){
        $segments = array('product', 'show', $model_id, $set_id);
        $url = generate_url($segments);
        return $url;
    }
    public function a_product_edit($product_id = false){
        $segments = array('admin', 'product', 'edit', $product_id);
        $url = generate_url($segments);
        return $url;
    }
    public function a_product_show(){
        $segments = array('admin', 'product', 'show');
        $url = generate_url($segments);
        return $url;
    }
}
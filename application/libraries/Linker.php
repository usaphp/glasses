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
    public function models_show($model_id){
        $segments = array('models', 'show', $model_id);
        $url = generate_url($segments);
        return $url;
    }
}
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Linker {
    public function __construct(){
        
    }
    public function catalog_show($page_number = 1){
        $segments = array('catalog','show',$page_number);
        $url = generate_url($segments);
        return $url;
    }
}
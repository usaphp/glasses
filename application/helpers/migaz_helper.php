<?php
	function generate_url($segments) {
		for($i=0; $i< count($segments); $i++){
			$segments[$i] = clean_string($segments[$i]);
		}
		$url = site_url($segments);
		return $url;
	}	
	
	/* Removes everything except numbers and letters from url */
	function clean_string($string) {
		$string = preg_replace('/[^\w\d\/]/','-', $string);
		$string = preg_replace('/\-+/', '-', $string);
		$string = preg_replace('/.*\-$/', '', $string);
		return $string;
	}

    function print_flex($arr){
        echo '<pre>';
            print_r($arr);
        echo '</pre>';
    }
    
        # Returns a slashed at the end document root, adds a slash to the end of document root if there is no one.
    function slashed_root(){
        $root = $_SERVER['DOCUMENT_ROOT'];
        if(substr($root, -1) == '/') return $root;
        return $root.'/';
    }

    # Returns a unslashed at the end document root, adds a slash to the end of document root if there is no one.
    function unslashed_root(){
        $root = $_SERVER['DOCUMENT_ROOT'];
        return rtrim($root,"/");
    }
	# return date
	
	function get_current_filters($off = FALSE){
		$filter = array();
		$CI = & get_instance();
		if($CI->router->fetch_class() != 'catalog' || $off) return array('type' => 'a', 'brand' => 'a', 'gender' => 'a', 'style' => 'a');
		$filter['type'] = $CI->uri->rsegment(3)?$CI->uri->rsegment(3):'a';
		$filter['brand'] = $CI->uri->rsegment(4)?$CI->uri->rsegment(4):'a';
		$filter['gender'] = $CI->uri->rsegment(5)?$CI->uri->rsegment(5):'a';
		$filter['style'] = $CI->uri->rsegment(6)?$CI->uri->rsegment(6):'a';
		return $filter;
	}
?>
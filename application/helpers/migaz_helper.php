<?php
	function generate_url($segments, $clean = TRUE) {
		for($i=0; $i< count($segments); $i++){
			$segments[$i] = $clean?clean_string($segments[$i]):$segments[$i];
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
		$CI = & get_instance();
		if($CI->router->fetch_class() != 'catalog' || $off) return array();
		parse_str($CI->uri->rsegment(3), $filter);
		return $filter;
	}
	
	/* checkes if the remote file exists */
	function remote_file_exists($url) {
	    $curl = curl_init($url);
	
	    //don't fetch the actual page, you only want to check the connection is ok
	    curl_setopt($curl, CURLOPT_NOBODY, TRUE);
	
	    //do request
	    $result = curl_exec($curl);
	
	    $ret = FALSE;
	
	    //if request did not fail
	    if ($result !== FALSE) {
	        //if request was ok, check response code
	        $statusCode = curl_getinfo($curl, CURLINFO_HTTP_CODE);  
	
	        if ($statusCode == 200) {
	            $ret = TRUE;   
	        }
	    }
	
	    curl_close($curl);
	
	    return $ret;
	}
?>
<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Picture {
	private $config;
	
	public function __construct() {
		$this->CI = & get_instance();
		$this->CI->config->load('picture');
		$this->config = $this->CI->config->item('picture');
	}
	public function make_image($image_name, $image_category, $image_size, $square = FALSE){
		$original_image = unslashed_root().$this->config[$image_category]['folder_path'].$image_name;
        
		$ext = pathinfo($image_name, PATHINFO_EXTENSION);
		 
        if($square) $square_prefix = '_square'; else $square_prefix = '';
		$new_image_name = str_replace('.'.$ext, '_'.$image_size.$square_prefix.'.'.$ext, $image_name);
		$cache_image = $this->config[$image_category]['folder_path'].'cache/'.$new_image_name;
		$abs_cache_image = unslashed_root().$cache_image;
		// check if the file is already cached
		if(file_exists($abs_cache_image)){
			return $cache_image;
		} 
		//if not resize it
		
        // LOAD LIBRARY
        $this->CI->load->library('my_image_lib');

        // CONFIGURE IMAGE LIBRARY
		if($square){
			list($orig_width, $orig_height, $orig_type) = getimagesize($original_image);
            
			$square_size = ($orig_width > $orig_height)?$orig_height:$orig_width;
			$config_crop['source_image']	= $original_image;
        	$config_crop['new_image']		= $abs_cache_image;
	        $config_crop['width']		    = $square_size;
	        $config_crop['height']          = $square_size;
        	$config_crop['maintain_ratio']  = FALSE;
			$config_crop['x_axis']	        = 0;
			$config_crop['y_axis']	        = 0;
        	$this->CI->image_lib->initialize($config_crop);
			$this->CI->image_lib->crop();
	        $config['source_image']     = $abs_cache_image;
	        $config['new_image']        = $abs_cache_image;
	        $config['width']		    = $this->config[$image_category][$image_size]['square'];
	        $config['height']		    = $this->config[$image_category][$image_size]['square'];
		}else{
	        $config['source_image']     = $original_image;
	        $config['new_image']        = $abs_cache_image;
			$config['master_dim']		= 'width';
        	$config['maintain_ratio']   = TRUE;
	        $config['width']		= $this->config[$image_category][$image_size]['width'];
	        $config['height']		= $this->config[$image_category][$image_size]['height'];
		}
        
        $this->CI->image_lib->initialize($config);        
		$this->CI->image_lib->resize();
		echo $this->CI->image_lib->display_errors();
        $this->CI->image_lib->clear();
		return $cache_image;
	}
 }
 ?>
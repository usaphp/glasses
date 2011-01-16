<?php

class Sunglasshut extends MY_Controller {

	function __construct(){
		parent::__construct();	
        set_time_limit(0);
        
	}
	
	function load_images($limit = FALSE, $offset = FALSE){
        $sunglasses = $this->db->select('model, image_url, image_front_url, upc')
							->limit($limit, $offset)
                            ->get('sunglasshut')->result();
		$this->load->library('cf/cfiles');
		$this->load->library('image_lib');
		foreach($sunglasses as $row){
			echo $row->upc.'<br/>';
			$file_name = $row->upc.'.png';
			$file_dir = slashed_root().'images/temp/original/'.$file_name;
			
			$cdn_file_name = 'photos/original/'.$file_name;
			echo CDN_SERVER.$cdn_file_name.'<br/>';
	        if (file_get_contents(CDN_SERVER.$cdn_file_name,0,null,0,1)) {
				echo 'skip<br/>';
				continue;
			}
			$original = file_get_contents($row->image_url);
			file_put_contents($file_dir, $original);
			
			$config = array();
			$config['source_image']	= $file_dir;
			$config['width']	 = 130;
			$config['new_image'] = slashed_root().'images/temp/small/'.$file_name;
			$this->image_lib->initialize($config);
			$this->image_lib->resize();
			echo $this->image_lib->display_errors();
			$small = file_get_contents($config['new_image']);
			
			$config['source_image']	= $file_dir;
			$config['width']	 = 280;
			$config['new_image'] = slashed_root().'images/temp/medium/'.$file_name;
			$this->image_lib->initialize($config);
			$this->image_lib->resize();
			$medium = file_get_contents($config['new_image']);
			
			$config['width']	 = 600;
			$config['new_image'] = slashed_root().'images/temp/large/'.$file_name;
			$this->image_lib->initialize($config);
			$this->image_lib->resize();
			$large = file_get_contents($config['new_image']);
			
			/* ORIGINAL */
			$this->cfiles->cf_folder = 'photos/original/';
			$file_location = unslashed_root().'/images/temp/original/';
	        
			$this->cfiles->do_object('a', $file_name, $file_location);
			unlink($file_location.$file_name);
			
			/* LARGE */
			$this->cfiles->cf_folder = 'photos/large/';
			$file_location = unslashed_root().'/images/temp/large/';
	        
			$this->cfiles->do_object('a', $file_name, $file_location);
			unlink($file_location.$file_name);
			
			/* MEDIUM */
			$this->cfiles->cf_folder = 'photos/medium/';
			$file_location = unslashed_root().'/images/temp/medium/';
	        
			$this->cfiles->do_object('a', $file_name, $file_location);
			unlink($file_location.$file_name);
			
			/* SMALL */
			$this->cfiles->cf_folder = 'photos/small/';
			$file_location = unslashed_root().'/images/temp/small/';
	        
			$this->cfiles->do_object('a', $file_name, $file_location);
			unlink($file_location.$file_name);
		}
	}
}
<?php

class Sunglasshut extends MY_Controller {

	function __construct(){
		parent::__construct();	
        set_time_limit(0);
        
	}
	
	function load_images(){
        $sunglasses = $this->db->select('model, image_url, image_front_url, products.id, upc')
                            ->join('products','products.name = sunglasshut.model')
							->limit(1)                            
                            ->get('sunglasshut')->result();
		print_flex($sunglasses);
		$this->load->library('s3');
		$this->load->library('image_lib');
		foreach($sunglasses as $row){
			$original = file_get_contents($row->image_url);
			$file_name = $row->upc.'.png';
			$file_dir = slashed_root().'images/temp/original/'.$file_name;
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
			
			$amazon_file_name = 'photos/original/'.$row->upc.'.png';
			$this->s3->putObject($original, 'migaz', $amazon_file_name, S3::ACL_PUBLIC_READ);
			
			$amazon_file_name = 'photos/small/'.$row->upc.'.png';
			$this->s3->putObject($small, 'migaz', $amazon_file_name, S3::ACL_PUBLIC_READ);
			
			$amazon_file_name = 'photos/medium/'.$row->upc.'.png';
			$this->s3->putObject($medium, 'migaz', $amazon_file_name, S3::ACL_PUBLIC_READ);
			
			$amazon_file_name = 'photos/large/'.$row->upc.'.png';
			$this->s3->putObject($large, 'migaz', $amazon_file_name, S3::ACL_PUBLIC_READ);
		}
	}
}
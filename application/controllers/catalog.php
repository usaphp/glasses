<?php
	class Catalog extends MY_Controller {
    
    	function __construct(){
    		parent::__construct();	
    	}
    	
    	function index(){
            $this->show();
    	}
        public function show($type = 'a', $brand = 'a', $gender = 'a', $style = 'a', $page_number = 1, $sort_by = SORT_BY_MODEL){
        	
            $products = new Product();
			
			if($type != 'a'){
				$type_model = new Type;
				$type_model->where('name', $type)->get();
				if($type_model->exists()) $products->where_related($type_model);
			}
			
			if($brand != 'a'){
				$brand_model = new Brand;
				$brand_model->where('name', $brand)->get();
		        if($brand_model->exists()) $products->where_related($brand_model);
			}
			
			if($gender != 'a'){
				$gender_model = new Gender;
				$gender_model->where('name', $gender)->get();
		        if($gender_model->exists()) $products->where_related($gender_model);
			}
			
			if($style != 'a'){
				$style_model = new Style;
				$style_model->where('name', $style)->get();
		        if($style_model->exists()) $products->where_related($style_model);
			}
			
			
            $limit  = 10;
            $offset = (($page_number-1) * 10);
            #$models_old = $this->db->select()->limit($limit,$offset)->get('sunglasshut')->result();            
			
				
            switch($sort_by){
                case SORT_BY_MODEL:
                    $products->order_by('name');
                case SORT_BY_BRAND:
                    $products->order_by('brand_name');
                case SORT_BY_STYLE:
                    $products->order_by('style_name');
                case SORT_BY_FRAME:
                    $products->order_by('frame_material_name');
                case SORT_BY_LENSE:
                    $products->order_by('lense_material_name');
            }
            $products->limit($limit,$offset)->get_short_info();

            $this->data['dm_products']    = $products;
            $this->data['page_count']   = $products->count()/$limit;
            $this->data['page_current'] = $page_number;
            $this->data['sort_by']      = $sort_by;            
            $this->template->load('/templates/main_template', 'catalog/show',$this->data);
        }
        
    }
?>
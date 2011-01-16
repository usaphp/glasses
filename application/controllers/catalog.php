<?php
	class Catalog extends MY_Controller {
    
    	function __construct(){
    		parent::__construct();	
    	}
    	
    	function index(){
            $this->show();
			array_push($this->data['crumbs'], array('name' => 'Home', 'link' => $this->linker->home_page()));
    	}
		
        public function show($conditions = ''){
        	
			# Add breadcrumbs
			array_push($this->data['crumbs'], array('name' => 'Catalog', 'link' => $this->linker->catalog_show()));
			
			parse_str($conditions, $vars);
            $products = new Product();
			if(isset($vars['type'])){
				$type_model = new Type;
				$type_model->where('name', $vars['type'])->get();
				if($type_model->exists()){
					$products->where_related($type_model);	
					array_push($this->data['crumbs'], array('name' => $type_model->name, 'link' => $this->linker->type_show($type_model->name, TRUE)));
				} 
			}
			
			if(isset($vars['brand'])){
				$brand_model = new Brand;
				$brand_id = preg_replace('/.*\-(\d+)/iU', '$1', $vars['brand']);
				$brand_model->where('id', $brand_id)->get();
				if($brand_model->exists()){
					$products->where_related($brand_model);	
					array_push($this->data['crumbs'], array('name' => $brand_model->name, 'link' => $this->linker->type_show($brand_model->id, TRUE)));
				} 
			}
			
			if(isset($vars['gender'])){
				$gender_model = new Gender;
				$gender_model->where('name', $vars['gender'])->get();
				if($gender_model->exists()){
					$products->where_related($gender_model);	
					array_push($this->data['crumbs'], array('name' => $gender_model->name, 'link' => $this->linker->type_show($gender_model->name, TRUE)));
				} 
			}
			
			if(isset($vars['style'])){
				$style_model = new Style;
				$style_model->where('name', $vars['style'])->get();
				if($style_model->exists()){
					$products->where_related($style_model);	
					array_push($this->data['crumbs'], array('name' => $style_model->name, 'link' => $this->linker->type_show($style_model->id, TRUE)));
				} 
			}
			
			
			$products_count = $products->get_clone();
			$total_products = $products_count->count_short_info();
			
			$sort_by = isset($vars['sort_by'])?$vars['sort_by']:SORT_BY_MODEL;
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
			
			$limit = 10;
			$page_number = isset($vars['page'])?$vars['page']:1;
			$offset = ($page_number-1)*10;
			
			
            $products->limit($limit,$offset)->get_short_info();
			
			// remove link from last breadcrumb
			$this->data['crumbs'][count($this->data['crumbs'])-1]['link'] = FALSE;
			
            $this->data['dm_products']    = $products;
            $this->data['page_count']   = $total_products/$limit + 1;
            $this->data['page_current'] = $page_number;
            $this->data['sort_by']      = $sort_by;            
            $this->template->load('/templates/main_template', 'catalog/show',$this->data);
        }
        
    }
?>
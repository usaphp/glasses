<?php
	class Catalog extends MY_Controller {
    
    	function __construct(){
    		parent::__construct();	
    	}
    	
    	function index(){
            $this->show();
    	}
        public function show($page_number = 1, $sort_by = SORT_BY_MODEL){
            $limit  = 10;
            $offset = (($page_number-1) * 10);
            #$models_old = $this->db->select()->limit($limit,$offset)->get('sunglasshut')->result();            
            $models = new Model();
            switch($sort_by){
                case SORT_BY_MODEL:
                    $models->order_by('name');
                case SORT_BY_BRAND:
                    $models->order_by('brand_name');
                case SORT_BY_STYLE:
                    $models->order_by('style_name');
                case SORT_BY_FRAME:
                    $models->order_by('frame_material_name');
                case SORT_BY_LENSE:
                    $models->order_by('lense_material_name');
            }
            $models->limit($limit,$offset)->get_short_info();

            $this->data['dm_models']    = $models;
            $this->data['page_count']   = $models->count()/$limit;
            $this->data['page_current'] = $page_number;
            $this->data['sort_by']      = $sort_by;            
            $this->template->load('/templates/main_template', 'catalog/show',$this->data);
        }
        
    }
?>
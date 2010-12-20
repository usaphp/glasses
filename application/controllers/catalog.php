<?php
	class Catalog extends MY_Controller {
    
    	function __construct(){
    		parent::__construct();	
    	}
    	
    	function index(){
            $this->show();
    	}
        public function show($page_number = 1){
            $limit  = 10;
            $offset = (($page_number-1) * 10);
            #$models_old = $this->db->select()->limit($limit,$offset)->get('sunglasshut')->result();            
            $models = new Model();            
            $models->limit($limit,$offset)->get_short_info();

            $this->data['dm_models']    = $models;
            $this->data['page_count']   = $models->count()/$limit;
            $this->data['page_current'] = $page_number;            
            $this->template->load('/templates/main_template', 'catalog/show',$this->data);
        }
        
    }
?>
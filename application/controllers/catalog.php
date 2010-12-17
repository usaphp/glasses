<?php
	class Catalog extends MY_Controller {

    	function __construct(){
    		parent::__construct();	
    	}
    	
    	function index(){
            $models_old = $this->db->select()->limit(10)->get()->result();
            $models_new = new Model();            
            $models_new->limit(10)->get();
            $models_new_iter = $models_new->getIterator();
            foreach($models_old as $old){
                $                
            }
    	}
        
    }
?>
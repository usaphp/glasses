<?php

/**
*
* 
 */
class Model extends DataMapper {
	
	var $has_one = array('brand', 'frame_material', 'lense_material', 'style');

	var $has_many = array('set','store','feature');
	
//	var $validation = array(
//		'example' => array(
//			// example is required, and cannot be more than 120 characters long.
//			'rules' => array('required', 'max_length' => 120),
//			'label' => 'Example'
//		)
//	);
	
	/**
    * Constructor: calls parent constructor
    */
    public function get_short_info($id = false){
        if($id)
            $this->include_related('brand')
                    ->include_related('frame_material')
                    ->include_related('lense_material')
                    ->include_related('style')->get_by_id($id);
        else
            $this->include_related('brand')
                    ->include_related('frame_material')
                    ->include_related('lense_material')
                    ->include_related('style')->get();
    }
    
    public function get_full_info($id = false){
        if($id){
            $this->include_related('brand')
                    ->include_related('frame_material')
                    ->include_related('lense_material')
                    ->include_related('style')
                    ->get_by_id($id);
            $this->set->include_related('frame_color')
                        ->include_related('lense_color')->get();
            $this->store->include_join_fields()->get();
            $this->feature->include_join_fields()->get();
            
            $this->feature = $this->feature->all_to_array($this->feature);
            print_flex($this->feature);
            
        }else{
            $this->include_related('brand')
                    ->include_related('frame_material')
                    ->include_related('lense_material')
                    ->include_related('style')->get();
            
            $this->set->include_related('frame_color')
                        ->include_related('frame_color')
                        ->get();
            $this->store->include_join_fields()->get();
            $this->feature->include_join_fields()->get();
            
        }
    }
    
    function __construct($id = NULL){
		parent::__construct($id);
    }
}

/* End of file template.php */
/* Location: ./application/models/template.php */
?>
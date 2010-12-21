<?php

/**
*
* 
 */
class Set extends DataMapper {
	
	var $has_one = array('model', 'lense_color', 'frame_color');
	
	var $has_many = array('set_image');
	
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
    function __construct($id = NULL)
	{
		parent::__construct($id);
    }
    function get_short_info($id = false){
        if($id){
            $this->include_related('frame_color')
                ->include_related('frame_color')
                ->get_by_id($id);
        }else{
            $this->include_related('frame_color')
                ->include_related('frame_color')
                ->get();        
        }
    }
    function get_full_info($id = false){
        if($id){
            $this->include_related('frame_color')
                ->include_related('frame_color')
                ->get_by_id($id);
            $this->set_images->get();
        }else{
            $this->include_related('frame_color')
                ->include_related('frame_color')
                ->get();
            $this->set_images->get();
        }
    }    
}

/* End of file template.php */
/* Location: ./application/models/template.php */
?>
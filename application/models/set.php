<?php

/**
*
* 
 */
class Set extends DataMapper {
	
	var $has_one = array('product', 'lense_color', 'frame_color');
	
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
                ->include_related('lense_color')
                ->get_by_id($id);
        }else{
            $this->include_related('frame_color')
                ->include_related('lense_color')
                ->get();        
        }
    }
    function get_full_info($id = false){
        if($id){
            $this->include_related('frame_color')
                ->include_related('lense_color')
                ->get_by_id($id);
            $this->set_images->get();
                        
        }else{
            $this->include_related('frame_color')
                ->include_related('lense_color')
                ->get();
            $this->set_images->get();
        }
    } 
    public function get_one($desc = false)
    {
        if($desc)
            is_numeric($desc)?$this->get_by_id($desc):$this->get_by_name($desc);
    }
    
    public function get_many()
    {
        $this->get();
    }   
}

/* End of file template.php */
/* Location: ./application/models/template.php */
?>
<?php

/**
*
* 
 */
class Brand extends DataMapper {
	
	var $has_one = array();
	
	var $has_many = array('product');
	
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
    public function get_short_info($id = false){
        if($id)
            $this->get_by_id($id);
        else{
            $this->get();
            $this->id = null;
        }
    }
    public function get_full_info($id = false){
        if($id)
            $this->get_by_id($id);
        else{
            $this->get();
            $this->id = null;
        }
    }
}

/* End of file template.php */
/* Location: ./application/models/template.php */
?>
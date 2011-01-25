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
            is_numeric($id)?$this->get_by_id($id):$this->get_by_name($id);        
        else{
            $this->get();
            $this->id = null;
        }
    }
    
    
    
    public function get_full_info($id = false){
        if($id)
            is_numeric($id)?$this->get_by_id($id):$this->get_by_name($id);
        else{
            $this->get();
            $this->id = null;
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
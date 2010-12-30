<?php

/**
*
* 
 */
class Coupon extends DataMapper {
	
	var $has_one = array('store');
	
	var $has_many = array();
	
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
        $this->calculate = SelectedCouponType::get_method_calculate($this);
    }
    
    public function get_short_info($id = false)
    {        
        if($id)
        {
            is_numeric($id)?$this->get_by_id($id):$this->get_by_name($id);
            $this->calculate = SelectedCouponType::get_method_calculate($this);
        }
        else
        {            
            $this->get();
            foreach($this as $elem)
                $elem->calculate = SelectedCouponType::get_method_calculate($elem);
            $this->id = null;
        }
    }
    
    public function get_full_info($id = false){
        if($id)
        {
            is_numeric($id)?$this->get_by_id($id):$this->get_by_name($id);
        }
        else
        {
            $this->get();
            $this->id = null;
        }        
    }
    
}

/* End of file template.php */
/* Location: ./application/models/template.php */
?>
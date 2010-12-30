<?php

/**
*
* 
*/
class Store extends DataMapper {
	
	var $has_one = array();
	
	var $has_many = array('product', 'coupon', 'review');
	
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
        $this->best_coupon = new Coupon();
    }
    
    public function get_short_info($id = false){        
        if($id){
            is_numeric($id)?$this->get_by_id($id):$this->get_by_name($id);
            $this->best_coupon = $this->coupon;
        }
        else{            
            $this->get();
            foreach($this as $elem){
                $elem->best_coupon = $elem->coupon;
            }
            $this->id = null;
        }
    }
    
    public function get_full_info($id = false){
        if($id){
            is_numeric($id)?$this->get_by_id($id):$this->get_by_name($id);
        }
        else{
            $this->get();
            $this->id = null;
        }
    }
    
    public function get_best_coupon()
    {
        foreach($this->coupon as $coupon)
        {
            if($this->best_coupon->calculate->get_price($this->join_price) > $coupon->calculate->get_price($this->join_price)) 
            {
                $this->best_coupon = $coupon;
            }   
        }
    }
}

/* End of file template.php */
/* Location: ./application/models/template.php */
?>
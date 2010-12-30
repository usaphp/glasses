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
    }
    
    public function get_short_info($id = false){        
        if($id){
            is_numeric($id)?$this->get_by_id($id):$this->get_by_name($id);
            $this->best_coupon = SelectedCouponType::get_method_calculate();
        }
        else{            
            $this->get();
            foreach($this as $store){                
                $store->best_coupon = $store->coupon; 
                $store->best_coupon->calculate  = SelectedCouponType::get_method_calculate($store->coupon);
            }
            $this->id = null;
        }
    }
    
    public function get_full_info($id = false){
        if($id){
            is_numeric($id)?$this->get_by_id($id):$this->get_by_name($id);
            $this->best_coupon =  
            SelectedCouponType::get_method_calculate();
        }
        else{
            $this->get();
            foreach($this as $store){
                $this->best_coupon = SelectedCouponType::get_method_calculate();
            }
            $this->id = null;
        }
    }
}

/* End of file template.php */
/* Location: ./application/models/template.php */
?>
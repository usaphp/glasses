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
        
    }
    
    public function get_short_info($id = false){        
        if($id)
            $this->get_by_id($id);
        else{            
            $this->get();
            $this->id = null;
        }
        foreach($this as $elem)
            $this->_get_method($elem->type);
        
    }
    
    public function get_full_info($id = false){
        if($id)
            $this->get_by_id($id);
        else{
            $this->get();
            $this->id = null;
        }
        print_flex($this);
        
        $this->_get_method($this->type);
    }
    private function _get_method($type){
        if($type == 1) return new CouponAbs($type,$this);
        if($type == 2) return new CouponPct($type,$this);
    }
    
}

abstract class CouponType{
    protected $type;
    function __construct($type,$model){
        $this->type = $type;        
    }
}

class CouponAbs extends CouponType{
    function __construct($type,$model){
        parent::__construct($type,$model);
        echo 'CouponAbs';
    }
}

class CouponPct extends CouponType{
    function __construct($type,$model){
        parent::__construct($type,$model);
        echo 'CouponPct';
    }
}


/* End of file template.php */
/* Location: ./application/models/template.php */
?>
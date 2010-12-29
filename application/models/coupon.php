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
    
    public function get_short_info($id = false)
    {        
        if($id)
        {
            $this->get_by_id($id);
            $this->calculate = SelectedCouponType::get_method_calculate($this);
        }
        else
        {            
            $this->get();
            $this->id = null;
            foreach($this as $elem){
                $elem->calculate = SelectedCouponType::get_method_calculate($elem);
            }
            
            if (!$this->exists()){ 
                $this->calculate = SelectedCouponType::get_method_calculate($this);
                $this->all[] = $this;
            }
        }
    }
    
    public function get_full_info($id = false){
        if($id){
            $this->get_by_id($id);
            $this->calculate = SelectedCouponType::get_method_calculate($this);
        }else{
            $this->get();
            foreach($this as $elem){
                $elem->calculate = SelectedCouponType::get_method_calculate($elem);
            }
            if (!$this->exists()){ 
                $this->calculate = SelectedCouponType::get_method_calculate($this);
                $this->all[] = $this;
            }
            $this->id = null;
        }        
    }
    
}

class SelectedCouponType{
    public static function get_method_calculate($model){
        if($model->type == false) return new CouponNull($model);
        if($model->type == 1) return new CouponAbs($model);
        if($model->type == 2) return new CouponPct($model);
    }
}

abstract class CouponType{
    protected $description;
    protected $value;    
    function __construct($model){        
        $this->value    = $model->value;        
    }
    
    abstract public function get_price($price);
    public function get_description()
    {
        return $this->description;    
    }    
}

class CouponAbs extends CouponType{
    function __construct($model){
        parent::__construct($model);
        $this->description = '$'.$this->value;
    }
    
    public function get_price($price)
    {
        return $price - $this->value;
    }
}

class CouponPct extends CouponType{
    function __construct($model){
        parent::__construct($model);
        $this->description = $this->value.'%';
    }
    
    public function get_price($price){        
        return $price-($price*($this->value/100));
    }

}
class CouponNull extends CouponType{
    function __construct($model){
           $this->description = '';
    }
    
    public function get_price($price){        
        return $price;
    }
}

/* End of file template.php */
/* Location: ./application/models/template.php */
?>
<?php

/**
*
* 
 */
class Product extends DataMapper{
	
	var $has_one = array('brand', 'frame_material', 'lense_material', 'style', 'type', 'gender');

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
    function __construct($id = NULL){
		parent::__construct($id);
        $this->best_store = $this->store;
    }
    
	public function count_short_info(){
        return $this->include_related('brand')
                ->include_related('type')
                ->include_related('gender')
                ->include_related('frame_material')
                ->include_related('lense_material')
                ->include_related('style')
				->count();
	}
	
    public function get_short_info($id = false){
        $this->include_related('brand')
                ->include_related('type')
                ->include_related('gender')
                ->include_related('frame_material')
                ->include_related('lense_material')
                ->include_related('style');
        if($id)
            is_numeric($id)?$this->get_by_id($id):$this->get_by_name($id);
        else 
            $this->get();
    }
    
    public function get_full_info($id = false){
        $this->include_related('brand')
                ->include_related('type')
                ->include_related('gender')
                ->include_related('frame_material')
                ->include_related('lense_material')
                ->include_related('style');
        if($id){
            is_numeric($id)?$this->get_by_id($id):$this->get_by_name($id);
            $this->set->include_related('frame_color')
                        ->include_related('lense_color')->get();                     
            $this->store->include_join_fields()->get_short_info();                        
            $this->feature->include_join_fields()->get_short_info();            
            foreach($this->store as $store){
                $store->review->get_short_info();
                $store->coupon->get_short_info();
            }
        }else{
            $this->get();
            foreach($this as $product){
                $product->feature->include_join_fields()->get();
                $this->set->include_related('frame_color')
                        ->include_related('frame_color')
                        ->get();
                $this->store->include_join_fields()->get();
            }            
        }
    }
    
    public function get_best_store()
    {
        foreach($this->store as $store)
        {
            if ($this->best_store->best_coupon->calculate->get_price() > $store->best_coupon->calculate->get_price() or !$this->best_store->best_coupon->calculate->get_price())
            {
                $this->best_store = $store;
            }
        }
    }

}

/* End of file template.php */
/* Location: ./application/models/template.php */
?>
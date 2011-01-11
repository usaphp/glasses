<?php

class DMZ_Ext {

	function to_array($fields = ''){
        
        if(empty($fields))
		{
			$fields = $this->fields;
		}		
		$result = array();
		
		foreach($fields as $f)
		{			
            #print_flex($f);
			if(array_key_exists($f, $this->has_one) || array_key_exists($f, $this->has_many))
			{			
				$rels = array();
				foreach($this->{$f} as $item)
				{
					$rels[] = $item->id;
				}
				$result[$f] = $rels;
			}
			else
			{
				$result[$f] = $this->{$f};
			}
		}		
		return $result;
	}

	function all_to_array($fields = ''){
	   print_flex($fields);
		$result = array();
		foreach($this as $obj)
		{
			$result[] = $obj->to_array($fields);
		}
		return $result;
	}

	function from_array($object, $data, $fields = '', $save = FALSE)
	{

		$new_related_objects = array();

		if(empty($fields))
		{
			$fields = $object->fields;
			foreach($data as $k => $v) {
				if(in_array($k, $fields))
				{
					$object->{$k} = $v;
				}
			}
		}
		else
		{

			foreach($fields as $f)
			{
				if(array_key_exists($f, $object->has_one))
				{

					$c = get_class($object->{$f});
					$rel = new $c();
					$id = isset($data[$f]) ? $data[$f] : 0;
					$rel->get_by_id($id);
					if($rel->exists())
					{
						
						$new_related_objects[$f] = $rel;
					}
					else
					{
						
						 $object->delete($object->{$f}->get());
					}
				}
				else if(array_key_exists($f, $object->has_many))
				{
					
					$c = get_class($object->{$f});
					$rels = new $c();
					$ids = isset($data[$f]) ? $data[$f] : FALSE;
					if(empty($ids))
					{
					
						$object->delete($object->{$f}->select('id')->get()->all);
					}
					else
					{
					
						$rels->where_in('id', $ids)->select('id')->get();
					
						$new_related_objects[$f] = $rels->all;
						// And delete any old ones that do not exist.
						$old_rels = $object->{$f}->where_not_in('id', $ids)->select('id')->get();
						$object->delete($old_rels->all);
					}
				}
				else
				{
					// Otherwise, if the $data was set, store it...
					if(isset($data[$f]))
					{
						$v = $data[$f];
					}
					else
					{
						// Or assume it was an unchecked checkbox, and clear it.
						$v = FALSE;
					}
					$object->{$f} = $v; 
				}
			}
		}
		if($save)
		{
			// Auto save
			return $object->save($new_related_objects);
		}
		else
		{
			// return new objects
			return $new_related_objects;
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
    
    abstract class CouponType {
        
        protected $description;
        protected $value;
        protected $price;    
        
        function __construct($model)
        {        
            $this->value = $model->value;
            $this->price = false;        
        }
        
        abstract protected function _calculate($price);
        
        public function get_price($price = false)
        {
            if($price) $this->_calculate($price);
            
            return $this->price;
        }
        
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
        
        protected function _calculate ($price)
        {
            $this->price = $price - $this->value;
        }
    }
    
    class CouponPct extends CouponType{
        
        function __construct($model)
        {
            parent::__construct($model);
            $this->description = $this->value.'%';
        }
        
        protected function _calculate($price)
        {        
            $this->price = $price-($price*($this->value/100));
        }
    
    }
    class CouponNull extends CouponType{
        function __construct($model){
               $this->description = '';
        }
        
        protected function _calculate($price){        
            $this->price = $price;
        }
    }
/* End of file array.php */
/* Location: ./application/datamapper/array.php */

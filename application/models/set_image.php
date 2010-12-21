<?php

/**
*
* 
 */
class Set_image extends DataMapper {
	
	var $has_one = array('set');
	
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
}

/* End of file template.php */
/* Location: ./application/models/template.php */
?>
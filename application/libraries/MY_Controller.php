<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin_Controller extends Controller {
    protected $data;
    function __construct(){
        parent::__construct();        
        $this->data                 = array();
        $this->data['js_functions'] = array();
        $this->data['crumbs']       = array();
        $this->output->enable_profiler(TRUE);
    }
}

class MY_Controller extends Controller {    
    protected $data;
    function __construct(){
        parent::__construct();        
        $this->data                 = array();
        $this->data['js_functions'] = array();
        $this->data['crumbs']       = array();
        $this->output->enable_profiler(TRUE);
    }    
}
?>
<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin_Controller extends Controller {
    protected $data;
    protected $main_model;
    function __construct(){
        parent::__construct();
        $this->data                 = array();
        $this->data['js_functions'] = array();
        $this->data['crumbs']       = array();    
        $this->output->enable_profiler(TRUE);
    }
    function edit($model_id = false){
        $model_edit = $this->main_model; 
        $model_edit->get_short_info($model_id);
        $this->data['dm_model'] = $model_edit;
        $this->template->load('admin/templates/admin_template','admin/share/simple_edit',$this->data);
    }
    
    function show(){        
        $models_show = $this->main_model;
        $models_show->get_short_info();
        if($this->input->post('button_save_name')){
            $model_save = $this->main_model->get_copy();
            #$model_save->save(array('name' => $this->input->post('input_'.$model_save->model.'_name')));
        }
        #print_flex($models_show);
        $this->data['dm_model'] = $models_show;
        $this->template->load('admin/templates/admin_template','admin/share/simple_show',$this->data);
    }
}

class MY_Controller extends Controller {    
    protected $data;
    function __construct(){
        parent::__construct();        
        $this->data                     = array();
        $this->data['js_functions']     = array();
        $this->data['js_functions'][]   = array('name' => 'search_init', 'data' => FALSE);
        $this->data['crumbs']           = array();
        $this->output->enable_profiler(TRUE);
    }    
}
?>
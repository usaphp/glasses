<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin_Controller extends Controller {
    protected   $data;
    protected   $main_model;
    private     $datamapper_form;    
    function __construct(){
        parent::__construct();        
        $this->datamapper_form = $this->config->item('datamapper_form');        
        $this->data                 = array();
        $this->data['js_functions'] = array();
        $this->data['crumbs']       = array();
        $this->data['content']      = array();    
        $this->output->enable_profiler(TRUE);
    }
    function edit($model_id = false){
        
        $model_edit = $this->main_model; 
        $model_edit->get_one($model_id);
        
        $this->creat_datamapper_form($model_edit);
        
        $this->data['dm_model'] = $model_edit;
        $this->template->load('admin/templates/admin_template','admin/share/edit',$this->data);
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
    private function creat_datamapper_form()
    {                
        //print_flex($this->main_model);
        foreach($this->main_model->fields as $field)
        {            
            if (isset($this->datamapper_form[$field]))
                $this->{$this->datamapper_form[$field]['view']}($field,$this->datamapper_form[$field]);
        }
    }
    private function form_input($field, $config)
    {
        $inp_data = array(
            'name'  => 'input_'.$field.'_name',
            'value' => $this->main_model->$field,
            'id'    => 'input_'.$field.'_id',
            'class' => 'f_input'            
        );  
        $this->data['content'][$field]  = form_label($config['label'], $inp_data['id'], array('class' => 'f_label'));
        $this->data['content'][$field] .= form_input($inp_data);
        
    }
    
    private function form_text($field, $config)
    {
        $data = array(
            'name'  => 'text_'.$field.'_name',
            'value' => $this->main_model->$field,
            'id'    => 'text_'.$field.'_id',            
            'class' => 'f_textarea'
        );
        $this->data['content'][$field]  = form_label($config['label'], $data['id'],array('class'=>'f_label'));
        $this->data['content'][$field] .= form_textarea($data);
    }
    private function form_selectbox($field, $config)
    {
        $query = $this->db->select('id, name')->get($config['table'])->result();
        
        foreach($query as $row)
            $options[$row->id] = $row->name;
             
        $data = array(
            'name'  => 'select_'.$field.'_name',
            'options' => $options,            
            'id'    => 'text_'.$field.'_id',
            'class' => 'f_select wide required',
            'selected' => $this->main_model->$field
        );
        $this->data['content'][$field]  = form_label($config['label'], $data['id'], array('class' => 'f_label'));
        $this->data['content'][$field] .= form_dropdown($data['name'], $data['options'], $data['selected'], 'id = "'.$data['id'].'" class = "'.$data['class'].'"');
    }
    private function _html_chekbox()
    {
        
    }
    private function html_image($field, $config)
    {
        $source_image = $this->picture->get_source_image($this->main_model->image,'brands');
        $this->data['content'][$field] = '<img src="/'.$source_image.'" />';
    }
}

class MY_Controller extends Controller {    
    protected $data;
    function __construct(){
        parent::__construct();        
        $this->data                     = array();
        $this->data['js_functions']     = array();
        $this->data['js_functions'][]   = array('name' => 'search_init', 'data' => FALSE, 'name' => 'top_menu_init', 'data' => FALSE);
        $this->data['crumbs']           = array();
		
		$brands = new Brand();
		$brands->get_short_info();
		$this->data['dm_brands'] = $brands;
		
        $this->output->enable_profiler(TRUE);
    }    
}
?>
<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
    class Datamapper_Combine
    {
        public $output;
        static private $default_config;
        private $model;        
        public function __construct($config)
        {
            self::$default_config = $config;            
        }
        public function combine(Datamapper $model, $config)
        {
            #echo $model->model;
            #print_flex($model->fields);
            foreach ($model->fields as $field)
            {
                
                if(isset($config[$field]))
                {
                    if(method_exists($this, $config[$field]['view']))
                        $this->{$config[$field]['view']}($model, $field, $config[$field]);
                     
                }
                else
                {
                    if(isset(self::$default_config[$field]))
                        if(method_exists($this, self::$default_config[$field]['view']))
                            $this->{self::$default_config[$field]['view']}($model, $field, self::$default_config[$field]);
                    
                }
                
            }
            foreach($model->has_many as $class => $related)
            {
                if(array_key_exists($class,$config))
                    $this->output[$class] = $this->combine($model->{$class}, $config[$class]);
            }
            return $this->output;
        }
        
        
        private function form_input($model, $field, $config)
        {
            $inp_data = array(
                'name'  => 'input_'.$field.'_name',
                'value' => $model->$field,
                'id'    => 'input_'.$field.'_id',
                'class' => 'f_input'            
            ); 
            echo  $model->model.' '.$field;
            $this->output[$field]  = 'form_label' ;#($config['label'], $inp_data['id'], array('class' => 'f_label'));
            $this->output[$field] .= 'form_input' ;#($inp_data);
            
        }
        
        private function form_text($model, $field, $config)
        {
            $data = array(
                'name'  => 'text_'.$field.'_name',
                'value' => $model->$field,
                'id'    => 'text_'.$field.'_id',            
                'class' => 'f_textarea'
            );
            $this->output[$field]  = 'form_label'; #($config['label'], $data['id'],array('class'=>'f_label'));
            $this->output[$field] .= 'form_textarea';#($data);
        }
        
//        private function form_selectbox($field, $config)
//        {
//            #$query = $this->db->select('id, name')->get($config['table'])->result();
//            
//            foreach($query as $row)
//                $options[$row->id] = $row->name;
//                 
//            $data = array(
//                'name'  => 'select_'.$field.'_name',
//                'options' => $options,            
//                'id'    => 'text_'.$field.'_id',
//                'class' => 'f_select wide required',
//                'selected' => $this->main_model->$field
//            );
//            $this->data['content'][$field]  = form_label($config['label'], $data['id'], array('class' => 'f_label'));
//            $this->data['content'][$field] .= form_dropdown($data['name'], $data['options'], $data['selected'], 'id = "'.$data['id'].'" class = "'.$data['class'].'"');
//        }
        
        private function _html_chekbox()
        {
            
        }
        
        private function html_image($field, $config)
        {
            $source_image = $this->picture->get_source_image($this->main_model->image,'brands');
            $this->data['content'][$field] = '<img src="/'.$source_image.'" />';
        }
    }
?>
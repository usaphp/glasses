<?php

class Swap_db extends MY_Controller {

	function __construct(){
		parent::__construct();	
        set_time_limit(5000);
        
	}
	
	function index(){
        $this->add_model();
	}
    
    public function edit()
    {
        array_push($this->data['js_functions'], array('name' => 'swap_db_edit_init', 'data' => FALSE));
        
        
        $this->data['tables'] = $this->get_tables();
        
        #print_flex($this->data['tables']);
        $this->template->load('admin/templates/admin_template', 'admin/swap_db/edit', $this->data);
    }
    
    public function ajax_table_name_selected()
    {
        $table_name = $this->input->post('selected');
        $node_name  = $this->input->post('where_is');
        
        $node_number = substr($node_name,strrpos($node_name,'node')+5);
        if($node_number)
            $node_name = str_replace('_'.$node_number,'',$node_name);
            
        $data['fields'] = $this->get_fields($table_name);
        switch ($node_name)
        {
            case 'root_table_node':                
                $this->load->view('admin/swap_db/root_field_node', $data);
                break;
            case 'related_table_node':                
                $this->load->view('admin/swap_db/related_field_node', $data);
        }     
        $this->output->enable_profiler(false);
    }
    
    public function ajax_field_name_selected()
    {
        $field_name = $this->input->post('selected');              
        $node_name  = $this->input->post('where_is');
        
        $node_number = substr($node_name,strrpos($node_name,'node')+5);
        if($node_number)
            $node_name = str_replace('_'.$node_number,'',$node_name);
        
        switch ($node_name)
        {
            case 'root_field_node':
                $data['tables'] = $this->get_tables();
                $this->load->view('admin/swap_db/related_table_node', $data);
                break;
            #case 'ralated'
        }                 
        $this->output->enable_profiler(false);
    }
    
    private function get_tables()
    {
        $query = $this->db->query('show tables')->result();
        $tables = array();
        foreach($query as $row)
            $tables[$row->Tables_in_migazdb] = $row->Tables_in_migazdb;
        return $tables; 
    }
    
    private function get_fields($table_name)
    {
        $query = $this->db->query('DESCRIBE '.$table_name.'')->result();
        foreach($query as $key => $row)
            $fields[$key] = $row->Field;
        return $fields;  
         
    }
}

/* End of file welcome.php */
/* Location: ./system/application/controllers/welcome.php */
?>
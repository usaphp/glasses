<?php

class Products extends Admin_Controller {

	function __construct()
	{
		parent::__construct();	
	}
	
	function index()
	{
	   	
	}
    
    public function edit($model_id = false){
        if (!$model_id) {
            $this->show();
            return;
        }        
        $product    = new Product();
        $brands     = new Brand();
        $styles     = new Style();
        $features   = new Feature();

#       if($this->form_validation->run('a_product_edit')){        
        if($this->input->post('button_save_name'))
        {

            $brand_selected     = $this->input->post('brands_name');
            $style_selected     = $this->input->post('styles_name');
            $features_selected  = $this->input->post('features_name');
            
            $brand      = new Brand($brand_selected);
            $style      = new Style($style_selected);
            $features   = new Feature();
            $features->where_in('id', $features_selected)->get();
            
            $product->get_short_info($model_id);
            #SAVE
            $product->save(array($brand, $features->all, $style));
            #DELETE
            $features->where_not_in('id', $features_selected)->get();
            $product->delete($features->all);
            
        }
        
        $product ->get_full_info($model_id);        
        $brands  ->get_short_info();
        $styles  ->get_short_info();
        $features->get_short_info(); 
        
        
        $this->data['dm_product_selected'] = $product;
        #
        $convert_for_dropdown = function($val,$key,$output) use (&$array_name) {$output[$array_name][$val['id']]=$val['name']; };
        #
        $array_name = 'arr_brands';
        array_walk($brands->all_to_array(), $convert_for_dropdown , &$this->data);
        #
        $array_name = 'arr_styles';
        array_walk($styles->all_to_array(), $convert_for_dropdown , &$this->data);
        
        $array_name = 'arr_features';
        array_walk($features->all_to_array(), $convert_for_dropdown , &$this->data);
        
        $array_name = 'arr_features_selected';
        array_walk($product->feature->all_to_array(), $convert_for_dropdown , &$this->data);
        
        #$this->data['arr_brands']               = $convert_for_dropdown($brands->all_to_array());
        #$this->data['arr_styles']               = $convert_for_dropdown($styles->all_to_array());
        #$this->data['arr_features']             = $convert_for_dropdown($features->all_to_array());
        #$this->data['arr_features_selected']    = $convert_for_dropdown($product->feature->all_to_array());
        
        $this->template->load('/admin/templates/admin_template', 'admin/products/edit',$this->data);
    }
    
    public function show($page_number = 1, $sort_by = SORT_BY_MODEL){
        $limit  = 10;
        $offset = (($page_number-1) * 10);
        #$models_old = $this->db->select()->limit($limit,$offset)->get('sunglasshut')->result();            
        $models = new Product();
        switch($sort_by){
            case SORT_BY_MODEL:
                $models->order_by('name');
            case SORT_BY_BRAND:
                $models->order_by('brand_name');
            case SORT_BY_STYLE:
                $models->order_by('style_name');
            case SORT_BY_FRAME:
                $models->order_by('frame_material_name');
            case SORT_BY_LENSE:
                $models->order_by('lense_material_name');
        }
        $models->limit($limit,$offset)->get_short_info();

        $this->data['dm_models']    = $models;
        $this->data['page_count']   = $models->count()/$limit;
        $this->data['page_current'] = $page_number;
        $this->data['sort_by']      = $sort_by;            
        $this->template->load('admin/templates/admin_template', 'admin/products/show',$this->data);
    }
    
}

/* End of file welcome.php */
/* Location: ./system/application/controllers/welcome.php */
?>
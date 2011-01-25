<?php

class Ajax extends MY_Controller {

	function __construct()
	{
		parent::__construct();
        $this->output->enable_profiler(FALSE);
	}
	public function search_suggest(){

        $query_string = $this->input->post('query_string', TRUE);
        #!
        $brands  = new Brand();
        $styles  = new Style();
        $products= new Product();
        #!
        $brands->like('name', $query_string, 'after')->limit(5)->get_short_info();
        $styles->like('name', $query_string, 'after')->limit(5)->get_short_info();
        $products->like('name', $query_string, 'after')->limit(5)->get_short_info();
        #!
        $data['items']= array();
        $data['items']['text']= array(); 
        foreach($brands as $brand)
        {
            $data['items']['text'][]      = $query_string.'<strong>'.(str_ireplace($query_string,'',$brand->name)).'</strong>';
            $data['items']['page_url'][]  = $this->linker->brand_show($brand->name, TRUE);
            $data['items']['image_url'][] = $this->picture->make_image($brand->image, IMAGE_CAT_BRAND, IMAGE_SIZE_TINY);
            $data['items']['type'][]      = 'brand';
        }
        foreach($styles as $style)
        {
            $data['items']['text'][]      = $query_string.'<strong>'.(str_ireplace($query_string,'',$style->name)).'</strong>';
            $data['items']['page_url'][]  = $this->linker->style_show($style->name, TRUE);
            $data['items']['image_url'][] = $this->config->item('style_image_url').$style->image;
            $data['items']['type'][]      = 'style';
        }
        foreach($products as $product)
        {
            $data['items']['text'][]      = $query_string.'<strong>'.(str_ireplace($query_string,'',$product->name)).'</strong>';
            $data['items']['page_url'][]  = $this->linker->product_show($product->id);
            
            $data['items']['image_url'][] = $this->picture->make_image($product->image, IMAGE_CAT_MODEL_SET, IMAGE_SIZE_TINY);
            $data['items']['type'][]      = 'product';
        }
        $return_arr['items'] = $this->load->view('search/suggest',$data,true);
        #print_flex($data['items']);
        $return_arr['status'] = true;
        echo json_encode($return_arr);
        return ;
    }
}

/* End of file welcome.php */
/* Location: ./system/application/controllers/welcome.php */
?>
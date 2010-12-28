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
        foreach($brands as $brand)
        {
            $return_arr['items']['text'][]      = $query_string.'<strong>'.(str_ireplace($query_string,'',$brand->name)).'</strong>';
            $return_arr['items']['image_url'][] = $this->config->item('brand_image_url').$brand->image;
            $return_arr['items']['type'][]      = 'brand';
        }
        foreach($styles as $style)
        {
            $return_arr['items']['text'][]      = $query_string.'<strong>'.(str_ireplace($query_string,'',$style->name)).'</strong>';
            $return_arr['items']['image_url'][] = $this->config->item('style_image_url').$style->image;
            $return_arr['items']['type'][]      = 'style';
        }
        foreach($products as $product)
        {
            $return_arr['items']['text'][]      = $query_string.'<strong>'.(str_ireplace($query_string,'',$product->name)).'</strong>';
            $return_arr['items']['image_url'][] = $this->config->item('product_image_url').$product->image;
            $return_arr['items']['type'][]      = 'product';
        }
                
        $return_arr['status'] = true;
        echo json_encode($return_arr);
        return ;
    }
}

/* End of file welcome.php */
/* Location: ./system/application/controllers/welcome.php */
?>
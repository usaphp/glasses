<?php

class Swap_db extends MY_Controller {

	function __construct(){
		parent::__construct();	
        set_time_limit(5000);
        
	}
	
	function index(){
        $this->add_model();
	}
    
    public function add_brand(){
        $query = $this->db->select('brand')->distinct('brand')->get('sunglasshut')->result();
        foreach($query as $row){
            echo $row->brand.'</br>';
            $this->db->insert('brands',array('name'=>$row->brand));
        }
    }
    public function add_color_from_lense_color(){
        $query = $this->db->select('lense_color')->where('lense_color !=', 'NULL')->distinct('lense_color')->get('sunglasshut')->result();
        print_flex($query);
        foreach($query as $row){
            echo $row->lense_color.'</br>';
            $this->db->insert('colors',array('name'=>$row->lense_color));
        }
        echo '</br>';
    }
    public function add_color_from_frame_color(){
        $color_exist = $this->db->select('name')->get('colors')->result();
        print_flex(array_map(function($i){return $i->name;},$color_exist));
        $query       = $this->db->select('frame_color')->from('sunglasshut')
                                ->where_not_in('frame_color',array_map(function($i){return $i->name;},$color_exist))
                                ->distinct('frame_color')->get()->result();
        print_flex($query);
        foreach($query as $row){
            echo $row->frame_color.'</br>';
            $this->db->insert('colors',array('name'=>$row->frame_color));
        }
    }
    public function add_style(){
        $query = $this->db->select('style')->distinct('style')->get('sunglasshut')->result();
        foreach($query as $row){
            echo $row->style.'</br>';
            $this->db->insert('styles', array('name'=>$row->style));
        }
    }
    public function add_frame_material(){
        $query = $this->db->select('frame_material')->distinct('frame_material')->get('sunglasshut')->result();
        foreach($query as $row){
            echo $row->frame_material.'</br>';
            $this->db->insert('frame_materials', array('name'=>$row->frame_material));
        }
    }
    #
    public function add_lense_material(){
        $query = $this->db->select('lense_material')->distinct('lense_material')->get('sunglasshut')->result();
        foreach($query as $row){
            echo $row->lense_material.'</br>';
            $this->db->insert('lense_materials', array('name'=>$row->lense_material));
        }
    }
    public function add_features(){
        $query_1 = $this->db->select('features')->where('features !=', 'NULL')->distinct('features')->get('sunglasshut')->result();
        #print_flex($query_1);
        $query_2 = array_map(function($i){return $i->features;},$query_1);
        #print_flex($query_2);
        $query_3 = array_map(function($i){return explode(',',$i);},$query_2);
        #print_flex($query_3);
        $query_4 = array_map(function($i){return array_map(function($j){return trim($j);},$i);},$query_3);
        #print_flex($query_4);
        $query_5 = array();
        echo array_walk_recursive($query_4, function($i,$key,$arr){ array_push($arr, $i);},&$query_5);
        print_flex($query_5);
        $query_6 = array();
        echo array_walk_recursive($query_5, function($i,$key,$arr){ if(!in_array($i,$arr))$arr[]=$i;},&$query_6);
        //foreach($query_1 as $row){            
//            foreach()
//        }
//        $query_2 = array_walk_recursive($query_4, function($i,$key,$arr){ array_push($arr,
//                            array_map(function($i){
//                                        return array_map(function($j){
//                                                        return trim($j);
//                                                    },
//                                                    explode(',',$i->features));
//                                        },
//                                        $query_1
//                            );},&$query_6);
//        print_flex($query_6);
        #$query_6 = array_diff($query_5,$query_5);
        
        foreach($query_6 as $row){
            echo $row.'</br>';
            $this->db->insert('features', array('name'=>$row));
        }
    }
    public function add_model_description(){
        $query = $this->db->get('sunglasshut')->result();
        $models = $this->db->select('name')->distinct()->get('models')->result();
        foreach($query as $row){
            foreach($models as $model){
                if($row->model == $model->name){
                    echo $row->model.' '.$row->description.'</br>';
                    $this->db->where('name',$model->name)
                            ->update('models',array('description'=>$row->description));
                    break ;
                }
            }
        }
    }
    
    public function add_model(){
		$brands = $this->db->select('id, name')->get('brands')->result();        
        
        $styles = $this->db->select('id, name')->get('styles')->result();
        $frame_materials = $this->db->select('id, name')->get('frame_materials')->result();
        $lens_materials  = $this->db->select('id, name')->get('lense_materials')->result();
        $models_obj = $this->db->select('model')->distinct()->get('sunglasshut')->result_array();
        $models_arr = array();
        echo array_walk_recursive($models_obj, function($i,$key,$arr){ $arr[] = $i;},&$models_arr);
        $query = $this->db->get('sunglasshut')->result();
        
        print_flex($models_arr);
//        print_flex($models_obj);
//        return;
        foreach($models_arr as $row){
            foreach($query as $q)
                if ($row == $q->model){                     
                    foreach($brands as $elem)
                        if ($q->brand == $elem->name )$data['brand_id'] = $elem->id;
                    
                    foreach($frame_materials as $elem)
                        if ($q->frame_material == $elem->name )$data['frame_material_id'] = $elem->id;
                    
                    foreach($lens_materials as $elem)
                        if ($q->lense_material == $elem->name )$data['lense_material_id'] = $elem->id;                        
                    
                    foreach($styles as $elem)
                        if ($q->style == $elem->name ) $data['style_id'] = $elem->id;
                    
                    $data['name'] = $q->model;
                    $this->db->insert('models', $data);
                    break;
                }
            
            
                            
        }
    }
    public function add_sets(){
        $colors = $this->db->select('id, name')->get('frame_colors')->result();
        $models = $this->db->select('id, name')->get('models')->result();
        $query = $this->db->get('sunglasshut')->result();
        foreach($query as $row){
            $data = array();
            foreach($models as $elem)
                if ($elem->name == $row->model) $data['model_id'] = $elem->id;
            foreach($colors as $elem)
                if ($elem->name == $row->frame_color) $data['frame_color_id'] = $elem->id;
            foreach($colors as $elem)
                if ($elem->name == $row->lense_color) $data['lense_color_id'] = $elem->id;
            $data['eye_size']       = $row->eye_size;
            $data['bridge_size']    = $row->bridge_size;
            $data['temple_size']    = $row->temple_size;            
            $data['upc']            = $row->upc;
            $this->db->insert('sets',$data);
            print_flex($row);
            print_flex($data);
        }
    }
    public function add_images(){
  		$config['upload_path'] = 'images\photo\model_sets';
		$config['allowed_types'] = 'gif|jpg|png';
		$FILE['userfile'] = 'http://s7d3.scene7.com/is/image/LuxotticaRetail/745016235366_shad_qt?$pngalpha$&wid=2400';
		$this->load->library('upload', $config);	
		if ( ! $this->upload->do_upload())
		{
			$error = array('error' => $this->upload->display_errors());
			
			#$this->load->view('upload_form', $error);
		}	
		else
		{
			$data = array('upload_data' => $this->upload->data());
			
			#$this->load->view('upload_success', $data);
		}
    }
    public function add_feature_model(){
        $sunglass_query = $this->db->select('model, features, models.id')
                            ->join('models','models.name = sunglasshut.model')
                            ->get('sunglasshut')->result();
                                    
        $features_query = $this->db->select('name,id')->get('features')->result();

        
        
        
        $sunglass = array();
        foreach($sunglass_query as $sun)
            if(!isset($sunglass[$sun->model])){      
                $sunglass[$sun->model]['features'] = array_map(function($y){return trim($y);},explode(',',$sun->features));                
                $sunglass[$sun->model]['id'] = $sun->id; 
            }
        
        
                #if($feat == $row->name)
                    #$feat['id'] = $row->id;
                    #echo $row->id.' '.$row->name;
                    
        print_flex($sunglass);            
        foreach($sunglass as $key=>$sun)            
            foreach($sun['features'] as $feature)                
                    foreach($features_query as $row)
                        if($feature == $row->name)
                            echo 1;
                            #$this->db->insert('features_models',array('model_id'=>$sun['id'],'feature_id'=>$row->id));        
        
    }
    public function add_models_stores(){
        $sunglass_query = $this->db->select('model, price, models.id')
                            ->join('models','models.name = sunglasshut.model')
                            ->get('sunglasshut')->result();
        print_flex($sunglass_query);
        $sunglass = array();
        foreach($sunglass_query as $sun)
            if(!isset($sunglass[$sun->model])){
                $sunglass[$sun->model]['id'] = $sun->id;
                $sunglass[$sun->model]['price'] = $sun->price;
                #$this->db->insert('models_stores',array('model_id'=>$sun->id,'stores_id'=>1,'price'=>$sun->price));
            }
        
    }

    public function add_models_stores_url(){
        $sets_query = $this->db->select('model_id, page_url')->distinct()->get('sets')->result();
        //foreach($sets_query as $set)            
//                $this->db->where('model_id', $set->model_id)
//                            ->update('models_stores', array('page_url'=>$set->page_url));
            
    }
    public function get_images(){
        $sunglass_query = $this->db->select('model, image_url, image_front_url, products.id')
                            ->join('products','products.name = sunglasshut.model')                            
                            ->get('sunglasshut')->result();
        
        foreach($sunglass_query as $row){
            $abs_path = 'E:\xampp\project\migaz\public_html\images\photo\model_sets\\';
            #IMAGE
            $url_image_array = explode('/',$row->image_url);            
            $image_name = current(explode('?',$url_image_array[6])).'.png';
            if (!file_exists($abs_path.$image_name)){
                $image = file_get_contents($row->image_url);
                file_put_contents($abs_path.$image_name, $image);
                echo $image_name;
            }        
            #FRONT IMAGE
            
            $url_front_image_array = explode('/',$row->image_front_url);            
            $image_front_name = current(explode('?',$url_front_image_array[6])).'.png';
            
            if (!file_exists($abs_path.$image_front_name)){
                $image = file_get_contents($row->image_front_url);
                file_put_contents($abs_path.$image_front_name,$image);
                echo $image_front_name;
            }
            print_flex($row);
        }
    }
    public function get_content(){
        $image = file_get_contents('http://www.ogame.ru');
        
        $dom = new DomDocument();
        $res = $dom->loadHTML($image);
        print_flex($dom);
    }
}

/* End of file welcome.php */
/* Location: ./system/application/controllers/welcome.php */
?>
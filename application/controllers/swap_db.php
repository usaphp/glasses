<?php

class Swap_db extends MY_Controller {

	function __construct(){
		parent::__construct();	
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
}

/* End of file welcome.php */
/* Location: ./system/application/controllers/welcome.php */
?>
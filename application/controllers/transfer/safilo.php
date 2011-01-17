<?php

class Safilo extends MY_Controller {

	function __construct(){
		parent::__construct();	
        set_time_limit(0);
        ini_set('memory_limit', '512M');
		$this->output->enable_profiler(FALSE);
	}
	
	function transfer_brands($limit = FALSE, $offset = FALSE){
        $sunglasses = $this->db->select('brand, collection_desc, target_customers, brand_features')
							->limit($limit, $offset)
							->group_by('brand')
                            ->get('safilo')->result();
		foreach($sunglasses as $row){
			echo $row->brand.'<br/>';
			$brand = new Brand();
			$brand->where('name', $row->brand)->get();
			
			$brand->name = $row->brand;
			$brand->description = $row->collection_desc;
			$brand->features = $row->brand_features;
			$brand->target_customers = $row->target_customers;
			
			$brand->save();
		}
	}
	
	function transfer_products($limit = FALSE, $offset = FALSE){
        $sunglasses = $this->db->limit($limit, $offset)
                            ->get('safilo')->result();
		foreach($sunglasses as $row){
			echo $row->model.'<br/>';
			/* BRAND */
			$dm_brand = new Brand();
			$dm_brand->where('name', $row->brand)->get();
			if(!$dm_brand->exists()){
				$dm_brand->name = $row->brand;
				$dm_brand->description = $row->collection_desc;
				$dm_brand->features = $row->brand_features;
				$dm_brand->target_customers = $row->target_customers;
				$dm_brand->save();
			}
			
			/* TYPE */
			$type_name = ($row->type =='Ophthalmic')?'eyeglasses':'sunglasses';
			$dm_type = new Type();
			$dm_type->where('name', $type_name)->get();
			
			/* GENDER */
			$dm_gender = new Gender();
			switch($row->gender){
				case 'Male Adult':
					$gender_name = 'men';
				break;
				case 'Female Adult';
					$gender_name = 'women';
				break;
				default:
					$gender_name = 'unisex';
				break;
			}
			$dm_gender->where('name', $gender_name)->get();
			
			/* FRAME MATERIAL */
			$dm_frame_material = new Frame_material();
			$dm_frame_material->where('name', $row->frame_material)->get();
			if(!$dm_frame_material->exists()){
				$dm_frame_material->name = $row->frame_material;
				$dm_frame_material->save();
			}
			
			/* STYLE */
			$dm_style = new Style();
			switch($row->eye_shape){
				case 'Rectangular':
					$style_name = 'Rectangle';
				break;
				case 'Tea Cup':
					$style_name = 'T-Cup';
				break;
				default:
					$style_name = $row->eye_shape;
				break;
			}
			$dm_style->where('name', $style_name)->get();
			if(!$dm_style->exists()){
				$dm_style->name = $style_name;
				$dm_style->save();
			}
			
			/* PRODUCT */
			$dm_product = new Product();
			$dm_product->where(array('name' => $row->model, 'brand_id' => $dm_brand->id, 'type_id' => $dm_type->id, 'gender_id' => $dm_gender->id))->get();
			if(!$dm_product->exists()){
				$dm_product->name = $row->model;
				$dm_product->brand_id = $dm_brand->id;
				$dm_product->type_id = $dm_type->id;
				$dm_product->gender_id = $dm_gender->id;
				$dm_product->frame_material_id = $dm_frame_material->id;
				$dm_product->style_id = $dm_style->id;
				$dm_product->save();
				echo $dm_product->name.' added<br/>';
			}
			
			
			/* FRAME COLOR */
			$dm_frame_color = new Frame_color();
			$dm_frame_color->where('name', $row->frame_color_name)->get();
			$dm_frame_color->name = $row->frame_color_name;
			$dm_frame_color->code = $row->frame_color_code;
			$dm_frame_color->save();
			
			/* LENSE COLOR */
			$dm_lense_color = new Lense_color();
			$dm_lense_color->where('name', $row->lense_color_name)->get();
			$dm_lense_color->name = $row->lense_color_name;
			$dm_lense_color->code = $row->lense_color_code;
			$dm_lense_color->save();
			
			/* SET */
			$dm_set = new Set();
			$dm_set->where(array(
								'product_id' => $dm_product->id, 
								'upc' => $row->upc, 
								'frame_color_id' => $dm_frame_color->id, 
								'lense_color_id' => $dm_lense_color->id,
								'eye_size' => $row->eye_size,
								'bridge_size' => $row->bridge_size,
								'temple_size' => $row->temple_size))->get();
			if(!$dm_set->exists()){
				$dm_set->product_id = $dm_product->id;
				$dm_set->upc = $row->upc;
				$dm_set->frame_color_id = $dm_frame_color->id;
				$dm_set->lense_color_id = $dm_lense_color->id;
				$dm_set->eye_size = $row->eye_size;
				$dm_set->bridge_size = $row->bridge_size;
				$dm_set->temple_size = $row->temple_size;
				$dm_set->save();
				echo $dm_set->upc.' added set<br/>';
			}
			
		}
	}
}
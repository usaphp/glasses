<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
    $config['default_form'] = array(
        'name'                  => array('view' => 'form_input',        'label' => 'Name'),
        'description'           => array('view' => 'form_text',         'label' => 'Description'),
    );
    
    $config['product_form'] = array(
        'brand_id'              => array('view' => 'form_selectbox',    'label' => 'Brand',         'table' => 'brands'),
        'type_id'               => array('view' => 'form_selectbox',    'label' => 'Type',          'table' => 'types'),
        'gender_id'             => array('view' => 'form_selectbox',    'label' => 'Gender',        'table' => 'genders'),
        'frame_material_id'     => array('view' => 'form_selectbox',    'label' => 'Frame material','table' => 'frame_materials'),
        'lense_material_id'     => array('view' => 'form_selectbox',    'label' => 'Lense_material','table' => 'lense_materials'),
        'style_id'              => array('view' => 'form_selectbox',    'label' => 'Style',         'table' => 'styles'),                
        'description_history'   => array('view' => 'form_text',         'label' => 'Descript history'),
        'image'                 => array('view' => 'html_image'),
        'feature'               => array(
            array('view' => 'form_chekbox', 'table' => 'features')
        )                                
    );
?>
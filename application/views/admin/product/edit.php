<?php	
    $sel_brands = array(
        'options'   => $arr_brands,
        'name'      => 'brands_name',
        'id'        => 'brands_id',
        'class'     => 'f_select',
        'selected'  => $dm_product_selected->brand_id
    );
    $sel_styles = array(
        'options'   => $arr_styles,
        'name'      => 'styles_name',
        'id'        => 'styles_id',
        'class'     => 'f_select',
        'selected'  => $dm_product_selected->style_id
    );
    $sel_features = array(
        'options'   => $arr_features,
        'name'      => 'features_name[]',
        'id'        => 'features_id',
        'class'     => 'f_select',
    #поменять местами id -> name 
        'selected'  => array_flip($arr_features_selected)        
    );
    $btn_save = array(
        'name' => 'button_save_name',
        'value'=> 'Save',
        'id'   => 'button_save_id',
        'class'=> 'f_button'
    );
?>
<div class="span-24">
    <div><?php echo 'Edit: '.$dm_product_selected->name;?></div>
    <?php 
    echo form_open_multipart('/admin/product/edit/'.$dm_product_selected->id, array());
    
    echo form_label('Style', $sel_brands['id'], array('class' => 'f_label'));
    echo form_dropdown($sel_brands['name'], $sel_brands['options'], $sel_brands['selected'], 'id = "'.$sel_brands['id'].'" class = "'.$sel_brands['class'].'"');
    
    echo form_label('Brand', $sel_styles['id'], array('class' => 'f_label'));
    echo form_dropdown($sel_styles['name'], $sel_styles['options'], $sel_styles['selected'], 'id = "'.$sel_styles['id'].'" class = "'.$sel_styles['class'].'"');
    
    echo form_label('Features', $sel_features['id'], array('class' => 'f_label'));
    echo form_dropdown($sel_features['name'], $sel_features['options'], $sel_features['selected'], 'id = "'.$sel_features['id'].'" class = "'.$sel_features['class'].'" multiple = "multiple"');
    
    echo form_submit($btn_save);
    echo form_close();
    ?>              
</div>
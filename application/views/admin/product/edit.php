<?php
	$sel_styles = array(
        'options'   => $arr_styles,
        'name'      => 'style_id',
        'id'        => 'style_id',
        'class'     => 'f_select',
        'selected'  => ''
    );
    $sel_brands = array(
        'options'   => $arr_brands,
        'name'      => 'brand_id',
        'id'        => 'brand_id',
        'class'     => 'f_select',
        'selected'  => ''
    );
    $sel_features = array(
        'options'   => $arr_features,
        'name'      => 'brand_id',
        'id'        => 'brand_id',
        'class'     => 'f_select',
        'selected'  => ''
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
    echo form_dropdown($sel_features['name'], $sel_features['options'], $sel_features['selected'], 'id = "'.$sel_features['id'].'" class = "'.$sel_features['class'].'"');
    
    echo anchor('admin/product/edit/'.$dm_product_selected->id, 'Add', array('class' => 't_action'));
    
    echo form_close();
    ?>              
</div>
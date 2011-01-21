<?php
    $sel_field = array(
        'name'      => 'field_name',
        'options'   => $fields,
        'selected'  => '',
        'id'        => '',
        'class'     => 'ajax_selectbox f_select'
    );
?>
<div id="related_field_node" class="node span-6"> 
    <?php echo form_label('Select field', $sel_field['id'],array('class'=>'f_label'));?>
    <?php echo form_dropdown($sel_field['name'], $sel_field['options'], $sel_field['selected'], 'id = "'.$sel_field['id'].'" class = "'.$sel_field['class'].'"');?>
    <div class="children_node" ></div>
</div>
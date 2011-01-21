<?php
    $chk_field = array(
        'name'      => 'field_name',
        'value'     => $field,
        'id'        => '',
        'class'     => 'ajax_checkbox'
    );
    $chk_field = array(
            'name'      => 'field_name',
            'value'     => $field,
            'id'        => '',
            'class'     => 'ajax_checkbox'
    );
    $chk_field = array(
        'name'      => 'field_name',
        'value'     => $field,
        'id'        => '',
        'class'     => 'ajax_checkbox'
    );
        ?>
        <div id="root_field_node" class="node">
            <?php echo form_checkbox($chk_field); ?>
            <?php echo form_label($field, $chk_field['id'],array('class'=>''));?>
            <div class="response_node" ></div>
        </div>

<div id="options_node" class="node"> 
    <?php echo form_label('Select field', $sel_field['id'],array('class'=>'f_label'));?>
    <?php echo form_dropdown($sel_field['name'], $sel_field['options'], $sel_field['selected'], 'id = "'.$sel_field['id'].'" class = "'.$sel_field['class'].'"');?>
    <div class="children_node" ></div>
</div>
<?php
    foreach($fields as $key=>$field):
        $chk_field = array(
            'name'      => 'field_name',
            'value'     => $field,
            'id'        => '',
            'class'     => 'ajax_checkbox f_checkbox'
        );
        ?>
        <div id="root_field_node_<?php echo $key?>" class="node span-20 f_block">
            <?php echo form_checkbox($chk_field); ?>
            <?php echo form_label($field, $chk_field['id'],array('class'=>'f_label_cb'));?>
            <div class="clear"></div>
            <div class="children_node" ></div>
        </div>
<?php endforeach;?>
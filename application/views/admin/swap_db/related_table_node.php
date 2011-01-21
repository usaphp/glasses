<?php
    $sel_table = array(
        'name'      => 'table_name',
        'options'   => $tables,
        'selected'  => current($tables),
        'id'        => '',
        'class'     => 'ajax_selectbox f_select'
    );
?>
<div id="related_table_node" class="node span-16">
    <div class="span-6">
    <?php echo form_label('Select Table', $sel_table['id'],array('class'=>'f_label'));?>
    <?php echo form_dropdown($sel_table['name'], $sel_table['options'], $sel_table['selected'], 'id = "'.$sel_table['id'].'" class = "'.$sel_table['class'].'"');?>
    </div>
    <div class="children_node"></div>
</div>
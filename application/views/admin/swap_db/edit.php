<?php
    $sel_table = array(
        'name'      => 'table_name',
        'options'   => $tables,
        'selected'  => current($tables),
        'id'        => '',
        'class'     => 'ajax_selectbox f_select'
    );
?>
<div class="span-24">
    <h1>Swap DB</h1>
    <form action="http://local.migaz/admin/swap_db/edit" method="post">
    <div id="root_table_node" class="node span-23 f_block prepend-1 last">
        <?php echo form_label('Select Table', $sel_table['id'],array('class'=>'f_label'));?>
        <?php echo form_dropdown($sel_table['name'], $sel_table['options'], $sel_table['selected'], 'id = "'.$sel_table['id'].'" class = "'.$sel_table['class'].'"');?>
        <div class="children_node"></div>
    </div>
    </form>
</div>
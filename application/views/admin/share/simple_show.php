<?php    
    $inp_elem = array(
        'name'  => 'input_name',
        'value' => '',
        'id'    => 'input_id',
        'class' => 'f_input'
    );
    $btn_save = array(
        'name'  => 'button_add_name',
        'value' => 'Add',
        'id'    => 'button_add_id',
        'class' => 'f_button'                                    
    );
    $link = 'a_'.$dm_model->table.'_edit';    
?>
<div class="span-24">
    <div><h2><?php echo 'Edit '.$dm_model->model ?></h2></div>
    <ul>
    <?php foreach($dm_model as $dm_elem):?>
        <li><?php echo anchor($this->linker->$link($dm_elem->id),$dm_elem->name);?></li>
    <?php endforeach;?>
    </ul>
    <?php
        echo form_open($this->linker->$link());
        echo form_input($inp_elem);
        echo form_submit($btn_save);  
        echo form_close();
    ?>
</div>
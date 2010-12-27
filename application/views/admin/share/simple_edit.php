<?php
    $inp_name = array(
        'name'  => 'name_input',
        'value' => $dm_model->name,
        'id'    => 'name_input_id',
        'class' => ''
    );
    $btn_save = array(
        'name'  => 'save_button',
        'value' => 'Save',
        'id'    => 'save_button_id',
        'class' => ''
    );
    $link = 'a_'.$dm_model->table.'_edit';
?>
<div class="span-24">
    <div><h2><?php echo 'Edit '.$dm_model->model?></h2></div>    
    <?php    
        echo form_open($this->linker->$link($dm_model->id));
        echo form_input($inp_name);
        echo form_submit($btn_save);
        echo form_close();
    ?>
</div>
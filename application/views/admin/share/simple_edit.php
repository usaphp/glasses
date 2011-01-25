<?php
    $inp_name = array(
        'name'  => 'name_input',
        'value' => $dm_model->name,
        'id'    => 'name_input_id',
        'class' => 'f_input'
    );
    $btn_save = array(
        'name'  => 'save_button',
        'value' => 'Save',
        'id'    => 'save_button_id',
        'class' => 'f_button'
    );
?>
<div class="span-24">
    <div><h2><?php echo 'Edit '.$dm_model->model?></h2></div>    
    <?php
        echo form_open($this->linker->$link($dm_model->id));
        echo form_label('Name', $inp_name['id'], array('class' => 'f_label'));
        echo form_input($inp_name);
        
        echo form_submit($btn_save);
        echo form_close();
    ?>
</div>
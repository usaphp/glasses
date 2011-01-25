<?php
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
        echo form_open($this->linker->$edit_link($dm_model->id));
        foreach($content as $elem)
        {
            echo $elem;
        }
        echo form_submit($btn_save);
        echo form_close();
    ?>
</div> 
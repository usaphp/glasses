<?php    
    $inp_brand = array(
        'name'  => 'input_brand_name',
        'value' => '',
        'id'    => 'input_brand_id',
        'class' => 'f_input'
    );
    $btn_save = array(
        'name'  => 'button_save_name',
        'value' => 'Save',
        'id'    => 'button_save_id',
        'class' => 'f_button'                                    
    );
?>
<div class="span-24">
    <div>Brands</div>
    <ul>
    <?php foreach($dm_brands as $brand):?>
        <li><?php echo anchor($this->linker->a_brands_edit($brand->id),$brand->name);?></li>
    <?php endforeach;?>
    </ul>
    <?php
        echo form_open($this->linker->a_brands_show());
        echo form_input($inp_brand);
        echo form_submit($btn_save);  
        echo form_close();
    ?>
</div>
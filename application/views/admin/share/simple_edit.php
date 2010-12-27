<div class="span-24">
    <div>Brands</div>    
    <?php
        echo form_open($this->linker->a_brands_show());
        echo form_input($inp_brand);
        echo form_submit($btn_save);  
        echo form_close();
    ?>
</div>
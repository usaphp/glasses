
<div class="span-24">
    <div >
        <img src="<?php echo $image_url;?>"/>
    </div>
    <div>
        <?php
        foreach($dm_set_selected as $set){
            echo $set->frame_color_hex.'/'.$set->lense_color_hex.'</br>';   
        }
        ?>
    </div>
    <?php
        echo 'model: '.$dm_model_selected->name.'</br>';
        echo 'band: '.$dm_model_selected->brand_name.'</br>';
        echo 'syle: '.$dm_model_selected->syle_name.'</br>';
        echo 'frame: '.$dm_model_selected->frame_material_name.'</br>';
        echo 'lense: '.$dm_model_selected->lense_material_name.'</br>';
    ?>
</div>
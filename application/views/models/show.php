
<div class="span-24">
    
    <div class="set_main_image span-16">
        
        <img src="<?php echo array_shift($images_path);?>"/>
        
        <div class="set_images">
        <?php
            foreach($images_path as $image_path){
                echo '<img src="'.$image_path.'"/>';   
            }    
        ?>
        </div>
        
    </div>
    
    <div class="model_description span-8 last">
        
        <div><h2><?php echo $dm_model_selected->name;?></h2></div>
        
        <div class="model_prises">
            <?php foreach($dm_model_selected->store as $store){?>
                <?php echo anchor($store->url, $store->name)?>                
                <h2>Price: <strong><?php echo anchor($store->join_page_url,$store->join_price)?></strong></h2>
            <?php }?>
        </div>
        
        <div>
        <?php foreach($dm_sets as $set){?>
            <a href="<?php echo $this->linker->models_show($dm_model_selected->id,$set->id);?>" style="float: left;">                    
                <div style = "background:#<?php echo $set->frame_color_hex; ?>;width:30px;">&nbsp;</div>
                <div style = "background:#<?php echo $set->lense_color_hex; ?>;width:30px;">&nbsp;</div>
            </a>
        <?php }?>
        </div>        
        <div class="clear"></div>
        
        <div><strong>Description:&nbsp;</strong><?php echo $dm_model_selected->description;?></div>
        
        <ul>
            <li><strong>Band:&nbsp;</strong><?php echo $dm_model_selected->brand_name;?></li>
            <li><strong>Style:&nbsp;</strong><?php echo $dm_model_selected->style_name;?></li>
            <li><strong>Frame:&nbsp;</strong><?php echo $dm_model_selected->frame_material_name;?></li>
            <li><strong>Lense:&nbsp;</strong><?php echo  $dm_model_selected->lense_material_name;?></li>
            <li><strong>Feature:&nbsp;</strong><?php #echo  $dm_model_selected->feature;?></li>
        </ul>
        
    </div>
    
</div>
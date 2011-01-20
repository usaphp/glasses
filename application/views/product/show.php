<?php
    $rdo_rating = array(
        'name'      => '',
        'value'     => '',
        'id'        => '',        
        'class'     => 'star {split:2}',
        'disabled'  => 'disabled' 
    )
?>
<div class="span-24 product_info_wrapper">
 	<h1 class='product_name'><?php echo $dm_product_selected->brand_name.' '.$dm_product_selected->name.' '.$dm_product_selected->type_name;?></h1>

    <div class="span-8">
    	<div class='p_left'>
        	<img src='http://c0180890.cdn1.cloudfiles.rackspacecloud.com/photos/medium/<?php echo $dm_product_selected->set->upc; ?>.png'/>
        
        <div class="set_images">
        <?php
        /*
            foreach($dm_product_selected->set->set_image as $set_image){
                echo '<img src="'.$this->picture->make_image($set_image->name, IMAGE_CAT_MODEL_SET, IMAGE_SIZE_TINY).'"/>';   
            }
		*/
		?>
        </div>
        </div>
    </div>
    <div class='span-16 last'>
        <div class='p_right'>
	    	<h2 class='p_best_price'>Best Price: <a href="<?php echo $best_store->join_page_url;?>"><?php echo '$'.$best_store->price;?></a> <?php echo 'at '.$best_store->name;?></h2>
	        <h2>Color Options</h2>
		    <div class='p_color_sets_wrapper'>
		    <?php foreach($dm_sets as $set){?>
		    	<?php $selected = ($dm_product_selected->set->id == $set->id)?'selected':''; ?>
		        <a href="<?php echo $this->linker->product_show($dm_product_selected->id, $set->id);?>" class='p_color_set_link <?php echo $selected; ?>'>                    
		            <span style = "background:#<?php echo $set->frame_color_hex; ?>;">&nbsp;</span>
		            <span style = "background:#<?php echo $set->lense_color_hex; ?>;">&nbsp;</span>
		        </a>
		    <?php }?>
		    <div class="clear"></div>
		    </div>
	        <h2>Description</h2>
	        <p><?php echo $dm_product_selected->description;?></p>
		</div>
    </div>
    <div class='clear'></div>
    <h2 class='topped'>Online Stores</h2>
    <table class='store_prices'>
    	<thead>
    		<tr>
    			<th>Store name</th>
    			<th>Store rating</th>
    			<th>Tax and shipping</th>
    			<th>Coupon code/discount</th>
    			<th>Base price</th>
    			<th class='td_number'>Total price</th>
    		</tr>
    	</thead>
    	<tbody>
			<?php $odd_even = 'odd'; ?>
    		<?php foreach($dm_product_selected->store as $store){ ?>
        	<?php $odd_even = ($odd_even == 'odd')?'even':'odd';?>
    		<tr class='<?php echo $odd_even; ?>'>
    			<td><a href='#' class='pt_store_name'><?php echo ucwords($store->name); ?></a></td>
    			<td>
                
                <?php            
                $rdo_rating['name'] = 'star'.$store->id;
                #каждый рейтинг должен быть в своей форме для js
                #имя у группы inputoв должно быть одинаковым - star#
                echo form_open('#', array('name'=>$rdo_rating['name']));
                    #10 radiobutton по 2 на каждую звезду 
                    for($i=1;$i<=10;$i++)
                    {
                        #значения содержат имя и номер радиобат. для передачи в js
                        $rdo_rating['value']= $rdo_rating['name'].'_'.$i;
                        #если средний рейтинг совподает с номером радиобат. 
                        #он отмечается
                        if((int)round($store->review->rating) == $i)
                            $rdo_rating['checked'] = 'checked';
                        else
                            $rdo_rating['checked'] = '';
                        
                        echo form_radio($rdo_rating);
                    }
                echo form_close();
                ?>
                
                <?php echo anchor($this->linker->stores_show($store->id),$store->review->reviews,'class="pt_store_ratings_link"');?>    
                </td>
    			<td><span class='pt_shipping_tax'><?php echo ($store->tax + $store->shipping);?></span></td>
    			<td>
                    <a href='#' class='pt_coupon_code c-small'><?php echo $store->best_coupon->name;?></a>
                    <span class='pt_coupon_discount'>
                        <?php echo $store->best_coupon->calculate->get_description().' Off';?>
                    </span>
                </td>
    			<td class='td_number'>
                    <span class='pt_base_price'>$<?php echo $store->join_price; ?></span>
                </td>
    			<td class='td_number'><a href='#' class='pt_total_price'>$<?php echo $store->best_coupon->calculate->get_price($store->join_price); ?></a></td>
    		</tr>
    		<?php } ?>
    	</tbody>
    </table>
    <div class='f-l'>
	    <h2 class='topped'>Product Information</h2>
	    <ul class='product_information'>
	    	<li>Collection: <span><?php echo $dm_product_selected->type_name; ?></span></li>
	    	<li>Brand: <span><?php echo $dm_product_selected->brand_name;?></span></li>
	    	<li>Model: <span><?php echo $dm_product_selected->name; ?></span></li>
	    	<li>Gender: <span><?php echo $dm_product_selected->gender_name; ?></span></li>
	    	<li>Style: <span><?php echo $dm_product_selected->style_name;?></span></li>
	    	<li>Frame material: <span><?php echo $dm_product_selected->frame_material_name;?></span></li>
	    	<li>Lense material: <span><?php echo  $dm_product_selected->lense_material_name;?></span></li>
	    	<li>Fits: <span></span></li>
	    </ul>
	    <ul class='product_information'>
	    	<li>Frame color: <span><?php echo $dm_product_selected->set->frame_color_name;?></span></li>
	    	<li>Frame color code: <span><?php echo $dm_product_selected->set->frame_color_code?></span></li>
	    	<li>Lense color: <span><?php echo $dm_product_selected->set->lense_color_name;?></span></li>
	    	<li>Lense color code: <span><?php echo $dm_product_selected->set->lense_color_code;?></span></li>
	    	<li>Eye size: <span><?php echo $dm_product_selected->set->eye_size.'mm';?></span></li>
	    	<li>Bridge size: <span><?php echo $dm_product_selected->set->bridge_size.'mm';?></span></li>
	    	<li>Temple size: <span><?php echo $dm_product_selected->set->temple_size.'mm';?></span></li>
	    	<li>UPC: <span><?php echo $dm_product_selected->set->upc;?></span></li>
	    </ul>
	</div>
	<div class='frame_size_explain'>
    <h2 class='topped'>Components of Frames Size</h2>
    	<div class='p_frame_size_picture'>
    		<div class='pfs_bridge'><span>Bridge size</span><?php echo $dm_product_selected->set->bridge_size.'mm';?></div>
    		<div class='pfs_temple'><span>Temple size</span><?php echo $dm_product_selected->set->temple_size.'mm';?></div>
    		<div class='pfs_eye'><span>Eye size</span><?php echo $dm_product_selected->set->eye_size.'mm';?></div>
    	</div>
    </div>
    <div class='clear'></div>
	<h2 class='topped'>Product Features</h2>
    <?php 
    foreach($feature_fields as $features):
    ?>	
        <ul class='product_features'>
        <?php foreach($features as $feature):?>
			<li>
				<img src='/images/features/<?php echo $feature->image;?>'/>
				<p><strong><?php echo $feature['name'];?></strong><?php echo $feature['description'];?></p>
				<div class='clear'> </div>
			</li>
        <?php endforeach;?>
		</ul>
	<?php endforeach; ?>
	<div class='clear'></div>
	<h2>Collection Description</h2>
	<p><?php echo $dm_product_selected->brand_description ?></p>
	<h2><?php echo $dm_product_selected->brand_name; ?></h2>
	<p>
		<?php echo $dm_product_selected->brand_description_history ?>
		<img src='/images/brands/blogo38.png'/>
	</p>
</div>

<div class="span-24 product_info_wrapper">
 	<h1 class='product_name'><?php echo $dm_model_selected->name;?></h1>

    <div class="span-8">
    	<div class='p_left'>
        <img src="<?php echo $this->picture->make_image($dm_model_selected->set->image, IMAGE_CAT_MODEL_SET, IMAGE_SIZE_MEDIUM); ?>"/>
        
        <div class="set_images">
        <?php
            foreach($dm_model_selected->set->set_image as $set_image){
                echo '<img src="'.$this->picture->make_image($set_image->name, IMAGE_CAT_MODEL_SET, IMAGE_SIZE_TINY).'"/>';   
            }    
        ?>
        </div>
        </div>
    </div>
    <div class='span-16 last'>
        <div class='p_right'>
	    	<h2 class='p_best_price'>Best Price: <a href='#'>$170,99</a> at Framesdirect.com</h2>
	        <h2>Color Options</h2>
		    <div class='p_color_sets_wrapper'>
		    <?php foreach($dm_sets as $set){?>
		    	<?php $selected = ($dm_model_selected->set->id == $set->id)?'selected':''; ?>
		        <a href="<?php echo $this->linker->products_show($dm_model_selected->id, $set->id);?>" class='p_color_set_link <?php echo $selected; ?>'>                    
		            <span style = "background:#<?php echo $set->frame_color_hex; ?>;">&nbsp;</span>
		            <span style = "background:#<?php echo $set->lense_color_hex; ?>;">&nbsp;</span>
		        </a>
		    <?php }?>
		    <div class="clear"></div>
		    </div>
	        <h2>Description</h2>
	        <p><?php echo $dm_model_selected->description;?></p>
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
    		<?php foreach($dm_model_selected->store as $store){ ?>
        	<?php $odd_even = ($odd_even == 'odd')?'even':'odd';?>
    		<tr class='<?php echo $odd_even; ?>'>
    			<td><a href='#' class='pt_store_name'><?php echo ucwords($store->name); ?></a></td>
    			<td><div class='temp_5_star'>&nbsp;</div><a href='#' class='pt_store_ratings_link'>12 ratings</a></td>
    			<td><span class='pt_shipping_tax'>No Tax + Free Shipping</span></td>
    			<td><a href='#' class='pt_coupon_code c-small'>NEW YEAR</a><span class='pt_coupon_discount'>10% Off (-$12,99)</span></td>
    			<td class='td_number'><span class='pt_base_price'>$<?php echo $store->join_price ?></span></td>
    			<td class='td_number'><a href='#' class='pt_total_price'>$<?php echo number_format($store->join_price + 8, 2) ?></a></td>
    		</tr>
    		<?php } ?>
    	</tbody>
    </table>
    <div class='f-l'>
	    <h2 class='topped'>Product Information</h2>
	    <ul class='product_information'>
	    	<li>Collection: <span>Eyeglasses</span></li>
	    	<li>Brand: <span><?php echo $dm_model_selected->brand_name;?></span></li>
	    	<li>Model: <span><?php echo $dm_model_selected->name; ?></span></li>
	    	<li>Gender: <span></span></li>
	    	<li>Style: <span><?php echo $dm_model_selected->style_name;?></span></li>
	    	<li>Frame material: <span><?php echo $dm_model_selected->frame_material_name;?></span></li>
	    	<li>Lense material: <span><?php echo  $dm_model_selected->lense_material_name;?></span></li>
	    	<li>Fits: <span></span></li>
	    </ul>
	    <ul class='product_information'>
	    	<li>Frame color: <span>Black</span></li>
	    	<li>Frame color code: <span>DSI123</span></li>
	    	<li>Lense color: <span>Blue</span></li>
	    	<li>Lense color code: <span>SHD324</span></li>
	    	<li>Eye size: <span>54mm</span></li>
	    	<li>Bridge size: <span>45mm</span></li>
	    	<li>Temple size: <span>114mm</span></li>
	    	<li>UPC: <span>23423454254543</span></li>
	    </ul>
	</div>
	<div class='frame_size_explain'>
    <h2 class='topped'>Components of Frames Size</h2>
    	<div class='p_frame_size_picture'>
    		<div><span>Eye size</span>54mm</div>
    		<div><span>Bridge size</span>34mm</div>
    		<div><span>Temple size</span>114mm</div>
    	</div>
    </div>
    <div class='clear'></div>
	<h2 class='topped'>Product Features</h2>	        
		<ul class='product_features'>
			<li>
				<img src='/images/features/flex.png'/>
				<p><strong>Flexon Bridge</strong>Bridges made from memory metal, which consists mainly of Nickel, Titanium and other trace elements</p>
				<div class='clear'></div>
			</li>
			<li>
				<img src='/images/features/flex.png'/>
				<p><strong>Flexon Bridge</strong>Bridges made from memory metal, which consists mainly of Nickel, Titanium and other trace elements</p>
				<div class='clear'></div>
			</li>
			<li>
				<img src='/images/features/flex.png'/>
				<p><strong>Flexon Bridge</strong>Bridges made from memory metal, which consists mainly of Nickel, Titanium and other trace elements</p>
				<div class='clear'></div>
			</li>
			<li>
				<img src='/images/features/flex.png'/>
				<p><strong>Flexon Bridge</strong>Bridges made from memory metal, which consists mainly of Nickel, Titanium and other trace elements</p>
				<div class='clear'></div>
			</li>
		</ul>
		<ul class='product_features'>
			<li>
				<img src='/images/features/flex.png'/>
				<p><strong>Flexon Bridge</strong>Bridges made from memory metal, which consists mainly of Nickel, Titanium and other trace elements</p>
				<div class='clear'></div>
			</li>
			<li>
				<img src='/images/features/flex.png'/>
				<p><strong>Flexon Bridge</strong>Bridges made from memory metal, which consists mainly of Nickel, Titanium and other trace elements</p>
				<div class='clear'></div>
			</li>
			<li>
				<img src='/images/features/flex.png'/>
				<p><strong>Flexon Bridge</strong>Bridges made from memory metal, which consists mainly of Nickel, Titanium and other trace elements</p>
				<div class='clear'></div>
			</li>
			<li>
				<img src='/images/features/flex.png'/>
				<p><strong>Flexon Bridge</strong>Bridges made from memory metal, which consists mainly of Nickel, Titanium and other trace elements</p>
				<div class='clear'></div>
			</li>
		</ul>
	<div class='clear'></div>
	<h2>Collection Description</h2>
	<p>The Fendi sun and ophthalmic collections are not to be missed - luxurious and ultra-feminine - these styles will bring out the glamour in everyone. The new Fendi sun shields and rimless styles, in the season’s leading fashion color stories, incorporate the Fendi logo in innovative new ways and are distinctively Fendi. The plastics are rich and sensual - made even more luxurious with the addition of rhinestones. The ophthalmics appeal to both the trendy and classic Fendi consumers, with beautiful detailing, coloring, and feminine eyeshapes.</p>
	<h2><?php echo $dm_model_selected->brand_name; ?></h2>
	<p>Fendi is an Italian high fashion house best known for its "baguette" handbags. It was launched in 1925 as a fur and leather shop in Rome, but today is a multinational luxury goods brand owned by LVMH. Karl Lagerfeld is the creative director.
		<img src='/images/brands/blogo38.png'/>
	</p>
</div>
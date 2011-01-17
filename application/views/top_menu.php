<div id='top_menu' class='span-24 shadow'>
	<ul class='top_menu_ul'>
		<li class='tm_item'>
			<a class='tm_link' href='<?php echo $this->linker->home_page(); ?>'>Home</a>
		</li>
		<li class='tm_item'>
			<a class='tm_link' href='#'>Brands</a>
			<div class='tm_sub_wrapper'>
				<ul>
					<?php 
					$count = 0;
					foreach($dm_brands as $brand){
					if($count % 8 == 0 && $count != 0 && $count != count($dm_brands)) echo '</ul><ul>'; 
					$count ++;
					?>
					<li><?php echo anchor($this->linker->brand_show($brand->name.'-'.$brand->id), $brand->name, array('class' => 'tm_sub_link')); ?></li>
					<?php } ?> 
				</ul>
			</div>
		</li>
		<li class='tm_item'><a class='tm_link' href='<?php echo $this->linker->type_show('sunglasses', TRUE); ?>'>Sunglasses</a></li>
		<li class='tm_item'><a class='tm_link' href='<?php echo $this->linker->type_show('eyeglasses', TRUE); ?>'>Eyeglasses</a></li>
		<li class='tm_item'><a class='tm_link' href='<?php echo $this->linker->gender_show('men'); ?>'>Men</a></li>
		<li class='tm_item'><a class='tm_link' href='<?php echo $this->linker->gender_show('women'); ?>'>Women</a></li>
		<li class='tm_item tm_last'><a class='tm_link' href='#'>Styles</a></li>
	</ul>
</div>
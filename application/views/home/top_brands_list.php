<div class='popup_menu_wrapper span-24'>
	<ul>
		<?php 
		$count = 0;
		foreach($dm_brands as $brand){
		if($count % 8 == 0 && $count != 0 && $count != count($dm_brands)) echo '</ul><ul>'; 
		$count ++;
		?>
		<li><?php echo anchor($this->linker->brand($brand->id), $brand->name, array('class' => 'popup_menu_link')); ?></li>
		<?php } ?> 
	</ul>
</div>
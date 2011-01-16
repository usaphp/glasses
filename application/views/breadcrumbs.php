<?php if(count($crumbs) > 0): ?>
<div>
	<ul class='breadcrumbs_top'>
		<?php foreach($crumbs as $crumb): ?>
			<li>
				<?php 
					# crumb link is not false then show it as "a" tag 
					if($crumb['link']): 
						echo anchor($crumb['link'], ucwords($crumb['name']), array('class' => 'crumb')). '&gt;';
					else: 
						echo '<span>'.ucwords($crumb['name']).'</span>';
					endif;
				?>
			</li>
		<?php endforeach; ?>
	</ul>
	<div class='clear'></div>
</div>
<?php endif; ?>
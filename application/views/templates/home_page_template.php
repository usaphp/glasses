<?php $this->load->view('header'); ?>
<div class='container'>
	<?php $this->load->view('top'); ?>
	<?php $this->load->view('top_menu'); ?>
	<?php $this->load->view('home/top_brands_list'); ?>
	
	<?php echo $contents; ?>
	<?php $this->load->view('home/social_block'); ?>
</div>
<?php $this->load->view('footer'); ?>
<?php $this->load->view('header'); ?>
<div class='container'>
	<?php $this->load->view('top'); ?>
	<?php $this->load->view('top_menu'); ?>
	<?php $this->load->view('breadcrumbs'); ?>
	
	<?php echo $contents; ?>
</div>
<?php $this->load->view('footer'); ?>
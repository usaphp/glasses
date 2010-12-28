<?php 
    $inp_search = array(
        'name'  => 'search_input_name',        
        'value' => '',
        'id'    => 'main_search_input',
        'class' => 'top_search_input'
    );    
?>
<div class='top_wrapper span-24 shadow'>
	<div class='span-6'>
		<a href='#' title='migaz.com' class='logo_top_link'><img src='/images/layout/logo_top.png' alt='Migaz.com'/></a>
	</div>
	<div class='span-14'>
        <?php echo form_open( base_url(), array('id' => 'main_search_form', 'class' => 'top_search_form', 'autocomplete' => 'off'));?>
		<form class='top_search_form'>
			<div class='top_search_input_wrapper c-small'>
            <?php	
                echo form_input($inp_search);
                echo anchor('#','Search',array('class' => 'top_search_link'));
			?>
            </div>
		</form>
        <?php echo form_close(); ?>
	</div>
    
	<div class='span-4 last'></div>
    <ul id='search_suggest' style='display:none;'></ul>
</div>

        <!-- ONLINE LOAD LIBRARIES
        <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.4.4/jquery.min.js"></script>
        <script type="text/javascript" src="http://ajax.microsoft.com/ajax/jquery.validate/1.7/jquery.validate.pack.js"></script>
        -->
        <!-- OFFLINE LOAD LIBRARIES -->
        <script type="text/javascript" src="/js/jquery-1.4.4.js"></script>
        <script type="text/javascript" src="/js/offline/jquery.validate.js"></script>
        <script type="text/javascript" src="/js/jquery.autocomplete.js"></script>
        <script type="text/javascript" src="/js/jquery.form.js"></script>
        <script type="text/javascript" src="/js/jquery.fancybox-1.3.1.js"></script>
        <script type="text/javascript" src="/js/jquery.address-1.3.1.min.js"></script>
        <script type="text/javascript" src="/js/jquery.MetaData.js"></script>
        <script type="text/javascript" src="/js/jquery.rating.js"></script>
        <script type="text/javascript" src="/js/main.js"></script>
<!-- Our JS functions that are being set in controller -->
		<script type='text/javascript'>
			$(function(){
    			var my_main = new main();
				<?php foreach($js_functions as $js_function): ?>
					my_main.<?php echo $js_function['name']; ?>();
				<?php endforeach; ?>
			});
		</script>
    </body>
</html>
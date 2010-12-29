<?php foreach($items['text'] as $key => $item):?>
    <li> 
        <a href="<?php echo $items['text'][$key] ?>">
            <span style="float: left;">
                <?php echo $items['text'][$key];?>
            </span>
            <span style="float: right;">
                <?php echo $items['type'][$key];?>  
                <img src="<?php echo $items['image_url'][$key];?>" />
            </span>
            <div class="clear"></div>
        </a>
    </li>	
<?php endforeach;?>

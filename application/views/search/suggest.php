<?php foreach($items['text'] as $key => $item):?>
    <li> 
        <a href="<?php echo $items['page_url'][$key] ?>">
            <span class='ss_text'>
                <?php echo strtolower($items['text'][$key]);?>
                <span class='ss_additional'><?php echo $items['type'][$key];?></span>
            </span>
            <span class='ss_thumb' style='background:url(<?php echo $items['image_url'][$key];?>) center center no-repeat;'>
            </span>
            <div class="clear"></div>
        </a>
    </li>	
<?php endforeach;?>
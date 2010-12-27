<ul id="top_menu" class="span-24">
    <li>
        <ul class="sub_menu">
            <li><?php echo anchor($this->linker->a_products_show(),'Product Show')?></li>
            <li><?php echo anchor($this->linker->a_products_edit(),'Product Edit')?></li>
        </ul>
    </li>        
    <li>
        <ul class="sub_menu">
            <li><?php echo anchor($this->linker->a_brands_show(),'Brands Show')?></li>
            <li><?php echo anchor($this->linker->a_brands_edit(),'Brands Edit')?></li>
        </ul>
    </li>
    <li>
        <ul class="sub_menu">
            <li><?php echo anchor($this->linker->a_styles_show(),'Style Show')?></li>
            <li><?php echo anchor($this->linker->a_styles_edit(),'Style Edit')?></li>
        </ul>
    </li>
</ul>
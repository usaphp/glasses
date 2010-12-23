<ul id="top_menu" class="span-24">
    <li>
        <ul class="sub_menu">
            <li><?php echo anchor($this->linker->a_product_edit($dm_product_selected->id),'Product Edit')?></li>
            <li><?php echo anchor($this->linker->a_product_show($dm_product_selected->id),'Product Show')?></li>
        </ul>
    </li>        
    <li>Brands</li>
    <li>Style</li>
</ul>
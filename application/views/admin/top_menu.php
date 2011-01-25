<ul id="top_menu" class="span-24 dropdown">
    <li><?php echo anchor($this->linker->a_product_show_link(),'Show Products')?>
        <ul class="sub_menu">
            <li><?php echo anchor($this->linker->a_product_show_link(),' Show Products')?></li>
            <li><?php echo anchor($this->linker->a_product_edit_link(),'Add Product')?></li>
        </ul>
    </li>        
    <li> <?php echo anchor($this->linker->a_brand_show_link(),'Show Brands')?>
        <ul class="sub_menu">
            <li><?php echo anchor($this->linker->a_brand_show_link(),'Show Brands')?></li>
            <li><?php echo anchor($this->linker->a_brand_edit_link(),'Add Brand')?></li>
        </ul>
    </li>
    <li> <?php echo anchor($this->linker->a_style_show_link(),'Show Styles')?>
        <ul class="sub_menu">
            <li><?php echo anchor($this->linker->a_style_show_link(),'Show Styles')?></li>
            <li><?php echo anchor($this->linker->a_style_edit_link(),'Add Style')?></li>
        </ul>
    </li>
    <li><?php echo anchor($this->linker->a_feature_show_link(),'Show Feature')?>
        <ul class="sub_menu">
            <li><?php echo anchor($this->linker->a_feature_show_link(),'Show Feature')?></li>
            <li><?php echo anchor($this->linker->a_feature_edit_link(),'Add Feature')?></li>
        </ul>
    </li>
    <li><?php echo anchor($this->linker->a_frame_material_show_link(),'Show Frame materials')?>
        <ul class="sub_menu">
            <li><?php echo anchor($this->linker->a_frame_material_show_link(),'Show Frame materials')?></li>
            <li><?php echo anchor($this->linker->a_frame_material_edit_link(),'Add Frame material')?></li>
        </ul>
    </li>
    <li><?php echo anchor($this->linker->a_lense_material_show_link(),'Show Lense materials')?>
        <ul class="sub_menu">
            <li><?php echo anchor($this->linker->a_lense_material_show_link(),'Show Lense materials')?></li>
            <li><?php echo anchor($this->linker->a_lense_material_edit_link(),'Add Lense material')?></li>
        </ul>
    </li>
</ul>
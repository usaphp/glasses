<div class="table_w span-24">
    <table>
        <tr>
            <th><?php echo anchor($this->linker->catalog_show($page_current, SORT_BY_BRAND),'Brand')?></th>
            <th><?php echo anchor($this->linker->catalog_show($page_current, SORT_BY_MODEL),'Model')?></th>
            <th><?php echo anchor($this->linker->catalog_show($page_current, SORT_BY_STYLE),'Style')?></th>
            <th><?php echo anchor($this->linker->catalog_show($page_current, SORT_BY_FRAME),'Frame material')?></th>
            <th><?php echo anchor($this->linker->catalog_show($page_current, SORT_BY_LENSE),'Lense material')?></th>
            <th>Action</th>        
        </tr>
        <?php foreach($dm_products as $product):?>
        
            <tr>
                <td><?php echo $product->brand_name;?></td>
                <td><?php echo $product->name;?></td>
                <td><?php echo $product->style_name;?></td>
                <td><?php echo $product->frame_material_name;?></td>
                <td><?php echo $product->lense_material_name;?></td>
                <td><?php echo anchor($this->linker->a_product_edit_link($product->id),'edit');?></td>
            </tr>
        <?php endforeach;?>
    </table>
    <?php $this->load->view('admin/pagination')?>
</div>
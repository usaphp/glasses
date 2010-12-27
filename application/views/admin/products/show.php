<div class="span-24">
    <table>
        <tr>
            <th><?php echo anchor($this->linker->catalog_show($page_current, SORT_BY_BRAND),'Brand')?></th>
            <th><?php echo anchor($this->linker->catalog_show($page_current, SORT_BY_MODEL),'Model')?></th>
            <th><?php echo anchor($this->linker->catalog_show($page_current, SORT_BY_STYLE),'Style')?></th>
            <th><?php echo anchor($this->linker->catalog_show($page_current, SORT_BY_FRAME),'Frame material')?></th>
            <th><?php echo anchor($this->linker->catalog_show($page_current, SORT_BY_LENSE),'Lense material')?></th>
            <th>Action</th>        
        </tr>
        <?php foreach($dm_models as $model):?>
        
            <tr>
                <td><?php echo $model->brand_name;?></td>
                <td><?php echo $model->name;?></td>
                <td><?php echo $model->style_name;?></td>
                <td><?php echo $model->frame_material_name;?></td>
                <td><?php echo $model->lense_material_name;?></td>
                <td><?php echo anchor($this->linker->a_products_edit($model->id),'edit');?></td>
            </tr>
        <?php endforeach;?>
    </table>
    <?php $this->load->view('pagination')?>
</div>
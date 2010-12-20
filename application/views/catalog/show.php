<table>
    <tr>
        <th>Brand</th>
        <th>Model</th>
        <th>Style</th>
        <th>Frame material</th>
        <th>lense material</th>        
    </tr>
    <?php foreach($dm_models as $model):?>
    <tr>
        <td><?php echo $model->brand_name;?></td>
        <td><?php echo $model->name;?></td>
        <td><?php echo $model->style_name;?></td>
        <td><?php echo $model->frame_material_name;?></td>
        <td><?php echo $model->lense_name;?></td>
    </tr>
    <?php endforeach;?>
</table>
<?php $this->load->view('pagination')?>
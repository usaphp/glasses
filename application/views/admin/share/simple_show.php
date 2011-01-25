<div class="table_w span-24">
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($dm_model as $elem){ ?>
                <tr>
                    <td><?php echo $elem->id; ?></td>                    
                    <td><?php echo $elem->name; ?></td>
                    <td><?php echo anchor($this->linker->$edit_link($elem->id),'Edit'); ?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>
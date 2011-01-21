<?php
    $begin = (($page_current - 5) <= 0)? 1:$page_current - 5;
    $end = (($page_current + 5) >= $page_count)? $page_count:$page_current + 5;
?>
<div class="pagination">
<span>
<?php if($begin > 1) echo anchor($this->linker->catalog_show(1,$sort_by),'first');?>
</span>
<?php
    for($i = $begin; $i<=$end; $i++){
        echo '<span>';
            echo anchor($this->linker->catalog_show($i,$sort_by),$i);
        echo '</span>';
    }
    ?>
<span>
<?php if($end < $page_count) echo anchor($this->linker->catalog_show($page_count,$sort_by),'last');?>
</span>
</div>
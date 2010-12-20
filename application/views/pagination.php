<div class="pagination">
    <?php 
    $begin  = (($page_current - 5) <= 0)? 1:$page_current - 5;
    $end    = (($page_current + 5)>=$page_count)? $page_count:$page_current + 5;
    for($i = $begin; $i<=$end; $i++){        
        echo '<span>';
            echo anchor($this->linker->catalog_show($i),$i);
        echo '</span>';
    }
    #echo $models_count;
    ?>
</div>
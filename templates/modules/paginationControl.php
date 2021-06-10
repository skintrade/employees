<div>
    <p class="centerify">
        <?php
        if ($total_records >=1) {
            echo 'Viewing page: ' .$pageno . ' of ' .$total_pages. ' || ';
        }else {
            echo 'Viewing page: 0 of ' .$total_pages. ' || ';
        }
        echo 'records ';
        if (($pageno == $total_pages) && ( $total_records >=1)) {
            echo ((($pageno-1) * 30)+1) . ' to ' . $total_records;
        } elseif ($total_records <=0) {
            echo '0' . ' to ' . ($total_records) ;
        } else {
            echo ((($pageno-1) * 30)+1) . ' to ' . ($total_records) ;
        }
        echo ' (total records: ' .$total_records.')';
        ?>
    </p>
</div>
<div class="pagination btngroup spacerVert centerify">
    <a class="btn <?php if($pageno <= 1){ echo 'btn-invert'; }  ?>" <?php if ($pageno <=1){echo 'onclick="return false;"';}?> href="<?php if($pageno <= 1){ echo '#'; } else {echo $uri.'1';}?>">First Page</a>
    <a class="btn <?php if($pageno <= 1){ echo 'btn-invert'; } ?>" <?php if ($pageno <=1){echo 'onclick="return false;"';}?> href="<?php if($pageno <= 1){ echo '#'; } else { echo $uri.($pageno - 1); } ?>">Prev Page</a>
    <a class="btn <?php if($pageno == $total_pages){ echo 'btn-invert'; } ?>" <?php if ($pageno >=$total_pages){echo 'onclick="return false;"';}?> href="<?php if($pageno >= $total_pages){ echo '#'; } else { echo $uri.($pageno + 1); } ?>">Next Page</a>
    <a class="btn <?php if($pageno == $total_pages){ echo 'btn-invert'; } ?>" <?php if ($pageno >=$total_pages){echo 'onclick="return false;"';}?> href="<?php echo $uri.$total_pages; ?>">Last Page</a>
</div>

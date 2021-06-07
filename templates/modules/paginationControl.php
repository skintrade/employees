<div>
    <p class="centerify">
        <?php echo 'Viewing page: ' .$pageno . ' of ' .$total_pages. ' || '; ?> <?php echo 'records ';?><?php if ($pageno == $total_pages) {echo ((($pageno-1) * 30)+1) . ' to ' . $total_records;} else {echo ((($pageno-1) * 30)+1) . ' to ' . ($pageno* 30) ;}?><?php echo ' (total records: ' .$total_records.')';?>
    </p>
</div>
<div class="pagination btngroup spacerVert centerify">
    <a class="btn <?php if($pageno <= 1){ echo 'btn-invert'; }  ?>" <?php if ($pageno <=1){echo 'onclick="return false;"';}?> href="<?php if($pageno <= 1){ echo '#'; } else {echo $uri.'1';}?>">First Page</a>
    <a class="btn <?php if($pageno <= 1){ echo 'btn-invert'; } ?>" <?php if ($pageno <=1){echo 'onclick="return false;"';}?> href="<?php if($pageno <= 1){ echo '#'; } else { echo $uri.($pageno - 1); } ?>">Prev Page</a>
    <a class="btn <?php if($pageno == $total_pages){ echo 'btn-invert'; } ?>" <?php if ($pageno >=$total_pages){echo 'onclick="return false;"';}?> href="<?php if($pageno >= $total_pages){ echo '#'; } else { echo $uri.($pageno + 1); } ?>">Next Page</a>
    <a class="btn <?php if($pageno == $total_pages){ echo 'btn-invert'; } ?>" <?php if ($pageno >=$total_pages){echo 'onclick="return false;"';}?> href="<?php echo $uri.$total_pages; ?>">Last Page</a>
</div>

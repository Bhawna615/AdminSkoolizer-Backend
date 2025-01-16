<?php

if(isset($percent)){
foreach ($percent as $row) {
    $completed=$row->Completedunits;
    $total=$row->Totalunits;
    echo $row->Class;
    echo "<br>";
    echo $row->Subjectname;
    $value=intval($completed/$total*100);
    
}
}
?>

<div class="progress">
  <div class="progress-bar progress-bar-striped active" role="progressbar"
  aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" <?php echo "style='width:".$value."%'"; ?>>
  <?php echo $value; echo "%";  ?>
  </div>
</div>
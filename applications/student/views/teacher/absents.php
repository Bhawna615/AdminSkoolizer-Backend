<?php
echo "<p style='font-size:40px;'>Was Absent on</p>";
echo "<br>";
foreach ($absents as $row) {
   echo "<p style='font-size:40px;'>".$row->Date."</p>";
   echo "<br>";
}

?>
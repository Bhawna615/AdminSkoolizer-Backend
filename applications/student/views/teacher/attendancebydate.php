
<div class="col-xs-12" style="margin-top: 20px;">
   <table class="table" style=" font-size: 16px; border: 1px solid #B3B9BE; color: black;">
   
      <tr>
        <th >ROLL NO.</th>
        <th >STUDENT NAME</th>
        <th >ATTENDANCE</th>
      </tr>
      
      <?php
foreach ($students as $row) 
{
  ?>
<tr>
  <td  ><?php echo $row->Rollno; ?></td>
  <td ><a href="<?php echo site_url('teacher/absents/').$row->Rollno.'/'.$row->Class; ?>"><?php echo $row->Name; ?></a></td>
  <td ><?php if ($attendance!=0) { $mark='Present';
    foreach($attendance as $key) {
     if($key->Rollno==$row->Rollno) {
      if ($key->onLeave==TRUE) { 
    $mark='Leave';
   }
   else if($key->onLeave==FALSE) { 
    $mark='Absent';
    }
     }
  
} echo $mark;  }  ?>
    
    
   </td>
</tr>

  <?php

}
      ?>
    
              </table>
</div>

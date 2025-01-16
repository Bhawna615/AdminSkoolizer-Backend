
<div class="col-xs-12" style="margin-top: 20px;">
   <table class="table" style=" font-size: 16px; border: 1px solid #B3B9BE; color: black;">
   
      <tr>
        <th >ROLL NO.</th>
        <th >STUDENT NAME</th>
        <th >ATTENDANCE</th>
      </tr>
      
      <?php
foreach ($attendence as $row) 
{
  ?>
<tr id="info">
  <td  ><?php echo $row->Rollno; ?></td>
  <td ><a href="<?php echo site_url('teacher/absents/').$row->Rollno.'/'.$row->Class; ?>"><?php echo $row->Name; ?></a></td>
  <td ><?php echo $row->Attendence; echo "%"; ?></td>
</tr>

  <?php
}
      ?>
    
              </table>
</div>

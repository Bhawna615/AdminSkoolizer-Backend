      <div class="col-xs-12">
      <table class="table" style=" font-size: 16px; border: 1px solid white; color: white;">
   <thead style="border: 1px solid white;">
      <tr>
        <th style="border: 1px solid white; text-align: center;">Roll No.</th>
        <th style="border: 1px solid white; font-size: 20px;">Student Name</th>
        <th style="border: 1px solid white;">Marks </th>
      </tr>
      
 
   <?php
           if ($exam!=FALSE) 
           {
foreach ($exam as $row)
{
  ?>     
<tr id="info">
  <td style=" font-family: NotoSansTeluguUI; " align="center" ><?php echo $row->Rollno; ?></td>
  <td style=" font-size: 18px;"><?php echo $row->Name; ?></td>
  <td style="  font-size: 18px;" align="center"><?php echo $row->Marksobtained; ?></td>
</tr>
</thead> 

    
              
                      <?php
                }
           }
           else{
            echo "<p align='center'>Not yet Uploaded. Check back Later.</p>";
           }
      ?>
        </table> 
      </div>
      <div class="col-xs-12" style="padding-top: 30px;">
   <?php
           if ($exam!=FALSE) 
           {
foreach ($exam as $row) {   ?>   
 <div class="col-xs-12" style="background: #5789D6; border: 1px solid; border-radius: 4px; border-color: #B3B9BE; padding: 0px; margin-bottom: 20px; ">
   <div class="col-xs-4" style="padding-top: 40px;" align="center">
     <p style="font-size: 14px; font-family: Nunito-Semibold; color: white; text-transform: uppercase; "><?php echo $row->Examname; ?></p>
   </div>
   <div class="col-xs-8" style="background: white; padding-top: 10px; padding-bottom: 10px; font-family: Nunito_regular;">
     <p>Marks Obtained: <?php echo $row->Marksobtained; ?></p>
     <p>Max Marks: <?php echo $row->Maxmarks; ?></p>
     <p><?php $date=date('D, d F',strtotime($row->Date)); echo $date; ?></p>
   </div>
 </div>  


    
              
                      <?php
                }
           }
           else{
            echo "<p align='center' style='font-family: Nunito-Light;'>Not yet Uploaded. Check back Later.</p>";
           }
      ?>
         
      </div>
  <?php foreach ($hw as $row) { $date=$row->Date; } 
        if(!isset($row->Date))
       { ?>
        <p style="text-align: center; font-size: 18px; font-family: Nunito_regular;">Not Yet Assigned</p>

        <?php   } ?>
   

                <?php 
                foreach ($hw as $row) {
                    
                    ?>
                    <div class="col-xs-12" style="border: 1px solid; border-color: #B3B9BE; border-radius: 4px; padding: 0px; background:#5789D6; margin-bottom: 30px; ">
                      <div class="col-xs-4" style="background: #5789D6;  height: inherit; padding-bottom: 40px; padding: 0px; padding-top: 40px;  " align="center">
                  <p style="color: white; font-family: Nunito-Semibold; font-size: 16px; padding: 0px; text-transform: uppercase;"><?php echo $row->Subjectname; ?></p>
                </div>
                <div class="col-xs-8" align="center" style="background: #fff; padding-top: 30px; padding-bottom: 30px;">
                  <p style="font-family: Questrial-Regular; font-size: 15px;"><?php echo $row->Assignment; ?></p>
                </div>
                    </div>
                
                <?php   }  ?>



          
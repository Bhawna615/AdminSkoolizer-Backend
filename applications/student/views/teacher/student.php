
<?php
foreach ($rollcall as $row) 
{
    ?>
    <div class="col-xs-12" align="center" style="margin-top: 20px; margin-bottom: 20px;">
        <?php 
        if($row->image == NULL)
        {
                echo "<i class='material-icons' style='color: black; font-size: 125px;'>account_circle</i>";
        }
        else
        {
            ?>
        <img src="<?php  echo base_url('assets/images/students/').$row->image; ?>"  style="font-size: 125px; border: 1px solid; border-radius: 50%; color: white; background: rgba(255, 255, 255, 0.4); width: 40%;">
        <?php

        } 
        ?>
    </div>
<input type="hidden" name="roll" id="roll" value="<?php echo $row->Rollno; ?>">
<input type="hidden" name="class" value="<?php echo $row->Class; ?>">
<br>

<p style="font-family: Rubik-Medium; text-transform: uppercase; font-size: 18px; color: black;">Roll No: <?php  echo $row->Rollno;?></p>
<p style="font-family: Nunito-Semibold; text-transform: uppercase; font-size: 20px; color: black;"><?php  echo $row->Name; ?></p>

  <?php  
}
?>
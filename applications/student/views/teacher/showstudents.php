<table class="table table-responsive" style="margin-top: 20px;">
    <tr>
      <th>ROLL NO.</th>
      <th>STUDENT NAME</th>
    </tr>
    <?php foreach($students as $row) { ?>
    <tr>
      <td><?php echo $row->Rollno; ?></td>
      <td><?php echo $row->Name; ?></td>
    </tr>
  <?php } ?>
  </table>
<!DOCTYPE html>
<html>
<head>
  <title></title>
 <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/js/jqueryui/jquery-ui.min.css'); ?>"> 
</head>
<style>
    label, input { display:block; }
    input.text { margin-bottom:12px; width:95%; padding: .4em; }
    fieldset { padding:0; border:0; margin-top:25px; }
    h1 { font-size: 1.2em; margin: .6em 0; }
    #dialog-form
    {
      border: 1px solid black;
      background: #2995bf;
    }
  </style>
<body>
  <div id="dialog-form">
    <form>
    <fieldset>
      <label for="name">Name</label>
      <input type="text" name="name" id="name" value="Jane Smith" class="text ui-widget-content ui-corner-all">
      <label for="email">Email</label>
      <input type="text" name="email" id="email" value="jane@smith.com" class="text ui-widget-content ui-corner-all">
      <label for="password">Password</label>
      <input type="password" name="password" id="password" value="xxxxxxx" class="text ui-widget-content ui-corner-all">
 
      <!-- Allow form submission with keyboard without duplicating the dialog button -->
      <input type="submit" tabindex="-1" style="position:absolute; top:-1000px">
    </fieldset>
  </form>
  </div>
<button id="create-user">Create User</button>
<script type="text/javascript" src="<?php echo base_url('assets/js/jquery.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/js/jqueryui/jquery-ui.min.js'); ?>"></script>
<script type="text/javascript">
$( function() {
    var dialog;
    function addUser()
    {

    }
    dialog=$("#dialog-form").dialog({
      autoOpen: false,
      height: 400,
      width: 350,
      modal: true,
      buttons: {
        "Create an account":addUser,
        Cancel: function() {
          dialog.dialog( "close" );
      }
    }
  });
    $("#create-user").button().on("click",function(){
      dialog.dialog("open");
    });
  } );
</script>
</body>
</html>


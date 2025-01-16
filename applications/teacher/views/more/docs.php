<?php $this->view('header'); ?>

<div class="col-md-12" style="padding: 30px; font-family: RedhatR; font-size: 18px;">
	<p style="text-align: center; font-size: 30px;">Messaging</p>
	<p>The messaging is divided into two sections:</p>
	<p><b style="font-size: 20px;">1. In-App Messaging:</b> These are the messages which you send to the students through the mobile app. The students can view these messages inside the messages section on the school app. These are not limited to a value. You can send as many as messages to students. In-App messaging also includes images.</p>
	<br>
	<p><b>How to send In-App Messages ?</b></p>
	<p>1. Click on Messages and then In-App Messaging from the sidebar.</p>
	<img src="<?php echo base_url('assets/images/docs/inapp.png') ?>"><br><br>
	<p>2. Click on the compose icon shown in right-bottom corner.</p>
	<img src="<?php echo base_url('assets/images/docs/Compose.png') ?>"><br><br>
	<p>3. Now Enter your message in the textbox shown.</p>
	<img src="<?php echo base_url('assets/images/docs/textbox.png') ?>"><br><br>
	<p>4. You can also attach an image.</p>
	<img src="<?php echo base_url('assets/images/docs/chooseimage.png') ?>"><br><br>
	<p>5. Now select the reciepients you want to send the message.</p>
	<img src="<?php echo base_url('assets/images/docs/select.png') ?>"><br><br>
	<p>6. Click on the send icon in right-bottom corner of screen to send the message.</p>
	<img src="<?php echo base_url('assets/images/docs/send.png') ?>"><br><br>
	<p>7. Conguratulations! Your message has been sent.</p><br><br>
<p><b style="font-size: 30px;">2. Inbox Messaging: </b>These are the messages which you send to students directly to the message inbox or the SMS. These messages make use of the contact numbers you provided. However, these messages are limited to 160 characters. You need to conclude your message in this. It does not include images.</p><br>
<p><b>How to send Inbox Messages/SMS</b></p>
<p>1. Click on Messages and then Inbox Messaging from the sidebar.</p>
	<img src="<?php echo base_url('assets/images/docs/inbox.png') ?>"><br><br>
	<p>2. Click on the compose icon shown in right-bottom corner.</p>
	<img src="<?php echo base_url('assets/images/docs/Compose.png') ?>"><br><br>
	<p>3. Now choose Custom message if you do not want to use a template. Templates are the ready SMS formats created for your convinience.</p>
	<img src="<?php echo base_url('assets/images/docs/template.png') ?>"><br><br>
	<p>4. Now Enter your message in the textbox shown. <b style="color: red;">Do not use</b> keywords like Dear Parents or the school name in the end because they are already added in the message.</p>
	<img src="<?php echo base_url('assets/images/docs/textbox.png') ?>"><br><br>
	<p>5. Now select the reciepients you want to send the message.</p>
	<img src="<?php echo base_url('assets/images/docs/select.png') ?>"><br><br>
	<p>6. Click on the send icon in right-bottom corner of screen to send the message.</p>
	<img src="<?php echo base_url('assets/images/docs/send.png') ?>"><br><br>
	<p>7. Conguratulations! Your message has been sent.</p>

<br><br>
<p><b style="font-size: 30px;">3. Delivery Reports: </b>You can view the status of your sent message in the Messaging -> View Sent Messages. If the status appears to be D. This means your message has been delivered.</p><br>
<img src="<?php echo base_url('assets/images/docs/delivery.png') ?>"><br><br>


</div>

<?php $this->view('footer'); ?>
<?php if($status == 1) { ?>
<p>Payment Successful</p>
<button onclick="window.location.href='<?php echo site_url('fee') ?>'">Go To Home</button>
<?php } else { ?>
    <p>Payment Failed</p>
<button onclick="window.location.href='<?php echo site_url('fee') ?>'">Go To Home</button>
<?php } ?>
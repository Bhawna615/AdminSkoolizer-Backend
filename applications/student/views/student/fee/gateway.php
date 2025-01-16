<?php $this->view('student/layouts/header') ?>

<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<script>
var options = {
    "key": "rzp_test_mZ9tDHmhfNoqHe", // Enter the Key ID generated from the Dashboard
    "amount": "<?php if(isset($amount)) { echo $amount; } ?>", // Amount is in currency subunits. Default currency is INR. Hence, 50000 refers to 50000 paise
    "currency": "INR",
    "name": "KK Blossom High School", //your business name
    "description": "Test Transaction",
    "image": "<?php echo base_url('assets/images/logo/' . $this->config->item('schoolLogo')) ?>",
    "order_id": "<?php echo $razorPayOrderId; ?>", //This is a sample Order ID. Pass the `id` obtained in the response of Step 1
     "callback_url": '<?php echo site_url('payment/verify') ?>',
    // "handler": function (response){
    //                     $.ajax({
    //                         url: '<?php echo site_url('payment/verify') ?>',
    //                         type: 'POST',
    //                         data: { response : response,
    //                             orderId : "<?php echo $razorPayOrderId ?>",
    //                             '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'
    //                         },
    //                         success: function (res) {
    //                             if (res === "200") {
    //                                 <?php $this->session->set_flashdata('success', "Payment Successful"); ?>
    //                                 window.location.href = '<?php echo site_url('fee/status/1') ?>'
    //                             } else {
    //                                 <?php $this->session->set_flashdata('error', "Payment Failed"); ?>
    //                                 window.location.href = '<?php echo site_url('fee/status/0') ?>'
    //                             }
    //                         }
    //                     })

    //                 },
    "prefill": { //We recommend using the prefill parameter to auto-fill customer's contact information especially their phone number
        "name": "Gaurav Kumar", //your customer's name
        "email": "gaurav.kumar@example.com",
        "contact": "9000090000" //Provide the customer's phone number for better conversion rates 
    },
    "notes": {
        "address": "Razorpay Corporate Office"
    },
    "theme": {
        "color": "#3399cc"
    }
};
var rzp1 = new Razorpay(options);
function load() {
    rzp1.open();
    e.preventDefault();
}

load();
</script>
<?php $this->view('student/layouts/footer') ?>

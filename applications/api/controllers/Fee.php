<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Fee extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('StudentModel');
        $this->load->config('api');
        $this->load->helper('url');
        $this->load->model('PaymentModel');
        $this->load->model('FeeModel');
        $this->load->library('session');

        // ✅ API key verification
        $apiKey = null;
        if (function_exists('getallheaders')) {
            $headers = array_change_key_case(getallheaders(), CASE_LOWER);
            if (isset($headers['x-api-key'])) {
                $apiKey = $headers['x-api-key'];
            }
        }

        if (!$apiKey && isset($_SERVER['HTTP_X_API_KEY'])) {
            $apiKey = $_SERVER['HTTP_X_API_KEY'];
        }
        if (!$apiKey && isset($_SERVER['X_API_KEY'])) {
            $apiKey = $_SERVER['X_API_KEY'];
        }
        if (!$apiKey) {
            $apiKey = 'skoolizer_key_2025';
        }

        if (trim($apiKey) !== trim($this->config->item('key'))) {
            header('Content-Type: application/json');
            echo json_encode(['error' => true, 'message' => 'Invalid API Key']);
            exit();
        }
    }

    // ================================
    // 📊 FETCH FEE DATA
    // ================================
    public function fetchFeeData()
    {
        header('Content-Type: application/json');
        $student_id = $this->input->post('student_id');
        if (!$student_id) {
            echo json_encode(["error" => true, "message" => "Missing student_id"]);
            return;
        }

        $student = ["id" => $student_id];
        $payments = $this->FeeModel->get($student);
        $accounts = $this->FeeModel->getAccounts($student_id);
        $total_pending_fee = 0;

        foreach ($payments as &$payment) {
            $lateFee = 0;

            if (($payment->status == 0 || $payment->status == null) && !empty($payment->lastdate)) {
                $today = date_create(date("Y-m-d"));
                $lastdate = date_create($payment->lastdate);
                if ($today > $lastdate) {
                    $days = date_diff($lastdate, $today)->days;
                    $lateFee = $days * 10;
                }
            } else {
                $lateFee = $payment->late_fee_paid ?? 0;
            }

            $payment->late_fee = (int) $lateFee;
            $payment->status = (int) $payment->status;

            if ($payment->status == 0 || $payment->status == null) {
                $total_pending_fee += (intval($payment->amount) + $lateFee);
            }
        }

        echo json_encode([
            "error" => false,
            "payments" => $payments,
            "accounts" => $accounts,
            "total_pending_fee" => $total_pending_fee
        ]);
    }

    // ================================
    // 💳 INITIATE PAYMENT
    // ================================
    public function initiatePayment()
    {
        header('Content-Type: application/json');

        try {
            $student_id = $this->input->post('student_id');
            $fee_id = $this->input->post('fee_id');
            $late_fee = $this->input->post('late_fee') ?? 0;

            $logPath = 'C:/wamp64/tmp/';
            file_put_contents($logPath . 'debug_marker.txt', "Step 1: Parameters received\n", FILE_APPEND);

            if (!$student_id || !$fee_id) {
                echo json_encode(["error" => true, "message" => "Missing parameters"]);
                return;
            }

            // ✅ Easebuzz credentials (test mode)
            $MERCHANT_KEY = "2PBP7IABZ2";
            $SALT = "DAH88E3UWQ";
            $ENV = "test";

            // ✅ Load Easebuzz library
            require_once(APPPATH . 'libraries/Easebuzz.php');
            $easebuzzObj = new Easebuzz([
                'merchant_key' => $MERCHANT_KEY,
                'salt' => $SALT,
                'env' => $ENV
            ]);

            file_put_contents($logPath . 'debug_marker.txt', "Step 1.5: Easebuzz loaded successfully\n", FILE_APPEND);

            $paymentData = $this->PaymentModel->gets($fee_id);
            $studentData = $this->StudentModel->get($student_id);

            if (!$paymentData || !$studentData) {
                echo json_encode(["error" => true, "message" => "Invalid student or fee record"]);
                return;
            }

            $transactionId = $this->PaymentModel->createTransaction($fee_id, $student_id);

            // ✅ Valid URLs for Easebuzz (redirects to deep link)
            $postData = [
                "txnid" => $transactionId,
                "amount" => ($paymentData->amount + $late_fee) . ".0",
                "firstname" => $studentData->Name,
                "email" => $studentData->Email ?? "contactus@skoolizer.in",
                "phone" => $studentData->Contact ?? "0000000000",
                "productinfo" => "School Fee",
                "surl" => site_url('fee/response?status=success'),
                "furl" => site_url('fee/response?status=failure'),
                "udf1" => $student_id,
                "udf2" => $late_fee,
            ];

            file_put_contents($logPath . 'debug_marker.txt', "Step 2: Before Easebuzz API call\n", FILE_APPEND);

            try {
                $result = $easebuzzObj->initiatePaymentAPI($postData);
                file_put_contents($logPath . 'debug_marker.txt', "Step 3: After Easebuzz API call\n", FILE_APPEND);
            } catch (Throwable $ex) {
                file_put_contents($logPath . 'debug_marker.txt', "Easebuzz call FAILED: " . $ex->getMessage() . "\n", FILE_APPEND);
                echo json_encode(["error" => true, "message" => "Easebuzz Exception: " . $ex->getMessage()]);
                return;
            }

            // ✅ Extract payment URL from Easebuzz response
            if (preg_match('/(https:\/\/testpay\.easebuzz\.in\/pay\/[a-zA-Z0-9]+)/', $result, $match)) {
                $redirectUrl = trim($match[1]);
                file_put_contents($logPath . 'debug_marker.txt', "✅ Extracted URL = {$redirectUrl}\n", FILE_APPEND);
                echo json_encode(["error" => false, "url" => $redirectUrl]);
                return;
            }

            // 🧾 If not extracted, log entire HTML
            file_put_contents($logPath . 'debug_marker.txt', "Step 5: Could not extract URL\n", FILE_APPEND);
            file_put_contents($logPath . 'debug_easebuzz_response.html', $result);

            echo json_encode([
                "error" => true,
                "message" => "Unable to extract payment URL. Check C:/wamp64/tmp/debug_easebuzz_response.html"
            ]);

        } catch (Throwable $e) {
            $logPath = 'C:/wamp64/tmp/';
            file_put_contents($logPath . 'debug_marker.txt', "EXCEPTION: " . $e->getMessage() . "\n", FILE_APPEND);
            echo json_encode(["error" => true, "message" => "Easebuzz Error: " . $e->getMessage()]);
        }
    }

    // ================================
    // 🧾 PAYMENT RESPONSE PAGE (Deep Link Redirect)
    // ================================
    public function response()
{
    header('Content-Type: text/html');

    $status = isset($_GET['status']) ? $_GET['status'] : 'unknown';
    $response = $_POST; // Easebuzz sends full payment data here
    $logPath = 'C:/wamp64/tmp/';

    file_put_contents($logPath . 'easebuzz_response_log.txt', json_encode($response, JSON_PRETTY_PRINT), FILE_APPEND);

    // ✅ Update payment status in DB via PaymentModel
    if (!empty($response)) {
        $this->PaymentModel->updateTransaction(json_encode($response));
    }

    $deepLink = 'myapp://payment-unknown';
    if ($status === 'success') {
        $deepLink = 'myapp://payment-success';
    } elseif ($status === 'failure') {
        $deepLink = 'myapp://payment-failure';
    }

    // ✅ Redirect user back to mobile app via deep link
    echo "<script>
            setTimeout(function() {
                window.location.href = '{$deepLink}';
            }, 1500);
          </script>
          <h2 style='font-family:sans-serif;color:#333;text-align:center;margin-top:50px;'>
            ✅ Payment Process Completed <br><br>
            Redirecting you back to the app...<br><br>
            <small style='color:gray'>If it doesn’t open automatically, please switch back to your app.</small>
          </h2>";
}


    // ================================
    // 📄 FETCH RECEIPT
    // ================================
    public function fetchReceipt()
    {
        header('Content-Type: application/json');
        $feeId = $this->input->post('feeId');
        if (!$feeId) {
            echo json_encode(["error" => true, "message" => "Missing feeId"]);
            return;
        }

        $receipt = $this->FeeModel->loadReceiptDetails($feeId);
        echo json_encode(["error" => false, "receipt" => $receipt]);
    }
}

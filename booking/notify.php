<?php
require_once "ShoppingCart.php";

$shoppingCart = new ShoppingCart();


$raw_post_data = file_get_contents('php://input');
$raw_post_array = explode('&', $raw_post_data);
$myPost = array();
foreach ($raw_post_array as $keyval) {
    $keyval = explode('=', $keyval);
    if (count($keyval) == 2) {
        $myPost[$keyval[0]] = urldecode($keyval[1]);
    }
}


$req = 'cmd=_notify-validate';


foreach ($myPost as $key => $value) {

    $value = urlencode($value);
    $req .= "&$key=$value";
}


$ch = curl_init("https://www.sandbox.paypal.com/cgi-bin/webscr");
if ($ch === FALSE) {
    error_log(date('[Y-m-d H:i e] ') . "cURL initialization failed." . PHP_EOL, 3, 'app.log');
    exit;
}

curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $req);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);
curl_setopt($ch, CURLOPT_FORBID_REUSE, 1);
curl_setopt($ch, CURLOPT_HEADER, 1);
curl_setopt($ch, CURLINFO_HEADER_OUT, 1);


curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 30);
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Connection: Close'));

$res = curl_exec($ch);


if (curl_errno($ch) != 0) {
    error_log(date('[Y-m-d H:i e] ') . "Can't connect to PayPal to validate IPN message: " . curl_error($ch) . PHP_EOL, 3, 'app.log');
    curl_close($ch);
    exit;
} else {
    
    error_log(date('[Y-m-d H:i e] ') . "HTTP request of validation request: " . curl_getinfo($ch, CURLINFO_HEADER_OUT) . " for IPN payload: $req" . PHP_EOL, 3, 'app.log');
    error_log(date('[Y-m-d H:i e] ') . "HTTP response of validation request: $res" . PHP_EOL, 3, 'app.log');
    curl_close($ch);
}


$tokens = explode("\r\n\r\n", trim($res));
$res = trim(end($tokens));
if (strcmp($res, "VERIFIED") == 0) {
    
    $item_name = $_POST['item_name'];
    $item_number = $_POST['item_number'];
    $payment_status = $_POST['payment_status'];
    $payment_amount = $_POST['mc_gross'];
    $payment_currency = $_POST['mc_currency'];
    $txn_id = $_POST['txn_id'];
    $receiver_email = $_POST['receiver_email'];
    $payer_email = $_POST['payer_email'];

    
    $isPaymentCompleted = $payment_status === "Completed";

    $payment_id = $shoppingCart->insertPayment($item_number, $payment_status, $res);
    if (!$payment_id) {
        error_log(date('[Y-m-d H:i e] ') . "Failed to insert payment for item: $item_number" . PHP_EOL, 3, 'app.log');
        exit; 
    }

    
    $shoppingCart->paymentStatusChange($item_number, "PAID");
    error_log(date('[Y-m-d H:i e] ') . "Verified IPN: $req" . PHP_EOL, 3, 'app.log');

} else if (strcmp($res, "INVALID") == 0) {
    
    error_log(date('[Y-m-d H:i e] ') . "Invalid IPN: $req" . PHP_EOL, 3, 'app.log');
}

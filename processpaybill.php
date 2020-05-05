<?php
session_start();
require_once('functions/textref.php');
if(isset($_POST['pay']))
{


  //first step in collecting customer payment

  $first_name = $_POST['first_name'] != "" ? $_POST['first_name'] :  $errorCount++;
  $last_name = $_POST['last_name'] != "" ? $_POST['last_name'] :  $errorCount++;
  $email = $_POST['email'] != "" ? $_POST['email'] :  $errorCount++;
  $phoneno = $_POST['phoneno'] != "" ? $_POST['phoneno'] :  $errorCount++;
  $billamount = $_POST['amount'] != "" ? $_POST['amount'] :  $errorCount++;
  $department = $_POST['department'] != "" ? $_POST['department'] :  $errorCount++;



  $_SESSION['first_name'] = $first_name;
  $_SESSION['last_name'] = $last_name;
  $_SESSION['email'] = $email;
  $_SESSION['phoneno'] = $phoneno;
  $_SESSION['amount'] = $billamount;
  $_SESSION['department'] = $department;
 
  //conacantinating both customer first and last name together

$_SESSION['customer_fullname'] = $first_name . " " . $last_name;



$curl = curl_init();
 
$customer_name = $_SESSION['customer_fullname'];

$customer_email = $_SESSION['email'];
$customer_department = $_SESSION['department'];
$amount = $_SESSION['amount']; 
$currency = "NGN";
$txref = genTxref(); // ensure you generate unique references per transaction.
$PBFPubKey = "FLWPUBK_TEST-f36c2e95aa8d260ed4a0ed1b5e262062-X"; // get your public key from the dashboard.
$redirect_url = "http://localhost/phptask2/processpayment.php";
$payment_type ='card';


curl_setopt_array($curl, array(
  CURLOPT_URL => "https://api.ravepay.co/flwv3-pug/getpaidx/api/v2/hosted/pay",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => json_encode([
    'amount'=>$amount,
    'customer_email'=>$customer_email,
    'customer_department'=>$customer_department,
    'customer_firstname'=>$first_name,
    'customer_lastname'=>$last_name,
    'payment_type' =>$payment_type,
    'currency'=>$currency,
    'txref'=>$txref,
    'PBFPubKey'=>$PBFPubKey,
    'redirect_url'=>$redirect_url,

  
  ]),
  CURLOPT_HTTPHEADER => [
    "content-type: application/json",
    "cache-control: no-cache"
  ],
));


;

$response = curl_exec($curl);
$err = curl_error($curl);

if($err){
  // there was an error contacting the rave API
  die('Curl returned error: ' . $err);
}

$transaction = json_decode($response);

if(!$transaction->data && !$transaction->data->link){
  // there was an error from the API
  print_r('API returned error: ' . $transaction->message);
}

// uncomment out this line if you want to redirect the user to the payment page
//print_r($transaction->data->message);


// redirect to page so User can pay
// uncomment this line to allow the user redirect to the payment page
header('Location: ' . $transaction->data->link);


}



?>
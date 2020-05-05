<?php
session_start();

require_once('functions/alert.php');
require_once('functions/redirect.php');
require_once('functions/payment.php');


if (isset($_GET['txref'])) {
        $ref = $_GET['txref'];
        $amount = $_SESSION['amount'];//Correct Amount from Server
        $currency = "NGN"; //Correct Currency from Server

        $customer_fullname =$_SESSION['customer_fullname'];
        $customer_email = $_SESSION['email'];
        $customer_department = $_SESSION['department'];


        $query = array(
            "SECKEY" => "FLWSECK_TEST-68df8d8f31029ce0c3f47f4a6e7ff7b7-X",
            "txref" => $ref
        );

        $data_string = json_encode($query);
                
        $ch = curl_init('https://api.ravepay.co/flwv3-pug/getpaidx/api/v2/verify');                                                                      
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);                                              
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));

        $response = curl_exec($ch);

        

        $header_size = curl_getinfo($ch, CURLINFO_HEADER_SIZE);
        $header = substr($response, 0, $header_size);
        $body = substr($response, $header_size);

        curl_close($ch);

        $resp = json_decode($response, true);

        $paymentStatus = $resp['data']['status'];
        $chargeResponsecode = $resp['data']['chargecode'];
        $chargeAmount = $resp['data']['amount'];
        $chargeCurrency = $resp['data']['currency'];
        $transactionRef = $resp['data']['txref'];
        // $customerEmail = $resp['data']['customer_email'];

        date_default_timezone_get("Africa/Lagos");
$paymentTime = date('h:i:sa');
$paymentDate = date('Y-m-d');



// $_SESSION['datereg'] = $dateData;

$transactionDetails =[
'customerFullName'=> $customer_fullname,
'paymentDate'=> $paymentDate. " " . $paymentTime,
'status'=> $paymentStatus,
'customerEmail'=> $customer_email,
'amount'=> $chargeAmount,
'transactionRef'=>$transactionRef,
'department'=> $customer_department,
];

// print_r($transactionDetails);
// die();


$_SESSION['transactionDetails'] = $transactionDetails;
        if (($chargeResponsecode == "00" || $chargeResponsecode == "0") && ($chargeAmount == $amount)  && ($chargeCurrency == $currency)) {


            // saving inside db
            save_payment($transactionDetails);
            



            //redirect to dashboard if payment was sucessfull
            $_SESSION["message"] = "Payment sucessfully, A staff Will contact you soon " . $first_name;
            redirect_to("patient.php");
         
        }

         else {

            //redirect back to paybill if payment was not succesful
            $_SESSION["message"] = "Payment failed, Try making payment again  " . $first_name;
            redirect_to("paybills.php");
        }
    }
        else {
      die('No reference supplied');
    }

?>
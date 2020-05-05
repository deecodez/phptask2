<?php include_once('alert.php');


function save_payment($transactionDetails){
    file_put_contents("db/payment/". $transactionDetails['transactionRef'] . ".json", json_encode($transactionDetails));
}
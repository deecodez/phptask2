<?php session_start();
require_once('functions/redirect.php');

function storeTime($email)
{
    date_default_timezone_set("Africa/Lagos");
    $dateData = date('d M Y h:i:sA');
    file_put_contents("db/timeData/" . $email . ".json", json_encode(['date' => $dateData]));
}

storeTime($_SESSION['email']);

session_unset($email);
session_destroy();


redirect_to("login.php");
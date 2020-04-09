<?php session_start();

function storeTime($email)
{
    date_default_timezone_set("Africa/Lagos");
    $dateData = date('d M Y h:i:sA');
    file_put_contents("db/timeData/" . $email . ".json", json_encode(['date' => $dateData]));
}

storeTime($_SESSION['email']);

session_unset();
session_destroy();

header("Location: login.php");
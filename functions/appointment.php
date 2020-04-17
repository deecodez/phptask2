<?php include_once('alert.php');


function save_appointment($userObject){
    file_put_contents("db/appointment/". $userObject['email'] . ".json", json_encode($userObject));
}
<?php session_start();
    require_once('functions/user.php');
    require_once('functions/redirect.php');
    require_once('functions/appointment.php');


//Collecting the data

$errorCount = 0;

//Verifying the data, validation

$first_name = $_POST['first_name'] != "" ? $_POST['first_name'] :  $errorCount++;
$last_name = $_POST['last_name'] != "" ? $_POST['last_name'] :  $errorCount++;
$email = $_POST['email'] != "" ? $_POST['email'] :  $errorCount++;
$address = $_POST['address'] != "" ? $_POST['address'] :  $errorCount++;
$gender = $_POST['gender'] != "" ? $_POST['gender'] :  $errorCount++;
$phoneno = $_POST['phoneno'] != "" ? $_POST['phoneno'] :  $errorCount++;
$department = $_POST['department'] != "" ? $_POST['department'] :  $errorCount++;
$doa = $_POST['doa'] != "" ? $_POST['doa'] :  $errorCount++;
$toa = $_POST['toa'] != "" ? $_POST['toa'] :  $errorCount++;
$initial_complaint = $_POST['initial_complaint'] != "" ? $_POST['initial_complaint'] :  $errorCount++;
$appoinment_reason = $_POST['appoinment_reason'] != "" ? $_POST['appoinment_reason'] :  $errorCount++;

$_SESSION['first_name'] = $first_name;
$_SESSION['last_name'] = $last_name;
$_SESSION['email'] = $email;
$_SESSION['address'] = $address;
$_SESSION['gender'] = $gender;
$_SESSION['phoneno'] = $phoneno;
$_SESSION['department'] = $department;
$_SESSION['doa'] = $doa;
$_SESSION['toa'] = $toa;
$_SESSION['initial_complaint'] = $initial_complaint;
$_SESSION['appoinment_reason'] = $appoinment_reason;


date_default_timezone_get("Africa/Lagos");
$dateData = date('d M Y h:i:s A');

 //count all users
 $allUsers = scandir("db/users/");
 $countAllUsers = count($allUsers);
     $newUserId = ($countAllUsers-1);
$userObject = [
    'id'=>$newUserId,
    "datereg" =>$dateData,
    'first_name'=>$first_name,
    'email'=>$email,
    'address'=>$address,
    'gender'=>$gender,
    'gender'=>$gender,
    'phoneno'=>$phoneno,
    'department'=>$department,
    'doa' => $doa,
    'toa' => $toa,
    'initial_complaint' => $initial_complaint,
    'appoinment_reason' => $appoinment_reason
];
   



       

   //save in the database;
   save_appointment($userObject);

   $_SESSION["message"] = "Appointment boked sucessfully, A staff Will contact you soon " . $first_name;
   redirect_to("patient.php");




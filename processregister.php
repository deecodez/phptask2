<?php session_start();
    require_once('functions/user.php');
//Collecting the data

$errorCount = 0;

//Verifying the data, validation

$first_name = $_POST['first_name'] != "" ? $_POST['first_name'] :  $errorCount++;
$last_name = $_POST['last_name'] != "" ? $_POST['last_name'] :  $errorCount++;
$dob = $_POST['dob'] != "" ? $_POST['dob'] :  $errorCount++;
$email = $_POST['email'] != "" ? $_POST['email'] :  $errorCount++;
$password = $_POST['password'] != "" ? $_POST['password'] :  $errorCount++;
$gender = $_POST['gender'] != "" ? $_POST['gender'] :  $errorCount++;
$position = $_POST['position'] != "" ? $_POST['position'] :  $errorCount++;
$class = $_POST['class'] != "" ? $_POST['class'] :  $errorCount++;
$department = $_POST['department'] != "" ? $_POST['department'] :  $errorCount++;

$_SESSION['first_name'] = $first_name;
$_SESSION['last_name'] = $last_name;
$_SESSION['dob'] = $dob;
$_SESSION['email'] = $email;
$_SESSION['gender'] = $gender;
$_SESSION['position'] = $position;
$_SESSION['class'] = $class;
$_SESSION['department'] = $department;

if($errorCount > 0){

     $session_error = "You have " . $errorCount . " error";
    
    if($errorCount > 1) {        
        $session_error .= "s";
    }

    $session_error .=   " in your form submission";
    $_SESSION["error"] = $session_error ;

    header("Location: register.php");

}else{
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
        'last_name'=>$last_name,
        'dob'=>$dob,
        'email'=>$email,
        'password'=> password_hash($password, PASSWORD_DEFAULT), //password hashing
        'gender'=>$gender,
        'position'=>$position,
        'class'=>$class,
        'department'=>$department
       
    ];

    //Check if the user already exists.
    $userExists = find_user($email);

        if($userExists){
            $_SESSION["error"] = "Registration Failed, User already exits ";
            header("Location: register.php");
            die();
        }
        

    //save in the database;
    save_user($userObject);

    $_SESSION["message"] = "Registration Successful, you can now login " . $first_name;
    header("Location: login.php");
}


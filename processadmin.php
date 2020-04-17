<?php session_start();

require_once('functions/alert.php');
require_once('functions/redirect.php');
require_once('functions/token.php');
require_once('functions/admin.php');

$errorCount = 0;

$email = $_POST['email'] != "" ? $_POST['email'] :  $errorCount++;
$password = $_POST['password'] != "" ? $_POST['password'] :  $errorCount++;

$_SESSION['email'] = $email;

if($errorCount > 0)
{

    $session_error = "You have " . $errorCount . " error";
    
        if($errorCount > 1) 
        {        
            $session_error .= "s";
        }

    $session_error .=   " in your form submission";
    
    set_alert('error',$session_error);
      
    redirect_to("adminlogin.php");

}
else
{
  
     
    $currentUser = find_admin($email);

        if($currentUser){
          //check the user password.
          $userString = file_get_contents("db/admin/".$currentUser->email . ".json");
          $userObject = json_decode($userString);
          $passwordFromDB = $userObject->password;
  
          $passwrodFromUser = password_verify($password, $passwordFromDB);
              
          if($passwordFromDB == $passwrodFromUser)
          {
              //redicrect to dashboard 
                  $_SESSION['email'] = $userObject->email;
                  

            
                redirect_to("admin.php"); 
            
                
                die();
            }
          
        } 
    
    

    set_alert('error',"Invalid Email or Password");
    redirect_to("adminlogin.php");
    die();

}

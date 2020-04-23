<?php 
    include('lib/header.php');
    require_once('functions/user.php');
    require_once('functions/alert.php');

    // Scan user database
    $userlist = scandir("db/users/");
 

   


    echo "
    <div class='table_content'>
    <table class='table table-striped table-bordered table-hover'>
    <tr style='background-color: grey; color: blue'>
        <th >Staff Name</th>
        <th >Email</th>
        <th>Gender</th>
        <th>Department</th>
        <th>Date Of Registration</th>
        <th>Last Login</th>
    </tr>";

    //Search For Medical team department
$adminlist = $_SESSION['email'].".json";



for($i =2; $i < count($userlist); $i++){
    if($adminlist == $userlist[$i]){
  
        $medicalTeamString = file_get_contents("db/users/". $userlist[$i]);
       
        $medicalTeamObject = json_decode($medicalTeamString);
        print_r($medicalTeamObject);
        die();
       
       
        $medicalTeamDepartment = $medicalTeamObject ->designation;
        
    
        
    }
}
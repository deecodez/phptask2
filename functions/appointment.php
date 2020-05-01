<?php include_once('alert.php');


function save_appointment($userObject){
    file_put_contents("db/appointment/". $userObject['email'] . ".json", json_encode($userObject));
}

// function view_appointment($email = ""){
//     //check the database if the user exsits
//     if(!$email){
//         set_alert('error','User Email is not set');
//         die();
//     }

//     $allUsers = scandir("db/appointment/"); 
//     $countAllUsers = count($allUsers);

//     for ($counter = 0; $counter < $countAllUsers ; $counter++) {
       
//         $currentUser = $allUsers[$counter];

//         if($currentUser == $email . ".json"){
//           //check the user password.
//             $userString = file_get_contents("db/appointment/".$currentUser);
//             $userObject = json_decode($userString);
                       
//             return $userObject;
          
//         }        
        
//     }

//     return false;
// }
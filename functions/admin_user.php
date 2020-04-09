<?php include_once('alert.php');




function find_user($admin_email = ""){
    //check the database if the user exsits
    if(!$admin_email){
        set_alert('error','User Email is not set');
        die();
    }

    $allAdminUsers = scandir("db/admin/"); 
    $countAllAdminUsers = count($allAdminUsers);

    for ($counter = 0; $counter < $countAllAdminUsers ; $counter++) {
       
        $currentAdminUser = $allAdminUsers[$counter];

        if($currentAdminUser == $admin_email . ".json"){
          //check the user password.
            $userAdminString = file_get_contents("db/admin/".$currentAdminUser);
            $userAdminObject = json_decode($userAdminString);
                       
            return $userAdminObject;
          
        }        
        
    }

    return false;
}

function save_user($userAdminObject){
    file_put_contents("db/admin/". $userAdminObject['admin_email'] . ".json", json_encode($userAdminObject));
}



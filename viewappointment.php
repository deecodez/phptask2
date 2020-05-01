<?php 
    include('lib/header.php');
    require_once('functions/user.php');
    require_once('functions/alert.php');


  
    // Scan appointment and user database
    $allAppointmentlist = scandir("db/appointment/");
    $userlist = scandir("db/users/");

     
    echo "
    <div class='table_content'>
    <table class='table table-striped table-bordered table-hover'>
    <tr style='background-color: grey; color: blue'>
        <th >Name</th>
        <th >Appointment Date & Time</th>
        <th>Phone Number & Email</th>
        <th>Appoinment Reason</th>
        <th>Initial Complaint</th>
        <th>Department</th>
        <th>Register Date</th>
    </tr>";





//Search For Medical team department
$medicalTeamEmail = $_SESSION['email'].".json";
for($i =2; $i < count($userlist); $i++){
    if($medicalTeamEmail == $userlist[$i]){
        $medicalTeamString = file_get_contents("db/users/". $userlist[$i]);
        $medicalTeamObject = json_decode($medicalTeamString);
       
        $medicalTeamDepartment = $medicalTeamObject ->department;
       
        for($count=2; $count < count($allAppointmentlist); $count++){
            $countPatient ="";


            //To get all Appointment in database
            $appointmentString = file_get_contents("db/appointment/". $allAppointmentlist[$count]);
            $appointmentObject = json_decode($appointmentString);
            
            
            $appointmentdepartment = $appointmentObject ->department;
       
           

            //Checking if medicalteam department matches with patient 
            if($medicalTeamDepartment == $appointmentdepartment){
                
                $countPatient = $count;
                $doa = $appointmentObject ->doa;
                $toa = $appointmentObject ->toa;
                $appoinment_reason = $appointmentObject ->appoinment_reason;
                $initial_complaint = $appointmentObject ->initial_complaint;
                $phoneno = $appointmentObject ->phoneno;
                $dateRegister = $appointmentObject ->datereg;
                $email = $appointmentObject ->email;

                //get patient data from user table
                $patientString = file_get_contents("db/users/". email.".json");
                $patientObject = json_decode($patientString);
                $firstname = $patientObject ->first_name;
                $lastname = $patientObject ->last_name;
                $email = $patientObject ->email;
                $gender = $patientObject ->gender;
                $department = $patientObject ->department;
                $designation = $patientObject ->designation;
                $datereg = $patientObject ->datereg;
                $id = $patientObject ->id;

                

                $_SESSION['email'] = $email;
                echo "<tr>
                <td >".$firstname." ".$lastname."</td>
                <td >".$doa." ".$toa."</td>
                <td >".$phoneno." | ".$email."</td>
                <td >".$appoinment_reason."</td>
                <td >".$initial_complaint."</td>
                <td >".$medicalTeamDepartment."</td>
                <td >".$datereg."</td>
               
                ".
                "</tr>";
            }
        }
    }
    // die();
}
echo "</table> </div>"

;
//Error message when no patients department matches the Medical Team department
echo  "<strong><span style='color: red'>You have no pending appointments!</span></strong></div>";
?>
    



<?php include_once('lib/header.php'); 
 require_once('functions/redirect.php');
 require_once('functions/alert.php');




function fetchDate($email)
{
    $allDates = scandir("db/timeData/");
    $numOfDates = count($allDates);
    for ($counter = 0; $counter < $numOfDates; $counter++) {
        $currentDate = $allDates[$counter];
        if ($currentDate == $email . ".json") {
            $dateData = json_decode(file_get_contents('db/timeData/' . $currentDate));
            return $dateData->date;
        }
    }
}
?>


<section id="d">

    <p><?php  print_alert(); ?></p>
                
    <div class="container">
        <div class="row mt-5">
    
            <h3>Dashboard</h3>
            <div class="dashboard">

                <div class="dashboard_btn mt-3 mb-5 text-center">
                    <a href="viewstaffs.php"><button  class="btn btn-sm btn-primary" type="submit">VIEW ALL STAFFS</button></a>
                    <a href="viewpatients.php"><button  class="btn btn-sm btn-primary" type="submit">VIEW ALL PATIENTS</button></a>
                </div>
            
                <p>Welcome Back,</p>

                <p>Email: <strong><?php echo $_SESSION['email'] ?></strong></p>
                <!-- <hr>
                <p>Last Login: <strong><?php echo $lastlogin  = fetchdate($_SESSION['email']);?></strong></p> -->
            
                <p>
                    <a href="adduser.php"><button  class="btn btn-sm btn-primary" type="submit">ADD USERS</button></a>
                </p>

            </div>
        </div>
    </div>
</section>



<?php include_once('lib/footer.php'); ?>
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

<p>
                    <?php  print_alert(); ?>
                </p>
                
<div class="container">
    <div class="row mt-5">
    
    <h3>Dashboard</h3>
        <div class="dashboard">
            
            <p>Welcome Back,</p>

            <!-- <p>Your ID is : <strong><?php echo $_SESSION['loggedIn'] ?></strong></p> -->
            <hr>
            <!-- <p>This Account is register under <strong><?php echo $_SESSION['fullname'] ?></strong></p> -->
            <hr>
            <!-- <p>Apppoinmnet not found </p> -->
            <hr>
            
            <!-- <p>Your are logged in as: <strong><?php echo $_SESSION['role'] ?></strong></p>
            <hr> -->
           
            <p>Email: <strong><?php echo $_SESSION['email'] ?></strong></p>
            <hr>
            <!-- <p>Last Login: <strong><?php echo $lastlogin  = fetchdate($_SESSION['email']);?></strong></p> -->
            <hr>
            <!-- <p>Date of Registartion: <strong><?php echo $_SESSION['datereg'] ?></strong></p> -->

            <p>
                    <a href="adduser.php"><button  class="btn btn-sm btn-primary" type="submit">ADD USERS</button></a>
                </p>

                <a href="adduser.php"><button  class="btn btn-sm btn-primary" type="submit">VIEW ALL STAFFS</button></a>
      <a href="adduser.php"><button  class="btn btn-sm btn-primary" type="submit">VIEW AALL PATIENTS</button></a>

             


              

        </div>

        

    </div>
</div>
</section>



<?php include_once('lib/footer.php'); ?>
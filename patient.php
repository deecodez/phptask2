<?php include_once('lib/header.php'); 
 require_once('functions/redirect.php');
 require_once('functions/alert.php');

if(!isset($_SESSION['loggedIn'])){
    // redirect to dashboard
    redirect_to("login.php");
  

    session_destroy();
}

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

            
           

            <div class="dashboard_btn mt-3 mb-5 text-center">
                    <a class="btn btn-bg btn_pay_bills btn-outline-secondary mr-5" href="paybills.php">Pay Bills</a>
            <a class="btn btn-bg btn_book btn-outline-primary" href="bookappointment.php">Book Appointment</a> 
            </div>


            <p class="">Welcome Back,</p>
            <p>Your ID is : <strong><?php echo $_SESSION['loggedIn'] ?></strong></p>
            <hr>
            <p>This Account is register under <strong><?php echo $_SESSION['fullname'] ?></strong></p>
            <hr>
            <p>Apppoinmnet not found </p>
            <hr>
            
            <p>Department: <strong><?php echo $_SESSION['department'] ?></strong></p>
            <hr>
           
            <p>Email: <strong><?php echo $_SESSION['email'] ?></strong></p>
            <hr>
            <p>Last Login: <strong><?php echo $lastlogin  = fetchdate($_SESSION['email']);?></strong></p>
            <hr>
            <p>Date of Registartion: <strong><?php echo $_SESSION['datereg'] ?></strong></p>

          
             


              

        </div>

        

    </div>
</div>
</section>



<?php include_once('lib/footer.php'); ?>
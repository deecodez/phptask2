<?php include_once('lib/header.php'); 

if(!isset($_SESSION['loggedIn'])){
    // redirect to dashboard
    header("Location: login.php");
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

<div class="container">
    <div class="row mt-5">
    <h3>Dashboard</h3>
        <div class="dashboard">
            
            <p>Welcome Back,</p>
            <p>Full-Name : <strong><?php echo $_SESSION['fullname'] ?></strong></p>
            <hr>
            <p>ID: <strong><?php echo $_SESSION['loggedIn'] ?></strong></p>
            <hr>
            <p>Your are logged in as: <strong><?php echo $_SESSION['role'] ?></strong></p>
            <hr>
            <p>Class: <strong><?php echo $_SESSION['class'] ?></strong></p>
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
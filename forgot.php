<?php include_once('lib/header.php');  
require_once('functions/alert.php'); ?>
   

<div class="container mt-5">
    <div class="row mt-5">

        <div class="col-md-3 offset-md-3">
   <h3>Forgot Password</h3>
   <p>Provide the email address associated with your account</p>

   <form action="processforgot.php" method="POST">
   <p>
        <?php print_alert() ; ?>
    </p>
   <p>
        <label>Email</label><br />
        <input
        
        <?php              
            if(isset($_SESSION['email'])){
                echo "value=" . $_SESSION['email'];                                                             
            }                
        ?>

            type="text" name="email" placeholder="Email"  />
    </p>
    <p>
        <button type="submit">Send Reset Code</button>
    </p>
   </form>
        </div>
        </div>
        </div>
    
<?php include_once('lib/footer.php'); ?>
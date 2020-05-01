<?php 

include_once('lib/header.php');  
require_once('functions/alert.php'); 
?>
   

<div class="container login_page">
    <div class="row">
        <div class="card login_card">

        
            <h3>Forgot Password</h3>

            <p style="font-size: 12px;" class="text-center"><b>Provide the email address associated <br>with your account</b></p>

            <p><?php print_alert() ; ?></p>

            <form action="processforgot.php" method="POST">
            <div class="form_details">
   
  
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
                <button class="btn btn-sm btn-primary" type="submit">Send Reset Code</button>
                </p>
                    </div>
            </form>
        </div>
    </div>
</div>
    
<?php include_once('lib/footer.php'); ?>
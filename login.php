<?php include_once('lib/header.php');
      require_once('functions/alert.php');
      ?>



<div class="container login_page">
    <div class="row">

        
        <div class="card login_card">

            <h3>Login</h3>

            <p class="text-center">Welcome Back, Please Login </p>
            <p class="text-center">Don't have an account? <a href="register.php">Register</a> </p>

            <p>
                <?php  print_alert(); ?>
            </p>

            <form action="processlogin.php" method="POST">
            <div class="form_details">

                <p>
                    <label><b>Email</b></label><br />
                    <input
                    <?php              
                    if(isset($_SESSION['email'])){
                        echo "value=" . $_SESSION['email'];                                                             
                    }                
                ?>
                    type="text"name="email" placeholder="Email" />
                </p>

                <p>
                    <label><b>Password</b></label><br />
                    <input type="password" name="password" placeholder="password" />
                </p>

                <p>
                <button class="btn btn-sm btn-primary" type="submit">Login</button>
            </p>
            <p>
                Forgot Password?<a href="forgot.php"> Reset Here</a><br />
            </p>
            
            </div>
            </form>
            
           
        </div>
    </div>
</div>





<?php include_once('lib/footer.php'); ?>
<?php include_once('lib/header.php');
      require_once('functions/alert.php');
      ?>



<div class="container mt-5 pt-5">
    <div class="row">

        <div class="col-md-3 offset-md-3">

            <h3>Login</h3>

            <p>Welcome Back Admin </p>

            <p>
                <?php  print_alert(); ?>
            </p>

            <form action="processadmin.php" method="POST">

                <p>
                    <label>Email</label><br />
                    <input
                    <?php              
                    if(isset($_SESSION['email'])){
                        echo "value=" . $_SESSION['email'];                                                             
                    }                
                ?>
                    type="text" class="form-control" name="email" placeholder="Email" />
                </p>

                <p>
                    <label>Password</label><br />
                    <input type="password" class="form-control" name="password" placeholder="password" />
                </p>

                <p>
                <button class="btn btn-sm btn-primary" type="submit">Login</button>
            </p>
            <p>
                <a href="forgot.php">Forgot Password</a><br />
                <a href="register.php">Don't have an account? Register</a>
            </p>

            </form>

        </div>
    </div>
</div>





<?php include_once('lib/footer.php'); ?>
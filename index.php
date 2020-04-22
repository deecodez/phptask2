<?php  

include_once('lib/header.php');  
require_once('functions/alert.php'); 
?>


<p><?php  print_alert(); ?></p>

<div class="container home_page">
  
  <h3>Welcome to Startng Hospital</h3>
  <div class="mt-4 mr-5 home_button">
    <a class="btn btn-bg btn-outline-secondary mr-5" href="login.php">Login</a>
    <a class="btn btn-bg btn-outline-primary" href="register.php">Register</a> 
  </div>           
        
</div>
<?php include_once('lib/footer.php'); ?>
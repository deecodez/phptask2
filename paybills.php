<?php include_once('lib/header.php');
 require_once('functions/alert.php');
 require_once('functions/redirect.php');

 
 if(!isset($_SESSION['loggedIn'])){
    // redirect to dashboard
    $_SESSION["error"] = "You can't make a payment without being log in ";
    redirect_to("login.php");
} 


?>

<div class="container mt-5">
    <div class="row mt-5">
        <div class="col-md-3 offset-md-3 mt-5">

            <h3>Book An Appointment</h3>

            <p><strong>Please the fill the form below to book an appointment</strong></p>

            <p>All Fileds are required</p>

            <form action="processpaybill.php" method="POST">


                <p>
                    <?php  print_alert(); ?>
                </p>

                <p>
                    <label>First Name</label><br />
                    <input
                    <?php              
                    if(isset($_SESSION['first_name'])){
                        echo "value=" . $_SESSION['first_name'];                                                             
                    }                
                ?>
                    type="text" class="form-control" name="first_name" placeholder="First Name" pattern="[a-zA-Z][a-zA-Z ]{2,}" />
                </p>

                <p>
                    <label>last Name</label><br />
                    <input
                    <?php              
                    if(isset($_SESSION['last_name'])){
                        echo "value=" . $_SESSION['last_name'];                                                             
                    }                
                ?>
                    type="text" class="form-control" name="last_name" placeholder="Last Name" pattern="[a-zA-Z][a-zA-Z ]{2,}" />
                </p>

                <p>
                    <label>Email</label><br />
                    <input
                    <?php              
                    if(isset($_SESSION['email'])){
                        $_SESSION['email'];                                                             
                    }                
                ?>
                    type="text" class="form-control" name="email" placeholder="Email" />
                </p>

                <p>
                    <label>Phone Number</label><br />
                    <input
                    <?php              
                    if(isset($_SESSION['phoneno'])){
                        echo "value=" . $_SESSION['phoneno'];                                                             
                    }                
                    ?>
                    type="text" class="form-control" name="phoneno" placeholder="Phone Number" />
                </p>
                <p>

                <label>Amount</label><br />
                <select class="form-control" name="amount" >
                
                    <option value="">Select Amount</option>
                    <option value="20000" >&#8358;20000</option>
                    <option value="20000" >&#8358;40000</option>
                    <!-- <option 
                    <?php              
                        if(isset($_SESSION['amount']) && $_SESSION['amount'] == '20000'){
                            echo "20000";                                                           
                        }                
                    ?>
                    >20000</option>
                    <option 
                    <?php              
                        if(isset($_SESSION['amount']) && $_SESSION['amount'] == '40000'){
                            echo "40000";                                                           
                        }                
                    ?>
                    >40000</option> -->
                    
                </select>


                <!-- Will come back to check how i can use label and readonly as default value so it would be showing undefined amt in ravepay -->
                    <!-- <label>Amount</label><br />
                    <input
                    
                    type="text" class="form-control" name="amount" value="40,000" placeholder="40,000" readonly/> -->
                </p>

                <p>
                <label>Department</label><br />
                <select class="form-control" name="department" >
                
                    <option value="">Select One</option>
                    <option 
                    <?php              
                        if(isset($_SESSION['department']) && $_SESSION['department'] == 'X-ray'){
                            echo "selected";                                                           
                        }                
                    ?>
                    >X-ray</option>
                    <option 
                    <?php              
                        if(isset($_SESSION['department']) && $_SESSION['department'] == 'Laboratory'){
                            echo "selected";                                                           
                        }                
                    ?>
                    >Laboratory</option>
                    <option 
                    <?php              
                        if(isset($_SESSION['department']) && $_SESSION['department'] == 'Gynecology'){
                            echo "selected";                                                           
                        }                
                    ?>
                    >Gynecology</option>
                    <option 
                    <?php              
                        if(isset($_SESSION['department']) && $_SESSION['department'] == 'Orthopedic'){
                            echo "selected";                                                           
                        }                
                    ?>
                    >Orthopedic</option>
                </select>
                </p>

                

                
            <p>
                <button class="btn btn-sm btn-primary" name="pay" type="submit">PAY</button>
            </p>
            </div>
        </div>
    </div>
</form>

<?php include_once('lib/footer.php'); ?>
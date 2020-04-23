<?php include_once('lib/header.php');
 require_once('functions/alert.php');
 require_once('functions/redirect.php');
 require_once('functions/user.php');

 
 if(!isset($_SESSION['loggedIn'])){
    // redirect to dashboard
    $_SESSION["error"] = "You can't book an appointment without login ";
    redirect_to("login.php");
} 


?>


<div class="container mt-5">
    <div class="row mt-5">
        <div class="col-md-3 offset-md-3 mt-5">

            <h3>Book An Appointment</h3>

            <p><strong>Please the fill the form below to book an appointment</strong></p>

            <p>All Fileds are required</p>

            <form action="processappoinment.php" method="POST">


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
                    <label>Address</label><br />
                    <input
                    <?php              
                    if(isset($_SESSION['address'])){
                        echo "value=" . $_SESSION['address'];                                                             
                    }                
                ?>
                    type="text" class="form-control" name="address" placeholder="Address" />
                </p>

                <p>
                    <label>Gender</label><br />
                    <select class="form-control" name="gender" >
                        <option value="">Select One</option>
                        <option
                        <?php              
                        if(isset($_SESSION['gender']) && $_SESSION['gender'] == 'Female'){
                            echo "selected";                                                           
                        }                
                        ?>
                        >Female</option>
                        <option
                        <?php              
                        if(isset($_SESSION['gender']) && $_SESSION['gender'] == 'Male'){
                            echo "selected";                                                           
                        }                
                        ?>
                        >Male</option>
                    </select>
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
                    <label>Enter Appointment Date </label><br />
                    <input
                    <?php              
                    if(isset($_SESSION['doa'])){
                        echo "value=" . $_SESSION['doa'];                                                             
                    }                
                    ?>
                    type="date" class="form-control" name="doa" placeholder="Choose Date" />
                </p>

                <p>
                    <label>Select Time of Appointment</label><br />
                    <select class="form-control" name="toa" >
                        <option value="">Select One</option>
                        <option
                        <?php              
                        if(isset($_SESSION['toa']) && $_SESSION['toa'] == '10am-12noon'){
                            echo "selected";                                                           
                        }                
                        ?>
                        >10am-12noon</option>
                        <option
                        <?php              
                        if(isset($_SESSION['toa']) && $_SESSION['toa'] == '1pm-3pm'){
                            echo "selected";                                                           
                        }                
                        ?>
                        >1pm-3pm</option>
                        <option
                        <?php              
                        if(isset($_SESSION['toa']) && $_SESSION['toa'] == '4pm-6pm'){
                            echo "selected";                                                           
                        }                
                        ?>
                        >4pm-6pm</option>
                    </select>
                </p>

                

            <p>
                <label>Initial Complaint</label>
                <textarea class="form-control" name="initial_complaint" id="initial_complaint" cols="30" rows="10"></textarea>
            </p>

            <p>
                <label>Appointment Reasons</label>
                <textarea class="form-control" name="appoinment_reason" id="appoinment_reason" cols="30" rows="10"></textarea>
            </p>

            <p>
                <button class="btn btn-sm btn-primary" type="submit">Submit Request</button>
            </p>
            </div>
        </div>
    </div>
</form>

<?php include_once('lib/footer.php'); ?>
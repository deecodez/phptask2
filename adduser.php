<?php include_once('lib/header.php');
 require_once('functions/alert.php');
 require_once('functions/redirect.php');

 if(isset($_SESSION['loggedIn']) && !empty($_SESSION['loggedIn'])){
    // redirect to dashboard
    if($userObject->designation == 'Patient'){
        redirect_to("patient.php");
    }else{
        redirect_to("medicalteam.php"); 
    }
        
        die();
    }

 
 ?>




<div class="container mt-5">
    <div class="row mt-5">
        <div class="col-md-3 offset-md-3 mt-5">

            <h3>Register</h3>

            <p><strong>Welcome, Please Register a User</strong></p>

            <p>All Fileds are required</p>

            <form action="processadduser.php" method="POST">

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
                        echo "value=" . $_SESSION['email'];                                                             
                    }                
                ?>
                    type="email" class="form-control" name="email" placeholder="Email" />
                </p>

                <p>
                    <label>Password</label><br />
                    <input type="password" class="form-control" name="password" placeholder="password" />
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
                <label>Designation</label><br />
                <select class="form-control" name="designation" >
                
                    <option value="">Select One</option>
                    <option 
                    <?php              
                        if(isset($_SESSION['designation']) && $_SESSION['designation'] == 'Medical Team (MT)'){
                            echo "selected";                                                           
                        }                
                    ?>
                    >Medical Team (MT)</option>
                    <option 
                    <?php              
                        if(isset($_SESSION['designation']) && $_SESSION['designation'] == 'Patient'){
                            echo "selected";                                                           
                        }                
                    ?>
                    >Patient</option>
                </select>
            </p>

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
                    <button class="btn btn-sm btn-primary" type="submit">Add User</button>
                </p>

                

            </div>
        </div>
    </div>
</form>

<?php include_once('lib/footer.php'); ?>




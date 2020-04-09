<?php include_once('lib/header.php');
 require_once('functions/alert.php');
 
 ?>




<div class="container mt-5">
    <div class="row mt-5">
        <div class="col-md-3 offset-md-3 mt-5">

            <h3>Register</h3>

            <p>Welcome BrainAcadmy Portal, Please Register</p>

            <p>All Fileds are required</p>

            <form action="processregister.php" method="POST">

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
                    <label>D.O.B</label><br />
                    <input
                    <?php              
                    if(isset($_SESSION['dob'])){
                        echo "value=" . $_SESSION['dob'];                                                             
                    }                
                ?>
                    type="date" class="form-control" name="dob" placeholder="Date of Birth" />
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
                    <label>Position</label><br />
                    <select class="form-control" name="position" >
                        <option value="">Select One</option>
                        <option
                        <?php              
                        if(isset($_SESSION['position']) && $_SESSION['position'] == 'Student'){
                            echo "selected";                                                           
                        }                
                        ?>
                        >Student</option>
                        <option
                        <?php              
                        if(isset($_SESSION['position']) && $_SESSION['position'] == 'Teacher'){
                            echo "selected";                                                           
                        }                
                        ?>
                        >Teacher</option>
                    </select>
                </p>

                <p>
                    <label>Class(For Students)/Class-in-Charge(For Students)</label><br />
                    <select class="form-control" name="class" >
                        <option value="">Select One</option>
                        <option
                        <?php              
                        if(isset($_SESSION['class']) && $_SESSION['class'] == 'SS-One'){
                            echo "selected";                                                           
                        }                
                        ?>
                        >SS-One</option>
                        <option
                        <?php              
                        if(isset($_SESSION['class']) && $_SESSION['class'] == 'SS-Two'){
                            echo "selected";                                                           
                        }                
                        ?>
                        >SS-Two</option>
                        <option
                        <?php              
                        if(isset($_SESSION['class']) && $_SESSION['class'] == 'SS-Three'){
                            echo "selected";                                                           
                        }                
                        ?>
                        >SS-Three</option>
                    </select>
                </p>

                <p>
                    <label>Department</label><br />
                    <select class="form-control" name="department" >
                        <option value="">Select One</option>
                        <option
                        <?php              
                        if(isset($_SESSION['department']) && $_SESSION['department'] == 'Art'){
                            echo "selected";                                                           
                        }                
                        ?>
                        >Art</option>
                        <option
                        <?php              
                        if(isset($_SESSION['department']) && $_SESSION['department'] == 'Science'){
                            echo "selected";                                                           
                        }                
                        ?>
                        >Science</option>
                        <option
                        <?php              
                        if(isset($_SESSION['department']) && $_SESSION['department'] == 'Commercial'){
                            echo "selected";                                                           
                        }                
                        ?>
                        >Commercial</option>
                    </select>
                </p>

                <p>
                    <button class="btn btn-sm btn-primary" type="submit">Register</button>
                </p>

                <p>
                    <a href="forgot.php">Forgot Password</a><br />
                    <a href="login.php">Already have an account? Login</a>
                </p>

            </div>
        </div>
    </div>
</form>

<?php include_once('lib/footer.php'); ?>




<?php 
require('top.php');
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	if (isset($_POST['btnReg'])) {

		$name = $_POST['name'];
		$email = $_POST['email'];
		$mobile= $_POST['mobile'];
		$password = $_POST['password'];
		$confirmpassword = $_POST['confirmpassword'];


		$_ErrorMessage = "";
		if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) {
			$_ErrorMessage = "<div class='mt-4 alert alert-danger'>Error: Only letters and white space allowed</div>";
		}  else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
			$_ErrorMessage = "<div class='mt-4 alert alert-danger'>Error: Invalid email format</div>";
		} else if ($password != $confirmpassword) {
			$_ErrorMessage = "<div class='mt-4 alert alert-danger'>Error: Passwords Does Not Match!</div>";
		}

		if ($_ErrorMessage == "") {
			// Check for the Username 
			$query = "select * from `users` where `email` ='$email'";
			$queryResult = mysqli_query($conn, $query);
			$RecordCount = mysqli_num_rows($queryResult);
			if ($RecordCount > 0) {
				$_ErrorMessage = "<div class='mt-4 alert alert-danger'>Error: Email already Exist!</div>";
			}
            else
            {
				$passwordEncrypt = md5($password);
				$added_on=date('y-m-d h:i:s');
				$query = "insert into `users` (name,email,mobile,password,added_on) values ('$name', '$email', '$mobile', '$passwordEncrypt', '$added_on')";
				$queryResult = mysqli_query($conn, $query);

				if ($queryResult) {
					$_ErrorMessage = "<div class='mt-4 alert alert-success alert-dismissible' role='alert'>
                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>Account Created</div>";
				} else {
					$_ErrorMessage = "<div class='mt-4 alert alert-danger'>Please try again !</div>";
				}
			}
		}
		//==============
	}
}
?>
<!-- Start Bradcaump area -->
<div class="ht__bradcaump__area" style="background: rgba(0, 0, 0, 0) url(images/bg/4.jpg) no-repeat scroll center center / cover ;">
    <div class="ht__bradcaump__wrap">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="bradcaump__inner">
                        <nav class="bradcaump-inner">
                            <a class="breadcrumb-item" href="index.php">Home</a>
                            <span class="brd-separetor"><i class="zmdi zmdi-chevron-right"></i></span>
                            <span class="breadcrumb-item active">Register</span>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Bradcaump area -->
<section class="htc__contact__area ptb--100 bg__white">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                            <div class="contact-form-wrap mt--60">
                                <div class="col-xs-12">
                                    <div class="contact-title">
                                        <h2 class="title__line--6">Register</h2>
                                    </div>
                                    <?php
                                    if (isset($_ErrorMessage))
                                    {
                                        echo $_ErrorMessage;
                                    } ?>
                                </div>
                                <div class="col-xs-12">
                                    <form id="register-form" method="post">
                                        <div class="single-contact-form">
                                            <div class="contact-box name">
                                                <input type="text" name="name" id="name" placeholder="Your Full Name*" style="width:100%" required title="Please enter your name">
                                            </div>
                                        </div>
                                        <div class="single-contact-form">
                                            <div class="contact-box name">
                                                <input type="email" name="email" id="email" placeholder="Your Email*" style="width:100%" required title="Please enter your email">
                                            </div>
                                        </div>
                                        <div class="single-contact-form">
                                            <div class="contact-box name">
                                                <input type="text" name="mobile" id="mobile" placeholder="Your Mobile*" style="width:100%" required title="Please enter your mobile number">
                                            </div>
                                        </div>
                                        <div class="single-contact-form">
                                            <div class="contact-box name">
                                                <input type="password" name="password" id="password" placeholder="Your Password*" style="width:100%" required title="Please enter password">
                                            </div>
                                        </div>
                                        <div class="single-contact-form">
                                            <div class="contact-box name">
                                                <input type="password" name="confirmpassword" id="confirmpassword" placeholder="Confirm Password*" style="width:100%" required title="Please confirm password">
                                            </div>
                                        </div>
                                        <div class="contact-btn">
                                            <button type="submit" name="btnReg" class="fv-btn">Register</button>
                                        </div>
                                    </form>
                                    <div class="form-output register_msg ">
                                        <p class="form-messege field_error"></p>
                                    </div>
                                </div>
                            </div> 
                    
                    </div>
                </div>
            </div>
</section>
<?php require('footer.php') ?>
<?php 
require('top.php');
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	if (isset($_POST['btnLogin'])) {
		$email = $_POST['login_email'];
		$password = $_POST['login_password'];

		$_ErrorMessage  = "";

		//Now checking for Login Details username and password in Database
		if ($_ErrorMessage == "") {

			$passwordEncrypt = md5($password);
			$querySearch = "select * from users where email = '" . $email . "' AND password = '" . $passwordEncrypt . "'";
			$queryResult = mysqli_query($conn, $querySearch);
			$RecordCount = mysqli_num_rows($queryResult); // 	
			$UserRecords = mysqli_fetch_assoc($queryResult);

			if ($RecordCount > 0) {
				$_SESSION['USER_LOGIN']='YES';
				$_SESSION['UserID'] = $UserRecords["id"];
				$_SESSION['UserFullName'] = $UserRecords["name"];
				$_SESSION['UserEmail'] = $UserRecords["email"];
				header('location:index.php');
			} else {
				$_ErrorMessage = "<div class='alert alert-danger'>Invalid Email/ Password!</div>";
			}
		}
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
                                  <span class="breadcrumb-item active">Login</span>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Bradcaump area -->
        <!-- Start Contact Area -->
        <section class="htc__contact__area ptb--100 bg__white">
            <div class="container">
                <div class="row">
					<div class="col-md-12">
						<div class="contact-form-wrap mt--60">
							<div class="col-xs-12">
								<div class="contact-title">
									<h2 class="title__line--6">Login</h2>
								</div>
								<?php if (isset($_ErrorMessage)) 
								{
									echo $_ErrorMessage;
								} ?>
							</div>
							<div class="col-xs-12">
								<form id="login-form" method="post">
									<div class="single-contact-form">
										<div class="contact-box name">
											<input type="text" name="login_email" id="login_email" placeholder="Your Email*" style="width:100%" required title="Please enter email">
										</div>
                                        <span class="field_error" id="login_email_error"></span>

									</div>
									<div class="single-contact-form">
										<div class="contact-box name">
											<input type="password" name="login_password" id="login_password" placeholder="Your Password*" style="width:100%" required title="Please enter password">
										</div>
                                        <span class="field_error" id="login_password_error"></span>
									</div>		
									<div class="contact-btn">
										<button type="submit" name="btnLogin" class="fv-btn">Login</button>
									</div>
								</form>
								<div class="form-output login_msg">
									<p class="form-messege field_error"></p>
								</div>
							</div>
						</div> 
                
				</div>
            </div>
        </section>
        <!-- End Contact Area -->
<?php require('footer.php') ?>

<?php
session_start();
if(isset($_SESSION['student_email']))
{
    header('Location:home.php');
}
include './includes/connection.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Campus Recruitment System</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="login/images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="login/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="login/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="login/vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="login/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="login/vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="login/css/util.css">
	<link rel="stylesheet" type="text/css" href="login/css/main.css">
<!--===============================================================================================-->
    <!-- sweetalert -->
    <script src="./js/sweetalert/jquery-3.4.1.min.js"></script>
    <script src="./js/sweetalert/sweetalert2.all.min.js"></script>
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-pic js-tilt p-t-136" data-tilt>
					<img src="login/images/img-01.png" alt="IMG">
				</div>

				<form class="login100-form validate-form" method="POST">
					<span class="login100-form-title">
						Student Register
					</span>

					<div class="wrap-input100 validate-input" data-validate = "Valid Roll Number is required">
						<input class="input100" type="number" name="rollno" placeholder="Roll Number">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-user-circle" aria-hidden="true"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Valid Name is required">
						<input class="input100" type="text" name="name" placeholder="Name">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-user" aria-hidden="true"></i>
						</span>
					</div>
					

					<div class="wrap-input100 validate-input" data-validate = "Valid address is required">
						<input class="input100" type="text" name="address" placeholder="Address">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-address-card" aria-hidden="true"></i>
						</span>
					</div>
					

					<div class="wrap-input100 validate-input" data-validate = "Valid email is required">
						<input class="input100" type="email" name="email" placeholder="Email">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
					</div>
					

					<div class="wrap-input100 validate-input" data-validate = "Valid contact number is required">
						<input class="input100" type="number" name="contactno" placeholder="Contact Number">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-phone" aria-hidden="true"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Valid username is required">
						<input class="input100" type="text" name="username" placeholder="Username">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-key" aria-hidden="true"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Password is required">
						<input class="input100" type="password" name="password" placeholder="Password">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
					</div>
					
					<div class="container-login100-form-btn">
						<button class="login100-form-btn" type="submit" name="submit">
							Register
						</button>
					</div>

					<div class="text-center p-t-13">
						<a class="txt2" href="index.php">
							Already have an account?
							<i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
						</a>
					</div>
				</form>
				<?php
					if(isset($_POST['submit']))
					{
						$rollno=mysqli_real_escape_string($con,$_POST['rollno']);
						$name=mysqli_real_escape_string($con,$_POST['name']);
						$address=mysqli_real_escape_string($con,$_POST['address']);
						$email=mysqli_real_escape_string($con,$_POST['email']);
						$contactno=mysqli_real_escape_string($con,$_POST['contactno']);
						$username=mysqli_real_escape_string($con,$_POST['username']);
						$password=mysqli_real_escape_string($con,$_POST['password']);

						$sql="INSERT INTO student (student_roll_no,student_name,student_address,
						student_email,student_contact_no,student_username,student_password)
						VALUES ('$rollno','$name','$address','$email','$contactno','$username','$password')";
						
						$insert=mysqli_query($con,$sql);

						if($insert)
						{
							?>
								<script>
									Swal.fire(
									{
										icon: 'success',
										title: 'Success!',
										text: 'Registration Successfull'
									}).then((result) => {
										window.location='index.php';
									});
								</script>
							<?php 
						}
						else
						{
							?>
								<script>
									Swal.fire(
									{
										icon: 'warning',
										title: 'Oops!',
										text: 'Something went wrong!!'
									}).then((result) => {
										window.location='registration.php';
									});
								</script>
							<?php  
						}
					}
				?>
			</div>
		</div>
	</div>
	
	

	
<!--===============================================================================================-->	
	<script src="login/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="login/vendor/bootstrap/js/popper.js"></script>
	<script src="login/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="login/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="login/vendor/tilt/tilt.jquery.min.js"></script>
	<script >
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>
<!--===============================================================================================-->
	<script src="login/js/main.js"></script>

</body>
</html>
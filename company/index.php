
<?php
session_start();
if(isset($_SESSION['company_id']))
{
    header('Location:home.php');
}
include './includes/connection.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Campus Recruitment System</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="./vendors/feather/feather.css">
  <link rel="stylesheet" href="./vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="./vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="./css/vertical-layout-light/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="./images/favicon.png" />

  <!-- sweetalert -->
  <script src="./js/sweetalert/jquery-3.4.1.min.js"></script>
  <script src="./js/sweetalert/sweetalert2.all.min.js"></script>
</head>

<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center auth px-0">
        <div class="row w-100 mx-0">
          <div class="col-lg-4 mx-auto">
            <div class="auth-form-light text-left py-5 px-4 px-sm-5">
              <div class="brand-logo">
                <img src="./images/logo.svg" alt="logo">
              </div>
              <h6 class="font-weight-light text-center">Sign in to continue.</h6>
              <form class="pt-3" method="POST" onsubmit="return validateForm()">
                <div class="form-group">
                  <input type="text" id="username" class="form-control form-control-lg" name=username id="username" placeholder="Username" onclick="clearusernamevalidation()">
                  <span id="validateusername" class="text-danger"></span>
                </div>
                <div class="form-group">
                  <input type="password" id="password" class="form-control form-control-lg" id="password" name="password" placeholder="Password" onclick="clearpasswordvalidation()">
                  <span id="validatepassword" class="text-danger"></span>
                </div>
                <div class="mt-3">
                  <button type="submit" name="submit" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" href="./index.html">SIGN IN</button>
                </div>
                <!-- <div class="my-2 d-flex justify-content-between align-items-center">
                  <a href="#" class="auth-link text-black">Forgot password?</a>
                </div> -->
                <div class="text-center mt-4 font-weight-light">
                  Don't have an account? <a href="register.php" class="text-primary">Create</a>
                </div>
              </form>
              <?php  
                if(isset($_POST['submit']))
                {
                    $username=mysqli_real_escape_string($con,$_POST['username']);
                    $password=mysqli_real_escape_string($con,$_POST['password']);
                    
                    $sql="SELECT * FROM admin WHERE admin_username='$username' AND admin_password='$password'";
                    $query=mysqli_query($con,$sql) or die(mysqli_error($con));
                    if(mysqli_num_rows($query))
                    {
                        $fetch=mysqli_fetch_array($query);
                        $_SESSION['admin_id']=$fetch['admin_id'];
                        $_SESSION['admin_email']=$fetch['admin_email'];
                        ?>
                            <script>
                                Swal.fire(
                                {
                                    icon: 'success',
                                    title: 'Success!',
                                    text: 'You successfully Logged in'
                                }).then((result) => {
                                    window.location='home.php';
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
                                window.location='index.php';
                            });
                        </script>
                        <?php            
                    }
                }
              ?>
            </div>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="./vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="./js/off-canvas.js"></script>
  <script src="./js/hoverable-collapse.js"></script>
  <script src="./js/template.js"></script>
  <script src="./js/settings.js"></script>
  <script src="./js/todolist.js"></script>
  
  <script src="./js/validations/index.js"></script>
  <!-- endinject -->
</body>

</html>

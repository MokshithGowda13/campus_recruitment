
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
  <title>Skydash Admin</title>
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
              <h6 class="font-weight-light text-center">Signing up is easy. It only takes a few steps</h6>
              <form class="pt-3" method="POST" onsubmit="return validateForm()">
                <div class="form-group">
                  <input type="text" class="form-control form-control-lg" id="name" placeholder="Name" name="name" onclick="clearnamevalidation()">
                  <span id="validatename" class="text-danger"></span>
                </div>
                <div class="form-group">
                  <textarea name="address" id="address" class="form-control form-control-lg" placeholder="Address" onclick="clearaddressvalidation()"></textarea>
                  <span class="text-danger" id="validateaddress"></span>
                </div>
                <div class="form-group">
                  <input type="number" class="form-control form-control-lg" id="contactno" placeholder="Contact Number" name="contactno" onclick="clearcontactnovalidation()">
                  <span id="validatecontactno" class="text-danger"></span>
                </div>
                <div class="form-group">
                  <input type="email" class="form-control form-control-lg" id="email" placeholder="Email" name="email" onclick="clearemailvalidation()">
                  <span id="validateemail" class="text-danger"></span>
                </div>
                <div class="form-group">
                  <input type="text" class="form-control form-control-lg" id="username" placeholder="Username" name="username" onclick="clearusernamevalidation()">
                  <span id="validateusername" class="text-danger"></span>
                </div>
                <div class="form-group">
                  <input type="password" class="form-control form-control-lg" id="password" placeholder="Password" name="password" onclick="clearpasswordvalidation()">
                  <span id="validatepassword" class="text-danger"></span>
                </div>
                <div class="mt-3">
                  <button class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" name="submit" type="submit">SIGN UP</button>
                </div>
                <div class="text-center mt-4 font-weight-light">
                  Already have an account? <a href="index.php" class="text-primary">Login</a>
                </div>
              </form>
                <?php
                    if(isset($_POST['submit']))
                    {
                        $name=mysqli_real_escape_string($con,$_POST['name']);
                        $address=mysqli_real_escape_string($con,$_POST['address']);
                        $contactno=mysqli_real_escape_string($con,$_POST['contactno']);
                        $email=mysqli_real_escape_string($con,$_POST['email']);
                        $username=mysqli_real_escape_string($con,$_POST['username']);
                        $password=mysqli_real_escape_string($con,$_POST['password']);

                        $sql="INSERT INTO company (company_name,company_address,company_contact_no,
                        company_email,company_username,company_password)
                        VALUES ('$name','$address','$contactno','$email','$username','$password')";

                        $insert=mysqli_query($con,$sql);

                        if($insert)
                        {
                            ?>
                                <script>
                                    Swal.fire(
                                    {
                                        icon: 'success',
                                        title: 'Success!',
                                        text: 'Register Successful'
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
                                        window.location='register.php';
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
  <!-- endinject -->
  <script src="./js/validations/register.js"></script>
</body>

</html>

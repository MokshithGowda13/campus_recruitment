
<?php
session_start();
if(!isset($_SESSION['admin_id']))
{
    header('Location:index.php');
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
  <link rel="stylesheet" href="vendors/feather/feather.css">
  <link rel="stylesheet" href="vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <link rel="stylesheet" href="vendors/datatables.net-bs4/dataTables.bootstrap4.css">
  <link rel="stylesheet" href="vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" type="text/css" href="js/select.dataTables.min.css">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="css/vertical-layout-light/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="images/favicon.png" />

  <!-- sweetalert -->
  <script src="./js/sweetalert/jquery-3.4.1.min.js"></script>
  <script src="./js/sweetalert/sweetalert2.all.min.js"></script>
</head>
<body>
  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <?php include("./includes/navbar.php"); ?>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_sidebar.html -->
      <?php include("./includes/sidebar.php"); ?>
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin">
              <div class="row">
                <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                  <!-- <h3 class="font-weight-bold">Welcome Admin</h3> -->
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-8 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Add Company</h4>
                  <form class="forms-sample" method="POST" onsubmit="return validateForm()">
                    <div class="form-group">
                      <label for="name">Name</label>
                      <input type="text" class="form-control" id="name" onclick="clearnamevalidation()" name="name" placeholder="Name">
                      <span id="validatename" class="text-danger"></span>
                    </div>
                    <div class="form-group">
                      <label for="address">Address</label>
                      <textarea name="address" id="address" class="form-control" onclick="clearaddressvalidation()" placeholder="Address"></textarea>
                      <span id="validateaddress" class="text-danger"></span>
                    </div>
                    <div class="form-group">
                      <label for="email">Email</label>
                      <input type="email" class="form-control" id="email" onclick="clearemailvalidation()" name="email" placeholder="Email">
                      <span id="validateemail" class="text-danger"></span>
                    </div>
                    <div class="form-group">
                      <label for="contactno">Contact Number</label>
                      <input type="number" class="form-control" id="contactno" onclick="clearcontactnovalidation()" name="contactno" placeholder="Contact Number">
                      <span id="validatecontactno" class="text-danger"></span>
                    </div>
                    <div class="form-group">
                      <label for="username">Username</label>
                      <input type="text" class="form-control" id="username" onclick="clearusernamevalidation()" name="username" placeholder="Userame">
                      <span id="validateusername" class="text-danger"></span>
                    </div>
                    <div class="form-group">
                      <label for="password">Password</label>
                      <input type="password" class="form-control" id="password" onclick="clearpasswordnovalidation()" name="password" placeholder="Password">
                      <span id="validatepassword" class="text-danger"></span>
                    </div>
                    <button type="submit" name="submit" class="btn btn-primary mr-2">Submit</button>
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
                                        text: 'Insertion Successful'
                                    }).then((result) => {
                                        window.location='view-companies.php';
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
                                        window.location='add-company.php';
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
        <!-- partial:partials/_footer.html -->
        <?php include("./includes/footer.php"); ?>
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>   
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->

  <!-- plugins:js -->
  <script src="vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <script src="vendors/chart.js/Chart.min.js"></script>
  <script src="vendors/datatables.net/jquery.dataTables.js"></script>
  <script src="vendors/datatables.net-bs4/dataTables.bootstrap4.js"></script>
  <script src="js/dataTables.select.min.js"></script>

  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="js/off-canvas.js"></script>
  <script src="js/hoverable-collapse.js"></script>
  <script src="js/template.js"></script>
  <script src="js/settings.js"></script>
  <script src="js/todolist.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="js/dashboard.js"></script>
  <script src="js/Chart.roundedBarCharts.js"></script>
  <!-- End custom js for this page-->
                      
  <script src="./js/validations/add-company.js"></script>
</body>

</html>


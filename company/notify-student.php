
<?php
session_start();
if(!isset($_SESSION['company_id']))
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
                  <h4 class="card-title">Notify Student</h4>
                  <form class="forms-sample" method="POST" onsubmit="return validateForm()">
                    <div class="form-group">
                      <label for="from">From</label>
                      <input type="text" class="form-control" id="from" name="from" value="<?php echo $_SESSION['company_email']; ?>" readonly>
                    </div>  
                    <div class="form-group">
                      <label for="to">To</label>
                      <select class="form-control" name="to" id="to" onclick="cleartovalidation()">
                        <option value="Null">Please Select Student</option>
                        <?php  
                            $query=mysqli_query($con,"SELECT * from student") or die(mysqli_error($con));
                            if(mysqli_num_rows($query)){
                              while($row=mysqli_fetch_array($query)){
                        ?>
                        <option value="<?php echo $row['student_email']; ?>"><?php echo $row['student_name']; ?></option>
                        <?php
                              }
                            }
                        ?>
                      </select>
                      <span id="validateto" class="text-danger"></span>
                    </div>
                    <div class="form-group">
                      <label for="subject">Subject</label>
                      <input type="text" class="form-control" id="subject" onclick="clearsubjectvalidation()" name="subject" placeholder="Subject">
                      <span id="validatesubject" class="text-danger"></span>
                    </div>
                    <div class="form-group">
                      <label for="message">Message</label>
                      <textarea name="message" id="message" class="form-control" onclick="clearmessagevalidation()" placeholder="Message"></textarea>
                      <span id="validatemessage" class="text-danger"></span>
                    </div>
                    <button type="submit" name="submit" class="btn btn-primary mr-2">Submit</button>
                  </form>
                  <?php
                    if(isset($_POST['submit']))
                    {
                        $from=mysqli_real_escape_string($con,$_POST['from']);
                        $to=mysqli_real_escape_string($con,$_POST['to']);
                        $subject=mysqli_real_escape_string($con,$_POST['subject']);
                        $message=mysqli_real_escape_string($con,$_POST['message']);

                        $sql="INSERT INTO notification (notification_from,notification_to,notification_subject,notification_message)
                        VALUES ('$from','$to','$subject','$message')";

                        $insert=mysqli_query($con,$sql);

                        if($insert)
                        {
                            ?>
                                <script>
                                    Swal.fire(
                                    {
                                        icon: 'success',
                                        title: 'Success!',
                                        text: 'Notification Sent'
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
                                        window.location='notify-student.php';
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
                      
  <script src="./js/validations/notify-student.js"></script>
</body>

</html>


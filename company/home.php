
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
                  <h3 class="font-weight-bold">Welcome <?php echo $_SESSION['company_name']; ?></h3>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12 row grid-margin transparent">
                <div class="col-md-3 mb-4 stretch-card transparent">
                  <div class="card card-tale">
                    <div class="card-body">
                      <p class="mb-4">Total Vacancy</p>
                      <p class="fs-30 mb-2">
                        <?php
                            $company_id=$_SESSION['company_id'];
                            echo mysqli_num_rows(mysqli_query($con,"SELECT * from vacancy where company_id=$company_id"));
                        ?>
                      </p>
                    </div>
                  </div>
                </div>
                <div class="col-md-3 mb-4 stretch-card transparent">
                  <div class="card card-dark-blue">
                    <div class="card-body">
                      <p class="mb-4">Total Applications</p>
                      <p class="fs-30 mb-2">
                        <?php
                            echo mysqli_num_rows(mysqli_query($con,"SELECT * from apply_post"));
                        ?>
                      </p>
                    </div>
                  </div>
                </div>
                <div class="col-md-3 mb-4 stretch-card transparent">
                  <div class="card card-light-blue">
                    <div class="card-body">
                      <p class="mb-4">Number of Companies</p>
                      <p class="fs-30 mb-2">
                        <?php
                            echo mysqli_num_rows(mysqli_query($con,"SELECT * from company"));
                        ?>
                      </p>
                    </div>
                  </div>
                </div>
                <div class="col-md-3 mb-4 stretch-card transparent">
                  <div class="card card-light-danger">
                    <div class="card-body">
                      <p class="mb-4">Number of Students</p>
                      <p class="fs-30 mb-2">
                        <?php
                            echo mysqli_num_rows(mysqli_query($con,"SELECT * from student"));
                        ?>
                      </p>
                    </div>
                  </div>
                </div>
            </div>
          </div>
          <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Recent Applications</h4>
                    <div class="table-responsive pt-3">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th></th>
                            <th>Company Name</th>
                            <th>Student Name</th>
                            <th>Post</th>
                            <th>Message</th>
                            <th>Category</th>
                            <th>Resume</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php  
                            $query=mysqli_query($con,"SELECT company.*,student.*,category.*,apply_post.*,
                            vacancy.* from company,student,category,apply_post,vacancy where
                            company.company_id=apply_post.company_id and apply_post.student_id=student.student_id
                            and category.category_id=vacancy.category_id and 
                            apply_post.vacancy_id=vacancy.vacancy_id and company.company_id=$company_id") or die(mysqli_error($con));
                            if(mysqli_num_rows($query)){
                                $i=1;
                                while($row=mysqli_fetch_array($query)){
                        ?>
                        <tr>
                            <td><?php echo $i; ?></td>
                            <td><?php echo $row['company_name']; ?></td>
                            <td><?php echo $row['student_name']; ?></td>
                            <td><?php echo $row['post']; ?></td>
                            <td><?php echo $row['message']; ?></td>
                            <td><?php echo $row['category_name']; ?></td>
                            <td><a href="<?php echo $row['resume_location']; ?>" class="btn btn-primary" target="_blank">View</a></td>
                        </tr>
                        <?php
                                $i++;
                                }
                            }
                        ?>
                        </tbody>
                    </table>
                    </div>
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
</body>

</html>


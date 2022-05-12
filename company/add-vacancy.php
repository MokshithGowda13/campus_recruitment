
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
                  <h4 class="card-title">Add Vacancy</h4>
                  <form class="forms-sample" method="POST" onsubmit="return validateForm()">
                    <div class="form-group">
                      <label for="name">Category</label>
                      <select name="category" id="category" class="form-control" onclick="clearcategoryvalidation()">
                        <option value="Null">Please Select Category</option>
                        <?php  
                            $query=mysqli_query($con,"SELECT * from category") or die(mysqli_error($con));
                            if(mysqli_num_rows($query)){
                                while($row=mysqli_fetch_array($query)){
                        ?>
                        <option value="<?php echo $row['category_id']; ?>"><?php echo $row['category_name']; ?></option>
                        <?php
                                }
                            }
                        ?>
                      </select>
                      <span id="validatecategory" class="text-danger"></span>
                    </div>
                    <div class="form-group">
                      <label for="post">Post</label>
                      <input type="text" class="form-control" id="post" onclick="clearpostvalidation()" name="post" placeholder="Post">
                      <span id="validatepost" class="text-danger"></span>
                    </div>
                    <div class="form-group">
                      <label for="description">Description</label>
                      <textarea name="description" id="description" class="form-control" onclick="cleardescriptionvalidation()" placeholder="Description"></textarea>
                      <span id="validatedescription" class="text-danger"></span>
                    </div>
                    <div class="form-group">
                      <label for="location">Location</label>
                      <input type="text" class="form-control" id="location" onclick="clearlocationvalidation()" name="location" placeholder="Location">
                      <span id="validatelocation" class="text-danger"></span>
                    </div>
                    <div class="form-group">
                      <label for="salary">Salary</label>
                      <input type="text" class="form-control" id="salary" onclick="clearsalaryvalidation()" name="salary" placeholder="Salary">
                      <span id="validatesalary" class="text-danger"></span>
                    </div>
                    <div class="form-group">
                      <label for="lastdate">Last Date</label>
                      <input type="date" class="form-control" id="lastdate" onclick="clearlastdatevalidation()" name="lastdate" placeholder="Last Date">
                      <span id="validatelastdate" class="text-danger"></span>
                    </div>
                    <button type="submit" name="submit" class="btn btn-primary mr-2">Submit</button>
                  </form>
                  <?php
                    if(isset($_POST['submit']))
                    {
                        $company_id=$_SESSION['company_id'];
                        $category=mysqli_real_escape_string($con,$_POST['category']);
                        $post=mysqli_real_escape_string($con,$_POST['post']);
                        $description=mysqli_real_escape_string($con,$_POST['description']);
                        $location=mysqli_real_escape_string($con,$_POST['location']);
                        $salary=mysqli_real_escape_string($con,$_POST['salary']);
                        $lastdate=mysqli_real_escape_string($con,$_POST['lastdate']);

                        $sql="INSERT INTO vacancy (company_id,category_id,post,description,
                        location,salary,last_date)
                        VALUES ('$company_id','$category','$post','$description','$location','$salary','$lastdate')";

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
                                        window.location='view-vacancies.php';
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
                                        window.location='add-vacancy.php';
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
                      
  <script src="./js/validations/add-vacancy.js"></script>
</body>

</html>



<?php
session_start();
if(!isset($_SESSION['student_id']))
{
    header('Location:index.php');
}
include './includes/connection.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Campus Recruitment System</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Inter:wght@700;800&display=swap" rel="stylesheet">
    
    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">

    <!-- sweetalert -->
    <script src="./js/sweetalert/jquery-3.4.1.min.js"></script>
    <script src="./js/sweetalert/sweetalert2.all.min.js"></script>
</head>

<body>
    <div class="container-xxl bg-white p-0">
        <!-- Spinner Start -->
        <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->


        <!-- Navbar Start -->
        <?php include("./includes/navbar.php"); ?>
        <!-- Navbar End -->


        <!-- Header End -->
        <div class="container-xxl py-5 bg-dark page-header mb-5">
            <div class="container my-5 pt-5 pb-4">
                <h1 class="display-3 text-white mb-3 animated slideInDown">Job Detail</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb text-uppercase">
                        <li class="breadcrumb-item"><a href="./home.php">Home</a></li>
                        <li class="breadcrumb-item text-white active" aria-current="page">Job Detail</li>
                    </ol>
                </nav>
            </div>
        </div>
        <!-- Header End -->


        <!-- Job Detail Start -->
        <div class="container-xxl py-5 wow fadeInUp" data-wow-delay="0.1s">
            <div class="container">
                <?php  
                    if(isset($_GET['vacancy_id']))
                    {
                        $vacancy_id=$_GET['vacancy_id'];
                        $query=mysqli_query($con,"SELECT vacancy.*,category.*,company.* from
                        vacancy,company,category where vacancy.category_id=category.category_id and
                        vacancy.company_id=company.company_id and
                        vacancy.vacancy_id=$vacancy_id") or die(mysqli_error($con));
                        if(mysqli_num_rows($query)){
                            while($row=mysqli_fetch_array($query)){
                ?>
                <div class="row gy-5 gx-4">
                    <div class="col-lg-8">
                        <div class="d-flex align-items-center mb-5">
                            <img class="flex-shrink-0 img-fluid border rounded" src="img/com-logo-2.jpg" alt="" style="width: 80px; height: 80px;">
                            <div class="text-start ps-4">
                                <h3 class="mb-3"><?php echo $row['post'];?></h3>
                                <span class="text-truncate me-3"><i class="fa fa-map-marker-alt text-primary me-2"></i><?php echo $row['location']; ?></span>
                                <span class="text-truncate me-3"><i class="far fa-clock text-primary me-2"></i>Full Time</span>
                                <span class="text-truncate me-0"><i class="far fa-money-bill-alt text-primary me-2"></i><?php echo $row['salary']; ?></span>
                            </div>
                        </div>

                        <div class="mb-5">
                            <h4 class="mb-3">Job description</h4>
                            <p><?php echo $row['description']; ?></p>
                        </div>
        
                        <div class="">
                            <h4 class="mb-4">Apply For The Job</h4>
                            <form method="POST" onsubmit="return validateForm()" enctype="multipart/form-data">
                                <?php  
                                    $ID=$_SESSION['student_id'];
                                    $query=mysqli_query($con,"SELECT * from student where student_id=$ID") or die(mysqli_error($con));
                                    if(mysqli_num_rows($query)){
                                        while($studentrow=mysqli_fetch_array($query)){
                                ?>
                                <div class="row g-3">
                                    <div class="col-12 col-sm-6">
                                        <input type="text" class="form-control" id="name" onclick="clearnamevalidation()" name="name" value="<?php echo $studentrow['student_name']; ?>" placeholder="Your Name">
                                        <span id="validatename" class="text-danger"></span>
                                    </div>
                                    <div class="col-12 col-sm-6">
                                        <input type="email" class="form-control" id="email" onclick="clearemailvalidation()" name="email" value="<?php echo $studentrow['student_email']; ?>" placeholder="Your Email">
                                        <span id="validateemail" class="text-danger"></span>
                                    </div>
                                    <div class="col-12">
                                        <textarea class="form-control" name="message" id="message" onclick="clearmessagevalidation()" rows="5" placeholder="Message"></textarea>
                                        <span id="validatemessage" class="text-danger"></span>
                                    </div>
                                    <div class="col-12">
                                        <input type="file" class="form-control" id="resume" onclick="clearresumevalidation()" name="resume">
                                        <span id="validateresume" class="text-danger"></span>
                                    </div>
                                    <div class="col-12">
                                        <button class="btn btn-primary w-100" name="submit" type="submit">Apply Now</button>
                                    </div>
                                </div>
                                <?php
                                        }
                                    }
                                ?>
                            </form>
                            <?php
                                if(isset($_POST['submit']))
                                {
                                    function generateRandomString($length = 10) {
                                        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
                                        $charactersLength = strlen($characters);
                                        $randomString = '';
                                        for ($i = 0; $i < $length; $i++) {
                                            $randomString .= $characters[rand(0, $charactersLength - 1)];
                                        }
                                        return $randomString;
                                    }

                                    $target_dir = "../resumes/";
                                    $target_file = $target_dir . generateRandomString() . basename($_FILES["resume"]["name"]);
                                    
                                    $companyid=$row['company_id'];
                                    $vacancy_id=$row['vacancy_id'];
                                    $name=mysqli_real_escape_string($con,$_POST['name']);
                                    $email=mysqli_real_escape_string($con,$_POST['email']);
                                    $message=mysqli_real_escape_string($con,$_POST['message']);

                                    //$isuploaded=move_uploaded_file($_FILES["resume"]["tmp_name"], $target_file);
                                    if((move_uploaded_file($_FILES["resume"]["tmp_name"], $target_file)))
                                    {
                                        
                                        $sql="INSERT INTO apply_post (company_id,student_id,message,resume_location,vacancy_id)
                                        VALUES ('$companyid','$ID','$message','$target_file','$vacancy_id')";
                                        
                                        $insert=mysqli_query($con,$sql);
                                        
                                        if(($insert))
                                        {
                                            ?>
                                                <script>
                                                    Swal.fire(
                                                    {
                                                        icon: 'success',
                                                        title: 'Success!',
                                                        text: 'Successful'
                                                    }).then((result) => {
                                                        window.location='vacancylist.php';
                                                    });
                                                </script>
                                            <?php 
                                        }
                                        else
                                        {
                                            echo $sql;
                                            ?>
                                                <!-- <script>
                                                    Swal.fire(
                                                    {
                                                        icon: 'warning',
                                                        title: 'Oops!',
                                                        text: 'Something went wrong!!'
                                                    }).then((result) => {
                                                        window.location='vacancylist.php';
                                                    });
                                                </script> -->
                                            <?php  
                                        }
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
                                                    window.location='vacancylist.php';
                                                });
                                            </script>
                                        <?php  
                                    }
                                    
                                }
                            ?>
                        </div>
                    </div>
        
                    <div class="col-lg-4">
                        <div class="bg-light rounded p-5 mb-4 wow slideInUp" data-wow-delay="0.1s">
                            <h4 class="mb-4">Job Summery</h4>
                            <p><i class="fa fa-angle-right text-primary me-2"></i>Published On: <?php echo $row['datetime']; ?></p>
                            <p><i class="fa fa-angle-right text-primary me-2"></i>Vacancy: <?php echo $row['vacancy']; ?> Position</p>
                            <p><i class="fa fa-angle-right text-primary me-2"></i>Job Nature: Full Time</p>
                            <p><i class="fa fa-angle-right text-primary me-2"></i>Salary: <?php echo $row['salary']; ?></p>
                            <p><i class="fa fa-angle-right text-primary me-2"></i>Location: <?php echo $row['location']; ?></p>
                            <p class="m-0"><i class="fa fa-angle-right text-primary me-2"></i>Date Line: <?php echo $row['last_date']; ?></p>
                        </div>
                        <div class="bg-light rounded p-5 wow slideInUp" data-wow-delay="0.1s">
                            <h4 class="mb-4">Company Detail</h4>
                            <p><i class="fa fa-angle-right text-primary me-2"></i>Name: <?php echo $row['company_name']; ?></p>
                            <p><i class="fa fa-angle-right text-primary me-2"></i>Address: <?php echo $row['company_address']; ?></p>
                            <p><i class="fa fa-angle-right text-primary me-2"></i>Conatct Number: <?php echo $row['company_contact_no']; ?></p>
                            <p><i class="fa fa-angle-right text-primary me-2"></i>Email: <?php echo $row['company_email']; ?></p>
                        </div>
                    </div>
                </div>
                <?php
                        }
                    }
                }
                else
                {
                ?>
                    <div class="container-xxl py-5 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="container text-center">
                            <div class="row justify-content-center">
                                <div class="col-lg-6">
                                    <i class="bi bi-exclamation-triangle display-1 text-primary"></i>
                                    <h1 class="display-1">404</h1>
                                    <h1 class="mb-4">Page Not Found</h1>
                                    <p class="mb-4">We’re sorry, the page you have looked for does not exist in our website! Maybe go to our home page or try to use a search?</p>
                                    <a class="btn btn-primary py-3 px-5" href="./vacancylist.php">Go Back To Home</a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php
                }
                ?>
            </div>
        </div>
        <!-- Job Detail End -->


        <!-- Footer Start -->
        <?php include("./includes/footer.php"); ?>
        <!-- Footer End -->


        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/wow/wow.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
    <script src="js/validations/vacancydetails.js"></script>
</body>

</html>
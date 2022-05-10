
<?php
session_start();
if(!isset($_SESSION['student_email']))
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
                <h1 class="display-3 text-white mb-3 animated slideInDown">Vacancy List</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb text-uppercase">
                        <li class="breadcrumb-item"><a href="./home.php">Home</a></li>
                        <li class="breadcrumb-item text-white active" aria-current="page">Vacancy List</li>
                    </ol>
                </nav>
            </div>
        </div>
        <!-- Header End -->


        <!-- Jobs Start -->
        <div class="container-xxl py-5">
            <div class="container">
                <h1 class="text-center mb-5 wow fadeInUp" data-wow-delay="0.1s">Vacancy Listing</h1>
                <div class="tab-class text-center wow fadeInUp" data-wow-delay="0.3s">
                    <div class="tab-content">
                    <div id="tab-1" class="tab-pane fade show p-0 active">
                            <?php  
                                if(isset($_GET['post']) && isset($_GET['category']) && isset($_GET['location']))
                                {
                                    $post=$_GET['post'];
                                    $category=$_GET['category'];
                                    $location=$_GET['location'];
                                    $query=mysqli_query($con,"SELECT * from vacancy where category_id='$category'
                                    and location='$location' and post='$post'") or die(mysqli_error($con));
                                    if(mysqli_num_rows($query)){
                                        while($row=mysqli_fetch_array($query)){
                            ?>
                            <div class="job-item p-4 mb-4">
                                <div class="row g-4">
                                    <div class="col-sm-12 col-md-8 d-flex align-items-center">
                                        <img class="flex-shrink-0 img-fluid border rounded" src="img/com-logo-1.jpg" alt="" style="width: 80px; height: 80px;">
                                        <div class="text-start ps-4">
                                            <h5 class="mb-3"><?php echo $row['post']; ?></h5>
                                            <span class="text-truncate me-3"><i class="fa fa-map-marker-alt text-primary me-2"></i><?php echo $row['location']; ?></span>
                                            <span class="text-truncate me-3"><i class="far fa-clock text-primary me-2"></i>Full Time</span>
                                            <span class="text-truncate me-0"><i class="far fa-money-bill-alt text-primary me-2"></i><?php echo $row['salary']; ?></span>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-4 d-flex flex-column align-items-start align-items-md-end justify-content-center">
                                        <div class="d-flex mb-3">
                                            <?php  
                                                $vacancy_id=$row['vacancy_id'];
                                                $ID=$_SESSION['student_id'];
                                                $count=mysqli_num_rows(mysqli_query($con,"SELECT * from apply_post where 
                                                vacancy_id=$vacancy_id and student_id=$ID"));
                                                if($count==0){
                                            ?>
                                            <a class="btn btn-primary" href="./vacancydetails.php?vacancy_id=<?php echo $row['vacancy_id'];?>">Apply Now</a>
                                            <?php
                                                }
                                                else
                                                {
                                            ?>
                                            <a class="btn btn-success">Applied</a>
                                            <?php
                                                }
                                            ?>
                                        </div>
                                        <small class="text-truncate"><i class="far fa-calendar-alt text-primary me-2"></i>Date Line: <?php echo $row['last_date']; ?></small>
                                    </div>
                                </div>
                            </div>
                            <?php
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
                                                    <a class="btn btn-primary py-3 px-5" href="./home.php">Go Back To Home</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php
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
                                                <a class="btn btn-primary py-3 px-5" href="./home.php">Go Back To Home</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Jobs End -->


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
</body>

</html>
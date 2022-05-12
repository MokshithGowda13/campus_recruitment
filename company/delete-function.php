<?php include './includes/connection.php'; ?>

<!DOCTYPE html>
<html>
    <head>
        <title>Campus Recruitment System</title>

        <!-- sweetalert -->
        <script src="./js/sweetalert/jquery-3.4.1.min.js"></script>
        <script src="./js/sweetalert/sweetalert2.all.min.js"></script>
    </head>
    <body>
        <?php 
        if(isset($_GET['vacancy_id']))
        {
            $sql="DELETE from vacancy WHERE vacancy_id=$_GET[vacancy_id]";
            $delete=mysqli_query($con,$sql);
            if($delete)
            {
                ?>
                    <script>
                        Swal.fire(
                        {
                            icon: 'success',
                            title: 'Success!',
                            text: 'Delete Successful!!'
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
                            icon: 'error',
                            title: 'Oops',
                            text: 'Something Went wrong!!'
                        }).then((result) => {
                            window.location='view-vacancies.php';
                        });
                    </script>

                <?php
            }
        }
        ?>

    </body>
</html>
<?php  
session_start();
unset($_SESSION['student_email']);
?>

<!DOCTYPE html>
<html>
<head>
	<title>Campus Recruitment System</title>
    <script src="../js/sweetalert/jquery-3.4.1.min.js"></script>
    <script src="../js/sweetalert/sweetalert2.all.min.js"></script>
</head>
    <body>
        <script>
            Swal.fire(
            {
                icon: 'success',
                title: 'Success',
                text: 'You successfully Logged out'
            }).then((result) => {
                window.location='../index.php';
            });
        </script>

    </body>
</html>
<?php
?>
<?php 
include("./connect.php");

$username = $_POST['username'];
$mobile = $_POST['mobile'];
$password = $_POST['password'];
$confpass = $_POST['confpass'];
$image = $_FILES['photo']['name'];
$tmp_name = $_FILES['photo']['tmp_name'];
$std = $_POST['std'];

if ($password != $confpass) {
    echo "<script>
    alert('Passwords don't match');
    window.location='../partials/registration.php';
    </script>";
} else {
    move_uploaded_file($tmp_name,"../uploads/$image");

    $sql = "Insert into `user_data` (user_name, mobile, password, photo, standard, status, votes) 
    values('$username','$mobile' ,'$password' ,'$image' ,'$std' ,0 ,0)";

    $result = mysqli_query($con, $sql);

    if ($result) {
        echo "<script>
        alert('Registration Successfull');
        window.location='../index.php';
        </script>";
    }
}



?>

<?php 

session_start();

include('./connect.php');
//   if (isset($_POST['user_login'])) {
//     // echo $_POST['user_login'];
    $username = $_POST['username'];
    $mobile = $_POST['mobile'];
    $password = $_POST['password'];
    $std = $_POST['std'];

    $select_query = "Select * from `user_data` where user_name = '$username' 
                    and mobile = '$mobile' and password = '$password' and standard = '$std'";
    $result = mysqli_query($con, $select_query);
    $row_count = mysqli_num_rows($result);


    if ($row_count>0) {
        $select_query = "Select user_name,photo,votes,id from `user_data` where standard='group'";
        $result_group = mysqli_query($con,$select_query);
        $row_count_group = mysqli_num_rows($result_group);

        if ($row_count_group>0) {
            $groups = mysqli_fetch_all($result_group,MYSQLI_ASSOC);
            $_SESSION['groups'] = $groups;
        } 

        $data = mysqli_fetch_array($result);
        $_SESSION['id'] = $data['id'];
        $_SESSION['status'] = $data['status'];
        $_SESSION['data'] = $data;

        echo "<script>
                window.open('../partials/dashboard.php','_self')
              </script>";

        
    } else {
        echo "<script>alert('Invalid Credentials')</script>";
        echo "<script>window.open('../index.php','_self')</script>";
//     }
    
  }
?> 
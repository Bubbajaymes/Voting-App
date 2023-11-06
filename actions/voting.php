<?php 
session_start();
include('./connect.php');

$votes = $_POST['group-votes'];
$totalVotes = $votes+1;

$gid = $_POST['group-id'];
$uid = $_SESSION['id'];

$updateVotes = mysqli_query($con, "update `user_data` set votes = '$totalVotes' where id = '$gid'");

$updateStatus = mysqli_query($con, "update `user_data` set status = 1 where id = '$uid'");

if ($updateVotes and $updateStatus) {
    
    $getGroups = mysqli_query($con, "Select user_name, photo, votes, id from `user_data` where standard = 'group' ");
    $groups = mysqli_fetch_all($getGroups, MYSQLI_ASSOC);

    $_SESSION['groups']=$groups;
    $_SESSION['status']=1;
    echo 
    "<script>
        alert('Voting successful');
        window.location='../partials/dashboard.php'
    </script>";


} else {
    echo 
    "<script>
        alert('Technical error! Vote after sometime');
        window.location='../partials/dashboard.php';
    </script>";
}


?>
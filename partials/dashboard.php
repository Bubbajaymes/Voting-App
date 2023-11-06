<?php
session_start();

if (!isset($_SESSION['id'])) {
    header('location:../');
}

$data=$_SESSION['data'];
 
if ($_SESSION['status'] == 1) {
    $status  = "<b class='text-success'> Voted</b>";
} else {
    $status  = "<b class='text-danger'> Not Voted</b>";
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Voting System - Dashboard</title>

        <!-- bootstrap CSS link -->
        <link 
       href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" 
       rel="stylesheet" 
       integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" 
       crossorigin="anonymous"
        >
        <link rel="stylesheet" href="../style.css">
</head>
<body class="bg-secondary">
    <div class="container my-5 text-light">
       <a href="../"><button class="btn btn-dark  px-3">Back</button></a> 
       <a href="../actions/logout.php"><button class="btn btn-dark text-light px-3">Logout</button></a>
        <h1 class=" text-center my-3">Voting System</h1>
        <div class="row my-5">
            <div class="col-md-7">
                <!-- groups -->
                <?php 
                    if (isset($_SESSION['groups'])) {
                        $groups = $_SESSION['groups'];
                        for ($i=0; $i < count($groups); $i++) { 
                            ?>
                    <div class="row">
                        <div class="col-md-4">
                            <img src="../uploads/<?php echo $groups[$i]['photo']; ?>" alt="Group Image">
                        </div>
                        <div class="col-md-8">
                            <strong class="h5">Group Name: </strong><?php echo $groups[$i]['user_name']; ?><br><br>
                            <strong class="h5">Votes: </strong><?php echo $groups[$i]['votes']; ?><br><br>
                        </div>
                    </div>
                    
                     
                     
                     <form action="../actions/voting.php" method="post">
                        <input type="hidden" name="group-votes" value="<?php echo $groups[$i]['votes'] ?>">
                        <input type="hidden" name="group-id" value="<?php echo $groups[$i]['id'] ?>">

                        <?php 
                           if ($_SESSION['status']==1) {
                            ?>
                            <button class="bg-success my-3 px-3 text-white">Voted</button>
                            <?php
                           } else {
                            ?>
                            <button class="bg-danger my-3 px-3 text-white" type="submit">Vote</button>
                            <?php
                           }
                           
                        
                        ?>
                     </form>
                     <hr>
                <?php
                        }
                    } else {
                        ?>
                        <div class="container">
                            <p>No groups to display.</p>
                        </div>
                       <?php 
                    }
                ?>

            </div>
            <div class="col-md-5">
                <!-- user profiles -->
                <img src="../uploads/<?php echo $data['photo']; ?>" alt="User Image">
                <br>
                <br>
                <strong class="h5">Name: </strong><?php echo $data['user_name']; ?><br><br>
                <strong class="h5">Mobile: </strong><?php echo $data['mobile']; ?><br><br>
                <strong class="h5">Status: </strong><?php echo $status; ?><br><br>
            </div>
        </div>
    </div>
    
     
    
</body>
</html>
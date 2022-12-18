<?php
include("lock.php");
if(isset($login_session)) {
    $username = $_SESSION['username'];
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Courses</title>
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="./css/sidebar.css">
    <link rel="stylesheet" href="./css/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.2/jquery.min.js"></script>
</head>
<body>
<div class="main-container d-flex">
    <?php include('sidebar.php') ?>
    <div class="content bg-light banner-image">
        <?php include('header.php') ?>
        <?php
        if($count_courses_noti !=0) {?>
            <div class="container-fluid mt-2 px-4">
                <div class='row px-3'>

                <?php
                while($row = mysqli_fetch_array($result_noti)) {
                    echo "
                          <a class='text-decoration-none text-dark pt-2' href='readNotification.php?course_id={$row['course_id']}' id='notication_count'>
                              <div class='card rounded-3'>
                                 <div class='card-body'>
                                     <h5 class='card-title mb-2'>You have added {$row['course_name']} course successfully!</h5>
                                     <p class='card-text'>Please click here to view your courses!</p>
                                 </div>
                              </div>
                          </a>
                        ";
                }
                ?>
                </div>
                <?php
                } else {?>
                <div class="container-fluid mt-2 px-4">
                    <div class='row px-3'>
                <?php
                    while($row = mysqli_fetch_array($result_courses)){
                        echo "<a class='text-decoration-none text-muted text-dark pt-2' href='courses.php?course_id={$row['course_id']}' id='notication_count'>
                              <div class='card rounded-3'>
                                 <div class='card-body'>
                                     <h5 class='card-title text-muted mb-2'>You have added {$row['course_name']} course successfully!</h5>
                                     <p class='card-text text-muted'>Please click here to view your courses!</p>
                                 </div>
                              </div>
                          </a>";
                    }
                }
                ?>
             </div>

    </div>
</div>
</body>
</html>







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
</head>
<body>
<div class="main-container d-flex">
    <?php include('sidebar.php') ?>
    <div class="content bg-light banner-image">
        <?php include('header.php') ?>
        <div class="row w-100 px-5">
        <?php
        if($count_courses !=0) {
        while($row = mysqli_fetch_array($result_courses)) {
        printf("
                                    <div class=\"col-md-4 col-sm-6\">
                                        <a class='text-decoration-none text-dark' href=''>
                                            <div class=\"card border-0 shadow mb-3 mt-5\" id='course'>
                                                <img height='200' src='{$row['course_img']}' alt=\"\" class=\"card-img-top object-fit-cover\">
                                                <div class=\"card-body\">
                                                    <h6 class=\"text mb-2\">{$row['course_name']}</h6>
                                                    <h5 class=\"card-title my-3\">{$row['description']}</h5>
                                                    <div class=\"d-flex justify-content-between pt-2\">
                                                        <p class=\"card-text\"><i class=\"fas fa-layer-group theme-color\"></i> {$row['lessonNo']} Lessons</p>
                                                        <p class=\"card-text\"><i class=\"fas fa-stopwatch theme-color\"></i> {$row['duration']}</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                      </div>
                                    ");
                                    }
                                    } else {
                                        printf("
                                                <div class='d-flex justify-content-center align-items-center' id='start-menu'>
                                                    <div class='d-wrap'>
                                                        <h2 class='text-dark'>There are no course yet.</h2>
                                                        <h2 class='text-dark '>Please add a course first.</h2>
                                                        <div class=\"container-fluid d-flex justify-content-center pt-3 px-5\">
                                                            <a class=\"btn btn-success\" href=\"addcourse.php\">Add New Course</a>
                                                        </div>
                                                    </div>
                                                </div>");
                                    }
                                    ?>
        </div>
    </div>
</div>


</body>
</html>

<?php die() ?>


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
    <title>Dashboard</title>
    <link rel="stylesheet" href="css/courses.css">
    <link rel="stylesheet" href="./css/sidebar.css">
    <link rel="stylesheet" href="./css/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <div class="main-container d-flex">
        <?php include('sidebar.php') ?>
        <div class="content bg-light banner-image">
            <?php include('header.php') ?>
            <div class="container-fluid d-flex justify-content-end pt-3 px-5">
                <a class="btn btn-success" href="addcourse.php">Add New Course</a>
            </div>
            <div class="container-fluid d-flex justify-content-center mt-3">
                <table class="table text-center mx-5">
                    <thead class=\"thead-dark\">
                    <tr>
                        <th scope=\"col\">ID</th>
                        <th scope=\"col\">Course Name</th>
                        <th scope=\"col\">Student No.</th>
                        <th scope=\"col\">Lesson No.</th>
                        <th scope=\"col\">Start Date</th>
                        <th scope=\"col\">End Date</th>
                        <th scope=\"col\">Duration</th>
                        <th scope='col' colspan='2'></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $id=1;
                    if($count_courses !=0) {
                        while ($row = mysqli_fetch_array($result_courses)) {

                            echo "<tr>";
                            echo "<th class='px-0' scope=\"row\">$id</th>";
                            echo "<td class='px-0'>{$row['course_name']}</td>";
                            echo "<td class='px-0'>{$row['no_of_student']}</td>";
                            echo "<td class='px-0'>{$row['lessonNo']}</td>";
                            echo "<td class='px-0'>{$row['start_date']}</td>";
                            echo "<td class='px-0'>{$row['end_date']}</td>";
                            echo "<td class='px-0'>{$row['duration']}</td>";
                            echo "<td class='px-0'><a class='btn btn-success' href='editcourse.php?id={$row['course_id']}'>Edit</a></td>";
                            echo "<td class='px-0'><a class='btn btn-danger' href='deleteCourse.php?id={$row['course_id']}'>Delete</a></td>";
                            $id++;
                        }
                    }
                    ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>


</body>
</html>
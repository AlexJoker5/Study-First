<?php
session_start();
include('config.php');

if(isset($_GET['course_id'])){
    $course_id = $_GET['course_id'];
    $result_courses_noti = mysqli_query($conn,"UPDATE `courses` SET course_status=1 where course_id='$course_id';");
    header("Location: index.php?readnotification=success");
}else {
    header("Location: index.php?readnotification=fail");
}

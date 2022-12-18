<?php
session_start();
include('config.php');
$user_check=$_SESSION['username'];
$ses_sql=mysqli_query($conn,"SELECT * from `users` WHERE username='$user_check'");
$row=mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
$user_id = $row['user_id'];
$login_session=$row['username'];
$profile = $row['profile_pic'];

$result_courses = mysqli_query($conn, "SELECT * from `courses` where teacher_id='$user_id'");
$count_courses = mysqli_num_rows($result_courses);

$result_noti = mysqli_query($conn, "SELECT * from `courses` where course_status=0 ORDER BY course_id DESC");
$count_courses_noti = mysqli_num_rows($result_noti);

$result_noti_read = mysqli_query($conn, "SELECT * from `courses` where course_status=1 ORDER BY course_id DESC");
$count_courses_noti_read = mysqli_num_rows($result_noti_read);


if(!isset($login_session)){
    header("Location: login.php");
    exit();
}
?>


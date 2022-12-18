<?php
session_start();
include('config.php');

$course_id = $_GET['id'];
$delete_result_courses = mysqli_query($conn, "DELETE FROM `courses` WHERE `courses`.`course_id` = $course_id");
header("Location: courses.php?deletecourse=success");
?>
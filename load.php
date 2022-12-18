<?php
session_start();
include('config.php');

// get user_id from user table;
$user_check=$_SESSION['username'];
$ses_sql=mysqli_query($conn,"SELECT user_id from `users` WHERE username='$user_check'");
$row=mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
$user_id = $row['user_id'];

// get data from courses
$result_courses = mysqli_query($conn, "SELECT * from `courses` where teacher_id='$user_id'");
$row_count_courses = mysqli_num_rows($result_courses);



if($row_count_courses !=0) {
    while($row = mysqli_fetch_array($result_courses)) {
        $teachday = date("N", strtotime($row['teach_day']));
        if($row['end_date'] >= $row['start_date']){
            $data [] = array(
                'groupId'        => $row["course_name"],
                'title' => $row['course_name'],
                'daysOfWeek' => [$teachday],
                'startRecur' => $row['start_date'],
                'endRecur' => $row['end_date'],
                'startTime' => '17:00:00',
                'endTime' => '20:00:00'
            );
        }
    }
}

echo json_encode($data);

?>

<?php
ob_start();
include("lock.php");
if (isset($login_session)) {
    $username = $_SESSION['username'];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
    <title>Add Course</title>
    <link rel="stylesheet" href="./css/addcourse.css"/>
    <link rel="stylesheet" href="./css/sidebar.css"/>
    <link rel="stylesheet" href="./css/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.13/cropper.min.css"/>
    <script src="css/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.13/cropper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.2/jquery.min.js"></script>
</head>
<body>
    <div class="main-container d-flex">
        <?php include('sidebar.php'); ?>
        <div class="content banner-image">
            <?php include('header.php'); ?>
            <div class="mx-3 my-3">
                <div class="container">
                    <div class="d-flex justify-content-start align-items-center">
                        <a class="edit-btn btn btn-primary" href="courses.php"><i class="fas fa-chevron-left"></i> Back</a>
                    </div>
                    <div class="row">
                        <div class="card mb-3 p-0 mt-4">
                            <div class="card-body ms-4">
                                <div class="mt-2">
                                <form action="addcourse.php" method="POST">
                                    <?php
                                    if ($_SERVER["REQUEST_METHOD"] == "POST") {
                                        $precourse_img = "assets/course/" . $_POST['course_img'];
                                        $mycname = mysqli_real_escape_string($conn, $_POST['cname']);
                                        $mystudentNo = mysqli_real_escape_string($conn, $_POST['studentNo']);
                                        $mylessonNo = mysqli_real_escape_string($conn, $_POST['lessonNo']);
                                        $myduration = mysqli_real_escape_string($conn, $_POST['duration']);
                                        $mycourse_img = mysqli_real_escape_string($conn, $precourse_img);
                                        $pretechday = date("l", strtotime($_POST['sdate']));
                                        $myteachday = mysqli_real_escape_string($conn, $pretechday);
                                        $mysdate = mysqli_real_escape_string($conn, date("Y-m-d", strtotime($_POST['sdate'])));
                                        $myedate = mysqli_real_escape_string($conn, date("Y-m-d", strtotime($_POST['edate'])));
                                        $mydescription = mysqli_real_escape_string($conn, $_POST['description']);
                                        $myteacher = mysqli_real_escape_string($conn, $user_id);
                                        $sql = "INSERT INTO courses (course_name, no_of_student, teach_day, duration, course_img, lessonNo, start_date, end_date, description, teacher_id, course_status)
                                        VALUES ('$mycname', '$mystudentNo', '$myteachday','$myduration','$mycourse_img', '$mylessonNo','$mysdate','$myedate','$mydescription','$myteacher',0);";
                                        $result = mysqli_query($conn, $sql);
                                        if (!$result) {
                                            printf("<div class=\"alert alert-danger alert-dismissible show\" role='alert'>Update is failed</div>");
                                        } else {
                                            header("Location: courses.php?addcourse=success");
                                            exit();
                                        }

                                    }
                                    ?>
                                    <div class="d-flex mt-2">
                                        <div class="col-sm-4 d-flex align-items-center">
                                            <label class="h3" for="cname">Course Name</label>
                                        </div>
                                        <div class="col-sm-1">
                                            <div class="h3">:</div>
                                        </div>
                                        <div class="col-sm-7">
                                            <div class="d-flex align-items-center">
                                                <input
                                                        class="w-100"
                                                        type="text"
                                                        name="cname"
                                                        placeholder="Enter course name"
                                                        id="cname"
                                                        required
                                                />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="d-flex mt-2">
                                        <div class="col-sm-4 d-flex align-items-center">
                                            <label class="h3" for="studentNo">No of Student</label>
                                        </div>
                                        <div class="col-sm-1">
                                            <div class="h3">:</div>
                                        </div>
                                        <div class="col-sm-7">
                                            <div class="d-flex align-items-center">
                                                <input
                                                        class="w-100"
                                                        type="number"
                                                        name="studentNo"
                                                        placeholder="Enter student number"
                                                        id="studentNo"
                                                        required
                                                />
                                            </div>
                                        </div>
                                    </div>

                                    <div class="d-flex mt-2">
                                        <div class="col-sm-4 d-flex align-items-center">
                                            <label class="h3" for="duration">Duration</label>
                                        </div>
                                        <div class="col-sm-1">
                                            <div class="h3">:</div>
                                        </div>
                                        <div class="col-sm-7">
                                            <div class="d-flex align-items-center">
                                                <input
                                                        class="w-100"
                                                        type="text"
                                                        name="duration"
                                                        placeholder="Enter duration of the course"
                                                        id="duration"
                                                        required
                                                />
                                            </div>
                                        </div>
                                    </div>

                                    <div class="d-flex mt-2">
                                        <div class="col-sm-4 d-flex align-items-center">
                                            <label class="h3" for="course_img">Course Image</label>
                                        </div>
                                        <div class="col-sm-1">
                                            <div class="h3">:</div>
                                        </div>
                                        <div class="col-sm-7">
                                            <div class="d-flex align-items-center">
                                                <input
                                                        class="w-100 pt-2"
                                                        type="file"
                                                        name="course_img"
                                                        id="course_img"
                                                        required
                                                />
                                            </div>
                                        </div>
                                    </div>

                                    <div class="d-flex mt-2">
                                        <div class="col-sm-4 d-flex align-items-center">
                                            <label class="h3" for="sdate">Start Date</label>
                                        </div>
                                        <div class="col-sm-1">
                                            <div class="h3">:</div>
                                        </div>
                                        <div class="col-sm-7">
                                            <div class="d-flex align-items-center">
                                                <input
                                                        class="w-100"
                                                        type="date"
                                                        name="sdate"
                                                        id="sdate"
                                                        required
                                                />
                                            </div>
                                        </div>
                                    </div>

                                    <div class="d-flex mt-2">
                                        <div class="col-sm-4 d-flex align-items-center">
                                            <label class="h3" for="edate">End Date</label>
                                        </div>
                                        <div class="col-sm-1">
                                            <div class="h3">:</div>
                                        </div>
                                        <div class="col-sm-7">
                                            <div class="d-flex align-items-center">
                                                <input
                                                        class="w-100"
                                                        type="date"
                                                        name="edate"
                                                        id="edate"
                                                        required
                                                />
                                            </div>
                                        </div>
                                    </div>

                                    <div class="d-flex mt-2">
                                        <div class="col-sm-4 d-flex align-items-center">
                                            <label class="h3" for="lessonNo">No of Lesson</label>
                                        </div>
                                        <div class="col-sm-1">
                                            <div class="h3">:</div>
                                        </div>
                                        <div class="col-sm-7">
                                            <div class="d-flex align-items-center">
                                                <input
                                                        class="w-100"
                                                        type="number"
                                                        name="lessonNo"
                                                        placeholder="Enter number of lesson"
                                                        id="lessonNo"
                                                        required
                                                />
                                            </div>
                                        </div>
                                    </div>

                                    <div class="d-flex mt-2">
                                        <div class="col-sm-4 d-flex align-items-center">
                                            <label class="h3" for="description">Description</label>
                                        </div>
                                        <div class="col-sm-1">
                                            <div class="h3">:</div>
                                        </div>
                                        <div class="col-sm-7">
                                            <div class="d-flex align-items-center">
                                                <input
                                                        class="w-100"
                                                        type="text"
                                                        name="description"
                                                        placeholder="Enter description"
                                                        id="description"
                                                        required
                                                />
                                            </div>
                                        </div>
                                    </div>

                                    <div class="d-flex justify-content-end pe-1 show mt-3">
                                        <button class="btn btn-success" type="submit">
                                            Add Course
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
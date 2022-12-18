<?php
session_start();
include("config.php");
?>

<!doctype html>
<html lang="en">
<head>
    <title>Login</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="css/bootstrap/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Lato:300,400,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/login.css">
</head>
<body class="img js-fullheight" style="background-image: url(assets/bg.jpg);">
<section class="ftco-section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 text-center mb-3">
                <h2 class="heading-section">Login</h2>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-4">
                <div class="login-wrap p-0">
                    <h3 class="mb-4 text-center">Have an account?</h3>
                    <?php
                    if($_SERVER["REQUEST_METHOD"] == "POST")
                    {
                        $username = $_POST['username'];
                        $password = $_POST['password'];
                        $myusername=mysqli_real_escape_string($conn,$username);
                        $mypassword=mysqli_real_escape_string($conn,$password);

                        $sql="SELECT `user_id` FROM `users` WHERE username='$myusername' and password='$mypassword'";
                        $result=mysqli_query($conn,$sql);
                        $count=mysqli_num_rows($result);
                    if($count==1 && $_SESSION['password']=$mypassword){
                        $_SESSION['username']=$myusername;
                        header("LOCATION:courses.php?login=success");
                        exit();
                    }
                    else if($count==0 || !$_SESSION['password']=$mypassword){
                        $errorMsg = "<div class=\"alert alert-danger alert-dismissible show\" role='alert'>Incorrect username or password!</div>";
                        echo $errorMsg;
                    }
                    }
                    ?>
                    <form action="login.php" method="post" class="signin-form">
                        <div class="form-group">
                            <input type="text" name="username" class="form-control" placeholder="Username" required>
                        </div>
                        <div class="form-group">
                            <input id="password-field" name="password" type="password" class="form-control" placeholder="Password" required>
                            <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                        </div>
                        <div class="form-group">
                            <button type="submit" name="submit" class="form-control btn btn-primary submit px-3">Log In</button>
                        </div>
                        <div class="d-flex justify-content-center align-items-center">
                            <p>Do not have an account yet?<a class="text-decoration-underline" href="register.php"> Sign Up</a></p>
                        </div>
                </div>
            </div>
        </div>
    </div>
</section>

</body>
</html>


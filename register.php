<?php
session_start();
include("config.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Design by foolishdeveloper.com -->
    <title>Sign Up</title>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="css/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet">
    <!--Stylesheet-->
    <link rel="stylesheet" href="css/register.css">
</head>
<body>
<div class="background">
    <div class="shape"></div>
    <div class="shape"></div>
</div>
<div class="d-flex justify-content-center align-items-center py-5" >
    <form action="register.php" method="POST" >
        <h3 class="pt-2">Sign Up Form</h3>
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            $username = mysqli_real_escape_string($conn,$_POST['username']);
            $email = mysqli_real_escape_string($conn,$_POST['email']);
            $password = mysqli_real_escape_string($conn,$_POST['password']);
            $re_password = mysqli_real_escape_string($conn,$_POST['re-password']);
            $fname = mysqli_real_escape_string($conn,$_POST['fname']);
            $lname = mysqli_real_escape_string($conn,$_POST['lname']);
            $phoneNo = mysqli_real_escape_string($conn,$_POST['phoneNo']);
            $position = mysqli_real_escape_string($conn,$_POST['position']);
            $country = mysqli_real_escape_string($conn,$_POST['country']);
            $birthday = mysqli_real_escape_string($conn,date("Y-m-d", strtotime($_POST['birthday'])));
            $address = mysqli_real_escape_string($conn,$_POST['address']);
            $profile = mysqli_real_escape_string($conn,"assets/profile/default.jpg");
            $cover = mysqli_real_escape_string($conn,"assets/cover/bg.png");

            if($password == $re_password){
                $sql = "INSERT INTO users (username, email, password, first_name, last_name, phone, birthday, position, location, address, profile_pic, cover_pic)
                VALUES ('$username', '$email', '$password','$fname','$lname', '$phoneNo','$birthday','$position','$country','$address','$profile','$cover');";
                $result = mysqli_query($conn, $sql);
                $sesSQl = "SELECT * from users;";
                $sesResult = mysqli_query($conn, $sesSQl);
                if($result) {
//                    while($row = mysqli_fetch_assoc($sesResult)) {
//                        echo $phoneNo."<br>";
//                        echo "firstname: " . $row["first_name"]. " - lastname: " . $row["last_name"]. " - email: " . $row["email"]. " - phone : " . $row["phone"] . "<br>";
//                    }
                    header("Location: profile.php?signup=success");
                    exit();
                } else {
                    echo "<div class=\"alert alert-danger alert-dismissible show\" role='alert'>Registration is failed</div>";
                }
            } else {
                echo "<div class=\"alert alert-danger alert-dismissible show\" role='alert'>Password must be the same.</div>";
            }




        }
        ?>
        <div class="row">
            <div class="col-md-6">
                <label for="username" class="mt-3 pt-2">Username</label>
                <input type="text" name="username" placeholder="Enter username" id="username" required>
            </div>
            <div class="col-md-6">
                <label for="email" class="mt-3 pt-2">Email</label>
                <input type="email" name="email" placeholder="Enter email address" id="email" required>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <label for="password" class="mt-3">Password</label>
                <input type="password" name="password" placeholder="Enter password" id="password" onkeyup='check();' required>
            </div>
            <div class="col-md-6">
                <label for="re-password" class="mt-3">Confirm Password</label>
                <input type="password" name="re-password" placeholder="Re-type password" id="re-password" onkeyup='check();' required>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <label for="fname" class="mt-3 pt-2">First Name</label>
                <input type="text" name="fname" placeholder="Enter first name" id="fname" required>
            </div>
            <div class="col-md-6">
                <label for="lname" class="mt-3 pt-2">Last Name</label>
                <input type="text" name="lname" placeholder="Enter last name" id="lname" required>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <label for="phoneNo" class="mt-3 pt-2">Phone Number</label>
                <input type="tel" name="phoneNo" placeholder="Enter phone number" id="phoneNo" required>
            </div>
            <div class="col-md-6">
                <label for="position" class="mt-3 pt-2">Position</label>
                <select name="position" id="position" required>
                    <option value="position" disabled selected>Choose option</option>
                    <option value="Department Head">Department Head</option>
                    <option value="Teacher">Teacher</option>
                    <option value="Assistance Teacher">Assistance Teacher</option>
                    <option value="Part-time Teacher">Part-time Teacher</option>
                </select>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <label for="countries" class="mt-3 pt-2">Location</label>
                <select name="country" id="countries" required>
                    <option value="country" disabled selected>Choose option</option>
                </select>
            </div>
            <div class="col-md-6">
                <label for="birthday" class="mt-3 pt-2">Birthday</label>
                <input type="date" name="birthday" id="birthday" required>
            </div>
        </div>
        <div class="row px-3">
            <label for="address" class="mt-3 pt-2">Address</label>
            <input class="w-100" type="text" name="address" placeholder="Enter your current address" id="address" required>
        </div>
        <button type="submit" name="submit" class="mt-4">Sign Up</button>
    </form>

</div>
</body>
</html>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const countryDropdown = document.querySelector('#countries');
        fetch('https://restcountries.com/v2/all').then(res => {
            return res.json();
        }).then(data => {
            let output= "";
            data.forEach(country => {
                output += `<option value="${country.name}">${country.name}</option>`;
            });
            countryDropdown.innerHTML = output;
        }).catch(err => {
            console.log(err);
        })
    })

    var check = function() {
        if (document.getElementById('password').value !=
            document.getElementById('re-password').value) {
            document.getElementById('re-password').style.border = '1px solid red';
        } else {
            document.getElementById('re-password').style.border = '0';
        }
    }
</script>

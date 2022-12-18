<?php
include("lock.php");
if(isset($login_session)){
    $user_id = $row['user_id'];
    $username = $_SESSION['username'];
    $password =$row['password'];
    $email = $row['email'];
    $phone = $row['phone'];
    $position = $row['position'];
    $location = $row['location'];
    $birthday = $row['birthday'];
    $address = $row['address'];
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $myusername = mysqli_real_escape_string($conn, $_POST['username']);
    $myemail = mysqli_real_escape_string($conn, $_POST['email']);
    $mypassword = mysqli_real_escape_string($conn, $_POST['password']);
    $myfname = mysqli_real_escape_string($conn, $_POST['fname']);
    $mylname = mysqli_real_escape_string($conn, $_POST['lname']);
    $myphoneNo = mysqli_real_escape_string($conn, $_POST['phone']);
    $myposition = mysqli_real_escape_string($conn, $_POST['position']);
    $mycountry = mysqli_real_escape_string($conn, $_POST['country']);
    $mybirthday = mysqli_real_escape_string($conn, date("Y-m-d", strtotime($_POST['birthday'])));
    $myaddress = mysqli_real_escape_string($conn, $_POST['address']);
    $sql = "UPDATE `users` SET username='$myusername', email='$myemail', password='$mypassword',
                                        first_name='$myfname', last_name='$mylname', phone='$myphoneNo', birthday='$mybirthday',position='$myposition', location='$mycountry', address = '$myaddress' WHERE `users`.`user_id` = '$user_id';";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        header("Location: profile.php?update=success");
        exit();
    } else {
        echo "<div class=\"alert alert-danger alert-dismissible show\" role='alert'>Update is failed</div>";
    }

}


?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Profile</title>
    <link rel="stylesheet" href="./css/profile.css">
    <link rel="stylesheet" href="./css/sidebar.css">
    <link rel="stylesheet" href="./css/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.13/cropper.min.css" />
    <script src="css/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.13/cropper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.2/jquery.min.js"></script>
</head>
<body>
    <div class="main-container d-flex">
        <?php include('sidebar.php') ?>
        <div class="content bg-light banner-image">
            <?php include('header.php') ?>
            <div class="mx-3 my-3">
                <div class="container">
                    <div class="row">
                        <div class="card mb-3 p-0">
                            <div class="w-100 h-22">
                                <div class="image_area1">
                                    <form method="post">
                                        <img class="card-img-top object-fit-cover" id="uploaded_image1" height="220px" width="1000px" src="./assets/cover/bg.jpg" alt="">
                                        <label class="w-100" for="upload_image1">
                                            <div class="d-flex justify-content-end">
                                                <div class="btn btn-dark p-0 border-0 overlay1">
                                                <div class="text1">Edit</div>
                                            </div>
                                            <input type="file" accept=".jpg, .jpeg, .png, .jfif" name="image1" class="image1" id="upload_image1" style="display:none" />
                                        </label>
                                    </form>
                                </div>
                            </div>


                            <div class="image_area">
                                <form method="post">
                                    <label for="upload_image">
                                        <img src=<?php if(!empty($profile)){ echo $profile; }
                                        else {echo "assets/profile/default.jpg";}
                                        ?> id="uploaded_image" class="img-responsive rounded-circle" />
                                        <div class="overlay">
                                            <div class="text">Change Profile Picture</div>
                                        </div>
                                        <input type="file" accept=".jpg, .jpeg, .png, .jfif" name="image" class="image" id="upload_image" style="display:none" />
                                    </label>
                                </form>
                            </div>
                            <div class="card-body ms-4">
                                <div class="d-flex justify-content-between mt-2">
                                    <div class="col-md-10">
                                        <h3><?php if(!empty($username)){ echo $firstname." ".$lastname; }?></h3>
                                        <p class="fs-4 text-muted"><?php if(!empty($username)){ echo $position; }?></p>
                                    </div>
                                    <div class="col-md-2 d-flex justify-content-center align-items-center">
                                        <a class="edit-btn btn btn-success" >Edit</a>
                                        <a class="close-edit-btn d-none btn btn-danger" >Cancel</a>
                                    </div>
                                </div>

                            </div>
                            <div class="card-body p-0 ps-3 ms-4">
                                <form action="profile.php" method="POST">

                                    <div class="d-flex mt-2" >
                                        <div class="col-sm-4">
                                            <label class="h3" for="fname">First Name</label>
                                        </div>
                                        <div class="col-sm-1">
                                            <div class="h3">:</div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="d-flex align-items-center">
                                                <h4 class="hide"id="fname"><?php if(!empty($username)){ echo $firstname; }?></h4>
                                                <input class="show d-none" value="<?php if(!empty($username)){ echo $firstname; }?>" type="text" name="fname" placeholder="Enter first name" id="fname" required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="d-flex mt-2" >
                                        <div class="col-sm-4">
                                            <label class="h3" for="lname">Last Name</label>
                                        </div>
                                        <div class="col-sm-1">
                                            <div class="h3">:</div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="d-flex align-items-center">
                                                <h4 class="hide"id="lname"><?php if(!empty($username)){ echo $lastname; }?></h4>
                                                <input class="show d-none" value="<?php if(!empty($username)){ echo $lastname; }?>" type="text" name="lname" placeholder="Enter last name" id="lname" required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="d-flex mt-2" >
                                        <div class="col-sm-4">
                                            <label class="h3" for="username">Username</label>
                                        </div>
                                        <div class="col-sm-1">
                                            <div class="h3">:</div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="d-flex align-items-center">
                                                <h4 class="hide"id="username"><?php if(!empty($username)){ echo $username; }?></h4>
                                                <input class="show d-none" value="<?php if(!empty($username)){ echo $username; }?>" type="text" name="username" placeholder="Enter username" id="username" required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="d-flex mt-2" >
                                        <div class="col-sm-4">
                                            <label class="h3" for="password">Password</label>
                                        </div>
                                        <div class="col-sm-1">
                                            <div class="h3">:</div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="d-flex align-items-center">
                                                <h4 class="hide"id="password"><?php if(!empty($username)){ echo $password; }?></h4>
                                                <input class="show d-none" value="<?php if(!empty($username)){ echo $password; }?>" type="password" name="password" placeholder="Enter password" id="password" required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="d-flex mt-2" >
                                        <div class="col-sm-4">
                                            <label class="h3" for="email">Email</label>
                                        </div>
                                        <div class="col-sm-1">
                                            <div class="h3">:</div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="d-flex align-items-center">
                                                <h4 class="hide"id="email"><?php if(!empty($username)){ echo $email; }?></h4>
                                                <input class="show d-none" value="<?php if(!empty($username)){ echo $email; }?>" type="email" name="email" placeholder="Enter email address" id="email" required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="d-flex mt-2" >
                                        <div class="col-sm-4">
                                            <label class="h3" for="phone">Phone Number</label>
                                        </div>
                                        <div class="col-sm-1">
                                            <div class="h3">:</div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="d-flex align-items-center">
                                                <h4 class="hide"id="email"><?php if(!empty($username)){ echo $phone; }?></h4>
                                                <input class="show d-none" value="<?php if(!empty($username)){ echo $phone; }?>" type="text" name="phone" placeholder="Enter phone number" id="phone" required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="d-flex mt-2" >
                                        <div class="col-sm-4">
                                            <label class="h3" for="position">Position</label>
                                        </div>
                                        <div class="col-sm-1">
                                            <div class="h3">:</div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="d-flex align-items-center">
                                                <h4 class="hide"id="position"><?php if(!empty($username)){ echo $position; }?></h4>
                                                <select class="show d-none"  name="position" id="position" value="<?php if(!empty($username)){ echo $position; }?>" required>
                                                    <option value="position" disabled>Choose option</option>
                                                    <option value="Department Head">Department Head</option>
                                                    <option value="Teacher">Teacher</option>
                                                    <option value="Assistance Teacher">Assistance Teacher</option>
                                                    <option value="Part-time Teacher">Part-time Teacher</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="d-flex mt-2" >
                                        <div class="col-sm-4">
                                            <label class="h3" for="countries">Location</label>
                                        </div>
                                        <div class="col-sm-1">
                                            <div class="h3">:</div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="d-flex align-items-center">
                                                <h4 class="hide"id="country"><?php if(!empty($username)){ echo $location; }?></h4>
                                                <select class="show d-none" name="country" id="countries" value="<?php if(!empty($username)){ echo $location; }?>" required>
                                                    <option value="country" disabled>Choose option</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="d-flex mt-2" >
                                        <div class="col-sm-4">
                                            <label class="h3" for="birthday">Birthday</label>
                                        </div>
                                        <div class="col-sm-1">
                                            <div class="h3">:</div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="d-flex align-items-center">
                                                <h4 class="hide"id="birthday"><?php if(!empty($username)){ echo $birthday; }?></h4>
                                                <input class="show d-none" value="<?php if(!empty($username)){ echo $birthday; }?>" type="date" name="birthday" id="birthday" required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="d-flex mt-2" >
                                        <div class="col-sm-4">
                                            <label class="h3" for="address">Address</label>
                                        </div>
                                        <div class="col-sm-1">
                                            <div class="h3">:</div>
                                        </div>
                                        <div class="col-sm-7">
                                            <div class="d-flex align-items-center">
                                                <h4 class="hide"id="address"><?php if(!empty($username)){ echo $address; }?></h4>
                                                <input class="show d-none" value="<?php if(!empty($username)){ echo $address; }?>" style="height: 100px" type="text" name="address" placeholder="Enter your current address" id="address" required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="d-flex justify-content-end pe-5 show d-none">
                                        <button class="btn btn-success" type="submit">Update</button>
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Crop Image Before Upload</h5>
                            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="img-container">
                                <div class="row">
                                    <div class="col-md-8">
                                        <img src="" id="sample_image" />
                                    </div>
                                    <div class="col-md-4">
                                        <div class="preview"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" id="crop" class="btn btn-primary">Crop</button>
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="modal1" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Crop Image Before Upload</h5>
                            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="img-container">
                                <div class="row">
                                    <div class="col-md-8">
                                        <img src="" id="sample_image1" />
                                    </div>
                                    <div class="col-md-4">
                                        <div class="preview1"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" id="crop1" class="btn btn-primary">Crop</button>
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
<script>

    //Country
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

    //Edit Button
    $('.edit-btn').on('click',()=> {
        $('.show').removeClass('d-none');
        $('.hide').addClass('d-none');
        $('.edit-btn').addClass('d-none');
        $('.close-edit-btn').removeClass('d-none');
        console.log("SUCCESS")
    })

    $('.close-edit-btn').on('click',()=> {
        $('.show').addClass('d-none');
        $('.hide').removeClass('d-none');
        $('.edit-btn').removeClass('d-none');
        $('.close-edit-btn').addClass('d-none');
        console.log("SUCCESS")
    })

    /// Profile Modal
    var bs_modal = $('#modal');
    var image = document.getElementById('sample_image');
    var cropper,reader,file;
    var ajax = new XMLHttpRequest();


    $("body").on("change", "#upload_image", function(e) {
        var files = e.target.files;
        var done = function(url) {
            image.src = url;
            bs_modal.modal('show');
        };


        if (files && files.length > 0) {
            file = files[0];

            if (URL) {
                done(URL.createObjectURL(file));
            } else if (FileReader) {
                reader = new FileReader();
                reader.onload = function(e) {
                    done(reader.result);
                };
                reader.readAsDataURL(file);
            }
        }
    });

    bs_modal.on('shown.bs.modal', function() {
        cropper = new Cropper(image, {
            aspectRatio: 1,
            viewMode: 2,
            preview: '.preview'
        });
    }).on('hidden.bs.modal', function() {
        cropper.destroy();
        cropper = null;
    });

    $("#crop").click(function() {
        canvas = cropper.getCroppedCanvas({
            width: 150,
            height: 150,
        });
        console.log("Crop Success!")

        canvas.toBlob(function(blob) {
            console.log("Redirect Function Start!")
            url = URL.createObjectURL(blob);
            var reader = new FileReader();
            reader.readAsDataURL(blob);
            reader.onloadend = function() {
                var base64data = reader.result;
                console.log("Before Redirect!")
                //alert(base64data);
                $.ajax({
                    type: "POST",
                    dataType: "json",
                    url: "./profile_upload.php",
                    cache: false,
                    data: {image: base64data},
                    success: function(data) {
                        bs_modal.modal('hide');
                        $('#uploaded_image').attr('src', data);
                        $('#header-img').attr('src', data);
                        console.log("php function Success!")
                    },
                    fail: function(){
                        console.log("php function failed");
                    }
                });
                console.log("Redirect Success!")
            };

        });
    });

    //Cover Modal
    var bs_modal1 = $('#modal1');
    var image1 = document.getElementById('sample_image1');
    var cropper1,reader1,file1;
    var ajax1 = new XMLHttpRequest();


    $("body").on("change", "#upload_image1", function(e) {
        var files1 = e.target.files;
        var done = function(url) {
            image1.src = url;
            bs_modal1.modal('show');
        };


        if (files1 && files1.length > 0) {
            file1 = files1[0];

            if (URL) {
                done(URL.createObjectURL(file1));
            } else if (FileReader) {
                reader1 = new FileReader();
                reader1.onload = function(e) {
                    done(reader1.result);
                };
                reader1.readAsDataURL(file1);
            }
        }
    });

    bs_modal1.on('shown.bs.modal', function() {
        cropper1 = new Cropper(image1, {
            aspectRatio: 4,
            viewMode: 2,
            preview: '.preview1'
        });
    }).on('hidden.bs.modal', function() {
        cropper1.destroy();
        cropper1 = null;
    });

    $("#crop1").click(function() {
        canvas = cropper1.getCroppedCanvas({
            width: 1000,
            height: 220,
        });
        console.log("Crop Success!")

        canvas.toBlob(function(blob) {
            console.log("Redirect Function Start!")
            url = URL.createObjectURL(blob);
            var reader = new FileReader();
            reader.readAsDataURL(blob);
            reader.onloadend = function() {
                var base64data = reader.result;
                console.log("Before Redirect!")
                //alert(base64data);
                $.ajax({
                    type: "POST",
                    dataType: "json",
                    url: "./cover_upload.php",
                    cache: false,
                    data: {image: base64data},
                    success: function(data) {
                        bs_modal1.modal('hide');
                        $('#uploaded_image1').attr('src', data);
                        console.log("php function Success!")
                    },
                    fail: function(){
                        console.log("php function failed");
                    }
                });
                console.log("Redirect Success!")
            };

        });
    });
</script>
<?php die() ?>

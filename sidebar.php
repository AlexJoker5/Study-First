<div class="sidebar sticky-top" id="side_nav">
    <div class="header-box px-2 pt-3 pb-4 d-flex justify-content-center mt-3">
        <h1 class="fs-4">
            <a href="courses.php" class="text-decoration-none">
                <span class="bg-white text-dark rounded shadow px-2 me-2">SF</span>
                <span class="text-white">Study First</span>
            </a>
        </h1>
        <button class="btn d-md-none d-block close-btn px-1 ps-3 pt-0 pb-1 text-white"><i class="fas fa-stream"></i></button>
    </div>
    <ul class="list-unstyled px-2">
        <li class=""><a href="index.php" class="text-decoration-none px-3 py-1 d-block"><i class="fas fa-home"></i><span class="ps-3">Dashboard</span></a></li>
        <li class=""><a href="courses.php" class="text-decoration-none px-3 py-1 d-block"><i class="fas fa-list"></i><span class="ps-3">Courses</span></a></li>
        <li class=""><a href="#" class="text-decoration-none px-3 py-1 d-block"><i class="fas fa-users pe-1"></i><span class="ps-2">Attendance</span></a></li>
        <li class=""><a href="timetable.php" class="text-decoration-none px-3 py-1 d-block"><i class="fas fa-calendar-week"></i><span class="ps-3">Class Schedule</span></a></li>
        <li class=""><a href="#" class="text-decoration-none px-3 py-1 d-block"><i class="fas fa-check"></i><span class="ps-3">Marksheets</span></a></li>
    </ul>
    <hr class="h-color mx-3">
    <ul class="list-unstyled px-2">
        <li class=""><a href="#" class="text-decoration-none px-3 py-1 d-block"><i class="fas fa-bars"></i><span class="ps-3">Setting</span></a></li>
        <li class="">
            <a href="notification.php" class="text-decoration-none px-3 py-1 d-block">
                <i class="far fa-bell"></i>
                <span class="ps-3">Notifications</span>
                <span class="bg-dark rounded-pill text-white py-1 px-2"><?php echo $count_courses_noti ?></span>
            </a>
        </li>
    </ul>
</div>
<script src="css/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.2/jquery.min.js" integrity="sha512-tWHlutFnuG0C6nQRlpvrEhE4QpkG1nn2MOUMWmUeRePl4e3Aki0VB6W1v3oLjFtd0hVOtRQ9PHpSfN6u6/QXkQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    $(".sidebar ul li").on('click', function(){
        $(".sidebar ul li.active").removeClass('active');
        $(this).addClass('active');
    });

    $('.close-btn').on('click',function (){
        $('.sidebar').removeClass('active');
    })
</script>
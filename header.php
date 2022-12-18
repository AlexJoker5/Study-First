<!--- Navbar --->
<?php
$firstname = $row['first_name'];
$lastname = $row['last_name'];
?>
<nav class="navbar navbar-expand-md border-bottom border-1 border-light sticky-top navbar-light bg-white" style="z-index: 2!important">
    <div class="container-fluid">
        <div class="d-flex justify-content-between d-md-none d-block">
            <a class="navbar-brand fs-4" href="#">Study First</a>
            <button class="btn px-1 pb-0 pt-1 open-btn"><i class="fas fa-stream"></i></button>
        </div>
        <button type="button" class="navbar-toggler" data-bs-target="#navbarNav" data-bs-toggle="collapse">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <ul class="navbar-nav mb-2 mb-lg-0">
                <div class="d-flex">
                    <img width="45px" height="45px" class=" rounded-pill object-fit-cover" id="header-img" src=<?php echo $profile ?> alt="">
                    <a class="nav-link active ps-2" aria-current="page" href="profile.php"><?php if(!empty($username)){ echo $firstname." ".$lastname; }?></a>
                </div>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="logout.php">Logout</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<script>
    var nav = document.querySelector('nav');
    var navBrand = document.querySelector('.navbar-brand');
    var openBtn = document.querySelector('.open-btn')
    var link = document.querySelector('.nav-link');
    var toggle = document.querySelector('.navbar-toggler-icon')
    window.addEventListener('scroll', function(){
        if(window.pageYOffset > 100){
            nav.classList.add('navbar-dark','bg-dark', 'shadow', 'text-dark');
            nav.classList.remove('navbar-light','bg-white');
            navBrand.classList.add('text-white');
            openBtn.classList.add('text-white');
            link.classList.add('text-white');
            toggle.classList.add('text-white');
        }else {
            nav.classList.add('navbar-light','bg-white');
            nav.classList.remove('navbar-dark','bg-dark','shadow');
            navBrand.classList.remove('text-white');
            openBtn.classList.remove('text-white');
            link.classList.remove('text-white');
            toggle.classList.remove('text-white');
        }
    });
    $('.open-btn').on('click',function (){
        $('.sidebar').addClass('active');
    })
</script>
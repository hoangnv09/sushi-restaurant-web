<!-- header -->
<header>
    <a href="index.php?action=home" class="logo"><img src="../Content/images/logo1.jpg" alt="" width="100px"></a>
    <nav class="navbar">
    <?php
    $menu = new hanghoa();
    $tenmn = $menu->getTnMenu();
    while ($set = $tenmn->fetch()):
        $idmenu = $set['idmenu'];
        // echo $set['menu'];
    ?>
    <div class="menu-dropdown">
        <a href="index.php?action=<?php echo $set['menu'];?>" class=""><?php echo $set['tenmenu'];?></a>
        <?php
            // Lấy các menu con của menu hiện tại
            if (isset($idmenu)) {
                $menuCon = $menu->getTenLoai($idmenu);
                echo '<div class="menu-content">';
                while ($menuSet = $menuCon->fetch()):
        ?>
        <a href="index.php?action=sanpham&act=cttungsanpham&idmenu=<?php echo $menuSet['maloai']; ?>"><?php echo $menuSet['tenloai']; ?></a>
        <?php endwhile; ?>
        </div>
        <?php } ?>
    </div>
    <?php endwhile; ?>
</nav>
     <!-- <a href="#about">Giới thiệu</a>
        <div class="menu-dropdown" onclick="toggleMenu()">
        
            <a href="index.php?action=sanpham">Thực đơn</a>
            <div class="menu-content">
                <a href="#">Sashimi</a>
                <a href="#">Sushi</a>
                <a href="#">Món khác</a>
                <a href="#">Cơm / Mì</a>
                <a href="#">Đồ uống/Tráng miệng</a>
                <a href="#">Set ăn trưa</a>
            </div>
        </div>
        <a href="#review">Tin tức & khuyến mãi</a> -->
    <div class="icons nav__actions">
        <i class="fas fa-bars" id="menu-bars"></i>
        <i class="fas fa-search nav_search" id="search-btn"></i>
        <a href="index.php?action=giohang" class="fas fa-shopping-cart"></a>
        <!-- <a href="#" class="fas fa-user nav_login" id="login-btn"></a> -->
        <?php if (isset($_SESSION['makh'])) : ?>
            <div class="user-info">
                <p style="color:red;margin-bottom: 0;;margin-top: 10px;px;margin-left:0px;">Xin chào <?php echo $_SESSION['tenkh']; ?>!</p>
                <a href="index.php?action=dangnhap&act=dangxuat" style="border-radius:0; text-decoration:none;">Đăng xuất</a>
            </div>
        <?php else : ?>

            <a href="index.php?action=dangnhap" class="fas fa-user nav_login" id="login-btn"></a>
        <?php endif; ?>

    </div>
    <!-- <?php
            // if(isset($_SESSION['makh']))
            // {
            //     echo '<li>
            //         <p style="color: red;margin-top:20px;margin-left:0px;">'.$_SESSION['tenkh'].'</p>
            //     </li>';
            // }
            // else
            // {
            //     echo '<li>
            //         <p style="color:red;margin-top:20px;margin-left:0px;>Xin chào!</p>
            //     </li>';
            // }
            ?> -->
</header>

<!--==================== SEARCH ====================-->
<div class="search" id="search">
    <form action="index.php?action=sanpham&act=timkiem" method="post" class="search__form">
        <i class="ri-search-line search__icon"></i>
        <input type="text" placeholder="What are you looking for?" name="txtsearch" class="search__input">
    </form>

    <i class="ri-close-line search__close" id="search-close"></i>
</div>

<!--==================== LOGIN ====================-->
<!-- <div class="login" id="login">
    <form action="index.php?action=dangnhap&act=dangnhap_action" class="login__form">
        <h2 class="login__title">Log In</h2>

        <div class="login__group">
            <div>
            <label for="exampleInputEmail1" class="text-uppercase login__label">Username</label>
                <input type="text" placeholder="Write your name" name="txtusername" class="login__input form-control">
            </div>

            <div>
                <label for="exampleInputPassword1" class="text-uppercase login__label">Password</label>
                <input type="password" placeholder="Enter your password" name="txtpassword" class="login__input form-control">
            </div>
        </div>

        <div>
            <p class="login__signup">
                You do not have an account? <a href="index.php?action=dangky">Sign up</a>
            </p>

            <a href="#" class="login__forgot">
                You forgot your password
            </a>

            <button type="submit" class="login__button">Log In</button>
        </div>
    </form>

    <i class="ri-close-line login__close" id="login-close"></i>
</div> -->

<!-- hinh dộng -->
<div class="row">

    <div class="col-12">
        <div class="row">
            <div class="col-12">
                <div id="carousel-example-1z" class="carousel slide carousel-fade" data-ride="carousel">
                    <!--Indicators-->
                    <ol class="carousel-indicators">
                        <li data-target="#carousel-example-1z" data-slide-to="0" class="active"></li>
                        <li data-target="#carousel-example-1z" data-slide-to="1"></li>
                        <li data-target="#carousel-example-1z" data-slide-to="2"></li>
                    </ol>
                    <!--/.Indicators-->
                    <!--Slides-->
                    <div class="carousel-inner z-depth-1-half" role="listbox">
                        <!--First slide-->
                        <div class="carousel-item active">
                            <img class="d-block w-100 hinh1" src="../Content/images/img_slide01.jpg" style="height: 700px;" alt=" First slide">
                            <div class="carousel-caption d-none d-md-block">
                                <h3 style="font-weight: bold; font-size: 50px;">Welcome To <br> Haha Sushi</h3>
                                <p style="color: white; font-size: 25px; text-align: left;opacity: 0.7">Nhâm nhi sự tinh tế, hòa mình trong hương vị tuyệt vời của Sushi.</p>
                                <!-- <button type="button" class="btn" style="background-color: orangered;color: white;" data-bs-toggle="modal" data-bs-target="#myModal">
                    RESERVATION
                </button> -->
                            </div>
                        </div>
                        <!--/First slide-->
                        <!--Second slide-->
                        <div class="carousel-item">
                            <img class="d-block w-100 hinh1" src="../Content/images/img_slide02.jpg" style="height: 700px;" alt="Second slide">
                            <div class="carousel-caption d-none d-md-block">
                                <h3 style="font-weight: bold; font-size: 50px;">Welcome To <br> Haha Sushi</h3>
                                <p style="color: white; font-size: 25px; text-align: left;opacity: 0.7">Nhâm nhi sự tinh tế, hòa mình trong hương vị tuyệt vời của Sushi.</p>
                                <!-- <button type="button" class="btn" style="background-color: orangered;color: white;" data-bs-toggle="modal" data-bs-target="#myModal">
                    RESERVATION
                </button> -->
                            </div>
                        </div>
                        <!--/Second slide-->
                        <!--Third slide-->
                        <div class="carousel-item">
                            <img class="d-block w-100 hinh1" src="../Content/images/img_slide03.jpg" alt="Third slide" style="height: 700px;">
                            <div class="carousel-caption d-none d-md-block">
                                <h3 style="font-weight: bold; font-size: 50px;">Welcome To <br> Haha Sushi</h3>
                                <p style="color: white; font-size: 25px; text-align: left;opacity: 0.7">Nhâm nhi sự tinh tế, hòa mình trong hương vị tuyệt vời của Sushi.</p>
                                <!-- <button type="button" class="btn" style="background-color: orangered;color: white;" data-bs-toggle="modal" data-bs-target="#myModal">
                    RESERVATION
                </button> -->
                            </div>
                        </div>

                        <!--/Third slide-->
                    </div>
                    <!--/.Slides-->
                    <!--Controls-->
                    <a class="carousel-control-prev" href="#carousel-example-1z" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carousel-example-1z" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                    <!--/.Controls-->
                </div>
            </div>
        </div>

    </div>
</div>

<script>
    let menu = document.querySelector('#menu-bars');
    let navbar = document.querySelector('.navbar');

    menu.onclick = () => {
        menu.classList.toggle('fa-times');
        navbar.classList.toggle('active');
    }


    /*=============== SEARCH ===============*/
    const search = document.getElementById('search'),
        searchBtn = document.getElementById('search-btn'),
        searchClose = document.getElementById('search-close')

    /* Search show */
    searchBtn.addEventListener('click', () => {
        search.classList.add('show-search')
    })

    /* Search hidden */
    searchClose.addEventListener('click', () => {
        search.classList.remove('show-search')
    })

    /*=============== LOGIN ===============*/
    const login = document.getElementById('login'),
        loginBtn = document.getElementById('login-btn'),
        loginClose = document.getElementById('login-close')

    /* Login show */
    loginBtn.addEventListener('click', () => {
        login.classList.add('show-login')
    })

    /* Login hidden */
    loginClose.addEventListener('click', () => {
        login.classList.remove('show-login')
    })
</script>
<script>
    function toggleMenu(event) {
        event.stopPropagation();
        var dropdown = event.currentTarget.querySelector('.menu-content');
        dropdown.style.display = (dropdown.style.display === 'block' ? 'none' : 'block');
    }

    document.addEventListener('DOMContentLoaded', function () {
        var dropdowns = document.querySelectorAll('.menu-dropdown');
        dropdowns.forEach(function (dropdown) {
            dropdown.addEventListener('mouseover', toggleMenu);
            dropdown.addEventListener('mouseout', toggleMenu);
        });
    });
</script>
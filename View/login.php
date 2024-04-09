<!-- <section class="login-block">
  <div class="container">
    <div class="row">
      <div class="col-md-4 login-sec">
        <h3 class="text-center"><b>Login Now</b></h3>
        <form  action="index.php?action=dangnhap&act=dangnhap_action" class="login-form" method="post">
        
          <div class="form-group">
            <label for="exampleInputEmail1" class="text-uppercase">Username</label>
            <input type="text" class="form-control" name="txtusername" placeholder="">

          </div>
          <div class="form-group">
            <label for="exampleInputPassword1" class="text-uppercase">Password</label>
            <input type="password" class="form-control" name="txtpassword" placeholder="">
          </div>


          <div class="form-check">
            <button class="btn btn-primary float-right" type="submit"> Đăng Nhập</button> 
            
          </div>

        </form>
        <div class="copy-text">Shop Giày <i class="fa fa-heart"></i> <a href="http://grafreez.com">shopgiay.com</a></div>
      </div>
      <div class="col-md-8 banner-sec">
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
          <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
          </ol>
          <div class="carousel-inner" role="listbox">
            <div class="carousel-item active">
              <img class="d-block img-fluid" src="Content/imagetourdien/9521597014227.png" alt="First slide">
              <div class="carousel-caption d-none d-md-block">
                <div class="banner-text">
                  <h2>This is Heaven</h2>
                  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation</p>
                </div>
              </div>
            </div>
            <div class="carousel-item">
              <img class="d-block img-fluid" src="https://images.pexels.com/photos/7097/people-coffee-tea-meeting.jpg" alt="First slide">
              <div class="carousel-caption d-none d-md-block">
                <div class="banner-text">
                  <h2>This is Heaven</h2>
                  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation</p>
                </div>
              </div>
            </div>
            <div class="carousel-item">
              <img class="d-block img-fluid" src="https://images.pexels.com/photos/872957/pexels-photo-872957.jpeg" alt="First slide">
              <div class="carousel-caption d-none d-md-block">
                <div class="banner-text">
                  <h2>This is Heaven</h2>
                  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation</p>
                </div>
              </div>
            </div>
          </div>

        </div>
      </div>
    </div>
</section> -->
<!--==================== LOGIN ====================-->
<div class="login" id="login">
    <form action="index.php?action=dangnhap&act=dangnhap_action" method="post" class="login__form">
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

            <a href="index.php?action=forget" class="login__forgot">
                You forgot your password
            </a>

            <button type="submit" class="login__button">Log In</button>
        </div>
    </form>

    <i class="ri-close-line login__close" id="login-close"></i>
</div>


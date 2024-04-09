  <!--Section: Examples-->
  <section id="examples" class="text-center">

      <!-- Heading -->
      <div class="row">
          <div class="col-lg-8 text-center text-lg-left mt-5">
              <h1 class="mb-5 font-weight-bold" style="color: red;">SẢN PHẨM MỚI NHẤT</h1>
          </div>
          <div class="col-lg-4 text-right mt-4">
              <a href="index.php?action=sanpham">
                  <span style="color: gray;">Xem chi tiết</span>
              </a>
          </div>
      </div>

      <!--Grid row-->

      <div class="row mx-auto justify-content-center">
          <?php
            $hh = new hanghoa();
            $result = $hh->getHangHoaNew();
            $counter = 0; // Khởi tạo biến đếm

            while ($set = $result->fetch()) :
                $cardClass = ($counter % 2 == 0) ? 'card' : 'card-1';
            ?>
              <!--Cột lưới-->
              <div class="col-lg-3 col-md-4 col-sm-6">
                  <div class="<?php echo $cardClass; ?>">
                      <div class="new-label">New</div>
                      <div class="product-image">
                          <img src="Content\images\<?php echo $set['hinh']; ?>" alt="">
                      </div>
                      <div class="product-name">
                          <a href="index.php?action=sanpham&act=sanphamchitiet&id=<?php echo $set['mahh']; ?>">
                              <span><?php echo $set['tenhh']; ?></span>
                      </div>
                      <div class="product-price">
                          <span style="font-weight: bold;"><?php echo number_format($set['dongia']) ?></span>
                      </div>

                      <div class="add-to-cart">
                          <a href="#" style="color: white;"><i class="fas fa-cart-plus"></i></a>
                      </div>
                  </div>
              </div>
          <?php
                $counter++;
            endwhile;
            ?>
      </div>
  </section>
  <!-- end sản phẩm mới nhất -->
  <!-- sản phẩm khuyến mãi -->
  <section id="examples" class="text-center">

      <!-- Heading -->
      <div class="row">
          <div class="col-lg-8 text-center text-lg-left mt-5">
              <h1 class="mb-5 font-weight-bold" style="color: red;">SẢN PHẨM KHUYẾN MÃI</h1>
          </div>
          <div class="col-lg-4 text-right mt-4">
              <a href="index.php?action=sanpham&act=sanphamkhuyenmai">
                  <span style="color: gray;">Xem chi tiết</span>
              </a>
          </div>
      </div>

      <!--Grid row-->

      <div class="row mx-auto justify-content-center">
          <?php
            $hh = new hanghoa();
            $result = $hh->getHangHoaSale();
            $counter = 0; // Khởi tạo biến đếm

            while ($set = $result->fetch()) :
                $cardClass = ($counter % 2 == 0) ? 'card' : 'card-1';
            ?>
              <!--Cột lưới-->
              <div class="col-lg-3 col-md-4 col-sm-6">
                  <div class="<?php echo $cardClass; ?>">
                      <div class="new-label">Sale</div>
                      <div class="product-image">
                          <img src="Content\images\<?php echo $set['hinh']; ?>" alt="">
                      </div>
                      <div class="product-name">
                          <a href="index.php?action=sanpham&act=sanphamchitiet&id=<?php echo $set['mahh']; ?>">
                              <span><?php echo $set['tenhh']; ?></span>
                      </div>
                      <div class="product-price">
                          
                          <h5 class="my-4 font-weight-bold">
                              <font color="red"><?php echo number_format($set['giamgia']) ?><sup><u>đ</u></sup></font>
                              <strike><?php echo number_format($set['dongia']) ?></strike><sup><u>đ</u></sup>
                          </h5>
                      </div>
                      <div class="add-to-cart">
                          <a href="index.php?action=sanpham&act=sanphamchitiet&id=<?php echo $set['mahh']; ?>" style="color: white;"><i class="fas fa-cart-plus"></i></a>
                      </div>
                  </div>
              </div>
          <?php
                $counter++;
            endwhile;
            ?>
      </div>
  </section>
  <!-- end sản phẩm khuyến mãi -->
  <main>
      <div class="top__bg">
          <div class="top__intro">
              <div class="top__intro--item top__intro--item_1">
                  <div class="part_left">
                      <h1 class="red_frame">
                          Hương vị chuẩn Nhật <br>từ nguyên liệu nhập khẩu chính gốc. <br>"Trải nghiệm chất lượng Nhật Bản" <br>ngay tại Việt Nam cùng Haha Sushi. </h1>
                  </div>
                  <div class="part_right">
                      Tập đoàn Haha Sushi Nhật Bản với chuỗi hệ thống các nhà hàng sushi gồm hơn 200 chi nhánh trải dài khắp Nhật Bản. Mang theo sứ mệnh "Quảng bá văn hoá ẩm thực sushi", với mục tiêu cung cấp cho thực khách ở nhiều nơi trên thế giới mà đầu tiên là Việt Nam, tận hưởng hương vị sushi Nhật Bản một cách trọn vẹn nhất. Điều đó không thể chỉ thể hiện qua hương vị, mà chất lượng phục vụ theo tiêu chuẩn Nhật Bản cũng là yếu tố không thể thiếu trong quy trình phục vụ quý khách. <p class="btn_more ffC"><a href="#">XEM THÊM</a></p>
                  </div>
              </div>
          </div>
  </main>
  <div class="top__menu">
      <div class="top__menu--inner">
          <h2 class="ffC top__menu--heading">
              THỰC ĐƠN </h2>
          <ul>
              <li>
                  <div class="item bl-hot" style="cursor: pointer;">
                      <div class="thumb">
                          <img class="opa" src="../Content/images/img_menu01.jpg" alt="刺身" style="opacity: 1;">
                      </div>
                      <h3 class="title">
                          <a href="" class="bl-bigger">

                              SASHIMI </a>
                      </h3>
                  </div>
              </li>
              <li>
                  <div class="item bl-hot" style="cursor: pointer;">
                      <div class="thumb">
                          <img class="opa" src="../Content/images/img_menu02.jpg" alt="寿司" style="opacity: 1;">
                      </div>
                      <h3 class="title">
                          <a href="" class="bl-bigger">

                              SUSHI </a>
                      </h3>
                  </div>
              </li>
              <li>
                  <div class="item bl-hot" style="cursor: pointer;">
                      <div class="thumb">
                          <img class="opa" src="../Content/images/img_menu03.jpg" alt="料理" style="opacity: 1;">
                      </div>
                      <h3 class="title">
                          <a href="" class="bl-bigger">

                              MÓN KHÁC </a>
                      </h3>
                  </div>
              </li>
              <li>
                  <div class="item bl-hot" style="cursor: pointer;">
                      <div class="thumb">
                          <img class="opa" src="../Content/images/img_menu04.jpg" alt="ご飯、麺、その他" style="opacity: 1;">
                      </div>
                      <h3 class="title">
                          <a href="" class="bl-bigger">

                              CƠM / MÌ </a>
                      </h3>
                  </div>
              </li>
              <li>
                  <div class="item bl-hot" style="cursor: pointer;">
                      <div class="thumb">
                          <img class="opa" src="../Content/images/img_menu05.jpg" alt="ドリンク、デザート" style="opacity: 1;">
                      </div>
                      <h3 class="title">
                          <a href="" class="bl-bigger">

                              ĐỒ UỐNG/<br class="hidden-xs">TRÁNG MIỆNG </a>
                      </h3>
                  </div>
              </li>
              <li>
                  <div class="item bl-hot" style="cursor: pointer;">
                      <div class="thumb">
                          <img class="opa" src="../Content/images/img_menu06.jpg" alt="ランチセット" style="opacity: 1;">
                      </div>
                      <h3 class="title">
                          <a href="" class="bl-bigger">

                              SET ĂN TRƯA </a>
                      </h3>
                  </div>
              </li>
          </ul>
      </div>
  </div>
  <style>
    span{
font-size: small;
    }
  </style>
  
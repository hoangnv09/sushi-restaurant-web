<!-- <div style="margin-bottom: 130px;"></div> -->
<section>
    <div class="row">
        <div class="col-lg-12 text-center">
            <h2 class="my-5 font-weight-bold">CHI TIẾT SẢN PHẨM</h2>
        </div>

    </div>
    <article class="col-12">
        <!-- <div class="card"> -->
        <div class="container-fluid">
            <div class="wrapper row">
                <form action="index.php?action=giohang&act=giohang_action" method="post">
                    <!-- <input type="hidden" name="action" value="giohang&add_cart"/> -->

                    <div class="preview col-md-6">
                        <div class="tab-content">
                            <?php
                            if (isset($_GET['id'])) {
                                $id = $_GET['id'];
                                $hh = new hanghoa();
                                $sp = $hh->getHangHoaId($id);
                                $hangton = $sp['soluongton'];
                                $tenhh = $sp['tenhh'];
                                $mota = $sp['mota'];
                                $dongia = $sp['dongia'];
                                $giamgia = $sp['giamgia'];
                            }
                            ?>
                            <?php
                            // $hinh = $hh->getHangHoaHinh($id);
                            // $set = $hinh->fetch();
                            $hinh = $hh->getHangHoaHinh($id);
                            $img = $hinh['hinh'];
                            ?>
                            <div class="tab-pane active" id=""><img src="Content\images\<?php echo $img; ?>" alt="" width="350px" height="300px">
                            </div>
                        </div>
                        <!-- <ul class="preview-thumbnail nav nav-tabs">

                        </ul> -->
                    </div>
                    <div class="details col-md-6">
                        <input type="hidden" name="mahh" value="<?php echo $id; ?>" />
                        <h3 class="product-title"><?php echo $tenhh; ?> </h3>
                        <div class="rating">
                            <div class="stars"> <span class="fa fa-star checked"></span> <span class="fa fa-star checked"></span> <span class="fa fa-star checked"></span> <span class="fa fa-star"></span> <span class="fa fa-star"></span>
                            </div>
                        </div>

                        <p class="product-description">
                            <?php echo $mota; ?>
                        </p>
                        <?php
                        if ($giamgia == 0) {
                            echo '<h4 class="price">Giá bán: ' . number_format($dongia) . 'đ</h4>';
                        } else {
                            echo '<h4 class="price">Giá bán: ' . number_format($giamgia) . 'đ</h4>';
                        }
                        ?>


                        <h5>
                            Số Lượng:
                            <input type="number" id="soluong" name="soluong" min="1" max="100" value="1" size="10" />
                            <?php
                            // Hiển thị số lượng tồn kho
                            // echo "<p>Số lượng tồn kho: $hangton</p>";

                            // Kiểm tra và disable nút nếu số lượng tồn kho bằng 0
                            $disabled = ($hangton == 0) ? "disabled" : "";
                            ?>
                        </h5>
                        <div class="action d-flex ml-3 mt-5">

                            <button class="add-to-cart btn btn-default" type="submit" data-toggle="modal" data-target="#myModal" style="width:60px;border-radius: 0;position:relative;" <?php echo $disabled; ?>>MUA NGAY
                            </button>

                            <!-- <a href="#" target="_blank"> <button class="like btn btn-default" type="button"><span class="fa fa-heart"></span></button> </a> -->
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- </div> -->
    </article>
</section>

<p class="float-left"><b>BÌnh luận </b></p>
<hr>
</div>
<form action="" method="post">
    <div class="row">

        <input type="hidden" name="txtmahh" value="" />
        <img src="Content/images/people.png" width="50px" height="50px" ; />
        <textarea class="input-field" type="text" name="comment" rows="2" cols="70" id="comment" placeholder="Thêm bình luận">  </textarea>
        <input type="submit" class="btn btn-primary" id="submitButton" style="float: right;" value="Bình Luận" />
    </div>

</form>
<div class="row">
    <p class="float-left"><b>Các bình luận</b></p>
    <hr>
</div>
<div class="row">
    <br />
</div>

</div>
</section>
<!-- <style>
    /* CSS */
    .container-fliud {
        background-color: #f8f9fa;
        border-radius: 10px;
        padding: 20px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .product-title {
        font-size: 24px;
        font-weight: bold;
    }

    .price {
        font-size: 20px;
        color: #e44d26;
        /* Màu cam đậm */
        font-weight: bold;
    }

    .colors {
        margin-top: 10px;
        font-weight: bold;
    }

    .action {
        margin-top: 20px;
    }

    .add-to-cart {
        margin-right: 10px;
    }

    .product-description {
        margin-top: 20px;
        font-size: 16px;
    }

    .float-left {
        font-size: 18px;
        font-weight: bold;
        margin-bottom: 10px;
    }

    #comment {
        margin-top: 10px;
    }

    #submitButton {
        margin-top: 10px;
    }

    /* Thêm các hiệu ứng hover và transition cho các button */
    .add-to-cart,
    #submitButton {
        transition: background-color 0.3s ease;
    }

    .add-to-cart:hover,
    #submitButton:hover {
        background-color: #e44d26;
        /* Màu cam nhạt */
        color: white;
    }

    /* Hiển thị bình luận */
    .comments {
        margin-top: 20px;
    }

    .comment {
        border-bottom: 1px solid #e0e0e0;
        margin-bottom: 10px;
        padding-bottom: 10px;
    }

    .comment img {
        border-radius: 50%;
        margin-right: 10px;
    }

    .comment p {
        margin: 0;
    }

    /* Các hiệu ứng cho nút xem thêm */
    #loadMore {
        background-color: #007bff;
        color: white;
        border: none;
        padding: 10px 20px;
        border-radius: 5px;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    #loadMore:hover {
        background-color: #0056b3;
    }

    /* Tăng kích thước phông chữ cho các phần chính */
    .product-title,
    .price,
    .colors,
    .action,
    .product-description,
    .float-left,
    #comment,
    #submitButton {
        font-size: 18px;
    }

    /* Tăng kích thước phông chữ cho tiêu đề bình luận */
    .comments,
    .comment {
        font-size: 16px;
    }

    /* Tăng kích thước phông chữ cho nút xem thêm */
    #loadMore {
        font-size: 16px;
    }

    /* Đảm bảo rằng hình ảnh không bị dịch chuyển quá khỏi giới hạn container */
    .preview img {
        max-width: 100%;
        height: auto;
    }

    /* Đặt margin trái cho phần details để giữ khoảng cách với hình ảnh */
    .details {
        margin-left: 20px;
        /* Điều chỉnh giá trị margin theo ý muốn của bạn */
    }
</style> -->
<style>
    .checked,
    .price span {
        color: #ff9f1a;
    }
</style>
<!-- quảng cáo -->
<?php

?>
<!-- end quảng cáo -->
<?php
//phân trang
$hh = new hanghoa();
//b1: xác định trang mình đang phân trang có bao nhiêu sản phẩm
//cách 1: dùng count
// $count=$hh->getCountHangHoaAll(); // 14
//cách 2:
$count = $hh->getHangHoaAll()->rowCount(); //14
//b2: giới hạn 1 trang bao nhiêu sản phẩm, tự cho tùy vào thiết kế
$limit = 8;
//b3: tính ra số trang dựa trên tổng sản phẩm và limit
$trang = new page();
//lấy ra có bao nhiêu trang
$page = $trang->findPage($count, $limit); //2
//lấy ra start
$start = $trang->findStart($limit); //8
?>

<!-- end số lượt xem sản phẩm -->
<!-- sản phẩm-->
<!-- cùng 1 view để gọi nhiều dữ liệu khác nhau-->
<?php
$ac = 1;
if (isset($_GET['action'])) {
    if (isset($_GET['act']) && $_GET['act'] == 'sanphamkhuyenmai') {
        $ac = 2;
    } elseif (isset($_GET['act']) && $_GET['act'] == 'timkiem') {
        $ac = 3;
    } elseif (isset($_GET['act']) && $_GET['act'] == 'cttungsanpham') {
        $ac = 4;
    } else {
        $ac = 1;
    }
}
?>
<!--Section: Examples-->
<section id="examples" class="text-center">

    <!-- Heading -->
    <div class="row">
        <div class="col-lg-8 text-right">
            <?php
            if ($ac == 1) {
                echo '<h3 class="mb-5 font-weight-bold mt-5" style="color: red;text-align: start">TẤT CẢ SẢN PHẨM</h3>';
            }
            if ($ac == 2) {
                echo '<h3 class="mb-5 font-weight-bold mt-5" style="color: red;text-align: start">TẤT CẢ SẢN PHẨM SALE</h3>';
            }
            if ($ac == 3) {
                echo '<h3 class="mb-5 font-weight-bold mt-5" style="color: red;text-align: start">SẢN PHẨM TÌM KIẾM LÀ</h3>';
            }

            if ($ac == 4) {
                if (isset($_GET['idmenu'])) {
                    $id = $_GET['idmenu'];
                    $categoryInfo = $hh->getHHtheoLoai($id)->fetch(PDO::FETCH_ASSOC);
                    if ($categoryInfo) {
                        $tenloai = $categoryInfo['tenloai'];
                        echo '<h3 class="mb-5 font-weight-bold mt-5" style="color: red;text-align: start">SẢN PHẨM ' . $tenloai . '</h3>';
                    } else {
                        echo '<h3 class="mb-5 font-weight-bold mt-5" style="color: red;text-align: start">Category not found</h3>';
                    }
                }
            }


            ?>
        </div>
    </div>
    <!--Grid row-->
    <div class="row mx-auto justify-content-center">
        <?php
        $hh = new hanghoa();
        if ($ac == 1) {
            $result = $hh->getHangHoaAllPage($start, $limit); //phân trang
        }
        if ($ac == 2) {
            $result = $hh->getHangHoaAllSale(); //thấy được 8 sản phẩm
        }
        if ($ac == 3) {
            if (isset($_POST['txtsearch'])) {
                $tk = $_POST['txtsearch'];
                $result = $hh->timkiemSP($tk);
            }
        }
        if ($ac == 4) {
            if (isset($_GET['idmenu'])) {
                $id = $_GET['idmenu'];
                $result = $hh->getHHtheoLoai($id);
            }
        }
        //lấy 14 sản phẩm đổ lên View
        $counter = 0; // Khởi tạo biến đếm

        while ($set = $result->fetch()) :
            // Tăng biến đếm
            $counter++;
            // Xác định loại card dựa trên giá trị của biến đếm
            $cardClass = ($counter % 2 == 0) ? 'card' : 'card-1';
        ?>
            <!--Cột lưới-->
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="<?php echo $cardClass; ?>">
                    <?php
                    if ($ac == 1) {
                        echo '<div class="new-label">New</div>';
                    }
                    if ($ac == 2) {
                        echo '<div class="new-label">Sale</div>';
                    }
                    ?>
                    <div class="product-image">
                        <img src="Content\images\<?php echo $set['hinh']; ?>" alt="">
                    </div>
                    <div class="product-name">
                        <a href="index.php?action=sanpham&act=sanphamchitiet&id=<?php echo $set['mahh']; ?>">
                            <span><?php echo $set['tenhh']; ?></span>
                        </a>
                    </div>
                    <?php
                    if ($ac == 1) {
                        echo '<div class="product-price">
                        <h5 class=""></h5>
                        <font >' . number_format($set['dongia']) . '<sup><u>đ</u></sup></font>
                              </div>';
                    }
                    if ($ac == 2) {
                        echo '<div class="product-price">
                                
                                <h5 class="my-4 font-weight-bold">
                                    <font color="red">' . number_format($set['giamgia']) . '<sup><u>đ</u></sup></font>
                                    <strike>' . number_format($set['dongia']) . '</strike><sup><u>đ</u></sup>
                                </h5>
                              </div>';
                    }
                    ?>
                    <div class="add-to-cart">
                        <a href="index.php?action=giohang" style="color: white;"><i class="fas fa-cart-plus"></i></a>
                    </div>
                </div>
            </div>
        <?php endwhile; ?>
    </div>
    <!--Grid row-->

</section>


<!-- end sản phẩm mới nhất -->
<!-- phân trang -->
<!-- <div class="col-md-6 div col-md-offset-3"> -->
<?php
if ($ac == 1) {


?>
    <div class="col-md-6 mx-auto">
        <!--phân trang-->
        <ul class="pagination ">
            <?php
            //nút lùi, khi nào lùi, khi trang hiện nó lớn hơn 1 và tổng số trang >1
            $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
            if ($current_page > 1 && $page > 1) {
                echo '<li><a href="index.php?action=sanpham&page=' . ($current_page - 1) . '">Prev</a></li>';
            }
            for ($i = 1; $i <= $page; $i++) {
            ?>

                <!-- trong vòng lặp -->
                <li <?php echo ($i == $current_page) ? 'class="active"' : ''; ?>>
                    <a href="index.php?action=sanpham&page=<?php echo $i; ?>"><?php echo $i; ?></a>
                </li>

            <?php
            }
            //nút next, next cho tới khi nhỏ hơn tổng số trang và tổng trang lớn hơn 1
            if ($current_page < $page && $page > 1) {
                echo '<li><a href="index.php?action=sanpham&page=' . ($current_page + 1) . '">Next</a></li>';
            }
            ?>
        </ul>
    </div>
<?php
}
?>
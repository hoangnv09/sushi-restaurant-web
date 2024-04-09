<?php
// controller gọi view sản phẩm
// include_once "./View/sanpham.php"

    $act = "sanpham";
// controller điều phối đến những view khác thông qua 1 biến
// biết đó có tên là act
    if (isset($_GET["act"])) {
        $act = $_GET["act"]; //sản phẩm khuyến mãi
    }
    switch ($act) {
        case 'sanpham':
            include_once "./View/sanpham.php";
            break;
        case 'sanphamkhuyenmai':
            include_once "./View/sanpham.php";
            break;
        case 'sanphamchitiet':
            include_once "./View/sanphamchitiet.php";
            break;
            case 'timkiem':
                include_once "./View/sanpham.php";
                break;
        case 'cttungsanpham':
            include_once "./View/sanpham.php";
            break;
    }
    
?>
<?php
//trước khi điều hướng qua View, thì kiểm tra người dùng có giỏ hàng chưa
if (!isset($_SESSION['cart']))
{
    $_SESSION['cart'] = array(); // chưa nhiều hàng, mỗi hàng là 1 objective
}
$act = "giohang";
if (isset($_GET['act'])) {
    $act = $_GET['act'];
}
switch ($act) {
    case 'giohang':
        include_once "./View/cart.php";
        break;
    case 'giohang_action':
        $mahh = 0;
        $soluong = 0;
        if (isset($_POST['mahh'])) {
            $mahh = $_POST['mahh'];
            $soluong = $_POST['soluong'];
            $gh = new giohang();
            $gh->addHangHoa($mahh, $soluong);
            echo '<meta http-equiv="refresh"content="0;url=../index.php?action=giohang"/>';
        }
        // break;
        // if (isset($_POST['them'])) {

        //     echo '<meta http-equiv="refresh" content="0;url=../index.php?action=sanpham&act=sanphamchitiet&id='.$mahh.'"/>';
        // } else if (isset($_POST['mua'])) {
        //     echo '<meta http-equiv="refresh" content="0;url=../index.php?action=hang"/>';
        // }
        break;
    case 'delete_cart':
        if (isset($_GET['id'])) {
            $vt = $_GET['id'];
            unset($_SESSION['cart'][$vt]);
            echo  '<meta http-equiv="refresh "content="0;url=../index.php?action=giohang"/>';
        }
        break;
    case 'update_cart':
        if (isset($_POST['newqty']))
        {
            $newqty = $_POST['newqty'];
            foreach ($newqty as $key => $value) {

                if ($_SESSION['cart'][$key]['soluong'] != $value)
                {
                    $gh = new giohang();
                    $gh->updateHH($key, $value);
                }
            }
        }
        echo '<meta http-equiv="refresh" content="0;url=../index.php?action=giohang"/>';
        break;
}
?>
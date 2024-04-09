<?php
$act = "dangnhap";
if (isset($_GET['act'])) {
    $act = $_GET['act'];
}
switch ($act) {
    case 'dangnhap':
        include_once "./View/login.php";
        break;
    case 'dangnhap_action':
        $user = '';
        $pass = '';
        if (isset($_POST['txtusername']) && isset($_POST['txtpassword'])) {
            $user = $_POST['txtusername'];
            $pass = $_POST['txtpassword'];
            $salfF = "G435#";
            $salfL = "T34a!&";
            $passnew = md5($salfF . $pass . $salfL);
            $kh = new user();
            $logkh = $kh->logKhachHang($user, $passnew);
            if ($logkh) {
                $_SESSION['makh'] = $logkh['makh'];
                $_SESSION['tenkh'] = $logkh['tenkh'];
                echo '<script> alert("Đăng nhập thành công")</script>';
                echo '<meta http-equiv="refresh"content="0;url=../index.php?action=home"/>';
            } else {
                echo '<script> alert("Đăng nhập không thành công")</script>';
                echo '<meta http-equiv="refresh"content="0;url=../index.php?action=home"/>';
            }
        }
        break;
    case 'dangxuat':
        unset($_SESSION['tenkh']);
        unset($_SESSION['makh']);
        echo '<meta http-equiv="refresh"content="0;url=../index.php?action=home"/>';
        break;
}

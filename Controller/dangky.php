<?php
$act ="dangky";
if(isset($_GET['act'])){
    $act = $_GET['act'];
}
switch($act){
    case 'dangky':
        include_once "./View/registration.php";
        break;
    case 'dangky_action':
        // chuyển toàn bộ thông tin về dangky_action
        // Nhận thông tin
        $tenkh = '';
        $diachi='';
        $sodt='';
        $user='';
        $email='';
        $pass='';
        if(isset($_POST['submit'])){
            $tenkh=$_POST['txttenkh'];
            $diachi=$_POST['txtdiachi'];
            $sodt=$_POST['txtsodt'];
            $user=$_POST['txtuser'];
            $email=$_POST['txtemail'];
            $pass=$_POST['txtpass'];
            $salfF="G435#";
            $salfL="T34a!&";
            $passnew=md5($salfF.$pass.$salfL);
            // controller yêu cầu model insert vào database
            // trước khi insert kiểm tra xem user và email có ai đăng ký chưa
            $kh=new user();
            $check = $kh->checkUser($user,$email)->rowCount();
            if ($check>=1) {
                echo '<script> alert("Username hoac email da ton tai")</script>';
                // include_once "./View/registration.php";
                echo '<meta http-equiv="refresh" content="0;url=../index.php?action=dangky"/>';
            }
            else{
                $inskh=$kh->insertKhachHang($tenkh,$user,$passnew,$email,$diachi,$sodt);
                if($inskh!==false){
                    echo '<script> alert("Dang ky thanhf cong")</script>';
                    include_once "./View/home.php";
                }
                else{
                    echo '<script> alert("dang ky khong thanh cong")</script>';
                    // include_once "./View/registration.php";
                    echo '<meta http-equiv="refresh" content="0;url=../index.php?action=dangky"/>';
                }
            }
        }
        break;

}
?>
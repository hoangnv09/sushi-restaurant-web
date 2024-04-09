<?php
    //controller yêu cầu model thêm dữ liệu vào database
    if(isset($_SESSION['makh']))
    {
        $makh=$_SESSION['makh'];
        //gọi mà số hd vừa chèn vào
        $hd= new hoadon();
        $sohd=$hd->insertHoaDon($makh);
        //lưu hóa đơn vừa thêm vào vô session
        $_SESSION['masohd']=$sohd;
        $total=0;
        //tiến hành thêm dữ liệu từ giỏ hàng vào bảng cthoadon
        foreach ($_SESSION['cart'] as $key => $item) {
            // controller yêu cầu model insert vào bảng cthoadon
            $hd->insertCTHoaDon($sohd,$item['mahh'],$item['soluong'],$item['thanhtien']);
            $total+=$item['thanhtien'];
            // viết hàm cập nhật hàng tồn kho
            $hd->capNhatTonKho($sohd);
        }
        // sau khi insert xong cthoadon thì phải update tổng thành tiền vào ngược lại bảng hóa đơn
        $hd->updateTongTien($sohd,$makh,$total);
        unset($_SESSION['cart']);
    }
    
    include_once "./View/order.php";

    
    ?>
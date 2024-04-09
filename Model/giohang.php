<?php
class giohang
{
    // phương thức add hàng
    function addHangHoa($mahh, $soluong)
    {
        // còn thiếu hình,ten,gia,thanhtien
        $sanpham = new hanghoa();
        $sp = $sanpham->getHangHoaId($mahh); // trả về 1 dòng, được fetch rồi nên nó array
        $tenhh = $sp['tenhh'];
        $dongia = $sp['dongia'];
        $giamgia=$sp['giamgia'];
        $dg=0;
        if($giamgia>0){
            $dg=$giamgia;
        }else{
            $dg=$dongia;
        }
        $total = $soluong * $dg;
        // lấy hình
        $hinh = $sanpham->getHangHoaHinh($mahh);
        $img = $hinh['hinh'];
        $flag = false;

        // vì giỏ hàng chứa là object, mà object thì có thuộc tính
        // trước khi thêm vào giỏ hàng cần kiểm tra xem món đồ đã tồn tại trong giỏ hàng chưa
        foreach ($_SESSION['cart'] as $key => $item) {
            if ($item['mahh'] == $mahh) {
                $flag = true;
                $soluong += $item['soluong'];
                $this->updateHH($key, $soluong);
            }
        }
        if ($flag == false) {
            // tạo đối tượng
            $item = array(
                'mahh' => $mahh,
                'tenhh' => $tenhh,
                'hinh' => $img,
                'dongia' => $dg,
                'soluong' => $soluong,
                'thanhtien' => $total
            );
            // đem đối tượng add vào trong giỏ hàng a[]
            $_SESSION['cart'][] = $item;
        }
    }
    function updateHH($index, $soluong)
    {
        if ($soluong <= 0) {
            unset($_SESSION['cart'][$index]);
        } else {
            $_SESSION['cart'][$index]['soluong'] = $soluong;
            $tiennew = $_SESSION['cart'][$index]['soluong'] * $_SESSION['cart'][$index]['dongia'];
            $_SESSION['cart'][$index]['thanhtien'] = $tiennew;
        }
    }
    function getSubTotal()
    {
        $subtotal = 0;
        foreach ($_SESSION['cart'] as $item) {
            $subtotal += $item['thanhtien'];
        }
        $subtotal = number_format($subtotal,2);
        return $subtotal;
    }
}

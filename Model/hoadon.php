<?php
class hoadon
{
    function insertHoaDon($makh)
    {
        $db = new connect();
        $date = new DateTime('now');
        $ngay = $date->format('Y-m-d'); // vì trong datebase là y-m-d
        $query = "INSERT INTO hoadon(masohd,makh,ngaydat,tongtien) values(Null,$makh,'$ngay',0)";
        $db->exec($query);
        // đã chèn xong vào bảng hóa đơn, nó sinh ra mã số hóa đơn
        $select = "SELECT a.masohd from hoadon a ORDER BY a.masohd desc limit 1";
        $masohd = $db->getInstance($select);
        return $masohd[0]; // trả về mảng $masohd=array(9);
    }
    // phương thức insert vào bảng chi tiết hóa đơn
    function insertCTHoaDon($masohd, $mahh, $soluongmua, $thanhtien)
    {
        $db = new connect();
        $query = "INSERT INTO cthoadon(masohd,mahh,soluongmua,thanhtien,tinhtrang)
            values($masohd,$mahh,$soluongmua,$thanhtien,0)";
        $db->exec($query);
    }
    // phương thức cập nhật tổng tiền
    function updateTongTien($masohd, $makh, $tongtien)
    {
        $db = new connect();
        $query = "UPDATE hoadon set tongtien=$tongtien where masohd=$masohd and makh=$makh";
        $db->exec($query);
    }
    // phương thức lấy thông tin khách hàng mua hàng dựa vào mã số hd
    function selectThongTinKH($masohd)
    {
        $db = new connect();
        $select = "select a.masohd, b.tenkh,b.diachi,b.sodienthoai,a.ngaydat
            from hoadon a,khachhang b where a.makh=b.makh and a.masohd=$masohd";
        $result = $db->getInstance($select);
        return $result;
    }
    // phương thức lấy thông tin hàng trên hóa đơn, tức là trên hóa đơn có bao nhiêu món hàng
    function selectThongTinHoaDon($masohd)
    {
        $db = new connect();
        $select = "select DISTINCT a.tenhh,b.dongia,c.soluongmua
            from hanghoa a, cthanghoa b, cthoadon c
            where a.mahh=b.idhanghoa and a.mahh=c.mahh and c.masohd=$masohd";
        $result = $db->getList($select);
        return $result;
    }
    function selectTongTien($masohd)
    {
        $db = new connect();
        $select = "select a.tongtien from hoadon a where a.masohd=$masohd";
        $result = $db->getInstance($select);
        return $result[0];
    }
    function capNhatTonKho($sohd)
    {
        $db = new connect();

        // Lấy tất cả các mặt hàng từ đơn đặt hàng với số lượng tương ứng
        $select = "SELECT h.mahh, cthd.soluongmua
                   FROM cthoadon cthd
                   JOIN hanghoa h ON cthd.mahh = h.mahh
                   WHERE cthd.masohd = $sohd";
        $result = $db->getList($select);

        while ($row = $result->fetch()) {
            $mahh = $row['mahh'];
            $soluongmua = $row['soluongmua'];

            // Cập nhật hàng tồn kho trong bảng cthanghoa
            $capNhatTonKho = "UPDATE cthanghoa
                             SET soluongton = soluongton - $soluongmua
                             WHERE idhanghoa = $mahh";
            $db->exec($capNhatTonKho);
        }
    }
    
}

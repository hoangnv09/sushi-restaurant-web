<?php
class hanghoa
{
    // thuộc tính
    // phương thức lấy 8 sản phẩm mới nhất
    function getHangHoaNew()
    {
        // b1: kết nối được với database
        $db = new connect();
        // b2: cần lấy cái gì thì truy vấn cái đó tức là viết lệnh select
        $select = "select a.mahh,a.tenhh,a.soluotxem,b.hinh,b.dongia,b.giamgia from hanghoa a,cthanghoa b WHERE a.mahh=b.idhanghoa AND giamgia=0 ORDER by a.mahh DESC limit 8";
        // b3: ai thực thi câu lệnh select? query nằm trong getList, mà getList thuộc về lớp connect
        $result = $db->getList($select);
        return $result; // đã lấy được dữ liệu là 8 sản phẩm mới nhất
    }
    function getHangHoaSale()
    {
        // b1: kết nối với database
        $db = new connect();
        //b2: cần lấy cái gì thì truy vấn cái đó tức là viết lệnh select
        $select = "select a.mahh,a.tenhh,a.soluotxem,b.hinh,b.dongia, b.giamgia from hanghoa a,cthanghoa b WHERE a.mahh=b.idhanghoa and giamgia!=0 ORDER by a.mahh DESC limit 4;";
        //b3: ai thực thi câu lệnh select? query nằm trong getList, mà getList thuộc về lớp connect
        $result = $db->getList($select);
        return $result; // đã lấy được dữ liệu là 4 sản phẩm sale
    }
    function getHangHoaAll()
    {
        //b1: kết nối được với database 
        $db = new connect();
        //b2:cần lấy cái gì thì truy vấn cái đó tức là viết lệnh select
        // $select = "select a.idhanghoa,a.tensp,a.soluotxem,b.hinh,b.dongia 
        // from hanghoa a,cthanghoa b 
        // WHERE a.idhanghoa=b.idhanghoa AND giamgia=0 ORDER by a.idhanghoa DESC ";
        $select = "select a.mahh,a.tenhh,a.soluotxem,b.idhanghoa,b.hinh,b.dongia from hanghoa a,cthanghoa b WHERE a.mahh=b.idhanghoa AND giamgia=0 ORDER by a.mahh DESC ";
        //b3: ai thực thi câu lệnh select? query nằm trong getlist, mà getlist thuộc về lớp connect
        $result = $db->getList($select);
        return $result; //đã lấy được dữ liệu là  sản phẩm mới nhất
    }
    function getHangHoaAllSale()
    {
        // b1: kết nối được với dữ liệu
        $db = new connect();
        // b2: cần lấy cái gì thì truy vấn cái đó
        $select = "select a.mahh,a.tenhh,a.soluotxem,b.hinh,b.dongia,b.giamgia from hanghoa a,cthanghoa b WHERE a.mahh=b.idhanghoa and b.giamgia!=0 ORDER by a.mahh DESC";
        // b3: ai truy vấn select?query nằm trong 2 pt getList và getInstance, mà 2 pt nằm trong
        // class connnect, cần tạo đt gọi pt
        $result = $db->getList($select);
        return $result; // trả về được 14 sản phẩm
    }
    //phương thức đếm số lượng trên trang 14 sản phẩm
    function getCountHangHoaAll()
    {
        //b1: kết nối được với database 
        $db = new connect();
        //b2:cần lấy cái gì thì truy vấn cái đó tức là viết lệnh select
        $select = "select count(a.mahh) 
        from hanghoa a,cthanghoa b 
        WHERE a.mahh=b.idhanghoa AND giamgia=0 ORDER by a.mahh DESC ";
        //b3: ai thực thi câu lệnh select? query nằm trong getlist, mà getlist thuộc về lớp connect
        $result = $db->getInstance($select);
        return $result; //array(count:14);//số 14


    }
    //phương thức phân trang cho 14 sản phẩm
    function getHangHoaAllPage($start, $limit)
    {
        // b1: kết nối được với dữ liệu
        $db = new connect();
        // b2: cần cái gì thì truy vấn vào cái đó
        $select = "SELECT a.mahh, a.tenhh, a.soluotxem, b.hinh, b.dongia, b.giamgia
           FROM hanghoa a, cthanghoa b
           WHERE a.mahh = b.idhanghoa 
           ORDER BY a.mahh DESC
           LIMIT " . $start . "," . $limit;

        // b3: ai truy vấn select? query nằm trong 2 pt getlist và getInstance, mà 2 pt nằm trong class connect, cần tạo đt gọi pt
        $result = $db->getList($select);
        return $result; // trả về được 14 sản phẩm
    }
    // phương thức lấy thông tin 1 sản phẩm
    function getHangHoaId($id)
    {
        $db = new connect();
        $select = "select DISTINCT a.mahh,a.tenhh,a.mota,b.dongia,b.soluongton,b.giamgia from hanghoa a,cthanghoa b WHERE a.mahh=b.idhanghoa and a.mahh=$id";
        $result = $db->getInstance($select);
        return $result; // trả về đúng 1 row dạng array(mahh:24,tenhh:giày...)
    }
    // phương thức để lấy hình 1 id
    function getHangHoaHinh($id)
    {
        $db = new connect();
        $select = "SELECT DISTINCT a.hinh 
        from cthanghoa a WHERE a.idhanghoa=$id";
        $result = $db->getInstance($select);
        return $result;
    }
    function getHHtheoLoai($idloai)
    {
        //b1: kết nối được với database 
        $db = new connect();
        //b2:cần lấy cái gì thì truy vấn cái đó tức là viết lệnh select
        $select = "select a.mahh,a.tenhh,a.soluotxem,b.hinh,b.dongia, b.giamgia , c.maloai,c.tenloai
        from hanghoa a,cthanghoa b, loai c
        WHERE a.mahh=b.idhanghoa  AND a.maloai=c.maloai AND c.maloai=$idloai ORDER by a.mahh DESC ";

        //b3: ai thực thi câu lệnh select? query nằm trong getlist, mà getlist thuộc về lớp connect
        $result = $db->getList($select);
        return $result; //đã lấy được dữ liệu là  sản phẩm mới nhất
    }
    // phương thức láy tên loai
    function getTenLoai($idmenu)
    {
        $db = new connect();
        //b2:cần lấy cái gì thì truy vấn cái đó tức là viết lệnh select
        $select = "select a.maloai,a.tenloai from loai a where a.idmenu=$idmenu";
        //b3: ai thực thi câu lệnh select? query nằm trong getlist, mà getlist thuộc về lớp connect
        $result = $db->getList($select);
        return $result; //đã
    }
    function getTnMenu()
    {
        $db = new connect();
        //b2:cần lấy cái gì thì truy vấn cái đó tức là viết lệnh select
        $select = "select a.idmenu,a.tenmenu,a.menu from menu a ";
        //b3: ai thực thi câu lệnh select? query nằm trong getlist, mà getlist thuộc về lớp connect
        $result = $db->getList($select);
        return $result; //đã
    }
    function timkiemSP($timkiem){
        $db=new connect();
        $select="SELECT a.mahh,a.tenhh,a.soluotxem,b.giamgia,b.dongia,b.hinh FROM hanghoa a,cthanghoa b where a.mahh=b.idhanghoa and b.giamgia=0 and tenhh like '%$timkiem%' order by a.mahh DESC";
       
        $result=$db->getList($select);
        return $result;
    }

}

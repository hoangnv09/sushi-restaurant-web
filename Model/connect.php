<?php
class connect{
    //thuộc tính
    var $db=null;
    // hàm tạo, hàm tạo được gọi khi chúng ta tạo 1 đối tượng
    function __construct()
    {
        // vì mỗi lần tạo đối tượng từ connect thì sẽ kết nối với dữ liệu
        $dsn='mysql:host=localhost;dbname=shopsushi';
        $user='root';
        $pass='';// nếu xài xamp, wamp thì $pass='',còn lại $pass='root';
        // muốn kết nối thì dùng class PDO hoặc mysql
        try {
            $this->db=new PDO($dsn,$user,$pass,array(PDO::MYSQL_ATTR_INIT_COMMAND=>'SET NAMES utf8'));
            // echo "kết nối thành công";
        } catch (\Throwable $th) {
            //throw $th;
            echo "kết nối xém thành công";
            echo $th;
        }
    }
    // phuwont thức trả về 1 dòng dữ liệu
    function getInstance($select)
    {
        $results=$this->db->query($select); // 1 dòng
        // do trả về 1 dòng, nên fetch() để lấy dữ liệu dòng đó
        $result=$results->fetch();// $result là array(thuộc tính 1: giá trị 1, thuộc tính 2: giá trị 2...)
        return $result;// trả về 1 array chứa 1 dòng
        
    }
    // câu lệnh select ai thực thi? phương thức query, pt này thuộc về class nào PDO
    // phương thức trả về nhiều dòng dữ liệu
    function getList($select)
    {
        $results=$this->db->query($select);
        return $results;// trả về nhiều dòng tức là 1 mảng
    }
    
    // nếu câu lệnh là insert, update, delete thì dùng exec
    function exec($query)
    {
        $results=$this->db->exec($query);
        return $results;
    }
    // prepare thực thi tất cả
    function execp($query)
    {
        $statement = $this->db->prepare($query);
        return $statement;
    }

}
?>
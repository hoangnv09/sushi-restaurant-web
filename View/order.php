<div class="table-responsive">
  <?php
  if (!isset($_SESSION['makh'])):
    echo '<sript> alert("Bạn phải dăng nhập");</sript>';
    echo '<meta http-equiv="refresh" content="0; url=../index.php?action=dangnhap"/>';
  ?>
  <?php
  else :
  ?>
    <form action="" method="post">
      <table class="table table-bordered" border="0">
        <?php
        if (isset($_SESSION['masohd'])) {
          // view đòi hỏi là phải có thông tin thì mới hiển thị lên
          $masohd = $_SESSION['masohd'];
          $hd = new hoadon();
          $kh = $hd->selectThongTinKH($masohd);
          $tenkh = $kh['tenkh'];
          $ngay = $kh['ngaydat'];
          $dc = $kh['diachi'];
          $sodt = $kh['sodienthoai'];
        ?>
          <tr>
            <td colspan="4">
              <h2 style="color: red;">HÓA ĐƠN</h2>
            </td>
          </tr>
          <tr>
            <td colspan="2">Số Hóa đơn: <?php echo $masohd; ?></td>
            <td colspan="2"> Ngày lập: <?php echo $ngay; ?></td>
          </tr>
          <tr>
            <td colspan="2">Họ và tên: </td>
            <td colspan="2"><?php echo $tenkh; ?></td>
          </tr>
          <tr>
            <td colspan="2">Địa chỉ: </td>
            <td colspan="2"><?php echo $dc; ?></td>
          </tr>
          <tr>
            <td colspan="2">Số điện thoại: </td>
            <td colspan="2"><?php echo $sodt; ?></td>
          </tr>

      </table>
      <!-- Thông tin sản phầm -->
      <table class="table table-bordered">
        <thead>

          <tr class="table-success">
            <th>Số TT</th>
            <th>Thông Tin Sản Phẩm</th>
            <!-- <th>Tùy Chọn Của Bạn</th> -->
            <th>Giá</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $j = 0;
          $sp = $hd->selectThongTinHoaDon($masohd);
          while ($set = $sp->fetch()) :
            $j++;
          ?>
            <tr>
              <td><?php echo $j; ?></td>
              <td><?php echo $set['tenhh']; ?></td>
              <!-- <td>Màu:  Size: </td> -->
              <td>Đơn Giá: <?php echo number_format($set['dongia']); ?>
                - Số Lượng: <?php echo $set['soluongmua']; ?><br />
              </td>
            </tr>
          <?php
          endwhile;
          ?>
          <tr>
            <td colspan="2">
              <b>Tổng Tiền</b>
            </td>
            <td style="float: right;">
              <b>
                <?php
                $tt=$hd->selectTongTien($masohd);
                echo  number_format($tt);
        } 
                ?>
                <sup><u>đ</u></sup></b>
            </td>
          
          </tr>
        </tbody>
      </table>
    </form>
  <?php
  endif;
  ?>
</div>
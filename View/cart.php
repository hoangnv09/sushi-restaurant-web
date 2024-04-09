<div class="table-responsive">
  <?php
  if (isset($_SESSION['cart']) && count($_SESSION['cart']) > 0) {
  ?>
    <form action="index.php?action=giohang&act=update_cart" method="post">
      <table class="table table-bordered">
        <thead>
          <tr>
            <td colspan="5">
              <h2 style="color: red;font-weight:bold;text-align:center;">THÔNG TIN GIỎ HÀNG</h2>
            </td>
          </tr>
          <tr class="table-success">
            <th>Số TT</th>
            <th>Thông Tin Sản Phẩm</th>
            <th>Tùy Chọn Của Bạn</th>
            <th >Giá</th>
            <th><button type="submit" class="btn btn-secondary">Sửa</button></th>
          </tr>
        </thead>
        <tbody>
          <?php
          $j = 0;
          foreach ($_SESSION['cart'] as $key => $item) {
            $j++;
          ?>
            <tr>
              <td><?php echo $j; ?></td>
              <td><img width="100px" height="100px" src="Content/images/<?php echo $item['hinh']; ?>"><br><?php echo $item['tenhh']; ?></td>

              <td>Đơn Giá: <?php echo number_format($item['dongia']); ?> <br>
                Số Lượng:
                <input type="text" name="newqty[]" value="<?php echo $item['soluong']; ?>" /><br />

              </td>
              <td>
                <p style="float: right;"> Thành Tiền: <?php echo number_format($item['thanhtien']); ?><sup><u>đ</u></sup></p>
              </td>
              <td><a href="index.php?action=giohang&act=delete_cart&id=<?php echo $key; ?>"><button type="button" class="btn btn-danger">Xóa</button></a>

                

              </td>
            </tr>
          <?php
          }
          ?>
          <tr>
            <td colspan="3">
              <b>Tổng Tiền</b>
            </td>
            <td style="float: right;">
              <b>
                <?php
                $gh = new giohang();
                echo $gh->getSubTotal();
                ?>
                <sup><u>đ</u></sup></b>
            </td>
            <td><a href="index.php?action=thanhtoan">Thanh toán</a></td>
          </tr>
        </tbody>
      </table>
    </form>
  <?php
  } else {
    echo '<script> alert("Bạn chưa có hàng")</script>';
    echo '<meta http-equiv="refresh" content="0;url=../index.php?action=home"/>';
  }
  ?>
</div>
<style>
  .table {
    margin-top: 10px;

  }

  tr {
    font-size: 15px;
  }

  button.btn-danger,
  button.btn-secondary {
    font-size: medium;
    border-radius: 5px;
  }
</style>
<?php
include 'inc/header.php';
?>
<?php
if(isset($_GET['orderId']) && $_GET['orderId']=='order')
{
    $customer_id = Session::get('customer_id');
    $insertOrder = $ct -> insertOrder($customer_id);
    $delCart = $ct -> del_all_data_cart();
    header('Location:success.php');
}
// if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit']))
// {
// 	$quantity = $_POST['quantity'];
//     $AddtoCart = $ct->add_to_cart($quantity,$id);
// }
?>
<hr style="margin-top: 40px;">
<form action="" method="">
<div class="container">
  <div class="row">
    <div class="col-md-8">
      <!-- Bảng đăng ký tài khoản -->
      <div class="card mb-3" style="max-width: 800px; margin-top: 35px">
      <div class="box-title_title bg-light text-center" >
   				<h4><img src="" style="height:10px;"><strong>Thông Tin Hóa Đơn</strong></h4>
   		</div>
            <table class="table">
                <thead>
                    <tr>
                     <th scope="col">Hình Ảnh</th>
                     <th scope="col">Tên Sách</th>
                     <th scope="col">Số Lượng</th>
                     <th scope="col">Giá</th>
                    </tr>
                </thead>
                <?php                        
		            $get_product_cart = $ct -> get_product_cart();
		            if($get_product_cart){
                       $subtotal = 0;
                       $total_quantity = 0;
			           while($result = $get_product_cart->fetch_assoc()){
                            $total = $result['gia'] * $result['soluong'];
                            $total_quantity += $result['soluong'];
                            $subtotal += $total;
                            $vat = $subtotal *0.05;
                            $gtotal = $subtotal + $vat;                        
	             ?>
                <tbody>
                    <tr>
                     <td><img style="width: 100px; height:100px;" src="admin/uploads/<?php echo $result['hinhanh']?>"></td>
                     <td><?php echo $result['ten_sp']?></td>
                     <td><?php echo $result['soluong']?></td>
                     <td><?php echo number_format(($total),0,',','.').' đ'?></td>
                    </tr>
                </tbody>
                <?php
                       }
                    }
                ?>
            </table>
            <h5 class="text-end" style="margin-right: 35px">5% thuế VAT</h5>
            <h5 class="text-end" style="margin-right: 35px">
                <?php 
                    if($get_product_cart){
                        echo 'Tổng tiền: '.number_format(($gtotal),0,',','.').' đ';
                     }else{
                        echo '0 đồng';
                     }
                ?>
            </h5>
      </div>
    </div>
    <div class="col-md-4">
      <!-- Bảng đăng nhập tài khoản -->
      <div class="card mb-3" style="max-width: 600px; margin-top: 35px">
      <div class="box-title_title bg-light text-center" >
   				<h4><img src="" style="height:10px;"><strong>Thông tin khách hàng</strong></h4>
   		</div>
            <table class="table">
            <?php
                    $id = Session::get('customer_id');
                    $get_customers = $cs -> show_customers($id);
                    if($get_customers){
                        while($result = $get_customers->fetch_assoc()){
                    ?>
                <tr>
					<th>Họ và Tên: </th>
					<td><?php echo $result['tenkhachhang']?></td>
				</tr>
                <tr>
					<th>Email: </th>
					<td><?php echo $result['email']?></td>
				</tr>
				<tr>
					<th>Số điện thoại: </th>
					<td><?php echo $result['sdt']?></td>
				</tr>
                <tr>
					<th>Thành phố: </th>
					<td><?php echo $result['thanhpho']?></td>
				</tr>
				<tr>
					<th>Địa chỉ: </th>
					<td><?php echo $result['diachi']?></td>
                </tr>
                <?php
                        }
                    }
                    ?>
            </table>
      </div>
    </div>
  </div>
  <?php
  if ($get_customers==false){
    echo '<div><a href="login.php"><button type="button" class="btn btn-dark" id="liveToastBtn">Hãy đăng nhập và đăng ký tài khoản để mua hàng</button></a></div>';
  }else{
  
  echo '<div>
  <a href="?orderId=order"><button type="button" class="btn btn-dark" id="liveToastBtn">Thanh Toán Khi Nhận Hàng</button></a>
  <form action="congthanhtoan.php" method="POST">
    <input type="hidden" name="total_congthanhtoan" value="<?php echo $gtotal?>">
    <button class="btn btn-dark" name="redirect" id="redirect">Thanh Toán QR MOMO</button>
  </form>
  </div>'
  ;}
  ?>
</div>
</form>
<hr style="margin-top: 70px;">
<?php
include 'inc/footer.php';
?>
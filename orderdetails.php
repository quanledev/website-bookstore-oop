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
$ct = new cart();
if(isset($_GET['confirmid'])){
    $id = $_GET['confirmid'];
    $time = $_GET['time'];
    $price = $_GET['price'];
    $shifted_confirm = $ct->shifted_confirm($id,$time,$price);
}
// if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit']))
// {
// 	$quantity = $_POST['quantity'];
//     $AddtoCart = $ct->add_to_cart($quantity,$id);
// }
?>
<?php
    $login_check = Session::get('customer_login');
	if($login_check==false){
		header('Location:login.php');
	}
?> 
<hr style="margin-top: 40px;">
<form action="" method="">
<div class="container">
  <div class="row">
    <div class="col-md-14">
      <!-- Bảng đăng ký tài khoản -->
      <div class="card mb-3" style="max-width: 1600px; margin-top: 35px">
      <div class="box-title_title bg-light text-center">
   				<h4><img src="" style="height:10px;"><strong>Thông Tin Hóa Đơn</strong></h4>
   		</div>
            <table class="table" style="margin-top: 15px">
                <thead>
                    <tr>
                     <th scope="col">ID</th>
                     <th scope="col">Hình Ảnh</th>
                     <th scope="col">Tên Sách</th>
                     <th scope="col">Số Lượng</th>
                     <th scope="col">Giá</th>
                     <th scope="col">Ngày Đặt</th>
                     <th scope="col">Tình Trạng</th>
                     <th scope="col">Hành Động</th>
                    </tr>
                </thead>
                <?php
                    $customer_id = Session::get('customer_id');                        
		            $get_cart_ordered = $ct -> get_cart_ordered($customer_id);
		            if($get_cart_ordered){
                       $total_quantity = 0;
                       $i = 0;
			           while($result = $get_cart_ordered->fetch_assoc()){
                        $i++;
                            $total = $result['gia'] * $result['soluong'];
                            // $total_quantity += $result['quantity'];
                            // $subtotal += $total;
                            // $vat = $subtotal *0.05;
                            // $gtotal = $subtotal + $vat;                        
	             ?>
                <tbody>
                    <tr>
                     <td><?php echo $i; ?></td>
                     <td><img style="width: 100px; height:100px;" src="admin/uploads/<?php echo $result['hinhanh']?>"></td>
                     <td><?php echo $result['ten_sp']?></td>
                     <td><?php echo $result['soluong']?></td>
                     <td><?php echo number_format($result['gia'],0,',','.').' đ'?></td>
                     <td><?php echo $fm-> formatDate($result['ngaylap_hdx'])?></td>
                     <td><?php 
                        if($result['status']=='0')
                        {
                            echo 'Đang xử lý';
                        }
                        elseif($result['status']=='1')
                        {
                        ?>
                        <a href="?confirmid=<?php echo $customer_id?>&price=<?php echo $result['gia']?>&time=<?php echo $result['ngaylap_hdx']?>">Đang giao hàng</a>
                        <?php
                        }else
                        {
                            echo 'Đã nhận hàng';
                        }
                     ?></td>
                     <?php 
                        if($result['status']=='0'){
                    ?>
                    <td>
                        <?php echo 'N/A'?></a>
                    </td>
                    <?php
                        }else{
                    ?>
                            <td><a style="text-decoration: none;" onclick="return confirm('Bạn có muốn xóa sản phẩm này ?');" href="?cartid=<?php echo $result['id_sp']?>">Xóa</td>;
                        <?php
                        }
                     ?>
                    </tr>
                </tbody>
                <?php
                       }
                    }
                ?>
            </table>
      </div>
    </div>
</form>
<hr style="margin-top: 70px;">
<?php
include 'inc/footer.php';
?>
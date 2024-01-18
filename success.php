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
?>
<div class="box-title_title bg-light text-center" style="margin-top: 35px" >
   	<h4><img src="" style="height:10px;"><strong>Đặt Hàng Thành Công</strong></h4>
</div>
<?php
$customer_id = Session::get('customer_id');
$get_amount = $ct->getAmountPrice($customer_id);
if($get_amount){
	$amount = 0;
	while($result = $get_amount->fetch_assoc()){
		$price = $result['gia'];
		$amount += $price;
	}
}
?>
<p class="text-center" style="margin-top: 15px">Cảm ơn bạn tin tưởng và chọn sản phẩm của chúng tôi, chúng tôi sẽ liên hệ với bạn sớm nhất!</p>
<p class="text-center" style="margin-top: 15px">
Tổng hóa đơn bạn cần thanh toán là: <?php
$vat = $amount * 0.05;
$total = $vat  + $amount;
echo number_format(($total),0,',','.').' đ';
?>
</p>
<a href="orderdetails.php" style="text-decoration: none;"><b><p class="text-center text-dark" style="margin-top: 15px">Nhấn vô đây để kiểm tra đơn hàng của bạn</p></b></a>
<div style="margin-top: 100px;">
</div>

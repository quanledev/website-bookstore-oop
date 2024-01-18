<?php
include 'inc/header.php';
?>
<?php
if(!isset($_GET['proId']) || $_GET['proId']!=NULL)
{
    $id = $_GET['proId'];
}
if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit']))
{
	$product_stock = $_POST['product_stock'];
	$quantity = $_POST['quantity'];
    $AddtoCart = $ct->add_to_cart($quantity,$product_stock,$id); 
}
?>
<hr style="margin-top: 30px;">
<div class="main">
	<div class= "row">
			<div class="box-title_title bg-light" >
   				<h2><img src="" style="height:30px;"><strong>Chi Tiết Sản Phẩm</strong></h2> 
   			</div>
	</div>
	<?php
		$get_product_details = $product -> get_details($id);
		if($get_product_details){
			while($result_details = $get_product_details->fetch_assoc()){
	?>
	<div class="card mb-3" style="max-width: 1400px; margin-top: 25px">
  		<div class="row g-0">
    		<div class="col-md-4">
      			<img src="admin/uploads/<?php echo $result_details['hinhanh']?>" class="img-fluid rounded-start" alt="...">
    		</div>
    		<div class="col-md-8">
      			<div class="card-body">
        			<h3 class="card-title"><?php echo $result_details['ten_sp']?></h3>
        			<p class="card-text fs-5"><b>Giá:</b> <span class="text-danger"><?php echo number_format(($result_details['gia']),0,',','.').' đ'?></span></p>
        			<p class="card-text"><span style="margin-right: 100px;"><b>Tác Giả:</b> <?php echo $result_details['tacgia']?></span> <b>Nhà xuất bản:</b> <?php echo $result_details['nhaxuatban']?></p>
					<p class="card-text"> <b>Số lượng hàng:</b> <?php echo $result_details['soluong']?></p>
					<form action="" method = "post">
						<span style="margin-right: 30px;">Chọn số lượng:</span><input type="number" class="buyfield" name="quantity" value="1" min="1"><br><br>
						<input type="hidden" name="product_stock" value="<?php echo $result_details['soluong']?>" class="buyfield">
						<button type="submit" class="btn btn-danger" name="submit">Mua sản phẩm</button><br>
						<?php
							if(isset($AddtoCart))
							{
								echo $AddtoCart;
							}
						?>
					</form>
      			</div>
    		</div>
  		</div>
	</div>
	<div class="card">
  		<div class="card-body">
    		<h5 class="card-title"><b>Mô Tả Sản Phẩm</b></h5>
    		<p class="card-text"><?php echo $result_details['mota_sp']?></p>
  		</div>
	</div>
	<?php
			}
		}
	?>
</div>
<hr style="margin-top: 40px;">
<?php
include 'inc/footer.php';
?>
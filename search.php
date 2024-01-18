<?php
include 'inc/header.php';
?>
<?php
if($_SERVER['REQUEST_METHOD'] == 'POST')
{
	$tukhoa = $_POST['tukhoa'];
    $search_product = $product->search_product($tukhoa); 
}
?>
<!--product-->
<div class="main" style="margin-top: 40px;">
    <div class= "container-fluid">
   		<div class= "row">
   			<div class="box-title_title bg-light text-center" >
   				<h2><img src="" style="height:30px;"><strong>Từ khóa tìm kiếm: <?php echo $tukhoa?></strong></h2>
   			</div>
			<?php
				if($search_product){
				while($result = $search_product->fetch_assoc()){
			?>
			<!--Chi tiết sản phẩm-->
     		<div class ="col-md-3 col-sm-6 col-xs-6 wow fadeInUp" style="margin-top:20px;">
        		<div class="item-product text-center">
        			<div class="image">
        				<a href="detail.php"><img src="admin/uploads/<?php echo $result['hinhanh']?>" style="width: 200px; height:200px;" alt=""></a>
        				<h5><?php echo $result['ten_sp']?></h5>
        			</div>
        			<div class="price-c">
        				<b><span class="giamoi"><?php echo number_format($result['gia'],0,',','.').' đ'?></span></b>
        				</p>
        			</div>
        			<a href="giohangIphone 13.html"><button type="button" class="btn btn-danger">Mua hàng</button></a>
        			<a href="details.php?proId=<?php echo $result['id_sp']?>"><button type="button" class="btn btn-light">Sản phẩm</button></a>
        		</div>
    		</div>
			<?php
					}
				}
			?>		
			</div>	 
    					  <hr style="margin-top: 15px;">
    </div>
    <nav aria-label="Page navigation example" style="margin-top:20px">
</div>
<!--end-product-->
<?php
include 'inc/footer.php';
?>
</body>
</html>
<?php
include 'inc/header.php';
include 'inc/slider.php';
?>
<!--product-->
<div class="main" style="margin-top: 40px;">
    <div class= "container-fluid">
   		<div class= "row">
   			<div class="box-title_title bg-light text-center" >
   				<h2><img src="" style="height:30px;"><strong>Sản Phẩm Mới Nhất</strong></h2>
   			</div>
			<?php
				$product_feathered = $product -> getproduct_feathered(); 
				if($product_feathered){
				while($result = $product_feathered->fetch_assoc()){
			?>
			<!--Chi tiết sản phẩm-->
     		<div class ="col-md-3 col-sm-6 col-xs-6 wow fadeInUp" style="margin-top:20px;">
        		<div class="item-product text-center">
        			<div class="image">
        				<a href="#"><img src="admin/uploads/<?php echo $result['hinhanh']?>" style="width: 200px; height:200px;" alt=""></a>
        				<h5><?php echo $result['ten_sp']?></h5>
        			</div>
        			<div class="price-c">
        				<b><span class="giamoi"><?php echo number_format($result['gia'],0,',','.').' đ'?></span></b>
        				</p>
        			</div>
        			<a href="details.php?proId=<?php echo $result['id_sp']?>"><button type="button" class="btn btn-danger">Mua hàng</button></a>
        			<a href="details.php?proId=<?php echo $result['id_sp']?>"><button type="button" class="btn btn-light">Sản phẩm</button></a>
        		</div>
    		</div>
			<?php
					}
				}
			?>		
			</div>	 
    					  <!-- <hr style="margin-top: 15px;"> -->
    </div>
    <nav aria-label="Page navigation example" style="margin-top:20px">
		
		<!--page-product-->
		<ul class="pagination justify-content-center">
			<?php 
			$product_all = $product -> get_all_product();
			$product_count = mysqli_num_rows($product_all);
			$product_button = ceil($product_count/12);
			$i = 1;
			for($i=1; $i<=$product_button; $i++)
			{
				echo '<a class="page-link" style="margin:0 2px;"  href="index.php?trang='.$i.'">'.$i.'</a>';
			}
			?>
  		</ul>
		<!--end-page-product-->
</div>
<!--end-product-->

<?php
include 'inc/footer.php';
?>
</body>
</html>
<?php
include 'inc/header.php';
?>
<?php
if(isset($_GET['cartId']))
{
    $cartId = $_GET['cartId'];
    $delcart = $ct->del_product_cart($cartId);
}
if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit']))
{
    $cartId = $_POST['cartId'];
	$quantity = $_POST['quantity'];
    $update_quantity_cart = $ct->update_quantity_cart($quantity,$cartId);
    if($quantity<=0){
        $delcart = $ct->del_product_cart($cartId);
    }
}
?>
<section class="h-100 h-custom" style="background-color: white;">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12">
                    <div class="card card-registration card-registration-2" style="border-radius: 15px;">
                        <div class="card-body p-0">
                            <div class="row g-0">
                                <div class="col-lg-8">
                                    <div class="p-5">
                                        <div class="d-flex justify-content-between align-items-center mb-5">
                                            <?php
                                            if(isset($_GET['congthanhtoan'])=='momo'){
                                            ?>
                                            <h1 class="fw-bold mb-0 text-black">Thanh toán bằng momo</h1>
                                            <?php
                                            }
                                            ?>
                                        </div>
                                        <div class="row mb-4 d-flex justify-content-between align-items-center">
                                            <div class="col-md-2 col-lg-2 col-xl-2">
                                                <h6>Hình ảnh</h6>
                                            </div>
                                            <div class="col-md-3 col-lg-3 col-xl-3">
                                                <h6 class="text-muted">Tên sách</h6>
                                            </div>
                                            <div class="col-md-3 col-lg-3 col-xl-2 d-flex">
                                                <h6>Số lượng</h6>
                                            </div>
                                            <div class="col-md-3 col-lg-2 col-xl-2 offset-lg-1">
                                                <h6 class="mb-0">Giá</h6>
                                            </div>
                                            <div class="col-md-1 col-lg-1 col-xl-1 text-end">
                                                <h6>Xóa</h6>
                                            </div>
                                        </div>
                                            <hr class="my-4">
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
                                        <div class="row mb-4 d-flex justify-content-between align-items-center">
                                            <div class="col-md-2 col-lg-2 col-xl-2">
                                                <img src="admin/uploads/<?php echo $result['hinhanh']?>" class="img-fluid rounded-3" alt="Cotton T-shirt">
                                            </div>
                                            <div class="col-md-3 col-lg-3 col-xl-3">
                                                <h6 class="text-muted"><?php echo $result['ten_sp']?></h6>
                                            </div>
                                            <div class="col-md-3 col-lg-3 col-xl-2 d-flex">
                                                <form action="" method="POST">
                                                    <input type="hidden" class="buyfield" name="cartId" value="<?php echo $result['id_pdh']?>" min="0" style="width: 70px;">
                                                    <input type="number" class="buyfield" name="quantity" value="<?php echo $result['soluong']?>" min="0" style="width: 30px;">
                                                    <button type="submit" class="btn btn-danger" name="submit" style="width: 70px;">Thêm</button><br>
                                                </form>
                                            </div>
                                            <?php
                                             
                                            ?>
                                            <div class="col-md-3 col-lg-2 col-xl-2 offset-lg-1">
                                                <h6 class="mb-0"><?php echo number_format(($total),0,',','.').' đ'?></h6>
                                            </div>
                                            <div class="col-md-1 col-lg-1 col-xl-1 text-end">
                                                <a href="?cartId=<?php echo $result['id_pdh']?>" class="text-muted"><i class="fas fa-times"></i></a>
                                            </div>
                                        </div>
                                        <?php
                                                
                                                    }
                                                }
                                                else{
                                                    echo '<p class="text-center">Chưa có sản phẩm trong giỏ hàng</p>';
                                                }
                                        ?>
                                            <hr class="my-4">

                                        <div class="pt-5">
                                            <h6 class="mb-0"><a href="index.php" class="text-body"><i class="fas fa-long-arrow-alt-left me-2"></i>Trở lại cửa hàng</a></h6>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 bg-grey">
                                    <div class="p-5">
                                        <h3 class="fw-bold mb-5 mt-2 pt-1">Tóm lược</h3>
                                        <hr class="my-4">
                                        <div class="d-flex justify-content-between mb-4">
                                            <h5 class="text-uppercase">
                                                <?php 
                                                    if($get_product_cart){
                                                        echo $total_quantity. " sản phẩm";
                                                    }else{
                                                        echo '0 sản phẩm';
                                                    }
                                                ?>
                                            </h5>
                                            <h5>
                                                <?php 
                                                    if($get_product_cart){
                                                        echo number_format(($subtotal),0,',','.').' đ';
                                                    }else{
                                                        echo '0 đồng';
                                                    }
                                                ?>
                                            </h5>
                                        </div>
                                        <!-- <h5 class="text-uppercase mb-3">Cửa hàng gần nhất</h5> -->
                                        <div class="mb-4 pb-2">
                                            <h5 class="text-uppercase mb-3">Thuế: 5%</h5>
                                        </div>
                                        <!-- <div class="mb-4 pb-2">
                                            <select class="select">
                                                <option value="1">Hà Nội</option>
                                                <option value="2">Hồ Chí Minh</option>
                                                <option value="3">Nam Định</option>
                                                <option value="4">Xuân Trường</option>
                                            </select>
                                        </div> -->
                                        <h5 class="text-uppercase mb-3">Mã giảm giá</h5>
                                        <div class="mb-5">
                                            <div class="form-outline">
                                                <input type="text" id="form3Examplea2" class="form-control form-control-lg" />
                                                <label class="form-label" for="form3Examplea2">Nhập mã giảm giá của bạn</label>
                                            </div>
                                        </div>
                                        <hr class="my-4">
                                        <div class="d-flex justify-content-between mb-5">
                                            <h5 class="text-uppercase">Tổng tiền: </h5>
                                            <h5>
                                                <?php 
                                                    if($get_product_cart){
                                                        echo number_format(($gtotal),0,',','.').' đ';
                                                    }else{
                                                        echo '0 đồng';
                                                    }
                                                ?>
                                            </h5>
                                        </div>
                                        <?php
									        $check_cart = $ct -> check_cart();
							 		        if($check_cart==false){
								 		        echo '';
							 		        }else{	
							   			        echo '<a href="payment.php"><button type="button" class="btn btn-dark" id="liveToastBtn">Thanh Toán</button></a>';
									        }
						 		        ?> 
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</section>
<div></div>
<?php
include 'inc/footer.php';
?>
</div>

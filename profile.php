<?php
include 'inc/header.php';
?>
<?php
	$login_check = Session::get('customer_login');
	if($login_check==false){
		header('Location:login.php');
	}
?>
<!-- <?php
if(!isset($_GET['proId']) || $_GET['proId']!=NULL)
{
    $id = $_GET['proId'];
}
if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit']))
{
	$quantity = $_POST['quantity'];
    $AddtoCart = $ct->add_to_cart($quantity,$id);
}
?> -->
<hr style="margin-top: 30px;">
<div class="main">
	<div class= "row">
			<div class="box-title_title bg-light" >
   				<h2><img src="" style="height:30px;"><strong>Thông Tin Khách Hàng</strong></h2>
   			</div>
	</div>
    <!--Bảng Thông Tin Khách Hàng-->
    <div class="row" style="margin-top: 30px;">
		<div class="col-md-12">
            <div class="table-responsive">
			    <table class="table table-bordered">
					<?php
                    $id = Session::get('customer_id');
                    $get_customers = $cs -> show_customers($id);
                    if($get_customers){
                        while($result = $get_customers->fetch_assoc()){
                    ?>
				    <thead>
					    <tr>
						    <th scope="col">Họ và Tên</th>
							<td><?php echo $result['tenkhachhang']?></td>
						</tr>
						<tr>
						    <th scope="col">Email</th>
							<td><?php echo $result['email']?></td>
						</tr>
						    <th scope="col">Số điện thoại</th>
							<td><?php echo $result['sdt']?></td>
						<tr>
						    <th scope="col">Địa chỉ</th>
							<td><?php echo $result['diachi']?></td>
						</tr>
                            <th scope="col">Thành phố</th>
							<td><?php echo $result['thanhpho']?></td>
						<tr>
                            <th scope="col">Quốc gia</th>
							<td><?php echo $result['quocgia']?></td>
						</tr>
						<tr>
                            <th scope="col">Zipcode</th>
							<td><?php echo $result['zipcode']?></td>
						</tr>
					    </tr>
				    </thead>
				    <tbody>
						<tr>
							<td colspan="7" style="text-align: center;"><a href="editprofile.php" style="text-decoration: none;">Chỉnh sửa thông tin</a></td>
						</tr>
				    </tbody>
                    <?php
                        }
                    }
                    ?>
			    </table>
            </div>
		</div>
	</div>
	
</div>
<hr style="margin-top: 100px;">
<?php
include 'inc/footer.php';
?>
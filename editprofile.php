<?php
include 'inc/header.php';
?>
<?php
	$login_check = Session::get('customer_login');
	if($login_check==false){
		header('Location:login.php');
	}
?>
<?php
// if(!isset($_GET['proId']) || $_GET['proId']!=NULL)
// {
//     $id = $_GET['proId'];
// }
$id = Session::get('customer_id');
if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['save']))
{
    $UpdateCustomers = $cs->update_customers($_POST,$id);
}
?>
<hr style="margin-top: 30px;">
<div class="main">
	<div class= "row">
			<div class="box-title_title bg-light" >
   				<h2><img src="" style="height:30px;"><strong>Chỉnh Sửa Thông Tin Khách Hàng</strong></h2>
   			</div>
	</div>
    <!--Bảng Thông Tin Khách Hàng-->
    <div class="row" style="margin-top: 30px;">
		<div class="col-md-12">
            <div class="table-responsive">
                <form action="" method="POST">
			    <table class="table table-bordered">
                    <tr>
                        <?php
                            if(isset($UpdateCustomers)){
                                echo '<td colspan="3" style="text-align: center;">'.$UpdateCustomers.'</td>';
                            }
                        ?>
                    </tr>
                    <?php
                        $id = Session::get('customer_id');
                        $get_customers = $cs -> show_customers($id);
                        if($get_customers){
                            while($result = $get_customers->fetch_assoc()){
                    ?>
				    <thead>
					    <tr>
						    <th scope="col">Họ và Tên: </th>
                            <td><input type="text" class="form-control" aria-describedby="basic-addon1" name="name" value="<?php echo $result['tenkhachhang']?>"></td>
						<tr>   
                            <th scope="col">Email</th>
                            <td><input type="text" class="form-control" aria-describedby="basic-addon1" name="email" value="<?php echo $result['email']?>"></td>
                        </tr> 
                        <tr>
						    <th scope="col">Số điện thoại</th>
                            <td><input type="text" class="form-control" aria-describedby="basic-addon1" name="phone" value="<?php echo $result['sdt']?>"></td>
                        </tr>
						    <th scope="col">Địa chỉ</th>
                            <td><input type="text" class="form-control" aria-describedby="basic-addon1" name="address" value="<?php echo $result['diachi']?>"></td>
                        <tr>
                            <th scope="col">Thành phố</th>
                            <td><input type="text" class="form-control" aria-describedby="basic-addon1" name="city" value="<?php echo $result['thanhpho']?>"></td>
                        </tr>
                        <tr>
                            <th scope="col">Quốc gia</th>
                            <td><input type="text" class="form-control" aria-describedby="basic-addon1" name="country" value="<?php echo $result['quocgia']?>"></td>
                        </tr>
                        <tr>
                            <th scope="col">Zipcode</th>
                            <td><input type="text" class="form-control" aria-describedby="basic-addon1" name="zipcode" value="<?php echo $result['zipcode']?>"></td>
					    </tr>
				    </thead>
				    <tbody>
						<tr>
							<td colspan="2" style="text-align: center;"><button type="submit" class="btn btn-danger" name="save" value="save">Lưu thông tin</button></td>
						</tr>
				    </tbody>
                    <?php
                        }
                    }
                    ?>
			    </table>
                </form>
            </div>
		</div>
	</div>
	
</div>
<hr style="margin-top: 100px;">
<?php
include 'inc/footer.php';
?>
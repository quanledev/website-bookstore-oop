<?php
include 'inc/header.php';
?>
<?php
	 $login_check = Session::get('customer_login');
	 if($login_check)
		{
			header('Location:index.php');
		}
?>
<?php
if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) 
{
    $insertCustomers = $cs->insert_customers($_POST);
}
?>
<?php
if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['login']))
{
    $loginCustomers = $cs->login_customers($_POST);
}
?>
<!--Tilte-->
<!-- <div class= "row" style="margin-top: 30px">
			<div class="box-title_title bg-light text-start" >
   				<h3><img src="" style="height:10px;"><strong>Đăng Ký Thành Viên</strong></h3>
   		</div>
       <div class="box-title_title bg-light text-end" >
   				<h3><img src="" style="height:10px;"><strong>Đăng Ký Thành Viên</strong></h3>
   		</div>
</div> -->
<div class="container">
  <div class="row">
    <div class="col-md-8">
      <!-- Bảng đăng ký tài khoản -->
      <div class="card mb-3" style="max-width: 800px; margin-top: 35px">
      <div class="box-title_title bg-light text-center" >
   				<h4><img src="" style="height:10px;"><strong>Đăng Ký Thành Viên</strong></h4>
          <?php
          if(isset($insertCustomers))
          {
            echo $insertCustomers;
          }
          ?>
   		</div>
        <div class="card-body">
          <form class="row g-3" action="" method="POST">
            <div class="col-md-6">
              <label for="inputEmail4" class="form-label">Email</label>
              <input type="email" class="form-control mb-3" id="inputEmail4" name="email">
            </div>
            <div class="col-md-6">
              <label for="inputPassword4" class="form-label">Mật khẩu</label>
              <input type="password" class="form-control mb-3" id="inputPassword4" name="password">
            </div>
            <div class="col-12">
              <label for="inputAddress" class="form-label">Địa chỉ</label>
              <input type="text" class="form-control mb-3" id="inputAddress" name="address" >
            </div>
            <div class="col-6">
              <label for="inputAddress2" class="form-label">Họ và Tên</label>
              <input type="text" class="form-control mb-3" id="inputAddress2" name="name">
            </div>
            <div class="col-6">
              <label for="inputAddress2" class="form-label">Số điện thoại</label>
              <input type="text" class="form-control mb-3" id="inputAddress2" name="phone">
            </div>
            <div class="col-md-6">
              <label for="inputCity" class="form-label">Thành Phố</label>
              <input type="text" class="form-control mb-3" id="inputCity" name="city">
            </div>
            <div class="col-md-4">
              <label for="inputState" class="form-label">Quốc gia</label>
              <select id="inputState" class="form-select mb-3" name="country">
                <option selected>Choose...</option>
                <option>Việt Nam</option>
              </select>
            </div>
            <div class="col-md-2">
              <label for="inputZip" class="form-label">Zipcode</label>
              <input type="text" class="form-control mb-3" id="inputZip" name="zipcode">
            </div>
            <div class="col-12">
              <button type="submit" name="submit" class="btn btn-dark text-light">Đăng Ký</button>
            </div>
          </form>
        </div>
      </div>
    </div>
    <div class="col-md-4">
      <!-- Bảng đăng nhập tài khoản -->
      <div class="card mb-3" style="max-width: 600px; margin-top: 35px">
      <div class="box-title_title bg-light text-center" >
   				<h4><img src="" style="height:10px;"><strong>Đăng Nhập Tài Khoản</strong></h4>
           <?php
          if(isset($loginCustomers))
          {
            echo $loginCustomers;
          }
          ?>
   		</div>
        <div class="card-body">
          <form action="" method="POST">
            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">Email</label>
              <input type="email" class="form-control mb-3" id="exampleInputEmail1" aria-describedby="emailHelp" name="email">
            </div>
            <div class="mb-3">
              <label for="exampleInputPassword1" class="form-label">Mật khẩu</label>
              <input type="password" class="form-control mb-3" id="exampleInputPassword1" name="password">
            </div>
            <div class="mb-3 form-check">
              <input type="checkbox" class="form-check-input" id="exampleCheck1">
              <label class="form-check-label" for="exampleCheck1">Ghi nhớ tôi</label>
            </div>
            <button type="submit" name="login" class="btn btn-dark text-light">Đăng Nhập</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>


<?php
include 'inc/footer.php';
?>
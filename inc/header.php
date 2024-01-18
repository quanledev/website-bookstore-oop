<?php
    include 'lib/session.php';
    Session::init();
	include_once 'lib/database.php';
    include_once 'helpers/format.php';
	spl_autoload_register(function($class){
		include_once "classes/".$class.".php";
	});
	$db = new Database();
	$fm = new Format();
	$ct = new cart();
	$us = new user();
	$cat = new category();
	$cs = new customer();
	$product = new product();
	$post = new post();
	$blog = new blog() 
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Trang chủ - Poco Mart</title>
	<link rel="stylesheet" type="text/css" href="css\bootstrap.css">
    <link rel="stylesheet" type="text/css" href="css\style.css">
	<link rel="stylesheet" type="text/css" href="css\style2.css">
    <link rel="stylesheet" href="fontawesome/css/all.min.css">
</head>
<body>
    <div class="container">
		<!--header-->
        <div class="banner">
			<nav class="navbar navbar-expand-lg navbar-light bg-light">
 				 <div class="container-fluid">
   					 <a class="navbar-brand" href="index.php">
     					 <img src="images\logo.png" alt="" class="img-fluid">
   					 </a>
   					 <div class="collapse navbar-collapse" id="navbarSupportedContent">
     					 <ul class="navbar-nav me-auto mb-2 mb-lg-0">
						  	<li class="nav-item">
								<?php
                                	$customer_id = Session::get('customer_id'); 
									$check_order = $ct -> check_order($customer_id);
							 		if($check_order==false){
								 		echo '';
							 		}else{	
							   			echo '<a class="nav-link active" aria-current="page" href="orderdetails.php" style="padding-left: 25px; padding-right: 25px;"><strong><i class="fa-solid fa-pen-to-square"></i> Đơn Hàng</strong></a>';
									}
						 		?> 
         						 <!-- <a class="nav-link active" aria-current="page" href="index.php" style="padding-left: 25px; padding-right: 25px;"><strong><i class="fa-solid fa-house"></i> Trang Chủ</strong></a> -->
       						 </li>
       						 <li class="nav-item">
         						 <a class="nav-link active" aria-current="page" href="cart.php" style="padding-left: 25px; padding-right: 25px;"><strong><i class="fa-solid fa-cart-shopping"></i> Giỏ Hàng</strong></a>
       						 </li>
							<?php
								if(isset($_GET['customer_id']))
								{
									$delCart = $ct -> del_all_data_cart(); 
									Session::destroy();
								}
							?>
							<li class="nav-item">
								 <?php
								 $login_check = Session::get('customer_login');
								 if($login_check==false)
								 {
									echo '<a class="nav-link active" href="login.php" style="padding-left: 25px; padding-right: 25px;"><strong><i class="fa-solid fa-user"></i> Đăng Nhập</strong></a>';
								 }
								 else
								 {
									echo '<a class="nav-link active" href="?customer_id=' . Session::get('customer_id') . '" style="padding-left: 25px; padding-right: 25px;"><strong><i class="fa-solid fa-user"></i> Đăng Xuất</strong></a>';
								 }
								 ?>
   						   </li>
							<li class="nav-item">
						   <?php
						   		$login_check = Session::get('customer_login');
								if($login_check==false){
									echo '';
								}else{	
         						 echo '<a class="nav-link active" aria-current="page" href="profile.php" style="padding-left: 25px; padding-right: 25px;"><strong><i class="fa-solid fa-address-card"></i> Người Dùng</strong></a>';
								}
							?>
							</li>
       						 <!-- <li class="nav-item dropdown">
         						 <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="padding-left: 25px; padding-right: 25px;">
       						     <strong>Chọn địa điểm quán </strong></a>
         						 <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
       							   <li><a class="dropdown-item" href="#"><strong>Hà Nội</strong></a></li>
           							 <li><a class="dropdown-item" href="#"><strong>Hồ Chí Minh</strong></a></li>
           							 <li><a class="dropdown-item" href="#"><strong>Nam Định</strong></a></li>
                                <li><a class="dropdown-item" href="#"><strong>Cao Đạt (A C E)</strong></a></li>     
       						   </ul>
   						   </li> -->
    				 	 </ul>
						 
     					 <form class="d-flex" action="search.php" method="POST">
       						 <input class="form-control me-2" type="search" placeholder="Sách bạn muốn tìm..." aria-label="Search" style="width: 326px;" name="tukhoa">
       						 <button class="btn btn-outline-success" type="submit" name="search_product">Tìm kiếm</button>
      					</form>
   					 </div>
 				 </div>
			</nav>
		</div>
		<!--end-header-->
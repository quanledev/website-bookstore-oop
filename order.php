<?php
include 'inc/header.php';
?>
<?php
$login_check = Session::get('customer_login');
    if($login_check==false)
	{
		header('Location:login.php');
	}
?>
<div class="box-title_title bg-light text-center" >
   		<h2><img src="" style="height:30px;"><strong>Sản Phẩm Mới Nhất</strong></h2>
</div>
<?php
include 'inc/footer.php';
?>
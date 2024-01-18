<?php
    include '../classes/adminlogin.php'; 
?>
<?php
$class = new adminlogin();
if($_SERVER['REQUEST_METHOD'] == 'POST')
{
    $adminUser = $_POST['adminUser'];
    $adminPass = md5($_POST['adminPass']);

    $login_check = $class->login_admin($adminUser, $adminPass);
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Trang Login Admin</title>
	<link rel="stylesheet" type="text/css" href="css/style3.css">
	<link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
	<script src="https://kit.fontawesome.com/a81368914c.js"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
	<img class="wave" src="images/wave.png">
	<div class="container">
		<div class="img">
			<img src="images/bg.svg">
		</div>
		<div class="login-content">
			<form action="login.php" method="post">
				<img src="images/avatar.svg">
				<h2 class="title">Welcome</h2>
				<span>
					<?php
						if(isset($login_check))
						{
							echo $login_check;
						}
					?>
				</span>
           		<div class="input-div one">
           		   <div class="i">
           		   		<i class="fas fa-user"></i>
           		   </div>
           		   <div class="div">
           		   		<h5>Username</h5>
           		   		<input type="text" class="input" required="" name="adminUser">
           		   </div>
           		</div>
           		<div class="input-div pass">
           		   <div class="i"> 
           		    	<i class="fas fa-lock"></i>
           		   </div>
           		   <div class="div">
           		    	<h5>Password</h5>
           		    	<input type="password" class="input" required="" name="adminPass">
            	   </div>
            	</div>
            	<a href="#">Forgot Password?</a>
            	<input type="submit" class="btn" value="Login">
            </form>
        </div>
    </div>
    <script type="text/javascript" src="js/main.js"></script>
</body>
</html>
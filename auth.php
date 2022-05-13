<!DOCTYPE html>
<html lang="en">
<head>
<title>نظام الرقابة الداخلي</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Cairo:wght@300&display=swap" 
rel="stylesheet">
</head>
<body>
	
    
<?php
session_start();

$host ='localhost';
$user = 'root';
$pass ='';
$db = 'project1';
$contect = mysqli_connect($host,$user,$pass,$db);


if (isset($_POST['user_name'])) {
    $user_name=$_POST['user_name'];
}

if (isset($_POST['password'])) {
    $password=$_POST['password'];
}


if (isset($_POST['submit'])) {

    $_SESSION['username'] = "$user_name" ;

    
$admin = mysqli_query($contect,"select * from `admin` where user_name = '$user_name' && password = '$password'");
$num =mysqli_num_rows($admin);

$emp = mysqli_query($contect,"select * from `employee` where emp_user_name = '$user_name' && emp_password = '$password'");
$num2 =mysqli_num_rows($emp);


if ($num == 1) {
    header("location:./dipley.php");
}else if ($num2 == 1){
        header("location:./emp_page.php");
}else {
    echo "<div class='alert alert-danger' role='alert'>
    اسم المستخدم او كلمة المرور غير صحيحه
  </div>";
}
}

?>
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<form class="login100-form validate-form" id="log-in" method='POST'>
					<span class="login100-form-title p-b-26">
						مرحباً بك
					</span>
                    
					<div class="wrap-input100 validate-input" data-validate = "Valid username is: a@b.c">
						<input class="input100" type="text" name="user_name">
						<span class="focus-input100" data-placeholder="أسم المستخدم"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Enter password">
						<span class="btn-show-pass">
							<i class="zmdi zmdi-eye"></i>
						</span>
						<input class="input100" type="password" name="password">

						<span class="focus-input100" data-placeholder="كلمة المرور"></span>
					</div>

					<div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>

							<button class="login100-form-btn" name="submit">
								تسجيل دخول
							</button>
						</div>
					</div>

					<div class="text-center p-t-115">
						<span class="txt1">
							ليس لديك حساب؟
						</span>

						<a class="txt2" href="./register.php">
							سجل هنا
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>
	

	<div id="dropDownSelect1"></div>
	
<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>
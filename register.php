<?php

include './config.php';
$error="";
error_reporting(0);

session_start();

if (isset($_SESSION['username'])) {
    header("Location: login.php");
}

if (isset($_POST['submit'])) {
	$username = $_POST['username'];
	$kodmelli = $_POST['kodmelli'];
	$email = $_POST['email'];
	$password = md5($_POST['password']);
	$cpassword = md5($_POST['cpassword']);

	if ($password == $cpassword) {
		$sql = "SELECT * FROM users WHERE email='$email'";
		$result = mysqli_query($conn, $sql);
		if (!$result->num_rows > 0) {
			$sql = "INSERT INTO users (username, kodmelli, email, password)
					VALUES ('$username','$kodmelli', '$email', '$password')";
			$result = mysqli_query($conn, $sql);
			if ($result) {
				echo "<script>alert('Wow! User Registration Completed.')</script>";
				$username = "";
				$kodmelli ="";
				$email = "";
				$_POST['password'] = "";
				$_POST['cpassword'] = "";
			} else {
				$error="سامانه دچار اختلال شده است لطفا بعدا مراجعه فرمایید";
			}
		} else {
			echo "<script>alert('Woops! Email Already Exists.')</script>";
		}

	} else {
		$error="رمز عبور یکسان نیست";
	}
}

?>
<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./rigister.css">
	<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://kit.fontawesome.com/644ee7e176.js" crossorigin="anonymous"></script>
    <title>ورود/ثبت نام</title>
</head>
<body>
<div class="container">
		<form action="" method="POST" class="login-email">
            <p class="login-text" style="font-size: 2rem; font-weight: 800;">ثبت نام</p>
			<div class="input-group">
				<input type="text" placeholder="نام و نام خانوادگی" name="username" value="" required>
			</div>
            <div class="input-group">
				<input type="number" placeholder="کد ملی" name="kodmelli" value="" required>
            </div>
			<div class="input-group">
				<input type="email" placeholder="ایمیل" name="email" value="" required>
			</div>
			<div class="input-group">
				<input type="password" placeholder="رمز عبور " name="password" value="" required>
            </div>
            <div class="input-group">
				<input type="password" placeholder="تکرار رمز عبور" name="cpassword" value="" required>
			</div>
			<div class="input-group">
				<button name="submit" class="btn">ثبت نام</button>
			</div>
			<p class="login-register-text">حساب دارید؟<a href="./login.php"> ورود</a></p>
		</form>
	</div>
</body>
</html>
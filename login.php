<?php 

include './config.php';

session_start();

error_reporting(0);

if (isset($_SESSION['username'])) {
    header("Location: welcome.php");
}

if (isset($_POST['submit'])) {
	$kodmelli = $_POST['kodmelli'];
	$password = md5($_POST['password']);

	$sql = "SELECT * FROM users WHERE kodmelli='$kodmelli' AND password='$password'";
	$result = mysqli_query($conn, $sql);
	if ($result->num_rows > 0) {
		$row = mysqli_fetch_assoc($result);
		$_SESSION['username'] = $row['username'];
		header("Location: welcome.php");
	} else {
		echo "<script>alert('Woops! Email or Password is Wrong.')</script>";
	}
}

?>
<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./login.css">
    <script src="https://kit.fontawesome.com/644ee7e176.js" crossorigin="anonymous"></script>
    <title>ورود/ثبت نام</title>
</head>
<body>
<div class="container">
		<form action="" method="POST" class="login-email">
			<p class="login-text" style="font-size: 2rem; font-weight: 800;">ورود</p>
            <div class="input-group">
				<input type="text" placeholder="کد ملی" name="kodmelli" value="" required>
            </div>
			<div class="input-group">
				<input type="password" placeholder="رمز عبور" name="password" value="" required>
			</div>
			<div class="input-group">
				<button name="submit" class="btn">ورود</button>
			</div>
			<p class="login-register-text">حسابی ندارید ؟<a href="register.php"> ساخت حساب</a></p>
		</form>
	</div>

</body>
</html>
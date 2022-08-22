<?php

session_start();

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
</head>
<body>
    <?php echo "<h1>خوش آمدید " . $_SESSION['username'] . "</h1>"; ?>
    <H1>موفق باشید</H1>
    <a href="logout.php">خروج</a>
</body>
</html>

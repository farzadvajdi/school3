<?php 
$server = "localhost";
$kodmelli = "root";
$password = "";
$database = "school 3";
$conn = mysqli_connect($server, $kodmelli, $password, $database);
if (!$conn) {
    die("<script>alert('Connection Failed.')</script>");
}
?>
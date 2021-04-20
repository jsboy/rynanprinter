<?php
$db_host = "localhost"; // Giữ mặc định là localhost
$db_username    = "root"; //Can thay doi theo username truy cap MySQL
$db_password    = "gMGdFP22fN4bmsn";//Can thay doi theo mat khau truy cap MySQL
$db_name    = "partner";// Can thay doi theo ten ban tao cho database

if(function_exists('mysql_connect')) {
    $conn=mysql_connect("localhost", $db_username, $db_password) or die("Không thể kết nối đến MySQL server");
}else {
    $conn=mysqli_connect("localhost", $db_username, $db_password) or die("Cannot connect to Mysql server");
}

$result=mysql_select_db($db_name) or die("Database không tồn tại. Có thể database chưa được tạo!");

?>
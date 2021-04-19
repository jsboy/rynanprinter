<?php
$db_host = "localhost"; // Giữ mặc định là localhost
$db_username    = "root"; //Can thay doi theo username truy cap MySQL
$db_password    = "gMGdFP22fN4bmsn";//Can thay doi theo mat khau truy cap MySQL
$db_name    = "partner";// Can thay doi theo ten ban tao cho database

$conn=mysql_connect("localhost", $db_username, $db_password) or die("Không thể kết nối đến MySQL server");

$result=mysql_select_db($db_name) or die("Database không tồn tại. Có thể database chưa được tạo!");

?>
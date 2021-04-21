<?php
$db_host = "localhost"; // Giữ mặc định là localhost
$db_username    = "dung2021"; //Can thay doi theo username truy cap MySQL
$db_password    = "dung2021";//Can thay doi theo mat khau truy cap MySQL
$db_name    = "partner";// Can thay doi theo ten ban tao cho database

if(function_exists('mysql_connect')) {
    $conn=mysql_connect($db_host, $db_username, $db_password) or die("Không thể kết nối đến MySQL server");
    $result=mysql_select_db($db_name);
}else {
    // $conn = mysqli_connect($db_host, $db_username, $db_password) or die("Cannot connect to Mysql server");
    $conn = new mysqli($db_host, $db_username, $db_password);
    $result=mysqli_select_db($conn,$db_name);
}

// $result=mysql_select_db($db_name) or die("Database không tồn tại. Có thể database chưa được tạo!");

?>
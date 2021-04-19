<?php
$db_host = "localhost"; // Giữ mặc định là localhost
$db_username    = "mnbcc066_partner"; //Can thay doi theo username truy cap MySQL
$db_password    = "partner";//Can thay doi theo mat khau truy cap MySQL
$db_name    = "mnbcc066_partner";// Can thay doi theo ten ban tao cho database

$conn=mysql_connect("localhost", "mnbcc066_partner", "partner") or die("Không thể kết nối đến MySQL server");

$result=mysql_select_db("mnbcc066_partner") or die("Database không tồn tại. Có thể database chưa được tạo!");

?>
<?php
session_start();

date_default_timezone_set('Asia/Bangkok');
setcookie(AboutVisit, time (), $Month) ; 
 $past = time() - 10; 
 //this makes the time 10 seconds ago 
 setcookie(AboutVisit, date("Y-m-d H:i:s"), $past);

header('Content-Type: text/html; charset=UTF-8');
echo '<title>Logout</title>';
if (session_destroy()) 
    require_once ("redirect2.php");
else
    echo "Khong thoat duoc do loi trong qua trinh huy session";
 
echo '<br><a href="./">Click here to back homepage<br></a>';

?> 
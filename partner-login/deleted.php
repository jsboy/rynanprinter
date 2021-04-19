<?
//delete.php

     include "./db_config.php";

$order = "DELETE FROM orderdetails 
          WHERE orderdetailsid='$orderdetailsid'";
mysql_query($order);
header("location:listorders.php");
?>
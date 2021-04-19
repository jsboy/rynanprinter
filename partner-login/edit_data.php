<?
//edit_data.php
      include"./db_config.php";//database connection
$order = "UPDATE members 
          SET fullname='$fullname', 
              user='$user' 
          WHERE 
	      id='$id'";
mysql_query($order);
header("location:edit.php");
?>
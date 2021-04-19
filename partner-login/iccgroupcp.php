<?php
session_start();

date_default_timezone_set('Asia/Bangkok');
 //$_SESSION["FilePath"] = $_SERVER["SCRIPT_NAME"];//$_SERVER["PHP_SELF"];

//echo $_SESSION["FilePath"];

//lay danh sach trace log

// $logs = @mysql_fetch_array( $sql_query );
//echo  @mysql_num_rows( $logs ); die();
if (!file_exists("./db_config.php"))
{

 if (file_exists("install"))
{
header("Location: install/install.php");
exit;
}
else {
echo "File <b>\"install\"</b> không tìm thấy. Vui lòng liên hệ với Webmaster.";
}
}
else{

require ("./db_config.php");

//kiem tra role phai la admin ko thi moi duoc vao trang nay
	if  ( $_SESSION['role'] == "Admin" ) 
{
    $user_id = intval($_SESSION['user_id']);
    $sql_query = @mysql_query("SELECT * FROM members WHERE id='{$user_id}'");
    $member = @mysql_fetch_array( $sql_query );
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">


<html xmlns="http://www.w3.org/1999/xhtml">

<head>

<script src="http://www.google.com/jsapi" type="text/javascript"></script>
   <meta name="keywords" content="rynantech.com, Vjet1000 Printers, Hydrajet, Solujet, Mylan Group, CTP Plates, A reliable and WIFI connected compact size inkjet printer and inks for packaging pringtings with the lowest price on the market">
    <meta name="description" content="rynantech.com, Vjet1000 Printers, Hydrajet, Solujet, Mylan Group, CTP Plates, A reliable and WIFI connected compact size inkjet printer and inks for packaging pringtings with the lowest price on the market">

<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
<title>LIST DOWNLOAD</title>

<link href="https://rynantech.com/products/wp-content/uploads/2019/08/favicon-50x50.png" rel="shortcut icon" type="image/x-icon" />
    <link type="text/css" rel="stylesheet" href="./sites/css/style.css" />
    <link type="text/css" rel="stylesheet" href="./sites/css/vjet.css" />
  <script src='./sites/js/tab.js'></script>

<script type="text/javascript">
 function makesure() {
  if (confirm('Are you sure you want to delete?')) {
    return true;
  }
  else {
    return false;
  }
 }
</script>


</head>

<body  >


<?php
include("header.html");
?>
	<div id="partnerhomeinfo">





        <div id="wrap">
            <div id="container-home">
                <div class="container-row">



<table align="center" id="Table_01" width="800"  border="0" cellpadding="0" cellspacing="0" >

<table border="0" cellpadding="0" cellspacing="0" width="977"  >
	<tr>
		<td bgcolor="#7bc545" class="white">
		<div><p align="justify" class="mem_acc">&nbsp;&nbsp;&nbsp;&nbsp;Cpanel ICC GROUP</p></div>
		<div><p class="welcomeuser"><a href="info.php" class="hrlink"><font size="44" color="#fff" class="rightpn">Welcome <?=$_SESSION['fullname'];?></font></a>&nbsp;<a href="logout.php"><font color="red">[Logout]</font></a></div>
		</td>
	</tr>
</table>


	<div><p class="backtoindex"><a href="/partner-login" class="hrlink"><font size="12" color="#fff" class="rightpnhome">Back to index</p></font></a></div>

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

Today:
<?php

echo date('D Y-m-d H:i:s');

?> 


<div id="menubutton">
<table width="200" border="0" cellpadding="10">
<tr>
<td><a href="/partner-login/iccgroupcre.php" class="hrlink"> <img src="sites/images/createdownload.png" border="0" /></a></td>
</tr>
</table>
</div>


<!-- FIRMWARE -->
<div class="onecolumntitle">
<div class="header">
      <span>FIRMWARE</span>
</div></div>
<div class="tab">
  <button class="tablinks" onclick="openCity(event, 'T500C')">T500C</button>
  <button class="tablinks" onclick="openCity(event, 'T127P')">T127P</button>
  <button class="tablinks" onclick="openCity(event, 'T127H')">T127H</button>
  <button class="tablinks" onclick="openCity(event, 'T127He')">T127He</button>
  <button class="tablinks" onclick="openCity(event, 'T127C')">T127C</button>
  <button class="tablinks" onclick="openCity(event, 'T127E')">T127E</button>
  <button class="tablinks" onclick="openCity(event, 'T127S')">T127S</button>
  <button class="tablinks" onclick="openCity(event, 'T508M')">T508M</button>
  <button class="tablinks" onclick="openCity(event, 'T508MPlus')">T508MPlus</button>
  <button class="tablinks" onclick="openCity(event, 'T254P')">T254P</button>
  <button class="tablinks" onclick="openCity(event, 'T254E')">T254E</button>
</div>


<div id="T500C" class="tabcontent" style="display: block;" >
<table id="tracelog1" width="909" border="0" align="center">
<?php

//echo  @mysql_num_rows( $sql_query ); die();
$logs = @mysql_query("SELECT * from iccgroup where printers like 'T500C' and type like 'Firmware' order by timecreate desc");
while($log = mysql_fetch_array( $logs )){
// Bo gio - chi lay ngay
$date = $log['timecreate'];
$createDate = date('Y-m-d', strtotime($date));

echo "<tr>";
echo "<th>". $log['filename']. "</th>";
echo "<th>". $log['type']. "</th>";
echo "<th><a href=\"http://rynantech.com/partner-login/iccgroupclick.php?id=".$log['id']."\"><img src='http://www.rynantech.com/partner-login/sites/images/dl.png".$row['image_name']."'></a></th>";
echo "<th>". $log['notes']. "</th>";
echo "<th>". $log['views']. "</th>";
echo "<th>". $createDate. "</th>";
echo "<th><a href=\"iccgroupedit.php?id=$log[id]\"><img src='http://www.rynantech.com/partner-login/sites/images/edit.png".$row['image_name']."'></a></th>";
echo "<th><a href=\"iccgroupdel.php?id=$log[id]\" onclick=\"return makesure();\"><img src='http://www.rynantech.com/partner-login/sites/images/delete.png".$row['image_name']."'></a></th>";
//echo "<td>". $log['id']. "</td>";
//echo "<td>". $log['printers']. "</td>";
//echo "<td>". $log['link']. "</td>";
//echo "<td>". $log['lastupdate']. "</td>";
//echo "<td>". $log['views']. "</td>";
//echo "<td><a href=\"http://rynantech.com/partner-login/iccgroup/VJET/$log[link]\" onclick=\"khoa();\">$log[link]</a></td>";

echo "</tr>";
}
?>

</table>
</div>



<div id="T127P" class="tabcontent" style="display: block;" >
<table id="tracelog1" width="909" border="0" align="center">
<?php

//echo  @mysql_num_rows( $sql_query ); die();
$logs = @mysql_query("SELECT * from iccgroup where printers like 'T127P' and type like 'Firmware' order by timecreate desc");
while($log = mysql_fetch_array( $logs )){
// Bo gio - chi lay ngay
$date = $log['timecreate'];
$createDate = date('Y-m-d', strtotime($date));

echo "<tr>";
echo "<th>". $log['filename']. "</th>";
echo "<th>". $log['type']. "</th>";
echo "<th><a href=\"http://rynantech.com/partner-login/iccgroupclick.php?id=".$log['id']."\"><img src='http://www.rynantech.com/partner-login/sites/images/dl.png".$row['image_name']."'></a></th>";
echo "<th>". $log['notes']. "</th>";
echo "<th>". $log['views']. "</th>";
echo "<th>". $createDate. "</th>";
echo "<th><a href=\"iccgroupedit.php?id=$log[id]\"><img src='http://www.rynantech.com/partner-login/sites/images/edit.png".$row['image_name']."'></a></th>";
echo "<th><a href=\"iccgroupdel.php?id=$log[id]\" onclick=\"return makesure();\"><img src='http://www.rynantech.com/partner-login/sites/images/delete.png".$row['image_name']."'></a></th>";
//echo "<td>". $log['id']. "</td>";
//echo "<td>". $log['printers']. "</td>";
//echo "<td>". $log['link']. "</td>";
//echo "<td>". $log['lastupdate']. "</td>";
//echo "<td>". $log['views']. "</td>";
//echo "<td><a href=\"http://rynantech.com/partner-login/iccgroup/VJET/$log[link]\" onclick=\"khoa();\">$log[link]</a></td>";

echo "</tr>";
}
?>

</table>
</div>



<div id="T127H" class="tabcontent">
<table id="tracelog1" width="909" border="0" align="center">
<?php

//echo  @mysql_num_rows( $sql_query ); die();
$logs = @mysql_query("SELECT * from iccgroup where printers like 'T127H' and type like 'Firmware' order by timecreate desc");
while($log = mysql_fetch_array( $logs )){
// Bo gio - chi lay ngay
$date = $log['timecreate'];
$createDate = date('Y-m-d', strtotime($date));

echo "<tr>";
echo "<th>". $log['filename']. "</th>";
echo "<th>". $log['type']. "</th>";
echo "<th><a href=\"http://rynantech.com/partner-login/iccgroupclick.php?id=".$log['id']."\"><img src='http://www.rynantech.com/partner-login/sites/images/dl.png".$row['image_name']."'></a></th>";
echo "<th>". $log['notes']. "</th>";
echo "<th>". $log['views']. "</th>";
echo "<th>". $createDate. "</th>";
echo "<th><a href=\"iccgroupedit.php?id=$log[id]\"><img src='http://www.rynantech.com/partner-login/sites/images/edit.png".$row['image_name']."'></a></th>";
echo "<th><a href=\"iccgroupdel.php?id=$log[id]\" onclick=\"return makesure();\"><img src='http://www.rynantech.com/partner-login/sites/images/delete.png".$row['image_name']."'></a></th>";
//echo "<td>". $log['id']. "</td>";
//echo "<td>". $log['printers']. "</td>";
//echo "<td>". $log['link']. "</td>";
//echo "<td>". $log['lastupdate']. "</td>";
//echo "<td>". $log['views']. "</td>";
//echo "<td><a href=\"http://rynantech.com/partner-login/iccgroup/VJET/$log[link]\" onclick=\"khoa();\">$log[link]</a></td>";

echo "</tr>";
}
?>

</table>
</div>


<div id="T127He" class="tabcontent">
<table id="tracelog1" width="909" border="0" align="center">
<?php

//echo  @mysql_num_rows( $sql_query ); die();
$logs = @mysql_query("SELECT * from iccgroup where printers like 'T127He' and type like 'Firmware' order by timecreate desc");
while($log = mysql_fetch_array( $logs )){
// Bo gio - chi lay ngay
$date = $log['timecreate'];
$createDate = date('Y-m-d', strtotime($date));

echo "<tr>";
echo "<th>". $log['filename']. "</th>";
echo "<th>". $log['type']. "</th>";
echo "<th><a href=\"http://rynantech.com/partner-login/iccgroupclick.php?id=".$log['id']."\"><img src='http://www.rynantech.com/partner-login/sites/images/dl.png".$row['image_name']."'></a></th>";
echo "<th>". $log['notes']. "</th>";
echo "<th>". $log['views']. "</th>";
echo "<th>". $createDate. "</th>";
echo "<th><a href=\"iccgroupedit.php?id=$log[id]\"><img src='http://www.rynantech.com/partner-login/sites/images/edit.png".$row['image_name']."'></a></th>";
echo "<th><a href=\"iccgroupdel.php?id=$log[id]\" onclick=\"return makesure();\"><img src='http://www.rynantech.com/partner-login/sites/images/delete.png".$row['image_name']."'></a></th>";
//echo "<td>". $log['id']. "</td>";
//echo "<td>". $log['printers']. "</td>";
//echo "<td>". $log['link']. "</td>";
//echo "<td>". $log['lastupdate']. "</td>";
//echo "<td>". $log['views']. "</td>";
//echo "<td><a href=\"http://rynantech.com/partner-login/iccgroup/VJET/$log[link]\" onclick=\"khoa();\">$log[link]</a></td>";

echo "</tr>";
}
?>

</table>
</div>
     
<div id="T127C" class="tabcontent">
<table id="tracelog1" width="909" border="0" align="center">
<?php

//echo  @mysql_num_rows( $sql_query ); die();
$logs = @mysql_query("SELECT * from iccgroup where printers like 'T127C' and type like 'Firmware' order by timecreate desc");
while($log = mysql_fetch_array( $logs )){
// Bo gio - chi lay ngay
$date = $log['timecreate'];
$createDate = date('Y-m-d', strtotime($date));

echo "<tr>";
echo "<th>". $log['filename']. "</th>";
echo "<th>". $log['type']. "</th>";
echo "<th><a href=\"http://rynantech.com/partner-login/iccgroupclick.php?id=".$log['id']."\"><img src='http://www.rynantech.com/partner-login/sites/images/dl.png".$row['image_name']."'></a></th>";
echo "<th>". $log['notes']. "</th>";
echo "<th>". $log['views']. "</th>";
echo "<th>". $createDate. "</th>";
echo "<th><a href=\"iccgroupedit.php?id=$log[id]\"><img src='http://www.rynantech.com/partner-login/sites/images/edit.png".$row['image_name']."'></a></th>";
echo "<th><a href=\"iccgroupdel.php?id=$log[id]\" onclick=\"return makesure();\"><img src='http://www.rynantech.com/partner-login/sites/images/delete.png".$row['image_name']."'></a></th>";
//echo "<td>". $log['id']. "</td>";
//echo "<td>". $log['printers']. "</td>";
//echo "<td>". $log['link']. "</td>";
//echo "<td>". $log['lastupdate']. "</td>";
//echo "<td>". $log['views']. "</td>";
//echo "<td><a href=\"http://rynantech.com/partner-login/iccgroup/VJET/$log[link]\" onclick=\"khoa();\">$log[link]</a></td>";

echo "</tr>";
}
?>

</table>
</div>

     
<div id="T127E" class="tabcontent">
<table id="tracelog1" width="909" border="0" align="center">
<?php

//echo  @mysql_num_rows( $sql_query ); die();
$logs = @mysql_query("SELECT * from iccgroup where printers like 'T127E' and type like 'Firmware' order by timecreate desc");
while($log = mysql_fetch_array( $logs )){
// Bo gio - chi lay ngay
$date = $log['timecreate'];
$createDate = date('Y-m-d', strtotime($date));

echo "<tr>";
echo "<th>". $log['filename']. "</th>";
echo "<th>". $log['type']. "</th>";
echo "<th><a href=\"http://rynantech.com/partner-login/iccgroupclick.php?id=".$log['id']."\"><img src='http://www.rynantech.com/partner-login/sites/images/dl.png".$row['image_name']."'></a></th>";
echo "<th>". $log['notes']. "</th>";
echo "<th>". $log['views']. "</th>";
echo "<th>". $createDate. "</th>";
echo "<th><a href=\"iccgroupedit.php?id=$log[id]\"><img src='http://www.rynantech.com/partner-login/sites/images/edit.png".$row['image_name']."'></a></th>";
echo "<th><a href=\"iccgroupdel.php?id=$log[id]\" onclick=\"return makesure();\"><img src='http://www.rynantech.com/partner-login/sites/images/delete.png".$row['image_name']."'></a></th>";
//echo "<td>". $log['id']. "</td>";
//echo "<td>". $log['printers']. "</td>";
//echo "<td>". $log['link']. "</td>";
//echo "<td>". $log['lastupdate']. "</td>";
//echo "<td>". $log['views']. "</td>";
//echo "<td><a href=\"http://rynantech.com/partner-login/iccgroup/VJET/$log[link]\" onclick=\"khoa();\">$log[link]</a></td>";

echo "</tr>";
}
?>

</table>
</div>


     
<div id="T127S" class="tabcontent">
<table id="tracelog1" width="909" border="0" align="center">
<?php

//echo  @mysql_num_rows( $sql_query ); die();
$logs = @mysql_query("SELECT * from iccgroup where printers like 'T127S' and type like 'Firmware' order by timecreate desc");
while($log = mysql_fetch_array( $logs )){
// Bo gio - chi lay ngay
$date = $log['timecreate'];
$createDate = date('Y-m-d', strtotime($date));

echo "<tr>";
echo "<th>". $log['filename']. "</th>";
echo "<th>". $log['type']. "</th>";
echo "<th><a href=\"http://rynantech.com/partner-login/iccgroupclick.php?id=".$log['id']."\"><img src='http://www.rynantech.com/partner-login/sites/images/dl.png".$row['image_name']."'></a></th>";
echo "<th>". $log['notes']. "</th>";
echo "<th>". $log['views']. "</th>";
echo "<th>". $createDate. "</th>";
echo "<th><a href=\"iccgroupedit.php?id=$log[id]\"><img src='http://www.rynantech.com/partner-login/sites/images/edit.png".$row['image_name']."'></a></th>";
echo "<th><a href=\"iccgroupdel.php?id=$log[id]\" onclick=\"return makesure();\"><img src='http://www.rynantech.com/partner-login/sites/images/delete.png".$row['image_name']."'></a></th>";
//echo "<td>". $log['id']. "</td>";
//echo "<td>". $log['printers']. "</td>";
//echo "<td>". $log['link']. "</td>";
//echo "<td>". $log['lastupdate']. "</td>";
//echo "<td>". $log['views']. "</td>";
//echo "<td><a href=\"http://rynantech.com/partner-login/iccgroup/VJET/$log[link]\" onclick=\"khoa();\">$log[link]</a></td>";

echo "</tr>";
}
?>

</table>
</div>


     
<div id="T508M" class="tabcontent">
<table id="tracelog1" width="909" border="0" align="center">
<?php

//echo  @mysql_num_rows( $sql_query ); die();
$logs = @mysql_query("SELECT * from iccgroup where printers like 'T508M' and type like 'Firmware' order by timecreate desc");
while($log = mysql_fetch_array( $logs )){
// Bo gio - chi lay ngay
$date = $log['timecreate'];
$createDate = date('Y-m-d', strtotime($date));

echo "<tr>";
echo "<th>". $log['filename']. "</th>";
echo "<th>". $log['type']. "</th>";
echo "<th><a href=\"http://rynantech.com/partner-login/iccgroupclick.php?id=".$log['id']."\"><img src='http://www.rynantech.com/partner-login/sites/images/dl.png".$row['image_name']."'></a></th>";
echo "<th>". $log['notes']. "</th>";
echo "<th>". $log['views']. "</th>";
echo "<th>". $createDate. "</th>";
echo "<th><a href=\"iccgroupedit.php?id=$log[id]\"><img src='http://www.rynantech.com/partner-login/sites/images/edit.png".$row['image_name']."'></a></th>";
echo "<th><a href=\"iccgroupdel.php?id=$log[id]\" onclick=\"return makesure();\"><img src='http://www.rynantech.com/partner-login/sites/images/delete.png".$row['image_name']."'></a></th>";
//echo "<td>". $log['id']. "</td>";
//echo "<td>". $log['printers']. "</td>";
//echo "<td>". $log['link']. "</td>";
//echo "<td>". $log['lastupdate']. "</td>";
//echo "<td>". $log['views']. "</td>";
//echo "<td><a href=\"http://rynantech.com/partner-login/iccgroup/VJET/$log[link]\" onclick=\"khoa();\">$log[link]</a></td>";

echo "</tr>";
}
?>

</table>
</div>


     
<div id="T508MPlus" class="tabcontent">
<table id="tracelog1" width="909" border="0" align="center">
<?php

//echo  @mysql_num_rows( $sql_query ); die();
$logs = @mysql_query("SELECT * from iccgroup where printers like 'T508MPlus' and type like 'Firmware' order by timecreate desc");
while($log = mysql_fetch_array( $logs )){
// Bo gio - chi lay ngay
$date = $log['timecreate'];
$createDate = date('Y-m-d', strtotime($date));

echo "<tr>";
echo "<th>". $log['filename']. "</th>";
echo "<th>". $log['type']. "</th>";
echo "<th><a href=\"http://rynantech.com/partner-login/iccgroupclick.php?id=".$log['id']."\"><img src='http://www.rynantech.com/partner-login/sites/images/dl.png".$row['image_name']."'></a></th>";
echo "<th>". $log['notes']. "</th>";
echo "<th>". $log['views']. "</th>";
echo "<th>". $createDate. "</th>";
echo "<th><a href=\"iccgroupedit.php?id=$log[id]\"><img src='http://www.rynantech.com/partner-login/sites/images/edit.png".$row['image_name']."'></a></th>";
echo "<th><a href=\"iccgroupdel.php?id=$log[id]\" onclick=\"return makesure();\"><img src='http://www.rynantech.com/partner-login/sites/images/delete.png".$row['image_name']."'></a></th>";
//echo "<td>". $log['id']. "</td>";
//echo "<td>". $log['printers']. "</td>";
//echo "<td>". $log['link']. "</td>";
//echo "<td>". $log['lastupdate']. "</td>";
//echo "<td>". $log['views']. "</td>";
//echo "<td><a href=\"http://rynantech.com/partner-login/iccgroup/VJET/$log[link]\" onclick=\"khoa();\">$log[link]</a></td>";

echo "</tr>";
}
?>

</table>
</div>

<div id="T254P" class="tabcontent">
<table id="tracelog1" width="909" border="0" align="center">
<?php

//echo  @mysql_num_rows( $sql_query ); die();
$logs = @mysql_query("SELECT * from iccgroup where printers like 'T254P' and type like 'Firmware' order by timecreate desc");
while($log = mysql_fetch_array( $logs )){
// Bo gio - chi lay ngay
$date = $log['timecreate'];
$createDate = date('Y-m-d', strtotime($date));

echo "<tr>";
echo "<th>". $log['filename']. "</th>";
echo "<th>". $log['type']. "</th>";
echo "<th><a href=\"http://rynantech.com/partner-login/iccgroupclick.php?id=".$log['id']."\"><img src='http://www.rynantech.com/partner-login/sites/images/dl.png".$row['image_name']."'></a></th>";
echo "<th>". $log['notes']. "</th>";
echo "<th>". $log['views']. "</th>";
echo "<th>". $createDate. "</th>";
echo "<th><a href=\"iccgroupedit.php?id=$log[id]\"><img src='http://www.rynantech.com/partner-login/sites/images/edit.png".$row['image_name']."'></a></th>";
echo "<th><a href=\"iccgroupdel.php?id=$log[id]\" onclick=\"return makesure();\"><img src='http://www.rynantech.com/partner-login/sites/images/delete.png".$row['image_name']."'></a></th>";
//echo "<td>". $log['id']. "</td>";
//echo "<td>". $log['printers']. "</td>";
//echo "<td>". $log['link']. "</td>";
//echo "<td>". $log['lastupdate']. "</td>";
//echo "<td>". $log['views']. "</td>";
//echo "<td><a href=\"http://rynantech.com/partner-login/iccgroup/VJET/$log[link]\" onclick=\"khoa();\">$log[link]</a></td>";

echo "</tr>";
}
?>

</table>
</div>



<div id="T254E" class="tabcontent">
<table id="tracelog1" width="909" border="0" align="center">
<?php

//echo  @mysql_num_rows( $sql_query ); die();
$logs = @mysql_query("SELECT * from iccgroup where printers like 'T254E' and type like 'Firmware' order by timecreate desc");
while($log = mysql_fetch_array( $logs )){
// Bo gio - chi lay ngay
$date = $log['timecreate'];
$createDate = date('Y-m-d', strtotime($date));

echo "<tr>";
echo "<th>". $log['filename']. "</th>";
echo "<th>". $log['type']. "</th>";
echo "<th><a href=\"http://rynantech.com/partner-login/iccgroupclick.php?id=".$log['id']."\"><img src='http://www.rynantech.com/partner-login/sites/images/dl.png".$row['image_name']."'></a></th>";
echo "<th>". $log['notes']. "</th>";
echo "<th>". $log['views']. "</th>";
echo "<th>". $createDate. "</th>";
echo "<th><a href=\"iccgroupedit.php?id=$log[id]\"><img src='http://www.rynantech.com/partner-login/sites/images/edit.png".$row['image_name']."'></a></th>";
echo "<th><a href=\"iccgroupdel.php?id=$log[id]\" onclick=\"return makesure();\"><img src='http://www.rynantech.com/partner-login/sites/images/delete.png".$row['image_name']."'></a></th>";
//echo "<td>". $log['id']. "</td>";
//echo "<td>". $log['printers']. "</td>";
//echo "<td>". $log['link']. "</td>";
//echo "<td>". $log['lastupdate']. "</td>";
//echo "<td>". $log['views']. "</td>";
//echo "<td><a href=\"http://rynantech.com/partner-login/iccgroup/VJET/$log[link]\" onclick=\"khoa();\">$log[link]</a></td>";

echo "</tr>";
}
?>

</table>
</div>




<!-- SOFTWARE -->
<div class="onecolumntitle">
<div class="header">
      <span>SOFTWARE</span>
</div></div>
<div class="tab">
  <button class="tablinks" onclick="openCity(event, 'T500C-sw')">T500C</button>
  <button class="tablinks" onclick="openCity(event, 'T127P-sw')">T127P</button>
  <button class="tablinks" onclick="openCity(event, 'T127H-sw')">T127H</button>
  <button class="tablinks" onclick="openCity(event, 'T127He-sw')">T127He</button>
  <button class="tablinks" onclick="openCity(event, 'T127C-sw')">T127C</button>
  <button class="tablinks" onclick="openCity(event, 'T127E-sw')">T127E</button>
  <button class="tablinks" onclick="openCity(event, 'T127S-sw')">T127S</button>
  <button class="tablinks" onclick="openCity(event, 'T508M-sw')">T508M</button>
  <button class="tablinks" onclick="openCity(event, 'T508MPlus-sw')">T508MPlus</button>
  <button class="tablinks" onclick="openCity(event, 'T254P-sw')">T254P</button>
  <button class="tablinks" onclick="openCity(event, 'T254E-sw')">T254E</button>
</div>


<div id="T500C-sw" class="tabcontent" style="display: block;" >
<table id="tracelog1" width="909" border="0" align="center">
<?php

//echo  @mysql_num_rows( $sql_query ); die();
$logs = @mysql_query("SELECT * from iccgroup where printers like 'T500C' and type like 'software' order by timecreate desc");
while($log = mysql_fetch_array( $logs )){
// Bo gio - chi lay ngay
$date = $log['timecreate'];
$createDate = date('Y-m-d', strtotime($date));

echo "<tr>";
echo "<th>". $log['filename']. "</th>";
echo "<th>". $log['type']. "</th>";
echo "<th><a href=\"http://rynantech.com/partner-login/iccgroupclick.php?id=".$log['id']."\"><img src='http://www.rynantech.com/partner-login/sites/images/dl.png".$row['image_name']."'></a></th>";
echo "<th>". $log['notes']. "</th>";
echo "<th>". $log['views']. "</th>";
echo "<th>". $createDate. "</th>";
echo "<th><a href=\"iccgroupedit.php?id=$log[id]\"><img src='http://www.rynantech.com/partner-login/sites/images/edit.png".$row['image_name']."'></a></th>";
echo "<th><a href=\"iccgroupdel.php?id=$log[id]\" onclick=\"return makesure();\"><img src='http://www.rynantech.com/partner-login/sites/images/delete.png".$row['image_name']."'></a></th>";
//echo "<td>". $log['id']. "</td>";
//echo "<td>". $log['printers']. "</td>";
//echo "<td>". $log['link']. "</td>";
//echo "<td>". $log['lastupdate']. "</td>";
//echo "<td>". $log['views']. "</td>";
//echo "<td><a href=\"http://rynantech.com/partner-login/iccgroup/VJET/$log[link]\" onclick=\"khoa();\">$log[link]</a></td>";

echo "</tr>";
}
?>

</table>
</div>


<div id="T127P-sw" class="tabcontent" style="display: block;" >
<table id="tracelog1" width="909" border="0" align="center">
<?php

//echo  @mysql_num_rows( $sql_query ); die();
$logs = @mysql_query("SELECT * from iccgroup where printers like 'T127P' and type like 'software' order by timecreate desc");
while($log = mysql_fetch_array( $logs )){
// Bo gio - chi lay ngay
$date = $log['timecreate'];
$createDate = date('Y-m-d', strtotime($date));

echo "<tr>";
echo "<th>". $log['filename']. "</th>";
echo "<th>". $log['type']. "</th>";
echo "<th><a href=\"http://rynantech.com/partner-login/iccgroupclick.php?id=".$log['id']."\"><img src='http://www.rynantech.com/partner-login/sites/images/dl.png".$row['image_name']."'></a></th>";
echo "<th>". $log['notes']. "</th>";
echo "<th>". $log['views']. "</th>";
echo "<th>". $createDate. "</th>";
echo "<th><a href=\"iccgroupedit.php?id=$log[id]\"><img src='http://www.rynantech.com/partner-login/sites/images/edit.png".$row['image_name']."'></a></th>";
echo "<th><a href=\"iccgroupdel.php?id=$log[id]\" onclick=\"return makesure();\"><img src='http://www.rynantech.com/partner-login/sites/images/delete.png".$row['image_name']."'></a></th>";
//echo "<td>". $log['id']. "</td>";
//echo "<td>". $log['printers']. "</td>";
//echo "<td>". $log['link']. "</td>";
//echo "<td>". $log['lastupdate']. "</td>";
//echo "<td>". $log['views']. "</td>";
//echo "<td><a href=\"http://rynantech.com/partner-login/iccgroup/VJET/$log[link]\" onclick=\"khoa();\">$log[link]</a></td>";

echo "</tr>";
}
?>

</table>
</div>



<div id="T127H-sw" class="tabcontent">
<table id="tracelog1" width="909" border="0" align="center">
<?php

//echo  @mysql_num_rows( $sql_query ); die();
$logs = @mysql_query("SELECT * from iccgroup where printers like 'T127H' and type like 'software' order by timecreate desc");
while($log = mysql_fetch_array( $logs )){
// Bo gio - chi lay ngay
$date = $log['timecreate'];
$createDate = date('Y-m-d', strtotime($date));

echo "<tr>";
echo "<th>". $log['filename']. "</th>";
echo "<th>". $log['type']. "</th>";
echo "<th><a href=\"http://rynantech.com/partner-login/iccgroupclick.php?id=".$log['id']."\"><img src='http://www.rynantech.com/partner-login/sites/images/dl.png".$row['image_name']."'></a></th>";
echo "<th>". $log['notes']. "</th>";
echo "<th>". $log['views']. "</th>";
echo "<th>". $createDate. "</th>";
echo "<th><a href=\"iccgroupedit.php?id=$log[id]\"><img src='http://www.rynantech.com/partner-login/sites/images/edit.png".$row['image_name']."'></a></th>";
echo "<th><a href=\"iccgroupdel.php?id=$log[id]\" onclick=\"return makesure();\"><img src='http://www.rynantech.com/partner-login/sites/images/delete.png".$row['image_name']."'></a></th>";
//echo "<td>". $log['id']. "</td>";
//echo "<td>". $log['printers']. "</td>";
//echo "<td>". $log['link']. "</td>";
//echo "<td>". $log['lastupdate']. "</td>";
//echo "<td>". $log['views']. "</td>";
//echo "<td><a href=\"http://rynantech.com/partner-login/iccgroup/VJET/$log[link]\" onclick=\"khoa();\">$log[link]</a></td>";

echo "</tr>";
}
?>

</table>
</div>


<div id="T127He-sw" class="tabcontent">
<table id="tracelog1" width="909" border="0" align="center">
<?php

//echo  @mysql_num_rows( $sql_query ); die();
$logs = @mysql_query("SELECT * from iccgroup where printers like 'T127He' and type like 'software' order by timecreate desc");
while($log = mysql_fetch_array( $logs )){
// Bo gio - chi lay ngay
$date = $log['timecreate'];
$createDate = date('Y-m-d', strtotime($date));

echo "<tr>";
echo "<th>". $log['filename']. "</th>";
echo "<th>". $log['type']. "</th>";
echo "<th><a href=\"http://rynantech.com/partner-login/iccgroupclick.php?id=".$log['id']."\"><img src='http://www.rynantech.com/partner-login/sites/images/dl.png".$row['image_name']."'></a></th>";
echo "<th>". $log['notes']. "</th>";
echo "<th>". $log['views']. "</th>";
echo "<th>". $createDate. "</th>";
echo "<th><a href=\"iccgroupedit.php?id=$log[id]\"><img src='http://www.rynantech.com/partner-login/sites/images/edit.png".$row['image_name']."'></a></th>";
echo "<th><a href=\"iccgroupdel.php?id=$log[id]\" onclick=\"return makesure();\"><img src='http://www.rynantech.com/partner-login/sites/images/delete.png".$row['image_name']."'></a></th>";
//echo "<td>". $log['id']. "</td>";
//echo "<td>". $log['printers']. "</td>";
//echo "<td>". $log['link']. "</td>";
//echo "<td>". $log['lastupdate']. "</td>";
//echo "<td>". $log['views']. "</td>";
//echo "<td><a href=\"http://rynantech.com/partner-login/iccgroup/VJET/$log[link]\" onclick=\"khoa();\">$log[link]</a></td>";

echo "</tr>";
}
?>

</table>
</div>
     
<div id="T127C-sw" class="tabcontent">
<table id="tracelog1" width="909" border="0" align="center">
<?php

//echo  @mysql_num_rows( $sql_query ); die();
$logs = @mysql_query("SELECT * from iccgroup where printers like 'T127C' and type like 'software' order by timecreate desc");
while($log = mysql_fetch_array( $logs )){
// Bo gio - chi lay ngay
$date = $log['timecreate'];
$createDate = date('Y-m-d', strtotime($date));

echo "<tr>";
echo "<th>". $log['filename']. "</th>";
echo "<th>". $log['type']. "</th>";
echo "<th><a href=\"http://rynantech.com/partner-login/iccgroupclick.php?id=".$log['id']."\"><img src='http://www.rynantech.com/partner-login/sites/images/dl.png".$row['image_name']."'></a></th>";
echo "<th>". $log['notes']. "</th>";
echo "<th>". $log['views']. "</th>";
echo "<th>". $createDate. "</th>";
echo "<th><a href=\"iccgroupedit.php?id=$log[id]\"><img src='http://www.rynantech.com/partner-login/sites/images/edit.png".$row['image_name']."'></a></th>";
echo "<th><a href=\"iccgroupdel.php?id=$log[id]\" onclick=\"return makesure();\"><img src='http://www.rynantech.com/partner-login/sites/images/delete.png".$row['image_name']."'></a></th>";
//echo "<td>". $log['id']. "</td>";
//echo "<td>". $log['printers']. "</td>";
//echo "<td>". $log['link']. "</td>";
//echo "<td>". $log['lastupdate']. "</td>";
//echo "<td>". $log['views']. "</td>";
//echo "<td><a href=\"http://rynantech.com/partner-login/iccgroup/VJET/$log[link]\" onclick=\"khoa();\">$log[link]</a></td>";

echo "</tr>";
}
?>

</table>
</div>

     
<div id="T127E-sw" class="tabcontent">
<table id="tracelog1" width="909" border="0" align="center">
<?php

//echo  @mysql_num_rows( $sql_query ); die();
$logs = @mysql_query("SELECT * from iccgroup where printers like 'T127E' and type like 'software' order by timecreate desc");
while($log = mysql_fetch_array( $logs )){
// Bo gio - chi lay ngay
$date = $log['timecreate'];
$createDate = date('Y-m-d', strtotime($date));

echo "<tr>";
echo "<th>". $log['filename']. "</th>";
echo "<th>". $log['type']. "</th>";
echo "<th><a href=\"http://rynantech.com/partner-login/iccgroupclick.php?id=".$log['id']."\"><img src='http://www.rynantech.com/partner-login/sites/images/dl.png".$row['image_name']."'></a></th>";
echo "<th>". $log['notes']. "</th>";
echo "<th>". $log['views']. "</th>";
echo "<th>". $createDate. "</th>";
echo "<th><a href=\"iccgroupedit.php?id=$log[id]\"><img src='http://www.rynantech.com/partner-login/sites/images/edit.png".$row['image_name']."'></a></th>";
echo "<th><a href=\"iccgroupdel.php?id=$log[id]\" onclick=\"return makesure();\"><img src='http://www.rynantech.com/partner-login/sites/images/delete.png".$row['image_name']."'></a></th>";
//echo "<td>". $log['id']. "</td>";
//echo "<td>". $log['printers']. "</td>";
//echo "<td>". $log['link']. "</td>";
//echo "<td>". $log['lastupdate']. "</td>";
//echo "<td>". $log['views']. "</td>";
//echo "<td><a href=\"http://rynantech.com/partner-login/iccgroup/VJET/$log[link]\" onclick=\"khoa();\">$log[link]</a></td>";

echo "</tr>";
}
?>

</table>
</div>


     
<div id="T127S-sw" class="tabcontent">
<table id="tracelog1" width="909" border="0" align="center">
<?php

//echo  @mysql_num_rows( $sql_query ); die();
$logs = @mysql_query("SELECT * from iccgroup where printers like 'T127S' and type like 'software' order by timecreate desc");
while($log = mysql_fetch_array( $logs )){
// Bo gio - chi lay ngay
$date = $log['timecreate'];
$createDate = date('Y-m-d', strtotime($date));

echo "<tr>";
echo "<th>". $log['filename']. "</th>";
echo "<th>". $log['type']. "</th>";
echo "<th><a href=\"http://rynantech.com/partner-login/iccgroupclick.php?id=".$log['id']."\"><img src='http://www.rynantech.com/partner-login/sites/images/dl.png".$row['image_name']."'></a></th>";
echo "<th>". $log['notes']. "</th>";
echo "<th>". $log['views']. "</th>";
echo "<th>". $createDate. "</th>";
echo "<th><a href=\"iccgroupedit.php?id=$log[id]\"><img src='http://www.rynantech.com/partner-login/sites/images/edit.png".$row['image_name']."'></a></th>";
echo "<th><a href=\"iccgroupdel.php?id=$log[id]\" onclick=\"return makesure();\"><img src='http://www.rynantech.com/partner-login/sites/images/delete.png".$row['image_name']."'></a></th>";
//echo "<td>". $log['id']. "</td>";
//echo "<td>". $log['printers']. "</td>";
//echo "<td>". $log['link']. "</td>";
//echo "<td>". $log['lastupdate']. "</td>";
//echo "<td>". $log['views']. "</td>";
//echo "<td><a href=\"http://rynantech.com/partner-login/iccgroup/VJET/$log[link]\" onclick=\"khoa();\">$log[link]</a></td>";

echo "</tr>";
}
?>

</table>
</div>


     
<div id="T508M-sw" class="tabcontent">
<table id="tracelog1" width="909" border="0" align="center">
<?php

//echo  @mysql_num_rows( $sql_query ); die();
$logs = @mysql_query("SELECT * from iccgroup where printers like 'T508M' and type like 'software' order by timecreate desc");
while($log = mysql_fetch_array( $logs )){
// Bo gio - chi lay ngay
$date = $log['timecreate'];
$createDate = date('Y-m-d', strtotime($date));

echo "<tr>";
echo "<th>". $log['filename']. "</th>";
echo "<th>". $log['type']. "</th>";
echo "<th><a href=\"http://rynantech.com/partner-login/iccgroupclick.php?id=".$log['id']."\"><img src='http://www.rynantech.com/partner-login/sites/images/dl.png".$row['image_name']."'></a></th>";
echo "<th>". $log['notes']. "</th>";
echo "<th>". $log['views']. "</th>";
echo "<th>". $createDate. "</th>";
echo "<th><a href=\"iccgroupedit.php?id=$log[id]\"><img src='http://www.rynantech.com/partner-login/sites/images/edit.png".$row['image_name']."'></a></th>";
echo "<th><a href=\"iccgroupdel.php?id=$log[id]\" onclick=\"return makesure();\"><img src='http://www.rynantech.com/partner-login/sites/images/delete.png".$row['image_name']."'></a></th>";
//echo "<td>". $log['id']. "</td>";
//echo "<td>". $log['printers']. "</td>";
//echo "<td>". $log['link']. "</td>";
//echo "<td>". $log['lastupdate']. "</td>";
//echo "<td>". $log['views']. "</td>";
//echo "<td><a href=\"http://rynantech.com/partner-login/iccgroup/VJET/$log[link]\" onclick=\"khoa();\">$log[link]</a></td>";

echo "</tr>";
}
?>

</table>
</div>


     
<div id="T508MPlus-sw" class="tabcontent">
<table id="tracelog1" width="909" border="0" align="center">
<?php

//echo  @mysql_num_rows( $sql_query ); die();
$logs = @mysql_query("SELECT * from iccgroup where printers like 'T508MPlus' and type like 'software' order by timecreate desc");
while($log = mysql_fetch_array( $logs )){
// Bo gio - chi lay ngay
$date = $log['timecreate'];
$createDate = date('Y-m-d', strtotime($date));

echo "<tr>";
echo "<th>". $log['filename']. "</th>";
echo "<th>". $log['type']. "</th>";
echo "<th><a href=\"http://rynantech.com/partner-login/iccgroupclick.php?id=".$log['id']."\"><img src='http://www.rynantech.com/partner-login/sites/images/dl.png".$row['image_name']."'></a></th>";
echo "<th>". $log['notes']. "</th>";
echo "<th>". $log['views']. "</th>";
echo "<th>". $createDate. "</th>";
echo "<th><a href=\"iccgroupedit.php?id=$log[id]\"><img src='http://www.rynantech.com/partner-login/sites/images/edit.png".$row['image_name']."'></a></th>";
echo "<th><a href=\"iccgroupdel.php?id=$log[id]\" onclick=\"return makesure();\"><img src='http://www.rynantech.com/partner-login/sites/images/delete.png".$row['image_name']."'></a></th>";
//echo "<td>". $log['id']. "</td>";
//echo "<td>". $log['printers']. "</td>";
//echo "<td>". $log['link']. "</td>";
//echo "<td>". $log['lastupdate']. "</td>";
//echo "<td>". $log['views']. "</td>";
//echo "<td><a href=\"http://rynantech.com/partner-login/iccgroup/VJET/$log[link]\" onclick=\"khoa();\">$log[link]</a></td>";

echo "</tr>";
}
?>

</table>
</div>

<div id="T254P-sw" class="tabcontent">
<table id="tracelog1" width="909" border="0" align="center">
<?php

//echo  @mysql_num_rows( $sql_query ); die();
$logs = @mysql_query("SELECT * from iccgroup where printers like 'T254P' and type like 'software' order by timecreate desc");
while($log = mysql_fetch_array( $logs )){
// Bo gio - chi lay ngay
$date = $log['timecreate'];
$createDate = date('Y-m-d', strtotime($date));

echo "<tr>";
echo "<th>". $log['filename']. "</th>";
echo "<th>". $log['type']. "</th>";
echo "<th><a href=\"http://rynantech.com/partner-login/iccgroupclick.php?id=".$log['id']."\"><img src='http://www.rynantech.com/partner-login/sites/images/dl.png".$row['image_name']."'></a></th>";
echo "<th>". $log['notes']. "</th>";
echo "<th>". $log['views']. "</th>";
echo "<th>". $createDate. "</th>";
echo "<th><a href=\"iccgroupedit.php?id=$log[id]\"><img src='http://www.rynantech.com/partner-login/sites/images/edit.png".$row['image_name']."'></a></th>";
echo "<th><a href=\"iccgroupdel.php?id=$log[id]\" onclick=\"return makesure();\"><img src='http://www.rynantech.com/partner-login/sites/images/delete.png".$row['image_name']."'></a></th>";
//echo "<td>". $log['id']. "</td>";
//echo "<td>". $log['printers']. "</td>";
//echo "<td>". $log['link']. "</td>";
//echo "<td>". $log['lastupdate']. "</td>";
//echo "<td>". $log['views']. "</td>";
//echo "<td><a href=\"http://rynantech.com/partner-login/iccgroup/VJET/$log[link]\" onclick=\"khoa();\">$log[link]</a></td>";

echo "</tr>";
}
?>

</table>
</div>


<div id="T254E-sw" class="tabcontent">
<table id="tracelog1" width="909" border="0" align="center">
<?php

//echo  @mysql_num_rows( $sql_query ); die();
$logs = @mysql_query("SELECT * from iccgroup where printers like 'T254E' and type like 'software' order by timecreate desc");
while($log = mysql_fetch_array( $logs )){
// Bo gio - chi lay ngay
$date = $log['timecreate'];
$createDate = date('Y-m-d', strtotime($date));

echo "<tr>";
echo "<th>". $log['filename']. "</th>";
echo "<th>". $log['type']. "</th>";
echo "<th><a href=\"http://rynantech.com/partner-login/iccgroupclick.php?id=".$log['id']."\"><img src='http://www.rynantech.com/partner-login/sites/images/dl.png".$row['image_name']."'></a></th>";
echo "<th>". $log['notes']. "</th>";
echo "<th>". $log['views']. "</th>";
echo "<th>". $createDate. "</th>";
echo "<th><a href=\"iccgroupedit.php?id=$log[id]\"><img src='http://www.rynantech.com/partner-login/sites/images/edit.png".$row['image_name']."'></a></th>";
echo "<th><a href=\"iccgroupdel.php?id=$log[id]\" onclick=\"return makesure();\"><img src='http://www.rynantech.com/partner-login/sites/images/delete.png".$row['image_name']."'></a></th>";
//echo "<td>". $log['id']. "</td>";
//echo "<td>". $log['printers']. "</td>";
//echo "<td>". $log['link']. "</td>";
//echo "<td>". $log['lastupdate']. "</td>";
//echo "<td>". $log['views']. "</td>";
//echo "<td><a href=\"http://rynantech.com/partner-login/iccgroup/VJET/$log[link]\" onclick=\"khoa();\">$log[link]</a></td>";

echo "</tr>";
}
?>

</table>
</div>





<!-- BROCHURE  -->
<div class="onecolumntitle">
<div class="header">
      <span>BROCHURE</span>
</div></div>
<div class="tab">
  <button class="tablinks" onclick="openCity(event, 'T500C-br')">T500C</button>
  <button class="tablinks" onclick="openCity(event, 'T127P-br')">T127P</button>
  <button class="tablinks" onclick="openCity(event, 'T127H-br')">T127H</button>
  <button class="tablinks" onclick="openCity(event, 'T127He-br')">T127He</button>
  <button class="tablinks" onclick="openCity(event, 'T127C-br')">T127C</button>
  <button class="tablinks" onclick="openCity(event, 'T127E-br')">T127E</button>
  <button class="tablinks" onclick="openCity(event, 'T127S-br')">T127S</button>
  <button class="tablinks" onclick="openCity(event, 'T508M-br')">T508M</button>
  <button class="tablinks" onclick="openCity(event, 'T508MPlus-br')">T508MPlus</button>
  <button class="tablinks" onclick="openCity(event, 'T254P-br')">T254P</button>
  <button class="tablinks" onclick="openCity(event, 'T254E-br')">T254E</button>
</div>



<div id="T500C-br" class="tabcontent" style="display: block;" >
<table id="tracelog1" width="909" border="0" align="center">
<?php

//echo  @mysql_num_rows( $sql_query ); die();
$logs = @mysql_query("SELECT * from iccgroup where printers like 'T500C' and type like 'brochure' order by timecreate desc");
while($log = mysql_fetch_array( $logs )){
// Bo gio - chi lay ngay
$date = $log['timecreate'];
$createDate = date('Y-m-d', strtotime($date));

echo "<tr>";
echo "<th>". $log['filename']. "</th>";
echo "<th>". $log['type']. "</th>";
echo "<th><a href=\"http://rynantech.com/partner-login/iccgroupclick.php?id=".$log['id']."\"><img src='http://www.rynantech.com/partner-login/sites/images/dl.png".$row['image_name']."'></a></th>";
echo "<th>". $log['notes']. "</th>";
echo "<th>". $log['views']. "</th>";
echo "<th>". $createDate. "</th>";
echo "<th><a href=\"iccgroupedit.php?id=$log[id]\"><img src='http://www.rynantech.com/partner-login/sites/images/edit.png".$row['image_name']."'></a></th>";
echo "<th><a href=\"iccgroupdel.php?id=$log[id]\" onclick=\"return makesure();\"><img src='http://www.rynantech.com/partner-login/sites/images/delete.png".$row['image_name']."'></a></th>";
//echo "<td>". $log['id']. "</td>";
//echo "<td>". $log['printers']. "</td>";
//echo "<td>". $log['link']. "</td>";
//echo "<td>". $log['lastupdate']. "</td>";
//echo "<td>". $log['views']. "</td>";
//echo "<td><a href=\"http://rynantech.com/partner-login/iccgroup/VJET/$log[link]\" onclick=\"khoa();\">$log[link]</a></td>";

echo "</tr>";
}
?>

</table>
</div>




<div id="T127P-br" class="tabcontent" style="display: block;" >
<table id="tracelog1" width="909" border="0" align="center">
<?php

//echo  @mysql_num_rows( $sql_query ); die();
$logs = @mysql_query("SELECT * from iccgroup where printers like 'T127P' and type like 'brochure' order by timecreate desc");
while($log = mysql_fetch_array( $logs )){
// Bo gio - chi lay ngay
$date = $log['timecreate'];
$createDate = date('Y-m-d', strtotime($date));

echo "<tr>";
echo "<th>". $log['filename']. "</th>";
echo "<th>". $log['type']. "</th>";
echo "<th><a href=\"http://rynantech.com/partner-login/iccgroupclick.php?id=".$log['id']."\"><img src='http://www.rynantech.com/partner-login/sites/images/dl.png".$row['image_name']."'></a></th>";
echo "<th>". $log['notes']. "</th>";
echo "<th>". $log['views']. "</th>";
echo "<th>". $createDate. "</th>";
echo "<th><a href=\"iccgroupedit.php?id=$log[id]\"><img src='http://www.rynantech.com/partner-login/sites/images/edit.png".$row['image_name']."'></a></th>";
echo "<th><a href=\"iccgroupdel.php?id=$log[id]\" onclick=\"return makesure();\"><img src='http://www.rynantech.com/partner-login/sites/images/delete.png".$row['image_name']."'></a></th>";
//echo "<td>". $log['id']. "</td>";
//echo "<td>". $log['printers']. "</td>";
//echo "<td>". $log['link']. "</td>";
//echo "<td>". $log['lastupdate']. "</td>";
//echo "<td>". $log['views']. "</td>";
//echo "<td><a href=\"http://rynantech.com/partner-login/iccgroup/VJET/$log[link]\" onclick=\"khoa();\">$log[link]</a></td>";

echo "</tr>";
}
?>

</table>
</div>



<div id="T127H-br" class="tabcontent">
<table id="tracelog1" width="909" border="0" align="center">
<?php

//echo  @mysql_num_rows( $sql_query ); die();
$logs = @mysql_query("SELECT * from iccgroup where printers like 'T127H' and type like 'brochure' order by timecreate desc");
while($log = mysql_fetch_array( $logs )){
// Bo gio - chi lay ngay
$date = $log['timecreate'];
$createDate = date('Y-m-d', strtotime($date));

echo "<tr>";
echo "<th>". $log['filename']. "</th>";
echo "<th>". $log['type']. "</th>";
echo "<th><a href=\"http://rynantech.com/partner-login/iccgroupclick.php?id=".$log['id']."\"><img src='http://www.rynantech.com/partner-login/sites/images/dl.png".$row['image_name']."'></a></th>";
echo "<th>". $log['notes']. "</th>";
echo "<th>". $log['views']. "</th>";
echo "<th>". $createDate. "</th>";
echo "<th><a href=\"iccgroupedit.php?id=$log[id]\"><img src='http://www.rynantech.com/partner-login/sites/images/edit.png".$row['image_name']."'></a></th>";
echo "<th><a href=\"iccgroupdel.php?id=$log[id]\" onclick=\"return makesure();\"><img src='http://www.rynantech.com/partner-login/sites/images/delete.png".$row['image_name']."'></a></th>";
//echo "<td>". $log['id']. "</td>";
//echo "<td>". $log['printers']. "</td>";
//echo "<td>". $log['link']. "</td>";
//echo "<td>". $log['lastupdate']. "</td>";
//echo "<td>". $log['views']. "</td>";
//echo "<td><a href=\"http://rynantech.com/partner-login/iccgroup/VJET/$log[link]\" onclick=\"khoa();\">$log[link]</a></td>";

echo "</tr>";
}
?>

</table>
</div>


<div id="T127He-br" class="tabcontent">
<table id="tracelog1" width="909" border="0" align="center">
<?php

//echo  @mysql_num_rows( $sql_query ); die();
$logs = @mysql_query("SELECT * from iccgroup where printers like 'T127He' and type like 'brochure' order by timecreate desc");
while($log = mysql_fetch_array( $logs )){
// Bo gio - chi lay ngay
$date = $log['timecreate'];
$createDate = date('Y-m-d', strtotime($date));

echo "<tr>";
echo "<th>". $log['filename']. "</th>";
echo "<th>". $log['type']. "</th>";
echo "<th><a href=\"http://rynantech.com/partner-login/iccgroupclick.php?id=".$log['id']."\"><img src='http://www.rynantech.com/partner-login/sites/images/dl.png".$row['image_name']."'></a></th>";
echo "<th>". $log['notes']. "</th>";
echo "<th>". $log['views']. "</th>";
echo "<th>". $createDate. "</th>";
echo "<th><a href=\"iccgroupedit.php?id=$log[id]\"><img src='http://www.rynantech.com/partner-login/sites/images/edit.png".$row['image_name']."'></a></th>";
echo "<th><a href=\"iccgroupdel.php?id=$log[id]\" onclick=\"return makesure();\"><img src='http://www.rynantech.com/partner-login/sites/images/delete.png".$row['image_name']."'></a></th>";
//echo "<td>". $log['id']. "</td>";
//echo "<td>". $log['printers']. "</td>";
//echo "<td>". $log['link']. "</td>";
//echo "<td>". $log['lastupdate']. "</td>";
//echo "<td>". $log['views']. "</td>";
//echo "<td><a href=\"http://rynantech.com/partner-login/iccgroup/VJET/$log[link]\" onclick=\"khoa();\">$log[link]</a></td>";

echo "</tr>";
}
?>

</table>
</div>
     
<div id="T127C-br" class="tabcontent">
<table id="tracelog1" width="909" border="0" align="center">
<?php

//echo  @mysql_num_rows( $sql_query ); die();
$logs = @mysql_query("SELECT * from iccgroup where printers like 'T127C' and type like 'brochure' order by timecreate desc");
while($log = mysql_fetch_array( $logs )){
// Bo gio - chi lay ngay
$date = $log['timecreate'];
$createDate = date('Y-m-d', strtotime($date));

echo "<tr>";
echo "<th>". $log['filename']. "</th>";
echo "<th>". $log['type']. "</th>";
echo "<th><a href=\"http://rynantech.com/partner-login/iccgroupclick.php?id=".$log['id']."\"><img src='http://www.rynantech.com/partner-login/sites/images/dl.png".$row['image_name']."'></a></th>";
echo "<th>". $log['notes']. "</th>";
echo "<th>". $log['views']. "</th>";
echo "<th>". $createDate. "</th>";
echo "<th><a href=\"iccgroupedit.php?id=$log[id]\"><img src='http://www.rynantech.com/partner-login/sites/images/edit.png".$row['image_name']."'></a></th>";
echo "<th><a href=\"iccgroupdel.php?id=$log[id]\" onclick=\"return makesure();\"><img src='http://www.rynantech.com/partner-login/sites/images/delete.png".$row['image_name']."'></a></th>";
//echo "<td>". $log['id']. "</td>";
//echo "<td>". $log['printers']. "</td>";
//echo "<td>". $log['link']. "</td>";
//echo "<td>". $log['lastupdate']. "</td>";
//echo "<td>". $log['views']. "</td>";
//echo "<td><a href=\"http://rynantech.com/partner-login/iccgroup/VJET/$log[link]\" onclick=\"khoa();\">$log[link]</a></td>";

echo "</tr>";
}
?>

</table>
</div>

     
<div id="T127E-br" class="tabcontent">
<table id="tracelog1" width="909" border="0" align="center">
<?php

//echo  @mysql_num_rows( $sql_query ); die();
$logs = @mysql_query("SELECT * from iccgroup where printers like 'T127E' and type like 'brochure' order by timecreate desc");
while($log = mysql_fetch_array( $logs )){
// Bo gio - chi lay ngay
$date = $log['timecreate'];
$createDate = date('Y-m-d', strtotime($date));

echo "<tr>";
echo "<th>". $log['filename']. "</th>";
echo "<th>". $log['type']. "</th>";
echo "<th><a href=\"http://rynantech.com/partner-login/iccgroupclick.php?id=".$log['id']."\"><img src='http://www.rynantech.com/partner-login/sites/images/dl.png".$row['image_name']."'></a></th>";
echo "<th>". $log['notes']. "</th>";
echo "<th>". $log['views']. "</th>";
echo "<th>". $createDate. "</th>";
echo "<th><a href=\"iccgroupedit.php?id=$log[id]\"><img src='http://www.rynantech.com/partner-login/sites/images/edit.png".$row['image_name']."'></a></th>";
echo "<th><a href=\"iccgroupdel.php?id=$log[id]\" onclick=\"return makesure();\"><img src='http://www.rynantech.com/partner-login/sites/images/delete.png".$row['image_name']."'></a></th>";
//echo "<td>". $log['id']. "</td>";
//echo "<td>". $log['printers']. "</td>";
//echo "<td>". $log['link']. "</td>";
//echo "<td>". $log['lastupdate']. "</td>";
//echo "<td>". $log['views']. "</td>";
//echo "<td><a href=\"http://rynantech.com/partner-login/iccgroup/VJET/$log[link]\" onclick=\"khoa();\">$log[link]</a></td>";

echo "</tr>";
}
?>

</table>
</div>


     
<div id="T127S-br" class="tabcontent">
<table id="tracelog1" width="909" border="0" align="center">
<?php

//echo  @mysql_num_rows( $sql_query ); die();
$logs = @mysql_query("SELECT * from iccgroup where printers like 'T127S' and type like 'brochure' order by timecreate desc");
while($log = mysql_fetch_array( $logs )){
// Bo gio - chi lay ngay
$date = $log['timecreate'];
$createDate = date('Y-m-d', strtotime($date));

echo "<tr>";
echo "<th>". $log['filename']. "</th>";
echo "<th>". $log['type']. "</th>";
echo "<th><a href=\"http://rynantech.com/partner-login/iccgroupclick.php?id=".$log['id']."\"><img src='http://www.rynantech.com/partner-login/sites/images/dl.png".$row['image_name']."'></a></th>";
echo "<th>". $log['notes']. "</th>";
echo "<th>". $log['views']. "</th>";
echo "<th>". $createDate. "</th>";
echo "<th><a href=\"iccgroupedit.php?id=$log[id]\"><img src='http://www.rynantech.com/partner-login/sites/images/edit.png".$row['image_name']."'></a></th>";
echo "<th><a href=\"iccgroupdel.php?id=$log[id]\" onclick=\"return makesure();\"><img src='http://www.rynantech.com/partner-login/sites/images/delete.png".$row['image_name']."'></a></th>";
//echo "<td>". $log['id']. "</td>";
//echo "<td>". $log['printers']. "</td>";
//echo "<td>". $log['link']. "</td>";
//echo "<td>". $log['lastupdate']. "</td>";
//echo "<td>". $log['views']. "</td>";
//echo "<td><a href=\"http://rynantech.com/partner-login/iccgroup/VJET/$log[link]\" onclick=\"khoa();\">$log[link]</a></td>";

echo "</tr>";
}
?>

</table>
</div>


     
<div id="T508M-br" class="tabcontent">
<table id="tracelog1" width="909" border="0" align="center">
<?php

//echo  @mysql_num_rows( $sql_query ); die();
$logs = @mysql_query("SELECT * from iccgroup where printers like 'T508M' and type like 'brochure' order by timecreate desc");
while($log = mysql_fetch_array( $logs )){
// Bo gio - chi lay ngay
$date = $log['timecreate'];
$createDate = date('Y-m-d', strtotime($date));

echo "<tr>";
echo "<th>". $log['filename']. "</th>";
echo "<th>". $log['type']. "</th>";
echo "<th><a href=\"http://rynantech.com/partner-login/iccgroupclick.php?id=".$log['id']."\"><img src='http://www.rynantech.com/partner-login/sites/images/dl.png".$row['image_name']."'></a></th>";
echo "<th>". $log['notes']. "</th>";
echo "<th>". $log['views']. "</th>";
echo "<th>". $createDate. "</th>";
echo "<th><a href=\"iccgroupedit.php?id=$log[id]\"><img src='http://www.rynantech.com/partner-login/sites/images/edit.png".$row['image_name']."'></a></th>";
echo "<th><a href=\"iccgroupdel.php?id=$log[id]\" onclick=\"return makesure();\"><img src='http://www.rynantech.com/partner-login/sites/images/delete.png".$row['image_name']."'></a></th>";
//echo "<td>". $log['id']. "</td>";
//echo "<td>". $log['printers']. "</td>";
//echo "<td>". $log['link']. "</td>";
//echo "<td>". $log['lastupdate']. "</td>";
//echo "<td>". $log['views']. "</td>";
//echo "<td><a href=\"http://rynantech.com/partner-login/iccgroup/VJET/$log[link]\" onclick=\"khoa();\">$log[link]</a></td>";

echo "</tr>";
}
?>

</table>
</div>


     
<div id="T508MPlus-br" class="tabcontent">
<table id="tracelog1" width="909" border="0" align="center">
<?php

//echo  @mysql_num_rows( $sql_query ); die();
$logs = @mysql_query("SELECT * from iccgroup where printers like 'T508MPlus' and type like 'brochure' order by timecreate desc");
while($log = mysql_fetch_array( $logs )){
// Bo gio - chi lay ngay
$date = $log['timecreate'];
$createDate = date('Y-m-d', strtotime($date));

echo "<tr>";
echo "<th>". $log['filename']. "</th>";
echo "<th>". $log['type']. "</th>";
echo "<th><a href=\"http://rynantech.com/partner-login/iccgroupclick.php?id=".$log['id']."\"><img src='http://www.rynantech.com/partner-login/sites/images/dl.png".$row['image_name']."'></a></th>";
echo "<th>". $log['notes']. "</th>";
echo "<th>". $log['views']. "</th>";
echo "<th>". $createDate. "</th>";
echo "<th><a href=\"iccgroupedit.php?id=$log[id]\"><img src='http://www.rynantech.com/partner-login/sites/images/edit.png".$row['image_name']."'></a></th>";
echo "<th><a href=\"iccgroupdel.php?id=$log[id]\" onclick=\"return makesure();\"><img src='http://www.rynantech.com/partner-login/sites/images/delete.png".$row['image_name']."'></a></th>";
//echo "<td>". $log['id']. "</td>";
//echo "<td>". $log['printers']. "</td>";
//echo "<td>". $log['link']. "</td>";
//echo "<td>". $log['lastupdate']. "</td>";
//echo "<td>". $log['views']. "</td>";
//echo "<td><a href=\"http://rynantech.com/partner-login/iccgroup/VJET/$log[link]\" onclick=\"khoa();\">$log[link]</a></td>";

echo "</tr>";
}
?>

</table>
</div>


     
<div id="T254P-br" class="tabcontent">
<table id="tracelog1" width="909" border="0" align="center">
<?php

//echo  @mysql_num_rows( $sql_query ); die();
$logs = @mysql_query("SELECT * from iccgroup where printers like 'T254P' and type like 'brochure' order by timecreate desc");
while($log = mysql_fetch_array( $logs )){
// Bo gio - chi lay ngay
$date = $log['timecreate'];
$createDate = date('Y-m-d', strtotime($date));

echo "<tr>";
echo "<th>". $log['filename']. "</th>";
echo "<th>". $log['type']. "</th>";
echo "<th><a href=\"http://rynantech.com/partner-login/iccgroupclick.php?id=".$log['id']."\"><img src='http://www.rynantech.com/partner-login/sites/images/dl.png".$row['image_name']."'></a></th>";
echo "<th>". $log['notes']. "</th>";
echo "<th>". $log['views']. "</th>";
echo "<th>". $createDate. "</th>";
echo "<th><a href=\"iccgroupedit.php?id=$log[id]\"><img src='http://www.rynantech.com/partner-login/sites/images/edit.png".$row['image_name']."'></a></th>";
echo "<th><a href=\"iccgroupdel.php?id=$log[id]\" onclick=\"return makesure();\"><img src='http://www.rynantech.com/partner-login/sites/images/delete.png".$row['image_name']."'></a></th>";
//echo "<td>". $log['id']. "</td>";
//echo "<td>". $log['printers']. "</td>";
//echo "<td>". $log['link']. "</td>";
//echo "<td>". $log['lastupdate']. "</td>";
//echo "<td>". $log['views']. "</td>";
//echo "<td><a href=\"http://rynantech.com/partner-login/iccgroup/VJET/$log[link]\" onclick=\"khoa();\">$log[link]</a></td>";

echo "</tr>";
}
?>

</table>
</div>



     
<div id="T254E-br" class="tabcontent">
<table id="tracelog1" width="909" border="0" align="center">
<?php

//echo  @mysql_num_rows( $sql_query ); die();
$logs = @mysql_query("SELECT * from iccgroup where printers like 'T254E' and type like 'brochure' order by timecreate desc");
while($log = mysql_fetch_array( $logs )){
// Bo gio - chi lay ngay
$date = $log['timecreate'];
$createDate = date('Y-m-d', strtotime($date));

echo "<tr>";
echo "<th>". $log['filename']. "</th>";
echo "<th>". $log['type']. "</th>";
echo "<th><a href=\"http://rynantech.com/partner-login/iccgroupclick.php?id=".$log['id']."\"><img src='http://www.rynantech.com/partner-login/sites/images/dl.png".$row['image_name']."'></a></th>";
echo "<th>". $log['notes']. "</th>";
echo "<th>". $log['views']. "</th>";
echo "<th>". $createDate. "</th>";
echo "<th><a href=\"iccgroupedit.php?id=$log[id]\"><img src='http://www.rynantech.com/partner-login/sites/images/edit.png".$row['image_name']."'></a></th>";
echo "<th><a href=\"iccgroupdel.php?id=$log[id]\" onclick=\"return makesure();\"><img src='http://www.rynantech.com/partner-login/sites/images/delete.png".$row['image_name']."'></a></th>";
//echo "<td>". $log['id']. "</td>";
//echo "<td>". $log['printers']. "</td>";
//echo "<td>". $log['link']. "</td>";
//echo "<td>". $log['lastupdate']. "</td>";
//echo "<td>". $log['views']. "</td>";
//echo "<td><a href=\"http://rynantech.com/partner-login/iccgroup/VJET/$log[link]\" onclick=\"khoa();\">$log[link]</a></td>";

echo "</tr>";
}
?>

</table>
</div>




<!-- USER MANUAL -->
<div class="onecolumntitle">
<div class="header">
      <span>USER MANUAL</span>
</div></div>
<div class="tab">
  <button class="tablinks" onclick="openCity(event, 'T500C-us')">T500C</button>
  <button class="tablinks" onclick="openCity(event, 'T127P-us')">T127P</button>
  <button class="tablinks" onclick="openCity(event, 'T127H-us')">T127H</button>
  <button class="tablinks" onclick="openCity(event, 'T127He-us')">T127He</button>
  <button class="tablinks" onclick="openCity(event, 'T127C-us')">T127C</button>
  <button class="tablinks" onclick="openCity(event, 'T127E-us')">T127E</button>
  <button class="tablinks" onclick="openCity(event, 'T127S-us')">T127S</button>
  <button class="tablinks" onclick="openCity(event, 'T508M-us')">T508M</button>
  <button class="tablinks" onclick="openCity(event, 'T508MPlus-us')">T508MPlus</button>
  <button class="tablinks" onclick="openCity(event, 'T254P-us')">T254P</button>
  <button class="tablinks" onclick="openCity(event, 'T254E-us')">T254E</button>
</div>

<div id="T500C-us" class="tabcontent" style="display: block;" >
<table id="tracelog1" width="909" border="0" align="center">
<?php

//echo  @mysql_num_rows( $sql_query ); die();
$logs = @mysql_query("SELECT * from iccgroup where printers like 'T500C' and type like 'User Manual' order by timecreate desc");
while($log = mysql_fetch_array( $logs )){
// Bo gio - chi lay ngay
$date = $log['timecreate'];
$createDate = date('Y-m-d', strtotime($date));

echo "<tr>";
echo "<th>". $log['filename']. "</th>";
echo "<th>". $log['type']. "</th>";
echo "<th><a href=\"http://rynantech.com/partner-login/iccgroupclick.php?id=".$log['id']."\"><img src='http://www.rynantech.com/partner-login/sites/images/dl.png".$row['image_name']."'></a></th>";
echo "<th>". $log['notes']. "</th>";
echo "<th>". $log['views']. "</th>";
echo "<th>". $createDate. "</th>";
echo "<th><a href=\"iccgroupedit.php?id=$log[id]\"><img src='http://www.rynantech.com/partner-login/sites/images/edit.png".$row['image_name']."'></a></th>";
echo "<th><a href=\"iccgroupdel.php?id=$log[id]\" onclick=\"return makesure();\"><img src='http://www.rynantech.com/partner-login/sites/images/delete.png".$row['image_name']."'></a></th>";
//echo "<td>". $log['id']. "</td>";
//echo "<td>". $log['printers']. "</td>";
//echo "<td>". $log['link']. "</td>";
//echo "<td>". $log['lastupdate']. "</td>";
//echo "<td>". $log['views']. "</td>";
//echo "<td><a href=\"http://rynantech.com/partner-login/iccgroup/VJET/$log[link]\" onclick=\"khoa();\">$log[link]</a></td>";

echo "</tr>";
}
?>

</table>
</div>


<div id="T127P-us" class="tabcontent" style="display: block;" >
<table id="tracelog1" width="909" border="0" align="center">
<?php

//echo  @mysql_num_rows( $sql_query ); die();
$logs = @mysql_query("SELECT * from iccgroup where printers like 'T127P' and type like 'User Manual' order by timecreate desc");
while($log = mysql_fetch_array( $logs )){
// Bo gio - chi lay ngay
$date = $log['timecreate'];
$createDate = date('Y-m-d', strtotime($date));

echo "<tr>";
echo "<th>". $log['filename']. "</th>";
echo "<th>". $log['type']. "</th>";
echo "<th><a href=\"http://rynantech.com/partner-login/iccgroupclick.php?id=".$log['id']."\"><img src='http://www.rynantech.com/partner-login/sites/images/dl.png".$row['image_name']."'></a></th>";
echo "<th>". $log['notes']. "</th>";
echo "<th>". $log['views']. "</th>";
echo "<th>". $createDate. "</th>";
echo "<th><a href=\"iccgroupedit.php?id=$log[id]\"><img src='http://www.rynantech.com/partner-login/sites/images/edit.png".$row['image_name']."'></a></th>";
echo "<th><a href=\"iccgroupdel.php?id=$log[id]\" onclick=\"return makesure();\"><img src='http://www.rynantech.com/partner-login/sites/images/delete.png".$row['image_name']."'></a></th>";
//echo "<td>". $log['id']. "</td>";
//echo "<td>". $log['printers']. "</td>";
//echo "<td>". $log['link']. "</td>";
//echo "<td>". $log['lastupdate']. "</td>";
//echo "<td>". $log['views']. "</td>";
//echo "<td><a href=\"http://rynantech.com/partner-login/iccgroup/VJET/$log[link]\" onclick=\"khoa();\">$log[link]</a></td>";

echo "</tr>";
}
?>

</table>
</div>



<div id="T127H-us" class="tabcontent">
<table id="tracelog1" width="909" border="0" align="center">
<?php

//echo  @mysql_num_rows( $sql_query ); die();
$logs = @mysql_query("SELECT * from iccgroup where printers like 'T127H' and type like 'User Manual' order by timecreate desc");
while($log = mysql_fetch_array( $logs )){
// Bo gio - chi lay ngay
$date = $log['timecreate'];
$createDate = date('Y-m-d', strtotime($date));

echo "<tr>";
echo "<th>". $log['filename']. "</th>";
echo "<th>". $log['type']. "</th>";
echo "<th><a href=\"http://rynantech.com/partner-login/iccgroupclick.php?id=".$log['id']."\"><img src='http://www.rynantech.com/partner-login/sites/images/dl.png".$row['image_name']."'></a></th>";
echo "<th>". $log['notes']. "</th>";
echo "<th>". $log['views']. "</th>";
echo "<th>". $createDate. "</th>";
echo "<th><a href=\"iccgroupedit.php?id=$log[id]\"><img src='http://www.rynantech.com/partner-login/sites/images/edit.png".$row['image_name']."'></a></th>";
echo "<th><a href=\"iccgroupdel.php?id=$log[id]\" onclick=\"return makesure();\"><img src='http://www.rynantech.com/partner-login/sites/images/delete.png".$row['image_name']."'></a></th>";
//echo "<td>". $log['id']. "</td>";
//echo "<td>". $log['printers']. "</td>";
//echo "<td>". $log['link']. "</td>";
//echo "<td>". $log['lastupdate']. "</td>";
//echo "<td>". $log['views']. "</td>";
//echo "<td><a href=\"http://rynantech.com/partner-login/iccgroup/VJET/$log[link]\" onclick=\"khoa();\">$log[link]</a></td>";

echo "</tr>";
}
?>

</table>
</div>


<div id="T127He-us" class="tabcontent">
<table id="tracelog1" width="909" border="0" align="center">
<?php

//echo  @mysql_num_rows( $sql_query ); die();
$logs = @mysql_query("SELECT * from iccgroup where printers like 'T127He' and type like 'User Manual' order by timecreate desc");
while($log = mysql_fetch_array( $logs )){
// Bo gio - chi lay ngay
$date = $log['timecreate'];
$createDate = date('Y-m-d', strtotime($date));

echo "<tr>";
echo "<th>". $log['filename']. "</th>";
echo "<th>". $log['type']. "</th>";
echo "<th><a href=\"http://rynantech.com/partner-login/iccgroupclick.php?id=".$log['id']."\"><img src='http://www.rynantech.com/partner-login/sites/images/dl.png".$row['image_name']."'></a></th>";
echo "<th>". $log['notes']. "</th>";
echo "<th>". $log['views']. "</th>";
echo "<th>". $createDate. "</th>";
echo "<th><a href=\"iccgroupedit.php?id=$log[id]\"><img src='http://www.rynantech.com/partner-login/sites/images/edit.png".$row['image_name']."'></a></th>";
echo "<th><a href=\"iccgroupdel.php?id=$log[id]\" onclick=\"return makesure();\"><img src='http://www.rynantech.com/partner-login/sites/images/delete.png".$row['image_name']."'></a></th>";
//echo "<td>". $log['id']. "</td>";
//echo "<td>". $log['printers']. "</td>";
//echo "<td>". $log['link']. "</td>";
//echo "<td>". $log['lastupdate']. "</td>";
//echo "<td>". $log['views']. "</td>";
//echo "<td><a href=\"http://rynantech.com/partner-login/iccgroup/VJET/$log[link]\" onclick=\"khoa();\">$log[link]</a></td>";

echo "</tr>";
}
?>

</table>
</div>
     
<div id="T127C-us" class="tabcontent">
<table id="tracelog1" width="909" border="0" align="center">
<?php

//echo  @mysql_num_rows( $sql_query ); die();
$logs = @mysql_query("SELECT * from iccgroup where printers like 'T127C' and type like 'User Manual' order by timecreate desc");
while($log = mysql_fetch_array( $logs )){
// Bo gio - chi lay ngay
$date = $log['timecreate'];
$createDate = date('Y-m-d', strtotime($date));

echo "<tr>";
echo "<th>". $log['filename']. "</th>";
echo "<th>". $log['type']. "</th>";
echo "<th><a href=\"http://rynantech.com/partner-login/iccgroupclick.php?id=".$log['id']."\"><img src='http://www.rynantech.com/partner-login/sites/images/dl.png".$row['image_name']."'></a></th>";
echo "<th>". $log['notes']. "</th>";
echo "<th>". $log['views']. "</th>";
echo "<th>". $createDate. "</th>";
echo "<th><a href=\"iccgroupedit.php?id=$log[id]\"><img src='http://www.rynantech.com/partner-login/sites/images/edit.png".$row['image_name']."'></a></th>";
echo "<th><a href=\"iccgroupdel.php?id=$log[id]\" onclick=\"return makesure();\"><img src='http://www.rynantech.com/partner-login/sites/images/delete.png".$row['image_name']."'></a></th>";
//echo "<td>". $log['id']. "</td>";
//echo "<td>". $log['printers']. "</td>";
//echo "<td>". $log['link']. "</td>";
//echo "<td>". $log['lastupdate']. "</td>";
//echo "<td>". $log['views']. "</td>";
//echo "<td><a href=\"http://rynantech.com/partner-login/iccgroup/VJET/$log[link]\" onclick=\"khoa();\">$log[link]</a></td>";

echo "</tr>";
}
?>

</table>
</div>

     
<div id="T127E-us" class="tabcontent">
<table id="tracelog1" width="909" border="0" align="center">
<?php

//echo  @mysql_num_rows( $sql_query ); die();
$logs = @mysql_query("SELECT * from iccgroup where printers like 'T127E' and type like 'User Manual' order by timecreate desc");
while($log = mysql_fetch_array( $logs )){
// Bo gio - chi lay ngay
$date = $log['timecreate'];
$createDate = date('Y-m-d', strtotime($date));

echo "<tr>";
echo "<th>". $log['filename']. "</th>";
echo "<th>". $log['type']. "</th>";
echo "<th><a href=\"http://rynantech.com/partner-login/iccgroupclick.php?id=".$log['id']."\"><img src='http://www.rynantech.com/partner-login/sites/images/dl.png".$row['image_name']."'></a></th>";
echo "<th>". $log['notes']. "</th>";
echo "<th>". $log['views']. "</th>";
echo "<th>". $createDate. "</th>";
echo "<th><a href=\"iccgroupedit.php?id=$log[id]\"><img src='http://www.rynantech.com/partner-login/sites/images/edit.png".$row['image_name']."'></a></th>";
echo "<th><a href=\"iccgroupdel.php?id=$log[id]\" onclick=\"return makesure();\"><img src='http://www.rynantech.com/partner-login/sites/images/delete.png".$row['image_name']."'></a></th>";
//echo "<td>". $log['id']. "</td>";
//echo "<td>". $log['printers']. "</td>";
//echo "<td>". $log['link']. "</td>";
//echo "<td>". $log['lastupdate']. "</td>";
//echo "<td>". $log['views']. "</td>";
//echo "<td><a href=\"http://rynantech.com/partner-login/iccgroup/VJET/$log[link]\" onclick=\"khoa();\">$log[link]</a></td>";

echo "</tr>";
}
?>

</table>
</div>


     
<div id="T127S-us" class="tabcontent">
<table id="tracelog1" width="909" border="0" align="center">
<?php

//echo  @mysql_num_rows( $sql_query ); die();
$logs = @mysql_query("SELECT * from iccgroup where printers like 'T127S' and type like 'User Manual' order by timecreate desc");
while($log = mysql_fetch_array( $logs )){
// Bo gio - chi lay ngay
$date = $log['timecreate'];
$createDate = date('Y-m-d', strtotime($date));

echo "<tr>";
echo "<th>". $log['filename']. "</th>";
echo "<th>". $log['type']. "</th>";
echo "<th><a href=\"http://rynantech.com/partner-login/iccgroupclick.php?id=".$log['id']."\"><img src='http://www.rynantech.com/partner-login/sites/images/dl.png".$row['image_name']."'></a></th>";
echo "<th>". $log['notes']. "</th>";
echo "<th>". $log['views']. "</th>";
echo "<th>". $createDate. "</th>";
echo "<th><a href=\"iccgroupedit.php?id=$log[id]\"><img src='http://www.rynantech.com/partner-login/sites/images/edit.png".$row['image_name']."'></a></th>";
echo "<th><a href=\"iccgroupdel.php?id=$log[id]\" onclick=\"return makesure();\"><img src='http://www.rynantech.com/partner-login/sites/images/delete.png".$row['image_name']."'></a></th>";
//echo "<td>". $log['id']. "</td>";
//echo "<td>". $log['printers']. "</td>";
//echo "<td>". $log['link']. "</td>";
//echo "<td>". $log['lastupdate']. "</td>";
//echo "<td>". $log['views']. "</td>";
//echo "<td><a href=\"http://rynantech.com/partner-login/iccgroup/VJET/$log[link]\" onclick=\"khoa();\">$log[link]</a></td>";

echo "</tr>";
}
?>

</table>
</div>


     
<div id="T508M-us" class="tabcontent">
<table id="tracelog1" width="909" border="0" align="center">
<?php

//echo  @mysql_num_rows( $sql_query ); die();
$logs = @mysql_query("SELECT * from iccgroup where printers like 'T508M' and type like 'User Manual' order by timecreate desc");
while($log = mysql_fetch_array( $logs )){
// Bo gio - chi lay ngay
$date = $log['timecreate'];
$createDate = date('Y-m-d', strtotime($date));

echo "<tr>";
echo "<th>". $log['filename']. "</th>";
echo "<th>". $log['type']. "</th>";
echo "<th><a href=\"http://rynantech.com/partner-login/iccgroupclick.php?id=".$log['id']."\"><img src='http://www.rynantech.com/partner-login/sites/images/dl.png".$row['image_name']."'></a></th>";
echo "<th>". $log['notes']. "</th>";
echo "<th>". $log['views']. "</th>";
echo "<th>". $createDate. "</th>";
echo "<th><a href=\"iccgroupedit.php?id=$log[id]\"><img src='http://www.rynantech.com/partner-login/sites/images/edit.png".$row['image_name']."'></a></th>";
echo "<th><a href=\"iccgroupdel.php?id=$log[id]\" onclick=\"return makesure();\"><img src='http://www.rynantech.com/partner-login/sites/images/delete.png".$row['image_name']."'></a></th>";
//echo "<td>". $log['id']. "</td>";
//echo "<td>". $log['printers']. "</td>";
//echo "<td>". $log['link']. "</td>";
//echo "<td>". $log['lastupdate']. "</td>";
//echo "<td>". $log['views']. "</td>";
//echo "<td><a href=\"http://rynantech.com/partner-login/iccgroup/VJET/$log[link]\" onclick=\"khoa();\">$log[link]</a></td>";

echo "</tr>";
}
?>

</table>
</div>


     
<div id="T508MPlus-us" class="tabcontent">
<table id="tracelog1" width="909" border="0" align="center">
<?php

//echo  @mysql_num_rows( $sql_query ); die();
$logs = @mysql_query("SELECT * from iccgroup where printers like 'T508MPlus' and type like 'User Manual' order by timecreate desc");
while($log = mysql_fetch_array( $logs )){
// Bo gio - chi lay ngay
$date = $log['timecreate'];
$createDate = date('Y-m-d', strtotime($date));

echo "<tr>";
echo "<th>". $log['filename']. "</th>";
echo "<th>". $log['type']. "</th>";
echo "<th><a href=\"http://rynantech.com/partner-login/iccgroupclick.php?id=".$log['id']."\"><img src='http://www.rynantech.com/partner-login/sites/images/dl.png".$row['image_name']."'></a></th>";
echo "<th>". $log['notes']. "</th>";
echo "<th>". $log['views']. "</th>";
echo "<th>". $createDate. "</th>";
echo "<th><a href=\"iccgroupedit.php?id=$log[id]\"><img src='http://www.rynantech.com/partner-login/sites/images/edit.png".$row['image_name']."'></a></th>";
echo "<th><a href=\"iccgroupdel.php?id=$log[id]\" onclick=\"return makesure();\"><img src='http://www.rynantech.com/partner-login/sites/images/delete.png".$row['image_name']."'></a></th>";
//echo "<td>". $log['id']. "</td>";
//echo "<td>". $log['printers']. "</td>";
//echo "<td>". $log['link']. "</td>";
//echo "<td>". $log['lastupdate']. "</td>";
//echo "<td>". $log['views']. "</td>";
//echo "<td><a href=\"http://rynantech.com/partner-login/iccgroup/VJET/$log[link]\" onclick=\"khoa();\">$log[link]</a></td>";

echo "</tr>";
}
?>

</table>
</div>

<div id="T254P-us" class="tabcontent">
<table id="tracelog1" width="909" border="0" align="center">
<?php

//echo  @mysql_num_rows( $sql_query ); die();
$logs = @mysql_query("SELECT * from iccgroup where printers like 'T254P' and type like 'User Manual' order by timecreate desc");
while($log = mysql_fetch_array( $logs )){
// Bo gio - chi lay ngay
$date = $log['timecreate'];
$createDate = date('Y-m-d', strtotime($date));

echo "<tr>";
echo "<th>". $log['filename']. "</th>";
echo "<th>". $log['type']. "</th>";
echo "<th><a href=\"http://rynantech.com/partner-login/iccgroupclick.php?id=".$log['id']."\"><img src='http://www.rynantech.com/partner-login/sites/images/dl.png".$row['image_name']."'></a></th>";
echo "<th>". $log['notes']. "</th>";
echo "<th>". $log['views']. "</th>";
echo "<th>". $createDate. "</th>";
echo "<th><a href=\"iccgroupedit.php?id=$log[id]\"><img src='http://www.rynantech.com/partner-login/sites/images/edit.png".$row['image_name']."'></a></th>";
echo "<th><a href=\"iccgroupdel.php?id=$log[id]\" onclick=\"return makesure();\"><img src='http://www.rynantech.com/partner-login/sites/images/delete.png".$row['image_name']."'></a></th>";
//echo "<td>". $log['id']. "</td>";
//echo "<td>". $log['printers']. "</td>";
//echo "<td>". $log['link']. "</td>";
//echo "<td>". $log['lastupdate']. "</td>";
//echo "<td>". $log['views']. "</td>";
//echo "<td><a href=\"http://rynantech.com/partner-login/iccgroup/VJET/$log[link]\" onclick=\"khoa();\">$log[link]</a></td>";

echo "</tr>";
}
?>

</table>
</div>

<div id="T254E-us" class="tabcontent">
<table id="tracelog1" width="909" border="0" align="center">
<?php

//echo  @mysql_num_rows( $sql_query ); die();
$logs = @mysql_query("SELECT * from iccgroup where printers like 'T254E' and type like 'User Manual' order by timecreate desc");
while($log = mysql_fetch_array( $logs )){
// Bo gio - chi lay ngay
$date = $log['timecreate'];
$createDate = date('Y-m-d', strtotime($date));

echo "<tr>";
echo "<th>". $log['filename']. "</th>";
echo "<th>". $log['type']. "</th>";
echo "<th><a href=\"http://rynantech.com/partner-login/iccgroupclick.php?id=".$log['id']."\"><img src='http://www.rynantech.com/partner-login/sites/images/dl.png".$row['image_name']."'></a></th>";
echo "<th>". $log['notes']. "</th>";
echo "<th>". $log['views']. "</th>";
echo "<th>". $createDate. "</th>";
echo "<th><a href=\"iccgroupedit.php?id=$log[id]\"><img src='http://www.rynantech.com/partner-login/sites/images/edit.png".$row['image_name']."'></a></th>";
echo "<th><a href=\"iccgroupdel.php?id=$log[id]\" onclick=\"return makesure();\"><img src='http://www.rynantech.com/partner-login/sites/images/delete.png".$row['image_name']."'></a></th>";
//echo "<td>". $log['id']. "</td>";
//echo "<td>". $log['printers']. "</td>";
//echo "<td>". $log['link']. "</td>";
//echo "<td>". $log['lastupdate']. "</td>";
//echo "<td>". $log['views']. "</td>";
//echo "<td><a href=\"http://rynantech.com/partner-login/iccgroup/VJET/$log[link]\" onclick=\"khoa();\">$log[link]</a></td>";

echo "</tr>";
}
?>

</table>
</div>



<!-- Quick Guide -->
<div class="onecolumntitle">
<div class="header">
      <span>Quick Guide</span>
</div></div>
<div class="tab">
  <button class="tablinks" onclick="openCity(event, 'T500C-qg')">T500C</button>
  <button class="tablinks" onclick="openCity(event, 'T127P-qg')">T127P</button>
  <button class="tablinks" onclick="openCity(event, 'T127H-qg')">T127H</button>
  <button class="tablinks" onclick="openCity(event, 'T127He-qg')">T127He</button>
  <button class="tablinks" onclick="openCity(event, 'T127C-qg')">T127C</button>
  <button class="tablinks" onclick="openCity(event, 'T127E-qg')">T127E</button>
  <button class="tablinks" onclick="openCity(event, 'T127S-qg')">T127S</button>
  <button class="tablinks" onclick="openCity(event, 'T508M-qg')">T508M</button>
  <button class="tablinks" onclick="openCity(event, 'T508MPlus-qg')">T508MPlus</button>
  <button class="tablinks" onclick="openCity(event, 'T254P-qg')">T254P</button>
  <button class="tablinks" onclick="openCity(event, 'T254E-qg')">T254E</button>
</div>

<div id="T500C-qg" class="tabcontent" style="display: block;" >
<table id="tracelog1" width="909" border="0" align="center">
<?php

//echo  @mysql_num_rows( $sql_query ); die();
$logs = @mysql_query("SELECT * from iccgroup where printers like 'T500C' and type like 'Quick Guide' order by timecreate desc");
while($log = mysql_fetch_array( $logs )){
// Bo gio - chi lay ngay
$date = $log['timecreate'];
$createDate = date('Y-m-d', strtotime($date));

echo "<tr>";
echo "<th>". $log['filename']. "</th>";
echo "<th>". $log['type']. "</th>";
echo "<th><a href=\"http://rynantech.com/partner-login/iccgroupclick.php?id=".$log['id']."\"><img src='http://www.rynantech.com/partner-login/sites/images/dl.png".$row['image_name']."'></a></th>";
echo "<th>". $log['notes']. "</th>";
echo "<th>". $log['views']. "</th>";
echo "<th>". $createDate. "</th>";
echo "<th><a href=\"iccgroupedit.php?id=$log[id]\"><img src='http://www.rynantech.com/partner-login/sites/images/edit.png".$row['image_name']."'></a></th>";
echo "<th><a href=\"iccgroupdel.php?id=$log[id]\" onclick=\"return makesure();\"><img src='http://www.rynantech.com/partner-login/sites/images/delete.png".$row['image_name']."'></a></th>";
//echo "<td>". $log['id']. "</td>";
//echo "<td>". $log['printers']. "</td>";
//echo "<td>". $log['link']. "</td>";
//echo "<td>". $log['lastupdate']. "</td>";
//echo "<td>". $log['views']. "</td>";
//echo "<td><a href=\"http://rynantech.com/partner-login/iccgroup/VJET/$log[link]\" onclick=\"khoa();\">$log[link]</a></td>";

echo "</tr>";
}
?>

</table>
</div>


<div id="T127P-qg" class="tabcontent" style="display: block;" >
<table id="tracelog1" width="909" border="0" align="center">
<?php

//echo  @mysql_num_rows( $sql_query ); die();
$logs = @mysql_query("SELECT * from iccgroup where printers like 'T127P' and type like 'Quick Guide' order by timecreate desc");
while($log = mysql_fetch_array( $logs )){
// Bo gio - chi lay ngay
$date = $log['timecreate'];
$createDate = date('Y-m-d', strtotime($date));

echo "<tr>";
echo "<th>". $log['filename']. "</th>";
echo "<th>". $log['type']. "</th>";
echo "<th><a href=\"http://rynantech.com/partner-login/iccgroupclick.php?id=".$log['id']."\"><img src='http://www.rynantech.com/partner-login/sites/images/dl.png".$row['image_name']."'></a></th>";
echo "<th>". $log['notes']. "</th>";
echo "<th>". $log['views']. "</th>";
echo "<th>". $createDate. "</th>";
echo "<th><a href=\"iccgroupedit.php?id=$log[id]\"><img src='http://www.rynantech.com/partner-login/sites/images/edit.png".$row['image_name']."'></a></th>";
echo "<th><a href=\"iccgroupdel.php?id=$log[id]\" onclick=\"return makesure();\"><img src='http://www.rynantech.com/partner-login/sites/images/delete.png".$row['image_name']."'></a></th>";
//echo "<td>". $log['id']. "</td>";
//echo "<td>". $log['printers']. "</td>";
//echo "<td>". $log['link']. "</td>";
//echo "<td>". $log['lastupdate']. "</td>";
//echo "<td>". $log['views']. "</td>";
//echo "<td><a href=\"http://rynantech.com/partner-login/iccgroup/VJET/$log[link]\" onclick=\"khoa();\">$log[link]</a></td>";

echo "</tr>";
}
?>

</table>
</div>



<div id="T127H-qg" class="tabcontent">
<table id="tracelog1" width="909" border="0" align="center">
<?php

//echo  @mysql_num_rows( $sql_query ); die();
$logs = @mysql_query("SELECT * from iccgroup where printers like 'T127H' and type like 'Quick Guide' order by timecreate desc");
while($log = mysql_fetch_array( $logs )){
// Bo gio - chi lay ngay
$date = $log['timecreate'];
$createDate = date('Y-m-d', strtotime($date));

echo "<tr>";
echo "<th>". $log['filename']. "</th>";
echo "<th>". $log['type']. "</th>";
echo "<th><a href=\"http://rynantech.com/partner-login/iccgroupclick.php?id=".$log['id']."\"><img src='http://www.rynantech.com/partner-login/sites/images/dl.png".$row['image_name']."'></a></th>";
echo "<th>". $log['notes']. "</th>";
echo "<th>". $log['views']. "</th>";
echo "<th>". $createDate. "</th>";
echo "<th><a href=\"iccgroupedit.php?id=$log[id]\"><img src='http://www.rynantech.com/partner-login/sites/images/edit.png".$row['image_name']."'></a></th>";
echo "<th><a href=\"iccgroupdel.php?id=$log[id]\" onclick=\"return makesure();\"><img src='http://www.rynantech.com/partner-login/sites/images/delete.png".$row['image_name']."'></a></th>";
//echo "<td>". $log['id']. "</td>";
//echo "<td>". $log['printers']. "</td>";
//echo "<td>". $log['link']. "</td>";
//echo "<td>". $log['lastupdate']. "</td>";
//echo "<td>". $log['views']. "</td>";
//echo "<td><a href=\"http://rynantech.com/partner-login/iccgroup/VJET/$log[link]\" onclick=\"khoa();\">$log[link]</a></td>";

echo "</tr>";
}
?>

</table>
</div>


<div id="T127He-qg" class="tabcontent">
<table id="tracelog1" width="909" border="0" align="center">
<?php

//echo  @mysql_num_rows( $sql_query ); die();
$logs = @mysql_query("SELECT * from iccgroup where printers like 'T127He' and type like 'Quick Guide' order by timecreate desc");
while($log = mysql_fetch_array( $logs )){
// Bo gio - chi lay ngay
$date = $log['timecreate'];
$createDate = date('Y-m-d', strtotime($date));

echo "<tr>";
echo "<th>". $log['filename']. "</th>";
echo "<th>". $log['type']. "</th>";
echo "<th><a href=\"http://rynantech.com/partner-login/iccgroupclick.php?id=".$log['id']."\"><img src='http://www.rynantech.com/partner-login/sites/images/dl.png".$row['image_name']."'></a></th>";
echo "<th>". $log['notes']. "</th>";
echo "<th>". $log['views']. "</th>";
echo "<th>". $createDate. "</th>";
echo "<th><a href=\"iccgroupedit.php?id=$log[id]\"><img src='http://www.rynantech.com/partner-login/sites/images/edit.png".$row['image_name']."'></a></th>";
echo "<th><a href=\"iccgroupdel.php?id=$log[id]\" onclick=\"return makesure();\"><img src='http://www.rynantech.com/partner-login/sites/images/delete.png".$row['image_name']."'></a></th>";
//echo "<td>". $log['id']. "</td>";
//echo "<td>". $log['printers']. "</td>";
//echo "<td>". $log['link']. "</td>";
//echo "<td>". $log['lastupdate']. "</td>";
//echo "<td>". $log['views']. "</td>";
//echo "<td><a href=\"http://rynantech.com/partner-login/iccgroup/VJET/$log[link]\" onclick=\"khoa();\">$log[link]</a></td>";

echo "</tr>";
}
?>

</table>
</div>
     
<div id="T127C-qg" class="tabcontent">
<table id="tracelog1" width="909" border="0" align="center">
<?php

//echo  @mysql_num_rows( $sql_query ); die();
$logs = @mysql_query("SELECT * from iccgroup where printers like 'T127C' and type like 'Quick Guide' order by timecreate desc");
while($log = mysql_fetch_array( $logs )){
// Bo gio - chi lay ngay
$date = $log['timecreate'];
$createDate = date('Y-m-d', strtotime($date));

echo "<tr>";
echo "<th>". $log['filename']. "</th>";
echo "<th>". $log['type']. "</th>";
echo "<th><a href=\"http://rynantech.com/partner-login/iccgroupclick.php?id=".$log['id']."\"><img src='http://www.rynantech.com/partner-login/sites/images/dl.png".$row['image_name']."'></a></th>";
echo "<th>". $log['notes']. "</th>";
echo "<th>". $log['views']. "</th>";
echo "<th>". $createDate. "</th>";
echo "<th><a href=\"iccgroupedit.php?id=$log[id]\"><img src='http://www.rynantech.com/partner-login/sites/images/edit.png".$row['image_name']."'></a></th>";
echo "<th><a href=\"iccgroupdel.php?id=$log[id]\" onclick=\"return makesure();\"><img src='http://www.rynantech.com/partner-login/sites/images/delete.png".$row['image_name']."'></a></th>";
//echo "<td>". $log['id']. "</td>";
//echo "<td>". $log['printers']. "</td>";
//echo "<td>". $log['link']. "</td>";
//echo "<td>". $log['lastupdate']. "</td>";
//echo "<td>". $log['views']. "</td>";
//echo "<td><a href=\"http://rynantech.com/partner-login/iccgroup/VJET/$log[link]\" onclick=\"khoa();\">$log[link]</a></td>";

echo "</tr>";
}
?>

</table>
</div>

     
<div id="T127E-qg" class="tabcontent">
<table id="tracelog1" width="909" border="0" align="center">
<?php

//echo  @mysql_num_rows( $sql_query ); die();
$logs = @mysql_query("SELECT * from iccgroup where printers like 'T127E' and type like 'Quick Guide' order by timecreate desc");
while($log = mysql_fetch_array( $logs )){
// Bo gio - chi lay ngay
$date = $log['timecreate'];
$createDate = date('Y-m-d', strtotime($date));

echo "<tr>";
echo "<th>". $log['filename']. "</th>";
echo "<th>". $log['type']. "</th>";
echo "<th><a href=\"http://rynantech.com/partner-login/iccgroupclick.php?id=".$log['id']."\"><img src='http://www.rynantech.com/partner-login/sites/images/dl.png".$row['image_name']."'></a></th>";
echo "<th>". $log['notes']. "</th>";
echo "<th>". $log['views']. "</th>";
echo "<th>". $createDate. "</th>";
echo "<th><a href=\"iccgroupedit.php?id=$log[id]\"><img src='http://www.rynantech.com/partner-login/sites/images/edit.png".$row['image_name']."'></a></th>";
echo "<th><a href=\"iccgroupdel.php?id=$log[id]\" onclick=\"return makesure();\"><img src='http://www.rynantech.com/partner-login/sites/images/delete.png".$row['image_name']."'></a></th>";
//echo "<td>". $log['id']. "</td>";
//echo "<td>". $log['printers']. "</td>";
//echo "<td>". $log['link']. "</td>";
//echo "<td>". $log['lastupdate']. "</td>";
//echo "<td>". $log['views']. "</td>";
//echo "<td><a href=\"http://rynantech.com/partner-login/iccgroup/VJET/$log[link]\" onclick=\"khoa();\">$log[link]</a></td>";

echo "</tr>";
}
?>

</table>
</div>


     
<div id="T127S-qg" class="tabcontent">
<table id="tracelog1" width="909" border="0" align="center">
<?php

//echo  @mysql_num_rows( $sql_query ); die();
$logs = @mysql_query("SELECT * from iccgroup where printers like 'T127S' and type like 'Quick Guide' order by timecreate desc");
while($log = mysql_fetch_array( $logs )){
// Bo gio - chi lay ngay
$date = $log['timecreate'];
$createDate = date('Y-m-d', strtotime($date));

echo "<tr>";
echo "<th>". $log['filename']. "</th>";
echo "<th>". $log['type']. "</th>";
echo "<th><a href=\"http://rynantech.com/partner-login/iccgroupclick.php?id=".$log['id']."\"><img src='http://www.rynantech.com/partner-login/sites/images/dl.png".$row['image_name']."'></a></th>";
echo "<th>". $log['notes']. "</th>";
echo "<th>". $log['views']. "</th>";
echo "<th>". $createDate. "</th>";
echo "<th><a href=\"iccgroupedit.php?id=$log[id]\"><img src='http://www.rynantech.com/partner-login/sites/images/edit.png".$row['image_name']."'></a></th>";
echo "<th><a href=\"iccgroupdel.php?id=$log[id]\" onclick=\"return makesure();\"><img src='http://www.rynantech.com/partner-login/sites/images/delete.png".$row['image_name']."'></a></th>";
//echo "<td>". $log['id']. "</td>";
//echo "<td>". $log['printers']. "</td>";
//echo "<td>". $log['link']. "</td>";
//echo "<td>". $log['lastupdate']. "</td>";
//echo "<td>". $log['views']. "</td>";
//echo "<td><a href=\"http://rynantech.com/partner-login/iccgroup/VJET/$log[link]\" onclick=\"khoa();\">$log[link]</a></td>";

echo "</tr>";
}
?>

</table>
</div>


     
<div id="T508M-qg" class="tabcontent">
<table id="tracelog1" width="909" border="0" align="center">
<?php

//echo  @mysql_num_rows( $sql_query ); die();
$logs = @mysql_query("SELECT * from iccgroup where printers like 'T508M' and type like 'Quick Guide' order by timecreate desc");
while($log = mysql_fetch_array( $logs )){
// Bo gio - chi lay ngay
$date = $log['timecreate'];
$createDate = date('Y-m-d', strtotime($date));

echo "<tr>";
echo "<th>". $log['filename']. "</th>";
echo "<th>". $log['type']. "</th>";
echo "<th><a href=\"http://rynantech.com/partner-login/iccgroupclick.php?id=".$log['id']."\"><img src='http://www.rynantech.com/partner-login/sites/images/dl.png".$row['image_name']."'></a></th>";
echo "<th>". $log['notes']. "</th>";
echo "<th>". $log['views']. "</th>";
echo "<th>". $createDate. "</th>";
echo "<th><a href=\"iccgroupedit.php?id=$log[id]\"><img src='http://www.rynantech.com/partner-login/sites/images/edit.png".$row['image_name']."'></a></th>";
echo "<th><a href=\"iccgroupdel.php?id=$log[id]\" onclick=\"return makesure();\"><img src='http://www.rynantech.com/partner-login/sites/images/delete.png".$row['image_name']."'></a></th>";
//echo "<td>". $log['id']. "</td>";
//echo "<td>". $log['printers']. "</td>";
//echo "<td>". $log['link']. "</td>";
//echo "<td>". $log['lastupdate']. "</td>";
//echo "<td>". $log['views']. "</td>";
//echo "<td><a href=\"http://rynantech.com/partner-login/iccgroup/VJET/$log[link]\" onclick=\"khoa();\">$log[link]</a></td>";

echo "</tr>";
}
?>

</table>
</div>


     
<div id="T508MPlus-qg" class="tabcontent">
<table id="tracelog1" width="909" border="0" align="center">
<?php

//echo  @mysql_num_rows( $sql_query ); die();
$logs = @mysql_query("SELECT * from iccgroup where printers like 'T508MPlus' and type like 'Quick Guide' order by timecreate desc");
while($log = mysql_fetch_array( $logs )){
// Bo gio - chi lay ngay
$date = $log['timecreate'];
$createDate = date('Y-m-d', strtotime($date));

echo "<tr>";
echo "<th>". $log['filename']. "</th>";
echo "<th>". $log['type']. "</th>";
echo "<th><a href=\"http://rynantech.com/partner-login/iccgroupclick.php?id=".$log['id']."\"><img src='http://www.rynantech.com/partner-login/sites/images/dl.png".$row['image_name']."'></a></th>";
echo "<th>". $log['notes']. "</th>";
echo "<th>". $log['views']. "</th>";
echo "<th>". $createDate. "</th>";
echo "<th><a href=\"iccgroupedit.php?id=$log[id]\"><img src='http://www.rynantech.com/partner-login/sites/images/edit.png".$row['image_name']."'></a></th>";
echo "<th><a href=\"iccgroupdel.php?id=$log[id]\" onclick=\"return makesure();\"><img src='http://www.rynantech.com/partner-login/sites/images/delete.png".$row['image_name']."'></a></th>";
//echo "<td>". $log['id']. "</td>";
//echo "<td>". $log['printers']. "</td>";
//echo "<td>". $log['link']. "</td>";
//echo "<td>". $log['lastupdate']. "</td>";
//echo "<td>". $log['views']. "</td>";
//echo "<td><a href=\"http://rynantech.com/partner-login/iccgroup/VJET/$log[link]\" onclick=\"khoa();\">$log[link]</a></td>";

echo "</tr>";
}
?>

</table>
</div>

<div id="T254P-qg" class="tabcontent">
<table id="tracelog1" width="909" border="0" align="center">
<?php

//echo  @mysql_num_rows( $sql_query ); die();
$logs = @mysql_query("SELECT * from iccgroup where printers like 'T254P' and type like 'Quick Guide' order by timecreate desc");
while($log = mysql_fetch_array( $logs )){
// Bo gio - chi lay ngay
$date = $log['timecreate'];
$createDate = date('Y-m-d', strtotime($date));

echo "<tr>";
echo "<th>". $log['filename']. "</th>";
echo "<th>". $log['type']. "</th>";
echo "<th><a href=\"http://rynantech.com/partner-login/iccgroupclick.php?id=".$log['id']."\"><img src='http://www.rynantech.com/partner-login/sites/images/dl.png".$row['image_name']."'></a></th>";
echo "<th>". $log['notes']. "</th>";
echo "<th>". $log['views']. "</th>";
echo "<th>". $createDate. "</th>";
echo "<th><a href=\"iccgroupedit.php?id=$log[id]\"><img src='http://www.rynantech.com/partner-login/sites/images/edit.png".$row['image_name']."'></a></th>";
echo "<th><a href=\"iccgroupdel.php?id=$log[id]\" onclick=\"return makesure();\"><img src='http://www.rynantech.com/partner-login/sites/images/delete.png".$row['image_name']."'></a></th>";
//echo "<td>". $log['id']. "</td>";
//echo "<td>". $log['printers']. "</td>";
//echo "<td>". $log['link']. "</td>";
//echo "<td>". $log['lastupdate']. "</td>";
//echo "<td>". $log['views']. "</td>";
//echo "<td><a href=\"http://rynantech.com/partner-login/iccgroup/VJET/$log[link]\" onclick=\"khoa();\">$log[link]</a></td>";

echo "</tr>";
}
?>

</table>
</div>

<div id="T254E-qg" class="tabcontent">
<table id="tracelog1" width="909" border="0" align="center">
<?php

//echo  @mysql_num_rows( $sql_query ); die();
$logs = @mysql_query("SELECT * from iccgroup where printers like 'T254E' and type like 'Quick Guide' order by timecreate desc");
while($log = mysql_fetch_array( $logs )){
// Bo gio - chi lay ngay
$date = $log['timecreate'];
$createDate = date('Y-m-d', strtotime($date));

echo "<tr>";
echo "<th>". $log['filename']. "</th>";
echo "<th>". $log['type']. "</th>";
echo "<th><a href=\"http://rynantech.com/partner-login/iccgroupclick.php?id=".$log['id']."\"><img src='http://www.rynantech.com/partner-login/sites/images/dl.png".$row['image_name']."'></a></th>";
echo "<th>". $log['notes']. "</th>";
echo "<th>". $log['views']. "</th>";
echo "<th>". $createDate. "</th>";
echo "<th><a href=\"iccgroupedit.php?id=$log[id]\"><img src='http://www.rynantech.com/partner-login/sites/images/edit.png".$row['image_name']."'></a></th>";
echo "<th><a href=\"iccgroupdel.php?id=$log[id]\" onclick=\"return makesure();\"><img src='http://www.rynantech.com/partner-login/sites/images/delete.png".$row['image_name']."'></a></th>";
//echo "<td>". $log['id']. "</td>";
//echo "<td>". $log['printers']. "</td>";
//echo "<td>". $log['link']. "</td>";
//echo "<td>". $log['lastupdate']. "</td>";
//echo "<td>". $log['views']. "</td>";
//echo "<td><a href=\"http://rynantech.com/partner-login/iccgroup/VJET/$log[link]\" onclick=\"khoa();\">$log[link]</a></td>";

echo "</tr>";
}
?>

</table>
</div>



<!-- Presentation -->
<div class="onecolumntitle">
<div class="header">
      <span>Presentation</span>
</div></div>
<div class="tab">
  <button class="tablinks" onclick="openCity(event, 'T500C-pr')">T500C</button>
  <button class="tablinks" onclick="openCity(event, 'T127P-pr')">T127P</button>
  <button class="tablinks" onclick="openCity(event, 'T127H-pr')">T127H</button>
  <button class="tablinks" onclick="openCity(event, 'T127He-pr')">T127He</button>
  <button class="tablinks" onclick="openCity(event, 'T127C-pr')">T127C</button>
  <button class="tablinks" onclick="openCity(event, 'T127E-pr')">T127E</button>
  <button class="tablinks" onclick="openCity(event, 'T127S-pr')">T127S</button>
  <button class="tablinks" onclick="openCity(event, 'T508M-pr')">T508M</button>
  <button class="tablinks" onclick="openCity(event, 'T508MPlus-pr')">T508MPlus</button>
  <button class="tablinks" onclick="openCity(event, 'T254P-pr')">T254P</button>
  <button class="tablinks" onclick="openCity(event, 'T254E-pr')">T254E</button>
</div>

<div id="T500C-pr" class="tabcontent" style="display: block;" >
<table id="tracelog1" width="909" border="0" align="center">
<?php

//echo  @mysql_num_rows( $sql_query ); die();
$logs = @mysql_query("SELECT * from iccgroup where printers like 'T500C' and type like 'Presentation' order by timecreate desc");
while($log = mysql_fetch_array( $logs )){
// Bo gio - chi lay ngay
$date = $log['timecreate'];
$createDate = date('Y-m-d', strtotime($date));

echo "<tr>";
echo "<th>". $log['filename']. "</th>";
echo "<th>". $log['type']. "</th>";
echo "<th><a href=\"http://rynantech.com/partner-login/iccgroupclick.php?id=".$log['id']."\"><img src='http://www.rynantech.com/partner-login/sites/images/dl.png".$row['image_name']."'></a></th>";
echo "<th>". $log['notes']. "</th>";
echo "<th>". $log['views']. "</th>";
echo "<th>". $createDate. "</th>";
echo "<th><a href=\"iccgroupedit.php?id=$log[id]\"><img src='http://www.rynantech.com/partner-login/sites/images/edit.png".$row['image_name']."'></a></th>";
echo "<th><a href=\"iccgroupdel.php?id=$log[id]\" onclick=\"return makesure();\"><img src='http://www.rynantech.com/partner-login/sites/images/delete.png".$row['image_name']."'></a></th>";
//echo "<td>". $log['id']. "</td>";
//echo "<td>". $log['printers']. "</td>";
//echo "<td>". $log['link']. "</td>";
//echo "<td>". $log['lastupdate']. "</td>";
//echo "<td>". $log['views']. "</td>";
//echo "<td><a href=\"http://rynantech.com/partner-login/iccgroup/VJET/$log[link]\" onclick=\"khoa();\">$log[link]</a></td>";

echo "</tr>";
}
?>

</table>
</div>



<div id="T127P-pr" class="tabcontent" style="display: block;" >
<table id="tracelog1" width="909" border="0" align="center">
<?php

//echo  @mysql_num_rows( $sql_query ); die();
$logs = @mysql_query("SELECT * from iccgroup where printers like 'T127P' and type like 'Presentation' order by timecreate desc");
while($log = mysql_fetch_array( $logs )){
// Bo gio - chi lay ngay
$date = $log['timecreate'];
$createDate = date('Y-m-d', strtotime($date));

echo "<tr>";
echo "<th>". $log['filename']. "</th>";
echo "<th>". $log['type']. "</th>";
echo "<th><a href=\"http://rynantech.com/partner-login/iccgroupclick.php?id=".$log['id']."\"><img src='http://www.rynantech.com/partner-login/sites/images/dl.png".$row['image_name']."'></a></th>";
echo "<th>". $log['notes']. "</th>";
echo "<th>". $log['views']. "</th>";
echo "<th>". $createDate. "</th>";
echo "<th><a href=\"iccgroupedit.php?id=$log[id]\"><img src='http://www.rynantech.com/partner-login/sites/images/edit.png".$row['image_name']."'></a></th>";
echo "<th><a href=\"iccgroupdel.php?id=$log[id]\" onclick=\"return makesure();\"><img src='http://www.rynantech.com/partner-login/sites/images/delete.png".$row['image_name']."'></a></th>";
//echo "<td>". $log['id']. "</td>";
//echo "<td>". $log['printers']. "</td>";
//echo "<td>". $log['link']. "</td>";
//echo "<td>". $log['lastupdate']. "</td>";
//echo "<td>". $log['views']. "</td>";
//echo "<td><a href=\"http://rynantech.com/partner-login/iccgroup/VJET/$log[link]\" onclick=\"khoa();\">$log[link]</a></td>";

echo "</tr>";
}
?>

</table>
</div>



<div id="T127H-pr" class="tabcontent">
<table id="tracelog1" width="909" border="0" align="center">
<?php

//echo  @mysql_num_rows( $sql_query ); die();
$logs = @mysql_query("SELECT * from iccgroup where printers like 'T127H' and type like 'Presentation' order by timecreate desc");
while($log = mysql_fetch_array( $logs )){
// Bo gio - chi lay ngay
$date = $log['timecreate'];
$createDate = date('Y-m-d', strtotime($date));

echo "<tr>";
echo "<th>". $log['filename']. "</th>";
echo "<th>". $log['type']. "</th>";
echo "<th><a href=\"http://rynantech.com/partner-login/iccgroupclick.php?id=".$log['id']."\"><img src='http://www.rynantech.com/partner-login/sites/images/dl.png".$row['image_name']."'></a></th>";
echo "<th>". $log['notes']. "</th>";
echo "<th>". $log['views']. "</th>";
echo "<th>". $createDate. "</th>";
echo "<th><a href=\"iccgroupedit.php?id=$log[id]\"><img src='http://www.rynantech.com/partner-login/sites/images/edit.png".$row['image_name']."'></a></th>";
echo "<th><a href=\"iccgroupdel.php?id=$log[id]\" onclick=\"return makesure();\"><img src='http://www.rynantech.com/partner-login/sites/images/delete.png".$row['image_name']."'></a></th>";
//echo "<td>". $log['id']. "</td>";
//echo "<td>". $log['printers']. "</td>";
//echo "<td>". $log['link']. "</td>";
//echo "<td>". $log['lastupdate']. "</td>";
//echo "<td>". $log['views']. "</td>";
//echo "<td><a href=\"http://rynantech.com/partner-login/iccgroup/VJET/$log[link]\" onclick=\"khoa();\">$log[link]</a></td>";

echo "</tr>";
}
?>

</table>
</div>


<div id="T127He-pr" class="tabcontent">
<table id="tracelog1" width="909" border="0" align="center">
<?php

//echo  @mysql_num_rows( $sql_query ); die();
$logs = @mysql_query("SELECT * from iccgroup where printers like 'T127He' and type like 'Presentation' order by timecreate desc");
while($log = mysql_fetch_array( $logs )){
// Bo gio - chi lay ngay
$date = $log['timecreate'];
$createDate = date('Y-m-d', strtotime($date));

echo "<tr>";
echo "<th>". $log['filename']. "</th>";
echo "<th>". $log['type']. "</th>";
echo "<th><a href=\"http://rynantech.com/partner-login/iccgroupclick.php?id=".$log['id']."\"><img src='http://www.rynantech.com/partner-login/sites/images/dl.png".$row['image_name']."'></a></th>";
echo "<th>". $log['notes']. "</th>";
echo "<th>". $log['views']. "</th>";
echo "<th>". $createDate. "</th>";
echo "<th><a href=\"iccgroupedit.php?id=$log[id]\"><img src='http://www.rynantech.com/partner-login/sites/images/edit.png".$row['image_name']."'></a></th>";
echo "<th><a href=\"iccgroupdel.php?id=$log[id]\" onclick=\"return makesure();\"><img src='http://www.rynantech.com/partner-login/sites/images/delete.png".$row['image_name']."'></a></th>";
//echo "<td>". $log['id']. "</td>";
//echo "<td>". $log['printers']. "</td>";
//echo "<td>". $log['link']. "</td>";
//echo "<td>". $log['lastupdate']. "</td>";
//echo "<td>". $log['views']. "</td>";
//echo "<td><a href=\"http://rynantech.com/partner-login/iccgroup/VJET/$log[link]\" onclick=\"khoa();\">$log[link]</a></td>";

echo "</tr>";
}
?>

</table>
</div>
     
<div id="T127C-pr" class="tabcontent">
<table id="tracelog1" width="909" border="0" align="center">
<?php

//echo  @mysql_num_rows( $sql_query ); die();
$logs = @mysql_query("SELECT * from iccgroup where printers like 'T127C' and type like 'Presentation' order by timecreate desc");
while($log = mysql_fetch_array( $logs )){
// Bo gio - chi lay ngay
$date = $log['timecreate'];
$createDate = date('Y-m-d', strtotime($date));

echo "<tr>";
echo "<th>". $log['filename']. "</th>";
echo "<th>". $log['type']. "</th>";
echo "<th><a href=\"http://rynantech.com/partner-login/iccgroupclick.php?id=".$log['id']."\"><img src='http://www.rynantech.com/partner-login/sites/images/dl.png".$row['image_name']."'></a></th>";
echo "<th>". $log['notes']. "</th>";
echo "<th>". $log['views']. "</th>";
echo "<th>". $createDate. "</th>";
echo "<th><a href=\"iccgroupedit.php?id=$log[id]\"><img src='http://www.rynantech.com/partner-login/sites/images/edit.png".$row['image_name']."'></a></th>";
echo "<th><a href=\"iccgroupdel.php?id=$log[id]\" onclick=\"return makesure();\"><img src='http://www.rynantech.com/partner-login/sites/images/delete.png".$row['image_name']."'></a></th>";
//echo "<td>". $log['id']. "</td>";
//echo "<td>". $log['printers']. "</td>";
//echo "<td>". $log['link']. "</td>";
//echo "<td>". $log['lastupdate']. "</td>";
//echo "<td>". $log['views']. "</td>";
//echo "<td><a href=\"http://rynantech.com/partner-login/iccgroup/VJET/$log[link]\" onclick=\"khoa();\">$log[link]</a></td>";

echo "</tr>";
}
?>

</table>
</div>

     
<div id="T127E-pr" class="tabcontent">
<table id="tracelog1" width="909" border="0" align="center">
<?php

//echo  @mysql_num_rows( $sql_query ); die();
$logs = @mysql_query("SELECT * from iccgroup where printers like 'T127E' and type like 'Presentation' order by timecreate desc");
while($log = mysql_fetch_array( $logs )){
// Bo gio - chi lay ngay
$date = $log['timecreate'];
$createDate = date('Y-m-d', strtotime($date));

echo "<tr>";
echo "<th>". $log['filename']. "</th>";
echo "<th>". $log['type']. "</th>";
echo "<th><a href=\"http://rynantech.com/partner-login/iccgroupclick.php?id=".$log['id']."\"><img src='http://www.rynantech.com/partner-login/sites/images/dl.png".$row['image_name']."'></a></th>";
echo "<th>". $log['notes']. "</th>";
echo "<th>". $log['views']. "</th>";
echo "<th>". $createDate. "</th>";
echo "<th><a href=\"iccgroupedit.php?id=$log[id]\"><img src='http://www.rynantech.com/partner-login/sites/images/edit.png".$row['image_name']."'></a></th>";
echo "<th><a href=\"iccgroupdel.php?id=$log[id]\" onclick=\"return makesure();\"><img src='http://www.rynantech.com/partner-login/sites/images/delete.png".$row['image_name']."'></a></th>";
//echo "<td>". $log['id']. "</td>";
//echo "<td>". $log['printers']. "</td>";
//echo "<td>". $log['link']. "</td>";
//echo "<td>". $log['lastupdate']. "</td>";
//echo "<td>". $log['views']. "</td>";
//echo "<td><a href=\"http://rynantech.com/partner-login/iccgroup/VJET/$log[link]\" onclick=\"khoa();\">$log[link]</a></td>";

echo "</tr>";
}
?>

</table>
</div>


     
<div id="T127S-pr" class="tabcontent">
<table id="tracelog1" width="909" border="0" align="center">
<?php

//echo  @mysql_num_rows( $sql_query ); die();
$logs = @mysql_query("SELECT * from iccgroup where printers like 'T127S' and type like 'Presentation' order by timecreate desc");
while($log = mysql_fetch_array( $logs )){
// Bo gio - chi lay ngay
$date = $log['timecreate'];
$createDate = date('Y-m-d', strtotime($date));

echo "<tr>";
echo "<th>". $log['filename']. "</th>";
echo "<th>". $log['type']. "</th>";
echo "<th><a href=\"http://rynantech.com/partner-login/iccgroupclick.php?id=".$log['id']."\"><img src='http://www.rynantech.com/partner-login/sites/images/dl.png".$row['image_name']."'></a></th>";
echo "<th>". $log['notes']. "</th>";
echo "<th>". $log['views']. "</th>";
echo "<th>". $createDate. "</th>";
echo "<th><a href=\"iccgroupedit.php?id=$log[id]\"><img src='http://www.rynantech.com/partner-login/sites/images/edit.png".$row['image_name']."'></a></th>";
echo "<th><a href=\"iccgroupdel.php?id=$log[id]\" onclick=\"return makesure();\"><img src='http://www.rynantech.com/partner-login/sites/images/delete.png".$row['image_name']."'></a></th>";
//echo "<td>". $log['id']. "</td>";
//echo "<td>". $log['printers']. "</td>";
//echo "<td>". $log['link']. "</td>";
//echo "<td>". $log['lastupdate']. "</td>";
//echo "<td>". $log['views']. "</td>";
//echo "<td><a href=\"http://rynantech.com/partner-login/iccgroup/VJET/$log[link]\" onclick=\"khoa();\">$log[link]</a></td>";

echo "</tr>";
}
?>

</table>
</div>


     
<div id="T508M-pr" class="tabcontent">
<table id="tracelog1" width="909" border="0" align="center">
<?php

//echo  @mysql_num_rows( $sql_query ); die();
$logs = @mysql_query("SELECT * from iccgroup where printers like 'T508M' and type like 'Presentation' order by timecreate desc");
while($log = mysql_fetch_array( $logs )){
// Bo gio - chi lay ngay
$date = $log['timecreate'];
$createDate = date('Y-m-d', strtotime($date));

echo "<tr>";
echo "<th>". $log['filename']. "</th>";
echo "<th>". $log['type']. "</th>";
echo "<th><a href=\"http://rynantech.com/partner-login/iccgroupclick.php?id=".$log['id']."\"><img src='http://www.rynantech.com/partner-login/sites/images/dl.png".$row['image_name']."'></a></th>";
echo "<th>". $log['notes']. "</th>";
echo "<th>". $log['views']. "</th>";
echo "<th>". $createDate. "</th>";
echo "<th><a href=\"iccgroupedit.php?id=$log[id]\"><img src='http://www.rynantech.com/partner-login/sites/images/edit.png".$row['image_name']."'></a></th>";
echo "<th><a href=\"iccgroupdel.php?id=$log[id]\" onclick=\"return makesure();\"><img src='http://www.rynantech.com/partner-login/sites/images/delete.png".$row['image_name']."'></a></th>";
//echo "<td>". $log['id']. "</td>";
//echo "<td>". $log['printers']. "</td>";
//echo "<td>". $log['link']. "</td>";
//echo "<td>". $log['lastupdate']. "</td>";
//echo "<td>". $log['views']. "</td>";
//echo "<td><a href=\"http://rynantech.com/partner-login/iccgroup/VJET/$log[link]\" onclick=\"khoa();\">$log[link]</a></td>";

echo "</tr>";
}
?>

</table>
</div>


     
<div id="T508MPlus-pr" class="tabcontent">
<table id="tracelog1" width="909" border="0" align="center">
<?php

//echo  @mysql_num_rows( $sql_query ); die();
$logs = @mysql_query("SELECT * from iccgroup where printers like 'T508MPlus' and type like 'Presentation' order by timecreate desc");
while($log = mysql_fetch_array( $logs )){
// Bo gio - chi lay ngay
$date = $log['timecreate'];
$createDate = date('Y-m-d', strtotime($date));

echo "<tr>";
echo "<th>". $log['filename']. "</th>";
echo "<th>". $log['type']. "</th>";
echo "<th><a href=\"http://rynantech.com/partner-login/iccgroupclick.php?id=".$log['id']."\"><img src='http://www.rynantech.com/partner-login/sites/images/dl.png".$row['image_name']."'></a></th>";
echo "<th>". $log['notes']. "</th>";
echo "<th>". $log['views']. "</th>";
echo "<th>". $createDate. "</th>";
echo "<th><a href=\"iccgroupedit.php?id=$log[id]\"><img src='http://www.rynantech.com/partner-login/sites/images/edit.png".$row['image_name']."'></a></th>";
echo "<th><a href=\"iccgroupdel.php?id=$log[id]\" onclick=\"return makesure();\"><img src='http://www.rynantech.com/partner-login/sites/images/delete.png".$row['image_name']."'></a></th>";
//echo "<td>". $log['id']. "</td>";
//echo "<td>". $log['printers']. "</td>";
//echo "<td>". $log['link']. "</td>";
//echo "<td>". $log['lastupdate']. "</td>";
//echo "<td>". $log['views']. "</td>";
//echo "<td><a href=\"http://rynantech.com/partner-login/iccgroup/VJET/$log[link]\" onclick=\"khoa();\">$log[link]</a></td>";

echo "</tr>";
}
?>

</table>
</div>

<div id="T254P-pr" class="tabcontent">
<table id="tracelog1" width="909" border="0" align="center">
<?php

//echo  @mysql_num_rows( $sql_query ); die();
$logs = @mysql_query("SELECT * from iccgroup where printers like 'T254P' and type like 'Presentation' order by timecreate desc");
while($log = mysql_fetch_array( $logs )){
// Bo gio - chi lay ngay
$date = $log['timecreate'];
$createDate = date('Y-m-d', strtotime($date));

echo "<tr>";
echo "<th>". $log['filename']. "</th>";
echo "<th>". $log['type']. "</th>";
echo "<th><a href=\"http://rynantech.com/partner-login/iccgroupclick.php?id=".$log['id']."\"><img src='http://www.rynantech.com/partner-login/sites/images/dl.png".$row['image_name']."'></a></th>";
echo "<th>". $log['notes']. "</th>";
echo "<th>". $log['views']. "</th>";
echo "<th>". $createDate. "</th>";
echo "<th><a href=\"iccgroupedit.php?id=$log[id]\"><img src='http://www.rynantech.com/partner-login/sites/images/edit.png".$row['image_name']."'></a></th>";
echo "<th><a href=\"iccgroupdel.php?id=$log[id]\" onclick=\"return makesure();\"><img src='http://www.rynantech.com/partner-login/sites/images/delete.png".$row['image_name']."'></a></th>";
//echo "<td>". $log['id']. "</td>";
//echo "<td>". $log['printers']. "</td>";
//echo "<td>". $log['link']. "</td>";
//echo "<td>". $log['lastupdate']. "</td>";
//echo "<td>". $log['views']. "</td>";
//echo "<td><a href=\"http://rynantech.com/partner-login/iccgroup/VJET/$log[link]\" onclick=\"khoa();\">$log[link]</a></td>";

echo "</tr>";
}
?>

</table>
</div>

<div id="T254E-pr" class="tabcontent">
<table id="tracelog1" width="909" border="0" align="center">
<?php

//echo  @mysql_num_rows( $sql_query ); die();
$logs = @mysql_query("SELECT * from iccgroup where printers like 'T254E' and type like 'Presentation' order by timecreate desc");
while($log = mysql_fetch_array( $logs )){
// Bo gio - chi lay ngay
$date = $log['timecreate'];
$createDate = date('Y-m-d', strtotime($date));

echo "<tr>";
echo "<th>". $log['filename']. "</th>";
echo "<th>". $log['type']. "</th>";
echo "<th><a href=\"http://rynantech.com/partner-login/iccgroupclick.php?id=".$log['id']."\"><img src='http://www.rynantech.com/partner-login/sites/images/dl.png".$row['image_name']."'></a></th>";
echo "<th>". $log['notes']. "</th>";
echo "<th>". $log['views']. "</th>";
echo "<th>". $createDate. "</th>";
echo "<th><a href=\"iccgroupedit.php?id=$log[id]\"><img src='http://www.rynantech.com/partner-login/sites/images/edit.png".$row['image_name']."'></a></th>";
echo "<th><a href=\"iccgroupdel.php?id=$log[id]\" onclick=\"return makesure();\"><img src='http://www.rynantech.com/partner-login/sites/images/delete.png".$row['image_name']."'></a></th>";
//echo "<td>". $log['id']. "</td>";
//echo "<td>". $log['printers']. "</td>";
//echo "<td>". $log['link']. "</td>";
//echo "<td>". $log['lastupdate']. "</td>";
//echo "<td>". $log['views']. "</td>";
//echo "<td><a href=\"http://rynantech.com/partner-login/iccgroup/VJET/$log[link]\" onclick=\"khoa();\">$log[link]</a></td>";

echo "</tr>";
}
?>

</table>
</div>



<!-- VIDEOS -->
<div class="onecolumntitle">
<div class="header">
      <span>VIDEOS</span>
</div></div>
<div class="tab">
  <button class="tablinks" onclick="openCity(event, 'RYNAN R20-videos')">RYNAN R20</button>
  <button class="tablinks" onclick="openCity(event, 'W1000-videos')">W1000</button>
  <button class="tablinks" onclick="openCity(event, 'R1010-videos')">R1010</button>
  <button class="tablinks" onclick="openCity(event, 'R1010P-videos')">R1010P</button>
  <button class="tablinks" onclick="openCity(event, 'W1020-videos')">W1020</button>
  <button class="tablinks" onclick="openCity(event, 'B1040-videos')">B1040</button>
  <button class="tablinks" onclick="openCity(event, 'B1040H Aluminum-videos')">B1040H Aluminum</button>
  <button class="tablinks" onclick="openCity(event, 'B1040H Plastic-videos')">B1040H Plastic</button>
  <button class="tablinks" onclick="openCity(event, 'B1040S-videos')">B1040S</button>
  <button class="tablinks" onclick="openCity(event, 'B1040P-videos')">B1040P</button>
  <button class="tablinks" onclick="openCity(event, 'B1060-videos')">B1060</button>
  <button class="tablinks" onclick="openCity(event, 'B1060P-videos')">B1060P</button>
  <button class="tablinks" onclick="openCity(event, 'B1060H-videos')">B1060H</button>
  <button class="tablinks" onclick="openCity(event, '1200-videos')">1200</button>
  <button class="tablinks" onclick="openCity(event, '1200E-videos')">1200E</button>
  <button class="tablinks" onclick="openCity(event, '1200Plus-videos')">1200Plus</button>
  <button class="tablinks" onclick="openCity(event, '1200EG-videos')">1200EG</button>
  <button class="tablinks" onclick="openCity(event, '2172C-videos')">2172C</button>
  <button class="tablinks" onclick="openCity(event, 'IOJ100-videos')">IOJ100</button>
  <button class="tablinks" onclick="openCity(event, 'IOJ200-videos')">IOJ200</button>
  <button class="tablinks" onclick="openCity(event, 'InkFeeder8-videos')">InkFeeder8</button>
</div>

<div id="RYNAN R20-videos" class="tabcontent" style="display: block;" >
<table id="tracelog1" width="909" border="0" align="center">
<?php

//echo  @mysql_num_rows( $sql_query ); die();
$logs = @mysql_query("SELECT * from iccgroup where printers like 'R20 PRO' and type like 'videos' order by timecreate desc");
while($log = mysql_fetch_array( $logs )){
// Bo gio - chi lay ngay
$date = $log['timecreate'];
$createDate = date('Y-m-d', strtotime($date));

echo "<tr>";
echo "<th>". $log['filename']. "</th>";
echo "<th>". $log['type']. "</th>";
echo "<th><a href=\"http://rynantech.com/partner-login/iccgroupclick.php?id=".$log['id']."\"><img src='http://www.rynantech.com/partner-login/sites/images/dl.png".$row['image_name']."'></a></th>";
echo "<th>". $log['notes']. "</th>";
echo "<th>". $log['views']. "</th>";
echo "<th>". $createDate. "</th>";
echo "<th><a href=\"iccgroupedit.php?id=$log[id]\"><img src='http://www.rynantech.com/partner-login/sites/images/edit.png".$row['image_name']."'></a></th>";
echo "<th><a href=\"iccgroupdel.php?id=$log[id]\" onclick=\"return makesure();\"><img src='http://www.rynantech.com/partner-login/sites/images/delete.png".$row['image_name']."'></a></th>";
//echo "<td>". $log['id']. "</td>";
//echo "<td>". $log['printers']. "</td>";
//echo "<td>". $log['link']. "</td>";
//echo "<td>". $log['lastupdate']. "</td>";
//echo "<td>". $log['views']. "</td>";
//echo "<td><a href=\"http://rynantech.com/partner-login/iccgroup/VJET/$log[link]\" onclick=\"khoa();\">$log[link]</a></td>";

echo "</tr>";
}
?>

</table>
</div>


<div id="W1000-videos" class="tabcontent" style="display: block;" >
<table id="tracelog1" width="909" border="0" align="center">
<?php

//echo  @mysql_num_rows( $sql_query ); die();
$logs = @mysql_query("SELECT * from iccgroup where printers like 'W1000' and type like 'videos' order by timecreate desc");
while($log = mysql_fetch_array( $logs )){
// Bo gio - chi lay ngay
$date = $log['timecreate'];
$createDate = date('Y-m-d', strtotime($date));

echo "<tr>";
echo "<th>". $log['filename']. "</th>";
echo "<th>". $log['type']. "</th>";
echo "<th><a href=\"http://rynantech.com/partner-login/iccgroupclick.php?id=".$log['id']."\"><img src='http://www.rynantech.com/partner-login/sites/images/dl.png".$row['image_name']."'></a></th>";
echo "<th>". $log['notes']. "</th>";
echo "<th>". $log['views']. "</th>";
echo "<th>". $createDate. "</th>";
echo "<th><a href=\"iccgroupedit.php?id=$log[id]\"><img src='http://www.rynantech.com/partner-login/sites/images/edit.png".$row['image_name']."'></a></th>";
echo "<th><a href=\"iccgroupdel.php?id=$log[id]\" onclick=\"return makesure();\"><img src='http://www.rynantech.com/partner-login/sites/images/delete.png".$row['image_name']."'></a></th>";
//echo "<td>". $log['id']. "</td>";
//echo "<td>". $log['printers']. "</td>";
//echo "<td>". $log['link']. "</td>";
//echo "<td>". $log['lastupdate']. "</td>";
//echo "<td>". $log['views']. "</td>";
//echo "<td><a href=\"http://rynantech.com/partner-login/iccgroup/VJET/$log[link]\" onclick=\"khoa();\">$log[link]</a></td>";

echo "</tr>";
}
?>

</table>
</div>



<div id="R1010-videos" class="tabcontent">
<table id="tracelog1" width="909" border="0" align="center">
<?php

//echo  @mysql_num_rows( $sql_query ); die();
$logs = @mysql_query("SELECT * from iccgroup where printers like 'R1010' and type like 'videos' order by timecreate desc");
while($log = mysql_fetch_array( $logs )){
// Bo gio - chi lay ngay
$date = $log['timecreate'];
$createDate = date('Y-m-d', strtotime($date));

echo "<tr>";
echo "<th>". $log['filename']. "</th>";
echo "<th>". $log['type']. "</th>";
echo "<th><a href=\"http://rynantech.com/partner-login/iccgroupclick.php?id=".$log['id']."\"><img src='http://www.rynantech.com/partner-login/sites/images/dl.png".$row['image_name']."'></a></th>";
echo "<th>". $log['notes']. "</th>";
echo "<th>". $log['views']. "</th>";
echo "<th>". $createDate. "</th>";
echo "<th><a href=\"iccgroupedit.php?id=$log[id]\"><img src='http://www.rynantech.com/partner-login/sites/images/edit.png".$row['image_name']."'></a></th>";
echo "<th><a href=\"iccgroupdel.php?id=$log[id]\" onclick=\"return makesure();\"><img src='http://www.rynantech.com/partner-login/sites/images/delete.png".$row['image_name']."'></a></th>";
//echo "<td>". $log['id']. "</td>";
//echo "<td>". $log['printers']. "</td>";
//echo "<td>". $log['link']. "</td>";
//echo "<td>". $log['lastupdate']. "</td>";
//echo "<td>". $log['views']. "</td>";
//echo "<td><a href=\"http://rynantech.com/partner-login/iccgroup/VJET/$log[link]\" onclick=\"khoa();\">$log[link]</a></td>";

echo "</tr>";
}
?>

</table>
</div>




<div id="R1010P-videos" class="tabcontent">
<table id="tracelog1" width="909" border="0" align="center">
<?php

//echo  @mysql_num_rows( $sql_query ); die();
$logs = @mysql_query("SELECT * from iccgroup where printers like 'R1010P' and type like 'videos' order by timecreate desc");
while($log = mysql_fetch_array( $logs )){
// Bo gio - chi lay ngay
$date = $log['timecreate'];
$createDate = date('Y-m-d', strtotime($date));

echo "<tr>";
echo "<th>". $log['filename']. "</th>";
echo "<th>". $log['type']. "</th>";
echo "<th><a href=\"http://rynantech.com/partner-login/iccgroupclick.php?id=".$log['id']."\"><img src='http://www.rynantech.com/partner-login/sites/images/dl.png".$row['image_name']."'></a></th>";
echo "<th>". $log['notes']. "</th>";
echo "<th>". $log['views']. "</th>";
echo "<th>". $createDate. "</th>";
echo "<th><a href=\"iccgroupedit.php?id=$log[id]\"><img src='http://www.rynantech.com/partner-login/sites/images/edit.png".$row['image_name']."'></a></th>";
echo "<th><a href=\"iccgroupdel.php?id=$log[id]\" onclick=\"return makesure();\"><img src='http://www.rynantech.com/partner-login/sites/images/delete.png".$row['image_name']."'></a></th>";
//echo "<td>". $log['id']. "</td>";
//echo "<td>". $log['printers']. "</td>";
//echo "<td>". $log['link']. "</td>";
//echo "<td>". $log['lastupdate']. "</td>";
//echo "<td>". $log['views']. "</td>";
//echo "<td><a href=\"http://rynantech.com/partner-login/iccgroup/VJET/$log[link]\" onclick=\"khoa();\">$log[link]</a></td>";

echo "</tr>";
}
?>

</table>
</div>




<div id="W1020-videos" class="tabcontent">
<table id="tracelog1" width="909" border="0" align="center">
<?php

//echo  @mysql_num_rows( $sql_query ); die();
$logs = @mysql_query("SELECT * from iccgroup where printers like 'W1020' and type like 'videos' order by timecreate desc");
while($log = mysql_fetch_array( $logs )){
// Bo gio - chi lay ngay
$date = $log['timecreate'];
$createDate = date('Y-m-d', strtotime($date));

echo "<tr>";
echo "<th>". $log['filename']. "</th>";
echo "<th>". $log['type']. "</th>";
echo "<th><a href=\"http://rynantech.com/partner-login/iccgroupclick.php?id=".$log['id']."\"><img src='http://www.rynantech.com/partner-login/sites/images/dl.png".$row['image_name']."'></a></th>";
echo "<th>". $log['notes']. "</th>";
echo "<th>". $log['views']. "</th>";
echo "<th>". $createDate. "</th>";
echo "<th><a href=\"iccgroupedit.php?id=$log[id]\"><img src='http://www.rynantech.com/partner-login/sites/images/edit.png".$row['image_name']."'></a></th>";
echo "<th><a href=\"iccgroupdel.php?id=$log[id]\" onclick=\"return makesure();\"><img src='http://www.rynantech.com/partner-login/sites/images/delete.png".$row['image_name']."'></a></th>";
//echo "<td>". $log['id']. "</td>";
//echo "<td>". $log['printers']. "</td>";
//echo "<td>". $log['link']. "</td>";
//echo "<td>". $log['lastupdate']. "</td>";
//echo "<td>". $log['views']. "</td>";
//echo "<td><a href=\"http://rynantech.com/partner-login/iccgroup/VJET/$log[link]\" onclick=\"khoa();\">$log[link]</a></td>";

echo "</tr>";
}
?>

</table>
</div>


<div id="B1040-videos" class="tabcontent">
<table id="tracelog1" width="909" border="0" align="center">
<?php

//echo  @mysql_num_rows( $sql_query ); die();
$logs = @mysql_query("SELECT * from iccgroup where printers like 'B1040' and type like 'videos' order by timecreate desc");
while($log = mysql_fetch_array( $logs )){
// Bo gio - chi lay ngay
$date = $log['timecreate'];
$createDate = date('Y-m-d', strtotime($date));

echo "<tr>";
echo "<th>". $log['filename']. "</th>";
echo "<th>". $log['type']. "</th>";
echo "<th><a href=\"http://rynantech.com/partner-login/iccgroupclick.php?id=".$log['id']."\"><img src='http://www.rynantech.com/partner-login/sites/images/dl.png".$row['image_name']."'></a></th>";
echo "<th>". $log['notes']. "</th>";
echo "<th>". $log['views']. "</th>";
echo "<th>". $createDate. "</th>";
echo "<th><a href=\"iccgroupedit.php?id=$log[id]\"><img src='http://www.rynantech.com/partner-login/sites/images/edit.png".$row['image_name']."'></a></th>";
echo "<th><a href=\"iccgroupdel.php?id=$log[id]\" onclick=\"return makesure();\"><img src='http://www.rynantech.com/partner-login/sites/images/delete.png".$row['image_name']."'></a></th>";
//echo "<td>". $log['id']. "</td>";
//echo "<td>". $log['printers']. "</td>";
//echo "<td>". $log['link']. "</td>";
//echo "<td>". $log['lastupdate']. "</td>";
//echo "<td>". $log['views']. "</td>";
//echo "<td><a href=\"http://rynantech.com/partner-login/iccgroup/VJET/$log[link]\" onclick=\"khoa();\">$log[link]</a></td>";

echo "</tr>";
}
?>

</table>
</div>
     
<div id="B1040H Aluminum-videos" class="tabcontent">
<table id="tracelog1" width="909" border="0" align="center">
<?php

//echo  @mysql_num_rows( $sql_query ); die();
$logs = @mysql_query("SELECT * from iccgroup where printers like 'B1040H Aluminum' and type like 'videos' order by timecreate desc");
while($log = mysql_fetch_array( $logs )){
// Bo gio - chi lay ngay
$date = $log['timecreate'];
$createDate = date('Y-m-d', strtotime($date));

echo "<tr>";
echo "<th>". $log['filename']. "</th>";
echo "<th>". $log['type']. "</th>";
echo "<th><a href=\"http://rynantech.com/partner-login/iccgroupclick.php?id=".$log['id']."\"><img src='http://www.rynantech.com/partner-login/sites/images/dl.png".$row['image_name']."'></a></th>";
echo "<th>". $log['notes']. "</th>";
echo "<th>". $log['views']. "</th>";
echo "<th>". $createDate. "</th>";
echo "<th><a href=\"iccgroupedit.php?id=$log[id]\"><img src='http://www.rynantech.com/partner-login/sites/images/edit.png".$row['image_name']."'></a></th>";
echo "<th><a href=\"iccgroupdel.php?id=$log[id]\" onclick=\"return makesure();\"><img src='http://www.rynantech.com/partner-login/sites/images/delete.png".$row['image_name']."'></a></th>";
//echo "<td>". $log['id']. "</td>";
//echo "<td>". $log['printers']. "</td>";
//echo "<td>". $log['link']. "</td>";
//echo "<td>". $log['lastupdate']. "</td>";
//echo "<td>". $log['views']. "</td>";
//echo "<td><a href=\"http://rynantech.com/partner-login/iccgroup/VJET/$log[link]\" onclick=\"khoa();\">$log[link]</a></td>";

echo "</tr>";
}
?>

</table>
</div>     
<div id="B1040H Plastic-videos" class="tabcontent">
<table id="tracelog1" width="909" border="0" align="center">
<?php

//echo  @mysql_num_rows( $sql_query ); die();
$logs = @mysql_query("SELECT * from iccgroup where printers like 'B1040H Plastic' and type like 'videos' order by timecreate desc");
while($log = mysql_fetch_array( $logs )){
// Bo gio - chi lay ngay
$date = $log['timecreate'];
$createDate = date('Y-m-d', strtotime($date));

echo "<tr>";
echo "<th>". $log['filename']. "</th>";
echo "<th>". $log['type']. "</th>";
echo "<th><a href=\"http://rynantech.com/partner-login/iccgroupclick.php?id=".$log['id']."\"><img src='http://www.rynantech.com/partner-login/sites/images/dl.png".$row['image_name']."'></a></th>";
echo "<th>". $log['notes']. "</th>";
echo "<th>". $log['views']. "</th>";
echo "<th>". $createDate. "</th>";
echo "<th><a href=\"iccgroupedit.php?id=$log[id]\"><img src='http://www.rynantech.com/partner-login/sites/images/edit.png".$row['image_name']."'></a></th>";
echo "<th><a href=\"iccgroupdel.php?id=$log[id]\" onclick=\"return makesure();\"><img src='http://www.rynantech.com/partner-login/sites/images/delete.png".$row['image_name']."'></a></th>";
//echo "<td>". $log['id']. "</td>";
//echo "<td>". $log['printers']. "</td>";
//echo "<td>". $log['link']. "</td>";
//echo "<td>". $log['lastupdate']. "</td>";
//echo "<td>". $log['views']. "</td>";
//echo "<td><a href=\"http://rynantech.com/partner-login/iccgroup/VJET/$log[link]\" onclick=\"khoa();\">$log[link]</a></td>";

echo "</tr>";
}
?>

</table>
</div>     
<div id="B1040S-videos" class="tabcontent">
<table id="tracelog1" width="909" border="0" align="center">
<?php

//echo  @mysql_num_rows( $sql_query ); die();
$logs = @mysql_query("SELECT * from iccgroup where printers like 'B1040S' and type like 'videos' order by timecreate desc");
while($log = mysql_fetch_array( $logs )){
// Bo gio - chi lay ngay
$date = $log['timecreate'];
$createDate = date('Y-m-d', strtotime($date));

echo "<tr>";
echo "<th>". $log['filename']. "</th>";
echo "<th>". $log['type']. "</th>";
echo "<th><a href=\"http://rynantech.com/partner-login/iccgroupclick.php?id=".$log['id']."\"><img src='http://www.rynantech.com/partner-login/sites/images/dl.png".$row['image_name']."'></a></th>";
echo "<th>". $log['notes']. "</th>";
echo "<th>". $log['views']. "</th>";
echo "<th>". $createDate. "</th>";
echo "<th><a href=\"iccgroupedit.php?id=$log[id]\"><img src='http://www.rynantech.com/partner-login/sites/images/edit.png".$row['image_name']."'></a></th>";
echo "<th><a href=\"iccgroupdel.php?id=$log[id]\" onclick=\"return makesure();\"><img src='http://www.rynantech.com/partner-login/sites/images/delete.png".$row['image_name']."'></a></th>";
//echo "<td>". $log['id']. "</td>";
//echo "<td>". $log['printers']. "</td>";
//echo "<td>". $log['link']. "</td>";
//echo "<td>". $log['lastupdate']. "</td>";
//echo "<td>". $log['views']. "</td>";
//echo "<td><a href=\"http://rynantech.com/partner-login/iccgroup/VJET/$log[link]\" onclick=\"khoa();\">$log[link]</a></td>";

echo "</tr>";
}
?>

</table>
</div>     
<div id="B1040P-videos" class="tabcontent">
<table id="tracelog1" width="909" border="0" align="center">
<?php

//echo  @mysql_num_rows( $sql_query ); die();
$logs = @mysql_query("SELECT * from iccgroup where printers like 'B1040P' and type like 'videos' order by timecreate desc");
while($log = mysql_fetch_array( $logs )){
// Bo gio - chi lay ngay
$date = $log['timecreate'];
$createDate = date('Y-m-d', strtotime($date));

echo "<tr>";
echo "<th>". $log['filename']. "</th>";
echo "<th>". $log['type']. "</th>";
echo "<th><a href=\"http://rynantech.com/partner-login/iccgroupclick.php?id=".$log['id']."\"><img src='http://www.rynantech.com/partner-login/sites/images/dl.png".$row['image_name']."'></a></th>";
echo "<th>". $log['notes']. "</th>";
echo "<th>". $log['views']. "</th>";
echo "<th>". $createDate. "</th>";
echo "<th><a href=\"iccgroupedit.php?id=$log[id]\"><img src='http://www.rynantech.com/partner-login/sites/images/edit.png".$row['image_name']."'></a></th>";
echo "<th><a href=\"iccgroupdel.php?id=$log[id]\" onclick=\"return makesure();\"><img src='http://www.rynantech.com/partner-login/sites/images/delete.png".$row['image_name']."'></a></th>";
//echo "<td>". $log['id']. "</td>";
//echo "<td>". $log['printers']. "</td>";
//echo "<td>". $log['link']. "</td>";
//echo "<td>". $log['lastupdate']. "</td>";
//echo "<td>". $log['views']. "</td>";
//echo "<td><a href=\"http://rynantech.com/partner-login/iccgroup/VJET/$log[link]\" onclick=\"khoa();\">$log[link]</a></td>";

echo "</tr>";
}
?>

</table>
</div>





<div id="B1060-videos" class="tabcontent">
<table id="tracelog1" width="909" border="0" align="center">
<?php

//echo  @mysql_num_rows( $sql_query ); die();
$logs = @mysql_query("SELECT * from iccgroup where printers like 'B1060' and type like 'videos' order by timecreate desc");
while($log = mysql_fetch_array( $logs )){
// Bo gio - chi lay ngay
$date = $log['timecreate'];
$createDate = date('Y-m-d', strtotime($date));

echo "<tr>";
echo "<th>". $log['filename']. "</th>";
echo "<th>". $log['type']. "</th>";
echo "<th><a href=\"http://rynantech.com/partner-login/iccgroupclick.php?id=".$log['id']."\"><img src='http://www.rynantech.com/partner-login/sites/images/dl.png".$row['image_name']."'></a></th>";
echo "<th>". $log['notes']. "</th>";
echo "<th>". $log['views']. "</th>";
echo "<th>". $createDate. "</th>";
echo "<th><a href=\"iccgroupedit.php?id=$log[id]\"><img src='http://www.rynantech.com/partner-login/sites/images/edit.png".$row['image_name']."'></a></th>";
echo "<th><a href=\"iccgroupdel.php?id=$log[id]\" onclick=\"return makesure();\"><img src='http://www.rynantech.com/partner-login/sites/images/delete.png".$row['image_name']."'></a></th>";
//echo "<td>". $log['id']. "</td>";
//echo "<td>". $log['printers']. "</td>";
//echo "<td>". $log['link']. "</td>";
//echo "<td>". $log['lastupdate']. "</td>";
//echo "<td>". $log['views']. "</td>";
//echo "<td><a href=\"http://rynantech.com/partner-login/iccgroup/VJET/$log[link]\" onclick=\"khoa();\">$log[link]</a></td>";

echo "</tr>";
}
?>

</table>
</div>

     <div id="B1060P-videos" class="tabcontent">
<table id="tracelog1" width="909" border="0" align="center">
<?php

//echo  @mysql_num_rows( $sql_query ); die();
$logs = @mysql_query("SELECT * from iccgroup where printers like 'B1060P' and type like 'videos' order by timecreate desc");
while($log = mysql_fetch_array( $logs )){
// Bo gio - chi lay ngay
$date = $log['timecreate'];
$createDate = date('Y-m-d', strtotime($date));

echo "<tr>";
echo "<th>". $log['filename']. "</th>";
echo "<th>". $log['type']. "</th>";
echo "<th><a href=\"http://rynantech.com/partner-login/iccgroupclick.php?id=".$log['id']."\"><img src='http://www.rynantech.com/partner-login/sites/images/dl.png".$row['image_name']."'></a></th>";
echo "<th>". $log['notes']. "</th>";
echo "<th>". $log['views']. "</th>";
echo "<th>". $createDate. "</th>";
echo "<th><a href=\"iccgroupedit.php?id=$log[id]\"><img src='http://www.rynantech.com/partner-login/sites/images/edit.png".$row['image_name']."'></a></th>";
echo "<th><a href=\"iccgroupdel.php?id=$log[id]\" onclick=\"return makesure();\"><img src='http://www.rynantech.com/partner-login/sites/images/delete.png".$row['image_name']."'></a></th>";
//echo "<td>". $log['id']. "</td>";
//echo "<td>". $log['printers']. "</td>";
//echo "<td>". $log['link']. "</td>";
//echo "<td>". $log['lastupdate']. "</td>";
//echo "<td>". $log['views']. "</td>";
//echo "<td><a href=\"http://rynantech.com/partner-login/iccgroup/VJET/$log[link]\" onclick=\"khoa();\">$log[link]</a></td>";

echo "</tr>";
}
?>

</table>
</div>

     <div id="B1060H-videos" class="tabcontent">
<table id="tracelog1" width="909" border="0" align="center">
<?php

//echo  @mysql_num_rows( $sql_query ); die();
$logs = @mysql_query("SELECT * from iccgroup where printers like 'B1060H' and type like 'videos' order by timecreate desc");
while($log = mysql_fetch_array( $logs )){
// Bo gio - chi lay ngay
$date = $log['timecreate'];
$createDate = date('Y-m-d', strtotime($date));

echo "<tr>";
echo "<th>". $log['filename']. "</th>";
echo "<th>". $log['type']. "</th>";
echo "<th><a href=\"http://rynantech.com/partner-login/iccgroupclick.php?id=".$log['id']."\"><img src='http://www.rynantech.com/partner-login/sites/images/dl.png".$row['image_name']."'></a></th>";
echo "<th>". $log['notes']. "</th>";
echo "<th>". $log['views']. "</th>";
echo "<th>". $createDate. "</th>";
echo "<th><a href=\"iccgroupedit.php?id=$log[id]\"><img src='http://www.rynantech.com/partner-login/sites/images/edit.png".$row['image_name']."'></a></th>";
echo "<th><a href=\"iccgroupdel.php?id=$log[id]\" onclick=\"return makesure();\"><img src='http://www.rynantech.com/partner-login/sites/images/delete.png".$row['image_name']."'></a></th>";
//echo "<td>". $log['id']. "</td>";
//echo "<td>". $log['printers']. "</td>";
//echo "<td>". $log['link']. "</td>";
//echo "<td>". $log['lastupdate']. "</td>";
//echo "<td>". $log['views']. "</td>";
//echo "<td><a href=\"http://rynantech.com/partner-login/iccgroup/VJET/$log[link]\" onclick=\"khoa();\">$log[link]</a></td>";

echo "</tr>";
}
?>

</table>
</div>

     

     
<div id="1200-videos" class="tabcontent">
<table id="tracelog1" width="909" border="0" align="center">
<?php

//echo  @mysql_num_rows( $sql_query ); die();
$logs = @mysql_query("SELECT * from iccgroup where printers like '1200' and type like 'videos' order by timecreate desc");
while($log = mysql_fetch_array( $logs )){
// Bo gio - chi lay ngay
$date = $log['timecreate'];
$createDate = date('Y-m-d', strtotime($date));

echo "<tr>";
echo "<th>". $log['filename']. "</th>";
echo "<th>". $log['type']. "</th>";
echo "<th><a href=\"http://rynantech.com/partner-login/iccgroupclick.php?id=".$log['id']."\"><img src='http://www.rynantech.com/partner-login/sites/images/dl.png".$row['image_name']."'></a></th>";
echo "<th>". $log['notes']. "</th>";
echo "<th>". $log['views']. "</th>";
echo "<th>". $createDate. "</th>";
echo "<th><a href=\"iccgroupedit.php?id=$log[id]\"><img src='http://www.rynantech.com/partner-login/sites/images/edit.png".$row['image_name']."'></a></th>";
echo "<th><a href=\"iccgroupdel.php?id=$log[id]\" onclick=\"return makesure();\"><img src='http://www.rynantech.com/partner-login/sites/images/delete.png".$row['image_name']."'></a></th>";
//echo "<td>". $log['id']. "</td>";
//echo "<td>". $log['printers']. "</td>";
//echo "<td>". $log['link']. "</td>";
//echo "<td>". $log['lastupdate']. "</td>";
//echo "<td>". $log['views']. "</td>";
//echo "<td><a href=\"http://rynantech.com/partner-login/iccgroup/VJET/$log[link]\" onclick=\"khoa();\">$log[link]</a></td>";

echo "</tr>";
}
?>

</table>
</div>


     
<div id="1200E-videos" class="tabcontent">
<table id="tracelog1" width="909" border="0" align="center">
<?php

//echo  @mysql_num_rows( $sql_query ); die();
$logs = @mysql_query("SELECT * from iccgroup where printers like '1200E' and type like 'videos' order by timecreate desc");
while($log = mysql_fetch_array( $logs )){
// Bo gio - chi lay ngay
$date = $log['timecreate'];
$createDate = date('Y-m-d', strtotime($date));

echo "<tr>";
echo "<th>". $log['filename']. "</th>";
echo "<th>". $log['type']. "</th>";
echo "<th><a href=\"http://rynantech.com/partner-login/iccgroupclick.php?id=".$log['id']."\"><img src='http://www.rynantech.com/partner-login/sites/images/dl.png".$row['image_name']."'></a></th>";
echo "<th>". $log['notes']. "</th>";
echo "<th>". $log['views']. "</th>";
echo "<th>". $createDate. "</th>";
echo "<th><a href=\"iccgroupedit.php?id=$log[id]\"><img src='http://www.rynantech.com/partner-login/sites/images/edit.png".$row['image_name']."'></a></th>";
echo "<th><a href=\"iccgroupdel.php?id=$log[id]\" onclick=\"return makesure();\"><img src='http://www.rynantech.com/partner-login/sites/images/delete.png".$row['image_name']."'></a></th>";
//echo "<td>". $log['id']. "</td>";
//echo "<td>". $log['printers']. "</td>";
//echo "<td>". $log['link']. "</td>";
//echo "<td>". $log['lastupdate']. "</td>";
//echo "<td>". $log['views']. "</td>";
//echo "<td><a href=\"http://rynantech.com/partner-login/iccgroup/VJET/$log[link]\" onclick=\"khoa();\">$log[link]</a></td>";

echo "</tr>";
}
?>

</table>
</div>


     
<div id="1200Plus-videos" class="tabcontent">
<table id="tracelog1" width="909" border="0" align="center">
<?php

//echo  @mysql_num_rows( $sql_query ); die();
$logs = @mysql_query("SELECT * from iccgroup where printers like '1200Plus' and type like 'videos' order by timecreate desc");
while($log = mysql_fetch_array( $logs )){
// Bo gio - chi lay ngay
$date = $log['timecreate'];
$createDate = date('Y-m-d', strtotime($date));

echo "<tr>";
echo "<th>". $log['filename']. "</th>";
echo "<th>". $log['type']. "</th>";
echo "<th><a href=\"http://rynantech.com/partner-login/iccgroupclick.php?id=".$log['id']."\"><img src='http://www.rynantech.com/partner-login/sites/images/dl.png".$row['image_name']."'></a></th>";
echo "<th>". $log['notes']. "</th>";
echo "<th>". $log['views']. "</th>";
echo "<th>". $createDate. "</th>";
echo "<th><a href=\"iccgroupedit.php?id=$log[id]\"><img src='http://www.rynantech.com/partner-login/sites/images/edit.png".$row['image_name']."'></a></th>";
echo "<th><a href=\"iccgroupdel.php?id=$log[id]\" onclick=\"return makesure();\"><img src='http://www.rynantech.com/partner-login/sites/images/delete.png".$row['image_name']."'></a></th>";
//echo "<td>". $log['id']. "</td>";
//echo "<td>". $log['printers']. "</td>";
//echo "<td>". $log['link']. "</td>";
//echo "<td>". $log['lastupdate']. "</td>";
//echo "<td>". $log['views']. "</td>";
//echo "<td><a href=\"http://rynantech.com/partner-login/iccgroup/VJET/$log[link]\" onclick=\"khoa();\">$log[link]</a></td>";

echo "</tr>";
}
?>

</table>
</div>


     
<div id="1200EG-videos" class="tabcontent">
<table id="tracelog1" width="909" border="0" align="center">
<?php

//echo  @mysql_num_rows( $sql_query ); die();
$logs = @mysql_query("SELECT * from iccgroup where printers like '1200EG' and type like 'videos' order by timecreate desc");
while($log = mysql_fetch_array( $logs )){
// Bo gio - chi lay ngay
$date = $log['timecreate'];
$createDate = date('Y-m-d', strtotime($date));

echo "<tr>";
echo "<th>". $log['filename']. "</th>";
echo "<th>". $log['type']. "</th>";
echo "<th><a href=\"http://rynantech.com/partner-login/iccgroupclick.php?id=".$log['id']."\"><img src='http://www.rynantech.com/partner-login/sites/images/dl.png".$row['image_name']."'></a></th>";
echo "<th>". $log['notes']. "</th>";
echo "<th>". $log['views']. "</th>";
echo "<th>". $createDate. "</th>";
echo "<th><a href=\"iccgroupedit.php?id=$log[id]\"><img src='http://www.rynantech.com/partner-login/sites/images/edit.png".$row['image_name']."'></a></th>";
echo "<th><a href=\"iccgroupdel.php?id=$log[id]\" onclick=\"return makesure();\"><img src='http://www.rynantech.com/partner-login/sites/images/delete.png".$row['image_name']."'></a></th>";
//echo "<td>". $log['id']. "</td>";
//echo "<td>". $log['printers']. "</td>";
//echo "<td>". $log['link']. "</td>";
//echo "<td>". $log['lastupdate']. "</td>";
//echo "<td>". $log['views']. "</td>";
//echo "<td><a href=\"http://rynantech.com/partner-login/iccgroup/VJET/$log[link]\" onclick=\"khoa();\">$log[link]</a></td>";

echo "</tr>";
}
?>

</table>
</div>


     
     
<div id="2172C-videos" class="tabcontent">
<table id="tracelog1" width="909" border="0" align="center">
<?php

//echo  @mysql_num_rows( $sql_query ); die();
$logs = @mysql_query("SELECT * from iccgroup where printers like '2172C' and type like 'videos' order by timecreate desc");
while($log = mysql_fetch_array( $logs )){
// Bo gio - chi lay ngay
$date = $log['timecreate'];
$createDate = date('Y-m-d', strtotime($date));

echo "<tr>";
echo "<th>". $log['filename']. "</th>";
echo "<th>". $log['type']. "</th>";
echo "<th><a href=\"http://rynantech.com/partner-login/iccgroupclick.php?id=".$log['id']."\"><img src='http://www.rynantech.com/partner-login/sites/images/dl.png".$row['image_name']."'></a></th>";
echo "<th>". $log['notes']. "</th>";
echo "<th>". $log['views']. "</th>";
echo "<th>". $createDate. "</th>";
echo "<th><a href=\"iccgroupedit.php?id=$log[id]\"><img src='http://www.rynantech.com/partner-login/sites/images/edit.png".$row['image_name']."'></a></th>";
echo "<th><a href=\"iccgroupdel.php?id=$log[id]\" onclick=\"return makesure();\"><img src='http://www.rynantech.com/partner-login/sites/images/delete.png".$row['image_name']."'></a></th>";
//echo "<td>". $log['id']. "</td>";
//echo "<td>". $log['printers']. "</td>";
//echo "<td>". $log['link']. "</td>";
//echo "<td>". $log['lastupdate']. "</td>";
//echo "<td>". $log['views']. "</td>";
//echo "<td><a href=\"http://rynantech.com/partner-login/iccgroup/VJET/$log[link]\" onclick=\"khoa();\">$log[link]</a></td>";

echo "</tr>";
}
?>

</table>
</div>


     
<div id="IOJ100-videos" class="tabcontent">
<table id="tracelog1" width="909" border="0" align="center">
<?php

//echo  @mysql_num_rows( $sql_query ); die();
$logs = @mysql_query("SELECT * from iccgroup where printers like 'IOJ100' and type like 'videos' order by timecreate desc");
while($log = mysql_fetch_array( $logs )){
// Bo gio - chi lay ngay
$date = $log['timecreate'];
$createDate = date('Y-m-d', strtotime($date));

echo "<tr>";
echo "<th>". $log['filename']. "</th>";
echo "<th>". $log['type']. "</th>";
echo "<th><a href=\"http://rynantech.com/partner-login/iccgroupclick.php?id=".$log['id']."\"><img src='http://www.rynantech.com/partner-login/sites/images/dl.png".$row['image_name']."'></a></th>";
echo "<th>". $log['notes']. "</th>";
echo "<th>". $log['views']. "</th>";
echo "<th>". $createDate. "</th>";
echo "<th><a href=\"iccgroupedit.php?id=$log[id]\"><img src='http://www.rynantech.com/partner-login/sites/images/edit.png".$row['image_name']."'></a></th>";
echo "<th><a href=\"iccgroupdel.php?id=$log[id]\" onclick=\"return makesure();\"><img src='http://www.rynantech.com/partner-login/sites/images/delete.png".$row['image_name']."'></a></th>";
//echo "<td>". $log['id']. "</td>";
//echo "<td>". $log['printers']. "</td>";
//echo "<td>". $log['link']. "</td>";
//echo "<td>". $log['lastupdate']. "</td>";
//echo "<td>". $log['views']. "</td>";
//echo "<td><a href=\"http://rynantech.com/partner-login/iccgroup/VJET/$log[link]\" onclick=\"khoa();\">$log[link]</a></td>";

echo "</tr>";
}
?>

</table>
</div>


     
<div id="IOJ200-videos" class="tabcontent">
<table id="tracelog1" width="909" border="0" align="center">
<?php

//echo  @mysql_num_rows( $sql_query ); die();
$logs = @mysql_query("SELECT * from iccgroup where printers like 'IOJ200' and type like 'videos' order by timecreate desc");
while($log = mysql_fetch_array( $logs )){
// Bo gio - chi lay ngay
$date = $log['timecreate'];
$createDate = date('Y-m-d', strtotime($date));

echo "<tr>";
echo "<th>". $log['filename']. "</th>";
echo "<th>". $log['type']. "</th>";
echo "<th><a href=\"http://rynantech.com/partner-login/iccgroupclick.php?id=".$log['id']."\"><img src='http://www.rynantech.com/partner-login/sites/images/dl.png".$row['image_name']."'></a></th>";
echo "<th>". $log['notes']. "</th>";
echo "<th>". $log['views']. "</th>";
echo "<th>". $createDate. "</th>";
echo "<th><a href=\"iccgroupedit.php?id=$log[id]\"><img src='http://www.rynantech.com/partner-login/sites/images/edit.png".$row['image_name']."'></a></th>";
echo "<th><a href=\"iccgroupdel.php?id=$log[id]\" onclick=\"return makesure();\"><img src='http://www.rynantech.com/partner-login/sites/images/delete.png".$row['image_name']."'></a></th>";
//echo "<td>". $log['id']. "</td>";
//echo "<td>". $log['printers']. "</td>";
//echo "<td>". $log['link']. "</td>";
//echo "<td>". $log['lastupdate']. "</td>";
//echo "<td>". $log['views']. "</td>";
//echo "<td><a href=\"http://rynantech.com/partner-login/iccgroup/VJET/$log[link]\" onclick=\"khoa();\">$log[link]</a></td>";

echo "</tr>";
}
?>

</table>
</div>




<div id="InkFeeder8-videos" class="tabcontent">
<table id="tracelog1" width="909" border="0" align="center">
<?php

//echo  @mysql_num_rows( $sql_query ); die();
$logs = @mysql_query("SELECT * from iccgroup where printers like 'InkFeeder8' and type like 'videos' order by timecreate desc");
while($log = mysql_fetch_array( $logs )){
// Bo gio - chi lay ngay
$date = $log['timecreate'];
$createDate = date('Y-m-d', strtotime($date));

echo "<tr>";
echo "<th>". $log['filename']. "</th>";
echo "<th>". $log['type']. "</th>";
echo "<th><a href=\"http://rynantech.com/partner-login/iccgroupclick.php?id=".$log['id']."\"><img src='http://www.rynantech.com/partner-login/sites/images/dl.png".$row['image_name']."'></a></th>";
echo "<th>". $log['notes']. "</th>";
echo "<th>". $log['views']. "</th>";
echo "<th>". $createDate. "</th>";
echo "<th><a href=\"iccgroupedit.php?id=$log[id]\"><img src='http://www.rynantech.com/partner-login/sites/images/edit.png".$row['image_name']."'></a></th>";
echo "<th><a href=\"iccgroupdel.php?id=$log[id]\" onclick=\"return makesure();\"><img src='http://www.rynantech.com/partner-login/sites/images/delete.png".$row['image_name']."'></a></th>";
//echo "<td>". $log['id']. "</td>";
//echo "<td>". $log['printers']. "</td>";
//echo "<td>". $log['link']. "</td>";
//echo "<td>". $log['lastupdate']. "</td>";
//echo "<td>". $log['views']. "</td>";
//echo "<td><a href=\"http://rynantech.com/partner-login/iccgroup/VJET/$log[link]\" onclick=\"khoa();\">$log[link]</a></td>";

echo "</tr>";
}
?>

</table>
</div>



<!-- PHOTOS -->
<div class="onecolumntitle">
<div class="header">
      <span>PHOTOS</span>
</div></div>
<div class="tab">
  <button class="tablinks" onclick="openCity(event, 'RYNAN R20-photos')">RYNAN R20</button>
  <button class="tablinks" onclick="openCity(event, 'W1000-photos')">W1000</button>
  <button class="tablinks" onclick="openCity(event, 'R1010-photos')">R1010</button>
  <button class="tablinks" onclick="openCity(event, 'R1010P-photos')">R1010P</button>
  <button class="tablinks" onclick="openCity(event, 'W1020-photos')">W1020</button>
  <button class="tablinks" onclick="openCity(event, 'B1040-photos')">B1040</button>
  <button class="tablinks" onclick="openCity(event, 'B1040H Aluminum-photos')">B1040H Aluminum</button>
  <button class="tablinks" onclick="openCity(event, 'B1040H Plastic-photos')">B1040H Plastic</button>
  <button class="tablinks" onclick="openCity(event, 'B1040S-photos')">B1040S</button>
  <button class="tablinks" onclick="openCity(event, 'B1040P-photos')">B1040P</button>
  <button class="tablinks" onclick="openCity(event, 'B1060-photos')">B1060</button>
  <button class="tablinks" onclick="openCity(event, 'B1060P-photos')">B1060P</button>
  <button class="tablinks" onclick="openCity(event, 'B1060H-photos')">B1060H</button>
  <button class="tablinks" onclick="openCity(event, '1200-photos')">1200</button>
  <button class="tablinks" onclick="openCity(event, '1200E-photos')">1200E</button>
  <button class="tablinks" onclick="openCity(event, '1200Plus-photos')">1200Plus</button>
  <button class="tablinks" onclick="openCity(event, '1200EG-photos')">1200EG</button>
  <button class="tablinks" onclick="openCity(event, '2172C-photos')">2172C</button>
  <button class="tablinks" onclick="openCity(event, 'IOJ100-photos')">IOJ100</button>
  <button class="tablinks" onclick="openCity(event, 'IOJ200-photos')">IOJ200</button>
  <button class="tablinks" onclick="openCity(event, 'InkFeeder8-photos')">InkFeeder8</button>
</div>

<div id="RYNAN R20-photos" class="tabcontent" style="display: block;" >
<table id="tracelog1" width="909" border="0" align="center">
<?php

//echo  @mysql_num_rows( $sql_query ); die();
$logs = @mysql_query("SELECT * from iccgroup where printers like 'R20 PRO' and type like 'photos' order by timecreate desc");
while($log = mysql_fetch_array( $logs )){
// Bo gio - chi lay ngay
$date = $log['timecreate'];
$createDate = date('Y-m-d', strtotime($date));

echo "<tr>";
echo "<th>". $log['filename']. "</th>";
echo "<th>". $log['type']. "</th>";
echo "<th><a href=\"http://rynantech.com/partner-login/iccgroupclick.php?id=".$log['id']."\"><img src='http://www.rynantech.com/partner-login/sites/images/dl.png".$row['image_name']."'></a></th>";
echo "<th>". $log['notes']. "</th>";
echo "<th>". $log['views']. "</th>";
echo "<th>". $createDate. "</th>";
echo "<th><a href=\"iccgroupedit.php?id=$log[id]\"><img src='http://www.rynantech.com/partner-login/sites/images/edit.png".$row['image_name']."'></a></th>";
echo "<th><a href=\"iccgroupdel.php?id=$log[id]\" onclick=\"return makesure();\"><img src='http://www.rynantech.com/partner-login/sites/images/delete.png".$row['image_name']."'></a></th>";
//echo "<td>". $log['id']. "</td>";
//echo "<td>". $log['printers']. "</td>";
//echo "<td>". $log['link']. "</td>";
//echo "<td>". $log['lastupdate']. "</td>";
//echo "<td>". $log['views']. "</td>";
//echo "<td><a href=\"http://rynantech.com/partner-login/iccgroup/VJET/$log[link]\" onclick=\"khoa();\">$log[link]</a></td>";

echo "</tr>";
}
?>

</table>
</div>


<div id="W1000-photos" class="tabcontent" style="display: block;" >
<table id="tracelog1" width="909" border="0" align="center">
<?php

//echo  @mysql_num_rows( $sql_query ); die();
$logs = @mysql_query("SELECT * from iccgroup where printers like 'W1000' and type like 'photos' order by timecreate desc");
while($log = mysql_fetch_array( $logs )){
// Bo gio - chi lay ngay
$date = $log['timecreate'];
$createDate = date('Y-m-d', strtotime($date));

echo "<tr>";
echo "<th>". $log['filename']. "</th>";
echo "<th>". $log['type']. "</th>";
echo "<th><a href=\"http://rynantech.com/partner-login/iccgroupclick.php?id=".$log['id']."\"><img src='http://www.rynantech.com/partner-login/sites/images/dl.png".$row['image_name']."'></a></th>";
echo "<th>". $log['notes']. "</th>";
echo "<th>". $log['views']. "</th>";
echo "<th>". $createDate. "</th>";
echo "<th><a href=\"iccgroupedit.php?id=$log[id]\"><img src='http://www.rynantech.com/partner-login/sites/images/edit.png".$row['image_name']."'></a></th>";
echo "<th><a href=\"iccgroupdel.php?id=$log[id]\" onclick=\"return makesure();\"><img src='http://www.rynantech.com/partner-login/sites/images/delete.png".$row['image_name']."'></a></th>";
//echo "<td>". $log['id']. "</td>";
//echo "<td>". $log['printers']. "</td>";
//echo "<td>". $log['link']. "</td>";
//echo "<td>". $log['lastupdate']. "</td>";
//echo "<td>". $log['views']. "</td>";
//echo "<td><a href=\"http://rynantech.com/partner-login/iccgroup/VJET/$log[link]\" onclick=\"khoa();\">$log[link]</a></td>";

echo "</tr>";
}
?>

</table>
</div>



<div id="R1010-photos" class="tabcontent">
<table id="tracelog1" width="909" border="0" align="center">
<?php

//echo  @mysql_num_rows( $sql_query ); die();
$logs = @mysql_query("SELECT * from iccgroup where printers like 'R1010' and type like 'photos' order by timecreate desc");
while($log = mysql_fetch_array( $logs )){
// Bo gio - chi lay ngay
$date = $log['timecreate'];
$createDate = date('Y-m-d', strtotime($date));

echo "<tr>";
echo "<th>". $log['filename']. "</th>";
echo "<th>". $log['type']. "</th>";
echo "<th><a href=\"http://rynantech.com/partner-login/iccgroupclick.php?id=".$log['id']."\"><img src='http://www.rynantech.com/partner-login/sites/images/dl.png".$row['image_name']."'></a></th>";
echo "<th>". $log['notes']. "</th>";
echo "<th>". $log['views']. "</th>";
echo "<th>". $createDate. "</th>";
echo "<th><a href=\"iccgroupedit.php?id=$log[id]\"><img src='http://www.rynantech.com/partner-login/sites/images/edit.png".$row['image_name']."'></a></th>";
echo "<th><a href=\"iccgroupdel.php?id=$log[id]\" onclick=\"return makesure();\"><img src='http://www.rynantech.com/partner-login/sites/images/delete.png".$row['image_name']."'></a></th>";
//echo "<td>". $log['id']. "</td>";
//echo "<td>". $log['printers']. "</td>";
//echo "<td>". $log['link']. "</td>";
//echo "<td>". $log['lastupdate']. "</td>";
//echo "<td>". $log['views']. "</td>";
//echo "<td><a href=\"http://rynantech.com/partner-login/iccgroup/VJET/$log[link]\" onclick=\"khoa();\">$log[link]</a></td>";

echo "</tr>";
}
?>

</table>
</div>




<div id="R1010P-photos" class="tabcontent">
<table id="tracelog1" width="909" border="0" align="center">
<?php

//echo  @mysql_num_rows( $sql_query ); die();
$logs = @mysql_query("SELECT * from iccgroup where printers like 'R1010P' and type like 'photos' order by timecreate desc");
while($log = mysql_fetch_array( $logs )){
// Bo gio - chi lay ngay
$date = $log['timecreate'];
$createDate = date('Y-m-d', strtotime($date));

echo "<tr>";
echo "<th>". $log['filename']. "</th>";
echo "<th>". $log['type']. "</th>";
echo "<th><a href=\"http://rynantech.com/partner-login/iccgroupclick.php?id=".$log['id']."\"><img src='http://www.rynantech.com/partner-login/sites/images/dl.png".$row['image_name']."'></a></th>";
echo "<th>". $log['notes']. "</th>";
echo "<th>". $log['views']. "</th>";
echo "<th>". $createDate. "</th>";
echo "<th><a href=\"iccgroupedit.php?id=$log[id]\"><img src='http://www.rynantech.com/partner-login/sites/images/edit.png".$row['image_name']."'></a></th>";
echo "<th><a href=\"iccgroupdel.php?id=$log[id]\" onclick=\"return makesure();\"><img src='http://www.rynantech.com/partner-login/sites/images/delete.png".$row['image_name']."'></a></th>";
//echo "<td>". $log['id']. "</td>";
//echo "<td>". $log['printers']. "</td>";
//echo "<td>". $log['link']. "</td>";
//echo "<td>". $log['lastupdate']. "</td>";
//echo "<td>". $log['views']. "</td>";
//echo "<td><a href=\"http://rynantech.com/partner-login/iccgroup/VJET/$log[link]\" onclick=\"khoa();\">$log[link]</a></td>";

echo "</tr>";
}
?>

</table>
</div>




<div id="W1020-photos" class="tabcontent">
<table id="tracelog1" width="909" border="0" align="center">
<?php

//echo  @mysql_num_rows( $sql_query ); die();
$logs = @mysql_query("SELECT * from iccgroup where printers like 'W1020' and type like 'photos' order by timecreate desc");
while($log = mysql_fetch_array( $logs )){
// Bo gio - chi lay ngay
$date = $log['timecreate'];
$createDate = date('Y-m-d', strtotime($date));

echo "<tr>";
echo "<th>". $log['filename']. "</th>";
echo "<th>". $log['type']. "</th>";
echo "<th><a href=\"http://rynantech.com/partner-login/iccgroupclick.php?id=".$log['id']."\"><img src='http://www.rynantech.com/partner-login/sites/images/dl.png".$row['image_name']."'></a></th>";
echo "<th>". $log['notes']. "</th>";
echo "<th>". $log['views']. "</th>";
echo "<th>". $createDate. "</th>";
echo "<th><a href=\"iccgroupedit.php?id=$log[id]\"><img src='http://www.rynantech.com/partner-login/sites/images/edit.png".$row['image_name']."'></a></th>";
echo "<th><a href=\"iccgroupdel.php?id=$log[id]\" onclick=\"return makesure();\"><img src='http://www.rynantech.com/partner-login/sites/images/delete.png".$row['image_name']."'></a></th>";
//echo "<td>". $log['id']. "</td>";
//echo "<td>". $log['printers']. "</td>";
//echo "<td>". $log['link']. "</td>";
//echo "<td>". $log['lastupdate']. "</td>";
//echo "<td>". $log['views']. "</td>";
//echo "<td><a href=\"http://rynantech.com/partner-login/iccgroup/VJET/$log[link]\" onclick=\"khoa();\">$log[link]</a></td>";

echo "</tr>";
}
?>

</table>
</div>


<div id="B1040-photos" class="tabcontent">
<table id="tracelog1" width="909" border="0" align="center">
<?php

//echo  @mysql_num_rows( $sql_query ); die();
$logs = @mysql_query("SELECT * from iccgroup where printers like 'B1040' and type like 'photos' order by timecreate desc");
while($log = mysql_fetch_array( $logs )){
// Bo gio - chi lay ngay
$date = $log['timecreate'];
$createDate = date('Y-m-d', strtotime($date));

echo "<tr>";
echo "<th>". $log['filename']. "</th>";
echo "<th>". $log['type']. "</th>";
echo "<th><a href=\"http://rynantech.com/partner-login/iccgroupclick.php?id=".$log['id']."\"><img src='http://www.rynantech.com/partner-login/sites/images/dl.png".$row['image_name']."'></a></th>";
echo "<th>". $log['notes']. "</th>";
echo "<th>". $log['views']. "</th>";
echo "<th>". $createDate. "</th>";
echo "<th><a href=\"iccgroupedit.php?id=$log[id]\"><img src='http://www.rynantech.com/partner-login/sites/images/edit.png".$row['image_name']."'></a></th>";
echo "<th><a href=\"iccgroupdel.php?id=$log[id]\" onclick=\"return makesure();\"><img src='http://www.rynantech.com/partner-login/sites/images/delete.png".$row['image_name']."'></a></th>";
//echo "<td>". $log['id']. "</td>";
//echo "<td>". $log['printers']. "</td>";
//echo "<td>". $log['link']. "</td>";
//echo "<td>". $log['lastupdate']. "</td>";
//echo "<td>". $log['views']. "</td>";
//echo "<td><a href=\"http://rynantech.com/partner-login/iccgroup/VJET/$log[link]\" onclick=\"khoa();\">$log[link]</a></td>";

echo "</tr>";
}
?>

</table>
</div>
     
<div id="B1040H Aluminum-photos" class="tabcontent">
<table id="tracelog1" width="909" border="0" align="center">
<?php

//echo  @mysql_num_rows( $sql_query ); die();
$logs = @mysql_query("SELECT * from iccgroup where printers like 'B1040H Aluminum' and type like 'photos' order by timecreate desc");
while($log = mysql_fetch_array( $logs )){
// Bo gio - chi lay ngay
$date = $log['timecreate'];
$createDate = date('Y-m-d', strtotime($date));

echo "<tr>";
echo "<th>". $log['filename']. "</th>";
echo "<th>". $log['type']. "</th>";
echo "<th><a href=\"http://rynantech.com/partner-login/iccgroupclick.php?id=".$log['id']."\"><img src='http://www.rynantech.com/partner-login/sites/images/dl.png".$row['image_name']."'></a></th>";
echo "<th>". $log['notes']. "</th>";
echo "<th>". $log['views']. "</th>";
echo "<th>". $createDate. "</th>";
echo "<th><a href=\"iccgroupedit.php?id=$log[id]\"><img src='http://www.rynantech.com/partner-login/sites/images/edit.png".$row['image_name']."'></a></th>";
echo "<th><a href=\"iccgroupdel.php?id=$log[id]\" onclick=\"return makesure();\"><img src='http://www.rynantech.com/partner-login/sites/images/delete.png".$row['image_name']."'></a></th>";
//echo "<td>". $log['id']. "</td>";
//echo "<td>". $log['printers']. "</td>";
//echo "<td>". $log['link']. "</td>";
//echo "<td>". $log['lastupdate']. "</td>";
//echo "<td>". $log['views']. "</td>";
//echo "<td><a href=\"http://rynantech.com/partner-login/iccgroup/VJET/$log[link]\" onclick=\"khoa();\">$log[link]</a></td>";

echo "</tr>";
}
?>

</table>
</div>     
<div id="B1040H Plastic-photos" class="tabcontent">
<table id="tracelog1" width="909" border="0" align="center">
<?php

//echo  @mysql_num_rows( $sql_query ); die();
$logs = @mysql_query("SELECT * from iccgroup where printers like 'B1040H Plastic' and type like 'photos' order by timecreate desc");
while($log = mysql_fetch_array( $logs )){
// Bo gio - chi lay ngay
$date = $log['timecreate'];
$createDate = date('Y-m-d', strtotime($date));

echo "<tr>";
echo "<th>". $log['filename']. "</th>";
echo "<th>". $log['type']. "</th>";
echo "<th><a href=\"http://rynantech.com/partner-login/iccgroupclick.php?id=".$log['id']."\"><img src='http://www.rynantech.com/partner-login/sites/images/dl.png".$row['image_name']."'></a></th>";
echo "<th>". $log['notes']. "</th>";
echo "<th>". $log['views']. "</th>";
echo "<th>". $createDate. "</th>";
echo "<th><a href=\"iccgroupedit.php?id=$log[id]\"><img src='http://www.rynantech.com/partner-login/sites/images/edit.png".$row['image_name']."'></a></th>";
echo "<th><a href=\"iccgroupdel.php?id=$log[id]\" onclick=\"return makesure();\"><img src='http://www.rynantech.com/partner-login/sites/images/delete.png".$row['image_name']."'></a></th>";
//echo "<td>". $log['id']. "</td>";
//echo "<td>". $log['printers']. "</td>";
//echo "<td>". $log['link']. "</td>";
//echo "<td>". $log['lastupdate']. "</td>";
//echo "<td>". $log['views']. "</td>";
//echo "<td><a href=\"http://rynantech.com/partner-login/iccgroup/VJET/$log[link]\" onclick=\"khoa();\">$log[link]</a></td>";

echo "</tr>";
}
?>

</table>
</div>     
<div id="B1040S-photos" class="tabcontent">
<table id="tracelog1" width="909" border="0" align="center">
<?php

//echo  @mysql_num_rows( $sql_query ); die();
$logs = @mysql_query("SELECT * from iccgroup where printers like 'B1040S' and type like 'photos' order by timecreate desc");
while($log = mysql_fetch_array( $logs )){
// Bo gio - chi lay ngay
$date = $log['timecreate'];
$createDate = date('Y-m-d', strtotime($date));

echo "<tr>";
echo "<th>". $log['filename']. "</th>";
echo "<th>". $log['type']. "</th>";
echo "<th><a href=\"http://rynantech.com/partner-login/iccgroupclick.php?id=".$log['id']."\"><img src='http://www.rynantech.com/partner-login/sites/images/dl.png".$row['image_name']."'></a></th>";
echo "<th>". $log['notes']. "</th>";
echo "<th>". $log['views']. "</th>";
echo "<th>". $createDate. "</th>";
echo "<th><a href=\"iccgroupedit.php?id=$log[id]\"><img src='http://www.rynantech.com/partner-login/sites/images/edit.png".$row['image_name']."'></a></th>";
echo "<th><a href=\"iccgroupdel.php?id=$log[id]\" onclick=\"return makesure();\"><img src='http://www.rynantech.com/partner-login/sites/images/delete.png".$row['image_name']."'></a></th>";
//echo "<td>". $log['id']. "</td>";
//echo "<td>". $log['printers']. "</td>";
//echo "<td>". $log['link']. "</td>";
//echo "<td>". $log['lastupdate']. "</td>";
//echo "<td>". $log['views']. "</td>";
//echo "<td><a href=\"http://rynantech.com/partner-login/iccgroup/VJET/$log[link]\" onclick=\"khoa();\">$log[link]</a></td>";

echo "</tr>";
}
?>

</table>
</div>     
<div id="B1040P-photos" class="tabcontent">
<table id="tracelog1" width="909" border="0" align="center">
<?php

//echo  @mysql_num_rows( $sql_query ); die();
$logs = @mysql_query("SELECT * from iccgroup where printers like 'B1040P' and type like 'photos' order by timecreate desc");
while($log = mysql_fetch_array( $logs )){
// Bo gio - chi lay ngay
$date = $log['timecreate'];
$createDate = date('Y-m-d', strtotime($date));

echo "<tr>";
echo "<th>". $log['filename']. "</th>";
echo "<th>". $log['type']. "</th>";
echo "<th><a href=\"http://rynantech.com/partner-login/iccgroupclick.php?id=".$log['id']."\"><img src='http://www.rynantech.com/partner-login/sites/images/dl.png".$row['image_name']."'></a></th>";
echo "<th>". $log['notes']. "</th>";
echo "<th>". $log['views']. "</th>";
echo "<th>". $createDate. "</th>";
echo "<th><a href=\"iccgroupedit.php?id=$log[id]\"><img src='http://www.rynantech.com/partner-login/sites/images/edit.png".$row['image_name']."'></a></th>";
echo "<th><a href=\"iccgroupdel.php?id=$log[id]\" onclick=\"return makesure();\"><img src='http://www.rynantech.com/partner-login/sites/images/delete.png".$row['image_name']."'></a></th>";
//echo "<td>". $log['id']. "</td>";
//echo "<td>". $log['printers']. "</td>";
//echo "<td>". $log['link']. "</td>";
//echo "<td>". $log['lastupdate']. "</td>";
//echo "<td>". $log['views']. "</td>";
//echo "<td><a href=\"http://rynantech.com/partner-login/iccgroup/VJET/$log[link]\" onclick=\"khoa();\">$log[link]</a></td>";

echo "</tr>";
}
?>

</table>
</div>





<div id="B1060-photos" class="tabcontent">
<table id="tracelog1" width="909" border="0" align="center">
<?php

//echo  @mysql_num_rows( $sql_query ); die();
$logs = @mysql_query("SELECT * from iccgroup where printers like 'B1060' and type like 'photos' order by timecreate desc");
while($log = mysql_fetch_array( $logs )){
// Bo gio - chi lay ngay
$date = $log['timecreate'];
$createDate = date('Y-m-d', strtotime($date));

echo "<tr>";
echo "<th>". $log['filename']. "</th>";
echo "<th>". $log['type']. "</th>";
echo "<th><a href=\"http://rynantech.com/partner-login/iccgroupclick.php?id=".$log['id']."\"><img src='http://www.rynantech.com/partner-login/sites/images/dl.png".$row['image_name']."'></a></th>";
echo "<th>". $log['notes']. "</th>";
echo "<th>". $log['views']. "</th>";
echo "<th>". $createDate. "</th>";
echo "<th><a href=\"iccgroupedit.php?id=$log[id]\"><img src='http://www.rynantech.com/partner-login/sites/images/edit.png".$row['image_name']."'></a></th>";
echo "<th><a href=\"iccgroupdel.php?id=$log[id]\" onclick=\"return makesure();\"><img src='http://www.rynantech.com/partner-login/sites/images/delete.png".$row['image_name']."'></a></th>";
//echo "<td>". $log['id']. "</td>";
//echo "<td>". $log['printers']. "</td>";
//echo "<td>". $log['link']. "</td>";
//echo "<td>". $log['lastupdate']. "</td>";
//echo "<td>". $log['views']. "</td>";
//echo "<td><a href=\"http://rynantech.com/partner-login/iccgroup/VJET/$log[link]\" onclick=\"khoa();\">$log[link]</a></td>";

echo "</tr>";
}
?>

</table>
</div>

     <div id="B1060P-photos" class="tabcontent">
<table id="tracelog1" width="909" border="0" align="center">
<?php

//echo  @mysql_num_rows( $sql_query ); die();
$logs = @mysql_query("SELECT * from iccgroup where printers like 'B1060P' and type like 'photos' order by timecreate desc");
while($log = mysql_fetch_array( $logs )){
// Bo gio - chi lay ngay
$date = $log['timecreate'];
$createDate = date('Y-m-d', strtotime($date));

echo "<tr>";
echo "<th>". $log['filename']. "</th>";
echo "<th>". $log['type']. "</th>";
echo "<th><a href=\"http://rynantech.com/partner-login/iccgroupclick.php?id=".$log['id']."\"><img src='http://www.rynantech.com/partner-login/sites/images/dl.png".$row['image_name']."'></a></th>";
echo "<th>". $log['notes']. "</th>";
echo "<th>". $log['views']. "</th>";
echo "<th>". $createDate. "</th>";
echo "<th><a href=\"iccgroupedit.php?id=$log[id]\"><img src='http://www.rynantech.com/partner-login/sites/images/edit.png".$row['image_name']."'></a></th>";
echo "<th><a href=\"iccgroupdel.php?id=$log[id]\" onclick=\"return makesure();\"><img src='http://www.rynantech.com/partner-login/sites/images/delete.png".$row['image_name']."'></a></th>";
//echo "<td>". $log['id']. "</td>";
//echo "<td>". $log['printers']. "</td>";
//echo "<td>". $log['link']. "</td>";
//echo "<td>". $log['lastupdate']. "</td>";
//echo "<td>". $log['views']. "</td>";
//echo "<td><a href=\"http://rynantech.com/partner-login/iccgroup/VJET/$log[link]\" onclick=\"khoa();\">$log[link]</a></td>";

echo "</tr>";
}
?>

</table>
</div>

     <div id="B1060H-photos" class="tabcontent">
<table id="tracelog1" width="909" border="0" align="center">
<?php

//echo  @mysql_num_rows( $sql_query ); die();
$logs = @mysql_query("SELECT * from iccgroup where printers like 'B1060H' and type like 'photos' order by timecreate desc");
while($log = mysql_fetch_array( $logs )){
// Bo gio - chi lay ngay
$date = $log['timecreate'];
$createDate = date('Y-m-d', strtotime($date));

echo "<tr>";
echo "<th>". $log['filename']. "</th>";
echo "<th>". $log['type']. "</th>";
echo "<th><a href=\"http://rynantech.com/partner-login/iccgroupclick.php?id=".$log['id']."\"><img src='http://www.rynantech.com/partner-login/sites/images/dl.png".$row['image_name']."'></a></th>";
echo "<th>". $log['notes']. "</th>";
echo "<th>". $log['views']. "</th>";
echo "<th>". $createDate. "</th>";
echo "<th><a href=\"iccgroupedit.php?id=$log[id]\"><img src='http://www.rynantech.com/partner-login/sites/images/edit.png".$row['image_name']."'></a></th>";
echo "<th><a href=\"iccgroupdel.php?id=$log[id]\" onclick=\"return makesure();\"><img src='http://www.rynantech.com/partner-login/sites/images/delete.png".$row['image_name']."'></a></th>";
//echo "<td>". $log['id']. "</td>";
//echo "<td>". $log['printers']. "</td>";
//echo "<td>". $log['link']. "</td>";
//echo "<td>". $log['lastupdate']. "</td>";
//echo "<td>". $log['views']. "</td>";
//echo "<td><a href=\"http://rynantech.com/partner-login/iccgroup/VJET/$log[link]\" onclick=\"khoa();\">$log[link]</a></td>";

echo "</tr>";
}
?>

</table>
</div>

     

     
<div id="1200-photos" class="tabcontent">
<table id="tracelog1" width="909" border="0" align="center">
<?php

//echo  @mysql_num_rows( $sql_query ); die();
$logs = @mysql_query("SELECT * from iccgroup where printers like '1200' and type like 'photos' order by timecreate desc");
while($log = mysql_fetch_array( $logs )){
// Bo gio - chi lay ngay
$date = $log['timecreate'];
$createDate = date('Y-m-d', strtotime($date));

echo "<tr>";
echo "<th>". $log['filename']. "</th>";
echo "<th>". $log['type']. "</th>";
echo "<th><a href=\"http://rynantech.com/partner-login/iccgroupclick.php?id=".$log['id']."\"><img src='http://www.rynantech.com/partner-login/sites/images/dl.png".$row['image_name']."'></a></th>";
echo "<th>". $log['notes']. "</th>";
echo "<th>". $log['views']. "</th>";
echo "<th>". $createDate. "</th>";
echo "<th><a href=\"iccgroupedit.php?id=$log[id]\"><img src='http://www.rynantech.com/partner-login/sites/images/edit.png".$row['image_name']."'></a></th>";
echo "<th><a href=\"iccgroupdel.php?id=$log[id]\" onclick=\"return makesure();\"><img src='http://www.rynantech.com/partner-login/sites/images/delete.png".$row['image_name']."'></a></th>";
//echo "<td>". $log['id']. "</td>";
//echo "<td>". $log['printers']. "</td>";
//echo "<td>". $log['link']. "</td>";
//echo "<td>". $log['lastupdate']. "</td>";
//echo "<td>". $log['views']. "</td>";
//echo "<td><a href=\"http://rynantech.com/partner-login/iccgroup/VJET/$log[link]\" onclick=\"khoa();\">$log[link]</a></td>";

echo "</tr>";
}
?>

</table>
</div>


     
<div id="1200E-photos" class="tabcontent">
<table id="tracelog1" width="909" border="0" align="center">
<?php

//echo  @mysql_num_rows( $sql_query ); die();
$logs = @mysql_query("SELECT * from iccgroup where printers like '1200E' and type like 'photos' order by timecreate desc");
while($log = mysql_fetch_array( $logs )){
// Bo gio - chi lay ngay
$date = $log['timecreate'];
$createDate = date('Y-m-d', strtotime($date));

echo "<tr>";
echo "<th>". $log['filename']. "</th>";
echo "<th>". $log['type']. "</th>";
echo "<th><a href=\"http://rynantech.com/partner-login/iccgroupclick.php?id=".$log['id']."\"><img src='http://www.rynantech.com/partner-login/sites/images/dl.png".$row['image_name']."'></a></th>";
echo "<th>". $log['notes']. "</th>";
echo "<th>". $log['views']. "</th>";
echo "<th>". $createDate. "</th>";
echo "<th><a href=\"iccgroupedit.php?id=$log[id]\"><img src='http://www.rynantech.com/partner-login/sites/images/edit.png".$row['image_name']."'></a></th>";
echo "<th><a href=\"iccgroupdel.php?id=$log[id]\" onclick=\"return makesure();\"><img src='http://www.rynantech.com/partner-login/sites/images/delete.png".$row['image_name']."'></a></th>";
//echo "<td>". $log['id']. "</td>";
//echo "<td>". $log['printers']. "</td>";
//echo "<td>". $log['link']. "</td>";
//echo "<td>". $log['lastupdate']. "</td>";
//echo "<td>". $log['views']. "</td>";
//echo "<td><a href=\"http://rynantech.com/partner-login/iccgroup/VJET/$log[link]\" onclick=\"khoa();\">$log[link]</a></td>";

echo "</tr>";
}
?>

</table>
</div>


     
<div id="1200Plus-photos" class="tabcontent">
<table id="tracelog1" width="909" border="0" align="center">
<?php

//echo  @mysql_num_rows( $sql_query ); die();
$logs = @mysql_query("SELECT * from iccgroup where printers like '1200Plus' and type like 'photos' order by timecreate desc");
while($log = mysql_fetch_array( $logs )){
// Bo gio - chi lay ngay
$date = $log['timecreate'];
$createDate = date('Y-m-d', strtotime($date));

echo "<tr>";
echo "<th>". $log['filename']. "</th>";
echo "<th>". $log['type']. "</th>";
echo "<th><a href=\"http://rynantech.com/partner-login/iccgroupclick.php?id=".$log['id']."\"><img src='http://www.rynantech.com/partner-login/sites/images/dl.png".$row['image_name']."'></a></th>";
echo "<th>". $log['notes']. "</th>";
echo "<th>". $log['views']. "</th>";
echo "<th>". $createDate. "</th>";
echo "<th><a href=\"iccgroupedit.php?id=$log[id]\"><img src='http://www.rynantech.com/partner-login/sites/images/edit.png".$row['image_name']."'></a></th>";
echo "<th><a href=\"iccgroupdel.php?id=$log[id]\" onclick=\"return makesure();\"><img src='http://www.rynantech.com/partner-login/sites/images/delete.png".$row['image_name']."'></a></th>";
//echo "<td>". $log['id']. "</td>";
//echo "<td>". $log['printers']. "</td>";
//echo "<td>". $log['link']. "</td>";
//echo "<td>". $log['lastupdate']. "</td>";
//echo "<td>". $log['views']. "</td>";
//echo "<td><a href=\"http://rynantech.com/partner-login/iccgroup/VJET/$log[link]\" onclick=\"khoa();\">$log[link]</a></td>";

echo "</tr>";
}
?>

</table>
</div>


     
<div id="1200EG-photos" class="tabcontent">
<table id="tracelog1" width="909" border="0" align="center">
<?php

//echo  @mysql_num_rows( $sql_query ); die();
$logs = @mysql_query("SELECT * from iccgroup where printers like '1200EG' and type like 'photos' order by timecreate desc");
while($log = mysql_fetch_array( $logs )){
// Bo gio - chi lay ngay
$date = $log['timecreate'];
$createDate = date('Y-m-d', strtotime($date));

echo "<tr>";
echo "<th>". $log['filename']. "</th>";
echo "<th>". $log['type']. "</th>";
echo "<th><a href=\"http://rynantech.com/partner-login/iccgroupclick.php?id=".$log['id']."\"><img src='http://www.rynantech.com/partner-login/sites/images/dl.png".$row['image_name']."'></a></th>";
echo "<th>". $log['notes']. "</th>";
echo "<th>". $log['views']. "</th>";
echo "<th>". $createDate. "</th>";
echo "<th><a href=\"iccgroupedit.php?id=$log[id]\"><img src='http://www.rynantech.com/partner-login/sites/images/edit.png".$row['image_name']."'></a></th>";
echo "<th><a href=\"iccgroupdel.php?id=$log[id]\" onclick=\"return makesure();\"><img src='http://www.rynantech.com/partner-login/sites/images/delete.png".$row['image_name']."'></a></th>";
//echo "<td>". $log['id']. "</td>";
//echo "<td>". $log['printers']. "</td>";
//echo "<td>". $log['link']. "</td>";
//echo "<td>". $log['lastupdate']. "</td>";
//echo "<td>". $log['views']. "</td>";
//echo "<td><a href=\"http://rynantech.com/partner-login/iccgroup/VJET/$log[link]\" onclick=\"khoa();\">$log[link]</a></td>";

echo "</tr>";
}
?>

</table>
</div>


     
     
<div id="2172C-photos" class="tabcontent">
<table id="tracelog1" width="909" border="0" align="center">
<?php

//echo  @mysql_num_rows( $sql_query ); die();
$logs = @mysql_query("SELECT * from iccgroup where printers like '2172C' and type like 'photos' order by timecreate desc");
while($log = mysql_fetch_array( $logs )){
// Bo gio - chi lay ngay
$date = $log['timecreate'];
$createDate = date('Y-m-d', strtotime($date));

echo "<tr>";
echo "<th>". $log['filename']. "</th>";
echo "<th>". $log['type']. "</th>";
echo "<th><a href=\"http://rynantech.com/partner-login/iccgroupclick.php?id=".$log['id']."\"><img src='http://www.rynantech.com/partner-login/sites/images/dl.png".$row['image_name']."'></a></th>";
echo "<th>". $log['notes']. "</th>";
echo "<th>". $log['views']. "</th>";
echo "<th>". $createDate. "</th>";
echo "<th><a href=\"iccgroupedit.php?id=$log[id]\"><img src='http://www.rynantech.com/partner-login/sites/images/edit.png".$row['image_name']."'></a></th>";
echo "<th><a href=\"iccgroupdel.php?id=$log[id]\" onclick=\"return makesure();\"><img src='http://www.rynantech.com/partner-login/sites/images/delete.png".$row['image_name']."'></a></th>";
//echo "<td>". $log['id']. "</td>";
//echo "<td>". $log['printers']. "</td>";
//echo "<td>". $log['link']. "</td>";
//echo "<td>". $log['lastupdate']. "</td>";
//echo "<td>". $log['views']. "</td>";
//echo "<td><a href=\"http://rynantech.com/partner-login/iccgroup/VJET/$log[link]\" onclick=\"khoa();\">$log[link]</a></td>";

echo "</tr>";
}
?>

</table>
</div>


     
<div id="IOJ100-photos" class="tabcontent">
<table id="tracelog1" width="909" border="0" align="center">
<?php

//echo  @mysql_num_rows( $sql_query ); die();
$logs = @mysql_query("SELECT * from iccgroup where printers like 'IOJ100' and type like 'photos' order by timecreate desc");
while($log = mysql_fetch_array( $logs )){
// Bo gio - chi lay ngay
$date = $log['timecreate'];
$createDate = date('Y-m-d', strtotime($date));

echo "<tr>";
echo "<th>". $log['filename']. "</th>";
echo "<th>". $log['type']. "</th>";
echo "<th><a href=\"http://rynantech.com/partner-login/iccgroupclick.php?id=".$log['id']."\"><img src='http://www.rynantech.com/partner-login/sites/images/dl.png".$row['image_name']."'></a></th>";
echo "<th>". $log['notes']. "</th>";
echo "<th>". $log['views']. "</th>";
echo "<th>". $createDate. "</th>";
echo "<th><a href=\"iccgroupedit.php?id=$log[id]\"><img src='http://www.rynantech.com/partner-login/sites/images/edit.png".$row['image_name']."'></a></th>";
echo "<th><a href=\"iccgroupdel.php?id=$log[id]\" onclick=\"return makesure();\"><img src='http://www.rynantech.com/partner-login/sites/images/delete.png".$row['image_name']."'></a></th>";
//echo "<td>". $log['id']. "</td>";
//echo "<td>". $log['printers']. "</td>";
//echo "<td>". $log['link']. "</td>";
//echo "<td>". $log['lastupdate']. "</td>";
//echo "<td>". $log['views']. "</td>";
//echo "<td><a href=\"http://rynantech.com/partner-login/iccgroup/VJET/$log[link]\" onclick=\"khoa();\">$log[link]</a></td>";

echo "</tr>";
}
?>

</table>
</div>


     
<div id="IOJ200-photos" class="tabcontent">
<table id="tracelog1" width="909" border="0" align="center">
<?php

//echo  @mysql_num_rows( $sql_query ); die();
$logs = @mysql_query("SELECT * from iccgroup where printers like 'IOJ200' and type like 'photos' order by timecreate desc");
while($log = mysql_fetch_array( $logs )){
// Bo gio - chi lay ngay
$date = $log['timecreate'];
$createDate = date('Y-m-d', strtotime($date));

echo "<tr>";
echo "<th>". $log['filename']. "</th>";
echo "<th>". $log['type']. "</th>";
echo "<th><a href=\"http://rynantech.com/partner-login/iccgroupclick.php?id=".$log['id']."\"><img src='http://www.rynantech.com/partner-login/sites/images/dl.png".$row['image_name']."'></a></th>";
echo "<th>". $log['notes']. "</th>";
echo "<th>". $log['views']. "</th>";
echo "<th>". $createDate. "</th>";
echo "<th><a href=\"iccgroupedit.php?id=$log[id]\"><img src='http://www.rynantech.com/partner-login/sites/images/edit.png".$row['image_name']."'></a></th>";
echo "<th><a href=\"iccgroupdel.php?id=$log[id]\" onclick=\"return makesure();\"><img src='http://www.rynantech.com/partner-login/sites/images/delete.png".$row['image_name']."'></a></th>";
//echo "<td>". $log['id']. "</td>";
//echo "<td>". $log['printers']. "</td>";
//echo "<td>". $log['link']. "</td>";
//echo "<td>". $log['lastupdate']. "</td>";
//echo "<td>". $log['views']. "</td>";
//echo "<td><a href=\"http://rynantech.com/partner-login/iccgroup/VJET/$log[link]\" onclick=\"khoa();\">$log[link]</a></td>";

echo "</tr>";
}
?>

</table>
</div>




<div id="InkFeeder8-photos" class="tabcontent">
<table id="tracelog1" width="909" border="0" align="center">
<?php

//echo  @mysql_num_rows( $sql_query ); die();
$logs = @mysql_query("SELECT * from iccgroup where printers like 'InkFeeder8' and type like 'photos' order by timecreate desc");
while($log = mysql_fetch_array( $logs )){
// Bo gio - chi lay ngay
$date = $log['timecreate'];
$createDate = date('Y-m-d', strtotime($date));

echo "<tr>";
echo "<th>". $log['filename']. "</th>";
echo "<th>". $log['type']. "</th>";
echo "<th><a href=\"http://rynantech.com/partner-login/iccgroupclick.php?id=".$log['id']."\"><img src='http://www.rynantech.com/partner-login/sites/images/dl.png".$row['image_name']."'></a></th>";
echo "<th>". $log['notes']. "</th>";
echo "<th>". $log['views']. "</th>";
echo "<th>". $createDate. "</th>";
echo "<th><a href=\"iccgroupedit.php?id=$log[id]\"><img src='http://www.rynantech.com/partner-login/sites/images/edit.png".$row['image_name']."'></a></th>";
echo "<th><a href=\"iccgroupdel.php?id=$log[id]\" onclick=\"return makesure();\"><img src='http://www.rynantech.com/partner-login/sites/images/delete.png".$row['image_name']."'></a></th>";
//echo "<td>". $log['id']. "</td>";
//echo "<td>". $log['printers']. "</td>";
//echo "<td>". $log['link']. "</td>";
//echo "<td>". $log['lastupdate']. "</td>";
//echo "<td>". $log['views']. "</td>";
//echo "<td><a href=\"http://rynantech.com/partner-login/iccgroup/VJET/$log[link]\" onclick=\"khoa();\">$log[link]</a></td>";

echo "</tr>";
}
?>

</table>
</div>





</div>
</div>
</div>
</div>


  <?php
include("footer.html");
?>

</body></html>

<?php
}
 else
{
require_once ("./login.php");
}

exit;
}
?>
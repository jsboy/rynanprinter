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
<meta id="MetaKeywords" name="KEYWORDS" content="RYNAN Technologies Pte Ltd, rynantech.com, QR code track &amp; trace, variable data, Alphanumeric, logos, date/time, expiry date, Julian date, shift code, counter/lot box code, multiple types of variable barcodes, and database,
Thermal Inkjet Inks, Thermal Inkjet Coder, R1010 Thermal Inkjet Coder, B1040 Thermal Inkjet Coder, B1040H Thermal Inkjet Coder, B1040He Thermal Inkjet Coder, 1200 Thermal Inkjet Coder, 1200e Thermal Inkjet Coder, 1200EG Thermal Inkjet Coder, R2172C Piezo Inkjet Printers, Hybrid Printer, HybridJET 35 digital printing, HybridJET 65 Lottery ticket application, Internet of Jet Printer, IOJ100, IOJ200, Multi Printer control software, Solvent ink for semi and non-porous media, SoluJET">

<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
<title>ADMIN - MYLAN B</title>

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

<table border="0" cellpadding="0" cellspacing="0" width="977">
	<tr>
		<td bgcolor="#7bc545" class="white">
		<div><p align="justify" class="mem_acc">&nbsp;&nbsp;&nbsp;&nbsp;ADMIN - MYLAN B</p></div>
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
<td><a href="/partner-login/mylanbcre.php" class="hrlink"> <img src="sites/images/createdownload.png" border="0" /></a></td>
</tr>
</table>
</div>


<!-- FIRMWARE -->
<div class="onecolumntitle">
<div class="header">
      <span>FIRMWARE</span>
</div></div>
<div class="tab">
  <button class="tablinks" onclick="openCity(event, 'RYNAN R20')">RYNAN R20</button>
  <button class="tablinks" onclick="openCity(event, 'VJET1000')">VJET1000</button>
  <button class="tablinks" onclick="openCity(event, 'VJET1010')">VJET1010</button>
  <button class="tablinks" onclick="openCity(event, 'VJET1020')">VJET1020</button>
  <button class="tablinks" onclick="openCity(event, 'VJET1040')">VJET1040</button>
  <button class="tablinks" onclick="openCity(event, 'VJET1040H')">VJET1040H</button>
  <button class="tablinks" onclick="openCity(event, 'VJET1040He')">VJET1040He</button>
  <button class="tablinks" onclick="openCity(event, 'VJET1040S')">VJET1040S</button>
  <button class="tablinks" onclick="openCity(event, 'B1040P')">B1040P</button>
  <button class="tablinks" onclick="openCity(event, 'B1060')">B1060</button>
  <button class="tablinks" onclick="openCity(event, 'B1060P')">B1060P</button>
  <button class="tablinks" onclick="openCity(event, 'B1060H')">B1060H</button>
  <button class="tablinks" onclick="openCity(event, 'VJET1200')">VJET1200</button>
  <button class="tablinks" onclick="openCity(event, 'VJET1200e')">VJET1200e</button>
  <button class="tablinks" onclick="openCity(event, 'IOJ100')">IOJ100</button>
  <button class="tablinks" onclick="openCity(event, 'IOJ200')">IOJ200</button>
</div>
<div id="RYNAN R20" class="tabcontent" style="display: block;" >
<table id="tracelog1" width="909" border="0" align="center">
<?php

//echo  @mysql_num_rows( $sql_query ); die();
$logs = @mysql_query("SELECT * from mylanb where printers like 'RYNAN R20' and type like 'Firmware' order by timecreate desc");
while($log = mysql_fetch_array( $logs )){
// Bo gio - chi lay ngay
$date = $log['timecreate'];
$createDate = date('Y-m-d', strtotime($date));

echo "<tr>";
echo "<th>". $log['filename']. "</th>";
echo "<th>". $log['type']. "</th>";
echo "<th><a href=\"http://rynantech.com/partner-login/mylanbclick.php?id=".$log['id']."\"><img src='http://www.rynantech.com/partner-login/sites/images/dl.png".$row['image_name']."'></a></th>";
echo "<th>". $log['notes']. "</th>";
echo "<th>". $log['views']. "</th>";
echo "<th>". $createDate. "</th>";
echo "<th><a href=\"mylanbedit.php?id=$log[id]\"><img src='http://www.rynantech.com/partner-login/sites/images/edit.png".$row['image_name']."'></a></th>";
echo "<th><a href=\"mylanbdel.php?id=$log[id]\" onclick=\"return makesure();\"><img src='http://www.rynantech.com/partner-login/sites/images/delete.png".$row['image_name']."'></a></th>";
//echo "<td>". $log['id']. "</td>";
//echo "<td>". $log['printers']. "</td>";
//echo "<td>". $log['link']. "</td>";
//echo "<td>". $log['lastupdate']. "</td>";
//echo "<td>". $log['views']. "</td>";
//echo "<td><a href=\"http://rynantech.com/partner-login/mylanb/VJET/$log[link]\" onclick=\"khoa();\">$log[link]</a></td>";

echo "</tr>";
}
?>

</table>
</div>



<div id="VJET1000" class="tabcontent" style="display: block;" >
<table id="tracelog1" width="909" border="0" align="center">
<?php

//echo  @mysql_num_rows( $sql_query ); die();
$logs = @mysql_query("SELECT * from mylanb where printers like 'VJET1000' and type like 'Firmware' order by timecreate desc");
while($log = mysql_fetch_array( $logs )){
// Bo gio - chi lay ngay
$date = $log['timecreate'];
$createDate = date('Y-m-d', strtotime($date));

echo "<tr>";
echo "<th>". $log['filename']. "</th>";
echo "<th>". $log['type']. "</th>";
echo "<th><a href=\"http://rynantech.com/partner-login/mylanbclick.php?id=".$log['id']."\"><img src='http://www.rynantech.com/partner-login/sites/images/dl.png".$row['image_name']."'></a></th>";
echo "<th>". $log['notes']. "</th>";
echo "<th>". $log['views']. "</th>";
echo "<th>". $createDate. "</th>";
echo "<th><a href=\"mylanbedit.php?id=$log[id]\"><img src='http://www.rynantech.com/partner-login/sites/images/edit.png".$row['image_name']."'></a></th>";
echo "<th><a href=\"mylanbdel.php?id=$log[id]\" onclick=\"return makesure();\"><img src='http://www.rynantech.com/partner-login/sites/images/delete.png".$row['image_name']."'></a></th>";
//echo "<td>". $log['id']. "</td>";
//echo "<td>". $log['printers']. "</td>";
//echo "<td>". $log['link']. "</td>";
//echo "<td>". $log['lastupdate']. "</td>";
//echo "<td>". $log['views']. "</td>";
//echo "<td><a href=\"http://rynantech.com/partner-login/mylanb/VJET/$log[link]\" onclick=\"khoa();\">$log[link]</a></td>";

echo "</tr>";
}
?>

</table>
</div>



<div id="VJET1010" class="tabcontent">
<table id="tracelog1" width="909" border="0" align="center">
<?php

//echo  @mysql_num_rows( $sql_query ); die();
$logs = @mysql_query("SELECT * from mylanb where printers like 'VJET1010' and type like 'Firmware' order by timecreate desc");
while($log = mysql_fetch_array( $logs )){
// Bo gio - chi lay ngay
$date = $log['timecreate'];
$createDate = date('Y-m-d', strtotime($date));

echo "<tr>";
echo "<th>". $log['filename']. "</th>";
echo "<th>". $log['type']. "</th>";
echo "<th><a href=\"http://rynantech.com/partner-login/mylanbclick.php?id=".$log['id']."\"><img src='http://www.rynantech.com/partner-login/sites/images/dl.png".$row['image_name']."'></a></th>";
echo "<th>". $log['notes']. "</th>";
echo "<th>". $log['views']. "</th>";
echo "<th>". $createDate. "</th>";
echo "<th><a href=\"mylanbedit.php?id=$log[id]\"><img src='http://www.rynantech.com/partner-login/sites/images/edit.png".$row['image_name']."'></a></th>";
echo "<th><a href=\"mylanbdel.php?id=$log[id]\" onclick=\"return makesure();\"><img src='http://www.rynantech.com/partner-login/sites/images/delete.png".$row['image_name']."'></a></th>";
//echo "<td>". $log['id']. "</td>";
//echo "<td>". $log['printers']. "</td>";
//echo "<td>". $log['link']. "</td>";
//echo "<td>". $log['lastupdate']. "</td>";
//echo "<td>". $log['views']. "</td>";
//echo "<td><a href=\"http://rynantech.com/partner-login/mylanb/VJET/$log[link]\" onclick=\"khoa();\">$log[link]</a></td>";

echo "</tr>";
}
?>

</table>
</div>




<div id="VJET1020" class="tabcontent">
<table id="tracelog1" width="909" border="0" align="center">
<?php

//echo  @mysql_num_rows( $sql_query ); die();
$logs = @mysql_query("SELECT * from mylanb where printers like 'VJET1020' and type like 'Firmware' order by timecreate desc");
while($log = mysql_fetch_array( $logs )){
// Bo gio - chi lay ngay
$date = $log['timecreate'];
$createDate = date('Y-m-d', strtotime($date));

echo "<tr>";
echo "<th>". $log['filename']. "</th>";
echo "<th>". $log['type']. "</th>";
echo "<th><a href=\"http://rynantech.com/partner-login/mylanbclick.php?id=".$log['id']."\"><img src='http://www.rynantech.com/partner-login/sites/images/dl.png".$row['image_name']."'></a></th>";
echo "<th>". $log['notes']. "</th>";
echo "<th>". $log['views']. "</th>";
echo "<th>". $createDate. "</th>";
echo "<th><a href=\"mylanbedit.php?id=$log[id]\"><img src='http://www.rynantech.com/partner-login/sites/images/edit.png".$row['image_name']."'></a></th>";
echo "<th><a href=\"mylanbdel.php?id=$log[id]\" onclick=\"return makesure();\"><img src='http://www.rynantech.com/partner-login/sites/images/delete.png".$row['image_name']."'></a></th>";
//echo "<td>". $log['id']. "</td>";
//echo "<td>". $log['printers']. "</td>";
//echo "<td>". $log['link']. "</td>";
//echo "<td>". $log['lastupdate']. "</td>";
//echo "<td>". $log['views']. "</td>";
//echo "<td><a href=\"http://rynantech.com/partner-login/mylanb/VJET/$log[link]\" onclick=\"khoa();\">$log[link]</a></td>";

echo "</tr>";
}
?>

</table>
</div>



<div id="VJET1040" class="tabcontent">
<table id="tracelog1" width="909" border="0" align="center">
<?php

//echo  @mysql_num_rows( $sql_query ); die();
$logs = @mysql_query("SELECT * from mylanb where printers like 'VJET1040' and type like 'Firmware' order by timecreate desc");
while($log = mysql_fetch_array( $logs )){
// Bo gio - chi lay ngay
$date = $log['timecreate'];
$createDate = date('Y-m-d', strtotime($date));

echo "<tr>";
echo "<th>". $log['filename']. "</th>";
echo "<th>". $log['type']. "</th>";
echo "<th><a href=\"http://rynantech.com/partner-login/mylanbclick.php?id=".$log['id']."\"><img src='http://www.rynantech.com/partner-login/sites/images/dl.png".$row['image_name']."'></a></th>";
echo "<th>". $log['notes']. "</th>";
echo "<th>". $log['views']. "</th>";
echo "<th>". $createDate. "</th>";
echo "<th><a href=\"mylanbedit.php?id=$log[id]\"><img src='http://www.rynantech.com/partner-login/sites/images/edit.png".$row['image_name']."'></a></th>";
echo "<th><a href=\"mylanbdel.php?id=$log[id]\" onclick=\"return makesure();\"><img src='http://www.rynantech.com/partner-login/sites/images/delete.png".$row['image_name']."'></a></th>";
//echo "<td>". $log['id']. "</td>";
//echo "<td>". $log['printers']. "</td>";
//echo "<td>". $log['link']. "</td>";
//echo "<td>". $log['lastupdate']. "</td>";
//echo "<td>". $log['views']. "</td>";
//echo "<td><a href=\"http://rynantech.com/partner-login/mylanb/VJET/$log[link]\" onclick=\"khoa();\">$log[link]</a></td>";

echo "</tr>";
}
?>

</table>
</div>



<div id="VJET1040H" class="tabcontent">
<table id="tracelog1" width="909" border="0" align="center">
<?php

//echo  @mysql_num_rows( $sql_query ); die();
$logs = @mysql_query("SELECT * from mylanb where printers like 'VJET1040H' and type like 'Firmware' order by timecreate desc");
while($log = mysql_fetch_array( $logs )){
// Bo gio - chi lay ngay
$date = $log['timecreate'];
$createDate = date('Y-m-d', strtotime($date));

echo "<tr>";
echo "<th>". $log['filename']. "</th>";
echo "<th>". $log['type']. "</th>";
echo "<th><a href=\"http://rynantech.com/partner-login/mylanbclick.php?id=".$log['id']."\"><img src='http://www.rynantech.com/partner-login/sites/images/dl.png".$row['image_name']."'></a></th>";
echo "<th>". $log['notes']. "</th>";
echo "<th>". $log['views']. "</th>";
echo "<th>". $createDate. "</th>";
echo "<th><a href=\"mylanbedit.php?id=$log[id]\"><img src='http://www.rynantech.com/partner-login/sites/images/edit.png".$row['image_name']."'></a></th>";
echo "<th><a href=\"mylanbdel.php?id=$log[id]\" onclick=\"return makesure();\"><img src='http://www.rynantech.com/partner-login/sites/images/delete.png".$row['image_name']."'></a></th>";
//echo "<td>". $log['id']. "</td>";
//echo "<td>". $log['printers']. "</td>";
//echo "<td>". $log['link']. "</td>";
//echo "<td>". $log['lastupdate']. "</td>";
//echo "<td>". $log['views']. "</td>";
//echo "<td><a href=\"http://rynantech.com/partner-login/mylanb/VJET/$log[link]\" onclick=\"khoa();\">$log[link]</a></td>";

echo "</tr>";
}
?>

</table>
</div>


<div id="VJET1040He" class="tabcontent">
<table id="tracelog1" width="909" border="0" align="center">
<?php

//echo  @mysql_num_rows( $sql_query ); die();
$logs = @mysql_query("SELECT * from mylanb where printers like 'VJET1040He' and type like 'Firmware' order by timecreate desc");
while($log = mysql_fetch_array( $logs )){
// Bo gio - chi lay ngay
$date = $log['timecreate'];
$createDate = date('Y-m-d', strtotime($date));

echo "<tr>";
echo "<th>". $log['filename']. "</th>";
echo "<th>". $log['type']. "</th>";
echo "<th><a href=\"http://rynantech.com/partner-login/mylanbclick.php?id=".$log['id']."\"><img src='http://www.rynantech.com/partner-login/sites/images/dl.png".$row['image_name']."'></a></th>";
echo "<th>". $log['notes']. "</th>";
echo "<th>". $log['views']. "</th>";
echo "<th>". $createDate. "</th>";
echo "<th><a href=\"mylanbedit.php?id=$log[id]\"><img src='http://www.rynantech.com/partner-login/sites/images/edit.png".$row['image_name']."'></a></th>";
echo "<th><a href=\"mylanbdel.php?id=$log[id]\" onclick=\"return makesure();\"><img src='http://www.rynantech.com/partner-login/sites/images/delete.png".$row['image_name']."'></a></th>";
//echo "<td>". $log['id']. "</td>";
//echo "<td>". $log['printers']. "</td>";
//echo "<td>". $log['link']. "</td>";
//echo "<td>". $log['lastupdate']. "</td>";
//echo "<td>". $log['views']. "</td>";
//echo "<td><a href=\"http://rynantech.com/partner-login/mylanb/VJET/$log[link]\" onclick=\"khoa();\">$log[link]</a></td>";

echo "</tr>";
}
?>

</table>
</div>


<div id="VJET1040S" class="tabcontent">
<table id="tracelog1" width="909" border="0" align="center">
<?php

//echo  @mysql_num_rows( $sql_query ); die();
$logs = @mysql_query("SELECT * from mylanb where printers like 'VJET1040S' and type like 'Firmware' order by timecreate desc");
while($log = mysql_fetch_array( $logs )){
// Bo gio - chi lay ngay
$date = $log['timecreate'];
$createDate = date('Y-m-d', strtotime($date));

echo "<tr>";
echo "<th>". $log['filename']. "</th>";
echo "<th>". $log['type']. "</th>";
echo "<th><a href=\"http://rynantech.com/partner-login/mylanbclick.php?id=".$log['id']."\"><img src='http://www.rynantech.com/partner-login/sites/images/dl.png".$row['image_name']."'></a></th>";
echo "<th>". $log['notes']. "</th>";
echo "<th>". $log['views']. "</th>";
echo "<th>". $createDate. "</th>";
echo "<th><a href=\"mylanbedit.php?id=$log[id]\"><img src='http://www.rynantech.com/partner-login/sites/images/edit.png".$row['image_name']."'></a></th>";
echo "<th><a href=\"mylanbdel.php?id=$log[id]\" onclick=\"return makesure();\"><img src='http://www.rynantech.com/partner-login/sites/images/delete.png".$row['image_name']."'></a></th>";
//echo "<td>". $log['id']. "</td>";
//echo "<td>". $log['printers']. "</td>";
//echo "<td>". $log['link']. "</td>";
//echo "<td>". $log['lastupdate']. "</td>";
//echo "<td>". $log['views']. "</td>";
//echo "<td><a href=\"http://rynantech.com/partner-login/mylanb/VJET/$log[link]\" onclick=\"khoa();\">$log[link]</a></td>";

echo "</tr>";
}
?>

</table>
</div>


<div id="B1040P" class="tabcontent">
<table id="tracelog1" width="909" border="0" align="center">
<?php

//echo  @mysql_num_rows( $sql_query ); die();
$logs = @mysql_query("SELECT * from mylanb where printers like 'B1040P' and type like 'Firmware' order by timecreate desc");
while($log = mysql_fetch_array( $logs )){
// Bo gio - chi lay ngay
$date = $log['timecreate'];
$createDate = date('Y-m-d', strtotime($date));

echo "<tr>";
echo "<th>". $log['filename']. "</th>";
echo "<th>". $log['type']. "</th>";
echo "<th><a href=\"http://rynantech.com/partner-login/mylanbclick.php?id=".$log['id']."\"><img src='http://www.rynantech.com/partner-login/sites/images/dl.png".$row['image_name']."'></a></th>";
echo "<th>". $log['notes']. "</th>";
echo "<th>". $log['views']. "</th>";
echo "<th>". $createDate. "</th>";
echo "<th><a href=\"mylanbedit.php?id=$log[id]\"><img src='http://www.rynantech.com/partner-login/sites/images/edit.png".$row['image_name']."'></a></th>";
echo "<th><a href=\"mylanbdel.php?id=$log[id]\" onclick=\"return makesure();\"><img src='http://www.rynantech.com/partner-login/sites/images/delete.png".$row['image_name']."'></a></th>";
//echo "<td>". $log['id']. "</td>";
//echo "<td>". $log['printers']. "</td>";
//echo "<td>". $log['link']. "</td>";
//echo "<td>". $log['lastupdate']. "</td>";
//echo "<td>". $log['views']. "</td>";
//echo "<td><a href=\"http://rynantech.com/partner-login/mylanb/VJET/$log[link]\" onclick=\"khoa();\">$log[link]</a></td>";

echo "</tr>";
}
?>

</table>
</div>



<div id="B1060" class="tabcontent">
<table id="tracelog1" width="909" border="0" align="center">
<?php

//echo  @mysql_num_rows( $sql_query ); die();
$logs = @mysql_query("SELECT * from mylanb where printers like 'B1060' and type like 'Firmware' order by timecreate desc");
while($log = mysql_fetch_array( $logs )){
// Bo gio - chi lay ngay
$date = $log['timecreate'];
$createDate = date('Y-m-d', strtotime($date));

echo "<tr>";
echo "<th>". $log['filename']. "</th>";
echo "<th>". $log['type']. "</th>";
echo "<th><a href=\"http://rynantech.com/partner-login/mylanbclick.php?id=".$log['id']."\"><img src='http://www.rynantech.com/partner-login/sites/images/dl.png".$row['image_name']."'></a></th>";
echo "<th>". $log['notes']. "</th>";
echo "<th>". $log['views']. "</th>";
echo "<th>". $createDate. "</th>";
echo "<th><a href=\"mylanbedit.php?id=$log[id]\"><img src='http://www.rynantech.com/partner-login/sites/images/edit.png".$row['image_name']."'></a></th>";
echo "<th><a href=\"mylanbdel.php?id=$log[id]\" onclick=\"return makesure();\"><img src='http://www.rynantech.com/partner-login/sites/images/delete.png".$row['image_name']."'></a></th>";
//echo "<td>". $log['id']. "</td>";
//echo "<td>". $log['printers']. "</td>";
//echo "<td>". $log['link']. "</td>";
//echo "<td>". $log['lastupdate']. "</td>";
//echo "<td>". $log['views']. "</td>";
//echo "<td><a href=\"http://rynantech.com/partner-login/mylanb/VJET/$log[link]\" onclick=\"khoa();\">$log[link]</a></td>";

echo "</tr>";
}
?>

</table>
</div>



<div id="B1060P" class="tabcontent">
<table id="tracelog1" width="909" border="0" align="center">
<?php

//echo  @mysql_num_rows( $sql_query ); die();
$logs = @mysql_query("SELECT * from mylanb where printers like 'B1060P' and type like 'Firmware' order by timecreate desc");
while($log = mysql_fetch_array( $logs )){
// Bo gio - chi lay ngay
$date = $log['timecreate'];
$createDate = date('Y-m-d', strtotime($date));

echo "<tr>";
echo "<th>". $log['filename']. "</th>";
echo "<th>". $log['type']. "</th>";
echo "<th><a href=\"http://rynantech.com/partner-login/mylanbclick.php?id=".$log['id']."\"><img src='http://www.rynantech.com/partner-login/sites/images/dl.png".$row['image_name']."'></a></th>";
echo "<th>". $log['notes']. "</th>";
echo "<th>". $log['views']. "</th>";
echo "<th>". $createDate. "</th>";
echo "<th><a href=\"mylanbedit.php?id=$log[id]\"><img src='http://www.rynantech.com/partner-login/sites/images/edit.png".$row['image_name']."'></a></th>";
echo "<th><a href=\"mylanbdel.php?id=$log[id]\" onclick=\"return makesure();\"><img src='http://www.rynantech.com/partner-login/sites/images/delete.png".$row['image_name']."'></a></th>";
//echo "<td>". $log['id']. "</td>";
//echo "<td>". $log['printers']. "</td>";
//echo "<td>". $log['link']. "</td>";
//echo "<td>". $log['lastupdate']. "</td>";
//echo "<td>". $log['views']. "</td>";
//echo "<td><a href=\"http://rynantech.com/partner-login/mylanb/VJET/$log[link]\" onclick=\"khoa();\">$log[link]</a></td>";

echo "</tr>";
}
?>

</table>
</div>



<div id="B1060H" class="tabcontent">
<table id="tracelog1" width="909" border="0" align="center">
<?php

//echo  @mysql_num_rows( $sql_query ); die();
$logs = @mysql_query("SELECT * from mylanb where printers like 'B1060H' and type like 'Firmware' order by timecreate desc");
while($log = mysql_fetch_array( $logs )){
// Bo gio - chi lay ngay
$date = $log['timecreate'];
$createDate = date('Y-m-d', strtotime($date));

echo "<tr>";
echo "<th>". $log['filename']. "</th>";
echo "<th>". $log['type']. "</th>";
echo "<th><a href=\"http://rynantech.com/partner-login/mylanbclick.php?id=".$log['id']."\"><img src='http://www.rynantech.com/partner-login/sites/images/dl.png".$row['image_name']."'></a></th>";
echo "<th>". $log['notes']. "</th>";
echo "<th>". $log['views']. "</th>";
echo "<th>". $createDate. "</th>";
echo "<th><a href=\"mylanbedit.php?id=$log[id]\"><img src='http://www.rynantech.com/partner-login/sites/images/edit.png".$row['image_name']."'></a></th>";
echo "<th><a href=\"mylanbdel.php?id=$log[id]\" onclick=\"return makesure();\"><img src='http://www.rynantech.com/partner-login/sites/images/delete.png".$row['image_name']."'></a></th>";
//echo "<td>". $log['id']. "</td>";
//echo "<td>". $log['printers']. "</td>";
//echo "<td>". $log['link']. "</td>";
//echo "<td>". $log['lastupdate']. "</td>";
//echo "<td>". $log['views']. "</td>";
//echo "<td><a href=\"http://rynantech.com/partner-login/mylanb/VJET/$log[link]\" onclick=\"khoa();\">$log[link]</a></td>";

echo "</tr>";
}
?>

</table>
</div>


<div id="VJET1200" class="tabcontent">
<table id="tracelog1" width="909" border="0" align="center">
<?php

//echo  @mysql_num_rows( $sql_query ); die();
$logs = @mysql_query("SELECT * from mylanb where printers like 'VJET1200' and type like 'Firmware' order by timecreate desc");
while($log = mysql_fetch_array( $logs )){
// Bo gio - chi lay ngay
$date = $log['timecreate'];
$createDate = date('Y-m-d', strtotime($date));

echo "<tr>";
echo "<th>". $log['filename']. "</th>";
echo "<th>". $log['type']. "</th>";
echo "<th><a href=\"http://rynantech.com/partner-login/mylanbclick.php?id=".$log['id']."\"><img src='http://www.rynantech.com/partner-login/sites/images/dl.png".$row['image_name']."'></a></th>";
echo "<th>". $log['notes']. "</th>";
echo "<th>". $log['views']. "</th>";
echo "<th>". $createDate. "</th>";
echo "<th><a href=\"mylanbedit.php?id=$log[id]\"><img src='http://www.rynantech.com/partner-login/sites/images/edit.png".$row['image_name']."'></a></th>";
echo "<th><a href=\"mylanbdel.php?id=$log[id]\" onclick=\"return makesure();\"><img src='http://www.rynantech.com/partner-login/sites/images/delete.png".$row['image_name']."'></a></th>";
//echo "<td>". $log['id']. "</td>";
//echo "<td>". $log['printers']. "</td>";
//echo "<td>". $log['link']. "</td>";
//echo "<td>". $log['lastupdate']. "</td>";
//echo "<td>". $log['views']. "</td>";
//echo "<td><a href=\"http://rynantech.com/partner-login/mylanb/VJET/$log[link]\" onclick=\"khoa();\">$log[link]</a></td>";

echo "</tr>";
}
?>

</table>
</div>
     
<div id="VJET1200e" class="tabcontent">
<table id="tracelog1" width="909" border="0" align="center">
<?php

//echo  @mysql_num_rows( $sql_query ); die();
$logs = @mysql_query("SELECT * from mylanb where printers like 'VJET1200e' and type like 'Firmware' order by timecreate desc");
while($log = mysql_fetch_array( $logs )){
// Bo gio - chi lay ngay
$date = $log['timecreate'];
$createDate = date('Y-m-d', strtotime($date));

echo "<tr>";
echo "<th>". $log['filename']. "</th>";
echo "<th>". $log['type']. "</th>";
echo "<th><a href=\"http://rynantech.com/partner-login/mylanbclick.php?id=".$log['id']."\"><img src='http://www.rynantech.com/partner-login/sites/images/dl.png".$row['image_name']."'></a></th>";
echo "<th>". $log['notes']. "</th>";
echo "<th>". $log['views']. "</th>";
echo "<th>". $createDate. "</th>";
echo "<th><a href=\"mylanbedit.php?id=$log[id]\"><img src='http://www.rynantech.com/partner-login/sites/images/edit.png".$row['image_name']."'></a></th>";
echo "<th><a href=\"mylanbdel.php?id=$log[id]\" onclick=\"return makesure();\"><img src='http://www.rynantech.com/partner-login/sites/images/delete.png".$row['image_name']."'></a></th>";
//echo "<td>". $log['id']. "</td>";
//echo "<td>". $log['printers']. "</td>";
//echo "<td>". $log['link']. "</td>";
//echo "<td>". $log['lastupdate']. "</td>";
//echo "<td>". $log['views']. "</td>";
//echo "<td><a href=\"http://rynantech.com/partner-login/mylanb/VJET/$log[link]\" onclick=\"khoa();\">$log[link]</a></td>";

echo "</tr>";
}
?>

</table>
</div>

<div id="IOJ100" class="tabcontent">
<table id="tracelog1" width="909" border="0" align="center">
<?php

//echo  @mysql_num_rows( $sql_query ); die();
$logs = @mysql_query("SELECT * from mylanb where printers like 'IOJ100' and type like 'Firmware' order by timecreate desc");
while($log = mysql_fetch_array( $logs )){
// Bo gio - chi lay ngay
$date = $log['timecreate'];
$createDate = date('Y-m-d', strtotime($date));

echo "<tr>";
echo "<th>". $log['filename']. "</th>";
echo "<th>". $log['type']. "</th>";
echo "<th><a href=\"http://rynantech.com/partner-login/mylanbclick.php?id=".$log['id']."\"><img src='http://www.rynantech.com/partner-login/sites/images/dl.png".$row['image_name']."'></a></th>";
echo "<th>". $log['notes']. "</th>";
echo "<th>". $log['views']. "</th>";
echo "<th>". $createDate. "</th>";
echo "<th><a href=\"mylanbedit.php?id=$log[id]\"><img src='http://www.rynantech.com/partner-login/sites/images/edit.png".$row['image_name']."'></a></th>";
echo "<th><a href=\"mylanbdel.php?id=$log[id]\" onclick=\"return makesure();\"><img src='http://www.rynantech.com/partner-login/sites/images/delete.png".$row['image_name']."'></a></th>";
//echo "<td>". $log['id']. "</td>";
//echo "<td>". $log['printers']. "</td>";
//echo "<td>". $log['link']. "</td>";
//echo "<td>". $log['lastupdate']. "</td>";
//echo "<td>". $log['views']. "</td>";
//echo "<td><a href=\"http://rynantech.com/partner-login/mylanb/VJET/$log[link]\" onclick=\"khoa();\">$log[link]</a></td>";

echo "</tr>";
}
?>

</table>
</div>

<div id="IOJ200" class="tabcontent">
<table id="tracelog1" width="909" border="0" align="center">
<?php

//echo  @mysql_num_rows( $sql_query ); die();
$logs = @mysql_query("SELECT * from mylanb where printers like 'IOJ200' and type like 'Firmware' order by timecreate desc");
while($log = mysql_fetch_array( $logs )){
// Bo gio - chi lay ngay
$date = $log['timecreate'];
$createDate = date('Y-m-d', strtotime($date));

echo "<tr>";
echo "<th>". $log['filename']. "</th>";
echo "<th>". $log['type']. "</th>";
echo "<th><a href=\"http://rynantech.com/partner-login/mylanbclick.php?id=".$log['id']."\"><img src='http://www.rynantech.com/partner-login/sites/images/dl.png".$row['image_name']."'></a></th>";
echo "<th>". $log['notes']. "</th>";
echo "<th>". $log['views']. "</th>";
echo "<th>". $createDate. "</th>";
echo "<th><a href=\"mylanbedit.php?id=$log[id]\"><img src='http://www.rynantech.com/partner-login/sites/images/edit.png".$row['image_name']."'></a></th>";
echo "<th><a href=\"mylanbdel.php?id=$log[id]\" onclick=\"return makesure();\"><img src='http://www.rynantech.com/partner-login/sites/images/delete.png".$row['image_name']."'></a></th>";
//echo "<td>". $log['id']. "</td>";
//echo "<td>". $log['printers']. "</td>";
//echo "<td>". $log['link']. "</td>";
//echo "<td>". $log['lastupdate']. "</td>";
//echo "<td>". $log['views']. "</td>";
//echo "<td><a href=\"http://rynantech.com/partner-login/mylanb/VJET/$log[link]\" onclick=\"khoa();\">$log[link]</a></td>";

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
  <button class="tablinks" onclick="openCity(event, 'RYNAN R20-sw')">RYNAN R20</button>
  <button class="tablinks" onclick="openCity(event, 'VJET1000-sw')">VJET1000</button>
  <button class="tablinks" onclick="openCity(event, 'VJET1010-sw')">VJET1010</button>
  <button class="tablinks" onclick="openCity(event, 'VJET1020-sw')">VJET1020</button>
  <button class="tablinks" onclick="openCity(event, 'VJET1040-sw')">VJET1040</button>
  <button class="tablinks" onclick="openCity(event, 'VJET1040H-sw')">VJET1040H</button>
  <button class="tablinks" onclick="openCity(event, 'VJET1040He-sw')">VJET1040He</button>
  <button class="tablinks" onclick="openCity(event, 'VJET1040S-sw')">VJET1040S</button>
  <button class="tablinks" onclick="openCity(event, 'B1040P-sw')">B1040P</button>
  <button class="tablinks" onclick="openCity(event, 'B1060-sw')">B1060</button>
  <button class="tablinks" onclick="openCity(event, 'B1060P-sw')">B1060P</button>
  <button class="tablinks" onclick="openCity(event, 'B1060H-sw')">B1060H</button>
  <button class="tablinks" onclick="openCity(event, 'VJET1200-sw')">VJET1200</button>
  <button class="tablinks" onclick="openCity(event, 'VJET1200e-sw')">VJET1200e</button>
  <button class="tablinks" onclick="openCity(event, 'IOJ100-sw')">IOJ100</button>
  <button class="tablinks" onclick="openCity(event, 'IOJ200-sw')">IOJ200</button>
</div>

<div id="RYNAN R20-sw" class="tabcontent" style="display: block;" >
<table id="tracelog1" width="909" border="0" align="center">
<?php

//echo  @mysql_num_rows( $sql_query ); die();
$logs = @mysql_query("SELECT * from mylanb where printers like 'RYNAN R20' and type like 'software' order by timecreate desc");
while($log = mysql_fetch_array( $logs )){
// Bo gio - chi lay ngay
$date = $log['timecreate'];
$createDate = date('Y-m-d', strtotime($date));

echo "<tr>";
echo "<th>". $log['filename']. "</th>";
echo "<th>". $log['type']. "</th>";
echo "<th><a href=\"http://rynantech.com/partner-login/mylanbclick.php?id=".$log['id']."\"><img src='http://www.rynantech.com/partner-login/sites/images/dl.png".$row['image_name']."'></a></th>";
echo "<th>". $log['notes']. "</th>";
echo "<th>". $log['views']. "</th>";
echo "<th>". $createDate. "</th>";
echo "<th><a href=\"mylanbedit.php?id=$log[id]\"><img src='http://www.rynantech.com/partner-login/sites/images/edit.png".$row['image_name']."'></a></th>";
echo "<th><a href=\"mylanbdel.php?id=$log[id]\" onclick=\"return makesure();\"><img src='http://www.rynantech.com/partner-login/sites/images/delete.png".$row['image_name']."'></a></th>";
//echo "<td>". $log['id']. "</td>";
//echo "<td>". $log['printers']. "</td>";
//echo "<td>". $log['link']. "</td>";
//echo "<td>". $log['lastupdate']. "</td>";
//echo "<td>". $log['views']. "</td>";
//echo "<td><a href=\"http://rynantech.com/partner-login/mylanb/VJET/$log[link]\" onclick=\"khoa();\">$log[link]</a></td>";

echo "</tr>";
}
?>

</table>
</div>

<div id="VJET1000-sw" class="tabcontent" style="display: block;" >
<table id="tracelog1" width="909" border="0" align="center">
<?php

//echo  @mysql_num_rows( $sql_query ); die();
$logs = @mysql_query("SELECT * from mylanb where printers like 'VJET1000' and type like 'software' order by timecreate desc");
while($log = mysql_fetch_array( $logs )){
// Bo gio - chi lay ngay
$date = $log['timecreate'];
$createDate = date('Y-m-d', strtotime($date));

echo "<tr>";
echo "<th>". $log['filename']. "</th>";
echo "<th>". $log['type']. "</th>";
echo "<th><a href=\"http://rynantech.com/partner-login/mylanbclick.php?id=".$log['id']."\"><img src='http://www.rynantech.com/partner-login/sites/images/dl.png".$row['image_name']."'></a></th>";
echo "<th>". $log['notes']. "</th>";
echo "<th>". $log['views']. "</th>";
echo "<th>". $createDate. "</th>";
echo "<th><a href=\"mylanbedit.php?id=$log[id]\"><img src='http://www.rynantech.com/partner-login/sites/images/edit.png".$row['image_name']."'></a></th>";
echo "<th><a href=\"mylanbdel.php?id=$log[id]\" onclick=\"return makesure();\"><img src='http://www.rynantech.com/partner-login/sites/images/delete.png".$row['image_name']."'></a></th>";
//echo "<td>". $log['id']. "</td>";
//echo "<td>". $log['printers']. "</td>";
//echo "<td>". $log['link']. "</td>";
//echo "<td>". $log['lastupdate']. "</td>";
//echo "<td>". $log['views']. "</td>";
//echo "<td><a href=\"http://rynantech.com/partner-login/mylanb/VJET/$log[link]\" onclick=\"khoa();\">$log[link]</a></td>";

echo "</tr>";
}
?>

</table>
</div>



<div id="VJET1010-sw" class="tabcontent">
<table id="tracelog1" width="909" border="0" align="center">
<?php

//echo  @mysql_num_rows( $sql_query ); die();
$logs = @mysql_query("SELECT * from mylanb where printers like 'VJET1010' and type like 'software' order by timecreate desc");
while($log = mysql_fetch_array( $logs )){
// Bo gio - chi lay ngay
$date = $log['timecreate'];
$createDate = date('Y-m-d', strtotime($date));

echo "<tr>";
echo "<th>". $log['filename']. "</th>";
echo "<th>". $log['type']. "</th>";
echo "<th><a href=\"http://rynantech.com/partner-login/mylanbclick.php?id=".$log['id']."\"><img src='http://www.rynantech.com/partner-login/sites/images/dl.png".$row['image_name']."'></a></th>";
echo "<th>". $log['notes']. "</th>";
echo "<th>". $log['views']. "</th>";
echo "<th>". $createDate. "</th>";
echo "<th><a href=\"mylanbedit.php?id=$log[id]\"><img src='http://www.rynantech.com/partner-login/sites/images/edit.png".$row['image_name']."'></a></th>";
echo "<th><a href=\"mylanbdel.php?id=$log[id]\" onclick=\"return makesure();\"><img src='http://www.rynantech.com/partner-login/sites/images/delete.png".$row['image_name']."'></a></th>";
//echo "<td>". $log['id']. "</td>";
//echo "<td>". $log['printers']. "</td>";
//echo "<td>". $log['link']. "</td>";
//echo "<td>". $log['lastupdate']. "</td>";
//echo "<td>". $log['views']. "</td>";
//echo "<td><a href=\"http://rynantech.com/partner-login/mylanb/VJET/$log[link]\" onclick=\"khoa();\">$log[link]</a></td>";

echo "</tr>";
}
?>

</table>
</div>





<div id="VJET1020-sw" class="tabcontent">
<table id="tracelog1" width="909" border="0" align="center">
<?php

//echo  @mysql_num_rows( $sql_query ); die();
$logs = @mysql_query("SELECT * from mylanb where printers like 'VJET1020' and type like 'software' order by timecreate desc");
while($log = mysql_fetch_array( $logs )){
// Bo gio - chi lay ngay
$date = $log['timecreate'];
$createDate = date('Y-m-d', strtotime($date));

echo "<tr>";
echo "<th>". $log['filename']. "</th>";
echo "<th>". $log['type']. "</th>";
echo "<th><a href=\"http://rynantech.com/partner-login/mylanbclick.php?id=".$log['id']."\"><img src='http://www.rynantech.com/partner-login/sites/images/dl.png".$row['image_name']."'></a></th>";
echo "<th>". $log['notes']. "</th>";
echo "<th>". $log['views']. "</th>";
echo "<th>". $createDate. "</th>";
echo "<th><a href=\"mylanbedit.php?id=$log[id]\"><img src='http://www.rynantech.com/partner-login/sites/images/edit.png".$row['image_name']."'></a></th>";
echo "<th><a href=\"mylanbdel.php?id=$log[id]\" onclick=\"return makesure();\"><img src='http://www.rynantech.com/partner-login/sites/images/delete.png".$row['image_name']."'></a></th>";
//echo "<td>". $log['id']. "</td>";
//echo "<td>". $log['printers']. "</td>";
//echo "<td>". $log['link']. "</td>";
//echo "<td>". $log['lastupdate']. "</td>";
//echo "<td>". $log['views']. "</td>";
//echo "<td><a href=\"http://rynantech.com/partner-login/mylanb/VJET/$log[link]\" onclick=\"khoa();\">$log[link]</a></td>";

echo "</tr>";
}
?>

</table>
</div>



<div id="VJET1040-sw" class="tabcontent">
<table id="tracelog1" width="909" border="0" align="center">
<?php

//echo  @mysql_num_rows( $sql_query ); die();
$logs = @mysql_query("SELECT * from mylanb where printers like 'VJET1040' and type like 'software' order by timecreate desc");
while($log = mysql_fetch_array( $logs )){
// Bo gio - chi lay ngay
$date = $log['timecreate'];
$createDate = date('Y-m-d', strtotime($date));

echo "<tr>";
echo "<th>". $log['filename']. "</th>";
echo "<th>". $log['type']. "</th>";
echo "<th><a href=\"http://rynantech.com/partner-login/mylanbclick.php?id=".$log['id']."\"><img src='http://www.rynantech.com/partner-login/sites/images/dl.png".$row['image_name']."'></a></th>";
echo "<th>". $log['notes']. "</th>";
echo "<th>". $log['views']. "</th>";
echo "<th>". $createDate. "</th>";
echo "<th><a href=\"mylanbedit.php?id=$log[id]\"><img src='http://www.rynantech.com/partner-login/sites/images/edit.png".$row['image_name']."'></a></th>";
echo "<th><a href=\"mylanbdel.php?id=$log[id]\" onclick=\"return makesure();\"><img src='http://www.rynantech.com/partner-login/sites/images/delete.png".$row['image_name']."'></a></th>";
//echo "<td>". $log['id']. "</td>";
//echo "<td>". $log['printers']. "</td>";
//echo "<td>". $log['link']. "</td>";
//echo "<td>". $log['lastupdate']. "</td>";
//echo "<td>". $log['views']. "</td>";
//echo "<td><a href=\"http://rynantech.com/partner-login/mylanb/VJET/$log[link]\" onclick=\"khoa();\">$log[link]</a></td>";

echo "</tr>";
}
?>

</table>
</div>




<div id="VJET1040H-sw" class="tabcontent">
<table id="tracelog1" width="909" border="0" align="center">
<?php

//echo  @mysql_num_rows( $sql_query ); die();
$logs = @mysql_query("SELECT * from mylanb where printers like 'VJET1040H' and type like 'software' order by timecreate desc");
while($log = mysql_fetch_array( $logs )){
// Bo gio - chi lay ngay
$date = $log['timecreate'];
$createDate = date('Y-m-d', strtotime($date));

echo "<tr>";
echo "<th>". $log['filename']. "</th>";
echo "<th>". $log['type']. "</th>";
echo "<th><a href=\"http://rynantech.com/partner-login/mylanbclick.php?id=".$log['id']."\"><img src='http://www.rynantech.com/partner-login/sites/images/dl.png".$row['image_name']."'></a></th>";
echo "<th>". $log['notes']. "</th>";
echo "<th>". $log['views']. "</th>";
echo "<th>". $createDate. "</th>";
echo "<th><a href=\"mylanbedit.php?id=$log[id]\"><img src='http://www.rynantech.com/partner-login/sites/images/edit.png".$row['image_name']."'></a></th>";
echo "<th><a href=\"mylanbdel.php?id=$log[id]\" onclick=\"return makesure();\"><img src='http://www.rynantech.com/partner-login/sites/images/delete.png".$row['image_name']."'></a></th>";
//echo "<td>". $log['id']. "</td>";
//echo "<td>". $log['printers']. "</td>";
//echo "<td>". $log['link']. "</td>";
//echo "<td>". $log['lastupdate']. "</td>";
//echo "<td>". $log['views']. "</td>";
//echo "<td><a href=\"http://rynantech.com/partner-login/mylanb/VJET/$log[link]\" onclick=\"khoa();\">$log[link]</a></td>";

echo "</tr>";
}
?>

</table>
</div>


<div id="VJET1040He-sw" class="tabcontent">
<table id="tracelog1" width="909" border="0" align="center">
<?php

//echo  @mysql_num_rows( $sql_query ); die();
$logs = @mysql_query("SELECT * from mylanb where printers like 'VJET1040He' and type like 'software' order by timecreate desc");
while($log = mysql_fetch_array( $logs )){
// Bo gio - chi lay ngay
$date = $log['timecreate'];
$createDate = date('Y-m-d', strtotime($date));

echo "<tr>";
echo "<th>". $log['filename']. "</th>";
echo "<th>". $log['type']. "</th>";
echo "<th><a href=\"http://rynantech.com/partner-login/mylanbclick.php?id=".$log['id']."\"><img src='http://www.rynantech.com/partner-login/sites/images/dl.png".$row['image_name']."'></a></th>";
echo "<th>". $log['notes']. "</th>";
echo "<th>". $log['views']. "</th>";
echo "<th>". $createDate. "</th>";
echo "<th><a href=\"mylanbedit.php?id=$log[id]\"><img src='http://www.rynantech.com/partner-login/sites/images/edit.png".$row['image_name']."'></a></th>";
echo "<th><a href=\"mylanbdel.php?id=$log[id]\" onclick=\"return makesure();\"><img src='http://www.rynantech.com/partner-login/sites/images/delete.png".$row['image_name']."'></a></th>";
//echo "<td>". $log['id']. "</td>";
//echo "<td>". $log['printers']. "</td>";
//echo "<td>". $log['link']. "</td>";
//echo "<td>". $log['lastupdate']. "</td>";
//echo "<td>". $log['views']. "</td>";
//echo "<td><a href=\"http://rynantech.com/partner-login/mylanb/VJET/$log[link]\" onclick=\"khoa();\">$log[link]</a></td>";

echo "</tr>";
}
?>

</table>
</div>


<div id="VJET1040S-sw" class="tabcontent">
<table id="tracelog1" width="909" border="0" align="center">
<?php

//echo  @mysql_num_rows( $sql_query ); die();
$logs = @mysql_query("SELECT * from mylanb where printers like 'VJET1040S' and type like 'software' order by timecreate desc");
while($log = mysql_fetch_array( $logs )){
// Bo gio - chi lay ngay
$date = $log['timecreate'];
$createDate = date('Y-m-d', strtotime($date));

echo "<tr>";
echo "<th>". $log['filename']. "</th>";
echo "<th>". $log['type']. "</th>";
echo "<th><a href=\"http://rynantech.com/partner-login/mylanbclick.php?id=".$log['id']."\"><img src='http://www.rynantech.com/partner-login/sites/images/dl.png".$row['image_name']."'></a></th>";
echo "<th>". $log['notes']. "</th>";
echo "<th>". $log['views']. "</th>";
echo "<th>". $createDate. "</th>";
echo "<th><a href=\"mylanbedit.php?id=$log[id]\"><img src='http://www.rynantech.com/partner-login/sites/images/edit.png".$row['image_name']."'></a></th>";
echo "<th><a href=\"mylanbdel.php?id=$log[id]\" onclick=\"return makesure();\"><img src='http://www.rynantech.com/partner-login/sites/images/delete.png".$row['image_name']."'></a></th>";
//echo "<td>". $log['id']. "</td>";
//echo "<td>". $log['printers']. "</td>";
//echo "<td>". $log['link']. "</td>";
//echo "<td>". $log['lastupdate']. "</td>";
//echo "<td>". $log['views']. "</td>";
//echo "<td><a href=\"http://rynantech.com/partner-login/mylanb/VJET/$log[link]\" onclick=\"khoa();\">$log[link]</a></td>";

echo "</tr>";
}
?>

</table>
</div>


<div id="B1040P-sw" class="tabcontent">
<table id="tracelog1" width="909" border="0" align="center">
<?php

//echo  @mysql_num_rows( $sql_query ); die();
$logs = @mysql_query("SELECT * from mylanb where printers like 'B1040P' and type like 'software' order by timecreate desc");
while($log = mysql_fetch_array( $logs )){
// Bo gio - chi lay ngay
$date = $log['timecreate'];
$createDate = date('Y-m-d', strtotime($date));

echo "<tr>";
echo "<th>". $log['filename']. "</th>";
echo "<th>". $log['type']. "</th>";
echo "<th><a href=\"http://rynantech.com/partner-login/mylanbclick.php?id=".$log['id']."\"><img src='http://www.rynantech.com/partner-login/sites/images/dl.png".$row['image_name']."'></a></th>";
echo "<th>". $log['notes']. "</th>";
echo "<th>". $log['views']. "</th>";
echo "<th>". $createDate. "</th>";
echo "<th><a href=\"mylanbedit.php?id=$log[id]\"><img src='http://www.rynantech.com/partner-login/sites/images/edit.png".$row['image_name']."'></a></th>";
echo "<th><a href=\"mylanbdel.php?id=$log[id]\" onclick=\"return makesure();\"><img src='http://www.rynantech.com/partner-login/sites/images/delete.png".$row['image_name']."'></a></th>";
//echo "<td>". $log['id']. "</td>";
//echo "<td>". $log['printers']. "</td>";
//echo "<td>". $log['link']. "</td>";
//echo "<td>". $log['lastupdate']. "</td>";
//echo "<td>". $log['views']. "</td>";
//echo "<td><a href=\"http://rynantech.com/partner-login/mylanb/VJET/$log[link]\" onclick=\"khoa();\">$log[link]</a></td>";

echo "</tr>";
}
?>

</table>
</div>



<div id="B1060-sw" class="tabcontent">
<table id="tracelog1" width="909" border="0" align="center">
<?php

//echo  @mysql_num_rows( $sql_query ); die();
$logs = @mysql_query("SELECT * from mylanb where printers like 'B1060' and type like 'software' order by timecreate desc");
while($log = mysql_fetch_array( $logs )){
// Bo gio - chi lay ngay
$date = $log['timecreate'];
$createDate = date('Y-m-d', strtotime($date));

echo "<tr>";
echo "<th>". $log['filename']. "</th>";
echo "<th>". $log['type']. "</th>";
echo "<th><a href=\"http://rynantech.com/partner-login/mylanbclick.php?id=".$log['id']."\"><img src='http://www.rynantech.com/partner-login/sites/images/dl.png".$row['image_name']."'></a></th>";
echo "<th>". $log['notes']. "</th>";
echo "<th>". $log['views']. "</th>";
echo "<th>". $createDate. "</th>";
echo "<th><a href=\"mylanbedit.php?id=$log[id]\"><img src='http://www.rynantech.com/partner-login/sites/images/edit.png".$row['image_name']."'></a></th>";
echo "<th><a href=\"mylanbdel.php?id=$log[id]\" onclick=\"return makesure();\"><img src='http://www.rynantech.com/partner-login/sites/images/delete.png".$row['image_name']."'></a></th>";
//echo "<td>". $log['id']. "</td>";
//echo "<td>". $log['printers']. "</td>";
//echo "<td>". $log['link']. "</td>";
//echo "<td>". $log['lastupdate']. "</td>";
//echo "<td>". $log['views']. "</td>";
//echo "<td><a href=\"http://rynantech.com/partner-login/mylanb/VJET/$log[link]\" onclick=\"khoa();\">$log[link]</a></td>";

echo "</tr>";
}
?>

</table>
</div>



<div id="B1060P-sw" class="tabcontent">
<table id="tracelog1" width="909" border="0" align="center">
<?php

//echo  @mysql_num_rows( $sql_query ); die();
$logs = @mysql_query("SELECT * from mylanb where printers like 'B1060P' and type like 'software' order by timecreate desc");
while($log = mysql_fetch_array( $logs )){
// Bo gio - chi lay ngay
$date = $log['timecreate'];
$createDate = date('Y-m-d', strtotime($date));

echo "<tr>";
echo "<th>". $log['filename']. "</th>";
echo "<th>". $log['type']. "</th>";
echo "<th><a href=\"http://rynantech.com/partner-login/mylanbclick.php?id=".$log['id']."\"><img src='http://www.rynantech.com/partner-login/sites/images/dl.png".$row['image_name']."'></a></th>";
echo "<th>". $log['notes']. "</th>";
echo "<th>". $log['views']. "</th>";
echo "<th>". $createDate. "</th>";
echo "<th><a href=\"mylanbedit.php?id=$log[id]\"><img src='http://www.rynantech.com/partner-login/sites/images/edit.png".$row['image_name']."'></a></th>";
echo "<th><a href=\"mylanbdel.php?id=$log[id]\" onclick=\"return makesure();\"><img src='http://www.rynantech.com/partner-login/sites/images/delete.png".$row['image_name']."'></a></th>";
//echo "<td>". $log['id']. "</td>";
//echo "<td>". $log['printers']. "</td>";
//echo "<td>". $log['link']. "</td>";
//echo "<td>". $log['lastupdate']. "</td>";
//echo "<td>". $log['views']. "</td>";
//echo "<td><a href=\"http://rynantech.com/partner-login/mylanb/VJET/$log[link]\" onclick=\"khoa();\">$log[link]</a></td>";

echo "</tr>";
}
?>

</table>
</div>



<div id="B1060H-sw" class="tabcontent">
<table id="tracelog1" width="909" border="0" align="center">
<?php

//echo  @mysql_num_rows( $sql_query ); die();
$logs = @mysql_query("SELECT * from mylanb where printers like 'B1060H' and type like 'software' order by timecreate desc");
while($log = mysql_fetch_array( $logs )){
// Bo gio - chi lay ngay
$date = $log['timecreate'];
$createDate = date('Y-m-d', strtotime($date));

echo "<tr>";
echo "<th>". $log['filename']. "</th>";
echo "<th>". $log['type']. "</th>";
echo "<th><a href=\"http://rynantech.com/partner-login/mylanbclick.php?id=".$log['id']."\"><img src='http://www.rynantech.com/partner-login/sites/images/dl.png".$row['image_name']."'></a></th>";
echo "<th>". $log['notes']. "</th>";
echo "<th>". $log['views']. "</th>";
echo "<th>". $createDate. "</th>";
echo "<th><a href=\"mylanbedit.php?id=$log[id]\"><img src='http://www.rynantech.com/partner-login/sites/images/edit.png".$row['image_name']."'></a></th>";
echo "<th><a href=\"mylanbdel.php?id=$log[id]\" onclick=\"return makesure();\"><img src='http://www.rynantech.com/partner-login/sites/images/delete.png".$row['image_name']."'></a></th>";
//echo "<td>". $log['id']. "</td>";
//echo "<td>". $log['printers']. "</td>";
//echo "<td>". $log['link']. "</td>";
//echo "<td>". $log['lastupdate']. "</td>";
//echo "<td>". $log['views']. "</td>";
//echo "<td><a href=\"http://rynantech.com/partner-login/mylanb/VJET/$log[link]\" onclick=\"khoa();\">$log[link]</a></td>";

echo "</tr>";
}
?>

</table>
</div>



<div id="VJET1200-sw" class="tabcontent">
<table id="tracelog1" width="909" border="0" align="center">
<?php

//echo  @mysql_num_rows( $sql_query ); die();
$logs = @mysql_query("SELECT * from mylanb where printers like 'VJET1200' and type like 'software' order by timecreate desc");
while($log = mysql_fetch_array( $logs )){
// Bo gio - chi lay ngay
$date = $log['timecreate'];
$createDate = date('Y-m-d', strtotime($date));

echo "<tr>";
echo "<th>". $log['filename']. "</th>";
echo "<th>". $log['type']. "</th>";
echo "<th><a href=\"http://rynantech.com/partner-login/mylanbclick.php?id=".$log['id']."\"><img src='http://www.rynantech.com/partner-login/sites/images/dl.png".$row['image_name']."'></a></th>";
echo "<th>". $log['notes']. "</th>";
echo "<th>". $log['views']. "</th>";
echo "<th>". $createDate. "</th>";
echo "<th><a href=\"mylanbedit.php?id=$log[id]\"><img src='http://www.rynantech.com/partner-login/sites/images/edit.png".$row['image_name']."'></a></th>";
echo "<th><a href=\"mylanbdel.php?id=$log[id]\" onclick=\"return makesure();\"><img src='http://www.rynantech.com/partner-login/sites/images/delete.png".$row['image_name']."'></a></th>";
//echo "<td>". $log['id']. "</td>";
//echo "<td>". $log['printers']. "</td>";
//echo "<td>". $log['link']. "</td>";
//echo "<td>". $log['lastupdate']. "</td>";
//echo "<td>". $log['views']. "</td>";
//echo "<td><a href=\"http://rynantech.com/partner-login/mylanb/VJET/$log[link]\" onclick=\"khoa();\">$log[link]</a></td>";

echo "</tr>";
}
?>

</table>
</div>
     
<div id="VJET1200e-sw" class="tabcontent">
<table id="tracelog1" width="909" border="0" align="center">
<?php

//echo  @mysql_num_rows( $sql_query ); die();
$logs = @mysql_query("SELECT * from mylanb where printers like 'VJET1200e' and type like 'software' order by timecreate desc");
while($log = mysql_fetch_array( $logs )){
// Bo gio - chi lay ngay
$date = $log['timecreate'];
$createDate = date('Y-m-d', strtotime($date));

echo "<tr>";
echo "<th>". $log['filename']. "</th>";
echo "<th>". $log['type']. "</th>";
echo "<th><a href=\"http://rynantech.com/partner-login/mylanbclick.php?id=".$log['id']."\"><img src='http://www.rynantech.com/partner-login/sites/images/dl.png".$row['image_name']."'></a></th>";
echo "<th>". $log['notes']. "</th>";
echo "<th>". $log['views']. "</th>";
echo "<th>". $createDate. "</th>";
echo "<th><a href=\"mylanbedit.php?id=$log[id]\"><img src='http://www.rynantech.com/partner-login/sites/images/edit.png".$row['image_name']."'></a></th>";
echo "<th><a href=\"mylanbdel.php?id=$log[id]\" onclick=\"return makesure();\"><img src='http://www.rynantech.com/partner-login/sites/images/delete.png".$row['image_name']."'></a></th>";
//echo "<td>". $log['id']. "</td>";
//echo "<td>". $log['printers']. "</td>";
//echo "<td>". $log['link']. "</td>";
//echo "<td>". $log['lastupdate']. "</td>";
//echo "<td>". $log['views']. "</td>";
//echo "<td><a href=\"http://rynantech.com/partner-login/mylanb/VJET/$log[link]\" onclick=\"khoa();\">$log[link]</a></td>";

echo "</tr>";
}
?>

</table>
</div>


<div id="IOJ100-sw" class="tabcontent">
<table id="tracelog1" width="909" border="0" align="center">
<?php

//echo  @mysql_num_rows( $sql_query ); die();
$logs = @mysql_query("SELECT * from mylanb where printers like 'IOJ100' and type like 'software' order by timecreate desc");
while($log = mysql_fetch_array( $logs )){
// Bo gio - chi lay ngay
$date = $log['timecreate'];
$createDate = date('Y-m-d', strtotime($date));

echo "<tr>";
echo "<th>". $log['filename']. "</th>";
echo "<th>". $log['type']. "</th>";
echo "<th><a href=\"http://rynantech.com/partner-login/mylanbclick.php?id=".$log['id']."\"><img src='http://www.rynantech.com/partner-login/sites/images/dl.png".$row['image_name']."'></a></th>";
echo "<th>". $log['notes']. "</th>";
echo "<th>". $log['views']. "</th>";
echo "<th>". $createDate. "</th>";
echo "<th><a href=\"mylanbedit.php?id=$log[id]\"><img src='http://www.rynantech.com/partner-login/sites/images/edit.png".$row['image_name']."'></a></th>";
echo "<th><a href=\"mylanbdel.php?id=$log[id]\" onclick=\"return makesure();\"><img src='http://www.rynantech.com/partner-login/sites/images/delete.png".$row['image_name']."'></a></th>";
//echo "<td>". $log['id']. "</td>";
//echo "<td>". $log['printers']. "</td>";
//echo "<td>". $log['link']. "</td>";
//echo "<td>". $log['lastupdate']. "</td>";
//echo "<td>". $log['views']. "</td>";
//echo "<td><a href=\"http://rynantech.com/partner-login/mylanb/VJET/$log[link]\" onclick=\"khoa();\">$log[link]</a></td>";

echo "</tr>";
}
?>

</table>
</div>

<div id="IOJ200-sw" class="tabcontent">
<table id="tracelog1" width="909" border="0" align="center">
<?php

//echo  @mysql_num_rows( $sql_query ); die();
$logs = @mysql_query("SELECT * from mylanb where printers like 'IOJ200' and type like 'software' order by timecreate desc");
while($log = mysql_fetch_array( $logs )){
// Bo gio - chi lay ngay
$date = $log['timecreate'];
$createDate = date('Y-m-d', strtotime($date));

echo "<tr>";
echo "<th>". $log['filename']. "</th>";
echo "<th>". $log['type']. "</th>";
echo "<th><a href=\"http://rynantech.com/partner-login/mylanbclick.php?id=".$log['id']."\"><img src='http://www.rynantech.com/partner-login/sites/images/dl.png".$row['image_name']."'></a></th>";
echo "<th>". $log['notes']. "</th>";
echo "<th>". $log['views']. "</th>";
echo "<th>". $createDate. "</th>";
echo "<th><a href=\"mylanbedit.php?id=$log[id]\"><img src='http://www.rynantech.com/partner-login/sites/images/edit.png".$row['image_name']."'></a></th>";
echo "<th><a href=\"mylanbdel.php?id=$log[id]\" onclick=\"return makesure();\"><img src='http://www.rynantech.com/partner-login/sites/images/delete.png".$row['image_name']."'></a></th>";
//echo "<td>". $log['id']. "</td>";
//echo "<td>". $log['printers']. "</td>";
//echo "<td>". $log['link']. "</td>";
//echo "<td>". $log['lastupdate']. "</td>";
//echo "<td>". $log['views']. "</td>";
//echo "<td><a href=\"http://rynantech.com/partner-login/mylanb/VJET/$log[link]\" onclick=\"khoa();\">$log[link]</a></td>";

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
  <button class="tablinks" onclick="openCity(event, 'RYNAN R20-br')">RYNAN R20</button>
  <button class="tablinks" onclick="openCity(event, 'VJET1000-br')">VJET1000</button>
  <button class="tablinks" onclick="openCity(event, 'VJET1010-br')">VJET1010</button>
  <button class="tablinks" onclick="openCity(event, 'VJET1020-br')">VJET1020</button>
  <button class="tablinks" onclick="openCity(event, 'VJET1040-br')">VJET1040</button>
  <button class="tablinks" onclick="openCity(event, 'VJET1040H-br')">VJET1040H</button>
  <button class="tablinks" onclick="openCity(event, 'VJET1040He-br')">VJET1040He</button>
  <button class="tablinks" onclick="openCity(event, 'VJET1040S-br')">VJET1040S</button>
  <button class="tablinks" onclick="openCity(event, 'B1040P-br')">B1040P</button>
  <button class="tablinks" onclick="openCity(event, 'B1060-br')">B1060</button>
  <button class="tablinks" onclick="openCity(event, 'B1060P-br')">B1060P</button>
  <button class="tablinks" onclick="openCity(event, 'B1060H-br')">B1060H</button>
  <button class="tablinks" onclick="openCity(event, 'VJET1200-br')">VJET1200</button>
  <button class="tablinks" onclick="openCity(event, 'VJET1200e-br')">VJET1200e</button>
  <button class="tablinks" onclick="openCity(event, 'IOJ100-br')">IOJ100</button>
  <button class="tablinks" onclick="openCity(event, 'IOJ200-br')">IOJ200</button>
</div>
<div id="RYNAN R20-br" class="tabcontent" style="display: block;" >
<table id="tracelog1" width="909" border="0" align="center">
<?php

//echo  @mysql_num_rows( $sql_query ); die();
$logs = @mysql_query("SELECT * from mylanb where printers like 'RYNAN R20' and type like 'brochure' order by timecreate desc");
while($log = mysql_fetch_array( $logs )){
// Bo gio - chi lay ngay
$date = $log['timecreate'];
$createDate = date('Y-m-d', strtotime($date));

echo "<tr>";
echo "<th>". $log['filename']. "</th>";
echo "<th>". $log['type']. "</th>";
echo "<th><a href=\"http://rynantech.com/partner-login/mylanbclick.php?id=".$log['id']."\"><img src='http://www.rynantech.com/partner-login/sites/images/dl.png".$row['image_name']."'></a></th>";
echo "<th>". $log['notes']. "</th>";
echo "<th>". $log['views']. "</th>";
echo "<th>". $createDate. "</th>";
echo "<th><a href=\"mylanbedit.php?id=$log[id]\"><img src='http://www.rynantech.com/partner-login/sites/images/edit.png".$row['image_name']."'></a></th>";
echo "<th><a href=\"mylanbdel.php?id=$log[id]\" onclick=\"return makesure();\"><img src='http://www.rynantech.com/partner-login/sites/images/delete.png".$row['image_name']."'></a></th>";
//echo "<td>". $log['id']. "</td>";
//echo "<td>". $log['printers']. "</td>";
//echo "<td>". $log['link']. "</td>";
//echo "<td>". $log['lastupdate']. "</td>";
//echo "<td>". $log['views']. "</td>";
//echo "<td><a href=\"http://rynantech.com/partner-login/mylanb/VJET/$log[link]\" onclick=\"khoa();\">$log[link]</a></td>";

echo "</tr>";
}
?>

</table>
</div>




<div id="VJET1000-br" class="tabcontent" style="display: block;" >
<table id="tracelog1" width="909" border="0" align="center">
<?php

//echo  @mysql_num_rows( $sql_query ); die();
$logs = @mysql_query("SELECT * from mylanb where printers like 'VJET1000' and type like 'brochure' order by timecreate desc");
while($log = mysql_fetch_array( $logs )){
// Bo gio - chi lay ngay
$date = $log['timecreate'];
$createDate = date('Y-m-d', strtotime($date));

echo "<tr>";
echo "<th>". $log['filename']. "</th>";
echo "<th>". $log['type']. "</th>";
echo "<th><a href=\"http://rynantech.com/partner-login/mylanbclick.php?id=".$log['id']."\"><img src='http://www.rynantech.com/partner-login/sites/images/dl.png".$row['image_name']."'></a></th>";
echo "<th>". $log['notes']. "</th>";
echo "<th>". $log['views']. "</th>";
echo "<th>". $createDate. "</th>";
echo "<th><a href=\"mylanbedit.php?id=$log[id]\"><img src='http://www.rynantech.com/partner-login/sites/images/edit.png".$row['image_name']."'></a></th>";
echo "<th><a href=\"mylanbdel.php?id=$log[id]\" onclick=\"return makesure();\"><img src='http://www.rynantech.com/partner-login/sites/images/delete.png".$row['image_name']."'></a></th>";
//echo "<td>". $log['id']. "</td>";
//echo "<td>". $log['printers']. "</td>";
//echo "<td>". $log['link']. "</td>";
//echo "<td>". $log['lastupdate']. "</td>";
//echo "<td>". $log['views']. "</td>";
//echo "<td><a href=\"http://rynantech.com/partner-login/mylanb/VJET/$log[link]\" onclick=\"khoa();\">$log[link]</a></td>";

echo "</tr>";
}
?>

</table>
</div>



<div id="VJET1010-br" class="tabcontent">
<table id="tracelog1" width="909" border="0" align="center">
<?php

//echo  @mysql_num_rows( $sql_query ); die();
$logs = @mysql_query("SELECT * from mylanb where printers like 'VJET1010' and type like 'brochure' order by timecreate desc");
while($log = mysql_fetch_array( $logs )){
// Bo gio - chi lay ngay
$date = $log['timecreate'];
$createDate = date('Y-m-d', strtotime($date));

echo "<tr>";
echo "<th>". $log['filename']. "</th>";
echo "<th>". $log['type']. "</th>";
echo "<th><a href=\"http://rynantech.com/partner-login/mylanbclick.php?id=".$log['id']."\"><img src='http://www.rynantech.com/partner-login/sites/images/dl.png".$row['image_name']."'></a></th>";
echo "<th>". $log['notes']. "</th>";
echo "<th>". $log['views']. "</th>";
echo "<th>". $createDate. "</th>";
echo "<th><a href=\"mylanbedit.php?id=$log[id]\"><img src='http://www.rynantech.com/partner-login/sites/images/edit.png".$row['image_name']."'></a></th>";
echo "<th><a href=\"mylanbdel.php?id=$log[id]\" onclick=\"return makesure();\"><img src='http://www.rynantech.com/partner-login/sites/images/delete.png".$row['image_name']."'></a></th>";
//echo "<td>". $log['id']. "</td>";
//echo "<td>". $log['printers']. "</td>";
//echo "<td>". $log['link']. "</td>";
//echo "<td>". $log['lastupdate']. "</td>";
//echo "<td>". $log['views']. "</td>";
//echo "<td><a href=\"http://rynantech.com/partner-login/mylanb/VJET/$log[link]\" onclick=\"khoa();\">$log[link]</a></td>";

echo "</tr>";
}
?>

</table>
</div>


<div id="VJET1020-br" class="tabcontent">
<table id="tracelog1" width="909" border="0" align="center">
<?php

//echo  @mysql_num_rows( $sql_query ); die();
$logs = @mysql_query("SELECT * from mylanb where printers like 'VJET1020' and type like 'brochure' order by timecreate desc");
while($log = mysql_fetch_array( $logs )){
// Bo gio - chi lay ngay
$date = $log['timecreate'];
$createDate = date('Y-m-d', strtotime($date));

echo "<tr>";
echo "<th>". $log['filename']. "</th>";
echo "<th>". $log['type']. "</th>";
echo "<th><a href=\"http://rynantech.com/partner-login/mylanbclick.php?id=".$log['id']."\"><img src='http://www.rynantech.com/partner-login/sites/images/dl.png".$row['image_name']."'></a></th>";
echo "<th>". $log['notes']. "</th>";
echo "<th>". $log['views']. "</th>";
echo "<th>". $createDate. "</th>";
echo "<th><a href=\"mylanbedit.php?id=$log[id]\"><img src='http://www.rynantech.com/partner-login/sites/images/edit.png".$row['image_name']."'></a></th>";
echo "<th><a href=\"mylanbdel.php?id=$log[id]\" onclick=\"return makesure();\"><img src='http://www.rynantech.com/partner-login/sites/images/delete.png".$row['image_name']."'></a></th>";
//echo "<td>". $log['id']. "</td>";
//echo "<td>". $log['printers']. "</td>";
//echo "<td>". $log['link']. "</td>";
//echo "<td>". $log['lastupdate']. "</td>";
//echo "<td>". $log['views']. "</td>";
//echo "<td><a href=\"http://rynantech.com/partner-login/mylanb/VJET/$log[link]\" onclick=\"khoa();\">$log[link]</a></td>";

echo "</tr>";
}
?>

</table>
</div>




<div id="VJET1040-br" class="tabcontent">
<table id="tracelog1" width="909" border="0" align="center">
<?php

//echo  @mysql_num_rows( $sql_query ); die();
$logs = @mysql_query("SELECT * from mylanb where printers like 'VJET1040' and type like 'brochure' order by timecreate desc");
while($log = mysql_fetch_array( $logs )){
// Bo gio - chi lay ngay
$date = $log['timecreate'];
$createDate = date('Y-m-d', strtotime($date));

echo "<tr>";
echo "<th>". $log['filename']. "</th>";
echo "<th>". $log['type']. "</th>";
echo "<th><a href=\"http://rynantech.com/partner-login/mylanbclick.php?id=".$log['id']."\"><img src='http://www.rynantech.com/partner-login/sites/images/dl.png".$row['image_name']."'></a></th>";
echo "<th>". $log['notes']. "</th>";
echo "<th>". $log['views']. "</th>";
echo "<th>". $createDate. "</th>";
echo "<th><a href=\"mylanbedit.php?id=$log[id]\"><img src='http://www.rynantech.com/partner-login/sites/images/edit.png".$row['image_name']."'></a></th>";
echo "<th><a href=\"mylanbdel.php?id=$log[id]\" onclick=\"return makesure();\"><img src='http://www.rynantech.com/partner-login/sites/images/delete.png".$row['image_name']."'></a></th>";
//echo "<td>". $log['id']. "</td>";
//echo "<td>". $log['printers']. "</td>";
//echo "<td>". $log['link']. "</td>";
//echo "<td>". $log['lastupdate']. "</td>";
//echo "<td>". $log['views']. "</td>";
//echo "<td><a href=\"http://rynantech.com/partner-login/mylanb/VJET/$log[link]\" onclick=\"khoa();\">$log[link]</a></td>";

echo "</tr>";
}
?>

</table>
</div>




<div id="VJET1040H-br" class="tabcontent">
<table id="tracelog1" width="909" border="0" align="center">
<?php

//echo  @mysql_num_rows( $sql_query ); die();
$logs = @mysql_query("SELECT * from mylanb where printers like 'VJET1040H' and type like 'brochure' order by timecreate desc");
while($log = mysql_fetch_array( $logs )){
// Bo gio - chi lay ngay
$date = $log['timecreate'];
$createDate = date('Y-m-d', strtotime($date));

echo "<tr>";
echo "<th>". $log['filename']. "</th>";
echo "<th>". $log['type']. "</th>";
echo "<th><a href=\"http://rynantech.com/partner-login/mylanbclick.php?id=".$log['id']."\"><img src='http://www.rynantech.com/partner-login/sites/images/dl.png".$row['image_name']."'></a></th>";
echo "<th>". $log['notes']. "</th>";
echo "<th>". $log['views']. "</th>";
echo "<th>". $createDate. "</th>";
echo "<th><a href=\"mylanbedit.php?id=$log[id]\"><img src='http://www.rynantech.com/partner-login/sites/images/edit.png".$row['image_name']."'></a></th>";
echo "<th><a href=\"mylanbdel.php?id=$log[id]\" onclick=\"return makesure();\"><img src='http://www.rynantech.com/partner-login/sites/images/delete.png".$row['image_name']."'></a></th>";
//echo "<td>". $log['id']. "</td>";
//echo "<td>". $log['printers']. "</td>";
//echo "<td>". $log['link']. "</td>";
//echo "<td>". $log['lastupdate']. "</td>";
//echo "<td>". $log['views']. "</td>";
//echo "<td><a href=\"http://rynantech.com/partner-login/mylanb/VJET/$log[link]\" onclick=\"khoa();\">$log[link]</a></td>";

echo "</tr>";
}
?>

</table>
</div>




<div id="VJET1040He-br" class="tabcontent">
<table id="tracelog1" width="909" border="0" align="center">
<?php

//echo  @mysql_num_rows( $sql_query ); die();
$logs = @mysql_query("SELECT * from mylanb where printers like 'VJET1040He' and type like 'brochure' order by timecreate desc");
while($log = mysql_fetch_array( $logs )){
// Bo gio - chi lay ngay
$date = $log['timecreate'];
$createDate = date('Y-m-d', strtotime($date));

echo "<tr>";
echo "<th>". $log['filename']. "</th>";
echo "<th>". $log['type']. "</th>";
echo "<th><a href=\"http://rynantech.com/partner-login/mylanbclick.php?id=".$log['id']."\"><img src='http://www.rynantech.com/partner-login/sites/images/dl.png".$row['image_name']."'></a></th>";
echo "<th>". $log['notes']. "</th>";
echo "<th>". $log['views']. "</th>";
echo "<th>". $createDate. "</th>";
echo "<th><a href=\"mylanbedit.php?id=$log[id]\"><img src='http://www.rynantech.com/partner-login/sites/images/edit.png".$row['image_name']."'></a></th>";
echo "<th><a href=\"mylanbdel.php?id=$log[id]\" onclick=\"return makesure();\"><img src='http://www.rynantech.com/partner-login/sites/images/delete.png".$row['image_name']."'></a></th>";
//echo "<td>". $log['id']. "</td>";
//echo "<td>". $log['printers']. "</td>";
//echo "<td>". $log['link']. "</td>";
//echo "<td>". $log['lastupdate']. "</td>";
//echo "<td>". $log['views']. "</td>";
//echo "<td><a href=\"http://rynantech.com/partner-login/mylanb/VJET/$log[link]\" onclick=\"khoa();\">$log[link]</a></td>";

echo "</tr>";
}
?>

</table>
</div>





<div id="VJET1040S-br" class="tabcontent">
<table id="tracelog1" width="909" border="0" align="center">
<?php

//echo  @mysql_num_rows( $sql_query ); die();
$logs = @mysql_query("SELECT * from mylanb where printers like 'VJET1040S' and type like 'brochure' order by timecreate desc");
while($log = mysql_fetch_array( $logs )){
// Bo gio - chi lay ngay
$date = $log['timecreate'];
$createDate = date('Y-m-d', strtotime($date));

echo "<tr>";
echo "<th>". $log['filename']. "</th>";
echo "<th>". $log['type']. "</th>";
echo "<th><a href=\"http://rynantech.com/partner-login/mylanbclick.php?id=".$log['id']."\"><img src='http://www.rynantech.com/partner-login/sites/images/dl.png".$row['image_name']."'></a></th>";
echo "<th>". $log['notes']. "</th>";
echo "<th>". $log['views']. "</th>";
echo "<th>". $createDate. "</th>";
echo "<th><a href=\"mylanbedit.php?id=$log[id]\"><img src='http://www.rynantech.com/partner-login/sites/images/edit.png".$row['image_name']."'></a></th>";
echo "<th><a href=\"mylanbdel.php?id=$log[id]\" onclick=\"return makesure();\"><img src='http://www.rynantech.com/partner-login/sites/images/delete.png".$row['image_name']."'></a></th>";
//echo "<td>". $log['id']. "</td>";
//echo "<td>". $log['printers']. "</td>";
//echo "<td>". $log['link']. "</td>";
//echo "<td>". $log['lastupdate']. "</td>";
//echo "<td>". $log['views']. "</td>";
//echo "<td><a href=\"http://rynantech.com/partner-login/mylanb/VJET/$log[link]\" onclick=\"khoa();\">$log[link]</a></td>";

echo "</tr>";
}
?>

</table>
</div>




<div id="B1040P-br" class="tabcontent">
<table id="tracelog1" width="909" border="0" align="center">
<?php

//echo  @mysql_num_rows( $sql_query ); die();
$logs = @mysql_query("SELECT * from mylanb where printers like 'B1040P' and type like 'brochure' order by timecreate desc");
while($log = mysql_fetch_array( $logs )){
// Bo gio - chi lay ngay
$date = $log['timecreate'];
$createDate = date('Y-m-d', strtotime($date));

echo "<tr>";
echo "<th>". $log['filename']. "</th>";
echo "<th>". $log['type']. "</th>";
echo "<th><a href=\"http://rynantech.com/partner-login/mylanbclick.php?id=".$log['id']."\"><img src='http://www.rynantech.com/partner-login/sites/images/dl.png".$row['image_name']."'></a></th>";
echo "<th>". $log['notes']. "</th>";
echo "<th>". $log['views']. "</th>";
echo "<th>". $createDate. "</th>";
echo "<th><a href=\"mylanbedit.php?id=$log[id]\"><img src='http://www.rynantech.com/partner-login/sites/images/edit.png".$row['image_name']."'></a></th>";
echo "<th><a href=\"mylanbdel.php?id=$log[id]\" onclick=\"return makesure();\"><img src='http://www.rynantech.com/partner-login/sites/images/delete.png".$row['image_name']."'></a></th>";
//echo "<td>". $log['id']. "</td>";
//echo "<td>". $log['printers']. "</td>";
//echo "<td>". $log['link']. "</td>";
//echo "<td>". $log['lastupdate']. "</td>";
//echo "<td>". $log['views']. "</td>";
//echo "<td><a href=\"http://rynantech.com/partner-login/mylanb/VJET/$log[link]\" onclick=\"khoa();\">$log[link]</a></td>";

echo "</tr>";
}
?>

</table>
</div>




<div id="B1060-br" class="tabcontent">
<table id="tracelog1" width="909" border="0" align="center">
<?php

//echo  @mysql_num_rows( $sql_query ); die();
$logs = @mysql_query("SELECT * from mylanb where printers like 'B1060' and type like 'brochure' order by timecreate desc");
while($log = mysql_fetch_array( $logs )){
// Bo gio - chi lay ngay
$date = $log['timecreate'];
$createDate = date('Y-m-d', strtotime($date));

echo "<tr>";
echo "<th>". $log['filename']. "</th>";
echo "<th>". $log['type']. "</th>";
echo "<th><a href=\"http://rynantech.com/partner-login/mylanbclick.php?id=".$log['id']."\"><img src='http://www.rynantech.com/partner-login/sites/images/dl.png".$row['image_name']."'></a></th>";
echo "<th>". $log['notes']. "</th>";
echo "<th>". $log['views']. "</th>";
echo "<th>". $createDate. "</th>";
echo "<th><a href=\"mylanbedit.php?id=$log[id]\"><img src='http://www.rynantech.com/partner-login/sites/images/edit.png".$row['image_name']."'></a></th>";
echo "<th><a href=\"mylanbdel.php?id=$log[id]\" onclick=\"return makesure();\"><img src='http://www.rynantech.com/partner-login/sites/images/delete.png".$row['image_name']."'></a></th>";
//echo "<td>". $log['id']. "</td>";
//echo "<td>". $log['printers']. "</td>";
//echo "<td>". $log['link']. "</td>";
//echo "<td>". $log['lastupdate']. "</td>";
//echo "<td>". $log['views']. "</td>";
//echo "<td><a href=\"http://rynantech.com/partner-login/mylanb/VJET/$log[link]\" onclick=\"khoa();\">$log[link]</a></td>";

echo "</tr>";
}
?>

</table>
</div>



<div id="B1060P-br" class="tabcontent">
<table id="tracelog1" width="909" border="0" align="center">
<?php

//echo  @mysql_num_rows( $sql_query ); die();
$logs = @mysql_query("SELECT * from mylanb where printers like 'B1060P' and type like 'brochure' order by timecreate desc");
while($log = mysql_fetch_array( $logs )){
// Bo gio - chi lay ngay
$date = $log['timecreate'];
$createDate = date('Y-m-d', strtotime($date));

echo "<tr>";
echo "<th>". $log['filename']. "</th>";
echo "<th>". $log['type']. "</th>";
echo "<th><a href=\"http://rynantech.com/partner-login/mylanbclick.php?id=".$log['id']."\"><img src='http://www.rynantech.com/partner-login/sites/images/dl.png".$row['image_name']."'></a></th>";
echo "<th>". $log['notes']. "</th>";
echo "<th>". $log['views']. "</th>";
echo "<th>". $createDate. "</th>";
echo "<th><a href=\"mylanbedit.php?id=$log[id]\"><img src='http://www.rynantech.com/partner-login/sites/images/edit.png".$row['image_name']."'></a></th>";
echo "<th><a href=\"mylanbdel.php?id=$log[id]\" onclick=\"return makesure();\"><img src='http://www.rynantech.com/partner-login/sites/images/delete.png".$row['image_name']."'></a></th>";
//echo "<td>". $log['id']. "</td>";
//echo "<td>". $log['printers']. "</td>";
//echo "<td>". $log['link']. "</td>";
//echo "<td>". $log['lastupdate']. "</td>";
//echo "<td>". $log['views']. "</td>";
//echo "<td><a href=\"http://rynantech.com/partner-login/mylanb/VJET/$log[link]\" onclick=\"khoa();\">$log[link]</a></td>";

echo "</tr>";
}
?>

</table>
</div>



<div id="B1060H-br" class="tabcontent">
<table id="tracelog1" width="909" border="0" align="center">
<?php

//echo  @mysql_num_rows( $sql_query ); die();
$logs = @mysql_query("SELECT * from mylanb where printers like 'B1060H' and type like 'brochure' order by timecreate desc");
while($log = mysql_fetch_array( $logs )){
// Bo gio - chi lay ngay
$date = $log['timecreate'];
$createDate = date('Y-m-d', strtotime($date));

echo "<tr>";
echo "<th>". $log['filename']. "</th>";
echo "<th>". $log['type']. "</th>";
echo "<th><a href=\"http://rynantech.com/partner-login/mylanbclick.php?id=".$log['id']."\"><img src='http://www.rynantech.com/partner-login/sites/images/dl.png".$row['image_name']."'></a></th>";
echo "<th>". $log['notes']. "</th>";
echo "<th>". $log['views']. "</th>";
echo "<th>". $createDate. "</th>";
echo "<th><a href=\"mylanbedit.php?id=$log[id]\"><img src='http://www.rynantech.com/partner-login/sites/images/edit.png".$row['image_name']."'></a></th>";
echo "<th><a href=\"mylanbdel.php?id=$log[id]\" onclick=\"return makesure();\"><img src='http://www.rynantech.com/partner-login/sites/images/delete.png".$row['image_name']."'></a></th>";
//echo "<td>". $log['id']. "</td>";
//echo "<td>". $log['printers']. "</td>";
//echo "<td>". $log['link']. "</td>";
//echo "<td>". $log['lastupdate']. "</td>";
//echo "<td>". $log['views']. "</td>";
//echo "<td><a href=\"http://rynantech.com/partner-login/mylanb/VJET/$log[link]\" onclick=\"khoa();\">$log[link]</a></td>";

echo "</tr>";
}
?>

</table>
</div>



<div id="VJET1200-br" class="tabcontent">
<table id="tracelog1" width="909" border="0" align="center">
<?php

//echo  @mysql_num_rows( $sql_query ); die();
$logs = @mysql_query("SELECT * from mylanb where printers like 'VJET1200' and type like 'brochure' order by timecreate desc");
while($log = mysql_fetch_array( $logs )){
// Bo gio - chi lay ngay
$date = $log['timecreate'];
$createDate = date('Y-m-d', strtotime($date));

echo "<tr>";
echo "<th>". $log['filename']. "</th>";
echo "<th>". $log['type']. "</th>";
echo "<th><a href=\"http://rynantech.com/partner-login/mylanbclick.php?id=".$log['id']."\"><img src='http://www.rynantech.com/partner-login/sites/images/dl.png".$row['image_name']."'></a></th>";
echo "<th>". $log['notes']. "</th>";
echo "<th>". $log['views']. "</th>";
echo "<th>". $createDate. "</th>";
echo "<th><a href=\"mylanbedit.php?id=$log[id]\"><img src='http://www.rynantech.com/partner-login/sites/images/edit.png".$row['image_name']."'></a></th>";
echo "<th><a href=\"mylanbdel.php?id=$log[id]\" onclick=\"return makesure();\"><img src='http://www.rynantech.com/partner-login/sites/images/delete.png".$row['image_name']."'></a></th>";
//echo "<td>". $log['id']. "</td>";
//echo "<td>". $log['printers']. "</td>";
//echo "<td>". $log['link']. "</td>";
//echo "<td>". $log['lastupdate']. "</td>";
//echo "<td>". $log['views']. "</td>";
//echo "<td><a href=\"http://rynantech.com/partner-login/mylanb/VJET/$log[link]\" onclick=\"khoa();\">$log[link]</a></td>";

echo "</tr>";
}
?>

</table>
</div>
     
<div id="VJET1200e-br" class="tabcontent">
<table id="tracelog1" width="909" border="0" align="center">
<?php

//echo  @mysql_num_rows( $sql_query ); die();
$logs = @mysql_query("SELECT * from mylanb where printers like 'VJET1200e' and type like 'brochure' order by timecreate desc");
while($log = mysql_fetch_array( $logs )){
// Bo gio - chi lay ngay
$date = $log['timecreate'];
$createDate = date('Y-m-d', strtotime($date));

echo "<tr>";
echo "<th>". $log['filename']. "</th>";
echo "<th>". $log['type']. "</th>";
echo "<th><a href=\"http://rynantech.com/partner-login/mylanbclick.php?id=".$log['id']."\"><img src='http://www.rynantech.com/partner-login/sites/images/dl.png".$row['image_name']."'></a></th>";
echo "<th>". $log['notes']. "</th>";
echo "<th>". $log['views']. "</th>";
echo "<th>". $createDate. "</th>";
echo "<th><a href=\"mylanbedit.php?id=$log[id]\"><img src='http://www.rynantech.com/partner-login/sites/images/edit.png".$row['image_name']."'></a></th>";
echo "<th><a href=\"mylanbdel.php?id=$log[id]\" onclick=\"return makesure();\"><img src='http://www.rynantech.com/partner-login/sites/images/delete.png".$row['image_name']."'></a></th>";
//echo "<td>". $log['id']. "</td>";
//echo "<td>". $log['printers']. "</td>";
//echo "<td>". $log['link']. "</td>";
//echo "<td>". $log['lastupdate']. "</td>";
//echo "<td>". $log['views']. "</td>";
//echo "<td><a href=\"http://rynantech.com/partner-login/mylanb/VJET/$log[link]\" onclick=\"khoa();\">$log[link]</a></td>";

echo "</tr>";
}
?>

</table>
</div>

<div id="IOJ100-br" class="tabcontent">
<table id="tracelog1" width="909" border="0" align="center">
<?php

//echo  @mysql_num_rows( $sql_query ); die();
$logs = @mysql_query("SELECT * from mylanb where printers like 'IOJ100' and type like 'brochure' order by timecreate desc");
while($log = mysql_fetch_array( $logs )){
// Bo gio - chi lay ngay
$date = $log['timecreate'];
$createDate = date('Y-m-d', strtotime($date));

echo "<tr>";
echo "<th>". $log['filename']. "</th>";
echo "<th>". $log['type']. "</th>";
echo "<th><a href=\"http://rynantech.com/partner-login/mylanbclick.php?id=".$log['id']."\"><img src='http://www.rynantech.com/partner-login/sites/images/dl.png".$row['image_name']."'></a></th>";
echo "<th>". $log['notes']. "</th>";
echo "<th>". $log['views']. "</th>";
echo "<th>". $createDate. "</th>";
echo "<th><a href=\"mylanbedit.php?id=$log[id]\"><img src='http://www.rynantech.com/partner-login/sites/images/edit.png".$row['image_name']."'></a></th>";
echo "<th><a href=\"mylanbdel.php?id=$log[id]\" onclick=\"return makesure();\"><img src='http://www.rynantech.com/partner-login/sites/images/delete.png".$row['image_name']."'></a></th>";
//echo "<td>". $log['id']. "</td>";
//echo "<td>". $log['printers']. "</td>";
//echo "<td>". $log['link']. "</td>";
//echo "<td>". $log['lastupdate']. "</td>";
//echo "<td>". $log['views']. "</td>";
//echo "<td><a href=\"http://rynantech.com/partner-login/mylanb/VJET/$log[link]\" onclick=\"khoa();\">$log[link]</a></td>";

echo "</tr>";
}
?>

</table>
</div>

<div id="IOJ200-br" class="tabcontent">
<table id="tracelog1" width="909" border="0" align="center">
<?php

//echo  @mysql_num_rows( $sql_query ); die();
$logs = @mysql_query("SELECT * from mylanb where printers like 'IOJ200' and type like 'brochure' order by timecreate desc");
while($log = mysql_fetch_array( $logs )){
// Bo gio - chi lay ngay
$date = $log['timecreate'];
$createDate = date('Y-m-d', strtotime($date));

echo "<tr>";
echo "<th>". $log['filename']. "</th>";
echo "<th>". $log['type']. "</th>";
echo "<th><a href=\"http://rynantech.com/partner-login/mylanbclick.php?id=".$log['id']."\"><img src='http://www.rynantech.com/partner-login/sites/images/dl.png".$row['image_name']."'></a></th>";
echo "<th>". $log['notes']. "</th>";
echo "<th>". $log['views']. "</th>";
echo "<th>". $createDate. "</th>";
echo "<th><a href=\"mylanbedit.php?id=$log[id]\"><img src='http://www.rynantech.com/partner-login/sites/images/edit.png".$row['image_name']."'></a></th>";
echo "<th><a href=\"mylanbdel.php?id=$log[id]\" onclick=\"return makesure();\"><img src='http://www.rynantech.com/partner-login/sites/images/delete.png".$row['image_name']."'></a></th>";
//echo "<td>". $log['id']. "</td>";
//echo "<td>". $log['printers']. "</td>";
//echo "<td>". $log['link']. "</td>";
//echo "<td>". $log['lastupdate']. "</td>";
//echo "<td>". $log['views']. "</td>";
//echo "<td><a href=\"http://rynantech.com/partner-login/mylanb/VJET/$log[link]\" onclick=\"khoa();\">$log[link]</a></td>";

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
  <button class="tablinks" onclick="openCity(event, 'RYNAN R20-us')">RYNAN R20</button>
  <button class="tablinks" onclick="openCity(event, 'VJET1000-us')">VJET1000</button>
  <button class="tablinks" onclick="openCity(event, 'VJET1010-us')">VJET1010</button>
  <button class="tablinks" onclick="openCity(event, 'VJET1020-us')">VJET1020</button>
  <button class="tablinks" onclick="openCity(event, 'VJET1040-us')">VJET1040</button>
  <button class="tablinks" onclick="openCity(event, 'VJET1040H-us')">VJET1040H</button>
  <button class="tablinks" onclick="openCity(event, 'VJET1040He-us')">VJET1040He</button>
  <button class="tablinks" onclick="openCity(event, 'VJET1040S-us')">VJET1040S</button>
  <button class="tablinks" onclick="openCity(event, 'B1040P-us')">B1040P</button>
  <button class="tablinks" onclick="openCity(event, 'B1060-us')">B1060</button>
  <button class="tablinks" onclick="openCity(event, 'B1060P-us')">B1060P</button>
  <button class="tablinks" onclick="openCity(event, 'B1060H-us')">B1060H</button>
  <button class="tablinks" onclick="openCity(event, 'VJET1200-us')">VJET1200</button>
  <button class="tablinks" onclick="openCity(event, 'VJET1200e-us')">VJET1200e</button>
  <button class="tablinks" onclick="openCity(event, 'IOJ100-us')">IOJ100</button>
  <button class="tablinks" onclick="openCity(event, 'IOJ200-us')">IOJ200</button>
</div>

<div id="RYNAN R20-us" class="tabcontent" style="display: block;" >
<table id="tracelog1" width="909" border="0" align="center">
<?php

//echo  @mysql_num_rows( $sql_query ); die();
$logs = @mysql_query("SELECT * from mylanb where printers like 'RYNAN R20' and type like 'User Manual' order by timecreate desc");
while($log = mysql_fetch_array( $logs )){
// Bo gio - chi lay ngay
$date = $log['timecreate'];
$createDate = date('Y-m-d', strtotime($date));

echo "<tr>";
echo "<th>". $log['filename']. "</th>";
echo "<th>". $log['type']. "</th>";
echo "<th><a href=\"http://rynantech.com/partner-login/mylanbclick.php?id=".$log['id']."\"><img src='http://www.rynantech.com/partner-login/sites/images/dl.png".$row['image_name']."'></a></th>";
echo "<th>". $log['notes']. "</th>";
echo "<th>". $log['views']. "</th>";
echo "<th>". $createDate. "</th>";
echo "<th><a href=\"mylanbedit.php?id=$log[id]\"><img src='http://www.rynantech.com/partner-login/sites/images/edit.png".$row['image_name']."'></a></th>";
echo "<th><a href=\"mylanbdel.php?id=$log[id]\" onclick=\"return makesure();\"><img src='http://www.rynantech.com/partner-login/sites/images/delete.png".$row['image_name']."'></a></th>";
//echo "<td>". $log['id']. "</td>";
//echo "<td>". $log['printers']. "</td>";
//echo "<td>". $log['link']. "</td>";
//echo "<td>". $log['lastupdate']. "</td>";
//echo "<td>". $log['views']. "</td>";
//echo "<td><a href=\"http://rynantech.com/partner-login/mylanb/VJET/$log[link]\" onclick=\"khoa();\">$log[link]</a></td>";

echo "</tr>";
}
?>

</table>
</div>


<div id="VJET1000-us" class="tabcontent" style="display: block;" >
<table id="tracelog1" width="909" border="0" align="center">
<?php

//echo  @mysql_num_rows( $sql_query ); die();
$logs = @mysql_query("SELECT * from mylanb where printers like 'VJET1000' and type like 'User Manual' order by timecreate desc");
while($log = mysql_fetch_array( $logs )){
// Bo gio - chi lay ngay
$date = $log['timecreate'];
$createDate = date('Y-m-d', strtotime($date));

echo "<tr>";
echo "<th>". $log['filename']. "</th>";
echo "<th>". $log['type']. "</th>";
echo "<th><a href=\"http://rynantech.com/partner-login/mylanbclick.php?id=".$log['id']."\"><img src='http://www.rynantech.com/partner-login/sites/images/dl.png".$row['image_name']."'></a></th>";
echo "<th>". $log['notes']. "</th>";
echo "<th>". $log['views']. "</th>";
echo "<th>". $createDate. "</th>";
echo "<th><a href=\"mylanbedit.php?id=$log[id]\"><img src='http://www.rynantech.com/partner-login/sites/images/edit.png".$row['image_name']."'></a></th>";
echo "<th><a href=\"mylanbdel.php?id=$log[id]\" onclick=\"return makesure();\"><img src='http://www.rynantech.com/partner-login/sites/images/delete.png".$row['image_name']."'></a></th>";
//echo "<td>". $log['id']. "</td>";
//echo "<td>". $log['printers']. "</td>";
//echo "<td>". $log['link']. "</td>";
//echo "<td>". $log['lastupdate']. "</td>";
//echo "<td>". $log['views']. "</td>";
//echo "<td><a href=\"http://rynantech.com/partner-login/mylanb/VJET/$log[link]\" onclick=\"khoa();\">$log[link]</a></td>";

echo "</tr>";
}
?>

</table>
</div>




<div id="VJET1010-us" class="tabcontent">
<table id="tracelog1" width="909" border="0" align="center">
<?php

//echo  @mysql_num_rows( $sql_query ); die();
$logs = @mysql_query("SELECT * from mylanb where printers like 'VJET1010' and type like 'User Manual' order by timecreate desc");
while($log = mysql_fetch_array( $logs )){
// Bo gio - chi lay ngay
$date = $log['timecreate'];
$createDate = date('Y-m-d', strtotime($date));

echo "<tr>";
echo "<th>". $log['filename']. "</th>";
echo "<th>". $log['type']. "</th>";
echo "<th><a href=\"http://rynantech.com/partner-login/mylanbclick.php?id=".$log['id']."\"><img src='http://www.rynantech.com/partner-login/sites/images/dl.png".$row['image_name']."'></a></th>";
echo "<th>". $log['notes']. "</th>";
echo "<th>". $log['views']. "</th>";
echo "<th>". $createDate. "</th>";
echo "<th><a href=\"mylanbedit.php?id=$log[id]\"><img src='http://www.rynantech.com/partner-login/sites/images/edit.png".$row['image_name']."'></a></th>";
echo "<th><a href=\"mylanbdel.php?id=$log[id]\" onclick=\"return makesure();\"><img src='http://www.rynantech.com/partner-login/sites/images/delete.png".$row['image_name']."'></a></th>";
//echo "<td>". $log['id']. "</td>";
//echo "<td>". $log['printers']. "</td>";
//echo "<td>". $log['link']. "</td>";
//echo "<td>". $log['lastupdate']. "</td>";
//echo "<td>". $log['views']. "</td>";
//echo "<td><a href=\"http://rynantech.com/partner-login/mylanb/VJET/$log[link]\" onclick=\"khoa();\">$log[link]</a></td>";

echo "</tr>";
}
?>

</table>
</div>

<div id="VJET1020-us" class="tabcontent">
<table id="tracelog1" width="909" border="0" align="center">
<?php

//echo  @mysql_num_rows( $sql_query ); die();
$logs = @mysql_query("SELECT * from mylanb where printers like 'VJET1020' and type like 'User Manual' order by timecreate desc");
while($log = mysql_fetch_array( $logs )){
// Bo gio - chi lay ngay
$date = $log['timecreate'];
$createDate = date('Y-m-d', strtotime($date));

echo "<tr>";
echo "<th>". $log['filename']. "</th>";
echo "<th>". $log['type']. "</th>";
echo "<th><a href=\"http://rynantech.com/partner-login/mylanbclick.php?id=".$log['id']."\"><img src='http://www.rynantech.com/partner-login/sites/images/dl.png".$row['image_name']."'></a></th>";
echo "<th>". $log['notes']. "</th>";
echo "<th>". $log['views']. "</th>";
echo "<th>". $createDate. "</th>";
echo "<th><a href=\"mylanbedit.php?id=$log[id]\"><img src='http://www.rynantech.com/partner-login/sites/images/edit.png".$row['image_name']."'></a></th>";
echo "<th><a href=\"mylanbdel.php?id=$log[id]\" onclick=\"return makesure();\"><img src='http://www.rynantech.com/partner-login/sites/images/delete.png".$row['image_name']."'></a></th>";
//echo "<td>". $log['id']. "</td>";
//echo "<td>". $log['printers']. "</td>";
//echo "<td>". $log['link']. "</td>";
//echo "<td>". $log['lastupdate']. "</td>";
//echo "<td>". $log['views']. "</td>";
//echo "<td><a href=\"http://rynantech.com/partner-login/mylanb/VJET/$log[link]\" onclick=\"khoa();\">$log[link]</a></td>";

echo "</tr>";
}
?>

</table>
</div>




<div id="VJET1040-us" class="tabcontent">
<table id="tracelog1" width="909" border="0" align="center">
<?php

//echo  @mysql_num_rows( $sql_query ); die();
$logs = @mysql_query("SELECT * from mylanb where printers like 'VJET1040' and type like 'User Manual' order by timecreate desc");
while($log = mysql_fetch_array( $logs )){
// Bo gio - chi lay ngay
$date = $log['timecreate'];
$createDate = date('Y-m-d', strtotime($date));

echo "<tr>";
echo "<th>". $log['filename']. "</th>";
echo "<th>". $log['type']. "</th>";
echo "<th><a href=\"http://rynantech.com/partner-login/mylanbclick.php?id=".$log['id']."\"><img src='http://www.rynantech.com/partner-login/sites/images/dl.png".$row['image_name']."'></a></th>";
echo "<th>". $log['notes']. "</th>";
echo "<th>". $log['views']. "</th>";
echo "<th>". $createDate. "</th>";
echo "<th><a href=\"mylanbedit.php?id=$log[id]\"><img src='http://www.rynantech.com/partner-login/sites/images/edit.png".$row['image_name']."'></a></th>";
echo "<th><a href=\"mylanbdel.php?id=$log[id]\" onclick=\"return makesure();\"><img src='http://www.rynantech.com/partner-login/sites/images/delete.png".$row['image_name']."'></a></th>";
//echo "<td>". $log['id']. "</td>";
//echo "<td>". $log['printers']. "</td>";
//echo "<td>". $log['link']. "</td>";
//echo "<td>". $log['lastupdate']. "</td>";
//echo "<td>". $log['views']. "</td>";
//echo "<td><a href=\"http://rynantech.com/partner-login/mylanb/VJET/$log[link]\" onclick=\"khoa();\">$log[link]</a></td>";

echo "</tr>";
}
?>

</table>
</div>



<div id="VJET1040H-us" class="tabcontent">
<table id="tracelog1" width="909" border="0" align="center">
<?php

//echo  @mysql_num_rows( $sql_query ); die();
$logs = @mysql_query("SELECT * from mylanb where printers like 'VJET1040H' and type like 'User Manual' order by timecreate desc");
while($log = mysql_fetch_array( $logs )){
// Bo gio - chi lay ngay
$date = $log['timecreate'];
$createDate = date('Y-m-d', strtotime($date));

echo "<tr>";
echo "<th>". $log['filename']. "</th>";
echo "<th>". $log['type']. "</th>";
echo "<th><a href=\"http://rynantech.com/partner-login/mylanbclick.php?id=".$log['id']."\"><img src='http://www.rynantech.com/partner-login/sites/images/dl.png".$row['image_name']."'></a></th>";
echo "<th>". $log['notes']. "</th>";
echo "<th>". $log['views']. "</th>";
echo "<th>". $createDate. "</th>";
echo "<th><a href=\"mylanbedit.php?id=$log[id]\"><img src='http://www.rynantech.com/partner-login/sites/images/edit.png".$row['image_name']."'></a></th>";
echo "<th><a href=\"mylanbdel.php?id=$log[id]\" onclick=\"return makesure();\"><img src='http://www.rynantech.com/partner-login/sites/images/delete.png".$row['image_name']."'></a></th>";
//echo "<td>". $log['id']. "</td>";
//echo "<td>". $log['printers']. "</td>";
//echo "<td>". $log['link']. "</td>";
//echo "<td>". $log['lastupdate']. "</td>";
//echo "<td>". $log['views']. "</td>";
//echo "<td><a href=\"http://rynantech.com/partner-login/mylanb/VJET/$log[link]\" onclick=\"khoa();\">$log[link]</a></td>";

echo "</tr>";
}
?>

</table>
</div>



<div id="VJET1040He-us" class="tabcontent">
<table id="tracelog1" width="909" border="0" align="center">
<?php

//echo  @mysql_num_rows( $sql_query ); die();
$logs = @mysql_query("SELECT * from mylanb where printers like 'VJET1040He' and type like 'User Manual' order by timecreate desc");
while($log = mysql_fetch_array( $logs )){
// Bo gio - chi lay ngay
$date = $log['timecreate'];
$createDate = date('Y-m-d', strtotime($date));

echo "<tr>";
echo "<th>". $log['filename']. "</th>";
echo "<th>". $log['type']. "</th>";
echo "<th><a href=\"http://rynantech.com/partner-login/mylanbclick.php?id=".$log['id']."\"><img src='http://www.rynantech.com/partner-login/sites/images/dl.png".$row['image_name']."'></a></th>";
echo "<th>". $log['notes']. "</th>";
echo "<th>". $log['views']. "</th>";
echo "<th>". $createDate. "</th>";
echo "<th><a href=\"mylanbedit.php?id=$log[id]\"><img src='http://www.rynantech.com/partner-login/sites/images/edit.png".$row['image_name']."'></a></th>";
echo "<th><a href=\"mylanbdel.php?id=$log[id]\" onclick=\"return makesure();\"><img src='http://www.rynantech.com/partner-login/sites/images/delete.png".$row['image_name']."'></a></th>";
//echo "<td>". $log['id']. "</td>";
//echo "<td>". $log['printers']. "</td>";
//echo "<td>". $log['link']. "</td>";
//echo "<td>". $log['lastupdate']. "</td>";
//echo "<td>". $log['views']. "</td>";
//echo "<td><a href=\"http://rynantech.com/partner-login/mylanb/VJET/$log[link]\" onclick=\"khoa();\">$log[link]</a></td>";

echo "</tr>";
}
?>

</table>
</div>



<div id="VJET1040S-us" class="tabcontent">
<table id="tracelog1" width="909" border="0" align="center">
<?php

//echo  @mysql_num_rows( $sql_query ); die();
$logs = @mysql_query("SELECT * from mylanb where printers like 'VJET1040S' and type like 'User Manual' order by timecreate desc");
while($log = mysql_fetch_array( $logs )){
// Bo gio - chi lay ngay
$date = $log['timecreate'];
$createDate = date('Y-m-d', strtotime($date));

echo "<tr>";
echo "<th>". $log['filename']. "</th>";
echo "<th>". $log['type']. "</th>";
echo "<th><a href=\"http://rynantech.com/partner-login/mylanbclick.php?id=".$log['id']."\"><img src='http://www.rynantech.com/partner-login/sites/images/dl.png".$row['image_name']."'></a></th>";
echo "<th>". $log['notes']. "</th>";
echo "<th>". $log['views']. "</th>";
echo "<th>". $createDate. "</th>";
echo "<th><a href=\"mylanbedit.php?id=$log[id]\"><img src='http://www.rynantech.com/partner-login/sites/images/edit.png".$row['image_name']."'></a></th>";
echo "<th><a href=\"mylanbdel.php?id=$log[id]\" onclick=\"return makesure();\"><img src='http://www.rynantech.com/partner-login/sites/images/delete.png".$row['image_name']."'></a></th>";
//echo "<td>". $log['id']. "</td>";
//echo "<td>". $log['printers']. "</td>";
//echo "<td>". $log['link']. "</td>";
//echo "<td>". $log['lastupdate']. "</td>";
//echo "<td>". $log['views']. "</td>";
//echo "<td><a href=\"http://rynantech.com/partner-login/mylanb/VJET/$log[link]\" onclick=\"khoa();\">$log[link]</a></td>";

echo "</tr>";
}
?>

</table>
</div>



<div id="B1040P-us" class="tabcontent">
<table id="tracelog1" width="909" border="0" align="center">
<?php

//echo  @mysql_num_rows( $sql_query ); die();
$logs = @mysql_query("SELECT * from mylanb where printers like 'B1040P' and type like 'User Manual' order by timecreate desc");
while($log = mysql_fetch_array( $logs )){
// Bo gio - chi lay ngay
$date = $log['timecreate'];
$createDate = date('Y-m-d', strtotime($date));

echo "<tr>";
echo "<th>". $log['filename']. "</th>";
echo "<th>". $log['type']. "</th>";
echo "<th><a href=\"http://rynantech.com/partner-login/mylanbclick.php?id=".$log['id']."\"><img src='http://www.rynantech.com/partner-login/sites/images/dl.png".$row['image_name']."'></a></th>";
echo "<th>". $log['notes']. "</th>";
echo "<th>". $log['views']. "</th>";
echo "<th>". $createDate. "</th>";
echo "<th><a href=\"mylanbedit.php?id=$log[id]\"><img src='http://www.rynantech.com/partner-login/sites/images/edit.png".$row['image_name']."'></a></th>";
echo "<th><a href=\"mylanbdel.php?id=$log[id]\" onclick=\"return makesure();\"><img src='http://www.rynantech.com/partner-login/sites/images/delete.png".$row['image_name']."'></a></th>";
//echo "<td>". $log['id']. "</td>";
//echo "<td>". $log['printers']. "</td>";
//echo "<td>". $log['link']. "</td>";
//echo "<td>". $log['lastupdate']. "</td>";
//echo "<td>". $log['views']. "</td>";
//echo "<td><a href=\"http://rynantech.com/partner-login/mylanb/VJET/$log[link]\" onclick=\"khoa();\">$log[link]</a></td>";

echo "</tr>";
}
?>

</table>
</div>





<div id="B1060-us" class="tabcontent">
<table id="tracelog1" width="909" border="0" align="center">
<?php

//echo  @mysql_num_rows( $sql_query ); die();
$logs = @mysql_query("SELECT * from mylanb where printers like 'B1060' and type like 'User Manual' order by timecreate desc");
while($log = mysql_fetch_array( $logs )){
// Bo gio - chi lay ngay
$date = $log['timecreate'];
$createDate = date('Y-m-d', strtotime($date));

echo "<tr>";
echo "<th>". $log['filename']. "</th>";
echo "<th>". $log['type']. "</th>";
echo "<th><a href=\"http://rynantech.com/partner-login/mylanbclick.php?id=".$log['id']."\"><img src='http://www.rynantech.com/partner-login/sites/images/dl.png".$row['image_name']."'></a></th>";
echo "<th>". $log['notes']. "</th>";
echo "<th>". $log['views']. "</th>";
echo "<th>". $createDate. "</th>";
echo "<th><a href=\"mylanbedit.php?id=$log[id]\"><img src='http://www.rynantech.com/partner-login/sites/images/edit.png".$row['image_name']."'></a></th>";
echo "<th><a href=\"mylanbdel.php?id=$log[id]\" onclick=\"return makesure();\"><img src='http://www.rynantech.com/partner-login/sites/images/delete.png".$row['image_name']."'></a></th>";
//echo "<td>". $log['id']. "</td>";
//echo "<td>". $log['printers']. "</td>";
//echo "<td>". $log['link']. "</td>";
//echo "<td>". $log['lastupdate']. "</td>";
//echo "<td>". $log['views']. "</td>";
//echo "<td><a href=\"http://rynantech.com/partner-login/mylanb/VJET/$log[link]\" onclick=\"khoa();\">$log[link]</a></td>";

echo "</tr>";
}
?>

</table>
</div>



<div id="B1060P-us" class="tabcontent">
<table id="tracelog1" width="909" border="0" align="center">
<?php

//echo  @mysql_num_rows( $sql_query ); die();
$logs = @mysql_query("SELECT * from mylanb where printers like 'B1060P' and type like 'User Manual' order by timecreate desc");
while($log = mysql_fetch_array( $logs )){
// Bo gio - chi lay ngay
$date = $log['timecreate'];
$createDate = date('Y-m-d', strtotime($date));

echo "<tr>";
echo "<th>". $log['filename']. "</th>";
echo "<th>". $log['type']. "</th>";
echo "<th><a href=\"http://rynantech.com/partner-login/mylanbclick.php?id=".$log['id']."\"><img src='http://www.rynantech.com/partner-login/sites/images/dl.png".$row['image_name']."'></a></th>";
echo "<th>". $log['notes']. "</th>";
echo "<th>". $log['views']. "</th>";
echo "<th>". $createDate. "</th>";
echo "<th><a href=\"mylanbedit.php?id=$log[id]\"><img src='http://www.rynantech.com/partner-login/sites/images/edit.png".$row['image_name']."'></a></th>";
echo "<th><a href=\"mylanbdel.php?id=$log[id]\" onclick=\"return makesure();\"><img src='http://www.rynantech.com/partner-login/sites/images/delete.png".$row['image_name']."'></a></th>";
//echo "<td>". $log['id']. "</td>";
//echo "<td>". $log['printers']. "</td>";
//echo "<td>". $log['link']. "</td>";
//echo "<td>". $log['lastupdate']. "</td>";
//echo "<td>". $log['views']. "</td>";
//echo "<td><a href=\"http://rynantech.com/partner-login/mylanb/VJET/$log[link]\" onclick=\"khoa();\">$log[link]</a></td>";

echo "</tr>";
}
?>

</table>
</div>



<div id="B1060H-us" class="tabcontent">
<table id="tracelog1" width="909" border="0" align="center">
<?php

//echo  @mysql_num_rows( $sql_query ); die();
$logs = @mysql_query("SELECT * from mylanb where printers like 'B1060H' and type like 'User Manual' order by timecreate desc");
while($log = mysql_fetch_array( $logs )){
// Bo gio - chi lay ngay
$date = $log['timecreate'];
$createDate = date('Y-m-d', strtotime($date));

echo "<tr>";
echo "<th>". $log['filename']. "</th>";
echo "<th>". $log['type']. "</th>";
echo "<th><a href=\"http://rynantech.com/partner-login/mylanbclick.php?id=".$log['id']."\"><img src='http://www.rynantech.com/partner-login/sites/images/dl.png".$row['image_name']."'></a></th>";
echo "<th>". $log['notes']. "</th>";
echo "<th>". $log['views']. "</th>";
echo "<th>". $createDate. "</th>";
echo "<th><a href=\"mylanbedit.php?id=$log[id]\"><img src='http://www.rynantech.com/partner-login/sites/images/edit.png".$row['image_name']."'></a></th>";
echo "<th><a href=\"mylanbdel.php?id=$log[id]\" onclick=\"return makesure();\"><img src='http://www.rynantech.com/partner-login/sites/images/delete.png".$row['image_name']."'></a></th>";
//echo "<td>". $log['id']. "</td>";
//echo "<td>". $log['printers']. "</td>";
//echo "<td>". $log['link']. "</td>";
//echo "<td>". $log['lastupdate']. "</td>";
//echo "<td>". $log['views']. "</td>";
//echo "<td><a href=\"http://rynantech.com/partner-login/mylanb/VJET/$log[link]\" onclick=\"khoa();\">$log[link]</a></td>";

echo "</tr>";
}
?>

</table>
</div>




<div id="VJET1200-us" class="tabcontent">
<table id="tracelog1" width="909" border="0" align="center">
<?php

//echo  @mysql_num_rows( $sql_query ); die();
$logs = @mysql_query("SELECT * from mylanb where printers like 'VJET1200' and type like 'User Manual' order by timecreate desc");
while($log = mysql_fetch_array( $logs )){
// Bo gio - chi lay ngay
$date = $log['timecreate'];
$createDate = date('Y-m-d', strtotime($date));

echo "<tr>";
echo "<th>". $log['filename']. "</th>";
echo "<th>". $log['type']. "</th>";
echo "<th><a href=\"http://rynantech.com/partner-login/mylanbclick.php?id=".$log['id']."\"><img src='http://www.rynantech.com/partner-login/sites/images/dl.png".$row['image_name']."'></a></th>";
echo "<th>". $log['notes']. "</th>";
echo "<th>". $log['views']. "</th>";
echo "<th>". $createDate. "</th>";
echo "<th><a href=\"mylanbedit.php?id=$log[id]\"><img src='http://www.rynantech.com/partner-login/sites/images/edit.png".$row['image_name']."'></a></th>";
echo "<th><a href=\"mylanbdel.php?id=$log[id]\" onclick=\"return makesure();\"><img src='http://www.rynantech.com/partner-login/sites/images/delete.png".$row['image_name']."'></a></th>";
//echo "<td>". $log['id']. "</td>";
//echo "<td>". $log['printers']. "</td>";
//echo "<td>". $log['link']. "</td>";
//echo "<td>". $log['lastupdate']. "</td>";
//echo "<td>". $log['views']. "</td>";
//echo "<td><a href=\"http://rynantech.com/partner-login/mylanb/VJET/$log[link]\" onclick=\"khoa();\">$log[link]</a></td>";

echo "</tr>";
}
?>

</table>
</div>
     
<div id="VJET1200e-us" class="tabcontent">
<table id="tracelog1" width="909" border="0" align="center">
<?php

//echo  @mysql_num_rows( $sql_query ); die();
$logs = @mysql_query("SELECT * from mylanb where printers like 'VJET1200e' and type like 'User Manual' order by timecreate desc");
while($log = mysql_fetch_array( $logs )){
// Bo gio - chi lay ngay
$date = $log['timecreate'];
$createDate = date('Y-m-d', strtotime($date));

echo "<tr>";
echo "<th>". $log['filename']. "</th>";
echo "<th>". $log['type']. "</th>";
echo "<th><a href=\"http://rynantech.com/partner-login/mylanbclick.php?id=".$log['id']."\"><img src='http://www.rynantech.com/partner-login/sites/images/dl.png".$row['image_name']."'></a></th>";
echo "<th>". $log['notes']. "</th>";
echo "<th>". $log['views']. "</th>";
echo "<th>". $createDate. "</th>";
echo "<th><a href=\"mylanbedit.php?id=$log[id]\"><img src='http://www.rynantech.com/partner-login/sites/images/edit.png".$row['image_name']."'></a></th>";
echo "<th><a href=\"mylanbdel.php?id=$log[id]\" onclick=\"return makesure();\"><img src='http://www.rynantech.com/partner-login/sites/images/delete.png".$row['image_name']."'></a></th>";
//echo "<td>". $log['id']. "</td>";
//echo "<td>". $log['printers']. "</td>";
//echo "<td>". $log['link']. "</td>";
//echo "<td>". $log['lastupdate']. "</td>";
//echo "<td>". $log['views']. "</td>";
//echo "<td><a href=\"http://rynantech.com/partner-login/mylanb/VJET/$log[link]\" onclick=\"khoa();\">$log[link]</a></td>";

echo "</tr>";
}
?>

</table>

</div>
     
<div id="IOJ100-us" class="tabcontent">
<table id="tracelog1" width="909" border="0" align="center">
<?php

//echo  @mysql_num_rows( $sql_query ); die();
$logs = @mysql_query("SELECT * from mylanb where printers like 'IOJ100' and type like 'User Manual' order by timecreate desc");
while($log = mysql_fetch_array( $logs )){
// Bo gio - chi lay ngay
$date = $log['timecreate'];
$createDate = date('Y-m-d', strtotime($date));

echo "<tr>";
echo "<th>". $log['filename']. "</th>";
echo "<th>". $log['type']. "</th>";
echo "<th><a href=\"http://rynantech.com/partner-login/mylanbclick.php?id=".$log['id']."\"><img src='http://www.rynantech.com/partner-login/sites/images/dl.png".$row['image_name']."'></a></th>";
echo "<th>". $log['notes']. "</th>";
echo "<th>". $log['views']. "</th>";
echo "<th>". $createDate. "</th>";
echo "<th><a href=\"mylanbedit.php?id=$log[id]\"><img src='http://www.rynantech.com/partner-login/sites/images/edit.png".$row['image_name']."'></a></th>";
echo "<th><a href=\"mylanbdel.php?id=$log[id]\" onclick=\"return makesure();\"><img src='http://www.rynantech.com/partner-login/sites/images/delete.png".$row['image_name']."'></a></th>";
//echo "<td>". $log['id']. "</td>";
//echo "<td>". $log['printers']. "</td>";
//echo "<td>". $log['link']. "</td>";
//echo "<td>". $log['lastupdate']. "</td>";
//echo "<td>". $log['views']. "</td>";
//echo "<td><a href=\"http://rynantech.com/partner-login/mylanb/VJET/$log[link]\" onclick=\"khoa();\">$log[link]</a></td>";

echo "</tr>";
}
?>

</table>

</div>
     
<div id="IOJ200-us" class="tabcontent">
<table id="tracelog1" width="909" border="0" align="center">
<?php

//echo  @mysql_num_rows( $sql_query ); die();
$logs = @mysql_query("SELECT * from mylanb where printers like 'IOJ200' and type like 'User Manual' order by timecreate desc");
while($log = mysql_fetch_array( $logs )){
// Bo gio - chi lay ngay
$date = $log['timecreate'];
$createDate = date('Y-m-d', strtotime($date));

echo "<tr>";
echo "<th>". $log['filename']. "</th>";
echo "<th>". $log['type']. "</th>";
echo "<th><a href=\"http://rynantech.com/partner-login/mylanbclick.php?id=".$log['id']."\"><img src='http://www.rynantech.com/partner-login/sites/images/dl.png".$row['image_name']."'></a></th>";
echo "<th>". $log['notes']. "</th>";
echo "<th>". $log['views']. "</th>";
echo "<th>". $createDate. "</th>";
echo "<th><a href=\"mylanbedit.php?id=$log[id]\"><img src='http://www.rynantech.com/partner-login/sites/images/edit.png".$row['image_name']."'></a></th>";
echo "<th><a href=\"mylanbdel.php?id=$log[id]\" onclick=\"return makesure();\"><img src='http://www.rynantech.com/partner-login/sites/images/delete.png".$row['image_name']."'></a></th>";
//echo "<td>". $log['id']. "</td>";
//echo "<td>". $log['printers']. "</td>";
//echo "<td>". $log['link']. "</td>";
//echo "<td>". $log['lastupdate']. "</td>";
//echo "<td>". $log['views']. "</td>";
//echo "<td><a href=\"http://rynantech.com/partner-login/mylanb/VJET/$log[link]\" onclick=\"khoa();\">$log[link]</a></td>";

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
  <button class="tablinks" onclick="openCity(event, 'RYNAN R20-qg')">RYNAN R20</button>
  <button class="tablinks" onclick="openCity(event, 'VJET1000-qg')">VJET1000</button>
  <button class="tablinks" onclick="openCity(event, 'VJET1010-qg')">VJET1010</button>
  <button class="tablinks" onclick="openCity(event, 'VJET1020-qg')">VJET1020</button>
  <button class="tablinks" onclick="openCity(event, 'VJET1040-qg')">VJET1040</button>
  <button class="tablinks" onclick="openCity(event, 'VJET1040H-qg')">VJET1040H</button>
  <button class="tablinks" onclick="openCity(event, 'VJET1040He-qg')">VJET1040He</button>
  <button class="tablinks" onclick="openCity(event, 'VJET1040S-qg')">VJET1040S</button>
  <button class="tablinks" onclick="openCity(event, 'B1040P-qg')">B1040P</button>
  <button class="tablinks" onclick="openCity(event, 'B1060-qg')">B1060</button>
  <button class="tablinks" onclick="openCity(event, 'B1060P-qg')">B1060P</button>
  <button class="tablinks" onclick="openCity(event, 'B1060H-qg')">B1060H</button>
  <button class="tablinks" onclick="openCity(event, 'VJET1200-qg')">VJET1200</button>
  <button class="tablinks" onclick="openCity(event, 'VJET1200e-qg')">VJET1200e</button>
  <button class="tablinks" onclick="openCity(event, 'IOJ100-qg')">IOJ100</button>
  <button class="tablinks" onclick="openCity(event, 'IOJ200-qg')">IOJ200</button>
</div>

<div id="RYNAN R20-qg" class="tabcontent" style="display: block;" >
<table id="tracelog1" width="909" border="0" align="center">
<?php

//echo  @mysql_num_rows( $sql_query ); die();
$logs = @mysql_query("SELECT * from mylanb where printers like 'RYNAN R20' and type like 'Quick Guide' order by timecreate desc");
while($log = mysql_fetch_array( $logs )){
// Bo gio - chi lay ngay
$date = $log['timecreate'];
$createDate = date('Y-m-d', strtotime($date));

echo "<tr>";
echo "<th>". $log['filename']. "</th>";
echo "<th>". $log['type']. "</th>";
echo "<th><a href=\"http://rynantech.com/partner-login/mylanbclick.php?id=".$log['id']."\"><img src='http://www.rynantech.com/partner-login/sites/images/dl.png".$row['image_name']."'></a></th>";
echo "<th>". $log['notes']. "</th>";
echo "<th>". $log['views']. "</th>";
echo "<th>". $createDate. "</th>";
echo "<th><a href=\"mylanbedit.php?id=$log[id]\"><img src='http://www.rynantech.com/partner-login/sites/images/edit.png".$row['image_name']."'></a></th>";
echo "<th><a href=\"mylanbdel.php?id=$log[id]\" onclick=\"return makesure();\"><img src='http://www.rynantech.com/partner-login/sites/images/delete.png".$row['image_name']."'></a></th>";
//echo "<td>". $log['id']. "</td>";
//echo "<td>". $log['printers']. "</td>";
//echo "<td>". $log['link']. "</td>";
//echo "<td>". $log['lastupdate']. "</td>";
//echo "<td>". $log['views']. "</td>";
//echo "<td><a href=\"http://rynantech.com/partner-login/mylanb/VJET/$log[link]\" onclick=\"khoa();\">$log[link]</a></td>";

echo "</tr>";
}
?>

</table>
</div>


<div id="VJET1000-qg" class="tabcontent" style="display: block;" >
<table id="tracelog1" width="909" border="0" align="center">
<?php

//echo  @mysql_num_rows( $sql_query ); die();
$logs = @mysql_query("SELECT * from mylanb where printers like 'VJET1000' and type like 'Quick Guide' order by timecreate desc");
while($log = mysql_fetch_array( $logs )){
// Bo gio - chi lay ngay
$date = $log['timecreate'];
$createDate = date('Y-m-d', strtotime($date));

echo "<tr>";
echo "<th>". $log['filename']. "</th>";
echo "<th>". $log['type']. "</th>";
echo "<th><a href=\"http://rynantech.com/partner-login/mylanbclick.php?id=".$log['id']."\"><img src='http://www.rynantech.com/partner-login/sites/images/dl.png".$row['image_name']."'></a></th>";
echo "<th>". $log['notes']. "</th>";
echo "<th>". $log['views']. "</th>";
echo "<th>". $createDate. "</th>";
echo "<th><a href=\"mylanbedit.php?id=$log[id]\"><img src='http://www.rynantech.com/partner-login/sites/images/edit.png".$row['image_name']."'></a></th>";
echo "<th><a href=\"mylanbdel.php?id=$log[id]\" onclick=\"return makesure();\"><img src='http://www.rynantech.com/partner-login/sites/images/delete.png".$row['image_name']."'></a></th>";
//echo "<td>". $log['id']. "</td>";
//echo "<td>". $log['printers']. "</td>";
//echo "<td>". $log['link']. "</td>";
//echo "<td>". $log['lastupdate']. "</td>";
//echo "<td>". $log['views']. "</td>";
//echo "<td><a href=\"http://rynantech.com/partner-login/mylanb/VJET/$log[link]\" onclick=\"khoa();\">$log[link]</a></td>";

echo "</tr>";
}
?>

</table>
</div>




<div id="VJET1010-qg" class="tabcontent">
<table id="tracelog1" width="909" border="0" align="center">
<?php

//echo  @mysql_num_rows( $sql_query ); die();
$logs = @mysql_query("SELECT * from mylanb where printers like 'VJET1010' and type like 'Quick Guide' order by timecreate desc");
while($log = mysql_fetch_array( $logs )){
// Bo gio - chi lay ngay
$date = $log['timecreate'];
$createDate = date('Y-m-d', strtotime($date));

echo "<tr>";
echo "<th>". $log['filename']. "</th>";
echo "<th>". $log['type']. "</th>";
echo "<th><a href=\"http://rynantech.com/partner-login/mylanbclick.php?id=".$log['id']."\"><img src='http://www.rynantech.com/partner-login/sites/images/dl.png".$row['image_name']."'></a></th>";
echo "<th>". $log['notes']. "</th>";
echo "<th>". $log['views']. "</th>";
echo "<th>". $createDate. "</th>";
echo "<th><a href=\"mylanbedit.php?id=$log[id]\"><img src='http://www.rynantech.com/partner-login/sites/images/edit.png".$row['image_name']."'></a></th>";
echo "<th><a href=\"mylanbdel.php?id=$log[id]\" onclick=\"return makesure();\"><img src='http://www.rynantech.com/partner-login/sites/images/delete.png".$row['image_name']."'></a></th>";
//echo "<td>". $log['id']. "</td>";
//echo "<td>". $log['printers']. "</td>";
//echo "<td>". $log['link']. "</td>";
//echo "<td>". $log['lastupdate']. "</td>";
//echo "<td>". $log['views']. "</td>";
//echo "<td><a href=\"http://rynantech.com/partner-login/mylanb/VJET/$log[link]\" onclick=\"khoa();\">$log[link]</a></td>";

echo "</tr>";
}
?>

</table>
</div>

<div id="VJET1020-qg" class="tabcontent">
<table id="tracelog1" width="909" border="0" align="center">
<?php

//echo  @mysql_num_rows( $sql_query ); die();
$logs = @mysql_query("SELECT * from mylanb where printers like 'VJET1020' and type like 'Quick Guide' order by timecreate desc");
while($log = mysql_fetch_array( $logs )){
// Bo gio - chi lay ngay
$date = $log['timecreate'];
$createDate = date('Y-m-d', strtotime($date));

echo "<tr>";
echo "<th>". $log['filename']. "</th>";
echo "<th>". $log['type']. "</th>";
echo "<th><a href=\"http://rynantech.com/partner-login/mylanbclick.php?id=".$log['id']."\"><img src='http://www.rynantech.com/partner-login/sites/images/dl.png".$row['image_name']."'></a></th>";
echo "<th>". $log['notes']. "</th>";
echo "<th>". $log['views']. "</th>";
echo "<th>". $createDate. "</th>";
echo "<th><a href=\"mylanbedit.php?id=$log[id]\"><img src='http://www.rynantech.com/partner-login/sites/images/edit.png".$row['image_name']."'></a></th>";
echo "<th><a href=\"mylanbdel.php?id=$log[id]\" onclick=\"return makesure();\"><img src='http://www.rynantech.com/partner-login/sites/images/delete.png".$row['image_name']."'></a></th>";
//echo "<td>". $log['id']. "</td>";
//echo "<td>". $log['printers']. "</td>";
//echo "<td>". $log['link']. "</td>";
//echo "<td>". $log['lastupdate']. "</td>";
//echo "<td>". $log['views']. "</td>";
//echo "<td><a href=\"http://rynantech.com/partner-login/mylanb/VJET/$log[link]\" onclick=\"khoa();\">$log[link]</a></td>";

echo "</tr>";
}
?>

</table>
</div>




<div id="VJET1040-qg" class="tabcontent">
<table id="tracelog1" width="909" border="0" align="center">
<?php

//echo  @mysql_num_rows( $sql_query ); die();
$logs = @mysql_query("SELECT * from mylanb where printers like 'VJET1040' and type like 'Quick Guide' order by timecreate desc");
while($log = mysql_fetch_array( $logs )){
// Bo gio - chi lay ngay
$date = $log['timecreate'];
$createDate = date('Y-m-d', strtotime($date));

echo "<tr>";
echo "<th>". $log['filename']. "</th>";
echo "<th>". $log['type']. "</th>";
echo "<th><a href=\"http://rynantech.com/partner-login/mylanbclick.php?id=".$log['id']."\"><img src='http://www.rynantech.com/partner-login/sites/images/dl.png".$row['image_name']."'></a></th>";
echo "<th>". $log['notes']. "</th>";
echo "<th>". $log['views']. "</th>";
echo "<th>". $createDate. "</th>";
echo "<th><a href=\"mylanbedit.php?id=$log[id]\"><img src='http://www.rynantech.com/partner-login/sites/images/edit.png".$row['image_name']."'></a></th>";
echo "<th><a href=\"mylanbdel.php?id=$log[id]\" onclick=\"return makesure();\"><img src='http://www.rynantech.com/partner-login/sites/images/delete.png".$row['image_name']."'></a></th>";
//echo "<td>". $log['id']. "</td>";
//echo "<td>". $log['printers']. "</td>";
//echo "<td>". $log['link']. "</td>";
//echo "<td>". $log['lastupdate']. "</td>";
//echo "<td>". $log['views']. "</td>";
//echo "<td><a href=\"http://rynantech.com/partner-login/mylanb/VJET/$log[link]\" onclick=\"khoa();\">$log[link]</a></td>";

echo "</tr>";
}
?>

</table>
</div>



<div id="VJET1040H-qg" class="tabcontent">
<table id="tracelog1" width="909" border="0" align="center">
<?php

//echo  @mysql_num_rows( $sql_query ); die();
$logs = @mysql_query("SELECT * from mylanb where printers like 'VJET1040H' and type like 'Quick Guide' order by timecreate desc");
while($log = mysql_fetch_array( $logs )){
// Bo gio - chi lay ngay
$date = $log['timecreate'];
$createDate = date('Y-m-d', strtotime($date));

echo "<tr>";
echo "<th>". $log['filename']. "</th>";
echo "<th>". $log['type']. "</th>";
echo "<th><a href=\"http://rynantech.com/partner-login/mylanbclick.php?id=".$log['id']."\"><img src='http://www.rynantech.com/partner-login/sites/images/dl.png".$row['image_name']."'></a></th>";
echo "<th>". $log['notes']. "</th>";
echo "<th>". $log['views']. "</th>";
echo "<th>". $createDate. "</th>";
echo "<th><a href=\"mylanbedit.php?id=$log[id]\"><img src='http://www.rynantech.com/partner-login/sites/images/edit.png".$row['image_name']."'></a></th>";
echo "<th><a href=\"mylanbdel.php?id=$log[id]\" onclick=\"return makesure();\"><img src='http://www.rynantech.com/partner-login/sites/images/delete.png".$row['image_name']."'></a></th>";
//echo "<td>". $log['id']. "</td>";
//echo "<td>". $log['printers']. "</td>";
//echo "<td>". $log['link']. "</td>";
//echo "<td>". $log['lastupdate']. "</td>";
//echo "<td>". $log['views']. "</td>";
//echo "<td><a href=\"http://rynantech.com/partner-login/mylanb/VJET/$log[link]\" onclick=\"khoa();\">$log[link]</a></td>";

echo "</tr>";
}
?>

</table>
</div>



<div id="VJET1040He-qg" class="tabcontent">
<table id="tracelog1" width="909" border="0" align="center">
<?php

//echo  @mysql_num_rows( $sql_query ); die();
$logs = @mysql_query("SELECT * from mylanb where printers like 'VJET1040He' and type like 'Quick Guide' order by timecreate desc");
while($log = mysql_fetch_array( $logs )){
// Bo gio - chi lay ngay
$date = $log['timecreate'];
$createDate = date('Y-m-d', strtotime($date));

echo "<tr>";
echo "<th>". $log['filename']. "</th>";
echo "<th>". $log['type']. "</th>";
echo "<th><a href=\"http://rynantech.com/partner-login/mylanbclick.php?id=".$log['id']."\"><img src='http://www.rynantech.com/partner-login/sites/images/dl.png".$row['image_name']."'></a></th>";
echo "<th>". $log['notes']. "</th>";
echo "<th>". $log['views']. "</th>";
echo "<th>". $createDate. "</th>";
echo "<th><a href=\"mylanbedit.php?id=$log[id]\"><img src='http://www.rynantech.com/partner-login/sites/images/edit.png".$row['image_name']."'></a></th>";
echo "<th><a href=\"mylanbdel.php?id=$log[id]\" onclick=\"return makesure();\"><img src='http://www.rynantech.com/partner-login/sites/images/delete.png".$row['image_name']."'></a></th>";
//echo "<td>". $log['id']. "</td>";
//echo "<td>". $log['printers']. "</td>";
//echo "<td>". $log['link']. "</td>";
//echo "<td>". $log['lastupdate']. "</td>";
//echo "<td>". $log['views']. "</td>";
//echo "<td><a href=\"http://rynantech.com/partner-login/mylanb/VJET/$log[link]\" onclick=\"khoa();\">$log[link]</a></td>";

echo "</tr>";
}
?>

</table>
</div>



<div id="VJET1040S-qg" class="tabcontent">
<table id="tracelog1" width="909" border="0" align="center">
<?php

//echo  @mysql_num_rows( $sql_query ); die();
$logs = @mysql_query("SELECT * from mylanb where printers like 'VJET1040S' and type like 'Quick Guide' order by timecreate desc");
while($log = mysql_fetch_array( $logs )){
// Bo gio - chi lay ngay
$date = $log['timecreate'];
$createDate = date('Y-m-d', strtotime($date));

echo "<tr>";
echo "<th>". $log['filename']. "</th>";
echo "<th>". $log['type']. "</th>";
echo "<th><a href=\"http://rynantech.com/partner-login/mylanbclick.php?id=".$log['id']."\"><img src='http://www.rynantech.com/partner-login/sites/images/dl.png".$row['image_name']."'></a></th>";
echo "<th>". $log['notes']. "</th>";
echo "<th>". $log['views']. "</th>";
echo "<th>". $createDate. "</th>";
echo "<th><a href=\"mylanbedit.php?id=$log[id]\"><img src='http://www.rynantech.com/partner-login/sites/images/edit.png".$row['image_name']."'></a></th>";
echo "<th><a href=\"mylanbdel.php?id=$log[id]\" onclick=\"return makesure();\"><img src='http://www.rynantech.com/partner-login/sites/images/delete.png".$row['image_name']."'></a></th>";
//echo "<td>". $log['id']. "</td>";
//echo "<td>". $log['printers']. "</td>";
//echo "<td>". $log['link']. "</td>";
//echo "<td>". $log['lastupdate']. "</td>";
//echo "<td>". $log['views']. "</td>";
//echo "<td><a href=\"http://rynantech.com/partner-login/mylanb/VJET/$log[link]\" onclick=\"khoa();\">$log[link]</a></td>";

echo "</tr>";
}
?>

</table>
</div>



<div id="B1040P-qg" class="tabcontent">
<table id="tracelog1" width="909" border="0" align="center">
<?php

//echo  @mysql_num_rows( $sql_query ); die();
$logs = @mysql_query("SELECT * from mylanb where printers like 'B1040P' and type like 'Quick Guide' order by timecreate desc");
while($log = mysql_fetch_array( $logs )){
// Bo gio - chi lay ngay
$date = $log['timecreate'];
$createDate = date('Y-m-d', strtotime($date));

echo "<tr>";
echo "<th>". $log['filename']. "</th>";
echo "<th>". $log['type']. "</th>";
echo "<th><a href=\"http://rynantech.com/partner-login/mylanbclick.php?id=".$log['id']."\"><img src='http://www.rynantech.com/partner-login/sites/images/dl.png".$row['image_name']."'></a></th>";
echo "<th>". $log['notes']. "</th>";
echo "<th>". $log['views']. "</th>";
echo "<th>". $createDate. "</th>";
echo "<th><a href=\"mylanbedit.php?id=$log[id]\"><img src='http://www.rynantech.com/partner-login/sites/images/edit.png".$row['image_name']."'></a></th>";
echo "<th><a href=\"mylanbdel.php?id=$log[id]\" onclick=\"return makesure();\"><img src='http://www.rynantech.com/partner-login/sites/images/delete.png".$row['image_name']."'></a></th>";
//echo "<td>". $log['id']. "</td>";
//echo "<td>". $log['printers']. "</td>";
//echo "<td>". $log['link']. "</td>";
//echo "<td>". $log['lastupdate']. "</td>";
//echo "<td>". $log['views']. "</td>";
//echo "<td><a href=\"http://rynantech.com/partner-login/mylanb/VJET/$log[link]\" onclick=\"khoa();\">$log[link]</a></td>";

echo "</tr>";
}
?>

</table>
</div>





<div id="B1060-qg" class="tabcontent">
<table id="tracelog1" width="909" border="0" align="center">
<?php

//echo  @mysql_num_rows( $sql_query ); die();
$logs = @mysql_query("SELECT * from mylanb where printers like 'B1060' and type like 'Quick Guide' order by timecreate desc");
while($log = mysql_fetch_array( $logs )){
// Bo gio - chi lay ngay
$date = $log['timecreate'];
$createDate = date('Y-m-d', strtotime($date));

echo "<tr>";
echo "<th>". $log['filename']. "</th>";
echo "<th>". $log['type']. "</th>";
echo "<th><a href=\"http://rynantech.com/partner-login/mylanbclick.php?id=".$log['id']."\"><img src='http://www.rynantech.com/partner-login/sites/images/dl.png".$row['image_name']."'></a></th>";
echo "<th>". $log['notes']. "</th>";
echo "<th>". $log['views']. "</th>";
echo "<th>". $createDate. "</th>";
echo "<th><a href=\"mylanbedit.php?id=$log[id]\"><img src='http://www.rynantech.com/partner-login/sites/images/edit.png".$row['image_name']."'></a></th>";
echo "<th><a href=\"mylanbdel.php?id=$log[id]\" onclick=\"return makesure();\"><img src='http://www.rynantech.com/partner-login/sites/images/delete.png".$row['image_name']."'></a></th>";
//echo "<td>". $log['id']. "</td>";
//echo "<td>". $log['printers']. "</td>";
//echo "<td>". $log['link']. "</td>";
//echo "<td>". $log['lastupdate']. "</td>";
//echo "<td>". $log['views']. "</td>";
//echo "<td><a href=\"http://rynantech.com/partner-login/mylanb/VJET/$log[link]\" onclick=\"khoa();\">$log[link]</a></td>";

echo "</tr>";
}
?>

</table>
</div>



<div id="B1060P-qg" class="tabcontent">
<table id="tracelog1" width="909" border="0" align="center">
<?php

//echo  @mysql_num_rows( $sql_query ); die();
$logs = @mysql_query("SELECT * from mylanb where printers like 'B1060P' and type like 'Quick Guide' order by timecreate desc");
while($log = mysql_fetch_array( $logs )){
// Bo gio - chi lay ngay
$date = $log['timecreate'];
$createDate = date('Y-m-d', strtotime($date));

echo "<tr>";
echo "<th>". $log['filename']. "</th>";
echo "<th>". $log['type']. "</th>";
echo "<th><a href=\"http://rynantech.com/partner-login/mylanbclick.php?id=".$log['id']."\"><img src='http://www.rynantech.com/partner-login/sites/images/dl.png".$row['image_name']."'></a></th>";
echo "<th>". $log['notes']. "</th>";
echo "<th>". $log['views']. "</th>";
echo "<th>". $createDate. "</th>";
echo "<th><a href=\"mylanbedit.php?id=$log[id]\"><img src='http://www.rynantech.com/partner-login/sites/images/edit.png".$row['image_name']."'></a></th>";
echo "<th><a href=\"mylanbdel.php?id=$log[id]\" onclick=\"return makesure();\"><img src='http://www.rynantech.com/partner-login/sites/images/delete.png".$row['image_name']."'></a></th>";
//echo "<td>". $log['id']. "</td>";
//echo "<td>". $log['printers']. "</td>";
//echo "<td>". $log['link']. "</td>";
//echo "<td>". $log['lastupdate']. "</td>";
//echo "<td>". $log['views']. "</td>";
//echo "<td><a href=\"http://rynantech.com/partner-login/mylanb/VJET/$log[link]\" onclick=\"khoa();\">$log[link]</a></td>";

echo "</tr>";
}
?>

</table>
</div>



<div id="B1060H-qg" class="tabcontent">
<table id="tracelog1" width="909" border="0" align="center">
<?php

//echo  @mysql_num_rows( $sql_query ); die();
$logs = @mysql_query("SELECT * from mylanb where printers like 'B1060H' and type like 'Quick Guide' order by timecreate desc");
while($log = mysql_fetch_array( $logs )){
// Bo gio - chi lay ngay
$date = $log['timecreate'];
$createDate = date('Y-m-d', strtotime($date));

echo "<tr>";
echo "<th>". $log['filename']. "</th>";
echo "<th>". $log['type']. "</th>";
echo "<th><a href=\"http://rynantech.com/partner-login/mylanbclick.php?id=".$log['id']."\"><img src='http://www.rynantech.com/partner-login/sites/images/dl.png".$row['image_name']."'></a></th>";
echo "<th>". $log['notes']. "</th>";
echo "<th>". $log['views']. "</th>";
echo "<th>". $createDate. "</th>";
echo "<th><a href=\"mylanbedit.php?id=$log[id]\"><img src='http://www.rynantech.com/partner-login/sites/images/edit.png".$row['image_name']."'></a></th>";
echo "<th><a href=\"mylanbdel.php?id=$log[id]\" onclick=\"return makesure();\"><img src='http://www.rynantech.com/partner-login/sites/images/delete.png".$row['image_name']."'></a></th>";
//echo "<td>". $log['id']. "</td>";
//echo "<td>". $log['printers']. "</td>";
//echo "<td>". $log['link']. "</td>";
//echo "<td>". $log['lastupdate']. "</td>";
//echo "<td>". $log['views']. "</td>";
//echo "<td><a href=\"http://rynantech.com/partner-login/mylanb/VJET/$log[link]\" onclick=\"khoa();\">$log[link]</a></td>";

echo "</tr>";
}
?>

</table>
</div>




<div id="VJET1200-qg" class="tabcontent">
<table id="tracelog1" width="909" border="0" align="center">
<?php

//echo  @mysql_num_rows( $sql_query ); die();
$logs = @mysql_query("SELECT * from mylanb where printers like 'VJET1200' and type like 'Quick Guide' order by timecreate desc");
while($log = mysql_fetch_array( $logs )){
// Bo gio - chi lay ngay
$date = $log['timecreate'];
$createDate = date('Y-m-d', strtotime($date));

echo "<tr>";
echo "<th>". $log['filename']. "</th>";
echo "<th>". $log['type']. "</th>";
echo "<th><a href=\"http://rynantech.com/partner-login/mylanbclick.php?id=".$log['id']."\"><img src='http://www.rynantech.com/partner-login/sites/images/dl.png".$row['image_name']."'></a></th>";
echo "<th>". $log['notes']. "</th>";
echo "<th>". $log['views']. "</th>";
echo "<th>". $createDate. "</th>";
echo "<th><a href=\"mylanbedit.php?id=$log[id]\"><img src='http://www.rynantech.com/partner-login/sites/images/edit.png".$row['image_name']."'></a></th>";
echo "<th><a href=\"mylanbdel.php?id=$log[id]\" onclick=\"return makesure();\"><img src='http://www.rynantech.com/partner-login/sites/images/delete.png".$row['image_name']."'></a></th>";
//echo "<td>". $log['id']. "</td>";
//echo "<td>". $log['printers']. "</td>";
//echo "<td>". $log['link']. "</td>";
//echo "<td>". $log['lastupdate']. "</td>";
//echo "<td>". $log['views']. "</td>";
//echo "<td><a href=\"http://rynantech.com/partner-login/mylanb/VJET/$log[link]\" onclick=\"khoa();\">$log[link]</a></td>";

echo "</tr>";
}
?>

</table>
</div>
     
<div id="VJET1200e-qg" class="tabcontent">
<table id="tracelog1" width="909" border="0" align="center">
<?php

//echo  @mysql_num_rows( $sql_query ); die();
$logs = @mysql_query("SELECT * from mylanb where printers like 'VJET1200e' and type like 'Quick Guide' order by timecreate desc");
while($log = mysql_fetch_array( $logs )){
// Bo gio - chi lay ngay
$date = $log['timecreate'];
$createDate = date('Y-m-d', strtotime($date));

echo "<tr>";
echo "<th>". $log['filename']. "</th>";
echo "<th>". $log['type']. "</th>";
echo "<th><a href=\"http://rynantech.com/partner-login/mylanbclick.php?id=".$log['id']."\"><img src='http://www.rynantech.com/partner-login/sites/images/dl.png".$row['image_name']."'></a></th>";
echo "<th>". $log['notes']. "</th>";
echo "<th>". $log['views']. "</th>";
echo "<th>". $createDate. "</th>";
echo "<th><a href=\"mylanbedit.php?id=$log[id]\"><img src='http://www.rynantech.com/partner-login/sites/images/edit.png".$row['image_name']."'></a></th>";
echo "<th><a href=\"mylanbdel.php?id=$log[id]\" onclick=\"return makesure();\"><img src='http://www.rynantech.com/partner-login/sites/images/delete.png".$row['image_name']."'></a></th>";
//echo "<td>". $log['id']. "</td>";
//echo "<td>". $log['printers']. "</td>";
//echo "<td>". $log['link']. "</td>";
//echo "<td>". $log['lastupdate']. "</td>";
//echo "<td>". $log['views']. "</td>";
//echo "<td><a href=\"http://rynantech.com/partner-login/mylanb/VJET/$log[link]\" onclick=\"khoa();\">$log[link]</a></td>";

echo "</tr>";
}
?>

</table>

</div>
     
<div id="IOJ100-qg" class="tabcontent">
<table id="tracelog1" width="909" border="0" align="center">
<?php

//echo  @mysql_num_rows( $sql_query ); die();
$logs = @mysql_query("SELECT * from mylanb where printers like 'IOJ100' and type like 'Quick Guide' order by timecreate desc");
while($log = mysql_fetch_array( $logs )){
// Bo gio - chi lay ngay
$date = $log['timecreate'];
$createDate = date('Y-m-d', strtotime($date));

echo "<tr>";
echo "<th>". $log['filename']. "</th>";
echo "<th>". $log['type']. "</th>";
echo "<th><a href=\"http://rynantech.com/partner-login/mylanbclick.php?id=".$log['id']."\"><img src='http://www.rynantech.com/partner-login/sites/images/dl.png".$row['image_name']."'></a></th>";
echo "<th>". $log['notes']. "</th>";
echo "<th>". $log['views']. "</th>";
echo "<th>". $createDate. "</th>";
echo "<th><a href=\"mylanbedit.php?id=$log[id]\"><img src='http://www.rynantech.com/partner-login/sites/images/edit.png".$row['image_name']."'></a></th>";
echo "<th><a href=\"mylanbdel.php?id=$log[id]\" onclick=\"return makesure();\"><img src='http://www.rynantech.com/partner-login/sites/images/delete.png".$row['image_name']."'></a></th>";
//echo "<td>". $log['id']. "</td>";
//echo "<td>". $log['printers']. "</td>";
//echo "<td>". $log['link']. "</td>";
//echo "<td>". $log['lastupdate']. "</td>";
//echo "<td>". $log['views']. "</td>";
//echo "<td><a href=\"http://rynantech.com/partner-login/mylanb/VJET/$log[link]\" onclick=\"khoa();\">$log[link]</a></td>";

echo "</tr>";
}
?>

</table>

</div>
     
<div id="IOJ200-qg" class="tabcontent">
<table id="tracelog1" width="909" border="0" align="center">
<?php

//echo  @mysql_num_rows( $sql_query ); die();
$logs = @mysql_query("SELECT * from mylanb where printers like 'IOJ200' and type like 'Quick Guide' order by timecreate desc");
while($log = mysql_fetch_array( $logs )){
// Bo gio - chi lay ngay
$date = $log['timecreate'];
$createDate = date('Y-m-d', strtotime($date));

echo "<tr>";
echo "<th>". $log['filename']. "</th>";
echo "<th>". $log['type']. "</th>";
echo "<th><a href=\"http://rynantech.com/partner-login/mylanbclick.php?id=".$log['id']."\"><img src='http://www.rynantech.com/partner-login/sites/images/dl.png".$row['image_name']."'></a></th>";
echo "<th>". $log['notes']. "</th>";
echo "<th>". $log['views']. "</th>";
echo "<th>". $createDate. "</th>";
echo "<th><a href=\"mylanbedit.php?id=$log[id]\"><img src='http://www.rynantech.com/partner-login/sites/images/edit.png".$row['image_name']."'></a></th>";
echo "<th><a href=\"mylanbdel.php?id=$log[id]\" onclick=\"return makesure();\"><img src='http://www.rynantech.com/partner-login/sites/images/delete.png".$row['image_name']."'></a></th>";
//echo "<td>". $log['id']. "</td>";
//echo "<td>". $log['printers']. "</td>";
//echo "<td>". $log['link']. "</td>";
//echo "<td>". $log['lastupdate']. "</td>";
//echo "<td>". $log['views']. "</td>";
//echo "<td><a href=\"http://rynantech.com/partner-login/mylanb/VJET/$log[link]\" onclick=\"khoa();\">$log[link]</a></td>";

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
  <button class="tablinks" onclick="openCity(event, 'RYNAN R20-pr')">RYNAN R20</button>
  <button class="tablinks" onclick="openCity(event, 'VJET1000-pr')">VJET1000</button>
  <button class="tablinks" onclick="openCity(event, 'VJET1010-pr')">VJET1010</button>
  <button class="tablinks" onclick="openCity(event, 'VJET1020-pr')">VJET1020</button>
  <button class="tablinks" onclick="openCity(event, 'VJET1040-pr')">VJET1040</button>
  <button class="tablinks" onclick="openCity(event, 'VJET1040H-pr')">VJET1040H</button>
  <button class="tablinks" onclick="openCity(event, 'VJET1040He-pr')">VJET1040He</button>
  <button class="tablinks" onclick="openCity(event, 'VJET1040S-pr')">VJET1040S</button>
  <button class="tablinks" onclick="openCity(event, 'B1040P-pr')">B1040P</button>
  <button class="tablinks" onclick="openCity(event, 'B1060-pr')">B1060</button>
  <button class="tablinks" onclick="openCity(event, 'B1060P-pr')">B1060P</button>
  <button class="tablinks" onclick="openCity(event, 'B1060H-pr')">B1060H</button>
  <button class="tablinks" onclick="openCity(event, 'VJET1200-pr')">VJET1200</button>
  <button class="tablinks" onclick="openCity(event, 'VJET1200e-pr')">VJET1200e</button>
  <button class="tablinks" onclick="openCity(event, 'IOJ100-pr')">IOJ100</button>
  <button class="tablinks" onclick="openCity(event, 'IOJ200-pr')">IOJ200</button>
</div>

<div id="RYNAN R20-pr" class="tabcontent" style="display: block;" >
<table id="tracelog1" width="909" border="0" align="center">
<?php

//echo  @mysql_num_rows( $sql_query ); die();
$logs = @mysql_query("SELECT * from mylanb where printers like 'RYNAN R20' and type like 'Presentation' order by timecreate desc");
while($log = mysql_fetch_array( $logs )){
// Bo gio - chi lay ngay
$date = $log['timecreate'];
$createDate = date('Y-m-d', strtotime($date));

echo "<tr>";
echo "<th>". $log['filename']. "</th>";
echo "<th>". $log['type']. "</th>";
echo "<th><a href=\"http://rynantech.com/partner-login/mylanbclick.php?id=".$log['id']."\"><img src='http://www.rynantech.com/partner-login/sites/images/dl.png".$row['image_name']."'></a></th>";
echo "<th>". $log['notes']. "</th>";
echo "<th>". $log['views']. "</th>";
echo "<th>". $createDate. "</th>";
echo "<th><a href=\"mylanbedit.php?id=$log[id]\"><img src='http://www.rynantech.com/partner-login/sites/images/edit.png".$row['image_name']."'></a></th>";
echo "<th><a href=\"mylanbdel.php?id=$log[id]\" onclick=\"return makesure();\"><img src='http://www.rynantech.com/partner-login/sites/images/delete.png".$row['image_name']."'></a></th>";
//echo "<td>". $log['id']. "</td>";
//echo "<td>". $log['printers']. "</td>";
//echo "<td>". $log['link']. "</td>";
//echo "<td>". $log['lastupdate']. "</td>";
//echo "<td>". $log['views']. "</td>";
//echo "<td><a href=\"http://rynantech.com/partner-login/mylanb/VJET/$log[link]\" onclick=\"khoa();\">$log[link]</a></td>";

echo "</tr>";
}
?>

</table>
</div>


<div id="VJET1000-pr" class="tabcontent" style="display: block;" >
<table id="tracelog1" width="909" border="0" align="center">
<?php

//echo  @mysql_num_rows( $sql_query ); die();
$logs = @mysql_query("SELECT * from mylanb where printers like 'VJET1000' and type like 'Presentation' order by timecreate desc");
while($log = mysql_fetch_array( $logs )){
// Bo gio - chi lay ngay
$date = $log['timecreate'];
$createDate = date('Y-m-d', strtotime($date));

echo "<tr>";
echo "<th>". $log['filename']. "</th>";
echo "<th>". $log['type']. "</th>";
echo "<th><a href=\"http://rynantech.com/partner-login/mylanbclick.php?id=".$log['id']."\"><img src='http://www.rynantech.com/partner-login/sites/images/dl.png".$row['image_name']."'></a></th>";
echo "<th>". $log['notes']. "</th>";
echo "<th>". $log['views']. "</th>";
echo "<th>". $createDate. "</th>";
echo "<th><a href=\"mylanbedit.php?id=$log[id]\"><img src='http://www.rynantech.com/partner-login/sites/images/edit.png".$row['image_name']."'></a></th>";
echo "<th><a href=\"mylanbdel.php?id=$log[id]\" onclick=\"return makesure();\"><img src='http://www.rynantech.com/partner-login/sites/images/delete.png".$row['image_name']."'></a></th>";
//echo "<td>". $log['id']. "</td>";
//echo "<td>". $log['printers']. "</td>";
//echo "<td>". $log['link']. "</td>";
//echo "<td>". $log['lastupdate']. "</td>";
//echo "<td>". $log['views']. "</td>";
//echo "<td><a href=\"http://rynantech.com/partner-login/mylanb/VJET/$log[link]\" onclick=\"khoa();\">$log[link]</a></td>";

echo "</tr>";
}
?>

</table>
</div>




<div id="VJET1010-pr" class="tabcontent">
<table id="tracelog1" width="909" border="0" align="center">
<?php

//echo  @mysql_num_rows( $sql_query ); die();
$logs = @mysql_query("SELECT * from mylanb where printers like 'VJET1010' and type like 'Presentation' order by timecreate desc");
while($log = mysql_fetch_array( $logs )){
// Bo gio - chi lay ngay
$date = $log['timecreate'];
$createDate = date('Y-m-d', strtotime($date));

echo "<tr>";
echo "<th>". $log['filename']. "</th>";
echo "<th>". $log['type']. "</th>";
echo "<th><a href=\"http://rynantech.com/partner-login/mylanbclick.php?id=".$log['id']."\"><img src='http://www.rynantech.com/partner-login/sites/images/dl.png".$row['image_name']."'></a></th>";
echo "<th>". $log['notes']. "</th>";
echo "<th>". $log['views']. "</th>";
echo "<th>". $createDate. "</th>";
echo "<th><a href=\"mylanbedit.php?id=$log[id]\"><img src='http://www.rynantech.com/partner-login/sites/images/edit.png".$row['image_name']."'></a></th>";
echo "<th><a href=\"mylanbdel.php?id=$log[id]\" onclick=\"return makesure();\"><img src='http://www.rynantech.com/partner-login/sites/images/delete.png".$row['image_name']."'></a></th>";
//echo "<td>". $log['id']. "</td>";
//echo "<td>". $log['printers']. "</td>";
//echo "<td>". $log['link']. "</td>";
//echo "<td>". $log['lastupdate']. "</td>";
//echo "<td>". $log['views']. "</td>";
//echo "<td><a href=\"http://rynantech.com/partner-login/mylanb/VJET/$log[link]\" onclick=\"khoa();\">$log[link]</a></td>";

echo "</tr>";
}
?>

</table>
</div>

<div id="VJET1020-pr" class="tabcontent">
<table id="tracelog1" width="909" border="0" align="center">
<?php

//echo  @mysql_num_rows( $sql_query ); die();
$logs = @mysql_query("SELECT * from mylanb where printers like 'VJET1020' and type like 'Presentation' order by timecreate desc");
while($log = mysql_fetch_array( $logs )){
// Bo gio - chi lay ngay
$date = $log['timecreate'];
$createDate = date('Y-m-d', strtotime($date));

echo "<tr>";
echo "<th>". $log['filename']. "</th>";
echo "<th>". $log['type']. "</th>";
echo "<th><a href=\"http://rynantech.com/partner-login/mylanbclick.php?id=".$log['id']."\"><img src='http://www.rynantech.com/partner-login/sites/images/dl.png".$row['image_name']."'></a></th>";
echo "<th>". $log['notes']. "</th>";
echo "<th>". $log['views']. "</th>";
echo "<th>". $createDate. "</th>";
echo "<th><a href=\"mylanbedit.php?id=$log[id]\"><img src='http://www.rynantech.com/partner-login/sites/images/edit.png".$row['image_name']."'></a></th>";
echo "<th><a href=\"mylanbdel.php?id=$log[id]\" onclick=\"return makesure();\"><img src='http://www.rynantech.com/partner-login/sites/images/delete.png".$row['image_name']."'></a></th>";
//echo "<td>". $log['id']. "</td>";
//echo "<td>". $log['printers']. "</td>";
//echo "<td>". $log['link']. "</td>";
//echo "<td>". $log['lastupdate']. "</td>";
//echo "<td>". $log['views']. "</td>";
//echo "<td><a href=\"http://rynantech.com/partner-login/mylanb/VJET/$log[link]\" onclick=\"khoa();\">$log[link]</a></td>";

echo "</tr>";
}
?>

</table>
</div>




<div id="VJET1040-pr" class="tabcontent">
<table id="tracelog1" width="909" border="0" align="center">
<?php

//echo  @mysql_num_rows( $sql_query ); die();
$logs = @mysql_query("SELECT * from mylanb where printers like 'VJET1040' and type like 'Presentation' order by timecreate desc");
while($log = mysql_fetch_array( $logs )){
// Bo gio - chi lay ngay
$date = $log['timecreate'];
$createDate = date('Y-m-d', strtotime($date));

echo "<tr>";
echo "<th>". $log['filename']. "</th>";
echo "<th>". $log['type']. "</th>";
echo "<th><a href=\"http://rynantech.com/partner-login/mylanbclick.php?id=".$log['id']."\"><img src='http://www.rynantech.com/partner-login/sites/images/dl.png".$row['image_name']."'></a></th>";
echo "<th>". $log['notes']. "</th>";
echo "<th>". $log['views']. "</th>";
echo "<th>". $createDate. "</th>";
echo "<th><a href=\"mylanbedit.php?id=$log[id]\"><img src='http://www.rynantech.com/partner-login/sites/images/edit.png".$row['image_name']."'></a></th>";
echo "<th><a href=\"mylanbdel.php?id=$log[id]\" onclick=\"return makesure();\"><img src='http://www.rynantech.com/partner-login/sites/images/delete.png".$row['image_name']."'></a></th>";
//echo "<td>". $log['id']. "</td>";
//echo "<td>". $log['printers']. "</td>";
//echo "<td>". $log['link']. "</td>";
//echo "<td>". $log['lastupdate']. "</td>";
//echo "<td>". $log['views']. "</td>";
//echo "<td><a href=\"http://rynantech.com/partner-login/mylanb/VJET/$log[link]\" onclick=\"khoa();\">$log[link]</a></td>";

echo "</tr>";
}
?>

</table>
</div>



<div id="VJET1040H-pr" class="tabcontent">
<table id="tracelog1" width="909" border="0" align="center">
<?php

//echo  @mysql_num_rows( $sql_query ); die();
$logs = @mysql_query("SELECT * from mylanb where printers like 'VJET1040H' and type like 'Presentation' order by timecreate desc");
while($log = mysql_fetch_array( $logs )){
// Bo gio - chi lay ngay
$date = $log['timecreate'];
$createDate = date('Y-m-d', strtotime($date));

echo "<tr>";
echo "<th>". $log['filename']. "</th>";
echo "<th>". $log['type']. "</th>";
echo "<th><a href=\"http://rynantech.com/partner-login/mylanbclick.php?id=".$log['id']."\"><img src='http://www.rynantech.com/partner-login/sites/images/dl.png".$row['image_name']."'></a></th>";
echo "<th>". $log['notes']. "</th>";
echo "<th>". $log['views']. "</th>";
echo "<th>". $createDate. "</th>";
echo "<th><a href=\"mylanbedit.php?id=$log[id]\"><img src='http://www.rynantech.com/partner-login/sites/images/edit.png".$row['image_name']."'></a></th>";
echo "<th><a href=\"mylanbdel.php?id=$log[id]\" onclick=\"return makesure();\"><img src='http://www.rynantech.com/partner-login/sites/images/delete.png".$row['image_name']."'></a></th>";
//echo "<td>". $log['id']. "</td>";
//echo "<td>". $log['printers']. "</td>";
//echo "<td>". $log['link']. "</td>";
//echo "<td>". $log['lastupdate']. "</td>";
//echo "<td>". $log['views']. "</td>";
//echo "<td><a href=\"http://rynantech.com/partner-login/mylanb/VJET/$log[link]\" onclick=\"khoa();\">$log[link]</a></td>";

echo "</tr>";
}
?>

</table>
</div>



<div id="VJET1040He-pr" class="tabcontent">
<table id="tracelog1" width="909" border="0" align="center">
<?php

//echo  @mysql_num_rows( $sql_query ); die();
$logs = @mysql_query("SELECT * from mylanb where printers like 'VJET1040He' and type like 'Presentation' order by timecreate desc");
while($log = mysql_fetch_array( $logs )){
// Bo gio - chi lay ngay
$date = $log['timecreate'];
$createDate = date('Y-m-d', strtotime($date));

echo "<tr>";
echo "<th>". $log['filename']. "</th>";
echo "<th>". $log['type']. "</th>";
echo "<th><a href=\"http://rynantech.com/partner-login/mylanbclick.php?id=".$log['id']."\"><img src='http://www.rynantech.com/partner-login/sites/images/dl.png".$row['image_name']."'></a></th>";
echo "<th>". $log['notes']. "</th>";
echo "<th>". $log['views']. "</th>";
echo "<th>". $createDate. "</th>";
echo "<th><a href=\"mylanbedit.php?id=$log[id]\"><img src='http://www.rynantech.com/partner-login/sites/images/edit.png".$row['image_name']."'></a></th>";
echo "<th><a href=\"mylanbdel.php?id=$log[id]\" onclick=\"return makesure();\"><img src='http://www.rynantech.com/partner-login/sites/images/delete.png".$row['image_name']."'></a></th>";
//echo "<td>". $log['id']. "</td>";
//echo "<td>". $log['printers']. "</td>";
//echo "<td>". $log['link']. "</td>";
//echo "<td>". $log['lastupdate']. "</td>";
//echo "<td>". $log['views']. "</td>";
//echo "<td><a href=\"http://rynantech.com/partner-login/mylanb/VJET/$log[link]\" onclick=\"khoa();\">$log[link]</a></td>";

echo "</tr>";
}
?>

</table>
</div>



<div id="VJET1040S-pr" class="tabcontent">
<table id="tracelog1" width="909" border="0" align="center">
<?php

//echo  @mysql_num_rows( $sql_query ); die();
$logs = @mysql_query("SELECT * from mylanb where printers like 'VJET1040S' and type like 'Presentation' order by timecreate desc");
while($log = mysql_fetch_array( $logs )){
// Bo gio - chi lay ngay
$date = $log['timecreate'];
$createDate = date('Y-m-d', strtotime($date));

echo "<tr>";
echo "<th>". $log['filename']. "</th>";
echo "<th>". $log['type']. "</th>";
echo "<th><a href=\"http://rynantech.com/partner-login/mylanbclick.php?id=".$log['id']."\"><img src='http://www.rynantech.com/partner-login/sites/images/dl.png".$row['image_name']."'></a></th>";
echo "<th>". $log['notes']. "</th>";
echo "<th>". $log['views']. "</th>";
echo "<th>". $createDate. "</th>";
echo "<th><a href=\"mylanbedit.php?id=$log[id]\"><img src='http://www.rynantech.com/partner-login/sites/images/edit.png".$row['image_name']."'></a></th>";
echo "<th><a href=\"mylanbdel.php?id=$log[id]\" onclick=\"return makesure();\"><img src='http://www.rynantech.com/partner-login/sites/images/delete.png".$row['image_name']."'></a></th>";
//echo "<td>". $log['id']. "</td>";
//echo "<td>". $log['printers']. "</td>";
//echo "<td>". $log['link']. "</td>";
//echo "<td>". $log['lastupdate']. "</td>";
//echo "<td>". $log['views']. "</td>";
//echo "<td><a href=\"http://rynantech.com/partner-login/mylanb/VJET/$log[link]\" onclick=\"khoa();\">$log[link]</a></td>";

echo "</tr>";
}
?>

</table>
</div>



<div id="B1040P-pr" class="tabcontent">
<table id="tracelog1" width="909" border="0" align="center">
<?php

//echo  @mysql_num_rows( $sql_query ); die();
$logs = @mysql_query("SELECT * from mylanb where printers like 'B1040P' and type like 'Presentation' order by timecreate desc");
while($log = mysql_fetch_array( $logs )){
// Bo gio - chi lay ngay
$date = $log['timecreate'];
$createDate = date('Y-m-d', strtotime($date));

echo "<tr>";
echo "<th>". $log['filename']. "</th>";
echo "<th>". $log['type']. "</th>";
echo "<th><a href=\"http://rynantech.com/partner-login/mylanbclick.php?id=".$log['id']."\"><img src='http://www.rynantech.com/partner-login/sites/images/dl.png".$row['image_name']."'></a></th>";
echo "<th>". $log['notes']. "</th>";
echo "<th>". $log['views']. "</th>";
echo "<th>". $createDate. "</th>";
echo "<th><a href=\"mylanbedit.php?id=$log[id]\"><img src='http://www.rynantech.com/partner-login/sites/images/edit.png".$row['image_name']."'></a></th>";
echo "<th><a href=\"mylanbdel.php?id=$log[id]\" onclick=\"return makesure();\"><img src='http://www.rynantech.com/partner-login/sites/images/delete.png".$row['image_name']."'></a></th>";
//echo "<td>". $log['id']. "</td>";
//echo "<td>". $log['printers']. "</td>";
//echo "<td>". $log['link']. "</td>";
//echo "<td>". $log['lastupdate']. "</td>";
//echo "<td>". $log['views']. "</td>";
//echo "<td><a href=\"http://rynantech.com/partner-login/mylanb/VJET/$log[link]\" onclick=\"khoa();\">$log[link]</a></td>";

echo "</tr>";
}
?>

</table>
</div>





<div id="B1060-pr" class="tabcontent">
<table id="tracelog1" width="909" border="0" align="center">
<?php

//echo  @mysql_num_rows( $sql_query ); die();
$logs = @mysql_query("SELECT * from mylanb where printers like 'B1060' and type like 'Presentation' order by timecreate desc");
while($log = mysql_fetch_array( $logs )){
// Bo gio - chi lay ngay
$date = $log['timecreate'];
$createDate = date('Y-m-d', strtotime($date));

echo "<tr>";
echo "<th>". $log['filename']. "</th>";
echo "<th>". $log['type']. "</th>";
echo "<th><a href=\"http://rynantech.com/partner-login/mylanbclick.php?id=".$log['id']."\"><img src='http://www.rynantech.com/partner-login/sites/images/dl.png".$row['image_name']."'></a></th>";
echo "<th>". $log['notes']. "</th>";
echo "<th>". $log['views']. "</th>";
echo "<th>". $createDate. "</th>";
echo "<th><a href=\"mylanbedit.php?id=$log[id]\"><img src='http://www.rynantech.com/partner-login/sites/images/edit.png".$row['image_name']."'></a></th>";
echo "<th><a href=\"mylanbdel.php?id=$log[id]\" onclick=\"return makesure();\"><img src='http://www.rynantech.com/partner-login/sites/images/delete.png".$row['image_name']."'></a></th>";
//echo "<td>". $log['id']. "</td>";
//echo "<td>". $log['printers']. "</td>";
//echo "<td>". $log['link']. "</td>";
//echo "<td>". $log['lastupdate']. "</td>";
//echo "<td>". $log['views']. "</td>";
//echo "<td><a href=\"http://rynantech.com/partner-login/mylanb/VJET/$log[link]\" onclick=\"khoa();\">$log[link]</a></td>";

echo "</tr>";
}
?>

</table>
</div>



<div id="B1060P-pr" class="tabcontent">
<table id="tracelog1" width="909" border="0" align="center">
<?php

//echo  @mysql_num_rows( $sql_query ); die();
$logs = @mysql_query("SELECT * from mylanb where printers like 'B1060P' and type like 'Presentation' order by timecreate desc");
while($log = mysql_fetch_array( $logs )){
// Bo gio - chi lay ngay
$date = $log['timecreate'];
$createDate = date('Y-m-d', strtotime($date));

echo "<tr>";
echo "<th>". $log['filename']. "</th>";
echo "<th>". $log['type']. "</th>";
echo "<th><a href=\"http://rynantech.com/partner-login/mylanbclick.php?id=".$log['id']."\"><img src='http://www.rynantech.com/partner-login/sites/images/dl.png".$row['image_name']."'></a></th>";
echo "<th>". $log['notes']. "</th>";
echo "<th>". $log['views']. "</th>";
echo "<th>". $createDate. "</th>";
echo "<th><a href=\"mylanbedit.php?id=$log[id]\"><img src='http://www.rynantech.com/partner-login/sites/images/edit.png".$row['image_name']."'></a></th>";
echo "<th><a href=\"mylanbdel.php?id=$log[id]\" onclick=\"return makesure();\"><img src='http://www.rynantech.com/partner-login/sites/images/delete.png".$row['image_name']."'></a></th>";
//echo "<td>". $log['id']. "</td>";
//echo "<td>". $log['printers']. "</td>";
//echo "<td>". $log['link']. "</td>";
//echo "<td>". $log['lastupdate']. "</td>";
//echo "<td>". $log['views']. "</td>";
//echo "<td><a href=\"http://rynantech.com/partner-login/mylanb/VJET/$log[link]\" onclick=\"khoa();\">$log[link]</a></td>";

echo "</tr>";
}
?>

</table>
</div>



<div id="B1060H-pr" class="tabcontent">
<table id="tracelog1" width="909" border="0" align="center">
<?php

//echo  @mysql_num_rows( $sql_query ); die();
$logs = @mysql_query("SELECT * from mylanb where printers like 'B1060H' and type like 'Presentation' order by timecreate desc");
while($log = mysql_fetch_array( $logs )){
// Bo gio - chi lay ngay
$date = $log['timecreate'];
$createDate = date('Y-m-d', strtotime($date));

echo "<tr>";
echo "<th>". $log['filename']. "</th>";
echo "<th>". $log['type']. "</th>";
echo "<th><a href=\"http://rynantech.com/partner-login/mylanbclick.php?id=".$log['id']."\"><img src='http://www.rynantech.com/partner-login/sites/images/dl.png".$row['image_name']."'></a></th>";
echo "<th>". $log['notes']. "</th>";
echo "<th>". $log['views']. "</th>";
echo "<th>". $createDate. "</th>";
echo "<th><a href=\"mylanbedit.php?id=$log[id]\"><img src='http://www.rynantech.com/partner-login/sites/images/edit.png".$row['image_name']."'></a></th>";
echo "<th><a href=\"mylanbdel.php?id=$log[id]\" onclick=\"return makesure();\"><img src='http://www.rynantech.com/partner-login/sites/images/delete.png".$row['image_name']."'></a></th>";
//echo "<td>". $log['id']. "</td>";
//echo "<td>". $log['printers']. "</td>";
//echo "<td>". $log['link']. "</td>";
//echo "<td>". $log['lastupdate']. "</td>";
//echo "<td>". $log['views']. "</td>";
//echo "<td><a href=\"http://rynantech.com/partner-login/mylanb/VJET/$log[link]\" onclick=\"khoa();\">$log[link]</a></td>";

echo "</tr>";
}
?>

</table>
</div>




<div id="VJET1200-pr" class="tabcontent">
<table id="tracelog1" width="909" border="0" align="center">
<?php

//echo  @mysql_num_rows( $sql_query ); die();
$logs = @mysql_query("SELECT * from mylanb where printers like 'VJET1200' and type like 'Presentation' order by timecreate desc");
while($log = mysql_fetch_array( $logs )){
// Bo gio - chi lay ngay
$date = $log['timecreate'];
$createDate = date('Y-m-d', strtotime($date));

echo "<tr>";
echo "<th>". $log['filename']. "</th>";
echo "<th>". $log['type']. "</th>";
echo "<th><a href=\"http://rynantech.com/partner-login/mylanbclick.php?id=".$log['id']."\"><img src='http://www.rynantech.com/partner-login/sites/images/dl.png".$row['image_name']."'></a></th>";
echo "<th>". $log['notes']. "</th>";
echo "<th>". $log['views']. "</th>";
echo "<th>". $createDate. "</th>";
echo "<th><a href=\"mylanbedit.php?id=$log[id]\"><img src='http://www.rynantech.com/partner-login/sites/images/edit.png".$row['image_name']."'></a></th>";
echo "<th><a href=\"mylanbdel.php?id=$log[id]\" onclick=\"return makesure();\"><img src='http://www.rynantech.com/partner-login/sites/images/delete.png".$row['image_name']."'></a></th>";
//echo "<td>". $log['id']. "</td>";
//echo "<td>". $log['printers']. "</td>";
//echo "<td>". $log['link']. "</td>";
//echo "<td>". $log['lastupdate']. "</td>";
//echo "<td>". $log['views']. "</td>";
//echo "<td><a href=\"http://rynantech.com/partner-login/mylanb/VJET/$log[link]\" onclick=\"khoa();\">$log[link]</a></td>";

echo "</tr>";
}
?>

</table>
</div>
     
<div id="VJET1200e-pr" class="tabcontent">
<table id="tracelog1" width="909" border="0" align="center">
<?php

//echo  @mysql_num_rows( $sql_query ); die();
$logs = @mysql_query("SELECT * from mylanb where printers like 'VJET1200e' and type like 'Presentation' order by timecreate desc");
while($log = mysql_fetch_array( $logs )){
// Bo gio - chi lay ngay
$date = $log['timecreate'];
$createDate = date('Y-m-d', strtotime($date));

echo "<tr>";
echo "<th>". $log['filename']. "</th>";
echo "<th>". $log['type']. "</th>";
echo "<th><a href=\"http://rynantech.com/partner-login/mylanbclick.php?id=".$log['id']."\"><img src='http://www.rynantech.com/partner-login/sites/images/dl.png".$row['image_name']."'></a></th>";
echo "<th>". $log['notes']. "</th>";
echo "<th>". $log['views']. "</th>";
echo "<th>". $createDate. "</th>";
echo "<th><a href=\"mylanbedit.php?id=$log[id]\"><img src='http://www.rynantech.com/partner-login/sites/images/edit.png".$row['image_name']."'></a></th>";
echo "<th><a href=\"mylanbdel.php?id=$log[id]\" onclick=\"return makesure();\"><img src='http://www.rynantech.com/partner-login/sites/images/delete.png".$row['image_name']."'></a></th>";
//echo "<td>". $log['id']. "</td>";
//echo "<td>". $log['printers']. "</td>";
//echo "<td>". $log['link']. "</td>";
//echo "<td>". $log['lastupdate']. "</td>";
//echo "<td>". $log['views']. "</td>";
//echo "<td><a href=\"http://rynantech.com/partner-login/mylanb/VJET/$log[link]\" onclick=\"khoa();\">$log[link]</a></td>";

echo "</tr>";
}
?>

</table>

</div>
     
<div id="IOJ100-pr" class="tabcontent">
<table id="tracelog1" width="909" border="0" align="center">
<?php

//echo  @mysql_num_rows( $sql_query ); die();
$logs = @mysql_query("SELECT * from mylanb where printers like 'IOJ100' and type like 'Presentation' order by timecreate desc");
while($log = mysql_fetch_array( $logs )){
// Bo gio - chi lay ngay
$date = $log['timecreate'];
$createDate = date('Y-m-d', strtotime($date));

echo "<tr>";
echo "<th>". $log['filename']. "</th>";
echo "<th>". $log['type']. "</th>";
echo "<th><a href=\"http://rynantech.com/partner-login/mylanbclick.php?id=".$log['id']."\"><img src='http://www.rynantech.com/partner-login/sites/images/dl.png".$row['image_name']."'></a></th>";
echo "<th>". $log['notes']. "</th>";
echo "<th>". $log['views']. "</th>";
echo "<th>". $createDate. "</th>";
echo "<th><a href=\"mylanbedit.php?id=$log[id]\"><img src='http://www.rynantech.com/partner-login/sites/images/edit.png".$row['image_name']."'></a></th>";
echo "<th><a href=\"mylanbdel.php?id=$log[id]\" onclick=\"return makesure();\"><img src='http://www.rynantech.com/partner-login/sites/images/delete.png".$row['image_name']."'></a></th>";
//echo "<td>". $log['id']. "</td>";
//echo "<td>". $log['printers']. "</td>";
//echo "<td>". $log['link']. "</td>";
//echo "<td>". $log['lastupdate']. "</td>";
//echo "<td>". $log['views']. "</td>";
//echo "<td><a href=\"http://rynantech.com/partner-login/mylanb/VJET/$log[link]\" onclick=\"khoa();\">$log[link]</a></td>";

echo "</tr>";
}
?>

</table>

</div>
     
<div id="IOJ200-pr" class="tabcontent">
<table id="tracelog1" width="909" border="0" align="center">
<?php

//echo  @mysql_num_rows( $sql_query ); die();
$logs = @mysql_query("SELECT * from mylanb where printers like 'IOJ200' and type like 'Presentation' order by timecreate desc");
while($log = mysql_fetch_array( $logs )){
// Bo gio - chi lay ngay
$date = $log['timecreate'];
$createDate = date('Y-m-d', strtotime($date));

echo "<tr>";
echo "<th>". $log['filename']. "</th>";
echo "<th>". $log['type']. "</th>";
echo "<th><a href=\"http://rynantech.com/partner-login/mylanbclick.php?id=".$log['id']."\"><img src='http://www.rynantech.com/partner-login/sites/images/dl.png".$row['image_name']."'></a></th>";
echo "<th>". $log['notes']. "</th>";
echo "<th>". $log['views']. "</th>";
echo "<th>". $createDate. "</th>";
echo "<th><a href=\"mylanbedit.php?id=$log[id]\"><img src='http://www.rynantech.com/partner-login/sites/images/edit.png".$row['image_name']."'></a></th>";
echo "<th><a href=\"mylanbdel.php?id=$log[id]\" onclick=\"return makesure();\"><img src='http://www.rynantech.com/partner-login/sites/images/delete.png".$row['image_name']."'></a></th>";
//echo "<td>". $log['id']. "</td>";
//echo "<td>". $log['printers']. "</td>";
//echo "<td>". $log['link']. "</td>";
//echo "<td>". $log['lastupdate']. "</td>";
//echo "<td>". $log['views']. "</td>";
//echo "<td><a href=\"http://rynantech.com/partner-login/mylanb/VJET/$log[link]\" onclick=\"khoa();\">$log[link]</a></td>";

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
</div>

<div id="RYNAN R20-videos" class="tabcontent" style="display: block;" >
<table id="tracelog1" width="909" border="0" align="center">
<?php

//echo  @mysql_num_rows( $sql_query ); die();
$logs = @mysql_query("SELECT * from mylanb where printers like 'R20 PRO' and type like 'videos' order by timecreate desc");
while($log = mysql_fetch_array( $logs )){
// Bo gio - chi lay ngay
$date = $log['timecreate'];
$createDate = date('Y-m-d', strtotime($date));

echo "<tr>";
echo "<th>". $log['filename']. "</th>";
echo "<th>". $log['type']. "</th>";
echo "<th><a href=\"http://rynantech.com/partner-login/mylanbclick.php?id=".$log['id']."\"><img src='http://www.rynantech.com/partner-login/sites/images/dl.png".$row['image_name']."'></a></th>";
echo "<th>". $log['notes']. "</th>";
echo "<th>". $log['views']. "</th>";
echo "<th>". $createDate. "</th>";
echo "<th><a href=\"mylanbedit.php?id=$log[id]\"><img src='http://www.rynantech.com/partner-login/sites/images/edit.png".$row['image_name']."'></a></th>";
echo "<th><a href=\"mylanbdel.php?id=$log[id]\" onclick=\"return makesure();\"><img src='http://www.rynantech.com/partner-login/sites/images/delete.png".$row['image_name']."'></a></th>";
//echo "<td>". $log['id']. "</td>";
//echo "<td>". $log['printers']. "</td>";
//echo "<td>". $log['link']. "</td>";
//echo "<td>". $log['lastupdate']. "</td>";
//echo "<td>". $log['views']. "</td>";
//echo "<td><a href=\"http://rynantech.com/partner-login/mylanb/VJET/$log[link]\" onclick=\"khoa();\">$log[link]</a></td>";

echo "</tr>";
}
?>

</table>
</div>


<div id="W1000-videos" class="tabcontent" style="display: block;" >
<table id="tracelog1" width="909" border="0" align="center">
<?php

//echo  @mysql_num_rows( $sql_query ); die();
$logs = @mysql_query("SELECT * from mylanb where printers like 'W1000' and type like 'videos' order by timecreate desc");
while($log = mysql_fetch_array( $logs )){
// Bo gio - chi lay ngay
$date = $log['timecreate'];
$createDate = date('Y-m-d', strtotime($date));

echo "<tr>";
echo "<th>". $log['filename']. "</th>";
echo "<th>". $log['type']. "</th>";
echo "<th><a href=\"http://rynantech.com/partner-login/mylanbclick.php?id=".$log['id']."\"><img src='http://www.rynantech.com/partner-login/sites/images/dl.png".$row['image_name']."'></a></th>";
echo "<th>". $log['notes']. "</th>";
echo "<th>". $log['views']. "</th>";
echo "<th>". $createDate. "</th>";
echo "<th><a href=\"mylanbedit.php?id=$log[id]\"><img src='http://www.rynantech.com/partner-login/sites/images/edit.png".$row['image_name']."'></a></th>";
echo "<th><a href=\"mylanbdel.php?id=$log[id]\" onclick=\"return makesure();\"><img src='http://www.rynantech.com/partner-login/sites/images/delete.png".$row['image_name']."'></a></th>";
//echo "<td>". $log['id']. "</td>";
//echo "<td>". $log['printers']. "</td>";
//echo "<td>". $log['link']. "</td>";
//echo "<td>". $log['lastupdate']. "</td>";
//echo "<td>". $log['views']. "</td>";
//echo "<td><a href=\"http://rynantech.com/partner-login/mylanb/VJET/$log[link]\" onclick=\"khoa();\">$log[link]</a></td>";

echo "</tr>";
}
?>

</table>
</div>



<div id="R1010-videos" class="tabcontent">
<table id="tracelog1" width="909" border="0" align="center">
<?php

//echo  @mysql_num_rows( $sql_query ); die();
$logs = @mysql_query("SELECT * from mylanb where printers like 'R1010' and type like 'videos' order by timecreate desc");
while($log = mysql_fetch_array( $logs )){
// Bo gio - chi lay ngay
$date = $log['timecreate'];
$createDate = date('Y-m-d', strtotime($date));

echo "<tr>";
echo "<th>". $log['filename']. "</th>";
echo "<th>". $log['type']. "</th>";
echo "<th><a href=\"http://rynantech.com/partner-login/mylanbclick.php?id=".$log['id']."\"><img src='http://www.rynantech.com/partner-login/sites/images/dl.png".$row['image_name']."'></a></th>";
echo "<th>". $log['notes']. "</th>";
echo "<th>". $log['views']. "</th>";
echo "<th>". $createDate. "</th>";
echo "<th><a href=\"mylanbedit.php?id=$log[id]\"><img src='http://www.rynantech.com/partner-login/sites/images/edit.png".$row['image_name']."'></a></th>";
echo "<th><a href=\"mylanbdel.php?id=$log[id]\" onclick=\"return makesure();\"><img src='http://www.rynantech.com/partner-login/sites/images/delete.png".$row['image_name']."'></a></th>";
//echo "<td>". $log['id']. "</td>";
//echo "<td>". $log['printers']. "</td>";
//echo "<td>". $log['link']. "</td>";
//echo "<td>". $log['lastupdate']. "</td>";
//echo "<td>". $log['views']. "</td>";
//echo "<td><a href=\"http://rynantech.com/partner-login/mylanb/VJET/$log[link]\" onclick=\"khoa();\">$log[link]</a></td>";

echo "</tr>";
}
?>

</table>
</div>




<div id="R1010P-videos" class="tabcontent">
<table id="tracelog1" width="909" border="0" align="center">
<?php

//echo  @mysql_num_rows( $sql_query ); die();
$logs = @mysql_query("SELECT * from mylanb where printers like 'R1010P' and type like 'videos' order by timecreate desc");
while($log = mysql_fetch_array( $logs )){
// Bo gio - chi lay ngay
$date = $log['timecreate'];
$createDate = date('Y-m-d', strtotime($date));

echo "<tr>";
echo "<th>". $log['filename']. "</th>";
echo "<th>". $log['type']. "</th>";
echo "<th><a href=\"http://rynantech.com/partner-login/mylanbclick.php?id=".$log['id']."\"><img src='http://www.rynantech.com/partner-login/sites/images/dl.png".$row['image_name']."'></a></th>";
echo "<th>". $log['notes']. "</th>";
echo "<th>". $log['views']. "</th>";
echo "<th>". $createDate. "</th>";
echo "<th><a href=\"mylanbedit.php?id=$log[id]\"><img src='http://www.rynantech.com/partner-login/sites/images/edit.png".$row['image_name']."'></a></th>";
echo "<th><a href=\"mylanbdel.php?id=$log[id]\" onclick=\"return makesure();\"><img src='http://www.rynantech.com/partner-login/sites/images/delete.png".$row['image_name']."'></a></th>";
//echo "<td>". $log['id']. "</td>";
//echo "<td>". $log['printers']. "</td>";
//echo "<td>". $log['link']. "</td>";
//echo "<td>". $log['lastupdate']. "</td>";
//echo "<td>". $log['views']. "</td>";
//echo "<td><a href=\"http://rynantech.com/partner-login/mylanb/VJET/$log[link]\" onclick=\"khoa();\">$log[link]</a></td>";

echo "</tr>";
}
?>

</table>
</div>




<div id="W1020-videos" class="tabcontent">
<table id="tracelog1" width="909" border="0" align="center">
<?php

//echo  @mysql_num_rows( $sql_query ); die();
$logs = @mysql_query("SELECT * from mylanb where printers like 'W1020' and type like 'videos' order by timecreate desc");
while($log = mysql_fetch_array( $logs )){
// Bo gio - chi lay ngay
$date = $log['timecreate'];
$createDate = date('Y-m-d', strtotime($date));

echo "<tr>";
echo "<th>". $log['filename']. "</th>";
echo "<th>". $log['type']. "</th>";
echo "<th><a href=\"http://rynantech.com/partner-login/mylanbclick.php?id=".$log['id']."\"><img src='http://www.rynantech.com/partner-login/sites/images/dl.png".$row['image_name']."'></a></th>";
echo "<th>". $log['notes']. "</th>";
echo "<th>". $log['views']. "</th>";
echo "<th>". $createDate. "</th>";
echo "<th><a href=\"mylanbedit.php?id=$log[id]\"><img src='http://www.rynantech.com/partner-login/sites/images/edit.png".$row['image_name']."'></a></th>";
echo "<th><a href=\"mylanbdel.php?id=$log[id]\" onclick=\"return makesure();\"><img src='http://www.rynantech.com/partner-login/sites/images/delete.png".$row['image_name']."'></a></th>";
//echo "<td>". $log['id']. "</td>";
//echo "<td>". $log['printers']. "</td>";
//echo "<td>". $log['link']. "</td>";
//echo "<td>". $log['lastupdate']. "</td>";
//echo "<td>". $log['views']. "</td>";
//echo "<td><a href=\"http://rynantech.com/partner-login/mylanb/VJET/$log[link]\" onclick=\"khoa();\">$log[link]</a></td>";

echo "</tr>";
}
?>

</table>
</div>


<div id="B1040-videos" class="tabcontent">
<table id="tracelog1" width="909" border="0" align="center">
<?php

//echo  @mysql_num_rows( $sql_query ); die();
$logs = @mysql_query("SELECT * from mylanb where printers like 'B1040' and type like 'videos' order by timecreate desc");
while($log = mysql_fetch_array( $logs )){
// Bo gio - chi lay ngay
$date = $log['timecreate'];
$createDate = date('Y-m-d', strtotime($date));

echo "<tr>";
echo "<th>". $log['filename']. "</th>";
echo "<th>". $log['type']. "</th>";
echo "<th><a href=\"http://rynantech.com/partner-login/mylanbclick.php?id=".$log['id']."\"><img src='http://www.rynantech.com/partner-login/sites/images/dl.png".$row['image_name']."'></a></th>";
echo "<th>". $log['notes']. "</th>";
echo "<th>". $log['views']. "</th>";
echo "<th>". $createDate. "</th>";
echo "<th><a href=\"mylanbedit.php?id=$log[id]\"><img src='http://www.rynantech.com/partner-login/sites/images/edit.png".$row['image_name']."'></a></th>";
echo "<th><a href=\"mylanbdel.php?id=$log[id]\" onclick=\"return makesure();\"><img src='http://www.rynantech.com/partner-login/sites/images/delete.png".$row['image_name']."'></a></th>";
//echo "<td>". $log['id']. "</td>";
//echo "<td>". $log['printers']. "</td>";
//echo "<td>". $log['link']. "</td>";
//echo "<td>". $log['lastupdate']. "</td>";
//echo "<td>". $log['views']. "</td>";
//echo "<td><a href=\"http://rynantech.com/partner-login/mylanb/VJET/$log[link]\" onclick=\"khoa();\">$log[link]</a></td>";

echo "</tr>";
}
?>

</table>
</div>
     
<div id="B1040H Aluminum-videos" class="tabcontent">
<table id="tracelog1" width="909" border="0" align="center">
<?php

//echo  @mysql_num_rows( $sql_query ); die();
$logs = @mysql_query("SELECT * from mylanb where printers like 'B1040H Aluminum' and type like 'videos' order by timecreate desc");
while($log = mysql_fetch_array( $logs )){
// Bo gio - chi lay ngay
$date = $log['timecreate'];
$createDate = date('Y-m-d', strtotime($date));

echo "<tr>";
echo "<th>". $log['filename']. "</th>";
echo "<th>". $log['type']. "</th>";
echo "<th><a href=\"http://rynantech.com/partner-login/mylanbclick.php?id=".$log['id']."\"><img src='http://www.rynantech.com/partner-login/sites/images/dl.png".$row['image_name']."'></a></th>";
echo "<th>". $log['notes']. "</th>";
echo "<th>". $log['views']. "</th>";
echo "<th>". $createDate. "</th>";
echo "<th><a href=\"mylanbedit.php?id=$log[id]\"><img src='http://www.rynantech.com/partner-login/sites/images/edit.png".$row['image_name']."'></a></th>";
echo "<th><a href=\"mylanbdel.php?id=$log[id]\" onclick=\"return makesure();\"><img src='http://www.rynantech.com/partner-login/sites/images/delete.png".$row['image_name']."'></a></th>";
//echo "<td>". $log['id']. "</td>";
//echo "<td>". $log['printers']. "</td>";
//echo "<td>". $log['link']. "</td>";
//echo "<td>". $log['lastupdate']. "</td>";
//echo "<td>". $log['views']. "</td>";
//echo "<td><a href=\"http://rynantech.com/partner-login/mylanb/VJET/$log[link]\" onclick=\"khoa();\">$log[link]</a></td>";

echo "</tr>";
}
?>

</table>
</div>     
<div id="B1040H Plastic-videos" class="tabcontent">
<table id="tracelog1" width="909" border="0" align="center">
<?php

//echo  @mysql_num_rows( $sql_query ); die();
$logs = @mysql_query("SELECT * from mylanb where printers like 'B1040H Plastic' and type like 'videos' order by timecreate desc");
while($log = mysql_fetch_array( $logs )){
// Bo gio - chi lay ngay
$date = $log['timecreate'];
$createDate = date('Y-m-d', strtotime($date));

echo "<tr>";
echo "<th>". $log['filename']. "</th>";
echo "<th>". $log['type']. "</th>";
echo "<th><a href=\"http://rynantech.com/partner-login/mylanbclick.php?id=".$log['id']."\"><img src='http://www.rynantech.com/partner-login/sites/images/dl.png".$row['image_name']."'></a></th>";
echo "<th>". $log['notes']. "</th>";
echo "<th>". $log['views']. "</th>";
echo "<th>". $createDate. "</th>";
echo "<th><a href=\"mylanbedit.php?id=$log[id]\"><img src='http://www.rynantech.com/partner-login/sites/images/edit.png".$row['image_name']."'></a></th>";
echo "<th><a href=\"mylanbdel.php?id=$log[id]\" onclick=\"return makesure();\"><img src='http://www.rynantech.com/partner-login/sites/images/delete.png".$row['image_name']."'></a></th>";
//echo "<td>". $log['id']. "</td>";
//echo "<td>". $log['printers']. "</td>";
//echo "<td>". $log['link']. "</td>";
//echo "<td>". $log['lastupdate']. "</td>";
//echo "<td>". $log['views']. "</td>";
//echo "<td><a href=\"http://rynantech.com/partner-login/mylanb/VJET/$log[link]\" onclick=\"khoa();\">$log[link]</a></td>";

echo "</tr>";
}
?>

</table>
</div>     
<div id="B1040S-videos" class="tabcontent">
<table id="tracelog1" width="909" border="0" align="center">
<?php

//echo  @mysql_num_rows( $sql_query ); die();
$logs = @mysql_query("SELECT * from mylanb where printers like 'B1040S' and type like 'videos' order by timecreate desc");
while($log = mysql_fetch_array( $logs )){
// Bo gio - chi lay ngay
$date = $log['timecreate'];
$createDate = date('Y-m-d', strtotime($date));

echo "<tr>";
echo "<th>". $log['filename']. "</th>";
echo "<th>". $log['type']. "</th>";
echo "<th><a href=\"http://rynantech.com/partner-login/mylanbclick.php?id=".$log['id']."\"><img src='http://www.rynantech.com/partner-login/sites/images/dl.png".$row['image_name']."'></a></th>";
echo "<th>". $log['notes']. "</th>";
echo "<th>". $log['views']. "</th>";
echo "<th>". $createDate. "</th>";
echo "<th><a href=\"mylanbedit.php?id=$log[id]\"><img src='http://www.rynantech.com/partner-login/sites/images/edit.png".$row['image_name']."'></a></th>";
echo "<th><a href=\"mylanbdel.php?id=$log[id]\" onclick=\"return makesure();\"><img src='http://www.rynantech.com/partner-login/sites/images/delete.png".$row['image_name']."'></a></th>";
//echo "<td>". $log['id']. "</td>";
//echo "<td>". $log['printers']. "</td>";
//echo "<td>". $log['link']. "</td>";
//echo "<td>". $log['lastupdate']. "</td>";
//echo "<td>". $log['views']. "</td>";
//echo "<td><a href=\"http://rynantech.com/partner-login/mylanb/VJET/$log[link]\" onclick=\"khoa();\">$log[link]</a></td>";

echo "</tr>";
}
?>

</table>
</div>     
<div id="B1040P-videos" class="tabcontent">
<table id="tracelog1" width="909" border="0" align="center">
<?php

//echo  @mysql_num_rows( $sql_query ); die();
$logs = @mysql_query("SELECT * from mylanb where printers like 'B1040P' and type like 'videos' order by timecreate desc");
while($log = mysql_fetch_array( $logs )){
// Bo gio - chi lay ngay
$date = $log['timecreate'];
$createDate = date('Y-m-d', strtotime($date));

echo "<tr>";
echo "<th>". $log['filename']. "</th>";
echo "<th>". $log['type']. "</th>";
echo "<th><a href=\"http://rynantech.com/partner-login/mylanbclick.php?id=".$log['id']."\"><img src='http://www.rynantech.com/partner-login/sites/images/dl.png".$row['image_name']."'></a></th>";
echo "<th>". $log['notes']. "</th>";
echo "<th>". $log['views']. "</th>";
echo "<th>". $createDate. "</th>";
echo "<th><a href=\"mylanbedit.php?id=$log[id]\"><img src='http://www.rynantech.com/partner-login/sites/images/edit.png".$row['image_name']."'></a></th>";
echo "<th><a href=\"mylanbdel.php?id=$log[id]\" onclick=\"return makesure();\"><img src='http://www.rynantech.com/partner-login/sites/images/delete.png".$row['image_name']."'></a></th>";
//echo "<td>". $log['id']. "</td>";
//echo "<td>". $log['printers']. "</td>";
//echo "<td>". $log['link']. "</td>";
//echo "<td>". $log['lastupdate']. "</td>";
//echo "<td>". $log['views']. "</td>";
//echo "<td><a href=\"http://rynantech.com/partner-login/mylanb/VJET/$log[link]\" onclick=\"khoa();\">$log[link]</a></td>";

echo "</tr>";
}
?>

</table>
</div>





<div id="B1060-videos" class="tabcontent">
<table id="tracelog1" width="909" border="0" align="center">
<?php

//echo  @mysql_num_rows( $sql_query ); die();
$logs = @mysql_query("SELECT * from mylanb where printers like 'B1060' and type like 'videos' order by timecreate desc");
while($log = mysql_fetch_array( $logs )){
// Bo gio - chi lay ngay
$date = $log['timecreate'];
$createDate = date('Y-m-d', strtotime($date));

echo "<tr>";
echo "<th>". $log['filename']. "</th>";
echo "<th>". $log['type']. "</th>";
echo "<th><a href=\"http://rynantech.com/partner-login/mylanbclick.php?id=".$log['id']."\"><img src='http://www.rynantech.com/partner-login/sites/images/dl.png".$row['image_name']."'></a></th>";
echo "<th>". $log['notes']. "</th>";
echo "<th>". $log['views']. "</th>";
echo "<th>". $createDate. "</th>";
echo "<th><a href=\"mylanbedit.php?id=$log[id]\"><img src='http://www.rynantech.com/partner-login/sites/images/edit.png".$row['image_name']."'></a></th>";
echo "<th><a href=\"mylanbdel.php?id=$log[id]\" onclick=\"return makesure();\"><img src='http://www.rynantech.com/partner-login/sites/images/delete.png".$row['image_name']."'></a></th>";
//echo "<td>". $log['id']. "</td>";
//echo "<td>". $log['printers']. "</td>";
//echo "<td>". $log['link']. "</td>";
//echo "<td>". $log['lastupdate']. "</td>";
//echo "<td>". $log['views']. "</td>";
//echo "<td><a href=\"http://rynantech.com/partner-login/mylanb/VJET/$log[link]\" onclick=\"khoa();\">$log[link]</a></td>";

echo "</tr>";
}
?>

</table>
</div>

     <div id="B1060P-videos" class="tabcontent">
<table id="tracelog1" width="909" border="0" align="center">
<?php

//echo  @mysql_num_rows( $sql_query ); die();
$logs = @mysql_query("SELECT * from mylanb where printers like 'B1060P' and type like 'videos' order by timecreate desc");
while($log = mysql_fetch_array( $logs )){
// Bo gio - chi lay ngay
$date = $log['timecreate'];
$createDate = date('Y-m-d', strtotime($date));

echo "<tr>";
echo "<th>". $log['filename']. "</th>";
echo "<th>". $log['type']. "</th>";
echo "<th><a href=\"http://rynantech.com/partner-login/mylanbclick.php?id=".$log['id']."\"><img src='http://www.rynantech.com/partner-login/sites/images/dl.png".$row['image_name']."'></a></th>";
echo "<th>". $log['notes']. "</th>";
echo "<th>". $log['views']. "</th>";
echo "<th>". $createDate. "</th>";
echo "<th><a href=\"mylanbedit.php?id=$log[id]\"><img src='http://www.rynantech.com/partner-login/sites/images/edit.png".$row['image_name']."'></a></th>";
echo "<th><a href=\"mylanbdel.php?id=$log[id]\" onclick=\"return makesure();\"><img src='http://www.rynantech.com/partner-login/sites/images/delete.png".$row['image_name']."'></a></th>";
//echo "<td>". $log['id']. "</td>";
//echo "<td>". $log['printers']. "</td>";
//echo "<td>". $log['link']. "</td>";
//echo "<td>". $log['lastupdate']. "</td>";
//echo "<td>". $log['views']. "</td>";
//echo "<td><a href=\"http://rynantech.com/partner-login/mylanb/VJET/$log[link]\" onclick=\"khoa();\">$log[link]</a></td>";

echo "</tr>";
}
?>

</table>
</div>

     <div id="B1060H-videos" class="tabcontent">
<table id="tracelog1" width="909" border="0" align="center">
<?php

//echo  @mysql_num_rows( $sql_query ); die();
$logs = @mysql_query("SELECT * from mylanb where printers like 'B1060H' and type like 'videos' order by timecreate desc");
while($log = mysql_fetch_array( $logs )){
// Bo gio - chi lay ngay
$date = $log['timecreate'];
$createDate = date('Y-m-d', strtotime($date));

echo "<tr>";
echo "<th>". $log['filename']. "</th>";
echo "<th>". $log['type']. "</th>";
echo "<th><a href=\"http://rynantech.com/partner-login/mylanbclick.php?id=".$log['id']."\"><img src='http://www.rynantech.com/partner-login/sites/images/dl.png".$row['image_name']."'></a></th>";
echo "<th>". $log['notes']. "</th>";
echo "<th>". $log['views']. "</th>";
echo "<th>". $createDate. "</th>";
echo "<th><a href=\"mylanbedit.php?id=$log[id]\"><img src='http://www.rynantech.com/partner-login/sites/images/edit.png".$row['image_name']."'></a></th>";
echo "<th><a href=\"mylanbdel.php?id=$log[id]\" onclick=\"return makesure();\"><img src='http://www.rynantech.com/partner-login/sites/images/delete.png".$row['image_name']."'></a></th>";
//echo "<td>". $log['id']. "</td>";
//echo "<td>". $log['printers']. "</td>";
//echo "<td>". $log['link']. "</td>";
//echo "<td>". $log['lastupdate']. "</td>";
//echo "<td>". $log['views']. "</td>";
//echo "<td><a href=\"http://rynantech.com/partner-login/mylanb/VJET/$log[link]\" onclick=\"khoa();\">$log[link]</a></td>";

echo "</tr>";
}
?>

</table>
</div>

     

     
<div id="1200-videos" class="tabcontent">
<table id="tracelog1" width="909" border="0" align="center">
<?php

//echo  @mysql_num_rows( $sql_query ); die();
$logs = @mysql_query("SELECT * from mylanb where printers like '1200' and type like 'videos' order by timecreate desc");
while($log = mysql_fetch_array( $logs )){
// Bo gio - chi lay ngay
$date = $log['timecreate'];
$createDate = date('Y-m-d', strtotime($date));

echo "<tr>";
echo "<th>". $log['filename']. "</th>";
echo "<th>". $log['type']. "</th>";
echo "<th><a href=\"http://rynantech.com/partner-login/mylanbclick.php?id=".$log['id']."\"><img src='http://www.rynantech.com/partner-login/sites/images/dl.png".$row['image_name']."'></a></th>";
echo "<th>". $log['notes']. "</th>";
echo "<th>". $log['views']. "</th>";
echo "<th>". $createDate. "</th>";
echo "<th><a href=\"mylanbedit.php?id=$log[id]\"><img src='http://www.rynantech.com/partner-login/sites/images/edit.png".$row['image_name']."'></a></th>";
echo "<th><a href=\"mylanbdel.php?id=$log[id]\" onclick=\"return makesure();\"><img src='http://www.rynantech.com/partner-login/sites/images/delete.png".$row['image_name']."'></a></th>";
//echo "<td>". $log['id']. "</td>";
//echo "<td>". $log['printers']. "</td>";
//echo "<td>". $log['link']. "</td>";
//echo "<td>". $log['lastupdate']. "</td>";
//echo "<td>". $log['views']. "</td>";
//echo "<td><a href=\"http://rynantech.com/partner-login/mylanb/VJET/$log[link]\" onclick=\"khoa();\">$log[link]</a></td>";

echo "</tr>";
}
?>

</table>
</div>


     
<div id="1200E-videos" class="tabcontent">
<table id="tracelog1" width="909" border="0" align="center">
<?php

//echo  @mysql_num_rows( $sql_query ); die();
$logs = @mysql_query("SELECT * from mylanb where printers like '1200E' and type like 'videos' order by timecreate desc");
while($log = mysql_fetch_array( $logs )){
// Bo gio - chi lay ngay
$date = $log['timecreate'];
$createDate = date('Y-m-d', strtotime($date));

echo "<tr>";
echo "<th>". $log['filename']. "</th>";
echo "<th>". $log['type']. "</th>";
echo "<th><a href=\"http://rynantech.com/partner-login/mylanbclick.php?id=".$log['id']."\"><img src='http://www.rynantech.com/partner-login/sites/images/dl.png".$row['image_name']."'></a></th>";
echo "<th>". $log['notes']. "</th>";
echo "<th>". $log['views']. "</th>";
echo "<th>". $createDate. "</th>";
echo "<th><a href=\"mylanbedit.php?id=$log[id]\"><img src='http://www.rynantech.com/partner-login/sites/images/edit.png".$row['image_name']."'></a></th>";
echo "<th><a href=\"mylanbdel.php?id=$log[id]\" onclick=\"return makesure();\"><img src='http://www.rynantech.com/partner-login/sites/images/delete.png".$row['image_name']."'></a></th>";
//echo "<td>". $log['id']. "</td>";
//echo "<td>". $log['printers']. "</td>";
//echo "<td>". $log['link']. "</td>";
//echo "<td>". $log['lastupdate']. "</td>";
//echo "<td>". $log['views']. "</td>";
//echo "<td><a href=\"http://rynantech.com/partner-login/mylanb/VJET/$log[link]\" onclick=\"khoa();\">$log[link]</a></td>";

echo "</tr>";
}
?>

</table>
</div>


     
<div id="1200Plus-videos" class="tabcontent">
<table id="tracelog1" width="909" border="0" align="center">
<?php

//echo  @mysql_num_rows( $sql_query ); die();
$logs = @mysql_query("SELECT * from mylanb where printers like '1200Plus' and type like 'videos' order by timecreate desc");
while($log = mysql_fetch_array( $logs )){
// Bo gio - chi lay ngay
$date = $log['timecreate'];
$createDate = date('Y-m-d', strtotime($date));

echo "<tr>";
echo "<th>". $log['filename']. "</th>";
echo "<th>". $log['type']. "</th>";
echo "<th><a href=\"http://rynantech.com/partner-login/mylanbclick.php?id=".$log['id']."\"><img src='http://www.rynantech.com/partner-login/sites/images/dl.png".$row['image_name']."'></a></th>";
echo "<th>". $log['notes']. "</th>";
echo "<th>". $log['views']. "</th>";
echo "<th>". $createDate. "</th>";
echo "<th><a href=\"mylanbedit.php?id=$log[id]\"><img src='http://www.rynantech.com/partner-login/sites/images/edit.png".$row['image_name']."'></a></th>";
echo "<th><a href=\"mylanbdel.php?id=$log[id]\" onclick=\"return makesure();\"><img src='http://www.rynantech.com/partner-login/sites/images/delete.png".$row['image_name']."'></a></th>";
//echo "<td>". $log['id']. "</td>";
//echo "<td>". $log['printers']. "</td>";
//echo "<td>". $log['link']. "</td>";
//echo "<td>". $log['lastupdate']. "</td>";
//echo "<td>". $log['views']. "</td>";
//echo "<td><a href=\"http://rynantech.com/partner-login/mylanb/VJET/$log[link]\" onclick=\"khoa();\">$log[link]</a></td>";

echo "</tr>";
}
?>

</table>
</div>


     
<div id="1200EG-videos" class="tabcontent">
<table id="tracelog1" width="909" border="0" align="center">
<?php

//echo  @mysql_num_rows( $sql_query ); die();
$logs = @mysql_query("SELECT * from mylanb where printers like '1200EG' and type like 'videos' order by timecreate desc");
while($log = mysql_fetch_array( $logs )){
// Bo gio - chi lay ngay
$date = $log['timecreate'];
$createDate = date('Y-m-d', strtotime($date));

echo "<tr>";
echo "<th>". $log['filename']. "</th>";
echo "<th>". $log['type']. "</th>";
echo "<th><a href=\"http://rynantech.com/partner-login/mylanbclick.php?id=".$log['id']."\"><img src='http://www.rynantech.com/partner-login/sites/images/dl.png".$row['image_name']."'></a></th>";
echo "<th>". $log['notes']. "</th>";
echo "<th>". $log['views']. "</th>";
echo "<th>". $createDate. "</th>";
echo "<th><a href=\"mylanbedit.php?id=$log[id]\"><img src='http://www.rynantech.com/partner-login/sites/images/edit.png".$row['image_name']."'></a></th>";
echo "<th><a href=\"mylanbdel.php?id=$log[id]\" onclick=\"return makesure();\"><img src='http://www.rynantech.com/partner-login/sites/images/delete.png".$row['image_name']."'></a></th>";
//echo "<td>". $log['id']. "</td>";
//echo "<td>". $log['printers']. "</td>";
//echo "<td>". $log['link']. "</td>";
//echo "<td>". $log['lastupdate']. "</td>";
//echo "<td>". $log['views']. "</td>";
//echo "<td><a href=\"http://rynantech.com/partner-login/mylanb/VJET/$log[link]\" onclick=\"khoa();\">$log[link]</a></td>";

echo "</tr>";
}
?>

</table>
</div>


     
     
<div id="2172C-videos" class="tabcontent">
<table id="tracelog1" width="909" border="0" align="center">
<?php

//echo  @mysql_num_rows( $sql_query ); die();
$logs = @mysql_query("SELECT * from mylanb where printers like '2172C' and type like 'videos' order by timecreate desc");
while($log = mysql_fetch_array( $logs )){
// Bo gio - chi lay ngay
$date = $log['timecreate'];
$createDate = date('Y-m-d', strtotime($date));

echo "<tr>";
echo "<th>". $log['filename']. "</th>";
echo "<th>". $log['type']. "</th>";
echo "<th><a href=\"http://rynantech.com/partner-login/mylanbclick.php?id=".$log['id']."\"><img src='http://www.rynantech.com/partner-login/sites/images/dl.png".$row['image_name']."'></a></th>";
echo "<th>". $log['notes']. "</th>";
echo "<th>". $log['views']. "</th>";
echo "<th>". $createDate. "</th>";
echo "<th><a href=\"mylanbedit.php?id=$log[id]\"><img src='http://www.rynantech.com/partner-login/sites/images/edit.png".$row['image_name']."'></a></th>";
echo "<th><a href=\"mylanbdel.php?id=$log[id]\" onclick=\"return makesure();\"><img src='http://www.rynantech.com/partner-login/sites/images/delete.png".$row['image_name']."'></a></th>";
//echo "<td>". $log['id']. "</td>";
//echo "<td>". $log['printers']. "</td>";
//echo "<td>". $log['link']. "</td>";
//echo "<td>". $log['lastupdate']. "</td>";
//echo "<td>". $log['views']. "</td>";
//echo "<td><a href=\"http://rynantech.com/partner-login/mylanb/VJET/$log[link]\" onclick=\"khoa();\">$log[link]</a></td>";

echo "</tr>";
}
?>

</table>
</div>


     
<div id="IOJ100-videos" class="tabcontent">
<table id="tracelog1" width="909" border="0" align="center">
<?php

//echo  @mysql_num_rows( $sql_query ); die();
$logs = @mysql_query("SELECT * from mylanb where printers like 'IOJ100' and type like 'videos' order by timecreate desc");
while($log = mysql_fetch_array( $logs )){
// Bo gio - chi lay ngay
$date = $log['timecreate'];
$createDate = date('Y-m-d', strtotime($date));

echo "<tr>";
echo "<th>". $log['filename']. "</th>";
echo "<th>". $log['type']. "</th>";
echo "<th><a href=\"http://rynantech.com/partner-login/mylanbclick.php?id=".$log['id']."\"><img src='http://www.rynantech.com/partner-login/sites/images/dl.png".$row['image_name']."'></a></th>";
echo "<th>". $log['notes']. "</th>";
echo "<th>". $log['views']. "</th>";
echo "<th>". $createDate. "</th>";
echo "<th><a href=\"mylanbedit.php?id=$log[id]\"><img src='http://www.rynantech.com/partner-login/sites/images/edit.png".$row['image_name']."'></a></th>";
echo "<th><a href=\"mylanbdel.php?id=$log[id]\" onclick=\"return makesure();\"><img src='http://www.rynantech.com/partner-login/sites/images/delete.png".$row['image_name']."'></a></th>";
//echo "<td>". $log['id']. "</td>";
//echo "<td>". $log['printers']. "</td>";
//echo "<td>". $log['link']. "</td>";
//echo "<td>". $log['lastupdate']. "</td>";
//echo "<td>". $log['views']. "</td>";
//echo "<td><a href=\"http://rynantech.com/partner-login/mylanb/VJET/$log[link]\" onclick=\"khoa();\">$log[link]</a></td>";

echo "</tr>";
}
?>

</table>
</div>


     
<div id="IOJ200-videos" class="tabcontent">
<table id="tracelog1" width="909" border="0" align="center">
<?php

//echo  @mysql_num_rows( $sql_query ); die();
$logs = @mysql_query("SELECT * from mylanb where printers like 'IOJ200' and type like 'videos' order by timecreate desc");
while($log = mysql_fetch_array( $logs )){
// Bo gio - chi lay ngay
$date = $log['timecreate'];
$createDate = date('Y-m-d', strtotime($date));

echo "<tr>";
echo "<th>". $log['filename']. "</th>";
echo "<th>". $log['type']. "</th>";
echo "<th><a href=\"http://rynantech.com/partner-login/mylanbclick.php?id=".$log['id']."\"><img src='http://www.rynantech.com/partner-login/sites/images/dl.png".$row['image_name']."'></a></th>";
echo "<th>". $log['notes']. "</th>";
echo "<th>". $log['views']. "</th>";
echo "<th>". $createDate. "</th>";
echo "<th><a href=\"mylanbedit.php?id=$log[id]\"><img src='http://www.rynantech.com/partner-login/sites/images/edit.png".$row['image_name']."'></a></th>";
echo "<th><a href=\"mylanbdel.php?id=$log[id]\" onclick=\"return makesure();\"><img src='http://www.rynantech.com/partner-login/sites/images/delete.png".$row['image_name']."'></a></th>";
//echo "<td>". $log['id']. "</td>";
//echo "<td>". $log['printers']. "</td>";
//echo "<td>". $log['link']. "</td>";
//echo "<td>". $log['lastupdate']. "</td>";
//echo "<td>". $log['views']. "</td>";
//echo "<td><a href=\"http://rynantech.com/partner-login/mylanb/VJET/$log[link]\" onclick=\"khoa();\">$log[link]</a></td>";

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
</div>

<div id="RYNAN R20-photos" class="tabcontent" style="display: block;" >
<table id="tracelog1" width="909" border="0" align="center">
<?php

//echo  @mysql_num_rows( $sql_query ); die();
$logs = @mysql_query("SELECT * from mylanb where printers like 'R20 PRO' and type like 'photos' order by timecreate desc");
while($log = mysql_fetch_array( $logs )){
// Bo gio - chi lay ngay
$date = $log['timecreate'];
$createDate = date('Y-m-d', strtotime($date));

echo "<tr>";
echo "<th>". $log['filename']. "</th>";
echo "<th>". $log['type']. "</th>";
echo "<th><a href=\"http://rynantech.com/partner-login/mylanbclick.php?id=".$log['id']."\"><img src='http://www.rynantech.com/partner-login/sites/images/dl.png".$row['image_name']."'></a></th>";
echo "<th>". $log['notes']. "</th>";
echo "<th>". $log['views']. "</th>";
echo "<th>". $createDate. "</th>";
echo "<th><a href=\"mylanbedit.php?id=$log[id]\"><img src='http://www.rynantech.com/partner-login/sites/images/edit.png".$row['image_name']."'></a></th>";
echo "<th><a href=\"mylanbdel.php?id=$log[id]\" onclick=\"return makesure();\"><img src='http://www.rynantech.com/partner-login/sites/images/delete.png".$row['image_name']."'></a></th>";
//echo "<td>". $log['id']. "</td>";
//echo "<td>". $log['printers']. "</td>";
//echo "<td>". $log['link']. "</td>";
//echo "<td>". $log['lastupdate']. "</td>";
//echo "<td>". $log['views']. "</td>";
//echo "<td><a href=\"http://rynantech.com/partner-login/mylanb/VJET/$log[link]\" onclick=\"khoa();\">$log[link]</a></td>";

echo "</tr>";
}
?>

</table>
</div>


<div id="W1000-photos" class="tabcontent" style="display: block;" >
<table id="tracelog1" width="909" border="0" align="center">
<?php

//echo  @mysql_num_rows( $sql_query ); die();
$logs = @mysql_query("SELECT * from mylanb where printers like 'W1000' and type like 'photos' order by timecreate desc");
while($log = mysql_fetch_array( $logs )){
// Bo gio - chi lay ngay
$date = $log['timecreate'];
$createDate = date('Y-m-d', strtotime($date));

echo "<tr>";
echo "<th>". $log['filename']. "</th>";
echo "<th>". $log['type']. "</th>";
echo "<th><a href=\"http://rynantech.com/partner-login/mylanbclick.php?id=".$log['id']."\"><img src='http://www.rynantech.com/partner-login/sites/images/dl.png".$row['image_name']."'></a></th>";
echo "<th>". $log['notes']. "</th>";
echo "<th>". $log['views']. "</th>";
echo "<th>". $createDate. "</th>";
echo "<th><a href=\"mylanbedit.php?id=$log[id]\"><img src='http://www.rynantech.com/partner-login/sites/images/edit.png".$row['image_name']."'></a></th>";
echo "<th><a href=\"mylanbdel.php?id=$log[id]\" onclick=\"return makesure();\"><img src='http://www.rynantech.com/partner-login/sites/images/delete.png".$row['image_name']."'></a></th>";
//echo "<td>". $log['id']. "</td>";
//echo "<td>". $log['printers']. "</td>";
//echo "<td>". $log['link']. "</td>";
//echo "<td>". $log['lastupdate']. "</td>";
//echo "<td>". $log['views']. "</td>";
//echo "<td><a href=\"http://rynantech.com/partner-login/mylanb/VJET/$log[link]\" onclick=\"khoa();\">$log[link]</a></td>";

echo "</tr>";
}
?>

</table>
</div>



<div id="R1010-photos" class="tabcontent">
<table id="tracelog1" width="909" border="0" align="center">
<?php

//echo  @mysql_num_rows( $sql_query ); die();
$logs = @mysql_query("SELECT * from mylanb where printers like 'R1010' and type like 'photos' order by timecreate desc");
while($log = mysql_fetch_array( $logs )){
// Bo gio - chi lay ngay
$date = $log['timecreate'];
$createDate = date('Y-m-d', strtotime($date));

echo "<tr>";
echo "<th>". $log['filename']. "</th>";
echo "<th>". $log['type']. "</th>";
echo "<th><a href=\"http://rynantech.com/partner-login/mylanbclick.php?id=".$log['id']."\"><img src='http://www.rynantech.com/partner-login/sites/images/dl.png".$row['image_name']."'></a></th>";
echo "<th>". $log['notes']. "</th>";
echo "<th>". $log['views']. "</th>";
echo "<th>". $createDate. "</th>";
echo "<th><a href=\"mylanbedit.php?id=$log[id]\"><img src='http://www.rynantech.com/partner-login/sites/images/edit.png".$row['image_name']."'></a></th>";
echo "<th><a href=\"mylanbdel.php?id=$log[id]\" onclick=\"return makesure();\"><img src='http://www.rynantech.com/partner-login/sites/images/delete.png".$row['image_name']."'></a></th>";
//echo "<td>". $log['id']. "</td>";
//echo "<td>". $log['printers']. "</td>";
//echo "<td>". $log['link']. "</td>";
//echo "<td>". $log['lastupdate']. "</td>";
//echo "<td>". $log['views']. "</td>";
//echo "<td><a href=\"http://rynantech.com/partner-login/mylanb/VJET/$log[link]\" onclick=\"khoa();\">$log[link]</a></td>";

echo "</tr>";
}
?>

</table>
</div>




<div id="R1010P-photos" class="tabcontent">
<table id="tracelog1" width="909" border="0" align="center">
<?php

//echo  @mysql_num_rows( $sql_query ); die();
$logs = @mysql_query("SELECT * from mylanb where printers like 'R1010P' and type like 'photos' order by timecreate desc");
while($log = mysql_fetch_array( $logs )){
// Bo gio - chi lay ngay
$date = $log['timecreate'];
$createDate = date('Y-m-d', strtotime($date));

echo "<tr>";
echo "<th>". $log['filename']. "</th>";
echo "<th>". $log['type']. "</th>";
echo "<th><a href=\"http://rynantech.com/partner-login/mylanbclick.php?id=".$log['id']."\"><img src='http://www.rynantech.com/partner-login/sites/images/dl.png".$row['image_name']."'></a></th>";
echo "<th>". $log['notes']. "</th>";
echo "<th>". $log['views']. "</th>";
echo "<th>". $createDate. "</th>";
echo "<th><a href=\"mylanbedit.php?id=$log[id]\"><img src='http://www.rynantech.com/partner-login/sites/images/edit.png".$row['image_name']."'></a></th>";
echo "<th><a href=\"mylanbdel.php?id=$log[id]\" onclick=\"return makesure();\"><img src='http://www.rynantech.com/partner-login/sites/images/delete.png".$row['image_name']."'></a></th>";
//echo "<td>". $log['id']. "</td>";
//echo "<td>". $log['printers']. "</td>";
//echo "<td>". $log['link']. "</td>";
//echo "<td>". $log['lastupdate']. "</td>";
//echo "<td>". $log['views']. "</td>";
//echo "<td><a href=\"http://rynantech.com/partner-login/mylanb/VJET/$log[link]\" onclick=\"khoa();\">$log[link]</a></td>";

echo "</tr>";
}
?>

</table>
</div>




<div id="W1020-photos" class="tabcontent">
<table id="tracelog1" width="909" border="0" align="center">
<?php

//echo  @mysql_num_rows( $sql_query ); die();
$logs = @mysql_query("SELECT * from mylanb where printers like 'W1020' and type like 'photos' order by timecreate desc");
while($log = mysql_fetch_array( $logs )){
// Bo gio - chi lay ngay
$date = $log['timecreate'];
$createDate = date('Y-m-d', strtotime($date));

echo "<tr>";
echo "<th>". $log['filename']. "</th>";
echo "<th>". $log['type']. "</th>";
echo "<th><a href=\"http://rynantech.com/partner-login/mylanbclick.php?id=".$log['id']."\"><img src='http://www.rynantech.com/partner-login/sites/images/dl.png".$row['image_name']."'></a></th>";
echo "<th>". $log['notes']. "</th>";
echo "<th>". $log['views']. "</th>";
echo "<th>". $createDate. "</th>";
echo "<th><a href=\"mylanbedit.php?id=$log[id]\"><img src='http://www.rynantech.com/partner-login/sites/images/edit.png".$row['image_name']."'></a></th>";
echo "<th><a href=\"mylanbdel.php?id=$log[id]\" onclick=\"return makesure();\"><img src='http://www.rynantech.com/partner-login/sites/images/delete.png".$row['image_name']."'></a></th>";
//echo "<td>". $log['id']. "</td>";
//echo "<td>". $log['printers']. "</td>";
//echo "<td>". $log['link']. "</td>";
//echo "<td>". $log['lastupdate']. "</td>";
//echo "<td>". $log['views']. "</td>";
//echo "<td><a href=\"http://rynantech.com/partner-login/mylanb/VJET/$log[link]\" onclick=\"khoa();\">$log[link]</a></td>";

echo "</tr>";
}
?>

</table>
</div>


<div id="B1040-photos" class="tabcontent">
<table id="tracelog1" width="909" border="0" align="center">
<?php

//echo  @mysql_num_rows( $sql_query ); die();
$logs = @mysql_query("SELECT * from mylanb where printers like 'B1040' and type like 'photos' order by timecreate desc");
while($log = mysql_fetch_array( $logs )){
// Bo gio - chi lay ngay
$date = $log['timecreate'];
$createDate = date('Y-m-d', strtotime($date));

echo "<tr>";
echo "<th>". $log['filename']. "</th>";
echo "<th>". $log['type']. "</th>";
echo "<th><a href=\"http://rynantech.com/partner-login/mylanbclick.php?id=".$log['id']."\"><img src='http://www.rynantech.com/partner-login/sites/images/dl.png".$row['image_name']."'></a></th>";
echo "<th>". $log['notes']. "</th>";
echo "<th>". $log['views']. "</th>";
echo "<th>". $createDate. "</th>";
echo "<th><a href=\"mylanbedit.php?id=$log[id]\"><img src='http://www.rynantech.com/partner-login/sites/images/edit.png".$row['image_name']."'></a></th>";
echo "<th><a href=\"mylanbdel.php?id=$log[id]\" onclick=\"return makesure();\"><img src='http://www.rynantech.com/partner-login/sites/images/delete.png".$row['image_name']."'></a></th>";
//echo "<td>". $log['id']. "</td>";
//echo "<td>". $log['printers']. "</td>";
//echo "<td>". $log['link']. "</td>";
//echo "<td>". $log['lastupdate']. "</td>";
//echo "<td>". $log['views']. "</td>";
//echo "<td><a href=\"http://rynantech.com/partner-login/mylanb/VJET/$log[link]\" onclick=\"khoa();\">$log[link]</a></td>";

echo "</tr>";
}
?>

</table>
</div>
     
<div id="B1040H Aluminum-photos" class="tabcontent">
<table id="tracelog1" width="909" border="0" align="center">
<?php

//echo  @mysql_num_rows( $sql_query ); die();
$logs = @mysql_query("SELECT * from mylanb where printers like 'B1040H Aluminum' and type like 'photos' order by timecreate desc");
while($log = mysql_fetch_array( $logs )){
// Bo gio - chi lay ngay
$date = $log['timecreate'];
$createDate = date('Y-m-d', strtotime($date));

echo "<tr>";
echo "<th>". $log['filename']. "</th>";
echo "<th>". $log['type']. "</th>";
echo "<th><a href=\"http://rynantech.com/partner-login/mylanbclick.php?id=".$log['id']."\"><img src='http://www.rynantech.com/partner-login/sites/images/dl.png".$row['image_name']."'></a></th>";
echo "<th>". $log['notes']. "</th>";
echo "<th>". $log['views']. "</th>";
echo "<th>". $createDate. "</th>";
echo "<th><a href=\"mylanbedit.php?id=$log[id]\"><img src='http://www.rynantech.com/partner-login/sites/images/edit.png".$row['image_name']."'></a></th>";
echo "<th><a href=\"mylanbdel.php?id=$log[id]\" onclick=\"return makesure();\"><img src='http://www.rynantech.com/partner-login/sites/images/delete.png".$row['image_name']."'></a></th>";
//echo "<td>". $log['id']. "</td>";
//echo "<td>". $log['printers']. "</td>";
//echo "<td>". $log['link']. "</td>";
//echo "<td>". $log['lastupdate']. "</td>";
//echo "<td>". $log['views']. "</td>";
//echo "<td><a href=\"http://rynantech.com/partner-login/mylanb/VJET/$log[link]\" onclick=\"khoa();\">$log[link]</a></td>";

echo "</tr>";
}
?>

</table>
</div>     
<div id="B1040H Plastic-photos" class="tabcontent">
<table id="tracelog1" width="909" border="0" align="center">
<?php

//echo  @mysql_num_rows( $sql_query ); die();
$logs = @mysql_query("SELECT * from mylanb where printers like 'B1040H Plastic' and type like 'photos' order by timecreate desc");
while($log = mysql_fetch_array( $logs )){
// Bo gio - chi lay ngay
$date = $log['timecreate'];
$createDate = date('Y-m-d', strtotime($date));

echo "<tr>";
echo "<th>". $log['filename']. "</th>";
echo "<th>". $log['type']. "</th>";
echo "<th><a href=\"http://rynantech.com/partner-login/mylanbclick.php?id=".$log['id']."\"><img src='http://www.rynantech.com/partner-login/sites/images/dl.png".$row['image_name']."'></a></th>";
echo "<th>". $log['notes']. "</th>";
echo "<th>". $log['views']. "</th>";
echo "<th>". $createDate. "</th>";
echo "<th><a href=\"mylanbedit.php?id=$log[id]\"><img src='http://www.rynantech.com/partner-login/sites/images/edit.png".$row['image_name']."'></a></th>";
echo "<th><a href=\"mylanbdel.php?id=$log[id]\" onclick=\"return makesure();\"><img src='http://www.rynantech.com/partner-login/sites/images/delete.png".$row['image_name']."'></a></th>";
//echo "<td>". $log['id']. "</td>";
//echo "<td>". $log['printers']. "</td>";
//echo "<td>". $log['link']. "</td>";
//echo "<td>". $log['lastupdate']. "</td>";
//echo "<td>". $log['views']. "</td>";
//echo "<td><a href=\"http://rynantech.com/partner-login/mylanb/VJET/$log[link]\" onclick=\"khoa();\">$log[link]</a></td>";

echo "</tr>";
}
?>

</table>
</div>     
<div id="B1040S-photos" class="tabcontent">
<table id="tracelog1" width="909" border="0" align="center">
<?php

//echo  @mysql_num_rows( $sql_query ); die();
$logs = @mysql_query("SELECT * from mylanb where printers like 'B1040S' and type like 'photos' order by timecreate desc");
while($log = mysql_fetch_array( $logs )){
// Bo gio - chi lay ngay
$date = $log['timecreate'];
$createDate = date('Y-m-d', strtotime($date));

echo "<tr>";
echo "<th>". $log['filename']. "</th>";
echo "<th>". $log['type']. "</th>";
echo "<th><a href=\"http://rynantech.com/partner-login/mylanbclick.php?id=".$log['id']."\"><img src='http://www.rynantech.com/partner-login/sites/images/dl.png".$row['image_name']."'></a></th>";
echo "<th>". $log['notes']. "</th>";
echo "<th>". $log['views']. "</th>";
echo "<th>". $createDate. "</th>";
echo "<th><a href=\"mylanbedit.php?id=$log[id]\"><img src='http://www.rynantech.com/partner-login/sites/images/edit.png".$row['image_name']."'></a></th>";
echo "<th><a href=\"mylanbdel.php?id=$log[id]\" onclick=\"return makesure();\"><img src='http://www.rynantech.com/partner-login/sites/images/delete.png".$row['image_name']."'></a></th>";
//echo "<td>". $log['id']. "</td>";
//echo "<td>". $log['printers']. "</td>";
//echo "<td>". $log['link']. "</td>";
//echo "<td>". $log['lastupdate']. "</td>";
//echo "<td>". $log['views']. "</td>";
//echo "<td><a href=\"http://rynantech.com/partner-login/mylanb/VJET/$log[link]\" onclick=\"khoa();\">$log[link]</a></td>";

echo "</tr>";
}
?>

</table>
</div>     
<div id="B1040P-photos" class="tabcontent">
<table id="tracelog1" width="909" border="0" align="center">
<?php

//echo  @mysql_num_rows( $sql_query ); die();
$logs = @mysql_query("SELECT * from mylanb where printers like 'B1040P' and type like 'photos' order by timecreate desc");
while($log = mysql_fetch_array( $logs )){
// Bo gio - chi lay ngay
$date = $log['timecreate'];
$createDate = date('Y-m-d', strtotime($date));

echo "<tr>";
echo "<th>". $log['filename']. "</th>";
echo "<th>". $log['type']. "</th>";
echo "<th><a href=\"http://rynantech.com/partner-login/mylanbclick.php?id=".$log['id']."\"><img src='http://www.rynantech.com/partner-login/sites/images/dl.png".$row['image_name']."'></a></th>";
echo "<th>". $log['notes']. "</th>";
echo "<th>". $log['views']. "</th>";
echo "<th>". $createDate. "</th>";
echo "<th><a href=\"mylanbedit.php?id=$log[id]\"><img src='http://www.rynantech.com/partner-login/sites/images/edit.png".$row['image_name']."'></a></th>";
echo "<th><a href=\"mylanbdel.php?id=$log[id]\" onclick=\"return makesure();\"><img src='http://www.rynantech.com/partner-login/sites/images/delete.png".$row['image_name']."'></a></th>";
//echo "<td>". $log['id']. "</td>";
//echo "<td>". $log['printers']. "</td>";
//echo "<td>". $log['link']. "</td>";
//echo "<td>". $log['lastupdate']. "</td>";
//echo "<td>". $log['views']. "</td>";
//echo "<td><a href=\"http://rynantech.com/partner-login/mylanb/VJET/$log[link]\" onclick=\"khoa();\">$log[link]</a></td>";

echo "</tr>";
}
?>

</table>
</div>





<div id="B1060-photos" class="tabcontent">
<table id="tracelog1" width="909" border="0" align="center">
<?php

//echo  @mysql_num_rows( $sql_query ); die();
$logs = @mysql_query("SELECT * from mylanb where printers like 'B1060' and type like 'photos' order by timecreate desc");
while($log = mysql_fetch_array( $logs )){
// Bo gio - chi lay ngay
$date = $log['timecreate'];
$createDate = date('Y-m-d', strtotime($date));

echo "<tr>";
echo "<th>". $log['filename']. "</th>";
echo "<th>". $log['type']. "</th>";
echo "<th><a href=\"http://rynantech.com/partner-login/mylanbclick.php?id=".$log['id']."\"><img src='http://www.rynantech.com/partner-login/sites/images/dl.png".$row['image_name']."'></a></th>";
echo "<th>". $log['notes']. "</th>";
echo "<th>". $log['views']. "</th>";
echo "<th>". $createDate. "</th>";
echo "<th><a href=\"mylanbedit.php?id=$log[id]\"><img src='http://www.rynantech.com/partner-login/sites/images/edit.png".$row['image_name']."'></a></th>";
echo "<th><a href=\"mylanbdel.php?id=$log[id]\" onclick=\"return makesure();\"><img src='http://www.rynantech.com/partner-login/sites/images/delete.png".$row['image_name']."'></a></th>";
//echo "<td>". $log['id']. "</td>";
//echo "<td>". $log['printers']. "</td>";
//echo "<td>". $log['link']. "</td>";
//echo "<td>". $log['lastupdate']. "</td>";
//echo "<td>". $log['views']. "</td>";
//echo "<td><a href=\"http://rynantech.com/partner-login/mylanb/VJET/$log[link]\" onclick=\"khoa();\">$log[link]</a></td>";

echo "</tr>";
}
?>

</table>
</div>

     <div id="B1060P-photos" class="tabcontent">
<table id="tracelog1" width="909" border="0" align="center">
<?php

//echo  @mysql_num_rows( $sql_query ); die();
$logs = @mysql_query("SELECT * from mylanb where printers like 'B1060P' and type like 'photos' order by timecreate desc");
while($log = mysql_fetch_array( $logs )){
// Bo gio - chi lay ngay
$date = $log['timecreate'];
$createDate = date('Y-m-d', strtotime($date));

echo "<tr>";
echo "<th>". $log['filename']. "</th>";
echo "<th>". $log['type']. "</th>";
echo "<th><a href=\"http://rynantech.com/partner-login/mylanbclick.php?id=".$log['id']."\"><img src='http://www.rynantech.com/partner-login/sites/images/dl.png".$row['image_name']."'></a></th>";
echo "<th>". $log['notes']. "</th>";
echo "<th>". $log['views']. "</th>";
echo "<th>". $createDate. "</th>";
echo "<th><a href=\"mylanbedit.php?id=$log[id]\"><img src='http://www.rynantech.com/partner-login/sites/images/edit.png".$row['image_name']."'></a></th>";
echo "<th><a href=\"mylanbdel.php?id=$log[id]\" onclick=\"return makesure();\"><img src='http://www.rynantech.com/partner-login/sites/images/delete.png".$row['image_name']."'></a></th>";
//echo "<td>". $log['id']. "</td>";
//echo "<td>". $log['printers']. "</td>";
//echo "<td>". $log['link']. "</td>";
//echo "<td>". $log['lastupdate']. "</td>";
//echo "<td>". $log['views']. "</td>";
//echo "<td><a href=\"http://rynantech.com/partner-login/mylanb/VJET/$log[link]\" onclick=\"khoa();\">$log[link]</a></td>";

echo "</tr>";
}
?>

</table>
</div>

     <div id="B1060H-photos" class="tabcontent">
<table id="tracelog1" width="909" border="0" align="center">
<?php

//echo  @mysql_num_rows( $sql_query ); die();
$logs = @mysql_query("SELECT * from mylanb where printers like 'B1060H' and type like 'photos' order by timecreate desc");
while($log = mysql_fetch_array( $logs )){
// Bo gio - chi lay ngay
$date = $log['timecreate'];
$createDate = date('Y-m-d', strtotime($date));

echo "<tr>";
echo "<th>". $log['filename']. "</th>";
echo "<th>". $log['type']. "</th>";
echo "<th><a href=\"http://rynantech.com/partner-login/mylanbclick.php?id=".$log['id']."\"><img src='http://www.rynantech.com/partner-login/sites/images/dl.png".$row['image_name']."'></a></th>";
echo "<th>". $log['notes']. "</th>";
echo "<th>". $log['views']. "</th>";
echo "<th>". $createDate. "</th>";
echo "<th><a href=\"mylanbedit.php?id=$log[id]\"><img src='http://www.rynantech.com/partner-login/sites/images/edit.png".$row['image_name']."'></a></th>";
echo "<th><a href=\"mylanbdel.php?id=$log[id]\" onclick=\"return makesure();\"><img src='http://www.rynantech.com/partner-login/sites/images/delete.png".$row['image_name']."'></a></th>";
//echo "<td>". $log['id']. "</td>";
//echo "<td>". $log['printers']. "</td>";
//echo "<td>". $log['link']. "</td>";
//echo "<td>". $log['lastupdate']. "</td>";
//echo "<td>". $log['views']. "</td>";
//echo "<td><a href=\"http://rynantech.com/partner-login/mylanb/VJET/$log[link]\" onclick=\"khoa();\">$log[link]</a></td>";

echo "</tr>";
}
?>

</table>
</div>

     

     
<div id="1200-photos" class="tabcontent">
<table id="tracelog1" width="909" border="0" align="center">
<?php

//echo  @mysql_num_rows( $sql_query ); die();
$logs = @mysql_query("SELECT * from mylanb where printers like '1200' and type like 'photos' order by timecreate desc");
while($log = mysql_fetch_array( $logs )){
// Bo gio - chi lay ngay
$date = $log['timecreate'];
$createDate = date('Y-m-d', strtotime($date));

echo "<tr>";
echo "<th>". $log['filename']. "</th>";
echo "<th>". $log['type']. "</th>";
echo "<th><a href=\"http://rynantech.com/partner-login/mylanbclick.php?id=".$log['id']."\"><img src='http://www.rynantech.com/partner-login/sites/images/dl.png".$row['image_name']."'></a></th>";
echo "<th>". $log['notes']. "</th>";
echo "<th>". $log['views']. "</th>";
echo "<th>". $createDate. "</th>";
echo "<th><a href=\"mylanbedit.php?id=$log[id]\"><img src='http://www.rynantech.com/partner-login/sites/images/edit.png".$row['image_name']."'></a></th>";
echo "<th><a href=\"mylanbdel.php?id=$log[id]\" onclick=\"return makesure();\"><img src='http://www.rynantech.com/partner-login/sites/images/delete.png".$row['image_name']."'></a></th>";
//echo "<td>". $log['id']. "</td>";
//echo "<td>". $log['printers']. "</td>";
//echo "<td>". $log['link']. "</td>";
//echo "<td>". $log['lastupdate']. "</td>";
//echo "<td>". $log['views']. "</td>";
//echo "<td><a href=\"http://rynantech.com/partner-login/mylanb/VJET/$log[link]\" onclick=\"khoa();\">$log[link]</a></td>";

echo "</tr>";
}
?>

</table>
</div>


     
<div id="1200E-photos" class="tabcontent">
<table id="tracelog1" width="909" border="0" align="center">
<?php

//echo  @mysql_num_rows( $sql_query ); die();
$logs = @mysql_query("SELECT * from mylanb where printers like '1200E' and type like 'photos' order by timecreate desc");
while($log = mysql_fetch_array( $logs )){
// Bo gio - chi lay ngay
$date = $log['timecreate'];
$createDate = date('Y-m-d', strtotime($date));

echo "<tr>";
echo "<th>". $log['filename']. "</th>";
echo "<th>". $log['type']. "</th>";
echo "<th><a href=\"http://rynantech.com/partner-login/mylanbclick.php?id=".$log['id']."\"><img src='http://www.rynantech.com/partner-login/sites/images/dl.png".$row['image_name']."'></a></th>";
echo "<th>". $log['notes']. "</th>";
echo "<th>". $log['views']. "</th>";
echo "<th>". $createDate. "</th>";
echo "<th><a href=\"mylanbedit.php?id=$log[id]\"><img src='http://www.rynantech.com/partner-login/sites/images/edit.png".$row['image_name']."'></a></th>";
echo "<th><a href=\"mylanbdel.php?id=$log[id]\" onclick=\"return makesure();\"><img src='http://www.rynantech.com/partner-login/sites/images/delete.png".$row['image_name']."'></a></th>";
//echo "<td>". $log['id']. "</td>";
//echo "<td>". $log['printers']. "</td>";
//echo "<td>". $log['link']. "</td>";
//echo "<td>". $log['lastupdate']. "</td>";
//echo "<td>". $log['views']. "</td>";
//echo "<td><a href=\"http://rynantech.com/partner-login/mylanb/VJET/$log[link]\" onclick=\"khoa();\">$log[link]</a></td>";

echo "</tr>";
}
?>

</table>
</div>


     
<div id="1200Plus-photos" class="tabcontent">
<table id="tracelog1" width="909" border="0" align="center">
<?php

//echo  @mysql_num_rows( $sql_query ); die();
$logs = @mysql_query("SELECT * from mylanb where printers like '1200Plus' and type like 'photos' order by timecreate desc");
while($log = mysql_fetch_array( $logs )){
// Bo gio - chi lay ngay
$date = $log['timecreate'];
$createDate = date('Y-m-d', strtotime($date));

echo "<tr>";
echo "<th>". $log['filename']. "</th>";
echo "<th>". $log['type']. "</th>";
echo "<th><a href=\"http://rynantech.com/partner-login/mylanbclick.php?id=".$log['id']."\"><img src='http://www.rynantech.com/partner-login/sites/images/dl.png".$row['image_name']."'></a></th>";
echo "<th>". $log['notes']. "</th>";
echo "<th>". $log['views']. "</th>";
echo "<th>". $createDate. "</th>";
echo "<th><a href=\"mylanbedit.php?id=$log[id]\"><img src='http://www.rynantech.com/partner-login/sites/images/edit.png".$row['image_name']."'></a></th>";
echo "<th><a href=\"mylanbdel.php?id=$log[id]\" onclick=\"return makesure();\"><img src='http://www.rynantech.com/partner-login/sites/images/delete.png".$row['image_name']."'></a></th>";
//echo "<td>". $log['id']. "</td>";
//echo "<td>". $log['printers']. "</td>";
//echo "<td>". $log['link']. "</td>";
//echo "<td>". $log['lastupdate']. "</td>";
//echo "<td>". $log['views']. "</td>";
//echo "<td><a href=\"http://rynantech.com/partner-login/mylanb/VJET/$log[link]\" onclick=\"khoa();\">$log[link]</a></td>";

echo "</tr>";
}
?>

</table>
</div>


     
<div id="1200EG-photos" class="tabcontent">
<table id="tracelog1" width="909" border="0" align="center">
<?php

//echo  @mysql_num_rows( $sql_query ); die();
$logs = @mysql_query("SELECT * from mylanb where printers like '1200EG' and type like 'photos' order by timecreate desc");
while($log = mysql_fetch_array( $logs )){
// Bo gio - chi lay ngay
$date = $log['timecreate'];
$createDate = date('Y-m-d', strtotime($date));

echo "<tr>";
echo "<th>". $log['filename']. "</th>";
echo "<th>". $log['type']. "</th>";
echo "<th><a href=\"http://rynantech.com/partner-login/mylanbclick.php?id=".$log['id']."\"><img src='http://www.rynantech.com/partner-login/sites/images/dl.png".$row['image_name']."'></a></th>";
echo "<th>". $log['notes']. "</th>";
echo "<th>". $log['views']. "</th>";
echo "<th>". $createDate. "</th>";
echo "<th><a href=\"mylanbedit.php?id=$log[id]\"><img src='http://www.rynantech.com/partner-login/sites/images/edit.png".$row['image_name']."'></a></th>";
echo "<th><a href=\"mylanbdel.php?id=$log[id]\" onclick=\"return makesure();\"><img src='http://www.rynantech.com/partner-login/sites/images/delete.png".$row['image_name']."'></a></th>";
//echo "<td>". $log['id']. "</td>";
//echo "<td>". $log['printers']. "</td>";
//echo "<td>". $log['link']. "</td>";
//echo "<td>". $log['lastupdate']. "</td>";
//echo "<td>". $log['views']. "</td>";
//echo "<td><a href=\"http://rynantech.com/partner-login/mylanb/VJET/$log[link]\" onclick=\"khoa();\">$log[link]</a></td>";

echo "</tr>";
}
?>

</table>
</div>


     
     
<div id="2172C-photos" class="tabcontent">
<table id="tracelog1" width="909" border="0" align="center">
<?php

//echo  @mysql_num_rows( $sql_query ); die();
$logs = @mysql_query("SELECT * from mylanb where printers like '2172C' and type like 'photos' order by timecreate desc");
while($log = mysql_fetch_array( $logs )){
// Bo gio - chi lay ngay
$date = $log['timecreate'];
$createDate = date('Y-m-d', strtotime($date));

echo "<tr>";
echo "<th>". $log['filename']. "</th>";
echo "<th>". $log['type']. "</th>";
echo "<th><a href=\"http://rynantech.com/partner-login/mylanbclick.php?id=".$log['id']."\"><img src='http://www.rynantech.com/partner-login/sites/images/dl.png".$row['image_name']."'></a></th>";
echo "<th>". $log['notes']. "</th>";
echo "<th>". $log['views']. "</th>";
echo "<th>". $createDate. "</th>";
echo "<th><a href=\"mylanbedit.php?id=$log[id]\"><img src='http://www.rynantech.com/partner-login/sites/images/edit.png".$row['image_name']."'></a></th>";
echo "<th><a href=\"mylanbdel.php?id=$log[id]\" onclick=\"return makesure();\"><img src='http://www.rynantech.com/partner-login/sites/images/delete.png".$row['image_name']."'></a></th>";
//echo "<td>". $log['id']. "</td>";
//echo "<td>". $log['printers']. "</td>";
//echo "<td>". $log['link']. "</td>";
//echo "<td>". $log['lastupdate']. "</td>";
//echo "<td>". $log['views']. "</td>";
//echo "<td><a href=\"http://rynantech.com/partner-login/mylanb/VJET/$log[link]\" onclick=\"khoa();\">$log[link]</a></td>";

echo "</tr>";
}
?>

</table>
</div>


     
<div id="IOJ100-photos" class="tabcontent">
<table id="tracelog1" width="909" border="0" align="center">
<?php

//echo  @mysql_num_rows( $sql_query ); die();
$logs = @mysql_query("SELECT * from mylanb where printers like 'IOJ100' and type like 'photos' order by timecreate desc");
while($log = mysql_fetch_array( $logs )){
// Bo gio - chi lay ngay
$date = $log['timecreate'];
$createDate = date('Y-m-d', strtotime($date));

echo "<tr>";
echo "<th>". $log['filename']. "</th>";
echo "<th>". $log['type']. "</th>";
echo "<th><a href=\"http://rynantech.com/partner-login/mylanbclick.php?id=".$log['id']."\"><img src='http://www.rynantech.com/partner-login/sites/images/dl.png".$row['image_name']."'></a></th>";
echo "<th>". $log['notes']. "</th>";
echo "<th>". $log['views']. "</th>";
echo "<th>". $createDate. "</th>";
echo "<th><a href=\"mylanbedit.php?id=$log[id]\"><img src='http://www.rynantech.com/partner-login/sites/images/edit.png".$row['image_name']."'></a></th>";
echo "<th><a href=\"mylanbdel.php?id=$log[id]\" onclick=\"return makesure();\"><img src='http://www.rynantech.com/partner-login/sites/images/delete.png".$row['image_name']."'></a></th>";
//echo "<td>". $log['id']. "</td>";
//echo "<td>". $log['printers']. "</td>";
//echo "<td>". $log['link']. "</td>";
//echo "<td>". $log['lastupdate']. "</td>";
//echo "<td>". $log['views']. "</td>";
//echo "<td><a href=\"http://rynantech.com/partner-login/mylanb/VJET/$log[link]\" onclick=\"khoa();\">$log[link]</a></td>";

echo "</tr>";
}
?>

</table>
</div>


     
<div id="IOJ200-photos" class="tabcontent">
<table id="tracelog1" width="909" border="0" align="center">
<?php

//echo  @mysql_num_rows( $sql_query ); die();
$logs = @mysql_query("SELECT * from mylanb where printers like 'IOJ200' and type like 'photos' order by timecreate desc");
while($log = mysql_fetch_array( $logs )){
// Bo gio - chi lay ngay
$date = $log['timecreate'];
$createDate = date('Y-m-d', strtotime($date));

echo "<tr>";
echo "<th>". $log['filename']. "</th>";
echo "<th>". $log['type']. "</th>";
echo "<th><a href=\"http://rynantech.com/partner-login/mylanbclick.php?id=".$log['id']."\"><img src='http://www.rynantech.com/partner-login/sites/images/dl.png".$row['image_name']."'></a></th>";
echo "<th>". $log['notes']. "</th>";
echo "<th>". $log['views']. "</th>";
echo "<th>". $createDate. "</th>";
echo "<th><a href=\"mylanbedit.php?id=$log[id]\"><img src='http://www.rynantech.com/partner-login/sites/images/edit.png".$row['image_name']."'></a></th>";
echo "<th><a href=\"mylanbdel.php?id=$log[id]\" onclick=\"return makesure();\"><img src='http://www.rynantech.com/partner-login/sites/images/delete.png".$row['image_name']."'></a></th>";
//echo "<td>". $log['id']. "</td>";
//echo "<td>". $log['printers']. "</td>";
//echo "<td>". $log['link']. "</td>";
//echo "<td>". $log['lastupdate']. "</td>";
//echo "<td>". $log['views']. "</td>";
//echo "<td><a href=\"http://rynantech.com/partner-login/mylanb/VJET/$log[link]\" onclick=\"khoa();\">$log[link]</a></td>";

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
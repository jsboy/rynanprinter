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
<title>ADMIN - hitachi</title>

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
		<div><p align="justify" class="mem_acc">&nbsp;&nbsp;&nbsp;&nbsp;ADMIN - hitachi</p></div>
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
<td><a href="/partner-login/hitachicre.php" class="hrlink"> <img src="sites/images/createdownload.png" border="0" /></a></td>
</tr>
</table>
</div>


<!-- FIRMWARE -->
<div class="onecolumntitle">
<div class="header">
      <span>FIRMWARE</span>
</div></div>
<div class="tab">
  <button class="tablinks" onclick="openCity(event, 'HTJ-1100')">HTJ-1100</button>
  <button class="tablinks" onclick="openCity(event, 'HTJ-4400')">HTJ-4400</button>
</div>

<div id="HTJ-1100" class="tabcontent" style="display: block;" >
<table id="tracelog1" width="909" border="0" align="center">
<?php

//echo  @mysql_num_rows( $sql_query ); die();
$logs = @mysql_query("SELECT * from hitachi where printers like 'HTJ-1100' and type like 'Firmware' order by timecreate desc");
while($log = mysql_fetch_array( $logs )){
// Bo gio - chi lay ngay
$date = $log['timecreate'];
$createDate = date('Y-m-d', strtotime($date));

echo "<tr>";
echo "<th>". $log['filename']. "</th>";
echo "<th>". $log['type']. "</th>";
echo "<th><a href=\"http://rynantech.com/partner-login/hitachiclick.php?id=".$log['id']."\"><img src='http://www.rynantech.com/partner-login/sites/images/dl.png".$row['image_name']."'></a></th>";
echo "<th>". $log['notes']. "</th>";
echo "<th>". $log['views']. "</th>";
echo "<th>". $createDate. "</th>";
echo "<th><a href=\"hitachiedit.php?id=$log[id]\"><img src='http://www.rynantech.com/partner-login/sites/images/edit.png".$row['image_name']."'></a></th>";
echo "<th><a href=\"hitachidel.php?id=$log[id]\" onclick=\"return makesure();\"><img src='http://www.rynantech.com/partner-login/sites/images/delete.png".$row['image_name']."'></a></th>";
//echo "<td>". $log['id']. "</td>";
//echo "<td>". $log['printers']. "</td>";
//echo "<td>". $log['link']. "</td>";
//echo "<td>". $log['lastupdate']. "</td>";
//echo "<td>". $log['views']. "</td>";
//echo "<td><a href=\"http://rynantech.com/partner-login/hitachi/VJET/$log[link]\" onclick=\"khoa();\">$log[link]</a></td>";

echo "</tr>";
}
?>

</table>
</div>

<div id="HTJ-4400" class="tabcontent">
<table id="tracelog1" width="909" border="0" align="center">
<?php

//echo  @mysql_num_rows( $sql_query ); die();
$logs = @mysql_query("SELECT * from hitachi where printers like 'HTJ-4400' and type like 'Firmware' order by timecreate desc");
while($log = mysql_fetch_array( $logs )){
// Bo gio - chi lay ngay
$date = $log['timecreate'];
$createDate = date('Y-m-d', strtotime($date));

echo "<tr>";
echo "<th>". $log['filename']. "</th>";
echo "<th>". $log['type']. "</th>";
echo "<th><a href=\"http://rynantech.com/partner-login/hitachiclick.php?id=".$log['id']."\"><img src='http://www.rynantech.com/partner-login/sites/images/dl.png".$row['image_name']."'></a></th>";
echo "<th>". $log['notes']. "</th>";
echo "<th>". $log['views']. "</th>";
echo "<th>". $createDate. "</th>";
echo "<th><a href=\"hitachiedit.php?id=$log[id]\"><img src='http://www.rynantech.com/partner-login/sites/images/edit.png".$row['image_name']."'></a></th>";
echo "<th><a href=\"hitachidel.php?id=$log[id]\" onclick=\"return makesure();\"><img src='http://www.rynantech.com/partner-login/sites/images/delete.png".$row['image_name']."'></a></th>";
//echo "<td>". $log['id']. "</td>";
//echo "<td>". $log['printers']. "</td>";
//echo "<td>". $log['link']. "</td>";
//echo "<td>". $log['lastupdate']. "</td>";
//echo "<td>". $log['views']. "</td>";
//echo "<td><a href=\"http://rynantech.com/partner-login/hitachi/VJET/$log[link]\" onclick=\"khoa();\">$log[link]</a></td>";

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
  <button class="tablinks" onclick="openCity(event, 'HTJ-1100-sw')">HTJ-1100</button>
  <button class="tablinks" onclick="openCity(event, 'HTJ-4400-sw')">HTJ-4400</button>
</div>

<div id="HTJ-1100-sw" class="tabcontent" style="display: block;" >
<table id="tracelog1" width="909" border="0" align="center">
<?php

//echo  @mysql_num_rows( $sql_query ); die();
$logs = @mysql_query("SELECT * from hitachi where printers like 'HTJ-1100' and type like 'software' order by timecreate desc");
while($log = mysql_fetch_array( $logs )){
// Bo gio - chi lay ngay
$date = $log['timecreate'];
$createDate = date('Y-m-d', strtotime($date));

echo "<tr>";
echo "<th>". $log['filename']. "</th>";
echo "<th>". $log['type']. "</th>";
echo "<th><a href=\"http://rynantech.com/partner-login/hitachiclick.php?id=".$log['id']."\"><img src='http://www.rynantech.com/partner-login/sites/images/dl.png".$row['image_name']."'></a></th>";
echo "<th>". $log['notes']. "</th>";
echo "<th>". $log['views']. "</th>";
echo "<th>". $createDate. "</th>";
echo "<th><a href=\"hitachiedit.php?id=$log[id]\"><img src='http://www.rynantech.com/partner-login/sites/images/edit.png".$row['image_name']."'></a></th>";
echo "<th><a href=\"hitachidel.php?id=$log[id]\" onclick=\"return makesure();\"><img src='http://www.rynantech.com/partner-login/sites/images/delete.png".$row['image_name']."'></a></th>";
//echo "<td>". $log['id']. "</td>";
//echo "<td>". $log['printers']. "</td>";
//echo "<td>". $log['link']. "</td>";
//echo "<td>". $log['lastupdate']. "</td>";
//echo "<td>". $log['views']. "</td>";
//echo "<td><a href=\"http://rynantech.com/partner-login/hitachi/VJET/$log[link]\" onclick=\"khoa();\">$log[link]</a></td>";

echo "</tr>";
}
?>

</table>
</div>


<div id="HTJ-4400-sw" class="tabcontent">
<table id="tracelog1" width="909" border="0" align="center">
<?php

//echo  @mysql_num_rows( $sql_query ); die();
$logs = @mysql_query("SELECT * from hitachi where printers like 'HTJ-4400' and type like 'software' order by timecreate desc");
while($log = mysql_fetch_array( $logs )){
// Bo gio - chi lay ngay
$date = $log['timecreate'];
$createDate = date('Y-m-d', strtotime($date));

echo "<tr>";
echo "<th>". $log['filename']. "</th>";
echo "<th>". $log['type']. "</th>";
echo "<th><a href=\"http://rynantech.com/partner-login/hitachiclick.php?id=".$log['id']."\"><img src='http://www.rynantech.com/partner-login/sites/images/dl.png".$row['image_name']."'></a></th>";
echo "<th>". $log['notes']. "</th>";
echo "<th>". $log['views']. "</th>";
echo "<th>". $createDate. "</th>";
echo "<th><a href=\"hitachiedit.php?id=$log[id]\"><img src='http://www.rynantech.com/partner-login/sites/images/edit.png".$row['image_name']."'></a></th>";
echo "<th><a href=\"hitachidel.php?id=$log[id]\" onclick=\"return makesure();\"><img src='http://www.rynantech.com/partner-login/sites/images/delete.png".$row['image_name']."'></a></th>";
//echo "<td>". $log['id']. "</td>";
//echo "<td>". $log['printers']. "</td>";
//echo "<td>". $log['link']. "</td>";
//echo "<td>". $log['lastupdate']. "</td>";
//echo "<td>". $log['views']. "</td>";
//echo "<td><a href=\"http://rynantech.com/partner-login/hitachi/VJET/$log[link]\" onclick=\"khoa();\">$log[link]</a></td>";

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
  <button class="tablinks" onclick="openCity(event, 'HTJ-1100-br')">HTJ-1100</button>
  <button class="tablinks" onclick="openCity(event, 'HTJ-4400-br')">HTJ-4400</button>
</div>

<div id="HTJ-1100-br" class="tabcontent" style="display: block;" >
<table id="tracelog1" width="909" border="0" align="center">
<?php

//echo  @mysql_num_rows( $sql_query ); die();
$logs = @mysql_query("SELECT * from hitachi where printers like 'HTJ-1100' and type like 'brochure' order by timecreate desc");
while($log = mysql_fetch_array( $logs )){
// Bo gio - chi lay ngay
$date = $log['timecreate'];
$createDate = date('Y-m-d', strtotime($date));

echo "<tr>";
echo "<th>". $log['filename']. "</th>";
echo "<th>". $log['type']. "</th>";
echo "<th><a href=\"http://rynantech.com/partner-login/hitachiclick.php?id=".$log['id']."\"><img src='http://www.rynantech.com/partner-login/sites/images/dl.png".$row['image_name']."'></a></th>";
echo "<th>". $log['notes']. "</th>";
echo "<th>". $log['views']. "</th>";
echo "<th>". $createDate. "</th>";
echo "<th><a href=\"hitachiedit.php?id=$log[id]\"><img src='http://www.rynantech.com/partner-login/sites/images/edit.png".$row['image_name']."'></a></th>";
echo "<th><a href=\"hitachidel.php?id=$log[id]\" onclick=\"return makesure();\"><img src='http://www.rynantech.com/partner-login/sites/images/delete.png".$row['image_name']."'></a></th>";
//echo "<td>". $log['id']. "</td>";
//echo "<td>". $log['printers']. "</td>";
//echo "<td>". $log['link']. "</td>";
//echo "<td>". $log['lastupdate']. "</td>";
//echo "<td>". $log['views']. "</td>";
//echo "<td><a href=\"http://rynantech.com/partner-login/hitachi/VJET/$log[link]\" onclick=\"khoa();\">$log[link]</a></td>";

echo "</tr>";
}
?>

</table>
</div>


<div id="HTJ-4400-br" class="tabcontent" style="display: block;" >
<table id="tracelog1" width="909" border="0" align="center">
<?php

//echo  @mysql_num_rows( $sql_query ); die();
$logs = @mysql_query("SELECT * from hitachi where printers like 'HTJ-4400' and type like 'brochure' order by timecreate desc");
while($log = mysql_fetch_array( $logs )){
// Bo gio - chi lay ngay
$date = $log['timecreate'];
$createDate = date('Y-m-d', strtotime($date));

echo "<tr>";
echo "<th>". $log['filename']. "</th>";
echo "<th>". $log['type']. "</th>";
echo "<th><a href=\"http://rynantech.com/partner-login/hitachiclick.php?id=".$log['id']."\"><img src='http://www.rynantech.com/partner-login/sites/images/dl.png".$row['image_name']."'></a></th>";
echo "<th>". $log['notes']. "</th>";
echo "<th>". $log['views']. "</th>";
echo "<th>". $createDate. "</th>";
echo "<th><a href=\"hitachiedit.php?id=$log[id]\"><img src='http://www.rynantech.com/partner-login/sites/images/edit.png".$row['image_name']."'></a></th>";
echo "<th><a href=\"hitachidel.php?id=$log[id]\" onclick=\"return makesure();\"><img src='http://www.rynantech.com/partner-login/sites/images/delete.png".$row['image_name']."'></a></th>";
//echo "<td>". $log['id']. "</td>";
//echo "<td>". $log['printers']. "</td>";
//echo "<td>". $log['link']. "</td>";
//echo "<td>". $log['lastupdate']. "</td>";
//echo "<td>". $log['views']. "</td>";
//echo "<td><a href=\"http://rynantech.com/partner-login/hitachi/VJET/$log[link]\" onclick=\"khoa();\">$log[link]</a></td>";

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
  <button class="tablinks" onclick="openCity(event, 'HTJ-1100-us')">HTJ-1100</button>
  <button class="tablinks" onclick="openCity(event, 'HTJ-4400-us')">HTJ-4400</button>
</div>

<div id="HTJ-1100-us" class="tabcontent" style="display: block;" >
<table id="tracelog1" width="909" border="0" align="center">
<?php

//echo  @mysql_num_rows( $sql_query ); die();
$logs = @mysql_query("SELECT * from hitachi where printers like 'HTJ-1100' and type like 'User Manual' order by timecreate desc");
while($log = mysql_fetch_array( $logs )){
// Bo gio - chi lay ngay
$date = $log['timecreate'];
$createDate = date('Y-m-d', strtotime($date));

echo "<tr>";
echo "<th>". $log['filename']. "</th>";
echo "<th>". $log['type']. "</th>";
echo "<th><a href=\"http://rynantech.com/partner-login/hitachiclick.php?id=".$log['id']."\"><img src='http://www.rynantech.com/partner-login/sites/images/dl.png".$row['image_name']."'></a></th>";
echo "<th>". $log['notes']. "</th>";
echo "<th>". $log['views']. "</th>";
echo "<th>". $createDate. "</th>";
echo "<th><a href=\"hitachiedit.php?id=$log[id]\"><img src='http://www.rynantech.com/partner-login/sites/images/edit.png".$row['image_name']."'></a></th>";
echo "<th><a href=\"hitachidel.php?id=$log[id]\" onclick=\"return makesure();\"><img src='http://www.rynantech.com/partner-login/sites/images/delete.png".$row['image_name']."'></a></th>";
//echo "<td>". $log['id']. "</td>";
//echo "<td>". $log['printers']. "</td>";
//echo "<td>". $log['link']. "</td>";
//echo "<td>". $log['lastupdate']. "</td>";
//echo "<td>". $log['views']. "</td>";
//echo "<td><a href=\"http://rynantech.com/partner-login/hitachi/VJET/$log[link]\" onclick=\"khoa();\">$log[link]</a></td>";

echo "</tr>";
}
?>

</table>
</div>

<div id="HTJ-4400-us" class="tabcontent">
<table id="tracelog1" width="909" border="0" align="center">
<?php

//echo  @mysql_num_rows( $sql_query ); die();
$logs = @mysql_query("SELECT * from hitachi where printers like 'HTJ-4400' and type like 'User Manual' order by timecreate desc");
while($log = mysql_fetch_array( $logs )){
// Bo gio - chi lay ngay
$date = $log['timecreate'];
$createDate = date('Y-m-d', strtotime($date));

echo "<tr>";
echo "<th>". $log['filename']. "</th>";
echo "<th>". $log['type']. "</th>";
echo "<th><a href=\"http://rynantech.com/partner-login/hitachiclick.php?id=".$log['id']."\"><img src='http://www.rynantech.com/partner-login/sites/images/dl.png".$row['image_name']."'></a></th>";
echo "<th>". $log['notes']. "</th>";
echo "<th>". $log['views']. "</th>";
echo "<th>". $createDate. "</th>";
echo "<th><a href=\"hitachiedit.php?id=$log[id]\"><img src='http://www.rynantech.com/partner-login/sites/images/edit.png".$row['image_name']."'></a></th>";
echo "<th><a href=\"hitachidel.php?id=$log[id]\" onclick=\"return makesure();\"><img src='http://www.rynantech.com/partner-login/sites/images/delete.png".$row['image_name']."'></a></th>";
//echo "<td>". $log['id']. "</td>";
//echo "<td>". $log['printers']. "</td>";
//echo "<td>". $log['link']. "</td>";
//echo "<td>". $log['lastupdate']. "</td>";
//echo "<td>". $log['views']. "</td>";
//echo "<td><a href=\"http://rynantech.com/partner-login/hitachi/VJET/$log[link]\" onclick=\"khoa();\">$log[link]</a></td>";

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
  <button class="tablinks" onclick="openCity(event, 'HTJ-1100-videos')">HTJ-1100</button>
  <button class="tablinks" onclick="openCity(event, 'HTJ-4400-videos')">HTJ-4400</button>
</div>

<div id="HTJ-1100-us" class="tabcontent" style="display: block;" >
<table id="tracelog1" width="909" border="0" align="center">
<?php

//echo  @mysql_num_rows( $sql_query ); die();
$logs = @mysql_query("SELECT * from hitachi where printers like 'HTJ-1100' and type like 'videos' order by timecreate desc");
while($log = mysql_fetch_array( $logs )){
// Bo gio - chi lay ngay
$date = $log['timecreate'];
$createDate = date('Y-m-d', strtotime($date));

echo "<tr>";
echo "<th>". $log['filename']. "</th>";
echo "<th>". $log['type']. "</th>";
echo "<th><a href=\"http://rynantech.com/partner-login/hitachiclick.php?id=".$log['id']."\"><img src='http://www.rynantech.com/partner-login/sites/images/dl.png".$row['image_name']."'></a></th>";
echo "<th>". $log['notes']. "</th>";
echo "<th>". $log['views']. "</th>";
echo "<th>". $createDate. "</th>";
echo "<th><a href=\"hitachiedit.php?id=$log[id]\"><img src='http://www.rynantech.com/partner-login/sites/images/edit.png".$row['image_name']."'></a></th>";
echo "<th><a href=\"hitachidel.php?id=$log[id]\" onclick=\"return makesure();\"><img src='http://www.rynantech.com/partner-login/sites/images/delete.png".$row['image_name']."'></a></th>";
//echo "<td>". $log['id']. "</td>";
//echo "<td>". $log['printers']. "</td>";
//echo "<td>". $log['link']. "</td>";
//echo "<td>". $log['lastupdate']. "</td>";
//echo "<td>". $log['views']. "</td>";
//echo "<td><a href=\"http://rynantech.com/partner-login/hitachi/VJET/$log[link]\" onclick=\"khoa();\">$log[link]</a></td>";

echo "</tr>";
}
?>

</table>
</div>

<div id="HTJ-4400-videos" class="tabcontent">
<table id="tracelog1" width="909" border="0" align="center">
<?php

//echo  @mysql_num_rows( $sql_query ); die();
$logs = @mysql_query("SELECT * from hitachi where printers like 'HTJ-4400' and type like 'videos' order by timecreate desc");
while($log = mysql_fetch_array( $logs )){
// Bo gio - chi lay ngay
$date = $log['timecreate'];
$createDate = date('Y-m-d', strtotime($date));

echo "<tr>";
echo "<th>". $log['filename']. "</th>";
echo "<th>". $log['type']. "</th>";
echo "<th><a href=\"http://rynantech.com/partner-login/hitachiclick.php?id=".$log['id']."\"><img src='http://www.rynantech.com/partner-login/sites/images/dl.png".$row['image_name']."'></a></th>";
echo "<th>". $log['notes']. "</th>";
echo "<th>". $log['views']. "</th>";
echo "<th>". $createDate. "</th>";
echo "<th><a href=\"hitachiedit.php?id=$log[id]\"><img src='http://www.rynantech.com/partner-login/sites/images/edit.png".$row['image_name']."'></a></th>";
echo "<th><a href=\"hitachidel.php?id=$log[id]\" onclick=\"return makesure();\"><img src='http://www.rynantech.com/partner-login/sites/images/delete.png".$row['image_name']."'></a></th>";
//echo "<td>". $log['id']. "</td>";
//echo "<td>". $log['printers']. "</td>";
//echo "<td>". $log['link']. "</td>";
//echo "<td>". $log['lastupdate']. "</td>";
//echo "<td>". $log['views']. "</td>";
//echo "<td><a href=\"http://rynantech.com/partner-login/hitachi/VJET/$log[link]\" onclick=\"khoa();\">$log[link]</a></td>";

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
  <button class="tablinks" onclick="openCity(event, 'HTJ-1100-photos')">HTJ-1100</button>
  <button class="tablinks" onclick="openCity(event, 'HTJ-4400-photos')">HTJ-4400</button>
</div>

<div id="HTJ-1100-photos" class="tabcontent" style="display: block;" >
<table id="tracelog1" width="909" border="0" align="center">
<?php

//echo  @mysql_num_rows( $sql_query ); die();
$logs = @mysql_query("SELECT * from hitachi where printers like 'HTJ-1100' and type like 'photos' order by timecreate desc");
while($log = mysql_fetch_array( $logs )){
// Bo gio - chi lay ngay
$date = $log['timecreate'];
$createDate = date('Y-m-d', strtotime($date));

echo "<tr>";
echo "<th>". $log['filename']. "</th>";
echo "<th>". $log['type']. "</th>";
echo "<th><a href=\"http://rynantech.com/partner-login/hitachiclick.php?id=".$log['id']."\"><img src='http://www.rynantech.com/partner-login/sites/images/dl.png".$row['image_name']."'></a></th>";
echo "<th>". $log['notes']. "</th>";
echo "<th>". $log['views']. "</th>";
echo "<th>". $createDate. "</th>";
echo "<th><a href=\"hitachiedit.php?id=$log[id]\"><img src='http://www.rynantech.com/partner-login/sites/images/edit.png".$row['image_name']."'></a></th>";
echo "<th><a href=\"hitachidel.php?id=$log[id]\" onclick=\"return makesure();\"><img src='http://www.rynantech.com/partner-login/sites/images/delete.png".$row['image_name']."'></a></th>";
//echo "<td>". $log['id']. "</td>";
//echo "<td>". $log['printers']. "</td>";
//echo "<td>". $log['link']. "</td>";
//echo "<td>". $log['lastupdate']. "</td>";
//echo "<td>". $log['views']. "</td>";
//echo "<td><a href=\"http://rynantech.com/partner-login/hitachi/VJET/$log[link]\" onclick=\"khoa();\">$log[link]</a></td>";

echo "</tr>";
}
?>

</table>
</div>

<div id="HTJ-4400-photos" class="tabcontent">
<table id="tracelog1" width="909" border="0" align="center">
<?php

//echo  @mysql_num_rows( $sql_query ); die();
$logs = @mysql_query("SELECT * from hitachi where printers like 'HTJ-4400' and type like 'photos' order by timecreate desc");
while($log = mysql_fetch_array( $logs )){
// Bo gio - chi lay ngay
$date = $log['timecreate'];
$createDate = date('Y-m-d', strtotime($date));

echo "<tr>";
echo "<th>". $log['filename']. "</th>";
echo "<th>". $log['type']. "</th>";
echo "<th><a href=\"http://rynantech.com/partner-login/hitachiclick.php?id=".$log['id']."\"><img src='http://www.rynantech.com/partner-login/sites/images/dl.png".$row['image_name']."'></a></th>";
echo "<th>". $log['notes']. "</th>";
echo "<th>". $log['views']. "</th>";
echo "<th>". $createDate. "</th>";
echo "<th><a href=\"hitachiedit.php?id=$log[id]\"><img src='http://www.rynantech.com/partner-login/sites/images/edit.png".$row['image_name']."'></a></th>";
echo "<th><a href=\"hitachidel.php?id=$log[id]\" onclick=\"return makesure();\"><img src='http://www.rynantech.com/partner-login/sites/images/delete.png".$row['image_name']."'></a></th>";
//echo "<td>". $log['id']. "</td>";
//echo "<td>". $log['printers']. "</td>";
//echo "<td>". $log['link']. "</td>";
//echo "<td>". $log['lastupdate']. "</td>";
//echo "<td>". $log['views']. "</td>";
//echo "<td><a href=\"http://rynantech.com/partner-login/hitachi/VJET/$log[link]\" onclick=\"khoa();\">$log[link]</a></td>";

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
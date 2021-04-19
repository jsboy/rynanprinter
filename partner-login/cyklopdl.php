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
	if  ( $_SESSION['role'] == "cyklop" ) 
{
    $user_id = intval($_SESSION['user_id']);
    $sql_query = @mysql_query("SELECT * FROM members WHERE id='{$user_id}'");
    $member = @mysql_fetch_array( $sql_query );
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">


<html xmlns="http://www.w3.org/1999/xhtml">

<head>

<script src="http://www.google.com/jsapi" type="text/javascript"></script>
   <meta name="keywords" content="rynantech.com, Vjet1000 Printers, Hydrajet, Solujet, Mylan Group, CTP Plates, A reliable and WIFI connected compact size inkjet printer and inks for packaging pringtings with the lowest price on the et">
    <meta name="description" content="rynantech.com, Vjet1000 Printers, Hydrajet, Solujet, Mylan Group, CTP Plates, A reliable and WIFI connected compact size inkjet printer and inks for packaging pringtings with the lowest price on the et">

<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
<title> LIST cyklop</title>	<link href="http://rynantech.com/wp-content/themes/solid-v2-wp/favicon.ico" rel="shortcut icon" type="image/x-icon" />
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
		<div><p align="justify" class="mem_acc">&nbsp;&nbsp;&nbsp;&nbsp;List Files for Cyklop 
</p></div>
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

<?php

if ($member['role']=="Admin")


{
?>

	<div><p class="createpartner"><font size="12" color="#fff" class="rightpnhomelistpartner">
<!--  <SCRIPT LANGUAGE="JavaScript"> 
  if (window.print) 
    {
        document.write('<form><input  name=print  class="btn_print" onClick="window.print()"></form>');
    }
function ctck()
{
     var sds = document.getElementById("dum");
     if(sds == null){
        alert("You are using a free package.\n You are not allowed to remove the tag.\n");
     }
     var sdss = document.getElementById("dumdiv");
     if(sdss == null){
         alert("You are using a free package.\n You are not allowed to remove the tag.\n");
     }
}
document.onload ="ctck()";


</script> --></p></font>

</div>


<?php
}
else {}
?>


<!-- FIRMWARE -->
<div class="onecolumntitle">
<div class="header">
      <span>FIRMWARE</span>
</div></div>
<div class="tab">
  <button class="tablinks" onclick="openCity(event, 'CM220')">CM220</button>
  <button class="tablinks" onclick="openCity(event, 'CM100')">CM100</button>
  <button class="tablinks" onclick="openCity(event, 'CM100H')">CM100H</button>
  <button class="tablinks" onclick="openCity(event, 'CM100S')">CM100S</button>
  <button class="tablinks" onclick="openCity(event, 'CM300')">CM300</button>
  <button class="tablinks" onclick="openCity(event, 'CM300e')">CM300e</button>
  <button class="tablinks" onclick="openCity(event, 'CM300Plus')">CM300Plus</button>
  <button class="tablinks" onclick="openCity(event, 'CM125')">CM125</button>
  <button class="tablinks" onclick="openCity(event, 'CM150')">CM150</button>
  <button class="tablinks" onclick="openCity(event, 'CM200')">CM200</button>
</div>

<div id="CM220" class="tabcontent" style="display: block;" >
<table id="tracelog1" width="909" border="0" align="center">
<?php

//echo  @mysql_num_rows( $sql_query ); die();
$logs = @mysql_query("SELECT * from cyklop where printers like 'CM220' and type like 'Firmware' order by timecreate desc");
while($log = mysql_fetch_array( $logs )){
// Bo gio - chi lay ngay
$date = $log['timecreate'];
$createDate = date('Y-m-d', strtotime($date));

echo "<tr>";
echo "<th>". $log['filename']. "</th>";
echo "<th>". $log['type']. "</th>";
echo "<th><a href=\"https://rynantech.com/partner-login/cyklopclick.php?id=".$log['id']."\"><img src='https://rynantech.com/partner-login/sites/images/dl.png".$row['image_name']."'></a></th>";
echo "<th>". $log['notes']. "</th>";
echo "<th>". $createDate. "</th>";
//echo "<td>". $log['id']. "</td>";
//echo "<td>". $log['printers']. "</td>";
//echo "<td>". $log['link']. "</td>";
//echo "<td>". $log['lastupdate']. "</td>";
//echo "<td>". $log['views']. "</td>";
//echo "<td><a href=\"https://rynantech.com/partner-login/cyklop/VJET/$log[link]\" onclick=\"khoa();\">$log[link]</a></td>";

echo "</tr>";
}
?>

</table>
</div>


<div id="CM100" class="tabcontent" style="display: block;" >
<table id="tracelog1" width="909" border="0" align="center">
<?php

//echo  @mysql_num_rows( $sql_query ); die();
$logs = @mysql_query("SELECT * from cyklop where printers like 'CM100' and type like 'Firmware' order by timecreate desc");
while($log = mysql_fetch_array( $logs )){
// Bo gio - chi lay ngay
$date = $log['timecreate'];
$createDate = date('Y-m-d', strtotime($date));

echo "<tr>";
echo "<th>". $log['filename']. "</th>";
echo "<th>". $log['type']. "</th>";
echo "<th><a href=\"http://rynantech.com/partner-login/cyklopclick.php?id=".$log['id']."\"><img src='http://www.rynantech.com/partner-login/sites/images/dl.png".$row['image_name']."'></a></th>";
echo "<th>". $log['notes']. "</th>";
echo "<th>". $createDate. "</th>";
//echo "<td>". $log['id']. "</td>";
//echo "<td>". $log['printers']. "</td>";
//echo "<td>". $log['link']. "</td>";
//echo "<td>". $log['lastupdate']. "</td>";
//echo "<td>". $log['views']. "</td>";
//echo "<td><a href=\"http://rynantech.com/partner-login/cyklop/VJET/$log[link]\" onclick=\"khoa();\">$log[link]</a></td>";

echo "</tr>";
}
?>

</table>
</div>



<div id="CM100H" class="tabcontent">
<table id="tracelog1" width="909" border="0" align="center">
<?php

//echo  @mysql_num_rows( $sql_query ); die();
$logs = @mysql_query("SELECT * from cyklop where printers like 'CM100H' and type like 'Firmware' order by timecreate desc");
while($log = mysql_fetch_array( $logs )){
// Bo gio - chi lay ngay
$date = $log['timecreate'];
$createDate = date('Y-m-d', strtotime($date));

echo "<tr>";
echo "<th>". $log['filename']. "</th>";
echo "<th>". $log['type']. "</th>";
echo "<th><a href=\"http://rynantech.com/partner-login/cyklopclick.php?id=".$log['id']."\"><img src='http://www.rynantech.com/partner-login/sites/images/dl.png".$row['image_name']."'></a></th>";
echo "<th>". $log['notes']. "</th>";
echo "<th>". $createDate. "</th>";
//echo "<td>". $log['id']. "</td>";
//echo "<td>". $log['printers']. "</td>";
//echo "<td>". $log['link']. "</td>";
//echo "<td>". $log['lastupdate']. "</td>";
//echo "<td>". $log['views']. "</td>";
//echo "<td><a href=\"http://rynantech.com/partner-login/cyklop/VJET/$log[link]\" onclick=\"khoa();\">$log[link]</a></td>";

echo "</tr>";
}
?>

</table>
</div>


<div id="CM100S" class="tabcontent">
<table id="tracelog1" width="909" border="0" align="center">
<?php

//echo  @mysql_num_rows( $sql_query ); die();
$logs = @mysql_query("SELECT * from cyklop where printers like 'CM100S' and type like 'Firmware' order by timecreate desc");
while($log = mysql_fetch_array( $logs )){
// Bo gio - chi lay ngay
$date = $log['timecreate'];
$createDate = date('Y-m-d', strtotime($date));

echo "<tr>";
echo "<th>". $log['filename']. "</th>";
echo "<th>". $log['type']. "</th>";
echo "<th><a href=\"http://rynantech.com/partner-login/cyklopclick.php?id=".$log['id']."\"><img src='http://www.rynantech.com/partner-login/sites/images/dl.png".$row['image_name']."'></a></th>";
echo "<th>". $log['notes']. "</th>";
echo "<th>". $createDate. "</th>";
//echo "<td>". $log['id']. "</td>";
//echo "<td>". $log['printers']. "</td>";
//echo "<td>". $log['link']. "</td>";
//echo "<td>". $log['lastupdate']. "</td>";
//echo "<td>". $log['views']. "</td>";
//echo "<td><a href=\"http://rynantech.com/partner-login/cyklop/VJET/$log[link]\" onclick=\"khoa();\">$log[link]</a></td>";

echo "</tr>";
}
?>

</table>
</div>
     
<div id="CM300" class="tabcontent">
<table id="tracelog1" width="909" border="0" align="center">
<?php

//echo  @mysql_num_rows( $sql_query ); die();
$logs = @mysql_query("SELECT * from cyklop where printers like 'CM300' and type like 'Firmware' order by timecreate desc");
while($log = mysql_fetch_array( $logs )){
// Bo gio - chi lay ngay
$date = $log['timecreate'];
$createDate = date('Y-m-d', strtotime($date));

echo "<tr>";
echo "<th>". $log['filename']. "</th>";
echo "<th>". $log['type']. "</th>";
echo "<th><a href=\"http://rynantech.com/partner-login/cyklopclick.php?id=".$log['id']."\"><img src='http://www.rynantech.com/partner-login/sites/images/dl.png".$row['image_name']."'></a></th>";
echo "<th>". $log['notes']. "</th>";
echo "<th>". $createDate. "</th>";
//echo "<td>". $log['id']. "</td>";
//echo "<td>". $log['printers']. "</td>";
//echo "<td>". $log['link']. "</td>";
//echo "<td>". $log['lastupdate']. "</td>";
//echo "<td>". $log['views']. "</td>";
//echo "<td><a href=\"http://rynantech.com/partner-login/cyklop/VJET/$log[link]\" onclick=\"khoa();\">$log[link]</a></td>";

echo "</tr>";
}
?>

</table>
</div>

     
<div id="CM300e" class="tabcontent">
<table id="tracelog1" width="909" border="0" align="center">
<?php

//echo  @mysql_num_rows( $sql_query ); die();
$logs = @mysql_query("SELECT * from cyklop where printers like 'CM300e' and type like 'Firmware' order by timecreate desc");
while($log = mysql_fetch_array( $logs )){
// Bo gio - chi lay ngay
$date = $log['timecreate'];
$createDate = date('Y-m-d', strtotime($date));

echo "<tr>";
echo "<th>". $log['filename']. "</th>";
echo "<th>". $log['type']. "</th>";
echo "<th><a href=\"http://rynantech.com/partner-login/cyklopclick.php?id=".$log['id']."\"><img src='http://www.rynantech.com/partner-login/sites/images/dl.png".$row['image_name']."'></a></th>";
echo "<th>". $log['notes']. "</th>";
echo "<th>". $createDate. "</th>";
//echo "<td>". $log['id']. "</td>";
//echo "<td>". $log['printers']. "</td>";
//echo "<td>". $log['link']. "</td>";
//echo "<td>". $log['lastupdate']. "</td>";
//echo "<td>". $log['views']. "</td>";
//echo "<td><a href=\"http://rynantech.com/partner-login/cyklop/VJET/$log[link]\" onclick=\"khoa();\">$log[link]</a></td>";

echo "</tr>";
}
?>

</table>
</div>


     
<div id="CM300Plus" class="tabcontent">
<table id="tracelog1" width="909" border="0" align="center">
<?php

//echo  @mysql_num_rows( $sql_query ); die();
$logs = @mysql_query("SELECT * from cyklop where printers like 'CM300Plus' and type like 'Firmware' order by timecreate desc");
while($log = mysql_fetch_array( $logs )){
// Bo gio - chi lay ngay
$date = $log['timecreate'];
$createDate = date('Y-m-d', strtotime($date));

echo "<tr>";
echo "<th>". $log['filename']. "</th>";
echo "<th>". $log['type']. "</th>";
echo "<th><a href=\"http://rynantech.com/partner-login/cyklopclick.php?id=".$log['id']."\"><img src='http://www.rynantech.com/partner-login/sites/images/dl.png".$row['image_name']."'></a></th>";
echo "<th>". $log['notes']. "</th>";
echo "<th>". $createDate. "</th>";
//echo "<td>". $log['id']. "</td>";
//echo "<td>". $log['printers']. "</td>";
//echo "<td>". $log['link']. "</td>";
//echo "<td>". $log['lastupdate']. "</td>";
//echo "<td>". $log['views']. "</td>";
//echo "<td><a href=\"http://rynantech.com/partner-login/cyklop/VJET/$log[link]\" onclick=\"khoa();\">$log[link]</a></td>";

echo "</tr>";
}
?>

</table>
</div>

<div id="CM125" class="tabcontent">
<table id="tracelog1" width="909" border="0" align="center">
<?php

//echo  @mysql_num_rows( $sql_query ); die();
$logs = @mysql_query("SELECT * from cyklop where printers like 'CM125' and type like 'Firmware' order by timecreate desc");
while($log = mysql_fetch_array( $logs )){
// Bo gio - chi lay ngay
$date = $log['timecreate'];
$createDate = date('Y-m-d', strtotime($date));

echo "<tr>";
echo "<th>". $log['filename']. "</th>";
echo "<th>". $log['type']. "</th>";
echo "<th><a href=\"http://rynantech.com/partner-login/cyklopclick.php?id=".$log['id']."\"><img src='http://www.rynantech.com/partner-login/sites/images/dl.png".$row['image_name']."'></a></th>";
echo "<th>". $log['notes']. "</th>";
echo "<th>". $createDate. "</th>";
//echo "<td>". $log['id']. "</td>";
//echo "<td>". $log['printers']. "</td>";
//echo "<td>". $log['link']. "</td>";
//echo "<td>". $log['lastupdate']. "</td>";
//echo "<td>". $log['views']. "</td>";
//echo "<td><a href=\"http://rynantech.com/partner-login/cyklop/VJET/$log[link]\" onclick=\"khoa();\">$log[link]</a></td>";

echo "</tr>";
}
?>

</table>
</div>



<div id="CM150" class="tabcontent">
<table id="tracelog1" width="909" border="0" align="center">
<?php

//echo  @mysql_num_rows( $sql_query ); die();
$logs = @mysql_query("SELECT * from cyklop where printers like 'CM150' and type like 'Firmware' order by timecreate desc");
while($log = mysql_fetch_array( $logs )){
// Bo gio - chi lay ngay
$date = $log['timecreate'];
$createDate = date('Y-m-d', strtotime($date));

echo "<tr>";
echo "<th>". $log['filename']. "</th>";
echo "<th>". $log['type']. "</th>";
echo "<th><a href=\"http://rynantech.com/partner-login/cyklopclick.php?id=".$log['id']."\"><img src='http://www.rynantech.com/partner-login/sites/images/dl.png".$row['image_name']."'></a></th>";
echo "<th>". $log['notes']. "</th>";
echo "<th>". $createDate. "</th>";
//echo "<td>". $log['id']. "</td>";
//echo "<td>". $log['printers']. "</td>";
//echo "<td>". $log['link']. "</td>";
//echo "<td>". $log['lastupdate']. "</td>";
//echo "<td>". $log['views']. "</td>";
//echo "<td><a href=\"http://rynantech.com/partner-login/cyklop/VJET/$log[link]\" onclick=\"khoa();\">$log[link]</a></td>";

echo "</tr>";
}
?>

</table>
</div>

<div id="CM200" class="tabcontent">
<table id="tracelog1" width="909" border="0" align="center">
<?php

//echo  @mysql_num_rows( $sql_query ); die();
$logs = @mysql_query("SELECT * from cyklop where printers like 'CM200' and type like 'Firmware' order by timecreate desc");
while($log = mysql_fetch_array( $logs )){
// Bo gio - chi lay ngay
$date = $log['timecreate'];
$createDate = date('Y-m-d', strtotime($date));

echo "<tr>";
echo "<th>". $log['filename']. "</th>";
echo "<th>". $log['type']. "</th>";
echo "<th><a href=\"http://rynantech.com/partner-login/cyklopclick.php?id=".$log['id']."\"><img src='http://www.rynantech.com/partner-login/sites/images/dl.png".$row['image_name']."'></a></th>";
echo "<th>". $log['notes']. "</th>";
echo "<th>". $createDate. "</th>";
//echo "<td>". $log['id']. "</td>";
//echo "<td>". $log['printers']. "</td>";
//echo "<td>". $log['link']. "</td>";
//echo "<td>". $log['lastupdate']. "</td>";
//echo "<td>". $log['views']. "</td>";
//echo "<td><a href=\"http://rynantech.com/partner-login/cyklop/VJET/$log[link]\" onclick=\"khoa();\">$log[link]</a></td>";

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
  <button class="tablinks" onclick="openCity(event, 'CM220-sw')">CM220</button>
  <button class="tablinks" onclick="openCity(event, 'CM100-sw')">CM100</button>
  <button class="tablinks" onclick="openCity(event, 'CM100H-sw')">CM100H</button>
  <button class="tablinks" onclick="openCity(event, 'CM100S-sw')">CM100S</button>
  <button class="tablinks" onclick="openCity(event, 'CM300-sw')">CM300</button>
  <button class="tablinks" onclick="openCity(event, 'CM300e-sw')">CM300e</button>
  <button class="tablinks" onclick="openCity(event, 'CM300Plus-sw')">CM300Plus</button>
  <button class="tablinks" onclick="openCity(event, 'CM125-sw')">CM125</button>
  <button class="tablinks" onclick="openCity(event, 'CM150-sw')">CM150</button>
  <button class="tablinks" onclick="openCity(event, 'CM200-sw')">CM200</button>
</div>

<div id="CM220-sw" class="tabcontent" style="display: block;" >
<table id="tracelog1" width="909" border="0" align="center">
<?php

//echo  @mysql_num_rows( $sql_query ); die();
$logs = @mysql_query("SELECT * from cyklop where printers like 'CM220' and type like 'software' order by timecreate desc");
while($log = mysql_fetch_array( $logs )){
// Bo gio - chi lay ngay
$date = $log['timecreate'];
$createDate = date('Y-m-d', strtotime($date));

echo "<tr>";
echo "<th>". $log['filename']. "</th>";
echo "<th>". $log['type']. "</th>";
echo "<th><a href=\"https://rynantech.com/partner-login/cyklopclick.php?id=".$log['id']."\"><img src='https://rynantech.com/partner-login/sites/images/dl.png".$row['image_name']."'></a></th>";
echo "<th>". $log['notes']. "</th>";
echo "<th>". $createDate. "</th>";
//echo "<td>". $log['id']. "</td>";
//echo "<td>". $log['printers']. "</td>";
//echo "<td>". $log['link']. "</td>";
//echo "<td>". $log['lastupdate']. "</td>";
//echo "<td>". $log['views']. "</td>";
//echo "<td><a href=\"https://rynantech.com/partner-login/cyklop/VJET/$log[link]\" onclick=\"khoa();\">$log[link]</a></td>";

echo "</tr>";
}
?>

</table>
</div>


<div id="CM100-sw" class="tabcontent" style="display: block;" >
<table id="tracelog1" width="909" border="0" align="center">
<?php

//echo  @mysql_num_rows( $sql_query ); die();
$logs = @mysql_query("SELECT * from cyklop where printers like 'CM100' and type like 'software' order by timecreate desc");
while($log = mysql_fetch_array( $logs )){
// Bo gio - chi lay ngay
$date = $log['timecreate'];
$createDate = date('Y-m-d', strtotime($date));

echo "<tr>";
echo "<th>". $log['filename']. "</th>";
echo "<th>". $log['type']. "</th>";
echo "<th><a href=\"http://rynantech.com/partner-login/cyklopclick.php?id=".$log['id']."\"><img src='http://www.rynantech.com/partner-login/sites/images/dl.png".$row['image_name']."'></a></th>";
echo "<th>". $log['notes']. "</th>";
echo "<th>". $createDate. "</th>";
//echo "<td>". $log['id']. "</td>";
//echo "<td>". $log['printers']. "</td>";
//echo "<td>". $log['link']. "</td>";
//echo "<td>". $log['lastupdate']. "</td>";
//echo "<td>". $log['views']. "</td>";
//echo "<td><a href=\"http://rynantech.com/partner-login/cyklop/VJET/$log[link]\" onclick=\"khoa();\">$log[link]</a></td>";

echo "</tr>";
}
?>

</table>
</div>



<div id="CM100H-sw" class="tabcontent">
<table id="tracelog1" width="909" border="0" align="center">
<?php

//echo  @mysql_num_rows( $sql_query ); die();
$logs = @mysql_query("SELECT * from cyklop where printers like 'CM100H' and type like 'software' order by timecreate desc");
while($log = mysql_fetch_array( $logs )){
// Bo gio - chi lay ngay
$date = $log['timecreate'];
$createDate = date('Y-m-d', strtotime($date));

echo "<tr>";
echo "<th>". $log['filename']. "</th>";
echo "<th>". $log['type']. "</th>";
echo "<th><a href=\"http://rynantech.com/partner-login/cyklopclick.php?id=".$log['id']."\"><img src='http://www.rynantech.com/partner-login/sites/images/dl.png".$row['image_name']."'></a></th>";
echo "<th>". $log['notes']. "</th>";
echo "<th>". $createDate. "</th>";
//echo "<td>". $log['id']. "</td>";
//echo "<td>". $log['printers']. "</td>";
//echo "<td>". $log['link']. "</td>";
//echo "<td>". $log['lastupdate']. "</td>";
//echo "<td>". $log['views']. "</td>";
//echo "<td><a href=\"http://rynantech.com/partner-login/cyklop/VJET/$log[link]\" onclick=\"khoa();\">$log[link]</a></td>";

echo "</tr>";
}
?>

</table>
</div>


<div id="CM100S-sw" class="tabcontent">
<table id="tracelog1" width="909" border="0" align="center">
<?php

//echo  @mysql_num_rows( $sql_query ); die();
$logs = @mysql_query("SELECT * from cyklop where printers like 'CM100S' and type like 'software' order by timecreate desc");
while($log = mysql_fetch_array( $logs )){
// Bo gio - chi lay ngay
$date = $log['timecreate'];
$createDate = date('Y-m-d', strtotime($date));

echo "<tr>";
echo "<th>". $log['filename']. "</th>";
echo "<th>". $log['type']. "</th>";
echo "<th><a href=\"http://rynantech.com/partner-login/cyklopclick.php?id=".$log['id']."\"><img src='http://www.rynantech.com/partner-login/sites/images/dl.png".$row['image_name']."'></a></th>";
echo "<th>". $log['notes']. "</th>";
echo "<th>". $createDate. "</th>";
//echo "<td>". $log['id']. "</td>";
//echo "<td>". $log['printers']. "</td>";
//echo "<td>". $log['link']. "</td>";
//echo "<td>". $log['lastupdate']. "</td>";
//echo "<td>". $log['views']. "</td>";
//echo "<td><a href=\"http://rynantech.com/partner-login/cyklop/VJET/$log[link]\" onclick=\"khoa();\">$log[link]</a></td>";

echo "</tr>";
}
?>

</table>
</div>
     
<div id="CM300-sw" class="tabcontent">
<table id="tracelog1" width="909" border="0" align="center">
<?php

//echo  @mysql_num_rows( $sql_query ); die();
$logs = @mysql_query("SELECT * from cyklop where printers like 'CM300' and type like 'software' order by timecreate desc");
while($log = mysql_fetch_array( $logs )){
// Bo gio - chi lay ngay
$date = $log['timecreate'];
$createDate = date('Y-m-d', strtotime($date));

echo "<tr>";
echo "<th>". $log['filename']. "</th>";
echo "<th>". $log['type']. "</th>";
echo "<th><a href=\"http://rynantech.com/partner-login/cyklopclick.php?id=".$log['id']."\"><img src='http://www.rynantech.com/partner-login/sites/images/dl.png".$row['image_name']."'></a></th>";
echo "<th>". $log['notes']. "</th>";
echo "<th>". $createDate. "</th>";
//echo "<td>". $log['id']. "</td>";
//echo "<td>". $log['printers']. "</td>";
//echo "<td>". $log['link']. "</td>";
//echo "<td>". $log['lastupdate']. "</td>";
//echo "<td>". $log['views']. "</td>";
//echo "<td><a href=\"http://rynantech.com/partner-login/cyklop/VJET/$log[link]\" onclick=\"khoa();\">$log[link]</a></td>";

echo "</tr>";
}
?>

</table>
</div>

     
<div id="CM300e-sw" class="tabcontent">
<table id="tracelog1" width="909" border="0" align="center">
<?php

//echo  @mysql_num_rows( $sql_query ); die();
$logs = @mysql_query("SELECT * from cyklop where printers like 'CM300e' and type like 'software' order by timecreate desc");
while($log = mysql_fetch_array( $logs )){
// Bo gio - chi lay ngay
$date = $log['timecreate'];
$createDate = date('Y-m-d', strtotime($date));

echo "<tr>";
echo "<th>". $log['filename']. "</th>";
echo "<th>". $log['type']. "</th>";
echo "<th><a href=\"http://rynantech.com/partner-login/cyklopclick.php?id=".$log['id']."\"><img src='http://www.rynantech.com/partner-login/sites/images/dl.png".$row['image_name']."'></a></th>";
echo "<th>". $log['notes']. "</th>";
echo "<th>". $createDate. "</th>";
//echo "<td>". $log['id']. "</td>";
//echo "<td>". $log['printers']. "</td>";
//echo "<td>". $log['link']. "</td>";
//echo "<td>". $log['lastupdate']. "</td>";
//echo "<td>". $log['views']. "</td>";
//echo "<td><a href=\"http://rynantech.com/partner-login/cyklop/VJET/$log[link]\" onclick=\"khoa();\">$log[link]</a></td>";

echo "</tr>";
}
?>

</table>
</div>


     
<div id="CM300Plus-sw" class="tabcontent">
<table id="tracelog1" width="909" border="0" align="center">
<?php

//echo  @mysql_num_rows( $sql_query ); die();
$logs = @mysql_query("SELECT * from cyklop where printers like 'CM300Plus' and type like 'software' order by timecreate desc");
while($log = mysql_fetch_array( $logs )){
// Bo gio - chi lay ngay
$date = $log['timecreate'];
$createDate = date('Y-m-d', strtotime($date));

echo "<tr>";
echo "<th>". $log['filename']. "</th>";
echo "<th>". $log['type']. "</th>";
echo "<th><a href=\"http://rynantech.com/partner-login/cyklopclick.php?id=".$log['id']."\"><img src='http://www.rynantech.com/partner-login/sites/images/dl.png".$row['image_name']."'></a></th>";
echo "<th>". $log['notes']. "</th>";
echo "<th>". $createDate. "</th>";
//echo "<td>". $log['id']. "</td>";
//echo "<td>". $log['printers']. "</td>";
//echo "<td>". $log['link']. "</td>";
//echo "<td>". $log['lastupdate']. "</td>";
//echo "<td>". $log['views']. "</td>";
//echo "<td><a href=\"http://rynantech.com/partner-login/cyklop/VJET/$log[link]\" onclick=\"khoa();\">$log[link]</a></td>";

echo "</tr>";
}
?>

</table>
</div>


     
<div id="CM125-sw" class="tabcontent">
<table id="tracelog1" width="909" border="0" align="center">
<?php

//echo  @mysql_num_rows( $sql_query ); die();
$logs = @mysql_query("SELECT * from cyklop where printers like 'CM125' and type like 'software' order by timecreate desc");
while($log = mysql_fetch_array( $logs )){
// Bo gio - chi lay ngay
$date = $log['timecreate'];
$createDate = date('Y-m-d', strtotime($date));

echo "<tr>";
echo "<th>". $log['filename']. "</th>";
echo "<th>". $log['type']. "</th>";
echo "<th><a href=\"http://rynantech.com/partner-login/cyklopclick.php?id=".$log['id']."\"><img src='http://www.rynantech.com/partner-login/sites/images/dl.png".$row['image_name']."'></a></th>";
echo "<th>". $log['notes']. "</th>";
echo "<th>". $createDate. "</th>";
//echo "<td>". $log['id']. "</td>";
//echo "<td>". $log['printers']. "</td>";
//echo "<td>". $log['link']. "</td>";
//echo "<td>". $log['lastupdate']. "</td>";
//echo "<td>". $log['views']. "</td>";
//echo "<td><a href=\"http://rynantech.com/partner-login/cyklop/VJET/$log[link]\" onclick=\"khoa();\">$log[link]</a></td>";

echo "</tr>";
}
?>

</table>
</div>


<div id="CM150-sw" class="tabcontent">
<table id="tracelog1" width="909" border="0" align="center">
<?php

//echo  @mysql_num_rows( $sql_query ); die();
$logs = @mysql_query("SELECT * from cyklop where printers like 'CM150' and type like 'software' order by timecreate desc");
while($log = mysql_fetch_array( $logs )){
// Bo gio - chi lay ngay
$date = $log['timecreate'];
$createDate = date('Y-m-d', strtotime($date));

echo "<tr>";
echo "<th>". $log['filename']. "</th>";
echo "<th>". $log['type']. "</th>";
echo "<th><a href=\"http://rynantech.com/partner-login/cyklopclick.php?id=".$log['id']."\"><img src='http://www.rynantech.com/partner-login/sites/images/dl.png".$row['image_name']."'></a></th>";
echo "<th>". $log['notes']. "</th>";
echo "<th>". $createDate. "</th>";
//echo "<td>". $log['id']. "</td>";
//echo "<td>". $log['printers']. "</td>";
//echo "<td>". $log['link']. "</td>";
//echo "<td>". $log['lastupdate']. "</td>";
//echo "<td>". $log['views']. "</td>";
//echo "<td><a href=\"http://rynantech.com/partner-login/cyklop/VJET/$log[link]\" onclick=\"khoa();\">$log[link]</a></td>";

echo "</tr>";
}
?>

</table>
</div>
     
<div id="CM200-sw" class="tabcontent">
<table id="tracelog1" width="909" border="0" align="center">
<?php

//echo  @mysql_num_rows( $sql_query ); die();
$logs = @mysql_query("SELECT * from cyklop where printers like 'CM200' and type like 'software' order by timecreate desc");
while($log = mysql_fetch_array( $logs )){
// Bo gio - chi lay ngay
$date = $log['timecreate'];
$createDate = date('Y-m-d', strtotime($date));

echo "<tr>";
echo "<th>". $log['filename']. "</th>";
echo "<th>". $log['type']. "</th>";
echo "<th><a href=\"http://rynantech.com/partner-login/cyklopclick.php?id=".$log['id']."\"><img src='http://www.rynantech.com/partner-login/sites/images/dl.png".$row['image_name']."'></a></th>";
echo "<th>". $log['notes']. "</th>";
echo "<th>". $createDate. "</th>";
//echo "<td>". $log['id']. "</td>";
//echo "<td>". $log['printers']. "</td>";
//echo "<td>". $log['link']. "</td>";
//echo "<td>". $log['lastupdate']. "</td>";
//echo "<td>". $log['views']. "</td>";
//echo "<td><a href=\"http://rynantech.com/partner-login/cyklop/VJET/$log[link]\" onclick=\"khoa();\">$log[link]</a></td>";

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
  <button class="tablinks" onclick="openCity(event, 'CM220-br')">CM220</button>
  <button class="tablinks" onclick="openCity(event, 'CM100-br')">CM100</button>
  <button class="tablinks" onclick="openCity(event, 'CM100H-br')">CM100H</button>
  <button class="tablinks" onclick="openCity(event, 'CM100S-br')">CM100S</button>
  <button class="tablinks" onclick="openCity(event, 'CM300-br')">CM300</button>
  <button class="tablinks" onclick="openCity(event, 'CM300e-br')">CM300e</button>
  <button class="tablinks" onclick="openCity(event, 'CM300Plus-br')">CM300Plus</button>
  <button class="tablinks" onclick="openCity(event, 'CM125-br')">CM125</button>
  <button class="tablinks" onclick="openCity(event, 'CM150-br')">CM150</button>
  <button class="tablinks" onclick="openCity(event, 'CM200-br')">CM200</button>
</div>

<div id="CM220-br" class="tabcontent" style="display: block;" >
<table id="tracelog1" width="909" border="0" align="center">
<?php

//echo  @mysql_num_rows( $sql_query ); die();
$logs = @mysql_query("SELECT * from cyklop where printers like 'CM220' and type like 'brochure' order by timecreate desc");
while($log = mysql_fetch_array( $logs )){
// Bo gio - chi lay ngay
$date = $log['timecreate'];
$createDate = date('Y-m-d', strtotime($date));

echo "<tr>";
echo "<th>". $log['filename']. "</th>";
echo "<th>". $log['type']. "</th>";
echo "<th><a href=\"https://rynantech.com/partner-login/cyklopclick.php?id=".$log['id']."\"><img src='https://rynantech.com/partner-login/sites/images/dl.png".$row['image_name']."'></a></th>";
echo "<th>". $log['notes']. "</th>";
echo "<th>". $createDate. "</th>";
//echo "<td>". $log['id']. "</td>";
//echo "<td>". $log['printers']. "</td>";
//echo "<td>". $log['link']. "</td>";
//echo "<td>". $log['lastupdate']. "</td>";
//echo "<td>". $log['views']. "</td>";
//echo "<td><a href=\"https://rynantech.com/partner-login/cyklop/VJET/$log[link]\" onclick=\"khoa();\">$log[link]</a></td>";

echo "</tr>";
}
?>

</table>
</div>



<div id="CM100-br" class="tabcontent" style="display: block;" >
<table id="tracelog1" width="909" border="0" align="center">
<?php

//echo  @mysql_num_rows( $sql_query ); die();
$logs = @mysql_query("SELECT * from cyklop where printers like 'CM100' and type like 'brochure' order by timecreate desc");
while($log = mysql_fetch_array( $logs )){
// Bo gio - chi lay ngay
$date = $log['timecreate'];
$createDate = date('Y-m-d', strtotime($date));

echo "<tr>";
echo "<th>". $log['filename']. "</th>";
echo "<th>". $log['type']. "</th>";
echo "<th><a href=\"http://rynantech.com/partner-login/cyklopclick.php?id=".$log['id']."\"><img src='http://www.rynantech.com/partner-login/sites/images/dl.png".$row['image_name']."'></a></th>";
echo "<th>". $log['notes']. "</th>";
echo "<th>". $createDate. "</th>";
//echo "<td>". $log['id']. "</td>";
//echo "<td>". $log['printers']. "</td>";
//echo "<td>". $log['link']. "</td>";
//echo "<td>". $log['lastupdate']. "</td>";
//echo "<td>". $log['views']. "</td>";
//echo "<td><a href=\"http://rynantech.com/partner-login/cyklop/VJET/$log[link]\" onclick=\"khoa();\">$log[link]</a></td>";

echo "</tr>";
}
?>

</table>
</div>



<div id="CM100H-br" class="tabcontent">
<table id="tracelog1" width="909" border="0" align="center">
<?php

//echo  @mysql_num_rows( $sql_query ); die();
$logs = @mysql_query("SELECT * from cyklop where printers like 'CM100H' and type like 'brochure' order by timecreate desc");
while($log = mysql_fetch_array( $logs )){
// Bo gio - chi lay ngay
$date = $log['timecreate'];
$createDate = date('Y-m-d', strtotime($date));

echo "<tr>";
echo "<th>". $log['filename']. "</th>";
echo "<th>". $log['type']. "</th>";
echo "<th><a href=\"http://rynantech.com/partner-login/cyklopclick.php?id=".$log['id']."\"><img src='http://www.rynantech.com/partner-login/sites/images/dl.png".$row['image_name']."'></a></th>";
echo "<th>". $log['notes']. "</th>";
echo "<th>". $createDate. "</th>";
//echo "<td>". $log['id']. "</td>";
//echo "<td>". $log['printers']. "</td>";
//echo "<td>". $log['link']. "</td>";
//echo "<td>". $log['lastupdate']. "</td>";
//echo "<td>". $log['views']. "</td>";
//echo "<td><a href=\"http://rynantech.com/partner-login/cyklop/VJET/$log[link]\" onclick=\"khoa();\">$log[link]</a></td>";

echo "</tr>";
}
?>

</table>
</div>


<div id="CM100S-br" class="tabcontent">
<table id="tracelog1" width="909" border="0" align="center">
<?php

//echo  @mysql_num_rows( $sql_query ); die();
$logs = @mysql_query("SELECT * from cyklop where printers like 'CM100S' and type like 'brochure' order by timecreate desc");
while($log = mysql_fetch_array( $logs )){
// Bo gio - chi lay ngay
$date = $log['timecreate'];
$createDate = date('Y-m-d', strtotime($date));

echo "<tr>";
echo "<th>". $log['filename']. "</th>";
echo "<th>". $log['type']. "</th>";
echo "<th><a href=\"http://rynantech.com/partner-login/cyklopclick.php?id=".$log['id']."\"><img src='http://www.rynantech.com/partner-login/sites/images/dl.png".$row['image_name']."'></a></th>";
echo "<th>". $log['notes']. "</th>";
echo "<th>". $createDate. "</th>";
//echo "<td>". $log['id']. "</td>";
//echo "<td>". $log['printers']. "</td>";
//echo "<td>". $log['link']. "</td>";
//echo "<td>". $log['lastupdate']. "</td>";
//echo "<td>". $log['views']. "</td>";
//echo "<td><a href=\"http://rynantech.com/partner-login/cyklop/VJET/$log[link]\" onclick=\"khoa();\">$log[link]</a></td>";

echo "</tr>";
}
?>

</table>
</div>
     
<div id="CM300-br" class="tabcontent">
<table id="tracelog1" width="909" border="0" align="center">
<?php

//echo  @mysql_num_rows( $sql_query ); die();
$logs = @mysql_query("SELECT * from cyklop where printers like 'CM300' and type like 'brochure' order by timecreate desc");
while($log = mysql_fetch_array( $logs )){
// Bo gio - chi lay ngay
$date = $log['timecreate'];
$createDate = date('Y-m-d', strtotime($date));

echo "<tr>";
echo "<th>". $log['filename']. "</th>";
echo "<th>". $log['type']. "</th>";
echo "<th><a href=\"http://rynantech.com/partner-login/cyklopclick.php?id=".$log['id']."\"><img src='http://www.rynantech.com/partner-login/sites/images/dl.png".$row['image_name']."'></a></th>";
echo "<th>". $log['notes']. "</th>";
echo "<th>". $createDate. "</th>";
//echo "<td>". $log['id']. "</td>";
//echo "<td>". $log['printers']. "</td>";
//echo "<td>". $log['link']. "</td>";
//echo "<td>". $log['lastupdate']. "</td>";
//echo "<td>". $log['views']. "</td>";
//echo "<td><a href=\"http://rynantech.com/partner-login/cyklop/VJET/$log[link]\" onclick=\"khoa();\">$log[link]</a></td>";

echo "</tr>";
}
?>

</table>
</div>

     
<div id="CM300e-br" class="tabcontent">
<table id="tracelog1" width="909" border="0" align="center">
<?php

//echo  @mysql_num_rows( $sql_query ); die();
$logs = @mysql_query("SELECT * from cyklop where printers like 'CM300e' and type like 'brochure' order by timecreate desc");
while($log = mysql_fetch_array( $logs )){
// Bo gio - chi lay ngay
$date = $log['timecreate'];
$createDate = date('Y-m-d', strtotime($date));

echo "<tr>";
echo "<th>". $log['filename']. "</th>";
echo "<th>". $log['type']. "</th>";
echo "<th><a href=\"http://rynantech.com/partner-login/cyklopclick.php?id=".$log['id']."\"><img src='http://www.rynantech.com/partner-login/sites/images/dl.png".$row['image_name']."'></a></th>";
echo "<th>". $log['notes']. "</th>";
echo "<th>". $createDate. "</th>";
//echo "<td>". $log['id']. "</td>";
//echo "<td>". $log['printers']. "</td>";
//echo "<td>". $log['link']. "</td>";
//echo "<td>". $log['lastupdate']. "</td>";
//echo "<td>". $log['views']. "</td>";
//echo "<td><a href=\"http://rynantech.com/partner-login/cyklop/VJET/$log[link]\" onclick=\"khoa();\">$log[link]</a></td>";

echo "</tr>";
}
?>

</table>
</div>


     
<div id="CM300Plus-br" class="tabcontent">
<table id="tracelog1" width="909" border="0" align="center">
<?php

//echo  @mysql_num_rows( $sql_query ); die();
$logs = @mysql_query("SELECT * from cyklop where printers like 'CM300Plus' and type like 'brochure' order by timecreate desc");
while($log = mysql_fetch_array( $logs )){
// Bo gio - chi lay ngay
$date = $log['timecreate'];
$createDate = date('Y-m-d', strtotime($date));

echo "<tr>";
echo "<th>". $log['filename']. "</th>";
echo "<th>". $log['type']. "</th>";
echo "<th><a href=\"http://rynantech.com/partner-login/cyklopclick.php?id=".$log['id']."\"><img src='http://www.rynantech.com/partner-login/sites/images/dl.png".$row['image_name']."'></a></th>";
echo "<th>". $log['notes']. "</th>";
echo "<th>". $createDate. "</th>";
//echo "<td>". $log['id']. "</td>";
//echo "<td>". $log['printers']. "</td>";
//echo "<td>". $log['link']. "</td>";
//echo "<td>". $log['lastupdate']. "</td>";
//echo "<td>". $log['views']. "</td>";
//echo "<td><a href=\"http://rynantech.com/partner-login/cyklop/VJET/$log[link]\" onclick=\"khoa();\">$log[link]</a></td>";

echo "</tr>";
}
?>

</table>
</div>


<div id="CM125-br" class="tabcontent">
<table id="tracelog1" width="909" border="0" align="center">
<?php

//echo  @mysql_num_rows( $sql_query ); die();
$logs = @mysql_query("SELECT * from cyklop where printers like 'CM125' and type like 'brochure' order by timecreate desc");
while($log = mysql_fetch_array( $logs )){
// Bo gio - chi lay ngay
$date = $log['timecreate'];
$createDate = date('Y-m-d', strtotime($date));

echo "<tr>";
echo "<th>". $log['filename']. "</th>";
echo "<th>". $log['type']. "</th>";
echo "<th><a href=\"http://rynantech.com/partner-login/cyklopclick.php?id=".$log['id']."\"><img src='http://www.rynantech.com/partner-login/sites/images/dl.png".$row['image_name']."'></a></th>";
echo "<th>". $log['notes']. "</th>";
echo "<th>". $createDate. "</th>";
//echo "<td>". $log['id']. "</td>";
//echo "<td>". $log['printers']. "</td>";
//echo "<td>". $log['link']. "</td>";
//echo "<td>". $log['lastupdate']. "</td>";
//echo "<td>". $log['views']. "</td>";
//echo "<td><a href=\"http://rynantech.com/partner-login/cyklop/VJET/$log[link]\" onclick=\"khoa();\">$log[link]</a></td>";

echo "</tr>";
}
?>

</table>
</div>




<div id="CM150-br" class="tabcontent">
<table id="tracelog1" width="909" border="0" align="center">
<?php

//echo  @mysql_num_rows( $sql_query ); die();
$logs = @mysql_query("SELECT * from cyklop where printers like 'CM150' and type like 'brochure' order by timecreate desc");
while($log = mysql_fetch_array( $logs )){
// Bo gio - chi lay ngay
$date = $log['timecreate'];
$createDate = date('Y-m-d', strtotime($date));

echo "<tr>";
echo "<th>". $log['filename']. "</th>";
echo "<th>". $log['type']. "</th>";
echo "<th><a href=\"http://rynantech.com/partner-login/cyklopclick.php?id=".$log['id']."\"><img src='http://www.rynantech.com/partner-login/sites/images/dl.png".$row['image_name']."'></a></th>";
echo "<th>". $log['notes']. "</th>";
echo "<th>". $createDate. "</th>";
//echo "<td>". $log['id']. "</td>";
//echo "<td>". $log['printers']. "</td>";
//echo "<td>". $log['link']. "</td>";
//echo "<td>". $log['lastupdate']. "</td>";
//echo "<td>". $log['views']. "</td>";
//echo "<td><a href=\"http://rynantech.com/partner-login/cyklop/VJET/$log[link]\" onclick=\"khoa();\">$log[link]</a></td>";

echo "</tr>";
}
?>

</table>
</div>


<div id="CM200-br" class="tabcontent">
<table id="tracelog1" width="909" border="0" align="center">
<?php

//echo  @mysql_num_rows( $sql_query ); die();
$logs = @mysql_query("SELECT * from cyklop where printers like 'CM200' and type like 'brochure' order by timecreate desc");
while($log = mysql_fetch_array( $logs )){
// Bo gio - chi lay ngay
$date = $log['timecreate'];
$createDate = date('Y-m-d', strtotime($date));

echo "<tr>";
echo "<th>". $log['filename']. "</th>";
echo "<th>". $log['type']. "</th>";
echo "<th><a href=\"http://rynantech.com/partner-login/cyklopclick.php?id=".$log['id']."\"><img src='http://www.rynantech.com/partner-login/sites/images/dl.png".$row['image_name']."'></a></th>";
echo "<th>". $log['notes']. "</th>";
echo "<th>". $createDate. "</th>";
//echo "<td>". $log['id']. "</td>";
//echo "<td>". $log['printers']. "</td>";
//echo "<td>". $log['link']. "</td>";
//echo "<td>". $log['lastupdate']. "</td>";
//echo "<td>". $log['views']. "</td>";
//echo "<td><a href=\"http://rynantech.com/partner-login/cyklop/VJET/$log[link]\" onclick=\"khoa();\">$log[link]</a></td>";

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
  <button class="tablinks" onclick="openCity(event, 'CM220-us')">CM220</button>
  <button class="tablinks" onclick="openCity(event, 'CM100-us')">CM100</button>
  <button class="tablinks" onclick="openCity(event, 'CM100H-us')">CM100H</button>
  <button class="tablinks" onclick="openCity(event, 'CM100S-us')">CM100S</button>
  <button class="tablinks" onclick="openCity(event, 'CM300-us')">CM300</button>
  <button class="tablinks" onclick="openCity(event, 'CM300e-us')">CM300e</button>
  <button class="tablinks" onclick="openCity(event, 'CM300Plus-us')">CM300Plus</button>
  <button class="tablinks" onclick="openCity(event, 'CM125-us')">CM125</button>
  <button class="tablinks" onclick="openCity(event, 'CM150-us')">CM150</button>
  <button class="tablinks" onclick="openCity(event, 'CM200-us')">CM200</button>
</div>

<div id="CM220-us" class="tabcontent" style="display: block;" >
<table id="tracelog1" width="909" border="0" align="center">
<?php

//echo  @mysql_num_rows( $sql_query ); die();
$logs = @mysql_query("SELECT * from cyklop where printers like 'CM220' and type like 'User Manual' order by timecreate desc");
while($log = mysql_fetch_array( $logs )){
// Bo gio - chi lay ngay
$date = $log['timecreate'];
$createDate = date('Y-m-d', strtotime($date));

echo "<tr>";
echo "<th>". $log['filename']. "</th>";
echo "<th>". $log['type']. "</th>";
echo "<th><a href=\"https://rynantech.com/partner-login/cyklopclick.php?id=".$log['id']."\"><img src='https://rynantech.com/partner-login/sites/images/dl.png".$row['image_name']."'></a></th>";
echo "<th>". $log['notes']. "</th>";
echo "<th>". $createDate. "</th>";
//echo "<td>". $log['id']. "</td>";
//echo "<td>". $log['printers']. "</td>";
//echo "<td>". $log['link']. "</td>";
//echo "<td>". $log['lastupdate']. "</td>";
//echo "<td>". $log['views']. "</td>";
//echo "<td><a href=\"https://rynantech.com/partner-login/cyklop/VJET/$log[link]\" onclick=\"khoa();\">$log[link]</a></td>";

echo "</tr>";
}
?>

</table>
</div>



<div id="CM100-us" class="tabcontent" style="display: block;" >
<table id="tracelog1" width="909" border="0" align="center">
<?php

//echo  @mysql_num_rows( $sql_query ); die();
$logs = @mysql_query("SELECT * from cyklop where printers like 'CM100' and type like 'User Manual' order by timecreate desc");
while($log = mysql_fetch_array( $logs )){
// Bo gio - chi lay ngay
$date = $log['timecreate'];
$createDate = date('Y-m-d', strtotime($date));

echo "<tr>";
echo "<th>". $log['filename']. "</th>";
echo "<th>". $log['type']. "</th>";
echo "<th><a href=\"http://rynantech.com/partner-login/cyklopclick.php?id=".$log['id']."\"><img src='http://www.rynantech.com/partner-login/sites/images/dl.png".$row['image_name']."'></a></th>";
echo "<th>". $log['notes']. "</th>";
echo "<th>". $createDate. "</th>";
//echo "<td>". $log['id']. "</td>";
//echo "<td>". $log['printers']. "</td>";
//echo "<td>". $log['link']. "</td>";
//echo "<td>". $log['lastupdate']. "</td>";
//echo "<td>". $log['views']. "</td>";
//echo "<td><a href=\"http://rynantech.com/partner-login/cyklop/VJET/$log[link]\" onclick=\"khoa();\">$log[link]</a></td>";

echo "</tr>";
}
?>

</table>
</div>



<div id="CM100H-us" class="tabcontent">
<table id="tracelog1" width="909" border="0" align="center">
<?php

//echo  @mysql_num_rows( $sql_query ); die();
$logs = @mysql_query("SELECT * from cyklop where printers like 'CM100H' and type like 'User Manual' order by timecreate desc");
while($log = mysql_fetch_array( $logs )){
// Bo gio - chi lay ngay
$date = $log['timecreate'];
$createDate = date('Y-m-d', strtotime($date));

echo "<tr>";
echo "<th>". $log['filename']. "</th>";
echo "<th>". $log['type']. "</th>";
echo "<th><a href=\"http://rynantech.com/partner-login/cyklopclick.php?id=".$log['id']."\"><img src='http://www.rynantech.com/partner-login/sites/images/dl.png".$row['image_name']."'></a></th>";
echo "<th>". $log['notes']. "</th>";
echo "<th>". $createDate. "</th>";
//echo "<td>". $log['id']. "</td>";
//echo "<td>". $log['printers']. "</td>";
//echo "<td>". $log['link']. "</td>";
//echo "<td>". $log['lastupdate']. "</td>";
//echo "<td>". $log['views']. "</td>";
//echo "<td><a href=\"http://rynantech.com/partner-login/cyklop/VJET/$log[link]\" onclick=\"khoa();\">$log[link]</a></td>";

echo "</tr>";
}
?>

</table>
</div>


<div id="CM100S-us" class="tabcontent">
<table id="tracelog1" width="909" border="0" align="center">
<?php

//echo  @mysql_num_rows( $sql_query ); die();
$logs = @mysql_query("SELECT * from cyklop where printers like 'CM100S' and type like 'User Manual' order by timecreate desc");
while($log = mysql_fetch_array( $logs )){
// Bo gio - chi lay ngay
$date = $log['timecreate'];
$createDate = date('Y-m-d', strtotime($date));

echo "<tr>";
echo "<th>". $log['filename']. "</th>";
echo "<th>". $log['type']. "</th>";
echo "<th><a href=\"http://rynantech.com/partner-login/cyklopclick.php?id=".$log['id']."\"><img src='http://www.rynantech.com/partner-login/sites/images/dl.png".$row['image_name']."'></a></th>";
echo "<th>". $log['notes']. "</th>";
echo "<th>". $createDate. "</th>";
//echo "<td>". $log['id']. "</td>";
//echo "<td>". $log['printers']. "</td>";
//echo "<td>". $log['link']. "</td>";
//echo "<td>". $log['lastupdate']. "</td>";
//echo "<td>". $log['views']. "</td>";
//echo "<td><a href=\"http://rynantech.com/partner-login/cyklop/VJET/$log[link]\" onclick=\"khoa();\">$log[link]</a></td>";

echo "</tr>";
}
?>

</table>
</div>
     
<div id="CM300-us" class="tabcontent">
<table id="tracelog1" width="909" border="0" align="center">
<?php

//echo  @mysql_num_rows( $sql_query ); die();
$logs = @mysql_query("SELECT * from cyklop where printers like 'CM300' and type like 'User Manual' order by timecreate desc");
while($log = mysql_fetch_array( $logs )){
// Bo gio - chi lay ngay
$date = $log['timecreate'];
$createDate = date('Y-m-d', strtotime($date));

echo "<tr>";
echo "<th>". $log['filename']. "</th>";
echo "<th>". $log['type']. "</th>";
echo "<th><a href=\"http://rynantech.com/partner-login/cyklopclick.php?id=".$log['id']."\"><img src='http://www.rynantech.com/partner-login/sites/images/dl.png".$row['image_name']."'></a></th>";
echo "<th>". $log['notes']. "</th>";
echo "<th>". $createDate. "</th>";
//echo "<td>". $log['id']. "</td>";
//echo "<td>". $log['printers']. "</td>";
//echo "<td>". $log['link']. "</td>";
//echo "<td>". $log['lastupdate']. "</td>";
//echo "<td>". $log['views']. "</td>";
//echo "<td><a href=\"http://rynantech.com/partner-login/cyklop/VJET/$log[link]\" onclick=\"khoa();\">$log[link]</a></td>";

echo "</tr>";
}
?>

</table>
</div>

     
<div id="CM300e-us" class="tabcontent">
<table id="tracelog1" width="909" border="0" align="center">
<?php

//echo  @mysql_num_rows( $sql_query ); die();
$logs = @mysql_query("SELECT * from cyklop where printers like 'CM300e' and type like 'User Manual' order by timecreate desc");
while($log = mysql_fetch_array( $logs )){
// Bo gio - chi lay ngay
$date = $log['timecreate'];
$createDate = date('Y-m-d', strtotime($date));

echo "<tr>";
echo "<th>". $log['filename']. "</th>";
echo "<th>". $log['type']. "</th>";
echo "<th><a href=\"http://rynantech.com/partner-login/cyklopclick.php?id=".$log['id']."\"><img src='http://www.rynantech.com/partner-login/sites/images/dl.png".$row['image_name']."'></a></th>";
echo "<th>". $log['notes']. "</th>";
echo "<th>". $createDate. "</th>";
//echo "<td>". $log['id']. "</td>";
//echo "<td>". $log['printers']. "</td>";
//echo "<td>". $log['link']. "</td>";
//echo "<td>". $log['lastupdate']. "</td>";
//echo "<td>". $log['views']. "</td>";
//echo "<td><a href=\"http://rynantech.com/partner-login/cyklop/VJET/$log[link]\" onclick=\"khoa();\">$log[link]</a></td>";

echo "</tr>";
}
?>

</table>
</div>


     
<div id="CM300Plus-us" class="tabcontent">
<table id="tracelog1" width="909" border="0" align="center">
<?php

//echo  @mysql_num_rows( $sql_query ); die();
$logs = @mysql_query("SELECT * from cyklop where printers like 'CM300Plus' and type like 'User Manual' order by timecreate desc");
while($log = mysql_fetch_array( $logs )){
// Bo gio - chi lay ngay
$date = $log['timecreate'];
$createDate = date('Y-m-d', strtotime($date));

echo "<tr>";
echo "<th>". $log['filename']. "</th>";
echo "<th>". $log['type']. "</th>";
echo "<th><a href=\"http://rynantech.com/partner-login/cyklopclick.php?id=".$log['id']."\"><img src='http://www.rynantech.com/partner-login/sites/images/dl.png".$row['image_name']."'></a></th>";
echo "<th>". $log['notes']. "</th>";
echo "<th>". $createDate. "</th>";
//echo "<td>". $log['id']. "</td>";
//echo "<td>". $log['printers']. "</td>";
//echo "<td>". $log['link']. "</td>";
//echo "<td>". $log['lastupdate']. "</td>";
//echo "<td>". $log['views']. "</td>";
//echo "<td><a href=\"http://rynantech.com/partner-login/cyklop/VJET/$log[link]\" onclick=\"khoa();\">$log[link]</a></td>";

echo "</tr>";
}
?>

</table>
</div>

<div id="CM125-us" class="tabcontent">
<table id="tracelog1" width="909" border="0" align="center">
<?php

//echo  @mysql_num_rows( $sql_query ); die();
$logs = @mysql_query("SELECT * from cyklop where printers like 'CM125' and type like 'User Manual' order by timecreate desc");
while($log = mysql_fetch_array( $logs )){
// Bo gio - chi lay ngay
$date = $log['timecreate'];
$createDate = date('Y-m-d', strtotime($date));

echo "<tr>";
echo "<th>". $log['filename']. "</th>";
echo "<th>". $log['type']. "</th>";
echo "<th><a href=\"http://rynantech.com/partner-login/cyklopclick.php?id=".$log['id']."\"><img src='http://www.rynantech.com/partner-login/sites/images/dl.png".$row['image_name']."'></a></th>";
echo "<th>". $log['notes']. "</th>";
echo "<th>". $createDate. "</th>";
//echo "<td>". $log['id']. "</td>";
//echo "<td>". $log['printers']. "</td>";
//echo "<td>". $log['link']. "</td>";
//echo "<td>". $log['lastupdate']. "</td>";
//echo "<td>". $log['views']. "</td>";
//echo "<td><a href=\"http://rynantech.com/partner-login/cyklop/VJET/$log[link]\" onclick=\"khoa();\">$log[link]</a></td>";

echo "</tr>";
}
?>

</table>
</div>




<div id="CM150-us" class="tabcontent">
<table id="tracelog1" width="909" border="0" align="center">
<?php

//echo  @mysql_num_rows( $sql_query ); die();
$logs = @mysql_query("SELECT * from cyklop where printers like 'CM150' and type like 'User Manual' order by timecreate desc");
while($log = mysql_fetch_array( $logs )){
// Bo gio - chi lay ngay
$date = $log['timecreate'];
$createDate = date('Y-m-d', strtotime($date));

echo "<tr>";
echo "<th>". $log['filename']. "</th>";
echo "<th>". $log['type']. "</th>";
echo "<th><a href=\"http://rynantech.com/partner-login/cyklopclick.php?id=".$log['id']."\"><img src='http://www.rynantech.com/partner-login/sites/images/dl.png".$row['image_name']."'></a></th>";
echo "<th>". $log['notes']. "</th>";
echo "<th>". $createDate. "</th>";
//echo "<td>". $log['id']. "</td>";
//echo "<td>". $log['printers']. "</td>";
//echo "<td>". $log['link']. "</td>";
//echo "<td>". $log['lastupdate']. "</td>";
//echo "<td>". $log['views']. "</td>";
//echo "<td><a href=\"http://rynantech.com/partner-login/cyklop/VJET/$log[link]\" onclick=\"khoa();\">$log[link]</a></td>";

echo "</tr>";
}
?>

</table>
</div>

<div id="CM200-us" class="tabcontent">
<table id="tracelog1" width="909" border="0" align="center">
<?php

//echo  @mysql_num_rows( $sql_query ); die();
$logs = @mysql_query("SELECT * from cyklop where printers like 'CM200' and type like 'User Manual' order by timecreate desc");
while($log = mysql_fetch_array( $logs )){
// Bo gio - chi lay ngay
$date = $log['timecreate'];
$createDate = date('Y-m-d', strtotime($date));

echo "<tr>";
echo "<th>". $log['filename']. "</th>";
echo "<th>". $log['type']. "</th>";
echo "<th><a href=\"http://rynantech.com/partner-login/cyklopclick.php?id=".$log['id']."\"><img src='http://www.rynantech.com/partner-login/sites/images/dl.png".$row['image_name']."'></a></th>";
echo "<th>". $log['notes']. "</th>";
echo "<th>". $createDate. "</th>";
//echo "<td>". $log['id']. "</td>";
//echo "<td>". $log['printers']. "</td>";
//echo "<td>". $log['link']. "</td>";
//echo "<td>". $log['lastupdate']. "</td>";
//echo "<td>". $log['views']. "</td>";
//echo "<td><a href=\"http://rynantech.com/partner-login/cyklop/VJET/$log[link]\" onclick=\"khoa();\">$log[link]</a></td>";

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
  <button class="tablinks" onclick="openCity(event, 'CM220-qg')">CM220</button>
  <button class="tablinks" onclick="openCity(event, 'CM100-qg')">CM100</button>
  <button class="tablinks" onclick="openCity(event, 'CM100H-qg')">CM100H</button>
  <button class="tablinks" onclick="openCity(event, 'CM100S-qg')">CM100S</button>
  <button class="tablinks" onclick="openCity(event, 'CM300-qg')">CM300</button>
  <button class="tablinks" onclick="openCity(event, 'CM300e-qg')">CM300e</button>
  <button class="tablinks" onclick="openCity(event, 'CM300Plus-qg')">CM300Plus</button>
  <button class="tablinks" onclick="openCity(event, 'CM125-qg')">CM125</button>
  <button class="tablinks" onclick="openCity(event, 'CM150-qg')">CM150</button>
  <button class="tablinks" onclick="openCity(event, 'CM200-qg')">CM200</button>
</div>

<div id="CM220-qg" class="tabcontent" style="display: block;" >
<table id="tracelog1" width="909" border="0" align="center">
<?php

//echo  @mysql_num_rows( $sql_query ); die();
$logs = @mysql_query("SELECT * from cyklop where printers like 'CM220' and type like 'Quick Guide' order by timecreate desc");
while($log = mysql_fetch_array( $logs )){
// Bo gio - chi lay ngay
$date = $log['timecreate'];
$createDate = date('Y-m-d', strtotime($date));

echo "<tr>";
echo "<th>". $log['filename']. "</th>";
echo "<th>". $log['type']. "</th>";
echo "<th><a href=\"https://rynantech.com/partner-login/cyklopclick.php?id=".$log['id']."\"><img src='https://rynantech.com/partner-login/sites/images/dl.png".$row['image_name']."'></a></th>";
echo "<th>". $log['notes']. "</th>";
echo "<th>". $createDate. "</th>";
//echo "<td>". $log['id']. "</td>";
//echo "<td>". $log['printers']. "</td>";
//echo "<td>". $log['link']. "</td>";
//echo "<td>". $log['lastupdate']. "</td>";
//echo "<td>". $log['views']. "</td>";
//echo "<td><a href=\"https://rynantech.com/partner-login/cyklop/VJET/$log[link]\" onclick=\"khoa();\">$log[link]</a></td>";

echo "</tr>";
}
?>

</table>
</div>



<div id="CM100-qg" class="tabcontent" style="display: block;" >
<table id="tracelog1" width="909" border="0" align="center">
<?php

//echo  @mysql_num_rows( $sql_query ); die();
$logs = @mysql_query("SELECT * from cyklop where printers like 'CM100' and type like 'Quick Guide' order by timecreate desc");
while($log = mysql_fetch_array( $logs )){
// Bo gio - chi lay ngay
$date = $log['timecreate'];
$createDate = date('Y-m-d', strtotime($date));

echo "<tr>";
echo "<th>". $log['filename']. "</th>";
echo "<th>". $log['type']. "</th>";
echo "<th><a href=\"http://rynantech.com/partner-login/cyklopclick.php?id=".$log['id']."\"><img src='http://www.rynantech.com/partner-login/sites/images/dl.png".$row['image_name']."'></a></th>";
echo "<th>". $log['notes']. "</th>";
echo "<th>". $createDate. "</th>";
//echo "<td>". $log['id']. "</td>";
//echo "<td>". $log['printers']. "</td>";
//echo "<td>". $log['link']. "</td>";
//echo "<td>". $log['lastupdate']. "</td>";
//echo "<td>". $log['views']. "</td>";
//echo "<td><a href=\"http://rynantech.com/partner-login/cyklop/VJET/$log[link]\" onclick=\"khoa();\">$log[link]</a></td>";

echo "</tr>";
}
?>

</table>
</div>



<div id="CM100H-qg" class="tabcontent">
<table id="tracelog1" width="909" border="0" align="center">
<?php

//echo  @mysql_num_rows( $sql_query ); die();
$logs = @mysql_query("SELECT * from cyklop where printers like 'CM100H' and type like 'Quick Guide' order by timecreate desc");
while($log = mysql_fetch_array( $logs )){
// Bo gio - chi lay ngay
$date = $log['timecreate'];
$createDate = date('Y-m-d', strtotime($date));

echo "<tr>";
echo "<th>". $log['filename']. "</th>";
echo "<th>". $log['type']. "</th>";
echo "<th><a href=\"http://rynantech.com/partner-login/cyklopclick.php?id=".$log['id']."\"><img src='http://www.rynantech.com/partner-login/sites/images/dl.png".$row['image_name']."'></a></th>";
echo "<th>". $log['notes']. "</th>";
echo "<th>". $createDate. "</th>";
//echo "<td>". $log['id']. "</td>";
//echo "<td>". $log['printers']. "</td>";
//echo "<td>". $log['link']. "</td>";
//echo "<td>". $log['lastupdate']. "</td>";
//echo "<td>". $log['views']. "</td>";
//echo "<td><a href=\"http://rynantech.com/partner-login/cyklop/VJET/$log[link]\" onclick=\"khoa();\">$log[link]</a></td>";

echo "</tr>";
}
?>

</table>
</div>


<div id="CM100S-qg" class="tabcontent">
<table id="tracelog1" width="909" border="0" align="center">
<?php

//echo  @mysql_num_rows( $sql_query ); die();
$logs = @mysql_query("SELECT * from cyklop where printers like 'CM100S' and type like 'Quick Guide' order by timecreate desc");
while($log = mysql_fetch_array( $logs )){
// Bo gio - chi lay ngay
$date = $log['timecreate'];
$createDate = date('Y-m-d', strtotime($date));

echo "<tr>";
echo "<th>". $log['filename']. "</th>";
echo "<th>". $log['type']. "</th>";
echo "<th><a href=\"http://rynantech.com/partner-login/cyklopclick.php?id=".$log['id']."\"><img src='http://www.rynantech.com/partner-login/sites/images/dl.png".$row['image_name']."'></a></th>";
echo "<th>". $log['notes']. "</th>";
echo "<th>". $createDate. "</th>";
//echo "<td>". $log['id']. "</td>";
//echo "<td>". $log['printers']. "</td>";
//echo "<td>". $log['link']. "</td>";
//echo "<td>". $log['lastupdate']. "</td>";
//echo "<td>". $log['views']. "</td>";
//echo "<td><a href=\"http://rynantech.com/partner-login/cyklop/VJET/$log[link]\" onclick=\"khoa();\">$log[link]</a></td>";

echo "</tr>";
}
?>

</table>
</div>
     
<div id="CM300-qg" class="tabcontent">
<table id="tracelog1" width="909" border="0" align="center">
<?php

//echo  @mysql_num_rows( $sql_query ); die();
$logs = @mysql_query("SELECT * from cyklop where printers like 'CM300' and type like 'Quick Guide' order by timecreate desc");
while($log = mysql_fetch_array( $logs )){
// Bo gio - chi lay ngay
$date = $log['timecreate'];
$createDate = date('Y-m-d', strtotime($date));

echo "<tr>";
echo "<th>". $log['filename']. "</th>";
echo "<th>". $log['type']. "</th>";
echo "<th><a href=\"http://rynantech.com/partner-login/cyklopclick.php?id=".$log['id']."\"><img src='http://www.rynantech.com/partner-login/sites/images/dl.png".$row['image_name']."'></a></th>";
echo "<th>". $log['notes']. "</th>";
echo "<th>". $createDate. "</th>";
//echo "<td>". $log['id']. "</td>";
//echo "<td>". $log['printers']. "</td>";
//echo "<td>". $log['link']. "</td>";
//echo "<td>". $log['lastupdate']. "</td>";
//echo "<td>". $log['views']. "</td>";
//echo "<td><a href=\"http://rynantech.com/partner-login/cyklop/VJET/$log[link]\" onclick=\"khoa();\">$log[link]</a></td>";

echo "</tr>";
}
?>

</table>
</div>

     
<div id="CM300e-qg" class="tabcontent">
<table id="tracelog1" width="909" border="0" align="center">
<?php

//echo  @mysql_num_rows( $sql_query ); die();
$logs = @mysql_query("SELECT * from cyklop where printers like 'CM300e' and type like 'Quick Guide' order by timecreate desc");
while($log = mysql_fetch_array( $logs )){
// Bo gio - chi lay ngay
$date = $log['timecreate'];
$createDate = date('Y-m-d', strtotime($date));

echo "<tr>";
echo "<th>". $log['filename']. "</th>";
echo "<th>". $log['type']. "</th>";
echo "<th><a href=\"http://rynantech.com/partner-login/cyklopclick.php?id=".$log['id']."\"><img src='http://www.rynantech.com/partner-login/sites/images/dl.png".$row['image_name']."'></a></th>";
echo "<th>". $log['notes']. "</th>";
echo "<th>". $createDate. "</th>";
//echo "<td>". $log['id']. "</td>";
//echo "<td>". $log['printers']. "</td>";
//echo "<td>". $log['link']. "</td>";
//echo "<td>". $log['lastupdate']. "</td>";
//echo "<td>". $log['views']. "</td>";
//echo "<td><a href=\"http://rynantech.com/partner-login/cyklop/VJET/$log[link]\" onclick=\"khoa();\">$log[link]</a></td>";

echo "</tr>";
}
?>

</table>
</div>


     
<div id="CM300Plus-qg" class="tabcontent">
<table id="tracelog1" width="909" border="0" align="center">
<?php

//echo  @mysql_num_rows( $sql_query ); die();
$logs = @mysql_query("SELECT * from cyklop where printers like 'CM300Plus' and type like 'Quick Guide' order by timecreate desc");
while($log = mysql_fetch_array( $logs )){
// Bo gio - chi lay ngay
$date = $log['timecreate'];
$createDate = date('Y-m-d', strtotime($date));

echo "<tr>";
echo "<th>". $log['filename']. "</th>";
echo "<th>". $log['type']. "</th>";
echo "<th><a href=\"http://rynantech.com/partner-login/cyklopclick.php?id=".$log['id']."\"><img src='http://www.rynantech.com/partner-login/sites/images/dl.png".$row['image_name']."'></a></th>";
echo "<th>". $log['notes']. "</th>";
echo "<th>". $createDate. "</th>";
//echo "<td>". $log['id']. "</td>";
//echo "<td>". $log['printers']. "</td>";
//echo "<td>". $log['link']. "</td>";
//echo "<td>". $log['lastupdate']. "</td>";
//echo "<td>". $log['views']. "</td>";
//echo "<td><a href=\"http://rynantech.com/partner-login/cyklop/VJET/$log[link]\" onclick=\"khoa();\">$log[link]</a></td>";

echo "</tr>";
}
?>

</table>
</div>

<div id="CM125-qg" class="tabcontent">
<table id="tracelog1" width="909" border="0" align="center">
<?php

//echo  @mysql_num_rows( $sql_query ); die();
$logs = @mysql_query("SELECT * from cyklop where printers like 'CM125' and type like 'Quick Guide' order by timecreate desc");
while($log = mysql_fetch_array( $logs )){
// Bo gio - chi lay ngay
$date = $log['timecreate'];
$createDate = date('Y-m-d', strtotime($date));

echo "<tr>";
echo "<th>". $log['filename']. "</th>";
echo "<th>". $log['type']. "</th>";
echo "<th><a href=\"http://rynantech.com/partner-login/cyklopclick.php?id=".$log['id']."\"><img src='http://www.rynantech.com/partner-login/sites/images/dl.png".$row['image_name']."'></a></th>";
echo "<th>". $log['notes']. "</th>";
echo "<th>". $createDate. "</th>";
//echo "<td>". $log['id']. "</td>";
//echo "<td>". $log['printers']. "</td>";
//echo "<td>". $log['link']. "</td>";
//echo "<td>". $log['lastupdate']. "</td>";
//echo "<td>". $log['views']. "</td>";
//echo "<td><a href=\"http://rynantech.com/partner-login/cyklop/VJET/$log[link]\" onclick=\"khoa();\">$log[link]</a></td>";

echo "</tr>";
}
?>

</table>
</div>




<div id="CM150-qg" class="tabcontent">
<table id="tracelog1" width="909" border="0" align="center">
<?php

//echo  @mysql_num_rows( $sql_query ); die();
$logs = @mysql_query("SELECT * from cyklop where printers like 'CM150' and type like 'Quick Guide' order by timecreate desc");
while($log = mysql_fetch_array( $logs )){
// Bo gio - chi lay ngay
$date = $log['timecreate'];
$createDate = date('Y-m-d', strtotime($date));

echo "<tr>";
echo "<th>". $log['filename']. "</th>";
echo "<th>". $log['type']. "</th>";
echo "<th><a href=\"http://rynantech.com/partner-login/cyklopclick.php?id=".$log['id']."\"><img src='http://www.rynantech.com/partner-login/sites/images/dl.png".$row['image_name']."'></a></th>";
echo "<th>". $log['notes']. "</th>";
echo "<th>". $createDate. "</th>";
//echo "<td>". $log['id']. "</td>";
//echo "<td>". $log['printers']. "</td>";
//echo "<td>". $log['link']. "</td>";
//echo "<td>". $log['lastupdate']. "</td>";
//echo "<td>". $log['views']. "</td>";
//echo "<td><a href=\"http://rynantech.com/partner-login/cyklop/VJET/$log[link]\" onclick=\"khoa();\">$log[link]</a></td>";

echo "</tr>";
}
?>

</table>
</div>

<div id="CM200-qg" class="tabcontent">
<table id="tracelog1" width="909" border="0" align="center">
<?php

//echo  @mysql_num_rows( $sql_query ); die();
$logs = @mysql_query("SELECT * from cyklop where printers like 'CM200' and type like 'Quick Guide' order by timecreate desc");
while($log = mysql_fetch_array( $logs )){
// Bo gio - chi lay ngay
$date = $log['timecreate'];
$createDate = date('Y-m-d', strtotime($date));

echo "<tr>";
echo "<th>". $log['filename']. "</th>";
echo "<th>". $log['type']. "</th>";
echo "<th><a href=\"http://rynantech.com/partner-login/cyklopclick.php?id=".$log['id']."\"><img src='http://www.rynantech.com/partner-login/sites/images/dl.png".$row['image_name']."'></a></th>";
echo "<th>". $log['notes']. "</th>";
echo "<th>". $createDate. "</th>";
//echo "<td>". $log['id']. "</td>";
//echo "<td>". $log['printers']. "</td>";
//echo "<td>". $log['link']. "</td>";
//echo "<td>". $log['lastupdate']. "</td>";
//echo "<td>". $log['views']. "</td>";
//echo "<td><a href=\"http://rynantech.com/partner-login/cyklop/VJET/$log[link]\" onclick=\"khoa();\">$log[link]</a></td>";

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
  <button class="tablinks" onclick="openCity(event, 'CM220-pr')">CM220</button>
  <button class="tablinks" onclick="openCity(event, 'CM100-pr')">CM100</button>
  <button class="tablinks" onclick="openCity(event, 'CM100H-pr')">CM100H</button>
  <button class="tablinks" onclick="openCity(event, 'CM100S-pr')">CM100S</button>
  <button class="tablinks" onclick="openCity(event, 'CM300-pr')">CM300</button>
  <button class="tablinks" onclick="openCity(event, 'CM300e-pr')">CM300e</button>
  <button class="tablinks" onclick="openCity(event, 'CM300Plus-pr')">CM300Plus</button>
  <button class="tablinks" onclick="openCity(event, 'CM125-pr')">CM125</button>
  <button class="tablinks" onclick="openCity(event, 'CM150-pr')">CM150</button>
  <button class="tablinks" onclick="openCity(event, 'CM200-pr')">CM200</button>
</div>

<div id="CM220-pr" class="tabcontent" style="display: block;" >
<table id="tracelog1" width="909" border="0" align="center">
<?php

//echo  @mysql_num_rows( $sql_query ); die();
$logs = @mysql_query("SELECT * from cyklop where printers like 'CM220' and type like 'Presentation' order by timecreate desc");
while($log = mysql_fetch_array( $logs )){
// Bo gio - chi lay ngay
$date = $log['timecreate'];
$createDate = date('Y-m-d', strtotime($date));

echo "<tr>";
echo "<th>". $log['filename']. "</th>";
echo "<th>". $log['type']. "</th>";
echo "<th><a href=\"https://rynantech.com/partner-login/cyklopclick.php?id=".$log['id']."\"><img src='https://rynantech.com/partner-login/sites/images/dl.png".$row['image_name']."'></a></th>";
echo "<th>". $log['notes']. "</th>";
echo "<th>". $createDate. "</th>";
//echo "<td>". $log['id']. "</td>";
//echo "<td>". $log['printers']. "</td>";
//echo "<td>". $log['link']. "</td>";
//echo "<td>". $log['lastupdate']. "</td>";
//echo "<td>". $log['views']. "</td>";
//echo "<td><a href=\"https://rynantech.com/partner-login/cyklop/VJET/$log[link]\" onclick=\"khoa();\">$log[link]</a></td>";

echo "</tr>";
}
?>

</table>
</div>



<div id="CM100-pr" class="tabcontent" style="display: block;" >
<table id="tracelog1" width="909" border="0" align="center">
<?php

//echo  @mysql_num_rows( $sql_query ); die();
$logs = @mysql_query("SELECT * from cyklop where printers like 'CM100' and type like 'Presentation' order by timecreate desc");
while($log = mysql_fetch_array( $logs )){
// Bo gio - chi lay ngay
$date = $log['timecreate'];
$createDate = date('Y-m-d', strtotime($date));

echo "<tr>";
echo "<th>". $log['filename']. "</th>";
echo "<th>". $log['type']. "</th>";
echo "<th><a href=\"http://rynantech.com/partner-login/cyklopclick.php?id=".$log['id']."\"><img src='http://www.rynantech.com/partner-login/sites/images/dl.png".$row['image_name']."'></a></th>";
echo "<th>". $log['notes']. "</th>";
echo "<th>". $createDate. "</th>";
//echo "<td>". $log['id']. "</td>";
//echo "<td>". $log['printers']. "</td>";
//echo "<td>". $log['link']. "</td>";
//echo "<td>". $log['lastupdate']. "</td>";
//echo "<td>". $log['views']. "</td>";
//echo "<td><a href=\"http://rynantech.com/partner-login/cyklop/VJET/$log[link]\" onclick=\"khoa();\">$log[link]</a></td>";

echo "</tr>";
}
?>

</table>
</div>



<div id="CM100H-pr" class="tabcontent">
<table id="tracelog1" width="909" border="0" align="center">
<?php

//echo  @mysql_num_rows( $sql_query ); die();
$logs = @mysql_query("SELECT * from cyklop where printers like 'CM100H' and type like 'Presentation' order by timecreate desc");
while($log = mysql_fetch_array( $logs )){
// Bo gio - chi lay ngay
$date = $log['timecreate'];
$createDate = date('Y-m-d', strtotime($date));

echo "<tr>";
echo "<th>". $log['filename']. "</th>";
echo "<th>". $log['type']. "</th>";
echo "<th><a href=\"http://rynantech.com/partner-login/cyklopclick.php?id=".$log['id']."\"><img src='http://www.rynantech.com/partner-login/sites/images/dl.png".$row['image_name']."'></a></th>";
echo "<th>". $log['notes']. "</th>";
echo "<th>". $createDate. "</th>";
//echo "<td>". $log['id']. "</td>";
//echo "<td>". $log['printers']. "</td>";
//echo "<td>". $log['link']. "</td>";
//echo "<td>". $log['lastupdate']. "</td>";
//echo "<td>". $log['views']. "</td>";
//echo "<td><a href=\"http://rynantech.com/partner-login/cyklop/VJET/$log[link]\" onclick=\"khoa();\">$log[link]</a></td>";

echo "</tr>";
}
?>

</table>
</div>


<div id="CM100S-pr" class="tabcontent">
<table id="tracelog1" width="909" border="0" align="center">
<?php

//echo  @mysql_num_rows( $sql_query ); die();
$logs = @mysql_query("SELECT * from cyklop where printers like 'CM100S' and type like 'Presentation' order by timecreate desc");
while($log = mysql_fetch_array( $logs )){
// Bo gio - chi lay ngay
$date = $log['timecreate'];
$createDate = date('Y-m-d', strtotime($date));

echo "<tr>";
echo "<th>". $log['filename']. "</th>";
echo "<th>". $log['type']. "</th>";
echo "<th><a href=\"http://rynantech.com/partner-login/cyklopclick.php?id=".$log['id']."\"><img src='http://www.rynantech.com/partner-login/sites/images/dl.png".$row['image_name']."'></a></th>";
echo "<th>". $log['notes']. "</th>";
echo "<th>". $createDate. "</th>";
//echo "<td>". $log['id']. "</td>";
//echo "<td>". $log['printers']. "</td>";
//echo "<td>". $log['link']. "</td>";
//echo "<td>". $log['lastupdate']. "</td>";
//echo "<td>". $log['views']. "</td>";
//echo "<td><a href=\"http://rynantech.com/partner-login/cyklop/VJET/$log[link]\" onclick=\"khoa();\">$log[link]</a></td>";

echo "</tr>";
}
?>

</table>
</div>
     
<div id="CM300-pr" class="tabcontent">
<table id="tracelog1" width="909" border="0" align="center">
<?php

//echo  @mysql_num_rows( $sql_query ); die();
$logs = @mysql_query("SELECT * from cyklop where printers like 'CM300' and type like 'Presentation' order by timecreate desc");
while($log = mysql_fetch_array( $logs )){
// Bo gio - chi lay ngay
$date = $log['timecreate'];
$createDate = date('Y-m-d', strtotime($date));

echo "<tr>";
echo "<th>". $log['filename']. "</th>";
echo "<th>". $log['type']. "</th>";
echo "<th><a href=\"http://rynantech.com/partner-login/cyklopclick.php?id=".$log['id']."\"><img src='http://www.rynantech.com/partner-login/sites/images/dl.png".$row['image_name']."'></a></th>";
echo "<th>". $log['notes']. "</th>";
echo "<th>". $createDate. "</th>";
//echo "<td>". $log['id']. "</td>";
//echo "<td>". $log['printers']. "</td>";
//echo "<td>". $log['link']. "</td>";
//echo "<td>". $log['lastupdate']. "</td>";
//echo "<td>". $log['views']. "</td>";
//echo "<td><a href=\"http://rynantech.com/partner-login/cyklop/VJET/$log[link]\" onclick=\"khoa();\">$log[link]</a></td>";

echo "</tr>";
}
?>

</table>
</div>

     
<div id="CM300e-pr" class="tabcontent">
<table id="tracelog1" width="909" border="0" align="center">
<?php

//echo  @mysql_num_rows( $sql_query ); die();
$logs = @mysql_query("SELECT * from cyklop where printers like 'CM300e' and type like 'Presentation' order by timecreate desc");
while($log = mysql_fetch_array( $logs )){
// Bo gio - chi lay ngay
$date = $log['timecreate'];
$createDate = date('Y-m-d', strtotime($date));

echo "<tr>";
echo "<th>". $log['filename']. "</th>";
echo "<th>". $log['type']. "</th>";
echo "<th><a href=\"http://rynantech.com/partner-login/cyklopclick.php?id=".$log['id']."\"><img src='http://www.rynantech.com/partner-login/sites/images/dl.png".$row['image_name']."'></a></th>";
echo "<th>". $log['notes']. "</th>";
echo "<th>". $createDate. "</th>";
//echo "<td>". $log['id']. "</td>";
//echo "<td>". $log['printers']. "</td>";
//echo "<td>". $log['link']. "</td>";
//echo "<td>". $log['lastupdate']. "</td>";
//echo "<td>". $log['views']. "</td>";
//echo "<td><a href=\"http://rynantech.com/partner-login/cyklop/VJET/$log[link]\" onclick=\"khoa();\">$log[link]</a></td>";

echo "</tr>";
}
?>

</table>
</div>


     
<div id="CM300Plus-pr" class="tabcontent">
<table id="tracelog1" width="909" border="0" align="center">
<?php

//echo  @mysql_num_rows( $sql_query ); die();
$logs = @mysql_query("SELECT * from cyklop where printers like 'CM300Plus' and type like 'Presentation' order by timecreate desc");
while($log = mysql_fetch_array( $logs )){
// Bo gio - chi lay ngay
$date = $log['timecreate'];
$createDate = date('Y-m-d', strtotime($date));

echo "<tr>";
echo "<th>". $log['filename']. "</th>";
echo "<th>". $log['type']. "</th>";
echo "<th><a href=\"http://rynantech.com/partner-login/cyklopclick.php?id=".$log['id']."\"><img src='http://www.rynantech.com/partner-login/sites/images/dl.png".$row['image_name']."'></a></th>";
echo "<th>". $log['notes']. "</th>";
echo "<th>". $createDate. "</th>";
//echo "<td>". $log['id']. "</td>";
//echo "<td>". $log['printers']. "</td>";
//echo "<td>". $log['link']. "</td>";
//echo "<td>". $log['lastupdate']. "</td>";
//echo "<td>". $log['views']. "</td>";
//echo "<td><a href=\"http://rynantech.com/partner-login/cyklop/VJET/$log[link]\" onclick=\"khoa();\">$log[link]</a></td>";

echo "</tr>";
}
?>

</table>
</div>

<div id="CM125-pr" class="tabcontent">
<table id="tracelog1" width="909" border="0" align="center">
<?php

//echo  @mysql_num_rows( $sql_query ); die();
$logs = @mysql_query("SELECT * from cyklop where printers like 'CM125' and type like 'Presentation' order by timecreate desc");
while($log = mysql_fetch_array( $logs )){
// Bo gio - chi lay ngay
$date = $log['timecreate'];
$createDate = date('Y-m-d', strtotime($date));

echo "<tr>";
echo "<th>". $log['filename']. "</th>";
echo "<th>". $log['type']. "</th>";
echo "<th><a href=\"http://rynantech.com/partner-login/cyklopclick.php?id=".$log['id']."\"><img src='http://www.rynantech.com/partner-login/sites/images/dl.png".$row['image_name']."'></a></th>";
echo "<th>". $log['notes']. "</th>";
echo "<th>". $createDate. "</th>";
//echo "<td>". $log['id']. "</td>";
//echo "<td>". $log['printers']. "</td>";
//echo "<td>". $log['link']. "</td>";
//echo "<td>". $log['lastupdate']. "</td>";
//echo "<td>". $log['views']. "</td>";
//echo "<td><a href=\"http://rynantech.com/partner-login/cyklop/VJET/$log[link]\" onclick=\"khoa();\">$log[link]</a></td>";

echo "</tr>";
}
?>

</table>
</div>




<div id="CM150-pr" class="tabcontent">
<table id="tracelog1" width="909" border="0" align="center">
<?php

//echo  @mysql_num_rows( $sql_query ); die();
$logs = @mysql_query("SELECT * from cyklop where printers like 'CM150' and type like 'Presentation' order by timecreate desc");
while($log = mysql_fetch_array( $logs )){
// Bo gio - chi lay ngay
$date = $log['timecreate'];
$createDate = date('Y-m-d', strtotime($date));

echo "<tr>";
echo "<th>". $log['filename']. "</th>";
echo "<th>". $log['type']. "</th>";
echo "<th><a href=\"http://rynantech.com/partner-login/cyklopclick.php?id=".$log['id']."\"><img src='http://www.rynantech.com/partner-login/sites/images/dl.png".$row['image_name']."'></a></th>";
echo "<th>". $log['notes']. "</th>";
echo "<th>". $createDate. "</th>";
//echo "<td>". $log['id']. "</td>";
//echo "<td>". $log['printers']. "</td>";
//echo "<td>". $log['link']. "</td>";
//echo "<td>". $log['lastupdate']. "</td>";
//echo "<td>". $log['views']. "</td>";
//echo "<td><a href=\"http://rynantech.com/partner-login/cyklop/VJET/$log[link]\" onclick=\"khoa();\">$log[link]</a></td>";

echo "</tr>";
}
?>

</table>
</div>

<div id="CM200-pr" class="tabcontent">
<table id="tracelog1" width="909" border="0" align="center">
<?php

//echo  @mysql_num_rows( $sql_query ); die();
$logs = @mysql_query("SELECT * from cyklop where printers like 'CM200' and type like 'Presentation' order by timecreate desc");
while($log = mysql_fetch_array( $logs )){
// Bo gio - chi lay ngay
$date = $log['timecreate'];
$createDate = date('Y-m-d', strtotime($date));

echo "<tr>";
echo "<th>". $log['filename']. "</th>";
echo "<th>". $log['type']. "</th>";
echo "<th><a href=\"http://rynantech.com/partner-login/cyklopclick.php?id=".$log['id']."\"><img src='http://www.rynantech.com/partner-login/sites/images/dl.png".$row['image_name']."'></a></th>";
echo "<th>". $log['notes']. "</th>";
echo "<th>". $createDate. "</th>";
//echo "<td>". $log['id']. "</td>";
//echo "<td>". $log['printers']. "</td>";
//echo "<td>". $log['link']. "</td>";
//echo "<td>". $log['lastupdate']. "</td>";
//echo "<td>". $log['views']. "</td>";
//echo "<td><a href=\"http://rynantech.com/partner-login/cyklop/VJET/$log[link]\" onclick=\"khoa();\">$log[link]</a></td>";

echo "</tr>";
}
?>

</table>
</div>


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
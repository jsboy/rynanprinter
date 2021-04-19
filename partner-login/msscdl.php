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
	if  ( $_SESSION['role'] == "mssc" ) 
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
<title> LIST mssc</title>	

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
		<div><p align="justify" class="mem_acc">&nbsp;&nbsp;&nbsp;&nbsp;List Files for MSSC 
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
  <button class="tablinks" onclick="openCity(event, 'Smart-Jet Duo')">Smart-Jet Duo</button>
  <button class="tablinks" onclick="openCity(event, 'Smart-Jet')">Smart-Jet</button>
  <button class="tablinks" onclick="openCity(event, 'Smart-Jet Plus')">Smart-Jet Plus</button>
  <button class="tablinks" onclick="openCity(event, 'Smart-Jet Blue')">Smart-Jet Blue</button>
  <button class="tablinks" onclick="openCity(event, 'Smart-Jet Lite')">Smart-Jet Lite</button>
  <button class="tablinks" onclick="openCity(event, 'Smart-Jet Handheld')">Smart-Jet Handheld</button>
  <button class="tablinks" onclick="openCity(event, 'Smart-Jet Glide')">Smart-Jet Glide</button>
  <button class="tablinks" onclick="openCity(event, 'Smart-Jet Max')">Smart-Jet Max</button>
  <button class="tablinks" onclick="openCity(event, 'DL100')">DL100</button>
  <button class="tablinks" onclick="openCity(event, 'DL200')">DL200</button>
</div>

<div id="Smart-Jet Duo" class="tabcontent" style="display: block;" >
<table id="tracelog1" width="909" border="0" align="center">
<?php

//echo  @mysql_num_rows( $sql_query ); die();
$logs = @mysql_query("SELECT * from mssc where printers like 'Smart-Jet Duo' and type like 'Firmware' order by timecreate desc");
while($log = mysql_fetch_array( $logs )){
// Bo gio - chi lay ngay
$date = $log['timecreate'];
$createDate = date('Y-m-d', strtotime($date));

echo "<tr>";
echo "<th>". $log['filename']. "</th>";
echo "<th>". $log['type']. "</th>";
echo "<th><a href=\"https://rynantech.com/partner-login/msscclick.php?id=".$log['id']."\"><img src='https://rynantech.com/partner-login/sites/images/dl.png".$row['image_name']."'></a></th>";
echo "<th>". $log['notes']. "</th>";
echo "<th>". $createDate. "</th>";
//echo "<td>". $log['id']. "</td>";
//echo "<td>". $log['printers']. "</td>";
//echo "<td>". $log['link']. "</td>";
//echo "<td>". $log['lastupdate']. "</td>";
//echo "<td>". $log['views']. "</td>";
//echo "<td><a href=\"https://rynantech.com/partner-login/mssc/VJET/$log[link]\" onclick=\"khoa();\">$log[link]</a></td>";

echo "</tr>";
}
?>

</table>
</div>

<div id="Smart-Jet" class="tabcontent" style="display: block;" >
<table id="tracelog1" width="909" border="0" align="center">
<?php

//echo  @mysql_num_rows( $sql_query ); die();
$logs = @mysql_query("SELECT * from mssc where printers like 'Smart-Jet' and type like 'Firmware' order by timecreate desc");
while($log = mysql_fetch_array( $logs )){
// Bo gio - chi lay ngay
$date = $log['timecreate'];
$createDate = date('Y-m-d', strtotime($date));

echo "<tr>";
echo "<th>". $log['filename']. "</th>";
echo "<th>". $log['type']. "</th>";
echo "<th><a href=\"http://rynantech.com/partner-login/msscclick.php?id=".$log['id']."\"><img src='http://www.rynantech.com/partner-login/sites/images/dl.png".$row['image_name']."'></a></th>";
echo "<th>". $log['notes']. "</th>";
echo "<th>". $createDate. "</th>";
//echo "<td>". $log['id']. "</td>";
//echo "<td>". $log['printers']. "</td>";
//echo "<td>". $log['link']. "</td>";
//echo "<td>". $log['lastupdate']. "</td>";
//echo "<td>". $log['views']. "</td>";
//echo "<td><a href=\"http://rynantech.com/partner-login/mssc/VJET/$log[link]\" onclick=\"khoa();\">$log[link]</a></td>";

echo "</tr>";
}
?>

</table>
</div>


<div id="Smart-Jet Plus" class="tabcontent" >
<table id="tracelog1" width="909" border="0" align="center">
<?php

//echo  @mysql_num_rows( $sql_query ); die();
$logs = @mysql_query("SELECT * from mssc where printers like 'Smart-Jet Plus' and type like 'Firmware' order by timecreate desc");
while($log = mysql_fetch_array( $logs )){
// Bo gio - chi lay ngay
$date = $log['timecreate'];
$createDate = date('Y-m-d', strtotime($date));

echo "<tr>";
echo "<th>". $log['filename']. "</th>";
echo "<th>". $log['type']. "</th>";
echo "<th><a href=\"http://rynantech.com/partner-login/msscclick.php?id=".$log['id']."\"><img src='http://www.rynantech.com/partner-login/sites/images/dl.png".$row['image_name']."'></a></th>";
echo "<th>". $log['notes']. "</th>";
echo "<th>". $createDate. "</th>";
//echo "<td>". $log['id']. "</td>";
//echo "<td>". $log['printers']. "</td>";
//echo "<td>". $log['link']. "</td>";
//echo "<td>". $log['lastupdate']. "</td>";
//echo "<td>". $log['views']. "</td>";
//echo "<td><a href=\"http://rynantech.com/partner-login/mssc/VJET/$log[link]\" onclick=\"khoa();\">$log[link]</a></td>";

echo "</tr>";
}
?>

</table>
</div>



<div id="Smart-Jet Blue" class="tabcontent">
<table id="tracelog1" width="909" border="0" align="center">
<?php

//echo  @mysql_num_rows( $sql_query ); die();
$logs = @mysql_query("SELECT * from mssc where printers like 'Smart-Jet Blue' and type like 'Firmware' order by timecreate desc");
while($log = mysql_fetch_array( $logs )){
// Bo gio - chi lay ngay
$date = $log['timecreate'];
$createDate = date('Y-m-d', strtotime($date));

echo "<tr>";
echo "<th>". $log['filename']. "</th>";
echo "<th>". $log['type']. "</th>";
echo "<th><a href=\"http://rynantech.com/partner-login/msscclick.php?id=".$log['id']."\"><img src='http://www.rynantech.com/partner-login/sites/images/dl.png".$row['image_name']."'></a></th>";
echo "<th>". $log['notes']. "</th>";
echo "<th>". $createDate. "</th>";
//echo "<td>". $log['id']. "</td>";
//echo "<td>". $log['printers']. "</td>";
//echo "<td>". $log['link']. "</td>";
//echo "<td>". $log['lastupdate']. "</td>";
//echo "<td>". $log['views']. "</td>";
//echo "<td><a href=\"http://rynantech.com/partner-login/mssc/VJET/$log[link]\" onclick=\"khoa();\">$log[link]</a></td>";

echo "</tr>";
}
?>

</table>
</div>


<div id="Smart-Jet Lite" class="tabcontent">
<table id="tracelog1" width="909" border="0" align="center">
<?php

//echo  @mysql_num_rows( $sql_query ); die();
$logs = @mysql_query("SELECT * from mssc where printers like 'Smart-Jet Lite' and type like 'Firmware' order by timecreate desc");
while($log = mysql_fetch_array( $logs )){
// Bo gio - chi lay ngay
$date = $log['timecreate'];
$createDate = date('Y-m-d', strtotime($date));

echo "<tr>";
echo "<th>". $log['filename']. "</th>";
echo "<th>". $log['type']. "</th>";
echo "<th><a href=\"http://rynantech.com/partner-login/msscclick.php?id=".$log['id']."\"><img src='http://www.rynantech.com/partner-login/sites/images/dl.png".$row['image_name']."'></a></th>";
echo "<th>". $log['notes']. "</th>";
echo "<th>". $createDate. "</th>";
//echo "<td>". $log['id']. "</td>";
//echo "<td>". $log['printers']. "</td>";
//echo "<td>". $log['link']. "</td>";
//echo "<td>". $log['lastupdate']. "</td>";
//echo "<td>". $log['views']. "</td>";
//echo "<td><a href=\"http://rynantech.com/partner-login/mssc/VJET/$log[link]\" onclick=\"khoa();\">$log[link]</a></td>";

echo "</tr>";
}
?>

</table>
</div>
     
<div id="Smart-Jet Handheld" class="tabcontent">
<table id="tracelog1" width="909" border="0" align="center">
<?php

//echo  @mysql_num_rows( $sql_query ); die();
$logs = @mysql_query("SELECT * from mssc where printers like 'Smart-Jet Handheld' and type like 'Firmware' order by timecreate desc");
while($log = mysql_fetch_array( $logs )){
// Bo gio - chi lay ngay
$date = $log['timecreate'];
$createDate = date('Y-m-d', strtotime($date));

echo "<tr>";
echo "<th>". $log['filename']. "</th>";
echo "<th>". $log['type']. "</th>";
echo "<th><a href=\"http://rynantech.com/partner-login/msscclick.php?id=".$log['id']."\"><img src='http://www.rynantech.com/partner-login/sites/images/dl.png".$row['image_name']."'></a></th>";
echo "<th>". $log['notes']. "</th>";
echo "<th>". $createDate. "</th>";
//echo "<td>". $log['id']. "</td>";
//echo "<td>". $log['printers']. "</td>";
//echo "<td>". $log['link']. "</td>";
//echo "<td>". $log['lastupdate']. "</td>";
//echo "<td>". $log['views']. "</td>";
//echo "<td><a href=\"http://rynantech.com/partner-login/mssc/VJET/$log[link]\" onclick=\"khoa();\">$log[link]</a></td>";

echo "</tr>";
}
?>

</table>
</div>

     
<div id="Smart-Jet Glide" class="tabcontent">
<table id="tracelog1" width="909" border="0" align="center">
<?php

//echo  @mysql_num_rows( $sql_query ); die();
$logs = @mysql_query("SELECT * from mssc where printers like 'Smart-Jet Glide' and type like 'Firmware' order by timecreate desc");
while($log = mysql_fetch_array( $logs )){
// Bo gio - chi lay ngay
$date = $log['timecreate'];
$createDate = date('Y-m-d', strtotime($date));

echo "<tr>";
echo "<th>". $log['filename']. "</th>";
echo "<th>". $log['type']. "</th>";
echo "<th><a href=\"http://rynantech.com/partner-login/msscclick.php?id=".$log['id']."\"><img src='http://www.rynantech.com/partner-login/sites/images/dl.png".$row['image_name']."'></a></th>";
echo "<th>". $log['notes']. "</th>";
echo "<th>". $createDate. "</th>";
//echo "<td>". $log['id']. "</td>";
//echo "<td>". $log['printers']. "</td>";
//echo "<td>". $log['link']. "</td>";
//echo "<td>". $log['lastupdate']. "</td>";
//echo "<td>". $log['views']. "</td>";
//echo "<td><a href=\"http://rynantech.com/partner-login/mssc/VJET/$log[link]\" onclick=\"khoa();\">$log[link]</a></td>";

echo "</tr>";
}
?>

</table>
</div>

   
<div id="Smart-Jet Max" class="tabcontent">
<table id="tracelog1" width="909" border="0" align="center">
<?php

//echo  @mysql_num_rows( $sql_query ); die();
$logs = @mysql_query("SELECT * from mssc where printers like 'Smart-Jet Max' and type like 'Firmware' order by timecreate desc");
while($log = mysql_fetch_array( $logs )){
// Bo gio - chi lay ngay
$date = $log['timecreate'];
$createDate = date('Y-m-d', strtotime($date));

echo "<tr>";
echo "<th>". $log['filename']. "</th>";
echo "<th>". $log['type']. "</th>";
echo "<th><a href=\"http://rynantech.com/partner-login/msscclick.php?id=".$log['id']."\"><img src='http://www.rynantech.com/partner-login/sites/images/dl.png".$row['image_name']."'></a></th>";
echo "<th>". $log['notes']. "</th>";
echo "<th>". $createDate. "</th>";
//echo "<td>". $log['id']. "</td>";
//echo "<td>". $log['printers']. "</td>";
//echo "<td>". $log['link']. "</td>";
//echo "<td>". $log['lastupdate']. "</td>";
//echo "<td>". $log['views']. "</td>";
//echo "<td><a href=\"http://rynantech.com/partner-login/mssc/VJET/$log[link]\" onclick=\"khoa();\">$log[link]</a></td>";

echo "</tr>";
}
?>

</table>
</div>

   
<div id="DL100" class="tabcontent">
<table id="tracelog1" width="909" border="0" align="center">
<?php

//echo  @mysql_num_rows( $sql_query ); die();
$logs = @mysql_query("SELECT * from mssc where printers like 'DL100' and type like 'Firmware' order by timecreate desc");
while($log = mysql_fetch_array( $logs )){
// Bo gio - chi lay ngay
$date = $log['timecreate'];
$createDate = date('Y-m-d', strtotime($date));

echo "<tr>";
echo "<th>". $log['filename']. "</th>";
echo "<th>". $log['type']. "</th>";
echo "<th><a href=\"http://rynantech.com/partner-login/msscclick.php?id=".$log['id']."\"><img src='http://www.rynantech.com/partner-login/sites/images/dl.png".$row['image_name']."'></a></th>";
echo "<th>". $log['notes']. "</th>";
echo "<th>". $createDate. "</th>";
//echo "<td>". $log['id']. "</td>";
//echo "<td>". $log['printers']. "</td>";
//echo "<td>". $log['link']. "</td>";
//echo "<td>". $log['lastupdate']. "</td>";
//echo "<td>". $log['views']. "</td>";
//echo "<td><a href=\"http://rynantech.com/partner-login/mssc/VJET/$log[link]\" onclick=\"khoa();\">$log[link]</a></td>";

echo "</tr>";
}
?>

</table>
</div>

   
<div id="DL200" class="tabcontent">
<table id="tracelog1" width="909" border="0" align="center">
<?php

//echo  @mysql_num_rows( $sql_query ); die();
$logs = @mysql_query("SELECT * from mssc where printers like 'DL200' and type like 'Firmware' order by timecreate desc");
while($log = mysql_fetch_array( $logs )){
// Bo gio - chi lay ngay
$date = $log['timecreate'];
$createDate = date('Y-m-d', strtotime($date));

echo "<tr>";
echo "<th>". $log['filename']. "</th>";
echo "<th>". $log['type']. "</th>";
echo "<th><a href=\"http://rynantech.com/partner-login/msscclick.php?id=".$log['id']."\"><img src='http://www.rynantech.com/partner-login/sites/images/dl.png".$row['image_name']."'></a></th>";
echo "<th>". $log['notes']. "</th>";
echo "<th>". $createDate. "</th>";
//echo "<td>". $log['id']. "</td>";
//echo "<td>". $log['printers']. "</td>";
//echo "<td>". $log['link']. "</td>";
//echo "<td>". $log['lastupdate']. "</td>";
//echo "<td>". $log['views']. "</td>";
//echo "<td><a href=\"http://rynantech.com/partner-login/mssc/VJET/$log[link]\" onclick=\"khoa();\">$log[link]</a></td>";

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
  <button class="tablinks" onclick="openCity(event, 'Smart-Jet Duo-sw')">Smart-Jet Duo</button>
  <button class="tablinks" onclick="openCity(event, 'Smart-Jet-sw')">Smart-Jet</button>
  <button class="tablinks" onclick="openCity(event, 'Smart-Jet Plus-sw')">Smart-Jet Plus</button>
  <button class="tablinks" onclick="openCity(event, 'Smart-Jet Blue-sw')">Smart-Jet Blue</button>
  <button class="tablinks" onclick="openCity(event, 'Smart-Jet Lite-sw')">Smart-Jet Lite</button>
  <button class="tablinks" onclick="openCity(event, 'Smart-Jet Handheld-sw')">Smart-Jet Handheld</button>
  <button class="tablinks" onclick="openCity(event, 'Smart-Jet Glide-sw')">Smart-Jet Glide</button>
  <button class="tablinks" onclick="openCity(event, 'Smart-Jet Max-sw')">Smart-Jet Max</button>
  <button class="tablinks" onclick="openCity(event, 'DL100-sw')">DL100</button>
  <button class="tablinks" onclick="openCity(event, 'DL200-sw')">DL200</button>
</div>

<div id="Smart-Jet Duo-sw" class="tabcontent" style="display: block;" >
<table id="tracelog1" width="909" border="0" align="center">
<?php

//echo  @mysql_num_rows( $sql_query ); die();
$logs = @mysql_query("SELECT * from mssc where printers like 'Smart-Jet Duo' and type like 'software' order by timecreate desc");
while($log = mysql_fetch_array( $logs )){
// Bo gio - chi lay ngay
$date = $log['timecreate'];
$createDate = date('Y-m-d', strtotime($date));

echo "<tr>";
echo "<th>". $log['filename']. "</th>";
echo "<th>". $log['type']. "</th>";
echo "<th><a href=\"https://rynantech.com/partner-login/msscclick.php?id=".$log['id']."\"><img src='https://rynantech.com/partner-login/sites/images/dl.png".$row['image_name']."'></a></th>";
echo "<th>". $log['notes']. "</th>";
echo "<th>". $createDate. "</th>";
//echo "<td>". $log['id']. "</td>";
//echo "<td>". $log['printers']. "</td>";
//echo "<td>". $log['link']. "</td>";
//echo "<td>". $log['lastupdate']. "</td>";
//echo "<td>". $log['views']. "</td>";
//echo "<td><a href=\"https://rynantech.com/partner-login/mssc/VJET/$log[link]\" onclick=\"khoa();\">$log[link]</a></td>";

echo "</tr>";
}
?>

</table>
</div>


<div id="Smart-Jet-sw" class="tabcontent" style="display: block;" >
<table id="tracelog1" width="909" border="0" align="center">
<?php

//echo  @mysql_num_rows( $sql_query ); die();
$logs = @mysql_query("SELECT * from mssc where printers like 'Smart-Jet' and type like 'software' order by timecreate desc");
while($log = mysql_fetch_array( $logs )){
// Bo gio - chi lay ngay
$date = $log['timecreate'];
$createDate = date('Y-m-d', strtotime($date));

echo "<tr>";
echo "<th>". $log['filename']. "</th>";
echo "<th>". $log['type']. "</th>";
echo "<th><a href=\"http://rynantech.com/partner-login/msscclick.php?id=".$log['id']."\"><img src='http://www.rynantech.com/partner-login/sites/images/dl.png".$row['image_name']."'></a></th>";
echo "<th>". $log['notes']. "</th>";
echo "<th>". $createDate. "</th>";
//echo "<td>". $log['id']. "</td>";
//echo "<td>". $log['printers']. "</td>";
//echo "<td>". $log['link']. "</td>";
//echo "<td>". $log['lastupdate']. "</td>";
//echo "<td>". $log['views']. "</td>";
//echo "<td><a href=\"http://rynantech.com/partner-login/mssc/VJET/$log[link]\" onclick=\"khoa();\">$log[link]</a></td>";

echo "</tr>";
}
?>

</table>
</div>
<div id="Smart-Jet Plus-sw" class="tabcontent" >
<table id="tracelog1" width="909" border="0" align="center">
<?php

//echo  @mysql_num_rows( $sql_query ); die();
$logs = @mysql_query("SELECT * from mssc where printers like 'Smart-Jet Plus' and type like 'software' order by timecreate desc");
while($log = mysql_fetch_array( $logs )){
// Bo gio - chi lay ngay
$date = $log['timecreate'];
$createDate = date('Y-m-d', strtotime($date));

echo "<tr>";
echo "<th>". $log['filename']. "</th>";
echo "<th>". $log['type']. "</th>";
echo "<th><a href=\"http://rynantech.com/partner-login/msscclick.php?id=".$log['id']."\"><img src='http://www.rynantech.com/partner-login/sites/images/dl.png".$row['image_name']."'></a></th>";
echo "<th>". $log['notes']. "</th>";
echo "<th>". $createDate. "</th>";
//echo "<td>". $log['id']. "</td>";
//echo "<td>". $log['printers']. "</td>";
//echo "<td>". $log['link']. "</td>";
//echo "<td>". $log['lastupdate']. "</td>";
//echo "<td>". $log['views']. "</td>";
//echo "<td><a href=\"http://rynantech.com/partner-login/mssc/VJET/$log[link]\" onclick=\"khoa();\">$log[link]</a></td>";

echo "</tr>";
}
?>

</table>
</div>



<div id="Smart-Jet Blue-sw" class="tabcontent">
<table id="tracelog1" width="909" border="0" align="center">
<?php

//echo  @mysql_num_rows( $sql_query ); die();
$logs = @mysql_query("SELECT * from mssc where printers like 'Smart-Jet Blue' and type like 'software' order by timecreate desc");
while($log = mysql_fetch_array( $logs )){
// Bo gio - chi lay ngay
$date = $log['timecreate'];
$createDate = date('Y-m-d', strtotime($date));

echo "<tr>";
echo "<th>". $log['filename']. "</th>";
echo "<th>". $log['type']. "</th>";
echo "<th><a href=\"http://rynantech.com/partner-login/msscclick.php?id=".$log['id']."\"><img src='http://www.rynantech.com/partner-login/sites/images/dl.png".$row['image_name']."'></a></th>";
echo "<th>". $log['notes']. "</th>";
echo "<th>". $createDate. "</th>";
//echo "<td>". $log['id']. "</td>";
//echo "<td>". $log['printers']. "</td>";
//echo "<td>". $log['link']. "</td>";
//echo "<td>". $log['lastupdate']. "</td>";
//echo "<td>". $log['views']. "</td>";
//echo "<td><a href=\"http://rynantech.com/partner-login/mssc/VJET/$log[link]\" onclick=\"khoa();\">$log[link]</a></td>";

echo "</tr>";
}
?>

</table>
</div>


<div id="Smart-Jet Lite-sw" class="tabcontent">
<table id="tracelog1" width="909" border="0" align="center">
<?php

//echo  @mysql_num_rows( $sql_query ); die();
$logs = @mysql_query("SELECT * from mssc where printers like 'Smart-Jet Lite' and type like 'software' order by timecreate desc");
while($log = mysql_fetch_array( $logs )){
// Bo gio - chi lay ngay
$date = $log['timecreate'];
$createDate = date('Y-m-d', strtotime($date));

echo "<tr>";
echo "<th>". $log['filename']. "</th>";
echo "<th>". $log['type']. "</th>";
echo "<th><a href=\"http://rynantech.com/partner-login/msscclick.php?id=".$log['id']."\"><img src='http://www.rynantech.com/partner-login/sites/images/dl.png".$row['image_name']."'></a></th>";
echo "<th>". $log['notes']. "</th>";
echo "<th>". $createDate. "</th>";
//echo "<td>". $log['id']. "</td>";
//echo "<td>". $log['printers']. "</td>";
//echo "<td>". $log['link']. "</td>";
//echo "<td>". $log['lastupdate']. "</td>";
//echo "<td>". $log['views']. "</td>";
//echo "<td><a href=\"http://rynantech.com/partner-login/mssc/VJET/$log[link]\" onclick=\"khoa();\">$log[link]</a></td>";

echo "</tr>";
}
?>

</table>
</div>
     
<div id="Smart-Jet Handheld-sw" class="tabcontent">
<table id="tracelog1" width="909" border="0" align="center">
<?php

//echo  @mysql_num_rows( $sql_query ); die();
$logs = @mysql_query("SELECT * from mssc where printers like 'Smart-Jet Handheld' and type like 'software' order by timecreate desc");
while($log = mysql_fetch_array( $logs )){
// Bo gio - chi lay ngay
$date = $log['timecreate'];
$createDate = date('Y-m-d', strtotime($date));

echo "<tr>";
echo "<th>". $log['filename']. "</th>";
echo "<th>". $log['type']. "</th>";
echo "<th><a href=\"http://rynantech.com/partner-login/msscclick.php?id=".$log['id']."\"><img src='http://www.rynantech.com/partner-login/sites/images/dl.png".$row['image_name']."'></a></th>";
echo "<th>". $log['notes']. "</th>";
echo "<th>". $createDate. "</th>";
//echo "<td>". $log['id']. "</td>";
//echo "<td>". $log['printers']. "</td>";
//echo "<td>". $log['link']. "</td>";
//echo "<td>". $log['lastupdate']. "</td>";
//echo "<td>". $log['views']. "</td>";
//echo "<td><a href=\"http://rynantech.com/partner-login/mssc/VJET/$log[link]\" onclick=\"khoa();\">$log[link]</a></td>";

echo "</tr>";
}
?>

</table>
</div>

     


     
<div id="Smart-Jet Glide-sw" class="tabcontent">
<table id="tracelog1" width="909" border="0" align="center">
<?php

//echo  @mysql_num_rows( $sql_query ); die();
$logs = @mysql_query("SELECT * from mssc where printers like 'Smart-Jet Glide' and type like 'software' order by timecreate desc");
while($log = mysql_fetch_array( $logs )){
// Bo gio - chi lay ngay
$date = $log['timecreate'];
$createDate = date('Y-m-d', strtotime($date));

echo "<tr>";
echo "<th>". $log['filename']. "</th>";
echo "<th>". $log['type']. "</th>";
echo "<th><a href=\"http://rynantech.com/partner-login/msscclick.php?id=".$log['id']."\"><img src='http://www.rynantech.com/partner-login/sites/images/dl.png".$row['image_name']."'></a></th>";
echo "<th>". $log['notes']. "</th>";
echo "<th>". $createDate. "</th>";
//echo "<td>". $log['id']. "</td>";
//echo "<td>". $log['printers']. "</td>";
//echo "<td>". $log['link']. "</td>";
//echo "<td>". $log['lastupdate']. "</td>";
//echo "<td>". $log['views']. "</td>";
//echo "<td><a href=\"http://rynantech.com/partner-login/mssc/VJET/$log[link]\" onclick=\"khoa();\">$log[link]</a></td>";

echo "</tr>";
}
?>

</table>
</div>
     
<div id="Smart-Jet Max-sw" class="tabcontent">
<table id="tracelog1" width="909" border="0" align="center">
<?php

//echo  @mysql_num_rows( $sql_query ); die();
$logs = @mysql_query("SELECT * from mssc where printers like 'Smart-Jet Max' and type like 'software' order by timecreate desc");
while($log = mysql_fetch_array( $logs )){
// Bo gio - chi lay ngay
$date = $log['timecreate'];
$createDate = date('Y-m-d', strtotime($date));

echo "<tr>";
echo "<th>". $log['filename']. "</th>";
echo "<th>". $log['type']. "</th>";
echo "<th><a href=\"http://rynantech.com/partner-login/msscclick.php?id=".$log['id']."\"><img src='http://www.rynantech.com/partner-login/sites/images/dl.png".$row['image_name']."'></a></th>";
echo "<th>". $log['notes']. "</th>";
echo "<th>". $createDate. "</th>";
//echo "<td>". $log['id']. "</td>";
//echo "<td>". $log['printers']. "</td>";
//echo "<td>". $log['link']. "</td>";
//echo "<td>". $log['lastupdate']. "</td>";
//echo "<td>". $log['views']. "</td>";
//echo "<td><a href=\"http://rynantech.com/partner-login/mssc/VJET/$log[link]\" onclick=\"khoa();\">$log[link]</a></td>";

echo "</tr>";
}
?>

</table>
</div>
     
<div id="DL100-sw" class="tabcontent">
<table id="tracelog1" width="909" border="0" align="center">
<?php

//echo  @mysql_num_rows( $sql_query ); die();
$logs = @mysql_query("SELECT * from mssc where printers like 'DL100' and type like 'software' order by timecreate desc");
while($log = mysql_fetch_array( $logs )){
// Bo gio - chi lay ngay
$date = $log['timecreate'];
$createDate = date('Y-m-d', strtotime($date));

echo "<tr>";
echo "<th>". $log['filename']. "</th>";
echo "<th>". $log['type']. "</th>";
echo "<th><a href=\"http://rynantech.com/partner-login/msscclick.php?id=".$log['id']."\"><img src='http://www.rynantech.com/partner-login/sites/images/dl.png".$row['image_name']."'></a></th>";
echo "<th>". $log['notes']. "</th>";
echo "<th>". $createDate. "</th>";
//echo "<td>". $log['id']. "</td>";
//echo "<td>". $log['printers']. "</td>";
//echo "<td>". $log['link']. "</td>";
//echo "<td>". $log['lastupdate']. "</td>";
//echo "<td>". $log['views']. "</td>";
//echo "<td><a href=\"http://rynantech.com/partner-login/mssc/VJET/$log[link]\" onclick=\"khoa();\">$log[link]</a></td>";

echo "</tr>";
}
?>

</table>
</div>
     
<div id="DL200-sw" class="tabcontent">
<table id="tracelog1" width="909" border="0" align="center">
<?php

//echo  @mysql_num_rows( $sql_query ); die();
$logs = @mysql_query("SELECT * from mssc where printers like 'DL200' and type like 'software' order by timecreate desc");
while($log = mysql_fetch_array( $logs )){
// Bo gio - chi lay ngay
$date = $log['timecreate'];
$createDate = date('Y-m-d', strtotime($date));

echo "<tr>";
echo "<th>". $log['filename']. "</th>";
echo "<th>". $log['type']. "</th>";
echo "<th><a href=\"http://rynantech.com/partner-login/msscclick.php?id=".$log['id']."\"><img src='http://www.rynantech.com/partner-login/sites/images/dl.png".$row['image_name']."'></a></th>";
echo "<th>". $log['notes']. "</th>";
echo "<th>". $createDate. "</th>";
//echo "<td>". $log['id']. "</td>";
//echo "<td>". $log['printers']. "</td>";
//echo "<td>". $log['link']. "</td>";
//echo "<td>". $log['lastupdate']. "</td>";
//echo "<td>". $log['views']. "</td>";
//echo "<td><a href=\"http://rynantech.com/partner-login/mssc/VJET/$log[link]\" onclick=\"khoa();\">$log[link]</a></td>";

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
  <button class="tablinks" onclick="openCity(event, 'Smart-Jet Duo-br')">Smart-Jet Duo</button>
  <button class="tablinks" onclick="openCity(event, 'Smart-Jet-br')">Smart-Jet</button>
  <button class="tablinks" onclick="openCity(event, 'Smart-Jet Plus-br')">Smart-Jet Plus</button>
  <button class="tablinks" onclick="openCity(event, 'Smart-Jet Blue-br')">Smart-Jet Blue</button>
  <button class="tablinks" onclick="openCity(event, 'Smart-Jet Lite-br')">Smart-Jet Lite</button>
  <button class="tablinks" onclick="openCity(event, 'Smart-Jet Handheld-br')">Smart-Jet Handheld</button>
  <button class="tablinks" onclick="openCity(event, 'Smart-Jet Glide-br')">Smart-Jet Glide</button>
  <button class="tablinks" onclick="openCity(event, 'Smart-Jet Max-br')">Smart-Jet Max</button>
  <button class="tablinks" onclick="openCity(event, 'DL100-br')">DL100</button>
  <button class="tablinks" onclick="openCity(event, 'DL200-br')">DL200</button>
</div>


<div id="Smart-Jet Duo-br" class="tabcontent" style="display: block;" >
<table id="tracelog1" width="909" border="0" align="center">
<?php

//echo  @mysql_num_rows( $sql_query ); die();
$logs = @mysql_query("SELECT * from mssc where printers like 'Smart-Jet Duo' and type like 'brochure' order by timecreate desc");
while($log = mysql_fetch_array( $logs )){
// Bo gio - chi lay ngay
$date = $log['timecreate'];
$createDate = date('Y-m-d', strtotime($date));

echo "<tr>";
echo "<th>". $log['filename']. "</th>";
echo "<th>". $log['type']. "</th>";
echo "<th><a href=\"https://rynantech.com/partner-login/msscclick.php?id=".$log['id']."\"><img src='https://rynantech.com/partner-login/sites/images/dl.png".$row['image_name']."'></a></th>";
echo "<th>". $log['notes']. "</th>";
echo "<th>". $createDate. "</th>";
//echo "<td>". $log['id']. "</td>";
//echo "<td>". $log['printers']. "</td>";
//echo "<td>". $log['link']. "</td>";
//echo "<td>". $log['lastupdate']. "</td>";
//echo "<td>". $log['views']. "</td>";
//echo "<td><a href=\"https://rynantech.com/partner-login/mssc/VJET/$log[link]\" onclick=\"khoa();\">$log[link]</a></td>";

echo "</tr>";
}
?>

</table>
</div>




<div id="Smart-Jet Plus-br" class="tabcontent" style="display: block;" >
<table id="tracelog1" width="909" border="0" align="center">
<?php

//echo  @mysql_num_rows( $sql_query ); die();
$logs = @mysql_query("SELECT * from mssc where printers like 'Smart-Jet' and type like 'brochure' order by timecreate desc");
while($log = mysql_fetch_array( $logs )){
// Bo gio - chi lay ngay
$date = $log['timecreate'];
$createDate = date('Y-m-d', strtotime($date));

echo "<tr>";
echo "<th>". $log['filename']. "</th>";
echo "<th>". $log['type']. "</th>";
echo "<th><a href=\"http://rynantech.com/partner-login/msscclick.php?id=".$log['id']."\"><img src='http://www.rynantech.com/partner-login/sites/images/dl.png".$row['image_name']."'></a></th>";
echo "<th>". $log['notes']. "</th>";
echo "<th>". $createDate. "</th>";
//echo "<td>". $log['id']. "</td>";
//echo "<td>". $log['printers']. "</td>";
//echo "<td>". $log['link']. "</td>";
//echo "<td>". $log['lastupdate']. "</td>";
//echo "<td>". $log['views']. "</td>";
//echo "<td><a href=\"http://rynantech.com/partner-login/mssc/VJET/$log[link]\" onclick=\"khoa();\">$log[link]</a></td>";

echo "</tr>";
}
?>

</table>
</div>


<div id="Smart-Jet Plus-br" class="tabcontent">
<table id="tracelog1" width="909" border="0" align="center">
<?php

//echo  @mysql_num_rows( $sql_query ); die();
$logs = @mysql_query("SELECT * from mssc where printers like 'Smart-Jet Plus' and type like 'brochure' order by timecreate desc");
while($log = mysql_fetch_array( $logs )){
// Bo gio - chi lay ngay
$date = $log['timecreate'];
$createDate = date('Y-m-d', strtotime($date));

echo "<tr>";
echo "<th>". $log['filename']. "</th>";
echo "<th>". $log['type']. "</th>";
echo "<th><a href=\"http://rynantech.com/partner-login/msscclick.php?id=".$log['id']."\"><img src='http://www.rynantech.com/partner-login/sites/images/dl.png".$row['image_name']."'></a></th>";
echo "<th>". $log['notes']. "</th>";
echo "<th>". $createDate. "</th>";
//echo "<td>". $log['id']. "</td>";
//echo "<td>". $log['printers']. "</td>";
//echo "<td>". $log['link']. "</td>";
//echo "<td>". $log['lastupdate']. "</td>";
//echo "<td>". $log['views']. "</td>";
//echo "<td><a href=\"http://rynantech.com/partner-login/mssc/VJET/$log[link]\" onclick=\"khoa();\">$log[link]</a></td>";

echo "</tr>";
}
?>

</table>
</div>



<div id="Smart-Jet Blue-br" class="tabcontent">
<table id="tracelog1" width="909" border="0" align="center">
<?php

//echo  @mysql_num_rows( $sql_query ); die();
$logs = @mysql_query("SELECT * from mssc where printers like 'Smart-Jet Blue' and type like 'brochure' order by timecreate desc");
while($log = mysql_fetch_array( $logs )){
// Bo gio - chi lay ngay
$date = $log['timecreate'];
$createDate = date('Y-m-d', strtotime($date));

echo "<tr>";
echo "<th>". $log['filename']. "</th>";
echo "<th>". $log['type']. "</th>";
echo "<th><a href=\"http://rynantech.com/partner-login/msscclick.php?id=".$log['id']."\"><img src='http://www.rynantech.com/partner-login/sites/images/dl.png".$row['image_name']."'></a></th>";
echo "<th>". $log['notes']. "</th>";
echo "<th>". $createDate. "</th>";
//echo "<td>". $log['id']. "</td>";
//echo "<td>". $log['printers']. "</td>";
//echo "<td>". $log['link']. "</td>";
//echo "<td>". $log['lastupdate']. "</td>";
//echo "<td>". $log['views']. "</td>";
//echo "<td><a href=\"http://rynantech.com/partner-login/mssc/VJET/$log[link]\" onclick=\"khoa();\">$log[link]</a></td>";

echo "</tr>";
}
?>

</table>
</div>


<div id="Smart-Jet Lite-br" class="tabcontent">
<table id="tracelog1" width="909" border="0" align="center">
<?php

//echo  @mysql_num_rows( $sql_query ); die();
$logs = @mysql_query("SELECT * from mssc where printers like 'Smart-Jet Lite' and type like 'brochure' order by timecreate desc");
while($log = mysql_fetch_array( $logs )){
// Bo gio - chi lay ngay
$date = $log['timecreate'];
$createDate = date('Y-m-d', strtotime($date));

echo "<tr>";
echo "<th>". $log['filename']. "</th>";
echo "<th>". $log['type']. "</th>";
echo "<th><a href=\"http://rynantech.com/partner-login/msscclick.php?id=".$log['id']."\"><img src='http://www.rynantech.com/partner-login/sites/images/dl.png".$row['image_name']."'></a></th>";
echo "<th>". $log['notes']. "</th>";
echo "<th>". $createDate. "</th>";
//echo "<td>". $log['id']. "</td>";
//echo "<td>". $log['printers']. "</td>";
//echo "<td>". $log['link']. "</td>";
//echo "<td>". $log['lastupdate']. "</td>";
//echo "<td>". $log['views']. "</td>";
//echo "<td><a href=\"http://rynantech.com/partner-login/mssc/VJET/$log[link]\" onclick=\"khoa();\">$log[link]</a></td>";

echo "</tr>";
}
?>

</table>
</div>
     
<div id="Smart-Jet Handheld-br" class="tabcontent">
<table id="tracelog1" width="909" border="0" align="center">
<?php

//echo  @mysql_num_rows( $sql_query ); die();
$logs = @mysql_query("SELECT * from mssc where printers like 'Smart-Jet Handheld' and type like 'brochure' order by timecreate desc");
while($log = mysql_fetch_array( $logs )){
// Bo gio - chi lay ngay
$date = $log['timecreate'];
$createDate = date('Y-m-d', strtotime($date));

echo "<tr>";
echo "<th>". $log['filename']. "</th>";
echo "<th>". $log['type']. "</th>";
echo "<th><a href=\"http://rynantech.com/partner-login/msscclick.php?id=".$log['id']."\"><img src='http://www.rynantech.com/partner-login/sites/images/dl.png".$row['image_name']."'></a></th>";
echo "<th>". $log['notes']. "</th>";
echo "<th>". $createDate. "</th>";
//echo "<td>". $log['id']. "</td>";
//echo "<td>". $log['printers']. "</td>";
//echo "<td>". $log['link']. "</td>";
//echo "<td>". $log['lastupdate']. "</td>";
//echo "<td>". $log['views']. "</td>";
//echo "<td><a href=\"http://rynantech.com/partner-login/mssc/VJET/$log[link]\" onclick=\"khoa();\">$log[link]</a></td>";

echo "</tr>";
}
?>

</table>
</div>

     
<div id="Smart-Jet Handheld-br" class="tabcontent">
<table id="tracelog1" width="909" border="0" align="center">
<?php

//echo  @mysql_num_rows( $sql_query ); die();
$logs = @mysql_query("SELECT * from mssc where printers like 'Smart-Jet Handheld' and type like 'brochure' order by timecreate desc");
while($log = mysql_fetch_array( $logs )){
// Bo gio - chi lay ngay
$date = $log['timecreate'];
$createDate = date('Y-m-d', strtotime($date));

echo "<tr>";
echo "<th>". $log['filename']. "</th>";
echo "<th>". $log['type']. "</th>";
echo "<th><a href=\"http://rynantech.com/partner-login/msscclick.php?id=".$log['id']."\"><img src='http://www.rynantech.com/partner-login/sites/images/dl.png".$row['image_name']."'></a></th>";
echo "<th>". $log['notes']. "</th>";
echo "<th>". $createDate. "</th>";
//echo "<td>". $log['id']. "</td>";
//echo "<td>". $log['printers']. "</td>";
//echo "<td>". $log['link']. "</td>";
//echo "<td>". $log['lastupdate']. "</td>";
//echo "<td>". $log['views']. "</td>";
//echo "<td><a href=\"http://rynantech.com/partner-login/mssc/VJET/$log[link]\" onclick=\"khoa();\">$log[link]</a></td>";

echo "</tr>";
}
?>

</table>
</div>

     
<div id="Smart-Jet Glide-br" class="tabcontent">
<table id="tracelog1" width="909" border="0" align="center">
<?php

//echo  @mysql_num_rows( $sql_query ); die();
$logs = @mysql_query("SELECT * from mssc where printers like 'Smart-Jet Glide' and type like 'brochure' order by timecreate desc");
while($log = mysql_fetch_array( $logs )){
// Bo gio - chi lay ngay
$date = $log['timecreate'];
$createDate = date('Y-m-d', strtotime($date));

echo "<tr>";
echo "<th>". $log['filename']. "</th>";
echo "<th>". $log['type']. "</th>";
echo "<th><a href=\"http://rynantech.com/partner-login/msscclick.php?id=".$log['id']."\"><img src='http://www.rynantech.com/partner-login/sites/images/dl.png".$row['image_name']."'></a></th>";
echo "<th>". $log['notes']. "</th>";
echo "<th>". $createDate. "</th>";
//echo "<td>". $log['id']. "</td>";
//echo "<td>". $log['printers']. "</td>";
//echo "<td>". $log['link']. "</td>";
//echo "<td>". $log['lastupdate']. "</td>";
//echo "<td>". $log['views']. "</td>";
//echo "<td><a href=\"http://rynantech.com/partner-login/mssc/VJET/$log[link]\" onclick=\"khoa();\">$log[link]</a></td>";

echo "</tr>";
}
?>


</table>
</div>


<div id="Smart-Jet Max-br" class="tabcontent">
<table id="tracelog1" width="909" border="0" align="center">
<?php

//echo  @mysql_num_rows( $sql_query ); die();
$logs = @mysql_query("SELECT * from mssc where printers like 'Smart-Jet Max' and type like 'brochure' order by timecreate desc");
while($log = mysql_fetch_array( $logs )){
// Bo gio - chi lay ngay
$date = $log['timecreate'];
$createDate = date('Y-m-d', strtotime($date));

echo "<tr>";
echo "<th>". $log['filename']. "</th>";
echo "<th>". $log['type']. "</th>";
echo "<th><a href=\"http://rynantech.com/partner-login/msscclick.php?id=".$log['id']."\"><img src='http://www.rynantech.com/partner-login/sites/images/dl.png".$row['image_name']."'></a></th>";
echo "<th>". $log['notes']. "</th>";
echo "<th>". $createDate. "</th>";
//echo "<td>". $log['id']. "</td>";
//echo "<td>". $log['printers']. "</td>";
//echo "<td>". $log['link']. "</td>";
//echo "<td>". $log['lastupdate']. "</td>";
//echo "<td>". $log['views']. "</td>";
//echo "<td><a href=\"http://rynantech.com/partner-login/mssc/VJET/$log[link]\" onclick=\"khoa();\">$log[link]</a></td>";

echo "</tr>";
}
?>


</table>
</div>


<div id="DL100-br" class="tabcontent">
<table id="tracelog1" width="909" border="0" align="center">
<?php

//echo  @mysql_num_rows( $sql_query ); die();
$logs = @mysql_query("SELECT * from mssc where printers like 'DL100' and type like 'brochure' order by timecreate desc");
while($log = mysql_fetch_array( $logs )){
// Bo gio - chi lay ngay
$date = $log['timecreate'];
$createDate = date('Y-m-d', strtotime($date));

echo "<tr>";
echo "<th>". $log['filename']. "</th>";
echo "<th>". $log['type']. "</th>";
echo "<th><a href=\"http://rynantech.com/partner-login/msscclick.php?id=".$log['id']."\"><img src='http://www.rynantech.com/partner-login/sites/images/dl.png".$row['image_name']."'></a></th>";
echo "<th>". $log['notes']. "</th>";
echo "<th>". $createDate. "</th>";
//echo "<td>". $log['id']. "</td>";
//echo "<td>". $log['printers']. "</td>";
//echo "<td>". $log['link']. "</td>";
//echo "<td>". $log['lastupdate']. "</td>";
//echo "<td>". $log['views']. "</td>";
//echo "<td><a href=\"http://rynantech.com/partner-login/mssc/VJET/$log[link]\" onclick=\"khoa();\">$log[link]</a></td>";

echo "</tr>";
}
?>


</table>
</div>


<div id="DL200-br" class="tabcontent">
<table id="tracelog1" width="909" border="0" align="center">
<?php

//echo  @mysql_num_rows( $sql_query ); die();
$logs = @mysql_query("SELECT * from mssc where printers like 'DL200' and type like 'brochure' order by timecreate desc");
while($log = mysql_fetch_array( $logs )){
// Bo gio - chi lay ngay
$date = $log['timecreate'];
$createDate = date('Y-m-d', strtotime($date));

echo "<tr>";
echo "<th>". $log['filename']. "</th>";
echo "<th>". $log['type']. "</th>";
echo "<th><a href=\"http://rynantech.com/partner-login/msscclick.php?id=".$log['id']."\"><img src='http://www.rynantech.com/partner-login/sites/images/dl.png".$row['image_name']."'></a></th>";
echo "<th>". $log['notes']. "</th>";
echo "<th>". $createDate. "</th>";
//echo "<td>". $log['id']. "</td>";
//echo "<td>". $log['printers']. "</td>";
//echo "<td>". $log['link']. "</td>";
//echo "<td>". $log['lastupdate']. "</td>";
//echo "<td>". $log['views']. "</td>";
//echo "<td><a href=\"http://rynantech.com/partner-login/mssc/VJET/$log[link]\" onclick=\"khoa();\">$log[link]</a></td>";

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
  <button class="tablinks" onclick="openCity(event, 'Smart-Jet Duo-us')">Smart-Jet Duo</button>
  <button class="tablinks" onclick="openCity(event, 'Smart-Jet-us')">Smart-Jet</button>
  <button class="tablinks" onclick="openCity(event, 'Smart-Jet Plus-us')">Smart-Jet Plus</button>
  <button class="tablinks" onclick="openCity(event, 'Smart-Jet Blue-us')">Smart-Jet Blue</button>
  <button class="tablinks" onclick="openCity(event, 'Smart-Jet Lite-us')">Smart-Jet Lite</button>
  <button class="tablinks" onclick="openCity(event, 'Smart-Jet Handheld-us')">Smart-Jet Handheld</button>
  <button class="tablinks" onclick="openCity(event, 'Smart-Jet Glide-us')">Smart-Jet Glide</button>
  <button class="tablinks" onclick="openCity(event, 'Smart-Jet Max-us')">Smart-Jet Max</button>
  <button class="tablinks" onclick="openCity(event, 'DL100-us')">DL100</button>
  <button class="tablinks" onclick="openCity(event, 'DL200-us')">DL200</button>
</div>

<div id="Smart-Jet Duo-us" class="tabcontent" style="display: block;" >
<table id="tracelog1" width="909" border="0" align="center">
<?php

//echo  @mysql_num_rows( $sql_query ); die();
$logs = @mysql_query("SELECT * from mssc where printers like 'Smart-Jet Duo' and type like 'User Manual' order by timecreate desc");
while($log = mysql_fetch_array( $logs )){
// Bo gio - chi lay ngay
$date = $log['timecreate'];
$createDate = date('Y-m-d', strtotime($date));

echo "<tr>";
echo "<th>". $log['filename']. "</th>";
echo "<th>". $log['type']. "</th>";
echo "<th><a href=\"https://rynantech.com/partner-login/msscclick.php?id=".$log['id']."\"><img src='https://rynantech.com/partner-login/sites/images/dl.png".$row['image_name']."'></a></th>";
echo "<th>". $log['notes']. "</th>";
echo "<th>". $createDate. "</th>";
//echo "<td>". $log['id']. "</td>";
//echo "<td>". $log['printers']. "</td>";
//echo "<td>". $log['link']. "</td>";
//echo "<td>". $log['lastupdate']. "</td>";
//echo "<td>". $log['views']. "</td>";
//echo "<td><a href=\"https://rynantech.com/partner-login/mssc/VJET/$log[link]\" onclick=\"khoa();\">$log[link]</a></td>";

echo "</tr>";
}
?>

</table>
</div>




<div id="Smart-Jet-us" class="tabcontent" style="display: block;" >
<table id="tracelog1" width="909" border="0" align="center">
<?php

//echo  @mysql_num_rows( $sql_query ); die();
$logs = @mysql_query("SELECT * from mssc where printers like 'Smart-Jet' and type like 'User Manual' order by timecreate desc");
while($log = mysql_fetch_array( $logs )){
// Bo gio - chi lay ngay
$date = $log['timecreate'];
$createDate = date('Y-m-d', strtotime($date));

echo "<tr>";
echo "<th>". $log['filename']. "</th>";
echo "<th>". $log['type']. "</th>";
echo "<th><a href=\"http://rynantech.com/partner-login/msscclick.php?id=".$log['id']."\"><img src='http://www.rynantech.com/partner-login/sites/images/dl.png".$row['image_name']."'></a></th>";
echo "<th>". $log['notes']. "</th>";
echo "<th>". $createDate. "</th>";
//echo "<td>". $log['id']. "</td>";
//echo "<td>". $log['printers']. "</td>";
//echo "<td>". $log['link']. "</td>";
//echo "<td>". $log['lastupdate']. "</td>";
//echo "<td>". $log['views']. "</td>";
//echo "<td><a href=\"http://rynantech.com/partner-login/mssc/VJET/$log[link]\" onclick=\"khoa();\">$log[link]</a></td>";

echo "</tr>";
}
?>

</table>
</div>


<div id="Smart-Jet Plus-us" class="tabcontent">
<table id="tracelog1" width="909" border="0" align="center">
<?php

//echo  @mysql_num_rows( $sql_query ); die();
$logs = @mysql_query("SELECT * from mssc where printers like 'Smart-Jet Plus' and type like 'User Manual' order by timecreate desc");
while($log = mysql_fetch_array( $logs )){
// Bo gio - chi lay ngay
$date = $log['timecreate'];
$createDate = date('Y-m-d', strtotime($date));

echo "<tr>";
echo "<th>". $log['filename']. "</th>";
echo "<th>". $log['type']. "</th>";
echo "<th><a href=\"http://rynantech.com/partner-login/msscclick.php?id=".$log['id']."\"><img src='http://www.rynantech.com/partner-login/sites/images/dl.png".$row['image_name']."'></a></th>";
echo "<th>". $log['notes']. "</th>";
echo "<th>". $createDate. "</th>";
//echo "<td>". $log['id']. "</td>";
//echo "<td>". $log['printers']. "</td>";
//echo "<td>". $log['link']. "</td>";
//echo "<td>". $log['lastupdate']. "</td>";
//echo "<td>". $log['views']. "</td>";
//echo "<td><a href=\"http://rynantech.com/partner-login/mssc/VJET/$log[link]\" onclick=\"khoa();\">$log[link]</a></td>";

echo "</tr>";
}
?>

</table>
</div>



<div id="Smart-Jet Blue-us" class="tabcontent">
<table id="tracelog1" width="909" border="0" align="center">
<?php

//echo  @mysql_num_rows( $sql_query ); die();
$logs = @mysql_query("SELECT * from mssc where printers like 'Smart-Jet Blue' and type like 'User Manual' order by timecreate desc");
while($log = mysql_fetch_array( $logs )){
// Bo gio - chi lay ngay
$date = $log['timecreate'];
$createDate = date('Y-m-d', strtotime($date));

echo "<tr>";
echo "<th>". $log['filename']. "</th>";
echo "<th>". $log['type']. "</th>";
echo "<th><a href=\"http://rynantech.com/partner-login/msscclick.php?id=".$log['id']."\"><img src='http://www.rynantech.com/partner-login/sites/images/dl.png".$row['image_name']."'></a></th>";
echo "<th>". $log['notes']. "</th>";
echo "<th>". $createDate. "</th>";
//echo "<td>". $log['id']. "</td>";
//echo "<td>". $log['printers']. "</td>";
//echo "<td>". $log['link']. "</td>";
//echo "<td>". $log['lastupdate']. "</td>";
//echo "<td>". $log['views']. "</td>";
//echo "<td><a href=\"http://rynantech.com/partner-login/mssc/VJET/$log[link]\" onclick=\"khoa();\">$log[link]</a></td>";

echo "</tr>";
}
?>

</table>
</div>


<div id="Smart-Jet Lite-us" class="tabcontent">
<table id="tracelog1" width="909" border="0" align="center">
<?php

//echo  @mysql_num_rows( $sql_query ); die();
$logs = @mysql_query("SELECT * from mssc where printers like 'Smart-Jet Lite' and type like 'User Manual' order by timecreate desc");
while($log = mysql_fetch_array( $logs )){
// Bo gio - chi lay ngay
$date = $log['timecreate'];
$createDate = date('Y-m-d', strtotime($date));

echo "<tr>";
echo "<th>". $log['filename']. "</th>";
echo "<th>". $log['type']. "</th>";
echo "<th><a href=\"http://rynantech.com/partner-login/msscclick.php?id=".$log['id']."\"><img src='http://www.rynantech.com/partner-login/sites/images/dl.png".$row['image_name']."'></a></th>";
echo "<th>". $log['notes']. "</th>";
echo "<th>". $createDate. "</th>";
//echo "<td>". $log['id']. "</td>";
//echo "<td>". $log['printers']. "</td>";
//echo "<td>". $log['link']. "</td>";
//echo "<td>". $log['lastupdate']. "</td>";
//echo "<td>". $log['views']. "</td>";
//echo "<td><a href=\"http://rynantech.com/partner-login/mssc/VJET/$log[link]\" onclick=\"khoa();\">$log[link]</a></td>";

echo "</tr>";
}
?>

</table>
</div>
     
<div id="Smart-Jet Handheld-us" class="tabcontent">
<table id="tracelog1" width="909" border="0" align="center">
<?php

//echo  @mysql_num_rows( $sql_query ); die();
$logs = @mysql_query("SELECT * from mssc where printers like 'Smart-Jet Handheld' and type like 'User Manual' order by timecreate desc");
while($log = mysql_fetch_array( $logs )){
// Bo gio - chi lay ngay
$date = $log['timecreate'];
$createDate = date('Y-m-d', strtotime($date));

echo "<tr>";
echo "<th>". $log['filename']. "</th>";
echo "<th>". $log['type']. "</th>";
echo "<th><a href=\"http://rynantech.com/partner-login/msscclick.php?id=".$log['id']."\"><img src='http://www.rynantech.com/partner-login/sites/images/dl.png".$row['image_name']."'></a></th>";
echo "<th>". $log['notes']. "</th>";
echo "<th>". $createDate. "</th>";
//echo "<td>". $log['id']. "</td>";
//echo "<td>". $log['printers']. "</td>";
//echo "<td>". $log['link']. "</td>";
//echo "<td>". $log['lastupdate']. "</td>";
//echo "<td>". $log['views']. "</td>";
//echo "<td><a href=\"http://rynantech.com/partner-login/mssc/VJET/$log[link]\" onclick=\"khoa();\">$log[link]</a></td>";

echo "</tr>";
}
?>

</table>
</div>

     
<div id="Smart-Jet Glide-us" class="tabcontent">
<table id="tracelog1" width="909" border="0" align="center">
<?php

//echo  @mysql_num_rows( $sql_query ); die();
$logs = @mysql_query("SELECT * from mssc where printers like 'Smart-Jet Glide' and type like 'User Manual' order by timecreate desc");
while($log = mysql_fetch_array( $logs )){
// Bo gio - chi lay ngay
$date = $log['timecreate'];
$createDate = date('Y-m-d', strtotime($date));

echo "<tr>";
echo "<th>". $log['filename']. "</th>";
echo "<th>". $log['type']. "</th>";
echo "<th><a href=\"http://rynantech.com/partner-login/msscclick.php?id=".$log['id']."\"><img src='http://www.rynantech.com/partner-login/sites/images/dl.png".$row['image_name']."'></a></th>";
echo "<th>". $log['notes']. "</th>";
echo "<th>". $createDate. "</th>";
//echo "<td>". $log['id']. "</td>";
//echo "<td>". $log['printers']. "</td>";
//echo "<td>". $log['link']. "</td>";
//echo "<td>". $log['lastupdate']. "</td>";
//echo "<td>". $log['views']. "</td>";
//echo "<td><a href=\"http://rynantech.com/partner-login/mssc/VJET/$log[link]\" onclick=\"khoa();\">$log[link]</a></td>";

echo "</tr>";
}
?>


</table>
</div>
<div id="Smart-Jet Max-us" class="tabcontent">
<table id="tracelog1" width="909" border="0" align="center">
<?php

//echo  @mysql_num_rows( $sql_query ); die();
$logs = @mysql_query("SELECT * from mssc where printers like 'Smart-Jet Max' and type like 'User Manual' order by timecreate desc");
while($log = mysql_fetch_array( $logs )){
// Bo gio - chi lay ngay
$date = $log['timecreate'];
$createDate = date('Y-m-d', strtotime($date));

echo "<tr>";
echo "<th>". $log['filename']. "</th>";
echo "<th>". $log['type']. "</th>";
echo "<th><a href=\"http://rynantech.com/partner-login/msscclick.php?id=".$log['id']."\"><img src='http://www.rynantech.com/partner-login/sites/images/dl.png".$row['image_name']."'></a></th>";
echo "<th>". $log['notes']. "</th>";
echo "<th>". $createDate. "</th>";
//echo "<td>". $log['id']. "</td>";
//echo "<td>". $log['printers']. "</td>";
//echo "<td>". $log['link']. "</td>";
//echo "<td>". $log['lastupdate']. "</td>";
//echo "<td>". $log['views']. "</td>";
//echo "<td><a href=\"http://rynantech.com/partner-login/mssc/VJET/$log[link]\" onclick=\"khoa();\">$log[link]</a></td>";

echo "</tr>";
}
?>


</table>
</div>

<div id="DL100-us" class="tabcontent">
<table id="tracelog1" width="909" border="0" align="center">
<?php

//echo  @mysql_num_rows( $sql_query ); die();
$logs = @mysql_query("SELECT * from mssc where printers like 'DL100' and type like 'User Manual' order by timecreate desc");
while($log = mysql_fetch_array( $logs )){
// Bo gio - chi lay ngay
$date = $log['timecreate'];
$createDate = date('Y-m-d', strtotime($date));

echo "<tr>";
echo "<th>". $log['filename']. "</th>";
echo "<th>". $log['type']. "</th>";
echo "<th><a href=\"http://rynantech.com/partner-login/msscclick.php?id=".$log['id']."\"><img src='http://www.rynantech.com/partner-login/sites/images/dl.png".$row['image_name']."'></a></th>";
echo "<th>". $log['notes']. "</th>";
echo "<th>". $createDate. "</th>";
//echo "<td>". $log['id']. "</td>";
//echo "<td>". $log['printers']. "</td>";
//echo "<td>". $log['link']. "</td>";
//echo "<td>". $log['lastupdate']. "</td>";
//echo "<td>". $log['views']. "</td>";
//echo "<td><a href=\"http://rynantech.com/partner-login/mssc/VJET/$log[link]\" onclick=\"khoa();\">$log[link]</a></td>";

echo "</tr>";
}
?>


</table>
</div>

<div id="DL200-us" class="tabcontent">
<table id="tracelog1" width="909" border="0" align="center">
<?php

//echo  @mysql_num_rows( $sql_query ); die();
$logs = @mysql_query("SELECT * from mssc where printers like 'DL200' and type like 'User Manual' order by timecreate desc");
while($log = mysql_fetch_array( $logs )){
// Bo gio - chi lay ngay
$date = $log['timecreate'];
$createDate = date('Y-m-d', strtotime($date));

echo "<tr>";
echo "<th>". $log['filename']. "</th>";
echo "<th>". $log['type']. "</th>";
echo "<th><a href=\"http://rynantech.com/partner-login/msscclick.php?id=".$log['id']."\"><img src='http://www.rynantech.com/partner-login/sites/images/dl.png".$row['image_name']."'></a></th>";
echo "<th>". $log['notes']. "</th>";
echo "<th>". $createDate. "</th>";
//echo "<td>". $log['id']. "</td>";
//echo "<td>". $log['printers']. "</td>";
//echo "<td>". $log['link']. "</td>";
//echo "<td>". $log['lastupdate']. "</td>";
//echo "<td>". $log['views']. "</td>";
//echo "<td><a href=\"http://rynantech.com/partner-login/mssc/VJET/$log[link]\" onclick=\"khoa();\">$log[link]</a></td>";

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
  <button class="tablinks" onclick="openCity(event, 'Smart-Jet Duo-qg')">Smart-Jet Duo</button>
  <button class="tablinks" onclick="openCity(event, 'Smart-Jet-qg')">Smart-Jet</button>
  <button class="tablinks" onclick="openCity(event, 'Smart-Jet Plus-qg')">Smart-Jet Plus</button>
  <button class="tablinks" onclick="openCity(event, 'Smart-Jet Blue-qg')">Smart-Jet Blue</button>
  <button class="tablinks" onclick="openCity(event, 'Smart-Jet Lite-qg')">Smart-Jet Lite</button>
  <button class="tablinks" onclick="openCity(event, 'Smart-Jet Handheld-qg')">Smart-Jet Handheld</button>
  <button class="tablinks" onclick="openCity(event, 'Smart-Jet Glide-qg')">Smart-Jet Glide</button>
  <button class="tablinks" onclick="openCity(event, 'Smart-Jet Max-qg')">Smart-Jet Max</button>
  <button class="tablinks" onclick="openCity(event, 'DL100-qg')">DL100</button>
  <button class="tablinks" onclick="openCity(event, 'DL200-qg')">DL200</button>
</div>

<div id="Smart-Jet Duo-qg" class="tabcontent" style="display: block;" >
<table id="tracelog1" width="909" border="0" align="center">
<?php

//echo  @mysql_num_rows( $sql_query ); die();
$logs = @mysql_query("SELECT * from mssc where printers like 'Smart-Jet Duo' and type like 'Quick Guide' order by timecreate desc");
while($log = mysql_fetch_array( $logs )){
// Bo gio - chi lay ngay
$date = $log['timecreate'];
$createDate = date('Y-m-d', strtotime($date));

echo "<tr>";
echo "<th>". $log['filename']. "</th>";
echo "<th>". $log['type']. "</th>";
echo "<th><a href=\"https://rynantech.com/partner-login/msscclick.php?id=".$log['id']."\"><img src='https://rynantech.com/partner-login/sites/images/dl.png".$row['image_name']."'></a></th>";
echo "<th>". $log['notes']. "</th>";
echo "<th>". $createDate. "</th>";
//echo "<td>". $log['id']. "</td>";
//echo "<td>". $log['printers']. "</td>";
//echo "<td>". $log['link']. "</td>";
//echo "<td>". $log['lastupdate']. "</td>";
//echo "<td>". $log['views']. "</td>";
//echo "<td><a href=\"https://rynantech.com/partner-login/mssc/VJET/$log[link]\" onclick=\"khoa();\">$log[link]</a></td>";

echo "</tr>";
}
?>

</table>
</div>




<div id="Smart-Jet-qg" class="tabcontent" style="display: block;" >
<table id="tracelog1" width="909" border="0" align="center">
<?php

//echo  @mysql_num_rows( $sql_query ); die();
$logs = @mysql_query("SELECT * from mssc where printers like 'Smart-Jet' and type like 'Quick Guide' order by timecreate desc");
while($log = mysql_fetch_array( $logs )){
// Bo gio - chi lay ngay
$date = $log['timecreate'];
$createDate = date('Y-m-d', strtotime($date));

echo "<tr>";
echo "<th>". $log['filename']. "</th>";
echo "<th>". $log['type']. "</th>";
echo "<th><a href=\"http://rynantech.com/partner-login/msscclick.php?id=".$log['id']."\"><img src='http://www.rynantech.com/partner-login/sites/images/dl.png".$row['image_name']."'></a></th>";
echo "<th>". $log['notes']. "</th>";
echo "<th>". $createDate. "</th>";
//echo "<td>". $log['id']. "</td>";
//echo "<td>". $log['printers']. "</td>";
//echo "<td>". $log['link']. "</td>";
//echo "<td>". $log['lastupdate']. "</td>";
//echo "<td>". $log['views']. "</td>";
//echo "<td><a href=\"http://rynantech.com/partner-login/mssc/VJET/$log[link]\" onclick=\"khoa();\">$log[link]</a></td>";

echo "</tr>";
}
?>

</table>
</div>


<div id="Smart-Jet Plus-qg" class="tabcontent">
<table id="tracelog1" width="909" border="0" align="center">
<?php

//echo  @mysql_num_rows( $sql_query ); die();
$logs = @mysql_query("SELECT * from mssc where printers like 'Smart-Jet Plus' and type like 'Quick Guide' order by timecreate desc");
while($log = mysql_fetch_array( $logs )){
// Bo gio - chi lay ngay
$date = $log['timecreate'];
$createDate = date('Y-m-d', strtotime($date));

echo "<tr>";
echo "<th>". $log['filename']. "</th>";
echo "<th>". $log['type']. "</th>";
echo "<th><a href=\"http://rynantech.com/partner-login/msscclick.php?id=".$log['id']."\"><img src='http://www.rynantech.com/partner-login/sites/images/dl.png".$row['image_name']."'></a></th>";
echo "<th>". $log['notes']. "</th>";
echo "<th>". $createDate. "</th>";
//echo "<td>". $log['id']. "</td>";
//echo "<td>". $log['printers']. "</td>";
//echo "<td>". $log['link']. "</td>";
//echo "<td>". $log['lastupdate']. "</td>";
//echo "<td>". $log['views']. "</td>";
//echo "<td><a href=\"http://rynantech.com/partner-login/mssc/VJET/$log[link]\" onclick=\"khoa();\">$log[link]</a></td>";

echo "</tr>";
}
?>

</table>
</div>



<div id="Smart-Jet Blue-qg" class="tabcontent">
<table id="tracelog1" width="909" border="0" align="center">
<?php

//echo  @mysql_num_rows( $sql_query ); die();
$logs = @mysql_query("SELECT * from mssc where printers like 'Smart-Jet Blue' and type like 'Quick Guide' order by timecreate desc");
while($log = mysql_fetch_array( $logs )){
// Bo gio - chi lay ngay
$date = $log['timecreate'];
$createDate = date('Y-m-d', strtotime($date));

echo "<tr>";
echo "<th>". $log['filename']. "</th>";
echo "<th>". $log['type']. "</th>";
echo "<th><a href=\"http://rynantech.com/partner-login/msscclick.php?id=".$log['id']."\"><img src='http://www.rynantech.com/partner-login/sites/images/dl.png".$row['image_name']."'></a></th>";
echo "<th>". $log['notes']. "</th>";
echo "<th>". $createDate. "</th>";
//echo "<td>". $log['id']. "</td>";
//echo "<td>". $log['printers']. "</td>";
//echo "<td>". $log['link']. "</td>";
//echo "<td>". $log['lastupdate']. "</td>";
//echo "<td>". $log['views']. "</td>";
//echo "<td><a href=\"http://rynantech.com/partner-login/mssc/VJET/$log[link]\" onclick=\"khoa();\">$log[link]</a></td>";

echo "</tr>";
}
?>

</table>
</div>


<div id="Smart-Jet Lite-qg" class="tabcontent">
<table id="tracelog1" width="909" border="0" align="center">
<?php

//echo  @mysql_num_rows( $sql_query ); die();
$logs = @mysql_query("SELECT * from mssc where printers like 'Smart-Jet Lite' and type like 'Quick Guide' order by timecreate desc");
while($log = mysql_fetch_array( $logs )){
// Bo gio - chi lay ngay
$date = $log['timecreate'];
$createDate = date('Y-m-d', strtotime($date));

echo "<tr>";
echo "<th>". $log['filename']. "</th>";
echo "<th>". $log['type']. "</th>";
echo "<th><a href=\"http://rynantech.com/partner-login/msscclick.php?id=".$log['id']."\"><img src='http://www.rynantech.com/partner-login/sites/images/dl.png".$row['image_name']."'></a></th>";
echo "<th>". $log['notes']. "</th>";
echo "<th>". $createDate. "</th>";
//echo "<td>". $log['id']. "</td>";
//echo "<td>". $log['printers']. "</td>";
//echo "<td>". $log['link']. "</td>";
//echo "<td>". $log['lastupdate']. "</td>";
//echo "<td>". $log['views']. "</td>";
//echo "<td><a href=\"http://rynantech.com/partner-login/mssc/VJET/$log[link]\" onclick=\"khoa();\">$log[link]</a></td>";

echo "</tr>";
}
?>

</table>
</div>
     
<div id="Smart-Jet Handheld-qg" class="tabcontent">
<table id="tracelog1" width="909" border="0" align="center">
<?php

//echo  @mysql_num_rows( $sql_query ); die();
$logs = @mysql_query("SELECT * from mssc where printers like 'Smart-Jet Handheld' and type like 'Quick Guide' order by timecreate desc");
while($log = mysql_fetch_array( $logs )){
// Bo gio - chi lay ngay
$date = $log['timecreate'];
$createDate = date('Y-m-d', strtotime($date));

echo "<tr>";
echo "<th>". $log['filename']. "</th>";
echo "<th>". $log['type']. "</th>";
echo "<th><a href=\"http://rynantech.com/partner-login/msscclick.php?id=".$log['id']."\"><img src='http://www.rynantech.com/partner-login/sites/images/dl.png".$row['image_name']."'></a></th>";
echo "<th>". $log['notes']. "</th>";
echo "<th>". $createDate. "</th>";
//echo "<td>". $log['id']. "</td>";
//echo "<td>". $log['printers']. "</td>";
//echo "<td>". $log['link']. "</td>";
//echo "<td>". $log['lastupdate']. "</td>";
//echo "<td>". $log['views']. "</td>";
//echo "<td><a href=\"http://rynantech.com/partner-login/mssc/VJET/$log[link]\" onclick=\"khoa();\">$log[link]</a></td>";

echo "</tr>";
}
?>

</table>
</div>

     
<div id="Smart-Jet Glide-qg" class="tabcontent">
<table id="tracelog1" width="909" border="0" align="center">
<?php

//echo  @mysql_num_rows( $sql_query ); die();
$logs = @mysql_query("SELECT * from mssc where printers like 'Smart-Jet Glide' and type like 'Quick Guide' order by timecreate desc");
while($log = mysql_fetch_array( $logs )){
// Bo gio - chi lay ngay
$date = $log['timecreate'];
$createDate = date('Y-m-d', strtotime($date));

echo "<tr>";
echo "<th>". $log['filename']. "</th>";
echo "<th>". $log['type']. "</th>";
echo "<th><a href=\"http://rynantech.com/partner-login/msscclick.php?id=".$log['id']."\"><img src='http://www.rynantech.com/partner-login/sites/images/dl.png".$row['image_name']."'></a></th>";
echo "<th>". $log['notes']. "</th>";
echo "<th>". $createDate. "</th>";
//echo "<td>". $log['id']. "</td>";
//echo "<td>". $log['printers']. "</td>";
//echo "<td>". $log['link']. "</td>";
//echo "<td>". $log['lastupdate']. "</td>";
//echo "<td>". $log['views']. "</td>";
//echo "<td><a href=\"http://rynantech.com/partner-login/mssc/VJET/$log[link]\" onclick=\"khoa();\">$log[link]</a></td>";

echo "</tr>";
}
?>


</table>
</div>
<div id="Smart-Jet Max-qg" class="tabcontent">
<table id="tracelog1" width="909" border="0" align="center">
<?php

//echo  @mysql_num_rows( $sql_query ); die();
$logs = @mysql_query("SELECT * from mssc where printers like 'Smart-Jet Max' and type like 'Quick Guide' order by timecreate desc");
while($log = mysql_fetch_array( $logs )){
// Bo gio - chi lay ngay
$date = $log['timecreate'];
$createDate = date('Y-m-d', strtotime($date));

echo "<tr>";
echo "<th>". $log['filename']. "</th>";
echo "<th>". $log['type']. "</th>";
echo "<th><a href=\"http://rynantech.com/partner-login/msscclick.php?id=".$log['id']."\"><img src='http://www.rynantech.com/partner-login/sites/images/dl.png".$row['image_name']."'></a></th>";
echo "<th>". $log['notes']. "</th>";
echo "<th>". $createDate. "</th>";
//echo "<td>". $log['id']. "</td>";
//echo "<td>". $log['printers']. "</td>";
//echo "<td>". $log['link']. "</td>";
//echo "<td>". $log['lastupdate']. "</td>";
//echo "<td>". $log['views']. "</td>";
//echo "<td><a href=\"http://rynantech.com/partner-login/mssc/VJET/$log[link]\" onclick=\"khoa();\">$log[link]</a></td>";

echo "</tr>";
}
?>


</table>
</div>

<div id="DL100-qg" class="tabcontent">
<table id="tracelog1" width="909" border="0" align="center">
<?php

//echo  @mysql_num_rows( $sql_query ); die();
$logs = @mysql_query("SELECT * from mssc where printers like 'DL100' and type like 'Quick Guide' order by timecreate desc");
while($log = mysql_fetch_array( $logs )){
// Bo gio - chi lay ngay
$date = $log['timecreate'];
$createDate = date('Y-m-d', strtotime($date));

echo "<tr>";
echo "<th>". $log['filename']. "</th>";
echo "<th>". $log['type']. "</th>";
echo "<th><a href=\"http://rynantech.com/partner-login/msscclick.php?id=".$log['id']."\"><img src='http://www.rynantech.com/partner-login/sites/images/dl.png".$row['image_name']."'></a></th>";
echo "<th>". $log['notes']. "</th>";
echo "<th>". $createDate. "</th>";
//echo "<td>". $log['id']. "</td>";
//echo "<td>". $log['printers']. "</td>";
//echo "<td>". $log['link']. "</td>";
//echo "<td>". $log['lastupdate']. "</td>";
//echo "<td>". $log['views']. "</td>";
//echo "<td><a href=\"http://rynantech.com/partner-login/mssc/VJET/$log[link]\" onclick=\"khoa();\">$log[link]</a></td>";

echo "</tr>";
}
?>


</table>
</div>

<div id="DL200-qg" class="tabcontent">
<table id="tracelog1" width="909" border="0" align="center">
<?php

//echo  @mysql_num_rows( $sql_query ); die();
$logs = @mysql_query("SELECT * from mssc where printers like 'DL200' and type like 'Quick Guide' order by timecreate desc");
while($log = mysql_fetch_array( $logs )){
// Bo gio - chi lay ngay
$date = $log['timecreate'];
$createDate = date('Y-m-d', strtotime($date));

echo "<tr>";
echo "<th>". $log['filename']. "</th>";
echo "<th>". $log['type']. "</th>";
echo "<th><a href=\"http://rynantech.com/partner-login/msscclick.php?id=".$log['id']."\"><img src='http://www.rynantech.com/partner-login/sites/images/dl.png".$row['image_name']."'></a></th>";
echo "<th>". $log['notes']. "</th>";
echo "<th>". $createDate. "</th>";
//echo "<td>". $log['id']. "</td>";
//echo "<td>". $log['printers']. "</td>";
//echo "<td>". $log['link']. "</td>";
//echo "<td>". $log['lastupdate']. "</td>";
//echo "<td>". $log['views']. "</td>";
//echo "<td><a href=\"http://rynantech.com/partner-login/mssc/VJET/$log[link]\" onclick=\"khoa();\">$log[link]</a></td>";

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
  <button class="tablinks" onclick="openCity(event, 'Smart-Jet Duo-pr')">Smart-Jet Duo</button>
  <button class="tablinks" onclick="openCity(event, 'Smart-Jet-pr')">Smart-Jet</button>
  <button class="tablinks" onclick="openCity(event, 'Smart-Jet Plus-pr')">Smart-Jet Plus</button>
  <button class="tablinks" onclick="openCity(event, 'Smart-Jet Blue-pr')">Smart-Jet Blue</button>
  <button class="tablinks" onclick="openCity(event, 'Smart-Jet Lite-pr')">Smart-Jet Lite</button>
  <button class="tablinks" onclick="openCity(event, 'Smart-Jet Handheld-pr')">Smart-Jet Handheld</button>
  <button class="tablinks" onclick="openCity(event, 'Smart-Jet Glide-pr')">Smart-Jet Glide</button>
  <button class="tablinks" onclick="openCity(event, 'Smart-Jet Max-pr')">Smart-Jet Max</button>
  <button class="tablinks" onclick="openCity(event, 'DL100-pr')">DL100</button>
  <button class="tablinks" onclick="openCity(event, 'DL200-pr')">DL200</button>
</div>

<div id="Smart-Jet Duo-pr" class="tabcontent" style="display: block;" >
<table id="tracelog1" width="909" border="0" align="center">
<?php

//echo  @mysql_num_rows( $sql_query ); die();
$logs = @mysql_query("SELECT * from mssc where printers like 'Smart-Jet Duo' and type like 'Presentation' order by timecreate desc");
while($log = mysql_fetch_array( $logs )){
// Bo gio - chi lay ngay
$date = $log['timecreate'];
$createDate = date('Y-m-d', strtotime($date));

echo "<tr>";
echo "<th>". $log['filename']. "</th>";
echo "<th>". $log['type']. "</th>";
echo "<th><a href=\"https://rynantech.com/partner-login/msscclick.php?id=".$log['id']."\"><img src='https://rynantech.com/partner-login/sites/images/dl.png".$row['image_name']."'></a></th>";
echo "<th>". $log['notes']. "</th>";
echo "<th>". $createDate. "</th>";
//echo "<td>". $log['id']. "</td>";
//echo "<td>". $log['printers']. "</td>";
//echo "<td>". $log['link']. "</td>";
//echo "<td>". $log['lastupdate']. "</td>";
//echo "<td>". $log['views']. "</td>";
//echo "<td><a href=\"https://rynantech.com/partner-login/mssc/VJET/$log[link]\" onclick=\"khoa();\">$log[link]</a></td>";

echo "</tr>";
}
?>

</table>
</div>




<div id="Smart-Jet-pr" class="tabcontent" style="display: block;" >
<table id="tracelog1" width="909" border="0" align="center">
<?php

//echo  @mysql_num_rows( $sql_query ); die();
$logs = @mysql_query("SELECT * from mssc where printers like 'Smart-Jet' and type like 'Presentation' order by timecreate desc");
while($log = mysql_fetch_array( $logs )){
// Bo gio - chi lay ngay
$date = $log['timecreate'];
$createDate = date('Y-m-d', strtotime($date));

echo "<tr>";
echo "<th>". $log['filename']. "</th>";
echo "<th>". $log['type']. "</th>";
echo "<th><a href=\"http://rynantech.com/partner-login/msscclick.php?id=".$log['id']."\"><img src='http://www.rynantech.com/partner-login/sites/images/dl.png".$row['image_name']."'></a></th>";
echo "<th>". $log['notes']. "</th>";
echo "<th>". $createDate. "</th>";
//echo "<td>". $log['id']. "</td>";
//echo "<td>". $log['printers']. "</td>";
//echo "<td>". $log['link']. "</td>";
//echo "<td>". $log['lastupdate']. "</td>";
//echo "<td>". $log['views']. "</td>";
//echo "<td><a href=\"http://rynantech.com/partner-login/mssc/VJET/$log[link]\" onclick=\"khoa();\">$log[link]</a></td>";

echo "</tr>";
}
?>

</table>
</div>


<div id="Smart-Jet Plus-pr" class="tabcontent">
<table id="tracelog1" width="909" border="0" align="center">
<?php

//echo  @mysql_num_rows( $sql_query ); die();
$logs = @mysql_query("SELECT * from mssc where printers like 'Smart-Jet Plus' and type like 'Presentation' order by timecreate desc");
while($log = mysql_fetch_array( $logs )){
// Bo gio - chi lay ngay
$date = $log['timecreate'];
$createDate = date('Y-m-d', strtotime($date));

echo "<tr>";
echo "<th>". $log['filename']. "</th>";
echo "<th>". $log['type']. "</th>";
echo "<th><a href=\"http://rynantech.com/partner-login/msscclick.php?id=".$log['id']."\"><img src='http://www.rynantech.com/partner-login/sites/images/dl.png".$row['image_name']."'></a></th>";
echo "<th>". $log['notes']. "</th>";
echo "<th>". $createDate. "</th>";
//echo "<td>". $log['id']. "</td>";
//echo "<td>". $log['printers']. "</td>";
//echo "<td>". $log['link']. "</td>";
//echo "<td>". $log['lastupdate']. "</td>";
//echo "<td>". $log['views']. "</td>";
//echo "<td><a href=\"http://rynantech.com/partner-login/mssc/VJET/$log[link]\" onclick=\"khoa();\">$log[link]</a></td>";

echo "</tr>";
}
?>

</table>
</div>



<div id="Smart-Jet Blue-pr" class="tabcontent">
<table id="tracelog1" width="909" border="0" align="center">
<?php

//echo  @mysql_num_rows( $sql_query ); die();
$logs = @mysql_query("SELECT * from mssc where printers like 'Smart-Jet Blue' and type like 'Presentation' order by timecreate desc");
while($log = mysql_fetch_array( $logs )){
// Bo gio - chi lay ngay
$date = $log['timecreate'];
$createDate = date('Y-m-d', strtotime($date));

echo "<tr>";
echo "<th>". $log['filename']. "</th>";
echo "<th>". $log['type']. "</th>";
echo "<th><a href=\"http://rynantech.com/partner-login/msscclick.php?id=".$log['id']."\"><img src='http://www.rynantech.com/partner-login/sites/images/dl.png".$row['image_name']."'></a></th>";
echo "<th>". $log['notes']. "</th>";
echo "<th>". $createDate. "</th>";
//echo "<td>". $log['id']. "</td>";
//echo "<td>". $log['printers']. "</td>";
//echo "<td>". $log['link']. "</td>";
//echo "<td>". $log['lastupdate']. "</td>";
//echo "<td>". $log['views']. "</td>";
//echo "<td><a href=\"http://rynantech.com/partner-login/mssc/VJET/$log[link]\" onclick=\"khoa();\">$log[link]</a></td>";

echo "</tr>";
}
?>

</table>
</div>


<div id="Smart-Jet Lite-pr" class="tabcontent">
<table id="tracelog1" width="909" border="0" align="center">
<?php

//echo  @mysql_num_rows( $sql_query ); die();
$logs = @mysql_query("SELECT * from mssc where printers like 'Smart-Jet Lite' and type like 'Presentation' order by timecreate desc");
while($log = mysql_fetch_array( $logs )){
// Bo gio - chi lay ngay
$date = $log['timecreate'];
$createDate = date('Y-m-d', strtotime($date));

echo "<tr>";
echo "<th>". $log['filename']. "</th>";
echo "<th>". $log['type']. "</th>";
echo "<th><a href=\"http://rynantech.com/partner-login/msscclick.php?id=".$log['id']."\"><img src='http://www.rynantech.com/partner-login/sites/images/dl.png".$row['image_name']."'></a></th>";
echo "<th>". $log['notes']. "</th>";
echo "<th>". $createDate. "</th>";
//echo "<td>". $log['id']. "</td>";
//echo "<td>". $log['printers']. "</td>";
//echo "<td>". $log['link']. "</td>";
//echo "<td>". $log['lastupdate']. "</td>";
//echo "<td>". $log['views']. "</td>";
//echo "<td><a href=\"http://rynantech.com/partner-login/mssc/VJET/$log[link]\" onclick=\"khoa();\">$log[link]</a></td>";

echo "</tr>";
}
?>

</table>
</div>
     
<div id="Smart-Jet Handheld-pr" class="tabcontent">
<table id="tracelog1" width="909" border="0" align="center">
<?php

//echo  @mysql_num_rows( $sql_query ); die();
$logs = @mysql_query("SELECT * from mssc where printers like 'Smart-Jet Handheld' and type like 'Presentation' order by timecreate desc");
while($log = mysql_fetch_array( $logs )){
// Bo gio - chi lay ngay
$date = $log['timecreate'];
$createDate = date('Y-m-d', strtotime($date));

echo "<tr>";
echo "<th>". $log['filename']. "</th>";
echo "<th>". $log['type']. "</th>";
echo "<th><a href=\"http://rynantech.com/partner-login/msscclick.php?id=".$log['id']."\"><img src='http://www.rynantech.com/partner-login/sites/images/dl.png".$row['image_name']."'></a></th>";
echo "<th>". $log['notes']. "</th>";
echo "<th>". $createDate. "</th>";
//echo "<td>". $log['id']. "</td>";
//echo "<td>". $log['printers']. "</td>";
//echo "<td>". $log['link']. "</td>";
//echo "<td>". $log['lastupdate']. "</td>";
//echo "<td>". $log['views']. "</td>";
//echo "<td><a href=\"http://rynantech.com/partner-login/mssc/VJET/$log[link]\" onclick=\"khoa();\">$log[link]</a></td>";

echo "</tr>";
}
?>

</table>
</div>

     
<div id="Smart-Jet Glide-pr" class="tabcontent">
<table id="tracelog1" width="909" border="0" align="center">
<?php

//echo  @mysql_num_rows( $sql_query ); die();
$logs = @mysql_query("SELECT * from mssc where printers like 'Smart-Jet Glide' and type like 'Presentation' order by timecreate desc");
while($log = mysql_fetch_array( $logs )){
// Bo gio - chi lay ngay
$date = $log['timecreate'];
$createDate = date('Y-m-d', strtotime($date));

echo "<tr>";
echo "<th>". $log['filename']. "</th>";
echo "<th>". $log['type']. "</th>";
echo "<th><a href=\"http://rynantech.com/partner-login/msscclick.php?id=".$log['id']."\"><img src='http://www.rynantech.com/partner-login/sites/images/dl.png".$row['image_name']."'></a></th>";
echo "<th>". $log['notes']. "</th>";
echo "<th>". $createDate. "</th>";
//echo "<td>". $log['id']. "</td>";
//echo "<td>". $log['printers']. "</td>";
//echo "<td>". $log['link']. "</td>";
//echo "<td>". $log['lastupdate']. "</td>";
//echo "<td>". $log['views']. "</td>";
//echo "<td><a href=\"http://rynantech.com/partner-login/mssc/VJET/$log[link]\" onclick=\"khoa();\">$log[link]</a></td>";

echo "</tr>";
}
?>


</table>
</div>
<div id="Smart-Jet Max-pr" class="tabcontent">
<table id="tracelog1" width="909" border="0" align="center">
<?php

//echo  @mysql_num_rows( $sql_query ); die();
$logs = @mysql_query("SELECT * from mssc where printers like 'Smart-Jet Max' and type like 'Presentation' order by timecreate desc");
while($log = mysql_fetch_array( $logs )){
// Bo gio - chi lay ngay
$date = $log['timecreate'];
$createDate = date('Y-m-d', strtotime($date));

echo "<tr>";
echo "<th>". $log['filename']. "</th>";
echo "<th>". $log['type']. "</th>";
echo "<th><a href=\"http://rynantech.com/partner-login/msscclick.php?id=".$log['id']."\"><img src='http://www.rynantech.com/partner-login/sites/images/dl.png".$row['image_name']."'></a></th>";
echo "<th>". $log['notes']. "</th>";
echo "<th>". $createDate. "</th>";
//echo "<td>". $log['id']. "</td>";
//echo "<td>". $log['printers']. "</td>";
//echo "<td>". $log['link']. "</td>";
//echo "<td>". $log['lastupdate']. "</td>";
//echo "<td>". $log['views']. "</td>";
//echo "<td><a href=\"http://rynantech.com/partner-login/mssc/VJET/$log[link]\" onclick=\"khoa();\">$log[link]</a></td>";

echo "</tr>";
}
?>


</table>
</div>

<div id="DL100-pr" class="tabcontent">
<table id="tracelog1" width="909" border="0" align="center">
<?php

//echo  @mysql_num_rows( $sql_query ); die();
$logs = @mysql_query("SELECT * from mssc where printers like 'DL100' and type like 'Presentation' order by timecreate desc");
while($log = mysql_fetch_array( $logs )){
// Bo gio - chi lay ngay
$date = $log['timecreate'];
$createDate = date('Y-m-d', strtotime($date));

echo "<tr>";
echo "<th>". $log['filename']. "</th>";
echo "<th>". $log['type']. "</th>";
echo "<th><a href=\"http://rynantech.com/partner-login/msscclick.php?id=".$log['id']."\"><img src='http://www.rynantech.com/partner-login/sites/images/dl.png".$row['image_name']."'></a></th>";
echo "<th>". $log['notes']. "</th>";
echo "<th>". $createDate. "</th>";
//echo "<td>". $log['id']. "</td>";
//echo "<td>". $log['printers']. "</td>";
//echo "<td>". $log['link']. "</td>";
//echo "<td>". $log['lastupdate']. "</td>";
//echo "<td>". $log['views']. "</td>";
//echo "<td><a href=\"http://rynantech.com/partner-login/mssc/VJET/$log[link]\" onclick=\"khoa();\">$log[link]</a></td>";

echo "</tr>";
}
?>


</table>
</div>

<div id="DL200-pr" class="tabcontent">
<table id="tracelog1" width="909" border="0" align="center">
<?php

//echo  @mysql_num_rows( $sql_query ); die();
$logs = @mysql_query("SELECT * from mssc where printers like 'DL200' and type like 'Presentation' order by timecreate desc");
while($log = mysql_fetch_array( $logs )){
// Bo gio - chi lay ngay
$date = $log['timecreate'];
$createDate = date('Y-m-d', strtotime($date));

echo "<tr>";
echo "<th>". $log['filename']. "</th>";
echo "<th>". $log['type']. "</th>";
echo "<th><a href=\"http://rynantech.com/partner-login/msscclick.php?id=".$log['id']."\"><img src='http://www.rynantech.com/partner-login/sites/images/dl.png".$row['image_name']."'></a></th>";
echo "<th>". $log['notes']. "</th>";
echo "<th>". $createDate. "</th>";
//echo "<td>". $log['id']. "</td>";
//echo "<td>". $log['printers']. "</td>";
//echo "<td>". $log['link']. "</td>";
//echo "<td>". $log['lastupdate']. "</td>";
//echo "<td>". $log['views']. "</td>";
//echo "<td><a href=\"http://rynantech.com/partner-login/mssc/VJET/$log[link]\" onclick=\"khoa();\">$log[link]</a></td>";

echo "</tr>";
}
?>


</table>
</div>
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
$logs = @mysql_query("SELECT * from mssc where printers like 'R20 PRO' and type like 'videos' order by timecreate desc");
while($log = mysql_fetch_array( $logs )){
// Bo gio - chi lay ngay
$date = $log['timecreate'];
$createDate = date('Y-m-d', strtotime($date));

echo "<tr>";
echo "<th>". $log['filename']. "</th>";
echo "<th>". $log['type']. "</th>";
echo "<th><a href=\"https://rynantech.com/partner-login/msscclick.php?id=".$log['id']."\"><img src='https://rynantech.com/partner-login/sites/images/dl.png".$row['image_name']."'></a></th>";
echo "<th>". $log['notes']. "</th>";
echo "<th>". $createDate. "</th>";
//echo "<td>". $log['id']. "</td>";
//echo "<td>". $log['printers']. "</td>";
//echo "<td>". $log['link']. "</td>";
//echo "<td>". $log['lastupdate']. "</td>";
//echo "<td>". $log['views']. "</td>";
//echo "<td><a href=\"https://rynantech.com/partner-login/mssc/VJET/$log[link]\" onclick=\"khoa();\">$log[link]</a></td>";

echo "</tr>";
}
?>

</table>
</div>



<div id="W1000-videos" class="tabcontent" style="display: block;" >
<table id="tracelog1" width="909" border="0" align="center">
<?php

//echo  @mysql_num_rows( $sql_query ); die();
$logs = @mysql_query("SELECT * from mssc where printers like 'W1000' and type like 'videos' order by timecreate desc");
while($log = mysql_fetch_array( $logs )){
// Bo gio - chi lay ngay
$date = $log['timecreate'];
$createDate = date('Y-m-d', strtotime($date));

echo "<tr>";
echo "<th>". $log['filename']. "</th>";
echo "<th>". $log['type']. "</th>";
echo "<th><a href=\"https://rynantech.com/partner-login/msscclick.php?id=".$log['id']."\"><img src='https://rynantech.com/partner-login/sites/images/dl.png".$row['image_name']."'></a></th>";
echo "<th>". $log['notes']. "</th>";
echo "<th>". $createDate. "</th>";
//echo "<td>". $log['id']. "</td>";
//echo "<td>". $log['printers']. "</td>";
//echo "<td>". $log['link']. "</td>";
//echo "<td>". $log['lastupdate']. "</td>";
//echo "<td>". $log['views']. "</td>";
//echo "<td><a href=\"https://rynantech.com/partner-login/mssc/VJET/$log[link]\" onclick=\"khoa();\">$log[link]</a></td>";

echo "</tr>";
}
?>

</table>
</div>



<div id="R1010-videos" class="tabcontent">
<table id="tracelog1" width="909" border="0" align="center">
<?php

//echo  @mysql_num_rows( $sql_query ); die();
$logs = @mysql_query("SELECT * from mssc where printers like 'R1010' and type like 'videos' order by timecreate desc");
while($log = mysql_fetch_array( $logs )){
// Bo gio - chi lay ngay
$date = $log['timecreate'];
$createDate = date('Y-m-d', strtotime($date));

echo "<tr>";
echo "<th>". $log['filename']. "</th>";
echo "<th>". $log['type']. "</th>";
echo "<th><a href=\"https://rynantech.com/partner-login/msscclick.php?id=".$log['id']."\"><img src='https://rynantech.com/partner-login/sites/images/dl.png".$row['image_name']."'></a></th>";
echo "<th>". $log['notes']. "</th>";
echo "<th>". $createDate. "</th>";
//echo "<td>". $log['id']. "</td>";
//echo "<td>". $log['printers']. "</td>";
//echo "<td>". $log['link']. "</td>";
//echo "<td>". $log['lastupdate']. "</td>";
//echo "<td>". $log['views']. "</td>";
//echo "<td><a href=\"https://rynantech.com/partner-login/mssc/VJET/$log[link]\" onclick=\"khoa();\">$log[link]</a></td>";

echo "</tr>";
}
?>

</table>
</div>




<div id="R1010P-videos" class="tabcontent">
<table id="tracelog1" width="909" border="0" align="center">
<?php

//echo  @mysql_num_rows( $sql_query ); die();
$logs = @mysql_query("SELECT * from mssc where printers like 'R1010P' and type like 'videos' order by timecreate desc");
while($log = mysql_fetch_array( $logs )){
// Bo gio - chi lay ngay
$date = $log['timecreate'];
$createDate = date('Y-m-d', strtotime($date));

echo "<tr>";
echo "<th>". $log['filename']. "</th>";
echo "<th>". $log['type']. "</th>";
echo "<th><a href=\"https://rynantech.com/partner-login/msscclick.php?id=".$log['id']."\"><img src='https://rynantech.com/partner-login/sites/images/dl.png".$row['image_name']."'></a></th>";
echo "<th>". $log['notes']. "</th>";
echo "<th>". $createDate. "</th>";
//echo "<td>". $log['id']. "</td>";
//echo "<td>". $log['printers']. "</td>";
//echo "<td>". $log['link']. "</td>";
//echo "<td>". $log['lastupdate']. "</td>";
//echo "<td>". $log['views']. "</td>";
//echo "<td><a href=\"https://rynantech.com/partner-login/mssc/VJET/$log[link]\" onclick=\"khoa();\">$log[link]</a></td>";

echo "</tr>";
}
?>

</table>
</div>


<div id="W1020-videos" class="tabcontent">
<table id="tracelog1" width="909" border="0" align="center">
<?php

//echo  @mysql_num_rows( $sql_query ); die();
$logs = @mysql_query("SELECT * from mssc where printers like 'W1020' and type like 'videos' order by timecreate desc");
while($log = mysql_fetch_array( $logs )){
// Bo gio - chi lay ngay
$date = $log['timecreate'];
$createDate = date('Y-m-d', strtotime($date));

echo "<tr>";
echo "<th>". $log['filename']. "</th>";
echo "<th>". $log['type']. "</th>";
echo "<th><a href=\"https://rynantech.com/partner-login/msscclick.php?id=".$log['id']."\"><img src='https://rynantech.com/partner-login/sites/images/dl.png".$row['image_name']."'></a></th>";
echo "<th>". $log['notes']. "</th>";
echo "<th>". $createDate. "</th>";
//echo "<td>". $log['id']. "</td>";
//echo "<td>". $log['printers']. "</td>";
//echo "<td>". $log['link']. "</td>";
//echo "<td>". $log['lastupdate']. "</td>";
//echo "<td>". $log['views']. "</td>";
//echo "<td><a href=\"https://rynantech.com/partner-login/mssc/VJET/$log[link]\" onclick=\"khoa();\">$log[link]</a></td>";

echo "</tr>";
}
?>

</table>
</div>


<div id="B1040-videos" class="tabcontent">
<table id="tracelog1" width="909" border="0" align="center">
<?php

//echo  @mysql_num_rows( $sql_query ); die();
$logs = @mysql_query("SELECT * from mssc where printers like 'B1040' and type like 'videos' order by timecreate desc");
while($log = mysql_fetch_array( $logs )){
// Bo gio - chi lay ngay
$date = $log['timecreate'];
$createDate = date('Y-m-d', strtotime($date));

echo "<tr>";
echo "<th>". $log['filename']. "</th>";
echo "<th>". $log['type']. "</th>";
echo "<th><a href=\"https://rynantech.com/partner-login/msscclick.php?id=".$log['id']."\"><img src='https://rynantech.com/partner-login/sites/images/dl.png".$row['image_name']."'></a></th>";
echo "<th>". $log['notes']. "</th>";
echo "<th>". $createDate. "</th>";
//echo "<td>". $log['id']. "</td>";
//echo "<td>". $log['printers']. "</td>";
//echo "<td>". $log['link']. "</td>";
//echo "<td>". $log['lastupdate']. "</td>";
//echo "<td>". $log['views']. "</td>";
//echo "<td><a href=\"https://rynantech.com/partner-login/mssc/VJET/$log[link]\" onclick=\"khoa();\">$log[link]</a></td>";

echo "</tr>";
}
?>

</table>
</div>
     
<div id="B1040H Aluminum-videos" class="tabcontent">
<table id="tracelog1" width="909" border="0" align="center">
<?php

//echo  @mysql_num_rows( $sql_query ); die();
$logs = @mysql_query("SELECT * from mssc where printers like 'B1040H Aluminum' and type like 'videos' order by timecreate desc");
while($log = mysql_fetch_array( $logs )){
// Bo gio - chi lay ngay
$date = $log['timecreate'];
$createDate = date('Y-m-d', strtotime($date));

echo "<tr>";
echo "<th>". $log['filename']. "</th>";
echo "<th>". $log['type']. "</th>";
echo "<th><a href=\"https://rynantech.com/partner-login/msscclick.php?id=".$log['id']."\"><img src='https://rynantech.com/partner-login/sites/images/dl.png".$row['image_name']."'></a></th>";
echo "<th>". $log['notes']. "</th>";
echo "<th>". $createDate. "</th>";
//echo "<td>". $log['id']. "</td>";
//echo "<td>". $log['printers']. "</td>";
//echo "<td>". $log['link']. "</td>";
//echo "<td>". $log['lastupdate']. "</td>";
//echo "<td>". $log['views']. "</td>";
//echo "<td><a href=\"https://rynantech.com/partner-login/mssc/VJET/$log[link]\" onclick=\"khoa();\">$log[link]</a></td>";

echo "</tr>";
}
?>

</table>
</div>



<div id="B1040H Plastic-videos" class="tabcontent">
<table id="tracelog1" width="909" border="0" align="center">
<?php

//echo  @mysql_num_rows( $sql_query ); die();
$logs = @mysql_query("SELECT * from mssc where printers like 'B1040H Plastic' and type like 'videos' order by timecreate desc");
while($log = mysql_fetch_array( $logs )){
// Bo gio - chi lay ngay
$date = $log['timecreate'];
$createDate = date('Y-m-d', strtotime($date));

echo "<tr>";
echo "<th>". $log['filename']. "</th>";
echo "<th>". $log['type']. "</th>";
echo "<th><a href=\"https://rynantech.com/partner-login/msscclick.php?id=".$log['id']."\"><img src='https://rynantech.com/partner-login/sites/images/dl.png".$row['image_name']."'></a></th>";
echo "<th>". $log['notes']. "</th>";
echo "<th>". $createDate. "</th>";
//echo "<td>". $log['id']. "</td>";
//echo "<td>". $log['printers']. "</td>";
//echo "<td>". $log['link']. "</td>";
//echo "<td>". $log['lastupdate']. "</td>";
//echo "<td>". $log['views']. "</td>";
//echo "<td><a href=\"https://rynantech.com/partner-login/mssc/VJET/$log[link]\" onclick=\"khoa();\">$log[link]</a></td>";

echo "</tr>";
}
?>

</table>
</div>

<div id="B1040S-videos" class="tabcontent">
<table id="tracelog1" width="909" border="0" align="center">
<?php

//echo  @mysql_num_rows( $sql_query ); die();
$logs = @mysql_query("SELECT * from mssc where printers like 'B1040S' and type like 'videos' order by timecreate desc");
while($log = mysql_fetch_array( $logs )){
// Bo gio - chi lay ngay
$date = $log['timecreate'];
$createDate = date('Y-m-d', strtotime($date));

echo "<tr>";
echo "<th>". $log['filename']. "</th>";
echo "<th>". $log['type']. "</th>";
echo "<th><a href=\"https://rynantech.com/partner-login/msscclick.php?id=".$log['id']."\"><img src='https://rynantech.com/partner-login/sites/images/dl.png".$row['image_name']."'></a></th>";
echo "<th>". $log['notes']. "</th>";
echo "<th>". $createDate. "</th>";
//echo "<td>". $log['id']. "</td>";
//echo "<td>". $log['printers']. "</td>";
//echo "<td>". $log['link']. "</td>";
//echo "<td>". $log['lastupdate']. "</td>";
//echo "<td>". $log['views']. "</td>";
//echo "<td><a href=\"https://rynantech.com/partner-login/mssc/VJET/$log[link]\" onclick=\"khoa();\">$log[link]</a></td>";

echo "</tr>";
}
?>

</table>
</div>

<div id="B1040P-videos" class="tabcontent">
<table id="tracelog1" width="909" border="0" align="center">
<?php

//echo  @mysql_num_rows( $sql_query ); die();
$logs = @mysql_query("SELECT * from mssc where printers like 'B1040P' and type like 'videos' order by timecreate desc");
while($log = mysql_fetch_array( $logs )){
// Bo gio - chi lay ngay
$date = $log['timecreate'];
$createDate = date('Y-m-d', strtotime($date));

echo "<tr>";
echo "<th>". $log['filename']. "</th>";
echo "<th>". $log['type']. "</th>";
echo "<th><a href=\"https://rynantech.com/partner-login/msscclick.php?id=".$log['id']."\"><img src='https://rynantech.com/partner-login/sites/images/dl.png".$row['image_name']."'></a></th>";
echo "<th>". $log['notes']. "</th>";
echo "<th>". $createDate. "</th>";
//echo "<td>". $log['id']. "</td>";
//echo "<td>". $log['printers']. "</td>";
//echo "<td>". $log['link']. "</td>";
//echo "<td>". $log['lastupdate']. "</td>";
//echo "<td>". $log['views']. "</td>";
//echo "<td><a href=\"https://rynantech.com/partner-login/mssc/VJET/$log[link]\" onclick=\"khoa();\">$log[link]</a></td>";

echo "</tr>";
}
?>

</table>
</div>




<div id="B1060-videos" class="tabcontent">
<table id="tracelog1" width="909" border="0" align="center">
<?php

//echo  @mysql_num_rows( $sql_query ); die();
$logs = @mysql_query("SELECT * from mssc where printers like 'B1060' and type like 'videos' order by timecreate desc");
while($log = mysql_fetch_array( $logs )){
// Bo gio - chi lay ngay
$date = $log['timecreate'];
$createDate = date('Y-m-d', strtotime($date));

echo "<tr>";
echo "<th>". $log['filename']. "</th>";
echo "<th>". $log['type']. "</th>";
echo "<th><a href=\"https://rynantech.com/partner-login/msscclick.php?id=".$log['id']."\"><img src='https://rynantech.com/partner-login/sites/images/dl.png".$row['image_name']."'></a></th>";
echo "<th>". $log['notes']. "</th>";
echo "<th>". $createDate. "</th>";
//echo "<td>". $log['id']. "</td>";
//echo "<td>". $log['printers']. "</td>";
//echo "<td>". $log['link']. "</td>";
//echo "<td>". $log['lastupdate']. "</td>";
//echo "<td>". $log['views']. "</td>";
//echo "<td><a href=\"https://rynantech.com/partner-login/mssc/VJET/$log[link]\" onclick=\"khoa();\">$log[link]</a></td>";

echo "</tr>";
}
?>

</table>
</div>

<div id="B1060P-videos" class="tabcontent">
<table id="tracelog1" width="909" border="0" align="center">
<?php

//echo  @mysql_num_rows( $sql_query ); die();
$logs = @mysql_query("SELECT * from mssc where printers like 'B1060P' and type like 'videos' order by timecreate desc");
while($log = mysql_fetch_array( $logs )){
// Bo gio - chi lay ngay
$date = $log['timecreate'];
$createDate = date('Y-m-d', strtotime($date));

echo "<tr>";
echo "<th>". $log['filename']. "</th>";
echo "<th>". $log['type']. "</th>";
echo "<th><a href=\"https://rynantech.com/partner-login/msscclick.php?id=".$log['id']."\"><img src='https://rynantech.com/partner-login/sites/images/dl.png".$row['image_name']."'></a></th>";
echo "<th>". $log['notes']. "</th>";
echo "<th>". $createDate. "</th>";
//echo "<td>". $log['id']. "</td>";
//echo "<td>". $log['printers']. "</td>";
//echo "<td>". $log['link']. "</td>";
//echo "<td>". $log['lastupdate']. "</td>";
//echo "<td>". $log['views']. "</td>";
//echo "<td><a href=\"https://rynantech.com/partner-login/mssc/VJET/$log[link]\" onclick=\"khoa();\">$log[link]</a></td>";

echo "</tr>";
}
?>

</table>
</div>

<div id="B1060H-videos" class="tabcontent">
<table id="tracelog1" width="909" border="0" align="center">
<?php

//echo  @mysql_num_rows( $sql_query ); die();
$logs = @mysql_query("SELECT * from mssc where printers like 'B1060H' and type like 'videos' order by timecreate desc");
while($log = mysql_fetch_array( $logs )){
// Bo gio - chi lay ngay
$date = $log['timecreate'];
$createDate = date('Y-m-d', strtotime($date));

echo "<tr>";
echo "<th>". $log['filename']. "</th>";
echo "<th>". $log['type']. "</th>";
echo "<th><a href=\"https://rynantech.com/partner-login/msscclick.php?id=".$log['id']."\"><img src='https://rynantech.com/partner-login/sites/images/dl.png".$row['image_name']."'></a></th>";
echo "<th>". $log['notes']. "</th>";
echo "<th>". $createDate. "</th>";
//echo "<td>". $log['id']. "</td>";
//echo "<td>". $log['printers']. "</td>";
//echo "<td>". $log['link']. "</td>";
//echo "<td>". $log['lastupdate']. "</td>";
//echo "<td>". $log['views']. "</td>";
//echo "<td><a href=\"https://rynantech.com/partner-login/mssc/VJET/$log[link]\" onclick=\"khoa();\">$log[link]</a></td>";

echo "</tr>";
}
?>

</table>
</div>



     
<div id="1200-videos" class="tabcontent">
<table id="tracelog1" width="909" border="0" align="center">
<?php

//echo  @mysql_num_rows( $sql_query ); die();
$logs = @mysql_query("SELECT * from mssc where printers like '1200' and type like 'videos' order by timecreate desc");
while($log = mysql_fetch_array( $logs )){
// Bo gio - chi lay ngay
$date = $log['timecreate'];
$createDate = date('Y-m-d', strtotime($date));

echo "<tr>";
echo "<th>". $log['filename']. "</th>";
echo "<th>". $log['type']. "</th>";
echo "<th><a href=\"https://rynantech.com/partner-login/msscclick.php?id=".$log['id']."\"><img src='https://rynantech.com/partner-login/sites/images/dl.png".$row['image_name']."'></a></th>";
echo "<th>". $log['notes']. "</th>";
echo "<th>". $createDate. "</th>";
//echo "<td>". $log['id']. "</td>";
//echo "<td>". $log['printers']. "</td>";
//echo "<td>". $log['link']. "</td>";
//echo "<td>". $log['lastupdate']. "</td>";
//echo "<td>". $log['views']. "</td>";
//echo "<td><a href=\"https://rynantech.com/partner-login/mssc/VJET/$log[link]\" onclick=\"khoa();\">$log[link]</a></td>";

echo "</tr>";
}
?>

</table>
</div>


     
<div id="1200E-videos" class="tabcontent">
<table id="tracelog1" width="909" border="0" align="center">
<?php

//echo  @mysql_num_rows( $sql_query ); die();
$logs = @mysql_query("SELECT * from mssc where printers like '1200E' and type like 'videos' order by timecreate desc");
while($log = mysql_fetch_array( $logs )){
// Bo gio - chi lay ngay
$date = $log['timecreate'];
$createDate = date('Y-m-d', strtotime($date));

echo "<tr>";
echo "<th>". $log['filename']. "</th>";
echo "<th>". $log['type']. "</th>";
echo "<th><a href=\"https://rynantech.com/partner-login/msscclick.php?id=".$log['id']."\"><img src='https://rynantech.com/partner-login/sites/images/dl.png".$row['image_name']."'></a></th>";
echo "<th>". $log['notes']. "</th>";
echo "<th>". $createDate. "</th>";
//echo "<td>". $log['id']. "</td>";
//echo "<td>". $log['printers']. "</td>";
//echo "<td>". $log['link']. "</td>";
//echo "<td>". $log['lastupdate']. "</td>";
//echo "<td>". $log['views']. "</td>";
//echo "<td><a href=\"https://rynantech.com/partner-login/mssc/VJET/$log[link]\" onclick=\"khoa();\">$log[link]</a></td>";

echo "</tr>";
}
?>

</table>
</div>
     
<div id="1200Plus-videos" class="tabcontent">
<table id="tracelog1" width="909" border="0" align="center">
<?php

//echo  @mysql_num_rows( $sql_query ); die();
$logs = @mysql_query("SELECT * from mssc where printers like '1200Plus' and type like 'videos' order by timecreate desc");
while($log = mysql_fetch_array( $logs )){
// Bo gio - chi lay ngay
$date = $log['timecreate'];
$createDate = date('Y-m-d', strtotime($date));

echo "<tr>";
echo "<th>". $log['filename']. "</th>";
echo "<th>". $log['type']. "</th>";
echo "<th><a href=\"https://rynantech.com/partner-login/msscclick.php?id=".$log['id']."\"><img src='https://rynantech.com/partner-login/sites/images/dl.png".$row['image_name']."'></a></th>";
echo "<th>". $log['notes']. "</th>";
echo "<th>". $createDate. "</th>";
//echo "<td>". $log['id']. "</td>";
//echo "<td>". $log['printers']. "</td>";
//echo "<td>". $log['link']. "</td>";
//echo "<td>". $log['lastupdate']. "</td>";
//echo "<td>". $log['views']. "</td>";
//echo "<td><a href=\"https://rynantech.com/partner-login/mssc/VJET/$log[link]\" onclick=\"khoa();\">$log[link]</a></td>";

echo "</tr>";
}
?>

</table>
</div>


     
<div id="1200EG-videos" class="tabcontent">
<table id="tracelog1" width="909" border="0" align="center">
<?php

//echo  @mysql_num_rows( $sql_query ); die();
$logs = @mysql_query("SELECT * from mssc where printers like '1200EG' and type like 'videos' order by timecreate desc");
while($log = mysql_fetch_array( $logs )){
// Bo gio - chi lay ngay
$date = $log['timecreate'];
$createDate = date('Y-m-d', strtotime($date));

echo "<tr>";
echo "<th>". $log['filename']. "</th>";
echo "<th>". $log['type']. "</th>";
echo "<th><a href=\"https://rynantech.com/partner-login/msscclick.php?id=".$log['id']."\"><img src='https://rynantech.com/partner-login/sites/images/dl.png".$row['image_name']."'></a></th>";
echo "<th>". $log['notes']. "</th>";
echo "<th>". $createDate. "</th>";
//echo "<td>". $log['id']. "</td>";
//echo "<td>". $log['printers']. "</td>";
//echo "<td>". $log['link']. "</td>";
//echo "<td>". $log['lastupdate']. "</td>";
//echo "<td>". $log['views']. "</td>";
//echo "<td><a href=\"https://rynantech.com/partner-login/mssc/VJET/$log[link]\" onclick=\"khoa();\">$log[link]</a></td>";

echo "</tr>";
}
?>

</table>
</div>



     
<div id="2172C-videos" class="tabcontent">
<table id="tracelog1" width="909" border="0" align="center">
<?php

//echo  @mysql_num_rows( $sql_query ); die();
$logs = @mysql_query("SELECT * from mssc where printers like '2172C' and type like 'videos' order by timecreate desc");
while($log = mysql_fetch_array( $logs )){
// Bo gio - chi lay ngay
$date = $log['timecreate'];
$createDate = date('Y-m-d', strtotime($date));

echo "<tr>";
echo "<th>". $log['filename']. "</th>";
echo "<th>". $log['type']. "</th>";
echo "<th><a href=\"https://rynantech.com/partner-login/msscclick.php?id=".$log['id']."\"><img src='https://rynantech.com/partner-login/sites/images/dl.png".$row['image_name']."'></a></th>";
echo "<th>". $log['notes']. "</th>";
echo "<th>". $createDate. "</th>";
//echo "<td>". $log['id']. "</td>";
//echo "<td>". $log['printers']. "</td>";
//echo "<td>". $log['link']. "</td>";
//echo "<td>". $log['lastupdate']. "</td>";
//echo "<td>". $log['views']. "</td>";
//echo "<td><a href=\"https://rynantech.com/partner-login/mssc/VJET/$log[link]\" onclick=\"khoa();\">$log[link]</a></td>";

echo "</tr>";
}
?>

</table>
</div>


     
<div id="IOJ100-videos" class="tabcontent">
<table id="tracelog1" width="909" border="0" align="center">
<?php

//echo  @mysql_num_rows( $sql_query ); die();
$logs = @mysql_query("SELECT * from mssc where printers like 'IOJ100' and type like 'videos' order by timecreate desc");
while($log = mysql_fetch_array( $logs )){
// Bo gio - chi lay ngay
$date = $log['timecreate'];
$createDate = date('Y-m-d', strtotime($date));

echo "<tr>";
echo "<th>". $log['filename']. "</th>";
echo "<th>". $log['type']. "</th>";
echo "<th><a href=\"https://rynantech.com/partner-login/msscclick.php?id=".$log['id']."\"><img src='https://rynantech.com/partner-login/sites/images/dl.png".$row['image_name']."'></a></th>";
echo "<th>". $log['notes']. "</th>";
echo "<th>". $createDate. "</th>";
//echo "<td>". $log['id']. "</td>";
//echo "<td>". $log['printers']. "</td>";
//echo "<td>". $log['link']. "</td>";
//echo "<td>". $log['lastupdate']. "</td>";
//echo "<td>". $log['views']. "</td>";
//echo "<td><a href=\"https://rynantech.com/partner-login/mssc/VJET/$log[link]\" onclick=\"khoa();\">$log[link]</a></td>";

echo "</tr>";
}
?>

</table>
</div>


     
<div id="IOJ200-videos" class="tabcontent">
<table id="tracelog1" width="909" border="0" align="center">
<?php

//echo  @mysql_num_rows( $sql_query ); die();
$logs = @mysql_query("SELECT * from mssc where printers like 'IOJ200' and type like 'videos' order by timecreate desc");
while($log = mysql_fetch_array( $logs )){
// Bo gio - chi lay ngay
$date = $log['timecreate'];
$createDate = date('Y-m-d', strtotime($date));

echo "<tr>";
echo "<th>". $log['filename']. "</th>";
echo "<th>". $log['type']. "</th>";
echo "<th><a href=\"https://rynantech.com/partner-login/msscclick.php?id=".$log['id']."\"><img src='https://rynantech.com/partner-login/sites/images/dl.png".$row['image_name']."'></a></th>";
echo "<th>". $log['notes']. "</th>";
echo "<th>". $createDate. "</th>";
//echo "<td>". $log['id']. "</td>";
//echo "<td>". $log['printers']. "</td>";
//echo "<td>". $log['link']. "</td>";
//echo "<td>". $log['lastupdate']. "</td>";
//echo "<td>". $log['views']. "</td>";
//echo "<td><a href=\"https://rynantech.com/partner-login/mssc/VJET/$log[link]\" onclick=\"khoa();\">$log[link]</a></td>";

echo "</tr>";
}
?>

</table>
</div>


<div id="InkFeeder8-videos" class="tabcontent">
<table id="tracelog1" width="909" border="0" align="center">
<?php

//echo  @mysql_num_rows( $sql_query ); die();
$logs = @mysql_query("SELECT * from mssc where printers like 'InkFeeder8' and type like 'videos' order by timecreate desc");
while($log = mysql_fetch_array( $logs )){
// Bo gio - chi lay ngay
$date = $log['timecreate'];
$createDate = date('Y-m-d', strtotime($date));

echo "<tr>";
echo "<th>". $log['filename']. "</th>";
echo "<th>". $log['type']. "</th>";
echo "<th><a href=\"https://rynantech.com/partner-login/msscclick.php?id=".$log['id']."\"><img src='https://rynantech.com/partner-login/sites/images/dl.png".$row['image_name']."'></a></th>";
echo "<th>". $log['notes']. "</th>";
echo "<th>". $createDate. "</th>";
//echo "<td>". $log['id']. "</td>";
//echo "<td>". $log['printers']. "</td>";
//echo "<td>". $log['link']. "</td>";
//echo "<td>". $log['lastupdate']. "</td>";
//echo "<td>". $log['views']. "</td>";
//echo "<td><a href=\"https://rynantech.com/partner-login/mssc/VJET/$log[link]\" onclick=\"khoa();\">$log[link]</a></td>";

echo "</tr>";
}
?>

</table>
</div>
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
$logs = @mysql_query("SELECT * from mssc where printers like 'R20 PRO' and type like 'photos' order by timecreate desc");
while($log = mysql_fetch_array( $logs )){
// Bo gio - chi lay ngay
$date = $log['timecreate'];
$createDate = date('Y-m-d', strtotime($date));

echo "<tr>";
echo "<th>". $log['filename']. "</th>";
echo "<th>". $log['type']. "</th>";
echo "<th><a href=\"https://rynantech.com/partner-login/msscclick.php?id=".$log['id']."\"><img src='https://rynantech.com/partner-login/sites/images/dl.png".$row['image_name']."'></a></th>";
echo "<th>". $log['notes']. "</th>";
echo "<th>". $createDate. "</th>";
//echo "<td>". $log['id']. "</td>";
//echo "<td>". $log['printers']. "</td>";
//echo "<td>". $log['link']. "</td>";
//echo "<td>". $log['lastupdate']. "</td>";
//echo "<td>". $log['views']. "</td>";
//echo "<td><a href=\"https://rynantech.com/partner-login/mssc/VJET/$log[link]\" onclick=\"khoa();\">$log[link]</a></td>";

echo "</tr>";
}
?>

</table>
</div>



<div id="W1000-photos" class="tabcontent" style="display: block;" >
<table id="tracelog1" width="909" border="0" align="center">
<?php

//echo  @mysql_num_rows( $sql_query ); die();
$logs = @mysql_query("SELECT * from mssc where printers like 'W1000' and type like 'photos' order by timecreate desc");
while($log = mysql_fetch_array( $logs )){
// Bo gio - chi lay ngay
$date = $log['timecreate'];
$createDate = date('Y-m-d', strtotime($date));

echo "<tr>";
echo "<th>". $log['filename']. "</th>";
echo "<th>". $log['type']. "</th>";
echo "<th><a href=\"https://rynantech.com/partner-login/msscclick.php?id=".$log['id']."\"><img src='https://rynantech.com/partner-login/sites/images/dl.png".$row['image_name']."'></a></th>";
echo "<th>". $log['notes']. "</th>";
echo "<th>". $createDate. "</th>";
//echo "<td>". $log['id']. "</td>";
//echo "<td>". $log['printers']. "</td>";
//echo "<td>". $log['link']. "</td>";
//echo "<td>". $log['lastupdate']. "</td>";
//echo "<td>". $log['views']. "</td>";
//echo "<td><a href=\"https://rynantech.com/partner-login/mssc/VJET/$log[link]\" onclick=\"khoa();\">$log[link]</a></td>";

echo "</tr>";
}
?>

</table>
</div>



<div id="R1010-photos" class="tabcontent">
<table id="tracelog1" width="909" border="0" align="center">
<?php

//echo  @mysql_num_rows( $sql_query ); die();
$logs = @mysql_query("SELECT * from mssc where printers like 'R1010' and type like 'photos' order by timecreate desc");
while($log = mysql_fetch_array( $logs )){
// Bo gio - chi lay ngay
$date = $log['timecreate'];
$createDate = date('Y-m-d', strtotime($date));

echo "<tr>";
echo "<th>". $log['filename']. "</th>";
echo "<th>". $log['type']. "</th>";
echo "<th><a href=\"https://rynantech.com/partner-login/msscclick.php?id=".$log['id']."\"><img src='https://rynantech.com/partner-login/sites/images/dl.png".$row['image_name']."'></a></th>";
echo "<th>". $log['notes']. "</th>";
echo "<th>". $createDate. "</th>";
//echo "<td>". $log['id']. "</td>";
//echo "<td>". $log['printers']. "</td>";
//echo "<td>". $log['link']. "</td>";
//echo "<td>". $log['lastupdate']. "</td>";
//echo "<td>". $log['views']. "</td>";
//echo "<td><a href=\"https://rynantech.com/partner-login/mssc/VJET/$log[link]\" onclick=\"khoa();\">$log[link]</a></td>";

echo "</tr>";
}
?>

</table>
</div>




<div id="R1010P-photos" class="tabcontent">
<table id="tracelog1" width="909" border="0" align="center">
<?php

//echo  @mysql_num_rows( $sql_query ); die();
$logs = @mysql_query("SELECT * from mssc where printers like 'R1010P' and type like 'photos' order by timecreate desc");
while($log = mysql_fetch_array( $logs )){
// Bo gio - chi lay ngay
$date = $log['timecreate'];
$createDate = date('Y-m-d', strtotime($date));

echo "<tr>";
echo "<th>". $log['filename']. "</th>";
echo "<th>". $log['type']. "</th>";
echo "<th><a href=\"https://rynantech.com/partner-login/msscclick.php?id=".$log['id']."\"><img src='https://rynantech.com/partner-login/sites/images/dl.png".$row['image_name']."'></a></th>";
echo "<th>". $log['notes']. "</th>";
echo "<th>". $createDate. "</th>";
//echo "<td>". $log['id']. "</td>";
//echo "<td>". $log['printers']. "</td>";
//echo "<td>". $log['link']. "</td>";
//echo "<td>". $log['lastupdate']. "</td>";
//echo "<td>". $log['views']. "</td>";
//echo "<td><a href=\"https://rynantech.com/partner-login/mssc/VJET/$log[link]\" onclick=\"khoa();\">$log[link]</a></td>";

echo "</tr>";
}
?>

</table>
</div>


<div id="W1020-photos" class="tabcontent">
<table id="tracelog1" width="909" border="0" align="center">
<?php

//echo  @mysql_num_rows( $sql_query ); die();
$logs = @mysql_query("SELECT * from mssc where printers like 'W1020' and type like 'photos' order by timecreate desc");
while($log = mysql_fetch_array( $logs )){
// Bo gio - chi lay ngay
$date = $log['timecreate'];
$createDate = date('Y-m-d', strtotime($date));

echo "<tr>";
echo "<th>". $log['filename']. "</th>";
echo "<th>". $log['type']. "</th>";
echo "<th><a href=\"https://rynantech.com/partner-login/msscclick.php?id=".$log['id']."\"><img src='https://rynantech.com/partner-login/sites/images/dl.png".$row['image_name']."'></a></th>";
echo "<th>". $log['notes']. "</th>";
echo "<th>". $createDate. "</th>";
//echo "<td>". $log['id']. "</td>";
//echo "<td>". $log['printers']. "</td>";
//echo "<td>". $log['link']. "</td>";
//echo "<td>". $log['lastupdate']. "</td>";
//echo "<td>". $log['views']. "</td>";
//echo "<td><a href=\"https://rynantech.com/partner-login/mssc/VJET/$log[link]\" onclick=\"khoa();\">$log[link]</a></td>";

echo "</tr>";
}
?>

</table>
</div>


<div id="B1040-photos" class="tabcontent">
<table id="tracelog1" width="909" border="0" align="center">
<?php

//echo  @mysql_num_rows( $sql_query ); die();
$logs = @mysql_query("SELECT * from mssc where printers like 'B1040' and type like 'photos' order by timecreate desc");
while($log = mysql_fetch_array( $logs )){
// Bo gio - chi lay ngay
$date = $log['timecreate'];
$createDate = date('Y-m-d', strtotime($date));

echo "<tr>";
echo "<th>". $log['filename']. "</th>";
echo "<th>". $log['type']. "</th>";
echo "<th><a href=\"https://rynantech.com/partner-login/msscclick.php?id=".$log['id']."\"><img src='https://rynantech.com/partner-login/sites/images/dl.png".$row['image_name']."'></a></th>";
echo "<th>". $log['notes']. "</th>";
echo "<th>". $createDate. "</th>";
//echo "<td>". $log['id']. "</td>";
//echo "<td>". $log['printers']. "</td>";
//echo "<td>". $log['link']. "</td>";
//echo "<td>". $log['lastupdate']. "</td>";
//echo "<td>". $log['views']. "</td>";
//echo "<td><a href=\"https://rynantech.com/partner-login/mssc/VJET/$log[link]\" onclick=\"khoa();\">$log[link]</a></td>";

echo "</tr>";
}
?>

</table>
</div>
     
<div id="B1040H Aluminum-photos" class="tabcontent">
<table id="tracelog1" width="909" border="0" align="center">
<?php

//echo  @mysql_num_rows( $sql_query ); die();
$logs = @mysql_query("SELECT * from mssc where printers like 'B1040H Aluminum' and type like 'photos' order by timecreate desc");
while($log = mysql_fetch_array( $logs )){
// Bo gio - chi lay ngay
$date = $log['timecreate'];
$createDate = date('Y-m-d', strtotime($date));

echo "<tr>";
echo "<th>". $log['filename']. "</th>";
echo "<th>". $log['type']. "</th>";
echo "<th><a href=\"https://rynantech.com/partner-login/msscclick.php?id=".$log['id']."\"><img src='https://rynantech.com/partner-login/sites/images/dl.png".$row['image_name']."'></a></th>";
echo "<th>". $log['notes']. "</th>";
echo "<th>". $createDate. "</th>";
//echo "<td>". $log['id']. "</td>";
//echo "<td>". $log['printers']. "</td>";
//echo "<td>". $log['link']. "</td>";
//echo "<td>". $log['lastupdate']. "</td>";
//echo "<td>". $log['views']. "</td>";
//echo "<td><a href=\"https://rynantech.com/partner-login/mssc/VJET/$log[link]\" onclick=\"khoa();\">$log[link]</a></td>";

echo "</tr>";
}
?>

</table>
</div>



<div id="B1040H Plastic-photos" class="tabcontent">
<table id="tracelog1" width="909" border="0" align="center">
<?php

//echo  @mysql_num_rows( $sql_query ); die();
$logs = @mysql_query("SELECT * from mssc where printers like 'B1040H Plastic' and type like 'photos' order by timecreate desc");
while($log = mysql_fetch_array( $logs )){
// Bo gio - chi lay ngay
$date = $log['timecreate'];
$createDate = date('Y-m-d', strtotime($date));

echo "<tr>";
echo "<th>". $log['filename']. "</th>";
echo "<th>". $log['type']. "</th>";
echo "<th><a href=\"https://rynantech.com/partner-login/msscclick.php?id=".$log['id']."\"><img src='https://rynantech.com/partner-login/sites/images/dl.png".$row['image_name']."'></a></th>";
echo "<th>". $log['notes']. "</th>";
echo "<th>". $createDate. "</th>";
//echo "<td>". $log['id']. "</td>";
//echo "<td>". $log['printers']. "</td>";
//echo "<td>". $log['link']. "</td>";
//echo "<td>". $log['lastupdate']. "</td>";
//echo "<td>". $log['views']. "</td>";
//echo "<td><a href=\"https://rynantech.com/partner-login/mssc/VJET/$log[link]\" onclick=\"khoa();\">$log[link]</a></td>";

echo "</tr>";
}
?>

</table>
</div>

<div id="B1040S-photos" class="tabcontent">
<table id="tracelog1" width="909" border="0" align="center">
<?php

//echo  @mysql_num_rows( $sql_query ); die();
$logs = @mysql_query("SELECT * from mssc where printers like 'B1040S' and type like 'photos' order by timecreate desc");
while($log = mysql_fetch_array( $logs )){
// Bo gio - chi lay ngay
$date = $log['timecreate'];
$createDate = date('Y-m-d', strtotime($date));

echo "<tr>";
echo "<th>". $log['filename']. "</th>";
echo "<th>". $log['type']. "</th>";
echo "<th><a href=\"https://rynantech.com/partner-login/msscclick.php?id=".$log['id']."\"><img src='https://rynantech.com/partner-login/sites/images/dl.png".$row['image_name']."'></a></th>";
echo "<th>". $log['notes']. "</th>";
echo "<th>". $createDate. "</th>";
//echo "<td>". $log['id']. "</td>";
//echo "<td>". $log['printers']. "</td>";
//echo "<td>". $log['link']. "</td>";
//echo "<td>". $log['lastupdate']. "</td>";
//echo "<td>". $log['views']. "</td>";
//echo "<td><a href=\"https://rynantech.com/partner-login/mssc/VJET/$log[link]\" onclick=\"khoa();\">$log[link]</a></td>";

echo "</tr>";
}
?>

</table>
</div>

<div id="B1040P-photos" class="tabcontent">
<table id="tracelog1" width="909" border="0" align="center">
<?php

//echo  @mysql_num_rows( $sql_query ); die();
$logs = @mysql_query("SELECT * from mssc where printers like 'B1040P' and type like 'photos' order by timecreate desc");
while($log = mysql_fetch_array( $logs )){
// Bo gio - chi lay ngay
$date = $log['timecreate'];
$createDate = date('Y-m-d', strtotime($date));

echo "<tr>";
echo "<th>". $log['filename']. "</th>";
echo "<th>". $log['type']. "</th>";
echo "<th><a href=\"https://rynantech.com/partner-login/msscclick.php?id=".$log['id']."\"><img src='https://rynantech.com/partner-login/sites/images/dl.png".$row['image_name']."'></a></th>";
echo "<th>". $log['notes']. "</th>";
echo "<th>". $createDate. "</th>";
//echo "<td>". $log['id']. "</td>";
//echo "<td>". $log['printers']. "</td>";
//echo "<td>". $log['link']. "</td>";
//echo "<td>". $log['lastupdate']. "</td>";
//echo "<td>". $log['views']. "</td>";
//echo "<td><a href=\"https://rynantech.com/partner-login/mssc/VJET/$log[link]\" onclick=\"khoa();\">$log[link]</a></td>";

echo "</tr>";
}
?>

</table>
</div>




<div id="B1060-photos" class="tabcontent">
<table id="tracelog1" width="909" border="0" align="center">
<?php

//echo  @mysql_num_rows( $sql_query ); die();
$logs = @mysql_query("SELECT * from mssc where printers like 'B1060' and type like 'photos' order by timecreate desc");
while($log = mysql_fetch_array( $logs )){
// Bo gio - chi lay ngay
$date = $log['timecreate'];
$createDate = date('Y-m-d', strtotime($date));

echo "<tr>";
echo "<th>". $log['filename']. "</th>";
echo "<th>". $log['type']. "</th>";
echo "<th><a href=\"https://rynantech.com/partner-login/msscclick.php?id=".$log['id']."\"><img src='https://rynantech.com/partner-login/sites/images/dl.png".$row['image_name']."'></a></th>";
echo "<th>". $log['notes']. "</th>";
echo "<th>". $createDate. "</th>";
//echo "<td>". $log['id']. "</td>";
//echo "<td>". $log['printers']. "</td>";
//echo "<td>". $log['link']. "</td>";
//echo "<td>". $log['lastupdate']. "</td>";
//echo "<td>". $log['views']. "</td>";
//echo "<td><a href=\"https://rynantech.com/partner-login/mssc/VJET/$log[link]\" onclick=\"khoa();\">$log[link]</a></td>";

echo "</tr>";
}
?>

</table>
</div>

<div id="B1060P-photos" class="tabcontent">
<table id="tracelog1" width="909" border="0" align="center">
<?php

//echo  @mysql_num_rows( $sql_query ); die();
$logs = @mysql_query("SELECT * from mssc where printers like 'B1060P' and type like 'photos' order by timecreate desc");
while($log = mysql_fetch_array( $logs )){
// Bo gio - chi lay ngay
$date = $log['timecreate'];
$createDate = date('Y-m-d', strtotime($date));

echo "<tr>";
echo "<th>". $log['filename']. "</th>";
echo "<th>". $log['type']. "</th>";
echo "<th><a href=\"https://rynantech.com/partner-login/msscclick.php?id=".$log['id']."\"><img src='https://rynantech.com/partner-login/sites/images/dl.png".$row['image_name']."'></a></th>";
echo "<th>". $log['notes']. "</th>";
echo "<th>". $createDate. "</th>";
//echo "<td>". $log['id']. "</td>";
//echo "<td>". $log['printers']. "</td>";
//echo "<td>". $log['link']. "</td>";
//echo "<td>". $log['lastupdate']. "</td>";
//echo "<td>". $log['views']. "</td>";
//echo "<td><a href=\"https://rynantech.com/partner-login/mssc/VJET/$log[link]\" onclick=\"khoa();\">$log[link]</a></td>";

echo "</tr>";
}
?>

</table>
</div>

<div id="B1060H-photos" class="tabcontent">
<table id="tracelog1" width="909" border="0" align="center">
<?php

//echo  @mysql_num_rows( $sql_query ); die();
$logs = @mysql_query("SELECT * from mssc where printers like 'B1060H' and type like 'photos' order by timecreate desc");
while($log = mysql_fetch_array( $logs )){
// Bo gio - chi lay ngay
$date = $log['timecreate'];
$createDate = date('Y-m-d', strtotime($date));

echo "<tr>";
echo "<th>". $log['filename']. "</th>";
echo "<th>". $log['type']. "</th>";
echo "<th><a href=\"https://rynantech.com/partner-login/msscclick.php?id=".$log['id']."\"><img src='https://rynantech.com/partner-login/sites/images/dl.png".$row['image_name']."'></a></th>";
echo "<th>". $log['notes']. "</th>";
echo "<th>". $createDate. "</th>";
//echo "<td>". $log['id']. "</td>";
//echo "<td>". $log['printers']. "</td>";
//echo "<td>". $log['link']. "</td>";
//echo "<td>". $log['lastupdate']. "</td>";
//echo "<td>". $log['views']. "</td>";
//echo "<td><a href=\"https://rynantech.com/partner-login/mssc/VJET/$log[link]\" onclick=\"khoa();\">$log[link]</a></td>";

echo "</tr>";
}
?>

</table>
</div>



     
<div id="1200-photos" class="tabcontent">
<table id="tracelog1" width="909" border="0" align="center">
<?php

//echo  @mysql_num_rows( $sql_query ); die();
$logs = @mysql_query("SELECT * from mssc where printers like '1200' and type like 'photos' order by timecreate desc");
while($log = mysql_fetch_array( $logs )){
// Bo gio - chi lay ngay
$date = $log['timecreate'];
$createDate = date('Y-m-d', strtotime($date));

echo "<tr>";
echo "<th>". $log['filename']. "</th>";
echo "<th>". $log['type']. "</th>";
echo "<th><a href=\"https://rynantech.com/partner-login/msscclick.php?id=".$log['id']."\"><img src='https://rynantech.com/partner-login/sites/images/dl.png".$row['image_name']."'></a></th>";
echo "<th>". $log['notes']. "</th>";
echo "<th>". $createDate. "</th>";
//echo "<td>". $log['id']. "</td>";
//echo "<td>". $log['printers']. "</td>";
//echo "<td>". $log['link']. "</td>";
//echo "<td>". $log['lastupdate']. "</td>";
//echo "<td>". $log['views']. "</td>";
//echo "<td><a href=\"https://rynantech.com/partner-login/mssc/VJET/$log[link]\" onclick=\"khoa();\">$log[link]</a></td>";

echo "</tr>";
}
?>

</table>
</div>


     
<div id="1200E-photos" class="tabcontent">
<table id="tracelog1" width="909" border="0" align="center">
<?php

//echo  @mysql_num_rows( $sql_query ); die();
$logs = @mysql_query("SELECT * from mssc where printers like '1200E' and type like 'photos' order by timecreate desc");
while($log = mysql_fetch_array( $logs )){
// Bo gio - chi lay ngay
$date = $log['timecreate'];
$createDate = date('Y-m-d', strtotime($date));

echo "<tr>";
echo "<th>". $log['filename']. "</th>";
echo "<th>". $log['type']. "</th>";
echo "<th><a href=\"https://rynantech.com/partner-login/msscclick.php?id=".$log['id']."\"><img src='https://rynantech.com/partner-login/sites/images/dl.png".$row['image_name']."'></a></th>";
echo "<th>". $log['notes']. "</th>";
echo "<th>". $createDate. "</th>";
//echo "<td>". $log['id']. "</td>";
//echo "<td>". $log['printers']. "</td>";
//echo "<td>". $log['link']. "</td>";
//echo "<td>". $log['lastupdate']. "</td>";
//echo "<td>". $log['views']. "</td>";
//echo "<td><a href=\"https://rynantech.com/partner-login/mssc/VJET/$log[link]\" onclick=\"khoa();\">$log[link]</a></td>";

echo "</tr>";
}
?>

</table>
</div>
     
<div id="1200Plus-photos" class="tabcontent">
<table id="tracelog1" width="909" border="0" align="center">
<?php

//echo  @mysql_num_rows( $sql_query ); die();
$logs = @mysql_query("SELECT * from mssc where printers like '1200Plus' and type like 'photos' order by timecreate desc");
while($log = mysql_fetch_array( $logs )){
// Bo gio - chi lay ngay
$date = $log['timecreate'];
$createDate = date('Y-m-d', strtotime($date));

echo "<tr>";
echo "<th>". $log['filename']. "</th>";
echo "<th>". $log['type']. "</th>";
echo "<th><a href=\"https://rynantech.com/partner-login/msscclick.php?id=".$log['id']."\"><img src='https://rynantech.com/partner-login/sites/images/dl.png".$row['image_name']."'></a></th>";
echo "<th>". $log['notes']. "</th>";
echo "<th>". $createDate. "</th>";
//echo "<td>". $log['id']. "</td>";
//echo "<td>". $log['printers']. "</td>";
//echo "<td>". $log['link']. "</td>";
//echo "<td>". $log['lastupdate']. "</td>";
//echo "<td>". $log['views']. "</td>";
//echo "<td><a href=\"https://rynantech.com/partner-login/mssc/VJET/$log[link]\" onclick=\"khoa();\">$log[link]</a></td>";

echo "</tr>";
}
?>

</table>
</div>


     
<div id="1200EG-photos" class="tabcontent">
<table id="tracelog1" width="909" border="0" align="center">
<?php

//echo  @mysql_num_rows( $sql_query ); die();
$logs = @mysql_query("SELECT * from mssc where printers like '1200EG' and type like 'photos' order by timecreate desc");
while($log = mysql_fetch_array( $logs )){
// Bo gio - chi lay ngay
$date = $log['timecreate'];
$createDate = date('Y-m-d', strtotime($date));

echo "<tr>";
echo "<th>". $log['filename']. "</th>";
echo "<th>". $log['type']. "</th>";
echo "<th><a href=\"https://rynantech.com/partner-login/msscclick.php?id=".$log['id']."\"><img src='https://rynantech.com/partner-login/sites/images/dl.png".$row['image_name']."'></a></th>";
echo "<th>". $log['notes']. "</th>";
echo "<th>". $createDate. "</th>";
//echo "<td>". $log['id']. "</td>";
//echo "<td>". $log['printers']. "</td>";
//echo "<td>". $log['link']. "</td>";
//echo "<td>". $log['lastupdate']. "</td>";
//echo "<td>". $log['views']. "</td>";
//echo "<td><a href=\"https://rynantech.com/partner-login/mssc/VJET/$log[link]\" onclick=\"khoa();\">$log[link]</a></td>";

echo "</tr>";
}
?>

</table>
</div>



     
<div id="2172C-photos" class="tabcontent">
<table id="tracelog1" width="909" border="0" align="center">
<?php

//echo  @mysql_num_rows( $sql_query ); die();
$logs = @mysql_query("SELECT * from mssc where printers like '2172C' and type like 'photos' order by timecreate desc");
while($log = mysql_fetch_array( $logs )){
// Bo gio - chi lay ngay
$date = $log['timecreate'];
$createDate = date('Y-m-d', strtotime($date));

echo "<tr>";
echo "<th>". $log['filename']. "</th>";
echo "<th>". $log['type']. "</th>";
echo "<th><a href=\"https://rynantech.com/partner-login/msscclick.php?id=".$log['id']."\"><img src='https://rynantech.com/partner-login/sites/images/dl.png".$row['image_name']."'></a></th>";
echo "<th>". $log['notes']. "</th>";
echo "<th>". $createDate. "</th>";
//echo "<td>". $log['id']. "</td>";
//echo "<td>". $log['printers']. "</td>";
//echo "<td>". $log['link']. "</td>";
//echo "<td>". $log['lastupdate']. "</td>";
//echo "<td>". $log['views']. "</td>";
//echo "<td><a href=\"https://rynantech.com/partner-login/mssc/VJET/$log[link]\" onclick=\"khoa();\">$log[link]</a></td>";

echo "</tr>";
}
?>

</table>
</div>


     
<div id="IOJ100-photos" class="tabcontent">
<table id="tracelog1" width="909" border="0" align="center">
<?php

//echo  @mysql_num_rows( $sql_query ); die();
$logs = @mysql_query("SELECT * from mssc where printers like 'IOJ100' and type like 'photos' order by timecreate desc");
while($log = mysql_fetch_array( $logs )){
// Bo gio - chi lay ngay
$date = $log['timecreate'];
$createDate = date('Y-m-d', strtotime($date));

echo "<tr>";
echo "<th>". $log['filename']. "</th>";
echo "<th>". $log['type']. "</th>";
echo "<th><a href=\"https://rynantech.com/partner-login/msscclick.php?id=".$log['id']."\"><img src='https://rynantech.com/partner-login/sites/images/dl.png".$row['image_name']."'></a></th>";
echo "<th>". $log['notes']. "</th>";
echo "<th>". $createDate. "</th>";
//echo "<td>". $log['id']. "</td>";
//echo "<td>". $log['printers']. "</td>";
//echo "<td>". $log['link']. "</td>";
//echo "<td>". $log['lastupdate']. "</td>";
//echo "<td>". $log['views']. "</td>";
//echo "<td><a href=\"https://rynantech.com/partner-login/mssc/VJET/$log[link]\" onclick=\"khoa();\">$log[link]</a></td>";

echo "</tr>";
}
?>

</table>
</div>


     
<div id="IOJ200-photos" class="tabcontent">
<table id="tracelog1" width="909" border="0" align="center">
<?php

//echo  @mysql_num_rows( $sql_query ); die();
$logs = @mysql_query("SELECT * from mssc where printers like 'IOJ200' and type like 'photos' order by timecreate desc");
while($log = mysql_fetch_array( $logs )){
// Bo gio - chi lay ngay
$date = $log['timecreate'];
$createDate = date('Y-m-d', strtotime($date));

echo "<tr>";
echo "<th>". $log['filename']. "</th>";
echo "<th>". $log['type']. "</th>";
echo "<th><a href=\"https://rynantech.com/partner-login/msscclick.php?id=".$log['id']."\"><img src='https://rynantech.com/partner-login/sites/images/dl.png".$row['image_name']."'></a></th>";
echo "<th>". $log['notes']. "</th>";
echo "<th>". $createDate. "</th>";
//echo "<td>". $log['id']. "</td>";
//echo "<td>". $log['printers']. "</td>";
//echo "<td>". $log['link']. "</td>";
//echo "<td>". $log['lastupdate']. "</td>";
//echo "<td>". $log['views']. "</td>";
//echo "<td><a href=\"https://rynantech.com/partner-login/mssc/VJET/$log[link]\" onclick=\"khoa();\">$log[link]</a></td>";

echo "</tr>";
}
?>

</table>
</div>


<div id="InkFeeder8-photos" class="tabcontent">
<table id="tracelog1" width="909" border="0" align="center">
<?php

//echo  @mysql_num_rows( $sql_query ); die();
$logs = @mysql_query("SELECT * from mssc where printers like 'InkFeeder8' and type like 'photos' order by timecreate desc");
while($log = mysql_fetch_array( $logs )){
// Bo gio - chi lay ngay
$date = $log['timecreate'];
$createDate = date('Y-m-d', strtotime($date));

echo "<tr>";
echo "<th>". $log['filename']. "</th>";
echo "<th>". $log['type']. "</th>";
echo "<th><a href=\"https://rynantech.com/partner-login/msscclick.php?id=".$log['id']."\"><img src='https://rynantech.com/partner-login/sites/images/dl.png".$row['image_name']."'></a></th>";
echo "<th>". $log['notes']. "</th>";
echo "<th>". $createDate. "</th>";
//echo "<td>". $log['id']. "</td>";
//echo "<td>". $log['printers']. "</td>";
//echo "<td>". $log['link']. "</td>";
//echo "<td>". $log['lastupdate']. "</td>";
//echo "<td>". $log['views']. "</td>";
//echo "<td><a href=\"https://rynantech.com/partner-login/mssc/VJET/$log[link]\" onclick=\"khoa();\">$log[link]</a></td>";

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
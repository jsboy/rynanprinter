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

<script src="https://www.google.com/jsapi" type="text/javascript"></script>
   <meta name="keywords" content="Vjetstore.com, Vjet1000 Printers, Hydrajet, Solujet, Mylan Group, CTP Plates, A reliable and WIFI connected compact size inkjet printer and inks for packaging pringtings with the lowest price on the market">
    <meta name="description" content="Vjetstore.com, Vjet1000 Printers, Hydrajet, Solujet, Mylan Group, CTP Plates, A reliable and WIFI connected compact size inkjet printer and inks for packaging pringtings with the lowest price on the market">

<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
<title>HISTORY LOG </title>
   
	<link href="https://rynantech.com/wp-content/themes/solid-v2-wp/favicon.ico" rel="shortcut icon" type="image/x-icon" />
    <link type="text/css" rel="stylesheet" href="./sites/css/style.css" />
    <link type="text/css" rel="stylesheet" href="./sites/css/login.css" />

    <link href="./sites/css/vjet.css" rel="stylesheet" type="text/css" />


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

<script type="text/javascript">
function detect_city($ip) {
  $details =  json_decode(file_get_contents("https://ipinfo.io/{$ip}"));
  if(!$details->city) return "UNKNOWN";
  return "{$details->city}, {$details->region}";
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
		<div><p align="justify" class="mem_acc">&nbsp;&nbsp;&nbsp;&nbsp;Log History</p></div>
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


<div class="onecolumn">
    <div class="header">
        <span>Log History</span>

</div>

<table id="tracelog1" width="909" border="1" align="center">
<tr>
<th id="tracelog">Username</th>
<th id="tracelog">IP Address</th> 
<th id="tracelog">Date Login</th>
<th id="tracelog">Delete</th>
</tr>

<?php
//echo  @mysql_num_rows( $sql_query ); die();
$logs = @mysql_query("SELECT * from tblog order by timelogin desc");
while($log = mysql_fetch_array( $logs )){
echo "<tr>";
echo "<td>". $log['username']. "</td>";
//echo "<td>". $log['ip']. "</td>";
//echo "<td><a href=\"http://ipinfo.io/$log[ip]\">$log[ip]  <IMG SRC=\"http://api.hostip.info/flag.php?ip=$log[ip]\height=\"10\" width=\"24\" \"></a></td>";
//echo "<td><a href=\"http://ip-api.com/$log[ip]\">$log[ip]  <IMG SRC=\"http://api.hostip.info/flag.php?ip=$log[ip]\height=\"10\" width=\"24\" \"></a></td>";
echo "<td><a href=\"http://www.infosniper.net/index.php?ip_address=$log[ip]\">$log[ip]  <IMG SRC=\"http://api.hostip.info/flag.php?ip=$log[ip]\height=\"10\" width=\"24\" \"></a></td>";
//echo "<td><a href=\"http://www.infosniper.net/index.php?ip_address=$log[ip]\">$log[ip]  <IMG SRC=\"http://www.watsmyip.net/api-flag.aspx?ip=$log[ip]\" width=\"24px\" height=\"10px\"></a></td>";
echo "<td>". $log['timelogin']. "</td>";
// code Delete co popup onclick=\"return makesure();\"
echo "<td><a href=\"deletehis.php?id=$log[id]\" onclick=\"return makesure();\"><img src='https://rynantech.com/partner-login/sites/images/delete.png".$row['image_name']."'></a></td>";
echo "</tr>";

}
?>
</table>

<!-- code popup
 <a href="index.php" onclick="return makesure();">Go There</a>
-->
</div>
<p align="justify" style="line-height: 16px; margin: 8px 22px">


</p>

<!-- danh cho admin
<?php

if ($member['admin']=="1") {
?>

-->


<p align="justify" style="line-height: 16px; margin: 8px 22px">


</p>
<?php
}
else {}
?>
<p align="justify" style="line-height: 16px; margin: 8px 22px">


</p>


 <tr>
    <td><table border="0" cellpadding="0" cellspacing="0" width="980">
      <tbody><tr>
        <td bgcolor="#bababa" height="1"></td>
      </tr>


 
  <tr>
    <td class="bottom" align="center" height="28">
<strong>&reg; 2014 RYNAN TECHNOLOGIES PTE. LTD. </strong>
  </tr>
</tbody></table>
</div>
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
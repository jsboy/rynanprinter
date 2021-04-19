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
<meta name="description" content="RYNAN Technologies Pte Ltd, rynantech.com, QR code track &amp; trace, variable data, Alphanumeric, logos, date/time, expiry date, Julian date, shift code, counter/lot box code, multiple types of variable barcodes, and database,
Thermal Inkjet Inks, Thermal Inkjet Coder, R1010 Thermal Inkjet Coder, B1040 Thermal Inkjet Coder, B1040H Thermal Inkjet Coder, B1040He Thermal Inkjet Coder, 1200 Thermal Inkjet Coder, 1200e Thermal Inkjet Coder, 1200EG Thermal Inkjet Coder, R2172C Piezo Inkjet Printers, Hybrid Printer, HybridJET 35 digital printing, HybridJET 65 Lottery ticket application, Internet of Jet Printer, IOJ100, IOJ200, Multi Printer control software, Solvent ink for semi and non-porous media, SoluJET">

<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
<title>LIST PARTNERS </title>
	<link href="http://rynantech.com/wp-content/themes/solid-v2-wp/favicon.ico" rel="shortcut icon" type="image/x-icon" />
    <link type="text/css" rel="stylesheet" href="./sites/css/style.css" />
    <link type="text/css" rel="stylesheet" href="./sites/css/login.css" />

<link href="./sites/css/vjet.css" rel="stylesheet" type="text/css">


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
		<div><p align="justify" class="mem_acc">&nbsp;&nbsp;&nbsp;&nbsp;List Partners</p></div>
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


<div id="lastupdated">Last Updated: <?php

$logs = @mysql_query("SELECT * from members order by timeregister desc LIMIT 1");


while($log = mysql_fetch_array( $logs )){

echo "<td>". $log['timeregister']. "</td>";

    
echo "</tr>";
}
?>
</div>


<div class="onecolumn">
    <div class="header">
        <span>List Partners</span>

<div style="margin: 5px 0px 0px 720px">
<a href="/partner-login/exportlistpartnerrynantech.php" class="hrlink"> <img src="sites/images/exportexcel2.png" border="0" width="30" height="29" /></a></div>
<div style="margin:-30px 0px 0px 765px">
<a href="/partner-login/mylan.php" class="hrlink"> <img src="sites/images/createpartner.png" border="0" /></a></div>
</div>

<table id="tracelog1" width="909" border="0" align="center">
<tr>
<!-- <th id="tracelog">No.</th> -->
<th id="tracelog">Fullname</th>
<th id="tracelog">Company</th>
<th id="tracelog">Address</th>
<th id="tracelog">Username</th> 
<!-- <th id="tracelog">Password</th> 
<th id="tracelog">Email</th>
<th id="tracelog">Birthday</th>
<th id="tracelog">Admin</th> -->
<th id="tracelog">Role</th>
<!-- <th id="tracelog">Role2</th> -->
<!--<th id="tracelog">Date Register</th><!-- 
<th id="tracelog">Lastvisit Date</th> --><!-- 
<th id="tracelog">Last Update</th> -->
<th id="tracelog">Edit</th>
<!-- <th id="tracelog">More</th> -->
<th id="tracelog">Delete</th>
</tr>

<?php
//echo  @mysql_num_rows( $sql_query ); die();
$logs = @mysql_query("SELECT * from members order by timeregister desc");
while($log = mysql_fetch_array( $logs )){
echo "<tr>";
//echo "<th>". $log['id']. "</th>";
echo "<th>". $log['fullname']. "</th>";
echo "<th>". $log['company']. "</th>";
echo "<th>". $log['address']. "</th>";
echo "<th>". $log['user']. "</th>";
//echo "<th>". $log['pass']. "</th>";
//echo "<th>". $log['email']. "</th>";
//echo "<th>". $log['birthday']. "</th>";
//echo "<th>". $log['admin']. "</th>";
echo "<th>". $log['role']. "</th>";
//echo "<th>". $log['role2']. "</th>";
//echo "<th>". $log['timeregister']. "</th>";
//echo "<th>". $log['lastvisitDate']. "</th>";
//echo "<th>". $log['lastupdate']. "</th>";
echo "<th><a href=\"editlistpartner.php?id=$log[id]\"><img src='http://www.rynantech.com/partner-login/sites/images/edit.png".$row['image_name']."'></a></th>";

echo "<th><a href=\"delete.php?id=$log[id]\" onclick=\"return makesure();\"><img src='http://www.rynantech.com/partner-login/sites/images/delete.png".$row['image_name']."'></a></th>";


    
//echo "<td>". $log['urls']. "</td>";

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
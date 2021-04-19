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


//code kiem tra user dang nhap moi dc vao xem 
//	if  ( $_SESSION['user_id'] ) 

//code kiem tra user co phai la admin ko 
//	if  ( $_SESSION['user_id'] =="1" ) 


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
   <meta name="keywords" content="Vjetstore.com, Vjet1000 Printers, Hydrajet, Solujet, Mylan Group, CTP Plates, A reliable and WIFI connected compact size inkjet printer and inks for packaging pringtings with the lowest price on the market">
    <meta name="description" content="Vjetstore.com, Vjet1000 Printers, Hydrajet, Solujet, Mylan Group, CTP Plates, A reliable and WIFI connected compact size inkjet printer and inks for packaging pringtings with the lowest price on the market">

<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
<title>ORDERS LIST  </title>
	<link href="http://rynantech.com/wp-content/themes/solid-v2-wp/favicon.ico" rel="shortcut icon" type="image/x-icon" />
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


</head>

<body  >


<?php
include("header.html");
?>
	<div id="partnerhomeinfo">

        <div id="wrap">
            <div id="container-home">
                <div class="container-row">

  <tr>
    <td><table border="0" cellpadding="0" cellspacing="0" width="980">
     <img src="../images/line.png" border="0"></img>
<tr>

    	

<table align="center" id="Table_01" width="800"  border="0" cellpadding="0" cellspacing="0" >

<table border="0" cellpadding="0" cellspacing="0" width="981"  >
	<tr>
		<td bgcolor="#7bc545" class="white">
		<div><p align="justify" class="mem_acc">&nbsp;&nbsp;&nbsp;&nbsp;All Orders History</p></div>
		<div><p class="welcomeuser"><a href="info.php" class="hrlink"><font size="44" color="#fff" class="rightpn">Welcome <?=$_SESSION['fullname'];?></font></a>&nbsp;<a href="logout.php"><font color="red">[Logout]</font></a></div>
		</td>
	</tr>
</table>


	<div><p class="backtoindex"><a href="/partner" class="hrlink"><font size="12" color="#fff" class="rightpnhome">Back to index</p></font></a></div>

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

Today:
<?php

echo date('D Y-m-d H:i:s');

?> 

<?php

if ($member['admin']=="1")


{
?>

	<div><p class="createpartner"><font size="12" color="#fff" class="rightpnhomelistorders">
 <SCRIPT LANGUAGE="JavaScript"> 
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


</script></p></font></div>


<?php
}
else {}
?>




<p align="justify" style="line-height: 16px; margin: 8px 22px">

<table id="tracelog" width="909" border="1" align="center">
<tr>
<th id="tracelog">orderdetailsid</th>
<th id="tracelog">Orderdate</th>
<th id="tracelog">Date edit</th>
<th id="tracelog">Fullname</th>
<th id="tracelog">User</th>
<th id="tracelog">Product Name</th>
<th id="tracelog">Quantity</th>
<th id="tracelog">Price</th> 
<th id="tracelog">Total</th>
<th id="tracelog">Edit</th>
<th id="tracelog">Delete</th>
</tr>

<?php
//echo  @mysql_num_rows( $sql_query ); die();
$logs = @mysql_query("

SELECT *
    FROM orderdetails
    JOIN members ON orderdetails.memberid = members.id order by dateorder desc

");
while($log = mysql_fetch_array( $logs )){
echo "<tr>";
echo "<td>". $log['orderdetailsid']. "</td>";
echo "<td>". $log['dateorder']. "</td>";
echo "<td>". $log['dateedit']. "</td>";
echo "<td>". $log['fullname']. "</td>";
echo "<td>". $log['user']. "</td>";
echo "<td>". $log['productname']. "</td>";
echo "<td>". $log['quantity']. "</td>";
echo "<td>". $log['price']. "</td>";
echo "<td>". $log['total']. "</td>";
echo "<td><a href=\"editlistorders.php?id=$log[orderdetailsid]\">Edit</a></td>";
echo "<td><a href=\"deleteorders.php?id=$log[orderdetailsid]\" onclick=\"return makesure();\">Delete</a></td>";
//echo ("<td><a href=\"deleted.php?id=$log[orderdetailsid]\">Delete</a></td></tr>");
    
//echo "<td>". $log['urls']. "</td>";

echo "</tr>";
}
?>
</table>


</p>
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
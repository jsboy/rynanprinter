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
	$ip =  $_SERVER['REMOTE_ADDR']; 
	$local =  $_SERVER['PHP_SELF']; 
//kiem tra role phai la admin ko thi moi duoc vao trang nay
	if ( $_SESSION['user_id'] )
{
    $user_id = intval($_SESSION['user_id']);
    $sql_query = @mysql_query("SELECT * FROM members WHERE id='{$user_id}'");
    $member = @mysql_fetch_array( $sql_query );
?>




<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-137998451-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-137998451-1');
</script>
	<link href="https://rynantech.com/partner-login/images/favicon.png" rel="shortcut icon" type="image/x-icon" />
<meta id="MetaKeywords" name="KEYWORDS" content="RYNAN Technologies Pte Ltd, rynantech.com, QR code track &amp; trace, variable data, Alphanumeric, logos, date/time, expiry date, Julian date, shift code, counter/lot box code, multiple types of variable barcodes, and database,
Thermal Inkjet Inks, Thermal Inkjet Coder, R1010 Thermal Inkjet Coder, B1040 Thermal Inkjet Coder, B1040H Thermal Inkjet Coder, B1040He Thermal Inkjet Coder, 1200 Thermal Inkjet Coder, 1200e Thermal Inkjet Coder, 1200EG Thermal Inkjet Coder, R2172C Piezo Inkjet Printers, Hybrid Printer, HybridJET 35 digital printing, HybridJET 65 Lottery ticket application, Internet of Jet Printer, IOJ100, IOJ200, Multi Printer control software, Solvent ink for semi and non-porous media, SoluJET">
<meta name="description" content="RYNAN Technologies Pte Ltd, rynantech.com, QR code track &amp; trace, variable data, Alphanumeric, logos, date/time, expiry date, Julian date, shift code, counter/lot box code, multiple types of variable barcodes, and database,
Thermal Inkjet Inks, Thermal Inkjet Coder, R1010 Thermal Inkjet Coder, B1040 Thermal Inkjet Coder, B1040H Thermal Inkjet Coder, B1040He Thermal Inkjet Coder, 1200 Thermal Inkjet Coder, 1200e Thermal Inkjet Coder, 1200EG Thermal Inkjet Coder, R2172C Piezo Inkjet Printers, Hybrid Printer, HybridJET 35 digital printing, HybridJET 65 Lottery ticket application, Internet of Jet Printer, IOJ100, IOJ200, Multi Printer control software, Solvent ink for semi and non-porous media, SoluJET">

<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
<title>HOMEPAGE DOWNLOAD</title>

  <link type="text/css" rel="stylesheet" href="./sites/css/style.css" />
    <link type="text/css" rel="stylesheet" href="./sites/css/vjet.css" />



  <script src='./sites/js/tab.js'></script>



<style>

.latestnews {
font-size: 24px;
line-height: 36px;
font-weight: bold;
margin: -20px -30px 30px;
padding: 0 30px 10px;
border-bottom: 1px solid #ccc;
text-align: center;
color: #7bc545;
}

.terms {
margin: 30px auto;
width: 700px;
padding: 30px 30px 10px;
border: 1px solid #ccc;
-webkit-border-radius: 10px;
-moz-border-radius: 10px;
border-radius: 10px;
}

h1 {
font-size: 24px;
line-height: 36px;
font-weight: bold;
margin: -20px -30px 30px;
padding: 0 30px 10px;
border-bottom: 1px solid #ccc;
text-align: center;
}

.agree
{
margin: 0px -30px 30px;
text-align: center;
}


</style>



</head>

<body  ><?php
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
		<div><p align="justify" class="mem_acc">&nbsp;&nbsp;&nbsp;&nbsp;Partner Account</p></div>
			<div><p class="welcomeuser"><a href="info.php" class="hrlink"><font size="12" color="#fff" class="rightpn">Welcome <?=$_SESSION['fullname'];?></font></a>&nbsp;<a href="logout.php"><font color="red">[Logout]</font></a></div>

	</td>
	</tr>
</table>

 

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

Today:

<?php

echo date('D Y-m-d H:i:s');

?> 

<?php


require ("./db_config.php");

$tg=time();
$tgout=900;
$tgnew=$tg - $tgout;


$sql="insert into useronline(tgtmp,ip,local) values('$tg','$ip','$local')";
$query=mysql_query($sql);
$sql="delete from useronline where tgtmp < $tgnew";
$query=mysql_query($sql);
$sql="SELECT DISTINCT ip FROM useronline WHERE local='$local'";
$query=mysql_query($sql);
$user = mysql_num_rows($query);

echo "&nbsp;&nbsp;&nbsp;&nbsp;User online: $user";
?>


<!-- 
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
Last login:  <?=$member['lastvisitDate'];?> -->


&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
 <!-- <?php 
 if(isset($_COOKIE['AboutVisit']))
 { 
 $last = $_COOKIE['AboutVisit']; 
 echo "Welcome back! You last visited on ". $last; 
 } 
 else 
 { 
 echo "Welcome to our site!"; 
 } 
 ?> -->

<!--  <?php 
 if(isset($_COOKIE['AboutVisit'])) 
 { 
 $last = $_COOKIE['AboutVisit']; } 
$Month = 2592000 + time();
 //this adds one year to the current time, for the cookie expiration 

 if (isset ($last)) 
 { 
 $change = time () - $last; 
 if ( $change > 86400) 
 { 
 echo "Welcome back!  You last visited on ". date("D Y-m-d H:i:s",$last) ; 
 // Tells the user when they last visited if it was over a day ago 
 } 
 else 
 { 
  echo "Welcome back! You last visited on ". date("D Y-m-d H:i:s",$last) ; 

//echo "Thanks for using our site!"; 
 //Gives the user a message if they are visiting again in the same day 
 } 
 } 
 else 
 { 
 echo "Welcome to our site!"; 
 //Greets a first time user 
 } 
 ?>   -->


<!-- Script by hscripts.com -->
<!-- Copyright of HIOXINDIA -->
<!-- More scripts @www.hscripts.com -->

<script type="text/javascript">



function setCookie(c_name,value,expiredays)
{
   var exdate=new Date();
   exdate.setDate(exdate.getDate()+expiredays);
   document.cookie=c_name+ "=" +escape(value)+
    ((expiredays==null) ? "" : ";expires="+exdate.toGMTString());
   var x = document.cookie(username);
   alert("sfs"); 
   document.write(x);
}
function getCookie(c_name)
{
  if (document.cookie.length>0)
  {
    c_start=document.cookie.indexOf(c_name + "=");
    if (c_start!=-1)
    {
       c_start=c_start + c_name.length+1;
       c_end=document.cookie.indexOf(";",c_start);
       if (c_end==-1) c_end=document.cookie.length;
           return unescape(document.cookie.substring(c_start,c_end));
    }
  }
  return "";
}
function setCookie(c_name,value,expiredays)
{
   var exdate=new Date();
   exdate.setDate(exdate.getDate()+expiredays);
   document.cookie=c_name+ "=" +escape(value)+
    ((expiredays==null) ? "" : ";expires="+exdate.toGMTString());
   var x = document.cookie(username);
   alert("sfs"); 
   document.write(x);
}
function showmessage ()
{
  var days=421;
  nextvisitmsg="Welcome back! You last visited on <b>[displaydate]</b>";
  var dat=new Date();
  if(getCookie("visit")==""){
    setCookie("visit", dat, days);
  document.write("you are visting this website for the first time ");
  }
  else
  {
    var p=getCookie("visit");
    var pp=Date.parse(p);
    var now = new Date();
    now.setTime(pp);
    var day = new Array("Sun", "Mon", "Tues", "Wed", "Thur", "Fri", "Sat");
    var month = new Array ("Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec");
    var nd = now.getDate();
    var ny = now.getDay();
    ny = day[ny];
    var nm = now.getMonth();
    nm = month[nm];
    yy = now.getFullYear();
    var hh = now.getHours();
    var ampm = "AM";
    if (hh >= 12) {ampm = "PM"}
      var mins = now.getMinutes();
      var secs = now.getSeconds();
      var dispDate = ny + ", " + nm + " " + nd + ", " + yy + " " + hh + ":" + mins + ":" + secs + " " + ampm;
      document.write(nextvisitmsg.replace("\[displaydate\]", dispDate))
   }
   setCookie("visit", dat, days);
}
document.onload = showmessage();

</script>


<!-- 

<div id="menulist">
     <img src="sites/images/menulist.png" border="0" />
</div>


<div id="centerpnmap">


     <img src="sites/images/partnersmap.png" border="0" />

<div id="centerpnnews">

<div id="terms">
        <h1>LATEST NEWS</h1>

       

<?php
$logs = @mysql_query("SELECT * from news order by date desc");
while($log = mysql_fetch_array( $logs )){
echo "<tr>";
echo "<td>". $log['date']. "</td><br>";
echo "<td><b>". $log['title']. "</b></td><br>";
echo "<td>". $log['contents']. "</td><br><br><br>";
echo "</tr>";
}
?>
</div>
</div>
</div>

-->




<?php

if ($member['role3']=="")

{
?>



<!-- MENU LIST -->
<div class="onecolumntitle">
<div class="header">
      <span>MENU LIST</span>
</div></div>
<div class="tab">
  <button class="tablinks" onclick="openCity(event, 'NEWS')">NEWS</button>
  <button class="tablinks" onclick="openCity(event, 'DOWNLOAD')">DOWNLOAD</button>
<?php
if ($member['role']=="Admin") {
?>

  <button class="tablinks" onclick="openCity(event, 'ADMINISTRATOR')">ADMINISTRATOR</button>
<?php
}
else {}
?>


  <button class="tablinks" onclick="openCity(event, 'INFORMATION')">INFORMATION</button>
<!--  <button class="tablinks" onclick="openCity(event, 'ORDER')">ORDER</button> -->
</div>

<div id="NEWS" class="tabcontent" style="display: block;" >
<div class="terms">
        
	<div class="latestnews">LATEST NEWS</div>

<?php
$logs = @mysql_query("SELECT * from news order by date desc");
while($log = mysql_fetch_array( $logs )){
//echo "<tr>";
echo "<td>". $log['date']. "</td>&nbsp;-&nbsp;";
echo "<td><b>". $log['title']. "</b></td><br>";
echo "<td>". $log['contents']. "</td>";
//echo "</tr>";
}
?>

</table>
</div>
</div>





<div id="DOWNLOAD" class="tabcontent" >
<table id="tracelog1" width="909" border="0" align="center">


<!-- 
<?php

if ($member['role2']=="download") {
?>
<p align="justify" style="line-height: 16px; margin: 8px 22px;" >
<a href="downloaddl.php">DOWNLOAD</a></p>
<?php
}
else {}
?>



<?php

if ($member['role']=="Admin") {
?>
<p align="justify" style="line-height: 16px; margin: 8px 22px;" >
<a href="downloadcp.php">CREATE DOWNLOAD</a></p>
<?php
}
else {}
?>
 -->


<!-- ADMIN LIST -->

<?php

if ($member['role']=="Admin") {
?>
<p align="justify" style="line-height: 16px; margin: 8px 22px">
<a href="rynanindiacp.php">RYNAN INDIA</a></p>
<?php
}
else {}
?>



<?php

if ($member['role']=="Admin") {
?>
<p align="justify" style="line-height: 16px; margin: 8px 22px">
<a href="mssccp.php">MSSC</a></p>
<?php
}
else {}
?>



<?php

if ($member['role']=="Admin") {
?>
<p align="justify" style="line-height: 16px; margin: 8px 22px">
<a href="cyklopcp.php">CYKLOP</a></p>
<?php
}
else {}
?>



<?php

if ($member['role']=="Admin") {
?>
<p align="justify" style="line-height: 16px; margin: 8px 22px">
<a href="iccgroupcp.php">ICC GROUP</a></p>
<?php
}
else {}
?>



<?php

if ($member['role']=="Admin") {
?>
<p align="justify" style="line-height: 16px; margin: 8px 22px">
<a href="alecp.php">ALE GROUP</a></p>
<?php
}
else {}
?>




<?php

if ($member['role']=="Admin") {
?>
<p align="justify" style="line-height: 16px; margin: 8px 22px">
<a href="solmarkcp.php">SOLMARK GROUP</a></p>
<?php
}
else {}
?>




<?php

if ($member['role']=="Admin") {
?>
<p align="justify" style="line-height: 16px; margin: 8px 22px">
<a href="wisebizcp.php">WISEBIZ GROUP</a></p>
<?php
}
else {}
?>



<?php

if ($member['role']=="Admin") {
?>
<p align="justify" style="line-height: 16px; margin: 8px 22px">
<a href="mylanacp.php">MYLAN A</a></p>
<?php
}
else {}
?>

<?php

if ($member['role']=="Admin") {
?>
<p align="justify" style="line-height: 16px; margin: 8px 22px">
<a href="mylanbcp.php">MYLAN B</a></p>
<?php
}
else {}
?>


<?php

if ($member['role']=="Admin") {
?>
<p align="justify" style="line-height: 16px; margin: 8px 22px">
<a href="rynanacp.php">RYNAN A</a></p>
<?php
}
else {}
?>

<?php

if ($member['role']=="Admin") {
?>
<p align="justify" style="line-height: 16px; margin: 8px 22px">
<a href="rynanbcp.php">RYNAN B</a></p>
<?php
}
else {}
?>

<?php

if ($member['role']=="Admin") {
?>
<p align="justify" style="line-height: 16px; margin: 8px 22px">
<a href="rynanccp.php">RYNAN C</a></p>
<?php
}
else {}
?>

<?php

if ($member['role']=="Admin") {
?>
<p align="justify" style="line-height: 16px; margin: 8px 22px">
<a href="hitachicp.php">HITACHI</a></p>
<?php
}
else {}
?>



<!-- REMOVED
<?php

if ($member['role']=="Admin") {
?>
<p align="justify" style="line-height: 16px; margin: 8px 22px">
<a href="uifatcp.php">UIFAT </a></p>
<?php
}
else {}
?>
 -->


<?php

if ($member['role']=="Admin") {
?>
<p align="justify" style="line-height: 16px; margin: 8px 22px">
<a href="citronixcp.php">CITRONIX</a></p>
<?php
}
else {}
?>




<!-- USER LIST -->

<?php

if ($member['role']=="rynanindia")


{
?>
<p align="justify" style="line-height: 16px; margin: 8px 22px">
<a href="rynanindiadl.php">DOWNLOAD</a></p>

<?php
}
else {}
?>

<?php

if ($member['role']=="mssc")


{
?>
<p align="justify" style="line-height: 16px; margin: 8px 22px">
<a href="msscdl.php">DOWNLOAD</a></p>

<?php
}
else {}
?>


<!-- iccgroup -->

<?php

if ($member['role']=="iccgroup")


{
?>
<p align="justify" style="line-height: 16px; margin: 8px 22px">
<a href="iccgroupdl.php">DOWNLOAD</a></p>

<?php
}
else {}
?>

<!-- cyklop -->


<?php

if ($member['role']=="cyklop")


{
?>
<p align="justify" style="line-height: 16px; margin: 8px 22px">
<a href="cyklopdl.php">DOWNLOAD</a></p>

<?php
}
else {}
?>


<!-- aledl -->

<?php

if ($member['role']=="ale") {
?>
<p align="justify" style="line-height: 16px; margin: 8px 22px">
<a href="aledl.php">DOWNLOAD</a></p>
<?php
}
else {}
?>



<!-- solmarkdl -->

<?php

if ($member['role']=="solmark") {
?>
<p align="justify" style="line-height: 16px; margin: 8px 22px">
<a href="solmarkdl.php">DOWNLOAD</a></p>
<?php
}
else {}
?>



<!-- wisebizdl -->

<?php

if ($member['role']=="wisebiz") {
?>
<p align="justify" style="line-height: 16px; margin: 8px 22px">
<a href="wisebizdl.php">DOWNLOAD</a></p>
<?php
}
else {}
?>


<!-- mylanadl -->


<?php

if ($member['role']=="mylana") {
?>
<p align="justify" style="line-height: 16px; margin: 8px 22px">
<a href="mylanadl.php">DOWNLOAD</a></p>
<?php
}
else {}
?>
 


<!-- mylanbdl -->


<?php

if ($member['role']=="mylanb") {
?>
<p align="justify" style="line-height: 16px; margin: 8px 22px">
<a href="mylanbdl.php">DOWNLOAD</a></p>
<?php
}
else {}
?>
 


<!-- rynana -->

<?php

if ($member['role']=="rynana")


{
?>
<p align="justify" style="line-height: 16px; margin: 8px 22px">
<a href="rynanadl.php">DOWNLOAD</a></p>

<?php
}
else {}
?>


<!-- rynanb -->


<?php

if ($member['role']=="rynanb")


{
?>
<p align="justify" style="line-height: 16px; margin: 8px 22px">
<a href="rynanbdl.php">DOWNLOAD</a></p>

<?php
}
else {}
?>


<!-- rynanc -->


<?php

if ($member['role']=="rynanc")


{
?>
<p align="justify" style="line-height: 16px; margin: 8px 22px">
<a href="rynancdl.php">DOWNLOAD</a></p>

<?php
}
else {}
?>

<!-- hitachi -->


<?php

if ($member['role']=="hitachi")


{
?>
<p align="justify" style="line-height: 16px; margin: 8px 22px">
<a href="hitachidl.php">DOWNLOAD</a></p>

<?php
}
else {}
?>



<!-- uifat 


<?php

if ($member['role']=="uifat")


{
?>
<p align="justify" style="line-height: 16px; margin: 8px 22px">
<a href="uifatdl.php">DOWNLOAD</a></p>

<?php
}
else {}
?>
-->



<!-- citronix -->


<?php

if ($member['role']=="citronix")


{
?>
<p align="justify" style="line-height: 16px; margin: 8px 22px">
<a href="citronixdl.php">DOWNLOAD</a></p>

<?php
}
else {}
?>





</table>
</div>






<div id="ADMINISTRATOR" class="tabcontent" >
<table id="tracelog1" width="909" border="0" align="center">

       

<?php
}
else {}
?>



<?php

if ($member['admin']=="1")


{
?>
<p align="justify" style="line-height: 16px; margin: 8px 22px">
<a href="cpnews.php">RYNAN News </a></p>

<?php
}
else {}
?>


<?php

if ($member['role']=="Admin") {
?>
<p align="justify" style="line-height: 16px; margin: 8px 22px">
<a href="listpartner.php">List Accounts</a></p>
<?php
}
else {}
?>

<?php

if ($member['role']=="Admin") {
?>
<p align="justify" style="line-height: 16px; margin: 8px 22px">
<a href="listcustomers.php">Import Leads</a></p>
<?php
}
else {}
?>



<!-- <?php

if ($member['role']=="Admin") {
?>
<p align="justify" style="line-height: 16px; margin: 8px 22px">
<a href="listorders.php">All Order History </a></p>
<?php
}
else {}
?>
 -->



<?php

if ($member['role']=="Admin") {
?>
<p align="justify" style="line-height: 16px; margin: 8px 22px">
<a href="historylog.php">Log History</a></p>
<?php
}
else {}
?>


</table>
</div>



<div id="INFORMATION" class="tabcontent">
<table id="tracelog1" width="909" border="0" align="center">

       
			<p align="justify" style="margin: 12px 22px; line-height:16px;">Fullname:  <?=$member['fullname'];?></p>
			<p align="justify" style="margin: 12px 22px; line-height:16px">Company:  <?=$member['company'];?></p>
		<!-- 	<p align="justify" style="margin: 12px 22px; line-height:16px">Role:  <?=$member['role'];?></p> -->
			<p align="justify" style="margin: 12px 22px; line-height:16px">Address:  <?=$member['address'];?></p>
			<p align="justify" style="margin: 12px 22px; line-height:16px">Username:  <?=$member['user'];?></p>
			<p align="justify" style="margin: 12px 22px; line-height:16px">Password:  <?=$member['pass'];?></p>
			<p align="justify" style="margin: 12px 22px; line-height:16px">Email:  <?=$member['email'];?></p><!-- 
			<p align="justify" style="margin: 12px 22px; line-height:16px">Date of birth:  <?=$member['birthday'];?></p> -->
			<p align="justify" style="margin: 12px 22px; line-height:16px">Website:  <?=$member['urls'];?></p>
			<p align="justify" style="margin: 12px 22px; line-height:16px">Date of Created:  <?=$member['timeregister'];?></p>
			<p align="justify" style="margin: 12px 22px; line-height:16px">Last Login:  <?=$member['lastvisitDate'];?></p>
			<p align="justify" style="margin: 12px 22px; line-height:16px">Partner's Last Update:  <?=$member['lastupdate'];?></p>

        <span><a href="/partner-login/suathongtin.php">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;[UPDATE]</a> </span>

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
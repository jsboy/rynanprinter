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
   <meta name="keywords" content="rynantech.com, Vjet1000 Printers, Hydrajet, Solujet, Mylan Group, CTP Plates, A reliable and WIFI connected compact size inkjet printer and inks for packaging pringtings with the lowest price on the igtradinget">
    <meta name="description" content="rynantech.com, Vjet1000 Printers, Hydrajet, Solujet, Mylan Group, CTP Plates, A reliable and WIFI connected compact size inkjet printer and inks for packaging pringtings with the lowest price on the igtradinget">

<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
<title>LIST OF CUSTOMERS							
</title>	<link href="http://rynantech.com/wp-content/themes/solid-v2-wp/favicon.ico" rel="shortcut icon" type="image/x-icon" />
    <link type="text/css" rel="stylesheet" href="./sites/css/style.css" />
    <link type="text/css" rel="stylesheet" href="./sites/css/vjet.css" />




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
		<div><p align="justify" class="mem_acc">&nbsp;&nbsp;&nbsp;&nbsp;LIST OF CUSTOMERS							

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

<br>

		<div style="margin: 100px 22px 50px 190px">


		<a href="./cpleads.php">	<img src="sites/images/home/listofcustomers_04.png" width="190" height="207" alt="">
			<a href="./cpdistributors.php">	<img src="sites/images/home/listofcustomers_05.png" width="190" height="207" alt="">
			<a href="./cpendusers.php">	<img src="sites/images/home/listofcustomers_06.png" width="190" height="207" alt="">
</div>

</table>
</div></div></div></div></div>

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
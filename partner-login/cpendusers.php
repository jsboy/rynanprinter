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
<title>THE END USERS</title>

	<link href="http://rynantech.com/wp-content/themes/solid-v2-wp/favicon.ico" rel="shortcut icon" type="image/x-icon" />
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

  <tr>
    <td><table border="0" cellpadding="0" cellspacing="0" width="980">
     <img src="../images/line.png" border="0"></img>
<tr>

    	

<table align="center" id="Table_01" width="800"  border="0" cellpadding="0" cellspacing="0" >

<table border="0" cellpadding="0" cellspacing="0" width="981"  >
	<tr>
		<td bgcolor="#7bc545" class="white">
		<div><p align="justify" class="mem_acc">&nbsp;&nbsp;&nbsp;&nbsp;THE END USERS</p></div>
		<div><p class="welcomeuser"><a href="info.php" class="hrlink"><font size="44" color="#fff" class="rightpn">Welcome <?=$_SESSION['fullname'];?></font></a>&nbsp;<a href="logout.php"><font color="red">[Logout]</font></a></div>
		</td>
	</tr>
</table>


	<div><p class="backtoindex"><a href="/partner-login/listcustomers.php" class="hrlink"><font size="12" color="#fff" class="rightpnhome">Back to index</p></font></a></div>

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

Today:
<?php

echo date('D Y-m-d H:i:s');

?> 


<div id="lastupdated">Last Updated: <?php

$logs = @mysql_query("SELECT * from endusers order by timecreate desc LIMIT 1");


while($log = mysql_fetch_array( $logs )){

echo "<td>". $log['timecreate']. "</td>";

    
echo "</tr>";
}
?>
</div>
<div class="onecolumn">
    <div class="header">
        <span>THE END USERS</span>

  <div id="createnew"><a href="/partner-login/cpenduserscre.php" class="hrlink"> <img src="sites/images/createdownload.png" border="0" /></a></div>
</div>

<table id="tracelog1" width="909" border="1" align="center">
<tr>
<!-- <th id="tracelog">No.</th> -->
<th id="tracelog">Company</th>
<th id="tracelog">Country</th> 
<th id="tracelog">Classification</th>
<!-- <th id="tracelog">Address</th>  -->  
<th id="tracelog">Contact person</th>   
<!-- <th id="tracelog">Phone</th> -->   
<th id="tracelog">Email</th>   
<!--<th id="tracelog">Website</th> -->  
<th id="tracelog">Notes</th> 
<!--<th id="tracelog">Date Created</th>
 <th id="tracelog">Last Updated</th>  -->
<!-- <th id="tracelog">Password</th> -->
<th id="tracelog">Edit</th>
<th id="tracelog">Delete</th>
</tr>
<!-- <?php

require ("./db_config.php");
$sql = "SELECT * FROM download ORDER BY id DESC";

$result = mysql_query($sql);
while($row = mysql_fetch_array($result))
{
$link=$row['link'];
$id=$row['id'];
$views=$row['views'];

?>

<?php




echo "<b><a href='click.php?id=".$row['id']."'target='_blank'>$link</a></b>&nbsp;&nbsp;";



}

?> -->
<?php
//echo  @mysql_num_rows( $sql_query ); die();
//$logs = @mysql_query("SELECT * from endusers where printers like 'Others' order by timecreate desc");

$logs = @mysql_query("SELECT * from endusers order by timecreate desc");

while($log = mysql_fetch_array( $logs )){
echo "<tr>";
//echo "<td>". $log['id']. "</td>";
echo "<td>". $log['company']. "</td>";
echo "<td>". $log['country']. "</td>";
echo "<td>". $log['classification']. "</td>";
//echo "<td>". $log['address']. "</td>";
echo "<td>". $log['contact']. "</td>";
//echo "<td>". $log['phone']. "</td>";
echo "<td>". $log['email']. "</td>";
//echo "<td>". $log['website']. "</td>";
 
//echo "<td>". $log['link']. "</td>";
//echo "<td><a href=\"'click.php?id=".$row['id']."'\">$log[link]</a></td>";
//echo "<td><a href=\"http://rynantech.com/partner-login/cpendusersclick.php?id=".$log['id']."\"><img src='http://www.rynantech.com/partner-login/sites/images/dl.png".$row['image_name']."'></a></td>";

//echo "<td><a href=\"http://rynantech.com/partner-login/download/VJET/$log[link]\" onclick=\"khoa();\">$log[link]</a></td>";

//echo "<td><a href='click.php?id=".$row['id']."'target='_blank'>$link</a></b></td>&nbsp;&nbsp;";

echo "<td>". $log['notes']. "</td>";
//echo "<td>". $log['timecreate']. "</td>";
//echo "<td>". $log['lastupdate']. "</td>";
echo "<td><a href=\"cpendusersedit.php?id=$log[id]\"><img src='http://www.rynantech.com/partner-login/sites/images/edit.png".$row['image_name']."'></a></td>";
echo "<td><a href=\"cpendusersdel.php?id=$log[id]\" onclick=\"return makesure();\"><img src='http://www.rynantech.com/partner-login/sites/images/delete.png".$row['image_name']."'></a></td>";

    
//echo "<td>". $log['urls']. "</td>";

echo "</tr>";
}
?>
</table>
</div>

<br><br><br><br><br><br><br>
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
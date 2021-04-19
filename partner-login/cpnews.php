<?php

date_default_timezone_set('Asia/Bangkok');

session_start();

 //$_SESSION["FilePath"] = $_SERVER["SCRIPT_NAME"];//$_SERVER["PHP_SELF"];

//echo $_SESSION["FilePath"];



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
   <meta name="keywords" content="Vjetstore.com, Vjet1000 Printers, Hydrajet, Solujet, Mylan Group, CTP Plates, A reliable and WIFI connected compact size inkjet printer and inks for packaging pringtings with the lowest price on the market">
    <meta name="description" content="Vjetstore.com, Vjet1000 Printers, Hydrajet, Solujet, Mylan Group, CTP Plates, A reliable and WIFI connected compact size inkjet printer and inks for packaging pringtings with the lowest price on the market">

<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
<title>NEWS</title>
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



<table align="center" id="Table_01" width="800"  border="0" cellpadding="0" cellspacing="0" >

<table border="0" cellpadding="0" cellspacing="0" width="977"  >
	<tr>
		<td bgcolor="#7bc545" class="white">
		<div><p align="justify" class="mem_acc">&nbsp;&nbsp;&nbsp;&nbsp;partner-login Account</p></div>
			<div><p class="welcomeuser"><a href="info.php" class="hrlink"><font size="12" color="#fff" class="rightpn">Welcome <?=$_SESSION['fullname'];?></font></a>&nbsp;<a href="logout.php"><font color="red">[Logout]</font></a></div>

		</td>
	</tr>
</table>
	<div><p class="backtoindex"><a href="/partner-login" class="hrlink"><font size="12" color="#fff" class="rightpnhome">Back to index</p></font></a></div>


&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

Today:
<?php

echo date('D Y-m-d H:i:s');

?> 

 <!--
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

Last login 

-->

<?php

if ($member['admin']=="1")


{
?>


<?php
}
else {}
?>


<?php
//echo  @mysql_num_rows( $sql_query ); die();
$logs = @mysql_query("SELECT '{$timelog}' FROM tblog WHERE id='{$user_id}'");
while($log = mysql_fetch_array( $logs )){

echo "". $log['timelogin']. "";

}
?>





<div class="onecolumn">
    <div class="header">
        <span>Create News</span>

<div style="margin:10px 0px 0px 112px">
<a href="/partner-login/createnews.php" class="hrlink">&nbsp;-&nbsp;[CREATE]</a>

</div>
</div>
<?php
//echo  @mysql_num_rows( $sql_query ); die();
$logs = @mysql_query("SELECT * from news order by date desc");
while($log = mysql_fetch_array( $logs )){
echo "<tr>";
//echo "<td>". $log['id']. "</td>";
echo "<td>". $log['date']. "</td><br>";

echo "<td><b>". $log['title']. "</b></td><br>";
//echo "<td>". $log['contents']. "</td><br><br>---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
//<br><br>";
echo "<td>". $log['contents']. "</td><br>";

echo "<td><a href=\"editnews.php?id=$log[id]\">[EDIT]</a></td> - "; 
echo "<td><a href=\"deletenews.php?id=$log[id]\" onclick=\"return makesure();\">[DELETE]</a></td><br><br>";




//echo "<td>". $log['urls']. "</td>";

echo "</tr>";
}
?>
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
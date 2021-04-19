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


	if ( $_SESSION['user_id'] )
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
<title>NEWS FOR PARTNERS</title>
    <link type="text/css" rel="stylesheet" href="./sites/css/style.css" />
    <link type="text/css" rel="stylesheet" href="./sites/css/vjet.css" />

<style>

#terms {
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

<body  >

	<div id="partnerhomeinfo">

<?php
include("header.html");
?>

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
		<div><p align="justify" class="mem_acc">&nbsp;&nbsp;&nbsp;&nbsp;List News</p></div>
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


<?php
//echo  @mysql_num_rows( $sql_query ); die();
$logs = @mysql_query("SELECT '{$timelog}' FROM tblog WHERE id='{$user_id}'");
while($log = mysql_fetch_array( $logs )){

echo "". $log['timelogin']. "";

}
?>
-->




<div id="centerpnnews">
<!-- 	<p align="justify" style="margin: 12px 22px; margin-left: 400px;"><b><span style="font-size: 20px;">ANNOUNCEMENT</span></font></b></p>

 -->

<div id="terms">
        <h1>LATEST NEWS</h1>

       

<?php
//echo  @mysql_num_rows( $sql_query ); die();
$logs = @mysql_query("SELECT * from news order by date desc");
while($log = mysql_fetch_array( $logs )){
echo "<tr>";
//echo "<td>". $log['id']. "</td>";
echo "<td>". $log['date']. "</td><br>";

echo "<td><b>". $log['title']. "</b></td><br>";

echo "<td>". $log['contents']. "</td><br><br><br>";




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
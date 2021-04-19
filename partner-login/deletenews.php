
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>

<script src="http://www.google.com/jsapi" type="text/javascript"></script>
   <meta name="keywords" content="Vjetstore.com, Vjet1000 Printers, Hydrajet, Solujet, Mylan Group, CTP Plates, A reliable and WIFI connected compact size inkjet printer and inks for packaging pringtings with the lowest price on the market">
    <meta name="description" content="Vjetstore.com, Vjet1000 Printers, Hydrajet, Solujet, Mylan Group, CTP Plates, A reliable and WIFI connected compact size inkjet printer and inks for packaging pringtings with the lowest price on the market">

<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
<title>NEWS FOR PARTNERS </title>
	<link href="http://rynantech.com/wp-content/themes/solid-v2-wp/favicon.ico" rel="shortcut icon" type="image/x-icon" />
    <link type="text/css" rel="stylesheet" href="./sites/css/style.css" />
    <link type="text/css" rel="stylesheet" href="./sites/css/vjet.css" />

<script src="https://cdn.ckeditor.com/4.9.1/standard/ckeditor.js"></script>
	<script>
			CKEDITOR.replace( 'editor1' );
		</script>

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
		<div><p align="justify" class="mem_acc">&nbsp;&nbsp;&nbsp;&nbsp;Edit News</p></div>
			<div><p class="welcomeuser"><a href="info.php" class="hrlink"><font size="12" color="#fff" class="rightpn">Welcome <?=$_SESSION['fullname'];?></font></a>&nbsp;<a href="logout.php"><font color="red">[Logout]</font></a></div>

		</td>
	</tr>
</table>
	<div><p class="backtoindex"><a href="./cpnews.php" class="hrlink"><font size="12" color="#fff" class="rightpnhome">Back to index</p></font></a></div>




<br><br><br>
<font size="10" color="red" class="messagedel">

  <?php
     include "./db_config.php";

// get value of id that sent from address bar 
$id=$_GET['id'];

// Delete data in mysql from row that has this id 
$sql="DELETE FROM news WHERE id='$id'";
$result=mysql_query($sql);

// if successfully deleted
if($result){
echo "Deleted Successfully";
echo "<BR>";
//echo "<a href='/partner-login/cpnews.php'>Back to main page</a>";

echo "<meta http-equiv='refresh' content='0;url=/partner-login/cpnews.php'>";
}

else {
echo "ERROR";
}

      ?>

<?php
// close connection 
mysql_close();
?>


</font>
	
 <?php
include("footer.html");
?>
</body></html>


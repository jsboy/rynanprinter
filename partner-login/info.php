<?php
session_start();

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
<meta id="MetaKeywords" name="KEYWORDS" content="RYNAN Technologies Pte Ltd, rynantech.com, QR code track &amp; trace, variable data, Alphanumeric, logos, date/time, expiry date, Julian date, shift code, counter/lot box code, multiple types of variable barcodes, and database,
Thermal Inkjet Inks, Thermal Inkjet Coder, R1010 Thermal Inkjet Coder, B1040 Thermal Inkjet Coder, B1040H Thermal Inkjet Coder, B1040He Thermal Inkjet Coder, 1200 Thermal Inkjet Coder, 1200e Thermal Inkjet Coder, 1200EG Thermal Inkjet Coder, R2172C Piezo Inkjet Printers, Hybrid Printer, HybridJET 35 digital printing, HybridJET 65 Lottery ticket application, Internet of Jet Printer, IOJ100, IOJ200, Multi Printer control software, Solvent ink for semi and non-porous media, SoluJET">
<meta name="description" content="RYNAN Technologies Pte Ltd, rynantech.com, QR code track &amp; trace, variable data, Alphanumeric, logos, date/time, expiry date, Julian date, shift code, counter/lot box code, multiple types of variable barcodes, and database,
Thermal Inkjet Inks, Thermal Inkjet Coder, R1010 Thermal Inkjet Coder, B1040 Thermal Inkjet Coder, B1040H Thermal Inkjet Coder, B1040He Thermal Inkjet Coder, 1200 Thermal Inkjet Coder, 1200e Thermal Inkjet Coder, 1200EG Thermal Inkjet Coder, R2172C Piezo Inkjet Printers, Hybrid Printer, HybridJET 35 digital printing, HybridJET 65 Lottery ticket application, Internet of Jet Printer, IOJ100, IOJ200, Multi Printer control software, Solvent ink for semi and non-porous media, SoluJET">

<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
<title>New Account</title>


	<link href="https://rynantech.com/wp-content/themes/solid-v2-wp/favicon.ico" rel="shortcut icon" type="image/x-icon" />
    <link type="text/css" rel="stylesheet" href="./sites/css/style.css" />
    <link href="./sites/css/login.css" rel="stylesheet" type="text/css" />

<link href="./sites/css/vjet.css" rel="stylesheet" type="text/css">
</head>

<body  >


<?php
include("header.html");
?>

	<div id="partnerhome">


        <div id="wrap">
            <div id="container-home">
                <div class="container-row">

<table align="center" id="Table_01" width="800"  border="0" cellpadding="0" cellspacing="0" >

		<table border="0" cellpadding="0" cellspacing="0" width="977">
			<tr>
				<td bgcolor="#7bc545" class="white">
				<div><p align="justify" class="mem_acc">&nbsp;&nbsp;&nbsp;&nbsp;Account Information</p></div>
					<div><p class="welcomeuser"><a href="info.php" class="hrlink"><font size="44" color="#fff" class="rightpn">Welcome <?=$_SESSION['fullname'];?></font></a>&nbsp;<a href="logout.php"><font color="red">[Logout]</font></a></div>
			
			
				</td>
			</tr>
		
		</table>


	<div><p class="backtoindex"><a href="/partner-login" class="hrlink"><font size="12" color="#fff" class="rightpnhome">Back to index</p></font></a></div>


<div id="leftpninfo">
		
<div class="onecolumn">
    <div class="header">
        <span>Account Information<a href="http://rynantech.com/partner-login/suathongtin.php"> - [UPDATE]</a> </span>

</div>
		<!--	<p align="justify" style="margin: 12px 22px; line-height:16px">ID: [Hidden]</p>
			<p align="justify" style="margin: 12px 22px; line-height:16px">ID: <?=$member['id'];?></p> -->
			<p align="justify" style="margin: 12px 22px; line-height:16px">Fullname:  <?=$member['fullname'];?></p>
			<p align="justify" style="margin: 12px 22px; line-height:16px">Company:  <?=$member['company'];?></p>
	<!-- <p align="justify" style="margin: 12px 22px; line-height:16px">Role:  <?=$member['role'];?></p> -->
			<p align="justify" style="margin: 12px 22px; line-height:16px">Address:  <?=$member['address'];?></p>
			<p align="justify" style="margin: 12px 22px; line-height:16px">Username:  <?=$member['user'];?></p>
			<p align="justify" style="margin: 12px 22px; line-height:16px">Password:  <?=$member['pass'];?></p>
			<p align="justify" style="margin: 12px 22px; line-height:16px">Email:  <?=$member['email'];?></p><!-- 
			<p align="justify" style="margin: 12px 22px; line-height:16px">Date of birth:  <?=$member['birthday'];?></p> -->
			<p align="justify" style="margin: 12px 22px; line-height:16px">Website:  <?=$member['urls'];?></p>
			<p align="justify" style="margin: 12px 22px; line-height:16px">Date of Created:  <?=$member['timeregister'];?></p>
			<p align="justify" style="margin: 12px 22px; line-height:16px">Last Login:  <?=$member['lastvisitDate'];?></p>
			<p align="justify" style="margin: 12px 22px; line-height:16px">Partner's Last Update:  <?=$member['lastupdate'];?></p>

</table>
</div>
</div></div>
</div></div>
</div></div>
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


?>
<?php
session_start();
date_default_timezone_set('Asia/Bangkok');
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
<title>UPDATE INFORMATION</title>
	<link href="http://rynantech.com/wp-content/themes/solid-v2-wp/favicon.ico" rel="shortcut icon" type="image/x-icon" />
    <link type="text/css" rel="stylesheet" href="./sites/css/style.css" />
    <link href="./sites/css/login.css" rel="stylesheet" type="text/css" />
	<link href="./sites/css/vjet.css" rel="stylesheet" type="text/css">
<script src="https://cdn.ckeditor.com/4.9.1/standard/ckeditor.js"></script>


</head>

<body  >

<?php
include("header.html");
?>	<div id="Editinformation">

        <div id="wrap">
            <div id="container-home">
                <div class="container-row">

<table align="center" id="Table_01" width="800"  border="0" cellpadding="0" cellspacing="0" >


<table border="0" cellpadding="0" cellspacing="0" width="977">
	<tr>
		<td bgcolor="#7bc545" class="white" height="">
		<div><p align="justify" class="mem_acc">&nbsp;&nbsp;&nbsp;&nbsp;Partner Account</p></div>
			<div><p class="welcomeuser"><a href="info.php" class="hrlink"><font size="44" color="#fff" class="rightpn">Welcome <?=$_SESSION['fullname'];?></font></a>&nbsp;<a href="logout.php"><font color="red">[Logout]</font></a></div>

	
		</td>
	</tr>
</table>


	<div><p class="backtoindex"><a href="/partner-login" class="hrlink"><font size="12" color="#fff" class="rightpnhome">Back to index</p></font></a></div>


	<tr>
		<td>

<?php

    //----Noi dung thong bao sau khi sua ---//
//--- code back ve echo "<meta http-equiv='refresh' content='0;url=index.php'>"; ----//

    $thanhcong='<p align="justify" style="color: #FF0000; margin-left:252px; margin-right:22px; margin-top:12px; margin-bottom:12px"> Edit sucessfull <a href="./index.php">Back</a></p>';
 
$kothanh='Edit unsucessfull';
	$thongbao='<p align="justify" style="color: #FF0000; margin-left:252px; margin-right:22px; margin-top:12px; margin-bottom:12px">Date of birth invalid.</p>';
     echo "<b>  <br>&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Your account {$member['user']}</b>.<br>";

    if ($_GET['do']=="edit") {
        $fullname = addslashes( $_POST['fullname'] );
        $company = addslashes( $_POST['company'] );
        $address = addslashes( $_POST['address'] );
        $pass = md5( addslashes( $_POST['pass'] ) );
        $sinhnhat = addslashes( $_POST['birthday'] );
        $urls = addslashes( $_POST['urls'] );
        $email = addslashes( $_POST['email'] );
        $lastupdate = date("Y-m-d H:i:s", time());  
        $sql="
        UPDATE `members` SET
        `email` = '".$email."',
        `URLS` = '".$urls."',
        `fullname` = '".$fullname."',
        `company` = '".$company."',
        `address` = '".$address."' ,
        `lastupdate` = '".$lastupdate."' WHERE `id` =$user_id LIMIT 1 ;";
 

        if ($sua=mysql_query($sql))
            echo $thanhcong;
        else
            echo $kothanh;
 
        if ($_POST['pass']!="") {
            $sqlx="UPDATE `members` SET `pass` = '".$pass."' WHERE `id` = '$user_id' LIMIT 1 ;";
            $suapass=mysql_query($sqlx);
            if ($suapass) 
                echo "(Password changed!) ";
            else
                echo "(Password not change) ";
        }
    }

?>
<form method="POST" action="?do=edit">

<div id="editaccount">
			<div class="row2">
				<div class="val">
                    <div class="text">Fullname: <span id="ctl00_cphMain_ctl00_RequiredFieldValidator2" class="NormalFooter" style="color:Red;display:show;">
						(*)</span></div>
					<div class="tb_container tb_textbox_container">    
					<div><input name="fullname" type="text" maxlength="30" value="<?=$member['fullname']?>" id="fullname" class="textbox" tabindex="3" /></div>
					</div>
                 </div>
			</div> 
	<div class="row2">
				<div class="val">
                    <div class="text">Company: <span id="ctl00_cphMain_ctl00_RequiredFieldValidator2" class="NormalFooter" style="color:Red;display:show;">
						(*)</span></div>
					<div class="tb_container tb_textbox_container">    
					<div><input name="company" type="text" maxlength="30" value="<?=$member['company']?>" id="company" class="textbox" tabindex="3" /></div>
					</div>
                 </div>
			</div>
	<div class="row2">
				<div class="val">
                    <div class="text">Address: <span id="ctl00_cphMain_ctl00_RequiredFieldValidator2" class="NormalFooter" style="color:Red;display:show;">
						(*)</span></div>
					<div class="tb_container tb_textbox_container">    
					<div><input name="address" type="text" maxlength="30" value="<?=$member['address']?>" id="address" class="textbox" tabindex="3" /></div>
					</div>
                 </div>
			</div> 
			<div class="row2">
				<div class="val">
                    <div class="text">Username: <span class="NormalFooter">
						<span style="color: #FF0000">[Not change]</span></span></div>
					<div class="tb_container tb_textbox_container">    
					<div><input disabled  name="user" type="text" maxlength="30" value="<?=$member['user']?>" id="user" class="textbox" tabindex="4" /></div>
					</div>
                 </div>
			</div>
			<div class="row2">
				<div class="val">
                    <div class="text">New Password: <span class="NormalFooter">
						<span style="color: #FF0000">(*)</span></span></div>
					<div class="tb_container tb_textbox_container">    
					<div><input name="pass" type="password" maxlength="30" id="pass" class="textbox" tabindex="5" /></div>
					</div>
                 </div>
			</div>
	 	<div class="row2">
				<div class="val">
                    <div class="text">Email: <span id="ctl00_cphMain_ctl00_RequiredFieldValidator2" class="NormalFooter" style="color:Red;display:show;">
						(*)</span></div>
					<div class="tb_container tb_textbox_container">    
					<div><input name="email" type="text" maxlength="30" value="<?=$member['email']?>" id="email" class="textbox" tabindex="7" /></div>
					</div>
                 </div>
			</div>
			<div class="row2">
				<div class="val">
                    <div class="text">Website (URLs):</div>
					<div class="tb_container tb_textbox_container">    
					<div><input name="urls" type="text" maxlength="30" value="<?=$member['urls']?>" id="urls" class="textbox" tabindex="8" /></div>
					</div>
                 </div>
			</div>
<!--
			<div class="row2">
				<div class="val">
                    <div class="text">Date of birth(dd/mm/yyyy): <span id="ctl00_cphMain_ctl00_RequiredFieldValidator2" class="NormalFooter" style="color:Red;display:show;">
						(*)</span></div>
					<div class="tb_container tb_textbox_container">    
					<div><input name="birthday" type="text" maxlength="30" value="<?=$member['birthday']?>" id="birthday" class="textbox" tabindex="9" /></div>
					</div>
                 </div>
			</div> -->
			<div class="row2">
					<input type="reset" value="Reset" style="4background-image:url(../images/btnsubmit.jpg); width:87px; height:24px"/>
	<input type="submit" style="4background-image:url(../images/btnsubmit.jpg); width:87px; height:24px" value="Submit" />	</td>


                </div>
			</div>
</form>

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
?>
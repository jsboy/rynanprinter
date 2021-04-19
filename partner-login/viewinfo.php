<?php
session_start();

require ("./db_config.php");

if( isset ($_GET['edit']))

    $id = $_GET['edit'];

    $id = $_GET['id'];

    $res = mysql_query("SELECT * FROM members WHERE id='$id'");


    $row = mysql_fetch_array( $res );



//kiem tra role phai la admin ko thi moi duoc vao trang nay
	if  ( $_SESSION['role'] == "Admin" ) 
{
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<script src="http://www.google.com/jsapi" type="text/javascript"></script>
   <meta name="keywords" content="Vjetstore.com, Vjet1000 Printers, Hydrajet, Solujet, Mylan Group, CTP Plates, A reliable and WIFI connected compact size inkjet printer and inks for packaging pringtings with the lowest price on the market">
    <meta name="description" content="Vjetstore.com, Vjet1000 Printers, Hydrajet, Solujet, Mylan Group, CTP Plates, A reliable and WIFI connected compact size inkjet printer and inks for packaging pringtings with the lowest price on the market">

<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>EDIT LIST PARTNER</title>
	<link href="http://rynantech.com/wp-content/themes/solid-v2-wp/favicon.ico" rel="shortcut icon" type="image/x-icon" />
    <link type="text/css" rel="stylesheet" href="./sites/css/style.css" />
    <link href="./sites/css/login.css" rel="stylesheet" type="text/css" />
    <link href="./sites/css/vjet.css" rel="stylesheet" type="text/css" />

</head>

<body  >


<?php
include("header.html");
?>
	<div id="Editinformation">


        <div id="wrap">
            <div id="container-home">
                <div class="container-row">
<table align="center" id="Table_01" width="800"  border="0" cellpadding="0" cellspacing="0" >


<table border="0" cellpadding="0" cellspacing="0" width="977">
	<tr>
		<td bgcolor="#7bc545" class="white" height="">
		<div><p align="justify" class="mem_acc">&nbsp;&nbsp;&nbsp;&nbsp;EDIT LIST PARTNER</p></div>
			<div><p class="welcomeuser"><a href="info.php" class="hrlink"><font size="44" color="#fff" class="rightpn">Welcome <?=$_SESSION['fullname'];?></font></a>&nbsp;<a href="logout.php"><font color="red">[Logout]</font></a></div>

	
		</td>
	</tr>
</table>


	<div><p class="backtoindex"><a href="/partner-login/listpartner.php" class="hrlink"><font size="12" color="#fff" class="rightpnhome">Back to index</p></font></a></div>


	<tr>
		<td>




<form method="post" action="?do=edit">

<div id="editaccount">

      <input type="hidden" name="id" value="<?php echo $row[0]; ?>" >
			<div class="row2">
				<div class="val">
                    <div class="text">Fullname: <span id="ctl00_cphMain_ctl00_RequiredFieldValidator2" class="NormalFooter" style="color:Red;display:show;">
						(*)</span></div>
					<div class="tb_container tb_textbox_container">    
					<div><input name="fullname" type="text" maxlength="230" value="<?php echo $row['fullname']; ?>" id="fullname" class="textbox" tabindex="3" /></div>
					</div>
                 </div>
			</div>
	<div class="row2">
				<div class="val">
                    <div class="text">Company: <span id="ctl00_cphMain_ctl00_RequiredFieldValidator2" class="NormalFooter" style="color:Red;display:show;">
						(*)</span></div>
					<div class="tb_container tb_textbox_container">    
					<div><input name="company" type="text" maxlength="230" value="<?php echo $row['company']; ?>" id="company" class="textbox" tabindex="3" /></div>
					</div>
                 </div>
			</div>
	<div class="row2">
				<div class="val">
                    <div class="text">Address: <span id="ctl00_cphMain_ctl00_RequiredFieldValidator2" class="NormalFooter" style="color:Red;display:show;">
						(*)</span></div>
					<div class="tb_container tb_textbox_container">    
					<div><input name="address" type="text" maxlength="230" value="<?php echo $row['address']; ?>" id="address" class="textbox" tabindex="3" /></div>
					</div>
                 </div>
			</div>

			<div class="row2">
				<div class="val">
                    <div class="text">Username: <span class="NormalFooter">
						<span style="color: #FF0000">[Not change]</span></span></div>
					<div class="tb_container tb_textbox_container">    
					<div><input disabled  name="user" type="text" maxlength="30" value="<?php echo $row['user']; ?>" id="user" class="textbox" tabindex="4" /></div>
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
                    <div class="text">timeregister: <span id="ctl00_cphMain_ctl00_RequiredFieldValidator2" class="NormalFooter" style="color:Red;display:show;">
						(*)</span></div>
					<div class="tb_container tb_textbox_container">    
					<div><input disabled name="timeregister" type="text" maxlength="30" value="<?php echo $row['timeregister']; ?>" id="timeregister" class="textbox" tabindex="7" /></div>
					</div>
                 </div>
			</div>
			<div class="row2">
				<div class="val">
                    <div class="text">lastvisitDate:</div>
					<div class="tb_container tb_textbox_container">    
					<div><input disabled name="lastvisitDate" type="text" maxlength="30" value="<?php echo $row['lastvisitDate']; ?>" id="lastvisitDate" class="textbox" tabindex="8" /></div>
					</div>
                 </div>
			</div>

	<div class="row2">
				<div class="val">
                    <div class="text">lastupdate: <span id="ctl00_cphMain_ctl00_RequiredFieldValidator2" class="NormalFooter" style="color:Red;display:show;">
						</span></div>
					<div class="tb_container tb_textbox_container">    
					<div><input disabled name="lastupdate" type="text" maxlength="30" value="<?php echo $row['lastupdate']; ?>" id="lastupdate" class="textbox" tabindex="9" /></div>
					</div>
                 </div>
			</div>


			<div class="row2">
					<input type="reset" value="Reset" style="4background-image:url(../images/btnsubmit.jpg); width:87px; height:24px"/>
	<input type="submit" style="4background-image:url(../images/btnsubmit.jpg); width:87px; height:24px" value="Submit" />	</td>


                </div>
			</div>
</form>

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
?>
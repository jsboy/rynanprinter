<?php
session_start();
date_default_timezone_set('Asia/Bangkok');
include "./db_config.php";



//Kiem tra email co hop le hay ko
function check_email($email) {
    if (strlen($email) == 0) return false;
    if (eregi("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,4})$", $email)) return true;
    return false;
}
if ( $_GET['act'] == "do" )
{


    // Dùng hàm addslashes() để tránh SQL injection, dùng hàm md5() để mã hóa password
   $filename = addslashes( $_POST['filename'] );
    $type = addslashes( $_POST['type'] );
    $printers = addslashes( $_POST['printers'] );
   $link = addslashes( $_POST['link'] );
    $notes = addslashes( $_POST['notes'] );
    //$sinhnhat = addslashes( $_POST['birthday'] );
   // $vercode = addslashes( $_POST['vercode'] );

	$timereg = date("Y-m-d H:i:s", time());  

    // Kiểm tra 7 thông tin, nếu có bất kỳ thông tin chưa điền thì sẽ báo lỗi
    if ( ! $filename || ! $type || ! $printers || ! $link )
    {
        print "Please type full information. <a href='javascript:history.go(-1)'>Click to back</a>";
        exit;
    }


    // Kiểm tra file nay co su dung chua
    if ( mysql_num_rows(mysql_query("SELECT filename FROM download WHERE filename='$filename'"))>0)
    {
        print "Filename has been use! please use the filename other <a href='javascript:history.go(-1)'>Click to back</a>";
        exit;
    }
   

    // Tiến hành tạo tài khoản

    @$a=mysql_query("INSERT INTO iccgroup (filename, type, printers, link, notes, timecreate) VALUES ('{$filename}', '{$type}', '{$printers}', '{$link}', '{$notes}', '{$timereg}')");
   
}
 

	if ( $_SESSION['user_id'] )
{



?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>

<script src="http://www.google.com/jsapi" type="text/javascript"></script>
   <meta name="keywords" content="rynantech.com, Vjet1000 Printers, Hydrajet, Solujet, Mylan Group, CTP Plates, A reliable and WIFI connected compact size inkjet printer and inks for packaging pringtings with the lowest price on the market">
    <meta name="description" content="rynantech.com, Vjet1000 Printers, Hydrajet, Solujet, Mylan Group, CTP Plates, A reliable and WIFI connected compact size inkjet printer and inks for packaging pringtings with the lowest price on the market">

<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
<title>Create files for partner</title>

<link href="https://rynantech.com/products/wp-content/uploads/2019/08/favicon-50x50.png" rel="shortcut icon" type="image/x-icon" />
    <link type="text/css" rel="stylesheet" href="./sites/css/style.css" />
    <link href="./sites/css/login.css" rel="stylesheet" type="text/css" />

<link href="./sites/css/vjet.css" rel="stylesheet" type="text/css">


</head>

<body  >



<?php
include("header.html");
?>	<div id="registerpn">



        <div id="wrap">
            <div id="container-home">
                <div class="container-row">


    	

<table align="center" id="Table_01" width="800"  border="0" cellpadding="0" cellspacing="0" >

<table border="0" cellpadding="0" cellspacing="0" width="977"  >
	<tr>
		<td bgcolor="#7bc545" class="white">
		<div><p align="justify" class="mem_acc">&nbsp;&nbsp;&nbsp;&nbsp;Create Files

</p></div>
			<div><p class="welcomeuser"><a href="info.php" class="hrlink"><font size="12" color="#fff" class="rightpn">Welcome <?=$_SESSION['fullname'];?></font></a>&nbsp;<a href="logout.php"><font color="red">[Logout]</font></a></div>


	<div><p class="backtoindex"><a href="/partner-login/iccgroupcp.php" class="hrlink"><font size="12" color="#fff" class="rightpnhome">Back to index</p></font></a></div>


	<tr>
		<td>
		<p align="justify" style="margin: 12px 22px; margin-left: 322px;"><b><span style="font-size: 16px;">Please enter the information link download</span></font></b></p>


		<p align="justify" style="margin: 12px 22px; margin-left: 322px;"><b><span style="font-size: 13px;"><span style="color:#ff0000">
<?php
 // Thông báo hoàn tất việc tạo tài khoản
    if ($a)
        print "The account {$username} has been created <a href='iccgroupcp.php'>.     Click here to list download</a>";
    else
        print " ";

?>


</span></span></font></b></p>

<form action="iccgroupcre.php?act=do" method="post">

			<div class="row2">
				<div class="val">
                    <div class="text">Filename: <span id="ctl00_cphMain_ctl00_RequiredFieldValidator2" class="NormalFooter" style="color:Red;display:show;">(*)</span></div>
					<div class="tb_container tb_textbox_container">    
					<div><input name="filename" type="text" maxlength="230" id="filename" class="textbox" tabindex="3" /></div>
					</div>
                 </div>
			</div>
	<div class="row2">
				<div class="val">
                    <div class="text">Type: <span id="ctl00_cphMain_ctl00_RequiredFieldValidator2" class="NormalFooter" style="color:Red;display:show;">(*)</span></div>
					<div class="tb_container tb_textbox_container">    
					<div><!-- 
<input name="type" type="text" maxlength="230" id="type" class="textbox" tabindex="3" /> -->

  <select name="type" id="type" style="width: 260px">
            <option value="FIRMWARE" selected="selected" >FIRMWARE</option>
            <option value="SOFTWARE" >SOFTWARE</option>
           <option value="BROCHURE" >BROCHURE</option>
            <option value="USER MANUAL" >USER MANUAL</option>
            <option value="QUICK GUIDE" >QUICK GUIDE</option>
            <option value="PRESENTATION" >PRESENTATION</option>
			<option value="VIDEOS" >VIDEOS</option>
            <option value="PHOTOS" >PHOTOS</option>
            <option value="OTHERS">OTHERS</option>
        </select>
</div>
					</div>
                 </div>
			</div>

	<div class="row2">
				<div class="val">
                    <div class="text">Printers: <span id="ctl00_cphMain_ctl00_RequiredFieldValidator2" class="NormalFooter" style="color:Red;display:show;">(*)</span></div>
					<div class="tb_container tb_textbox_container">    
					<div><!-- 
<input name="type" type="text" maxlength="230" id="type" class="textbox" tabindex="3" /> -->

  <select name="printers" id="printers" style="width: 260px">
		<option value="T127P" >T127P</option>	
			<option value="T127H" >T127H</option>	
            <option value="T127He" >T127He</option>
            <option value="T127C" >T127C</option>
            <option value="T127E">T127E</option>
            <option value="T127S">T127S</option>
            <option value="T508M">T508M</option>
            <option value="T508MPlus">T508MPlus</option>
			<option value="T254P">T254P</option>
			<option value="T254E">T254E</option>
			<option value="T500C">T500C</option>
        </select>
</div>
					</div>
                 </div>
			</div>

	<div class="row2">
				<div class="val">
                    <div class="text">Link: <span id="ctl00_cphMain_ctl00_RequiredFieldValidator2" class="NormalFooter" style="color:Red;display:show;">(*)</span></div>
					<div class="tb_container tb_textbox_container">    
					<div><input name="link" type="text" maxlength="230" id="link" class="textbox" tabindex="3" /></div>
					</div>
                 </div>
			</div>


			<div class="row2">
				<div class="val">
                    <div class="text">Notes: </div>
					<div class="">    
					<div><textarea class="input" rows="6" cols="35" name="notes" type="text" id="notes" class="textbox" tabindex="9"><?php echo ""."\n" ?></textarea></div>
					</div>
                 </div>
			</div>
<!--
			<div class="row2">
				<div class="val">
                    <div class="text">Date of birth (dd/mm/yyyy): </div>
					<div class="tb_container tb_textbox_container">    
					<div><input name="birthday" type="text" maxlength="30" id="birthday" class="textbox" tabindex="9" /></div>
					</div>
                 </div>
			</div>

	<div class="row2">
				<div class="val">
                    <div class="text">Enter Code: <span id="ctl00_cphMain_ctl00_RequiredFieldValidator2" class="NormalFooter" style="color:Red;display:show;">(*)</span><img src="captcha.php" border="0" /></div>
					<div class="tb_container tb_textbox_container"> 
					<div><input name="vercode" type="text" maxlength="30" id="vercode" class="textbox" tabindex="8" /></div>
					</div>
                 </div>
			</div>
-->
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
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
   $company = addslashes( $_POST['company'] );
    $country = addslashes( $_POST['country'] );
    $classification = addslashes( $_POST['classification'] );
   $address = addslashes( $_POST['address'] );
    $contact = addslashes( $_POST['contact'] );
    $phone = addslashes( $_POST['phone'] );
    $email = addslashes( $_POST['email'] );
    $website = addslashes( $_POST['website'] );
    $notes = addslashes( $_POST['notes'] );

	$timereg = date("Y-m-d H:i:s", time());  

    // Kiểm tra 7 thông tin, nếu có bất kỳ thông tin chưa điền thì sẽ báo lỗi
   // if ( ! $filename || ! $type || ! $printers || ! $link )
  // {
  //      print "Please type full information. <a href='javascript:history.go(-1)'>Click to back</a>";
 //       exit;
  //  }


    // Kiểm tra Company nay co su dung chua
    if ( mysql_num_rows(mysql_query("SELECT company FROM download WHERE filename='$company'"))>0)
    {
        print "Company has been use! please use the Company other <a href='javascript:history.go(-1)'>Click to back</a>";
        exit;
    }
   

    // Tiến hành tạo tài khoản

    @$a=mysql_query("INSERT INTO endusers (company, country, classification, address, contact,phone, email, website, notes, timecreate) VALUES ('{$company}', '{$country}', '{$classification}', '{$address}', '{$contact}', '{$phone}', '{$email}', '{$website}', '{$notes}', '{$timereg}')");
   
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
<title>Create new endusers</title>

	<link href="http://rynantech.com/wp-content/themes/solid-v2-wp/favicon.ico" rel="shortcut icon" type="image/x-icon" />

    <link type="text/css" rel="stylesheet" href="./sites/css/style.css" />
    <link href="./sites/css/login.css" rel="stylesheet" type="text/css" />

<link href="./sites/css/vjet.css" rel="stylesheet" type="text/css">


</head>

<body  >


<?php
include("header.html");
?>

	<div id="registerpn">



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
		<div><p align="justify" class="mem_acc">&nbsp;&nbsp;&nbsp;&nbsp;Create new End Users

</p></div>
			<div><p class="welcomeuser"><a href="info.php" class="hrlink"><font size="12" color="#fff" class="rightpn">Welcome <?=$_SESSION['fullname'];?></font></a>&nbsp;<a href="logout.php"><font color="red">[Logout]</font></a></div>


	<div><p class="backtoindex"><a href="/partner-login/cpendusers.php" class="hrlink"><font size="12" color="#fff" class="rightpnhome">Back to index</p></font></a></div>


	<tr>
		<td>
		<p align="justify" style="margin: 12px 22px; margin-left: 322px;"><b><span style="font-size: 16px;">Please enter the information</span></font></b></p>


		<p align="justify" style="margin: 12px 22px; margin-left: 322px;"><b><span style="font-size: 13px;"><span style="color:#ff0000">
<?php
 // Thông báo hoàn tất việc tạo tài khoản
    if ($a)
        print "The Company {$company} has been created <a href='cpendusers.php'>.     Click here to back</a>";
    else
        print " ";

?>


</span></span></font></b></p>

<form action="cpenduserscre.php?act=do" method="post">

			<div class="row2">
				<div class="val">
                    <div class="text">Company: <span id="ctl00_cphMain_ctl00_RequiredFieldValidator2" class="NormalFooter" style="color:Red;display:show;">(*)</span></div>
					<div class="tb_container tb_textbox_container">    
					<div><input name="company" type="text" maxlength="230" id="company" class="textbox" tabindex="3" /></div>
					</div>
                 </div>
			</div>
<!-- 
	<div class="row2">
				<div class="val">
                    <div class="text">Type: <span id="ctl00_cphMain_ctl00_RequiredFieldValidator2" class="NormalFooter" style="color:Red;display:show;">(*)</span></div>
					<div class="tb_container tb_textbox_container">    
					<div>
  <select name="type" id="type" style="width: 260px">
            <option value="Firmware" selected="selected" >Firmware</option>
           <option value="Software" >Software</option>
            <option value="Driver" >Driver</option>
            <option value="Setup" >Setup</option>
            <option value="PDF files">PDF files</option>
            <option value="HydraJET">HydraJET</option>
            <option value="SoluJET">SoluJET</option>
            <option value="Others">Others</option>
        </select>
</div>
					</div>
                 </div>
			</div> 
	<div class="row2">
				<div class="val">
                    <div class="text">Printers: <span id="ctl00_cphMain_ctl00_RequiredFieldValidator2" class="NormalFooter" style="color:Red;display:show;">(*)</span></div>
					<div class="tb_container tb_textbox_container">    
					<div>

  <select name="printers" id="printers" style="width: 260px">
					<option value="Vjet1000" >Vjet1000</option>	
            <option value="Vjet1020" >Vjet1020</option>
            <option value="Vjet2172" >Vjet2172</option>
            <option value="Inkjet Inks" >Inkjet Inks</option>
            <option value="Others">Others</option>
        </select>
</div>
					</div>
                 </div>
			</div>
-->


	<div class="row2">
				<div class="val">
                    <div class="text">Country: <span id="ctl00_cphMain_ctl00_RequiredFieldValidator2" class="NormalFooter" style="color:Red;display:show;">(*)</span></div>
					<div class="tb_container tb_textbox_container">    
					<div><input name="country" type="text" maxlength="230" id="country" class="textbox" tabindex="3" /></div>
					</div>
                 </div>
			</div>
	<div class="row2">
				<div class="val">
                    <div class="text">Classification: <span id="ctl00_cphMain_ctl00_RequiredFieldValidator2" class="NormalFooter" style="color:Red;display:show;">(*)</span></div>
					<div class="tb_container tb_textbox_container">    
					<div><input name="classification" type="text" maxlength="230" id="classification" class="textbox" tabindex="3" /></div>
					</div>
                 </div>
			</div>
	<div class="row2">
				<div class="val">
                    <div class="text">Address: <span id="ctl00_cphMain_ctl00_RequiredFieldValidator2" class="NormalFooter" style="color:Red;display:show;">(*)</span></div>
					<div class="tb_container tb_textbox_container">    
					<div><input name="address" type="text" maxlength="230" id="address" class="textbox" tabindex="3" /></div>
					</div>
                 </div>
			</div>
	<div class="row2">
				<div class="val">
                    <div class="text">Contact: <span id="ctl00_cphMain_ctl00_RequiredFieldValidator2" class="NormalFooter" style="color:Red;display:show;">(*)</span></div>
					<div class="tb_container tb_textbox_container">    
					<div><input name="contact" type="text" maxlength="230" id="contact" class="textbox" tabindex="3" /></div>
					</div>
                 </div>
			</div>
	<div class="row2">
				<div class="val">
                    <div class="text">Phone: <span id="ctl00_cphMain_ctl00_RequiredFieldValidator2" class="NormalFooter" style="color:Red;display:show;">(*)</span></div>
					<div class="tb_container tb_textbox_container">    
					<div><input name="phone" type="text" maxlength="230" id="phone" class="textbox" tabindex="3" /></div>
					</div>
                 </div>
			</div>

<div class="row2">
				<div class="val">
                    <div class="text">Email: <span id="ctl00_cphMain_ctl00_RequiredFieldValidator2" class="NormalFooter" style="color:Red;display:show;">(*)</span></div>
					<div class="tb_container tb_textbox_container">    
					<div><input name="email" type="text" maxlength="230" id="email" class="textbox" tabindex="3" /></div>
					</div>
                 </div>
			</div>

<div class="row2">
				<div class="val">
                    <div class="text">Website: <span id="ctl00_cphMain_ctl00_RequiredFieldValidator2" class="NormalFooter" style="color:Red;display:show;">(*)</span></div>
					<div class="tb_container tb_textbox_container">    
					<div><input name="website" type="text" maxlength="230" id="website" class="textbox" tabindex="3" /></div>
					</div>
                 </div>
			</div>

			<div class="row2">
				<div class="val">
                    <div class="text">Notes: </div>
					<div class="tb_container tb_textbox_container">    
					<div><input name="notes" type="text" maxlength="1130" id="notes" class="textbox" tabindex="8" /></div>
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
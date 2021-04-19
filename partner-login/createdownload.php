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
   $link = addslashes( $_POST['link'] );
    $notes = addslashes( $_POST['notes'] );
    //$sinhnhat = addslashes( $_POST['birthday'] );
   // $vercode = addslashes( $_POST['vercode'] );

	$timereg = date("Y-m-d H:i:s", time());  

    // Kiểm tra 7 thông tin, nếu có bất kỳ thông tin chưa điền thì sẽ báo lỗi
    if ( ! $filename || ! $type || ! $link )
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

    @$a=mysql_query("INSERT INTO download (filename, type, link, notes, timecreate) VALUES ('{$filename}', '{$type}', '{$link}', '{$notes}', '{$timereg}')");
   
}
 

	if ( $_SESSION['user_id'] )
{



?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>

<script src="http://www.google.com/jsapi" type="text/javascript"></script>
   <meta name="keywords" content="Vjetstore.com, Vjet1000 Printers, Hydrajet, Solujet, Mylan Group, CTP Plates, A reliable and WIFI connected compact size inkjet printer and inks for packaging pringtings with the lowest price on the market">
    <meta name="description" content="Vjetstore.com, Vjet1000 Printers, Hydrajet, Solujet, Mylan Group, CTP Plates, A reliable and WIFI connected compact size inkjet printer and inks for packaging pringtings with the lowest price on the market">

<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
<title>Create files for partner</title>
    <link type="text/css" rel="stylesheet" href="./sites/css/style.css" />
    <link href="./sites/css/login.css" rel="stylesheet" type="text/css" />

<link href="../images/vjet.css" rel="stylesheet" type="text/css">
</head>

<body  >

	<div id="registerpn">



<table class="font" align="center" border="0" cellpadding="0" cellspacing="0" width="992">
  <tbody><tr>
    <td><table border="0" cellpadding="0" cellspacing="0" width="100%">
      <tbody><tr>
        <td colspan="2" height="6"></td>
        </tr>
      <tr>
        <td width="79%"><a href="/"></a></td>

     <!--
   <td style="padding-top: -10px;" align="right" valign="top" width="21%"><div id="eng"><a href="https://twitter.com/#!/vjetstore"><img src="../images/twitter-icon.png" border="0" width="25" height="27"></span><a href="http://www.facebook.com/profile.php?id=100003678743080&sk=wall"> <img src="../images/facebook_icon.png" border="0" width="25" height="27">&nbsp;&nbsp;</a> <a href="eng"><img src="../images/en.gif" border="0" width="25" height="17"></span>&nbsp;<a href="vi"> <img src="../images/vi.gif" border="0" width="25" height="17"></a> </div> </td>
-->
    <td style="padding-top: -10px;" align="right" valign="top" width="21%"><div id="eng"><a href="/partner-login"><img src="../images/en.gif" border="0" width="32" height="22"></span>&nbsp;<a href="/vi/partner-login"> <img src="../images/vi.gif" border="0" width="32" height="22"></a> </div> </td>

    </div>  </tr>

      <tr>
        <td>&nbsp;</td>
        <td style="padding-top: -20px;" align="right" valign="top">&nbsp;</td>
      </tr>

    </tbody></table></td>
  </tr>
  <tr>
    <td><table border="0" cellpadding="0" cellspacing="0" width="100%">
 
<tbody><tr>

     <div id="top"> <a href="/" id="logo" title="Back to the hompage"></a> </div>
       <td align="right" valign="bottom" height="45"><table border="0" cellpadding="0" cellspacing="0" width="50" align="left" class="menupartner">
       <tbody><tr>   
 
            <td><a href="/"><img src="menu/images/home.png"   border="0"></a></td>
            <td><a href="/about"><img src="menu/images/about.png" border="0"></a></td>
            <td><a href="/news"><img src="menu/images/news.png"  border="0"></a></td>
            <td><a href="/products"><img src="menu/images/products.png"  border="0"></a></td>
            <td><a href="/services"><img src="menu/images/services.png" border="0" ></a></td>
            <td><a href="/partner-login"><img src="menu/images/partner-login2.png" border="0" ></a></td>
            <td><a href="/contact"><img src="menu/images/contact.png" border="0" ></a></td>
	
				</div>
        </tr>
        </tbody></table></td>
      </tr>
    </tbody></table>
    </td>
  </tr>
</tbody></table>


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
		<td bgcolor="#005FA3" class="white">
		<div><p align="justify" class="mem_acc">&nbsp;&nbsp;&nbsp;&nbsp;Create files for partner</p></div>
			<div><p class="welcomeuser"><a href="info.php" class="hrlink"><font size="12" color="#fff" class="rightpn">Welcome <?=$_SESSION['fullname'];?></font></a>&nbsp;<a href="logout.php"><font color="red">[Logout]</font></a></div>


	<div><p class="backtoindex"><a href="/partner-login/listdownload.php" class="hrlink"><font size="12" color="#fff" class="rightpnhome">Back to download</p></font></a></div>


	<tr>
		<td>
		<p align="justify" style="margin: 12px 22px; margin-left: 322px;"><b><span style="font-size: 16px;">Please enter the information link download</span></font></b></p>


		<p align="justify" style="margin: 12px 22px; margin-left: 322px;"><b><span style="font-size: 13px;"><span style="color:#ff0000">
<?php
 // Thông báo hoàn tất việc tạo tài khoản
    if ($a)
        print "The account {$username} has been created <a href='listdownload.php'>.     Click here to list download</a>";
    else
        print " ";

?>


</span></span></font></b></p>

<form action="createdownload.php?act=do" method="post">

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
            <option value="Firmware" selected="selected" >Firmware</option>
            <option value="Software" >Software</option>
            <option value="PDF files">PDF files</option>
            <option value="Others">Others</option>
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
					<div class="tb_container tb_textbox_container">    
					<div><input name="notes" type="text" maxlength="30" id="notes" class="textbox" tabindex="8" /></div>
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




 <tr>
    <td><table border="0" cellpadding="0" cellspacing="0" width="980">
      <tbody><tr>
        <td bgcolor="#bababa" height="1"></td>
      </tr>

<br><br><br><br>
      <tr>
        <td valign="top"><img src="../images/bgdownload.jpg" usemap="#Map" style="margin: 8px 0pt;" border="0"></td>
     </tr>

    </tbody></table></td>
  </tr>
 
  <tr>
    <td><table border="0" cellpadding="0" cellspacing="0" width="980">
      <tbody><tr>
        <td bgcolor="#bababa" height="1"></td>
      </tr>

 
  <tr>
    <td class="bottom" align="center" height="28">
<img src="../images/end.jpg" border="0">
  </tr>
</tbody></table>

<map name="Map">

 <area shape="rect" coords="849,13,968,145" href="../brochure" title="Brochure for Vjet printer">
  <area shape="rect" coords="849,13,700,145" href="../documentation" title="Documentation">
   <area shape="rect" coords="549,23,568,145" href="../ios" title="Software for iOS">
<area shape="rect" coords="550,62,350,145" href="../android" title="Software for Android">
<area shape="rect" coords="222,12,341,144" href="../firmwaredl" title="Firmware for Vjet Printer">
<area shape="rect" coords="200,42,59,180" href="../fonts" title="Fonts download"></map>


	</div>
<!--
<div id="skype">

 <a onclick="return skypeCheck();" href="skype:support_vjetstore?chat">
                                <img src="../images/skype.png" style="border: medium none;">
                                <!--<img src="http://mystatus.skype.com/smallicon/test" style="border: none;" width="16"
                                    height="16" alt="My status" />
                            </a>

-->
</div>
</body></html>

<?php
}
 else
{
require_once ("./login.php");

}
?>
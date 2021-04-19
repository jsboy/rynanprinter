<?php
session_start();
date_default_timezone_set('Asia/Bangkok');
include "./db_config.php";



//Kiem tra email co hop le hay ko
function check_email($email) {
    if (strlen($email) == 0) return false;
    //if (eregi("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,4})$", $email)) return true;
    if (preg_match("/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,4})$/", $email)) return true;
    return false;
}
if ( $_GET['act'] == "do" )
{


    // Dùng hàm addslashes() để tránh SQL injection, dùng hàm md5() để mã hóa password
    $username = addslashes( $_POST['user'] );
    $password = md5( addslashes( $_POST['pass'] ) );
    $verify_password = md5( addslashes( $_POST['verify_pass'] ) );
    $email = addslashes( $_POST['email'] );
    $fullname = addslashes( $_POST['fullname'] );
    $company = addslashes( $_POST['company'] );
    $address = addslashes( $_POST['address'] );
    //$sinhnhat = addslashes( $_POST['birthday'] );
    $urls = addslashes( $_POST['urls'] );
    $admin = addslashes( $_POST['admin'] );
    $role = addslashes( $_POST['role'] );
	$role2 = addslashes( $_POST['role2'] );
    $vercode = addslashes( $_POST['vercode'] );

	$timereg = date("Y-m-d H:i:s", time());  

    // Kiểm tra 7 thông tin, nếu có bất kỳ thông tin chưa điền thì sẽ báo lỗi
    if ( ! $username || ! $_POST['pass'] || ! $_POST['verify_pass'] || ! $email || ! $fullname || ! $vercode   )
    {
        print "Please type full information. <a href='javascript:history.go(-1)'>Click to back</a>";
        exit;
    }
    // Kiểm tra username nay co nguoi dung chua
    if ( mysql_num_rows(mysql_query("SELECT user FROM members WHERE user='$username'"))>0)
    {
        print "This username has been registed, please chose different username. <a href='javascript:history.go(-1)'>Touch here to back</a>";
        exit;
    }
    // Kiểm tra email nay co hop le ko
    if (!check_email($email))
    {
       print "Email not allow. <a href='javascript:history.go(-1)'>Click to back</a>";
        exit;
    }




    // Kiểm tra email nay co nguoi dung chua
    if ( mysql_num_rows(mysql_query("SELECT email FROM members WHERE email='$email'"))>0)
    {
        print "Email has been use! please use the email other <a href='javascript:history.go(-1)'>Touch here to back</a>";
        exit;
    }
    // Kiểm tra mật khẩu, bắt buộc mật khẩu nhập lúc đầu và mật khẩu lúc sau phải trùng nhau
    if ( $password != $verify_password )
    {
        print "The password confirmation does not match. <a href='javascript:history.go(-1)'>Touch here to back</a>";
        exit;
    }
    // Tiến hành tạo tài khoản

    @$a=mysql_query("INSERT INTO members (user, pass, email, urls, fullname,company,address,admin,role,role2, timeregister) VALUES ('{$username}', '{$password}', '{$email}', '{$urls}', '{$fullname}','{$company}','{$address}','{$admin}','{$role}','{$role2}' , '{$timereg}')");
   
}
 


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
<meta id="MetaKeywords" name="KEYWORDS" content="RYNAN Technologies Pte Ltd, rynantech.com, QR code track &amp; trace, variable data, Alphanumeric, logos, date/time, expiry date, Julian date, shift code, counter/lot box code, multiple types of variable barcodes, and database,
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

	<div id="registerpn">

        <div id="wrap">
            <div id="container-home">
                <div class="container-row">

<table align="center" id="Table_01" width="800"  border="0" cellpadding="0" cellspacing="0" >

<table border="0" cellpadding="0" cellspacing="0" width="977"  >
	<tr>
		<td bgcolor="#7bc545" class="white">
		<div><p align="justify" class="mem_acc">&nbsp;&nbsp;&nbsp;&nbsp;New Account</p></div>
			<div><p class="welcomeuser"><a href="info.php" class="hrlink"><font size="12" color="#fff" class="rightpn">Welcome <?=$_SESSION['fullname'];?></font></a>&nbsp;<a href="logout.php"><font color="red">[Logout]</font></a></div>


	<div><p class="backtoindex"><a href="/partner-login/listpartner.php" class="hrlink"><font size="12" color="#fff" class="rightpnhome">Back to index</p></font></a></div>


	<tr>
		<td>
		<p align="justify" style="margin: 12px 22px; margin-left: 322px;"><b><span style="font-size: 16px;">Please enter the information unregistered account</span></font></b></p>


		<p align="justify" style="margin: 12px 22px; margin-left: 322px;"><b><span style="font-size: 13px;"><span style="color:#ff0000">
<?php
 // Thông báo hoàn tất việc tạo tài khoản
    if ($a)
        print "The account {$username} has been created <a href='login.php'>.     Click here to Login</a>";
    else
        print " ";

?>



</span></span></font></b></p>



<form action="mylan.php?act=do" method="post">

			<div class="row2">
				<div class="val">
                    <div class="text">Fullname: <span id="ctl00_cphMain_ctl00_RequiredFieldValidator2" class="NormalFooter" style="color:Red;display:show;">(*)</span></div>
					<div class="tb_container tb_textbox_container">    
					<div><input name="fullname" type="text" maxlength="230" id="fullname" class="textbox" tabindex="3" /></div>
					</div>
                 </div>
			</div>
	<div class="row2">
				<div class="val">
                    <div class="text">Company: <span id="ctl00_cphMain_ctl00_RequiredFieldValidator2" class="NormalFooter" style="color:Red;display:show;"></span></div>
					<div class="tb_container tb_textbox_container">    
					<div><input name="company" type="text" maxlength="230" id="company" class="textbox" tabindex="3" /></div>
					</div>
                 </div>
			</div>
	<div class="row2">
				<div class="val">
                    <div class="text">Address: <span id="ctl00_cphMain_ctl00_RequiredFieldValidator2" class="NormalFooter" style="color:Red;display:show;"></span></div>
					<div class="tb_container tb_textbox_container">    
					<div><input name="address" type="text" maxlength="230" id="address" class="textbox" tabindex="3" /></div>
					</div>
                 </div>
			</div>

			<div class="row2">
				<div class="val">
                    <div class="text">Username: <span id="ctl00_cphMain_ctl00_RequiredFieldValidator2" class="NormalFooter" style="color:Red;display:show;">(*)</span></div>
					<div class="tb_container tb_textbox_container">    
					<div><input name="user" type="text" maxlength="30" id="user" class="textbox" tabindex="4" /></div>
					</div>
                 </div>
			</div>
			<div class="row2">
				<div class="val">
                    <div class="text">Password: <span id="ctl00_cphMain_ctl00_RequiredFieldValidator2" class="NormalFooter" style="color:Red;display:show;">(*)</span></div>
					<div class="tb_container tb_textbox_container">    
					<div><input name="pass" type="password" maxlength="30" id="pass" class="textbox" tabindex="5" /></div>
					</div>
                 </div>
			</div>
			<div class="row2">
				<div class="val">
                    <div class="text">Password confirm: <span id="ctl00_cphMain_ctl00_RequiredFieldValidator2" class="NormalFooter" style="color:Red;display:show;">(*)</span></div>
					<div class="tb_container tb_textbox_container">    
					<div><input name="verify_pass" type="password" maxlength="30" id="verify_pass" class="textbox" tabindex="6" /></div>
					</div>
                 </div>
			</div>
			<div class="row2">
				<div class="val">
                    <div class="text">Email: <span id="ctl00_cphMain_ctl00_RequiredFieldValidator2" class="NormalFooter" style="color:Red;display:show;">(*)</span></div>
					<div class="tb_container tb_textbox_container">    
					<div><input name="email" type="text" maxlength="130" id="email" class="textbox" tabindex="7" /></div>
					</div>
                 </div>
			</div>
			<div class="row2">
				<div class="val">
                    <div class="text">Website (URLs): </div>
					<div class="tb_container tb_textbox_container">    
					<div><input name="urls" type="text" maxlength="30" id="urls" class="textbox" tabindex="8" /></div>
					</div>
                 </div>
			</div>

	<div class="row2">
				<div class="val">
                    <div class="text">Admin: <span id="ctl00_cphMain_ctl00_RequiredFieldValidator2" class="NormalFooter" style="color:Red;display:show;">(*)</span></div>
					<div class="tb_container tb_textbox_container">    
					<div><input name="admin" type="text" maxlength="130" id="admin" class="textbox" tabindex="7" value="0"/></div>
					</div>
                 </div>
			</div>

	<div class="row2">
				<div class="val">
                    <div class="text">Role: <span id="ctl00_cphMain_ctl00_RequiredFieldValidator2" class="NormalFooter" style="color:Red;display:show;">(*)</span></div>
					<div class="tb_container tb_textbox_container">    
					<div><input name="role" type="text" maxlength="130" id="role" class="textbox" tabindex="7" /></div>
					</div>
                 </div>
			</div>
<!-- 
	<div class="row2">
				<div class="val">
                    <div class="text">Role2: <span id="ctl00_cphMain_ctl00_RequiredFieldValidator2" class="NormalFooter" style="color:Red;display:show;">(*)</span></div>
					<div class="tb_container tb_textbox_container">    
					<div><input name="role2" type="text" maxlength="130" id="role2" class="textbox" tabindex="7" /></div>
					</div>
                 </div>
			</div> -->
<!--
			<div class="row2">
				<div class="val">
                    <div class="text">Date of birth (dd/mm/yyyy): </div>
					<div class="tb_container tb_textbox_container">    
					<div><input name="birthday" type="text" maxlength="30" id="birthday" class="textbox" tabindex="9" /></div>
					</div>
                 </div>
			</div>
-->
	<div class="row2">
				<div class="val">
                    <div class="text">Enter Code: <span id="ctl00_cphMain_ctl00_RequiredFieldValidator2" class="NormalFooter" style="color:Red;display:show;">(*)</span><img src="captcha.php" border="0" /></div>
					<div class="tb_container tb_textbox_container"> 
					<div><input name="vercode" type="text" maxlength="30" id="vercode" class="textbox" tabindex="8" /></div>
					</div>
                 </div>
			</div>
			<div class="row2">
			
	<input type="reset" value="Reset" style="4background-image:url(../images/btnsubmit.jpg); width:87px; height:24px"/>
	<input type="submit" style="4background-image:url(../images/btnsubmit.jpg); width:87px; height:24px" value="Submit" />	</td>
                </div>
			</div>

</form>

</tbody></table>
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

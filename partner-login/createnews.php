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
     $title = addslashes( $_POST['title'] );
    $contents = addslashes( $_POST['contents'] );
   
	$timepost = date("Y-m-d H:i:s", time());  

  
    // Tien hanh tao News moi

    @$a=mysql_query("INSERT INTO news (title, contents, date) VALUES ('{$title}', '{$contents}' , '{$timepost}')");
  
}
//kiem tra role phai la admin ko thi moi duoc vao trang nay
	if  ( $_SESSION['role'] == "Admin" ) 
{
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>

<meta id="MetaKeywords" name="KEYWORDS" content="RYNAN Technologies India Pte Ltd, rynantech.com, QR code track &amp; trace, variable data, Alphanumeric, logos, date/time, expiry date, Julian date, shift code, counter/lot box code, multiple types of variable barcodes, and database,
Thermal Inkjet Inks, Thermal Inkjet Coder, R1010 Thermal Inkjet Coder, B1040 Thermal Inkjet Coder, B1040H Thermal Inkjet Coder, B1040He Thermal Inkjet Coder, 1200 Thermal Inkjet Coder, 1200e Thermal Inkjet Coder, 1200EG Thermal Inkjet Coder, R2172C Piezo Inkjet Printers, Hybrid Printer, HybridJET 35 digital printing, HybridJET 65 Lottery ticket application, Internet of Jet Printer, IOJ100, IOJ200, Multi Printer control software, Solvent ink for semi and non-porous media, SoluJET">

<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
<title>CREATE NEWS </title>

	<link href="https://rynantech.com/wp-content/themes/solid-v2-wp/favicon.ico" rel="shortcut icon" type="image/x-icon" />
    <link type="text/css" rel="stylesheet" href="./sites/css/style.css" />
    <link href="./sites/css/login.css" rel="stylesheet" type="text/css" />


<link href="./sites/css/vjet.css" rel="stylesheet" type="text/css">
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
		<div><p align="justify" class="mem_acc">&nbsp;&nbsp;&nbsp;&nbsp;Create News</p></div>
			<div><p class="welcomeuser"><a href="info.php" class="hrlink"><font size="12" color="#fff" class="rightpn">Welcome <?=$_SESSION['fullname'];?></font></a>&nbsp;<a href="logout.php"><font color="red">[Logout]</font></a></div>

		</td>
	</tr>
</table>
	<div><p class="backtoindex"><a href="./cpnews.php" class="hrlink"><font size="12" color="#fff" class="rightpnhome">Back to index</p></font></a></div>





	<tr>
		<td>
		<p align="justify" style="margin: 12px 22px; margin-left: 322px;"><b><span style="font-size: 16px;">Create news to the Partners</span></font></b></p>


		<p align="justify" style="margin: 12px 22px; margin-left: 322px;"><b><span style="font-size: 13px;"><span style="color:#ff0000">
<?php
 // Thông báo hoàn tất việc tạo tài khoản
     

if ($a)
        print "The news has been created";
    else
        print "";

?>


</span></span></font></b></p>



<form action="createnews.php?act=do" method="post">

	<div class="row2">
			<div class="row2">
				<div class="val">
                    <div class="text">Title: <span id="ctl00_cphMain_ctl00_RequiredFieldValidator2" class="NormalFooter" style="color:Red;display:show;">(*)</span></div>
					<div class="tb_container tb_textbox_container">    
					<div><input name="title" type="text" style="width:600px;" id="title" class="textbox" tabindex="3" /></div>
					</div>
                 </div>
			</div>
	<div class="row2">
				<div class="val">
                    <div class="text">Contents: <span id="ctl00_cphMain_ctl00_RequiredFieldValidator2" class="NormalFooter" style="color:Red;display:show;">(*)</span></div>
					<div class="">    
					<div>

					<div><textarea rows="8" cols="60" name="contents" id="contents"  class="ckeditor"></textarea>
	
</div>
					</div>
                 </div>

			</div>
			<div class="row2">
			
		<p align="justify" style="margin: 12px 22px; margin-left: 50px;"><b><span style="font-size: 13px;">
	<input type="reset" value="Reset" style="4background-image:url(../images/btnsubmit.jpg); width:87px; height:24px"/>
	<input type="submit" style="4background-image:url(../images/btnsubmit.jpg); width:87px; height:24px" value="Submit" />	</td>
			</p>
                </div>
			</div>

</form>
	
	
		</td>
	</tr>
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
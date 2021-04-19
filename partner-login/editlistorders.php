<?php
session_start();

date_default_timezone_set('Asia/Bangkok');

require ("./db_config.php");

if( isset ($_GET['edit']))

    $orderdetailsid = $_GET['edit'];

    $orderdetailsid = $_GET['id'];

    $res = mysql_query("SELECT * FROM orderdetails WHERE orderdetailsid='$orderdetailsid'");


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
    <link type="text/css" rel="stylesheet" href="./sites/css/style.css" />
    <link href="./sites/css/login.css" rel="stylesheet" type="text/css" />

<link href="../images/vjet.css" rel="stylesheet" type="text/css">
</head>

<body  >
	<div id="Editinformation">



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


<table border="0" cellpadding="0" cellspacing="0" width="981">
	<tr>
		<td bgcolor="#005FA3" class="white" height="">
		<div><p align="justify" class="mem_acc">&nbsp;&nbsp;&nbsp;&nbsp;EDIT LIST PARTNER</p></div>
			<div><p class="welcomeuser"><a href="info.php" class="hrlink"><font size="44" color="#fff" class="rightpn">Welcome <?=$_SESSION['fullname'];?></font></a>&nbsp;<a href="logout.php"><font color="red">[Logout]</font></a></div>

	
		</td>
	</tr>
</table>


	<div><p class="backtoindex"><a href="/partner-login/listorders.php" class="hrlink"><font size="12" color="#fff" class="rightpnhome">Back to index</p></font></a></div>


	<tr>
		<td>
<!-- 
<?php

    //----Noi dung thong bao sau khi sua ---//

    $thanhcong='<p align="justify" style="color: #FF0000; margin-left:252px; margin-right:22px; margin-top:12px; margin-bottom:12px"> Edit sucessfull <a href="./listpartner.php">Back</a></p>';
 
$kothanh='<p align="justify" style="color: #FF0000; margin-left:252px; margin-right:22px; margin-top:12px; margin-bottom:12px"> Edit unsucessfull</p>';
	$thongbao='<p align="justify" style="color: #FF0000; margin-left:252px; margin-right:22px; margin-top:12px; margin-bottom:12px">Date of birth invalid.</p>';
     echo "<b>  <br>&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;Editing Product {$row['productname']}</b>.<br>";

//ma id de WHERE
$orderdetailsid=$_GET['id'];

    if ($_GET['do']=="edit") {



	$dateorder = date("Y-m-d H:i:s", time());  
        $productname = addslashes( $_POST['productname'] );
        $quantity = addslashes( $_POST['quantity'] );
      

        $sql="
        UPDATE `orderdetails` SET
        date='$dateorder', 
        `productname` = '".$productname."',
        `quantity` = '".$quantity."'
         WHERE `orderdetailsid` ='$orderdetailsid';";
 
$sua=mysql_query($sql);

        if ($sua=mysql_query($sql))
            echo $thanhcong;

        else
            echo $kothanh;
 

echo "<meta http-equiv='refresh' content='0;url=/partner-login/listorders.php'>";

    }

?> -->

<?php

    //----Noi dung thong bao sau khi sua ---//

    $thanhcong='<p align="justify" style="color: #FF0000; margin-left:252px; margin-right:22px; margin-top:12px; margin-bottom:12px"> Edit sucessfull <a href="./listpartner.php">Back</a></p>';
 
$kothanh='<p align="justify" style="color: #FF0000; margin-left:252px; margin-right:22px; margin-top:12px; margin-bottom:12px"> Edit unsucessfull</p>';
	$thongbao='<p align="justify" style="color: #FF0000; margin-left:252px; margin-right:22px; margin-top:12px; margin-bottom:12px">Date of birth invalid.</p>';
     echo "<b>  <br>&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;Editing Product {$row['productname']}</b>.<br>";





    if ($_GET['do']=="edit") {
$orderdetailsid=$_POST['orderdetailsid'];
$quantity = addslashes( $_POST['quantity'] );
    $price = addslashes( $_POST['price'] );
    $dateedit = addslashes( $_POST['dateedit'] );
	$dateedit = date("Y-m-d H:i:s", time());  
    $total = addslashes( $_POST['total'] );
    $total = $price * $quantity;
//echo "<script>alert('$orderdetailsid');</script>";
$sql = "UPDATE orderdetails SET quantity='$quantity', total='$total', dateedit='$dateedit' WHERE orderdetailsid='$orderdetailsid'";


mysql_query($sql);
 

 

        if ($sua=mysql_query($sql))
            echo $thanhcong;
        else
            echo $kothanh;
 

echo "<meta http-equiv='refresh' content='0;url=/partner-login/listorders.php'>";
        

    }

?>


<form method="post" action="?do=edit">

<div id="editaccount">

      <input type="hidden" name="orderdetailsid" value="<?php echo $row[0]; ?>" >


			<div class="row2">
				<div class="val">
                    <div class="text">Product Name: <span id="ctl00_cphMain_ctl00_RequiredFieldValidator2" class="NormalFooter" style="color:Red;display:show;">
						(*)</span></div>
					<div class="tb_container tb_textbox_container">    
					<div><input name="productname" type="text"  disabled maxlength="30" value="<?php echo $row['productname']; ?>" id="productname" class="textbox" tabindex="3" /></div>
					</div>
                 </div>
			</div>


	<div><input name="price" type="hidden" maxlength="30" value="<?php echo $row['price']; ?>" id="price" class="textbox" tabindex="3" /></div>
				
	<div class="row2">
				<div class="val">
                    <div class="text">Quantity: <span id="ctl00_cphMain_ctl00_RequiredFieldValidator2" class="NormalFooter" style="color:Red;display:show;">
						(*)</span></div>
					<div class="tb_container tb_textbox_container">    
					<div><input name="quantity" type="text" maxlength="30" value="<?php echo $row['quantity']; ?>" id="quantity" class="textbox" tabindex="3" /></div>
					</div>
                 </div>
			</div>

			<div class="row2">
					<input type="reset" value="Reset" style="4background-image:url(../images/btnsubmit.jpg); width:87px; height:24px"/>
	<input type="submit" style="4background-image:url(../images/btnsubmit.jpg); width:87px; height:24px" value="Submit" />	</td>


                </div>
			</div>
</form>

			
		</td>
	</tr>
</table>



</td>
</p>

 <tr>
    <td><table border="0" cellpadding="0" cellspacing="0" width="980">
      <tbody><tr>
        <td bgcolor="#bababa" height="1"></td>
      </tr>


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
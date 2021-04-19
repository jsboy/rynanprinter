
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">


<html xmlns="http://www.w3.org/1999/xhtml">

<head>

<script src="http://www.google.com/jsapi" type="text/javascript"></script>
   <meta name="keywords" content="Vjetstore.com, Vjet1000 Printers, Hydrajet, Solujet, Mylan Group, CTP Plates, A reliable and WIFI connected compact size inkjet printer and inks for packaging pringtings with the lowest price on the market">
    <meta name="description" content="Vjetstore.com, Vjet1000 Printers, Hydrajet, Solujet, Mylan Group, CTP Plates, A reliable and WIFI connected compact size inkjet printer and inks for packaging pringtings with the lowest price on the market">

<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
<title>DELETE LINK </title>
    <link type="text/css" rel="stylesheet" href="./sites/css/style.css" />

<link href="../images/vjet.css" rel="stylesheet" type="text/css">

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

	<div id="partnerhomeinfo">



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
		<div><p align="justify" class="mem_acc">&nbsp;&nbsp;&nbsp;&nbsp;Delete link</p></div>
		<div><p class="welcomeuser"><a href="info.php" class="hrlink"><font size="44" color="#fff" class="rightpn">Welcome <?=$_SESSION['fullname'];?></font></a>&nbsp;<a href="logout.php"><font color="red">[Logout]</font></a></div>
		</td>
	</tr>
</table>


	<div><p class="backtoindex"><a href="/partner-login" class="hrlink"><font size="12" color="#fff" class="rightpnhome">Back to index</p></font></a></div>
<br><br><br>
<font size="10" color="red" class="messagedel">
  <?php
     include "./db_config.php";

// get value of id that sent from address bar 
$id=$_GET['id'];

//echo"<script>alert('$id')</script>";
// Delete data in mysql from row that has this id 
$sql="DELETE FROM download WHERE id='$id'";
$result=mysql_query($sql);

// if successfully deleted
if($result){
echo "Deleted Successfull";
echo "<BR>";
//echo "<a href='/partner-login/historylog.php'>Back to main page</a>";
echo "<meta http-equiv='refresh' content='0;url=/partner-login/cplistdownload.php'>";
}

else {
echo "ERROR";
}

      ?>
</font>

<br><br><br><br><br><br><br><br><br><br><br><br><br><br>
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


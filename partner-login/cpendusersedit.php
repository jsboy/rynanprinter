<?php
session_start();

date_default_timezone_set('Asia/Bangkok');
require ("./db_config.php");

if( isset ($_GET['edit']))

    $id = $_GET['edit'];

    $id = $_GET['id'];

    $res = mysql_query("SELECT * FROM endusers WHERE id='$id'");


    $row = mysql_fetch_array( $res );



//kiem tra role phai la admin ko thi moi duoc vao trang nay
	if  ( $_SESSION['role'] == "Admin" ) 
{
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<script src="http://www.google.com/jsapi" type="text/javascript"></script>
   <meta name="keywords" content="rynantech.com, Vjet1000 Printers, Hydrajet, Solujet, Mylan Group, CTP Plates, A reliable and WIFI connected compact size inkjet printer and inks for packaging pringtings with the lowest price on the market">
    <meta name="description" content="rynantech.com, Vjet1000 Printers, Hydrajet, Solujet, Mylan Group, CTP Plates, A reliable and WIFI connected compact size inkjet printer and inks for packaging pringtings with the lowest price on the market">

<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>EDIT INFORMATION</title>	



	<link href="http://rynantech.com/wp-content/themes/solid-v2-wp/favicon.ico" rel="shortcut icon" type="image/x-icon" />

    <link type="text/css" rel="stylesheet" href="./sites/css/style.css" />
    <link href="./sites/css/login.css" rel="stylesheet" type="text/css" />

<link href="./sites/css/vjet.css" rel="stylesheet" type="text/css">


</head>

<body  >


<?php
include("header.html");
?>
	<div id="Editinformation">



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
		<td bgcolor="#7bc545" class="white" height="">
		<div><p align="justify" class="mem_acc">&nbsp;&nbsp;&nbsp;&nbsp;Edit Information of End Users</p></div>
			<div><p class="welcomeuser"><a href="info.php" class="hrlink"><font size="44" color="#fff" class="rightpn">Welcome <?=$_SESSION['fullname'];?></font></a>&nbsp;<a href="logout.php"><font color="red">[Logout]</font></a></div>

	
		</td>
	</tr>
</table>


	<div><p class="backtoindex"><a href="/partner-login/cpendusers.php" class="hrlink"><font size="12" color="#fff" class="rightpnhome">Back to index</p></font></a></div>


	<tr>
		<td>

<?php

    //----Noi dung thong bao sau khi sua ---//

    $thanhcong='<p align="justify" style="color: #FF0000; margin-left:252px; margin-right:22px; margin-top:12px; margin-bottom:12px"> Edit sucessfull <a href="./cpendusers.php">Back</a></p>';
 
$kothanh='<p align="justify" style="color: #FF0000; margin-left:252px; margin-right:22px; margin-top:12px; margin-bottom:12px"> Edit unsucessfull</p>';
	$thongbao='<p align="justify" style="color: #FF0000; margin-left:252px; margin-right:22px; margin-top:12px; margin-bottom:12px">Date of birth invalid.</p>';
     echo "<b>  <br>&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;Editing the {$row['company']}</b>.<br>";

//ma id de WHERE
    $id = $_POST['id'];

    if ($_GET['do']=="edit") {

    $user_id = $_GET['id'];
        $company = addslashes( $_POST['company'] );   
	$country = addslashes( $_POST['country'] );
    $classification = addslashes( $_POST['classification'] );
   $address = addslashes( $_POST['address'] );
    $contact = addslashes( $_POST['contact'] );
    $phone = addslashes( $_POST['phone'] );
    $email = addslashes( $_POST['email'] );
    $website = addslashes( $_POST['website'] );
    $notes = addslashes( $_POST['notes'] );
    $lastupdate = addslashes( $_POST['lastupdate'] );
	$lastupdate = date("Y-m-d H:i:s", time());  
        $sql="
        UPDATE `endusers` SET
        `company` = '".$company."',
        `country` = '".$country."',
        `classification` = '".$classification."',
        `address` = '".$address."',
        `contact` = '".$contact."',
        `phone` = '".$phone."',
        `email` = '".$email."',
        `website` = '".$website."',
        `lastupdate` = '".$lastupdate."',
        `notes` = '".$notes."' WHERE `id` =$id ;";
 

        if ($sua=mysql_query($sql))
            echo $thanhcong;
        else
            echo $kothanh;
 

echo "<meta http-equiv='refresh' content='0;url=/partner-login/cpendusers.php'>";

    }

?>




<form method="post" action="?do=edit">

<div id="editaccount">

      <input type="hidden" name="id" value="<?php echo $row[0]; ?>" >
			<div class="row2">
				<div class="val">
                    <div class="text">Company: <span id="ctl00_cphMain_ctl00_RequiredFieldValidator2" class="NormalFooter" style="color:Red;display:show;">
						(*)</span></div>
					<div class="tb_container tb_textbox_container">    
					<div><input name="company" type="text" maxlength="230" value="<?php echo $row['company']; ?>" id="company" class="textbox" tabindex="3" /></div>
					</div>
                 </div>
			</div>


	<!-- <div class="row2">
				<div class="val">
                    <div class="text">Printers: <span id="ctl00_cphMain_ctl00_RequiredFieldValidator2" class="NormalFooter" style="color:Red;display:show;">
						(*)</span></div>
					<div class="tb_container tb_textbox_container">    
					<div>
 <select name="printers" id="printers"   style="width: 260px">
            <option value="<?php echo $row['printers']; ?>" selected><?php echo $row['printers']; ?> - Current</option>
          <option value="Vjet1000" >Vjet1000</option>	
            <option value="Vjet1020" >Vjet1020</option>
            <option value="Vjet2172" >Vjet2172</option>
            <option value="Inkjet Inks" >Inkjet Inks</option>
            <option value="Others">Others</option>
        </select>

</div>
					</div>
                 </div>
			</div> -->

	<div class="row2">
				<div class="val">
                    <div class="text">Country: <span id="ctl00_cphMain_ctl00_RequiredFieldValidator2" class="NormalFooter" style="color:Red;display:show;">
						(*)</span></div>
					<div class="tb_container tb_textbox_container">    
					<div><input name="country" type="text" maxlength="230" value="<?php echo $row['country']; ?>" id="country" class="textbox" tabindex="3" /></div>
					</div>
                 </div>
			</div>

	<div class="row2">
				<div class="val">
                    <div class="text">Classification: <span id="ctl00_cphMain_ctl00_RequiredFieldValidator2" class="NormalFooter" style="color:Red;display:show;">
						(*)</span></div>
					<div class="tb_container tb_textbox_container">    
					<div><input name="classification" type="text" maxlength="230" value="<?php echo $row['classification']; ?>" id="classification" class="textbox" tabindex="3" /></div>
					</div>
                 </div>
			</div>
	<div class="row2">
				<div class="val">
                    <div class="text">address: <span id="ctl00_cphMain_ctl00_RequiredFieldValidator2" class="NormalFooter" style="color:Red;display:show;">
						(*)</span></div>
					<div class="tb_container tb_textbox_container">    
					<div><input name="address" type="text" maxlength="230" value="<?php echo $row['address']; ?>" id="address" class="textbox" tabindex="3" /></div>
					</div>
                 </div>
			</div>
	<div class="row2">
				<div class="val">
                    <div class="text">Contact: <span id="ctl00_cphMain_ctl00_RequiredFieldValidator2" class="NormalFooter" style="color:Red;display:show;">
						(*)</span></div>
					<div class="tb_container tb_textbox_container">    
					<div><input name="contact" type="text" maxlength="230" value="<?php echo $row['contact']; ?>" id="contact" class="textbox" tabindex="3" /></div>
					</div>
                 </div>
			</div>
	<div class="row2">
				<div class="val">
                    <div class="text">Phone: <span id="ctl00_cphMain_ctl00_RequiredFieldValidator2" class="NormalFooter" style="color:Red;display:show;">
						(*)</span></div>
					<div class="tb_container tb_textbox_container">    
					<div><input name="phone" type="text" maxlength="230" value="<?php echo $row['phone']; ?>" id="phone" class="textbox" tabindex="3" /></div>
					</div>
                 </div>
			</div>

	<div class="row2">
				<div class="val">
                    <div class="text">Email: <span id="ctl00_cphMain_ctl00_RequiredFieldValidator2" class="NormalFooter" style="color:Red;display:show;">
						(*)</span></div>
					<div class="tb_container tb_textbox_container">    
					<div><input name="email" type="text" maxlength="230" value="<?php echo $row['email']; ?>" id="email" class="textbox" tabindex="3" /></div>
					</div>
                 </div>
			</div>

	<div class="row2">
				<div class="val">
                    <div class="text">Website: <span id="ctl00_cphMain_ctl00_RequiredFieldValidator2" class="NormalFooter" style="color:Red;display:show;">
						(*)</span></div>
					<div class="tb_container tb_textbox_container">    
					<div><input name="website" type="text" maxlength="230" value="<?php echo $row['website']; ?>" id="website" class="textbox" tabindex="3" /></div>
					</div>
                 </div>
			</div>

		
	<div class="row2">
				<div class="val">
                    <div class="text">Notes: <span id="ctl00_cphMain_ctl00_RequiredFieldValidator2" class="NormalFooter" style="color:Red;display:show;">
						</span></div>
					<div class="tb_container tb_textbox_container">    
					<div><input name="notes" type="text" maxlength="1130" value="<?php echo $row['notes']; ?>" id="notes" class="textbox" tabindex="9" /></div>
					</div>
                 </div>
			</div>
<!-- 	<div class="row2">
				<div class="val">
                    <div class="text">Views: <span id="ctl00_cphMain_ctl00_RequiredFieldValidator2" class="NormalFooter" style="color:Red;display:show;">
						</span></div>
					<div class="tb_container tb_textbox_container">    
					<div><input name="views" type="text" maxlength="30" value="<?php echo $row['views']; ?>" id="views" class="textbox" tabindex="9" /></div>
					</div>
                 </div>
			</div> -->
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

<br><br><br><br><br><br>
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
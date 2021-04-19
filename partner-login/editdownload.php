<?php
session_start();

date_default_timezone_set('Asia/Bangkok');
require ("./db_config.php");

if( isset ($_GET['edit']))

    $id = $_GET['edit'];

    $id = $_GET['id'];

    $res = mysql_query("SELECT * FROM download WHERE id='$id'");


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
<title>EDIT FILES DOWNLOAD</title>
	<link href="http://rynantech.com/wp-content/themes/solid-v2-wp/favicon.ico" rel="shortcut icon" type="image/x-icon" />
    <link type="text/css" rel="stylesheet" href="./sites/css/style.css" />
    <link type="text/css" rel="stylesheet" href="./sites/css/login.css" />

<link href="./sites/css/vjet.css" rel="stylesheet" type="text/css">
</head>

<body  >



<?php
include("header.html");
?>	<div id="Editinformation">


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
		<div><p align="justify" class="mem_acc">&nbsp;&nbsp;&nbsp;&nbsp;Edit Files Download</p></div>
			<div><p class="welcomeuser"><a href="info.php" class="hrlink"><font size="44" color="#fff" class="rightpn">Welcome <?=$_SESSION['fullname'];?></font></a>&nbsp;<a href="logout.php"><font color="red">[Logout]</font></a></div>

	
		</td>
	</tr>
</table>


	<div><p class="backtoindex"><a href="/partner-login/cplistdownload.php" class="hrlink"><font size="12" color="#fff" class="rightpnhome">Back to index</p></font></a></div>


	<tr>
		<td>

<?php

    //----Noi dung thong bao sau khi sua ---//

    $thanhcong='<p align="justify" style="color: #FF0000; margin-left:252px; margin-right:22px; margin-top:12px; margin-bottom:12px"> Edit sucessfull <a href="./listpartner.php">Back</a></p>';
 
$kothanh='<p align="justify" style="color: #FF0000; margin-left:252px; margin-right:22px; margin-top:12px; margin-bottom:12px"> Edit unsucessfull</p>';
	$thongbao='<p align="justify" style="color: #FF0000; margin-left:252px; margin-right:22px; margin-top:12px; margin-bottom:12px">Date of birth invalid.</p>';
     echo "<b>  <br>&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;Editing file {$row['filename']}</b>.<br>";

//ma id de WHERE
    $id = $_POST['id'];

    if ($_GET['do']=="edit") {

    $user_id = $_GET['id'];
        $filename = addslashes( $_POST['filename'] );
        $type = addslashes( $_POST['type'] );
        $link = addslashes( $_POST['link'] );
        $notes = addslashes( $_POST['notes'] );
        $views = addslashes( $_POST['views'] );
    $lastupdate = addslashes( $_POST['lastupdate'] );
	$lastupdate = date("Y-m-d H:i:s", time());  
        $sql="
        UPDATE `download` SET
        `filename` = '".$filename."',
        `type` = '".$type."',
        `link` = '".$link."',
        `views` = '".$views."',
        `lastupdate` = '".$lastupdate."',
        `notes` = '".$notes."' WHERE `id` =$id ;";
 

        if ($sua=mysql_query($sql))
            echo $thanhcong;
        else
            echo $kothanh;
 

echo "<meta http-equiv='refresh' content='0;url=/partner-login/cplistdownload.php'>";

    }

?>




<form method="post" action="?do=edit">

<div id="editaccount">

      <input type="hidden" name="id" value="<?php echo $row[0]; ?>" >
			<div class="row2">
				<div class="val">
                    <div class="text">Filename: <span id="ctl00_cphMain_ctl00_RequiredFieldValidator2" class="NormalFooter" style="color:Red;display:show;">
						(*)</span></div>
					<div class="tb_container tb_textbox_container">    
					<div><input name="filename" type="text" maxlength="230" value="<?php echo $row['filename']; ?>" id="filename" class="textbox" tabindex="3" /></div>
					</div>
                 </div>
			</div>
	<div class="row2">
				<div class="val">
                    <div class="text">Type: <span id="ctl00_cphMain_ctl00_RequiredFieldValidator2" class="NormalFooter" style="color:Red;display:show;">
						(*)</span></div>
					<div class="tb_container tb_textbox_container">    
					<div><!-- 
<input name="type" type="text" maxlength="230" value="<?php echo $row['type']; ?>" id="type" class="textbox" tabindex="3" /> -->
 <select name="type" id="type"   style="width: 260px"><!-- 
    <option value="-1" selected="selected" disabled="disabled">-- Select Column Name --</option> -->
            <option value="<?php echo $row['type']; ?>" selected><?php echo $row['type']; ?> - Current</option>
            <option value="Firmware" >Firmware</option>	
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
                    <div class="text">Link: <span id="ctl00_cphMain_ctl00_RequiredFieldValidator2" class="NormalFooter" style="color:Red;display:show;">
						(*)</span></div>
					<div class="tb_container tb_textbox_container">    
					<div><input name="link" type="text" maxlength="230" value="<?php echo $row['link']; ?>" id="link" class="textbox" tabindex="3" /></div>
					</div>
                 </div>
			</div>

		
	<div class="row2">
				<div class="val">
                    <div class="text">Notes: <span id="ctl00_cphMain_ctl00_RequiredFieldValidator2" class="NormalFooter" style="color:Red;display:show;">
						</span></div>
					<div class="tb_container tb_textbox_container">    
					<div><input name="notes" type="text" maxlength="30" value="<?php echo $row['notes']; ?>" id="notes" class="textbox" tabindex="9" /></div>
					</div>
                 </div>
			</div>
		
	<div class="row2">
				<div class="val">
                    <div class="text">Views: <span id="ctl00_cphMain_ctl00_RequiredFieldValidator2" class="NormalFooter" style="color:Red;display:show;">
						</span></div>
					<div class="tb_container tb_textbox_container">    
					<div><input name="views" type="text" maxlength="30" value="<?php echo $row['views']; ?>" id="views" class="textbox" tabindex="9" /></div>
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
    <td class="bottom" align="center" height="28">
<strong>&reg; 2014 RYNAN TECHNOLOGIES PTE. LTD. </strong>
  </tr>
</tbody></table>


</div>
</body></html>

<?php
}
 else
{
require_once ("./login.php");

}
?>
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
<meta id="MetaKeywords" name="KEYWORDS" content="RYNAN Technologies Pte Ltd, rynantech.com, QR code track &amp; trace, variable data, Alphanumeric, logos, date/time, expiry date, Julian date, shift code, counter/lot box code, multiple types of variable barcodes, and database,
Thermal Inkjet Inks, Thermal Inkjet Coder, R1010 Thermal Inkjet Coder, B1040 Thermal Inkjet Coder, B1040H Thermal Inkjet Coder, B1040He Thermal Inkjet Coder, 1200 Thermal Inkjet Coder, 1200e Thermal Inkjet Coder, 1200EG Thermal Inkjet Coder, R2172C Piezo Inkjet Printers, Hybrid Printer, HybridJET 35 digital printing, HybridJET 65 Lottery ticket application, Internet of Jet Printer, IOJ100, IOJ200, Multi Printer control software, Solvent ink for semi and non-porous media, SoluJET">

<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>EDIT FILES
</title>	<link href="http://rynantech.com/wp-content/themes/solid-v2-wp/favicon.ico" rel="shortcut icon" type="image/x-icon" />
    <link type="text/css" rel="stylesheet" href="./sites/css/style.css" />  <link type="text/css" rel="stylesheet" href="./sites/css/login.css" />

    <link type="text/css" rel="stylesheet" href="./sites/css/vjet.css" />


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
		<div><p align="justify" class="mem_acc">&nbsp;&nbsp;&nbsp;&nbsp;EDIT FILES</p></div>
			<div><p class="welcomeuser"><a href="info.php" class="hrlink"><font size="44" color="#fff" class="rightpn">Welcome <?=$_SESSION['fullname'];?></font></a>&nbsp;<a href="logout.php"><font color="red">[Logout]</font></a></div>

	
		</td>
	</tr>
</table>


	<div><p class="backtoindex"><a href="/partner-login/downloadcp.php" class="hrlink"><font size="12" color="#fff" class="rightpnhome">Back to index</p></font></a></div>


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
        $printers = addslashes( $_POST['printers'] );
        $link = addslashes( $_POST['link'] );
        $notes = addslashes( $_POST['notes'] );
        $views = addslashes( $_POST['views'] );
    $lastupdate = addslashes( $_POST['lastupdate'] );
	$lastupdate = date("Y-m-d H:i:s", time());  
        $sql="
        UPDATE `download` SET
        `filename` = '".$filename."',
        `type` = '".$type."',
        `printers` = '".$printers."',
        `link` = '".$link."',
        `views` = '".$views."',
        `lastupdate` = '".$lastupdate."',
        `notes` = '".$notes."' WHERE `id` =$id ;";
 

        if ($sua=mysql_query($sql))
            echo $thanhcong;
        else
            echo $kothanh;
 

echo "<meta http-equiv='refresh' content='0;url=/partner-login/downloadcp.php'>";

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
         <option value="FIRMWARE" >FIRMWARE</option>	
            <option value="SOFTWARE" >SOFTWARE</option>
           <option value="BROCHURE" >BROCHURE</option>
            <option value="USER MANUAL" >USER MANUAL</option>
            <option value="OTHERS">OTHERS</option>
        </select>

</div>
					</div>
                 </div>
			</div>

	<div class="row2">
				<div class="val">
                    <div class="text">Printers: <span id="ctl00_cphMain_ctl00_RequiredFieldValidator2" class="NormalFooter" style="color:Red;display:show;">
						(*)</span></div>
					<div class="tb_container tb_textbox_container">    
					<div><!-- 
<input name="type" type="text" maxlength="230" value="<?php echo $row['type']; ?>" id="type" class="textbox" tabindex="3" /> -->
 <select name="printers" id="printers"   style="width: 260px"><!-- 
    <option value="-1" selected="selected" disabled="disabled">-- Select Column Name --</option> -->
            <option value="<?php echo $row['printers']; ?>" selected><?php echo $row['printers']; ?> - Current</option>
           <option value="W1000" >W1000</option>
            <option value="R1010" >R1010</option>
            <option value="W1020" >W1020</option>
		  	<option value="B1040" >B1040</option>	
			<option value="B1040H Aluminum" >B1040H Aluminum</option>	
			<option value="B1040H Plastic" >B1040H Plastic</option>	
			<option value="B1040S" >B1040S</option>	
			<option value="B1040P" >B1040P</option>	
            <option value="1200" >1200</option>
            <option value="1200E" >1200E</option>
            <option value="1200Plus" >1200Plus</option>
            <option value="1200EG" >1200EG</option>
            <option value="2172C">2172C</option>
            <option value="IOJ100" >IOJ100</option>
            <option value="IOJ200" >IOJ200</option>
            <option value="InkFeeder8">InkFeeder8</option>
            <option value="SBI">SBI</option>
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
					<div class="">    
						<div><textarea class="input" rows="6" cols="35" name="notes" type="text" id="notes" class="textbox" tabindex="9"><?php echo "".$row['notes']." <br>"; ?></textarea></div>
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
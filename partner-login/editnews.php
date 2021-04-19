<?php
session_start();

date_default_timezone_set('Asia/Bangkok');


require ("./db_config.php");

if( isset ($_GET['edit']))

    $id = $_GET['edit'];

    $id = $_GET['id'];

    $res = mysql_query("SELECT * FROM news WHERE id='$id'");


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

<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
<title>NEWS FOR PARTNERS </title>
	<link href="http://rynantech.com/wp-content/themes/solid-v2-wp/favicon.ico" rel="shortcut icon" type="image/x-icon" />
    <link type="text/css" rel="stylesheet" href="./sites/css/style.css" />
    <link href="./sites/css/login.css" rel="stylesheet" type="text/css" />
	<link href="./sites/css/vjet.css" rel="stylesheet" type="text/css">
<script src="https://cdn.ckeditor.com/4.9.1/standard/ckeditor.js"></script>
	<script>
			CKEDITOR.replace( 'editor1' );
		</script>

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
		<div><p align="justify" class="mem_acc">&nbsp;&nbsp;&nbsp;&nbsp;Edit News</p></div>
			<div><p class="welcomeuser"><a href="info.php" class="hrlink"><font size="12" color="#fff" class="rightpn">Welcome <?=$_SESSION['fullname'];?></font></a>&nbsp;<a href="logout.php"><font color="red">[Logout]</font></a></div>

		</td>
	</tr>
</table>
	<div><p class="backtoindex"><a href="./cpnews.php" class="hrlink"><font size="12" color="#fff" class="rightpnhome">Back to index</p></font></a></div>





	<tr>
		<td>

		<p align="justify" style="margin: 12px 22px; margin-left: 322px;"><b><span style="font-size: 13px;"><span style="color:#ff0000">
<?php
 // Thông báo hoàn tất việc tạo tài khoản
     

if ($a)
        print "The news has been created";
    else
        print "";

?>


</span></span></font></b></p>
	


<?php

    //----Noi dung thong bao sau khi sua ---//

    $thanhcong='<p align="justify" style="color: #FF0000; margin-left:252px; margin-right:22px; margin-top:12px; margin-bottom:12px"> Edit sucessfull <a href="/partner-login/cpnews.php">Back</a></p>';
 
$kothanh='<p align="justify" style="color: #FF0000; margin-left:252px; margin-right:22px; margin-top:12px; margin-bottom:12px"> Edit unsucessfull</p>';
	$thongbao='<p align="justify" style="color: #FF0000; margin-left:252px; margin-right:22px; margin-top:12px; margin-bottom:12px">Date of birth invalid.</p>';
     echo "<b><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Editing news {$row['title']}</b>.<br>";

//ma id de WHERE

    $id = $_POST['id'];

    if ($_GET['do']=="edit") {

    $user_id = $_GET['id'];

     $title = addslashes( $_POST['title'] );
    $contents = addslashes( $_POST['contents'] );
   
	$timepost = date("Y-m-d H:i:s", time());  

   $sql="
        UPDATE `news` SET
        date='$timepost', 
           title='$title' , 
          contents='$contents'  WHERE `id` =$id ;";
 

        if ($sua=mysql_query($sql))
            echo $thanhcong;
        else
            echo $kothanh;

echo "<meta http-equiv='refresh' content='0;url=/partner-login/cpnews.php'>";
        
    }

?>


<form method="post" action="?do=edit">
	<div class="row2">

<!-- phai co id moi update duoc -->

      <input type="hidden" name="id" value="<?php echo $row[0]; ?>" >
	<div class="row2">
				<div class="val">
                    <div class="text">Title: <span id="ctl00_cphMain_ctl00_RequiredFieldValidator2" class="NormalFooter" style="color:Red;display:show;">
						(*)</span></div>
					<div class="tb_container tb_textbox_container">    
					<div><input name="title" type="text"  style="width:600px;" value="<?php echo $row['title']; ?>" id="title" class="textbox" tabindex="3" /></div>
					</div>
                 </div>
			</div>

			<!-- <div class="row2">
				<div class="val">
                    <div class="text">Title: <span id="ctl00_cphMain_ctl00_RequiredFieldValidator2" class="NormalFooter" style="color:Red;display:show;">(*)</span></div>
					<div class="tb_container tb_textbox_container">    
					<div><input name="title" type="text" value="<?php echo $row['title']; ?>" maxlength="280" id="title" class="textbox" tabindex="3" /></div>
					</div>
                 </div>
			</div> -->
	<div class="row2">
				<div class="val">
                    <div class="text">Contents: <span id="ctl00_cphMain_ctl00_RequiredFieldValidator2" class="NormalFooter" style="color:Red;display:show; ">(*)</span></div>
					<div class="">    
					<div>
<!-- show info on ckeditor -->
     <textarea id="contents" name="contents" class="ckeditor"><?php echo $row['contents']; ?></textarea>

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
</div>	</div>	</div>	</div>	</div>
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
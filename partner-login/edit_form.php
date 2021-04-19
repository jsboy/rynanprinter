<?php
session_start();

include_once('./db_config.php');

if( isset ($_GET['edit']))

    $id = $_GET['edit'];

    $id = $_GET['id'];

    $res = mysql_query("SELECT * FROM members WHERE id='$id'");


    $row = mysql_fetch_array( $res );

if( isset ($_POST['fullname']))

    $fullname = $_POST['fullname'];

    $id = $_POST['id'];

    $sql =  "UPDATE members SET fullname='$fullname' WHERE id='$id'";


    $res = mysql_query( $sql ) or die ("ko ket noi".mysql_error());



?>

<html>
<head>
<title>Form Edit Data</title>
</head>

<body>
<table border=1>
  <tr>
    <td align=center>Form Edit Employees Data</td>
  </tr>
  <tr>
    <td>
      <table>
<?php

    //----Noi dung thong bao sau khi sua ---//

    $thanhcong='<p align="justify" style="margin-left:252px; margin-right:22px; margin-top:12px; margin-bottom:12px">Edit sucessfull <a href="./index.php">Back</a></p>';
 
$kothanh='<p align="justify" style="color: #FF0000">Edit unsucessfull</p>';
	$thongbao='<p align="justify" style="color: #FF0000; margin-left:252px; margin-right:22px; margin-top:12px; margin-bottom:12px">Date of birth invalid.</p>';
     echo "<b>  <br>&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;Editing account {$member['user']}</b>.<br>";

    $id = $_POST['id'];

    if ($_GET['do']=="edit") {

        $fullname = addslashes( $_POST['fullname'] );
        $company = addslashes( $_POST['company'] );
       
        $sql="
        UPDATE `members` SET
       
        `fullname` = '".$fullname."',
        `company` = '".$company."' WHERE `id` =$id ;";
 

        if ($sua=mysql_query($sql))
            echo $thanhcong;
        else
            echo $kothanh;
 
    }

?>

      <form method="post" action="?do=edit">
 <tr>        
          <td>fullname</td>
          <td>
            <input type="text" name="fullname" 
        size="20" value="<?php echo $row['fullname']; ?>" >
          </td>
        </tr>

 <tr>        
          <td>company</td>
          <td>
            <input type="text" name="company" 
        size="20" value="<?php echo $row['company']; ?>" >
          </td>
        </tr>

      <input type="hidden" name="id" value="<?php echo $row[0]; ?>" >
       
     
        <tr>
          <td align="right">
            <input type="submit" 
          name="submit value" value="Edit">
          </td>
        </tr>
      </form>
      </table>
    </td>
  </tr>
</table>
</body>
</html>

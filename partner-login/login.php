<?php
session_start();
date_default_timezone_set('Asia/Bangkok');
setcookie(AboutVisit, time (), $Month) ; 
//tao cookie cho remember me
 $year = time() + 31536000;
setcookie('remember_me', $_POST['user'], $year);

if($_POST['remember']) {
setcookie('remember_me', $_POST['user'], $year);
}
elseif(!$_POST['remember']) {
	if(isset($_COOKIE['remember_me'])) {
		$past = time() - 100;
		setcookie(remember_me, gone, $past);
	}
}
//end 
 if (file_exists("install"))
{
header('Content-Type: text/html; charset=UTF-8');
echo "Vui lòng xóa file ./install/ trên Host hoặc trên localhost của bạn. Sau đó <a href='' alt='Click Here'>nhấn vào đây</a> để tiếp tục.";
exit;
}
// Tải file mysql.php lên
require_once("./db_config.php");
if ( $_GET['act'] == "do" )
{
    // Dùng hàm addslashes() để tránh SQL injection, dùng hàm md5() để mã hóa password
    $user = addslashes( $_POST['user'] );
    $pass = md5( addslashes( $_POST['pass'] ) );
    // Lấy thông tin của username đã nhập trong table members
   $sql_query = @mysql_query("SELECT id, user, pass, fullname, role, role2 FROM members WHERE user='{$user}'");
  
    //$sql_query = @mysql_query("SELECT * FROM members WHERE user='{$user}'");

  $member = @mysql_fetch_array( $sql_query );
    // Nếu username này không tồn tại thì....
    if ( @mysql_num_rows( $sql_query ) <= 0 )
    {
        print "Invalid username. <a href='javascript:history.go(-1)'>Click here to back login</a>";
        exit;
    }
    // Nếu username này tồn tại thì tiếp tục kiểm tra mật khẩu
    if ( $pass != $member['pass'] )
    {
        print "Invalid password. <a href='javascript:history.go(-1)'>Click here to back login</a>";
        exit;
    }
    // Khởi động phiên làm việc (session)






	//trace login
	$ip =  $_SERVER['REMOTE_ADDR']; 
	$username = $_POST['user'];
	$timelog = date("Y-m-d H:i:s", time());  
 	@$a=mysql_query("INSERT INTO tblog (username, ip, timelogin) VALUES ('{$username}', '{$ip}', '{$timelog}')");

	$lastvisitDate =  date("Y-m-d H:i:s", time());  
//code show ngay dang nhap 

$sql = "UPDATE members SET lastvisitDate='$lastvisitDate' WHERE user='{$user}'";


mysql_query($sql);
 


// Get Last Login
//$a = mysql_query("SELECT timelogin FROM tblog WHERE username = '$username' ") or die( "<b>Error:</b> Something went wrong, could not edit link status.");	
//list($timelogin) = mysql_fetch_row($a);
// Set session variable
//$_SESSION['timelogin'] = $timelogin;

// Update New LastLogin
//@$a = mysql_query("UPDATE username SET timelogin = '$timelog' WHERE user = '$username' ") or die( "<b>Error:</b> Something went wrong, could not edit link status.");	

//mysql_close($db);	


    $_SESSION['tblog_id'] = $member['tblogid'];
    
    $_SESSION['username'] = $member['user'];
    $_SESSION['user_id'] = $member['id'];
    $_SESSION['user_admin'] = $member['admin'];
    $_SESSION['fullname'] = $member['fullname'];
    $_SESSION['role'] = $member['role'];
	$_SESSION['role2'] = $member['role2'];
    // Thông báo đăng nhập thành công
    require_once ("./redirect.php");
}
else
{
// Form đăng nhập
?>



<?php
include("headerlogin.html");
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>

<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
<title>Login to partner</title>
<link href="./sites/css/login2.css" rel="stylesheet" type="text/css" />
<meta id="MetaKeywords" name="KEYWORDS" content="RYNAN Technologies Pte Ltd, rynantech.com, QR code track &amp; trace, variable data, Alphanumeric, logos, date/time, expiry date, Julian date, shift code, counter/lot box code, multiple types of variable barcodes, and database,
Thermal Inkjet Inks, Thermal Inkjet Coder, R1010 Thermal Inkjet Coder, B1040 Thermal Inkjet Coder, B1040H Thermal Inkjet Coder, B1040He Thermal Inkjet Coder, 1200 Thermal Inkjet Coder, 1200e Thermal Inkjet Coder, 1200EG Thermal Inkjet Coder, R2172C Piezo Inkjet Printers, Hybrid Printer, HybridJET 35 digital printing, HybridJET 65 Lottery ticket application, Internet of Jet Printer, IOJ100, IOJ200, Multi Printer control software, Solvent ink for semi and non-porous media, SoluJET">


</head>

<div class="wrapper fadeInDown">
  <div id="formContent">
    <!-- Tabs Titles -->

    <!-- Icon -->
    <div class="fadeIn first">
      <img src="./sites/images/login2.png" id="icon" alt="User Icon" />
    </div>

    <!-- Login Form -->
   
<form method="post" action="login.php?act=do">
      <input type="text" id="user" class="fadeIn second" name="user" placeholder="login">
      <input type="password" id="pass" class="fadeIn third" name="pass" placeholder="password">
      <input type="submit" class="fadeIn fourth" value="Log In">
    </form>

    <!-- Remind Passowrd -->
    <div id="formFooter">
      <a class="underlineHover" href="#">Forgot Password?</a>
    </div>

  </div>
</div>
    

</form>

</div>

<?php
include("footer.html");
?>


</body>
</html>
<?php
}
?>
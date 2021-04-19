<?php
 
header("Cache-Control: no-cache"); 
header("Expires: -1"); 

require ("./db_config.php");
$id = $_GET['id'];

// You´ll call some id in the table through the '$id' variable.
if (isset($id)){
// Increment the count field value of the requested id.
$update = mysql_query("UPDATE endusers SET views = views + 1 WHERE id='$id'") or die(mysql_error()); ;

// Select the requested id on the database..
$result = mysql_query("SELECT link FROM endusers WHERE id='$id'");

// Retrieve the data(url) of url field.
$info  = mysql_fetch_array($result);
//$url = $info[url];

// Redirect to the url and close the database.
//header("Location:" .$row['url']);
//header('Location: $url');
header("Location:".$info['link']);

//header("Location: http://stackoverflow.com");


}
mysql_close();
?>

<!-- 

 <?php 
 // Connects to your Database 
require ("./db_config.php");
$id = $_GET['id'];

 //Adds to the click count for a particular link
 mysql_query("UPDATE clickcounter1 SET count = count + 1 WHERE ID = $id")or die(mysql_error()); 

 //Retrieves information
 $data = mysql_query("SELECT * FROM clickcounter1 WHERE ID = $id") or die(mysql_error()); 
 $info = mysql_fetch_array($data); 

 //redirects them to the link they clicked
 header( "Location:" .$info['url'] ); 
 ?> 

 -->
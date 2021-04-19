<html>
<head>
<title>Untitled Document</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>
<body>

<table>
  <tr>
    <td align="center">EDIT DATA</td>
  </tr>
  <tr>
    <td>
      <table border="1">
     <!--  <?php 
ob_start();
      include"./db_config.php";//database connection
      $order = "SELECT * FROM members";
      $result = mysql_query($order);
      while ($row=mysql_fetch_array($result)){
        echo ("<tr><td>$row[fullname]</td>");
        echo ("<td>$row[id]</td>");
        echo ("<td>$row[user]</td>");
        echo ("<td><a href=\"edit_form.php?id=$row[id]\">Edit</a>");
        echo ("<td><a href=\"delete.php?id=$row[id]\">Delete</a></td></tr>");
      }
      ?> -->

  <?php
          
include"./db_config.php";//database connection

            $productname = addslashes( $_POST['productname'] );
  $quantity = addslashes( $_POST['quantity'] );

	$dateorder = date("Y-m-d H:i:s", time());  

    @$a=mysql_query("INSERT INTO orderdetails  (productname, quantity, dateorder) VALUES ('{$productname}',('{$quantity}', '{$dateorder}')");
     

            ?>

  <form action="edit.php?act=do" method="post">
            <table border="1">
                <tr><!-- 
                    <td>Order details ID</td> -->
                    <td>Product Name</td>
                    <td> Quantity</td><!-- 
                    <td>Price</td>
                    <td>total</td> -->
                </tr>

                <?php
                    $query = mysql_query("SELECT * FROM orderdetails");
                    while($row = mysql_fetch_array($query)){
                ?>
                <tr>
                   <!--  <td><input type="text" value="<?=$row['orderdetailsid']?>" name="orderdetailsid"></td>
                  -->   <td><?=$row['productname']?></td>
                         <td><input type="text" name="quantity"></td>
		<!-- 		 <td><?=$row['price']?></td>
                    <td><input type="text" value="<?=$row['total']?>" name="total"></td>
         -->      
                </tr>

                <?php
                    }
                    print mysql_error();
                ?>
            </table>
            <table>
            <tr><input type="submit" value="Submit"></tr>
            </table>
            </form>
      </table>
    </td>
   </tr>
</table>
</body>
</html>
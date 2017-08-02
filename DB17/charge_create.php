<?php
 $conn = mysqli_connect("localhost", "root", "kimmywad");
 //Selecting Database
 $db = mysqli_select_db($conn, "csm_g2");

$id = $_GET['Customer_Product_ID'];
$customer_ID = (int)$_GET['Customer_ID'];

   $createCharge = mysqli_query($conn, "INSERT INTO tblCharge
     SELECT NULL,NULL,cp.Quantity * p.Rate, NOW(), cp.Customer_Product_ID
     FROM tblCustomerProduct cp 
     INNER JOIN tblProduct p 
     ON p.Product_ID = cp.Product_ID
     WHERE cp.Customer_Product_ID= '$id'");
     header("Location: /db17/customerproduct.php?customer_ID=$customer_ID&submit=Search");   
?>
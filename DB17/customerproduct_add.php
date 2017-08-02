<?php
 $conn = mysqli_connect("localhost", "root", "kimmywad");
 //Selecting Database
 $db = mysqli_select_db($conn, "csm_g2");


$customer_ID = (int)$_GET['customer_ID'];


     header("Location: /db17/customerproduct.php?customer_ID=$customer_ID&submit=Search");  
?>
<?php
 $conn = mysqli_connect("localhost", "root", "kimmywad");
 //Selecting Database
 $db = mysqli_select_db($conn, "csm_g2");


$customer_ID = (int)$_GET['Customer_ID'];

    $createBill = mysqli_query($conn, "INSERT INTO tblBill
            SELECT NULL,cp.Customer_ID, SUM(c.Amount), DATE_ADD(NOW(),INTERVAL 5 DAY), NOW()
            FROM tblCharge c 
            INNER JOIN tblCustomerProduct cp 
            ON c.Customer_Product_ID = cp.Customer_Product_ID 
            INNER JOIN tblProduct p 
            ON p.Product_ID = cp.Product_ID
            WHERE cp.Customer_ID = '$customer_ID' AND c.Bill_ID IS NULL
            GROUP BY cp.Customer_ID, DATE_ADD(NOW(),INTERVAL 5 DAY), NOW();");
     
     $updateCharge = mysqli_query($conn,"UPDATE tblCharge
     SET Bill_ID = (SELECT MAX(Bill_Id) 
     FROM tblBill b WHERE b.Customer_ID = '$customer_ID')
     WHERE Bill_ID IS NULL;");
     header("Location: /db17/customerproduct.php?customer_ID=$customer_ID&submit=Search");  
?>
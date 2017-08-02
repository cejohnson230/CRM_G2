<?php

 //Establishing Connection with server by passing server_name, user_id and pass as a patameter
 $conn = mysqli_connect("localhost", "root", "kimmywad");
 //Selecting Database
 $db = mysqli_select_db($conn, "csm_g2");
 //sql query to fetch information of registerd user and finds user match.
 $query = mysqli_query($conn, "SELECT tblCustomer.Customer_ID, 
Name_First, Name_MI, Name_Last, Line_1, Line_2, City, State, Zip FROM tblCustomer 
INNER JOIN tblAddress 
ON tblAddress.Customer_ID = tblCustomer.Customer_ID");
 

// Closing connection
 
?>
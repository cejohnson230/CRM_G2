<?php
$error=''; //Variable to Store error message;
if(isset($_POST['submit'])){
 if(empty($_POST['customer_Id']) ){
 $error = "No password provider";
 }
 else
 {
 //Define $user and $pass
 $user=$_POST['customer_ID'];

 //Establishing Connection with server by passing server_name, user_id and pass as a patameter
 $conn = mysqli_connect("localhost", "root", "kimmywad");
 //Selecting Database
 $db = mysqli_select_db($conn, "csm_g2");
 //sql query to fetch information of registerd user and finds user match.
 $query = mysqli_query($conn, "SELECT * FROM tbl WHERE Password='$pass' AND Email='$user'");
 
 $rows = mysqli_num_rows($query);
 if($rows ==1){
 	header("Location: home.php"); // Redirecting to other page
 }
 else
 {
 $error = "Username of Password is Invalid";
 }
 mysqli_close($conn); // Closing connection
 }
}?>
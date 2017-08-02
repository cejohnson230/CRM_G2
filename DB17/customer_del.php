<?php

/*

DELETE.PHP

Deletes a specific entry from the 'products' table

*/



// connect to the database

include('connect-db.php');



// check if the 'id' variable is set in URL, and check that it is valid

if (isset($_GET['Customer_ID']) && is_numeric($_GET['Customer_ID']))

{

// get id value

$id = $_GET['Customer_ID'];



// delete the entry
$result1 = mysqli_query($conn,"SET foreign_key_checks = 0");

$result2 = mysqli_query($conn,"DELETE FROM tblcustomer WHERE Customer_ID=$id")

or die(mysql_error());

$result2 = mysqli_query($conn,"DELETE FROM tbladdress WHERE Customer_ID=$id")

or die(mysql_error());
$result3 = mysqli_query($conn,"SET foreign_key_checks = 1");
// redirect back to the view page

header("Location: home.php");

}

else

// if id isn't set, or isn't valid, redirect back to view page

{

header("Location: home.php");

}



?>
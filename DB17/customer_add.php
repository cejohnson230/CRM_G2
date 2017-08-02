<?php

/*

NEW.PHP

Allows user to create a new entry in the database

*/



// creates the new record form

// since this form is used multiple times in this file, I have made it a function that is easily reusable

function renderForm($firstname, $lastname,$midname,$line1,$line2,$city,$state,$zip,$error)

{

?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">

<html>

<head>
   <title>W3.CSS Template</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
body {font-family: "Lato", sans-serif}
.mySlides {display: none}
</style>
<body>

<!-- Navbar -->
<div class="w3-top">
  <div class="w3-bar w3-black w3-card-2">
    <a class="w3-bar-item w3-button w3-padding-large w3-hide-medium w3-hide-large w3-right" href="javascript:void(0)" onclick="myFunction()" title="Toggle Navigation Menu"><i class="fa fa-bars"></i></a>
    <a href="/db17/home.php" class="w3-bar-item w3-button w3-padding-large">HOME</a>
    <a href="#customers" class="w3-bar-item w3-button w3-padding-large w3-hide-small">Customers</a>
    <a href="#products" class="w3-bar-item w3-button w3-padding-large w3-hide-small">Products</a>
  </div>
</div>



<!-- Page content -->
<div class="w3-content" style="max-width:2000px;margin-top:46px">



<title>New Record</title>

</head>

<body>

<?php

// if there are any errors, display them

if ($error != '')

{

echo '<div style="padding:4px; border:1px solid red; color:red;">'.$error.'</div>';

}

?>



<form action="" method="post">

 <div class="w3-container w3-content w3-padding-64 w3-center" style="max-width:800px" id="customers">

     
  <h2 class="w3-wide w3-center">Add New Customer</h2>
     <br/>
     
         <div class="w3-row-padding w3-center">
  <div class="w3-third">
    <input class="w3-input w3-border" type="text" name="firstname" value="<?php echo $firstname; ?>" placeholder="First Name"/>
  </div>
  <div class="w3-third">
    <input class="w3-input w3-border" type="text" name = "lastname" value="<?php echo $lastname; ?>" placeholder="Last Name"/> 
  </div>
               <div class="w3-third">
    <input class="w3-input w3-border" type="text" name="midname" value="<?php echo $midname; ?>" placeholder="Middle Initial"/>
  </div>
</div>
     <br>
    
        <div class="w3-row-padding">
  <div class="w3-third">
    <input class="w3-input w3-border" type="text" name="line1" value="<?php echo $line1; ?>" placeholder="Address 1"/>
  </div>
  <div class="w3-third">
    <input class="w3-input w3-border" type="text" name="line2" value="<?php echo $line2; ?>" placeholder="Address 2"/>
  </div>
</div>
     <br>
             <div class="w3-row-padding">
  <div class="w3-third">
    <input class="w3-input w3-border" type="text" name="city" value="<?php echo $city; ?>" placeholder="City"/>
  </div>
  <div class="w3-third">
    <input class="w3-input w3-border" type="text" name="state" value="<?php echo $state; ?>" placeholder="State"/>
  </div>
    <div class="w3-third">
    <input class="w3-input w3-border" type="text" name="zip" value="<?php echo $zip; ?>" placeholder="Zip"/>
  </div>
</div>
     

<br> 

<input type="submit" name="submit" value="Submit">

</div>

</form>

</body>

</html>

<?php

}









// connect to the database

include('connect-db.php');



// check if the form has been submitted. If it has, start to process the form and save it to the database

if (isset($_POST['submit']))

{

// get form data, making sure it is valid

$firstname = mysqli_real_escape_string($conn,htmlspecialchars($_POST['firstname']));
$lastname =  mysqli_real_escape_string($conn,htmlspecialchars($_POST['lastname']));
$midname =   mysqli_real_escape_string($conn,htmlspecialchars($_POST['midname']));
$line1 =     mysqli_real_escape_string($conn,htmlspecialchars($_POST['line1']));
$line2 =     mysqli_real_escape_string($conn,htmlspecialchars($_POST['line2']));
$city =      mysqli_real_escape_string($conn,htmlspecialchars($_POST['city']));
$state =     mysqli_real_escape_string($conn,htmlspecialchars($_POST['state']));
$zip =       mysqli_real_escape_string($conn,htmlspecialchars($_POST['zip']));
// check to make sure both fields are entered

if ($firstname == '' || $lastname == ''|| $line1 == ''|| $line1 == ''|| $city == ''|| $state == ''|| $zip == '')

{

// generate error message

$error = 'ERROR: Please fill in all required fields!';



// if either field is blank, display the form again

renderForm($firstname, $lastname,$midname,$line1,$line2,$city,$state,$zip,$error);

}

else

{

// save the data to the database



mysqli_query($conn,"INSERT tblcustomer SET Name_First='$firstname', Name_Last='$lastname', Name_MI='$midname'")

or die(mysql_error());

mysqli_query($conn,"INSERT tbladdress SET Line_1='$line1', Line_2='$line2', City='$city', State='$state', Zip='$zip', Customer_ID = LAST_INSERT_ID()")

or die(mysql_error());

// once saved, redirect back to the view page

header("Location: home.php");

}

}

else

// if the form hasn't been submitted, display the form

{

renderForm('','','','','','','','','');

}

?>
<?php

/*

EDIT.PHP

Allows user to edit specific entry in database

*/



// creates the edit record form

// since this form is used multiple times in this file, I have made it a function that is easily reusable

function renderForm($Product_ID,$Description, $Rate,$error)

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

<input type="hidden" name="Product_ID" value="<?php echo $Product_ID; ?>"/>

 <div class="w3-container w3-content w3-padding-64 w3-center" style="max-width:800px" id="customers">

     
  <h2 class="w3-wide w3-center">Edit Product</h2>
     <br/>
     
         <div class="w3-row-padding w3-center">
  <div class="w3-third">
    <strong>Description: </strong> 
    <input class="w3-input w3-border" type="text" name="Description" value="<?php echo $Description; ?>" placeholder="Description"/>
  </div>
  <div class="w3-third">
    <strong>Rate: </strong> 
    <input class="w3-input w3-border" type="text" name = "Rate" value="<?php echo $Rate; ?>" placeholder="Rate"/> 
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



// check if the form has been submitted. If it has, process the form and save it to the database

if (isset($_POST['submit']))

{

// confirm that the 'id' value is a valid integer before getting the form data

if (is_numeric($_POST['Product_ID']))

{

// get form data, making sure it is valid

$Product_ID = $_POST['Product_ID'];
$Description = mysqli_real_escape_string($conn,htmlspecialchars($_POST['Description']));
$Rate = mysqli_real_escape_string($conn,htmlspecialchars($_POST['Rate']));




// check that firstname/lastname fields are both filled in

  if ($Description == '' || $Rate == '')

  {

// generate error message

$error = 'ERROR: Please fill in all required fields!';



//error, display form

renderForm($Product_ID,$Description, $Rate,$error);

  }

  else

  {

// save the data to the database

mysqli_query($conn,"UPDATE tblproduct SET Description='$Description', Rate='$Rate' where Product_ID = $Product_ID")

or die(mysql_error());


// once saved, redirect back to the view page

header("Location: home.php");

  }

}

else

{

// if the 'id' isn't valid, display an error

echo 'Error!';

}

}

else

// if the form hasn't been submitted, get the data from the db and display the form

{



// get the 'id' value from the URL (if it exists), making sure that it is valid (checing that it is numeric/larger than 0)

if (isset($_GET['Product_ID']) && is_numeric($_GET['Product_ID']) && $_GET['Product_ID'] > 0)

{

// query db

$Product_ID = $_GET['Product_ID'];

$result = mysqli_query($conn,"SELECT * FROM tblproduct WHERE Product_ID=$Product_ID")

or die(mysql_error());

$row = mysqli_fetch_array($result);


// check that the 'id' matches up with a row in the databse

if($row)

{



// get data from db

$Description = $row['Description'];
$Rate = $row['Rate'];



// show form

renderForm($Product_ID,$Description,$Rate,'');

}

else

// if no match, display result

{

echo "No results!";

}

}

else

// if the 'id' in the URL isn't valid, or if there is no 'id' value, display an error

{

echo 'Error!';

}

}

?>
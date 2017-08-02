<!DOCTYPE html>
<html>
<title>CRM</title>
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
    <a href="/db17/home.php" class="w3-bar-item w3-button w3-padding-large w3-hide-small">Customers</a>
    <a href="/db17/home.php" class="w3-bar-item w3-button w3-padding-large w3-hide-small">Products</a>
  </div>
</div>



<!-- Page content -->
<div class="w3-content" style="max-width:2000px;margin-top:46px">



  <!-- The Contact Section -->
   <?php

        $conn = mysqli_connect("localhost", "root", "kimmywad");
 //Selecting Database
 $db = mysqli_select_db($conn, "csm_g2");
 //sql query to fetch information of registerd user and finds user match.
 $queryCustomer = mysqli_query($conn, "SELECT tblCustomer.Customer_ID, 
Name_First, Name_MI, Name_Last, Line_1, Line_2, City, State, Zip FROM tblCustomer 
LEFT OUTER JOIN tblAddress 
ON tblAddress.Customer_ID = tblCustomer.Customer_ID");
    
     $queryProducts = mysqli_query($conn, "SELECT * FROM tblProduct");
 
        ?>
      <div class="w3-container w3-content w3-padding-64 w3-center" style="max-width:800px" id="customers">
    <h2 class="w3-wide w3-center">CUSTOMERS</h2>
          <a href="/db17/customer_add.php" class="w3-button">Add New Customer</a>
          <a href="/db17/customerproduct.php" class="w3-button">Search Customers</a>
    <div class="w3-row w3-padding-32">
      <div class="w3-col  w3-center">
          <table class="w3-table w3-bordered">
  <tr class="w3-light-grey">
    <th>Customer ID</th>
    <th>First Name</th>
    <th>MI</th>
    <th>Last Name</th>
    <th>Address</th>
      <th>Address 2</th>
    <th>City</th>
      <th>State</th>
      <th>Zip</th>
      <th>Edit</th>
    <th>Delete</th>
  </tr>
<?php 
    
    while ($row = mysqli_fetch_array($queryCustomer)) {

               echo "<tr>";
               echo "<td>".$row['Customer_ID']."</td>";
               echo "<td>".$row['Name_First']."</td>";
               echo "<td>".$row['Name_MI']."</td>";
               echo "<td>".$row['Name_Last']."</td>";
               echo "<td>".$row['Line_1']."</td>";
               echo "<td>".$row['Line_2']."</td>";
               echo "<td>".$row['City']."</td>";
               echo "<td>".$row['State']."</td>";
               echo "<td>".$row['Zip']."</td>";
               echo '<td><a href="/db17/customer_edit.php?Customer_ID=' . $row['Customer_ID'] . '">Edit</a></td>';
               echo '<td><a href="/db17/customer_del.php?Customer_ID=' . $row['Customer_ID'] . '">Delete</a></td>';
               echo "</tr>";
           }
    ?>
</table>
    </div>
  </div>
    <div class="w3-container w3-content w3-padding-64 w3-center" style="max-width:800px" id="products">
    <h2 class="w3-wide w3-center">PRODUCTS</h2>
        <a href="/db17/product_add.php" class="w3-button">Add New Products</a>
          <a href="/db17/customerproduct.php" class="w3-button">Search Products</a>
    <div class="w3-row w3-padding-32">
      <div class="w3-col w3-center">
          
          <table class="w3-table w3-bordered">
  <tr class="w3-light-grey">
    <th>Product ID</th>
    <th>Description</th>
    <th>Rate</th>
    
    <th>Edit</th>
    <th>Delete</th>
  </tr>
<?php 
    
    while ($row = mysqli_fetch_array($queryProducts)) {

               echo "<tr>";
               echo "<td>".$row['Product_ID']."</td>";
               echo "<td>".$row['Description']."</td>";
               echo "<td>".$row['Rate']."</td>";
               echo '<td><a href="/db17/product_edit.php?Product_ID=' . $row['Product_ID'] . '">Edit</a></td>';
               echo '<td><a href="/db17/product_del.php?Product_ID=' . $row['Product_ID'] . '">Delete</a></td>';
               echo "</tr>";
           }
    ?>
</table>
          
          
      </div>
    </div>
  </div>
  
<!-- End Page Content -->
</div>


</body>

<!-- Footer -->
<footer class="w3-container w3-padding-64 w3-center w3-opacity w3-light-grey w3-large">
<h6 class="w3-wide w3-center">made with <i class="fa fa-rt w3-hover-opacity"></i> by group 2</h6>
</footer>

<script>

// Used to toggle the menu on small screens when clicking on the menu button
function myFunction() {
    var x = document.getElementById("navDemo");
    if (x.className.indexOf("w3-show") == -1) {
        x.className += " w3-show";
    } else { 
        x.className = x.className.replace(" w3-show", "");
    }
}

// When the user clicks anywhere outside of the modal, close it
var modal = document.getElementById('ticketModal');
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
</script>


</html>
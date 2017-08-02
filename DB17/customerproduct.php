
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
    <a href="home.php" class="w3-bar-item w3-button w3-padding-large">HOME</a>
    <a href="home.php/#customers" class="w3-bar-item w3-button w3-padding-large w3-hide-small">Customers</a>
    <a href="home.php/#products" class="w3-bar-item w3-button w3-padding-large w3-hide-small">Products</a>
  </div>
</div>



<!-- Page content -->
<div class="w3-content" style="max-width:2000px;margin-top:46px">



  <!-- The Contact Section -->
   <?php
 $conn = mysqli_connect("localhost", "root", "kimmywad");
 //Selecting Database
 $db = mysqli_select_db($conn, "csm_g2");
    
        ?>
      <div class="w3-container w3-content w3-padding-32 w3-center" style="max-width:800px" id="customers">
          <h2 class="w3-wide w3-center">SEARCH</h2>
          <form action="" method="get" style="text-align:center;">
                 <input type="text" id="customer_ID" name="customer_ID" />
        <input type="submit" name="submit" value="Search">
              <br><br>
    <h3 class="w3-wide w3-center">CUSTOMER INFO</h3>
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
  </tr>
<?php 
              $customer_ID = parse_str($_SERVER['QUERY_STRING']);
      if(isset($_GET['submit']) ){
    parse_str($_SERVER['QUERY_STRING']);

   
 //sql query to fetch information of registerd user and finds user match.
 $queryCustomer = mysqli_query($conn, "SELECT tblCustomer.Customer_ID, 
Name_First, Name_MI, Name_Last, Line_1, Line_2, City, State, Zip FROM tblCustomer 
LEFT OUTER JOIN tblAddress 
ON tblAddress.Customer_ID = tblCustomer.Customer_ID
WHERE tblCustomer.Customer_ID = '$customer_ID'");
          
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
               echo "</tr>";
           }
    }else{
        "<br>";
      }

    ?>
</table>
    </div>
              </div>
  </div>
    <div class="w3-container w3-content w3-padding-32 w3-center" style="max-width:800px" id="products">
    <h3 class="w3-wide w3-center">CUSTOMER'S PRODUCTS</h3>
     <form action="" method="get" style="text-align:center;">   
       
        <?php

mysqli_connect('localhost', 'root', 'kimmywad');
mysqli_select_db($conn,'crm_g2');

$sql = "SELECT Product_ID, Description FROM tblProduct";
$products = mysqli_query($conn,$sql);

echo "<select name='product'>";
        
        
while ($row = mysqli_fetch_array($products)) {
   
    echo "<option value='".$row['Product_ID']."'>".$row['Description']."</option>";
}
     
echo "</select>";

 echo  "<input type= \"text\" name= \"quantity\" placeholder=\"Quantity\"> ";
   if(isset($_POST['add'])){  
       $newprod = (int)$_GET['Product_ID']; 
       $quantity = (int)$_GET['quantity'];
       $customer_ID = (int)$_GET['customer_ID'];
       
     $createCharge = mysqli_query($conn, "INSERT INTO tblCustomerProduct
     SET Customer_ID = $customer_ID, Product_ID = $newprod, Quantity = $quantity");
     header("Location: /db17/customerproduct.php?customer_ID=$customer_ID");   
   }

;
   
?> 
      <input type="submit" name="add" value="ADD">  
        
    <div class="w3-row w3-padding-32">
      <div class="w3-col w3-center">
          
          <table class="w3-table w3-bordered">
  <tr class="w3-light-grey">
    <th>Customer Product ID</th>
    <th>Description</th>
    <th>Rate</th>
    <th>Quantity</th>
    <th>Amount</th>
    <th>New Charge</th>

  </tr>
              <form action="" method="post" style="text-align:center;"/>             
<?php 
    if(isset($_GET['submit'])){
    $customer_ID=$_GET['customer_ID'];   
$queryProducts = mysqli_query($conn, "SELECT * FROM tblCustomerProduct cp 
     INNER JOIN tblProduct p ON p.Product_ID = cp.Product_ID WHERE cp.Customer_ID = '$customer_ID' ");      
    while ($row = mysqli_fetch_array($queryProducts)) {

               echo "<tr>";
               echo "<td>".$row['Customer_Product_ID']."</td>";
               echo "<td>".$row['Description']."</td>";
                echo "<td>".$row['Rate']."</td>";
                echo "<td>".$row['Quantity']."</td>";
                echo "<td>".$row['Rate']* $row['Quantity']."</td>";
               echo '<td><a href="/db17/charge_create.php?Customer_ID='.$row['Customer_ID'].'&Customer_Product_ID=' . $row['Customer_Product_ID'] . '">Create</a></td>';
               echo "</tr>";
        

       
           } 
    }else{"<br>";}                     
    ?>
</table>
 </div>
    </div>
        
         </div>
        <div class="w3-container w3-content w3-padding-32 w3-center" style="max-width:800px" id="products">

    <h3 class="w3-wide w3-center">UNBILLED CHARGES</h3>

    <div class="w3-row w3-padding-32">
      <div class="w3-col w3-center">
         
<table class="w3-table w3-bordered">
  <tr class="w3-light-grey">
   <th>Charge ID</th>
    <th>Amount</th>
    <th>Created Date</th>
    <th>Product</th>
    <th>Rate</th>
    <th>Quantity</th>

  </tr>
        
               <?php 
    
    if(isset($_GET['submit'])){
    $customer_ID=$_GET['customer_ID'];

   echo '<a href="/db17/create_bill.php?Customer_ID='.$customer_ID.'">Create New Bill</a>';  
    
$queryCharges = mysqli_query($conn, "SELECT c.Charge_ID,
                                      c.Amount, 
                                      c.Created_date, 
                                      p.Description, 
                                      p.Rate, 
                                      cp.Quantity
                                      FROM tblCharge c 
                                      INNER JOIN tblCustomerProduct cp 
                                      ON cp.Customer_Product_ID = c.Customer_Product_ID 
                                      INNER JOIN tblProduct p 
                                      ON p.Product_ID = cp.Product_ID
                                      WHERE cp.Customer_ID = '$customer_ID' AND Bill_ID IS NULL");
       
        
 
      
    while ($row = mysqli_fetch_array($queryCharges)) {

               echo "<tr>";
               echo "<td>".$row['Charge_ID']."</td>";
               echo "<td>".$row['Amount']."</td>";
                echo "<td>".$row['Created_date']."</td>";
                echo "<td>".$row['Description']."</td>";
                echo "<td>".$row['Rate']."</td>";
                    echo "<td>".$row['Quantity']."</td>";
               
               echo "</tr>";
           }
           
}else{"<br>";}
         ?>   
               </table>
               
                    </div>
               </div>
                       </div>     
      
     
          
          
          
          
          
          
          
            <div class="w3-container w3-content w3-padding-32 w3-center" style="max-width:800px" id="products">

    <h3 class="w3-wide w3-center">Bills</h3>

    <div class="w3-row w3-padding-32">
      <div class="w3-col w3-center">
         
<table class="w3-table w3-bordered">
  <tr class="w3-light-grey">
   <th>Bill ID</th>
    <th>Amount</th>
    <th>Due Date</th>
    <th>Created Date</th>


  </tr>
        
               <?php 
    if(isset($_GET['submit'])){
    $customer_ID=$_GET['customer_ID'];

   
    
$queryBills = mysqli_query($conn, "SELECT Bill_ID, Amount, Due_date, Created_date
                                      FROM tblBill b                                  
                                      WHERE b.Bill_ID > 330 AND b.Customer_ID = '$customer_ID'");
       
        
 
      
    while ($row = mysqli_fetch_array($queryBills)) {

               echo "<tr>";
               echo "<td>".$row['Bill_ID']."</td>";
               echo "<td>".$row['Amount']."</td>";
                echo "<td>".$row['Due_date']."</td>";
                echo "<td>".$row['Created_date']."</td>";
               echo "</tr>";
           }
              
}else{"<br>";}
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
<h6 class="w3-wide w3-center">made with <i class="fa fa-heart w3-hover-opacity"></i> by group 2</h6>
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
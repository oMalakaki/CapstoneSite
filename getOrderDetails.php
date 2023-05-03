<?php 
include('databaseconnect.php');
$order_id = $_POST["order_id"];
// Create a SQL query to select the details of the user with the given ID
$sql = "SELECT * FROM `Orders` WHERE `order_id`='$order_id'";
$result = mysqli_query($con, $sql);
// Check if the query was successful
if (mysqli_num_rows($result) > 0) {
    // Loop through the results and construct the HTML for displaying the details of the user
    $html = "";
    while($row = mysqli_fetch_assoc($result)) {
      $html .= "<div><label>Vendor</label><p>" . $row["vendor"] . "</p></div>";
        $html .= "<div><label>Order ID</label><p>" . $row["order_id"] . "</p></div>";
        $html .= "<div><label>Product</label><p>" . $row["product"] . "</p></div>";
        $html .= "<div><label>Quantity</label><p>" . $row["quantity"] . "</p></div>";
        $html .= "<div><label>Price per unit</label><p>" . "$" .$row["pricePerUnit"] . "</p></div>";
        $html .= "<div><label>Total price</label><p>" . "$" . $row["total"] . "</p></div>";
        $html .= "<div><label>Date ordered</label><p>" . $row["dateOrder"] . "</p></div>";
        $html .= "<div><label>Payment Information</label><p>" . $row["paymentInformation"] . "</p></div>";



        
  

    }
    echo $html;
  } else {
    echo "No product found with ID $order_id";
  }
  
  // Close the database connection
  mysqli_close($con);

?>
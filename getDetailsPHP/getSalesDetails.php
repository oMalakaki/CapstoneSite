<?php

include("../databaseconnect.php");
$sale_id = $_POST["sale_id"];
//retrieve information for each sale from the sales table
$sql = "SELECT * FROM `sales` WHERE `sale_id`='$sale_id'";
$result = mysqli_query($con, $sql);
//check for mysqli error

if (mysqli_num_rows($result) > 0) {
    // Loop through the results and construct the HTML for displaying the details of the sale
    $html = "";
    while($row = mysqli_fetch_assoc($result)) {
        $html .= "<label>Sale Number</label><p>" . $row["sale_id"] . "</p>";
        $html .= "<label>Date purchased</label><p>" . $row["Date"] . "</p>";
        $html .= "<label>Time purchased</label><p>" . $row["Time"] . "</p>";
        $html .= "<label>Customer Number</label><p>" . $row["CustomerNumber"] . "</p>";
        $html .= "<label>Sale</label><p>" . "$" . $row["Sale"] . "</p>";
        
        $html .= "<label>Product Purchased</label><p>" . $row["ProductPurchased"] . "</p>";
        
        $html .= "<label>Payment Information</label><p>" . $row["PaymentInformation"] . "</p>";

    }
    echo $html;
  } else {
    echo "No product found with ID $sale_id";
  }
  
  // Close the database connection
  mysqli_close($con);

?>
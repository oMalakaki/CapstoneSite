<?php 
include('databaseconnect.php');
$product_number = $_POST["product_number"];
// Create a SQL query to select the details of the product with the given ID
$sql = "SELECT * FROM `product` WHERE `product_number`='$product_number'";
$result = mysqli_query($con, $sql);

if (mysqli_num_rows($result) > 0) {
    // Loop through the results and construct the HTML for displaying the details of the product
    $html = "";
    while($row = mysqli_fetch_assoc($result)) {
      $html .= "<label>Product Name</label><p>" . $row["product_name"] . "</p>";
        $html .= "<label>Product Number</label><p>" . $row["product_number"] . "</p>";
        $html .= "<label>Product Quantity</label><p>" . $row["quantity"] . "</p>";
        $html .= "<label>Original Price</label><p>" ."$" . $row["og_price"] . "</p>";
        $html .= "<label>Sale Price</label><p>" . "$" .$row["sale_price"] . "</p>";
        $html .= "<label>Date of Manufacturing</label><p>" . $row["DoM"] . "</p>";
        $html .= "<label>Date of Expiration</label><p>" . $row["expiry"] . "</p>";

  

    
    }
    echo $html;
  } else {
    echo "No product found with ID $product_number";
  }
  
  // Close the database connection
  mysqli_close($con);

?>
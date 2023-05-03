<?php
include("databaseconnect.php");


// Retrieve the profit data from product table and sales table by joining them and subracting the og_price from the sale price
$sql = "SELECT p.product_name, COUNT(s.sale_id) AS sales_count, 
SUM(p.sale_price - p.og_price) AS total_profit
FROM sales s
JOIN product p ON s.product_number = p.product_number
GROUP BY p.product_name


";
$result = mysqli_query($con, $sql);
// Create an array to store the data
$data = array();
// Loop through the results and store the data in the array in the form of [product_name, total_profit]
while($row = mysqli_fetch_assoc($result)) {
  $data[] = array($row["product_name"], (float)$row["total_profit"]);
}
// Close the database connection
mysqli_close($con);

// Return the data as JSON
echo json_encode($data);
?>
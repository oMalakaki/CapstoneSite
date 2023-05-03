<?php
include("databaseconnect.php");
$productName = $_GET["product_name"];
$sql = "SELECT og_price FROM product WHERE product_name = '" . mysqli_real_escape_string($con, $productName) . "'";
$result = mysqli_query($con, $sql);
if ($row = mysqli_fetch_assoc($result)) {
  $response = array("og_price" => $row["og_price"]);
  echo json_encode($response);
} else {
  echo "{}";
}
mysqli_close($con);
?>

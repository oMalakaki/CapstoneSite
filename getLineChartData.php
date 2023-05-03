<?php 
include("databaseconnect.php");

//get sale date and count from the sales table
$sql = "SELECT `Date`, COUNT(sale_id) AS sales_count
FROM sales
GROUP BY `Date`
";
$result = mysqli_query($con, $sql);
//create an array to store the data
$data = array();
//loop through the results and store the data in the array as objects with Date objects
while($row = mysqli_fetch_assoc($result)) {
  $dateParts = explode('-', $row["Date"]); // split the date string into parts
  $year = intval($dateParts[0]); // extract the year as an integer
  $month = intval($dateParts[1]) - 1; // extract the month as an integer and subtract 1
  $day = intval($dateParts[2]); // extract the day as an integer
  $dateObj = new DateTime("$year-$month-$day"); // create a new DateTime object using the year, month, and day
  $data[] = array(
    'Date' => $dateObj->format('Y-m-d'), // format the Date object as a string in YYYY-MM-DD format
    'sales_count' => intval($row["sales_count"]) // convert the sales count to an integer
  );
}
//done yay
//close the database connection
$con->close();
echo json_encode($data);
?>

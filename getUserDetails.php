<?php 
include('databaseconnect.php');
$employee_id = $_POST["employee_id"];
// Create a SQL query to select the details of the user with the given ID
$sql = "SELECT * FROM `users` WHERE `employee_id`='$employee_id'";
$result = mysqli_query($con, $sql);
// Check if the query was successful
if (mysqli_num_rows($result) > 0) {
    // Loop through the results and construct the HTML for displaying the details of the user
    $html = "";
    while($row = mysqli_fetch_assoc($result)) {
      $html .= "<label>First Name</label><p>" . $row["first_name"] . "</p>";
      $html .= "<label>Last Name</label><p>" . $row["last_name"] . "</p>";
      $html .= "<label>Employee ID</label><p>" . $row["employee_id"] . "</p>";
      $html .= "<label>Role</label><p>" . $row["role"] . "</p>";
      $html .= "<label>Payroll information</label><p>" . $row["payroll"] . "/hr</p>";
      $html .= "<label>Email</label><p>" . $row["email"] . "</p>";

        
  

    }
    echo $html;
  } else {
    echo "No product found with ID $employee_id";
  }
  
  // Close the database connection
  mysqli_close($con);

?>
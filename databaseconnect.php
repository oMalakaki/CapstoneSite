<?php
// Start the session
session_start();
// log the session $_SESSION['logged_in']

// Check if the user is logged in
if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    // Redirect the user to the login page
    header('Location: index.php');
    exit();
}

$hostname = "alexcanfield.us"; // your hostname
$username = "peuueufkq8uq"; // your DB username
$password = "UmND4KN92Kwq5Se"; // your DB password
$dbname = "Noverint_login"; // your DB name
$con = mysqli_connect($hostname, $username, $password, $dbname);


if (!$con) {
    echo "<script>alert('Connection failed.');</script>";
    die("Connection failed: " . mysqli_connect_error());
}
?>
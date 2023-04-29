<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve email and password from form
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Output the email to the browser console using JavaScript
    echo "<script>console.log('" . $email . "');</script>";

    // Check if email and password are valid
    // For this example, we'll hardcode a valid email and password
    if ($email === 'myemail' && $password === 'mypassword') {
        // Start a new session and save the email
        session_start();
        $_SESSION['email'] = $email;

        // Redirect the user to a welcome page
        header('Location: dashboard.html');
        exit();
    } else {
        // If the email or password is invalid, show an error message
        echo "Invalid email or password";
    }
}
// Start the session
// session_start();

// $hostname = "localhost"; // your hostname
// $username = "peuueufkq8uq"; // your DB username
// $password = "UmND4KN92Kwq5Se"; // your DB password
// $dbname = "Noverint_login"; // your DB name
// $con = mysqli_connect($hostname, $username, $password, $dbname);

// if (!$con) {
//     die("Connection failed: " . mysqli_connect_error());
// }

// //If login values exist in database, redirect to dashboard.html
// if (isset($_POST['login'])) {
//     $email = $_POST['email'];
//     $password = $_POST['password'];
//     $sql = "SELECT * FROM faculty WHERE email='$email' AND password='$password'";
//     $result = mysqli_query($con, $sql);
//     if (mysqli_num_rows($result) > 0) {
//         $_SESSION['email'] = $email;
//         header('Location: dashboard.html');
//     } else {
//         echo "<script>alert('Invalid login credentials.')</script>";
//     }
// }


?>
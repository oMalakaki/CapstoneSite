<?php

// Start the session
session_start();

//when the user clicks the sign in button direct to dashboard.html
if (isset($_POST['submit'])) {
    $_SESSION['username'] = $_POST['username'];
    header('Location: dashboard.html');
    exit();
}


?>
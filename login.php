<?php
include('databaseconnect.php');

if (isset($_POST['create-account'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $org = $_POST['org'];
    $sql = "INSERT INTO `login` (`email`, `password`, `organization`) VALUES ('$email', '$password', '$org')";
    try {
        $result = mysqli_query($con, $sql);
        if (!$result) {
            throw new Exception("Account already exists.");
        } else {
            echo "Account created successfully. <a href='index.php'>Sign in</a>";
        }
    } catch (Exception $e) {
        echo "Account already exists." . " <a href='index.php'>Sign in</a>";
    }

}

//If login values exist in database, redirect to dashboard.html
if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $sql = "SELECT * FROM `login` WHERE `email`='$email' AND `password`='$password'";
    $result = mysqli_query($con, $sql);
    if (mysqli_num_rows($result) > 0) {
        $_SESSION['email'] = $email;
        header('Location: dashboard.html');
    } else {
        echo "Invalid login credentials.";
    }
}



?>
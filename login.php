<?php
$hostname = "alexcanfield.us"; // your hostname
$username = "peuueufkq8uq"; // your DB username
$password = "UmND4KN92Kwq5Se"; // your DB password
$dbname = "Noverint_login"; // your DB name
$con = mysqli_connect($hostname, $username, $password, $dbname);


if (!$con) {
    echo "<script>alert('Connection failed.');</script>";
    die("Connection failed: " . mysqli_connect_error());
}

if (isset($_POST['create-account'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $org = $_POST['org'];
    $org = preg_replace('/[^a-zA-Z0-9\s]/', '', $_POST['org']);
    $sql = "INSERT INTO `login` (`email`, `password`, `organization`) VALUES ('$email', '$password', '$org')";
    try {
        $result = mysqli_query($con, $sql);
        if (!$result) {
            throw new Exception("Account already exists.");
        } else {
            echo "Account created successfully. <a href='index.php'>Sign in</a>";
        }
    } catch (Exception $e) {
        echo "Account already exists." . " <a href='index.php'>Sign in</a>". $e->getMessage();
    }

}

if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $sql = "SELECT * FROM `login` WHERE `email`='$email' AND `password`='$password'";
    $result = mysqli_query($con, $sql);
    if (mysqli_num_rows($result) > 0) {
        session_start(); // start the session
        $_SESSION['email'] = $email;
        $_SESSION['logged_in'] = true; // Initialize the session variable to true
        header('Location: dashboard.php');
        exit(); // Add this line to prevent executing the code below
    } else {
        echo "Invalid login credentials.";
    }
}



mysqli_close($con);
?>
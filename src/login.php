<?php
include("config.php");
include "../functions.php";
$baseUrl = getBaseUrl();

$error = '';
$email = mysqli_real_escape_string($conn, $_POST['email']);
$password = md5(mysqli_real_escape_string($conn, $_POST['user_password']));


$sql = "SELECT * FROM user WHERE email = '$email' and password = '$password'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result, MYSQLI_ASSOC);

$count = mysqli_num_rows($result);


if ($count == 1 && $row['active'] == 1) {
    session_start();
    $_SESSION['logged_in'] = 1;
    $_SESSION['username'] = $row['username'];
    header('location:http://localhost/paw/personalManager');

} elseif ($row['active'] != 1) {
    $error = "Your Account is not activated yet!";
    header('location:http://localhost/paw/personalManager/views/login.phtml');
} else {
    $error = "Invalid Credentials!";
    header('location:http://localhost/paw/personalManager/views/login.phtml');
}

?>
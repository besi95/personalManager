<?php
include("config.php");
include "../functions.php";
$baseUrl = getBaseUrl();

$error = '';
$email = mysqli_real_escape_string($conn, $_POST['email']);
$password = md5(mysqli_real_escape_string($conn, $_POST['user_password']));


$sql = "SELECT * FROM perdorues WHERE email = '$email' and pasuord = '$password'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result, MYSQLI_ASSOC);

$count = mysqli_num_rows($result);


if ($count == 1 && $row['is_activated'] == 1) {
    die('u logua');
    session_start();
    $_SESSION['logged_in'] = 1;
    $_SESSION['username'] = $row['username'];
    header('location:http://localhost/paw/personalManager');

} elseif ($row['is_activated'] != 1) {
    die('not activated');
    $error = "Your Account is not activated yet!";
    header('location:http://localhost/paw/personalManager/views/login.phtml');
} else {
    die('error');
    $error = "Invalid Credentials!";
    header('location:http://localhost/paw/personalManager/views/login.phtml');
}

?>
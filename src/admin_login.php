<?php
include("config.php");
include "../functions.php";
$baseUrl = getBaseUrl();

$error = '';
$username = mysqli_real_escape_string($conn, $_POST['admin_user']);
$password = md5(mysqli_real_escape_string($conn, $_POST['user_password']));
$privateToken = mysqli_real_escape_string($conn, $_POST['private_token']);


$authenticate = authenticateAdmin($username, $password, $privateToken, $conn);
$isAuthenticated = $authenticate['authenticated'];

if ($isAuthenticated == 1) {
    $row = $authenticate['row'];

    session_start();
    $_SESSION['admin_logged_in'] = 1;
    $_SESSION['admin_username'] = $row['username'];
    header('location: ../admin/index.php');

} else {

    $error = "Invalid Credentials!";
    header('location: ../views/admin_login.phtml');
}

function authenticateAdmin($username, $password, $privateToken, $conn)
{

    $params = array();
    $sql = "SELECT * FROM admin WHERE username = '{$username}' 
                                and pasuord = '{$password}' 
                                and secret_token = '{$privateToken}'";

    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

    $count = mysqli_num_rows($result);

    return $params[] = array(
        'row' => $row,
        'authenticated' => $count
    );
}

?>
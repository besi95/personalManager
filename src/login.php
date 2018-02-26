<?php
include("config.php");
include "../functions.php";
$baseUrl = getBaseUrl();

$errors = array();
/**
 * clean up queries per te bere prevent sql injection
 */
$email = mysqli_real_escape_string($conn, $_POST['email']);
$password = md5(mysqli_real_escape_string($conn, $_POST['user_password']));


$sql = "SELECT * FROM perdorues WHERE email = '$email' and pasuord = '$password'";
$result = $conn->query($sql);

$count = $result->num_rows;
if($count == 1){
    $row = $result->fetch_assoc();
}else{
    $row['is_activated'] = 1;
}

if ($count == 1 && $row['is_activated'] == 1) {

    session_start();
    $_SESSION['logged_in'] = 1;
    $_SESSION['username'] = $row['username'];
    $_SESSION['user_id'] = $row['perdorues_id'];
    header('Location: ../dashboard/index.php');

} elseif ($row['is_activated'] != 1) {

    $errors[] = "Llogaria juaj nuk eshte e aprovuar!";
    setcookie('login_status', json_encode($errors), time() + 3600, '/');

    header('location: ../views/login.php');
} else {

    $errors[] = "Kredencialet jane te gabuara!";
    setcookie('login_status', json_encode($errors), time() + 3600, '/');
    header('location: ../views/login.php');
}

?>
<?php
include("config.php");
include "../functions.php";
$errors = array();
$baseUrl = getBaseUrl();
$captchaStatus = verifyCaptcha();

if(!$captchaStatus){
    $errors[] = "Captcha eshte e gabuar, provoni perseri!";
    setcookie('login_status', json_encode($errors), time() + 3600, '/');
    header('location: ../views/login.php');
    die();

}
/**
 * clean up queries per te bere prevent sql injection
 * provo me ' or ""=""' tek fusha email
 * per ta provuar duhet hequr validimi nga login_validation.js
 */
$email = $_POST['email'];
$password = md5(mysqli_real_escape_string($conn, $_POST['user_password']));

/**
 * sql injection not prevented
 */
$sql = "SELECT * FROM perdorues WHERE email = '$email' and pasuord = '$password'";
$result = $conn->query($sql);

$count = $result->num_rows;
if ($count == 1) {
    $row = $result->fetch_assoc();
} else {
    $row['is_activated'] = 1;
}


/**
 * prevent SQL injection
 */
//$stmt = $conn->prepare("SELECT * FROM perdorues WHERE email = ? and pasuord = ?");
//
//$stmt->bind_param("ss",$email,$password);
//$stmt->execute();
//$result = $stmt->get_result();
//$count = $result->num_rows;
//$row = $result->fetch_assoc();
//$stmt->close();
//$conn->close();


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


/**
 * @return bool
 * verifiko recaptchan
 */
function verifyCaptcha()
{
    require_once('../captcha/autoload.php');
    $privatekey = "6LdU00UUAAAAAM30QvlWB36ecyEfaqH9HEjGAd4F";
    $recaptcha = new \ReCaptcha\ReCaptcha($privatekey);
    $resp = $recaptcha->verify($_POST['g-recaptcha-response'], $_SERVER['REMOTE_ADDR']);

    if($_POST['g-recaptcha-response'] == '' || !isset($_POST['g-recaptcha-response'])){
        return false;
    }
    elseif ($resp->isSuccess()){
        return true;
    }
    else{
        return false;
    }


}

?>

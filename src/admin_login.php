<?php
include("config.php");
include "../functions.php";
$baseUrl = getBaseUrl();

$error = '';
$username = $_POST['admin_user'];
$password = $_POST['user_password'];
$privateToken = $_POST['private_token'];

/**
 * thirr funksionin e autentikimit
 */
$authenticate = authenticateAdmin($username, $password, $privateToken, $conn);
$isAuthenticated = $authenticate['authenticated'];

if ($isAuthenticated == 1) {

    $row = $authenticate['row'];
    session_start();
    $_SESSION['admin_logged_in'] = 1;
    $_SESSION['admin_id'] = $row['admin_id'];
    $_SESSION['admin_username'] = $row['username'];
    header('location: ../admin/index.php');

} else {

    $error = "Invalid Credentials!";
    header('location: ../views/admin_login.php');
}

function authenticateAdmin($username, $password, $privateToken, $conn)
{

    /**
     * perdor parametrized queries per te bere prevent sql injection
     * provo me: 12345679'OR 1='1 si token
     */
    $username = mysqli_real_escape_string($conn,$username);
    $password = md5(mysqli_real_escape_string($conn, $password));
    $privateToken =(mysqli_real_escape_string($conn, $privateToken));

    $stmt = $conn->prepare(     "SELECT * FROM admin WHERE username = ?
                                and pasuord = ?
                                and secret_token = ?");

    $stmt->bind_param("sss",$username,$password,$privateToken);
    $stmt->execute();
    $result = $stmt->get_result();

     $params = array(
        'row' => $result->fetch_assoc(),
        'authenticated' => $result->num_rows
    );

    $stmt->close();
    $conn->close();
    return $params;



    /**
     * ky kod eshte i pambrojtur ndaj sql injection
     * provo me: 12345679'OR 1='1 si token
     */
//    $params = array();
//    $row=false;
//    $sql = "SELECT * FROM admin WHERE username = '{$username}'
//                                and pasuord = '{$password}'
//                                and secret_token = '{$privateToken}'";
//
//
//
//    $result = mysqli_query($conn, $sql);
//    $count = mysqli_num_rows($result);
//    if($count >0) {
//        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
//    }
//
//    $params = array(
//        'row' => $row,
//        'authenticated' => $count
//    );
//
//    return $params;
}

?>
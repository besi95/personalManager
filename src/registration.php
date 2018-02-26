<?php
/**
 * this file will handle registration process
 */
include 'config.php';
$errors = array();

$params = $_POST;
$firstName = $params['first_name'];
$lastName = $params['last_name'];
$email = $params['email'];
$dateOfBirth = $params['birth_date'];
$userName = $params['user_name'];
$password = md5($params['user_password']);
$contactNo = $params['contact_no'];
$plan = $params['plan'];

//check if email exists in users table
$sql = "SELECT * FROM perdorues WHERE email = '{$email}'";
$result = $conn->query($sql);

$count = $result->num_rows;

if($count > 0){

    $errors[] = "Perdoruesi me kete email ekziston.";
    setcookie('registration_status', json_encode($errors), time() + 3600, '/');
    header('Location: ../views/login.php');


}else {

// prepare and bind parameters to prevent sql injection

    $stmt = $conn->prepare(
        "INSERT INTO perdorues (emri, mbiemri, username, email,
    datelindja,plan_id,telefon,pasuord)
VALUES (?,?,?,?,?,?,?,?)");

    $stmt->bind_param("ssssssis",
        $firstName,
        $lastName,
        $userName,
        $email,
        $dateOfBirth,
        $plan,
        $contactNo,
        $password
    );

    $stmt->execute();

    $stmt->close();
    $conn->close();

    $errors[] = "Perdoruesi u krijua me sukses.";
    setcookie('registration_status', json_encode($errors), time() + 3600, '/');
    header('Location: ../views/login.php');

}


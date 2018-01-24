<?php
/**
 * this file will handle registration process
 */
include 'config.php';

$params = $_POST;
$firstName = $params['first_name'];
$lastName = $params['last_name'];
$email = $params['email'];
$dateOfBirth = $params['birth_date'];
$userName = $params['user_name'];
$password = md5($params['user_password']);
$contactNo = $params['contact_no'];
$plan = $params['plan'];

//check if email exists
$sql = "SELECT * FROM perdorues WHERE email = '{$email}'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result, MYSQLI_ASSOC);

$count = mysqli_num_rows($result);
if($count > 0){
    $error = "User with this email already exists.";
    die("user exists");

}

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

echo "New User created successfully!";
$stmt->close();
$conn->close();

header('Location: http://localhost/paw/personalManager/');


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
$plan = 1;

// prepare and bind parameters to prevent sql injection

$stmt = $conn->prepare(
    "INSERT INTO user (name, surname, username, email,
    date_of_birth,plan_id,phone_nr,password)
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


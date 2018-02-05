<?php
session_start();
include 'config.php';
$userId = $_SESSION['user_id'];

$emri = $fjalekalimi = $tipi = $email = "";
if (isset($_POST['submit'])) {

    $emri = $_POST['emri'];
    $fjalekalimi = $_POST['fjalekalimi'];
    $tipi = $_POST['tipi'];
    $email = $_POST['email'];
    $emailSql = "INSERT INTO `email` (`perdorues_id`, 
                `perdorues_email`, `pasuordi`, `tipi_email`,`emri`) 
                VALUES ('{$userId}', '{$email}', '{$fjalekalimi}', '{$tipi}','{$emri}');";

    $result = $conn->query($emailSql);
    header('Location: ../Admin/email.php');

}

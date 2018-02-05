<?php
session_start();
include 'config.php';
$userId = $_SESSION['user_id'];

$emri = $etiketimi = $permbajtja = "";
if (isset($_POST['submit'])) {

    $emri = $_POST['emri'];
    $etiketimi =  $_POST['label'];
    $permbajtja = $_POST['shenimi'];

    $shenimSql = "INSERT INTO `shenime` (`shenimi`,`etiketimi`, `emri`, `perdorues_id`) 
                  VALUES ('{$permbajtja}','{$etiketimi}', '{$emri}', '{$userId}');";




    $result = $conn->query($shenimSql);
    header('Location: ../Admin/shenime.php');

}

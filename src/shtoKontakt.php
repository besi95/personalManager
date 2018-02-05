<?php
session_start();
include 'config.php';
$userId = $_SESSION['user_id'];

$kontakti = $numri = $shteti = $tipi = "";
if (isset($_POST['submit'])) {

    $kontakti = $_POST['kontakti'];
    $numri =  $_POST['numri_telefonit'];
    $shteti = $_POST['shteti_perkates'];
    $tipi = $_POST['tipi'];

    $kontaktSql = "INSERT INTO `nr_telefoni` (`emer_kontakti`, 
                   `numri`, `tipi`, `shteti`, `perdorues_id`) VALUES 
                  ('{$kontakti}', '{$numri}', '{$tipi}', '{$shteti}', '{$userId}');";



    $result = $conn->query($kontaktSql);
    header('Location: ../Admin/kontakte_telefonike.php');

}

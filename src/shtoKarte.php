<?php
session_start();
include 'config.php';
$userId = $_SESSION['user_id'];

$emertimi = $fjalekalimi = $dataLeshimit = $dataSkadences = $tipi = $nrKartes = "";
if (isset($_POST['submit'])) {

    $emertimi = $_POST['emer_karte'];
    $nrKartes = $_POST['numer_karte'];
    $fjalekalimi = $_POST['fjalekalimi'];
    $dataLeshimit = $_POST['data_e_leshimit'];
    $dataSkadences = $_POST['data_e_skadences'];
    $tipi = $_POST['tipi_kartes'];

    $kartaSql = "INSERT INTO `karta_bankare` ( `karta_emer`,
                `nr_karte`, `pasuordi`, `vlefshme_nga`, `vlefshme_deri`,
                 `tipi`, `perdorues_id`) VALUES 
                 ('{$emertimi}', '{$nrKartes}', 
                 '{$fjalekalimi}', '{$dataLeshimit}', '{$dataSkadences}', '{$tipi}', '{$userId}');";


    $result = $conn->query($kartaSql);
    header('Location: ../Admin/karta.php');

}

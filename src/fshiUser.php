<?php
include "config.php";
$userId = $_GET['userId'];
/**
 * fshi kartat e userit
 */
$fshiKarta = "DELETE FROM karta_bankare
              WHERE karta_bankare.perdorues_id = '{$userId}'";
$conn->query($fshiKarta);


/**
 * fshi kartat e userit
 */
$fshiFile = "DELETE FROM file
              WHERE file.perdorues_id = '{$userId}'";
$conn->query($fshiFile);


/**
 * fshi kontaktet e userit
 */
$fshiKontakte = "DELETE FROM nr_telefoni 
              WHERE nr_telefoni.perdorues_id = '{$userId}'";
$conn->query($fshiKontakte);

/**
 * fshi emailet e userit
 */
$fshiEmail = "DELETE FROM email 
              WHERE email.perdorues_id = '{$userId}'";
$conn->query($fshiEmail);

/**
 * fshi shenimet e userit
 */
$fshiShenime = "DELETE FROM shenime 
              WHERE shenime.perdorues_id = '{$userId}'";
$conn->query($fshiShenime);

/**
 * fshi vete perdoruesin
 */
$fshiSql = "DELETE FROM perdorues 
              WHERE perdorues.perdorues_id = '{$userId}'";
$conn->query($fshiSql);


header('Location: ../admin/user.php');
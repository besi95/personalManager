<?php
include "config.php";
$userId = $_GET['userId'];
$aprovoSql = "UPDATE perdorues SET perdorues.is_activated = 1
WHERE perdorues.perdorues_id = '{$userId}'";
$result = $conn->query($aprovoSql);
header('Location: ../admin/user.php');
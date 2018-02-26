<?php
include 'config.php';
$fileId = $_GET['fileId'];
$fileName = $_GET['fileName'];

$fshiSql = "DELETE FROM `file` WHERE file.file_id = '{$fileId}'";
$result = $conn->query($fshiSql);
unlink('../dokumenta/'.$fileName);
header('Location: ../dashboard/dokumente.php');
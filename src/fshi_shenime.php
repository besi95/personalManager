<?php
include 'config.php';
//merr id e shenimit nga url
$ID =  $_GET['shenimId'];

// sql to delete a record
$sql = "DELETE  FROM shenime WHERE shenime_id=$ID";
if (mysqli_query($conn, $sql)) {
	header("Location: ../dashboard/shenime.php");

} else {
    header("Location: ../dashboard/shenime.php");
}
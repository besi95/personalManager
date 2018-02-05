<?php
include 'config.php';
//merr id e shenimit nga url
$ID =  $_GET['shenimId'];
// sql to delete a record
$sql = "DELETE  FROM shenime WHERE shenime_id=$ID";
if (mysqli_query($conn, $sql)) {
	header("Location: ../Admin/Shenime.php");
	die();
} else {
	echo "Error deleting record: " . mysqli_error($conn);
}
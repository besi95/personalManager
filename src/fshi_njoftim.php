<?php
include 'config.php';
//merr id e njoftimit nga url
$ID =  $_GET['njoftimId'];
// sql to delete a record
$sql = "DELETE  FROM njoftime WHERE id=$ID";
if (mysqli_query($conn, $sql)) {
	header("Location: ../Admin/njoftime.php");
	die();
} else {
	echo "Error deleting record: " . mysqli_error($conn);
}
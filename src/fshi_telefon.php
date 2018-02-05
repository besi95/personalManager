<?php
include 'config.php';
//merr id e telefonit nga url
$ID =  $_GET['telefonId'];
// sql to delete a record
$sql = "DELETE  FROM nr_telefoni WHERE nr_id=$ID";
if (mysqli_query($conn, $sql)) {
	header("Location: ../Admin/kontakte_telefonike.php");
	die();
} else {
	echo "Error deleting record: " . mysqli_error($conn);
}
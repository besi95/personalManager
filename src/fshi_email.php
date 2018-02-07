<?php
include 'config.php';

//merr id e emailit nga url
$ID =  $_GET['emailId'];

// sql to delete a record
$sql = "DELETE  FROM email WHERE email_id=$ID";
if (mysqli_query($conn, $sql)) {
	header("Location: ../dashboard/email.php");

} else {
    header("Location: ../dashboard/email.php");
}
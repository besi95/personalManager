<?php
include 'config.php';
session_start();
$emerFile = $path = $kategoriId = $fileExtension = $perdoruesId = "";
$emerFile = $_POST['emertimi'];
$path = $_FILES["file"]["name"];
$kategoriId = $_POST['kategoria'];

$fileExtension = '.'.strtolower(pathinfo($path, PATHINFO_EXTENSION));;
$perdoruesId = $_SESSION['user_id'];

$errors = array();

$shtoQuery = "INSERT INTO `file` (`file_emer`, `path`, `kategori_id`, `file_extension`, `perdorues_id`) 
              VALUES ('{$emerFile}', '{$path}', '{$kategoriId}', '{$fileExtension}', '{$perdoruesId}');";

$result = $conn->query($shtoQuery);


if ($result) {
    $uploadStatus = uploadFile();
    if ($uploadStatus == false) {
        $errors[] = "File nuk mund te uploadohet.";
        setcookie('shtim_status', json_encode($errors), time() + 3600, '/');
        header('Location: ../dashboard/dokumente.php');
    }else {
        $errors[] = "Shtimi u krye me sukses!";
        setcookie('shtim_status', json_encode($errors), time() + 3600, '/');
        header('Location: ../dashboard/dokumente.php');
    }
} else {
    $errors[] = "Shtimi i filet nuk mund te kryhet. Provoni perseri.";
    setcookie('shtim_status', json_encode($errors), time() + 3600, '/');
    header('Location: ../dashboard/dokumente.php');

}


function uploadFile()
{

    $target_dir = "../dokumenta/";
    $target_file = $target_dir . basename($_FILES["file"]["name"]);
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

// Check if file already exists
    if (file_exists($target_file)) {
        return false;
    }
// Check file size
    if ($_FILES["file"]["size"] > 5000000) {
        return false;
    }
// Allow certain file formats
    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "pdf" && $imageFileType != "gif" && $imageFileType != "xsl" && $imageFileType != "doc") {
        return false;

    }

    if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {;
        return true;
    } else {
        return false;
    }

}



?>

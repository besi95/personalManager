<?php
include 'config.php';


$emri = $mbiemri = $email = $username = $ditelindja = $password = $nrTel =  $confirmPassword = "";
$emri = $_POST['emri'];
$mbiemri = $_POST['mbiemri'];
$email = $_POST['email'];
$ditelindja = $_POST['ditelindja'];
$password = md5($_POST['password']);
$username = $_POST['username'];
$nrTel = $_POST['nr_tel'];
$plan = $_POST['plan'];
$errors = array();

if (isset($_POST['submit'])) {

        $password = md5($password);
        $editSql = "UPDATE perdorues SET
                    emri ='{$emri}',
                    mbiemri='{$mbiemri}',
                    datelindja='{$ditelindja}',
                    username = '{$username}',
                    telefon = '{$nrTel}',
                    plan_id = '{$plan}',
                    pasuord = '{$password}'
                    WHERE email='{$email}'";
        $result = $conn->query($editSql);


    if ($result) {
        $errors[] = "Perdoruesi u editua me sukses!";
        setcookie('editim_result', json_encode($errors), time() + 3600, '/');
        header('Location: ../dashboard/user.php');
    } else {
        $errors[] = "Editimi nuk mund te kryhet!";
        setcookie('editim_result', json_encode($errors), time() + 3600, '/');
        header('Location: ../dashboard/user.php');
    }
}
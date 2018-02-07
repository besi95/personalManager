<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>

    <title>Personal Manager</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
    <link href="../css/style.css" type="text/css">
    <link rel='stylesheet prefetch'
          href='../bootstrap/bootstrap-3.2.0/dist/css/bootstrap.min.css'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../skin/css/style.css">
    <script src='../bootstrap/js/jquery.min.js'></script>
    <script src='../bootstrap/bootstrap-3.2.0/dist/js/bootstrap.min.js'></script>

</head>
<div id="myPage"></div>
<nav class="navbar navbar-default navbar-fixed-top">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="../index.php">KeepItSafe</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
        <ul class="nav navbar-nav navbar-right">
            <li><a href="#services">SHËRBIME</a></li>
            <li><a href="#pricing">PLANET</a></li>
            <li><a href="#about">RRETH NESH</a></li>
            <li><a href="#contact">KONTAKT</a></li>
            <?php if(!isset($_SESSION['logged_in'])){?>
            <li><a href="login.php">LOGIN</a></li>
            <?php }else {?>
                <li><a href="../dashboard/index.php">DASHBOARD</a></li>
                <li><a href="../src/logout.php">LOGOUT</a></li>
            <?php  } ?>
        </ul>
    </div>
</nav>
<body>

<?php
session_start();
$userId = $_SESSION['user_id'];

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
    <link rel="icon" type="image/png" sizes="96x96" href="assets/img/favicon.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

    <title>Dashboard</title>

    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />


    <!-- Bootstrap core CSS     -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />

    <!-- Animation library for notifications   -->
    <link href="assets/css/animate.min.css" rel="stylesheet"/>

    <!--  Paper Dashboard core CSS    -->
    <link href="assets/css/paper-dashboard.css" rel="stylesheet"/>

    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="assets/css/demo.css" rel="stylesheet" />

    <!--  Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Muli:400,300' rel='stylesheet' type='text/css'>
    <link href="assets/css/themify-icons.css" rel="stylesheet">
    <style>
        .input-forma{
            margin-left: 15%;
        }
        .cart-form{
            margin-left: 18%;

        }
        .shto-email{
            display: none;
        }
    </style>

</head>
<body>

<div class="wrapper">
    <div class="sidebar" data-background-color="black" data-active-color="danger">

        <!--
            Tip 1: you can change the color of the sidebar's background using: data-background-color="white | black"
            Tip 2: you can change the color of the active button using the data-active-color="primary | info | success | warning | danger"
        -->


        <div class="sidebar-wrapper">
            <div class="logo">
                <a href="dashboard.php" class="simple-text">
                    Keep it Safe
                </a>
            </div>

            <ul class="nav">
                <li>
                    <a href="dashboard.php">
                        <i class="ti-panel"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li>
                    <a href="user.php">
                        <i class="ti-user"></i>
                        <p>Profili i Përdoruesit</p>
                    </a>
                </li>
                <li>
                    <a href="dokumente.php">
                        <i class="ti-view-list-alt"></i>
                        <p>Dokumente</p>
                    </a>
                </li>
                <li>
                    <a href="karta.php">
                        <i class="ti-credit-card"></i>
                        <p>Karta Bankare</p>
                    </a>
                </li>
                <li>
                    <a href="kontakte_telefonike.php">
                        <i class="ti-mobile"></i>
                        <p>Kontakte Telefonike</p>
                    </a>
                </li>
                <li>
                    <a href="shenime.php">
                        <i class="ti-book"></i>
                        <p>Shënime</p>
                    </a>
                </li>
                <li>
                    <a href="email.php">
                        <i class="ti-email"></i>
                        <p>Email</p>
                    </a>
                </li>
                <li class="active">
                    <a href="export.php">
                        <i class="ti-export"></i>
                        <p>Export</p>
                    </a>
                </li>
                <li>
                    <a href="njoftime.php">
                        <i class="ti-bell"></i>
                        <p>Njoftime</p>
                    </a>
                </li>
            </ul>
        </div>
    </div>

    <div class="main-panel">
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar bar1"></span>
                        <span class="icon-bar bar2"></span>
                        <span class="icon-bar bar3"></span>
                    </button>
                    <a class="navbar-brand" href="#">Eksporto Kontakte</a>
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-right">

                        <li>
                            <a href="#">
                                <i class="ti-user"></i>
                                <p>Logout</p>
                            </a>
                        </li>
                    </ul>

                </div>
            </div>
        </nav>


        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Export</h4>
                                <p class="category">EKsporto ne format XML kontaktet e ruajtura.</p>
                            </div>

                        <div style="padding-bottom: 50px;" class="row">
                            <br><br>
                            <div class="col-md-6">
                            <div class="text-center">
                                <a id="shfaqForm" style="background-color: #cc4836; border: none; width: 300px;margin-top: 20px" href="../src/eksportoKontakte.php?userId=<?php echo $userId?>" class="btn btn-info btn-fill btn-wd">Eksporto Kontaktet</a>

                            </div>
                            </div>
                            <div class="col-md-6">
                                <div class="text-center">
                                    <a id="shfaqForm" style="background-color: #27a0cc; border: none; width: 300px;margin-top: 20px" href="../src/eksportoKontakteStyled.php?userId=<?php echo $userId?>" class="btn btn-info btn-fill btn-wd">Eksporto Kontaktet te Stiluara</a>

                                </div>
                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

    <footer class="footer">
        <div class="container-fluid">
            <div class="copyright pull-right">
                &copy; <script>document.write(new Date().getFullYear())</script>, made with <i class="fa fa-heart heart"></i> by <a href="#">Keep It Safe</a>
            </div>
        </div>
    </footer>

</div>
</div>


</body>

<!--   Core JS Files   -->
<script src="assets/js/jquery-1.10.2.js" type="text/javascript"></script>
<script src="assets/js/bootstrap.min.js" type="text/javascript"></script>

<!--  Checkbox, Radio & Switch Plugins -->
<script src="assets/js/bootstrap-checkbox-radio.js"></script>

<!--  Charts Plugin -->
<script src="assets/js/chartist.min.js"></script>

<!--  Notifications Plugin    -->
<script src="assets/js/bootstrap-notify.js"></script>

<!--  Google Maps Plugin    -->
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js"></script>

<!-- Paper Dashboard Core javascript and methods for Demo purpose -->
<script src="assets/js/paper-dashboard.js"></script>

<!-- Paper Dashboard DEMO methods, don't include it in your project! -->
<script src="assets/js/demo.js"></script>



</html>

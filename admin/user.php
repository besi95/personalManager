<?php
session_start();

if (!isset($_SESSION['admin_logged_in'])) {
    header('Location: ../views/admin_login.php');
}
include '../src/config.php';
$userId = $_SESSION['admin_id'];
$userSql = "SELECT * FROM `perdorues`";
$users = $conn->query($userSql);


?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <link rel="icon" type="image/png" sizes="96x96" href="assets/img/locked-padlock-with-chain.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>

    <title>Admin Dashboard</title>

    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport'/>
    <meta name="viewport" content="width=device-width"/>


    <!-- Bootstrap core CSS     -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet"/>

    <!-- Animation library for notifications   -->
    <link href="assets/css/animate.min.css" rel="stylesheet"/>

    <!--  Paper Dashboard core CSS    -->
    <link href="assets/css/paper-dashboard.css" rel="stylesheet"/>

    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="assets/css/demo.css" rel="stylesheet"/>

    <!--  Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Muli:400,300' rel='stylesheet' type='text/css'>
    <link href="assets/css/themify-icons.css" rel="stylesheet">

</head>
<body>

<div class="wrapper">
    <div class="sidebar" data-background-color="black" data-active-color="danger">
        <div class="sidebar-wrapper">
            <div class="logo">
                <a href="#" class="simple-text">
                    Keep it Safe
                </a>
            </div>

            <ul class="nav">
                <li>
                    <a href="dashboard.php">
                        <i class="ti-panel"></i>
                        <p>Raporte</p>
                    </a>
                </li>
                <li class="active">
                    <a href="user.php">
                        <i class="ti-user"></i>
                        <p>Përdoruesit</p>
                    </a>
                </li>
                <li>
                    <a href="dokumente.php">
                        <i class="ti-view-list-alt"></i>
                        <p>Dokumente</p>
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
                    <a class="navbar-brand" href="#">Profili i Përdoruesit</a>
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-right">

                        <li>
                            <a href="../src/logout.php">
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
                                <h4 class="title">Perdoruesit</h4>
                                <p class="category">Lista e Perdoruesve te Regjistruar </p>
                            </div>
                            <div class="content table-responsive table-full-width">
                                <table class="table table-striped">
                                    <thead>
                                    <th>Nr #</th>
                                    <th>Emri</th>
                                    <th>Email</th>
                                    <th>Username</th>
                                    <th>Statusi</th>
                                    <th>Veprimi</th>
                                    </thead>
                                    <tbody>
                                    <?php while ($user = $users->fetch_assoc()) { ?>
                                        <tr>
                                            <td><?php echo $user['perdorues_id'] ?></td>
                                            <td><?php echo $user['emri'].' '.$user['mbiemri'] ?></td>
                                            <td><?php echo $user['email'] ?></td>
                                            <td><?php echo $user['username']?></td>
                                            <td><?php echo $user['is_activated'] == 1 ? "<span class='label label-success'>Aprovuar</span>": "<span class='label label-danger'>Pa Aprovuar</span>"?></td>
                                            <td><a href="<?php echo '../src/aprovoUser.php?userId=' . $user['perdorues_id'] ?>">Aprovo</a>
                                                |
                                                <a href="<?php echo '../src/fshiUser.php?userId=' . $user['perdorues_id'] ?>">Fshi</a>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                    </tbody>
                                </table>

                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>


        <footer class="footer">
            <div class="container-fluid">
                <div class="copyright pull-right">
                    &copy;
                    <script>document.write(new Date().getFullYear())</script>
                    , made with <i class="fa fa-heart heart"></i> by <a href="#">Keep It Safe</a>
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

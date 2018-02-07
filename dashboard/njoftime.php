<?php
session_start();
if(!isset($_SESSION['logged_in'])){
    header('Location: ../views/login.php');
}
$userId = $_SESSION['user_id'];
include '../src/config.php';
?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="icon" type="image/png" sizes="96x96" href="assets/img/locked-padlock-with-chain.png">
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

    <!--     Fonts and icons     -->
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
                    <a href="user.php">
                        <i class="ti-user"></i>
                        <p>Profili</p>
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
                <li>
                    <a href="export.php">
                        <i class="ti-export"></i>
                        <p>Export</p>
                    </a>
                </li>
            </ul>
    	</div>
    </div>
     <div class="main-panel">
		<nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand" href="#">Njoftime</a>
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
                    <div class="header">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Njoftimet e përdoruesve</h4>
                                <p class="category">Lista njoftimeve të tua</p>
                            </div>
                            <div class="content table-responsive table-full-width">
                                <table class="table table-striped">
                                    <thead>
                                    <th>ID</th>
                                    <th>Përdoruesi</th>
                                    <th>Mesazhi</th>
                                    <th>Email i përdoruesit</th>
                                    <th>Data Dërgimit</th>
                                    <th>Veprimi</th>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $sql = "SELECT * FROM njoftime";
                                    $result = $conn->query($sql);

                                    ?><?php while ($njoftim=$result -> fetch_assoc()) { ?>
                                        <tr>
                                            <td><?php echo $njoftim['id'];  ?></td>
                                            <td><?php echo $njoftim['user_name'];  ?></td>
                                            <td><?php echo $njoftim['mesazhi'];  ?></td>
                                            <td>
                                                <a href="mailto:<?php echo $njoftim['user_email'];  ?>">
                                                    <?php echo $njoftim['user_email'];  ?>
                                                </a>
                                            </td>
                                            <td><span class="label label-danger"><?php echo $njoftim['data_krijimit'];  ?></span></td>
                                            <td><a href="<?php echo '../src/fshi_njoftim.php?njoftimId='. $njoftim['id']; ?>">Fshi</a> </td>
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

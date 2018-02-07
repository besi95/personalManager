<?php
session_start();
if(!isset($_SESSION['logged_in'])){
    header('Location: ../views/login.php');
}
include '../src/config.php';
$userId = $_SESSION['user_id'];
$userSql = "SELECT * FROM `perdorues` WHERE perdorues_id = '{$userId}'";
$user = $conn->query($userSql);
$user = $user->fetch_assoc();
$plans = array('Free','Pro','Premium');

if(isset($_COOKIE['editim_result'])){
    $results = json_decode($_COOKIE['editim_result']);
    setcookie('editim_result', '', time() - 3600, '/');
}


?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
    <link rel="icon" type="image/png" sizes="96x96" href="assets/img/favicon.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>

    <title>Dashboard</title>

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
                <li class="active">
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
                    <div class="col-lg-4 col-sm-6">
                        <div class="card">
                            <div class="content">
                                <div class="row">
                                    <div class="col-xs-5">
                                        <div class="icon-big icon-warning text-center">
                                            <i class="ti-server"></i>
                                        </div>
                                    </div>
                                    <div class="col-xs-7">
                                        <div class="numbers">
                                            <p>Kapaciteti</p>
                                            105GB
                                        </div>
                                    </div>
                                </div>
                                <div class="footer">
                                    <hr />
                                    <div class="stats">
                                        <i class="ti-reload"></i> Përditëso tani
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-6">
                        <div class="card">
                            <div class="content">
                                <div class="row">
                                    <div class="col-xs-5">
                                        <div class="icon-big icon-success text-center">
                                            <i class="ti-wallet"></i>
                                        </div>
                                    </div>
                                    <div class="col-xs-7">
                                        <div class="numbers">
                                            <p>Të ardhurat</p>
                                            $1,345
                                        </div>
                                    </div>
                                </div>
                                <div class="footer">
                                    <hr />
                                    <div class="stats">
                                        <i class="ti-calendar"></i> Dita e djeshme
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-6">
                        <div class="card">
                            <div class="content">
                                <div class="row">
                                    <div class="col-xs-5">
                                        <div class="icon-big icon-danger text-center">
                                            <i class="ti-pulse"></i>
                                        </div>
                                    </div>
                                    <div class="col-xs-7">
                                        <div class="numbers">
                                            <p>Gabimet</p>
                                            23
                                        </div>
                                    </div>
                                </div>
                                <div class="footer">
                                    <hr />
                                    <div class="stats">
                                        <i class="ti-timer"></i> Përgjatë orëve të fundit
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-4 col-md-5">
                        <div class="card card-user">
                            <div class="image">
                                <h1 style="text-align: center;color: #e76d15;"> "Keep It Safe"</h1>
                            </div>
                            <div class="content">
                                <div class="author">
                                    <img class="avatar border-white" src="../skin/images/lock.png" alt="..."/>
                                    <h4 class="title">Besim Saraci<br/>
                                    </h4>
                                </div>
                                <p class="description text-center">
                                    "Ne sigurohemi qe <br>
                                    te dhenat tuaja <br>
                                    te jene te sigurta..."
                                </p>
                            </div>
                            <hr>
                            <br>
                        </div>
                    </div>
                    <div class="col-lg-8 col-md-7">
                        <div class="card">
                            <?php
                            foreach($results as $result) {
                                ?>
                                <span style="color: #557eff;"><?php echo $result ?></span><br>
                                <?php
                            }?>
                            <div class="header">
                                <h4 class="title">Edito Profilin</h4>
                            </div>
                            <div class="content">
                                <form method="post" action="../src/editoUser.php">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Username</label>
                                                <input type="text" name="username" class="form-control border-input"
                                                       placeholder="Username" value="<?php echo $user['username']?>">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="email">Email</label>
                                                <input type="email" name="email" id="email"
                                                       class="form-control border-input" readonly="readonly" placeholder="Email"
                                                       value="<?php echo $user['email']?>">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Emri</label>
                                                <input type="text" name="emri" class="form-control border-input"
                                                       placeholder="Emer" value="<?php echo $user['emri']?>" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Last Name</label>
                                                <input type="text" name="mbiemri" class="form-control border-input"
                                                       placeholder="Mbiemer" value="<?php echo $user['mbiemri']?>" required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Ditelindja</label>
                                                <input type="date" name="ditelindja" class="form-control border-input"
                                                       placeholder="Datelindja" value="<?php echo $user['datelindja'] ?>" required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-5">
                                            <div class="form-group">
                                                <label>Plan</label>
                                                <select name="plan" class="form-control border-input" required>
                                                    <option <?php echo $user['plan_id'] == 1? "selected='selected'": ''?>value="1">Free</option>
                                                    <option <?php echo $user['plan_id'] == 2? "selected='selected'": ''?> value="2">Premium</option>
                                                    <option <?php echo $user['plan_id'] == 3? "selected='selected'": ''?>value="3">Pro</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Nr Telefoni</label>
                                                <input type="text" name="nr_tel" class="form-control border-input"
                                                       placeholder="Nr Telefoni" value="<?php echo $user['telefon']?>" required>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Passwordi Aktual</label>
                                                <input type="password" name="password" class="form-control border-input"
                                                       placeholder="*******"  required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="text-center">
                                        <button type="submit" name="submit" class="btn btn-info btn-fill btn-wd">Edito Profilin
                                        </button>
                                    </div>
                                    <div class="clearfix"></div>
                                </form>
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

<?php
session_start();
if (!isset($_SESSION['admin_logged_in'])) {
    header('Location: ../views/admin_login.php');
}
include '../src/config.php';

/**
 * nr njoftimeve te marra sot
 */
$njoftimeSql = "SELECT COUNT(njoftime.id) as nr_njoftimeve FROM njoftime 
                where DATE(data_krijimit)=CURDATE()";
$nrNjoftimeve = $conn->query($njoftimeSql);
$nrNjoftimeve = $nrNjoftimeve->fetch_assoc();
$nrNjoftimeve = $nrNjoftimeve['nr_njoftimeve'];

/**
 * nr perdoruesve te rinj sot
 */
$perdoruesSql = "SELECT COUNT(perdorues_id) AS nr_perdoruesve FROM perdorues 
                where DATE(data_krijimit)=CURDATE()";
$nrPerdoruesve = $conn->query($perdoruesSql);
$nrPerdoruesve = $nrPerdoruesve->fetch_assoc();
$nrPerdoruesve = $nrPerdoruesve['nr_perdoruesve'];


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
                <li class="active">
                    <a href="dashboard.php">
                        <i class="ti-panel"></i>
                        <p>Raporte</p>
                    </a>
                </li>
                <li>
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
                    <a class="navbar-brand" href="#">Raporte</a>
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
                                <h4 class="title"> Shpërndarja e Planeve</h4>
                                <p class="category">Numri përdoruesve</p>
                            </div>
                            <div class="content">
                                <div id="piechart_3d" style="width: 900px; height: 500px;"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Statistikat e file-ve</h4>
                                <p class="category">Shpërndarja e fileve sipas tipit të tyre</p>

                            </div>
                            <div class="content">
                                <div id="columnchart_values" style="width: auto; height:auto;"></div>
                                <div class="footer">
                                    <hr>
                                    <div class="stats">
                                        <i class="ti-timer"></i> Te perditesuara
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card ">
                            <div class="header">
                                <h4 class="title">Mesazhet Sot</h4>
                                <p class="category">Numri i mesazheve te derguara sot.</p>
                            </div>
                            <div class="content">
                                <div class="icon-big icon-success">
                                    <i class="ti-email"></i>
                                    <span style="color: #ff3f44;">Ju keni <?php echo $nrNjoftimeve?> mesazhe te derguara sot!</span>
                                </div>

                                <div class="footer">
                                    <hr>
                                    <div class="stats">
                                        <i class="ti-check"></i> Perditesuar
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card ">
                            <div class="header">
                                <h4 class="title">Perdorues Te Rinj Sot</h4>
                                <p class="category">Numri i perdoruesve te regjistruar sot.</p>
                            </div>
                            <div class="content">
                                <div class="icon-big icon-success">
                                    <i class="ti-user"></i>
                                    <span style="color: #ff3f44;">Ju keni <?php echo $nrPerdoruesve?> perdorues te rinj sot!</span>
                                </div>

                                <div class="footer">
                                    <hr>
                                    <div class="stats">
                                        <i class="ti-check"></i> Perditesuar
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


<!--  Notifications Plugin    -->
<script src="assets/js/bootstrap-notify.js"></script>

<!-- Paper Dashboard Core javascript and methods for Demo purpose -->
<script src="assets/js/paper-dashboard.js"></script>


<script type="text/javascript">
    $(document).ready(function () {

        demo.initChartist();

        $.notify({
            icon: 'ti-gift',
            message: "Mirë se erdhët në <b>Keep It Safe</b> - platforma e duhur në ofrimin e sigurisë dhe interaktivitetit më bashkëkohor."

        }, {
            type: 'success',
            timer: 4000
        });

    });
</script>

<?php
$plansSql = "SELECT COUNT(perdorues.perdorues_id) AS nr_perdoruesve, 
            plan.name FROM perdorues
            INNER JOIN plan ON plan.plan_id = perdorues.plan_id
            GROUP BY perdorues.plan_id";
$planet = $conn->query($plansSql);

?>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
    google.charts.load("current", {packages: ["corechart"]});
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
        var data = google.visualization.arrayToDataTable([
            ['Plani', 'Numri Perdoruesve'],
            <?php
            while($plan = $planet->fetch_assoc()) {
            ?>
            ['<?php echo $plan['name']?>',     <?php echo $plan['nr_perdoruesve']?>],
            <?php } ?>
        ]);

        var options = {
            title: 'PLANET',
            is3D: true,
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
        chart.draw(data, options);
    }
</script>


<?php
$fileExtension = "SELECT COUNT(file.file_id) AS nr_fileve,
                  file.file_extension FROM file
                  GROUP BY file.file_extension";
$files = $conn->query($fileExtension);
?>
<script type="text/javascript">
    google.charts.load("current", {packages: ['corechart']});
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
        var data = google.visualization.arrayToDataTable([
            ["Tipi i Filet", "Numri i Fileve", {role: "style"}],
            <?php while($file = $files->fetch_assoc()){?>
            ["<?php echo $file['file_extension']?>", <?php echo $file['nr_fileve']?>, "#3c5db8"],
            <?php }?>

        ]);

        var view = new google.visualization.DataView(data);
        view.setColumns([0, 1,
            {
                calc: "stringify",
                sourceColumn: 1,
                type: "string",
                role: "annotation"
            },
            2]);

        var options = {
            title: "Numri i fileve te ruajtura sipas tipit",
            width: 450,
            height: 400,
            bar: {groupWidth: "95%"},
            legend: {position: "none"},
        };
        var chart = new google.visualization.ColumnChart(document.getElementById("columnchart_values"));
        chart.draw(view, options);
    }
</script>

</html>

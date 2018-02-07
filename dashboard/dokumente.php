<?php
session_start();

if(!isset($_SESSION['logged_in'])){
    header('Location: ../views/login.php');
}
if(isset($_COOKIE['shtim_status'])){
    $results = json_decode($_COOKIE['shtim_status']);
    setcookie('shtim_status', '', time() - 3600, '/');
}

include '../src/config.php';

$userId = $_SESSION['user_id'];
$fileSql = "SELECT * FROM `file` WHERE file.perdorues_id = '{$userId}'";
$files = $conn->query($fileSql);

$categorySql = "SELECT * FROM kategori_file";
$categories = $conn->query($categorySql);

function formatSizeUnits($bytes)
{
    if ($bytes >= 1073741824)
    {
        $bytes = number_format($bytes / 1073741824, 2) . ' GB';
    }
    elseif ($bytes >= 1048576)
    {
        $bytes = number_format($bytes / 1048576, 2) . ' MB';
    }
    elseif ($bytes >= 1024)
    {
        $bytes = number_format($bytes / 1024, 2) . ' KB';
    }
    elseif ($bytes > 1)
    {
        $bytes = $bytes . ' Bytes';
    }
    elseif ($bytes == 1)
    {
        $bytes = $bytes . ' Byte';
    }
    else
    {
        $bytes = '0 Bytes';
    }

    return $bytes;
}

function getFileCategory($categoryId,$conn){
    $categorySql = "SELECT * FROM `kategori_file` WHERE kategori_id  = '{$categoryId}'";
    $files = $conn->query($categorySql);
    $category = $files->fetch_assoc();
    return $category['emri'];
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
    <style>
        .left {
            float: left;
        }

        .both {
            clear: both;
        }

        .file-upload-container {
            width: 400px;
            border: 1px solid #efefef;
            padding: 10px;
            border-radius: 6px;
            -webkit-border-radius: 6px;
            -moz-border-radius: 6px;
            background: #fbfbfa;
        }

        .file-upload-override-button {
            position: relative;
            overflow: hidden;
            cursor: pointer;
            background-color: #ff653a;
            color: white;
            text-align: center;
            padding-top: 8px;
            width: 150px;
            height: 40px;
        }

        .file-upload-override-button:hover {
            background-color: #e7600b;
            color: white;
        }

        .file-upload-override-button:active {
            position: relative;
            top: 1px;
        }

        .file-upload-button {
            position: absolute;
            height: 50px;
            top: -10px;
            left: -10px;
            cursor: pointer;
            opacity: 0;
            filter: alpha(opacity=0);
        }

        .file-upload-filename {
            margin-left: 10px;
            height: auto;
            padding: 8px;
        }

        .shto-dokument {
            padding: 15px;
            display: none;
        }
    </style>

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
                <li class="active">
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
                    <a class="navbar-brand" href="#">Dokumentat</a>
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
                            <?php
                            foreach($results as $result) {
                                ?>
                            <div class="alert alert-warning">
                                <span><?php echo $result ?></span>
                            </div><br>
                                <?php
                            }?>
                            <div class="header">
                                <h4 class="title">Dokumenta</h4>
                                <p class="category">Lista e Dokumentave Tuaja</p>
                            </div>
                            <div class="content table-responsive table-full-width">
                                <table class="table table-striped">
                                    <thead>
                                    <th>Nr #</th>
                                    <th>Emri</th>
                                    <th>Madhesia</th>
                                    <th>Kategoria</th>
                                    <th>Tipi</th>
                                    <th>Veprimi</th>
                                    </thead>
                                    <tbody>
                                    <?php while($file=$files->fetch_assoc()){?>
                                    <tr>
                                        <td><?php echo $file['file_id']?></td>
                                        <td><?php echo $file['file_emer']?></td>
                                        <td><?php echo formatSizeUnits(filesize('../dokumenta/'.$file['path'])) ?></td>
                                        <td><?php echo getFileCategory($file['kategori_id'],$conn)?></td>
                                        <td><?php echo strtoupper($file['file_extension'])?></td>
                                        <td><a href="<?php echo '../dokumenta/'.$file['path']?>">Shiko</a> |
                                            <a href="<?php echo '../src/fshiFile.php?fileId='.$file['file_id'].'&fileName='.$file['path']?>">Fshi</a> |
                                            <a href="<?php echo '../src/shikoFile.php?fileName='.$file['path'].'&fileExt='.$file['file_extension']?>">Shkarko</a>
                                        </td>
                                    </tr>
                                    <?php } ?>
                                    </tbody>
                                </table>

                            </div>
                        </div>
                        <div class="text-center">
                            <button id="shfaqForm" style="background-color: #cc4836; border: none" class="btn btn-info btn-fill btn-wd">Shto Dokument
                            </button>

                        </div>
                        <div class="shto-dokument card">
                            <h4 class="title">Shto Dokument</h4>
                            <br>
                            <form method="post" action="../src/shtoFile.php" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="file-upload-container">
                                            <div class="file-upload-override-button left">
                                                Upload Dokumentin
                                                <input type="file" name="file" class="file-upload-button" id="file-upload-button"required>
                                            </div>
                                            <div class="file-upload-filename left" id="file-upload-filename">Ju nuk keni
                                                zgjedhur asnje file
                                            </div>
                                            <div class="both"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                            <label>Kategoria</label>
                                            <select name="kategoria" class="form-control border-input" required>
                                                <?php while($category = $categories->fetch_assoc()){?>
                                                <option value="<?php echo $category['kategori_id']?>"><?php echo $category['emri']?></option>
                                                <?php }?>
                                            </select>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group input-forma ">
                                            <label>Emertimi</label>
                                            <input type="text" name="emertimi" class="form-control border-input">
                                        </div>
                                    </div>
                                </div>
                                <br><br>
                                <div class="text-center">
                                    <button type="submit" name="submit" class="btn btn-info btn-fill btn-wd">Shto Dokument
                                    </button>

                                </div>
                            </form>
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

<script>
    $("#file-upload-button").change(function () {
        var fileName = $(this).val().replace('C:\\fakepath\\', '');
        $("#file-upload-filename").html(fileName);
    });

    jQuery(document).ready(function(){
        jQuery('#shfaqForm').on('click', function(event) {
            jQuery('.shto-dokument').toggle('show');
        });
    });

</script>


</html>

<?php
include ('../functions.php');
include('../src/registration.php');?>
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
        <script src="../bootstrap/modernizr.min.js" type="text/javascript"></script>
        <link rel='stylesheet prefetch'
              href='../bootstrap/bootstrap-validator/css/bootstrapValidator.min.css'>
        <script src='../bootstrap/js/jquery.min.js'></script>
        <script src='../bootstrap/bootstrap-validator/js/bootstrapvalidator.min.js'></script>
        <script src="../skin/js/register_validation.js"></script>

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

                <?php if(!isset($_SESSION['logged_in'])){?>
                    <li><a href="login.php">LOGIN</a></li>
                <?php }else {?>
                    <li><a href="../dashboard/index.php">DASHBOARD</a></li>
                    <li><a href="../src/login.php">Login</a></li>
                <?php  } ?>
            </ul>
        </div>
    </nav>
<body>
<div class="login-container">
    <div class="container">
        <div class="row">
            <form class="well form-horizontal" action="registration.php" method="post" id="contact_form">
                <fieldset>

                    <!-- Form Name -->
                    <legend>
                        <center><h2><b>Anëtarësohu</b></h2></center>
                    </legend>
                    <center><a href="../views/login.php">Keni nje llogari ?</a></center>

                    <!-- Text input-->

                    <div class="form-group required">
                        <label class="col-md-4 control-label">Emri</label>
                        <div class="col-md-4 inputGroupContainer">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                <input name="first_name" placeholder="Emri" class="form-control" value="<?php echo isset($_POST['first_name']) ? $_POST['first_name'] : ''?>" type="text">
                            </div>
                        </div><span> <?php echo isset($errors2['firstName']) ? $errors2['firstName'] : ''?></span>
                    </div>

                    <!-- Text input-->

                    <div class="form-group required">
                        <label class="col-md-4 control-label">Mbiemri</label>
                        <div class="col-md-4 inputGroupContainer">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                <input name="last_name" placeholder="Mbiemri" class="form-control" type="text" value="<?php echo isset($_POST['last_name']) ? $_POST['last_name'] : ''?>">
                            </div>
                        </div><span> <?php echo isset($errors2['lastName']) ? $errors2['lastName'] : ''?></span>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label">Datëlindja</label>
                        <div class="col-md-4 selectContainer">
                            <div class="input-group date">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                                <input type="date" name="birth_date" class="form-control" placeholder="Datëlindja">
                            </div>
                        </div>
                    </div>

                    <!-- Text input-->

                    <div class="form-group required">
                        <label class="col-md-4 control-label">Username</label>
                        <div class="col-md-4 inputGroupContainer">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                <input name="user_name" placeholder="Username" class="form-control" type="text">
                            </div>
                        </div>
                    </div>

                    <!-- Text input-->

                    <div class="form-group required">
                        <label class="col-md-4 control-label">Fjalëkalimi</label>
                        <div class="col-md-4 inputGroupContainer">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                                <input name="user_password" placeholder="*****" class="form-control" type="password">
                            </div>
                        </div>
                        <span> <?php echo isset($errors2['password']) ? $errors2['password'] : ''?></span>
                    </div>

                    <!-- Text input-->

                    <div class="form-group required">
                        <label class="col-md-4 control-label">Konfirmo Fjalëkalimin</label>
                        <div class="col-md-4 inputGroupContainer">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                                <input name="confirm_password" placeholder="******" class="form-control"
                                       type="password">
                            </div>
                        </div>
                    </div>

                    <!-- Text input-->
                    <div class="form-group required">
                        <label class="col-md-4 control-label">E-Mail</label>
                        <div class="col-md-4 inputGroupContainer">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                                <input name="email" placeholder="example@emaple.com" class="form-control" type="text" value="<?php echo isset($_POST['email']) ? $_POST['email'] : ''?>">
                            </div>
                        </div>
                        <span> <?php echo isset($errors2['email']) ? $errors2['email'] : ''?></span>
                    </div>


                    <!-- Text input-->

                    <div class="form-group required">
                        <label class="col-md-4 control-label">Numër Telefoni</label>
                        <div class="col-md-4 inputGroupContainer">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span>
                                <input name="contact_no" placeholder="(06*)" class="form-control" type="text" value="<?php echo isset($_POST['contact_no']) ? $_POST['contact_no'] : ''?>" >
                            </div>
                        </div>
                        <span> <?php echo isset($errors2['contactNo']) ? $errors2['contactNo'] : ''?></span>
                    </div>

                    <!-- Select Basic -->

                    <div class="form-group">
                        <label class="col-md-4 control-label">Zgjidhni Planin Tuaj:</label>
                        <div class="select-plan">
                            <div class="col-md-4 inputGroupContainer">
                                <div class="input-group">
                                    <label>
                                        <input type="radio" class="option-input radio" name="plan" value="1" checked/>
                                        FREE
                                    </label>
                                    <label>
                                        <input type="radio" class="option-input radio" name="plan" value="2"/>
                                        PRO
                                    </label>
                                    <label>
                                        <input type="radio" class="option-input radio" name="plan" value="3"/>
                                        PREMIUM
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <center><span class="red-alert"><i>* Required fields.</i></span></center>

                    <!-- Button -->
                    <div class="form-group ">
                        <label class="col-md-4 control-label"></label>
                        <div class="col-md-4"><br>
                            &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                            <button type="submit" name="register" class="btn btn-warning">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspRegjistrohu <span
                                        class="glyphicon glyphicon-send"></span>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                            </button>
                        </div>
                    </div>

                </fieldset>
            </form>
        </div>
    </div>
</div>


<?php include 'footer.php'; ?>
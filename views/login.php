<?php
include ('../functions.php');
$loginAction = getActionUrl('login');
include ('header.php');
$errors = array();
if(isset($_COOKIE['login_status'])) {
    $errors = json_decode($_COOKIE['login_status']);
    setcookie('login_status', '', time() - 3600, '/');
}
$registrationErrors = array();
if(isset($_COOKIE['registration_status'])) {
    $errors = json_decode($_COOKIE['registration_status']);
    setcookie('registration_status', '', time() - 3600, '/');
}

?>
    <head>
        <script src="../bootstrap/modernizr.min.js" type="text/javascript"></script>
        <link rel='stylesheet prefetch'
              href='../bootstrap/bootstrap-validator/css/bootstrapValidator.min.css'>
        <script src='../bootstrap/js/jquery.min.js'></script>
        <script src='../bootstrap/bootstrap-validator/js/bootstrapvalidator.min.js'></script>
        <script src="../skin/js/login_validation.js"></script>
    </head>

<div class="login-container login-page">
    <div class="container">
        <div class="row">
            <?php
            if (count($errors) > 0) {

                foreach ($errors as $error) {
                    ?>
                    <div class="alert alert-danger">
                        <span ><?php echo $error ?></span><br>
                    </div>
                    <?php
                }
            } ?>
            <?php
            if (count($registrationErrors) > 0) {

                foreach ($registrationErrors as $regError) {
                    ?>
                    <div class="alert alert-danger">
                        <span ><?php echo $regError ?></span><br>
                    </div>
                    <?php
                }
            } ?>
            <form  class="well form-horizontal" action="<?php echo $loginAction?>" method="post"  id="login_form">
        <fieldset>

            <!-- Form Name -->
            <legend><center><h2><b>Login</b></h2></center></legend><br>
            <center><a href="../views/registration.php">Not a Member ?</a></center>


            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-4 control-label">E-Mail</label>
                <div class="col-md-4 inputGroupContainer">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                        <input name="email" placeholder="E-Mail Address" class="form-control"  type="text">
                    </div>
                </div>
            </div>


            <!-- Text input-->

            <div class="form-group">
                <label class="col-md-4 control-label" >Password</label>
                <div class="col-md-4 inputGroupContainer">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                        <input name="user_password" placeholder="Password" class="form-control"  type="password">
                    </div>
                </div>
            </div>


            <!-- Success message -->
            <div class="alert alert-success" role="alert" id="success_message">Success <i class="glyphicon glyphicon-thumbs-up"></i> Success!.</div>

            <!-- Button -->
            <div class="form-group">
                <label class="col-md-4 control-label"></label>
                <div class="col-md-4"><br>
                    &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<button type="submit" class="btn btn-warning" >&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspLogin <span class="glyphicon glyphicon-send"></span>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</button>
                </div>
            </div>

        </fieldset>
    </form>
        </div>
    </div>
</div>

<?php include 'footer.php';?>
<?php
include ('../functions.php');
$loginAction = getActionUrl('admin_login');
include ('header.php');
?>
<!DOCTYPE html>
<html lang="en" >

<br><br>
<div class="container" style="min-height: 730px">

    <form class="well form-horizontal admin-well-panel" action="<?php echo $loginAction?>" method="post"  id="login_form">
        <fieldset>

            <!-- Form Name -->
            <legend><center><h2><b>Login to Admin Panel</b></h2></center></legend><br>

            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-4 control-label">User Name</label>
                <div class="col-md-4 inputGroupContainer">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                        <input name="admin_user"  placeholder="User Name" class="form-control"  type="text" required>
                    </div>
                </div>
            </div>


            <!-- Text input-->

            <div class="form-group">
                <label class="col-md-4 control-label" >Password</label>
                <div class="col-md-4 inputGroupContainer">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                        <input name="user_password" placeholder="Password" class="form-control"  type="password" required>
                    </div>
                </div>
            </div>

            <!-- Text input-->

            <div class="form-group">
                <label class="col-md-4 control-label" >Token</label>
                <div class="col-md-4 inputGroupContainer">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-qrcode"></i></span>
                        <input name="private_token" placeholder="Token" class="form-control"  type="password" required>
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
<?php include 'footer.php';?>



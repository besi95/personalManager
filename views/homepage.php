<?php
include 'header.php';
include "../src/config.php";
if(isset($_POST['submit'])){
    $emri = $_POST['emri'];
    $email = $_POST['email'];
    $mesazhi = $_POST['mesazhi'];
    $mesazhSql = "INSERT INTO `njoftime` (`user_name`, `mesazhi`, `user_email`) 
    VALUES ('{$emri}', '{$mesazhi}', '$email');" ;
    $result = $conn->query($mesazhSql);
    header('Location: homepage.php');
}
?>

<div  class="jumbotron text-center homepage-hero">
    <div class="typewriter">
    <h1>Keep It Safe.</h1>
    <blockquote class="blockquote-custom">
        <p class="mb-0">Informacionet dhe dokumentat tuaja janë të rëndësishme,ruajini dhe aksesojini ato në
            kasafortën tonë dixhitale!</p>
    </blockquote>
    </div>
</div>

<!-- Container (Services Section) -->
<div id="services" class="container-fluid text-center">
    <h2>SHËRBIMET</h2>
    <h4>Ne ofrojmë</h4>
    <br>
    <div class="row slideanim">
        <div class="col-sm-4">
            <span class="glyphicon glyphicon-lock logo-small"></span>
            <h4>Siguri</h4>
            <p>Ndalimi i aksesit të paautorizuar, nëpërmjet enkriptimit, secret token etj.</p>
        </div>
        <div class="col-sm-4">
            <span class="glyphicon glyphicon-leaf logo-small"></span>
            <h4>Lehtësi</h4>
            <p>..në përdorim dhe akses në çdo kohë</p>
        </div>

        <div class="col-sm-4">
            <span class="glyphicon glyphicon-folder-open logo-small"></span>
            <h4>Organizim</h4>
            <p>File dhe informacione të organizuara dhe lehtësisht të menaxhuesshme</p>
        </div>
        <div class="col-sm-4">
            <span class="glyphicon glyphicon-ok logo-small"></span>
            <h4>5GB falas</h4>
            <p>Ju ofrojmë 5GB hapësirë ruajtëse falas!</p>
        </div>

        <div class="col-sm-4">
            <span class="glyphicon glyphicon-phone-alt logo-small"></span>
            <h4>Suport</h4>
            <p>Përgjigje brenda 24 orëve për cdo paqartësi..</p>
        </div>
        <div class="col-sm-4">
            <span class="glyphicon glyphicon-dashboard logo-small"></span>
            <h4 style="color:#303030;">Performancë</h4>
            <p>Shpejtësi në aksesim dhe ngarkim të fileve.</p>
    </div>
    </div>
</div>

<br><br>
<!--planet-->
<!-- Container (Pricing Section) -->
<div id="pricing" class="container-fluid">
    <div class="text-center">
        <h2>PLANET E SHËRBIMIT</h2>
        <h4>Zgjidh palnin që ju përshtatet më shumë</h4>
    </div>
    <div class="row slideanim">
        <div class="col-sm-4 col-xs-12">
            <div class="panel panel-default text-center">
                <div class="panel-heading">
                    <h1>Falas</h1>
                </div>
                <div class="panel-body">
                    <p><strong>5</strong> GB</p>
                </div>
                <div class="panel-footer">
                    <h3>$0.00</h3>
                    <h4>në muaj</h4>
                    <a href="registration.php" class="btn btn-lg">Regjistrohu</a>
                </div>
            </div>
        </div>
        <div class="col-sm-4 col-xs-12">
            <div class="panel panel-default text-center">
                <div class="panel-heading">
                    <h1>PRO</h1>
                </div>
                <div class="panel-body">

                    <p><strong>10</strong> GB</p>
                </div>
                <div class="panel-footer">
                    <h3>$15</h3>
                    <h4>në muaj</h4>
                    <a href="registration.php" class="btn btn-lg">Regjistrohu</a>
                </div>
            </div>
        </div>
        <div class="col-sm-4 col-xs-12">
            <div class="panel panel-default text-center">
                <div class="panel-heading">
                    <h1>PREMIUM</h1>
                </div>
                <div class="panel-body">
                    <p><strong>20</strong> GB</p>
                </div>
                <div class="panel-footer">
                    <h3>$20</h3>
                    <h4>në muaj</h4>
                    <a href="registration.php" class="btn btn-lg">Regjistrohu</a>
                </div>
            </div>
        </div>
    </div>
</div>

<br><br>
<!-- Container (About Section) -->
<div id="about" class="container-fluid">
    <div class="row">
        <div class="about-container is-table-row">
        <div class="col-sm-8 col-same-height">
            <h2>Reth nesh</h2>
            <p>I krijuar në 2018, KeepItSAfe është website ku mund të ruani të gjitha informacionet tuaja personale dhe t'i aksesoni ato kudo që ndodheni. Ai do të jetë si një kujtesë e tretë për ju. Vlerat tona kryesore janë siguria dhe lehtësia. Me një staf të përgatitur dhe në shërbimin tuaj, KeepItSafe është zgjedhja më e mirë.
                Informacionet tuaja nuk do të shikohen apo ndryshohen as nga administratori i aplikimit, falë mënyrës së konceptimit të aplikacionit.</p>
        </div>
        <div class="col-sm-4 col-same-height">
            <div class="row">
                <div class="col-sm-6 text-center first">
                    <i class="fas fa-american-sign-language-interpreting logo"></i>
                </div>
                <div class="col-sm-6 text-center">
                    <i class="fas fa-lock logo"></i>
                </div>
                <div class="col-sm-12 text-center logo-text">
                    <hr/><p>Reth nesh</p><hr/>
                </div>
                <div class="col-sm-6 text-center first">
                    <i class="fas fa-key logo"></i>
                </div>
                <div class="col-sm-6 text-center">
                    <i class="fas fa-user logo"></i>
                </div>
            </div>
        </div>
        </div><!-- .about-container-->
    </div>
</div>


<!-- Container (Portfolio Section) -->
<div id="portfolio" class="container-fluid text-center bg-grey">

    <h2>Çfarë përdoruesit tanë thonë:</h2>
    <div id="myCarousel" class="carousel slide text-center" data-ride="carousel">
        <!-- Indicators -->
        <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
        </ol>

        <!-- Wrapper for slides -->
        <div class="carousel-inner" role="listbox">
            <div class="item active">
                <img src="../skin/images/boy.png" class="img-circle" alt="Cinque Terre" style="margin-left:45%;" width="100" height="60">
                <h4>"Kjo kompani është më e mira. Më ofron gjithë mundësitë për organzimin dhe ruajtjen e informacionit
                    tim personal!"<br><span>Besim Saraci</span></h4>
            </div>
            <div class="item">
                <img src="../skin/images/boy.png" class="img-circle" alt="Cinque Terre" style="margin-left:45%;" width="100" height="60">

                <h4>"Në këtë kohë me kaq llogari dhe passworde, është e duhura !"<br><span>Malvina Xhabafti</span></h4>
            </div>
            <div class="item">
                <img src="../skin/images/boy.png" class="img-circle" alt="Cinque Terre" style="margin-left:45%;" width="100" height="60">

                <h4>"Mund të kem dokumentet e mia kudo që jam lehtësisht, faleminderit!"<br><span>Eugerta Haris</span>
                </h4>
            </div>
        </div>
    </div>
</div>


<!-- Container (Contact Section) -->
<div id="contact" class="container-fluid bg-grey">
    <h2 class="text-center">Kontakt</h2>
    <div class="row content-desc">
        <div class="col-sm-5 adresa-container">
            <p>Na kontaktoni për çdo paqartësi dhe ne do ju përgjigjemi brenda 24 orëve</p>
            <p><span class="glyphicon glyphicon-map-marker"></span> Tiranë, AL</p>
            <p><span class="glyphicon glyphicon-phone"></span> +355 5566 777</p>
            <p><span class="glyphicon glyphicon-envelope"></span> kasafortaDixhitale@gmail.com</p>
        </div>
        <div class="col-sm-7 slideanim">
            <div class="row">
                <form method="post">
                <div class="col-sm-6 form-group">
                    <input class="form-control" id="name" name="emri" placeholder="Emri" type="text" required>
                </div>
                <div class="col-sm-6 form-group">
                    <input class="form-control" id="email" name="email" placeholder="Email" type="email" required>
                </div>
            </div>
            <textarea class="form-control" id="comments" name="mesazhi" placeholder="komenti" rows="5"></textarea><br>
            <form class="row">
                <div class="col-sm-12 form-group">
                    <button class="btn btn-default pull-right" name="submit" type="submit">Dërgo</button>
                </div>
            </form>
            </div>
        </div>
    </div>

<?php include 'footer.php'; ?>

<!-- Navbar -->


<!-- solution 1 -->
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

<!-- Latest compiled and minified CSS -->
<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css"></link> -->

<!-- Optional theme -->
<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css"></link> -->

<!-- Latest compiled and minified JavaScript -->
<!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>-->

<!-- solution 2 -->

<!-- jQuery -->
<!-- <script src="/admin/plugins/jquery/jquery.min.js"></script> -->

<!-- Bootstrap 4 -->
<!-- <script src="/admin/assets/js/jquery.validate.min.js"></script>
<script src="/admin/assets/js/plugins/underscore/underscore-min.js"></script>
<script src="/admin/assets/js/bootstrap/bootstrap.min.js"></script> -->
<!-- <script src="/admin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script> -->

<!-- resoudre le probleme du bouton toggle  -->
<!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script> -->


<!-- solution 3 -->

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>


<style>
    .navbar {
        display: block !important;
        min-height: 54px;
    }

    .pull-right {
        float: right !important;
    }
</style>
<!-- <nav class="navbar navbar-expand-sm navbar-light bg-white shadow-sm"> -->
<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
    <div class="container">
        <!-- Brand -->
        <a class="navbar-brand" href="#" width="100"> <img src="../logo/anrt.jpg" width="100" alt="" class="d-inline-block align-middle mr-2"></a>

        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>


        <!-- Links -->

        <div class="collapse navbar-collapse" id="navbarText" >
            <!-- <ul class="navbar-nav ml-auto">  -->
            <!--  <ul class="nav justify-content-center">  -->

            <ul class="navbar-nav mr-auto">
                <!-- Dropdown -->
                <li class="nav-item">
                    <a class="nav-link" href="statut_volontaire.php" align="center">
                        <b>Statut الوضعية</b>
                    </a>
                </li>

                <li class="nav-item mx-auto">
                    <a class="nav-link" href="detail_volontaire.php" align="center">
                        <b>Mes Informations معلوماتي </b>
                    </a>
                </li>


                <li class="nav-item">
                    <a class="nav-link" href="period_show.php" align="center">
                        <b>MyQoS جودة خدمتي</b>
                    </a>
                </li>


                <li class="nav-item">
                    <a class="nav-link m-0" href="contact.php" align="center">
                        <b>Contactez-nous إتصلوا بنا</b>
                    </a>
                </li>

                <!-- <li class="nav-item ml-auto" >
                    <a class="nav-link" href="logout.php" align="center">
                        <i class="fas fa-user"></i>
                        <b>Logout</b> <br>
                        <b>خروج</b>
                    </a>
                </li> -->

            </ul>


            <!-- ancien emplacement du bouton navbar -->
        </div>

        <div class="row mt-3">
            <div class="col-6">
                <div class="row justify-content-center">
                    <div class="col-2 d-none d-sm-block">
                        <li class="nav-link">
                            <i class="fas fa-user"></i>
                        </li>
                    </div>

                    <div class="col d-none d-sm-block" style="width:250px">
                        <li class="nav-link">
                            <h6>
                                <?php echo $_SESSION['nom_par'] . " " . $_SESSION['prenom_par']; ?>
                            </h6>
                        </li>
                    </div>

                </div>
            </div>

            <div class="col-6" style="font-size:.9em">
                <div class="collapse navbar-collapse order-3 dual-collapse2" id="navbarText">
                    <ul class="navbar-nav">
                        <div class="row" style="width:120px">
                            <li class="nav-item">
                                <a class="nav-link text-primary " href="logout.php">Se déconnecter</a>
                                <a class="nav-link text-primary" href="logout.php">الخروج</a>
                            </li>

                        </div>

                    </ul>
                </div>
            </div>
        </div>


    </div>
</nav>

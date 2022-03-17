<?php
include('authen.php');
require_once('includes/header.php');
require_once 'includes/navbar.php';
$idf = $_SESSION['num_volontaire'];
// $num_ligne_par = $_SESSION['num_ligne_par'];

// error_reporting(E_ALL);
// ini_set("display_errors", 1);

include('../includes/connection.php');
include('../includes/participation.php');
include('../includes/detailcampagne.php');
$_PAR = new Participation();
$_DCP = new DetailCampagne();
//$dataDcp = $_DCP->getExistVolontaireById($idf);
$dataPar = $_PAR->getParticipationById($idf);
$dataDcp = $_DCP->getRequestVolontaireId($idf);

$etatCampagne = 0;
if (isset($dataDcp['campagne_id'])) {
  $cpgId = (int)$dataDcp['campagne_id'];
  $etatCampagne = $_DCP->getCampaignStatus($cpgId);
}
include('includes/periode.php');
?>

<body>
  <!-- <nav class="navbar navbar-collapse bg-dark-anrt">
    <div class="col-lg-4 col-sm-12 ng-star-inserted d-sm-none" style="text-align: center;">
      <font size="2px" color="white"><b> بوابة العملية الوطنية لتقييم جودة الأنترنت الثابت</b>
      </font>
    </div>
    <div class="col-lg-6 col-sm-12 ng-star-inserted d-sm-none" style="text-align: center;">
      <font size="2px" color="white"><b>Portail de la campagne nationale de mesure de la qualité de l'internet fixe </b></font>
    </div>

    <div class="col-sm-6 d-none d-sm-block" style="text-align: left;">
      <font size="2px" color="white"><b>Portail de la campagne nationale de mesure de la qualité de l'internet fixe </b></font>
    </div>
    <div class="col-sm-4 d-none d-sm-block" style="text-align: right;">
      <font size="2px" color="white"><b> بوابة العملية الوطنية لتقييم جودة الأنترنت الثابت</b> </font>
    </div>
    </div>
  </nav>
  <br> -->

  <main class="d-flex align-items-center min-vh-100 py-3 py-md-0">
    <div class="container">
      <div class="card" style="border-radius: 2%;">
        <div class="row no-gutters">
          <div class="col-md-4" style="background-color: #c21f37;">
            <div class="card-body">
              <div class="brand-wrapper">
                <center>
                  <h4>
                    <font color="white"><b>Ma qualité de service</b></font>
                  </h4>
                </center>
                <p>
                  <!--<b>-->
                  <font color="white">
                    <br>Accès aux indicateurs de performance de la qualité de votre propre abonnement Internet fixe tel que mesurée par l’équipement durant la période de mesure
                  </font>
                <p class="text-white font-italic font-weight-light"><small><u><b>Rappel:</b></u>L’ensemble des indicateurs de performances communiqués au Participant sont à titre indicatif et ne peuvent en aucun cas être utilisés comme une preuve opposable sur la qualité de service à l’encontre de l’opérateur lui fournissant le service Internet fixe</small></p>
                <!--</b>-->
                </p>
                <br>
                <center>
                  <h4>
                    <font color="white"><b> جودة خدمتي</b></font>
                  </h4>
                </center>
                <div dir="rtl" align="right">
                  <p>
                    <!--<b>-->
                    <font color="white">
                      توفر الوصول إلى مؤشرات الأداء الخاصة بجودة اشتراك الإنترنت الثابت الخاص بك كما تم قياسه بواسطة الجهاز خلال عملية القياس.

                      <!--</b>-->
                      <p class="font-italic font-weight-light"><small>
                          <u><b>تذكير</b></u> : إن جميع المؤشرات التي يتم إمداد المشارك بها هي مؤشرات إرشادية ولا يجوز، بأي حال من الأحوال، استعمالها كدليل على جودة الخدمة ضد المتعهد الذي يوفر خدمة الإنترنيت الثابت.
                        </small></p>
                    </font>
                  </p>

                  <center>
                    <br>
                    <nav class="login-card-footer-nav">
                      <a href="https://anrt.ma/">
                        <font color="white">© 2021 - Anrt.</font>
                      </a>
                      <a href="https://anrt.ma/">
                        <font color="white"> Tous droits réservés </font>
                      </a>
                    </nav>
                  </center>

                </div>
              </div>
            </div>
          </div>

          <div class="col-md-8">

            <div class="card-body" <?php if ($etatCampagne != 1) echo 'style="display:none"'; ?>>
              <!--  <p class="login-card-description">Sign into your account</p> -->
              <form id="form-connect" name="form-connect">

                <div class="row">
                  <div class="col">
                    <label for="Campagne" class="font-weight-bold">Id Volontaire : </label> &nbsp; QF<?php if ($dataDcp) echo $idf ?>
                  </div>
                  <!-- <div class="col text-left">
                    <span>QF</span><?php if ($dataDcp) echo $idf ?>
                  </div> -->
                  <div class="col text-right">
                    <label for="NumeroEquipement" class="font-weight-bold">Numéro de la ligne fixe :</label>  &nbsp;<?php if (isset($dataPar['num_ligne_par'])) echo $dataPar['num_ligne_par'] ?>
                  </div>
                  <!-- <div class="col">
                    <?php if (isset($dataPar['num_ligne_par'])) echo $dataPar['num_ligne_par'] ?>
                  </div> -->
                </div>

                <div class="row">
                  <div class="col">
                    <label for="DateDebut" class="font-weight-bold" style="font-size : 0.8em">Date d’installation de l’équipement de mesures :</label> &nbsp; <?php if (isset($dataPar['data_installation_par'])) echo $dataPar['data_installation_par'] ?>
                  </div>
                  <div class="col-4 text-right">
                    <label for="EtatEquipement" class="font-weight-bold">Offre de service :</label> &nbsp;<?php if (isset($dataPar['offre_service_par'])) echo $dataPar['offre_service_par'] ?>
                  </div>
                </div>

                <div class="row">
                  <div class="col">
                    <label for="DateFin">Date Fin</label>
                    <label for="datefincampagne" class="form-control"><?php if ($dataDcp) echo $dataDcp['campagne_date_fin']; ?></label>
                  </div>
                </div>

                <hr>

                <!--   <div class="card">  -->

                <div class="row">
                  <div class="col">
                    <!-- <label for="periodes" class="col-sm-3 col-form-label" > Sélectionner une Période : </label>  -->
                    <select class="form-control custom-select" name="periodes" id="periodes">
                      <option selected disabled> Sélectionner une période </option>
                      <?php
                      $_PER = new Periode();
                      $dataPer = $_PER->getExistPeriode($idf);
                      foreach ($dataPer as $rowdataPer) { ?>
                        <option value="<?php echo $rowdataPer['id_periode'] ?>"> <?php echo "periode " . $rowdataPer['id_periode'] ?> </option>
                      <?php } ?>
                    </select>
                  </div>
                </div>
              </form>
            </div>
            <div class="alert alert-warning m-5 text-center" role="alert" <?php if ($etatCampagne != 0)  echo 'style="display:none"'; ?>>
              Résultats de mesures en cours
            </div>
            <div id="customer-data"></div>
          </div>


        </div>

      </div>
    </div>
  </main>

</body>
<br>
<?php require_once 'includes/footer.php';  ?>

<!-- Bootstrap 4 -->

<script>
  $(document).ready(function() {
    $("#periodes").change(function() {
      $("#loader").show();
      var getPeriodeID = $(this).val();
      if (getPeriodeID != '0') {
        $.ajax({
          type: 'GET',
          url: 'detail_pkg.php',
          data: {
            customer_id: getPeriodeID
          },
          success: function(data) {
            $("#loader").hide();
            $("#customer-data").html(data);
          }
        });
      } else {
        $("#customer-data").html('');
        $("#loader").hide();
      }
    });

  });
</script>

</html>

<?php
include('authen.php');
require_once('includes/header.php');
require_once('includes/navbar.php');
include('../includes/connection.php');
include('../includes/participation.php');
include('../includes/detailcampagne.php');
include('../includes/campagne.php');

// header("Access-Control-Allow-Origin: *");
// header("Access-Control-Allow-Headers: *");

// error_reporting(E_ALL);
// ini_set("display_errors", 1);

$idf = $_SESSION['num_volontaire'];

$_PAR = new Participation();
$dataPar = $_PAR->getParticipationById($idf);

// Etat de l'equipement de mesure
if (isset($dataPar['equip_par'])) {
  $probeStatus = $dataPar['equip_par'];
} else {
  $probeStatus = 0;
}

// Get Request from detail campagne

$_DCP = new DetailCampagne();
$_CP = new Campagne();

$getvalnumVolotaire = $dataPar['num_volontaire'];
$volontaireCpg = -1;
$volontaireCpg = $_DCP->getExistVolontaireInCampagne($getvalnumVolotaire);
$campaignStatus = '';
if (isset($volontaireCpg[0])) {
  $campaignStatus = $_CP->getCampagneStatus($volontaireCpg[0]);
}

// echo "<pre>";
//  echo $campaignStatus;
// echo "</pre>";

?>

<style>
  .nohover {
    pointer-events: none;
  }

  .customStep {
    padding: 1em;
    height: 10%;
    width: 110px;
    font-size: .7em;
    overflow-wrap: break-word;
    word-wrap: break-word;
    hyphens: auto;
    border-radius: 2px
  }

  .bootbox .modal-header {
    display: block;
  }

  .fa-user-minus {
    color: #c21f37;
  }

  .btn-info {
    color: #fff;
    background-color: #084743;
    border-color: #084743;
    box-shadow: none;
  }

  .bg-pistache {
    background-color: #bef574;
  }

  .bg-disable {
    background-color: #EBEBE4;
  }

  .progress-sm {
    height: 0.5rem !important;
  }

  .progress-lg {
    height: 5rem !important;
  }

  .progress-bar {
    color: #212529 !important;
  }


  #progressbar {
    margin-bottom: 30px;
    overflow: hidden;
    color: #455A64;
    padding-left: 0px;
    margin-top: 30px
  }

  #progressbar li {
    list-style-type: none;
    font-size: 13px;
    width: 10%;
    float: left;
    position: relative;
    font-weight: 400;
    color: #455A64 !important
  }

  #progressbar #step1:before {
    content: "1";
    color: #fff;
    width: 20px;
    margin-left: 15px !important;
    padding-left: 11px !important
  }

  #progressbar #step2:before {
    content: "2";
    color: #fff;
    width: 30px
  }

  #progressbar #step3:before {
    content: "3";
    color: #fff;
    width: 30px;
    margin-right: 15px !important;
    padding-right: 11px !important
  }

  #progressbar li:before {
    line-height: 29px;
    display: block;
    font-size: 12px;
    background: #455A64;
    border-radius: 50%;
    margin: auto
  }


  /* for progressive bar new  */
  #progressbar li:after {
    content: '';
    width: 80%;
    height: 2px;
    background: #455A64;
    position: absolute;
    left: 0%;
    right: 0%;
    top: 15px;
    z-index: -1
  }

  #progressbar li:nth-child(2):after {
    left: 50%
  }

  #progressbar li:nth-child(1):after {
    left: 25%;
    width: 80%
  }

  #progressbar li:nth-child(3):after {
    left: 25% !important;
    width: 25% !important
  }

  #progressbar li.active:before,
  #progressbar li.active:after {
    background: #4bb8a9
  }

  .border-line {
    border-right: 1px solid rgb(226, 206, 226)
  }
</style>

<body>
  <main class="d-flex align-items-center min-vh-100 py-3 py-md-0">
    <div class="container">
      <div class="card" style="border-radius: 2%;">
        <div class="row no-gutters">

          <div class="col-md-4" style="background-color: #c21f37;">
            <!-- <img src="assets/images/login.jpg" alt="login" class="login-card-img" > -->
            <div class="card-body">
              <div class="brand-wrapper">
                <br>
                <center>
                  <h4>
                    <font color="white"><b>Statut de <br> ma participation</b></font>
                  </h4>
                </center>
                <br>
                <p>
                  <!--<b>-->
                  <font color="white">
                    <center>
                      Suivez les étapes de votre participation depuis l'inscription jusqu'à la confirmation de votre participation.
                    </center>
                  </font>
                  <!--</b>-->
                </p>
                <br>
                <center>
                  <h4>
                    <font color="white"><b> وضعية مشاركتي </b></font>
                  </h4>
                </center>
                <div dir="rtl" align="right">
                  <p>
                    <font color="white">
                      <center>
                        <!--<b>-->
                        اتبع مراحل مشاركتكم من التسجيل الأول حتى التأكيد النهائي
                        <!--</b>-->
                      </center>
                    </font>
                    <center>
                      <br><br>
                      <nav class="login-card-footer-nav">
                        <a href="https://anrt.ma/">
                          <font color="white">© <?php echo date("Y") ?> - ANRT.</font>
                        </a>
                        <a href="https://anrt.ma/">
                          <font color="white"> Tous droits réservés </font>
                        </a>
                      </nav>
                    </center>
                  </p>
                </div>
              </div>
            </div>
          </div>

          <div class="col-md-8">

            <!-- <div class="d-flex flex-column mb-2 mx-2 justify-content-center"> -->
            <div class="mt-3 ml-3">
              <h5>
                <font color="#c21f37"> Statut de ma participation / وضعية مشاركتي </font>
              </h5>
            </div>

            <!-- horizental stepper : on desktop and sm/md/large screens  -->
            <div class="d-none d-sm-block mt-5">
              <div class="bs-stepper">

                <div class="bs-stepper-header" role="tablist">

                  <!-- your steps here -->

                  <div class="row align-items-center no-gutters">

                    <div class="col">
                      <div class="step nohover" data-target="#first-part">
                        <div class="step-trigger" role="tab" aria-controls="first-part" id="first-part-trigger">
                          <span class="bs-stepper-circle <?php if (trim($dataPar['active_par']) == 1) {
                                                            echo 'bg-success text-white';
                                                          } else {
                                                            echo 'bg-disable ';
                                                          } ?>">
                            1</span>
                          <div class="bs-stepper-label customStep d-flex align-items-center justify-content-center
                              <?php if (trim($dataPar['active_par']) == 1) {
                                echo 'bg-success text-white';
                              } else {
                                echo 'bg-disable';
                              } ?>">Inscription <br />تسجيل</div>
                        </div>
                      </div>
                    </div>

                    <div class="col ">
                      <div class="line"></div>
                    </div>
                    <div class="col">
                      <!-- <div class="line"></div> -->
                      <div class="step nohover" data-target="#second-part">
                        <button type="button" class="step-trigger" role="tab" aria-controls="second-part" id="second-part-trigger">
                          <span class="bs-stepper-circle
                            <?php if (trim($dataPar['etat_submit_hotline']) == 1) {
                              echo 'bg-success';
                            } else {
                              echo 'bg-disable ';
                            } ?>">2</span>
                          <div class="bs-stepper-label customStep d-flex align-items-center justify-content-center
                            <?php if (trim($dataPar['etat_submit_hotline']) == 1) {
                              echo 'bg-success text-white';
                            } else {
                              echo 'bg-disable ';
                            } ?>">Données validées <br />تأكيد المعلومات </div>
                        </button>
                      </div>
                    </div>

                    <div class="col">
                      <div class="line"></div>
                    </div>
                    <div class="col">
                      <!-- <div class="line"></div> -->
                      <div class="step nohover" data-target="#third-part">
                        <button type="button" class="step-trigger" role="tab" aria-controls="third-part" id="third-part-trigger">
                          <span class="bs-stepper-circle
                            <?php if ($volontaireCpg > 0) {
                              echo 'bg-success text-white';
                            } else {
                              echo 'bg-disable ';
                            } ?>">3</span>
                          <div class="bs-stepper-label customStep d-flex align-items-center justify-content-center
                          <?php if ($volontaireCpg > 0) {
                            echo 'bg-success text-white';
                          } else {
                            echo 'bg-disable ';
                          } ?>">Participation validée<br>تأكيدالمشاركة</div>
                        </button>

                      </div>
                    </div>

                  </div>
                </div>

                <div class="bs-stepper-header" role="tablist">

                  <div class="row align-items-center no-gutters">

                    <div class="col">
                      <!-- <div class="line"></div> -->
                      <div class="step nohover" data-target="#forth-part">
                        <button type="button" class="step-trigger " role="tab" aria-controls="forth-part" id="forth-part-trigger">
                          <span class="bs-stepper-circle
                            <?php if (trim($dataPar['num_sonde_par']) > 0) {
                              echo 'bg-success text-white';
                            } else {
                              echo 'bg-disable ';
                            } ?>">4</span>
                          <div class="bs-stepper-label customStep d-flex align-items-center justify-content-center
                            <?php if (trim($dataPar['num_sonde_par']) > 0) {
                              echo 'bg-success text-white';
                            } else {
                              echo 'bg-disable ';
                            } ?>">Equipement installé <br>تثبيت الجهاز </div>
                        </button>
                      </div>

                    </div>

                    <div class="col ">
                      <div class="line"></div>
                    </div>

                    <div class="col">
                      <!-- <div class="line"></div> -->
                      <div class="step nohover" data-target="#sixth-part">
                        <button type="button" class="step-trigger " role="tab" aria-controls="sixth-part" id="sixth-part-trigger">
                          <span class="bs-stepper-circle
                            <?php if (trim($campaignStatus) == 'end') {
                              echo 'bg-success text-white';
                            } else {
                              echo 'bg-disable ';
                            } ?>">5</span>
                          <div class="bs-stepper-label customStep d-flex align-items-center justify-content-center
                            <?php if (trim($campaignStatus) == 'end') {
                              echo 'bg-success text-white';
                            } else {
                              echo 'bg-disable ';
                            } ?>">Campagne terminée <br>إنتهاء العملية </div>
                        </button>
                      </div>
                    </div>


                    <div class="col ">
                      <div class="line"></div>
                    </div>
                    <div class="col">
                      <!-- <div class="line"></div> -->
                      <div class="step nohover" data-target="#fifth-part">
                        <button type="button" class="step-trigger " role="tab" aria-controls="fifth-part" id="fifth-part-trigger">
                          <span class="bs-stepper-circle

                            <?php
                            if ($probeStatus == 2) {
                              echo 'bg-success text-white';
                            } else {
                              echo 'bg-disable ';
                            } ?>">6</span>
                          <div class="bs-stepper-label customStep d-flex align-items-center justify-content-center
                            <?php if ($probeStatus == 2) {
                              echo 'bg-success text-white';
                            } else {
                              echo 'bg-disable ';
                            } ?>">Equipement retiré<br>إزالة الجهاز</div>
                        </button>
                      </div>
                    </div>

                  </div>
                </div>

              </div>

              <!-- Emplacement "supprimer mon adhesion" -->
            </div>

            <!-- Vertical stepper : on mobile devices  -->
            <div class="d-flex flex-column d-sm-none my-2 mx-auto align-items-center">
              <div class="bs-stepper vertical ">

                <div class="bs-stepper-header" role="tablist">

                  <!-- your steps here -->

                  <div class="step nohover" data-target="#first-part">
                    <div class="step-trigger" role="tab" aria-controls="first-part" id="first-part-trigger">
                      <span class="bs-stepper-circle <?php if (trim($dataPar['active_par']) == 1) {
                                                        echo 'bg-success text-white';
                                                      } else {
                                                        echo 'bg-disable ';
                                                      } ?>">
                        1</span>
                      <div class="bs-stepper-label customStep d-flex align-items-center justify-content-center
                              <?php if (trim($dataPar['active_par']) == 1) {
                                echo 'bg-success text-white';
                              } else {
                                echo 'bg-disable';
                              } ?>">Inscription <br />تسجيل</div>
                    </div>
                  </div>

                  <div class="line"></div>
                  <div class="step nohover" data-target="#second-part">
                    <button type="button" class="step-trigger" role="tab" aria-controls="second-part" id="second-part-trigger">
                      <span class="bs-stepper-circle
                            <?php if (trim($dataPar['etat_submit_hotline']) == 1) {
                              echo 'bg-success';
                            } else {
                              echo 'bg-disable ';
                            } ?>">2</span>
                      <div class="bs-stepper-label customStep d-flex align-items-center justify-content-center
                            <?php if (trim($dataPar['etat_submit_hotline']) == 1) {
                              echo 'bg-success text-white';
                            } else {
                              echo 'bg-disable ';
                            } ?>">Données validées <br />تأكيد المعلومات </div>
                    </button>
                  </div>

                  <div class="line"></div>
                  <!-- <div class="line"></div> -->
                  <div class="step nohover" data-target="#third-part">
                    <button type="button" class="step-trigger" role="tab" aria-controls="third-part" id="third-part-trigger">
                      <span class="bs-stepper-circle
                            <?php if ($volontaireCpg > 0) {
                              echo 'bg-success text-white';
                            } else {
                              echo 'bg-disable ';
                            } ?>">3</span>
                      <div class="bs-stepper-label customStep d-flex align-items-center justify-content-center
                          <?php if ($volontaireCpg > 0) {
                            echo 'bg-success text-white';
                          } else {
                            echo 'bg-disable ';
                          } ?>">Participation validée<br>تأكيدالمشاركة</div>
                    </button>

                  </div>

                  <div class="line"></div>
                  <div class="step nohover" data-target="#forth-part">
                    <button type="button" class="step-trigger " role="tab" aria-controls="forth-part" id="forth-part-trigger">
                      <span class="bs-stepper-circle
                            <?php if (trim($dataPar['num_sonde_par']) > 0) {
                              echo 'bg-success text-white';
                            } else {
                              echo 'bg-disable ';
                            } ?>">4</span>
                      <div class="bs-stepper-label customStep d-flex align-items-center justify-content-center
                            <?php if (trim($dataPar['num_sonde_par']) > 0) {
                              echo 'bg-success text-white';
                            } else {
                              echo 'bg-disable ';
                            } ?>">Equipement installé <br>تثبيت الجهاز </div>
                    </button>
                  </div>

                  <div class="line"></div>
                  <!-- <div class="line"></div> -->
                  <div class="step nohover" data-target="#sixth-part">
                    <button type="button" class="step-trigger " role="tab" aria-controls="sixth-part" id="sixth-part-trigger">
                      <span class="bs-stepper-circle
                            <?php if (trim($campaignStatus) == 'end') {
                              echo 'bg-success text-white';
                            } else {
                              echo 'bg-disable ';
                            } ?>">5</span>
                      <div class="bs-stepper-label customStep d-flex align-items-center justify-content-center
                            <?php if (trim($campaignStatus) == 'end') {
                              echo 'bg-success text-white';
                            } else {
                              echo 'bg-disable ';
                            } ?>">Campagne terminée <br>إنتهاء العملية </div>
                    </button>
                  </div>

                  <div class="line"></div>
                  <div class="step nohover" data-target="#fifth-part">
                    <button type="button" class="step-trigger " role="tab" aria-controls="fifth-part" id="fifth-part-trigger">
                      <span class="bs-stepper-circle

                            <?php
                            if ($probeStatus == 2) {
                              echo 'bg-success text-white';
                            } else {
                              echo 'bg-disable ';
                            } ?>">6</span>
                      <div class="bs-stepper-label customStep d-flex align-items-center justify-content-center
                            <?php if ($probeStatus == 2) {
                              echo 'bg-success text-white';
                            } else {
                              echo 'bg-disable ';
                            } ?>">Equipement retiré<br>إزالة الجهاز</div>
                    </button>
                  </div>

                </div>

                <!-- Emplacement "supprimer mon adhesion" -->



              </div>
            </div>

            <div class="col-sm-5 float-right my-3">
              <button type="button" class="btn btn-danger delete_vol_cp float-right" data-id="<?php echo $dataPar['num_volontaire'] ?>" href="#<?php echo $dataPar['num_volontaire']; ?>" <?php if ((trim($campaignStatus) == 'plan') || (trim($campaignStatus) == 'end')) {
                                                                                                                                                                                            echo "disabled";
                                                                                                                                                                                          } ?>>Retirer ma candidature
              </button>
            </div>


          </div>

          <!-- </div> -->


        </div>

      </div>
    </div>
    </div>
  </main>

  <!-- // New section for -->

  <script>
    $(document).ready(function() {
      $('.delete_vol_cp').click(function(e) {
        e.preventDefault();
        var Insid = $(this).attr('data-id');
        var idf = $(this).attr('href').replace('#', '');
        var data = "idf=" + idf;

        console.log("Etape 1 ==> ok ");

        bootbox.dialog({
          title: "<i class='fa fa-user-minus'></i> Retirer votre candidature !",
          message: "<p>Voulez-vous retirer votre candidature ?</p><p class='text-right'>هل أنتم متأكدون من إلغاء ترشيحكم؟</p>",
          //size: 'small',
          onEscape: true,
          backdrop: true,
          buttons: {
            fum: {
              label: 'Annuler',
              className: 'btn-success',
              callback: function() {}
            },
            fo: {
              label: 'Supprimer',
              className: 'btn-danger',
              callback: function() {
                $.ajax({
                    type: 'POST',
                    // url: 'handler/delete-part.php',
                    url: 'handler/delete-participation.php',
                    data: data,
                    success : function() {
                      window.location.href = "delete_success.php";
                      exit;
                    }
                  })
                  // .done(function(response) {
                  //   bootbox.alert(response);
                  // })
                  .fail(function() {
                    bootbox.alert("Une erreur s'est produite. Veuillez réessayer ..");
                  })
                  .success(function() {
                    exit;
                  })
              }
            }
          }
        })

      });
    });
  </script>

</body>

<?php
//}
require_once 'includes/footer.php';
?>

<?php
include('authen.php');
require_once('includes/header.php');
require_once 'includes/navbar.php';
include('../includes/connection.php');
include('../includes/participation.php');
include('../includes/detailcampagne.php');

if (isset($_SESSION['num_volontaire'])) { $idf = (int)$_SESSION['num_volontaire']; }

$_PAR = new Participation();
$dataPar = $_PAR->getParticipationById($idf);

$_DCP = new DetailCampagne();
$IsVolInCpg = false ;
$volontaireAffecterCpg = $_DCP->getExistVolontaireInCampagne($idf);
if ($volontaireAffecterCpg > 0) {
  $IsVolInCpg = true ;
}

?>

<style>
  .form-group.required label:after {
    color: red;
    font-family: 'FontAwesome';
    font-weight: normal;
    font-size: 14px;
    content: "*";
    top: 4px;
    position: absolute;
    margin-left: 8px;
  }

  .badge-pistache {
    background-color: #bef574;
  }

  .select2-container .select2-selection--single {
    height: 34px !important;
  }

  .select2-container--default .select2-selection--single {
    border: 1px solid #ccc !important;
    border-radius: 0px !important;
  }

  #validateBtn {
    background-color: #083d43;
    /* darkslategray 	 */

  }

  .myHide {
    display: none;
  }

  .myVisible {
    display: block;
  }
</style>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>

<body>
  <br>
  <main class="d-flex align-items-center min-vh-100 py-3 py-md-0">
    <div class="container">
      <div class="card" style="border-radius: 2%;">
        <div class="row no-gutters">

          <div class="col-sm-4 p-5 " style="background-color: #c21f37;">
            <div class="row-auto text-center">
              <h4>
                <font color="white"><b>Informations <br> Personnelles </b></font>
              </h4>
            </div>
            <div class="row-auto text-center mt-2">
              <p>
                <!--<b>-->
                <font color="white">
                  Informations personnelles liées à votre participation à la campagne de mesures. <br>
                  Avant la confirmation de votre participation, vous pouvez modifier vos données personnelles. <br>
                </font>
                <!--</b>-->
              </p>
            </div>
            <div class="row-auto text-center mt-5">
              <h4>
                <font color="white"><b> المعلومات الشخصية </b></font>
              </h4>
            </div>
            <div class="row-auto text-center mb-5">
              <div dir="rtl" align="right">
                <p>
                  <font color="white">
                    <center>
                      <!--<b>-->
                      المعلومات الشخصية المتعلقة بمشاركتكم في عملية القياس. قبل التأكيد النهائي ، يمكنكم تعديل بياناتكم الشخصية.
                      <!--</b>-->
                    </center>
                  </font>
                </p>
              </div>
            </div>
            <div class="row-auto text-center mt-5">
              <center>
                <nav class="login-card-footer-nav">
                  <a href="https://anrt.ma/">
                    <font color="white">© <?php echo date("Y") ?> - ANRT.</font>
                  </a>
                  <a href="https://anrt.ma/">
                    <font color="white"> Tous droits réservés </font>
                  </a>
                </nav>
              </center>
            </div>
          </div>

          <div class="col-sm-8">
            <br>

            <div class="container">
              <!-- Content Header (Page header) -->
              <section class="content-header">
                <form method="post" class="validator-form" action="update-volontaire.php" id="form">
                  <!-- <form method="post"  action="update-volontaire.php" id="form"> -->
                  <div class="card">
                    <div class="card-header font-weight-bold h6" style="color : #083d43;">
                      Merci de mettre à jour en cas de changement d'abonnement
                    </div>
                    <div class="card-body">
                      <div class="container-fluid">
                        <div class="row mb-2">
                          <div class="col-sm-12">

                            <h5>
                              <font color="#c21f37"> Données personnelles / المعلومات الشخصية </font>
                            </h5>

                            <div class="card">
                              <div class="row">
                                <div class="col-sm-6">
                                  <!--  <div class="card"> -->
                                  <div class="card-body">
                                    <div class="form-group row">
                                      <div class="col-sm-12">
                                        <!-- php  if(($dataPar['etat_submit_hotline']) == 1) echo "disabled"; ?>-->
                                        <b><label for="prenomPar"> Prénom / الإسم الشخصي </label></b>
                                        <input type="text" id="prenomPar" name="prenomPar" value="<?= $dataPar['prenom_par'] ?>"  class="form-control" disabled>

                                      </div>
                                    </div>

                                    <div class="form-group row">
                                      <div class="col-sm-12">
                                        <!-- php  if(($dataPar['etat_submit_hotline']) == 1) echo "disabled"; ?>-->
                                        <b> <label for="nomPar"> Nom / الإسم العائلي </label> </b>
                                        <input type="text" id="nomPar" name="nomPar" value="<?= $dataPar['nom_par'] ?>" class="form-control"  disabled>
                                        <input type="hidden" name="idf" value="<?= $idf ?>" />
                                      </div>
                                    </div>

                                    <div class="form-group row">
                                      <div class="col-sm-12">
                                        <!-- php  if(($dataPar['etat_submit_hotline']) == 1) echo "disabled"; ?>-->
                                        <b> <label for="villePar" class="col-sm-12"> Ville / المدينة </label> </b>
                                        <select class="form-control col-sm-12 select2" name="villePar" id="villePar" disabled>
                                          <option selected value="<?= $dataPar['ville_par'] ?>"><?php echo $dataPar['ville_par'] ?></option>
                                          <option disabled>Selectionnez une ville</option>
                                          <option value="Agadir">Agadir</option>
                                          <option value="Al Hoceïma">Al Hoceïma</option>
                                          <option value="Aoussered">Aoussered</option>
                                          <option value="Assilah">Assilah</option>
                                          <option value="Azrou">Azrou</option>
                                          <option value="Benahmed">Benahmed</option>
                                          <option value="Benguérir">Benguérir</option>
                                          <option value="Béni Mellal">Béni Mellal</option>
                                          <option value="Benslimane">Benslimane</option>
                                          <option value="Berkane">Berkane</option>
                                          <option value="Berrechid">Berrechid</option>
                                          <option value="Boujdour">Boujdour</option>
                                          <option value="Bouskoura">Bouskoura</option>
                                          <option value="Bouznika">Bouznika</option>
                                          <option value="Casablanca">Casablanca</option>
                                          <option value="Chefchaouen">Chefchaouen</option>
                                          <option value="Chichaoua">Chichaoua</option>
                                          <option value="Dakhla">Dakhla</option>
                                          <option value="Driouch">Driouch</option>
                                          <option value="El Hajeb">El Hajeb</option>
                                          <option value="El Jadida">El Jadida</option>
                                          <option value="El Kelaâ des Sraghna">El Kelaâ des Sraghna</option>
                                          <option value="Errachidia">Errachidia</option>
                                          <option value="Essaouira">Essaouira</option>
                                          <option value="Es-Semara">Es-Semara</option>
                                          <option value="Fès">Fès</option>
                                          <option value="Figuig">Figuig</option>
                                          <option value="Fnideq">Fnideq</option>
                                          <option value="Fquih Ben Salah">Fquih Ben Salah</option>
                                          <option value="Guelmim">Guelmim</option>
                                          <option value="Guercif">Guercif</option>
                                          <option value="Ifrane">Ifrane</option>
                                          <option value="Inezgane-Aït Melloul">Inezgane-Aït Melloul</option>
                                          <option value="Kénitra">Kénitra</option>
                                          <option value="Khémisset">Khémisset</option>
                                          <option value="Khénifra">Khénifra</option>
                                          <option value="Khouribga">Khouribga</option>
                                          <option value="Ksar El Kebir">Ksar El Kebir</option>
                                          <option value="Laâyoune">Laâyoune</option>
                                          <option value="Larache">Larache</option>
                                          <option value="Marrakech">Marrakech</option>
                                          <option value="Martil">Martil</option>
                                          <option value="M'Diq">M'Diq</option>
                                          <option value="Méknès">Méknès</option>
                                          <option value="Midelt">Midelt</option>
                                          <option value="Mohammedia">Mohammedia</option>
                                          <option value="Nador">Nador</option>
                                          <option value="Oualidia">Oualidia</option>
                                          <option value="Ouarzazate">Ouarzazate</option>
                                          <option value="Ouazzane">Ouazzane</option>
                                          <option value="Oujda">Oujda</option>
                                          <option value="Rabat">Rabat</option>
                                          <option value="Safi">Safi</option>
                                          <option value="Saidia">Saidia</option>
                                          <option value="Salé">Salé</option>
                                          <option value="Sefrou">Sefrou</option>
                                          <option value="Settat">Settat</option>
                                          <option value="Sidi Bennour">Sidi Bennour</option>
                                          <option value="Sidi Ifni">Sidi Ifni</option>
                                          <option value="Sidi Kacem">Sidi Kacem</option>
                                          <option value="Sidi Slimane">Sidi Slimane</option>
                                          <option value="Skhirate">Skhirate</option>
                                          <option value="Tanger">Tanger</option>
                                          <option value="Tan-Tan">Tan-Tan</option>
                                          <option value="Taounate">Taounate</option>
                                          <option value="Taourirt">Taourirt</option>
                                          <option value="Tarfaya">Tarfaya</option>
                                          <option value="Taroudannt">Taroudannt</option>
                                          <option value="Tata">Tata</option>
                                          <option value="Taza">Taza</option>
                                          <option value="Témara">Témara</option>
                                          <option value="Tétouan">Tétouan</option>
                                          <option value="Tifelt">Tifelt</option>
                                          <option value="Tinghir">Tinghir</option>
                                          <option value="Tiznit">Tiznit</option>
                                          <option value="Youssoufia">Youssoufia</option>
                                          <option value="Zagora">Zagora</option>
                                        </select>
                                        <script>
                                          $('.select2').select2();
                                        </script>
                                      </div>
                                    </div>

                                  </div>
                                  <!--  </div> -->
                                </div>


                                <div class="col-sm-6">
                                  <!--   <div class="card">  -->
                                  <div class="card-body">

                                    <div class="form-group row">
                                      <div class="col-sm-12">
                                        <b> <label for="operateurPar"> Opérateur / متعهد الإشتراك </label> </b>
                                        <select class="form-control custom-select" name="operateurPar" <?php if ($IsVolInCpg) echo "disabled"; ?>>
                                          <option selected value="<?= $dataPar['operateur_par'] ?>"> <?php echo $dataPar['operateur_par'] ?></option>
                                          <option value="Itissalat Al-Maghrib / Maroc Telecom">Itissalat Al-Maghrib / Maroc Telecom</option>
                                          <option value="Medi Telecom / Orange">Médi Telecom / Orange</option>
                                          <option value="Wana Corporate / Inwi"> Wana Corporate / Inwi</option>
                                        </select>
                                      </div>
                                    </div>

                                    <div class="form-group row">
                                      <div class="col-sm-12">
                                        <b> <label for="telPar"> N° de téléphone / رقم الهاتف </label> </b>
                                        <input type="text" id="telPar" name="telPar" class="form-control" value="<?= $dataPar['num_contact_tel_par'] ?>" <?php if (($dataPar['etat_submit_hotline']) == 1) echo "disabled"; ?>>
                                      </div>
                                    </div>

                                    <div class="form-group row">
                                      <div class="col-sm-12">
                                        <b> <label for="emailPar"> Email / البريد الإلكتروني </label> </b>
                                        <input type="text" id="emailPar" name="emailPar" class="form-control" value="<?= $dataPar['adresse_email_par'] ?>" <?php if (($dataPar['etat_submit_hotline']) == 1) echo "disabled"; ?>>
                                      </div>
                                    </div>

                                    <!-- <div class="form-group row">
                                      <div class="col-sm-12">
                                        <b> <label for="cinPar"> CIN / رقم البطاقة الوطنية</label> </b>
                                        <input type="text" id="cinPar" name="cinPar" class="form-control" value="
                                         <$dataPar['cin_par'] ?>
                                        " disabled>
                                      </div>
                                    </div> -->

                                  </div>
                                  <!--  </div>  -->
                                </div>
                              </div>
                            </div>


                            <br>
                            <h5>
                              <font color="#c21f37"> Données de l'abonnement fixe / بيانات الإشتراك الثابت </font>
                            </h5 <br>
                            <div class="card">
                              <div class="row">
                                <div class="col-sm-6">
                                  <!--  <div class="card"> -->
                                  <div class="card-body">
                                    <div class="form-group row">
                                      <b> <label for="typeaccesPar"> Type d'abonnement / نوع الاشتراك </label> </b>
                                      <div class="col-sm-3">
                                        <div class="form-check form-check-inline">
                                          <input class="form-check-input" type="radio" name="typeaccesPar" id="typeaccesPar1" value="ADSL" <?php if (($dataPar['type_acces_par']) == "ADSL") { ?> checked <?php } ?> <?php if ($IsVolInCpg) echo "disabled"; ?>>
                                          <label class="form-check-label" for="typeaccesPar1">ADSL </label>
                                          &nbsp;&nbsp;
                                          <input class="form-check-input" type="radio" name="typeaccesPar" id="typeaccesPar2" value="FTTH" <?php if (($dataPar['type_acces_par']) == "FTTH") { ?> checked <?php } ?> <?php if ($IsVolInCpg) echo "disabled"; ?>>
                                          <label class="form-check-label" for="typeaccesPar2"> FTTH</label>
                                        </div>
                                      </div>
                                    </div>

                                    <?php $val = '4Mbps' ?>
                                    <div class="form-group row">
                                      <div class="col-sm-12">
                                        <b> <label for="offreservicePar"> Débit contracté / الصبيب </label> </b>
                                        <select class="form-control custom-select" name="offreservicePar" id="firstDropdown" <?php if ($IsVolInCpg) echo "disabled"; ?>>
                                          <option selected disabled="true" value="<?= $dataPar['offre_service_par'] ?>"><?php echo $dataPar['offre_service_par'] ?> </option>
                                          <option selected hidden value="<?= $dataPar['offre_service_par'] ?>"><?php echo $dataPar['offre_service_par'] ?> </option>
                                          <option value="4 Mb/s">4 Mb/s</option>
                                          <option value="8 Mb/s">8 Mb/s</option>
                                          <option value="12 Mb/s">12 Mb/s</option>
                                          <option value="20 Mb/s">20 Mb/s</option>
                                        </select>

                                        <select class="form-control custom-select myHide" name="offreservicePar" id="secondDropdown" <?php if ($IsVolInCpg) echo "disabled"; ?>>
                                          <option selected disabled="true" value="<?= $dataPar['offre_service_par'] ?>"><?php echo $dataPar['offre_service_par'] ?> </option>
                                          <option value="20 Mb/s">20 Mb/s</option>
                                          <option value="50 Mb/s">50 Mb/s</option>
                                          <option value="100 Mb/s">100 Mb/s</option>
                                          <option value="200 Mb/s">200 Mb/s</option>
                                        </select>
                                      </div>
                                    </div>

                                    <div class="form-group row">
                                      <div class="col-sm-12">
                                        <b> <label for="numlignePar"> N° de ligne / رقم الخط </label> </b>
                                        <input type="text" id="numlignePar" name="numlignePar" class="form-control" value="<?= $dataPar['num_ligne_par'] ?>"  <?php if ($IsVolInCpg) echo "disabled"; ?> >
                                      </div>
                                    </div>

                                    <div class="form-group row">
                                      <div class="col-sm-12">
                                        <b> <label for="typeclientPar"> Type d'abonné / نوع المشترك </label> </b>
                                        <select class="form-control custom-select" name="typeclientPar"  <?php if ($IsVolInCpg) echo "disabled"; ?>>
                                          <option selected value="<?= $dataPar['type_client_par'] ?>"><?php echo $dataPar['type_client_par'] ?> </option>
                                          <option value="Résidentiel">Résidentiel</option>
                                          <option value="Professionnel">Professionnel</option>
                                        </select>
                                      </div>
                                    </div>


                                  </div>
                                  <!--  </div> -->
                                </div>


                                <div class="col-sm-6">
                                  <!--   <div class="card">  -->
                                  <div class="card-body">
                                    <div class="form-group row">
                                      <div class="col-sm-12">
                                        <b> <label for="quartierPar"> Quartier / الحي </label> </b>
                                        <input type="text" id="quartierPar" name="quartierPar" class="form-control" value="<?= $dataPar['quartier_par'] ?>" <?php if (($dataPar['etat_submit_hotline']) == 1) echo "disabled"; ?>>
                                      </div>
                                    </div>

                                    <div class="form-group row">
                                      <div class="col-sm-12">
                                        <b> <label for="adressePar"> Adresse / العنوان </label> </b>
                                        <textarea id="adressePar" name="adressePar" class="form-control" rows="4" <?php if (($dataPar['etat_submit_hotline']) == 1) echo "disabled"; ?>><?php echo $dataPar['adresse_par'] ?></textarea>
                                      </div>
                                    </div>

                                    <div class="form-group row">
                                      <div class="col-sm-12">
                                        <b> <label for="exampleInputFile">Joindre copie ou photo de votre facture d'abonnement / أرفق نسخة أو صورة من فاتورة اشتراكك</label> </b>
                                        <div class="input-group">
                                          <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="image1" name="image1" <?php if (($dataPar['etat_submit_hotline']) == 1) echo "disabled"; ?>>
                                            <label class="custom-file-label" for="exampleInputFile">Selectionnez la facture</label>
                                          </div>
                                        </div>

                                        <div style="margin-top: 10px;"></div>
                                        <div class="progress progress-striped active">
                                          <div class="progress-bar" style="width:0%"></div>
                                        </div>
                                      </div>
                                    </div>

                                  </div>
                                  <!--  </div>  -->
                                </div>
                              </div>
                            </div>


                          </div>
                        </div>

                        <div class="row my-3 justify-content-end ">
                          <div class="col-sm">
                            <button type="submit" class="btn float-right text-white" name="signup" id="validateBtn" <?php if (($dataPar['etat_submit_hotline']) == 1) echo 'style="display:none"'; ?>> Valider </button>
                          </div>
                          <div class="col-sm-5">
                            <button type="button" class="btn btn-danger delete_vol_cp float-right" data-id="<?php echo $dataPar['num_volontaire'] ?>" href="#<?php echo $idCpg = $dataPar['num_volontaire']; ?>" <?php if ($dataPar['num_sonde_par']) echo 'disabled'; ?>>Retirer ma candidature</button>
                          </div>

                        </div>

                      </div><!-- /.container-fluid -->



                    </div>

                  </div> <!-- /.card -->
                  <br>

                  <!-- Final Message -->
                  <div class="finalMessage"></div>
                  <div class="col-md-12 flr">
                    <div class="qloader"></div>
                  </div>

                </form>
              </section>
            </div>
          </div>
  </main>
  <br>
</body>

<?php  require_once './includes/footer.php'; ?>

<script>
  $(document).ready(function() {
    $("input[type=radio]").change(function() {
      $("select").removeClass('myVisible myHide');
      if (typeaccesPar1.checked) {
        $('#firstDropdown').addClass('myVisible');
        $('#secondDropdown').addClass('myHide');

      }
      if (typeaccesPar2.checked) {
        $('#firstDropdown').addClass('myHide');
        $('#secondDropdown').addClass('myVisible');

      }
    });

  });
</script>

<!-- <script>
  alert("Hello! I am an alert box!");
</script> -->
<!-- <script src="/private-space/assets/js/edit-participation.js"></script> -->

<script>
  $(document).ready(function() {

    $('.validator-form').bootstrapValidator({
      //      live: 'disabled',
      message: 'Cette valeur est non valide',
      feedbackIcons: {
        valid: 'glyphicon glyphicon-ok',
        invalid: 'glyphicon glyphicon-remove',
        validating: 'glyphicon glyphicon-refresh'
      },
      fields: {
        prenomPar: {
          validators: {
            notEmpty: {
              message: '<font color="red">Ce champ est requis</font>'
            },
            stringLength: {
              min: 2,
              max: 80,
              message: '<font color="red">Le prenom doit comporter plus de 2 caractères et moins de 80 caractères</font>'
            },
          }
        },
        nomPar: {
          validators: {
            notEmpty: {
              message: '<font color="red">Ce champ est requis</font>'
            },
            stringLength: {
              min: 2,
              max: 80,
              message: '<font color="red">Le nom doit comporter plus de 2 caractères et moins de 80 caractères</font>'
            },
          }
        },
        // telPar: {
        //     validators: {
        //         notEmpty: {
        //             message: '<font color="red">Ce champ est requis</font>'
        //         },
        //         phone: {
        //             message: '<font color="red">Invalide format</font>',
        //             country: 'MA'
        //         }
        //     }
        // },
        // operateurPar: {
        //     validators: {
        //         notEmpty: {
        //             message: '<font color="red">Ce champ est requis</font>'
        //         },
        //         stringLength: {
        //             min: 2,
        //             max: 80,
        //             message: '<font color="red">Ce champ doit comporter plus de 2 caractères et moins de 80 caractères</font>'
        //         },
        //     }
        // },
        villePar: {
          validators: {
            notEmpty: {
              message: '<font color="red">Ce champ est requis</font>'
            },
            stringLength: {
              min: 2,
              max: 80,
              message: '<font color="red">Ce champ doit comporter plus de 2 caractères et moins de 80 caractères</font>'
            },
          }
        },
        // cinPar: {
        //     validators: {
        //         notEmpty: {
        //             message: '<font color="red">Ce champ est requis</font>'
        //         },
        //         stringLength: {
        //             min: 2,
        //             max: 40,
        //             message: '<font color="red">Ce champ doit comporter plus de 2 caractères et moins de 40 caractères</font>'
        //         },
        //     }
        // },
        // typeaccesPar: {
        //     validators: {
        //         stringLength: {
        //             min: 2,
        //             max: 20,
        //             message: '<font color="red">Le type doit comporter plus de 2 caractères et moins de 18 caractères</font>'
        //         },
        //     }
        // },
        // offreservicePar: {
        //     validators: {
        //         stringLength: {
        //             min: 2,
        //             max: 20,
        //             message: '<font color="red">Le type doit comporter plus de 2 caractères et moins de 18 caractères</font>'
        //         },
        //     }
        // },
        // numlignePar: {
        //     validators: {
        //         // notEmpty: {
        //         //     message: '<font color="red">Ce champ est requis hahahhaha</font>'
        //         // },
        //         // phone: {
        //         //     message: '<font color="red">Invalide format</font>',
        //         //     country: 'GB'
        //         // },
        //         stringLength: {
        //             min: 2,
        //             max: 20,
        //             message: '<font color="red">Ce champ doit comporter plus de 2 caractères et moins de 20 caractères</font>'
        //         },
        //     }
        // },
        // typeclientPar: {
        //     validators: {
        //         stringLength: {
        //             min: 2,
        //             max: 80,
        //             message: '<font color="red">Ce champ doit comporter plus de 2 caractères et moins de 80 caractères</font>'
        //         },
        //     }
        // },
        emailPar: {
          validators: {
            emailAddress: {
              message: '<font color="red">Format de mail invalide</font>'
            }
          }
        },

        quartierPar: {
          validators: {
            stringLength: {
              min: 2,
              max: 180,
              message: '<font color="red">ce champ doit comporter plus de 2 caractères et moins de 180 caractères</font>'
            },
          }
        },

        adressePar: {
          validators: {
            stringLength: {
              min: 2,
              max: 280,
              message: '<font color="red">ce champ doit comporter plus de 2 caractères et moins de 280 caractères</font>'
            },
          }
        },
      },
      // onSuccess: function(e, data) {

      //     // show loader
      //     $('.qloader').show();

      //     e.preventDefault()
      //     $form = $('#form');
      //     uploadImage($form);

      //     function uploadImage($form) {
      //         $form.find('.progress-bar').removeClass('progress-bar-success')
      //             .removeClass('progress-bar-danger');

      //         var formdata = new FormData($form[0]); //formelement
      //         var request = new XMLHttpRequest();

      //         //progress event...
      //         request.upload.addEventListener('progress', function(e) {
      //             var percent = Math.round(e.loaded / e.total * 100);
      //             $form.find('.progress-bar').width(percent + '%').html(percent + '%');
      //         });

      //         //progress completed load event
      //         request.addEventListener('load', function(e) {
      //             $form.find('.progress-bar').addClass('progress-bar-success');
      //         });

      //         request.open('post', '../handler/edit-participation.php');
      //         request.send(formdata);
      //         request.onreadystatechange = getInfo;

      //         function getInfo() {
      //             if (request.readyState == 4) {
      //                 var val = request.responseText;
      //                 $('.finalMessage').html(val);

      //                 // CLEAR DATA
      //                 $('.validator-form').data('bootstrapValidator').resetForm(true);
      //                 $('input[name=image1]').val('');
      //                 // CLEAR
      //                 $('.qloader').hide();
      //             }
      //         }
      //     }
      // }
    });

    // Validate the form manually
    $('#validateBtn').click(function() {
      $('.validator-form').bootstrapValidator('validate');

    });

    // Reset the validation
    // $('#resetBtn').click(function() {
    //   $('.validator-form').data('bootstrapValidator').resetForm(true);
    //   $('input[name=image]').val('');
    // });

  });
</script>

<?php
require_once 'includes/headerorigine.php';
include('includes/connection.php');
include('includes/participation.php');

$PAR = new Participation();
?>

<style>
  .input-small {
    font-size: .8em;
  }

  .nav a:hover {
    /* background: #C21F37 !important;
  color:#C21F37; #495057  */
    color: #C21F37;
  }

  nav a {
    color: #495057;
  }

  nav a.active {
    color: #C21F37;
  }
</style>

<style>
  .sanssautdeligne {
    white-space: nowrap;
  }
</style>
<!-- Block select text  -->
<style>
  .unselectable {
    -webkit-user-select: none;
    -webkit-touch-callout: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
    color: #cc0000;
  }
</style>

<style>
  #captcha .captcha-from label {
    font-weight: normal;
  }

  #captcha .form-control {
    border-radius: 0;
  }

  #captcha .input-group-addon {
    border-top-left-radius: 0;
    border-bottom-left-radius: 0;
  }

  #captcha .captcha-group div {
    display: inline-block;

  }

  #captcha .captcha-code .code {
    width: 100px;
    height: 30px;
    -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075);
    box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075);
    -webkit-transition: border-color ease-in-out .15s, -webkit-box-shadow ease-in-out .15s;
    -o-transition: border-color ease-in-out .15s, box-shadow ease-in-out .15s;
    transition: border-color ease-in-out .15s, box-shadow ease-in-out .15s;
    border: 1px solid #ffffff;
    margin-right: 10px;
  }

  #captcha .captcha-code .code .dynamic-code {
    background-color: #1f8383;
    color: white;
    /* font-family: verdana; */
    font-family: "Lucida Console", Courier, monospace;
    text-align: center;
    font-size: 20px;
    font-weight: bold;
    border-radius: 10%;
    -webkit-touch-callout: none;
    /* iOS Safari */
    -webkit-user-select: none;
    /* Chrome/Safari/Opera */
    -khtml-user-select: none;
    /* Konqueror */
    -moz-user-select: none;
    /* Firefox */
    -ms-user-select: none;
    /* Internet Explorer/Edge */
    user-select: none;
    /* Non-prefixed version, currently */
    cursor: help;
  }

  #captcha .captcha-code .code .dynamic-code:first-letter {
    font-size: 20px;
  }

  #captcha .captcha-code .captcha-reload {
    cursor: pointer;
    font-size: 20px;
    font-weight: bold;
    margin-top: 0;
    max-width: 36px;
  }

  #captcha .captcha-code .captcha-reload:hover {
    color: #00B16A;
  }

  #captcha #captcha-input {
    max-width: 200px;
    margin-top: 10px;
  }

  #captch .btn {
    border-radius: 0;
  }
</style>

<!-- form envoyer -->
<style>
  #captchacontact .captcha-from label {
    font-weight: normal;
  }

  #captchacontact .form-control {
    border-radius: 0;
  }

  #captchacontact .input-group-addon {
    border-top-left-radius: 0;
    border-bottom-left-radius: 0;
  }

  #captchacontact .captcha-group div {
    display: inline-block;
  }


  #captchacontact .captchacontact-code .captchacontact-reload {
    cursor: pointer;
    font-size: 20px;
    font-weight: bold;
    margin-top: 0;
    margin-left: 10px;
    max-width: 36px;
  }

  .contactcode {
    margin-right: 10px;
  }

  #captchacontact .captchacontact-code .captchacontact-reload:hover {
    color: #00B16A;
  }

  #captcha #captchacontact-input {
    max-width: 200px;
    margin-top: 15px;
  }

  /* #captchacontact #captchacontact-input {
    max-width: 200px;
    margin-top: 15px;
  } */

  #captchacontact .btn {
    border-radius: 0;
  }
</style>

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
</style>

<style>
  .custom-file-input~.custom-file-label::after {
    content: "Parcourir";
  }
</style>

<body class="hold-transition sidebar-mini">

  <!-- Site wrapper -->
  <div class="wrapper">

    <!-- Image and text -->
    <nav class="navbar navbar-light bg-white">
      <a class="navbar-brand" href="#">
        <img src="private-space/assets/images/logo.jpg" width="120" height="60" class="d-inline-block align-top" alt="">
      </a>
    </nav>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
    <script type="text/javascript">
      google_ad_client = "ca-pub-2783044520727903";
      /* jQuery_demo */
      google_ad_slot = "2780937993";
      google_ad_width = 728;
      google_ad_height = 90;
      //-->
    </script>
    <script type="text/javascript" src="https://pagead2.googlesyndication.com/pagead/show_ads.js">
    </script>
    <style>
      .select2-container .select2-selection--single {
        height: 34px !important;
      }

      .select2-container--default .select2-selection--single {
        border: 1px solid #ccc !important;
        border-radius: 0px !important;
      }
    </style>

    <style>
      .myHide {
        display: none;
      }

      .myVisible {
        display: block;
      }
    </style>

    <!-- Content Wrapper. Contains page content -->
    <div class="container">
      <div class="row justify-content-end">
        <a href="private-space/" class="btn btn-secondary">Espace du vonlontaire / فضاء المتطوع</a>
      </div>
      <nav>
        <div class="nav nav-tabs" id="nav-tab" role="tablist">
          <a class="nav-item nav-link active" id="nav-propos-tab" data-toggle="tab" href="#nav-propos" role="tab" aria-controls="nav-propos" aria-selected="true">A Propos</a>
          <a class="nav-item nav-link" id="nav-participation-tab" data-toggle="tab" href="#nav-participation" role="tab" aria-controls="nav-participation" aria-selected="false">Inscrivez-vous</a>
          <a class="nav-item nav-link" id="nav-charte-tab" data-toggle="tab" href="#nav-charte" role="tab" aria-controls="nav-charte" aria-selected="false">Charte de Participation </a>
          <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">Contactez-nous</a>
        </div>
      </nav>

      <div class="tab-content" id="nav-tabContent">
        <div class="tab-pane fade" id="nav-participation" role="tabpanel" aria-labelledby="nav-participation-tab">

          <!-- Content Header (Page header) -->
          <section class="content-header">
            <div class="container-fluid">

              <div class="row mb-2">
                <div class="col-sm-12">
                  <center>
                    <br>
                    <h4>
                      <font color="#C21F37">Contribuez à améliorer la qualité de service de l'internet fixe (ADSL et FTTH) au Maroc </font>
                    </h4>
                    <div dir="rtl">
                      <h4>
                        <font color="#C21F37"> ساهموا في تحسين جودة خدمة الإنترنت الثابت </font>
                        <font color="#C21F37"> (ADSL و FTTH) </font>
                        <font color="#C21F37"> بالمغرب </font>
                      </h4>
                    </div>
                    <br>
                    <h5> Formulaire de Participation </h5>
                  </center>
                </div>

              </div>
            </div><!-- /.container-fluid -->
          </section>


          <section class="content" id="captcha">
            <form method="post" class="validator-form" id="participation-form" enctype="multipart/form-data">
              <!-- <form method="post" class="validator-form" action="./admin/handler/add-participation.php" id="form" enctype="multipart/form-data"> -->
              <div class="card">
                <div class="card-header">
                  <font color="red" size="2px"> (*) Champs obligatoires / معلومات اجبارية </font>
                </div>
                <div class="row">
                  <div class="col-sm-5 ml-1">
                    <!--  <div class="card"> -->
                    <div class="card-body">
                      <div class="form-group row required control-label">
                        <label for="prenomPar" class="col-sm-6 col-form-label pl-0"> Prénom / الإسم الشخصي </label>
                        <div class="col-sm-6">
                          <input type="text" id="prenomPar" name="prenomPar" class="form-control">
                        </div>
                      </div>

                      <div class="form-group row required control-label">
                        <label for="nomPar" class="col-sm-6 col-form-label pl-0"> Nom / الإسم العائلي </label>
                        <div class="col-sm-6">
                          <input type="text" id="nomPar" name="nomPar" class="form-control">
                        </div>
                      </div>

                      <div class="form-group row control-label">
                        <div class="col-sm-6 ">
                          <label class="row col-form-label" for="telPar">N° de mobile &nbsp; <font color="red">*</font></label>
                          <p class="row font-weight-bold"> رقم الهاتف المحمول</p>
                        </div>

                        <div class="col-sm-6">
                          <input type="text" id="telPar" name="telPar" class="form-control" onkeypress="javascript:return isNumber(event)">
                        </div>
                      </div>

                      <div class="form-group row control-label">
                        <label for="emailPar" class="col-sm-6 col-form-label pl-0">Email / البريد الإلكتروني <font color="red">*</font></label>
                        <div class="col-sm-6">
                          <input type="text" id="emailPar" name="emailPar" class="form-control" required>

                        </div>
                      </div>

                      <div class="form-group row control-label">
                        <div class="col-sm-6 ">
                          <label class="row col-form-label" for="compareEmailPar">Confirmer votre email &nbsp; <font color="red">*</font></label>
                          <p class="row font-weight-bold "> تأكيد البريد الإلكتروني </p>
                        </div>
                        <div class="col-sm-6">
                          <span id="error"></span>
                          <input type="text" id="compareEmailPar" name="compareEmailPar" required class="form-control" onchange="verify()" onpaste="return false;" onCopy="return false" onCut="return false">
                        </div>
                      </div>

                    </div>
                    <!--  </div> -->
                  </div>

                  <div class="col-sm-6">
                    <!--   <div class="card">  -->
                    <div class="card-body">

                      <div class="form-group row required control-label">
                        <label for="villePar" class="col-sm-4 col-form-label"> Ville / المدينة </label>
                        <div class="col-sm-6">
                          <select name="villePar" id="villePar" class="form-control select2">
                            <option value="empty" selected disabled>Sélectionnez votre ville</option>
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

                      <div class="form-group row">
                        <label for="quartierPar" class="col-sm-4 col-form-label"> Quartier / الحي </label>
                        <div class="col-sm-6">
                          <input type="text" id="quartierPar" name="quartierPar" class="form-control">
                        </div>
                      </div>

                      <div class="form-group row">
                        <label for="adressePar" class="col-sm-4 col-form-label"> Adresse / العنوان </label>
                        <div class="col-sm-6">
                          <textarea id="adressePar" name="adressePar" class="form-control" rows="6"></textarea>
                        </div>
                      </div>
                    </div>
                    <!--  </div>  -->
                  </div>
                </div>
              </div>

              <div class="card">
                <div class="row">
                  <div class="col-sm-6">
                    <!--  <div class="card"> -->
                    <div class="card-body">
                      <div class="form-group row">
                        <label for="typeaccesPar" class="col-sm-7 col-form-label"> Type d'abonnement / نوع الاشتراك</label>
                        <div class="col-sm-4">
                          <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="typeaccesPar" id="typeaccesPar1" value="ADSL">
                            <label class="form-check-label" for="typeaccesPar1">ADSL</label>
                          </div>

                          <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="typeaccesPar" id="typeaccesPar2" value="FTTH">
                            <label class="form-check-label" for="typeaccesPar2">FTTH</label>
                          </div>
                        </div>
                      </div>

                      <div class="form-group row">
                        <label for="operateurPar" class="col-sm-7 col-form-label"> Opérateur de l'abonnement fixe /<br> متعهد الإشتراك الثابت </label>
                        <div class="col-sm-5">
                          <select class="form-control custom-select" name="operateurPar">
                            <option selected disabled>Sélectionnez un opérateur</option>
                            <option value="Itissalat Al-Maghrib / Maroc Telecom">Itissalat Al-Maghrib / Maroc Telecom</option>
                            <option value="Medi Telecom / Orange">Médi Telecom / Orange</option>
                            <option value="Wana Corporate / Inwi"> Wana Corporate / Inwi</option>
                          </select>
                        </div>
                      </div>

                      <div class="form-group row control-label">
                        <label for="offreservicePar" class="col-sm-7 col-form-label"> Débit contracté / الصبيب </label>
                        <div class="col-sm-5">
                          <select class="form-control custom-select" name="offreservicePar" id="firstDropdown">
                            <option selected disabled>Sélectionnez une offre </option>
                            <option value="4 Mb/s">4 Mb/s</option>
                            <option value="8 Mb/s">8 Mb/s</option>
                            <option value="12 Mb/s">12 Mb/s</option>
                            <option value="20 Mb/s">20 Mb/s</option>
                          </select>

                          <select class="form-control custom-select myHide" name="offreservicePar" id="secondDropdown">
                            <option selected disabled>Sélectionnez une offre </option>
                            <option value="12 Mb/s">12 Mb/s</option>
                            <option value="20 Mb/s">20 Mb/s</option>
                            <option value="50 Mb/s">50 Mb/s</option>
                            <option value="100 Mb/s">100 Mb/s</option>
                            <option value="200 Mb/s">200 Mb/s</option>
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
                        <label for="numlignePar" class="col-sm-5 col-form-label">N° de ligne / رقم الخط </label>
                        <div class="col-sm-6">
                          <input type="text" id="numlignePar" name="numlignePar" class="form-control">
                        </div>
                      </div>

                      <div class="form-group row control-label">
                        <label for="typeclientPar" class="col-sm-5 col-form-label">Type d'abonné / نوع المشترك </label>
                        <div class="col-sm-6">
                          <select class="form-control custom-select" name="typeclientPar" id="typeclientPar">
                            <option selected disabled>Sélectionnez un type </option>
                            <option value="Résidentiel">Résidentiel</option>
                            <option value="Professionnel">Professionnel</option>
                          </select>
                        </div>
                      </div>

                      <div class="form-group row">
                        <label for="exampleInputFile" class="col-sm-5 col-form-label"> Joindre copie ou photo de votre facture d'abonnement (facultatif) /  أرفق نسخة أو صورة من فاتورة اشتراكك (اختياري) </label>
                        <div class="col-sm-6">
                          <div class="input-group">
                            <div class="custom-file">
                              <input type="file" class="custom-file-input" id="image1" name="image1" onchange="validateSize(this)">

                              <label class="custom-file-label" for="exampleInputFile">Sélectionnez la facture</label>
                            </div>
                          </div>

                          <div style="margin-top: 10px;"></div>
                          <div class="progress progress-striped active">
                            <div class="progress-bar" style="width:0%"></div>
                          </div>
                        </div>
                      </div>

                      <script>
                        function validateSize(input) {
                          const fileSize = input.files[0].size / 1024 / 1024; // in MiB
                          if (fileSize > 2) {
                            alert('La taille du fichier dépasse 2 Mo');
                            $("#image1").val(''); //for clearing with Jquery
                          } else {
                            // Proceed further
                          }
                        }
                      </script>


                    </div>
                    <!--  </div>  -->
                  </div>
                </div>
              </div>

              <div class="card">
                <div class="row">
                  <div class="col-sm-12">
                    <!--  <div class="card"> -->
                    <div class="card-body">
                      <div class="form-group row">
                        <div class="form-group form-check row">
                          <input type="checkbox" class="form-check-input" id="termeCheck2" name="termeCheck2">
                          <label class="form-check-label" for="termeCheck2">
                            Je déclare avoir lu et approuvé les termes de la <a href="#nav-charte">charte de participation </a>à la campagne de mesure de la qualité technique du service de l’Internet fixe au Maroc
                          </label>
                          <p style="text-align:right;">
                            أقر بأنني قرأت ووافقت على شروط <a href="#nav-charte">نظام المشاركة </a> في عملية قياس الجودة التقنية لخدمة الانترنيت الثابت في المغرب
                          </p>
                        </div>
                        <!-- <font color="red" size="2px"> (*) Champs obligatoires / معلومات اجبارية </font> -->
                      </div>
                    </div>
                  </div>

                </div>
              </div>

              <div class="form-group ml-3">
                <label for="pwd">Veuillez taper le code affiché ci-après / يرجى إدخال الرمز الظاهر في الأسفل</label>

                <!-- input captcha -->
                <div class="row align-items-between">
                  <div clas="col-3">
                    <canvas id="canvas"></canvas>
                  </div>

                  <div class="captcha-reload col-3 row align-items-center ml-2">
                    <button type="button" class="btn btn-outline-secondary btn-sm" id="refresh-captcha-btn">Rafraîchir</button>
                  </div>
                </div>

                <div class="col-2">
                  <div>
                    <input name="code" class="form-control">
                  </div>
                  <div id="captcharesult"></div>
                </div>

                <div class="row">
                  <div class="col-12">
                    <center> <input type="button" class="btn btn-secondary" name="signup" id="validateBtn" value="Soumettre / إرسال">
                        <div class="loader" style="display: none;">Loading ...</div>
                    </center>

                    <!-- Final Message -->
                    <div class="finalMessage"></div>
                    <div class="col-md-12 flr">
                      <div class="qloader"></div>
                    </div>
                    <br>
                  </div>
                </div>
              </div>
            </form>
          </section>

          <!-- Main content -->

        </div> <!-- End tab Formulaire de participation -->


        <div class="tab-pane fade show active" id="nav-propos" role="tabpanel" aria-labelledby="nav-propos-tab">
          <div id="showAr">
            <div class="float-right">
              <br><button type="submit" class="btn btn-secondary" name="arabeBtn" id="arabeBtn" onclick="mygetArabe()">
                <font size="4px"> العربية </font>
              </button>
            </div>
            <div class="float-left">
              <h5>
                <font color="#C21F37"> <br>A propos</font>
              </h5>
            </div>
          </div>

          <br>

          <div id="showFr" style="display: none;">
            <div class="float-left"><button type="submit" class="btn btn-secondary" name="francaisBtn" id="francaisBtn" onclick="mygetFrancais()"> Français </button> </div>
            <div class="float-right">
              <h4>
                <font color="#C21F37">تمهيد</font>
              </h4>
            </div>
            <br>
          </div>
          <br>

          <div id="myDivArabe" style="display:none;" dir="rtl">
            <p align="justify">
              <font color="#003366">
                في إطار المهام المخولة لها، ستقوم الوكالة الوطنية لتقنين المواصلات بحملات من أجل تقييم الجودة التقنية لخدمة الإنترنيت الثابت (ADSL، FTTH، ...) المقدم عبر الشبكات الوطنية الثابتة.
                وتعتمد هذه الحملة لقياس مؤشرات جودة خدمة الإنترنيت الثابت على تركيب جهاز قياس لدى المشترك، الذي تقدم بطلب طوعي للمساهمة في هذه الحملة. ويسمح هذا الجهاز بتقييم مستمر، خلال فترة محددة مسبقًا من قبل الوكالة، لمؤشرات خاصة بجودة خدمة للأنترنيت الثابت. وتتم هذه القياسات وفق طريقة غير-اقتحامية (أي دون أي تأثيرات سلبية على جودة خدمة للإنترنت الثابت) بالنسبة لكل زبون تم اختياره للمشاركة في هاته العملية.
                ستمكن هذه التقنية المعتمدة من التقييم المستمر لجودة الخدمة كما هي ملموسة يوميا من طرف المستعمل النهائي.
                <br><br>

                تكون المشاركة في عملية تقييم جودة الخدمة للإنترنيت الثابت مفتوحة في وجه جميع المشتركين المتطوعين الذين يتوفرون على اشتراك في خدمة الإنترنيت الثابت (ADSL، FTTH، ...) لدى أحد المتعهدين الوطنيين الثلاثة (اتصالات المغرب Maroc Telecom)) و ﻣﻴﺪﻱ ﺗﻴﻠﻴﻜﻮﻡ (Orange) و وانا كوربوريت (Inwi)). وأخذا بعين الاعتبار المدن التي ستتم فيها حملات التقييم، سيتم بعد اختيار المشترك المتطوع الذي سيشارك في عملية أخذ القياسات.

              </font>
            </p>
          </div>

          <div id="myDivFrancais">
            <p align="justify">
              <font color="#003366">
                <br><br><br>
                Dans le cadre de ses missions, l’ANRT mène des campagnes de mesures d’évaluation de la QoS technique de l’Internet fixe (ADSL, FTTH, …) fourni à travers des réseaux fixes nationaux.
                <br><br>
                La solution adoptée consiste à mesurer des indicateurs de qualité de service de l’Internet fixe par le biais d’un équipement de mesures installé chez l’abonné qui s’est porté volontairement candidat. Cet équipement permet l’évaluation en continue, durant une période prédéterminée par l’ANRT, des indicateurs de qualité de service. Ces mesures seront effectuées en mode non-intrusif (c.à.d, sans aucun impact sur la connexion Internet fixe) pour chaque abonné sélectionné pour cette opération.
                <br><br>
                Cette solution permet une évaluation continue de la qualité de service telle que perçue au quotidien par l’utilisateur final.
                <br><br>
                La participation à la campagne d’évaluation de la qualité du service Internet fixe est ouverte à tous les abonnés qui se portent volontaires et qui disposent déjà d’un abonnement d’accès Internet fixe (ADSL, FTTH, …) auprès de l’un des trois opérateurs nationaux (Itissalat Al-Maghrib (Maroc Telecom), Médi Telecom (Orange), Wana Corporate (Inwi)). Sur la base des villes retenues, l’abonné volontaire est ensuite sélectionné pour participer à la campagne de mesures.
              </font>
            </p>
          </div>
          <br>

          <style>
            .auto-resizable-iframe {
              max-width: 720px;
              margin: 0px auto;
            }

            .auto-resizable-iframe>div {
              position: relative;
              padding-bottom: 75%;
              height: 0px;
            }

            .auto-resizable-iframe iframe {
              position: absolute;
              top: 0px;
              left: 0px;
              width: 100%;
              height: 100%;
            }
          </style>

          <br>
          <center>
            <!-- <a href="private-space/" class="btn btn-secondary" name="test">Espace vonlontaire / فضاء المتطوع</a> -->
            <!--	 <button type="submit" class="btn btn-secondary" name="espaceBtn" id="espaceBtn" href="https://exceliacom.mwts.ma/admin/private-space/">Espace vonlontaire / فضاء المتطوع </button>
		   <a href="https://exceliacom.mwts.ma/admin/private-space/" class="btn btn-secondary" role="button" aria-pressed="true" name="espaceBtn" id="espaceBtn">Espace vonlontaire / فضاء المتطوع</a> -->
            <!-- <br><br> -->
            <a href="#myvideo">
              <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-chevron-double-down" viewBox="0 0 16 16" style="color: #6c757d;">
                <path fill-rule="evenodd" d="M1.646 6.646a.5.5 0 0 1 .708 0L8 12.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z" />
                <path fill-rule="evenodd" d="M1.646 2.646a.5.5 0 0 1 .708 0L8 8.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z" />
              </svg>
            </a>
            <br><br>
            <div class="auto-resizable-iframe" id="myvideo">
              <div>

                <!-- <video width="800" height="500" controls>
                  <source src="/admin/assets/videos/capsule.mp4" type="video/mp4">
                  Your browser does not support the video tag.
                </video> -->

                <!-- <iframe frameborder="0" allowfullscreen="" src="https://www.youtube.com/embed/8-G47GOQIxI?rel=0"> -->
                <iframe frameborder="0" allowfullscreen="" src="https://www.youtube.com/embed/5Ukr2ZeQSQ8">
                </iframe>
              </div>
            </div>

            <br><br>

            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-chevron-double-right" viewBox="0 0 16 16" style="color: #6c757d;">
              <path fill-rule="evenodd" d="M3.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L9.293 8 3.646 2.354a.5.5 0 0 1 0-.708z" />
              <path fill-rule="evenodd" d="M7.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L13.293 8 7.646 2.354a.5.5 0 0 1 0-.708z" />
            </svg>
            <a href="participation.php#nav-participation" class="btn btn-secondary" role="button" aria-pressed="true" name="inscriptionBtn" id="inscriptionBtn"> Inscrivez-vous / تسجيل </a>

            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-chevron-double-left" viewBox="0 0 16 16" style="color: #6c757d;">
              <path fill-rule="evenodd" d="M8.354 1.646a.5.5 0 0 1 0 .708L2.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0z" />
              <path fill-rule="evenodd" d="M12.354 1.646a.5.5 0 0 1 0 .708L6.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0z" />
            </svg>

          </center>
          <br><br><br><br><br><br><br><br><br><br><br><br>

        </div>

        <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">

          <br><br>
          <!-- Main content -->
          <div id="wrap-body" class="p-t-lg-30">
            <div class="container">
              <div class="wrap-body-inner">
                <section class="block-contact m-t-lg-30 m-t-xs-0 p-b-lg-50" id="captcha">

                  <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-12">
                      <div class="heading row justify-content-center mb-5">
                        <div class="col-3">
                          <h4>
                            <font color="#C21F37">Formulaire de contact</font>
                          </h4>
                        </div>
                      </div>

                      <div class="contact-form p-lg-30 p-xs-15 bg-gray-fa bg1-gray-2">

                        <form method="post" class="form-send-email" action="#" id="form" enctype="multipart/form-data">
                          <!-- <form id="form-send-email" name="form-send-email" data-toggle="validator" role="form" >	 -->
                          <!-- TAMMA -->
                          <!-- <form method="post" action="" class="validator-form2" id="form-send-email" name="form-send-email" data-toggle="validator" > -->

                          <div class="form-group has-feedback">
                            <label class="control-label">Prénom / الإسم الشخصي</label>
                            <font color="red">*</font>
                            <input type="text" class="form-control form-item" id="meprenom" name="meprenom" placeholder="Prénom">
                            <!-- <span class="glyphicon glyphicon-user form-control-feedback" aria-hidden="true"></span> -->
                          </div>

                          <div class="form-group has-feedback ">
                            <label class="control-label">Nom / الإسم العائلي</label>
                            <font color="red">*</font>
                            <input type="text" class="form-control form-item" id="menom" name="menom" placeholder="Nom">
                            <!-- <span class="glyphicon glyphicon-user form-control-feedback" aria-hidden="true"></span> -->
                          </div>

                          <div class="form-group has-feedback ">
                            <label for="meemail" class="control-label"> Email / البريد الإلكتروني </label>
                            <font color="red">*</font>
                            <input type="email" class="form-control" id="meemail" name="meemail" placeholder="Entrer votre Email">
                            <!-- <span class="glyphicon glyphicon-envelope form-control-feedback" aria-hidden="true"></span> -->
                          </div>

                          <div class="form-group has-feedback">
                            <label for="meCompareEmail" class="control-label"> Confirmation Email / تأكيدالبريد الإلكتروني </label>
                            <font color="red">*</font>
                            <input type="text" id="meCompareEmail" name="meCompareEmail" class="form-control" onchange="verifyContacterNous()" onpaste="return false;" onCopy="return false" onCut="return false">
                            <!-- <span class="glyphicon glyphicon-envelope form-control-feedback" aria-hidden="true"></span> -->
                            <span id="error2"></span>
                          </div>

                          <div class="form-group">
                            <label for="meobjet" class="control-label"> Objet / الموضوع </label>
                            <input type="text" class="form-control form-item" name="meobjet" id="meobjet" placeholder="Objet">
                            <!-- <span class="glyphicon glyphicon-question-sign form-control-feedback"></span> -->
                          </div>

                          <div class="form-group">
                            <label for="memessage" class="control-label"> Message / الرسالة </label>
                            <textarea class="form-control form-item" name="memessage" id="memessage" placeholder="Entrer votre message" rows="3" required></textarea>
                            <!-- <span class="glyphicon  glyphicon-comment form-control-feedback" aria-hidden="true"></span> -->
                          </div>

                          <div class="form-group ml-3">
                            <label for="pwd">Veuillez taper le code affiché ci-après / يرجى إدخال الرمز الظاهر في الأسفل</label>

                            <!-- input captcha -->
                            <div class="row align-items-between">
                              <div clas="col-3">
                                <canvas id="canvas2"></canvas>
                              </div>

                              <div class="captcha-reload col-3 row align-items-center ml-2">
                                <button type="button" class="btn btn-outline-secondary btn-sm" id="refresh-captcha-btn2">Rafraîchir</button>
                              </div>
                            </div>

                            <div class="col-2">
                              <div>
                                <input name="code2" class="form-control">
                              </div>
                              <div id="captcharesult2"></div>
                            </div>

                            <div class="row">
                              <div class="col-12">
                                <!-- <button type="submit" id="btnSendMail" name="btnSendMail" class="btn btn-secondary"><i class="glyphicon glyphicon-send icon-white"></i> Envoyer </button> -->
                                <div class="float-right"><input type="button" id="btnSendMail" name="btnSendMail" class="btn btn-danger" value="Envoyez"> </div>

                                <br>
                              </div>
                            </div>
                          </div>

                          <!-- // TAMMA Code  -->


                        </form>
                      </div>
                    </div>
                  </div>

                </section>
              </div>
            </div>
          </div>

          <!-- message modal  -->
          <div class="modal fade" tabindex="-1" role="dialog" id="myModal">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-body">
                  <div class="qloader-w"></div>
                  <div class="finalMessageRequest"></div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
              </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
          </div><!-- /.modal -->
          <!-- End message modal  -->
        </div>

        <div class="tab-pane fade" id="nav-charte" role="tabpanel" aria-labelledby="nav-charte-tab">
          <br>

          <div id="showChartAr">
            <div class="float-right"> <button type="submit" class="btn btn-secondary" name="arabeChartBtn" id="arabeBtn" onclick="mygetChartArabe()"> العربية </button></div><br><br>
            <center>
              <h4>
                <font color="#C21F37"> CHARTE DE PARTICIPATION </font>
              </h4>
            </center>
            <center>
              <h5>
                <font color="#083d43">Campagne d’évaluation de la qualité technique <br> du service Internet fixe offert aux clients</font>
              </h5>
            </center>
          </div>


          <div id="myDivChartArabe" class="container-fluid" style="display: none;">
            <div class="float-left"><button type="submit" class="btn btn-secondary" name="francaisChartBtn" id="francaisChartBtn" onclick="mygetChartFrancais()"> Français </button> </div><br><br>

            <center>
              <h4>
                <font color="#C21F37"><b> نظام المشاركة</b> </font>
              </h4>
              <h5><b>
                  <font color="#083d43"> عملية تقييم الجودة التقنية لخدمة الإنترنيت الثابت المقدمة للزبائن </font>
                </b> </h5>
            </center>

            <article dir="rtl" align="justify">
              <p align="jutify">
                <b> مقدمة</b><br>
                <font color="#003366" dir="rtl">
                  يهدف هذا النظام (المشار إليه فيما بعد ب"النظام") إلى وضع قواعد المشاركة التطوعية في عملية تقييم الجودة التقنية لخدمة الإنترنيت الثابتة المقدمة للزبائن، التي أطلقتها الوكالة الوطنية لتقنين المواصلات (المشار إليها فيما بعد باسم "الوكالة").
                  الوكالة الوطنية لتقنين المواصلات هي مؤسسة عمومية تم إحداثها بموجب القانون رقم 24.96 المتعلق بالبريد والمواصلات، ويقع مقرها الرئيسي بمركز الأعمال، شارع الرياض، حي الرياض، الرباط.
                </font>
              </p>

              <p align="justify">
                <b> 1. الموضوع </b><br>
                <font color="#003366">
                  في إطار المهام المخولة لها، ستقوم الوكالة الوطنية لتقنين المواصلات بحملات من أجل تقييم الجودة التقنية لخدمة الإنترنيت الثابت (ADSL، FTTH، ...) المقدم عبر الشبكات الوطنية الثابتة.<br>
                  <br>
                  وتعتمد هذه الحملة لقياس مؤشرات جودة خدمة الإنترنيت الثابت على تركيب جهاز قياس لدى المشترك، الذي تقدم بطلب طوعي للمساهمة في هذه الحملة. ويسمح هذا الجهاز بتقييم مستمر، خلال فترة محددة مسبقًا من قبل الوكالة، لمؤشرات خاصة بجودة خدمة للأنترنيت الثابت. وتتم هذه القياسات وفق طريقة غير-اقتحامية (أي دون أي تأثيرات سلبية على جودة خدمة للإنترنت الثابت) بالنسبة لكل زبون تم اختياره للمشاركة في هاته العملية. <br>
                  ستمكن هذه التقنية المعتمدة من التقييم المستمر لجودة الخدمة كما هي ملموسة يوميا من طرف المستعمل النهائي.

                </font>
              </p>

              <p align="justify">
                <b> 2. شروط التسجيل والمشاركة في عملية القياس </b>
                <br>
                <font color="#003366">
                  تكون المشاركة في عملية تقييم جودة الخدمة للإنترنيت الثابت مفتوحة في وجه جميع المشتركين الذين يتوفرون على اشتراك في خدمة الإنترنيت الثابت (ADSL، FTTH، ...) لدى أحد المتعهدين الوطنيين الثلاثة (اتصالات المغرب (Maroc Telecom) وﻣﻴﺪﻱ ﺗﻴﻠﻴﻜﻮﻡ (Orange) و"وانا كوربوريت" (Inwi)).
                  <br>
                  يوافق المشارك الذي تسجل طواعية في هذه العملية ً على المشاركة في هذه العملية وعلى تركيب جهاز القياس في مكان الاشتراك من قبل تقني معتمد، لهذا الغرض، من قبل الوكالة. وفي هذا الصدد، يتسجل المتطوعون في هذه العملية من خلال الموقع الإلكتروني "qosfixe.anrt.ma".


                </font>
              </p>

              <p align="justify">
                <b> 3. المعطيات ذات الطابع الشخصي التي يتم جمعها خلال مرحلة التسجيل للمشاركة في عملية قياس جودة الخدمة للإنترنيت الثابت </b><br>
                <font color="#003366">
                  عندما يتطوع المشترك للمشاركة في عملية قياس جودة الخدمة للإنترنيت الثابت، تقوم الوكالة، لأجل حاجيات عملية القياس، بجمع بعض المعلومات التي يقدمها المشارك بكل حرية. وتتعلق هذه المعلومات بما يلي:
                  <ul>
                    <li> الاسم العائلي والشخصي؛ </li>
                    <li> العنوان البريدي؛ </li>
                    <li> البريد الإلكتروني؛ </li>
                    <li> رقم الهاتف المحمول؛ </li>
                    <li> رقم بطاقة التعريف الوطنية الإلكترونية؛ </li>
                    <li> رقم الهاتف الثابت (الذي يعرف الاشتراك في خدمة الإنترنيت الثابت من نوع ADSL أو FTTH) للمشارك. </li>
                  </ul>

                </font>
              </p>

              <p align="justify">
                <b> 4. شروط المشاركة </b> <br>
                <font color="#003366">
                  بالتسجيل في عملية تقييم جودة الخدمة للإنترنيت الثابت، يصرح المشارك بقبوله الصريح واللامشروط بما يلي:
                  <ul>
                    <li> يقوم تقني معتمد من قبل الوكالة بتركيب جهاز قياس مؤشرات الأداء الخاصة بتقييم جودة الخدمة للإنترنيت الثابت. يتم توصيل هذا الجهاز مباشرة بموجه / مودم الخاص بالاشتراك في خدمة الإنترنت (ASDL أو FTTH) للمشارك. </li>
                    يتم تركيب جهاز القياس مقابل توقيع المشارك على إقرار بالاستلام وتسليم نسخة من بطاقة التعريف الوطنية الإلكترونية الخاصة به.
                    <li> عدم القيام بفصل جهاز القياس أو قطع ربطه بشبكة الإنترنيت، ما عدا في الحالة التي يكون فيها المشارك مضطرا للقيام بعمليات صيانة على شبكته المحلية. وفي جميع الحالات، يوافق المشارك على محاولة تقليل المدة الزمنية التي يظل خلالها جهاز القياس معطل. </li>
                    <li> عدم القيام أو محاولة القيام بأي نوع من "الهندسة العكسية" (rétro-ingénierie) لجهاز القياس أو تغييره أو نقله أو إتلافه. </li>
                    <li> إبلاغ الوكالة، في أجل أقصاه سبعة (7) أيام من تاريخ حدوثه، بتغيير المتعهد أو عرض الخدمة المتعاقد عليها (الصبيب المتعاقد عليه) نحو صبيب أقل أو أعلى. وتحقيقا لهذه الغاية، يجب على المشارك إبلاغ الوكالة بذلك عبر عنوان البريد الإلكتروني التالي: "qosfixe-support@anrt.ma". </li>
                    <li> إبلاغ الوكالة، في أجل أقصاه سبعة (7) أيام، بأي تغيير في مكان تركيب جهاز القياس. </li>
                    <li> بمجرد انتهاء الفترة المخصصة للقياس، يجب على المشارك إعادة جهاز القياس، مع جميع إكسسواراته، المسلم له من طرف الوكالة. وفي هذا الصدد، يقوم تقني معتمد من قبل الوكالة بإزالة جهاز القياس المذكور واستعادته مقابل توقيع إقرار بذلك من طرف المشارك. </li>
                    <li> عدم تفويت أو إعارة أو نقل جهاز القياس إلى طرف ثالث. </li>
                    <li> ربط الاتصال بالوكالة، على البريد الإلكتروني التالي: "qosfixe-support@anrt.ma"، في حالة وجود مشاكل تتعلق بتشغيل جهاز القياس. </li>
                  </ul>
                </font>
              </p>

              <p align="justify">
                <b> 5. التزامات الوكالة تجاه المشارك الذي تم اختياره للمشاركة في عملية القياس </b><br>
                <font color="#003366">
                  تتعهد الوكالة، تجاه المشارك، بما يلي:
                  <ul>
                    <li>  وضع جهاز القياس رهن إشارته ولفترة تحددها الوكالة، وتركيبه بواسطة تقني معتمد لهذا الغرض من قبل الوكالة؛ </li>
                    <li> إتاحة الولوج، لفائدة المشارك وعند نهاية هذه العملية، إلى مؤشرات خاصة لجودة اشتراكه في خدمة الإنترنيت الثابت؛ </li>
                    <li> تقديم خدمات المساعدة أو الدعم للمشارك في حالة وجود مشاكل تتعلق بتشغيل جهاز القياس؛ </li>
                    <li> بذل كل جهد ممكن لضمان إجراء عملية القياس في ظروف جيدة. </li>
                  </ul>
                </font>
              </p>

              <p align="justify">
                <b> 6. طبيعة المعلومات المتوفرة </b> <br>
                <font color="#003366">
                  إن جميع المؤشرات التي يتم إمداد المشارك بها هي مؤشرات إرشادية ولا يجوز، بأي حال من الأحوال، استعمالها كدليل على جودة الخدمة ضد المتعهد الذي يوفر خدمة الإنترنيت الثابت. لا يجوز للمشارك اتخاذ أي إجراء في هذا الاتجاه على أساس المعلومات المذكورة.
                </font>
              </p>

              <p align="justify">
                <b> 7. معالجة المعطيات المتعلقة بنتائج القياس </b> <br>
                <font color="#003366">
                  يشتغل جهاز القياس بطريقة غير-اقتحامية. إن المعلومات التي تم جمعها من القياسات المنجزة بواسطة جهاز القياس هي مؤشرات جودة الخدمة. من خلال المشاركة في عملية تقييم خدمة الإنترنيت الثابت، يوافق المشارك، صراحةً، على أن تتم معالجة المؤشرات المجمعة من طرف الوكالة لأغراض مشروعة، وفقًا للنصوص التنظيمية الجاري بها العمل.

                </font>
              </p>

              <p align="justify">
                <b> 8. الملكية الفكرية </b> <br>
                <font color="#003366">
                  ليس للمشارك أي حقوق للملكية الفكرية على نتائج القياسات، من خلال مشاركته في عملية القياس هذه. يقر المشارك ويوافق، بموجب هذه المقتضيات، على أن تقوم الوكالة باستخدام (بطريقة تجعل المصدر مجهولا - façon anonymisée) نتائج القياسات التي تم إجراؤها في إطار عملية تقييم خدمة الإنترنيت الثابت في المغرب.
                </font>
              </p>

              <p align="justify">
                <b> 9. الشروط الخاصة المتعلقة بإيقاف جهاز القياس وسحبه </b> <br>
                <font color="#003366">
                  تحتفظ الوكالة بالحق في إيقاف تشغيل جهاز القياس في أي وقت واسترجاعه دون أن يؤدي ذلك إلى الحق في الحصول على أي تعويض لصالح المشارك.
                </font>
              </p>

              <p align="justify">
                <b> 10. مختلفات </b> <br>
                <font color="#003366">
                  تحتفظ الوكالة بالحق في تعديل بنود هذا النظام في أي وقت ودون سابق إنذار. المشاركون مدعوون للاطلاع، بانتظام، على بنود هذا النظام المنشورة على الموقع الإلكتروني التالي: "qosfixe.anrt.ma".
                </font>
              </p>

            </article>
          </div>
          <br>

          <div id="myDivChartFrancais">
            <p align="justify">
              <font color="#003366">
                <b>INTRODUCTION</b><br>
                La présente charte (ci-après « Charte ») a pour objet de fixer les règles de participation volontaire à la campagne d’évaluation de la qualité technique du service Internet fixe offert aux clients, lancée par l'Agence Nationale de Réglementation des Télécommunications, ci-après désignée « ANRT ».
                <br><br>
                L’ANRT est un établissement public créé par la loi n°24-96 relative à la poste et aux télécommunications, dont le siège est situé au Centre d'Affaires, Boulevard Ar-Ryad, Hay Ryad, Rabat.

                <br><br><b>1. OBJET </b> <br>
                Dans le cadre de ses missions, l’ANRT mène des campagnes de mesures d’évaluation de la QoS technique de l’Internet fixe (ADSL, FTTH, …) fourni à travers des réseaux fixes nationaux.
                <br><br>
                La solution adoptée consiste à mesurer des indicateurs de qualité de service de l’Internet fixe par le biais d’un équipement de mesures installé chez l’abonné qui s’est porté volontairement candidat. Cet équipement permet l’évaluation en continue, durant une période prédéterminée par l’ANRT, des indicateurs de qualité de service. Ces mesures seront effectuées en mode non-intrusif (c.à.d, sans aucun impact sur la connexion Internet fixe) pour chaque abonné sélectionné pour cette opération.
                <br><br>
                Cette solution permet une évaluation continue de la qualité de service telle que perçue au quotidien par l’utilisateur final.

                <br><br>
                <b>2. CONDITIONS D’INSCRIPTION ET DE PARTICIPATION A LA CAMPAGNE DE MESURES </b><br>
                La participation à la campagne d’évaluation de la qualité du service Internet fixe est ouverte à tous les abonnés ayant souscrit un abonnement d’accès Internet fixe (ADSL, FTTH, …) auprès de l’un des trois opérateurs nationaux (Itissalat Al-Maghrib (Maroc Télécom), Médi Telecom (Orange) et Wana Corporate (Inwi)). Le Participant qui s’inscrit à titre volontaire dans cette opération consent explicitement participer à cette campagne et est disposé d’accepter l’installation de l’équipement de mesures dans le lieu de l’abonnement par un technicien mandaté à cet effet par l’ANRT. Dans ce sens, les volontaires s’inscrivent au programme à travers le site Web « qosfixe.anrt.ma ».

                <br><br> <b>3. DONNEES A CARACTERE PERSONNEL COLLECTEES LORS DES INSCRIPTIONS A LA CAMPAGNE DE MESURES </b> <br>
                Quand l’abonné se porte volontairement candidat, l’ANRT collecte, pour les besoins de la campagne de mesures, certaines informations fournies librement et saisies par le Participant. Ces informations concernent:
                <ul>
                  <li> Le nom & prénom ; </li>
                  <li> L’adresse postale ; </li>
                  <li> L’adresse électronique ; </li>
                  <li> Le numéro de téléphone mobile de contact ; </li>
                  <li> Le n° de la CINE ; </li>
                  <li> Le numéro de téléphone fixe (identifiant de l’abonnement Internet ADSL ou FTTH du Participant). </li>
                </ul>

                <b>4. CONDITIONS DE PARTICIPATION </b> <br>
                En s’inscrivant à la campagne d’évaluation de la qualité du service d’Internet fixe, le Participant déclare accepter ce qui suit :
                <div class="d-flex flex-column align-items-stretch text-justify">
                  <ul>
                    <div>
                      <li> Un technicien, mandaté par l’ANRT, lui livre et installe un équipement de mesures des indicateurs de performance d’évaluation de la qualité de service d’Internet fixe. Cet équipement sera branché directement au Routeur / Modem d’accès Internet fixe (ASDL ou FTTH) du Participant. Le déploiement de l’équipement de mesures se fait moyennant la signature par le Participant d’une décharge et la remise d’une copie de sa CINE.</li>
                    </div>
                    <div>
                      <li> Ne pas débrancher ou déconnecter l’équipement de mesures, sauf si le Participant doit effectuer des opérations de maintenance sur son réseau domestique. Dans tous les cas, le Participant accepte de réduire la durée pendant laquelle l’équipement de mesures demeure désactivé. </li>
                    </div>
                    <div>
                      <li> Ne pas effectuer, ou essayer de le faire, de la rétro-ingénierie, altérer, transférer ou endommager l’équipement de mesures. </li>
                    </div>
                    <div>
                      <li> Informer l’ANRT, au plus tard 7 jours de leur survenance, d’un changement d’opérateur, d’offre de service (débit contracté) vers un débit inférieur ou supérieur. Pour ce faire, le Participant doit le notifier l’ANRT à l’adresse électronique « qosfixe-support@anrt.ma ».</li>
                    </div>
                    <div>
                      <li> Informer l’ANRT, dans un délai maximal de 7 jours, de tout changement du lieu d’installation de l’équipement de mesures. </li>
                    </div>
                    <div>
                      <li> Une fois la période de mesures s’achève, le Participant devra rendre à l’ANRT l’équipement de mesures, avec tous ses accessoires, mises à sa disposition. Pour ce faire, un technicien mandaté par l’ANRT procèdera à la désinstallation et à la récupération dudit équipement contre signature d’une décharge. </li>
                    </div>
                    <div>
                      <li> Ne pas céder, ni prêter, ni transférer l’équipement de mesures à un tiers. </li>
                    </div>
                    <div>
                      <li> Contacter l’ANRT, à l’adresse électronique « qosfixe-support@anrt.ma », en cas de problèmes liés au fonctionnement de l’équipement de mesures. </li>
                    </div>
                  </ul>
                </div>

                <b>5. ENGAGEMENT DE L’ANRT ENVERS LE PARTICIPANT SELECTIONNE POUR LA CAMPAGNE DE MESURES </b> <br>
                <div class="text-justify">
                  L’ANRT s’engage envers le Participant à :
                  <ul>
                    <li> Mettre à sa disposition un équipement de mesures, durant une période déterminée par l’ANRT, et l’installer par un technicien mandaté à cet effet par l’ANRT ; </li>
                    <li> Mettre à disposition du Participant, à l’issue de cette opération, un accès aux indicateurs de performance de la qualité de son propre abonnement Internet fixe ; </li>
                    <li> Fournir des services d’assistance ou de support en cas de problème liés au fonctionnement de l’équipement de mesures ; </li>
                    <li> Ne ménager aucun effort pour que l’opération de mesure se déroule dans de bonnes conditions. </li>
                  </ul>
                </div>

                <b>6. NATURE DES INFORMATIONS DISPONIBLES </b> <br>
                <div class="text-justify">
                  L’ensemble des indicateurs de performances communiqués au Participant sont à titre indicatif et ne peuvent en aucun cas être utilisés comme une preuve opposable sur la qualité de service à l’encontre de l’opérateur lui fournissant le service Internet fixe. Le Participant s’interdit de mener toute action dans ce sens sur la base desdites informations.
                </div>

                <br><b>7. TRAITEMENT DES DONNEES RELATIVES AUX RESULTATS DE MESURES </b> <br>
                <div class="text-justify">
                  L’équipement de mesures fonctionne en mode non-intrusif. Les informations collectées des mesures réalisées par cet équipement sont des indicateurs de performance de qualité de service (QoS). En participant à la campagne d’évaluation de service Internet fixe, le Participant consent, expressément, à ce que des indicateurs relevés soient traités par l’ANRT à des fins légitimes, conformément à la réglementation en vigueur.
                </div>

                <br><b>8. PROPRIÉTÉ INTELLECTUELLE </b> <br>
                <div class="text-justify">
                  Le Participant n’a aucun droit de propriété intellectuelle sur les résultats des mesures, du fait de sa participation à cette campagne de mesure. Par la présente, le Participant reconnait et accepte que l’ANRT puisse utiliser (de façon anonymisée) les résultats des mesures relevées dans le cadre de la campagne d’évaluation de service Internet fixe au Maroc.
                </div>

                <br><b>9. CONDITIONS PARTICULIERES RELATIVES A LA DESACTIVATION ET AU RETRAIT DE L’EQUIPEMENT DE MESURES </b> <br>
                <div class="text-justify">
                  L’ANRT se réserve le droit de désactiver l’équipement de mesures, à tout moment, et de le retirer sans que cela ouvre droit à un dédommagement quelconque au profit du Participant.
                </div>

                <br><b>10. DIVERS </b> <br>
                <div class="text-justify">
                  L’ANRT se réserve le droit de modifier les conditions de la présente Charte à tout moment et sans préavis. Le Participant est invité à prendre connaissance régulièrement des dispositions de la présente Charte publiées sur le site « qosfixe.anrt.ma ».
                </div>
              </font>
            </p>
          </div>

        </div>
      </div>

      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <br><br><br>

    <script type='text/javascript'>
      window.onhashchange = hashTriggerTab;
      window.onload = hashTriggerTab;

      function hashTriggerTab() {
        var current_hash = window.location.hash;
        if (current_hash.substring(0, 1) == '#') current_hash = current_hash.substring(1);
        if (current_hash != '') {
          var trigger = document.querySelector('.nav-tabs a[href="#' + current_hash + '"]');
          if (trigger) trigger.click();
        }
      }
    </script>

    <script>
      $('.nav-tabs a').on('click', function() {
        window.location.hash = $(this).attr('href');
      });
    </script>

    <script>
      function verify() {
        var get_error = document.getElementById("error");
        var validateBtn = document.getElementById("validateBtn");

        if (document.getElementById("emailPar").value === document.getElementById("compareEmailPar").value) {
          validateBtn.setAttribute("enabled", "enabled");
          if (get_error !== null) {
            get_error.innerHTML = "";

          }
          return true;

        } else {
          validateBtn.setAttribute("disabled", "disabled");
          get_error.innerHTML = '<span style="color:red">Adresses Email non identiques</span>';
          return false;
        }
      }
    </script>

    <script>
      function verifyContacterNous() {
        var get_error2 = document.getElementById("error2");
        var btnSendMail = document.getElementById("btnSendMail");

        if (document.getElementById("meemail").value === document.getElementById("meCompareEmail").value) {
          btnSendMail.setAttribute("enabled", "enabled");
          if (get_error2 !== null) {
            get_error2.innerHTML = "";
          }
          return true;

        } else {
          btnSendMail.setAttribute("disabled", "disabled");
          get_error2.innerHTML = '<span style="color:red">Adresses Email non identiques </span>';
          return false;
        }
      }
    </script>


    <script>
      function verifyButton() {
        if (document.getElementById("emailPar").value === document.getElementById("compareEmailPar").value) {
          document.getElementById("validateBtn").setAttribute("enabled", "enabled");
          return true;

        } else {
          document.getElementById("validateBtn").setAttribute("disabled", "disabled");
          return false;
        }
      }
    </script>

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
      // WRITE THE VALIDATION SCRIPT.
      function isNumber(evt) {
        var iKeyCode = (evt.which) ? evt.which : evt.keyCode
        if (iKeyCode != 46 && iKeyCode > 31 && (iKeyCode < 48 || iKeyCode > 57))
          return false;

        return true;
      }
    </script> -->

    <script>
      function mygetArabe() {
        var x = document.getElementById("myDivArabe");
        var y = document.getElementById("myDivFrancais");
        var divAr = document.getElementById("showAr");
        var divFr = document.getElementById("showFr");
        if (x.style.display === "none") {
          x.style.display = "block";
          y.style.display = "none";
          divAr.style.display = "none";
          divFr.style.display = "block";
        } else {
          x.style.display = "none";
          y.style.display = "block";
        }
      }
    </script>

    <script>
      function mygetFrancais() {
        var x = document.getElementById("myDivArabe");
        var y = document.getElementById("myDivFrancais");
        var divAr = document.getElementById("showAr");
        var divFr = document.getElementById("showFr");
        if (x.style.display === "block") {
          x.style.display = "none";
          y.style.display = "block";
          divAr.style.display = "block";
          divFr.style.display = "none";
        } else {
          x.style.display = "block";
          y.style.display = "none";
        }
      }
    </script>

    <!--  Tab Chart participation  -->
    <script>
      function mygetChartArabe() {
        var x = document.getElementById("myDivChartArabe");
        var y = document.getElementById("myDivChartFrancais");
        var divChartAr = document.getElementById("showChartAr");
        var divChartFr = document.getElementById("showChartFr");
        if (x.style.display === "none") {
          x.style.display = "block";
          y.style.display = "none";
          divChartAr.style.display = "none";
          divChartFr.style.display = "block";
        } else {
          x.style.display = "none";
          y.style.display = "block";
        }
      }
    </script>

    <script>
      function mygetChartFrancais() {
        var x = document.getElementById("myDivChartArabe");
        var y = document.getElementById("myDivChartFrancais");
        var divChartAr = document.getElementById("showChartAr");
        var divChartFr = document.getElementById("showChartFr");
        if (x.style.display === "block") {
          x.style.display = "none";
          y.style.display = "block";
          divChartAr.style.display = "block";
          divChartFr.style.display = "none";
        } else {
          x.style.display = "block";
          y.style.display = "none";
        }
      }
    </script>

    <script>
      $('#inscriptionBtn').click(function() {
        $(document).scrollTop(0) // any value you need
      });
    </script>

    <!--magnific popup-->
    <script src="js/jquery.magnific-popup.min.js"></script>
    <script src="js/jquery.validate.min.js"></script>
    <!-- <script src="js/sendmailContact.js"></script> -->

    <script>
      $(document).ready(function() {

        $('.validator-form').bootstrapValidator({

          // live: 'disabled',
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
                  message: '<font color="red" class="requiredtest">Ce champ est requis</font>'
                },
                stringLength: {
                  min: 2,
                  max: 80,
                  message: '<font color="red" class="requiredtest">Le prénom doit comporter plus de 2 caractères et moins de 80 caractères</font>'
                },
              }
            },
            nomPar: {
              validators: {
                notEmpty: {
                  message: '<font color="red" class="requiredtest">Ce champ est requis</font>'
                },
                stringLength: {
                  min: 2,
                  max: 80,
                  message: '<font color="red" class="requiredtest">Le nom doit comporter plus de 2 caractères et moins de 80 caractères</font>'
                },
              }
            },
            telPar: {
              validators: {
                notEmpty: {
                  message: '<font color="red" class="requiredtest">Ce champ est requis</font>'
                },
                stringLength: {
                  min: 2,
                  max: 10,
                  message: '<font color="red" class="requiredtest" >Veuillez entrer un numéro de téléphone valide </font>'
                },
              }
            },
            // operateurPar: {
            //   validators: {
            //     notEmpty: {
            //       message: '<font color="red">Ce champ est requis</font>'
            //     },
            //     stringLength: {
            //       min: 2,
            //       max: 80,
            //       message: '<font color="red">Ce champ doit comporter plus de 2 caractères et moins de 80 caractères</font>'
            //     },
            //   }
            // },
            // offreservicePar: {
            //   validators: {
            //     notEmpty: {
            //       message: '<font color="red">Ce champ est requis</font>'
            //     },
            //   }
            // },
            // typeclientPar: {
            //   validators: {
            //     notEmpty: {
            //       message: '<font color="red">Ce champ est requis</font>'
            //     },
            //   }
            // },
            emailPar: {
              validators: {
                notEmpty: {
                  message: '<font color="red" class="requiredtest" >Ce champ est requis</font>'
                },
                emailAddress: {
                  message: '<font color="red" class="requiredtest">Format invalide</font>'
                }
              }
            },
            compareEmailPar: {
              validators: {
                notEmpty: {
                  message: '<font color="red" class="requiredtest">Ce champ est requis</font>'
                },
                emailAddress: {
                  message: '<font color="red" class="requiredtest">Format invalide</font>'
                }
              }
            },
            villePar: {
              validators: {
                notEmpty: {
                  message: '<font color="red" class="requiredtest">Ce champ est requis</font>'
                },
                stringLength: {
                  min: 2,
                  max: 80,
                  message: '<font color="red" class="requiredtest">Ce champ doit comporter plus de 2 caractères et moins de 80 caractères</font>'
                },
              }
            },
            termeCheck1: {
              validators: {
                notEmpty: {
                  message: '<br><font color="red" class="requiredtest">(Vous devez certifier que les données sont correctes)</font>'
                },

              }
            },
            termeCheck2: {
              validators: {
                notEmpty: {
                  message: '<br><font color="red" class="requiredtest">(Vous devez accepter les termes de la charte de participation)</font><br><font color="red"> (يجب الموافقة على شروط نظام المشاركة) </font>'
                },
              }
            },
            captcha_contact: {
              validators: {
                notEmpty: {
                  message: '<font color="red" class="requiredtest">Ce champ est requis</font>'
                },
              }
            }
          },
        });

        // Validate the form manually
        $('#validateBtn').click(function() {
          $('.validator-form').bootstrapValidator('validate');

        });

        // Reset the validation
        $('#resetBtn').click(function() {
          $('.validator-form').data('bootstrapValidator').resetForm(true);
          $('input[name=image]').val('');
        });

      });
    </script>

    <script>
      $(document).ready(function() {

        $('.form-send-email').bootstrapValidator({

          // live: 'disabled',
          message: 'Cette valeur est non valide',
          feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
          },
          fields: {
            meprenom: {
              validators: {
                notEmpty: {
                  message: '<font color="red">Ce champ est requis</font>'
                },
                stringLength: {
                  min: 2,
                  max: 80,
                  message: '<font color="red">Le prénom doit comporter plus de 2 caractères et moins de 80 caractères</font>'
                },
              }
            },
            menom: {
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
            meobjet: {
              validators: {
                notEmpty: {
                  message: '<font color="red">Ce champ est requis</font>'
                },
                stringLength: {
                  min: 5,
                  max: 80,
                  message: '<font color="red">Ce champ doit comporter plus de 5 caractères et moins de 80 caractères</font>'
                },
              }
            },
            memessage: {
              validators: {
                notEmpty: {
                  message: '<font color="red">Ce champ est requis</font>'
                },
                stringLength: {
                  min: 10,
                  max: 500,
                  message: '<font color="red">Ce champ doit comporter plus de 10 caractères et moins de 500 caractères</font>'
                },
              }
            },
            meemail: {
              validators: {
                notEmpty: {
                  message: '<font color="red">Ce champ est requis</font>'
                },
                emailAddress: {
                  message: '<font color="red">Format invalide</font>'
                }
              }
            },
            meCompareEmail: {
              validators: {
                notEmpty: {
                  message: '<font color="red">Ce champ est requis</font>'
                },
                emailAddress: {
                  message: '<font color="red">Format invalide</font>'
                }
              }
            },
            captchacontact: {
              validators: {
                notEmpty: {
                  message: '<font color="red">Ce champ est requis</font>'
                },
              }
            }
          },
        });

      });
    </script>

    <?php
    require_once 'includes/footerorigine.php';
    ?>

    <!-- old link -->
    <!-- <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script> -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script type="text/javascript" src="js/jquery-captcha.js"></script>

    <script>
      // step-1
      const captcha = new Captcha($('#canvas'), {
        length: 4
      });
      // api
      //captcha.refresh();
      //captcha.getCode();
      //captcha.valid("");

      $('#refresh-captcha-btn').on('click', function() {
        captcha.refresh();
        $('#captcharesult').hide();
      })
    </script>

    <!-- captcha envoi message mail -->
    <script>
      // step-1
      const captcha2 = new Captcha($('#canvas2'), {
        length: 4
      });
      // api
      //captcha.refresh();
      //captcha.getCode();
      //captcha.valid("");

      $('#refresh-captcha-btn2').on('click', function() {
        captcha2.refresh();
        $('#captcharesult2').hide();
      })
    </script>

    <script type="text/javascript">
      $(document).ready(function(event) {
        $('#validateBtn').on('click', function() {
            var me = $(this);
          var prenomPar = $('#prenomPar').val();
          var nomPar = $('#nomPar').val();
          var telPar = $('#telPar').val();
          var emailPar = $('#emailPar').val();
          var compareEmailPar = $('#compareEmailPar').val();
          var villePar = $('#villePar').val();
          var operateurPar = $('#operateurPar').val() || '';
          var quartierPar = $('#quartierPar').val();
          var typeaccesPar = $('#typeaccesPar').val();
          var offreservicePar = $('#offreservicePar').val();
          var numlignePar = $('#numlignePar').val();
          var adressePar = $('#adressePar').val();
          var typeclientPar = $('#typeclientPar').val();

          var termeCheck2 = '';
          if ($("#termeCheck2").prop('checked')) {
            // console.log('terme 2 est ok ');
            termeCheck2 = 'on';
          }

          if (prenomPar != '' && nomPar != '' && telPar != '' && emailPar != '' && compareEmailPar != '' && villePar != '' && termeCheck2 != '') {

            const ans = captcha.valid($('input[name="code"]').val());

            $('#captcharesult').hide();

            if (ans == true) {
              $.ajax({
                type: 'POST',
                url: './handler/add-participation.php',
                dataType: "text",
                  beforeSend : function(){
                      $('#validateBtn').attr('disabled','disabled');
                    $('.loader').show(200);
                  },
                data: {
                  nomPar: nomPar,
                  prenomPar: prenomPar,
                  telPar: telPar,
                  emailPar: emailPar,
                  compareEmailPar: compareEmailPar,
                  villePar: villePar,
                  operateurPar: operateurPar,
                  quartierPar: quartierPar,
                  typeaccesPar: typeaccesPar,
                  offreservicePar: offreservicePar,
                  numlignePar: numlignePar,
                  adressePar: adressePar,
                  typeclientPar: typeclientPar,
                  termeCheck2: termeCheck2
                }
              }).done(function(res_add) {
                  console.log(res_add);
                  $('#validateBtn').removeAttr('disabled');
                  $('.loader').hide(200);
                if (res_add == '9') {
                  swal.fire({
                    title: 'Vérification',
                    html: '<h3>votre code a été envoyé.</h3></br>' +
                      '<p> L’ANRT vous remercie pour votre inscription </br>' +
                      'Veuillez consulter votre boite mail pour activer votre compte <br></p> <br>' +
                      '<p> الوكالة تشكركم على التسجيل </br>' +
                      'المرجو مراجعة بريدكم الإلكتروني لتفعيل مشاركتكم <br></p>' ,
                    icon: 'info',
                    focusConfirm: false,
                    // button: "<a href='/participation.php'>Poursuivre</a>",
                    confirmButtonText: '<a href="/participation.php" style="color:white">Poursuivre</a>',
                    confirmButtonAriaLabel: 'Thumbs up, great!',
                    // timer: 5000
                  });
                }
                if (res_add == '1') {

                  Swal.fire({
                    icon: 'error',
                    title: 'Message non envoyé !',
                    html: 'Impossible d\'envoyer votre email pour des raisons techniques.<br>' +
                      ' Contactez-nous par téléphone, merci de votre compréhension <br>' +
                      '<p> حدثت مشكلة أثناء الإرسال </br>' +
                      ' إتصلوا بنا عبر الهاتف ، شكرًا لتفهمكم </p>' ,
                    // footer: '<a href="">Why do I have this issue?</a>'
                  })
                }
                if (res_add == '2') {

                  Swal.fire({
                    icon: 'error',
                    title: "Erreur d'adresse email",
                    html: 'Cette adresse email est déjà affectée, merci de réessayer <br>' +
                    'هذا البريد الإلكتروني  قيد الاستخدام، يرجى المحاولة مرة أخرى' ,
                    // footer: '<a href="">Why do I have this issue?</a>'
                  })
                }
                if (res_add == '3') {
                  Swal.fire({
                    icon: 'error',
                    title: 'Echec ajout participant !',
                    html: 'Données non valides, merci de vérifier et réessayer <br>' +
                    'توجد أخطاء في البيانات ، يرجى التحقق والمحاولة مرة أخرى ' ,
                    // footer: '<a href="">Why do I have this issue?</a>'
                  })
                }
              }).fail(function (xhr) {
                  $('.loader').hide(200);
                  $('#validateBtn').attr('disabled','disabled');
                  console.log(xhr);
              });

            } else {
              $("#captcharesult").replaceWith('<font color="red" id="captcharesult" class="requiredtest">Captcha invalide</font>');
            }
          } else {
            swal.fire({
              html : 'Problème à signaler<br>لقد حدثت مشكلة',
              icon : 'error',
            });
          }
        }) // on click
      }); // document ready
    </script>

    <script type="text/javascript">
      $(document).ready(function() {
        $('#btnSendMail').on('click', function() {

          var menom = $('#menom').val();
          var meprenom = $('#meprenom').val();
          var meemail = $('#meemail').val();
          var meobjet = $('#meobjet').val();
          var memessage = $('#memessage').val();

          if (menom != '' && meprenom != '' && meemail != '' && meobjet != '' && memessage != '') {

            const ans2 = captcha2.valid($('input[name="code2"]').val());
            $('#captcharesult2').hide();

            if (ans2) {

              $.ajax({
                type: 'POST',
                url: './handler/contact-us.php',
                dataType: "text",
                data: {
                  menom: menom,
                  meprenom: meprenom,
                  meemail: meemail,
                  meobjet: meobjet,
                  memessage: memessage,
                }
              }).done(function(res) {
                console.log(res);
                // var a = parseInt(res) ;

                if (res.length > 0 ) {
                  // console.log('res=<'+res+'>');
                  swal.fire({
                    // title: 'Message envoyé',
                    html: '<h3>Votre message a été envoyé à notre équipe </h3></br>' +
                      'L’ANRT vous remercie pour votre message </br> ' +
                      'الوكالة تشكركم على الرسالة</b>',
                    // 'Veuillez consulter votre boite mail pour activer votre compte <br></p>',
                    icon: 'info',
                    focusConfirm: false,
                    confirmButtonText: '<a href="/participation.php" style="color:white">Poursuivre/مواصلة</a>',
                    // confirmButtonAriaLabel: 'Thumbs up, great!',
                    // timer: 5000
                  });
                }
                else {
                  // console.log('res=<'+Number(res)+'>');
                  Swal.fire({
                    icon: 'error',
                    // title: 'Message non envoyé !',
                    html: 'Impossible d\'envoyer votre email pour des raisons techniques.<br>' +
                      ' Contactez-nous par téléphone, merci de votre compréhension <br>' +
                      '<p> حدثت مشكلة أثناء الإرسال </br>' +
                      'إتصلوا بنا عبر الهاتف ، شكرًا لتفهمكم </p>' ,
                    // footer: '<a href="">Why do I have this issue?</a>'
                  })
                }
              }).fail(function (xhr) {
                console.log(xhr);
              });

            } else {
              // erreur captcha
              $("#captcharesult2").replaceWith('<font color="red" id="captcharesult2" class="requiredtest">Captcha invalide</font>');
            }
          } else {
            swal.fire({
              title: 'Problème de saisie, merci de réessayer ',
              icon: 'error',
            });
          }
        });
      });
    </script>

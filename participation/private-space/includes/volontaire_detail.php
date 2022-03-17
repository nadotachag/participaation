<?php
// error_reporting(E_ALL);
// ini_set("display_errors", 1);
include ('authen.php');
require_once ('includes/header.php');
include ('../../includes/connection.php');
include ('../../includes/participation.php');
include ('../../includes/detailcampagne.php');


$idf = $_SESSION['num_volontaire'];
$_PAR = new Participation();
$dataPar = $_PAR->getParticipationById($idf);
$_DCP = new DetailCampagne();
?>

<style>
.form-group.required label:after{
color: red;
font-family: 'FontAwesome';
font-weight: normal;
font-size: 14px;
content: "*";
top:4px;
position: absolute;
 margin-left: 8px;
}

 .badge-pistache{
  background-color: #bef574;
}
</style>



<body class="hold-transition sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">
  <!-- Navbar -->
  <?php
 require_once 'includes/navbar.php';
  ?>

<script  src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>


<style>
    .select2-container .select2-selection--single{
    height:34px !important;
}
.select2-container--default .select2-selection--single{
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
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
		   <div class="col-sm-12">
		   <center>
		   <br>
            <h4><font color="#c21f37"> <b>Liste des données personnelles et techniques du volontaire </b> </font></h4>
			</center>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>


<section class="content">
<form method="post" class="validator-form" action="#" id="form">
<div class="card">
	<div class="row">
	    <div class="col-sm-6">
    	    <div class="form-group">
    	      <?php  $getvalnumVolotaire = $dataPar['num_volontaire'];
    	        $dataVol = $_DCP->getExistVolontaireById($getvalnumVolotaire);
    	      ?>

    	         <!-- No validate email -->
        	     <?php if((trim($dataPar['active_par']))==0){ ?>
        	     <label for="NumPar" class="col-sm-3 col-form-label" ><span class="badge badge-secondary"> <h5><b> Volontaire N°  <?= $getvalnumVolotaire ?> </b></h5></span></label>
        	     <?php } ?>

        	     <!-- Validate email -->
        	     <?php if(($dataPar['active_par']==1) && ($dataPar['etat_submit_hotline']==0)){ ?>
        	     <label for="NumPar" class="col-sm-3 col-form-label" ><span class="badge badge-light"> <h5><b> Volontaire N°  <?= $getvalnumVolotaire ?></b></h5></span></label>

        	     <?php } ?>

        	      <!-- Validate hotline -->
        	     <?php if(($dataPar['etat_submit_hotline'])==1 && $dataVol==false){ ?>
        	     <label for="NumPar" class="col-sm-3 col-form-label" ><span class="badge badge-warning"> <h5> <b>Volontaire N°  <?= $getvalnumVolotaire ?></b></h5></span></label>
        	     <?php } ?>


        	       <!-- Validate Campagne -->
        	     <?php
        	     if($dataVol && ($dataPar['num_sonde_par'] == "")){ ?>
        	     <label for="NumPar" class="col-sm-3 col-form-label" ><span class="badge badge-success"> <h5><b> Volontaire N°  <?= $getvalnumVolotaire ?> </b></h5></span></label>
        	     <?php } ?>

        	       <!-- Validate Sonde -->
        	     <?php
        	     if(($dataPar['num_sonde_par']) && trim($dataPar['active_par'])==1) { ?>
        	     <label for="NumPar" class="col-sm-3 col-form-label" ><span class="badge badge-pistache"> <h5><b>Volontaire N°  <?= $getvalnumVolotaire ?> </b> </h5></span></label>
        	     <?php } ?>
    	    </div>
	    </div>
	 </div>
</div>

	 <h5><font color="#c21f37"><b> Données personnelles </b></font> </h5>

<div class="card">
	<div class="row">
  <div class="col-sm-6">
    <!--  <div class="card"> -->
      <div class="card-body">
		  <div class="form-group row required control-label">
		   <label for="prenomPar" class="col-sm-3 col-form-label" > Prénom </label>
		    <div class="col-sm-6">
			 <input type="text" id="prenomPar" name="prenomPar" class="form-control"  value="<?=$dataPar['prenom_par']?>" disabled>
			</div>
		    <input type="hidden" name="prenomPar" value="<?=$dataPar['prenom_par']?>" />
		  </div>

		 <div class="form-group row required control-label">
		   <label for="nomPar" class="col-sm-3 col-form-label" > Nom </label>
		    <div class="col-sm-6">
			 <input type="text" id="nomPar" name="nomPar" class="form-control" value="<?=$dataPar['nom_par']?>">
			 <input type="hidden" name="idf" value="<?=$idf?>" />

		    <input type="hidden" name="nomPar" value="<?=$dataPar['nom_par']?>" />

		  </div>

		  <div class="form-group row required control-label">
		   <label for="telPar" class="col-sm-3 col-form-label" > N° contact Tél </label>
		    <div class="col-sm-6">
			 <input type="text" id="telPar" name="telPar" class="form-control" value="<?=$dataPar['num_contact_tel_par']?>" disabled >
		    <input type="hidden" name="telPar" value="<?=$dataPar['num_contact_tel_par']?>" />
			 </div>
		  </div>
      </div>
    <!--  </div> -->
  </div>

   <div class="col-sm-6">
   <!--   <div class="card">  -->
      <div class="card-body">
		  <div class="form-group row required control-label">
		   <label for="operateurPar" class="col-sm-3 col-form-label" > Opérateur </label>
		    <div class="col-sm-6">
			 <select class="form-control custom-select" name="operateurPar" disabled >
                  <option selected  value="<?=$dataPar['operateur_par']?>"> <?php echo $dataPar['operateur_par']?></option>
				  <option value="Itissalat Al Magrib / IAM">Itissalat Al Maghrib / Maroc Telecom</option>
				  <option value="Méditelecom / Orange">Médi Télecom / Orange</option>
				  <option value="Wana Corporate / Inwi"> Wana Corporate / Inwi</option>
              </select>


		    <input type="hidden" name="operateurPar" value="<?=$dataPar['operateur_par']?>" />

			 </div>
		  </div>

		 <div class="form-group row required control-label">
		   <label for="villePar" class="col-sm-3 col-form-label" > Ville </label>
		    <div class="col-sm-6">

			  <select  class="form-control select2" name="villePar" id="villePar"  disabled >
                  <option selected value="<?=$dataPar['ville_par']?>"><?php echo $dataPar['ville_par']?></option>
				            <option disabled>Selectionnez une ville</option>
				            <option value="Agadir">Agadir</option>
                            <option value="Al hoceima">Al hoceima</option>
                            <option value="Aoussered">Aoussered</option>
                            <option value="Assilah">Assilah</option>
                            <option value="Azrou">Azrou</option>
                            <option value="Ben ahmed">Ben ahmed</option>
                            <option value="Beni mellal">Beni mellal</option>
                            <option value="Benslimane">Benslimane</option>
                            <option value="Berkane">Berkane</option>
                            <option value="Berrechid">Berrechid</option>
                            <option value="Boujdour">Boujdour</option>
                            <option value="Bouskoura">Bouskoura</option>
                            <option value="Bouznika">Bouznika</option>
                            <option value="Casablanca">Casablanca</option>
                            <option value="Chafchaouen">Chafchaouen</option>
                            <option value="Dakhla">Dakhla</option>
                            <option value="El hajeb">El hajeb</option>
                            <option value="El jadida">El jadida</option>
                            <option value="Errachidia">Errachidia</option>
                            <option value="Essaouira">Essaouira</option>
                            <option value="Essmara">Essmara</option>
                            <option value="Fès">Fès</option>
                            <option value="Fkih ben salah">Fkih ben salah</option>
                            <option value="Guelmim">Guelmim</option>
                            <option value="Guercif">Guercif</option>
                            <option value="Ifrane">Ifrane</option>
                            <option value="Imouzzer kandar">Imouzzer kandar</option>
                            <option value="Kénitra">Kénitra</option>
                            <option value="Kabila">Kabila</option>
                            <option value="Khemisset">Khemisset</option>
                            <option value="Khenifra">Khenifra</option>
                            <option value="Khouribga">Khouribga</option>
                            <option value="Ksar el kebir">Ksar el kebir</option>
                            <option value="Laayoune">Laayoune</option>
                            <option value="Larache">Larache</option>
                            <option value="Marrakech">Marrakech</option>
                            <option value="Martil">Martil</option>
                            <option value="Meknès">Meknès</option>

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
                            <option value="Sidi bennour">Sidi bennour</option>
                            <option value="Sidi ifni">Sidi ifni</option>
                            <option value="Sidi kacem">Sidi kacem</option>
                            <option value="Sidi rahal">Sidi rahal</option>
                            <option value="Sidi slimane">Sidi slimane</option>
                            <option value="Tamensourte">Tamensourte</option>
                            <option value="Tamesna">Tamesna</option>
                            <option value="Tanger">Tanger</option>
                            <option value="Tantan">Tantan</option>
                            <option value="Tarfaya">Tarfaya</option>
                            <option value="Taroudant">Taroudant</option>
                            <option value="Taza">Taza</option>
                            <option value="Temara">Temara</option>
                            <option value="Tetouan">Tetouan</option>
                            <option value="Tifelt">Tifelt</option>
                            <option value="Tinghir">Tinghir</option>
                            <option value="Tiznit">Tiznit</option>
                            <option value="Youssoufia">Youssoufia</option>
                            <option value="Zagora">Zagora</option>
              </select>
              <script>
                    $('.select2').select2();
            </script>

		    <input type="hidden" name="villePar" value="<?=$dataPar['ville_par']?>" />
			 </div>
		  </div>

		   <div class="form-group row required control-label">
		   <label for="cinPar" class="col-sm-3 col-form-label" > CIN </label>
		    <div class="col-sm-6">
			 <input type="text" id="cinPar" name="cinPar" class="form-control" value="<?=$dataPar['cin_par']?>" disabled >
		    <input type="hidden" name="cinPar" value="<?=$dataPar['cin_par']?>" />
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
		    <label for="typeaccesPar" class="col-sm-5 col-form-label" >Type d'abonnement <font color="red"> *</font></label>
		    <div class="col-sm-6">
			<div class="form-check form-check-inline">
			  <input class="form-check-input" type="radio" name="typeaccesPar" id="typeaccesPar1" value="ADSL" <?php if(($dataPar['type_acces_par']) == "ADSL"){ ?> checked <?php } ?>>
			  <label class="form-check-label" for="typeaccesPar1">ADSL</label>
			</div>

			<div class="form-check form-check-inline">
			  <input class="form-check-input" type="radio" name="typeaccesPar" id="typeaccesPar2" value="FIBRE" <?php if(($dataPar['type_acces_par']) == "FIBRE"){ ?> checked <?php } ?>  disabled >
			  <label class="form-check-label" for="typeaccesPar2">FIBRE</label>
			</div>
		    <input type="hidden" name="typeaccesPar" value="<?=$dataPar['type_acces_par']?>" />
			</div>
			</div>

		  <?php $val='4Mbps' ?>
		 <div class="form-group row">
		   <label for="offreservicePar" class="col-sm-4 col-form-label" > Débit contracté : </label>
		    <div class="col-sm-6">

              <select class="form-control custom-select" name="offreservicePar" id="firstDropdown"  disabled >
                  <option selected disabled="true" value="<?=$dataPar['offre_service_par']?>"><?php echo $dataPar['offre_service_par']?> </option>
                  <option selected hidden value="<?=$dataPar['offre_service_par']?>"><?php echo $dataPar['offre_service_par']?> </option>
				  <option value="4 Mb/s">4 Mb/s</option>
				  <option value="8 Mb/s">8 Mb/s</option>
				  <option value="12 Mb/s">12 Mb/s</option>
				  <option value="20 Mb/s">20 Mb/s</option>
              </select>

			  <select class="form-control custom-select myHide" name="offreservicePar" id="secondDropdown"  >
                  <option selected disabled="true" value="<?=$dataPar['offre_service_par']?>"><?php echo $dataPar['offre_service_par']?> </option>
				 <option value="12 Mb/s">12 Mb/s</option>
				  <option value="20 Mb/s">20 Mb/s</option>
				  <option value="50 Mb/s">50 Mb/s</option>
				  <option value="100 Mb/s">100 Mb/s</option>
				  <option value="200 Mb/s">200 Mb/s</option>
              </select>


		    <input type="hidden" name="offreservicePar" value="<?=$dataPar['offre_service_par']?>" />

			 </div>
		  </div>

		  <div class="form-group row">
		   <label for="numlignePar" class="col-sm-4 col-form-label" > N° de ligne : </label>
		    <div class="col-sm-6">
			 <input type="text" id="numlignePar" name="numlignePar" class="form-control" value="<?=$dataPar['num_ligne_par']?>"  disabled >


		    <input type="hidden" name="numlignePar" value="<?=$dataPar['num_ligne_par']?>" />


			 </div>
		  </div>

		   <div class="form-group row">
		   <label for="typeclientPar" class="col-sm-4 col-form-label" > Type d'abonné : </label>
		    <div class="col-sm-6">
			 <select class="form-control custom-select" name="typeclientPar" disabled >
                  <option selected value="<?=$dataPar['type_client_par']?>"><?php echo $dataPar['type_client_par']?> </option>
				  <option value="Résidentiel">Résidentiel</option>
				  <option value="Professionnel">Professionnel</option>
              </select>


		    <input type="hidden" name="typeclientPar" value="<?=$dataPar['type_client_par']?>" />


			 </div>
		  </div>

		   <div class="form-group row">
		   <label for="emailPar" class="col-sm-4 col-form-label"> Email : </label>
		    <div class="col-sm-6">
			 <input type="text" id="emailPar" name="emailPar" class="form-control" value="<?=$dataPar['adresse_email_par']?>"  disabled >


		    <input type="hidden" name="emailPar" value="<?=$dataPar['adresse_email_par']?>" />

			 </div>
		  </div>

		  <div class="form-group row">
                    <label for="exampleInputFile" class="col-sm-4 col-form-label">Joindre copie ou photo de votre facture d'abonnement / أرفق نسخة أو صورة من فاتورة اشتراكك</label>
					<div class="col-sm-6">
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="image1" name="image1" disabled >
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
    <!--  </div> -->
  </div>

   <div class="col-sm-6">
   <!--   <div class="card">  -->
      <div class="card-body">
		  <div class="form-group row">
		   <label for="quartierPar" class="col-sm-3 col-form-label" > Quartier </label>
		    <div class="col-sm-6">
			  <input type="text" id="quartierPar" name="quartierPar" class="form-control" value="<?=$dataPar['quartier_par']?>" disabled >
		    <input type="hidden" name="quartierPar" value="<?=$dataPar['quartier_par']?>" />
			 </div>
		  </div>

		 <div class="form-group row">
		   <label for="adressePar" class="col-sm-3 col-form-label" > Adresse </label>
		    <div class="col-sm-6">
			 <textarea id="adressePar" name="adressePar" class="form-control"  rows="4" disabled><?php echo $dataPar['adresse_par']?></textarea>
		     <input type="hidden" name="adressePar" value="<?=$dataPar['adresse_par']?>" />
			 </div>
		  </div>
      </div>
  <!--  </div>  -->
      </div>
    	 <br><br>
    </div>
  </div>
 </div>
</form>
</section>
    <!-- Main content -->

    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<?php
 require_once 'includes/footer.php';
?>

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

<script src="plugins/bootstrap-validator/js/edit-participation.js"></script>

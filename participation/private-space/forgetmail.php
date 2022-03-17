<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Espace du volontaire</title>
  <link href="https://fonts.googleapis.com/css?family=Karla:400,700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.materialdesignicons.com/4.8.95/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/css/login.css">

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200&display=swap" rel="stylesheet">

</head>
<body>

    <!-- Image and text -->
    <nav class="navbar navbar-light bg-white">
        <div class="row">
      <a class="navbar-brand" href="#">
        <img src="../logo/anrt.jpg" width="120" height="60" class="d-inline-block align-top" alt="">
      </a>
    </nav>

    <nav class="navbar navbar-collapse bg-dark-anrt">
      <!-- Navbar content Mobile -->
     <!-- <marquee behavior="scroll" direction="left"> <div class="float-left"><font color="white">Portail de la compagne nationale de mesure de la qualité de l'internet fixe</font></div> <div class="float-right"> <font color="white">  بوابة العملية الوطنية لتقييم جودة الأنترنت الثابت </font></div></marquee> -->
         <div class="col-lg-4 col-sm-12 ng-star-inserted d-sm-none" style="text-align: center;">
              <font size="2px" color="white"><b>  بوابة العملية الوطنية لتقييم جودة الأنترنت الثابت</b>
              </font>
        </div>
    <div class="col-lg-6 col-sm-12 ng-star-inserted d-sm-none" style="text-align: center;"><font size="2px" color="white"><b>Portail de la campagne d’évaluation de la qualité de l'Internet fixe</b></font></div>

         <!-- Navbar content Desktop -->
         <div class="col-sm-6 d-none d-sm-block" style="text-align: left;"><font size="2px" color="white"><b>Campagne d’évaluation de la qualité de l'Internet fixe </b></font></div>
         <div class="col-sm-4 d-none d-sm-block" style="text-align: right;"> <font size="2px" color="white"><b>   عملية تقييم جودة الأنترنت الثابت</b>  </font> </div>
    </div>
    </nav>

  <main class="d-flex align-items-center min-vh-100 py-3 py-md-0">
    <div class="container">
      <div class="card login-card">
        <div class="row no-gutters">
          <div class="col-md-5 bg-img-nature">
           <!-- <img src="assets/images/login.jpg" alt="login" class="login-card-img" > -->
		   <div class="card-body">
              <div class="brand-wrapper">
			<center><h4><font color="white"><b>Espace du volontaire</b></font></h4></center>
			<p>
			<!--<b>-->
			<font color="white">
			En renseignant votre email et code, vous pourrez:
			<ul>
			<li> Consulter votre profile.</li>
			<li> Suivre l'état de votre demande.</li>
			<li> Modifier ou annuler votre demande.</li>
			<li> Contacter l'ANRT</li>
			</ul>
			</font>
			<!--</b>-->
			</p>
			<br>
			<center><h4><font color="white"><b>فضاء المتطوع</b></font></h4></center>
			<div dir="rtl" align="right">
				<p>
				 <!--<b>-->
				<font color="white">
				بإدخال بريدك الإلكتروني والرمز الخاص بك ، يمكنك:
				<ul>
				<li> الاطلاع على ملف التعريف الخاص بك. </li>
				<li>تتبع حالة طلبك.</li>
				<li> تعديل أو إلغاء طلبك.</li>
		    	<li> الاتصال بالوكالة.</li>
				</ul>
				</font>
				<!--</b>-->
				</p>
			</div>
			</div>
			</div>
          </div>
          <div class="col-md-7">
            <div class="card-body">
              <div class="brand-wrapper">
                <!-- <img src="assets/images/logo.jpg" alt="logo" class="logo"> -->

                 <div class="loader"></div>
                 <div class="finalMessage"></div>

              </div>
            <!--  <p class="login-card-description">Sign into your account</p> -->
              <form id="form-connect" name="form-connect">
                  <center>
                      <h5>Veuillez entrer votre Email </h5>
                      <h5> المرجو إدخال البريد الإلكتروني الخاص بكم </h5>
                  </center>
                  <br>
                  <div class="form-group">
                    <label for="email" class="login-card-description">Email / البريد الإلكتروني <font color="red">*</font></label>
                    <input type="email" name="email" id="email" class="form-control" placeholder="البريد الإلكتروني">
                  </div>

                  <input name="login" id="getConnect" class="btn btn-block login-btn mb-4" type="button" value="Envoyer / أرسل"  >

                </form>

               <!-- <a href="#!" class="forgot-password-link">Inscrivez-vous / تسجيل</a> -->
			    <a href="../participation.php#nav-participation" class="login-card-footer-text">Inscrivez-vous / تسجيل</a>
                <nav class="login-card-footer-nav">
                  <a href="#!">© <?php echo date("Y"); ?> - ANRT.</a>
                  <a href="#!">  Tous droits réservés</a>
                </nav>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>
  <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
  <script src="../assets/js/jquery.validate.min.js"></script>

 <script type="text/javascript">
 jQuery.validator.setDefaults({
      debug: true,
      success: "valid"
    });

    var vld = $("#form-connect");
    vld.validate({
      rules:{
        email:{
          required: true,
          email: true
        },
      },
      messages:{
        email:{
          required: "<span class='messageError text-right'><font color='red'>Ce champ est requis</font></span>",
          email: "<span class='messageError text-left'><font color='red'>S'il vous plaît, mettez une adresse email valide.</font></span>"
        },
      }
    });


 $(document).ready(function(){
   $("#getConnect").click(function(){

    if(vld.valid())
    {
      var email = $('#email').val();

      $('.loader').show(200);

      $.ajax({
        url: 'verifyemail.php',
        type: 'POST',
        data: {email: email},
        success: function(result){
          $('.finalMessage').html(result);
          $('.loader').hide(200);
          if(result == 'Bienvenue')
            {
               window.setTimeout(function(){
                  window.location.href = "detail_volontaire.php";
            }, 2000);
            }
        }
      });

    }
  });

});
</script>

</body>
</html>

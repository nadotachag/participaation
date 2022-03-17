<?php
include('authen.php');
require_once('includes/header.php');
require_once 'includes/navbar.php';
include('../includes/connection.php');
include('../includes/participation.php');
include('../mailer/smtp/PHPMailerAutoload.php');

// error_reporting(E_ALL);
// ini_set("display_errors", 1);

$idf = $_SESSION['num_volontaire'];

$_PAR = new Participation();
$dataPar = $_PAR->getParticipationById($idf);

$prenomPar = $dataPar['prenom_par'];
$nomPar = $dataPar['nom_par'];
$emailPar = $dataPar['adresse_email_par'];
$NumPar = $idf;

// echo "la valeur est " .$prenomPar ." ".$nomPar ." ".$emailPar;
?>

<style>
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
</style>

<br>

<body>
    <main class="d-flex align-items-center min-vh-100 py-3 py-md-0">
        <div class="container">
            <div class="card" style="border-radius: 2%;">
                <div class="row no-gutters">
                    <div class="col-md-4" style="background-color: #c21f37;">
                        <!-- <img src="assets/images/login.jpg" alt="login" class="login-card-img" > -->
                        <div class="card-body">
                            <div class="brand-wrapper">
                                <font color="white">
                                    <br>

                                    <h4>
                                        <b>Contacter l’ANRT pour :</b>
                                    </h4>
                                    <p>
                                    <ul>
                                        <li> Informer d’un changement d’opérateur, d’offre de service (débit contracté) vers un débit inférieur ou supérieur. </li>
                                        <li> Informer d’un changement du lieu d’installation de l’équipement de mesures. </li>
                                        <!-- <li> Informer d’un changement du lieu d’installation de l’équipement de mesures. </li> -->
                                        <li> Signaler des problèmes liés au fonctionnement de l’équipement de mesures. </li>
                                    </ul>
                                    </p>
                                    <br>
                                    <div class="row" dir="rtl" align="right">
                                        <p>
                                        <h4>
                                            <b> إتصل بالوكالة من أجل</b><span>:</span>
                                        </h4>
                                        </p>

                                        <p>
                                        <ul>
                                            <li> الإبلاغ عن تغيير المتعهد، عرض الخدمة (السرعة المتعاقد عليها) إلى سرعة أقل أو أعلى </li>
                                            <li> الإبلاغ عن تغيير مكان تركيب جهاز القياس </li>
                                            <li> الإبلاغ عن المشاكل المتعلقة بتشغيل الجهاز </li>
                                        </ul>

                                        </p>
                                        <br><br>

                                    </div>

                                    <div class="row justify-content-center">
                                        <nav class="login-card-footer-nav">
                                            <a href="https://anrt.ma/">
                                                <font color="white">© 2021 - Anrt.</font>
                                            </a>
                                            <a href="https://anrt.ma/">
                                                <font color="white"> Tous droits réservés </font>
                                            </a>
                                        </nav>
                                    </div>

                                </font>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-8">


                        <div class="container" style="margin-bottom: auto;margin-top:5%">
                            <!-- Content Header (Page header) -->

                            <section class="content-header">
                                <form method="post" class="validator-form" action="" id="form" enctype="multipart/form-data">

                                    <div class="card">
                                        <div class="card-body">
                                            <div class="container-fluid">
                                                <div class="row mb-2">
                                                    <div class="col-sm-12">
                                                        <h5>
                                                            <font color="#c21f37"> Contacter ANRT / ANRT تواصل مع </font>
                                                        </h5>
                                                        <br>

                                                        <!-- <div class="form-group row">
                                                            <div class="col-sm-12">
                                                                <b> <label for="objetCt"> Objet / الموضوع </label> </b>

                                                                <select class="form-control custom-select" name="objetCt" id="objetCt">
                                                                    <option selected value="Participation à la campagne"> Participation à la campagne / المشاركة في عملية القياس </option>
                                                                    <option value="Changement d’opérateur">Changement d’opérateur / تغيير المتعهد </option>
                                                                    <option value="Changement de débit">Changement de débit / تغيير الصبيب المتعاقد عليه</option>
                                                                    <option value="Problème technique"> Problème technique / مشاكل تقنية</option>
                                                                    <option value="Autres"> Autre sujet/ موضوع آخر</option>
                                                                </select>
                                                            </div>
                                                            <div class="col-sm-12">
                                                                <input type="text" class="form-control "  name="objetCt" id="objetCt">
                                                            </div>
                                                        </div> -->

                                                        <div class="form-group row">
                                                            <div class="col-sm-12">
                                                                <b> <label for="objetCt"> Message / الرسالة </label> </b>
                                                                <textarea class="form-control form-item" name="messageCt" id="messageCt" placeholder="Entrer votre message" rows="3" required></textarea>
                                                            </div>
                                                        </div>
                                                        <div class="float-right"><input type="submit" id="validateBtn" name="validateBtn" class="btn btn-danger" value="Envoyez"> </div>

                                                        <?php
                                                        //if(isset($_POST["validateBtn"])){
                                                        if (isset($_POST['validateBtn'])) {
                                                            // echo "salam coucou";

                                                            $nom_prenom =  $nomPar . " " . $prenomPar;
                                                            $numero = $NumPar;
                                                            $mebodyFr = "<h2> Formulaire de contact | Campagne d'évaluation de la QoS internet fixe </h2>";
//                                                            $object = strip_tags($_POST['objetCt']);
                                                            $object = '';
                                                            $message = strip_tags($_POST['messageCt']);


                                                            $mail = new PHPMailer();

                                                            //	$mail->SMTPDebug=3;
                                                            // $mail->IsSMTP();
                                                            // $mail->SMTPAuth = true;
                                                            // $mail->SMTPSecure = "ssl";
                                                            // $mail->Host = "mail.devappsolution.com";
                                                            // $mail->Host = "mail.anrt.ma";
                                                            //$mail->Host = "mail.ipage.com";
                                                            // $mail->Port = "25";
                                                            // $mail->IsHTML(true);
                                                            // $mail->CharSet = "UTF-8";
                                                            // $mail->Username = "adnan@devappsolution.com";
                                                            // $mail->Password = 'Demo123*';


                                                            $mail->IsSMTP();
                                                            $mail->Host = "mail.anrt.ma";
                                                            $mail->Port = "25";
                                                            $mail->IsHTML(true);
                                                            $mail->CharSet = "UTF-8";
                                                            $mail->SetFrom("noreply-qosfixe@anrt.ma", "ANRT");

                                                            $mail->AddAddress("qosfixe-support@anrt.ma", "ANRT");
                                                            $mail->AddAddress($emailPar, $nom_prenom);

                                                            $mail->Subject = "Espace du volontaire <" . $numero . ">: " . $object;
                                                            $mail->Body = "<b>Nom et prénom :</b>" . $nom_prenom . "<br>" . "<b> Adresse mail :</b>" . $emailPar . "<br>" . "<b> Objet :</b>" . $object . "<br>" . "<b> Message :</b>" . $message . "<br>";

                                                            $mail->SMTPOptions = array("ssl" => array(
                                                                "verify_peer" => false,
                                                                "verify_peer_name" => false,
                                                                "allow_self_signed" => false
                                                            ));

                                                            if (!$mail->Send()) {
                                                                // echo "<font color='red'>message non envoye réessayer plus tard</font>";
                                                                echo 'message non envoye réessayer plus tard';
                                                                // $errorMsg;
                                                            } else {
                                                                echo ("<script>location.href = 'contact_validate.php';</script>");
                                                                // exit();
                                                            }
                                                        }

                                                        ?>


                                                    </div>
                                                </div>
                                            </div><!-- /.container-fluid -->
                                        </div>
                                    </div>


                                    <br><br>
                                </form>
                            </section>

                        </div>
                    </div>
    </main>
</body>
<br>
<?php
//}
require_once 'includes/footer.php';
?>
<script>
    $(document).ready(function() {

        $('.validator-form').bootstrapValidator({

            // live: 'disabled',
            message: 'This value is not valid',
            feedbackIcons: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
                objetCt: {
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

                messageCt: {
                    validators: {
                        notEmpty: {
                            message: '<font color="red">Ce champ est requis</font>'
                        },
                        stringLength: {
                            min: 2,
                            max: 280,
                            message: '<font color="red">Ce champ doit comporter plus de 2 caractères et moins de 280 caractères</font>'
                        },
                    }
                },
            },
        });



        // Validate the form manually
        //   $('#validateBtn').click(function() {
        //      $('.validator-form').bootstrapValidator('validate');
        //    });

        // Reset the validation
        $('#resetBtn').click(function() {
            $('.validator-form').data('bootstrapValidator').resetForm(true);
            $('input[name=image]').val('');
        });


    });
</script>

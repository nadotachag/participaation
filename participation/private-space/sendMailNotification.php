<?php
    include ('../mailer/smtp/PHPMailerAutoload.php');
    include ('../includes/connection.php');
	include ('../includes/participation.php');
	$_PAR= new Participation();

    // Get Request from detail campagne
    include('../includes/detailcampagne.php');
    $_DCP = new DetailCampagne();

    include('../includes/campagne.php');
    $_COMP = new Campagne();

    $dataPar = $_PAR->getParticipationById($pid);
    $nomPar = $dataPar['nom_par'];
    $emailPar = $dataPar['adresse_email_par'];

    $getvalnumVolontaire = $dataPar['num_volontaire'];
    $dataDetailCampaign = $_DCP->getExistVolontaireById($getvalnumVolontaire);

    if ($dataDetailCampaign['etat_affecte_dcp']=='1') {
        $campaignId = $dataDetailCampaign['campagne_id'];
    }

    $dataCampaign = $_COMP->getCampagneById($campaignId);
    $campaignStartDate = $dataCampaign['campagn_date_debut'];
    $campaignEndDate = $dataCampaign['campagn_date_fin'];

    $mail = new PHPMailer();

    $mail->IsSMTP();
    $mail->Host = "mail.anrt.ma";
    $mail->Port = "25";
    $mail->IsHTML(true);
    $mail->CharSet = "UTF-8";
    $mail->SetFrom("noreply-qosfixe@anrt.ma", "ANRT");

    // $mail->AddAddress("qosfixe-support@anrt.ma", "ANRT");
    $mail->AddAddress($emailPar, $nom_prenom);

    $mail->SMTPOptions=array("ssl"=>array(
        "verify_peer"=>false,
        "verify_peer_name"=>false,
        "allow_self_signed"=>false
    ));

// $_REQUEST['1'] ==> Campaign is validated for volunteer
// $_REQUEST['2'] ==> Equipmet installed at the volunteer
// $_REQUEST['1'] ==> Campaign is validated for volunteer
// $_REQUEST['1'] ==> Campaign is validated for volunteer

if ($_REQUEST['code']=='1') {

    // $pid = $_REQUEST['1'];
    // echo "<h1>";
    // echo "envoi de mail de validation de compagne";
    // echo "</h1>";

        $mebodyFr = "<h2>Campagne d’évaluation de la qualité technique du service Internet fixe</font></h2> 
                    <br>L’ANRT vous informe que vous êtes inscrit dans une campagne de mesure prévue du".$campaignStartDate." au ".$campaignEndDate;
    // <br>En cas de besoin, veiller contacter l’ANRT en utilisant votre espace privé ";
        $mebodyAr ="<br> تخبركم الوكالة بأنكم مسجلون في حملة القياس المقررة من ".$campaignStartDate." إلى".$campaignEndDate;
        $liensend ="https://qosfixe.anrt.ma/espace-prive";

        $mail->Subject = "Inscription dans la campagne";
        $mail->Body =$mebodyFr."<br>".$mebodyAr."<br>";
        // $mail->Body =$mebodyFr."<br>".$mebodyAr."<br>".$liensend."<br>";

        if(!$mail->Send()) {
            echo $errorMsg;
            }
        else {
            echo "Message de confirmation d'inscription dans une campagne envoyé au destinataire <b>".$emailPar."</b>";
            exit();
            }

    }

    if ($_REQUEST['code']=='2') {

        // $pid = $_REQUEST['1'];
        // echo "<h1>";
        // echo "envoi de mail de validation de compagne";
        // echo "</h1>";

        $mebodyFr = "<h2>Campagne d’évaluation de la qualité technique du service Internet fixe</font></h2> 
                    <br>L’ANRT vous informe que vous l'équipement de mesure a été bien installé chez vous";
        // <br>En cas de besoin, veiller contacter l’ANRT en utilisant votre espace privé ";
        $mebodyAr ="<br> تخبركم الوكالة أنه قد تم تثبيت جهاز القياس الخاص بكم ";
        $liensend ="https://qosfixe.anrt.ma/espace-prive";

        $mail->Subject = "Installation de l'équipement de mesure";
        $mail->Body =$mebodyFr."<br>".$mebodyAr."<br>";
        // $mail->Body =$mebodyFr."<br>".$mebodyAr."<br>".$liensend."<br>";

        if(!$mail->Send()) {
            echo $errorMsg;
            }
        else {
            echo "Message de confirmation d'installation de l'équipement de mesure chez le volontaire <b>".$emailPar."</b>";
            exit();
            }

    }

    else echo '<br><br><br><center><span class="alert alert-danger" role="alert" p-1>un probleme est survenu ! svp revenez plus tard </span></center>';

  // End Send Email

?>

<?php

//  error_reporting(E_ALL);
//  ini_set("display_errors", 1);

$errorMsg = '';

session_start();

if (isset($_POST['email']) && filter_var($_POST['email'], FILTER_VALIDATE_EMAIL))
{
	// echo $_POST['email'] ;

	$email = strip_tags(trim(addcslashes($_POST['email'], "'")));

	// $email = filter_var ( $email, FILTER_SANITIZE_EMAIL);
	// $email = htmlspecialchars($email);

    // include('../mailer/smtp/PHPMailerAutoload.php');
    include('../mailer/smtp/PHPMailerAutoload.php');
	include ('../includes/connection.php');
	include ('../includes/participation.php');
	$_Par = new Participation();

	$connectedParticipant = $_Par->getParticipationEmail($email);

	//wrong email or password
	if (!$connectedParticipant){
		echo "<span class='messageError setMarginTop'><font color ='red'> Vous n'êtes pas encore enregistré </font></span><br>";
		exit();
	}

		if ($connectedParticipant['active_par'] == 1 && $connectedParticipant['code_par'] !== "")
		{

			$_SESSION['num_volontaire'] = $connectedParticipant['num_volontaire'];
			$idf = $_SESSION['num_volontaire'];
			$_SESSION['prenom_par'] = $connectedParticipant['prenom_par'];
			$_SESSION['nom_par'] = $connectedParticipant['nom_par'];
			$_SESSION['adresse_email_par'] = $connectedParticipant['adresse_email_par'];
			$_SESSION['code_par'] = $connectedParticipant['code_par'];
		//	$_SESSION['role_fon'] = $connectedParticipant['role_fon'];
		//	$_SESSION['adminSuper'] = $connectedParticipant['adminSuper'];
		//	$_SESSION['image_fon'] = $connectedParticipant['image_fon'];

		//	echo "Bienvenue votre code est :".$_SESSION['code_par'];
			$nom_prenom =  $connectedParticipant['nom_par']." ".$connectedParticipant['prenom_par'];
			$mebodyFr = "<h2> Votre code d'accès | Campagne d'evaluation de la QoS internet fixe </h2>" ;
			$emailFr = "<b> Votre email : </b>".$email ;
			$codeFr = "<b> Votre code : </b>".$_SESSION['code_par'] ;



			$mail = new PHPMailer();

			$mail->IsSMTP();
			$mail->Host = "mail.anrt.ma";
			$mail->Port = "25";
			$mail->IsHTML(true);
			$mail->CharSet = "UTF-8";
			$mail->SetFrom("noreply-qosfixe@anrt.ma", "ANRT");

			$mail->Subject = "Code d'accès";
			$mail->Body =$mebodyFr."<br>".$emailFr."<br>".$codeFr."<br>";

			$mail->AddAddress($email, $nom_prenom);
			$mail->SMTPOptions=array("ssl"=>array(
				"verify_peer"=>false,
				"verify_peer_name"=>false,
				"allow_self_signed"=>false
			));

			if(!$mail->Send()) {
				echo $errorMsg;
				} else {
				echo("<script>location.href = 'success.php';</script>");
				exit();
				}

		}
		else
			echo "<span class='messageError setMarginTop'><font color ='red'> votre adresse email n'a pas encore été validée </font></span>";
	}



else
	echo 'no';

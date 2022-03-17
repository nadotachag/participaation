<?php
// error_reporting(E_ALL);
// ini_set("display_errors", 1);

// session_destroy();
session_start();

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");

if (
	isset($_POST['email'])
	&&
	isset($_POST['passe'])
)
{
	// echo 'Step 1 ==> OK ';

	$email = strip_tags(trim(addcslashes($_POST['email'], "'")));
	//$passe = md5(md5(strip_tags(trim(addcslashes($_POST['passe'], "'")))));
	$passe = strip_tags(trim(addcslashes($_POST['passe'], "'")));

	include ('../includes/connection.php');
	include ('../includes/participation.php');
	$_Par = new Participation();

	$connectedParticipant = $_Par->getParticipationToConnect($email, $passe);

	//wrong email or password
	if ($connectedParticipant == null)
		echo '<span class="messageError setMarginTop"><font color ="red">E-mail ou code incorrect</font></span><br>';
	else
	{
		// echo '<br><h1>Step 2 ==> OK </h1>';
		if ($connectedParticipant['active_par'] == 1 )
		{

			$_SESSION['num_volontaire'] = $connectedParticipant['num_volontaire'];
			$idf = $_SESSION['num_volontaire'];
			$_SESSION['prenom_par'] = $connectedParticipant['prenom_par'];
			$_SESSION['nom_par'] = $connectedParticipant['nom_par'];
			$_SESSION['adresse_email_par'] = $connectedParticipant['adresse_email_par'];
		//	$_SESSION['role_fon'] = $connectedParticipant['role_fon'];
		//	$_SESSION['adminSuper'] = $connectedParticipant['adminSuper'];
		//	$_SESSION['image_fon'] = $connectedParticipant['image_fon'];

			echo 'Bienvenue';
		}
		else
			echo '<span class="messageError setMarginTop">Volontaire a été archivé</span>';
	}


}
else
	echo 'no';

?>

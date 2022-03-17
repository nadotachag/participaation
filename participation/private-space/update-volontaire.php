<?php
session_start();
include('authen.php');
require_once('./includes/header.php');
require_once './includes/navbar.php';

include('../includes/connection.php');
include('../includes/participation.php');
$_PAR = new Participation();
?>

<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> -->

<body>
    <h1>Update Volontaire</h1>

    <?php
    // Turn off error reporting
    //    error_reporting(E_ALL);
    //    ini_set("display_errors", 1);

    $tmp_file1 = $_FILES['image1']['tmp_name'];
    $filename1 = $_FILES['image1']['name'];

    if (isset($_POST['idf'])) {
        $idf = (int)$_POST['idf'];
    }

    $dataPar = $_PAR->getParticipationById($idf);

    if (empty($tmp_file1)) {
        $filename1 = $dataPar['piece_jointe_par'];
    } else {
        move_uploaded_file($tmp_file1, '../admin/uploadimages/' . $filename1);
    }

    // echo "step 1 => ok";
    if ($idf) {
        // echo "step 2 => ok";
        $prenomPar = strip_tags($_POST['prenomPar']);
        $nomPar = strip_tags($_POST['nomPar']);
        $telPar = strip_tags($_POST['telPar']);
        $operateurPar = strip_tags($_POST['operateurPar']);
        $villePar = strip_tags($_POST['villePar']);
        $cinPar = strip_tags($_POST['cinPar']);
        $typeaccesPar = strip_tags($_POST['typeaccesPar']);
        $offreservicePar = strip_tags($_POST['offreservicePar']);
        $numlignePar = strip_tags($_POST['numlignePar']);
        $typeclientPar = strip_tags($_POST['typeclientPar']);
        $emailPar = strip_tags($_POST['emailPar']);
        $quartierPar = strip_tags($_POST['quartierPar']);
        $adressePar = strip_tags($_POST['adressePar']);

        $checkThis = (int)$_PAR->editParticipationByIdprivatespace(
            $idf,
            $prenomPar,
            $nomPar,
            $telPar,
            $operateurPar,
            $villePar,
            $quartierPar,
            $typeaccesPar,
            $offreservicePar,
            $numlignePar,
            $adressePar,
            $typeclientPar,
            $emailPar,
            $filename1,
            $cinPar
        );
        // echo "step 3 => ok";
        // echo "resultat = " . $checkThis ;

        if ($checkThis > 0) {
            echo "<script type='text/javascript'>window.top.location='detail_volontaire.php';</script>";
            // header("Location : https://qosfixe.anrt.ma/private-space/detail_volontaire.php");
            exit();
        } else {
            // TODO
            // Error message for
            echo "<h1>Aucune modification !!</h1>";
            exit();
            header('Location: participation.php');
        }
    }
    ?>

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
require_once './includes/footer.php';
?>

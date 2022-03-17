<?php
include('authen.php');
//include ('../includes/connection.php');
$idf = $_SESSION['num_volontaire'];

// error_reporting(E_ALL);
// ini_set("display_errors", 1);

//$periodeID = intval($_GET['customer_id']);
// echo "idf est ". $idf;


$host = "localhost";
$dbUser = "dbadmin";
$password = "Demo123*";
$database = "qos-fixe";

$dbConn = new mysqli($host, $dbUser, $password, $database);

if ($dbConn->connect_error) {
  die("Database Connection Error, Error No.: " . $dbConn->connect_errno . " | " . $dbConn->connect_error);
}


if (isset($idf)) {

  $periodeID = intval($_GET['customer_id']);

  /*
	$stmt = $dbConn->prepare("select upload, download, latency, packet_loss, web_page_load_time, id_periode from kpi where id_periode = '".$periodeID."' and num_volontaire = '".$idf."'");
	$stmt->execute();
	//$stmt->fetch();

	//$qry = "select 	upload, download, latency, packet_loss, web_page_load_time, id_periode from kpi where id_periode = ".$periodeID;

	//$stmt = $dbConn->query($qry);
    //$fetchAllData = $stmt->fetch(MYSQLI_ASSOC);
  $fetchAllData = bindAll($stmt);
  */

  $sql = "select upload, download, Latency, score, id_periode from kpi where id_periode = '" . $periodeID . "' and num_volontaire = '" . $idf . "'";
  $result = $dbConn->query($sql);



  if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
?>

    <style>
      .kpi-text {
        color: #bf1c2f;

      }
    </style>
    <!--	<div class="card"> -->
    <div class="card-body my-0">
      <div class="form-row">

        <div class="form-group col-md-3">
          <div class="jumbotron jumbotron-fluid" style="background-color : #ededed;">
            <center>
              <div class="col mb-2">
                <strong>Débit moyen en réception</strong>
              </div>

              <svg xmlns="http://www.w3.org/2000/svg" width="4rem" height="4rem" fill="currentColor" class="bi bi-download" viewBox="0 0 16 16">
                <path d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z" />
                <path d="M7.646 11.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V1.5a.5.5 0 0 0-1 0v8.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3z" />
              </svg>
              <h3 class="kpi-text mt-2">
                <?php echo $row['download'] ?> MB/s
              </h3>
              <p>
                Max: 28 Mbps <br>
                Min: 16 Mbps
              </p>
            </center>
          </div>
        </div>

        <div class="form-group col-md-3">
          <div class="jumbotron jumbotron-fluid" style="background-color : #ededed;">
            <!-- <div class="container"> -->
            <center>
              <div class="col mb-2">
                <strong>Débit moyen en envoi</strong>
              </div>
              <svg xmlns="http://www.w3.org/2000/svg" width="4rem" height="4rem" fill="currentColor" class="bi bi-upload" viewBox="0 0 16 16">
                <path d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z" />
                <path d="M7.646 1.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1-.708.708L8.5 2.707V11.5a.5.5 0 0 1-1 0V2.707L5.354 4.854a.5.5 0 1 1-.708-.708l3-3z" />
              </svg>
              <h3 class="kpi-text mt-2">
                <?php echo $row['upload'] ?> MB/s
              </h3>
              <p>
                Max: 13 Mbps <br>
                Min: 5 Mbps
              </p>
              <!--  text small : Max: 28 Mbps -->
              <!-- Min: 19 Mbps -->

            </center>
            <!-- </div> -->
          </div>
        </div>

        <div class="form-group col-md-3">
          <div class="jumbotron jumbotron-fluid" style="background-color : #ededed;">
            <!-- <div class="container"> -->
            <center>
              <div class="col mb-2">
                <strong>Délai moyen de Latence</strong>
              </div>

              <svg xmlns="http://www.w3.org/2000/svg" width="4rem" height="4rem" fill="currentColor" class="bi bi-hourglass-split" viewBox="0 0 16 16">
                <path d="M2.5 15a.5.5 0 1 1 0-1h1v-1a4.5 4.5 0 0 1 2.557-4.06c.29-.139.443-.377.443-.59v-.7c0-.213-.154-.451-.443-.59A4.5 4.5 0 0 1 3.5 3V2h-1a.5.5 0 0 1 0-1h11a.5.5 0 0 1 0 1h-1v1a4.5 4.5 0 0 1-2.557 4.06c-.29.139-.443.377-.443.59v.7c0 .213.154.451.443.59A4.5 4.5 0 0 1 12.5 13v1h1a.5.5 0 0 1 0 1h-11zm2-13v1c0 .537.12 1.045.337 1.5h6.326c.216-.455.337-.963.337-1.5V2h-7zm3 6.35c0 .701-.478 1.236-1.011 1.492A3.5 3.5 0 0 0 4.5 13s.866-1.299 3-1.48V8.35zm1 0v3.17c2.134.181 3 1.48 3 1.48a3.5 3.5 0 0 0-1.989-3.158C8.978 9.586 8.5 9.052 8.5 8.351z" />
              </svg>

              <h3 class="kpi-text mt-2">
                <?php echo $row['Latency'] ?> ms
              </h3>
              <p>
                Max: 8 ms <br>
                Min: 2 ms
              </p>
              <!--  text small : Max: 28 Mbps -->
              <!-- Min: 19 Mbps -->

            </center>
            <!-- </div> -->
          </div>
        </div>

        <div class="form-group col-md-3">
          <div class="jumbotron jumbotron-fluid" style="background-color : #ededed;">
            <!-- <div class="container"> -->
            <center>
              <div class="col mb-2">
                <strong>Indice de performance</strong>
              </div>

              <svg xmlns="http://www.w3.org/2000/svg" width="4rem" height="4rem" fill="currentColor" class="bi bi-speedometer" viewBox="0 0 16 16">
                <path d="M8 2a.5.5 0 0 1 .5.5V4a.5.5 0 0 1-1 0V2.5A.5.5 0 0 1 8 2zM3.732 3.732a.5.5 0 0 1 .707 0l.915.914a.5.5 0 1 1-.708.708l-.914-.915a.5.5 0 0 1 0-.707zM2 8a.5.5 0 0 1 .5-.5h1.586a.5.5 0 0 1 0 1H2.5A.5.5 0 0 1 2 8zm9.5 0a.5.5 0 0 1 .5-.5h1.5a.5.5 0 0 1 0 1H12a.5.5 0 0 1-.5-.5zm.754-4.246a.389.389 0 0 0-.527-.02L7.547 7.31A.91.91 0 1 0 8.85 8.569l3.434-4.297a.389.389 0 0 0-.029-.518z" />
                <path fill-rule="evenodd" d="M6.664 15.889A8 8 0 1 1 9.336.11a8 8 0 0 1-2.672 15.78zm-4.665-4.283A11.945 11.945 0 0 1 8 10c2.186 0 4.236.585 6.001 1.606a7 7 0 1 0-12.002 0z" />
              </svg>

              <h3 class="kpi-text mt-2">
                <?php echo $row['score'] ?> %
              </h3>
              <p>
                <br>
                <br>

              </p>

            </center>
            <!-- </div> -->
          </div>
        </div>

      </div>
    </div>

<?php
    $result->close();
    $dbConn->close();
  }
}
?>

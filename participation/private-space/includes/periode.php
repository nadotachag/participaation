<?php
//   error_reporting(E_ALL);
//     ini_set("display_errors", 1);
class Periode extends Connection{
	public function getExistPeriode($idf)
	{
		// get connection
		parent::beConnected();
		global $pdo;
		$stmt = $pdo->prepare("select * from kpi where num_volontaire = '".$idf."' ORDER BY id_periode ASC ");
		$stmt->execute();
		return $stmt->fetchAll(PDO::FETCH_ASSOC);
	}

	public function getPeriodParticipant($idf)
	{
		// get connection
		parent::beConnected();
		global $pdo;
		$stmt = $pdo->prepare("select id_periode from kpi where num_volontaire = '".$idf."' ORDER BY id_periode ASC ");
		$stmt->execute();
		return $stmt->fetchAll(PDO::FETCH_ASSOC);
	}

	public function getStartDate($periodId)
	{
		// get connection
		parent::beConnected();
		global $pdo;
		$stmt = $pdo->prepare("select date_fin from kpi_periode where id_periode = '".$periodId."' ");
		$stmt->execute();
		return $stmt->fetch()[0];
	}

	public function getEndDate($periodId)
	{
		// get connection
		parent::beConnected();
		global $pdo;
		$stmt = $pdo->prepare("select date_fin from kpi_periode where id_periode = '".$periodId."' ");
		$stmt->execute();
		return $stmt->fetch()[0];
	}

}	
?>
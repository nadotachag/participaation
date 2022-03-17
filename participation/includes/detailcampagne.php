<?php

class DetailCampagne extends Connection{
	
	// get one admin login
	public function getFonctionnaireToConnect($email, $pass)
	{
		// get connection
		parent::beConnected();
		global $pdo;

		$stmt = $pdo->prepare("SELECT * FROM `fonctionnaire` WHERE email_fon = '".$email."' AND password_fon = '".$pass."'");
		$stmt->execute();

		return $stmt->fetch();
	}

	public function addDetailCampagne
	(
		$idf,
		$insid
	)
	{
			// get connection
			parent::beConnected();
			global $pdo;
			
			$st = $pdo->prepare("INSERT into detail_campagne (campagne_id, num_volontaire ) VALUES (:campagne_id, :num_volontaire)");
            $st->bindParam(':campagne_id', $idf, PDO::PARAM_INT);
            $st->bindParam(':num_volontaire', $insid, PDO::PARAM_INT);
            $affected = $st->execute();

			if ($affected > 0)
				return true;
			else
				return false;
	}
	
	
	
		public function addDetailCampagneTest ( $idf,$insid)
	{
		// get connection
		parent::beConnected();
		global $pdo;
 
         // Use prepared statements to guard against SQL injection.
        $sql = "INSERT INTO detail_campagne (campagne_id, num_volontaire) VALUES (:idf, :insid)";
        
        try {
            $statement = $pdo->prepare($sql);
            $statement->bindParam('idf', $idf);
            $statement->bindParam('insid', $insid);
        
            $res = $statement->execute();
        } catch (PDOException $e) {
            throw new RuntimeException(
                "Could not insert vote into database. The PDO exception was " .
                $e->getMessage(),
                $e->getCode(),
                $e
            );
        }
	}
	


		public function getExistVolontaire($idf, $insid)
	{
		// get connection
		parent::beConnected();
		global $pdo;

		$stmt = $pdo->prepare("SELECT * FROM `detail_campagne` WHERE campagne_id = '".$idf."' AND num_volontaire = '".$insid."'");
		$stmt->execute();

		return $stmt->fetch();
	}
	
			public function getExistVolontaireById($insid)
	{
		// get connection
		parent::beConnected();
		global $pdo;

		$stmt = $pdo->prepare("SELECT * FROM `detail_campagne` WHERE num_volontaire = '".$insid."'");
		$stmt->execute();

		return $stmt->fetch();
	
		// if (count($result)>0){
		// 	return $result;
		// }
		// else {
		// 	return null;
		// }
	}
	

	public function getExistVolontaireInCampagne($insid)
	{
		// get connection
		parent::beConnected();
		global $pdo;

		$stmt = $pdo->prepare("SELECT `campagne_id` FROM `detail_campagne` WHERE num_volontaire = '".$insid."'");
		$stmt->execute();

		$result=$stmt->fetch();
		
		if (isset($result)){
			return $result;
		}
		else {
			return -1;
		}
	}

	// getCampaignStatus

	
	    public function getRequestVolontaireId($insid)
	{
		// get connection
		parent::beConnected();
		global $pdo;

		$stmt = $pdo->prepare("select num_sonde_par, campagne.campagne_id, etat_sond_installation_par, campagne_date_debut, campagne_date_fin from participation, detail_campagne, campagne WHERE participation.num_volontaire = detail_campagne.num_volontaire AND detail_campagne.campagne_id = campagne.campagne_id AND participation.num_volontaire = '".$insid."'");
		$stmt->execute();

		return $stmt->fetch();
	}
	
		public function deleteVolCpgById($idf, $insid)
	{
		// get connection
		parent::beConnected();
		global $pdo;

		$stmt = $pdo->prepare("DELETE FROM detail_campagne WHERE campagne_id = ".$idf." and num_volontaire = ".$insid."");
		$stmt->execute();
		return $stmt->rowCount();
	}   
	


	public function getVolontaireCpgById($idCpg)
	{
		// get connection
		parent::beConnected();
		global $pdo;

		$stmt = $pdo->prepare("select * from participation where num_volontaire in (select num_volontaire from detail_campagne where campagne_id = '".$idCpg."')");
		$stmt->execute();

		return $stmt->fetchAll();
	}
	
	public function countVolontaireCpgById($idCpg)
	{
		// get connection
		parent::beConnected();
		global $pdo;

		$stmt = $pdo->prepare("select count(*) from participation where num_volontaire in (select num_volontaire from detail_campagne where campagne_id = '".$idCpg."')");
		$stmt->execute();

		return $stmt->fetchColumn();
	}


	// my functions
	public function startCampagne
	(
		$idc
	)
	{
		// get connection
		// UPDATE `qos-fixe`.`campagne` SET `campagne_start` = '1' WHERE (`campagne_id` = '2');
		parent::beConnected();
		global $pdo;
 
         // Use prepared statements to guard against SQL injection.
        $sql = "UPDATE campagne SET campagne_start = '1' WHERE `campagne_id`='".$idc."'";
        
        try {
            $statement = $pdo->prepare($sql);
            $statement->bindParam('idc', $idc);
        
            $res = $statement->execute();
			echo $res;
        } catch (PDOException $e) {
            throw new RuntimeException(
                "Could not update campaign status into database. The PDO exception was " .
                $e->getMessage(),
                $e->getCode(),
                $e
            );
        }
	}

	public function getCampaignStatus($idc)
	{
		// get connection
		parent::beConnected();
		global $pdo;

		$stmt = $pdo->prepare("SELECT campagne_start FROM campagne WHERE campagne_id = '".$idc."'");
		$stmt->execute();

		$result=$stmt->fetch();
		
		if (isset($result[0])){
			return $result[0];
		}
		else {
			return -1;
		}
	}
	
	
	
}

?>
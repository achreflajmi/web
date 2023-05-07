<?php
include_once '../../config4.php';
include_once '../../Model/formulaire.php';
class formulaireC
{
	
	public function listformulaireC()
	{
		$sql = "SELECT * FROM `events`.`formulaire` order by nomEvent ASC";
		$pdo = config4::getConnexion();
		try {
			$liste = $pdo->query($sql);
			return $liste;
		} catch (Exception $e) {
			die('Error:' . $e->getMessage());
		}
	}
	function afficherformulaire()
	{
		$sql = "SELECT * FROM `events`.`formulaire`";
		$pdo = config4::getConnexion();
		try {
			$liste = $pdo->query($sql);
			return $liste;
		} catch (Exception $e) {
			die('Erreur:' . $e->getMessage());
		}
	}



	function supprimerformulaire($id)
	{
		$sql = "DELETE FROM `events`.`formulaire` WHERE id=:id";
		$pdo = config4::getConnexion();
		$req = $pdo->prepare($sql);
		$req->bindValue(':id', $id);
		try {
			$req->execute();
		} catch (Exception $e) {
			die('Erreur:' . $e->getMessage());
		}
	}
	function ajouterformulaire($formulaire)
	{
		$sql = "INSERT INTO `events`.`formulaire` (host,nomEvent,date_d,date_f,lieu,categorie,programmation,description,affiche,numTel,email,prix)
			VALUES (:host, :nomEvent, :date_d, :date_f, :lieu, :categorie,:programmation, :description,  :affiche, :numTel, :email, :prix)";
		$pdo = config4::getConnexion();
		try {
			$query = $pdo->prepare($sql);
			$query->execute([
				'host' => $formulaire->gethost(),
				'nomEvent' => $formulaire->getnomEvent(),
				'date_d' => $formulaire->getdate_d(),
				'date_f' => $formulaire->getdate_f(),
				'lieu' => $formulaire->getlieu(),
				'categorie' => $formulaire->getcategorie(),
				'programmation' => $formulaire->getprogrammation(),
				'description' => $formulaire->getdescription(),
				'affiche' => $formulaire->getaffiche(),
				'numTel' => $formulaire->getnumTel(),
				'email' => $formulaire->getemail(),
				'prix' => $formulaire->getprix()
			]);
			
		} catch (PDOException $e) {
			echo $e->getMessage();
		}
	}
	function Addform($formulaire)
    {
		$sql = "INSERT INTO `events`.`formulaire` (host,nomEvent,date_d,date_f,lieu,categorie,programmation,description,affiche,numTel,email,prix)
		VALUES (:host, :nomEvent, :date_d, :date_f, :lieu, :categorie,:programmation, :description,  :affiche, :numTel, :email, :prix)";
             
        $pdo = config4::getConnexion();
        try {
			$query = $pdo->prepare($sql);
			$query->execute([
				'host' => $formulaire->gethost(),
				'nomEvent' => $formulaire->getnomEvent(),
				'date_d' => $formulaire->getdate_d(),
				'date_f' => $formulaire->getdate_f(),
				'lieu' => $formulaire->getlieu(),
				'categorie' => $formulaire->getcategorie(),
				'programmation' => $formulaire->getprogrammation(),
				'description' => $formulaire->getdescription(),
				'affiche' => $formulaire->getaffiche(),
				'numTel' => $formulaire->getnumTel(),
				'email' => $formulaire->getemail(),
				'prix' => $formulaire->getprix()
            ]);

    
            // Retrieve the ID of the newly added user
             $formulaire_id = $pdo->lastInsertId();
			 $ap= $formulaire->getprix();//ancien prix
			 $np=$ap*1.2;

            // Add a corresponding row in the 'formulaire' table with default role and the user ID as foreign key
            $sql_admin = "INSERT INTO price (formulaire_id,nvPrix) VALUES (:formulaire_id,$np)";
            $query_admin = $pdo->prepare($sql_admin);
            $query_admin->execute(['formulaire_id' => $formulaire_id]);
    
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

	function recupererformulaire($id)
	{
		$sql = "SELECT * from `events`.`formulaire` where id=$id";
		$pdo = config4::getConnexion();
		try {
			$query = $pdo->prepare($sql);
			$query->execute();

			$formulaire = $query->fetch();
			return $formulaire;
		} catch (Exception $e) {
			die('Erreur: ' . $e->getMessage());
		}
	}

	function modifierformulaire($formulaire, $id)
	{
		try {
			$pdo = config4::getConnexion();
			$query = $pdo->prepare(
				'UPDATE `events`.`formulaire` SET
						host= :host, 
						nomEvent= :nomEvent,
						date_d= :date_d,
						date_f= :date_f,
						lieu= :lieu,
						categorie= :categorie,
						programmation= :programmation,
						description= :description,
						affiche= :affiche,
						numTel= :numTel,
						email= :email,
						prix= :prix
					WHERE id= :id'
			);
			$query->execute([
				'host' => $formulaire->gethost(),
				'nomEvent' => $formulaire->getnomEvent(),
				'date_d' => $formulaire->getdate_d(),
				'date_f' => $formulaire->getdate_f(),
				'lieu' => $formulaire->getlieu(),
				'categorie' => $formulaire->getcategorie(),
				'programmation' => $formulaire->getprogrammation(),
				'description' => $formulaire->getdescription(),
				'affiche' => $formulaire->getaffiche(),
				'numTel' => $formulaire->getnumTel(),
				'email' => $formulaire->getemail(),
				'prix' => $formulaire->getprix(),
				'id' => $id
			]);
			echo $query->rowCount() . " records UPDATED successfully <br>";
		} catch (PDOException $e) {
			$e->getMessage();
		}
	}
	
	
}


?>
	
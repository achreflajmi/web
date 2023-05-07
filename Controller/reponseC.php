<?php
include '../../config2.php';

include_once '../../Model/reponse.php';
class reponseC
{
	function afficherreponses()
	{
		$db = config2::getConnexion();
		$stmt = $db->prepare("SELECT * FROM reponse");
		$stmt->execute();
		$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
		return $result;
	}
	function afficherreponseuser($id_rec)
	{
		$db = config2::getConnexion();
		$stmt = $db->prepare("SELECT * FROM reponse WHERE id_reclamation = :id_rec");
		$stmt->bindValue(':id_rec', $id_rec);
		$stmt->execute();
		$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
		return $result;
	}



	function supprimerreponse($id)
	{
		$sql = "DELETE FROM reponse WHERE id=:id";
		$db = config2::getConnexion();
		$req = $db->prepare($sql);
		$req->bindValue(':id', $id);
		try {
			$req->execute();
		} catch (Exception $e) {
			die('Erreur:' . $e->getMessage());
		}
	}
	function ajouterreponse($reponse)
	{
		$sql = "INSERT INTO reponse (id,texte,id_reclamation) 
            VALUES (:id,:texte,:id_reclamation)";
		$db = config2::getConnexion();
		try {
			$query = $db->prepare($sql);
			$query->execute([
				'id' => $reponse->getid(),
				'texte' => $reponse->gettexte(),
				'id_reclamation' => $reponse->getid_reclamation(),


			]);
		} catch (Exception $e) {
			echo 'Erreur: ' . $e->getMessage();
		}
	}
	function recupererreponse($id)
	{
		$sql = "SELECT * from reponse where id=$id";
		$db = config2::getConnexion();
		try {
			$query = $db->prepare($sql);
			$query->execute();

			$reponse = $query->fetch();
			return $reponse;
		} catch (Exception $e) {
			die('Erreur: ' . $e->getMessage());
		}
	}

	function modifierreponse($reponse)
	{
		$config2 = config2::getConnexion();
		try {
			$querry = $config2->prepare('
                UPDATE reponse SET
                texte=:texte 
                where id=:id
                ');
			$querry->execute([
				'id' => $reponse->getid(),
				'texte' => $reponse->gettexte(),

			]);
		} catch (PDOException $th) {
			$th->getMessage();
		}
	}

}
?>
<?php
    include '../config2.php';
	include_once '../Model/Price.php';
	class priceC {

		public function listPriceC()
		{
			$sql = "SELECT * FROM `events`.`price` order by nvPrix ASC";
			$db = config::getConnexion();
			try {
				$liste = $db->query($sql);
				return $liste;
			} catch (Exception $e) {
				die('Error:' . $e->getMessage());
			}
		}
		function afficherprice(){
			$sql="SELECT * FROM `events`.`price`";
			$db = config2::getConnexion();
			try{
				$liste = $db->query($sql);
				return $liste;
			}
			catch(Exception $e){
				die('Erreur:'. $e->getMessage());
			}
		}

		function ajouterprice($price){
			$db = config2::getConnexion();
			// Get the original price of the formulaire using a JOIN query
			$query = $db->prepare("SELECT f.prix FROM `events`.`formulaire` f
								   INNER JOIN `events`.`price` p ON f.id = p.formulaire_id
								   WHERE f.id = :formulaire_id");
			$query->execute(['formulaire_id' => $price->getformulaire_id()]);
			$result = $query->fetch(PDO::FETCH_ASSOC);
			$originalPrice = $result['prix'];
		
			// Calculate the new price with the 20% increase
			$newPrice = $originalPrice * 1.2;
		
			// Insert the new price into the price table
			$sql = "INSERT INTO `events`.`price` (id,nvPrix,formulaire_id)
					VALUES (:id, :nvPrix, :formulaire_id)";
			try{
				$query = $db->prepare($sql);
				$query->execute([
					'id' => $price->getid(),
					'nvPrix' => $newPrice,
					'formulaire_id' => $price->getformulaire_id(),
				]);			
			} catch(PDOException $e) {
				echo $e->getMessage();
			}
		}
		
			
			
		
		function recupererprice($id){
			$sql="SELECT * from `events`.`price` where id=$id";
			$db = config2::getConnexion();
			try{
				$query=$db->prepare($sql);
				$query->execute();

				$price=$query->fetch();
				return $price;
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}
		}
		
		function modifierprice($price, $id){
			try {
				$db = config2::getConnexion();
				$query = $db->prepare(
					'UPDATE `events`.`price` SET
						nvPrix= :nvPrix, 
						formulaire_id= :formulaire_id,
						
					WHERE id= :id'
				);
				$query->execute([
					'nvPrix' => $price->getnvPrix(),
					'formulaire_id' => $price->getformulaire_id(),
					'id' => $id
				]);
				echo $query->rowCount() . " records UPDATED successfully <br>";
			} catch (PDOException $e) {
				$e->getMessage();
			}
		}



// Create function
function create_price($nvPrix, $formulaire_id,$pdo) {
  // SQL statement to insert new record
  $sql = "INSERT INTO `events`.`price` (nvPrix, formulaire_id) VALUES (:nvPrix, :formulaire_id)";
  
  // Prepare and execute the statement with values passed in as parameters
  $stmt = $pdo->prepare($sql);
  $stmt->execute([$nvPrix, $formulaire_id]);
  
  // Return the ID of the newly inserted record
  return $pdo->lastInsertId();
}

// Read function
function get_price($id,$pdo) {
  // SQL statement to select record by ID
  $sql = "SELECT * FROM `events`.`price` WHERE id = $id";
  
  // Prepare and execute the statement with ID passed in as parameter
  $stmt = $pdo->prepare($sql);
  $stmt->execute([$id]);
  
  // Return the selected record
  return $stmt->fetch();
}

// Update function
function update_price($id, $nvPrix, $formulaire_id,$pdo) {
  // SQL statement to update record
  $sql = "UPDATE `events`.`price` SET nvPrix = :nvPrix, formulaire_id = :formulaire_id WHERE id = $id";
  
  // Prepare and execute the statement with values passed in as parameters
  $stmt = $pdo->prepare($sql);
  $stmt->execute([$nvPrix, $formulaire_id, $id]);
  
  // Return the number of affected rows
  return $stmt->rowCount();
}

// Delete function
function delete_price($id,$pdo) {
  // SQL statement to delete record
  $sql = "DELETE FROM `events`.`price` WHERE id = $id";
  
  // Prepare and execute the statement with ID passed in as parameter
  $stmt = $pdo->prepare($sql);
  $stmt->execute([$id]);
  
  // Return the number of affected rows
  return $stmt->rowCount();
}

//Function to get the new price with 20% added

function get_new_price($id,$pdo) {
  // SQL statement to select record by ID
  $sql = "SELECT * FROM `events`.`formulaire` WHERE id = $id";
  
  // Prepare and execute the statement with ID passed in as parameter
  $stmt = $pdo->prepare($sql);
  $stmt->execute([$id]);
  
  // Get the original price
  $row = $stmt->fetch();
  $prix = $row['prix'];
  
  // Calculate the new price with 20% added
  $new_prix = $prix * 1.2;
  
  // Update the "prix" column in the "formulaire" table
  $sql = "UPDATE `events`.`formulaire` SET prix = :new_Price WHERE id = :formulaire_id";
  $stmt = $pdo->prepare($sql);
  $stmt->execute([$new_prix, $id]);
  
  // Update the "nvPrix" column in the "price" table
  $sql = "INSERT INTO `events`.`price` (nvPrix, formulaire_id) VALUES (:nvPrix, :formulaire_id)";;
  $stmt = $pdo->prepare($sql);
  $stmt->execute([$new_prix, $id]);
  
  // Return the new price
  return $new_prix;
}
// function get_new_price($id, $pdo) {
//     // Prepare and execute the SQL query to retrieve the form and price data
//     $stmt = $pdo->prepare("
//         SELECT f.*, p.nvPrix
//         FROM formulaire f
//         JOIN price p ON f.id = p.formulaire_id
//         WHERE p.id = :id
//     ");
//     $stmt->execute(['id' => $id]);

//     // Fetch the form and price data
//     $data = $stmt->fetch(PDO::FETCH_ASSOC);

//     // Calculate the new price
//     $new_price = $data['prix'] * 1.2;

//     return $new_price;
// }

	}
?>
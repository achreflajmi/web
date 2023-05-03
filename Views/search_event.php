<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="back/dist/styles.css">
    <link rel="stylesheet" href="back/dist/all.css">
    <title>REVERSO DASHBOARD</title>
    </head>
<body>

<div class="flex flex-col">
                    <div class="flex flex-1  flex-col md:flex-row lg:flex-row mx-2">
                    </div>
                    <div class="flex flex-1  flex-col md:flex-row lg:flex-row mx-2">
                        <div class="mb-2 border-solid border-gray-300 rounded border shadow-sm w-full">
                            <div class="p-3">
                                <table class="table-responsive w-full rounded">
                                <thead>
				<th class="border w-1/6 px-4 py-2">id</th>
				<th class="border w-1/6 px-4 py-2">host</th>
				<th class="border w-1/6 px-4 py-2">nomEvent</th>
				<th class="border w-1/6 px-4 py-2">date_d</th>
                <th class="border w-1/6 px-4 py-2">date_f</th>
                <th class="border w-1/6 px-4 py-2">lieu</th>
                <th class="border w-1/6 px-4 py-2">categorie</th>
                <th class="border w-1/6 px-4 py-2">programmation</th>
                <th class="border w-1/6 px-4 py-2">description</th>
                <th class="border w-1/6 px-4 py-2">affiche</th>
                <th class="border w-1/6 px-4 py-2">numTel</th>
                <th class="border w-1/6 px-4 py-2">email</th>
                <th class="border w-1/6 px-4 py-2">prix</th>
            	<th>Modifier</th>
				<th>Supprimer</th>
        </thead>
</body>
</html>
<?php
include '../config.php';
if(isset($_POST['query'])){

    $search = $_POST['query'];
    $db = config::getConnexion();

    $sql = "SELECT * FROM formulaire WHERE nomEvent LIKE '%$search%' OR id LIKE '%$search%'";
    $listeformulaires = $db->query($sql);
    if ($listeformulaires->rowCount() > 0) {

        foreach($listeformulaires as $formulaire){
            // Display the search results as you did before
            ?>
<tr>
				<td class="border w-1/6 px-4 py-2"> <?php echo $formulaire['id']; ?></td>
				<td class="border w-1/6 px-4 py-2"><?php echo $formulaire['host']; ?></td>
				<td class="border w-1/6 px-4 py-2"><?php echo $formulaire['nomEvent']; ?></td>
				<td class="border w-1/6 px-4 py-2"><?php echo $formulaire['date_d']; ?></td>
                <td class="border w-1/6 px-4 py-2"><?php echo $formulaire['date_f']; ?></td>
                <td class="border w-1/6 px-4 py-2"><?php echo $formulaire['lieu']; ?></td>
                <td class="border w-1/6 px-4 py-2"><?php echo $formulaire['categorie']; ?></td>
                <td class="border w-1/6 px-4 py-2"><?php echo $formulaire['programmation']; ?></td>
                <td class="border w-1/6 px-4 py-2"><?php echo $formulaire['description']; ?></td>
                <td class="border w-1/6 px-4 py-2"><?php echo $formulaire['affiche']; ?></td>
                <td class="border w-1/6 px-4 py-2"><?php echo $formulaire['numTel']; ?></td>
                <td class="border w-1/6 px-4 py-2"><?php echo $formulaire['email']; ?></td>
                <td class="border w-1/6 px-4 py-2"><?php echo $formulaire['prix']; ?></td>
				<td>
					<form method="POST" action="modifierformulaire.php">
						<input type="submit" name="Modifier" value="Modifier">
						<input type="hidden" value=<?PHP echo $formulaire['id']; ?> name="id">
					</form>
				</td>
				<td>
					<a href="supprimerformulaire.php?id=<?php echo $formulaire['id']; ?>">Supprimer</a>
				</td>
        </tr>
            <?php
        }
    }else{
        echo '<p class="empty">No products found!</p>';
    }
}
?>
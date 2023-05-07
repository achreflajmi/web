<?php
include_once '../../Model/Adherent.php';
include_once '../../Controller/AdherentC.php';






$adherentC = new AdherentC();

$createArchiveTableQuery = "CREATE TABLE IF NOT EXISTS archive LIKE reclamation";
$moveToArchiveQuery = "INSERT INTO archive SELECT * FROM reclamation WHERE id = :id";
$deleteFromOriginalQuery = "DELETE FROM reclamation WHERE id = :id";

// Check if the archive input was clicked
if (isset($_POST['archive'])) {
    // Loop through all the rows in the original table
    $selectAllQuery = "SELECT * FROM mytable";
    $stmt = $pdo->query($selectAllQuery);
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        // If the "archive" checkbox is checked for this row, move it to the archive table
        if (isset($_POST['archive'][$row['id']])) {
            $moveStmt = $pdo->prepare($moveToArchiveQuery);
            $moveStmt->execute(array(':id' => $row['id']));
            $deleteStmt = $pdo->prepare($deleteFromOriginalQuery);
            $deleteStmt->execute(array(':id' => $row['id']));
        }
    }
    // Create the archive table if it doesn't exist yet
    $createStmt = $pdo->prepare($createArchiveTableQuery);
    $createStmt->execute();
}

if (isset($_POST['id']) && isset($_POST['nom']) && isset($_POST['description']) && isset($_POST['email'])) {
    echo $_POST['id'];
    $reclamation = new reclamation($_POST['id'], $_POST['nom'], $_POST['description'], $_POST['email']);
    $adherentC->modifieradherent($reclamation);
    header('Location:gestionreclamation.php');
} else {
    $error = "Missing information";
}





?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Display</title>
</head>

<body>
    <button><a href="afficherListeAdherents.php">Retour à la liste des reclamations</a></button>
    <hr>

    <div id="error">
        <?php echo $error; ?>
    </div>

    <?php
    if (isset($_POST['id'])) {
        $reclamation = $adherentC->recupereradherent($_POST['id']);

        ?>

        <form action="" method="POST">
            <table border="1" align="center">
                <tr>
                    <td>
                        <label for="id"> id:
                        </label>
                    </td>
                    <td><input type="text" name="id" id="id" value="<?php echo $reclamation['id']; ?>" maxlength="20"></td>
                </tr>
                <tr>
                    <td>
                        <label for="nom">Nom:
                        </label>
                    </td>
                    <td><input type="text" name="nom" id="nom" value="<?php echo $reclamation['nom']; ?>" maxlength="20">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="description">description:
                        </label>
                    </td>
                    <td><input type="text" name="description" id="description"
                            value="<?php echo $reclamation['description']; ?>" maxlength="20"></td>
                </tr>
                <tr>
                    <td>
                        <label for="email">email:
                        </label>
                    </td>
                    <td>
                        <input type="text" name="email" value="<?php echo $reclamation['email']; ?>" id="email">
                    </td>
                </tr>
                <div class="mb-3">
                    <label for="example-select" class="form-label">Type</label>

                </div>
                <tr>
                    <td></td>
                    <td>
                        <input type="submit" value="Modifier">
                    </td>
                    <td>
                        <input type="reset" value="Annuler">
                    </td>
                </tr>
            </table>
        </form>
        <?php
    }
    ?>
</body>

</html>
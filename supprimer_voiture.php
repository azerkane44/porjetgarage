<?php
// Connexion à la base de données
$servername = "localhost";
$username = "root";
$password = "root1234";
$dbname = "espaceadmin";

$conn = new mysqli($servername, $username, $password, $dbname);

// Vérifie la connexion
if ($conn->connect_error) {
    die("Connexion échouée : " . $conn->connect_error);
}

// Si le formulaire est soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Vérifie si des voitures ont été sélectionnées pour la suppression
    if (isset($_POST['voitures'])) {
        // Récupère les ID des voitures sélectionnées
        $voituresIds = $_POST['voitures'];

        // Prépare la requête de suppression
        $sql = "DELETE FROM cars WHERE id IN (" . implode(",", $voituresIds) . ")";

        // Exécute la requête de suppression
        if ($conn->query($sql) === TRUE) {
            echo "Voitures supprimées avec succès.";
        } else {
            echo "Erreur lors de la suppression des voitures : " . $conn->error;
        }
    } else {
        echo "Aucune voiture sélectionnée pour la suppression.";
    }
}

// Récupère les données des voitures depuis la base de données
$sql = "SELECT * FROM cars";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="form.css">
    <title>Supprimer des voitures</title>
</head>

<body>
    <h1>Supprimer des voitures</h1>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo '<input type="checkbox" name="voitures[]" value="' . $row["id"] . '"> ';
                echo $row["marque"] . ' ' . $row["modele"] . '<br>';
            }
            echo '<br>';
            echo '<input type="submit" value="Supprimer">';
        } else {
            echo "0 résultats";
        }
        ?>
    </form>
</body>

</html>

<?php
// Ferme la connexion à la base de données
$conn->close();
?>
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
  // Récupère les données du formulaire
  $prix = $_POST['prix'];
  $image = $_FILES['image']['name']; // Le nom de l'image
  $annee = $_POST['annee'];
  $kilometrage = $_POST['kilometrage'];
  $marque = $_POST['marque'];
  $modele = $_POST['modele'];
  $carburant = $_POST['carburant'];

  // Déplace l'image vers le répertoire souhaité
  move_uploaded_file($_FILES['image']['tmp_name'], 'images/' . $image);

  // Insère les données dans la base de données
  $sql = "INSERT INTO cars (prix, image, annee, kilometrage, marque, modele, carburant) VALUES ('$prix', '$image', '$annee', '$kilometrage', '$marque', '$modele', '$carburant')";

  if ($conn->query($sql) === TRUE) {
    echo "Voiture ajoutée avec succès";
  } else {
    echo "Erreur : " . $sql . "<br>" . $conn->error;
  }
}
$conn->close();
?>

<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Catalogue de voitures</title>
</head>

<body>
  <h1>Catalogue de voitures</h1>
  <h2>Ajouter une voiture</h2>
  <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">

    <label for="marque">Marque :</label>
    <input type="text" name="marque" id="marque" required><br>

    <label for="image">Image :</label>
    <input type="file" name="image" id="image" required><br>

    <label for="prix">Prix :</label>
    <input type="text" name="prix" id="prix" required><br>

    <label for="modele">Modèle :</label>
    <input type="text" name="modele" id="modele" required><br>

    <label for="annee">Année de mise en circulation :</label>
    <input type="number" name="annee" id="annee" required><br>

    <label for="kilometrage">Kilométrage :</label>
    <input type="number" name="kilometrage" id="kilometrage" required><br>

    <label for="carburant">Carburant :</label>
    <input type="text" name="carburant" id="carburant" required><br>

    <input type="submit" value="Ajouter">
  </form>
</body>

</html>
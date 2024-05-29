<?php
session_start();

/* Connexion à la base de données */
$servername = "localhost";
$username = "root";
$password = "root1234";
$dbname = "espaceadmin";

$conn = new mysqli($servername, $username, $password, $dbname);

/* Vérifie la connexion */
if ($conn->connect_error) {
    die("La connexion a échoué : " . $conn->connect_error);
}

/* Vérification du formulaire de création de compte utilisateur */
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];



    /* Création d'un compte utilisateur */
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    $sql = "INSERT INTO membre (email, password) VALUES ('$email', '$hashed_password')";

    /* Vérification de la création du compte*/
    if ($conn->query($sql) === TRUE) {
        echo "Compte utilisateur créé avec succès.";
    } else {
        echo "Erreur lors de la création du compte : " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire de Création de Compte</title>
</head>
<!-- Formulaire de création de compte employés-->

<body>

    <h2>Formulaire de Création de Compte</h2>
    <form method="post" action="creation.php">
        <label for="email">Email :</label>
        <input type="email" name="email" id="email" required>

        <label for="password">Mot de passe :</label>
        <input type="password" name="password" id="password" required>

        <input type="submit" value="Créer un compte">
    </form>


</body>

</html>
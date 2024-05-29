<?php
session_start();

// Connexion à la base de données 
$servername = "localhost";
$username = "root";
$password = "root1234";
$dbname = "espaceadmin";

try {
    // Création d'une nouvelle connexion
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Vérification de la connexion
    if ($conn->connect_error) {
        throw new Exception("Connexion à la base de données échouée : " . $conn->connect_error);
    }

    // Succès de la connexion
    echo "Connexion à la base de données établie !";

    // Récupération des nouvelles valeurs d'horaires
    // Assurez-vous que les données POST sont présentes avant de les utiliser
    if (isset($_POST["lundi_vendredi"]) && isset($_POST["samedi"])) {
        $nouveau_lundi_vendredi = $_POST["lundi_vendredi"];
        $nouveau_samedi = $_POST["samedi"];

        // Préparation des requêtes SQL de mise à jour pour Lundi - vendredi et Samedi
        // Utilisez des requêtes préparées pour éviter les injections SQL
        $sql_lundi_vendredi = "UPDATE horaires_footer SET horaire=? WHERE jour_semaine='Lundi - vendredi'";
        $sql_samedi = "UPDATE horaires_footer SET horaire=? WHERE jour_semaine='Samedi'";

        // Utilisation de requêtes préparées avec des paramètres pour éviter les injections SQL
        // Créez un objet de requête préparée pour chaque requête
        $stmt_lundi_vendredi = $conn->prepare($sql_lundi_vendredi);
        $stmt_samedi = $conn->prepare($sql_samedi);

        // Liaison des valeurs aux paramètres de la requête préparée
        // Assurez-vous de spécifier le type de données correct pour chaque paramètre
        $stmt_lundi_vendredi->bind_param("s", $nouveau_lundi_vendredi);
        $stmt_samedi->bind_param("s", $nouveau_samedi);

        // Exécution des requêtes préparées
        $stmt_lundi_vendredi->execute();
        $stmt_samedi->execute();

        // Vérifiez si les requêtes se sont exécutées avec succès
        if ($stmt_lundi_vendredi->affected_rows > 0) {
            echo "Horaires pour Lundi - vendredi mis à jour avec succès !";
        } else {
            echo "Erreur lors de la mise à jour des horaires pour Lundi - vendredi.";
        }

        if ($stmt_samedi->affected_rows > 0) {
            echo "Horaires pour Samedi mis à jour avec succès !";
        } else {
            echo "Erreur lors de la mise à jour des horaires pour Samedi.";
        }

        // Fermeture des requêtes préparées
        $stmt_lundi_vendredi->close();
        $stmt_samedi->close();
    } else {
        echo "Données manquantes dans la requête POST.";
    }

    // Fermeture de la connexion à la base de données
    $conn->close();
} catch (Exception $e) {
    echo "Erreur : " . $e->getMessage();
}

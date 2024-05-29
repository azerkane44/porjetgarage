<?php
session_start();

// Connexion à la base de données - Remplacez ces informations par les vôtres
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

    echo "Connexion à la base de données établie !";

    // Vérification si le formulaire est soumis
    if (isset($_POST['valider'])) {
        // Vérification si les champs ne sont pas vides
        if (!empty($_POST["email"]) && !empty($_POST['mdp'])) {
            $pseudo_saisi = $_POST['email'];
            $mdp_saisi = $_POST['mdp'];

            // Requête SQL préparée pour récupérer l'utilisateur correspondant au pseudo fourni
            $sql = "SELECT * FROM membre WHERE email=?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("s", $pseudo_saisi); // 's' indique que le pseudo_saisi est de type string
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result && $result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $mdp_hash = $row['password'];

                // Vérification du mot de passe
                if (password_verify($mdp_saisi, $mdp_hash)) {
                    $_SESSION['email'] = $pseudo_saisi;
                    // Redirection en fonction du pseudo et du mot de passe corrects
                    if ($pseudo_saisi === 'admin@gmail.com') {
                        header('Location: espaceadmin.php');
                        exit();
                    } else {
                        header('Location: espacemembre.php');
                        exit();
                    }
                } else {
                    echo "<p class='error'>Votre mot de passe est incorrect.</p>";
                }
            } else {
                echo "<p class='error'>Utilisateur non trouvé.</p>";
            }
        } else {
            echo "<p class='error'>Veuillez entrer un pseudo et un mot de passe valide.</p>";
        }
    }
} catch (Exception $e) {
    // Gestion des exceptions
    echo "Erreur lors de la connexion à la base de données : " . $e->getMessage();
}

// Fermeture de la connexion à la base de données
$conn->close();
?>




<!DOCTYPE html>
<html lang="en">




<body>

    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="form.css" type="text/css" />

    </head>

    <body>
        <header>
            <div class="navbar">

                <div class="logo">
                    <a href="">Auto-garage</a>
                </div>
                <ul class="links">
                    <li><a href="doc.php"> Acceuil</a></li>
                    <li><a href="voiture.php">Voiture</a></li>
                    <li><a href="services_page.php">Service </a></li>
                    <li><a href="formcontact.php">Contact </a></li>
                </ul>
                <div class="buttons">
                    <a href="inscription.php" class="action-button pro">Inscription</a>
                    <a href="connexion.php" class="action-button">Se connecter</a>
                </div>
                <div class="burger-menu-button">
                    <a href="#"> <i class="fa-solid fa-bars"></i> </a>
                </div>
            </div>
            <div class="burger-menu ">
                <ul class="links">
                    <li><a href="doc.php"> Acceuil</a></li>
                    <li><a href="voitureocassion.php">Voiture</a></li>
                    <li><a href="services_page.php">Service </a></li>
                    <li><a href="formcontact.php">Contact </a></li>
                    <div class="divider"></div>
                    <div class="buttons-burger-menu">
                        <a href="inscription.php" class="action-button pro">Inscription</a>
                        <a href="connexion.php" class="action-button">Se connecter</a>
                    </div>
                </ul>
            </div>
        </header>

        <div class="formcontainer">
            <form method="POST" action="">
                <h4>Formulaire de connexion</h4>
                <hr>
                <div class="name-field">
                    <div>
                        <div>
                            <label for="email">E-mail :</label>
                            <input type="text" name="email" autocomplet="off">

                        </div>
                        <div>
                            <label for="mdp"> Mot de passe :</label>
                            <input type="password" name="mdp">

                            <input type="submit" name="valider">
                        </div>
                    </div>
                </div>
            </form>

            <footer>
                <h3>Horaires d'ouverture :</h3>
                <p>Lundi - vendredi : 08:45 - 12:00 - 14:00 - 18:00</p>
                <p>samedi : 8:45 - 12:00</p>
            </footer>


            <script src="script.js"></script>
    </body>


</html>

<style>
    footer {
        position: fixed;
        bottom: 0;
        width: 100%;
        color: white;
        padding: 10px;
        background-color: black;
        height: 200px;
        margin: 0;
    }

    footer h3 {
        font-size: 1.2em;
        font-family: sans-serif, Arial;
    }

    .error {
        position: absolute;
        top: 0;
        left: 0;
        color: black;
        font-weight: bold;
        text-align: center;
        background-color: red;
    }
</style>
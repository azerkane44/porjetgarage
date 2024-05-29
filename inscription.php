<?php
session_start();


// Connexion à la base de données 
$servername = "localhost";
$username = "root";
$password = "root1234";
$dbname = "espaceadmin";



if (isset($_POST['envoi'])) {
    if (!empty($_POST['pseudo']) && !empty($_POST['mdp'])) {
        $pseudo = htmlspecialchars($_POST['pseudo']);
        $mdp = sha1($_POST['mdp']); // Note: Utiliser sha1 pour le hachage n'est pas recommandé. Considérez l'utilisation de méthodes plus sécurisées, comme password_hash.

        // Vérifier si le compte qui s'inscrit est l'administrateur
        if ($pseudo == "admin") {
            $insertUser = $bdd->prepare('INSERT INTO users(email, mdp) VALUES (?, ?)');
            $insertUser->execute(array($pseudo, $mdp));

            $recupUser = $bdd->prepare('SELECT * FROM users WHERE email = ? AND mdp = ?');
            $recupUser->execute(array($pseudo, $mdp));

            if ($recupUser->rowCount() > 0) {
                $_SESSION['email'] = $pseudo;
                $_SESSION['mdp'] = $mdp;
                $_SESSION['id'] = $recupUser->fetch()['id'];
                echo "Compte utilisateur créé avec succès.";
            } else {
                echo "<p class='error'>Une erreur s'est produite lors de la récupération du compte </p>";
            }
        } else {
            echo "<p class='error'>Seul le directeur peut inscrire les employés, veuillez lui demander et vous connecter via le bouton de connexion de la page d'acceuil.</p>";
        }
    } else {
        echo "<p class='error'>Veuillez compléter tous les champs...</p>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="form.css" type="text/css" />
    <title>Inscritpion</title>
</head>
<!-- Formulaire d'inscription -->

<body>

    <header>
        <div class="navbar">

            <div class="logo">
                <a href="">Auto-garage</a>
            </div>
            <ul class="links">
                <li><a href="doc.php"> Acceuil</a></li>
                <li><a href="voitureocassion.php">Voiture</a></li>
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
    <main>
        <div class="formcontainer">
            <form method="POST" action="">
                <h4>Inscritpion</h4>
                <hr>
                <div class="name-field">
                    <div>
                        <div>
                            <label for="email">E-mail :</label>
                            <input type="text" name="pseudo" autocomplet="off">

                        </div>
                        <div>
                            <label for="mdp"> Mot de passe :</label>
                            <input type="password" name="mdp">

                            <input type="submit" name="envoi">
                        </div>
                    </div>
                </div>
        </div>
    </main>
    <footer>
        <h3>Horaires d'ouverture :</h3>
        <p>Lundi - vendredi : 08:45 - 12:00 - 14:00 - 18:00</p>
        <p>samedi : 8:45 - 12:00</p>
    </footer>

</body>

</html>

<style>
    /* Style pour le footer */
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
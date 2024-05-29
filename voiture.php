<!DOCTYPE html>
<html lang="fr">

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
    <link rel="stylesheet" href="style.css" type="text/css" />


</head>

<body>
    <header>
        <div class="navbar">

            <div class="logo">
                <a href="">Tiltle</a>
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

    <div class="">
        <div class="MainImageContainer">
            <img src="images/Vente-Voiture.webp" id="mainimg" />
        </div>
        <!-- Service de vente -->
        <div class="molette">
            <img src="images/sale.jpg" alt="#" />
            <p class="sizepara" style="font-size: 30px" id="annonceprix">Vente de véhicule d'occasion à petit prix.</p>
        </div>
        <h1>Liste des voitures</h1>
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

        // Récupère les données des voitures depuis la base de données
        $sql = "SELECT * FROM cars";
        $result = $conn->query($sql);

        // Affiche les données sous forme de cartes
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo '<div class="ExpoVoiture" id="col-1">';
                echo '<img src="images/' . $row["image"] . '" alt="Image de la voiture">';
                echo '<div id="information">';
                echo '<h3>' . $row["marque"] . ' : ' . $row["modele"] . '</h3>'; // Remplacez "marque" et "modele" par les colonnes appropriées de votre base de données
                echo '<p>Année : ' . $row["annee"] . '</p>';
                echo '<p>Carburant : ' . $row["carburant"] . '</p>'; // Remplacez "carburant" par la colonne appropriée de votre base de données
                echo '<p>Kilométrage : ' . $row["kilometrage"] . '</p>';
                echo '<p>Prix : ' . $row["prix"] . '</p>';
                echo '<a href="details.html">Détails</a>';
                echo '</div>';
                echo '</div>';
            }
        } else {
            echo "0 résultats";
        }


        $conn->close();
        ?>
        <footer>
            <h3>Horaires d'ouverture :</h3>
            <p>Lundi - vendredi : 08:45 - 12:00 - 14:00 - 18:00</p>
            <p>samedi : 8:45 - 12:00</p>
        </footer>
        <script src="script.js"></script>

</body>

</html>

<style>
    /* Véhicule */
    /* Véhicule */
    .ExpoVoiture {
        display: inline-block;
        width: 30%;
        border: solid 1px;
        margin-bottom: 50px;
        margin-left: 40px;
        border-radius: 15px;
        background-color: rgba(0, 10, 51, 0.8);
        -webkit-box-shadow: -1px 1px 5px 9px rgba(0, 0, 0, 0.5);
        -moz-box-shadow: -1px 1px 5px 9px rgba(0, 0, 0, 0.5);
        box-shadow: -1px 1px 5px 9px rgba(17, 0, 202, 0.8);
    }

    .ExpoVoiture img {
        width: 100%;
        height: 300px;
        /* Ajustez la hauteur selon votre préférence */
        object-fit: cover;
        border-radius: 15px 15px 0px 0px;
    }

    #information {
        margin-left: 10px;
        color: #fff;
    }

    @media screen and (min-width: 1000px) and (max-width: 1200px) {
        .ExpoVoiture {
            width: 45%;
            /* Deux voitures par ligne */
            margin: 15px auto 50px;
            /* Centrer et espace entre les voitures */
            margin-left: 40px;
            /* Réinitialiser la marge gauche */
        }
    }

    @media screen and (max-width: 1000px) {
        .ExpoVoiture {
            width: 70%;
            /* Une voiture par ligne */
            margin: 15px 20px;
            /* Centrer et espace entre les voitures */
            margin-left: 150px;
            /* Réinitialiser la marge gauche */
        }
    }

    @media screen and (max-width: 900px) {
        .ExpoVoiture {
            width: 70%;
            /* Une voiture par ligne */
            margin: 15px 20px;
            /* Centrer et espace entre les voitures */
            margin-left: 100px;
            /* Réinitialiser la marge gauche */
        }
    }

    @media (min-width: 600px) and (max-width: 755px) {
        .ExpoVoiture {
            width: 80%;
            /* Une voiture par ligne */
            margin: 15px auto 20px;
            /* Centrer et espace entre les voitures */
            margin-left: 40px;
            /* Réinitialiser la marge gauche */
        }
    }

    @media (max-width: 600px) {
        .ExpoVoiture {
            width: 75%;
            margin-top: 20px;
            margin-left: 75px;
            margin-right: 50px;
            margin-bottom: 30px;
        }
    }
</style>
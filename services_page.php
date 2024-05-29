<!DOCTYPE html>
<html>

<head>
    <title>Liste des services</title>
    <style>
        /*  corps de page */
        body {
            height: 100vh;
            background-image: url(images/pexels-roberto-nickson-2885320.jpg);
            background-size: cover;
            background-position: center;
            margin-bottom: 50%;
        }

        li {
            list-style: none;
        }

        a {
            text-decoration: none;
            color: #fff;
            font-size: 1rem;
        }

        a:hover {
            color: #63c7b2;
        }

        header {
            background-color: rgba(0, 0, 0, 0.238);
            padding: 0 2rem;
            position: relative;
        }

        .navbar {
            width: 100%;
            max-width: 1200px;
            height: 60px;
            margin: 0 auto;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .navbar .logo a {
            font-size: 1.5rem;
            font-weight: bold;
        }

        .navbar .links {
            display: flex;
            gap: 2rem;
        }

        .navabar .burger-menu-button {
            color: #fff;
            font-size: 1.2rem;
            cursor: pointer;
            display: none;
        }

        .burger-menu-button i {
            color: #fff;
        }

        /* Button co / isncr*/

        .buttons {
            display: flex;
            gap: 10px;
        }

        .action-button {
            background-color: #63c7b2;
            color: #120d31;
            border: 10px solid #63c7b2;
            border-radius: 5px;
            outline: none;
            font-size: 0.9rem;
            font-weight: bold;
        }

        action-button:hover {
            color: #fff;
            border: 1px solid #fff;
        }

        .pro {
            background-color: transparent;
            color: #fff;
            border: 1px solid #fff;
            font-weight: bold;
            padding-top: 6px;
        }

        .pro:hover {
            background-color: #fff;
            color: #120d31;
        }

        /* burger-menu*/
        .burger-menu {
            display: none;
            height: 0;
            /*height: 310px; */
            position: absolute;
            right: 2rem;
            top: 60px;
            width: 200px;
            background: rgba(0, 0, 0, 0.2);
            backdrop-filter: blur(15px);
            border-radius: 10px;
            overflow: hidden;
            transition: height 0.2s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        }

        .burger-menu.open {
            height: 310px;
        }

        .burger-menu li {
            padding: 0.7rem;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .divider {
            height: 1px;
            background-color: #fff;
            width: 80%;
            margin-left: auto;
            margin-right: auto;
            margin-bottom: 1rem;
        }

        .burger-menu .action-button {
            width: 80%;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .buttons-burger-menu {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            gap: 10px;
        }

        /* Responsive navbar*/
        @media (max-width: 990px) {
            header {
                background: none;
            }

            .navbar .links,
            .navbar .action-buttons {
                display: none;
            }

            .navbar .burger-menu-button {
                display: block;
            }

            .buttons {
                display: none;
            }

            .burger-menu {
                display: block;
            }
        }

        /*  Style du conteneur */
        .container {
            width: 80%;

            margin: 20px auto;

            background-color: #fff;

            border-radius: 10px;

            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);

        }

        /* Style pour l'en-tête */
        h2 {
            text-align: center;

            padding: 20px 0;

        }

        /* Style pour la table */
        table {
            width: 100%;

            border-collapse: collapse;

        }

        /* Style pour les cellules de données */
        td {
            border-bottom: 1px solid #ddd;
            padding: 15px;
            text-align: center;
            transition: background-color 0.3s ease;

        }

        /* Style pour le survol */
        tr:hover td {
            background-color: #cceeff;
            /* Couleur de fond au survol */
        }

        /* Footer */
        footer {
            position: absolute;
            bottom: 0;
            width: 100%;
            color: white;
            padding: 10px;
            background-color: black;
            height: 200px;
        }

        footer h3 {
            font-size: 1.2em;
            font-family: sans-serif, Arial;
        }
    </style>
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
                <li><a href="voiture.php">Voiture</a></li>
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

    <div class="container">
        <h2>Liste des services</h2>
        <table>
            <?php
            /*connexion à la base de données */
            $servername = "localhost";
            $username = "root";
            $password = "root1234";
            $dbname = "espaceadmin";


            $conn = new mysqli($servername, $username, $password, $dbname);

            /* Vérification de la connexion */
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            /* selection de la table d'affichage des services */
            $sql = "SELECT ServiceName FROM ServiceTable";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                /* Donées de la table */
                while ($row = $result->fetch_assoc()) {
                    echo "<tr><td>" . $row["ServiceName"] . "</td></tr>";
                }
            } else {
                echo "<tr><td>Aucun résultat</td></tr>"; /* echo si aucun resuktat trouver */
            }
            $conn->close(); /* fermeture de la connexion a la bsd */
            ?>
        </table>
    </div>
    <footer>
        <h3>Horaires d'ouverture :</h3>
        <p>Lundi - vendredi : 08:45 - 12:00 - 14:00 - 18:00</p>
        <p>samedi : 8:45 - 12:00</p>
    </footer>
</body>

</html>
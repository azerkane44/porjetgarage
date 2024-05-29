<!DOCTYPE html>
<html>

<head>
    <title>Gestion des services</title>

    </style>
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
                <a href="">Auto-garage</a>
            </div>
            <ul class="links">
                <li><a href="doc_admin.php"> Acceuil</a></li>
                <li><a href="voiture_admin.php">Voiture</a></li>
                <li><a href="services_page_admin.php">Service </a></li>
                <li><a href="formcontact_admin.php">Contact </a></li>
                <li><a href="espaceadmin.php">espaceadmin </a></li>


            </ul>
            <div class="buttons">
                <a href="inscription.php" class="action-button pro">Inscription</a>
                <a href="connexion.php" class="action-button">Se connecter</a>
                <a href="deconnexion.php" class="action-button">Déconnexion</a>
            </div>
            <div class="burger-menu-button">
                <a href="#"> <i class="fa-solid fa-bars"></i> </a>
            </div>
        </div>
        <div class="burger-menu">
            <ul class="links">
                <li><a href="doc_admin.php"> Acceuil</a></li>
                <li><a href="voiture_admin.php">Voiture</a></li>
                <li><a href="services_page_admin.php">Service </a></li>
                <li><a href="formcontact_admin.php">Contact </a></li>
                <li><a href="espaceadmin.php">espaceadmin </a></li>

                <div class="divider"></div>
                <div class="buttons-burger-menu">
                    <a href="inscription.php" class="action-button pro">Inscription</a>
                    <a href="connexion.php" class="action-button">Se connecter</a>
                    <a href="deconnexion.php" class="action-button">Déconnexion</a>
                </div>
            </ul>
        </div>
    </header>

    <div class="container">
        <h2>Gestion des services</h2>

        <form action="" method="post">
            <input type="text" name="service_name" placeholder="Nom du service" required>
            <input type="submit" name="add_service" value="Ajouter">
        </form>

        <?php
        // Connexion à la base de données
        $servername = "localhost";
        $username = "root";
        $password = "root1234";
        $dbname = "espaceadmin";

        $conn = new mysqli($servername, $username, $password, $dbname);

        // Vérifier la connexion
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Traitement de l'ajout de service
        if (isset($_POST['add_service'])) {
            $service_name = $_POST['service_name'];

            // Requête préparée pour ajouter le service
            $stmt = $conn->prepare("INSERT INTO ServiceTable (ServiceName) VALUES (?)");
            $stmt->bind_param("s", $service_name);

            if ($stmt->execute()) {
                echo "<p>Le service \"$service_name\" a été ajouté avec succès.</p>";
            } else {
                echo "Erreur lors de l'ajout du service: " . $stmt->error;
            }

            $stmt->close();
        }


        // Traitement de la suppression de service
        if (isset($_POST['delete_service'])) {
            $service_id = $_POST['service_id'];

            // Requête SQL pour supprimer le service
            $sql = "DELETE FROM ServiceTable WHERE ID=$service_id";

            if ($conn->query($sql) === TRUE) {
                echo "<p>Le service a été supprimé avec succès.</p>";
            } else {
                echo "Erreur lors de la suppression du service: " . $conn->error;
            }
        }

        // Affichage de la liste des services
        $sql = "SELECT ID, ServiceName FROM ServiceTable";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            echo "<table>";
            echo "<tr><th>ID</th><th>Nom du service</th><th>Action</th></tr>";
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["ID"] . "</td>";
                echo "<td>" . $row["ServiceName"] . "</td>";
                echo "<td><form action='' method='post'><input type='hidden' name='service_id' value='" . $row["ID"] . "'><input type='submit' name='delete_service' value='Supprimer'></form></td>";
                echo "</tr>";
            }
            echo "</table>";
        } else {
            echo "<p>Aucun service trouvé.</p>";
        }

        $conn->close();
        ?>
    </div>

</body>

</html>

<style>
    /* Style page service */
    body {
        font-family: Arial, sans-serif;
        background-color: #f4f4f4;
        margin: 0;
        padding: 20px;
    }

    .container {
        max-width: 800px;
        margin: 0 auto;
        background-color: #fff;
        border-radius: 5px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        padding: 20px;
    }

    h2 {
        text-align: center;
        margin-bottom: 20px;
    }

    form {
        max-width: 400px;
        margin: 0 auto;
        background-color: #f9f9f9;
        border-radius: 5px;
        padding: 20px;
    }

    input[type="text"] {
        width: 100%;
        padding: 10px;
        margin-bottom: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
    }

    input[type="submit"] {
        width: 100%;
        padding: 10px;
        background-color: #007bff;
        color: #fff;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    input[type="submit"]:hover {
        background-color: #0056b3;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
    }

    th,
    td {
        border-bottom: 1px solid #ddd;
        padding: 8px;
        text-align: left;
    }

    th {
        background-color: #f2f2f2;
    }

    tr:hover {
        background-color: #f2f2f2;
    }
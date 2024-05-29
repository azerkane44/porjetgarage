<!DOCTYPE html>
<html lang="en">

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
<!-- Titre espace admin-->

<body>

    <header>
        <div class="navbar">

            <div class="logo">
                <a href="">Auto-garage</a>
            </div>
            <ul class="links">
                <li><a href="doc_membre.php"> Acceuil</a></li>
                <li><a href="voiture_membre.php">Voiture</a></li>
                <li><a href="services_page_membre.php">Service </a></li>
                <li><a href="formcontact_membre.php">Contact </a></li>
                <li><a href="espacemembre.php">Espace membre </a></li>

            </ul>
            <div class="buttons">

                <a href="deconnexion.php" class="action-button">Déconnexion</a>

            </div>
            <div class="burger-menu-button">
                <a href="#"> <i class="fa-solid fa-bars"></i> </a>
            </div>
        </div>
        <div class="burger-menu ">
            <ul class="links">
                <li><a href="doc_membre.php"> Acceuil</a></li>
                <li><a href="voiture_membre.php">Voiture</a></li>
                <li><a href="services_page_membre.php">Service </a></li>
                <li><a href="formcontact_membre.php">Contact </a></li>
                <li><a href="espacemembre.php">Espace membre </a></li>
                <div class="divider"></div>
                <div class="buttons-burger-menu">

                    <a href="deconnexion.php" class="action-button">Déconnexion</a>
                </div>
            </ul>
        </div>
    </header>

    <header id="headerespaceadmin">
        <h3 id="titleadmin"> Bienveue sur votre espace membre! </h3>

    </header>
    <!DOCTYPE html>
    <html lang="fr">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

    </head>

    <body>
        <h1 style="color: black;">member Dashboard</h1>
        <!-- Bouton de redirection vers la page de gestion des membres -->


        <!-- Bouton de redirection vers la page d'ajout et de suppression des services -->



        <!-- Bouton de redirection vers la page de création de compte utilisateur -->


        <div class="container">
            <!-- Bouton de redirection vers la page d'ajout de voitures -->
            <form action="form_ajout_voiture.php" method="post">
                <p> Ajouter des voitures</p>
                <input type="submit" name="submit" value="Ajout des voitures" />


            </form>

            <!-- Bouton de redirection vers la page de suppression de voitures -->

            <form action="supprimer_voiture.php" method="post">
                <p> Supprimer des voitures</p>
                <input type="submit" name="submit" value="Supprimer des voitures" />
            </form>
        </div>
    </body>

    </html>
    <script src="script.js"></script>
</body>

</html>
<style>
    title {
        text-align: center;
        padding-top: 20px;
    }

    body {
        font-family: Arial, sans-serif;
        background-color: #f4f4f4;
    }

    .container {
        max-width: 600px;
        margin: 50px auto;
        padding: 20px;
        background-color: #fff;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    h1 {
        color: #333;
        margin-top: 20px;
        text-align: center;
        color: #033741;
        font-family: sans-serif, Arial;
        text-align: center;
    }

    #titleadmin {
        text-align: center;
        color: #033741;
        font-family: sans-serif, Arial;
    }


    form {
        margin-top: 20px;
    }

    form p {
        margin-bottom: 10px;
        font-size: 18px;
    }

    input[type="submit"] {
        padding: 10px 20px;
        background-color: #007bff;
        color: #fff;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }

    input[type="submit"]:hover {
        background-color: #0056b3;
    }
</style>
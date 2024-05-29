<!DOCTYPE html>
<html>

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

    <div class="formcontainer"><!-- Titre du formulaire -->
        <h4>Contactez-nous</h4>
        <!-- Lien vers la page de traitement des donées -->
        <form action="traitement.php" method="post">
            <div class="name-field">
                <div><!-- place pour les noms -->
                    <label for="name">Nom</label>&ensp;&emsp;
                    <input type="text" name="name" id="name" required>
                    <br> <!-- place pour prenom-->
                    <label for="prenom">Prenom</label>&ensp;&emsp;
                    <input type="text" name="Prenom" id="Prenom" required>
                    <br><!-- place pour numéro de téléphone -->
                    <label for="phone">Numéro de téléphone </label>&emsp;
                    <input type="phone" name="phone" id="phone" required>
                    <br> <!-- place pour l'email-->
                    <label for="email">Email</label>&emsp;
                    <input type="email" name="email" id="email" required>
                    <br>
                    <!-- Place pour le message au garage-->
                    <label for="message">Message</label>
                    <textarea style="font-size: 30px;" name="message" id="message" required></textarea>
                    <br><br> <!-- Boutton envoyer -->
                    <button>Envoyer</button>
                </div>
                <div>
        </form>
    </div>
</body>
<script src="script.js"></script>

</html>
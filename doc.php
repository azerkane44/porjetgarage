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
        <div class="buttons-burger-menu">

        </div>
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
          <a href="deco.php" class="action-button pro">Deconnexion</a>
        </div>
        <div class="buttons-burger-menu">
          <a href="inscription.php" class="action-button pro">Inscription</a>
          <a href="connexion.php" class="action-button">Se connecter</a>
        </div>
      </ul>
    </div>
  </header>

  <!-- Service du garage-->
  <div class="#">
    <div class="MainImageContainer">
      <img src="images/auto-repair-3691962_1280.jpg" id="mainimg" />
    </div>

    <h2 id="prestation">PRESTATIONS</h2>
    <div class="molette">
      <img src="images/logorep.jpg" alt="#" />
      <p>Réparation de carosserie et mecanique des voitures.</p>
    </div>
    <div class="molette">
      <img src="images/entre.jpg" alt="#" />
      <p>Entretien de vos vehicules, vidange, plaquettes de frein , amortisseur.</p>
    </div>
    <div class="molette">
      <img src="images/sale.jpg" alt="#" />
      <p class="sizepara">Vente de véhicule d'occasion à petit prix.</p>
    </div>
  </div>
  <!-- Voiture d'exposition-->
  <div class="ExpoVoiture" id="col-1">
    <img src="images/me.jpg" alt="#" />
    <div id="information">
      <h3>Peugot : 308</h3>
      <p>Année : 2012</p>
      <p>Carburant : Essence</p>
      <p>kilometrage : 250 000</p>
      <p>prix : 25k</p>
      <a href="details.html">Détails</a>
    </div>
  </div>

  <div class="ExpoVoiture" id="col-2">
    <img src="images/bm.jpg" alt="#" />
    <div id="information">
      <h3> BMW : M3 </h3>
      <p>Année : 2008</p>
      <p>Carburant : Diessel</p>
      <p>kilometrage : 100 000</p>
      <p>prix : 20k</p>
      <a href="details.html">Détails</a>
    </div>
  </div>

  <div class="ExpoVoiture" id="col-3">
    <img src="images/megane.jpg" alt="#" />
    <div id="information">
      <h3>Peugeot : 2008 </h3>
      <p>Année : 2018</p>
      <p>Carburant : Diessel</p>
      <p>kilometrage : 120 000</p>
      <p>prix : 35k</p>
      <a href="details.html">Détails</a>
    </div>
  </div>
  <!-- Footer avec horaires garage-->
  <footer>

    <h3>Horaires d'ouverture :</h3>
    <?php
    // Connexion à la base de données - Remplacez ces informations par les vôtres
    $servername = "localhost";
    $username = "root";
    $password = "root1234";
    $dbname = "espaceadmin";

    // Création d'une nouvelle connexion
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Vérification de la connexion
    if ($conn->connect_error) {
      die("La connexion a échoué : " . $conn->connect_error);
    }

    // Requête SQL pour récupérer les horaires depuis la base de données
    $sql = "SELECT jour_semaine, horaire FROM horaires_footer";

    // Exécution de la requête SQL
    $result = $conn->query($sql);

    // Affichage des horaires dans le footer
    if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
        echo "<p>" . $row["jour_semaine"] . " : " . $row["horaire"] . "</p>";
      }
    } else {
      echo "Aucun horaire trouvé.";
    }

    // Fermeture de la connexion à la base de données
    $conn->close();
    ?>

  </footer>
  <script src="script.js"></script>
</body>

</html>
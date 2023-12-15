<?php
 $connection = mysqli_connect("localhost", "root", "01/11/2021", "pfa");
 session_start();
if (!isset($_SESSION["logged_in"]) || $_SESSION["logged_in"] !== true) {
    // L'utilisateur n'est pas connecté, rediriger vers la page de connexion
    header("Location: Untitled-2.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter descipline</title>
    <link rel="stylesheet" href="équipe.css">
    <script src="espace_adherant.js" defer></script>
</head>
<body>
    <div id="navbar">
        <ul>
            <li><a href="espaceadherant.php">Compte</a></li>
            <li>
                <a href="descipline.php" class="navbar-link" data-nav-link>Gestion descipline</a>
            </li>

            <li id="About Us"><a href="#">Gestion équipe</a></li>
            <li id="login"><a href="Untitled-2.php">Logout</a></li>
        </ul>
    </div>
    <div class="page">
        <div class="tete">
            <h1>Gestion d'équipe</h1>
        </div>
        <div class="menu">
            <ul>
                <li><a href="équipe.php">Équipe</a></li>
                <li><a href="#"> <pre>                 Match</pre> </a></li>
                <li><a href="resultat2.php">   <pre>                 Résultat</pre></a></li>
            </ul>
        </div>
        </ul>
        <div class="descipline">
    <h4>Match :</h4>
        <div class="selection">
        <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Date</th>
                <th>Heure</th>
                <th>ID Équipe 1</th>
                <th>ID Équipe 2</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Connexion à la base de données
            $mysqli = new mysqli("localhost", "root", "01/11/2021.MH", "pfa");

            // Vérification de la connexion
            if ($mysqli->connect_error) {
                die("La connexion à la base de données a échoué : " . $mysqli->connect_error);
            }

            // Requête pour récupérer les données de la table "match"
            $req = "SELECT idequipe FROM adherent WHERE id = '" . $_SESSION['user_id'] . "'";
            $result_idequipe = $mysqli->query($req);
            $row = $result_idequipe->fetch_assoc();
            $idequipe = $row['idequipe'];
            $query = "SELECT * FROM `match` WHERE ideq1 = '$idequipe' OR ideq2 = '$idequipe'";
            $result = $mysqli->query($query);

            // Affichage des données dans le tableau
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["idmatch"] . "</td>";
                echo "<td>" . $row["dateMatch"] . "</td>";
                echo "<td>" . $row["heure"] . "</td>";
                echo "<td>" . $row["ideq1"] . "</td>";
                echo "<td>" . $row["ideq2"] . "</td>";
                echo "</tr>";
            }

            // Fermeture de la connexion à la base de données
            $mysqli->close();
            ?>
        </tbody>
    </table>
          </div>
          </div>
   
        <footer class="footer" id="footer1">

<div class="section footer-top bg-dark has-bg-image" style="background-image: url('./assets/images/footer-bg.png')">
  <div class="container">

    <div class="footer-brand">

      <a href="#" class="logo">
        <ion-icon name="barbell-sharp" aria-hidden="true"></ion-icon>

        <span class="span">Sport</span>
      </a>

      <p class="footer-brand-text">
        EFollow our exercise courses to build muscle, firm, sculpt,
      </p>

      <div class="wrapper">

        <img src="assets/footer-clock.png" width="34" height="34" loading="lazy" alt="Clock">

        <ul class="footer-brand-list">

          <li>
            <p class="footer-brand-title">Monday - Friday</p>

            <p>7:00Am - 10:00Pm</p>
          </li>

          <li>
            <p class="footer-brand-title">Saturday - Sunday</p>

            <p>7:00Am - 2:00Pm</p>
          </li>

        </ul>

      </div>

    </div>

    <ul class="footer-list">

      <li>
        <p class="footer-list-title has-before">Our Links</p>
      </li>

      <li>
        <a href="index.html" class="footer-link">Home</a>
      </li>

      <li>
        <a href="index.html" class="footer-link">About Us</a>
      </li>

      <li>
        <a href="activity.html" class="footer-link">Contact</a>
      </li>

      <li>
        <a href="index.html" class="footer-link">Login</a>
      </li>
      <li>
        <a href="#footer1" class="footer-link">Contact Us</a>
      </li>


     

    </ul>

    <ul class="footer-list">

      <li>
        <p class="footer-list-title has-before">Contact Us</p>
      </li>

      <li class="footer-list-item">
        <div class="icon">
          <ion-icon name="location" aria-hidden="true"></ion-icon>
        </div>

        <address class="address footer-link">
          Tunis
        </address>
      </li>

      <li class="footer-list-item">
        <div class="icon">
          <ion-icon name="call" aria-hidden="true"></ion-icon>
        </div>

        <div>
          <a href="tel:25043131" class="footer-link">71872600</a>

          <a href="tél:+216 25043131" class="footer-link"> Tél : +216 71 872 600 </a>
        </div>
      </li>

      <li class="footer-list-item">
        <div class="icon">
          <ion-icon name="mail" aria-hidden="true"></ion-icon>
        </div>

        <div>
          <a href="mailto:info@fitlife.com" class="footer-link">info@fitlife.com</a>

          <a href="mailto:services@fitlife.com" class="footer-link">services@fitlife.com</a>
        </div>
      </li>

    </ul>

    <ul class="footer-list">

      <li>
        <p class="footer-list-title has-before">Our Newsletter</p>
      </li>

      <li>
        <form   method="post"footer-form" >
          <input type="email" name="email_address" aria-label="email" placeholder="Email Address" required
            class="input-field">

          <button type="submit" class="btn btn-primary" aria-label="Submit">
            <ion-icon name="chevron-forward-sharp" aria-hidden="true"></ion-icon>
          </button>
        </form>
      </li>

      <li>
        <ul class="social-list">

          <li>
            <a href="https://www.facebook.com/?checkpoint_src=1501092823525282" class="social-link">
              <ion-icon name="logo-facebook"></ion-icon>
            </a>
          </li>

          <li>
            <a href="https://www.facebook.com/?checkpoint_src=1501092823525282" class="social-link">
              <ion-icon name="logo-instagram"></ion-icon>
            </a>
          </li>

          <li>
            <a href="https://www.facebook.com/?checkpoint_src=1501092823525282" class="social-link">
              <ion-icon name="logo-twitter"></ion-icon>
            </a>
          </li>

        </ul>
      </li>

    </ul>

  </div>
</div>

<div class="footer-bottom">
  <div class="container">

    <p class="copyright">
      &copy; 2023 Fitlife.  Created  By <a href="#" class="copyright-link">codewith.</a>
    </p>

    <ul class="footer-bottom-list">

      <li>
        <a href="#" class="footer-bottom-link has-before">X</a>
      </li>

      <li>
        <a href="#" class="footer-bottom-link has-before">Terms & Condition</a>
      </li>

    </ul>

  </div>
</div>

</footer>
</div>
</div>
</div>
</body>
</html>

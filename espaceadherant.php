<?php
session_start();
if (!isset($_SESSION["logged_in"]) || $_SESSION["logged_in"] !== true) {
    // L'utilisateur n'est pas connecté, rediriger vers la page de connexion
    header("Location: Untitled-2.php");
    exit;
}
function get_user_info($user_id) {
  // Assurez-vous de bien gérer la connexion à votre base de données ici
  $db_host = "localhost";
  $db_user = "root";
  $db_pass = "01/11/2021.MH";
  $db_name = "pfa";

  // Établir la connexion à la base de données
  $conn = new mysqli($db_host, $db_user, $db_pass, $db_name);

  // Vérifier la connexion à la base de données
  if ($conn->connect_error) {
      die("La connexion à la base de données a échoué : " . $conn->connect_error);
  }

  // Préparez votre requête SQL pour récupérer les informations de l'utilisateur
  $user_id = $conn->real_escape_string($user_id); // Évitez les injections SQL
  $sql = "SELECT * FROM adherent WHERE id = '$user_id'"; // Remplacez 'utilisateurs' par le nom de votre table

  // Exécutez la requête SQL
  $result = $conn->query($sql);

  // Vérifiez si la requête a réussi et récupérez les données de l'utilisateur
  if ($result && $result->num_rows > 0) {
      $user_info = $result->fetch_assoc(); // Récupérez les données de l'utilisateur sous forme de tableau associatif
      return $user_info;
  } else {
      // Gérer le cas où l'utilisateur n'est pas trouvé
      return false;
  }

  // Fermez la connexion à la base de données lorsque vous avez terminé
  $conn->close();
}
function get_user_info2($iddecipline) {
  // Assurez-vous de bien gérer la connexion à votre base de données ici
  $db_host = "localhost";
  $db_user = "root";
  $db_pass = "01/11/2021.MH";
  $db_name = "pfa";

  // Établir la connexion à la base de données
  $conn = new mysqli($db_host, $db_user, $db_pass, $db_name);

  // Vérifier la connexion à la base de données
  if ($conn->connect_error) {
      die("La connexion à la base de données a échoué : " . $conn->connect_error);
  }
  // Préparez votre requête SQL pour récupérer les informations de l'utilisateur
  $user_id = $conn->real_escape_string($user_id); // Évitez les injections SQL
  $sql = "SELECT libelle FROM decipline WHERE iddecipline = '$iddecipline'"; // Remplacez 'utilisateurs' par le nom de votre table

  // Exécutez la requête SQL
  $result = $conn->query($sql);

  // Vérifiez si la requête a réussi et récupérez les données de l'utilisateur
  if ($result && $result->num_rows > 0) {
      $user_info = $result->fetch_assoc(); // Récupérez les données de l'utilisateur sous forme de tableau associatif
      return $user_info;
  } else {
    $user_info = "Null";// Gérer le cas où l'utilisateur n'est pas trouvé
      return false;
  }

  // Fermez la connexion à la base de données lorsque vous avez terminé
  $conn->close();
}
function get_user_info3($idequipe) {
  // Assurez-vous de bien gérer la connexion à votre base de données ici
  $db_host = "localhost";
  $db_user = "root";
  $db_pass = "01/11/2021.MH";
  $db_name = "pfa";

  // Établir la connexion à la base de données
  $conn = new mysqli($db_host, $db_user, $db_pass, $db_name);

  // Vérifier la connexion à la base de données
  if ($conn->connect_error) {
      die("La connexion à la base de données a échoué : " . $conn->connect_error);
  }
  // Préparez votre requête SQL pour récupérer les informations de l'utilisateur
  $user_id = $conn->real_escape_string($user_id); // Évitez les injections SQL
  $sql = "SELECT * FROM equipe WHERE idequipe = '$idequipe'"; // Remplacez 'utilisateurs' par le nom de votre table

  // Exécutez la requête SQL
  $result = $conn->query($sql);

  // Vérifiez si la requête a réussi et récupérez les données de l'utilisateur
  if ($result && $result->num_rows > 0) {
      $user_info = $result->fetch_assoc(); // Récupérez les données de l'utilisateur sous forme de tableau associatif
      return $user_info;
  } else {
    $user_info = "Null";// Gérer le cas où l'utilisateur n'est pas trouvé
      return false;
  }

  // Fermez la connexion à la base de données lorsque vous avez terminé
  $conn->close();
}
$user_info = get_user_info($_SESSION['user_id']);
$iddecipline = $user_info['iddecipline'];
$idequipe = $user_info['idequipe'];
$user_info2 = get_user_info2($iddecipline);
$user_info3 = get_user_info3($idequipe);
?>
<!DOCTYPE html>
<html lang="en">
    <head>
      <!--  <script>
            setTimeout(function() {
              location.reload();
            }, 5000);
          </script>-->
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Esapce adherant</title>
        <link rel="stylesheet" href="espace_adherant.css" />
        <script src="espace_adherant.js" defer></script>
    </head>
    <body>
        <div id="navbar">
            <ul>
            <li><a href="#">Compte</a></li>
            <li>
                <a href="descipline.php" class="navbar-link" data-nav-link>Gestion descipline</a>
            </li>

            <li id="About Us"><a href="équipe.php">Gestion équipe</a></li>
            <li id="login"><a href="Untitled-2.php">Logout</a></li>
            </ul>
        </div>
        <div class="page">
            <h1>Espace adhérant </h1>
            <div class="info">
                <div class="photo">
                    <img src="./inconnue.jpg" alt="">
                </div>

             <div class="infos">
                        <div class="id">
                            <div class="label"><h5>ID :</h5></div>
                            <div class="inf"><p><?php echo $user_info['id']; ?></p></div>
                        </div>
                        
                        <div class="name">
                            <div class="label"><h5>Nom :</h5></div>
                            <div class="inf"><p><?php echo $user_info['nom']; ?></p></div>
                        </div>
                      
                        <div class="surname">
                            <div class="label"><h5>Prénom :</h5></div>
                            <div class="inf"><p><?php echo $user_info['prenom']; ?></p></div>
                        </div>
                        <div class="tel">
                            <div class="label"><h5>Téléphone :</h5></div>
                            <div class="inf"><p><?php echo $user_info['tel']; ?></p></div>
                        </div>
                        <div class="birthday">
                            <div class="label"><h5>Date de naissance :</h5></div>
                            <div class="inf"><p><?php echo $user_info['dateNais']; ?></p></div>
                        </div>
                      
                        
                       
             </div>
            </div>
            <div class="descipline">
                <h3 class="titre">Descipline</h3>
                <div class="info2">
                    <div class="id2">
                        <div class="label"><h5>ID :</h5></div>
                        <div class="inf"><p><?php echo $user_info['iddecipline']; ?></p></div>
                    </div>
                    <div class="libelle">
                        <div class="label"><h5>Libélle :</h5></div>
                        <div class="inf"><p><?php echo $user_info2['libelle']; ?></div>
                    </div>
                    
                </div>
                <button class="bouton" id="boutonRedirection">gerer</button>
                <script>
    var boutonRedirection = document.getElementById("boutonRedirection");

    boutonRedirection.addEventListener("click", function() {
        // Utilisez window.location.href pour rediriger vers la page souhaitée
        window.location.href = "descipline.php";
    });
</script>
            </div>
            <div class="equipe">
                 <h3 class="titre">Équipe </h3>
                <div class="info2">
                    <div class="id2">
                        <div class="label"><h5>Id d'équipe :</h5></div>
                        <div class="inf"><p>
                        <?php echo $user_info['idequipe']; ?>
                        </p></div>
                    </div>
                    <div class="libelle">
                        <div class="label"><h5>Nom d'équipe :</h5></div>
                        <div class="inf"><p><?php echo $user_info3['nom']; ?></p></div>
                    </div>
                </div>
                <button class="bouton" id="boutonRedirection2">gerer</button></div>
                <script>
                var boutonRedirection = document.getElementById("boutonRedirection2");

boutonRedirection.addEventListener("click", function() {
    // Utilisez window.location.href pour rediriger vers la page souhaitée
    window.location.href = "équipe.php";
});
</script>
             <!-- 
    - #FOOTER
  -->
  <script
            type="module"
            src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"
        ></script>
        <script
            nomodule
            src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"
        ></script>
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
            <form action="" class="footer-form">
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
          &copy; 2023 Fitlife.  Created  By <a href="#" class="copyright-link">codewith X</a>
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
    
    </body>
</html>
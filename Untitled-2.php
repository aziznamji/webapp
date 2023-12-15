<?php
                session_start();
                ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="stylesheet" href="Untitled-1.css">
        <link
            rel="stylesheet"
            href="https://use.fontawesome.com/releases/v5.5.0/css/all.css"
        />
        <link
            rel="stylesheet"
            href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"
        />
        <script src="form.js" defer></script>

        <title>Form</title>
    </head>

    <body style="background-image: url('assets/back4.jpg');">
        <header>
             <!-- logo -->
        
           <!-- navbar -->
        <div id="navbar">
        <div id="logo">SPORTS</div>
            <ul>
                <li id="Home"><a href="index.html">Home</a></li>
                
                
                <li>
                    <a href="#footer1" class="navbar-link" data-nav-link>Contact Us</a>
                  </li>
                <li id="About Us"><a href="blog.html">About Us</a></li>
                
              
                <!-- login Button -->
                <li id="login"><a href="#">Login</a></li>
            </ul>
        </div>
           
        <div class="submenuWrapper" id="subMenu">
            <div class="submenu">
                <div><a class="submenuItem" href="#">• French</a></div>
                <div><a class="submenuItem" href="#">• Spanish</a></div>
                <div><a class="submenuItem" href="#">• Arabic</a></div>
            </div>
        </div>
        </header>
        <div id="bgSignIN-UP">
            <div style="height: max-content;" class="border">
                <div class="formbox-log">
                    <div id="signIn-Up">Sign in</div>
                    <form method="POST" name="signin">
                    <div class="inputbox">
                        <input type="text" name="id" required />
                        <label for="">ID</label>
                        <ion-icon name="keypad-outline"></ion-icon>
                    </div>
                    <div class="inputbox">
                        <input type="password" name="mdp" required />
                        <label for="">Password</label>
                        <ion-icon name="lock-closed-outline"></ion-icon>
                    </div>
                    <div style="display:flex;
                    flex-direction:row; margin-top:10%; margin-bottom:10%;" class="selection">
                    <label style="margin-left:15%;" for="user_type"><h4 style="font-size:20px;">Type de connexion :</h4></label>
        <select style="background-color:rgb(95, 202, 161) ;
    color: white;
    padding: 12px;
    width: 200px;
    border-radius:20px;
    border: none;
    font-size: 20px;
    box-shadow: 0 5px 25px rgba(0, 0, 0, 0.2);
    -webkit-appearance: button;
    appearance: button;
    outline: none;
    margin-left: 5%;" id="user_type" name="user_type" required>
            <option value="adherent">Adherent</option>
            <option value="responsable">Responsable</option>
        </select><br>
                    </div>
                    
                    <div class="buttonContainer">
                        <a href="./espacerep.html"
                            ><button class="loginButton" name="signin">Sign in</button></a
                        >
                       <!-- <div class="Orsocials">Or sign in using</div>
                        <a
                            href="#"
                            class="fa fa-facebook fa-lg socialItemfb"
                        ></a>
                        <a
                            href="#"
                            class="fa fa-twitter fa-lg socialItemtw"
                        ></a>
                        <a href="#" class="fa fa-google fa-lg socialItemgg"></a></div>-->
                    </div>

                    <div class="NoAccount"><p>Don't have an account ?</p></div>
                    <div id="regLink">
                        <br /><a class="reg" href="#">Register Here</a>
                    </div>
                </div>
                <?php
// Vérifier si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les données du formulaire
    $username = $_POST["id"];
    $password = $_POST["mdp"];
    $user_type = $_POST["user_type"];

    // Effectuer la vérification dans la base de données (remplacez les informations de connexion)
    $db_host = "localhost";
    $db_user = "root";
    $db_pass = "01/11/2021";
    $db_name = "pfa";

    // Établir la connexion à la base de données
    $conn = new mysqli($db_host, $db_user, $db_pass, $db_name);

    // Vérifier la connexion à la base de données
    if ($conn->connect_error) {
        die("La connexion à la base de données a échoué : " . $conn->connect_error);
    }

    // Sélectionner la table appropriée en fonction du type de connexion
    $table_name = ($user_type === "adherent") ? "adherent" : "responsable";

    // Requête pour vérifier les informations de connexion
    $sql = "SELECT * FROM $table_name WHERE id= '$username' AND mdp= '$password'";

    $result = $conn->query($sql);

    // Vérifier si l'utilisateur existe dans la base de données
    if ($result->num_rows == 1) {
        // Rediriger l'utilisateur vers son espace respectif
        if ($user_type === "adherent") {
          $_SESSION['user_id'] = $username;
          $_SESSION["logged_in"] = true;
          echo '<script>window.location.href = "espaceadherant.php";</script>';
            exit;
        } else {
          $_SESSION['user_id'] = $username;
          $_SESSION["logged1_in"] = true;
          echo '<script>window.location.href = "espacerep.php";</script>';
            exit;
        }
        exit; // Assurez-vous de terminer le script ici pour éviter toute exécution supplémentaire
    } else {
        echo "Nom d'utilisateur ou mot de passe incorrect pour le type de connexion sélectionné.";
    }

    // Fermer la connexion à la base de données
    $conn->close();
}
?>

</form>
                <div class="formbox-reg">
                    <div id="signIn-Up">Sign up</div>
                    <form method="POST" name="signup" action="">
                        <div class="inputbox">
                            <input id="nom" type="text" name="nom" required />
                            <label for="">Nom</label>
                            <ion-icon name="keypad-outline"></ion-icon>
                        </div>
                        <div class="inputbox">
                            <input id="prenom" type="text" name="prenom" required />
                            <label for="">Prénom</label>
                            <ion-icon name="keypad-outline"></ion-icon>
                        </div>
                        <div class="inputbox">
                            <input id="@" type="text" name="adresse" required />
                            <label for="">Adress</label>
                            <ion-icon name="keypad-outline"></ion-icon>
                        </div>
                        <div class="inputbox">
                            <input id="birthday" type="text" name="date" required />
                            <label for="">Birthday</label>
                            <ion-icon name="calendar-outline"></ion-icon>
                        </div>
                        <div class="inputbox">
                            <input id="num" type="tel" name="tel" required />
                            <label for="">Phone Number</label>
                            <ion-icon name="call-outline"></ion-icon>
                        </div>
                        <div class="inputbox">
                            <input id="pwd" type="password" name="mdp1" required />
                            <label for="">Password</label>
                            <ion-icon name="lock-closed-outline"></ion-icon>
                        </div>
                        <?php
                        function generateUniqueID() {
                          $min = 1; // Valeur minimale pour l'identifiant
                          $max = 23000; // Valeur maximale pour l'identifiant
                          return random_int($min, $max);
                      }
    $connection = mysqli_connect("localhost", "root", "01/11/2021", "pfa");

    if (!$connection) {
        echo "<script>alert('Connection failed!');</script>";
    } else {
        // Sign Up
        if (isset($_POST['signup'])) {
            // Utiliser des requêtes préparées pour éviter les injections SQL
            $query = "SELECT * FROM adherent WHERE nom = ? AND prenom = ? AND tel = ?";
            $stmt = mysqli_prepare($connection, $query);

            if ($stmt) {
                // Échapper les données du formulaire pour éviter les injections SQL
                $nom = mysqli_real_escape_string($connection, $_POST['nom']);
                $prenom = mysqli_real_escape_string($connection, $_POST['prenom']);
                $tel = mysqli_real_escape_string($connection, $_POST['tel']);

                // Lier les paramètres à la requête préparée
                mysqli_stmt_bind_param($stmt, "sss", $nom, $prenom, $tel);

                // Exécuter la requête préparée
                mysqli_stmt_execute($stmt);

                // Récupérer le résultat de la requête
                $result = mysqli_stmt_get_result($stmt);

                if (mysqli_num_rows($result) > 0) {
                    echo "Ce nom d'utilisateur existe déjà.";
                } else {
                    $id = generateUniqueID();
                    $adresse = mysqli_real_escape_string($connection, $_POST['adresse']);
                    $date = mysqli_real_escape_string($connection, $_POST['date']);
                    $mdp1 = mysqli_real_escape_string($connection, $_POST['mdp1']);

                    // Utiliser également une requête préparée pour l'insertion pour une meilleure sécurité
                    $insertQuery = "INSERT INTO `pfa`.`adherent` (`id`, `nom`, `prenom`, `tel`, `adresse`, `dateNais`, `mdp`) VALUES (?, ?, ?, ?, ?, ?, ?);";
                    $stmtInsert = mysqli_prepare($connection, $insertQuery);

                    if ($stmtInsert) {
                        // Lier les paramètres à la requête préparée d'insertion
                        mysqli_stmt_bind_param($stmtInsert, "sssssss" , $id, $nom, $prenom, $tel, $adresse, $date, $mdp1);

                        // Exécuter la requête d'insertion
                        if (mysqli_stmt_execute($stmtInsert)) {
                            echo "Inscription réussie ! Votre ID d'utilisateur est : $id";
                            
                        } else {
                            echo "Erreur lors de l'inscription : " . mysqli_error($connection);
                        }

                        // Fermer la requête d'insertion
                        mysqli_stmt_close($stmtInsert);
                    } else {
                        echo "Erreur lors de la préparation de la requête d'insertion : " . mysqli_error($connection);
                    }
                }

                // Fermer la requête de sélection
                mysqli_stmt_close($stmt);
            } else {
                echo "Erreur lors de la préparation de la requête de sélection : " . mysqli_error($connection);
            }
        }
        
        // Fermer la connexion à la base de données
        mysqli_close($connection);
    }
?>
                       <div class="buttonContainer">
                       <button type="submit" name="signup" class="CreateButton" id="btn" style=" margin-top: 150px;">
                                Create Account
                            </button>
                        
                       <div class="NoAccount">
                           <p>Already have an account ?</p>
                           <div id="logLink">
                           <br />
                           <a class="log" href="#">Log in Here</a>
                       </div>
                       
                       </div>
                      
                   </div>
                        
                           
                    </form>
                    
            </div>
        </div>
        <script
            type="module"
            src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"
        ></script>
        <script
            nomodule
            src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"
        ></script>
        </div>
          <!-- 
    - #FOOTER
  -->

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
          &copy; 2023 Sport.  Created  By <a href="#" class="copyright-link">codewith X.</a>
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
 
    </body>
    






</html>

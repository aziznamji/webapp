<?php
 $connection = mysqli_connect("localhost", "root", "01/11/2021", "pfa");
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>les terrains</title>
        <link rel="stylesheet" href="equipe.css" />
        <script src="espace_adherant.js" defer></script>
    </head>
    <body style="    background-image: url(assets/back4.jpg);">
    <div id="navbar">
        <ul>
            <li><a href="espacerep.php">Compte</a></li>
        
            
            <li>
                <a href="ajouterdescipline.php" class="navbar-link" data-nav-link>Gestion descipline</a>
               
              </li>
            
            <li id="About Us"><a href="gestionseance.php">Plannification</a></li>
            <li id="About Us"><a href="#">Gestion équipe </a></li>
            <li id="About Us"><a href="match.php">Gestion match</a></li>
            
          
            <!-- login Button  lien -->
            <li id="login"><a href="Untitled-2.php">Logout</a></li>
            
            

        </ul>
    </div>
    <div class="page">
        <div class="tete">
            <h1>Gestion d'équipe</h1>
        </div>
        <div class="menu">
            <ul> 
              <li id="About Us"><a class="act" href="#">Gestion équipe </a></li>
              <li id="About Us"><a href="joueurs.php">consulter joueurs</a></li>
            </ul>
        </div>
        <form class="form form1" action="equipe.php" method="post">
           <fieldset>
            <legend>Ajouter équipe</legend>
            <table>
                <tr>
                    <td><label for="id">ID (entier) :</label></td>
                    <td><input type="number" id="id" placeholder="Entrez un ID entier" required name="id"></td>
                </tr>
                <tr>
                    <td><label for="nom">Nom :</label></td>
                    <td><input type="text" id="nom"  placeholder="Entrez un nom" required name="nom"></td>
                </tr>
                <tr>
                    <td><label for="acronyme">Acronyme :</label></td>
                    <td><input type="text" id="acronyme"  placeholder="Entrez un acronyme" required name="acr"></td>
                </tr>
                <tr>
                    <td><label for="date_creation">Date de création :</label></td>
                    <td><input class="input inputdate" type="text" placeholder="YYYY-MM-DD" name="date"></td>
                </tr>
                <tr>
                    <td><label for="couleur">les couleurs :</label></td>
                    <td><input type="text" id="couleur" placeholder="Entrez les couleurs" required name="col"></td>
                </tr>
            </table>
            <div class="boutons">
                <button class="bouton" name="ajouter">Ajouter</button>
                <button class="bouton2">Annuler</button>
            </div>
            
           </fieldset>
        </form>
       <div class="consulter">
        <h2>Consulter</h2>
        <table  border ="1" cellpadding="20" cellspacing="1" text-align="center" id="T">
            <tr>
                <th>ID</th>
                <th>Nom</th>
                <th>Acronyme</th>
                <th>date de creation</th>
                <th>couleurs</th>
            </tr>
            <?php
              if (!$connection) {
                echo "<script>alert('Connection failed!');</script>";
            } 
       else {
            $req="select * from equipe";
            $res = mysqli_query($connection, $req);
          // Boucle pour afficher les données dans le tableau
           if ($res->num_rows > 0) {
              while ($row = $res->fetch_assoc()) {
                 echo "<tr>";
                 echo "<tr onclick='fillForm(\"{$row["idequipe"]}\", \"{$row["nom"]}\",\"{$row["acronyme"]}\",\"{$row["dateCreation"]}\",\"{$row["couleur"]}\")'>";
                 echo "<td style='text-align: center; color: black;'>" . $row["idequipe"] . "</td>";
                 echo "<td style='text-align: center; color: black;'>" . $row["nom"] . "</td>";
                 echo "<td style='text-align: center; color: black;'>" . $row["acronyme"] . "</td>";
                 echo "<td style='text-align: center; color: black;'>" . $row["dateCreation"] . "</td>";
                 echo "<td style='text-align: center; color: black;'>" . $row["couleur"] . "</td>";
                 echo "</tr>";
             }
          } else {
            echo "<tr><td colspan='5'>Aucune donnée trouvée.</td></tr>";
        }
      }
      mysqli_close($connection);

        ?>
        </table>
        <form class="form form2" action="equipe.php" method="post" >
            <fieldset>
             <legend>Modifier équipe</legend>
             <table>
                <tr>
                    <td><label for="id">ID (entier) :</label></td>
                    <td><input type="number" id="id"  placeholder="Entrez un ID entier" required name="id"></td>
                </tr>
                <tr>
                    <td><label for="nom">Nom :</label></td>
                    <td><input type="text" id="nom"  placeholder="Entrez un nom" required name="nom"></td>
                </tr>
                <tr>
                    <td><label for="acronyme">Acronyme :</label></td>
                    <td><input type="text" id="acronyme"  placeholder="Entrez un acronyme" required name="acr"></td>
                </tr>
                <tr>
                    <td><label for="date_creation">Date de création :</label></td>
                    <td><input class="input inputdate" type="text" placeholder="YYYY-MM-DD" name="date"></td>
                </tr>
                <tr>
                    <td><label for="couleur">les couleurs :</label></td>
                    <td><input type="text" id="couleur"  placeholder="Entrez les couleurs" required name="col"></td>
                </tr>
            </table>
             <div class="boutons2">
                 <button class="bouton" name="modifier">Modifier</button>
                 <button class="bouton" name="supprimer">Supprimer</button>
                 <button class="bouton2">Annuler</button>
             </div>
             
            </fieldset>
         </form>
         <script>
    function fillForm(idequipe, nom, acronyme, dateCreation, couleur) {
        document.getElementsByName('id')[1].value = idequipe;
        document.getElementsByName('nom')[1].value = nom;
        document.getElementsByName('acr')[1].value = acronyme;
        document.getElementsByName('date')[1].value = dateCreation;
        document.getElementsByName('col')[1].value = couleur;
    }
</script>
       </div>
       echo "<tr onclick='fillForm(\"{$row["idequipe"]}\", \"{$row["nom"]}\",\"{$row["acronyme"]}\",\"{$row["dateCreation"]}\",\"{$row["couleur"]}\")'>";

       <div>
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
       </div>
       <?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $connection = mysqli_connect("localhost", "root", "01/11/2021.Mh", "pfa");

    if (!$connection) {
        echo "<script>alert('La connexion a échoué !');</script>";
    } else {
        $id = $_POST["id"];
        $nom = $_POST["nom"];
        $acr = $_POST["acr"];
        $date = $_POST["date"];
        $col = $_POST["col"];

        // Ajouter une séance
        if (isset($_POST["ajouter"])) {
            // Vérifier le remplissage des champs
            if (empty($id) || empty($nom) || empty($acr) || empty($date) || empty($col)) {
                echo "<script>alert('Veuillez remplir tous les champs du formulaire !');</script>";
                return;
            }
            $req = "INSERT INTO equipe VALUES ('$id', '$nom', '$acr', '$date', '$col')";
            $res = mysqli_query($connection, $req);

            if ($res) {
                echo "<script>alert('equipe ajoutée avec succès !');</script>";
            } else {
                echo "<script>alert('Erreur, veuillez réessayer.');</script>";
            }
        }

        // Modifier une séance
        if (isset($_POST["modifier"])) {
            // Vérifier le remplissage des champs
            if (empty($id) || empty($nom) || empty($acr) || empty($date) || empty($col)) {
                echo "<script>alert('Veuillez remplir tous les champs du formulaire !');</script>";
                return;
            }
            $req1 = "UPDATE equipe SET nom = '$nom', acronyme = '$acr', dateCreation = '$date', couleur = '$col' WHERE idequipe = '$id'";
            $req2 = "SELECT * FROM equipe WHERE idequipe = '$id'";
            $res = mysqli_query($connection, $req1);
            $res2 = mysqli_query($connection, $req2);

            if ($res && mysqli_num_rows($res2) > 0) {
                echo "<script>alert('La mise à jour a été effectuée avec succès !');</script>";
            } else if (mysqli_num_rows($res2) == 0) {
                echo "<script>alert('ID de séance incorrect !');</script>";
            } else {
                echo "<script>alert('Une erreur s'est produite lors de la mise à jour !');</script>";
            }
        }

        // Supprimer une séance
        if (isset($_POST["supprimer"])) {
            if (empty($id)) {
                echo "<script>alert('Veuillez saisir l'ID !');</script>";
                return;
            }
            $req1 = "DELETE FROM equipe WHERE idequipe = '$id'";
            $req2 = "SELECT * FROM equipe WHERE idequipe = '$id'";
            $res2 = mysqli_query($connection, $req2);
            $res = mysqli_query($connection, $req1);

            if ($res && mysqli_num_rows($res2) > 0) {
                echo "<script>
                    document.getElementById('popup').innerText = 'Mise à jour effectuée avec succès !';
                    document.getElementById('popup').style.display = 'block';
                </script>";
            } elseif (mysqli_num_rows($res2) == 0) {
                echo "<script>alert('ID de séance incorrect !');</script>";
            } else {
                echo "<script>alert('Une erreur s'est produite lors de la suppression !');</script>";
            }
        }
    }
   
    
}
mysqli_close($connection);

?>

    </body>
    </html>

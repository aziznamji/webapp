<?php
 $connection = mysqli_connect("localhost", "root", "01/11/2021", "pfa");
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
        <title>les terrains</title>
        <link rel="stylesheet" href="match.css" />
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
            <li id="About Us"><a href="equipe.php">Gestion équipe </a></li>
            <li id="About Us"><a href="#">Gestion match</a></li>
            
          
            <!-- login Button  lien -->
            <li id="login"><a href="Untitled-2.php">Logout</a></li>
            
            

        </ul>
    </div>
    <div class="page">
        <div class="tete">
            <h1>Géstion Match</h1>
        </div>
        <div class="menu">
            <ul> 
              <li id="About Us"><a class="act" href="#">Matchs</a></li>
              <li id="About Us"><a  href="resultat.php">Résultats</a></li>
        </div>
        <form class="form form1" action="match.php" method="post">
           <fieldset>
            <legend>Ajouter Match</legend>
            <table >
                <tr>
					<td><label class="label">Id Match :</label></td>
					<td><input class="input" type="text" placeholder="saisir l id du Match" name="id"></td>
				</tr>
                <tr>
                    <td><label class="label">Date:</label></td>
                    <td><input class="input inputdate" type="text" placeholder="YYYY-MM-DD" name="date"></td>
				</tr>
                <tr>
                    <td><label class="label">heure:</label></td>
					<td><input class="input" type="text" placeholder="saisir l'heure du match" name="heure"></td>
                </tr>
                
        <tr>
					<td><label class="label">Id équipe 1:</label></td>
					<td><input type="text" placeholder="Id eq1"  name="id1" />
                    </td>
				</tr>
                <tr>
					<td><label class="label">Id équipe 2:</label></td>
					<td><input type="text" placeholder="Id eq2"  name="id2"/>
                    </td>
				</tr>
            </table>
            <div class="boutons">
                <button class="bouton"  name="ajouter3">Ajouter</button>
                <button class="bouton2">Annuler</button>
            </div>
            
           </fieldset>
        </form>
       <div class="consulter">
        <h2>Consulter</h2>
        <table border ="1" cellpadding="20" cellspacing="1" text-align="center" id="T">
            <tr>
                <th>ID Match</th>
                <th>Date</th>
                <th>Heure</th>
                <th>Équipe 1 </th>
                <th>Équipe 2</th>
            </tr>
            <?php
              if (!$connection) {
                echo "<script>alert('Connection failed!');</script>";
            } 
       else {
        $req = "SELECT * FROM `match`";   
                 $res = mysqli_query($connection, $req);
          // Boucle pour afficher les données dans le tableau
           if ($res->num_rows > 0) {
              while ($row = $res->fetch_assoc()) {
                 echo "<tr>";
                 echo "<tr onclick='fillForm(\"{$row["idmatch"]}\", \"{$row["dateMatch"]}\",\"{$row["heure"]}\",\"{$row["ideq1"]}\",\"{$row["ideq2"]}\")'>";
                 echo "<td style='text-align: center; color: black;'>" . $row["idmatch"] . "</td>";
                 echo "<td style='text-align: center; color: black;'>" . $row["dateMatch"] . "</td>";
                 echo "<td style='text-align: center; color: black;'>" . $row["heure"] . "</td>";
                 echo "<td style='text-align: center; color: black;'>" . $row["ideq1"] . "</td>";
                 echo "<td style='text-align: center; color: black;'>" . $row["ideq2"] . "</td>";
                 echo "</tr>";
             }
          } else {
            echo "<tr><td colspan='5'>Aucune donnée trouvée.</td></tr>";
        }
      }
      mysqli_close($connection);

        ?>
        </table>
        <form class="form form2" action="match.php" method="post"  >
            <fieldset>
             <legend>Modifier Match</legend>
             <table >
                <tr>
					<td><label class="label">Id Match :</label></td>
					<td><input class="input" type="text" placeholder="saisir l id du Match" name="id"></td>
				</tr>
                <tr>
                    <td><label class="label">Date:</label></td>
                    <td><input class="input inputdate" type="text" placeholder="YYYY-MM-DD" name="date"></td>
				</tr>
                <tr>
                    <td><label class="label">heure:</label></td>
					<td><input class="input" type="text" placeholder="saisir l'heure du match" name="heure"></td>
                </tr>
                
        <tr>
					<td><label class="label">Id équipe 1:</label></td>
					<td><input type="text" placeholder="Id eq1" name="id1" />
                    </td>
				</tr>
                <tr>
					<td><label class="label">Id équipe 2:</label></td>
					<td><input type="text" placeholder="Id eq2" name="id2" />
                    </td>
				</tr>
            </table>
             <div class="boutons2">
                 <button class="bouton" name="modifier3">Modifier</button>
                 <button class="bouton" name="supprimer3">Supprimer</button>
                 <button class="bouton2">Annuler</button>
             </div>
             
            </fieldset>
         </form>
         <script>
    function fillForm(idmatch, dateMatch, heure, ideq1, ideq2) {
        document.getElementsByName('id')[1].value = idmatch;
        document.getElementsByName('date')[1].value = dateMatch;
        document.getElementsByName('heure')[1].value = heure;
        document.getElementsByName('id1')[1].value = ideq1;
        document.getElementsByName('id2')[1].value = ideq2;
    }
</script>
       </div>
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
        $date = $_POST["date"];
        $heure = $_POST["heure"];
        $id1 = $_POST["id1"];
        $id2 = $_POST["id2"];

        // Ajouter une séance
        if (isset($_POST["ajouter3"])) {
            // Vérifier le remplissage des champs
            if (empty($id) || empty($date) || empty($heure) || empty($id1) || empty($id2)) {
                echo "<script>alert('Veuillez remplir tous les champs du formulaire !');</script>";
                return;
            }
            $req = "INSERT INTO `match` VALUES ('$id', '$date', '$heure', '$id1', '$id2')";
            $res = mysqli_query($connection, $req);

            if ($res) {
                echo "<script>alert('equipe ajoutée avec succès !');</script>";
            } else {
                echo "<script>alert('Erreur, veuillez réessayer.');</script>";
            }
        }

        // Modifier une séance
        if (isset($_POST["modifier3"])) {
            // Vérifier le remplissage des champs
            if (empty($id) || empty($date) || empty($heure) || empty($id1) || empty($id2)) {
                echo "<script>alert('Veuillez remplir tous les champs du formulaire !');</script>";
                return;
            }
            $req1 = "UPDATE `match` SET dateMatch = '$date', heure = '$heure', ideq1 = '$id1', ideq2 = '$id2' WHERE idmatch = '$id'";
            $req2 = "SELECT * FROM `match` WHERE idmatch = '$id'";
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
        if (isset($_POST["supprimer3"])) {
            if (empty($id)) {
                echo "<script>alert('Veuillez saisir l'ID !');</script>";
                return;
            }
            $req1 = "DELETE FROM `match` WHERE idmatch = '$id'";
            $req2 = "SELECT * FROM `match` WHERE idmatch = '$id'";
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


<?php
 $connection = mysqli_connect("localhost", "root", "01/11/2021.Mh", "pfa");
?>

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
        <title>Modifier descipline</title>
        <link rel="stylesheet" href="ajoutdescipline.css" />
        <script src="espace_adherant.js" defer></script>
    </head>
    <body>
    <div id="navbar">
        <ul>
        <li><a href="espacerep.php">Compte</a></li>
            <li>
                <a href="#" class="navbar-link" data-nav-link>Gestion descipline</a>
            </li>
            <li id="About Us"><a href="gestionseance.php">Plannification</a></li>
            <li id="About Us"><a href="gestionseance.php">Gestion équipe</a></li>
            <li id="About Us"><a href="match.php">Gestion match</a></li>
            <li id="login"><a href="Untitled-2.php">Logout</a></li>
            
            

        </ul>
    </div>
    <div class="page">
        <div class="tete">
            <h1>Gestion du descipline</h1>
        </div>
        <div class="menu">
            <ul> 
            <li><a href="ajouterdescpline.php">Ajouter</a></li>
                <li><a href="#"> <pre>                 modifier</pre> </a></li>
                <li><a href="#">   <pre>                 consulter</pre></a></li>
        </div>
       <div class="consulter">
        <h2>Consulter</h2>
        <table border ="1" cellpadding="20" cellspacing="1" text-align="center" id="T">
            <tr>
                <th style='color: black;'>ID</th>
                <th style='color: black;'>Libelle</th>
            </tr>
            <?php
              if (!$connection) {
                echo "<script>alert('Connection failed!');</script>";
            } 
       else {
            $req="select * from decipline";
            $res = mysqli_query($connection, $req);
          // Boucle pour afficher les données dans le tableau
           if ($res->num_rows > 0) {
              while ($row = $res->fetch_assoc()) {
                 echo "<tr>";
                 echo "<tr onclick='fillForm(\"{$row["iddecipline"]}\", \"{$row["libelle"]}\")'>";
                 echo "<td style='text-align: center; color: black;'>" . $row["iddecipline"] . "</td>";
                 echo "<td style='text-align: cent  er; color: black;'>" . $row["libelle"] . "</td>";
                 echo "</tr>";
             }
          } else {
            echo "<tr><td colspan='3'>Aucune donnée trouvée.</td></tr>";
        }
      }
        ?>
        </table>
        <form class="form"  action="modifierdescipline.php" method="post" id="F">
            <fieldset>
             <legend>Modifier descipline</legend>
             <table  >
                 <tr>
                     <td><label>Id descipline :</label></td>
                     <td><input type="text" placeholder="saisir l id du descipline" name="id" id="iddecipline"></td>
                 </tr>
                 <tr>
                     <td><label>libelle :</label></td>
                     <td><input type="text" placeholder="saisir la libelle" name="libelle" id="libelle"></td>
                 </tr>
             </table>
             <div class="boutons2">
                 <button class="bouton" name="modifier">Modifier</button>
                 <button class="bouton" name="supprimer">Suprrimer</button>
                 <button class="bouton2" type="reset">Annuler</button>
             </div>
             
            </fieldset>
         </form>
       </div>
       <script>
       function fillForm(iddecipline, libelle) {
        document.getElementById("iddecipline").value = iddecipline;
        document.getElementById("libelle").value = libelle;
      }
     </script>
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
       

        if (!$connection) {
            echo "<script>alert('Connection failed!');</script>";
         } 
        else {
                if (isset($_POST["modifier"])) {
                  $id =$_POST["id"];
                  $libelle = $_POST["libelle"];
                    // Check if the form fields are empty
                  if (empty($id) || empty($libelle)) {
                       echo "<script>alert('Veuillez remplir tous les champs du formulaire !');</script>";
                       return ;
                     } 
                    $req1 = "UPDATE decipline SET libelle = '$libelle' WHERE iddecipline = '$id'";
                    $req2 = "SELECT * FROM decipline WHERE iddecipline = '$id'";
                    $res = mysqli_query($connection, $req1);
                    $res2 = mysqli_query($connection, $req2);
                    
                    if ($res && mysqli_num_rows($res2) > 0) {
                        echo "<script>alert('La mise à jour a été effectuée avec succès !');</script>";
                    } elseif (mysqli_num_rows($res2) == 0) {
                        echo "<script>alert('ID de descipline incorrect !');</script>";
                    } else {
                        echo "<script>alert('Une erreur s'est produite lors de la mise à jour !');</script>";
                    }
                    return ;
                }
            
            
            //suprrimer descipline
            if (isset($_POST["supprimer"])) {
              $id =$_POST["id"];
              $libelle = $_POST["libelle"];
              $req1 = "DELETE FROM decipline WHERE iddecipline = '$id'";
              $req2 = "SELECT * FROM decipline WHERE iddecipline = '$id'";
              $res2 = mysqli_query($connection, $req2);
              $res = mysqli_query($connection, $req1);
              
              if ($res && mysqli_num_rows($res2) > 0) {
                  echo "<script>alert('La suppression a été effectuée avec succès !');</script>";
                  return ;
              } elseif (mysqli_num_rows($res2) == 0) {
                  echo "<script>alert('ID de descipline incorrect !');</script>";
                 
              } else {
                  echo "<script>alert('Une erreur s'est produite lors de la suppression !');</script>";
                
              }
           
          }
          return ;
          
      

        }

 ?>
 
 </body>
</html>
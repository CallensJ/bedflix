<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="styles.css" />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css"
      integrity="sha512-5Hs3dF2AEPkpNAR7UiOHba+lRSJNeM2ECkwxUIxC1Q/FLycGTbNapWXB4tP889k5T5Ju8fs4b1P5z/iB4nMfSQ=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />
    <title>Bedflix</title>
  </head>
  <body>
  <?php
session_start();

if (!isset($_SESSION['id_utilisateur'])) {
    header('Location: connexion.php');
    exit();
}

echo "Bienvenue";
?>

    <div class="container">
      <header>
        <nav>
          <div class="leftside">
            <h2>BED<span>FLIX</span></h2>
            <ul>
              <li><a href="#">Accueil</a></li>
              <li><a href="#">Series</a></li>
              <li><a href="#">Films</a></li>
            </ul>
          </div>
          <div class="rightside">
            <input type="text" />
            <i class="fa-regular fa-bell"></i>
            <div class="avatar"></div>
          </div>
        </nav>
      </header>
    </div>
  </body>
</html>

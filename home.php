<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="home.css">
    <link rel="stylesheet" href="navbar.css">
    <link rel="stylesheet" href="footer.css">
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

?>
<?php 

include 'navbar.php'
?>

    <!-- Page d'accueil -->
    <main class="main">
        <section class="hero">
            <h2>Film/Série en vogue : The Witcher</h2>
            <p>"Découvrez l'histoire légendaire de Geralt de Riv, un sorceleur solitaire..."</p>
            <button>Lire</button>
            <button>Ajouter à ma liste</button>
        </section>

        <section class="carousels">
            <div class="carousel">
                <h3>En ce moment</h3>
                <div class="grid">
                    <div class="item"><img src="movie1.jpg" alt="Movie 1"></div>
                    <div class="item"><img src="movie2.jpg" alt="Movie 2"></div>
                    <div class="item"><img src="movie3.jpg" alt="Movie 3"></div>
                </div>
            </div>

            <div class="carousel">
                <h3>Genres tendances</h3>
                <div class="grid">
                    <div class="item"><img src="genre1.jpg" alt="Genre 1"></div>
                    <div class="item"><img src="genre2.jpg" alt="Genre 2"></div>
                    <div class="item"><img src="genre3.jpg" alt="Genre 3"></div>
                </div>
            </div>

            <div class="carousel">
                <h3>Recommandés pour vous</h3>
                <div class="grid">
                    <div class="item"><img src="recommend1.jpg" alt="Recommend 1"></div>
                    <div class="item"><img src="recommend2.jpg" alt="Recommend 2"></div>
                    <div class="item"><img src="recommend3.jpg" alt="Recommend 3"></div>
                </div>
            </div>
        </section>
    </main>

    <?php 

include 'footer.php';
?>

  </body>
</html>

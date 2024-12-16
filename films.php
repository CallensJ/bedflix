<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Films - Netflix Clone</title>
    <link rel="stylesheet" href="navbar.css">
    <link rel="stylesheet" href="films.css">
    <link rel="stylesheet" href="footer.css">
</head>
<body>
    <?php 

    include 'navbar.php';
    ?>

    <!-- Page Films -->
    <main class="main">
        <section class="hero">
            <h2>Film tendance : Inception</h2>
            <p>"Explorez le monde des rêves et de la manipulation du subconscient."</p>
            <button>Lire</button>
            <button>Ajouter à ma liste</button>
        </section>

        <section class="filters">
            <h3>Filtres de genres</h3>
            <div class="genres">
                <button>Thriller</button>
                <button>Action</button>
                <button>Anime</button>
                <button>Drame</button>
                <button>Enfant</button>
                <button>Policier</button>
                <button>Horreur</button>
                <button>Sci-fi</button>
            </div>
        </section>

        <section class="carousels">
            <div class="carousel">
                <h3>Drame</h3>
                <div class="grid">
                    <div class="item"><img src="drama1.jpg" alt="Drame 1"></div>
                    <div class="item"><img src="drama2.jpg" alt="Drame 2"></div>
                    <div class="item"><img src="drama3.jpg" alt="Drame 3"></div>
                </div>
            </div>

            <div class="carousel">
                <h3>Sci-fi</h3>
                <div class="grid">
                    <div class="item"><img src="scifi1.jpg" alt="Sci-fi 1"></div>
                    <div class="item"><img src="scifi2.jpg" alt="Sci-fi 2"></div>
                    <div class="item"><img src="scifi3.jpg" alt="Sci-fi 3"></div>
                </div>
            </div>

            <div class="carousel">
                <h3>Action</h3>
                <div class="grid">
                    <div class="item"><img src="action1.jpg" alt="Action 1"></div>
                    <div class="item"><img src="action2.jpg" alt="Action 2"></div>
                    <div class="item"><img src="action3.jpg" alt="Action 3"></div>
                </div>
            </div>
        </section>
    </main>

    <?php 

include 'footer.php';
?>

</body>
</html>

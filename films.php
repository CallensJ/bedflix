<?php
session_start();

if (!isset($_SESSION['id_utilisateur'])) {
    header('Location: connexion.php');
    exit();
}

?>
<?php
require 'db.php';
try {
    // Préparation de la requête pour récupérer les affiches et les catégories
    $stmt = $db->prepare("
        SELECT c.libelle_categorie, f.affiche_film 
        FROM films f
        JOIN films_categories fc ON f.id_film = fc.id_film
        JOIN categories c ON fc.id_categorie = c.id_categorie
        ORDER BY c.libelle_categorie
    ");
    $stmt->execute();

    // Récupérer les résultats
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Organiser les films par catégorie
    $filmsParCategorie = [];
    foreach ($results as $row) {
        $filmsParCategorie[$row['libelle_categorie']][] = $row['affiche_film'];
    }
} catch (PDOException $e) {
    echo "Erreur : " . $e->getMessage();
}
?>



<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Films - Netflix Clone</title>
    <link rel="stylesheet" href="films.css">
    <link rel="stylesheet" href="navbar.css">
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

        </section>
        <div class="categories-container">
            <?php foreach ($filmsParCategorie as $categorie => $films): ?>
                <div class="carousel-container">
                    <h3><?= htmlspecialchars($categorie) ?></h3>
                    <div class="carousel">
                        <?php foreach ($films as $affiche): ?>
                            <?php
                            // Convertir les données binaires en Base64
                            $imageSrc = 'data:image/jpeg;base64,' . base64_encode($affiche);
                            ?>
                            <div class="carousel-item">
                                <img src="<?= $imageSrc ?>" alt="Affiche du film">
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

        <div>
            <h3>Films</h3>
        </div>


    </main>

    <?php

    include 'footer.php';
    ?>

</body>

</html>
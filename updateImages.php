<?php
require 'db.php';


try {
    // Connexion à la base de données avec PDO

    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Dossier contenant les affiches
    $chemin_dossier = "./assets/";

    // Liste des films et leurs affiches correspondantes
    $films = [
        ["id_film" => 1, "affiche" => "inception.jpg"],
        ["id_film" => 2, "affiche" => "matrix.jpg"],
        ["id_film" => 3, "affiche" => "interstellar.jpg"],
        ["id_film" => 4, "affiche" => "inception.jpg"],

    ];

    // Préparer la requête de mise à jour
    $sql = "UPDATE films SET affiche_film = :affiche WHERE id_film = :id_film";
    $stmt = $db->prepare($sql);

    foreach ($films as $film) {
        // Lire le fichier de l'affiche
        $chemin_fichier = $chemin_dossier . $film["affiche"];
        if (file_exists($chemin_fichier)) {
            $image_data = file_get_contents($chemin_fichier);

            // Exécuter la requête avec les données
            $stmt->execute([
                ':affiche' => $image_data,
                ':id_film' => $film["id_film"]
            ]);

            echo "Affiche pour le film ID " . $film["id_film"] . " insérée avec succès !<br>";
        } else {
            echo "Fichier " . $film["affiche"] . " introuvable.<br>";
        }
    }
} catch (PDOException $e) {
    echo "Erreur : " . $e->getMessage();
}

?>


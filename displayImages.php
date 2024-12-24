<?php
require 'db.php';

try {
    $id_film = isset($_GET['id_film']) ? (int)$_GET['id_film'] : 0;

    // Préparer et exécuter la requête
    $sql = "SELECT affiche_film FROM films WHERE id_film = :id_film";
    $stmt = $db->prepare($sql);
    $stmt->execute([':id_film' => $id_film]);

    // Vérifier si une affiche a été trouvée
    if ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        header("Content-Type: image/jpg");
        echo $row["affiche_film"];
        
    } else {
        echo "Aucune affiche trouvée.";
    }
} catch (PDOException $e) {
    echo "Erreur : " . $e->getMessage();
}


?>
<?php
session_start(); // Démarre la session
session_destroy(); // Détruit toutes les données de session
header("Location: connexion.php"); // Redirige l'utilisateur vers la page d'accueil ou de connexion
exit();
?>

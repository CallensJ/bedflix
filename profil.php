<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administration - Netflix Clone</title>
    <link rel="stylesheet" href="navbar.css">
    <link rel="stylesheet" href="profil.css">
</head>
<body>
<?php 

include 'navbar.php'
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Utilisateur</title>
    <link rel="stylesheet" href="styles/userprofil.css">
</head>
<body>
    <header class="profile-header">
        <h1>Mon Profil</h1>
    </header>
    <h3>Modifier vos informations</h3>
    <main class="profile-main">
        <form class="profile-form" action="profil.php" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="nom">Nom :</label>
                <input type="text" id="nom" name="nom_utilisateur">
            </div>
            <div class="form-group">
                <label for="prenom">Prénom :</label>
                <input type="text" id="prenom" name="prenom_utilisateur">
            </div>
            <div class="form-group">
                <label for="email">Email :</label>
                <input type="email" id="email" name="email_utilisateur">
            </div>
            <div class="form-group">
                <label for="pseudo">Pseudo :</label>
                <input type="text" id="pseudo" name="pseudo_utilisateur">
            </div>
            <div class="form-group">
                <label for="photo">Photo de profil :</label>
                <input type="file" id="photo" name="photo_profil_utilisateur">
            </div>
            <div class="form-group">
                <label for="password">Mot de passe :</label>
                <input type="password" id="password" name="mot_de_passe_utilisateur">
            </div>
            <button type="submit">Mettre à jour</button>
        </form>
    </main>
    <footer class="profile-footer">
        <p>&copy; 2024 Netflix Clone - Profil Utilisateur</p>
    </footer>
</body>
</html>

</body>
</html>

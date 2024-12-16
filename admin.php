<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administration - Netflix Clone</title>
    <link rel="stylesheet" href="navbar.css">
    <link rel="stylesheet" href="admin.css">
</head>
<body>
<?php 

include 'navbar.php'
?>

    <!-- Page Administration -->
    <main class="main">
        <section class="admin-panel">
            <h2>Panel d'administration</h2>

            <div class="crud-section">
                <h3>Gérer les films et séries</h3>
                <form class="crud-form">
                    <label for="title">Titre :</label>
                    <input type="text" id="title" name="title" placeholder="Titre du contenu">

                    <label for="type">Type :</label>
                    <select id="type" name="type">
                        <option value="film">Film</option>
                        <option value="serie">Série</option>
                    </select>

                    <label for="genre">Genre :</label>
                    <input type="text" id="genre" name="genre" placeholder="Genre">

                    <label for="description">Description :</label>
                    <textarea id="description" name="description" placeholder="Description du contenu"></textarea>

                    <label for="image">Image (URL) :</label>
                    <input type="text" id="image" name="image" placeholder="Lien de l'image">

                    <button type="submit">Ajouter/Modifier</button>
                    <button type="button">Supprimer</button>
                </form>
            </div>

            <div class="content-list">
                <h3>Contenus existants</h3>
                <ul>
                    <li>Film : Inception - Action</li>
                    <li>Série : Stranger Things - Sci-fi</li>
                    <li>Film : The Godfather - Drame</li>
                </ul>
            </div>
        </section>
    </main>
</body>
</html>

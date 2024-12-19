<?php
session_start();
require 'db.php';
include 'navbar.php'
?>


<?php
//on redirige si pas de session
if (!isset($_SESSION['id_utilisateur'])) {
    header('Location: connexion.php');
    exit();
}



//fonction mise a jour
function updateUser($db, $userId, $nom = null, $prenom = null, $email = null, $pseudo = null, $mdp = null, $avatar = null)
{
    $userId = $_SESSION['id_utilisateur']; // Récupération de l'ID depuis la session   
    $fields = [];
    $params = [':id_utilisateur' => $userId];

    if ($nom !== null) {
        $fields[] = "nom_utilisateur = :nom";
        $params[':nom'] = $nom;
    }
    if ($prenom !== null) {
        $fields[] = "prenom_utilisateur = :prenom";
        $params[':prenom'] = $prenom;
    }


    if ($email !== null) {
        $fields[] = "email_utilisateur = :email";
        $params[':email'] = $email;
    }
    if ($pseudo !== null) {
        $fields[] = "pseudo_utilisateur = :pseudo";
        $params[':pseudo'] = $pseudo;
    }
    if ($mdp !== null) {
        $fields[] = "mot_de_passe_utilisateur = :mdp";
        $params[':mdp'] = password_hash($mdp, PASSWORD_DEFAULT);
    }
    if ($avatar !== null) {
        $fields[] = "photo_profil_utilisateur = :avatar";
        $params[':avatar'] = $avatar;
    }

    if (!empty($fields)) {
        $sql = "UPDATE utilisateurs SET " . implode(", ", $fields) . " WHERE id_utilisateur = :id_utilisateur";
        $stmt = $db->prepare($sql);
        $stmt->execute($params);
    } else {
        // Aucun champ à mettre à jour, aucune action n'est nécessaire
        throw new Exception("Aucun champ n'a été fourni pour la mise à jour.");
    }
}

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Utilisateur</title>
    <link rel="stylesheet" href="navbar.css">
    <link rel="stylesheet" href="profil.css">
</head>

<body>
    <header class="profile-header">
        <h1>Mon Profil</h1>
    </header>
    <h3>Modifier vos informations</h3>
    <main class="profile-main">
        <?php
            $utilisateur = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $action = isset($_POST['action']) ? $_POST['action'] : null;

            if ($action === 'update') {
       
                $userId = $_SESSION['id_utilisateur'];
                $pseudo = !empty($_POST['pseudo_utilisateur']) ? $_POST['pseudo_utilisateur'] : null;
                $nom = !empty($_POST['nom_utilisateur']) ? $_POST['nom_utilisateur'] : null;
                $prenom = !empty($_POST['prenom_utilisateur']) ? $_POST['prenom_utilisateur'] : null;
                $email = !empty($_POST['email_utilisateur']) ? $_POST['email_utilisateur'] : null;
                $mdp = !empty($_POST['mot_de_passe_utilisateur']) ? $_POST['mot_de_passe_utilisateur'] : null;
                
                

                if (!empty($_FILES['photo_profil_utilisateur']['tmp_name'])) {
                    move_uploaded_file($_FILES['photo_profil_utilisateur']['tmp_name'], "uploads/" . $avatar);
                }

                try {
                    updateUser($db, $userId, $pseudo, $nom, $prenom, $email, $avatar, $mdp);
                    echo "<p>Utilisateur mis à jour avec succès !</p>";
                } catch (Exception $e) {
                    echo "<p>Erreur lors de la mise à jour : " . $e->getMessage() . "</p>";
                }
            }
        }

        ?>
        <form class="profile-form" action="profil.php" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="action" value="update">
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
            <p>ou
                <p />
                <button>Supprimer le Compte</button>
        </form>
    </main>
    <footer class="profile-footer">
        <p>&copy; 2024 Netflix Clone - Profil Utilisateur</p>
    </footer>
</body>

</html>

</body>

</html>
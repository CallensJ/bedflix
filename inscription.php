<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="connexion.css" />
  <title>inscription</title>
</head>

<body>

  <?php

  require 'db.php';

  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
    $nom = trim(filter_var($_POST['nom'], FILTER_SANITIZE_SPECIAL_CHARS));
    $prenom = trim(filter_var($_POST['prenom'], FILTER_SANITIZE_SPECIAL_CHARS));
    $pseudo = trim(filter_var($_POST['pseudo'], FILTER_SANITIZE_SPECIAL_CHARS));


    //verification si les inputs sont correctmeent complete

    if (empty($nom) || empty($prenom) || empty($email) || empty($pseudo) || empty($password)) {
      $_SESSION['error'] = "Tous les champs sont obligatoires.";
      header('Location: inscription.php');
      exit();
    }

    // verif email valide
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $_SESSION['error'] = "email invalid";
      header('Location: inscription.php');
      exit();
    }



    try   {
      //verif si email existe deja dans la bdd
      $check = $db->prepare("SELECT COUNT(*) FROM utilisateurs WHERE email_utilisateur = :email");
      
      $check->execute(['email' => $email]);


      if ($check->fetchColumn() > 0) {
        $_SESSION['error'] = "email existe deja";
        header('Location: inscription.php');
        exit();
      }

      $defaultPhoto = 'assets/default.png';
      $idRole = 2;
      $insert = $db->prepare("
      INSERT INTO UTILISATEURS 
      (nom_utilisateur, prenom_utilisateur, email_utilisateur, pseudo_utilisateur, mot_de_passe_utilisateur,photo_profil_utilisateur, id_role) 
      VALUES (:nom, :prenom, :email, :pseudo, :password, :photo, :role)
  ");
      $insert->execute([

        'nom' => $nom,
        'prenom' => $prenom,
        'email' => $email,
        'pseudo' => $pseudo,
        'password' => $password,
        'photo' => $defaultPhoto,
        'role' => $idRole
        
      ]);
      $_SESSION['success'] = "inscription reussie";
      header('Location: connexion.php');
      exit();

    } catch (PDOException $e) {
     
      if ($e->getCode() === '23000') { //https://www.php.net/manual/en/exception.getcode.php
        $_SESSION['error'] = "email existe deja";
        echo 'email existe deja';
      } else {
        $_SESSION['error'] = "Error";
      }
      error_log("Erreur PDO : " . $e->getMessage());
      header('Location: inscription.php');
      exit();
    }
  }



  ?>


  <section>
    <?php if (isset($_SESSION['error'])): ?>
      <div style="color: red;"><?php echo $_SESSION['error'];
                                unset($_SESSION['error']); ?></div>
    <?php endif; ?>

    <?php if (isset($_SESSION['success'])): ?>
      <div style="color: green;"><?php echo $_SESSION['success'];
                                  unset($_SESSION['success']); ?></div>
    <?php endif; ?>
    <div class="wrapper">
      <form action="inscription.php" method="POST">
        <h1 class="title">Register</h1>
        <p class="text">Register to access full features</p>
        <!-- ====== input bloc nom ====== -->
        <div class="input-bloc">
          <input class="input" type="text" id="nom" name="nom" placeholder="Name" required>

        </div>
        <!-- ====== input bloc prenom ====== -->
        <div class="input-bloc">
          <input class="input" type="text" id="prenom" name="prenom" placeholder="Surname" required>

        </div>
        <!-- ====== input bloc pseudo ====== -->
        <div class="input-bloc">
          <input class="input" type="text" id="pseudo" name="pseudo" placeholder="Pseudo" required>
        </div>

        <!-- ====== input bloc email ====== -->
        <div class="input-bloc">

          <span class="icon">
            <ion-icon name="mail-outline"></ion-icon>
          </span>
          <input class="input" type="email" name="email" placeholder="Your email" id="email" />
        </div>
        <!-- ====== input bloc password ====== -->
        <div class="input-bloc">
          <span class="icon">
            <ion-icon name="key-sharp"></ion-icon>
          </span>
          <input class="input" type="password" placeholder="your password" name="password" id="password" />
          <span class="showPassword" id="togglePassword">show</span>
        </div>
        <!-- ====== Remember Me Bloc ====== -->
        <div class="rememberMe">
          <input type="checkbox" />
          <label>Remember me</label>
        </div>
        <button type="submit" class="btn" id="submit">Register</button>
      </form>
    </div>
  </section>

  <script
    type="module"
    src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
  <script
    nomodule
    src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
  <script src="script.js"></script>
  <!-- background image : Paul Volkmer: https://unsplash.com/fr/@laup -->
</body>

</html>
</body>

</html>
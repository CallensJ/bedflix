<?php   session_start(); ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="connexion.css" />
  <title>Login page</title>
</head>

<body>


  <?php

  require 'db.php';

  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = filter_var($_POST['user_email'], FILTER_SANITIZE_EMAIL);
    $password = $_POST['user_password'];

    try {
      $select = $db->prepare("SELECT * FROM utilisateurs WHERE email = :email");
      $select->execute(['user_email' => $email]);
      $user = $select->fetch(PDO::FETCH_ASSOC);

      if ($user && password_verify($password, $user['user_password'])) {
        $_SESSION['user_id'] = $user['id'];
        header('Location: accueil.php');
        exit();
      } else {
        $_SESSION['error'] = "Email ou mot de passe incorrect.";
        header('Location: connexion.php');
        exit();
      }
    } catch (PDOException $e) {
      var_dump($e);
      $_SESSION['error'] = "Erreur";
      header('Location: connexion.php');
      exit();
    }
  }
  ?>

  <section>
    <div class="wrapper">
      <form method="post">
        <h1 class="title">Sign in</h1>
        <p class="text">Login to manage your account</p>
        <!-- ====== input bloc email ====== -->
        <div class="input-bloc">
          <input type="hidden" name="form_connexion" value="1">
          <span class="icon">
            <ion-icon name="mail-outline"></ion-icon>
          </span>
          <input class="input" type="email" name="form_email" placeholder="Your email" id="email" />
        </div>
        <!-- ====== input bloc password ====== -->
        <div class="input-bloc">
          <span class="icon">
            <ion-icon name="key-sharp"></ion-icon>
          </span>
          <input class="input" type="password" placeholder="your password" name="form_password" id="password" />
          <span class="showPassword" id="togglePassword">show</span>
        </div>
        <!-- ====== Remember Me Bloc ====== -->
        <div class="rememberMe">
          <input type="checkbox" />
          <label>Remember me</label>
        </div>
        <button type="submit" class="btn" id="submit">connexion</button>
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
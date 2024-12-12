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
  session_start();
  require 'db.php';

  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = filter_var($_POST['user_email'], FILTER_SANITIZE_EMAIL);
    $password = password_hash($_POST['user_password'], PASSWORD_BCRYPT);

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $_SESSION['error'] = "email invalid";
      header('Location: inscription.php');
      exit();
    }

    try {
      $insert = $pdo->prepare("INSERT INTO utilisateurs (user_email, user_password) VALUES (:email, :password)");
      $insert->execute(['user_email' => $email, 'user_password' => $password]);
      $_SESSION['success'] = "inscription reussie";
      header('Location: connexion.php');
      exit();
    } catch (PDOException $e) {
      var_dump($e->getCode());  //https://www.php.net/manual/en/exception.getcode.php
      if ($e->getCode() === '23000') {
        $_SESSION['error'] = "email existe deja";
        echo 'email existe deja';
      } else {
        $_SESSION['error'] = "Error";
      }
      header('Location: inscription.php');
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
          <input type="hidden" name="form_inscription" value="1">
          <span class="icon">
            <ion-icon name="mail-outline"></ion-icon>
          </span>
          <input class="input" type="text" name="form_email" placeholder="Your email" id="email" />
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
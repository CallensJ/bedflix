<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="connexion.css" />
    <title>Login page</title>
  </head>
  <body>
    <section>
      <div class="wrapper">
        <form method="post">
          <h1 class="title">Sign in</h1>
          <p class="text">Login to manage your account</p>
          <!-- ====== input bloc email ====== -->
          <div class="input-bloc">
            <span class="icon">
              <ion-icon name="mail-outline"></ion-icon>
            </span >
              <input class="input" type="email" placeholder="Your email" />
          </div>
          <!-- ====== input bloc password ====== -->
          <div class="input-bloc">
            <span class="icon">
              <ion-icon  name="key-sharp"></ion-icon>
            </span>
            <input class="input" type="password" placeholder="your password" name="password" id="password" />
            <span class="showPassword" id="togglePassword">show</span>
          </div>
          <!-- ====== Remember Me Bloc ====== -->
          <div class="rememberMe">
            <input type="checkbox" />
            <label>Remember me</label>
          </div>
          <button type="submit" class="btn" id="submit">Sign In</button>
        </form>
      </div>
    </section>

    <script
      type="module"
      src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"
    ></script>
    <script
      nomodule
      src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"
    ></script>
    <script src="script.js"></script>
    <!-- background image : Paul Volkmer: https://unsplash.com/fr/@laup -->
  </body>
</html>
<!doctype html>
<html lang="en">

<?php require('partials/head.php') ?>

<body class="container">
  <div class="full-height">
    <div id="login-body">
      <main class="container">
        <h1>Log In</h1>
        <?= isset($loginError) ? "<p id='login-error'>$loginError</p>" : "" ?>
        <form action="index.php?route=login" method="POST">
          <fieldset>
            <label for="username">Username</label>
            <input name="username" id="username" placeholder="Username" />
            <label for="password">Password</label>
            <input type="password" id="password" name="password" placeholder="Password" />
          </fieldset>

          <input type="submit" value="Log In" />
        </form>
      </main>
    </div>
  </div>
</body>

</html>
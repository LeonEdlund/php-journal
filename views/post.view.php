<!doctype html>
<html lang="en">

<?php require('partials/head.php') ?>

<body class="container">
  <div class="full-height">
    <?php require('partials/navbar.php') ?>

    <main>
      <hgroup>
        <h1><?= htmlspecialchars($post['title']) ?></h1>
        <h3><?= htmlspecialchars($post['created_at']) ?></h3>
      </hgroup>

      <section>
        <p>
          <?= htmlspecialchars($post['post_text']) ?>
        </p>
        <cite>- <?= htmlspecialchars($post['first_name']) . " " . htmlspecialchars($post['last_name']) ?></cite>
      </section>
    </main>

  </div>
  <?php require('partials/footer.php') ?>
</body>

</html>
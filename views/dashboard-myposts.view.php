<!doctype html>
<html lang="en">

<?php require('partials/head.php') ?>

<body class="container">
  <div class="full-height">
    <?php require('partials/admin-navbar.php') ?>
    <div class=" main-grid">
      <aside>
        <nav>
          <ul>
            <li><a href="index.php?route=dashboard">New post</a></li>
            <li><a href="index.php?route=dashboard-myposts">All posts</a></li>
          </ul>
        </nav>
      </aside>

      <main>
        <hgroup>
          <h1>All your posts</h1>
        </hgroup>
        <ul id="post-list">
          <?php foreach ($posts as $post) : ?>
            <li>
              <article>
                <?= htmlspecialchars($post['title']) ?>
                <footer class="card-footer-text">
                  <p class="float-right"><?= htmlspecialchars($post['created_at']) ?></p>
                  <form action="" method="post">
                    <input class="hidden" type="number" name="post_id" value="<?= $post['id'] ?>">
                    <input type="submit" value="Delete" id="post-btn">
                  </form>
                </footer>
              </article>
            </li>
          <?php endforeach; ?>

        </ul>
      </main>
    </div>
  </div>
  <?php require('partials/footer.php') ?>
</body>

</html>
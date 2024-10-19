<?php require('partials/head.php') ?>

<body class="container">
  <div class="full-height">
    <?php require('partials/admin-navbar.php') ?>
    <div class=" main-grid">
      <aside>
        <nav>
          <ul>
            <li><a href="?route=dashboard">New post</a></li>
            <li><a href="?route=my-posts" id="active-link">Your posts</a></li>
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
                <header>
                  <strong><?= htmlspecialchars($post['title']) ?></strong>
                  <p class="float-right"><?= htmlspecialchars($post['created_at']) ?></p>
                </header>
                <?= nl2br(htmlspecialchars($post['post_text'])) ?>
                <footer class="card-footer-text">

                  <div class="flex">
                    <button onclick="window.location = 'index.php?route=edit-post&id=<?= $post['id'] ?>'">Edit</button>
                    <form action="" method="post">
                      <input class="hidden" type="number" name="post_id" value="<?= $post['id'] ?>">
                      <input type="submit" value="Delete" id="post-btn">
                    </form>

                  </div>
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
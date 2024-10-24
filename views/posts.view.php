<?php require('partials/head.php') ?>

<body class="container">
  <div class="full-height">
    <?php require('partials/navbar.php') ?>

    <main>
      <hgroup>
        <h1>Posts</h1>
      </hgroup>

      <section>
        <ul id="post-list">
          <?php if (empty($posts)) : ?>
            <p>No posts</p>

          <?php else : ?>
            <?php foreach ($posts as $post) : ?>
              <li>
                <a href="index.php?route=post&id=<?= htmlspecialchars($post->id) ?>">
                  <article>
                    <?= htmlspecialchars($post->title) ?>
                    <footer class="card-footer-text">
                      <?= htmlspecialchars($post->first_name) . " " .  htmlspecialchars($post->last_name) ?>
                      <span class="float-right"><?= htmlspecialchars($post->created_at) ?></span>
                    </footer>
                  </article>
                </a>
              </li>
            <?php endforeach; ?>
          <?php endif; ?>
        </ul>
        <div class="pagination">
          <?php for ($i = 1; $i <= $numberOfPages; $i++) : ?>
            <a href="index.php?route=posts&page=<?= $i ?>" <?= ($page == $i) ? "id=active" : "" ?>><?= $i ?></a>
          <?php endfor; ?>
        </div>
      </section>
    </main>
  </div>
  <?php require('partials/footer.php') ?>
</body>
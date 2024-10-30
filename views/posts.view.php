<!doctype html>
<html lang="en">

<?php require('partials/head.php') ?>

<body class="container">
  <div class="full-height">
    <?php require('partials/navbar.php') ?>

    <main>
      <hgroup>
        <h1>Posts</h1>
      </hgroup>

      <section>
        <?php if (empty($posts)) : ?>
          <p>No posts</p>
        <?php else : ?>

          <ul id="post-list">
            <?php foreach ($posts as $post) : ?>
              <li>
                <a href="index.php?route=post&id=<?= htmlspecialchars($post->id) ?>">
                  <article>
                    <header>
                      <?= htmlspecialchars($post->title) ?>
                    </header>
                    <?= nl2br(htmlspecialchars($post->post_text)) ?>
                    <footer class="card-footer-text">
                      <?= htmlspecialchars($post->author) ?>
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

</html>
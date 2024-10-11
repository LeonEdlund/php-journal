<!doctype html>
<html lang="en">

<?php require('partials/head.php') ?>

<body class="container">
  <div class="full-height">
    <?php require('partials/navbar.php') ?>

    <main>
      <a href="index.php">Go back</a>
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
      <hr>

      <section id="comments">
        <h3>Comments</h3>
        <form action="" method="post">
          <label for="name">Name</label>
          <input type="text" id="name" name="name" placeholder="Name">
          <label for="comment">Comment</label>
          <textarea type="" id="comment" name="comment" placeholder="Comment"></textarea>
          <input type="submit" value="Post" id="post-btn" />
        </form>

        <?php if (isset($errorMessage)) : ?>
          <section>
            <p><?= $errorMessage ?></p>
          </section>
        <?php endif; ?>

        <ul id="post-list">
          <?php foreach ($comments as $comment) : ?>
            <li>
              <article>
                <?= $comment['comment_text'] ?>
                <footer class="card-footer-text">
                  <?= htmlspecialchars($comment['author']) ?>
                  <span class="float-right"><?= htmlspecialchars($comment['created_at']) ?></span>
                </footer>
              </article>
            </li>
          <?php endforeach; ?>

        </ul>
      </section>
    </main>

  </div>
  <?php require('partials/footer.php') ?>
</body>

</html>
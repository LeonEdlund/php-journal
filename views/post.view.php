<?php require('partials/head.php') ?>

<body class="container">
  <div class="full-height">
    <?php require('partials/navbar.php') ?>

    <main>
      <a href="index.php" id="go-back">Go back</a>
      <hgroup>
        <h1><?= htmlspecialchars($post->title) ?></h1>
        <h3><?= htmlspecialchars($post->created_at) ?></h3>
      </hgroup>

      <section>
        <p><?= nl2br(htmlspecialchars($post->post_text)) ?></p>
        <cite>- <?= htmlspecialchars($post->first_name) . " " . htmlspecialchars($post->last_name) ?></cite>
      </section>
      <hr>
    </main>

    <!-- COMMENTS -->
    <details id="comments" open>
      <summary>Comments (<?= count($comments) ?>)</summary>
      <h4>Post Comment</h4>
      <form action="" method="post">
        <label for="name">Name</label>
        <input type="text" id="name" name="name" placeholder="Name"
          value="<?= $_SESSION['user']['fullName'] ?? ($_POST['name'] ?? "") ?>">
        <label for="comment">Comment</label>
        <textarea type="" id="comment" name="comment" placeholder="Comment"><?= $_POST['comment'] ?? "" ?></textarea>
        <input type="submit" value="Post" id="post-btn" />
      </form>

      <!-- PRINT ERRORS IF THERE ARE ANY -->
      <?php if (!empty($errors)) : ?>
        <section>
          <?php foreach ($errors as $error) : ?>
            <p> <?= $error ?> </p>
          <?php endforeach; ?>
        </section>
      <?php endif; ?>

      <!-- DISPLAY COMMENTS IF THERE ARE ANY -->
      <?php if (count($comments) > 0) : ?>
        <h4>All Comments</h4>
        <ul id="post-list">
          <?php foreach ($comments as $comment) : ?>
            <li>
              <article>
                <?= $comment->comment_text ?>
                <footer class="card-footer-text">
                  <?= htmlspecialchars($comment->author) ?>
                  <span class="float-right"><?= htmlspecialchars($comment->created_at) ?></span>
                </footer>
              </article>
            </li>
          <?php endforeach; ?>
        <?php endif; ?>
        </ul>
    </details>
  </div>
  <?php require('partials/footer.php') ?>
</body>
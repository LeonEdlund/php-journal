<?php require('views/partials/head.php') ?>

<body class="container">
  <div class="full-height">
    <?php require('views/partials/admin-navbar.php') ?>
    <main>
      <a href="?route=my-posts">Back</a>
      <hgroup>
        <h1>Edit post</h1>
      </hgroup>
      <form action="" method="POST" autocomplete="off">
        <fieldset>
          <label for="title">Titel</label>
          <input name="title" placeholder="Title" value="<?= $post['title'] ?? "" ?>" />

          <label for="post_text">Text</label>
          <textarea name="post_text" placeholder="Write your post..." rows="10"><?= $post['post_text'] ?? "" ?></textarea>
        </fieldset>
        <input type="submit" value="Edit" id="post-btn" />
      </form>

      <?php if (isset($postStatus)) : ?>
        <section>
          <p><?= $postStatus ?></p>
        </section>
      <?php endif; ?>
    </main>
  </div>

  <?php require('views/partials/footer.php') ?>
</body>
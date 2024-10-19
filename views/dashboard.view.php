<?php require('partials/head.php') ?>

<body class="container">
  <div class="full-height">
    <?php require('partials/admin-navbar.php') ?>
    <div class=" main-grid">
      <aside>
        <nav>
          <ul>
            <li><a href="index.php?route=dashboard" id="active-link">New post</a></li>
            <li><a href="index.php?route=my-posts">Your posts</a></li>
          </ul>
        </nav>
      </aside>

      <main>
        <hgroup>
          <h1>Write a post</h1>
        </hgroup>
        <form action="" method="POST" autocomplete="off">
          <fieldset>
            <label for="title">Titel</label>
            <input name="title" placeholder="Title" />

            <label for="post_text">Text</label>
            <textarea name="post_text" placeholder="Write your post..." rows="10"></textarea>
          </fieldset>
          <input type="submit" value="Post" id="post-btn" />
        </form>

        <?php if (isset($postStatus)) : ?>
          <section>
            <p><?= $postStatus ?></p>
          </section>
        <?php endif; ?>
      </main>
    </div>
  </div>

  <?php require('partials/footer.php') ?>
</body>